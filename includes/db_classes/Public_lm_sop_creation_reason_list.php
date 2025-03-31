<?php
/**
 * Table Definition for public.lm_sop_creation_reason_list
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_creation_reason_list extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_creation_reason_list';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $reason;                         // varchar(-1) not_null
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
