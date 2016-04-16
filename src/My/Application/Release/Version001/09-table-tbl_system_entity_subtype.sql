CREATE TABLE public.tbl_system_entity_subtype (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    entity_type_id smallint NOT NULL,
    default_status_id smallint
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_entity_subtype
    ADD CONSTRAINT tbl_system_entity_subtype_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_system_entity_subtype
    ADD CONSTRAINT tbl_system_entity_subtype_code_key
    UNIQUE (code);

CREATE INDEX tbl_system_entity_subtype_idx_name
    ON tbl_system_entity_subtype USING btree (name);

CREATE INDEX tbl_system_entity_subtype_idx_type
    ON tbl_system_entity_subtype USING btree (entity_type_id);

ALTER TABLE ONLY tbl_system_entity_subtype
    ADD CONSTRAINT tbl_system_entity_subtype_fkey_entity_type
    FOREIGN KEY (entity_type_id) 
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
