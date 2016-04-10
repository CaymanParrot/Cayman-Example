<?php
/**
 * File for order item model class
 */

namespace My\Application\Db;

/**
 * Class for order item model
 *
 */
class OrderItemRow extends EntityRow
{
    public $order_id;// uuid NOT NULL,
    public $line_number;// smallint NOT NULL,
    public $item_id;// uuid NOT NULL,
    public $value_quantity;// numeric(14,2) DEFAULT 1 NOT NULL,
    public $value_price;// numeric(14,2) DEFAULT 0.0 NOT NULL,
    public $value_cost;// numeric(14,2) DEFAULT 0.0 NOT NULL,-- at the time of preparation
    public $value_gross;// numeric(14,2) DEFAULT 0.0 NOT NULL, -- quantity x price
    public $value_discount_pctg;// numeric(14,2) DEFAULT 0.0 NOT NULL,-- %
    public $value_discount;// numeric(14,2) DEFAULT 0.0 NOT NULL,-- gross x discount%
    public $value_net;// numeric(14,2) DEFAULT 0.0 NOT NULL, -- gross - discount
    public $value_tax_pctg;// numeric(14,2) DEFAULT 0.0 NOT NULL, -- %
    public $value_tax;// numeric(14,2) DEFAULT 0.0 NOT NULL, -- net x tax%
    public $value_total;// numeric(14,2) DEFAULT 0.0 NOT NULL, -- net + tax
    public $customer_note;// text
}

/*
ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_fkey_order_id
    FOREIGN KEY (order_id) 
    REFERENCES tbl_order(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
ALTER TABLE ONLY tbl_order_item
    ADD CONSTRAINT tbl_order_item_fkey_item_id
    FOREIGN KEY (item_id) 
    REFERENCES tbl_item(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/
