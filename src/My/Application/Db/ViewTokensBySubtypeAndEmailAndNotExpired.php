<?php
/**
 * File for class for View Tokens By Subtype And Email And NotExpired
 */

namespace My\Application\Db;

/**
 * Class for View Tokens By Subtype And Email And NotExpired
 *
 */
class ViewTokensBySubtypeAndEmailAndNotExpired extends TokenTable
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
        $systemEntitySubtypeTable = $this->getDb()->SystemEntitySubtypeTable();
        $this->sql = 'SELECT t.* '
            . 'FROM ' . $this->getFullName() . ' t '
            . 'INNER JOIN ' . $systemEntitySubtypeTable->getFullName() . ' st '
            . ' ON t.entity_subtype_id = st.id'
            . 'WHERE st.code = ?'           // subtype code
            . '  AND t.email = ?'           // token email
            . '  AND now() < t.expiry_date' // not expired
            ;
        return $this->sql;
    }
}
