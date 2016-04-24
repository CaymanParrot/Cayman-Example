<?php
/**
 * File for Shop service
 */

namespace My\Application\Service\Bazaar;

use My\Application\Db\AccountRow;

/**
 * Class for Shop service
 *
 */
class Shop extends \My\Application\BaseService
{
    /**
     * Index/search
     * @param Shop\Index\Input $input
     * @return Shop\Index\Output
     */
    function index(Shop\Index\Input $input)
    {
        $output = new Shop\Index\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $accounts = $db->AccountTable()->selectRows();
        $output->data = $accounts;
        
        return $output;
    }
    
}
