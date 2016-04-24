CREATE TABLE public.tbl_category_entity (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    category_id uuid NOT NULL,
    entity_id uuid NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY tbl_category_entity
    ADD CONSTRAINT tbl_category_entity_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_category_entity_idx_category_id
    ON tbl_category_entity USING btree (category_id);

CREATE INDEX tbl_category_entity_idx_entity_id
    ON tbl_category_entity USING btree (entity_id);

ALTER TABLE ONLY tbl_category_entity
    ADD CONSTRAINT tbl_category_entity_unq_category_entity
    UNIQUE (category_id, entity_id);

ALTER TABLE ONLY tbl_category_entity
    ADD CONSTRAINT tbl_category_entity_fkey_category_id
    FOREIGN KEY (category_id) 
    REFERENCES tbl_category(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
-- ISSUE about table inheritance and foreign keys
-- http://www.postgresql.org/docs/9.5/static/ddl-inherit.html
-- http://stackoverflow.com/questions/24360312/foreign-keys-table-inheritance-in-postgresql
/*
ALTER TABLE ONLY tbl_category_entity
    ADD CONSTRAINT tbl_category_entity_fkey_entity_id
    FOREIGN KEY (entity_id) 
    REFERENCES tbl_entity(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/