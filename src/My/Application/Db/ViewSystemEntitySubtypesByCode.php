<?php
/**
 * File for class for View System Entity Subtypes By Code
 */

namespace My\Application\Db;

/**
 * Class for View System Entity Subtypes By Code
 *
 */
class ViewSystemEntitySubtypesByCode extends SystemEntitySubtypeTable
{
    function getName()
    {
        return 'tbl_system_entity_subtype';
    }
    
    function getRowClassName()
    {
        return SystemEntitySubtypeRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' t '
            . 'WHERE t.code = ?';
    }
}
