<?php
/**
 * File for class for View Seller Accounts
 */

namespace My\Application\Db;

/**
 * Class for View Seller Accounts
 *
 */
class ViewSellerAccounts extends UserTable
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
            . 'WHERE a.is_seller = true';
    }
}
