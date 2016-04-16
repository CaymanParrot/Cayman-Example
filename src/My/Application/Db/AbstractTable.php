<?php

/**
 * File for Base Table class
 */

namespace My\Application\Db;

use Cayman\Manager\DbManager\Table;

/**
 * Class for Base Table
 * 
 * @method \My\Application\Manager\DbManager getDb()
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
            $result = str_replace($ns, '', $class);
            if (substr($result, -5) == 'Table') {//last 5 chars is 'Table'
                $result = substr($result, 0, -5);//remove it
            }
            $result = preg_replace('/([A-Z])/', ' $1', $result);//split words with capital letters
            $result = strtolower(trim($result));
            $result = str_replace(' ', '_', $result);
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
