<?php
/**
 * Table Definition for public.user_profile
 */
require_once 'DB/DataObject.php';

class DB_Public_user_profile extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_profile';    // table name
    public $user_id;                        // varchar(-1) not_null primary_key
    public $mothers_maiden_name;            // varchar(-1)
    public $dob;                            // varchar(-1)
    public $place_of_birth;                 // varchar(-1)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
