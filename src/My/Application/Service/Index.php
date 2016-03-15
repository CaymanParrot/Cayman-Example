<?php
/**
 * File for Index service class
 */

namespace My\Application\Service;

use My\Application\BaseService;

use My\Application\Model\SystemEntity;

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
		
		//ob_start();
		//phpinfo();
		//$data = ob_get_clean();
        //$output->meta[] = $data;
		
        //testing db
        $sql  = 'select * from public.system_entity';
        $rows = $this->getApp()->getDbManager()->dbFetchAllClasses($sql, [], SystemEntity::class);
        //$rows = $this->getApp()->getDbManager()->dbFetchAllRows($sql);
        $output->data = $rows;
        $output->meta['count'] = count($rows);
        
        return $output;
    }
    
}
