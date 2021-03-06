CREATE TABLE public.tbl_system_entity_status (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    entity_type_id smallint NOT NULL,
    next_status_ids jsonb,
    action_label varchar(64)
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_entity_status
    ADD CONSTRAINT tbl_system_entity_status_pkey
    PRIMARY KEY (id);


CREATE INDEX tbl_system_entity_status_idx_entity_type_id_code
    ON tbl_system_entity_status USING btree (entity_type_id, code);

CREATE INDEX tbl_system_entity_status_idx_name
    ON tbl_system_entity_status USING btree (name);

CREATE INDEX tbl_system_entity_status_idx_type
    ON tbl_system_entity_status USING btree (entity_type_id);

ALTER TABLE ONLY tbl_system_entity_status
    ADD CONSTRAINT tbl_system_entity_status_fkey_entity_type
    FOREIGN KEY (entity_type_id)
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
