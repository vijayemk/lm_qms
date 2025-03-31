<?php
/**
 * Table Definition for public.user_exit
 */
require_once 'DB/DataObject.php';

class DB_Public_user_exit extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_exit';    // table name
    public $object_id;                      // varchar(-1) not_null
    public $org_id;                         // varchar(-1)
    public $department_id;                  // varchar(-1)
    public $full_name;                      // varchar(-1)
    public $emp_id;                         // varchar(-1)
    public $designation_id;                 // varchar(-1)
    public $email;                          // varchar(-1)
    public $creator;                        // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modifier;                       // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $is_deactivated;                 // varchar(-1)
    public $status;                         // varchar(-1)
    public $user_id;                        // varchar(-1)
    public $request_no;                     // varchar(-1)
    public $reason;                         // text(-1)
    public $plant_id;                       // varchar(-1)
    public $lm_doc_id;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
