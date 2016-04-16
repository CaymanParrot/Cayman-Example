<?php
/**
 * File for output for verify action of account service
 */

namespace My\Application\Service\Identity\Account\Verify;

use My\Application\BaseOutput;


/**
 * Class for output for verify action of account service
 *
 */
class Output extends BaseOutput
{
    /**
     * Flag to indicate email is sent or not
     * @var bool
     */
    public $sent = false;
}
