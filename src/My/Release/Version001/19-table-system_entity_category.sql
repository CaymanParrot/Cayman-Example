CREATE TABLE public.system_entity_category (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    entity_type_id smallint NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY system_entity_category
    ADD CONSTRAINT system_entity_category_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY system_entity_category
    ADD CONSTRAINT system_entity_category_code_key
    UNIQUE (code);
