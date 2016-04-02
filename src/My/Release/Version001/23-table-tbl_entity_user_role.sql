CREATE TABLE public.tbl_entity_user_role (
    entity_id uuid NOT NULL,
    user_id uuid NOT NULL,
    user_role_id smallint NOT NULL,
    date_created timestamp with time zone DEFAULT CURRENT_TIMESTAMP
)
WITH (oids = false);

CREATE INDEX tbl_entity_user_role_idx_entity_id
    ON tbl_entity_user_role USING btree (entity_id);

CREATE INDEX tbl_entity_user_role_idx_user_id
    ON tbl_entity_user_role USING btree (user_id);

CREATE INDEX tbl_entity_user_role_idx_role_id
    ON tbl_entity_user_role USING btree (user_role_id);

ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_pkey
    PRIMARY KEY (entity_id, user_id, user_role_id);

ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_fkey_entity
    FOREIGN KEY (entity_id) 
    REFERENCES tbl_entity(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_fkey_user
    FOREIGN KEY (user_id) 
    REFERENCES tbl_user(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_fkey_user_role
    FOREIGN KEY (user_role_id) 
    REFERENCES tbl_system_user_role(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;