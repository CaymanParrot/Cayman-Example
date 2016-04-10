<?php
/**
 * File for inputs for register action of account service
 */

namespace My\Application\Service\Identity\Account\Register;

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
    public $token;
}
