CREATE TABLE public.tbl_system_country (
    id smallint NOT NULL,
    code varchar(2) NOT NULL,
    name varchar(64) NOT NULL,
    short_description text,
    long_description text
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_country
    ADD CONSTRAINT tbl_system_country_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_system_country
    ADD CONSTRAINT tbl_system_country_unq_code
    UNIQUE (code);

