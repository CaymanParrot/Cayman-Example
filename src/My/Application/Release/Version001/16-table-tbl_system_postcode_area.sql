CREATE TABLE public.tbl_system_postcode_area (
    id smallint NOT NULL,
    code varchar(10) NOT NULL,
    name varchar(64) NOT NULL,
    short_description text,
    long_description text,
    country_id smallint NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_postcode_area
    ADD CONSTRAINT tbl_system_postcode_area_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_system_postcode_area
    ADD CONSTRAINT tbl_system_postcode_area_unq_country_id_code
    UNIQUE (country_id, code);

CREATE INDEX tbl_system_postcode_area_idx_country_id
    ON tbl_system_postcode_area USING btree (country_id);

ALTER TABLE ONLY tbl_system_postcode_area
    ADD CONSTRAINT tbl_system_postcode_area_fkey_country
    FOREIGN KEY (country_id)
    REFERENCES tbl_system_country(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;

