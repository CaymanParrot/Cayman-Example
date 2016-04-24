CREATE TABLE public.tbl_audit (
    id           uuid DEFAULT gen_random_uuid() NOT NULL,
    date_created TIMESTAMP(0) WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    user_id      uuid DEFAULT myvars_get_user_id(),
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

CREATE INDEX tbl_audit_idx_date_created
    ON tbl_audit USING btree (date_created);

CREATE INDEX tbl_audit_idx_user_id
    ON tbl_audit USING btree (user_id);

CREATE INDEX tbl_audit_idx_entity_id
    ON tbl_audit USING btree (entity_id);
