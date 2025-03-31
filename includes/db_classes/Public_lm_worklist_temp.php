<?php
/**
 * Table Definition for public.lm_worklist_temp
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_worklist_temp extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_worklist_temp';    // table name
    public $work_user_id;                   // varchar(-1)
    public $object_id;                      // varchar(-1)
    public $work_assigned_date;             // timestamp(8)
    public $status;                         // text(-1)
    public $reference1;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
