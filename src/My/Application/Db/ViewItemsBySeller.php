<?php
/**
 * File for class for View Items By Seller
 */

namespace My\Application\Db;

/**
 * Class for View Items By Seller
 *
 */
class ViewItemsBySeller extends EntityTable
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
            . 'WHERE i.account_id_owner = ? '
            . 'ORDER BY i.name';
    }
}
