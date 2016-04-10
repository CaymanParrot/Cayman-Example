<?php
/**
 * File for token model class
 */

namespace My\Application\Db;

/**
 * Class for token model
 *
 */
class TokenRow extends EntityRow
{
    public $code;// varchar(200) NOT NULL,
    public $expiry_date;// timestamp with time zone NOT NULL,
    public $email;// varchar(128),
    public $data;// jsonb
}

//UNIQUE (email, code);

