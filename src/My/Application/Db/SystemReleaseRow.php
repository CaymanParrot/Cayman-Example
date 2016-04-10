<?php
/**
 * File for system release model class
 */

namespace My\Application\Db;

/**
 * Class for system release model
 *
 */
class SystemReleaseRow
{
    public $version;// VARCHAR(16),
    public $code;// VARCHAR(64),
    public $dt;//   timestamp with time zone DEFAULT CURRENT_TIMESTAMP
}

//KEY (version, code);
