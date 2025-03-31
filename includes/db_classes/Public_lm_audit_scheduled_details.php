<?php
/**
 * Table Definition for public.lm_audit_scheduled_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_scheduled_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_scheduled_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $lm_doc_id;                      // varchar(-1)
    public $audit_type_id;                  // varchar(-1)
    public $audit_sub_type_id;              // varchar(-1)
    public $audit_no;                       // varchar(-1)
    public $description;                    // text(-1) not_null
    public $from_date;                      // timestamp(8)
    public $to_date;                        // timestamp(8)
    public $no_of_days;                     // varchar(-1)
    public $status;                         // varchar(-1)
    public $schedule_by;                    // varchar(-1)
    public $schedule_time;                  // timestamp(8)
    public $schedule_by_plant;              // varchar(-1)
    public $schedule_by_dept;               // varchar(-1)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $assigned_by;                    // varchar(-1)
    public $assigned_date;                  // timestamp(8)
    public $audit_lead;                     // varchar(-1)
    public $audit_lead_plant;               // varchar(-1)
    public $audit_lead_dept;                // varchar(-1)
    public $objectives;                     // text(-1)
    public $scope;                          // text(-1)
    public $wf_status;                      // varchar(-1)
    public $approval_status;                // varchar(-1)
    public $rejected_reason;                // text(-1)
    public $is_meeting_required;            // varchar(-1)
    public $meeting_status;                 // varchar(-1)
    public $audit_status;                   // varchar(-1)
    public $audit_plant;                    // varchar(-1)
    public $audit_dept;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
