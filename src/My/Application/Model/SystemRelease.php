<?php
/**
 * File for system release model class
 */

namespace My\Application\Model;

/**
 * Class for system release model
 *
 */
class SystemRelease
{
    public $version;// VARCHAR(16),
    public $code;// VARCHAR(64),
    public $dt;//   timestamp with time zone DEFAULT CURRENT_TIMESTAMP
}

//KEY (version, code);
