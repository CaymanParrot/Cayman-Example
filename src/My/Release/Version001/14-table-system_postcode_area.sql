CREATE TABLE public.system_postcode_area (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    country_id smallint NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY system_postcode_area
    ADD CONSTRAINT system_postcode_area_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY system_postcode_area
    ADD CONSTRAINT system_postcode_area_code_key
    UNIQUE (code);

CREATE INDEX system_postcode_area_country_id_idx
    ON system_postcode_area USING btree (country_id);
CREATE UNIQUE INDEX system_postcode_area_country_code_unq
    ON system_postcode_area USING btree (country_id, code);
