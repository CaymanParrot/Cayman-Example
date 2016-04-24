<?php
/**
 * File for Country service
 */

namespace My\Application\Service\System;

//use My\Application\Db\SystemCountryRow;

/**
 * Class for Country service
 *
 */
class Country extends \My\Application\BaseService
{
    /**
     * Index/search
     * @param Country\Index\Input $input
     * @return Country\Index\Output
     */
    function index(Country\Index\Input $input)
    {
        $output = new Country\Index\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $output->data = $db->SystemCountryTable()->selectRows();
        
        return $output;
    }
    
}
