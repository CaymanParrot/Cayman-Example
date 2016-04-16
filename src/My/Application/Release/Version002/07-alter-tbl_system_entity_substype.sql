--  we need to add foreign key

CREATE INDEX tbl_system_entity_subtype_idx_default_status_id
    ON tbl_system_entity_subtype USING btree (default_status_id);

ALTER TABLE ONLY tbl_system_entity_subtype
    ADD CONSTRAINT tbl_system_entity_subtype_fkey_default_status_id
    FOREIGN KEY (default_status_id) 
    REFERENCES tbl_system_entity_status(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;