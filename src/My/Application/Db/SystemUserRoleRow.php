<?php
/**
 * File for system user role model class
 */

namespace My\Application\Db;

/**
 * Class for system user role model
 *
 */
class SystemUserRoleRow extends AbstractRow
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(32) NOT NULL,
    public $name;// varchar(64) NOT NULL,
    public $short_description;// text,
    public $long_description;// text
}

//UNIQUE (code);

