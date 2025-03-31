<?php
/**
 * Table Definition for public.lm_vm_sub_category_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_vm_sub_category_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_vm_sub_category_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $sub_category;                   // text(-1)
    public $description;                    // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $category_id;                    // varchar(-1)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $risk_category;                  // varchar(-1)
    public $is_enabled;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
