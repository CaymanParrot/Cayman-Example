CREATE TABLE public.order_item (
    order_id uuid NOT NULL,
    item_id uuid NOT NULL,
    quantity numeric(14,2) DEFAULT 1 NOT NULL,
    price numeric(14,2) NOT NULL,
    total numeric(14,2) NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY order_item
    ADD CONSTRAINT order_item_pkey
    PRIMARY KEY (id);

CREATE INDEX order_item_order_id_idx
    ON order_item USING btree (order_id);
CREATE INDEX order_item_item_id_idx
    ON order_item USING btree (item_id);

