CREATE TABLE public.tbl_asset (
    name varchar(200),
    url text,
    description text
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_asset
    ADD CONSTRAINT tbl_asset_pkey
    PRIMARY KEY (id);
