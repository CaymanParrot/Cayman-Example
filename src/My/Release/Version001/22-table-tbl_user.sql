CREATE TABLE public.tbl_user (
    first_name varchar(64) NOT NULL,
    last_name varchar(64) NOT NULL,
    email varchar(128) NOT NULL,
    password varchar(128) NOT NULL
)
INHERITS (tbl_entity)
WITH (oids = false);

ALTER TABLE ONLY tbl_user
    ADD CONSTRAINT tbl_user_pkey
    PRIMARY KEY (id);

ALTER TABLE ONLY tbl_user
    ADD CONSTRAINT tbl_user_unq_email
    UNIQUE (email);

CREATE INDEX tbl_user_idx_first_name
    ON tbl_user USING btree (first_name);

CREATE INDEX tbl_user_idx_last_name
    ON tbl_user USING btree (last_name);
