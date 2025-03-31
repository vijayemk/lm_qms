<?php
/**
 * Table Definition for public.password_expiry_remarks
 */
require_once 'DB/DataObject.php';

class DB_Public_password_expiry_remarks extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.password_expiry_remarks';    // table name
    public $reason_for_change;              // text(-1)
    public $updated_by;                     // varchar(-1)
    public $updated_time;                   // timestamp(8)
    public $effective_from;                 // timestamp(8)
    public $changed_from;                   // int4(4)
    public $changed_to;                     // int4(4)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
