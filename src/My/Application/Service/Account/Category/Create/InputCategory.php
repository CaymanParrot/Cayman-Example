<?php
/**
 * File for category input class
 */

namespace My\Application\Service\Account\Category\Create;

/**
 * Class for category input
 *
 */
class InputCategory
{
    /**
     * Entity subtype e.g. 'item-category'
     * @var string
     */
    public $entity_subtype_code;
    
    /**
     * Code (max 32)
     * @var string
     */
    public $code;
    
    /**
     * Name (max 128)
     * @var string
     */
    public $name;
    
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
     * Code of parent category
     * @var string
     */
    public $parent_category_code;
}
