<?php
/**
 * Table Definition for public.lm_cc_cancel_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_cancel_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_cancel_details';    // table name
    public $object_id;                      // varchar(-1) not_null
    public $cc_object_id;                   // varchar(-1)
    public $reason;                         // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
