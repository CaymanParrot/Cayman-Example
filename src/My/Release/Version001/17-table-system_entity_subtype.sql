CREATE TABLE public.system_entity_subtype (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text
)
WITH (oids = false);

ALTER TABLE ONLY system_entity_subtype
    ADD CONSTRAINT system_entity_subtype_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY system_entity_subtype
    ADD CONSTRAINT system_entity_subtype_code_key
    UNIQUE (code);
