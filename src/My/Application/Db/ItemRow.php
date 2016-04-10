<?php
/**
 * File for item model class
 */

namespace My\Application\Db;

/**
 * Class for item model
 *
 */
class ItemRow extends EntityRow
{
    //-- account_id_owner is seller
    public $code;// varchar(32) NOT NULL,
    public $manufacturer_code;// varchar(32),
    public $name;// varchar(128) NOT NULL,
    public $short_description;// text,
    public $long_description;// text,
    public $unit;// varchar(10) DEFAULT 'each',
    public $is_integer_unit;// BOOLEAN NOT NULL DEFAULT TRUE
}
// UNIQUE (account_id_owner, code)

/*
ALTER TABLE ONLY tbl_item
    ADD CONSTRAINT tbl_item_fkey_account_id_owner
    FOREIGN KEY (account_id_owner)
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/
