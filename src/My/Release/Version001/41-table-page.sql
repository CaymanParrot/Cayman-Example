CREATE TABLE public.page (
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY page
    ADD CONSTRAINT page_pkey
    PRIMARY KEY (id);

