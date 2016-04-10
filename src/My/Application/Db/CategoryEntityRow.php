<?php
/**
 * File for category entity model class
 */

namespace My\Application\Db;

/**
 * Class for category entity model
 *
 */
class CategoryEntityRow
{
    public $id;// uuid DEFAULT gen_random_uuid() NOT NULL,
    public $category_id;// uuid NOT NULL,
    public $entity_id;// uuid NOT NULL
}
// unique (category_id, entity_id)

/*
ALTER TABLE ONLY tbl_category_entity
    ADD CONSTRAINT tbl_category_entity_fkey_category_id
    FOREIGN KEY (category_id) 
    REFERENCES tbl_category(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_category_entity
    ADD CONSTRAINT tbl_category_entity_fkey_entity_id
    FOREIGN KEY (entity_id) 
    REFERENCES tbl_entity(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/