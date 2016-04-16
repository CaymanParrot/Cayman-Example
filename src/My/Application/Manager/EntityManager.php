<?php
/**
 * File for entity manager class
 */

namespace My\Application\Manager;

use Cayman\Manager\DbManager\View;

/**
 * Class for entity manager
 *
 */
class EntityManager extends \Cayman\Manager\EntityManager\PostgreSql
{
    
    function _find(View $view, $id)
    {
        $sql   = $view->getSql();
        $keys  = $view->getPrimaryKey();
        $where = sprintf(' WHERE "%s" = ?', $keys[0]);
        $view->setParameters([$id]);
        
        return $this->entityRetrieve($view);
    }
    
    function _select(View $view)
    {
        return $this->entitySelect($view);
    }
    
    function __call($name, $arguments)
    {
        $result = null;
        
        if (substr($name, 0, 5)=='find') {
            $name   = substr($name, 5);
            $result = $this->_find($name);
        } elseif (substr($name, 0, 6)=='select') {
            $name   = substr($name, 6);
            $result = $this->_view($name);
        } else {
            throw new Exception('Invalid database function call: ' . $name);
        }
        
        return $result;
    }
}
