<?php
/**
 * File for Identity Account service
 */

namespace My\Application\Service\Identity;

use My\Application\BaseService;
use My\Application\Db\AccountRow;

/**
 * Class for Identity Account service
 *
 */
class Account extends BaseService
{
    /**
     * Search
     * @param Search\Input $input
     * @return Search\Output
     */
    function register(Account\Register\Input $input)
    {
        $output = new Account\Register\Output();
        
        $output->data[] = new AccountRow();
        
        return $output;
    }
    
}
