CREATE TABLE public.system_currency (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    symbol varchar(5),
    symbol_html varchar(10)
)
WITH (oids = false);

ALTER TABLE ONLY system_currency
    ADD CONSTRAINT system_currency_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY system_currency
    ADD CONSTRAINT system_currency_code_key
    UNIQUE (code);
