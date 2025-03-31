<?php
/**
 * Table Definition for public.lm_sop_meeting_attendance_nah
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_meeting_attendance_nah extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_meeting_attendance_nah';    // table name
    public $sop_object_id;                  // varchar(-1)
    public $attended_user;                  // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $meeting_object_id;              // varchar(-1)
    public $dept;                           // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
