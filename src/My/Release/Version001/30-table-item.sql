CREATE TABLE public.tbl_item (
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    selling_price numeric(14,2),
    cost_price numeric(14,2),
    unit varchar(10) DEFAULT 'each',
    is_integer_unit BOOLEAN NOT NULL DEFAULT TRUE
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_item
    ADD CONSTRAINT tbl_item_pkey
    PRIMARY KEY (id);
