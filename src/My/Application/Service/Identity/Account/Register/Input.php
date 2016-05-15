<?php
/**
 * File for inputs for register action of account service
 */

namespace My\Application\Service\Identity\Account\Register;

use Cayman\Library\ObjectHydrationMappingInterface;
use My\Application\BaseInput;

/**
 * Class for input for create action of token service
 *
 */
class Input extends BaseInput implements ObjectHydrationMappingInterface
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
