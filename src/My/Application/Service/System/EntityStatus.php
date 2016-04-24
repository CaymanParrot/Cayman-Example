<?php
/**
 * File for Entity Status service
 */

namespace My\Application\Service\System;

//use My\Application\Db\SystemEntityTypeRow;

/**
 * Class for Entity Status service
 *
 */
class EntityStatus extends \My\Application\BaseService
{
    /**
     * Index/search
     * @param EntityStatus\Index\Input $input
     * @return EntityStatus\Index\Output
     */
    function index(EntityStatus\Index\Input $input)
    {
        $output = new EntityStatus\Index\Output();
        
        $app  = $this->getApp();
        $db   = $app->getDbManager();
        $rows = $db->SystemEntityStatusTable()->selectRows();
        //foreach($rows as $row) {
        //    $output->meta[] = get_class($row);
        //}
        $output->data = $rows;
        
        return $output;
    }
    
}
