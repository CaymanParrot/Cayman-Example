<?php
/**
 * File for class for View System Entity Types By Code
 */

namespace My\Application\Db;

/**
 * Class for View System Entity Types By Code
 *
 */
class ViewSystemEntityTypesByCode extends SystemEntityTypeTable
{
    function getName()
    {
        return 'tbl_system_entity_type';
    }
    
    function getRowClassName()
    {
        return SystemEntityTypeRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' WHERE "code" = ?';
    }
}
