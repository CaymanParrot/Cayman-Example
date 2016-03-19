CREATE TABLE release (
    version VARCHAR(10),
    code VARCHAR(100),
    dt   timestamp with time zone DEFAULT NOW()
)
WITH (oids = false);

ALTER TABLE ONLY audit
    ADD CONSTRAINT audit_pkey
    PRIMARY KEY (version, code);
