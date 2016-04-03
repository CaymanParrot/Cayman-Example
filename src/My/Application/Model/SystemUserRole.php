<?php
/**
 * File for system user role model class
 */

namespace My\Application\Model;

/**
 * Class for system user role model
 *
 */
class SystemUserRole
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(32) NOT NULL,
    public $name;// varchar(64) NOT NULL,
    public $short_description;// text,
    public $long_description;// text
}

//UNIQUE (code);

