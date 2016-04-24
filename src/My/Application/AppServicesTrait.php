<?php

/**
 * File for Application Services trait
 */

namespace My\Application;

use My\Application\Service\Index;
use My\Application\Service\Entity;
use My\Application\Service\Identity\Account;
use My\Application\Service\Identity\Token;

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
}
