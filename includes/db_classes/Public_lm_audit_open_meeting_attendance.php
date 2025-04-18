<?php
/**
 * Table Definition for public.lm_audit_open_meeting_attendance
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_open_meeting_attendance extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_open_meeting_attendance';    // table name
    public $audit_object_id;                // varchar(-1)
    public $open_meeting_object_id;         // varchar(-1)
    public $attendee_id;                    // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
