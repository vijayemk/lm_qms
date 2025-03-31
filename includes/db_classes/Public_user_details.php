<?php
/**
 * Table Definition for public.user_details
 */
require_once 'DB/DataObject.php';

class DB_Public_user_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $user_id;                        // varchar(-1)
    public $user_name;                      // varchar(-1)
    public $user_email;                     // varchar(-1)
    public $user_password;                  // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
