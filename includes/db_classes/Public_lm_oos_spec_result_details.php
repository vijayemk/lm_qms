<?php
/**
 * Table Definition for public.lm_oos_spec_result_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_oos_spec_result_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_oos_spec_result_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $oos_object_id;                  // varchar(-1)
    public $ref_phase_id;                   // varchar(-1)
    public $analyst_details_id;             // varchar(-1)
    public $spec_details_id;                // varchar(-1)
    public $obtained_result;                // varchar(-1)
    public $updated_by;                     // varchar(-1)
    public $updated_time;                   // timestamp(8)
    public $obtained_result_remarks;        // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
