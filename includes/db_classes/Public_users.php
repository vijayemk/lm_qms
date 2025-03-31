<?php
/**
 * Table Definition for public.users
 */
require_once 'DB/DataObject.php';

class DB_Public_users extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.users';        // table name
    public $user_id;                        // varchar(-1) not_null default_ primary_key
    public $user_name;                      // varchar(-1) unique_key
    public $full_name;                      // varchar(-1)
    public $designation_id;                 // varchar(-1)
    public $org_id;                         // varchar(-1)
    public $email;                          // varchar(-1) not_null default_
    public $creator;                        // varchar(-1)
    public $modifier;                       // varchar(-1)
    public $create_time;                    // timestamp(8)
    public $modify_time;                    // timestamp(8)
    public $department_id;                  // varchar(-1)
    public $emp_id;                         // varchar(-1)
    public $password;                       // varchar(-1)
    public $account_status;                 // varchar(-1) not_null default_
    public $password_expired_on;            // varchar(-1)
    public $plant_id;                       // varchar(-1)
    public $old_pass;                       // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
