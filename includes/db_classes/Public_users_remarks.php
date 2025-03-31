<?php
/**
 * Table Definition for public.users_remarks
 */
require_once 'DB/DataObject.php';

class DB_Public_users_remarks extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.users_remarks';    // table name
    public $user_id;                        // varchar(-1)
    public $remarks_user;                   // varchar(-1)
    public $remarks_date;                   // timestamp(8)
    public $remarks;                        // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
