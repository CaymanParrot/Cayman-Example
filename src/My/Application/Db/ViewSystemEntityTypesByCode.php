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
        return parent::getSql() . ' t '
            . 'WHERE t.code = ? '
            . 'ORDER BY t.id';
    }
    
    /**
     * Find entity type by code
     * @param string $code
     * @return SystemEntityTypeRow | null
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
