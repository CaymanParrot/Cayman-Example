CREATE TABLE public.tbl_item (
    -- account_id_owner is seller
    code varchar(32) NOT NULL,
    manufacturer_code varchar(32),
    name varchar(128) NOT NULL,
    short_description text,
    long_description text,
    unit varchar(10) DEFAULT 'each',
    is_integer_unit BOOLEAN NOT NULL DEFAULT TRUE
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_item
    ADD CONSTRAINT tbl_item_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_item
    ADD CONSTRAINT tbl_item_unq_account_id_code
    UNIQUE (account_id_owner, code);

CREATE INDEX tbl_item_idx_manufacturer_code
    ON tbl_item USING btree (manufacturer_code);

CREATE INDEX tbl_item_idx_name
    ON tbl_item USING btree (name);

CREATE INDEX tbl_item_idx_short_description
    ON tbl_item USING btree (short_description);

CREATE INDEX tbl_item_idx_long_description
    ON tbl_item USING btree (long_description);

CREATE INDEX tbl_item_idx_account_id_owner
    ON tbl_item USING btree (account_id_owner);

ALTER TABLE ONLY tbl_item
    ADD CONSTRAINT tbl_item_fkey_account_id_owner
    FOREIGN KEY (account_id_owner)
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
