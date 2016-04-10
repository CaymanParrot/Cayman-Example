<?php
/**
 * File for system entity subtype model class
 */

namespace My\Application\Db;

/**
 * Class for system entity subtype model
 *
 */
class SystemEntitySubtypeRow
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(32) NOT NULL,
    public $name;// varchar(128) NOT NULL,
    public $short_description;// text,
    public $long_description;// text,
    public $entity_type_id;// smallint NOT NULL,
    public $default_status_id;// smallint
}

/*
ALTER TABLE ONLY tbl_system_entity_subtype
    ADD CONSTRAINT tbl_system_entity_subtype_fkey_entity_type
    FOREIGN KEY (entity_type_id) 
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/