CREATE TABLE public.company (
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    currency_id smallint DEFAULT 1 NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY company
    ADD CONSTRAINT company_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY company
    ADD CONSTRAINT company_code_key
    UNIQUE (code);
