<?php
/**
 * File for Entity Type service
 */

namespace My\Application\Service\System;

//use My\Application\Db\SystemEntityTypeRow;

/**
 * Class for Entity Type service
 *
 */
class EntityType extends \My\Application\BaseService
{
    /**
     * Index/search
     * @param EntityType\Index\Input $input
     * @return EntityType\Index\Output
     */
    function index(EntityType\Index\Input $input)
    {
        $output = new EntityType\Index\Output();
        
        $app = $this->getApp();
        $db  = $app->getDbManager();
        $output->data = $db->SystemEntityTypeTable()->selectRows();
        
        return $output;
    }
    
}
