<?php
/**
 * File for class for View Entities By Type
 */

namespace My\Application\Db;

/**
 * Class for View Entities By Type
 *
 */
class ViewEntitiesByType extends EntityTable
{
    function getName()
    {
        return 'tbl_entity';
    }
    
    function getRowClassName()
    {
        return EntityRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' e '
            . 'WHERE e.entity_type_id = ? '
            . 'ORDER BY e.id';
    }
}
