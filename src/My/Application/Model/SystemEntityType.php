<?php
/**
 * File for system entity type class
 */

namespace My\Application\Model;

/**
 * Class for system entity type model
 *
 */
class SystemEntityType
{
    /**
     * ID
     * @var int
     */
    public $id;
    
    /**
     * Code
     * @var string varchar(32)
     */
    public $code;
    
    /**
     * Name
     * @var string varchar(128)
     */
    public $name;
    
    /**
     * Short description
     * @var string
     */
    public $short_description;
    
    /**
     * Long description
     * @var string
     */
    public $long_description;
}
