CREATE TABLE public.address (
    address_line1 varchar(100),
    address_line2 varchar(100),
    town varchar(100),
    city varchar(100),
    postcode varchar(10),
    country_id smallint DEFAULT 1 NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY address
    ADD CONSTRAINT address_pkey
    PRIMARY KEY (id);

CREATE INDEX address_country_id_idx
    ON address USING btree (country_id);

ALTER TABLE ONLY address
    ADD CONSTRAINT address_country_fk
    FOREIGN KEY (country_id) REFERENCES system_country(id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT
    DEFERRABLE INITIALLY DEFERRED;

ALTER TABLE ONLY address
    ADD CONSTRAINT address_entity_fk
    FOREIGN KEY (entity_id_owner) REFERENCES entity(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
    DEFERRABLE INITIALLY DEFERRED;

