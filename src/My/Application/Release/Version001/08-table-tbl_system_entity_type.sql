CREATE TABLE public.tbl_system_entity_type (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_entity_type
    ADD CONSTRAINT tbl_system_entity_type_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_system_entity_type
    ADD CONSTRAINT tbl_system_entity_type_code_key
    UNIQUE (code);

CREATE INDEX tbl_system_entity_type_idx_name
    ON tbl_system_entity_type USING btree (name);
