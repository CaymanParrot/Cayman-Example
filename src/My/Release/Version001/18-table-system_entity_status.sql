CREATE TABLE public.system_entity_status (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    entity_type_id smallint NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY system_entity_status
    ADD CONSTRAINT system_entity_status_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY system_entity_status
    ADD CONSTRAINT system_entity_status_code_key
    UNIQUE (code);
