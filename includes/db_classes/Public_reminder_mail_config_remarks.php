<?php
/**
 * Table Definition for public.reminder_mail_config_remarks
 */
require_once 'DB/DataObject.php';

class DB_Public_reminder_mail_config_remarks extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.reminder_mail_config_remarks';    // table name
    public $reason_for_change;              // text(-1)
    public $updated_by;                     // varchar(-1)
    public $updated_time;                   // timestamp(8)
    public $effective_from;                 // timestamp(8)
    public $changed_from;                   // int4(4)
    public $changed_to;                     // int4(4)
    public $reminder_mail_for;              // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
