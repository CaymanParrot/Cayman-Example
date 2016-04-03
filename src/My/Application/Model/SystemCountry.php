<?php
/**
 * File for system country class
 */

namespace My\Application\Model;

/**
 * Class for system country model
 *
 */
class SystemCountry
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(2) NOT NULL,
    public $name;// varchar(64) NOT NULL,
    public $short_description;// text,
    public $long_description;// text
}
