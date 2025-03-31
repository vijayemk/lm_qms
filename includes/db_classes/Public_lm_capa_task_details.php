<?php
/**
 * Table Definition for public.lm_capa_task_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_capa_task_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_capa_task_details';    // table name
    public $object_id;                      // varchar(-1) not_null unique_key primary_key
    public $capa_object_id;                 // varchar(-1) not_null
    public $task;                           // text(-1) not_null
    public $pri_per_id;                     // varchar(-1)
    public $sec_per_id;                     // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_date;                   // timestamp(8)
    public $task_status_pri;                // varchar(-1)
    public $task_status_sec;                // varchar(-1)
    public $status;                         // varchar(-1) not_null
    public $task_id;                        // varchar(-1)
    public $order1;                         // varchar(-1)
    public $task_status_creator;            // varchar(-1)
    public $wf_status;                      // varchar(-1)
    public $task_completion_date_pri;       // timestamp(8)
    public $task_completion_date_sec;       // timestamp(8)
    public $type;                           // varchar(-1)
    public $is_cc_required;                 // varchar(-1)
    public $task_status_dept_head;          // varchar(-1)
    public $task_completion_date_creator;   // timestamp(8)
    public $task_completion_date_dept_head;   // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
