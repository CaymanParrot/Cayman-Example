<?php
/**
 * File for class for View Category By Type, Subtype and Code
 */

namespace My\Application\Db;

/**
 * Class for View Category By Type, Subtype And Code
 *
 */
class ViewCategoryByTypeAndSubtypeAndCode extends UserTable
{
    function getName()
    {
        return 'tbl_category';
    }
    
    function getRowClassName()
    {
        return CategoryRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' c '
            . 'WHERE c.entity_type_id    = ?'
            . '  AND c.entity_subtype_id = ?'
            . '  AND c.code              = ?';
    }
    
    /**
     * Find by type, subtype and code
     * @param int    $entityTypeId
     * @param int    $entitySubtypeId
     * @param string $code
     * @return CategoryRow
     */
    function findByTypeAndSubtypeAndCode($entityTypeId, $entitySubtypeId, $code)
    {
        $row = null;
        $this->setParameters([ $entityTypeId, $entitySubtypeId, $code ]);
        $rows = $this->selectRows();
        if (isset($rows[0])) {
            $row = $rows[0];
        }
        
        return $row;
    }
}
