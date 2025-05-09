<?php
/**
 * Table Definition for public.user_reporting
 */
require_once 'DB/DataObject.php';

class DB_Public_user_reporting extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.user_reporting';    // table name
    public $user_id;                        // varchar(-1)
    public $level;                          // varchar(-1)
    public $reporting_to;                   // varchar(-1)
    public $reporting_to_dept;              // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
