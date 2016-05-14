<?php
/**
 * File for class for View Buyer Accounts
 */

namespace My\Application\Db;

/**
 * Class for View Buyer Accounts
 *
 */
class ViewBuyerAccounts extends UserTable
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
            . 'WHERE a.is_buyer = true';
    }
}
