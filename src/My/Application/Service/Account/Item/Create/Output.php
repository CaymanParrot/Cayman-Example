<?php
/**
 * File for output for create action of item service
 */

namespace My\Application\Service\Account\Item\Create;

use My\Application\Db\CategoryRow;
use My\Application\Db\CategoryEntityRow;

/**
 * Class for output for create action of item service
 *
 */
class Output extends \My\Application\BaseOutput
{
    /**
     * New category record
     * @var CategoryRow
     */
    public $category;
    
    /**
     * New category entity record
     * @var CategoryEntityRow
     */
    public $category_entity;
}
