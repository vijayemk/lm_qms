<?php
/**
 * Table Definition for public.lm_audit_closing_meeting_attendance_nah
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_closing_meeting_attendance_nah extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_closing_meeting_attendance_nah';    // table name
    public $audit_object_id;                // varchar(-1) not_null
    public $closing_meeting_object_id;      // varchar(-1)
    public $attended_user;                  // varchar(-1)
    public $dept;                           // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
