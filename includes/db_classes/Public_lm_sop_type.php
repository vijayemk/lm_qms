<?php
/**
 * Table Definition for public.lm_sop_type
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_type extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_type';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $type;                           // varchar(-1)
    public $description;                    // varchar(-1)
    public $creator;                        // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modifier;                       // varchar(-1)
    public $modified_time;                  // varchar(-1)
    public $is_enabled;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
