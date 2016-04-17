<?php
/**
 * File for class for View System User Roles By Code
 */

namespace My\Application\Db;

/**
 * Class for View System User Roles By Code
 *
 */
class ViewSystemUserRolesByCode extends SystemUserRoleTable
{
    function getName()
    {
        return 'tbl_system_user_role';
    }
    
    function getRowClassName()
    {
        return SystemUserRoleRow::class;
    }
    
    function getSql()
    {
        return parent::getSql() . ' t '
            . 'WHERE t.code = ? '
            . 'ORDER BY t.id';
    }
}
