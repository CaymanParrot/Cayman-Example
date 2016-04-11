<?php

/**
 * File for Base Table class
 */

namespace My\Application\Db;

use Cayman\Manager\DbManager\Table;

/**
 * Class for Base Table
 *
 */
abstract class AbstractTable extends Table
{
    /**
     * Get name
     * @return string
     */
    function getName()
    {
        $ns     = __NAMESPACE__;
        $class  = get_class($this);
        $result = str_replace($ns, '', $class);
        $result = str_replace('Table', '', $result);
        $result = 'tbl_' . strtolower($result);
        return $result;
    }
    
    /**
     * Get schema name
     * @return string
     */
    function getSchemaName()
    {
        return 'public';
    }
}
