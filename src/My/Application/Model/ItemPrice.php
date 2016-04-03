CREATE TABLE public.tbl_item_price (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    item_id uuid NOT NULL,
    buyer_category_id uuid NOT NULL,
    price numeric(14,2) NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY tbl_item_price
    ADD CONSTRAINT tbl_item_price_pkey
    PRIMARY KEY (item_id, buyer_category_id);

CREATE INDEX tbl_item_price_idx_item_id
    ON tbl_item_price USING btree (item_id);

CREATE INDEX tbl_item_price_idx_buyer_category_id
    ON tbl_item_price USING btree (buyer_category_id);

ALTER TABLE ONLY tbl_item_price
    ADD CONSTRAINT tbl_item_price_unq_item_buyer_category
    UNIQUE (item_id, buyer_category_id);


ALTER TABLE ONLY tbl_item_price
    ADD CONSTRAINT tbl_item_price_fkey_buyer_category_id
    FOREIGN KEY (buyer_category_id) 
    REFERENCES tbl_category(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_item_price
    ADD CONSTRAINT tbl_item_price_fkey_item_id
    FOREIGN KEY (item_id) 
    REFERENCES tbl_item(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
