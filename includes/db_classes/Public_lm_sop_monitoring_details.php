<?php
/**
 * Table Definition for public.lm_sop_monitoring_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_monitoring_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_monitoring_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $sop_object_id;                  // varchar(-1)
    public $resp;                           // varchar(-1)
    public $level;                          // varchar(-1)
    public $is_active;                      // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $plant_id;                       // varchar(-1)
    public $dept_id;                        // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
