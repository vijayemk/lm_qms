<?php
/**
 * Table Definition for public.lm_vm_audit_sub_category_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_vm_audit_sub_category_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_vm_audit_sub_category_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $audit_category_object_id;       // varchar(-1) not_null
    public $sub_category;                   // text(-1) not_null
    public $classification;                 // varchar(-1)
    public $score;                          // int4(4)
    public $observation;                    // text(-1)
    public $score1;                         // float8(8)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $vm_object_id;                   // varchar(-1) not_null
    public $vendor_comments;                // text(-1)
    public $severity_level1;                // varchar(-1)
    public $just_action_to_be_taken;        // text(-1)
    public $conformity1;                    // varchar(-1)
    public $severity_per1;                  // int4(4)
    public $conformity2;                    // varchar(-1)
    public $severity_level2;                // varchar(-1)
    public $severity_per2;                  // int4(4)
    public $score2;                         // float8(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
