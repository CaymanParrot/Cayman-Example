CREATE TABLE public."order" (
    company_id_buyer uuid,
    company_id_seller uuid,
    total_amount numeric(14,2) DEFAULT 0 NOT NULL,
    currency_id smallint DEFAULT 1 NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY "order"
    ADD CONSTRAINT order_pkey
    PRIMARY KEY (id);
