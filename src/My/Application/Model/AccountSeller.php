<?php
/**
 * File for seller account model class
 */

namespace My\Application\Model;

/**
 * Class for seller account model
 *
 */
class AccountSeller extends Account
{
    public $currency_id;// smallint DEFAULT 1 NOT NULL,
    public $target_profit_pctg;// numeric(5,2) DEFAULT 20 NOT NULL
}

/*
ALTER TABLE ONLY tbl_account_seller
    ADD CONSTRAINT tbl_account_seller_fkey_currency_id
    FOREIGN KEY (currency_id)
    REFERENCES tbl_system_currency(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
;
*/
