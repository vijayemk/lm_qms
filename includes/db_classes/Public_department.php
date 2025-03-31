<?php
/**
 * Table Definition for public.department
 */
require_once 'DB/DataObject.php';

class DB_Public_department extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.department';    // table name
    public $department_id;                  // varchar(-1) not_null primary_key
    public $department;                     // varchar(-1)
    public $department_code;                // varchar(-1)
    public $creator;                        // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $full_name;                      // varchar(-1)
    public $plant_id;                       // varchar(-1)
    public $is_enabled;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
