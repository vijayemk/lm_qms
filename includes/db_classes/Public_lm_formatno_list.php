<?php
/**
 * Table Definition for public.lm_formatno_list
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_formatno_list extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_formatno_list';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $object;                         // varchar(-1)
    public $sop_type;                       // varchar(-1)
    public $format_no;                      // varchar(-1)
    public $valid_from;                     // date(4)
    public $valid_to;                       // date(4)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $is_latest_revision;             // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
