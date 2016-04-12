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
        if (empty($this->table_name)) {
            $ns     = __NAMESPACE__ . '\\';
            $class  = get_class($this);
            $result = strtolower(str_replace($ns, '', $class));
            $result = str_replace('table', '', $result);
            $this->table_name = 'tbl_' . $result;
        }
        
        return $this->table_name;
    }
    
    /**
     * Get schema name
     * @return string
     */
    function getSchemaName()
    {
        if (empty($this->table_schema)) {
            $this->table_schema = 'public';
        }
        
        return $this->table_schema;
    }
}
