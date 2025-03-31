<?php
/**
 * Table Definition for public.lm_workflow
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_workflow extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_workflow';    // table name
    public $object_id;                      // varchar(-1) not_null
    public $lm_workflow_date;               // timestamp(8)
    public $lm_workflow_user;               // varchar(-1)
    public $lm_workflow_status;             // varchar(-1)
    public $lm_workflow_actions;            // int4(4)
    public $assigned_by;                    // varchar(-1)
    public $assigned_date;                  // timestamp(8)
    public $workflow_object_id;             // varchar(-1) not_null
    public $desig_id;                       // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
