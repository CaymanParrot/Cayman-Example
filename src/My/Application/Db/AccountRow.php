<?php
/**
 * File for account model class
 */

namespace My\Application\Db;

/**
 * Class for account model
 *
 */
class AccountRow extends EntityRow
{
    public $is_company;// boolean DEFAULT FALSE NOT NULL,
    public $is_buyer;// boolean DEFAULT FALSE NOT NULL,
    public $is_seller;// boolean DEFAULT FALSE NOT NULL,
    public $trade_name;// varchar(128),
    public $legal_name;// varchar(128),
    public $vat_number;// varchar(30),
    public $short_description;// text,
    public $long_description;// text
    public $currency_id;// smallint DEFAULT 1 NOT NULL,
    public $target_profit_pctg;// numeric(5,2)
	public $url;//varchar(128)
}
