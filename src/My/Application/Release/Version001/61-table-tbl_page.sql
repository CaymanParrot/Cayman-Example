CREATE TABLE public.tbl_page (
    name varchar(200),
    code varchar(250),-- to use on URL
    summary text,
    content text
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_page
    ADD CONSTRAINT tbl_page_pkey
    PRIMARY KEY (id);

