<?php
/**
 * Table Definition for public.lm_dm_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_master';    // table name
    public $dm_object_id;                   // varchar(-1) not_null primary_key
    public $dm_department;                  // varchar(-1) not_null
    public $dm_no;                          // varchar(-1) not_null unique_key
    public $lm_doc_id;                      // varchar(-1) not_null
    public $batch_no;                       // varchar(-1)
    public $date_of_occurrence;             // varchar(-1) not_null
    public $time_of_occurrence;             // varchar(-1) not_null
    public $description;                    // text(-1)
    public $immed_action_taken;             // text(-1)
    public $identified_root_cause;          // text(-1)
    public $risk_impact_assessment;         // text(-1)
    public $process_stage_id;               // varchar(-1) default_
    public $scope;                          // varchar(-1)
    public $classification;                 // varchar(-1) default_
    public $approval_status;                // varchar(-1)
    public $status;                         // varchar(-1)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $rejected_reason;                // text(-1)
    public $is_meeting_required;            // varchar(-1)
    public $is_capa_required;               // varchar(-1)
    public $reporting_date;                 // varchar(-1)
    public $reporting_time;                 // varchar(-1)
    public $manu_date;                      // varchar(-1)
    public $manu_expiry_date;               // varchar(-1)
    public $customer;                       // varchar(-1) default_
    public $product_id;                     // varchar(-1) default_
    public $target_date;                    // varchar(-1)
    public $close_out_comments;             // text(-1)
    public $plant_id;                       // varchar(-1) not_null
    public $lot_no;                         // varchar(-1)
    public $batch_size;                     // varchar(-1)
    public $material_type_id;               // varchar(-1) default_
    public $material_name;                  // varchar(-1)
    public $close_out_date;                 // timestamp(8)
    public $dm_type_id;                     // varchar(-1) not_null
    public $is_task_required;               // varchar(-1)
    public $is_training_required;           // varchar(-1)
    public $is_online_exam_required;        // varchar(-1)
    public $is_investigation_required;      // varchar(-1)
    public $date_of_discovery;              // varchar(-1) not_null
    public $time_of_discovery;              // varchar(-1) not_null
    public $wf_status;                      // varchar(-1)
    public $meeting_target_date;            // varchar(-1)
    public $training_target_date;           // varchar(-1)
    public $exam_target_date;               // varchar(-1)
    public $task_target_date;               // varchar(-1)
    public $meeting_status;                 // varchar(-1)
    public $training_status;                // varchar(-1)
    public $exam_status;                    // varchar(-1)
    public $task_status;                    // varchar(-1)
    public $is_cc_required;                 // varchar(-1)
    public $completed_date;                 // timestamp(8)
    public $task_qa_review;                 // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
