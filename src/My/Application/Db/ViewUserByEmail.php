<?php
/**
 * File for class for View User By Email
 */

namespace My\Application\Db;

/**
 * Class for View User By Email
 *
 */
class ViewUserByEmail extends UserTable
{
    function getName()
    {
        return 'tbl_user';
    }
    
    function getRowClassName()
    {
        return UserRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' u '
            . 'WHERE u.email = ?';
    }
}
