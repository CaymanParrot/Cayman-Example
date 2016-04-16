<?php
/**
 * File for inputs for verify action of account service
 */

namespace My\Application\Service\Identity\Account\Verify;

use My\Application\BaseInput;

/**
 * Class for input for verify action of account service
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
