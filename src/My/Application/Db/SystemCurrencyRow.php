<?php
/**
 * File for system currency class
 */

namespace My\Application\Db;

/**
 * Class for system currency model
 *
 */
class SystemCurrencyRow extends AbstractRow
{
    public $id;// smallint NOT NULL,
    public $code;// varchar(3) NOT NULL,
    public $name;// varchar(64) NOT NULL,
    public $short_description;// text,
    public $long_description;// text,
    public $symbol;// varchar(5),
    public $symbol_html;// varchar(10)
}

