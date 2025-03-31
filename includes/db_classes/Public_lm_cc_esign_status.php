<?php
/**
 * Table Definition for public.lm_cc_esign_status
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_esign_status extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_esign_status';    // table name
    public $sop_object_id;                  // varchar(-1)
    public $esign_status;                   // varchar(-1)
    public $signed_by;                      // varchar(-1)
    public $signed_time;                    // timestamp(8)
    public $object_id;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
