<?php
/**
 * Table Definition for public.lm_sop_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_details';    // table name
    public $sop_object_id;                  // varchar(-1)
    public $sop_content;                    // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $last_modified_by;               // varchar(-1)
    public $last_modified_time;             // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
