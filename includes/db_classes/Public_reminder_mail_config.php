<?php
/**
 * Table Definition for public.reminder_mail_config
 */
require_once 'DB/DataObject.php';

class DB_Public_reminder_mail_config extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.reminder_mail_config';    // table name
    public $no_of_days;                     // int4(4)
    public $reminder_mail_for;              // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
