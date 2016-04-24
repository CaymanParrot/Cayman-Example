CREATE TABLE public.tbl_token (
    code varchar(200) NOT NULL,
    expiry_date TIMESTAMP(0) WITH TIME ZONE NOT NULL,
    email varchar(128),
    data jsonb
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_token
    ADD CONSTRAINT tbl_token_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_token
    ADD CONSTRAINT tbl_token_unq_code
    UNIQUE (email, code);

CREATE INDEX tbl_token_idx_expiry_date
    ON tbl_token USING btree (expiry_date);
