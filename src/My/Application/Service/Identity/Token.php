<?php
/**
 * File for Identity Token service
 */

namespace My\Application\Service\Identity;

use Cayman\Library\Random;

use My\Application\BaseService;
use My\Application\Db\TokenRow;

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
        
        $token = new TokenRow();
        $token->type  = $input->type;
        $token->email = $input->email;
        $token->code  = Random::stringUpperCase(2) . Random::number(1, 9) . Random::stringUpperCase(2);
        
        //$entityManager = $this->getApp()->getEntityManager();
        //$entityManager->entityCreate($token);
        
        $dbManager = $this->getApp()->getDbManager();
        $data = [
            'email' => $token->email,
            'code'   => $token->code,
        ];
        $result = $dbManager->dbInsert('tbl_token', $data);
        
        return $output;
    }
    
}
