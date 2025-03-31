<?php
/**
 * Table Definition for public.lm_dm_training_schedule_mail
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_training_schedule_mail extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_training_schedule_mail';    // table name
    public $dm_object_id;                   // varchar(-1) not_null
    public $training_sch_id;                // varchar(-1) not_null
    public $mail_send_to;                   // varchar(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1) not_null
    public $modified_time;                  // timestamp(8) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
