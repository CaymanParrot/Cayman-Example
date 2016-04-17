<?php
/**
 * File for class for View Tokens By Type, Subtype, Email, Code And NotExpired
 */

namespace My\Application\Db;

/**
 * Class for View Tokens By Type, Subtype, Email, Code And NotExpired
 *
 */
class ViewTokensByTypeAndSubtypeAndEmailAndCodeAndNotExpired extends TokenTable
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
            . 'WHERE t.entity_type_id  = ? '
            . 'AND t.entity_subtype_id = ? '
            . 'AND t.email = ? '            // token email
            . 'AND t.code  = ? '            // token code
            . 'AND now() < t.expiry_date '  // not expired
            . 'ORDER BY t.date_created'
            ;
        return $this->sql;
    }
}
