CREATE TABLE public.tbl_order_item (
    order_id uuid NOT NULL,
    line_number smallint NOT NULL,
    item_id uuid NOT NULL,
    value_quantity numeric(14,2) DEFAULT 1 NOT NULL,
    value_price numeric(14,2) DEFAULT 0.0 NOT NULL,
    value_cost numeric(14,2) DEFAULT 0.0 NOT NULL,-- at the time of preparation
    value_gross numeric(14,2) DEFAULT 0.0 NOT NULL, -- quantity x price
    value_discount_pctg numeric(14,2) DEFAULT 0.0 NOT NULL,-- %
    value_discount numeric(14,2) DEFAULT 0.0 NOT NULL,-- gross x discount%
    value_net numeric(14,2) DEFAULT 0.0 NOT NULL, -- gross - discount
    value_tax_pctg numeric(14,2) DEFAULT 0.0 NOT NULL, -- %
    value_tax numeric(14,2) DEFAULT 0.0 NOT NULL, -- net x tax%
    value_total numeric(14,2) DEFAULT 0.0 NOT NULL, -- net + tax
    customer_note text
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_unq_order_id_line
    UNIQUE (order_id, line_number);

CREATE INDEX tbl_order_item_idx_order_id
    ON tbl_order_item USING btree (order_id);

CREATE INDEX tbl_order_item_idx_item_id
    ON tbl_order_item USING btree (item_id);

ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_fkey_order_id
    FOREIGN KEY (order_id) 
    REFERENCES tbl_order(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_fkey_item_id
    FOREIGN KEY (item_id) 
    REFERENCES tbl_item(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;

