<?php
/**
 * File for base service class
 */

namespace My\Application;

use My\Application\Db\TokenRow;
use My\Exception\ExceptionRecordNotFound;
use My\Application\Service\Identity\Token\Retrieve\Output as TokenRetrieveOutput;

/**
 * Class for Base Service
 * 
 * @method \My\Application\HttpApplication getApp()
 *
 */
class BaseService extends \Cayman\Service
{
    /**
     * Token row
     * @var TokenRow
     */
    protected $tokenRow;
    
    /**
     * Run service
     * 
     * @param string $serviceName
     * @param string $actionName
     * @param array  $data
     * @return \Cayman\AppOutput
     */
    protected function runService($serviceName, $actionName, array $data = [])
    {
        $app = $this->getApp();
        
        $appInput = new \Cayman\AppInput();
        $appInput->setService($serviceName);
        $appInput->setAction($actionName);
        $appInput->setData($data);
        
        $appOutput = $app->run($appInput);
        
        return $appOutput;
    }
    
}
