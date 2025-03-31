<?php
/**
 * Table Definition for public.lm_audit_open_meeting_schedule
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_open_meeting_schedule extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_open_meeting_schedule';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $meeting_date;                   // varchar(-1)
    public $meeting_time;                   // varchar(-1)
    public $venue;                          // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $audit_object_id;                // varchar(-1)
    public $is_latest;                      // varchar(-1)
    public $status;                         // varchar(-1)
    public $reason;                         // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
