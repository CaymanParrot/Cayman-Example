<?php

/**
 * File for user data class
 */

namespace My\Application\Service\Identity\Account\Register;

/**
 * Class for user data
 */
class InputUser
{
    /**
     * Type
     * @var string
     */
    public $type = 'company-user';
    
    /**
     * First name
     * @var string
     */
    public $first_name;
    
    /**
     * Last name
     * @var string
     */
    public $last_name;
    
    /**
     * Email
     * @var string
     */
    public $email;
    
    /**
     * Password
     * @var string
     */
    public $password;
    
    /**
     * Confirm password
     * @var string
     */
    public $confirm_password;
}
