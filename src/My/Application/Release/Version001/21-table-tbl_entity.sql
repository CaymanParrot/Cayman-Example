CREATE TABLE public.tbl_entity (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    entity_type_id smallint NOT NULL,
    entity_subtype_id smallint NOT NULL,
    entity_status_id smallint NOT NULL,
    date_created TIMESTAMP(0) WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    date_updated TIMESTAMP(0) WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    user_id_owner uuid DEFAULT myvars_get_user_id(),
    entity_id_owner uuid,
    account_id_owner uuid
)
WITH (oids = false);

ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_entity_idx_date_created
    ON tbl_entity USING btree (date_created);

CREATE INDEX tbl_entity_idx_date_updated
    ON tbl_entity USING btree (date_updated);

CREATE INDEX tbl_entity_idx_type_id
    ON tbl_entity USING btree (entity_type_id);

CREATE INDEX tbl_entity_idx_subtype_id
    ON tbl_entity USING btree (entity_subtype_id);

CREATE INDEX tbl_entity_idx_status_id
    ON tbl_entity USING btree (entity_status_id);

CREATE INDEX tbl_entity_idx_user_id_owner
    ON tbl_entity USING btree (user_id_owner);

CREATE INDEX tbl_entity_idx_entity_id_owner
    ON tbl_entity USING btree (entity_id_owner);

CREATE INDEX tbl_entity_idx_account_id_owner
    ON tbl_entity USING btree (account_id_owner);

ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_fkey_entity_type
    FOREIGN KEY (entity_type_id) 
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_fkey_entity_subtype
    FOREIGN KEY (entity_subtype_id) 
    REFERENCES tbl_system_entity_subtype(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_fkey_entity_status
    FOREIGN KEY (entity_status_id) 
    REFERENCES tbl_system_entity_status(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
