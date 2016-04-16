CREATE OR REPLACE FUNCTION public.my_audit_trail()
  RETURNS trigger AS
$body$
DECLARE
  updated      HSTORE;
  updated_data JSON;
  op_flag      CHAR(1);
  entity_id    UUID;
  all_data     JSON;
  table_name   TEXT;
BEGIN

  table_name = TG_TABLE_NAME::TEXT;
  op_flag    = substring(TG_OP, 1, 1);

  IF (TG_OP = 'UPDATE') THEN
    updated      = ( HSTORE(OLD.*) - HSTORE(NEW.*) );
    entity_id    = OLD.id;
    updated_data = hstore_to_json(updated);
    all_data     = row_to_json(NEW.*);
    INSERT INTO tbl_audit
           (table_name, op_flag, entity_id, all_data, updated_data)
    VALUES (table_name, op_flag, entity_id, all_data, updated_data);
    RETURN NEW;
  ELSIF (TG_OP = 'DELETE') THEN
    all_data  = row_to_json(OLD.*);
    entity_id = OLD.id;
    INSERT INTO tbl_audit
           (table_name, op_flag, entity_id, all_data)
    VALUES (table_name, op_flag, entity_id, all_data);
    RETURN OLD;
  ELSIF (TG_OP = 'INSERT') THEN
    all_data  = row_to_json(NEW.*);
    entity_id = NEW.id;
    INSERT INTO tbl_audit
           (table_name, op_flag, entity_id, all_data)
    VALUES (table_name, op_flag, entity_id, all_data);
    RETURN NEW;
  ELSE
    RAISE WARNING '[my_audit_trail] - Other action occurred: %, at %', TG_OP, now();
    RETURN NULL;
  END IF;

  EXCEPTION
  WHEN data_exception THEN
    RAISE WARNING '[my_audit_trail] - UDF ERROR [DATA EXCEPTION] - SQLSTATE: %, SQLERRM: %', SQLSTATE, SQLERRM;
    RETURN NULL;
  WHEN unique_violation THEN
    RAISE WARNING '[my_audit_trail] - UDF ERROR [UNIQUE] - SQLSTATE: %, SQLERRM: %', SQLSTATE, SQLERRM;
    RETURN NULL;
  WHEN OTHERS THEN
    RAISE WARNING '[my_audit_trail] - UDF ERROR [OTHER] - SQLSTATE: %, SQLERRM: %', SQLSTATE, SQLERRM;
    RETURN NULL;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;

