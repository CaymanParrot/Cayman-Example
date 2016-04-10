<?php
/**
 * File for system postcode area model class
 */

namespace My\Application\Db;

/**
 * Class for system postcode area model
 *
 */
class SystemPostcodeAreaRow
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(10) NOT NULL,
    public $name;// varchar(64) NOT NULL,
    public $short_description;// text,
    public $long_description;// text,
    public $country_id;// smallint NOT NULL
}

/*
ALTER TABLE ONLY tbl_system_postcode_area
    ADD CONSTRAINT tbl_system_postcode_area_fkey_country
    FOREIGN KEY (country_id)
    REFERENCES tbl_system_country(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/
