<?php
/**
 * Table Definition for public.lm_vm_vendor_details_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_vm_vendor_details_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_vm_vendor_details_master';    // table name
    public $vm_object_id;                   // varchar(-1) not_null primary_key
    public $vendor_name;                    // varchar(-1) not_null
    public $plant_name;                     // varchar(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $status;                         // varchar(-1) not_null
    public $lm_doc_id;                      // varchar(-1) not_null
    public $vm_no;                          // varchar(-1) not_null
    public $final_score;                    // float8(8)
    public $target_date;                    // varchar(-1)
    public $vendor_status;                  // varchar(-1)
    public $message;                        // text(-1)
    public $vendor_type_id;                 // varchar(-1)
    public $wf_status;                      // varchar(-1) not_null
    public $approval_status;                // varchar(-1)
    public $rejected_reason;                // text(-1)
    public $audit_lead;                     // varchar(-1)
    public $audit_from_date;                // varchar(-1)
    public $audit_to_date;                  // varchar(-1)
    public $scope;                          // text(-1)
    public $objectives;                     // text(-1)
    public $effective_from;                 // date(4)
    public $audit_type;                     // varchar(-1)
    public $iteration;                      // int4(4)
    public $is_latest;                      // varchar(-1)
    public $effective_to;                   // date(4)
    public $plant_id;                       // varchar(-1)
    public $dept_id;                        // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
