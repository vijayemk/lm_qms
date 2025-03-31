<?php
/**
 * Table Definition for public.lm_audit_remarks
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_remarks extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_remarks';    // table name
    public $object_id;                      // varchar(-1) not_null
    public $remarks_user;                   // varchar(-1)
    public $remarks_date;                   // timestamp(8)
    public $remarks;                        // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
