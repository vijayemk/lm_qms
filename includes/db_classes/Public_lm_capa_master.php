<?php
/**
 * Table Definition for public.lm_capa_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_capa_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_capa_master';    // table name
    public $capa_object_id;                 // varchar(-1) not_null primary_key
    public $capa_department;                // varchar(-1) not_null
    public $capa_no;                        // varchar(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $lm_doc_id;                      // varchar(-1) not_null
    public $status;                         // varchar(-1) not_null
    public $is_meeting_required;            // varchar(-1)
    public $source_doc_no;                  // varchar(-1) not_null
    public $target_date;                    // varchar(-1)
    public $plant_id;                       // varchar(-1) not_null
    public $meeting_status;                 // varchar(-1)
    public $wf_status;                      // varchar(-1) not_null
    public $approval_status;                // varchar(-1)
    public $rejected_reason;                // text(-1)
    public $close_out_date;                 // timestamp(8)
    public $trigger_type;                   // varchar(-1)
    public $reason;                         // text(-1)
    public $present_system;                 // text(-1)
    public $is_monitoring_required;         // varchar(-1)
    public $immed_action_taken;             // text(-1)
    public $task_target_date;               // varchar(-1)
    public $task_status;                    // varchar(-1)
    public $completed_date;                 // timestamp(8)
    public $task_qa_review;                 // text(-1)
    public $monitoring_target_date;         // varchar(-1)
    public $immed_action_taken_by;          // varchar(-1)
    public $immed_action_taken_date;        // varchar(-1)
    public $capa_triggered_from;            // varchar(-1)
    public $close_out_comments;             // varchar(-1)
    public $task_close_out_review;          // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
