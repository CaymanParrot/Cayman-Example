CREATE TABLE public.item (
    price numeric(11,2) NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY item
    ADD CONSTRAINT item_pkey
    PRIMARY KEY (id);
