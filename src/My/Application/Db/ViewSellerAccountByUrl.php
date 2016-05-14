<?php
/**
 * File for class for View Seller Account by URL
 */

namespace My\Application\Db;

/**
 * Class for View Seller Account by URL
 *
 */
class ViewSellerAccountByUrl extends UserTable
{
    function getName()
    {
        return 'tbl_account';
    }
    
    function getRowClassName()
    {
        return AccountRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' a '
            . 'WHERE a.is_seller = true '
            . '  AND a.url = ?';
    }
}
