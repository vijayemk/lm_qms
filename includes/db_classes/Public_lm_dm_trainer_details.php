<?php
/**
 * Table Definition for public.lm_dm_trainer_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_trainer_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_trainer_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $dm_object_id;                   // varchar(-1) not_null
    public $trainer;                        // varchar(-1) not_null
    public $status;                         // varchar(-1)
    public $is_latest;                      // varchar(-1)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $title;                          // text(-1) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
