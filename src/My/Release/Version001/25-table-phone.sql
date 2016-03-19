CREATE TABLE public.phone (
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY phone
    ADD CONSTRAINT phone_pkey
    PRIMARY KEY (id);
