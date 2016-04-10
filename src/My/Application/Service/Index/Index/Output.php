<?php
/**
 * File for output for search action of user service
 */

namespace My\Application\Service\Index\Index;

use My\Application\Db\UserRow;


/**
 * Class for output for search action of user service
 *
 */
class Output
{
    use \Cayman\Library\ObjectDeHydratorTrait;
    
    /**
     * Users
     * @var UserRow[]
     */
    public $data = [];
    
    public $meta = [];
}
