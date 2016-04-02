CREATE TABLE public.tbl_account_seller (
    currency_id smallint DEFAULT 1 NOT NULL,
    target_profit_pctg numeric(5,2) DEFAULT 20 NOT NULL
)
INHERITS (tbl_account)
WITH (oids = false);

ALTER TABLE ONLY tbl_account_seller
    ADD CONSTRAINT tbl_account_seller_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_account_seller_idx_currency_id
    ON tbl_account_seller USING btree (currency_id);

ALTER TABLE ONLY tbl_account_seller
    ADD CONSTRAINT tbl_account_seller_fkey_currency_id
    FOREIGN KEY (currency_id)
    REFERENCES tbl_system_currency(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;

