<?php
/**
 * File for audit model class
 */

namespace My\Application\Db;

/**
 * Class for audit model
 *
 */
class AuditRow
{
    public $id;//           uuid DEFAULT gen_random_uuid() NOT NULL,
    public $date_created;// timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    public $user_id;//      uuid DEFAULT myvars_get_user_id(),
    public $table_name;//   VARCHAR(50),
    public $op_flag;//      VARCHAR(1), -- I,U,D
    public $entity_id;//    uuid,
    public $all_data;//     jsonb,
    public $updated_data;// jsonb
}

