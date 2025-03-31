<?php
/**
 * Table Definition for public.lm_cc_meeting_agenda_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_meeting_agenda_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_meeting_agenda_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $cc_object_id;                   // varchar(-1)
    public $agenda;                         // text(-1)
    public $conclusion;                     // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // varchar(-1)
    public $meeting_object_id;              // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
