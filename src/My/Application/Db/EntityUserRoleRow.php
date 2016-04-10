<?php
/**
 * File for entity user role model class
 */

namespace My\Application\Db;

/**
 * Class for entity user role model
 *
 */
class EntityUserRoleRow
{
    public $entity_id;// uuid NOT NULL,
    public $user_id;// uuid NOT NULL,
    public $user_role_id;// smallint NOT NULL,
    public $date_created;// timestamp with time zone DEFAULT CURRENT_TIMESTAMP
}
//PRIMARY KEY (entity_id, user_id, user_role_id)

/*
ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_fkey_entity
    FOREIGN KEY (entity_id) 
    REFERENCES tbl_entity(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_fkey_user
    FOREIGN KEY (user_id) 
    REFERENCES tbl_user(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_entity_user_role
    ADD CONSTRAINT tbl_entity_user_role_fkey_user_role
    FOREIGN KEY (user_role_id) 
    REFERENCES tbl_system_user_role(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/