<?php
/**
 * File for entity manager class
 */

namespace My\Application\Manager;

use Cayman\Manager\DbManager\View;
use My\Exception;
use My\Exception\ExceptionRecordNotFound;

use My\Application\Db;
use My\Application\Db\SystemEntityTypeRow;
use My\Application\Db\SystemEntitySubtypeRow;
use My\Application\Db\SystemUserRoleRow;
use My\Application\Db\TokenRow;
use My\Application\Db\UserRow;

/**
 * Class for entity manager
 *
 */
class EntityManager extends \Cayman\Manager\EntityManager\PostgreSql
{
    
    function _find(View $view, $id)
    {
        $sql   = $view->getSql();
        $keys  = $view->getPrimaryKey();
        $where = sprintf(' WHERE "%s" = ?', $keys[0]);
        $view->setParameters([$id]);
        
        return $this->entityRetrieve($view);
    }
    
    function _select(View $view)
    {
        return $this->entitySelect($view);
    }
    
    function __call($name, $arguments)
    {
        $result = null;
        
        if (substr($name, 0, 5)=='find') {
            $name   = substr($name, 5);
            $result = $this->_find($name);
        } elseif (substr($name, 0, 6)=='select') {
            $name   = substr($name, 6);
            $result = $this->_view($name);
        } else {
            throw new Exception('Invalid database function call: ' . $name);
        }
        
        return $result;
    }
    
    /**
     * Find system entity type by code
     * @param string $code
     * @return SystemEntityTypeRow
     * @throws Exception
     */
    function findSystemEntityTypeByCode($code)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var \My\Application\Db\ViewSystemEntitySubtypesByCode
         */
        $view = $db->ViewSystemEntityTypesByCode();
        $view->appendParameter($code);
        $rows = $view->selectRows();
        if (empty($rows)) {
            throw new ExceptionRecordNotFound('Entity type not found: ' . $code);
        }
        /**
         * @var SystemEntityTypeRow
         */
        $row = $rows[0];
        
        return $row;
    }
    
    /**
     * Find system entity subtype by code
     * @param string $code
     * @return SystemEntitySubtypeRow
     * @throws Exception
     */
    function findSystemEntitySubtypeByCode($code)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var ViewSystemEntitySubtypesByCode
         */
        $view = $db->ViewSystemEntitySubtypesByCode();
        $view->appendParameter($code);
        $rows = $view->selectRows();
        
        if (empty($rows)) {
            throw new ExceptionRecordNotFound('Entity subtype not found: ' . $code);
        }
        /**
         * @var SystemEntitySubtypeRow
         */
        $row = $rows[0];
        
        return $row;
    }
    
    /**
     * Find system user role by code
     * @param string $code
     * @return SystemUserRoleRow
     * @throws Exception
     */
    function findSystemUserRoleByCode($code)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var ViewSystemUserRolesByCode
         */
        $view = $db->ViewSystemUserRolesByCode();
        $view->appendParameter($code);
        $rows = $view->selectRows();
        
        if (empty($rows)) {
            throw new ExceptionRecordNotFound('User role not found: ' . $code);
        }
        /**
         * @var SystemUserRoleRow
         */
        $row = $rows[0];
        
        return $row;
    }
    
    /**
     * Find tokens by type, subtype, email and not expired
     * @param int    $typeId
     * @param int    $subTypeId
     * @param string $email
     * @return TokenRow[]
     */
    function findTokensByTypeAndSubtypeAndEmailAndNotExpired($typeId, $subTypeId, $email)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var ViewTokensByTypeAndSubtypeAndEmailAndNotExpired
         */
        $view = $db->ViewTokensByTypeAndSubtypeAndEmailAndNotExpired();
        $view->appendParameter($typeId);
        $view->appendParameter($subTypeId);
        $view->appendParameter($email);
        $rows = $view->selectRows();
        
        return $rows;
    }
    
    /**
     * Find tokens by type, subtype, email, code and not expired
     * @param int    $typeId
     * @param int    $subTypeId
     * @param string $email
     * @param string $code
     * @return TokenRow
     */
    function findTokenByTypeAndSubtypeAndEmailAndCodeAndNotExpired($typeId, $subTypeId, $email, $code)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var ViewTokensByTypeAndSubtypeAndEmailAndCodeAndNotExpired
         */
        $view = $db->ViewTokensByTypeAndSubtypeAndEmailAndCodeAndNotExpired();
        $view->appendParameter($typeId);
        $view->appendParameter($subTypeId);
        $view->appendParameter($email);
        $view->appendParameter($code);
        $rows = $view->selectRows();
        if (empty($rows)) {
            throw new ExceptionRecordNotFound('Verification code not found');
        }
        $row = $rows[0];
        
        return $row;
    }
    
    /**
     * Find token by type, subtype, code and not expired
     * @param int    $typeId
     * @param int    $subTypeId
     * @param string $code
     * @return TokenRow
     */
    function findTokenByTypeAndSubtypeAndCodeAndNotExpired($typeId, $subTypeId, $code)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var ViewTokenByTypeAndSubtypeAndCodeAndNotExpired
         */
        $view = $db->ViewTokenByTypeAndSubtypeAndCodeAndNotExpired();
        $row  = $view->findByTypeAndSubtypeAndCode($typeId, $subTypeId, $code);
        if (empty($row)) {
            throw new ExceptionRecordNotFound('Token not found');
        }
        
        return $row;
    }
    
    /**
     * Find auth token by type, subtype, code and not expired
     * @param string $code
     * @return TokenRow
     */
    function findAuthTokenByCode($code)
    {
        $typeId    = Db::ENTITY_TYPE_TOKEN;
        $subTypeId = Db::ENTITY_SUBTYPE_AUTH_TOKEN;
        $row = $this->findTokenByTypeAndSubtypeAndCodeAndNotExpired($typeId, $subTypeId, $code);
        
        return $row;
    }
    
    /**
     * Find user by email
     * @param string $email
     * @return UserRow
     */
    function findUserByEmail($email)
    {
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $this->getDbManager();
        /**
         * @var ViewUserByEmail
         */
        $view = $db->ViewUserByEmail();
        $view->appendParameter($email);
        $rows = $view->selectRows();
        if (empty($rows)) {
            throw new ExceptionRecordNotFound('User not found');
        }
        $row = $rows[0];
        
        return $row;
    }
}
