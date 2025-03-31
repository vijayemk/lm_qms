<?php
/**
 * Table Definition for public.lm_sop_comparison
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_comparison extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_comparison';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $sop_object_id;                  // varchar(-1)
    public $doc_ref_id;                     // varchar(-1)
    public $content;                        // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $is_latest;                      // varchar(-1)
    public $iteration;                      // int4(4)
    public $action;                         // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
