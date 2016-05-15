<?php
/**
 * File for inputs for search action of users service
 */

namespace My\Application;


/**
 * Class for input for search action of users service
 *
 */
class BaseInputWithToken extends \Cayman\ServiceInput
{
    /**
     * Identity token
     * @var string
     */
    public $token;
}
