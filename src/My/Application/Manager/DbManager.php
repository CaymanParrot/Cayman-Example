<?php
/**
 * File for database manager class
 */

namespace My\Application\Manager;

use Cayman\Manager\DbManager\Table;
use Cayman\Manager\DbManager\View;

/**
 * Class for database manager
 *
 * @method \My\Application\Db\AccountTable             AccountTable()
 * @method \My\Application\Db\AddressTable             Address()
 * @method \My\Application\Db\AssetTable               AssetTable()
 * @method \My\Application\Db\AuditTable               AuditTable()
 * @method \My\Application\Db\BasteTable               BasketTable()
 * @method \My\Application\Db\CategoryEntityTable      CategoryEntityTable()
 * @method \My\Application\Db\CategoryTable            CategoryTable()
 * @method \My\Application\Db\EntityTable              EntityTable()
 * @method \My\Application\Db\EntityUserRoleTable      EntityUserRoleTable()
 * @method \My\Application\Db\ItemCostTable            ItemCostTable()
 * @method \My\Application\Db\ItemPriceTable           ItemPriceTable()
 * @method \My\Application\Db\ItemTable                ItemTable()
 * @method \My\Application\Db\OrderItemTable           OrderItemTable()
 * @method \My\Application\Db\OrderTable               OrderTable()
 * @method \My\Application\Db\PageTable                PageTable()
 * @method \My\Application\Db\PhoneTable               PhoneTable()
 * @method \My\Application\Db\SystemCountryTable       SystemCountryTable()
 * @method \My\Application\Db\SystemCurrencyTable      SystemCurrencyTable()
 * @method \My\Application\Db\SystemEntityStatusTable  SystemEntityStatusTable()
 * @method \My\Application\Db\SystemEntitySubtypeTable SystemEntitySubtypeTable()
 * @method \My\Application\Db\SystemEntityTypeTable    SystemEntityTypeTable()
 * @method \My\Application\Db\SystemPostcodeAreaTable  SystemPostcodeAreaTable()
 * @method \My\Application\Db\SystemReleaseTable       SystemReleaseTable()
 * @method \My\Application\Db\SystemUserRoleTable      SystemUserRoleTable()
 * @method \My\Application\Db\TokenTable               TokenTable()
 * @method \My\Application\Db\UserTable                UserTable()
 * 
 * @method \My\Application\Db\ViewBuyerAccounts                                         ViewBuyerAccounts()
 * @method \My\Application\Db\ViewSellerAccounts                                        ViewSellerAccounts()
 * @method \My\Application\Db\ViewSellerAccountByUrl                                    ViewSellerAccountByUrl()
 * 
 * @method \My\Application\Db\ViewItemsBySeller                                         ViewItemsBySeller()
 * @method \My\Application\Db\ViewItemByTypeAndSubtypeAndCode                           ViewItemByTypeAndSubtypeAndCode()
 * @method \My\Application\Db\ViewCategoryByTypeAndSubtypeAndCode                       ViewCategoryByTypeAndSubtypeAndCode()
 * 
 * @method \My\Application\Db\ViewEntitiesByType                                        ViewEntitiesByType()
 * @method \My\Application\Db\ViewEntitiesByTypeAndSubtype                              ViewEntitiesByTypeAndSubtype()
 * 
 * @method \My\Application\Db\ViewSystemEntitySubtypesByCode                            ViewSystemEntitySubtypesByCode()
 * @method \My\Application\Db\ViewSystemEntityTypesByCode                               ViewSystemEntityTypesByCode()
 * @method \My\Application\Db\ViewSystemUserRolesByCode                                 ViewSystemUserRolesByCode()
 * 
 * @method \My\Application\Db\ViewTokensByTypeAndSubtypeAndEmailAndNotExpired           ViewTokensByTypeAndSubtypeAndEmailAndNotExpired()
 * @method \My\Application\Db\ViewTokensByTypeAndSubtypeAndEmailAndCodeAndNotExpired    ViewTokensByTypeAndSubtypeAndEmailAndCodeAndNotExpired()
 * @method \My\Application\Db\ViewTokenByTypeAndSubtypeAndCodeAndNotExpired             ViewTokenByTypeAndSubtypeAndCodeAndNotExpired()
 * 
 * @method \My\Application\Db\ViewUserByEmail                                           ViewUserByEmail()
 * 
 */
class DbManager extends \Cayman\Manager\DbManager\PostgreSql
{
    /**
     * Helper function to get a new table object
     * @param string $name
     * @return Table
     */
    private function _table($name)
    {
        $class = '\\My\\Application\\Db\\' . $name;
        return $this->dbGetTable($class);
    }
    
    /**
     * Helper function to get a new view object
     * @param string $name
     * @return View
     */
    private function _view($name)
    {
        $class = '\\My\\Application\\Db\\' . $name;
        return $this->dbGetView($class);
    }
    
    function __call($name, $arguments)
    {
        $result = null;
        
        if (substr($name, -5)== 'Table') {// right 5 chars
            $result = $this->_table($name);
        } elseif (substr($name, 0, 4) == 'View') {// left 4 chars
            $result = $this->_view($name);
        } else {
            throw new Exception('Invalid database function call: ' . $name);
        }
        
        return $result;
    }
    
    function dbStatement(\Cayman\Manager\DbManager\InputForStatement $input)
    {
        $this->log(__METHOD__ . ' SQL: ' . $input->sql . PHP_EOL);
        $this->log(__METHOD__ . ' Params: ' . json_encode($input->parameters) . PHP_EOL . PHP_EOL);
        return parent::dbStatement($input);
    }
    
}
