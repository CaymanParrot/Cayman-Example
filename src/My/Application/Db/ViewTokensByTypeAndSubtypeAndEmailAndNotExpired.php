<?php
/**
 * File for class for View Tokens By Type And Subtype And Email And NotExpired
 */

namespace My\Application\Db;

/**
 * Class for View Tokens By Type And By Subtype And Email And NotExpired
 *
 */
class ViewTokensByTypeAndSubtypeAndEmailAndNotExpired extends TokenTable
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
            . 'WHERE t.entity_type_id = ? '
            . 'AND t.entity_subtype_id = ? '
            . 'AND t.email = ? '            // token email
            . 'AND now() < t.expiry_date '  // not expired
            . 'ORDER BY t.date_created'
            ;
        return $this->sql;
    }
}
