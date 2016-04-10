<?php
/**
 * File for category model class
 */

namespace My\Application\Db;

/**
 * Class for category model
 *
 */
class Category extends Entity
{
    // account_id_owner is seller
    public $code;// varchar(32) NOT NULL,
    public $name;// varchar(128) NOT NULL,
    public $short_description;// text,
    public $long_description;// text,
    public $parent_category_id;// uuid
}

/*
ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_fkey_entity_type
    FOREIGN KEY (entity_type_id)
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_fkey_account_id_owner
    FOREIGN KEY (account_id_owner)
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_category
    ADD CONSTRAINT tbl_category_fkey_parent
    FOREIGN KEY (parent_category_id)
    REFERENCES tbl_category(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/