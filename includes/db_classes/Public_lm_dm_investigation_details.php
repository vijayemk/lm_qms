<?php
/**
 * Table Definition for public.lm_dm_investigation_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_investigation_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_investigation_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $dm_object_id;                   // varchar(-1) not_null
    public $investigation_details;          // text(-1) not_null
    public $assigned_by;                    // varchar(-1) not_null
    public $assigned_date;                  // timestamp(8) not_null
    public $responsible_person;             // varchar(-1) not_null
    public $target_date;                    // varchar(-1) not_null
    public $completion_date;                // timestamp(8)
    public $iteration;                      // varchar(-1)
    public $is_latest;                      // varchar(-1)
    public $root_cause;                     // text(-1)
    public $status;                         // varchar(-1) not_null
    public $dept_head_review;               // text(-1)
    public $dept_head_review_date;          // varchar(-1)
    public $qa_reviewer_review;             // text(-1)
    public $qa_reviewer_review_date;        // varchar(-1)
    public $investigation_feedback;         // text(-1)
    public $recall_reason;                  // text(-1)
    public $dept_head_id;                   // varchar(-1)
    public $qa_reviewer_id;                 // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
