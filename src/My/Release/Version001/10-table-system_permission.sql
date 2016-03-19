CREATE TABLE public.system_permission (
    id serial NOT NULL,
    user_role_id smallint NOT NULL,
    entity_type_id_context smallint NOT NULL,
    entity_type_id smallint NOT NULL,
    "create" boolean DEFAULT false NOT NULL,
    retrieve boolean DEFAULT false NOT NULL,
    update boolean DEFAULT false NOT NULL,
    delete boolean DEFAULT false NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY system_permission
    ADD CONSTRAINT system_permission_pkey
    PRIMARY KEY (id);
