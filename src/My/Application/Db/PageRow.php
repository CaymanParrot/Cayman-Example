<?php
/**
 * File for page model class
 */

namespace My\Application\Db;

/**
 * Class for page model
 *
 */
class PageRow extends EntityRow
{
    public $name;// varchar(200),
    public $code;// varchar(250),-- to use on URL
    public $summary;// text,
    public $content;// text
}
