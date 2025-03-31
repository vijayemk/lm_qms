<?php
/**
 * Table Definition for public.lm_sop_meeting_schedule_mail
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_meeting_schedule_mail extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_meeting_schedule_mail';    // table name
    public $sop_object_id;                  // varchar(-1)
    public $mail_send_to_dept;              // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $meeting_object_id;              // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
