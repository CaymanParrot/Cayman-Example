CREATE TABLE public.tbl_address (
    address_line1 varchar(100),
    address_line2 varchar(100),
    town varchar(100),
    city varchar(100),
    postcode varchar(10),
    country_id smallint DEFAULT 1 NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_address
    ADD CONSTRAINT tbl_address_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_address_country_id_idx
    ON tbl_address USING btree (country_id);

ALTER TABLE ONLY tbl_address
    ADD CONSTRAINT tbl_address_country_fk
    FOREIGN KEY (country_id) REFERENCES tbl_system_country(id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT
    DEFERRABLE INITIALLY DEFERRED;

ALTER TABLE ONLY tbl_address
    ADD CONSTRAINT tbl_address_entity_fk
    FOREIGN KEY (entity_id_owner) REFERENCES tbl_entity(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
    DEFERRABLE INITIALLY DEFERRED;

