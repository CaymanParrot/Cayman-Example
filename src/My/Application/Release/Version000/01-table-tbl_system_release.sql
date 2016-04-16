CREATE TABLE public.tbl_system_release (
    version VARCHAR(16),
    code VARCHAR(64),
    dt   timestamp with time zone DEFAULT CURRENT_TIMESTAMP
)
WITH (oids = false);

ALTER TABLE ONLY tbl_system_release
    ADD CONSTRAINT tbl_system_release_pkey
    PRIMARY KEY (version, code);
