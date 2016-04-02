CREATE TABLE public.tbl_basket (
    item_id uuid NOT NULL,
    quantity numeric(14,2) DEFAULT 1 NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_basket
    ADD CONSTRAINT tbl_basket_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_basket_item_id_idx
    ON tbl_basket USING btree (item_id);

ALTER TABLE ONLY tbl_basket
    ADD CONSTRAINT tbl_basket_fkey_item_id
    FOREIGN KEY (item_id) 
    REFERENCES tbl_item(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
