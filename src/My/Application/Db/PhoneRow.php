<?php
/**
 * File for phone model class
 */

namespace My\Application\Db;

/**
 * Class for phone model
 *
 */
class PhoneRow extends EntityRow
{
    public $label;//  varchar(16) NOT NULL,
    public $number;// varchar(16) NOT NULL
}
