<?php

/**
 * File for account data class
 */

namespace My\Application\Service\Identity\Account\Register;

/**
 * Class for account data
 */
class InputAccount
{
    /**
     * Type
     * @var string
     */
    public $type = 'retailer-account';
    
    /**
     * Legal name
     * @var string
     */
    public $legal_name;
    
    /**
     * Trade name
     * @var string
     */
    public $trade_name;
    
}
