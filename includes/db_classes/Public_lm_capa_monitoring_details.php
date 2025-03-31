<?php
/**
 * Table Definition for public.lm_capa_monitoring_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_capa_monitoring_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_capa_monitoring_details';    // table name
    public $monitoring_id;                  // varchar(-1) not_null primary_key
    public $capa_object_id;                 // varchar(-1) not_null
    public $resp;                           // varchar(-1) not_null
    public $level;                          // varchar(-1)
    public $is_active;                      // varchar(-1)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $dept_id;                        // varchar(-1) not_null
    public $final_feedback;                 // text(-1)
    public $effectiveness;                  // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
