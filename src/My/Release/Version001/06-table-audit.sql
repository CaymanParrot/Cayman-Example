CREATE TABLE public.tbl_audit (
    id           uuid DEFAULT gen_random_uuid() NOT NULL,
    date_created timestamp with time zone DEFAULT now(),
    user_id      uuid DEFAULT ,
    table_name   VARCHAR(50),
    op_flag      VARCHAR(1), -- I,U,D
    entity_id    uuid,
    all_data     jsonb,
    updated_data jsonb
)
WITH (oids = false);

ALTER TABLE ONLY tbl_audit
    ADD CONSTRAINT tbl_audit_pkey
    PRIMARY KEY (id);

CREATE INDEX audit_date_created_idx
    ON tbl_audit USING btree (date_created);

CREATE INDEX audit_user_id_idx
    ON tbl_audit USING btree (user_id);

CREATE INDEX audit_entity_id_idx
    ON tbl_audit USING btree (entity_id);
