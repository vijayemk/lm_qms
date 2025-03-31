<?php
/**
 * Table Definition for public.designation
 */
require_once 'DB/DataObject.php';

class DB_Public_designation extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.designation';    // table name
    public $designation_id;                 // varchar(-1) not_null primary_key
    public $designation_name;               // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $full_name;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
