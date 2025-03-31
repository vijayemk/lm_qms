<?php
/**
 * Table Definition for public.lm_workflow_actions
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_workflow_actions extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_workflow_actions';    // table name
    public $lm_workflow_action_id;          // int4(4) not_null primary_key
    public $lm_workflow_action_name;        // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
