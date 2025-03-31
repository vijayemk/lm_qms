<?php
/**
 * Table Definition for public.lm_sop_download_history
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_download_history extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_download_history';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $user_id;                        // varchar(-1)
    public $sop_object_id;                  // varchar(-1)
    public $ref_id;                         // varchar(-1)
    public $download_date;                  // timestamp(8)
    public $ip_address;                     // varchar(-1)
    public $reason;                         // text(-1)
    public $year;                           // varchar(-1)
    public $month;                          // varchar(-1)
    public $plant;                          // varchar(-1)
    public $department;                     // varchar(-1)
    public $stage;                          // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
