CREATE TABLE public.tbl_order (
    account_id_buyer uuid,
    account_id_seller uuid,
    value_gross numeric(14,2) DEFAULT 0.0,
    value_discount numeric(14,2) DEFAULT 0.0,
    value_net numeric(14,2) DEFAULT 0.0,
    value_tax numeric(14,2) DEFAULT 0.0,
    value_total numeric(14,2) DEFAULT 0.0,
    currency_id smallint DEFAULT 1 NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_order
    ADD CONSTRAINT tbl_order_pkey
    PRIMARY KEY (id);
