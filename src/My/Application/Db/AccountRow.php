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
    /**
     * Is company?
     * @var bool
     */
    public $is_company;
    
    /**
     * Is buyer?
     * @var bool
     */
    public $is_buyer;
    
    /**
     * Is seller?
     * @var bool
     */
    public $is_seller;
    
    /**
     * Trade name
     * SQL: max 128 char.s
     * @var string
     */
    public $trade_name;
    
    /**
     * Legal name
     * SQL: max 128 char.s
     * @var string
     */
    public $legal_name;
    
    /**
     * VAT number
     * SQL: max 30 char.s
     * @var string
     */
    public $vat_number;
    
    /**
     * Short description
     * SQL: text
     * @var string
     */
    public $short_description;
    
    /**
     * Long description
     * SQL: text
     * @var string
     */
    public $long_description;
    
    /**
     * Currency ID
     * @var int
     */
    public $currency_id;
    
    /**
     * Target profit percentage
     * SQL: numeric(5,2)
     * @var float
     */
    public $target_profit_pctg;
    
    /**
     * URL
     * e.g. 'http://united-meat.caymanparrot.com'
     * SQL: max 128 char.s
     * @var string
     */
	public $url;
}
