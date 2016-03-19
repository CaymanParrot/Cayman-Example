CREATE TABLE public.asset (
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY asset
    ADD CONSTRAINT asset_pkey
    PRIMARY KEY (id);
