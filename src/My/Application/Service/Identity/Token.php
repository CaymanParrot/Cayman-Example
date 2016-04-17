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
use My\Application\Db\SystemEntitySubtypeTable;
use My\Application\Db\SystemEntityTypeRow;
use My\Application\Db\SystemEntityTypeTable;
use My\Application\Db\TokenRow;
use My\Application\Db\TokenTable;
use My\Application\Db\ViewTokensByTypeAndSubtypeAndEmailAndNotExpired;

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
        
        //$output->data['entity_types']    = $db->SystemEntityTypeTable()->selectRows();
        //$output->data['entity_subtypes'] = $db->SystemEntitySubtypeTable()->selectRows();
        
        /**
         * @var ViewSystemEntitySubtypesByCode
         */
        $entityTypeView = $db->ViewSystemEntityTypesByCode();
        $entityTypeView->appendParameter('token');
        $entityTypes = $entityTypeView->selectRows();
        if (empty($entityTypes)) {
            throw new Exception('Entity type for token not found');
        }
        /**
         * @var SystemEntityTypeRow
         */
        $entityType = $entityTypes[0];
        
        //$output->data['token_type'] = $input->type;
        
        /**
         * @var ViewSystemEntitySubtypesByCode
         */
        $entitySubTypeView = $db->ViewSystemEntitySubtypesByCode();
        $entitySubTypeView->appendParameter($input->type);
        $entitySubTypes = $entitySubTypeView->selectRows();
        $output->data['entity_subtypes_by_code'] = $entitySubTypes;
        
        if (empty($entitySubTypes)) {
            throw new Exception('Invalid token type');
        }
        /**
         * @var SystemEntitySubtypeRow
         */
        $entitySubType = $entitySubTypes[0];
        
        /**
         * @var ViewTokensByTypeAndSubtypeAndEmailAndNotExpired
         */
        $tokenView = $db->ViewTokensByTypeAndSubtypeAndEmailAndNotExpired();
        $tokenView->appendParameter($entitySubType->entity_type_id);
        $tokenView->appendParameter($entitySubType->id);
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
        $token->code              = Random::stringUpperCase(2) . Random::number(10, 99) . Random::stringUpperCase(2);
        $token->expiry_date       = new DbExpression('now() + INTERVAL \'15 MINUTE\'');
        $output->data[]           = $entityManager->entityCreate($tokenTable, $token);
        
        return $output;
    }
    
}
