<?php
/**
 * Table Definition for public.lm_sop_format_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_format_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_format_master';    // table name
    public $format_object_id;               // varchar(-1) not_null primary_key
    public $sop_object_id;                  // varchar(-1)
    public $format_department;              // varchar(-1)
    public $format_name;                    // varchar(-1)
    public $revision;                       // varchar(-1)
    public $created_year;                   // varchar(-1)
    public $created_month;                  // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $is_latest_revision;             // varchar(-1) not_null
    public $is_revised;                     // varchar(-1)
    public $format_no;                      // varchar(-1)
    public $revision_desc;                  // varchar(-1)
    public $status;                         // varchar(-1)
    public $format_desc;                    // varchar(-1)
    public $supersedes;                     // varchar(-1)
    public $orientation;                    // varchar(-1)
    public $lang;                           // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
