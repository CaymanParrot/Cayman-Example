<?php
/**
 * File for class for View Item By Type, Subtype and Code
 */

namespace My\Application\Db;

/**
 * Class for View Item By Type, Subtype And Code
 *
 */
class ViewItemByTypeAndSubtypeAndCode extends UserTable
{
    function getName()
    {
        return 'tbl_item';
    }
    
    function getRowClassName()
    {
        return ItemRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' i '
            . 'WHERE i.entity_type_id    = ?'
            . '  AND i.entity_subtype_id = ?'
            . '  AND i.code              = ?';
    }
    
    /**
     * Find by type, subtype and code
     * @param int    $entityTypeId
     * @param int    $entitySubtypeId
     * @param string $code
     * @return ItemRow
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
