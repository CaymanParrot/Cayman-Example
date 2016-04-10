<?php
/**
 * File for inputs for create action of token service
 */

namespace My\Application\Service\Identity\Token\Create;

use My\Application\BaseInput;

/**
 * Class for input for create action of token service
 *
 */
class Input extends BaseInput
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
    public $type = 'email-token';
}
