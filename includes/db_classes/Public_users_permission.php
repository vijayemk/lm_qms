<?php
/**
 * Table Definition for public.users_permission
 */
require_once 'DB/DataObject.php';

class DB_Public_users_permission extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.users_permission';    // table name
    public $user_id;                        // varchar(-1)
    public $access_per_id;                  // varchar(-1)
    public $is_enabled;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
