CREATE TABLE public.tbl_user (
    first_name varchar(64) NOT NULL,
    last_name varchar(64) NOT NULL,
    email varchar(128) NOT NULL,
    password varchar(128) NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_user
    ADD CONSTRAINT user_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_user
    ADD CONSTRAINT user_email_key
    UNIQUE (email);

ALTER TABLE ONLY tbl_user
    ADD CONSTRAINT user_code_key
    UNIQUE (code);

CREATE INDEX user_first_name_idx
    ON tbl_user USING btree (first_name);
CREATE INDEX user_last_name_idx
    ON tbl_user USING btree (last_name);
