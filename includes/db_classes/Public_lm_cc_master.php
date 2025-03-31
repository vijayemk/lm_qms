<?php
/**
 * Table Definition for public.lm_cc_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_master';    // table name
    public $cc_object_id;                   // varchar(-1) not_null primary_key
    public $cc_department;                  // varchar(-1)
    public $cc_draft_number;                // varchar(-1)
    public $cc_no;                          // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $present_system;                 // text(-1)
    public $proposed_change;                // text(-1)
    public $impact_assessment;              // text(-1)
    public $justification;                  // text(-1)
    public $lm_doc_id;                      // varchar(-1)
    public $classification;                 // varchar(-1)
    public $approval_status;                // varchar(-1)
    public $status;                         // varchar(-1)
    public $rejected_reason;                // text(-1)
    public $is_meeting_required;            // varchar(-1)
    public $proposed_methodology;           // text(-1)
    public $is_training_required;           // varchar(-1)
    public $target_date;                    // varchar(-1)
    public $change_follow_up;               // text(-1)
    public $change_effectiveness_in_doc;    // text(-1)
    public $change_effectiveness_in_conseq_doc;   // text(-1)
    public $plant_id;                       // varchar(-1)
    public $close_out_date;                 // timestamp(8)
    public $change_type_id;                 // varchar(-1)
    public $is_task_required;               // varchar(-1)
    public $effectiveness_date;             // timestamp(8)
    public $material_type_id;               // varchar(-1)
    public $material_name;                  // varchar(-1)
    public $product_id;                     // varchar(-1)
    public $scope;                          // varchar(-1)
    public $customer;                       // varchar(-1)
    public $batch_no;                       // varchar(-1)
    public $batch_size;                     // varchar(-1)
    public $lot_no;                         // varchar(-1)
    public $process_stage_id;               // varchar(-1)
    public $manu_date;                      // varchar(-1)
    public $manu_expiry_date;               // varchar(-1)
    public $is_online_exam_required;        // varchar(-1)
    public $wf_status;                      // varchar(-1)
    public $brief_desc;                     // text(-1)
    public $dmf_desc;                       // text(-1)
    public $excpected_benifits;             // text(-1)
    public $meeting_status;                 // varchar(-1)
    public $training_status;                // varchar(-1)
    public $exam_status;                    // varchar(-1)
    public $task_status;                    // varchar(-1)
    public $meeting_target_date;            // varchar(-1)
    public $training_target_date;           // varchar(-1)
    public $exam_target_date;               // varchar(-1)
    public $task_target_date;               // varchar(-1)
    public $dmf_status;                     // varchar(-1)
    public $is_cutomer_approval_required;   // varchar(-1)
    public $is_regulatory_approval_required;   // varchar(-1)
    public $is_monitoring_required;         // varchar(-1)
    public $monitoring_target_date;         // varchar(-1)
    public $estimated_cost;                 // text(-1)
    public $trigger_type;                   // varchar(-1)
    public $customer_approval_status;       // varchar(-1)
    public $source_doc_no;                  // varchar(-1)
    public $reason;                         // text(-1)
    public $completed_date;                 // timestamp(8)
    public $close_out_comments;             // text(-1)
    public $task_qa_review;                 // text(-1)
    public $cc_triggered_from;              // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
