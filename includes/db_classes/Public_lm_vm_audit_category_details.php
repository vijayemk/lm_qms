<?php
/**
 * Table Definition for public.lm_vm_audit_category_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_vm_audit_category_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_vm_audit_category_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $vm_object_id;                   // varchar(-1) not_null
    public $category_id;                    // varchar(-1)
    public $category_score;                 // int4(4) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8)
    public $auditor_id;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
