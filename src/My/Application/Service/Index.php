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
        $output = new Index\Index\Output();
		
		ob_start();
		phpinfo();
		$data = ob_get_clean();
        $output->data[] = $data;
		
        return $output;
    }
    
}
