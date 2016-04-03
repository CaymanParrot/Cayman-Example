<?php
/**
 * File for token model class
 */

namespace My\Application\Model;

/**
 * Class for token model
 *
 */
class Token
{
    public $id;// uuid DEFAULT gen_random_uuid() NOT NULL,
    public $code;// varchar(200) NOT NULL,
    public $date_created;// timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    public $expiry_date;// timestamp with time zone NOT NULL,
    public $email;// varchar(128),
    public $user_id;// uuid,
    public $data;// jsonb
}

//UNIQUE (code);

