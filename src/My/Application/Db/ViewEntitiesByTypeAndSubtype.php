<?php
/**
 * File for class for View Entities By Type And Subtype
 */

namespace My\Application\Db;

/**
 * Class for View Entities By Type And Subtype
 *
 */
class ViewEntitiesByTypeAndSubtype extends EntityTable
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
            . 'AND e.entity_subtype_id = ? '
            . 'ORDER BY e.id';
    }
}
