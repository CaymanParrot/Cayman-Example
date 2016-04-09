CREATE TABLE public.tbl_order (
    account_id_buyer uuid,
    account_id_seller uuid,
    value_gross numeric(14,2) DEFAULT 0.0,
    value_discount numeric(14,2) DEFAULT 0.0,
    value_net numeric(14,2) DEFAULT 0.0,
    value_tax numeric(14,2) DEFAULT 0.0,
    value_total numeric(14,2) DEFAULT 0.0,
    currency_id smallint DEFAULT 1 NOT NULL,
    buyer_reference varchar(20),
    seller_reference varchar(20),
    due_date timestamp with time zone
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_order
    ADD CONSTRAINT tbl_order_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_order_idx_buyer
    ON tbl_order USING btree (account_id_buyer);

ALTER TABLE ONLY tbl_order
    ADD CONSTRAINT tbl_order_fkey_buyer
    FOREIGN KEY (account_id_buyer) 
    REFERENCES tbl_account(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;

CREATE INDEX tbl_order_idx_seller
    ON tbl_order USING btree (account_id_seller);

ALTER TABLE ONLY tbl_order
    ADD CONSTRAINT tbl_order_fkey_seller
    FOREIGN KEY (account_id_seller) 
    REFERENCES tbl_account(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
