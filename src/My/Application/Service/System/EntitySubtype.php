<?php
/**
 * File for Entity Subtype service
 */

namespace My\Application\Service\System;

//use My\Application\Db\SystemEntitySubtypeRow;

/**
 * Class for Entity Subtype service
 *
 */
class EntitySubtype extends \My\Application\BaseService
{
    /**
     * Index/search
     * @param EntitySubtype\Index\Input $input
     * @return EntitySubtype\Index\Output
     */
    function index(EntitySubtype\Index\Input $input)
    {
        $output = new EntitySubtype\Index\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $output->data = $db->SystemEntitySubtypeTable()->selectRows();
        
        return $output;
    }
    
}
