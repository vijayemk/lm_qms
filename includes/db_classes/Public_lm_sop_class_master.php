<?php
/**
 * Table Definition for public.lm_sop_class_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_class_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_class_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $class_no;                       // int4(4)
    public $class_name;                     // varchar(-1)
    public $professor_name;                 // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
