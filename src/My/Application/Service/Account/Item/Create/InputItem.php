<?php
/**
 * File for item input class
 */

namespace My\Application\Service\Account\Item\Create;

/**
 * Class for item input
 *
 */
class InputItem
{
    /**
     * Entity subtype e.g. 'stock-item'
     * @var string
     */
    public $entity_subtype_code;
    
    /**
     * Code (max 32)
     * @var string
     */
    public $code;
    
    /**
     * Manufacturer code (max 32)
     * @var string
     */
    public $manufacturer_code;
    
    /**
     * Name (max 128)
     * @var string
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
    
    /**
     * Unit
     * @var string
     */
    public $unit;
    
    /**
     * Whether we can use only integers for unit or not
     * @var bool
     */
    public $is_integer_unit;
    
    /**
     * Category code
     * @var string
     */
    public $category_code;
}
