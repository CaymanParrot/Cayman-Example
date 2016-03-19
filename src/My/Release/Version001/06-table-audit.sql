CREATE TABLE public.audit (
    id           uuid DEFAULT uuid_generate_v4() NOT NULL,
    date_created timestamp with time zone DEFAULT now(),
    user_id      uuid,
    table_name   VARCHAR(50),
    op_flag      VARCHAR(1), -- I,U,D
    pkey         uuid,
    all_data     jsonb,
    updated_data jsonb
)
WITH (oids = false);

ALTER TABLE ONLY audit
    ADD CONSTRAINT audit_pkey
    PRIMARY KEY (id);

CREATE INDEX audit_date_created_idx
    ON audit USING btree (date_created);
CREATE INDEX audit_user_id_idx
    ON audit USING btree (user_id);
