<?php
/**
 * File for user model class
 */

namespace My\Application\Model;

/**
 * Class for user model
 *
 */
class User extends Entity
{
    
    /**
     * First name
     * @var string varchar(64)
     */
    public $first_name;
    
    /**
     * Last name
     * @var string varchar(64)
     */
    public $last_name;
    
    /**
     * Email
     * @var string varchar(128)
     */
    public $email;
    
    /**
     * Password
     * @var string varchar(128)
     */
    public $password;
    
}
