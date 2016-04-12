<?php
/**
 * File for Index service class
 */

namespace My\Application\Service;

use My\Application\BaseService;

use My\Application\Db\EntityRow;
use My\Application\Db\EntityTable;
use My\Application\Db\UserRow;
use My\Application\Db\UserTable;

use Cayman\Manager\DbManager\InputForSelect;

/**
 * Class for Index service
 *
 */
class Index extends BaseService
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
        $inputForSelect->sql       = 'select * from public.tbl_entity';
        $inputForSelect->className = EntityRow::class;
        $outputForSelect = $db->dbSelect($inputForSelect);
        $rows1 = $outputForSelect->rows;
        
        $inputForSelect2 = new InputForSelect();
        $inputForSelect2->sql       = 'select * from public.tbl_user';
        $inputForSelect2->className = UserRow::class;
        $outputForSelect2 = $db->dbSelect($inputForSelect2);
        $rows2 = $outputForSelect2->rows;
        
        
        
        $output->data['entities'] = $rows1;
        $output->data['users']    = $rows2;
        $output->meta['entity_count'] = $outputForSelect->rowCount;
        $output->meta['user_count']   = $outputForSelect2->rowCount;
        
        $tables = $db->dbGetTables();
        
        $output->meta['tables'] = $tables;
        $output->meta['table_count'] = count($tables);        
        
        $tableUser = new UserTable();
        //$tableUser->table_schema = 'public';
        //$tableUser->table_name   = 'tbl_user';
        
        $db->dbGetTable($tableUser);
        $columns = $db->dbGetTableColumns($tableUser);
        
        $output->meta['table_user_columns1'] = $columns;
        $output->meta['table_user_columns2'] = $tableUser->getColumns();
        
        return $output;
    }
    
}
