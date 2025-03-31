<?php
/**
 * Table Definition for public.lm_audit_operation
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_operation extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_operation';    // table name
    public $object_id;                      // varchar(-1) not_null
    public $user_id;                        // varchar(-1)
    public $created_date;                   // timestamp(8)
    public $action;                         // varchar(-1)
    public $ip_address;                     // varchar(-1)
    public $post_data;                      // text(-1)
    public $status;                         // varchar(-1)
    public $year;                           // varchar(-1)
    public $month;                          // varchar(-1)
    public $department;                     // varchar(-1)
    public $old_value;                      // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
