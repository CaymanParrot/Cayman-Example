CREATE TABLE public.tbl_account (
    short_name varchar(32),
    long_name varchar(128),
    currency_id smallint DEFAULT 1 NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_account
    ADD CONSTRAINT tbl_account_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_account
    ADD CONSTRAINT tbl_account_short_name_key
    UNIQUE (short_name);
