<?php
/**
 * Table Definition for public.lm_pre_loaded_template
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_pre_loaded_template extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_pre_loaded_template';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $name;                           // varchar(-1)
    public $content;                        // text(-1)
    public $is_moved;                       // varchar(-1)
    public $sop_object_id;                  // varchar(-1)
    public $sop_reference;                  // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $moved_by;                       // varchar(-1)
    public $moved_date;                     // timestamp(8)
    public $orientation;                    // varchar(-1)
    public $lang;                           // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
