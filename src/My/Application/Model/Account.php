<?php
/**
 * File for account model class
 */

namespace My\Application\Model;

/**
 * Class for account model
 *
 */
class Account extends Entity
{
    public $is_company;// boolean DEFAULT FALSE NOT NULL,
    public $trade_name;// varchar(128),
    public $legal_name;// varchar(128),
    public $vat_number;// varchar(30),
    public $short_description;// text,
    public $long_description;// text
}
