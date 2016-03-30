CREATE OR REPLACE FUNCTION public.fun_create_audit_trail (
)
  RETURNS trigger AS
$body$
DECLARE
  updated      HSTORE;
  updated_data JSON;
  op_flag      CHAR(1);
  user_id      UUID;
  user_id_tmp  UUID;
  entity_id    UUID;
  all_data     JSON;
  table_name   TEXT;
BEGIN

  table_name = TG_TABLE_NAME::TEXT;
  op_flag    = substring(TG_OP, 1, 1);

  user_id     = null;
  user_id_tmp = fun_myvars_get('user_id');
  IF (user_id_tmp IS NOT NULL) THEN
    user_id = user_id_tmp :: UUID;
  END IF;

  IF (TG_OP = 'UPDATE') THEN
    updated      = ( HSTORE(OLD.*) - HSTORE(NEW.*) );
    entity_id    = OLD.id;
    updated_data = hstore_to_json(updated);
    all_data     = row_to_json(NEW.*);
    INSERT INTO audit
           (table_name, op_flag, user_id, entity_id, all_data, updated_data)
    VALUES (table_name, op_flag, user_id, entity_id, all_data, updated_data);
    RETURN NEW;
  ELSIF (TG_OP = 'DELETE') THEN
    all_data  = row_to_json(OLD.*);
    entity_id = OLD.id;
    INSERT INTO audit
           (table_name, op_flag, user_id, entity_id, all_data)
    VALUES (table_name, op_flag, user_id, entity_id, all_data);
    RETURN OLD;
  ELSIF (TG_OP = 'INSERT') THEN
    all_data  = row_to_json(NEW.*);
    entity_id = NEW.id;
    INSERT INTO audit
           (table_name, op_flag, user_id, entity_id, all_data)
    VALUES (table_name, op_flag, user_id, entity_id, all_data);
    RETURN NEW;
  ELSE
    RAISE WARNING '[fun_create_audit_trail] - Other action occurred: %, at %', TG_OP, now();
    RETURN NULL;
  END IF;

  EXCEPTION
  WHEN data_exception THEN
    RAISE WARNING '[fun_create_audit_trail] - UDF ERROR [DATA EXCEPTION] - SQLSTATE: %, SQLERRM: %', SQLSTATE, SQLERRM;
    RETURN NULL;
  WHEN unique_violation THEN
    RAISE WARNING '[fun_create_audit_trail] - UDF ERROR [UNIQUE] - SQLSTATE: %, SQLERRM: %', SQLSTATE, SQLERRM;
    RETURN NULL;
  WHEN OTHERS THEN
    RAISE WARNING '[fun_create_audit_trail] - UDF ERROR [OTHER] - SQLSTATE: %, SQLERRM: %', SQLSTATE, SQLERRM;
    RETURN NULL;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;

