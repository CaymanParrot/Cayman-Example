<?php
/**
 * File for page model class
 */

namespace My\Application\Model;

/**
 * Class for page model
 *
 */
class Page extends Entity
{
    public $name;// varchar(200),
    public $code;// varchar(250),-- to use on URL
    public $summary;// text,
    public $content;// text
}
