<?php
/**
 * Table Definition for public.lm_interlinked_sop_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_interlinked_sop_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_interlinked_sop_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $sop_object_id;                  // varchar(-1)
    public $remarks;                        // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
