<?php
/**
 * File for buyer account model class
 */

namespace My\Application\Model;

/**
 * Class for buyer account model
 *
 */
class AccountBuyer extends Account
{
    public $seller_id;// UUID NOT NULL,
    public $balance;// numeric(14,2) NOT NULL DEFAULT 0.0
}

/*
ALTER TABLE ONLY tbl_account_buyer
    ADD CONSTRAINT tbl_account_buyer_fkey_seller_id
    FOREIGN KEY (seller_id)
    REFERENCES tbl_account_seller(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
*/