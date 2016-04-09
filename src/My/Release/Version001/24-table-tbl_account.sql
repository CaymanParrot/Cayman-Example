CREATE TABLE public.tbl_account (
    is_company boolean DEFAULT FALSE NOT NULL,
    trade_name varchar(128),
    legal_name varchar(128),
    vat_number varchar(30),
    short_description text,
    long_description text,
    is_buyer BOOLEAN DEFAULT false NOT NULL,
    is_seller BOOLEAN DEFAULT false NOT NULL,
    currency_id smallint DEFAULT 1 NOT NULL,
    target_profit_pctg numeric(5,2)
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

CREATE INDEX tbl_account_idx_currency_id
    ON tbl_account USING btree (currency_id);

ALTER TABLE ONLY tbl_account
    ADD CONSTRAINT tbl_account_fkey_currency_id
    FOREIGN KEY (currency_id)
    REFERENCES tbl_system_currency(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;