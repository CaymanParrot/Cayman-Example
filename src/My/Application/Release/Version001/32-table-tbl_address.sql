CREATE TABLE public.tbl_address (
    address_line1 varchar(100),
    address_line2 varchar(100),
    town varchar(100),
    city varchar(100),
    postcode varchar(10),
    country_id smallint DEFAULT 234 NOT NULL -- 234: GB
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_address
    ADD CONSTRAINT tbl_address_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_address_idx_address_line1
    ON tbl_address USING btree (address_line1);

CREATE INDEX tbl_address_idx_address_line2
    ON tbl_address USING btree (address_line2);

CREATE INDEX tbl_address_idx_town
    ON tbl_address USING btree (town);

CREATE INDEX tbl_address_idx_city
    ON tbl_address USING btree (city);

CREATE INDEX tbl_address_idx_country_id
    ON tbl_address USING btree (country_id);

ALTER TABLE ONLY tbl_address
    ADD CONSTRAINT tbl_address_fkey_country
    FOREIGN KEY (country_id)
    REFERENCES tbl_system_country(id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT
;
