<?php
/**
 * File for category model class
 */

namespace My\Application\Db;

/**
 * Class for category model
 *
 */
class CategoryRow extends EntityRow
{
    // account_id_owner is seller
    
    /**
     * Code (max 32)
     * @var string
     */
    public $code;
    
    /**
     * Name (max 128)
     * @var string
     */
    public $name;
    
    /**
     * Short description
     * SQL: text
     * @var string
     */
    public $short_description;
    
    /**
     * Long description
     * SQL: text
     * @var string
     */
    public $long_description;
    
    /**
     * UUID of parent category
     * SQL: UUID
     * @var string
     */
    public $parent_category_id;
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