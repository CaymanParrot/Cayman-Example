<?php
/**
 * File for base output class of services
 */

namespace My\Application;

/**
 * Class for base output of services
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
    
    /**
     * Error messages
     * @var array
     */
    public $errors = [];
}
