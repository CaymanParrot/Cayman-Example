CREATE TABLE public.tbl_entity_user_role (
    entity_id uuid NOT NULL,
    user_id uuid NOT NULL,
    role_id smallint NOT NULL
)
WITH (oids = false);

CREATE INDEX entity_user_role_entity_id_idx
    ON entity_user_role USING btree (entity_id);
CREATE INDEX entity_user_role_user_id_idx
    ON entity_user_role USING btree (user_id);
CREATE INDEX entity_user_role_role_id_idx
    ON entity_user_role USING btree (role_id);

ALTER TABLE ONLY entity_user_role
    ADD CONSTRAINT entity_user_role_pkey
    PRIMARY KEY (entity_id, user_id, role_id);

