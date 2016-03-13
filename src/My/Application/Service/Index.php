<?php
/**
 * File for Index service class
 */

namespace My\Application\Service;

use My\Application\BaseService;

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
		
		ob_start();
		phpinfo();
		$data = ob_get_clean();
        $output->data[] = $data;
		
        //testing db
        $sql  = 'select * from entity';
        $rows = $this->getApp()->getDbManager()->dbFetchAllRows($sql);
        $output->data[] = $rows;
        
        return $output;
    }
    
}
