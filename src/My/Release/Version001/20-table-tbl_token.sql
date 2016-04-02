CREATE TABLE public.tbl_token (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    code varchar(200) NOT NULL,
    date_created timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    expiry_date timestamp with time zone NOT NULL,
    email varchar(128),
    user_id uuid,
    data jsonb
)
WITH (oids = false);

ALTER TABLE ONLY tbl_token
    ADD CONSTRAINT tbl_token_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_token
    ADD CONSTRAINT tbl_token_unq_code
    UNIQUE (code);

CREATE INDEX tbl_token_idx_date_created
    ON tbl_token USING btree (date_created);

CREATE INDEX tbl_token_idx_expiry_date
    ON tbl_token USING btree (expiry_date);
