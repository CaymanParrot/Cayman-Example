<?php
/**
 * File for asset model class
 */

namespace My\Application\Db;

/**
 * Class for asset model
 *
 */
class AssetRow extends EntityRow
{
    public $name;// varchar(200),
    public $url;// text,
    public $description;// text
}
