<?php
/**
 * File for User service
 */

namespace My\Application\Service\Account;

use My\Application\BaseService;
use My\Application\Model\User as UserModel;

/**
 * Class for User service
 *
 */
class User extends BaseService
{
    /**
     * Search
     * @param Search\Input $input
     * @return Search\Output
     */
    function index(User\Index\Input $input)
    {
        $output = new User\Index\Output();
        
        $output->data[] = new UserModel();
        $output->data[] = new UserModel();
        
        return $output;
    }
    
}
