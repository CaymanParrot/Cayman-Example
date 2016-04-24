<?php
/**
 * File for Shop service
 */

namespace My\Application\Service\Bazaar;

use My\Application\BaseService;
use My\Application\Db\AccountRow;

/**
 * Class for Shop service
 *
 */
class Shop extends BaseService
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
        $em  = $app->getEntityManager();
        $shops = $em->findAccounts();
        $output->data = $shops;
        
        return $output;
    }
    
}
