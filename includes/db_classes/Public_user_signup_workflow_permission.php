<?php
/**
 * Table Definition for public.user_signup_workflow_permission
 */
require_once 'DB/DataObject.php';

class DB_Public_user_signup_workflow_permission extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_signup_workflow_permission';    // table name
    public $user_id;                        // varchar(-1)
    public $access_per_id;                  // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
