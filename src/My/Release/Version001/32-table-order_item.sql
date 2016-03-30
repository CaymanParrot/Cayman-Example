CREATE TABLE public.tbl_order_item (
    order_id uuid NOT NULL,
    line_number smallint NOT NULL,
    item_id uuid NOT NULL,
    value_quantity numeric(14,2) DEFAULT 1 NOT NULL,
    value_selling_price numeric(14,2) DEFAULT 0.0,
    value_cost_price numeric(14,2) DEFAULT 0.0,-- at the time of preparation
    value_gross numeric(14,2) DEFAULT 0.0, -- quantity x selling price
    value_discount_pctg numeric(14,2) DEFAULT 0.0,-- %
    value_discount numeric(14,2) DEFAULT 0.0,-- gross x discount%
    value_net numeric(14,2) DEFAULT 0.0, -- gross - discount
    value_tax_pctg numeric(14,2) DEFAULT 0.0, -- %
    value_tax numeric(14,2) DEFAULT 0.0, -- net x tax%
    value_total numeric(14,2) DEFAULT 0.0, -- net + tax
    customer_note text
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_order_item_order_id_idx
    ON tbl_order_item USING btree (order_id);

CREATE INDEX tbl_order_item_item_id_idx
    ON tbl_order_item USING btree (item_id);

