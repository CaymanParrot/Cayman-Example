<?php
/**
 * File for item cost model class
 */

namespace My\Application\Db;

/**
 * Class for item cost model
 *
 */
class ItemCostRow extends AbstractRow
{
    public $id;// uuid DEFAULT gen_random_uuid() NOT NULL,
    public $item_id;// uuid NOT NULL,
    public $seller_id;// uuid NOT NULL,
    public $cost;// numeric(14,2) NOT NULL
}
/*

ALTER TABLE ONLY tbl_item_cost
    ADD CONSTRAINT tbl_item_cost_pkey
    PRIMARY KEY (item_id, seller_id);

CREATE INDEX tbl_item_cost_idx_item_id
    ON tbl_item_cost USING btree (item_id);

CREATE INDEX tbl_item_cost_idx_seller_id
    ON tbl_item_cost USING btree (seller_id);

ALTER TABLE ONLY tbl_item_cost
    ADD CONSTRAINT tbl_item_cost_unq_item_seller
    UNIQUE (item_id, seller_id);


ALTER TABLE ONLY tbl_item_cost
    ADD CONSTRAINT tbl_item_cost_fkey_seller_id
    FOREIGN KEY (seller_id) 
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_item_cost
    ADD CONSTRAINT tbl_item_cost_fkey_item_id
    FOREIGN KEY (item_id) 
    REFERENCES tbl_item(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/