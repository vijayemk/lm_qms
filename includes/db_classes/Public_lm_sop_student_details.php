<?php
/**
 * Table Definition for public.lm_sop_student_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_student_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_student_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $student_name;                   // varchar(-1)
    public $register_no;                    // int4(4)
    public $address;                        // text(-1)
    public $phone_no;                       // int4(4)
    public $email;                          // varchar(-1)
    public $is_completed_prog;              // varchar(-1)
    public $class;                          // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
