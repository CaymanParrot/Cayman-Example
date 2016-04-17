<?php
/**
 * File for inputs for create action of token service
 */

namespace My\Application\Service\Identity\Token\Create;


/**
 * Class for input for create action of token service
 *
 */
class Input extends \My\Application\BaseInput
{
    /**
     * Type of token: 'email-token' or 'auth-token'
     * @var string
     */
    public $type;
    
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
