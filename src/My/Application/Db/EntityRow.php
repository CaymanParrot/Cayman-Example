<?php
/**
 * File for entity model class
 */

namespace My\Application\Db;

/**
 * Class for entity model
 *
 */
class EntityRow extends AbstractRow
{
    /**
     * ID (UUID)
     * @var string
     */
    public $id;// uuid DEFAULT gen_random_uuid() NOT NULL,
    
    /**
     * Entity type ID
     * @var int
     */
    public $entity_type_id;
    
    /**
     * Entity sub-type ID
     * @var int
     */
    public $entity_subtype_id;
    
    /**
     * Entity status ID
     * @var int
     */
    public $entity_status_id;
    
    /**
     * Date created (timestamp)
     * @var string
     */
    public $date_created;
    
    /**
     * Date updated (timestamp)
     * @var string
     */
    public $date_updated;
    
    /**
     * ID (UUID) of owner user - defaults to myvars_get_user_id()
     * @var string
     */
    public $user_id_owner;
    
    /**
     * ID (UUID) of owner entity
     * @var string
     */
    public $entity_id_owner;
    
    /**
     * ID (UUID) of owner account
     * @var string
     */
    public $account_id_owner;
}


/*
ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_fkey_entity_type
    FOREIGN KEY (entity_type_id) 
    REFERENCES tbl_system_entity_type(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_fkey_entity_subtype
    FOREIGN KEY (entity_subtype_id) 
    REFERENCES tbl_system_entity_subtype(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity
    ADD CONSTRAINT tbl_entity_fkey_entity_status
    FOREIGN KEY (entity_status_id) 
    REFERENCES tbl_system_entity_status(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/