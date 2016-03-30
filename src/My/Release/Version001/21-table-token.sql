CREATE TABLE public.tbl_token (
    id uuid DEFAULT gen_random_uuid() NOT NULL,
    email varchar(128) NOT NULL,
    code varchar(200) NOT NULL,
    expiry_date timestamp with time zone NOT NULL
)
WITH (oids = false);

ALTER TABLE ONLY tbl_token
    ADD CONSTRAINT token_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_token
    ADD CONSTRAINT token_code_key
    UNIQUE (code);
