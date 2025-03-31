<?php
/**
 * Table Definition for public.lm_extension_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_extension_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_extension_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $ref_object_id;                  // varchar(-1)
    public $existing_target_date;           // varchar(-1)
    public $proposed_target_date;           // varchar(-1)
    public $status;                         // varchar(-1)
    public $reason;                         // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // varchar(-1)
    public $action_status;                  // varchar(-1)
    public $extension_for;                  // varchar(-1)
    public $approved_by;                    // varchar(-1)
    public $approved_date;                  // varchar(-1)
    public $ref_object_id1;                 // varchar(-1)
    public $approver_comments;              // text(-1)
    public $approval_status;                // varchar(-1)
    public $requested_to;                   // varchar(-1)
    public $wf_status;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
