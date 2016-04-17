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
use My\Application\Db\SystemEntityTypeRow;
use My\Application\Db\TokenRow;
use My\Application\Db\TokenTable;
use My\Library\Password;

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
        /**
         * @var \My\Application\Manager\EntityManager
         */
        $em = $app->getEntityManager();
        
        if (! filter_var($input->email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Valid email is required');
        }
        if (! in_array($input->type, ['email-token', 'auth-token'])) {
            throw new Exception('Invalid token type');
        }
        
        $entityType = $em->findSystemEntityTypeByCode('token');
        $entitySubType = $em->findSystemEntitySubtypeByCode($input->type);
        
        /**
         * @var TokenRow[]
         */
        $tokens = $em->findTokensByTypeAndSubtypeAndEmailAndNotExpired(
            $entityType->id, $entitySubType->id, $input->email
        );
        if (! empty($tokens) && is_array($tokens) && 3 <= count($tokens)) {
            throw new Exception('Please use existing token(s) or wait');
        }
        
        $tokenTable = $db->TokenTable();
        $now        = new \DateTimeImmutable();
        
        $token = new TokenRow();
        $token->entity_type_id    = $entityType->id;
        $token->entity_subtype_id = $entitySubType->id;
        $token->entity_status_id  = $entitySubType->default_status_id;
        $token->email             = $input->email;
        
        if ($input->type == 'email-token') {
            $expiryDate  = $now->add(new \DateInterval('PT15M'));// valid 15 minutes
            $token->code = Random::stringUpperCase(2) . Random::number(10, 99) . Random::stringUpperCase(2);
        } else {// auth-token
            //TODO: check password
            $user = $em->findUserByEmail($input->email);
            if (! Password::verify($input->password, $user->password)) {
                throw new Exception('Invalid credentials');
            }
            $expiryDate   = $now->add(new \DateInterval('PT60M'));// valid 60 minutes
            $stringDomain = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
            $token->code  = Random::stringUsingDomain(128, $stringDomain);
            $token->user_id_owner = $user->id;
        }
        
        //$token->expiry_date = new DbExpression('now() + INTERVAL \'15 MINUTE\'');
        $token->expiry_date = $expiryDate->format('Y-m-d H:i:s.u T');//for now
        
        $output->token = $em->entityCreate($tokenTable, $token);
        
        return $output;
    }
    
    /**
     * Index of tokens
     * @param Token\Index\Input $input
     * @return Token\Index\Output
     */
    function index(Token\Index\Input $input)
    {
        $output = new Token\Index\Output();
        
        //$app = $this->getApp();
        
        /**
         * @var \My\Application\Manager\DbManager
         */
        //$db = $app->getDbManager();
        
        //for debugging
        //$output->data = $db->TokenTable()->selectRows();
        
        return $output;
    }
    
    /**
     * Retrieve token
     * @param Token\Retrieve\Input $input
     * @return Token\Retrieve\Output
     */
    function retrieve(Token\Retrieve\Input $input)
    {
        $output = new Token\Retrieve\Output();
        
        $app = $this->getApp();
        
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $app->getDbManager();
        
        /**
         * @var \My\Application\Manager\EntityManager
         */
        $em = $app->getEntityManager();
        
        /**
         * @var SystemEntityTypeRow
         */
        $entityType = $em->findSystemEntityTypeByCode('token');
        
        /**
         * @var SystemEntitySubtypeRow
         */
        $entitySubType = $em->findSystemEntitySubtypeByCode($input->type);
        
        /**
         * @var TokenRow
         */
        $output->token = $em->findTokenByTypeAndSubtypeAndEmailAndCodeAndNotExpired(
            $entityType->id, $entitySubType->id, $input->email, $input->code
        );
        
        return $output;
    }
}
