CREATE TABLE public.tbl_system_user_role (
    id smallint NOT NULL,
    code varchar(32) NOT NULL,
    name varchar(64) NOT NULL,
    short_description text,
    long_description text
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_user_role
    ADD CONSTRAINT tbl_system_user_role_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_system_user_role
    ADD CONSTRAINT tbl_system_user_role_code_key
    UNIQUE (code);
