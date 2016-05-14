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
        $accounts = $db->ViewSellerAccounts()->selectRows();
        $output->data = $accounts;
        
        return $output;
    }
    
    /**
     * Current
     * @param Shop\Current\Input $input
     * @return Shop\Current\Output
     */
    function current(Shop\Current\Input $input)
    {
        $output = new Shop\Current\Output();
        
        $url = 'http://' . $this->getApp()->getHttpHostDomainName();// when service was requested
        
        $app  = $this->getApp();
        $db   = $app->getDbManager();
        $view = $db->ViewSellerAccountByUrl();
        $view->setParameters([ $url ]);
        $accounts = $view->selectRows();
        $output->data = $accounts;
        
        //$output->meta[] = $url;
        
        return $output;
    }
    
    /**
     * Shop display ('shop window') to show items for sale
     * @param Shop\Display\Input $input
     * @return Shop\Display\Output
     */
    function display(Shop\Display\Input $input)
    {
        $output = new Shop\Display\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        
        $inputForCurrent = new Shop\Current\Input();
        $outputForCurrent = $this->current($inputForCurrent);
        $seller = $outputForCurrent->data[0];
        
        $view = $db->ViewItemsBySeller();
        $view->setParameters([ $seller->id ]);
        $items = $view->selectRows();
        $output->data = $items;
        
        return $output;
    }
}
