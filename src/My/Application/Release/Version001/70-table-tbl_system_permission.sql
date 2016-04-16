-- WIP
CREATE TABLE public.tbl_system_permission (
    id serial NOT NULL,
    role_id smallint NOT NULL,
    entity_type_id_context smallint NOT NULL,
    entity_type_id smallint NOT NULL,
    "create" boolean DEFAULT false NOT NULL,
    retrieve boolean DEFAULT false NOT NULL,
    update boolean DEFAULT false NOT NULL,
    delete boolean DEFAULT false NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_permission
    ADD CONSTRAINT tbl_system_permission_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_system_permission_role_idx
    ON tbl_system_role USING btree (name);
