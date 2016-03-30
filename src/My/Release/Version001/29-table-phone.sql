CREATE TABLE public.tbl_phone (
    label  varchar(16) NOT NULL,
    number varchar(16) NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_phone
    ADD CONSTRAINT tbl_phone_pkey
    PRIMARY KEY (id);
