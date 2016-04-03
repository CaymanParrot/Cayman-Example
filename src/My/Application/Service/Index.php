<?php
/**
 * File for Index service class
 */

namespace My\Application\Service;

use My\Application\BaseService;

use My\Application\Model\Entity;
use My\Application\Model\User;

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
        $sql  = 'select * from public.tbl_entity';
        $rows1 = $this->getApp()->getDbManager()->dbFetchAllClasses($sql, [], Entity::class);
        
        $sql  = 'select * from public.tbl_user';
        $rows2 = $this->getApp()->getDbManager()->dbFetchAllClasses($sql, [], User::class);
        
        //$rows = $this->getApp()->getDbManager()->dbFetchAllRows($sql);
        
        
        $output->data = array_merge($rows1, $rows2);
        $output->meta['count'] = count($rows1) + count($rows2);
        
        return $output;
    }
    
}
