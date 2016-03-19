CREATE TABLE public.entity (
    id uuid DEFAULT uuid_generate_v4() NOT NULL,
    entity_type_id smallint NOT NULL,
    entity_subtype_id smallint,
    entity_status_id smallint,
    entity_category_id smallint,
    code varchar(32),
    name varchar(128),
    date_created timestamp with time zone DEFAULT now(),
    user_id_owner uuid,
    entity_id_owner uuid,
    company_id_owner uuid,
    short_description text,
    long_description text,
    data jsonb
)
WITH (oids = false);

ALTER TABLE ONLY entity
    ADD CONSTRAINT entity_pkey
    PRIMARY KEY (id);

CREATE INDEX entity_date_created_idx
    ON entity USING btree (date_created);
CREATE INDEX entity_type_id_idx
    ON entity USING btree (entity_type_id);
CREATE INDEX entity_user_id_idx
    ON entity USING btree (user_id_owner);

