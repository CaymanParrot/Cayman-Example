<?php
/**
 * File for address model class
 */

namespace My\Application\Model;

/**
 * Class for address model
 *
 */
class Address extends Entity
{
    public $address_line1;// varchar(100),
    public $address_line2;// varchar(100),
    public $town;// varchar(100),
    public $city;// varchar(100),
    public $postcode;// varchar(10),
    public $country_id;// smallint DEFAULT 234 NOT NULL -- 234: GB
}

/*
ALTER TABLE ONLY tbl_address
    ADD CONSTRAINT tbl_address_fkey_country
    FOREIGN KEY (country_id)
    REFERENCES tbl_system_country(id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT
;
*/