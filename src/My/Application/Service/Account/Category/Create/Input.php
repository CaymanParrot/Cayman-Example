<?php
/**
 * File for inputs for create action of category service
 */

namespace My\Application\Service\Account\Category\Create;

use Cayman\Library\ObjectHydrationMappingInterface;
use My\Application\BaseInputWithToken;

/**
 * Class for input for create action of category service
 *
 */
class Input extends BaseInputWithToken implements ObjectHydrationMappingInterface
{
    /**
     * Category data
     * @var InputCategory
     */
    public $category;
    
    function getHydrationMapping()
    {
        return [
            'category' => InputCategory::class,
        ];
    }
}
