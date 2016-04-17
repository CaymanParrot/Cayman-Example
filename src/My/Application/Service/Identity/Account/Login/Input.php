<?php
/**
 * File for inputs for login action of account service
 */

namespace My\Application\Service\Identity\Account\Login;


/**
 * Class for input for login action of account service
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
     * Password, if type is 'auth-token'
     * @var string
     */
    public $password;
}
