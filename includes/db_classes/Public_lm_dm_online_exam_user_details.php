<?php
/**
 * Table Definition for public.lm_dm_online_exam_user_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_online_exam_user_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_online_exam_user_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $dm_object_id;                   // varchar(-1) not_null
    public $assigned_by;                    // varchar(-1) not_null
    public $assigned_to;                    // varchar(-1) not_null
    public $assigned_date;                  // timestamp(8) not_null
    public $pass_mark;                      // int4(4) not_null
    public $attempt;                        // int4(4)
    public $status;                         // varchar(-1)
    public $is_latest;                      // varchar(-1)
    public $capa_no;                        // varchar(-1)
    public $question_limit;                 // int4(4) not_null
    public $attempt_limit;                  // int4(4) not_null
    public $attempt_status;                 // varchar(-1)
    public $mark_scored;                    // int4(4)
    public $exam_result;                    // varchar(-1)
    public $exam_completed_date;            // timestamp(8)
    public $exam_details_id;                // varchar(-1) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
