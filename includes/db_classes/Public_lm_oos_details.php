<?php
/**
 * Table Definition for public.lm_oos_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_oos_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_oos_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $lm_doc_id;                      // varchar(-1)
    public $oos_no;                         // varchar(-1)
    public $reporting_date;                 // timestamp(8)
    public $description;                    // text(-1)
    public $product_id;                     // varchar(-1)
    public $quantity;                       // varchar(-1)
    public $batch_no;                       // varchar(-1)
    public $batch_size;                     // varchar(-1)
    public $lot_no;                         // varchar(-1)
    public $process_stage_id;               // varchar(-1)
    public $manufacturing_date;             // timestamp(8)
    public $expiry_date;                    // timestamp(8)
    public $material_type_id;               // varchar(-1)
    public $specification_no;               // varchar(-1)
    public $test_procedure_no;              // varchar(-1)
    public $ar_no;                          // varchar(-1)
    public $instrument_id;                  // varchar(-1)
    public $calibrated_on;                  // timestamp(8)
    public $next_calibration_date;          // timestamp(8)
    public $ref_test_protocol;              // text(-1)
    public $time_point;                     // text(-1)
    public $storage_condition;              // text(-1)
    public $target_date;                    // timestamp(8)
    public $is_capa_required;               // varchar(-1)
    public $qms_capa_no;                    // varchar(-1)
    public $manual_capa_no;                 // varchar(-1)
    public $plant_id;                       // varchar(-1)
    public $department_id;                  // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $customer_id;                    // varchar(-1)
    public $final_closure_date;             // timestamp(8)
    public $date_of_occurrence;             // varchar(-1)
    public $time_of_occurrence;             // varchar(-1)
    public $final_closure_conclusion;       // text(-1)
    public $impact_assesment;               // text(-1)
    public $risk_assesment;                 // text(-1)
    public $qc_reason_for_rejection;        // text(-1)
    public $qa_reason_for_rejection;        // text(-1)
    public $status;                         // varchar(-1)
    public $material_name;                  // varchar(-1)
    public $wf_status;                      // varchar(-1)
    public $is_1phase_mfg_invest_required;   // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
