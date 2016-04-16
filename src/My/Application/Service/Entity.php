<?php
/**
 * File for Index service class
 */

namespace My\Application\Service;

use My\Application\BaseService;

use My\Application\Db\SystemEntityTypeRow;
use My\Application\Db\SystemEntityTypeTable;

use Cayman\Manager\DbManager\InputForSelect;

/**
 * Class for Index service
 *
 */
class Entity extends BaseService
{
    
    function index(Index\Index\Input $input)
    {
        //testing log
        $app = $this->getApp();
        $db  = $app->getDbManager();
        
        $app->log(__METHOD__ . PHP_EOL);
        
        $output = new Index\Index\Output();
		
        //testing db
        $inputForSelect = new InputForSelect();
        $inputForSelect->sql       = 'SELECT * FROM public.tbl_system_entity_type';
        $inputForSelect->className = SystemEntityTypeRow::class;
        $outputForSelect = $db->dbSelect($inputForSelect);
        foreach($outputForSelect->rows as $row) {
            $row->
            $output->data[$type] = $row;
        }
        
        return $output;
    }
    
}
