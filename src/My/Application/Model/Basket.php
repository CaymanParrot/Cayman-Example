<?php
/**
 * File for basket model class
 */

namespace My\Application\Model;

/**
 * Class for basket model
 *
 */
class Basket extends Entity
{
    public $item_id;// uuid NOT NULL,
    public $quantity;// numeric(14,2) DEFAULT 1 NOT NULL
}

/*
ALTER TABLE ONLY tbl_basket
    ADD CONSTRAINT tbl_basket_fkey_item_id
    FOREIGN KEY (item_id) 
    REFERENCES tbl_item(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/