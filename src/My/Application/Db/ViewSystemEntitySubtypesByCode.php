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
    
    /**
     * Find entity subtype by code
     * @param string $code
     * @return SystemEntitySubtypeRow | null
     */
    function findByCode($code)
    {
        $row = null;
        $this->setParameters([ $code ]);
        $rows = $this->selectRows();
        
        if (isset($rows[0])) {
            $row = $rows[0];
        }
        
        return $row;
    }
}
