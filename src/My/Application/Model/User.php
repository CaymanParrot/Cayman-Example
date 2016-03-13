<?php
/**
 * File for user model class
 */

namespace My\Application\Model;

/**
 * Class for user model
 *
 */
class User
{
    /**
     * UUID
     * @var string
     */
    public $id;
    
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
    
}
