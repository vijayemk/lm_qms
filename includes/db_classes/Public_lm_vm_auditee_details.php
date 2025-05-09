<?php
/**
 * Table Definition for public.lm_vm_auditee_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_vm_auditee_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_vm_auditee_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $vm_object_id;                   // varchar(-1) not_null
    public $auditee_name;                   // varchar(-1) not_null
    public $contact_number;                 // varchar(-1) not_null
    public $email;                          // varchar(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
