<?php
/**
 * File for output for search action of user service
 */

namespace My\Application\Service\Account\User\Search;

use My\Application\Model\User;
use My\Application\BaseOutput;


/**
 * Class for output for search action of user service
 *
 */
class Output //extends BaseOutput
{
    use \Cayman\Library\ObjectDeHydratorTrait;
    
    /**
     * Users
     * @var User[]
     */
    public $data = [];
}
