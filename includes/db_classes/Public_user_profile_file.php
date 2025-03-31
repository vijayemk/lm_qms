<?php
/**
 * Table Definition for public.user_profile_file
 */
require_once 'DB/DataObject.php';

class DB_Public_user_profile_file extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_profile_file';    // table name
    public $user_id;                        // varchar(-1)
    public $type;                           // varchar(-1)
    public $name;                           // varchar(-1)
    public $size;                           // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $is_latest_file;                 // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
