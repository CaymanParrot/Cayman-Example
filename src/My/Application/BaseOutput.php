<?php
/**
 * File for output for search action of user service
 */

namespace My\Application;

use My\Application\Model\User;

//use Cayman\Application\HttpOutput;


/**
 * Class for output for search action of user service
 *
 */
class BaseOutput
{
    use \Cayman\Library\ObjectDeHydratorTrait;
    
    /**
     * Users
     * @var User[]
     */
    public $data = [];
    
    public $meta = [];
}
