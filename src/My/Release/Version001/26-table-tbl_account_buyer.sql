CREATE TABLE public.tbl_account_buyer (
    seller_id UUID NOT NULL,
    balance numeric(14,2) NOT NULL DEFAULT 0.0
)
INHERITS (tbl_account)
WITH (oids = false);

ALTER TABLE ONLY tbl_account_buyer
    ADD CONSTRAINT tbl_account_buyer_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_account_buyer_idx_seller_id
    ON tbl_account_buyer USING btree (seller_id);

ALTER TABLE ONLY tbl_account_buyer
    ADD CONSTRAINT tbl_account_buyer_fkey_seller_id
    FOREIGN KEY (seller_id)
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;