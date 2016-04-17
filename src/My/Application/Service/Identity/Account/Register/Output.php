<?php
/**
 * File for output for register action of account service
 */

namespace My\Application\Service\Identity\Account\Register;

use My\Application\BaseOutput;
use My\Application\Db\UserRow;
use My\Application\Db\AccountRow;
use My\Application\Db\TokenRow;
use My\Application\Db\EntityUserRoleRow;

/**
 * Class for output for create action of token service
 *
 */
class Output extends BaseOutput
{
    /**
     * User record
     * @var UserRow
     */
    public $user;
    
    /**
     * Account record
     * @var AccountRow
     */
    public $account;
    
    /**
     * Entity user role record
     * @var EntityUserRoleRow
     */
    public $role;
    
    /**
     * Token record
     * @var TokenRow
     */
    public $token;
}
