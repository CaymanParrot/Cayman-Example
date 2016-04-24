<?php
/**
 * File for Currency service
 */

namespace My\Application\Service\System;

//use My\Application\Db\SystemCurrencyRow;

/**
 * Class for Currency service
 *
 */
class Currency extends \My\Application\BaseService
{
    /**
     * Index/search
     * @param Currency\Index\Input $input
     * @return Currency\Index\Output
     */
    function index(Currency\Index\Input $input)
    {
        $output = new Currency\Index\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $output->data = $db->SystemCurrencyTable()->selectRows();
        
        return $output;
    }
    
}
