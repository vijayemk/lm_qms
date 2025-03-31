<?php
/**
 * Table Definition for public.lm_dm_online_exam_passmark_remarks
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_online_exam_passmark_remarks extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_online_exam_passmark_remarks';    // table name
    public $reason_for_change;              // text(-1)
    public $changed_from;                   // int4(4)
    public $changed_to;                     // int4(4)
    public $effective_from;                 // timestamp(8)
    public $updated_by;                     // varchar(-1)
    public $updated_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
