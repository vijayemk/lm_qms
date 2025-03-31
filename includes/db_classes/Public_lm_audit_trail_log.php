<?php
/**
 * Table Definition for public.lm_audit_trail_log
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_trail_log extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_trail_log';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $created_date;                   // timestamp(8)
    public $user_id;                        // varchar(-1)
    public $action;                         // varchar(-1)
    public $ref_object_id;                  // varchar(-1)
    public $ref_object_id1;                 // varchar(-1)
    public $ip_address;                     // varchar(-1)
    public $url;                            // text(-1)
    public $post_data;                      // text(-1)
    public $status;                         // text(-1)
    public $year;                           // varchar(-1)
    public $month;                          // varchar(-1)
    public $plant;                          // varchar(-1)
    public $dept;                           // varchar(-1)
    public $old_value;                      // text(-1)
    public $new_value;                      // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
