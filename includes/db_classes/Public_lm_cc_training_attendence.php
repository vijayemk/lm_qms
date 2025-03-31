<?php
/**
 * Table Definition for public.lm_cc_training_attendence
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_training_attendence extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_training_attendence';    // table name
    public $cc_object_id;                   // varchar(-1)
    public $training_sch_id;                // varchar(-1)
    public $attended_user_id;               // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
