<?php
/**
 * File for inputs for retrieve action of token service
 */

namespace My\Application\Service\Identity\Token\Retrieve;


/**
 * Class for input for retrieve action of token service
 *
 */
class Input extends \My\Application\BaseInput
{
    /**
     * Email address
     * @var string
     */
    public $email;
    
    /**
     * Type of token
     * @var string
     */
    public $type;
    
    /**
     * Code
     * @var string
     */
    public $code;
}
