<?php
/**
 * File for inputs for register action of account service
 */

namespace My\Application\Service\Identity\Account\Register;

/**
 * Class for input for create action of token service
 *
 */
class Input extends \My\Application\BaseInput implements \Cayman\Library\ObjectHydrationMappingInterface
{
    /**
     * Type of token
     * @var string
     */
    public $token;
    
    /**
     * Account data
     * @var InputAccount
     */
    public $account;
    
    /**
     * User data
     * @var InputUser
     */
    public $user;
    
    function getHydrationMapping()
    {
        return [
            'account' => InputAccount::class,
            'user'    => InputUser::class,
        ];
    }
}
