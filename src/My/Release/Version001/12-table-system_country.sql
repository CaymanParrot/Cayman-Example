CREATE TABLE public.system_country (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text
)
WITH (oids = false);

ALTER TABLE ONLY system_country
    ADD CONSTRAINT system_country_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY system_country
    ADD CONSTRAINT system_country_code_key
    UNIQUE (code);

