<?php
/**
 * Table Definition for public.lm_interlinked_sop_list
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_interlinked_sop_list extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_interlinked_sop_list';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $interlink_sop_master_id;        // varchar(-1)
    public $interlinked_sop_id;             // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
