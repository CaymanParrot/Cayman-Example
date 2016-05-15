<?php
/**
 * File for output for index action of category service
 */

namespace My\Application\Service\Account\Category\Index;

use My\Application\Db\CategoryRow;

/**
 * Class for output for index action of category service
 *
 */
class Output extends \My\Application\BaseOutput
{
    /**
     * Category records
     * @var CategoryRow[]
     */
    public $data = [];
}
