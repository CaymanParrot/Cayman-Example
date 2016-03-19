CREATE TABLE public.basket (
    item_id uuid NOT NULL,
    quantity numeric(14,2) DEFAULT 1 NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_pkey
    PRIMARY KEY (id);

CREATE INDEX basket_item_id_idx
    ON basket USING btree (item_id);
