<?php
/**
 * File for output for create action of token service
 */

namespace My\Application\Service\Identity\Token\Create;

use My\Application\Db\TokenRow;

/**
 * Class for output for create action of token service
 *
 */
class Output extends \My\Application\BaseOutput
{
    /**
     * New token record
     * @var TokenRow
     */
    public $token;
}
