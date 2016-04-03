<?php
/**
 * File for order model class
 */

namespace My\Application\Model;

/**
 * Class for order model
 *
 */
class Order extends Entity
{
    public $account_id_buyer;// uuid,
    public $account_id_seller;// uuid,
    public $value_gross;// numeric(14,2) DEFAULT 0.0,
    public $value_discount;// numeric(14,2) DEFAULT 0.0,
    public $value_net;// numeric(14,2) DEFAULT 0.0,
    public $value_tax;// numeric(14,2) DEFAULT 0.0,
    public $value_total;// numeric(14,2) DEFAULT 0.0,
    public $currency_id;// smallint DEFAULT 1 NOT NULL
    public $buyer_reference;// varchar(20),
    public $seller_reference;// varchar(20),
    public $due_date;// timestamp with time zone
}

/*
ALTER TABLE ONLY tbl_order
    ADD CONSTRAINT tbl_order_fkey_buyer
    FOREIGN KEY (account_id_buyer) 
    REFERENCES tbl_account_buyer(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;

ALTER TABLE ONLY tbl_order
    ADD CONSTRAINT tbl_order_fkey_seller
    FOREIGN KEY (account_id_seller) 
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/