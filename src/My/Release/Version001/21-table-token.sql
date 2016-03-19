CREATE TABLE public.token (
    hash varchar(200) NOT NULL,
    expiry_date timestamp with time zone NOT NULL
)
INHERITS (entity)
WITH (oids = false);

ALTER TABLE ONLY token
    ADD CONSTRAINT token_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY token
    ADD CONSTRAINT token_hash_key
    UNIQUE (hash);
