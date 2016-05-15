<?php
/**
 * File for class for View Token By Type, Subtype, Code And Not Expired
 */

namespace My\Application\Db;

/**
 * Class for View Token By Type, Subtype, Code And Not Expired
 *
 */
class ViewTokenByTypeAndSubtypeAndCodeAndNotExpired extends TokenTable
{
    function getName()
    {
        return 'tbl_token';
    }
    
    function getRowClassName()
    {
        return TokenRow::class;
    }
    
    function getSql()
    {
        $this->sql = parent::getSql() . ' t '
            . 'WHERE t.entity_type_id    = ?'
            . '  AND t.entity_subtype_id = ?'
            . '  AND t.code              = ?'
            . '  AND now() < t.expiry_date '  // not expired
            //. 'ORDER BY t.date_created'
            ;
        return $this->sql;
    }
    
    /**
     * Find by type, subtype and code
     * @param int    $entityTypeId
     * @param int    $entitySubtypeId
     * @param string $code
     * @return TokenRow
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
