<?php
/**
 * File for output for search action of user service
 */

namespace My\Application;

//use My\Application\Db\UserRow;

//use Cayman\Application\HttpOutput;


/**
 * Class for output for search action of user service
 *
 */
class BaseOutput extends \Cayman\ServiceOutput
{
    
    /**
     * Data array
     * @var array
     */
    public $data = [];
    
    /**
     * Meta, additional info
     * @var array
     */
    public $meta = [];
}
