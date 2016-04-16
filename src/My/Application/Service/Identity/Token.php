<?php
/**
 * File for Identity Token service
 */

namespace My\Application\Service\Identity;

use Cayman\Library\Random;
use Cayman\Manager\DbExpression;

use My\Exception;
use My\Application\BaseService;
use My\Application\Manager\DbManager;
use My\Application\Manager\EntityManager;
use My\Application\Db\SystemEntitySubtypeRow;
use My\Application\Db\TokenRow;
use My\Application\Db\TokenTable;
use My\Application\Db\ViewTokensBySubtypeAndEmailAndNotExpired;

/**
 * Class for Identity Token service
 *
 */
class Token extends BaseService
{
    /**
     * Create token
     * @param Token\Create\Input $input
     * @return Token\Create\Output
     */
    function create(Token\Create\Input $input)
    {
        $output = new Token\Create\Output();
        
        $app = $this->getApp();
        
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $app->getDbManager();
        
        //$output->data = $db->SystemEntitySubtypeTable()->selectRows();
        
        /**
         * @var ViewSystemEntitySubtypesByCode
         */
        $entitySubTypeView = $db->ViewSystemEntitySubtypesByCode();
        $entitySubTypeView->appendParameter($input->type);
        $entitySubTypes = $entitySubTypeView->selectRows();
        if (empty($entitySubTypes)) {
            throw new Exception('Invalid token type');
        }
        /**
         * @var SystemEntitySubtypeRow
         */
        $entitySubType = $entitySubTypes[0];
        
        /**
         * @var ViewTokensBySubtypeAndEmailAndNotExpired
         */
        $tokenView = $db->ViewTokensBySubtypeAndEmailAndNotExpired();
        
        $tokenView->appendParameter($input->type);
        $tokenView->appendParameter($input->email);
        $tokens = $tokenView->selectRows();
        if (! empty($tokens)) {
            throw new Exception('Please use existing token or wait');
        }
        
        /**
         * @var EntityManager
         */
        $entityManager = $app->getEntityManager();
        $tokenTable = $db->TokenTable();
        $token = new TokenRow();
        $token->entity_type_id    = $entitySubType->entity_type_id;
        $token->entity_subtype_id = $entitySubType->id;
        $token->email             = $input->email;
        $token->code              = Random::stringUpperCase(2) . Random::number(1, 9) . Random::stringUpperCase(2);
        $token->expiry_date       = new DbExpression('now() + INTERVAL \'15 MINUTE\'');
        $output->data[]           = $entityManager->entityCreate($tokenTable, $token);
        
        return $output;
    }
    
}
