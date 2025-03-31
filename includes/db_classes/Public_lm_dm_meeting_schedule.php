<?php
/**
 * Table Definition for public.lm_dm_meeting_schedule
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_meeting_schedule extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_meeting_schedule';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $meeting_date;                   // varchar(-1) not_null
    public $meeting_time;                   // varchar(-1) not_null
    public $venue;                          // varchar(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1) not_null
    public $modified_time;                  // timestamp(8) not_null
    public $dm_object_id;                   // varchar(-1) not_null
    public $is_latest;                      // varchar(-1)
    public $status;                         // varchar(-1)
    public $reason;                         // text(-1)
    public $meeting_link;                   // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
