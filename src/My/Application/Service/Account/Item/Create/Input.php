<?php
/**
 * File for inputs for create action of item service
 */

namespace My\Application\Service\Account\Item\Create;

use Cayman\Library\ObjectHydrationMappingInterface;
use My\Application\BaseInputWithToken;

/**
 * Class for input for create action of item service
 *
 */
class Input extends BaseInputWithToken implements ObjectHydrationMappingInterface
{
    /**
     * Item data
     * @var InputItem
     */
    public $item;
    
    function getHydrationMapping()
    {
        return [
            'item' => InputItem::class,
        ];
    }
}
