<?php
/**
 * File for Identity Account service
 */

namespace My\Application\Service\Identity;

use Cayman\Manager\EmailManager\Email;

use My\Library\Password;

use My\Application\BaseService;
use My\Application\Db\AccountRow;
use My\Application\Db\EntityUserRoleRow;
use My\Application\Db\TokenRow;
use My\Application\Db\UserRow;

use My\Application\Service\Identity\Token\Create\Input as TokenCreateInput;
use My\Application\Service\Identity\Token\Create\Output as TokenCreateOutput;

/**
 * Class for Identity Account service
 *
 */
class Account extends BaseService
{
    /**
     * Verify account by emailing a short random code to be used on register action
     * @param Account\Verify\Input $input
     * @return Account\Verify\Output
     */
    function verify(Account\Verify\Input $input)
    {
        $output = new Account\Verify\Output();
        
        $app          = $this->getApp();
        $settings     = $app->getSettings();
        
        $tokenService = $app->getService('identity/token');
        $inputArr = [
            'type'  => $input->type,
            'email' => $input->email,
        ];
        $inputForTokenCreate = new TokenCreateInput($inputArr);
        /**
         * @var TokenCreateOutput
         */
        $outputForTokenCreate = $tokenService->create($inputForTokenCreate);
        $token = $outputForTokenCreate->token;
        
        $emailMsg = new Email();
        $emailMsg->from    = 'support@caymanparrot.com';
        $emailMsg->to[]    = $input->email;
        $emailMsg->subject = $settings->application->name . ' Verification';
        $emailMsg->message = 'Verification code: ' . $token->code;
        $app->emailSend($emailMsg);
        
        $output->sent = true;
        
        return $output;
    }
    
    /**
     * Search
     * @param Account\Register\Input $input
     * @return Account\Register\Output
     */
    function register(Account\Register\Input $input)
    {
        $output = new Account\Register\Output();
        
        $tokenCode   = $input->token;
        $userData    = $input->user;
        $accountData = $input->account;
        
        //simple validation rules
        if (! filter_var($userData->email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Valid email is required');
        }
        if (strcmp($userData->password, $userData->confirm_password) !== 0) {
            throw new Exception('Passwords must match');
        }
        
        $app = $this->getApp();
        
        /**
         * @var \My\Application\Manager\DbManager
         */
        $db = $app->getDbManager();
        
        /**
         * @var \My\Application\Manager\EntityManager
         */
        $em = $app->getEntityManager();
        
        $entityType    = $em->findSystemEntityTypeByCode('token');
        $entitySubType = $em->findSystemEntitySubtypeByCode('email-token');
        
        // is token valid?
        $emailToken = $em->findTokenByTypeAndSubtypeAndEmailAndCodeAndNotExpired(
            $entityType->id, $entitySubType->id, $userData->email, $tokenCode
        );
        
        $entitySubTypeUser    = $em->findSystemEntitySubtypeByCode($userData->type);
        $entitySubTypeAccount = $em->findSystemEntitySubtypeByCode($accountData->type);
        $purchasingMgrRole    = $em->findSystemUserRoleByCode('purchasing-mgr');
        
        try {
            $db->dbBeginTransaction();
            
            $userTable = $db->UserTable();
            $newUser   = new UserRow();
            $newUser->entity_type_id    = $entitySubTypeUser->entity_type_id;
            $newUser->entity_subtype_id = $entitySubTypeUser->id;
            $newUser->entity_status_id  = $entitySubTypeUser->default_status_id;
            $newUser->email             = $userData->email;
            $newUser->first_name        = $userData->first_name;
            $newUser->last_name         = $userData->last_name;
            $newUser->password          = Password::hash($userData->password);
            
            $userCreated = $em->entityCreate($userTable, $newUser);
            
            $accountTable = $db->AccountTable();
            $newAccount   = new AccountRow();
            $newAccount->entity_type_id     = $entitySubTypeAccount->entity_type_id;
            $newAccount->entity_subtype_id  = $entitySubTypeAccount->id;
            $newAccount->entity_status_id   = $entitySubTypeAccount->default_status_id;
            $newAccount->legal_name         = $accountData->legal_name;
            $newAccount->trade_name         = $accountData->trade_name;
            $newAccount->is_company         = true;
            $newAccount->is_buyer           = true;
            $newAccount->is_seller          = true;
            $newAccount->user_id_owner      = $output->user->id;
            
            $accountCreated = $em->entityCreate($accountTable, $newAccount);
            
            // TODO: fix ERROR
            // SQLSTATE[23503]: Foreign key violation: 7 ERROR:  insert or update on table 
            // "tbl_entity_user_role" violates foreign key constraint "tbl_entity_user_role_fkey_entity"
            // DETAIL:  Key (entity_id)=(8cab2db4-4f6a-4b1c-abe0-1232a4f8b716) is not present 
            // in table "tbl_entity".
            //create entity user role 
            //$entityUserRoleTable = $db->EntityUserRoleTable();
            //$newEntityUserRole = new EntityUserRoleRow();
            //$newEntityUserRole->user_id      = $userCreated->id;
            //$newEntityUserRole->entity_id    = $accountCreated->id;
            //$newEntityUserRole->user_role_id = $purchasingMgrRole->id;
            
            //$roleCreated = $em->entityCreate($entityUserRoleTable, $newEntityUserRole);
            
            //login
            $inputArr = [
                'email'    => $userData->email,
                'password' => $userData->password,
            ];
            $inputForLogin    = new Account\Login\Input($inputArr);
            $outputForLogin   = $this->login($inputForLogin);
            $authTokenCreated = $outputForLogin->token;
            
            $db->dbCommitTransaction();
            
            $output->user    = $userCreated;
            $output->account = $accountCreated;
            //$output->role    = $roleCreated;//issue
            $output->token   = $authTokenCreated;
        } catch (\PDOException $pex) {
            throw $pex;
        }
        
        return $output;
    }
    
    /**
     * Login by checking email and password
     * @param Account\Login\Input $input
     * @return Account\Login\Output
     */
    function login(Account\Login\Input $input)
    {
        $output = new Account\Login\Output();
        
        $app          = $this->getApp();
        //$settings     = $app->getSettings();
        
        $tokenService = $app->getService('identity/token');
        $inputArr = [
            'type'     => 'auth-token',
            'email'    => $input->email,
            'password' => $input->password,
        ];
        $inputForTokenCreate = new TokenCreateInput($inputArr);
        /**
         * @var TokenCreateOutput
         */
        $outputForTokenCreate = $tokenService->create($inputForTokenCreate);
        $output->token = $outputForTokenCreate->token;
        
        return $output;
    }
}
