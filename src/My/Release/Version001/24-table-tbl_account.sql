CREATE TABLE public.tbl_account (
    is_company boolean DEFAULT FALSE NOT NULL,
    trade_name varchar(128),
    legal_name varchar(128),
    vat_number varchar(30),
    short_description text,
    long_description text
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_account
    ADD CONSTRAINT tbl_account_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_account_idx_trade_name
    ON tbl_account USING btree (trade_name);

CREATE INDEX tbl_account_idx_legal_name
    ON tbl_account USING btree (legal_name);

CREATE INDEX tbl_account_idx_vat_number
    ON tbl_account USING btree (vat_number);
