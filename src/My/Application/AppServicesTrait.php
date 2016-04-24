<?php

/**
 * File for Application Services trait
 */

namespace My\Application;

use My\Application\Service\Index;
use My\Application\Service\Entity;
use My\Application\Service\Identity\Account;
use My\Application\Service\Identity\Token;
use My\Application\Service\System\Country;
use My\Application\Service\System\Currency;
use My\Application\Service\System\EntityStatus;
use My\Application\Service\System\EntityType;

/**
 * Trait for Application Services
 *
 */
trait AppServicesTrait
{
    /**
     * Get Index service
     * @return Index
     */
    function getServiceIndex()
    {
        return $this->getService('index');
    }
    
    /**
     * Get Entity service
     * @return Entity
     */
    function getServiceEntity()
    {
        return $this->getService('entity');
    }
    
    /**
     * Get Identity Account service
     * @return Account
     */
    function getServiceIdentityAccount()
    {
        return $this->getService('identity/account');
    }
    
    /**
     * Get Identity Token service
     * @return Token
     */
    function getServiceIdentityToken()
    {
        return $this->getService('identity/token');
    }
    /**
     * Get System Country service
     * @return Token
     */
    function getServiceSystemCountry()
    {
        return $this->getService('system/country');
    }
    
    /**
     * Get System Currency service
     * @return Token
     */
    function getServiceSystemCurrency()
    {
        return $this->getService('system/currency');
    }
    
    /**
     * Get System Entity Status service
     * @return Token
     */
    function getServiceSystemEntityStatus()
    {
        return $this->getService('system/entity-status');
    }
    
    /**
     * Get System Entity Type service
     * @return Token
     */
    function getServiceSystemEntityType()
    {
        return $this->getService('system/entity-type');
    }
    
}
