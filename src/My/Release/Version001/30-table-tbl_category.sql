CREATE TABLE public.tbl_category (
    -- account_id_owner is seller
    code varchar(32) NOT NULL,
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    parent_category_id uuid
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_unq_account_id_code
    UNIQUE (account_id_owner, code);

CREATE INDEX tbl_category_idx_name
    ON tbl_category USING btree (name);

CREATE INDEX tbl_category_idx_parent_category_id
    ON tbl_category USING btree (parent_category_id);

CREATE INDEX tbl_category_idx_type
    ON tbl_category USING btree (entity_type_id);

ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_fkey_entity_type
    FOREIGN KEY (entity_type_id)
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;

CREATE INDEX tbl_category_idx_account_id_owner
    ON tbl_category USING btree (account_id_owner);

ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_fkey_account_id_owner
    FOREIGN KEY (account_id_owner)
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_fkey_parent
    FOREIGN KEY (parent_category_id)
    REFERENCES tbl_category(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
