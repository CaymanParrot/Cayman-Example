CREATE TABLE public.tbl_entity (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    entity_type_code VARCHAR(32) NOT NULL,
    entity_subtype_code VARCHAR(32) NOT NULL,
    entity_status_code VARCHAR(32) NOT NULL,
    -- entity_category_id smallint,
    -- code varchar(32),
    -- name varchar(128),
    date_created timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    date_updated timestamp with time zone DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id_owner uuid,
    entity_id_owner uuid,
    account_id_owner uuid -- ,
    -- short_description text,
    -- long_description text,
    -- data jsonb
)
WITH (oids = false);

ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_pkey
    PRIMARY KEY (id);

CREATE INDEX tbl_entity_date_created_idx
    ON tbl_entity USING btree (date_created);
CREATE INDEX tbl_entity_type_id_idx
    ON tbl_entity USING btree (entity_type_id);
CREATE INDEX tbl_entity_user_id_idx
    ON tbl_entity USING btree (user_id_owner);

