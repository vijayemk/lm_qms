<?php
/**
 * Table Definition for public.lm_oos_2phase_resample_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_oos_2phase_resample_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_oos_2phase_resample_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $oos_object_id;                  // varchar(-1)
    public $is_assign_cause_identified;     // varchar(-1)
    public $is_further_invest_required;     // varchar(-1)
    public $error_type_id;                  // varchar(-1)
    public $error_class_id;                 // varchar(-1)
    public $qc_reviewer_comments;           // text(-1)
    public $qc_approver_comments;           // text(-1)
    public $qa_approver_comments;           // text(-1)
    public $resampling_description;         // text(-1)
    public $is_oos_valid;                   // varchar(-1)
    public $assign_cause_details;           // text(-1)
    public $process_stage_id;               // varchar(-1)
    public $batch_no;                       // varchar(-1)
    public $ar_no;                          // varchar(-1)
    public $quantity;                       // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
