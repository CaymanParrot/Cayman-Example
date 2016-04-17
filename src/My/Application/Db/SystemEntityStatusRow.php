<?php
/**
 * File for system entity status model class
 */

namespace My\Application\Db;

/**
 * Class for system entity status model
 *
 */
class SystemEntityStatusRow extends AbstractRow
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(32) NOT NULL,
    public $name;// varchar(128) NOT NULL,
    public $short_description;// text,
    public $long_description;// text,
    public $entity_type_id;// smallint NOT NULL,
    public $next_status_ids;// jsonb,
    public $action_label;// varchar(64)
}

/*
ALTER TABLE ONLY tbl_system_entity_status
    ADD CONSTRAINT tbl_system_entity_status_fkey_entity_type
    FOREIGN KEY (entity_type_id)
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/