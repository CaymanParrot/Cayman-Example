<?php
/**
 * File for Index service class
 */

namespace My\Application\Service;

use My\Application\BaseService;

use My\Application\Db\EntityRow;
use My\Application\Db\UserRow;

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
        $this->getApp()->log(__METHOD__ . PHP_EOL);
        
        $output = new Index\Index\Output();
		
        //testing db
        $inputForSelect = new InputForSelect();
        $inputForSelect->sql       = 'select * from public.tbl_entity';
        $inputForSelect->className = EntityRow::class;
        $outputForSelect = $this->getApp()->getDbManager()->dbSelect($inputForSelect);
        $rows1 = $outputForSelect->rows;
        
        $inputForSelect2 = new InputForSelect();
        $inputForSelect2->sql       = 'select * from public.tbl_user';
        $inputForSelect2->className = UserRow::class;
        $outputForSelect2 = $this->getApp()->getDbManager()->dbSelect($inputForSelect2);
        $rows2 = $outputForSelect2->rows;
        
        $output->data['entities'] = $rows1;
        $output->data['users']    = $rows2;
        $output->meta['entity_count'] = $outputForSelect->rowCount;
        $output->meta['user_count']   = $outputForSelect2->rowCount;
        
        return $output;
    }
    
}
