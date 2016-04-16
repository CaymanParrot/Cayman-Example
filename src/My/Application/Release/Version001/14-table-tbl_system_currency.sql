CREATE TABLE public.tbl_system_currency (
    id smallint NOT NULL,
    code varchar(3) NOT NULL,
    name varchar(64) NOT NULL,
    short_description text,
    long_description text,
    symbol varchar(5),
    symbol_html varchar(10)
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_currency
    ADD CONSTRAINT tbl_system_currency_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_system_currency
    ADD CONSTRAINT tbl_system_currency_unq_code
    UNIQUE (code);
