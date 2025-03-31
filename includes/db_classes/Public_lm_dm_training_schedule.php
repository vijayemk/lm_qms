<?php
/**
 * Table Definition for public.lm_dm_training_schedule
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_training_schedule extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_training_schedule';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $dm_object_id;                   // varchar(-1) not_null
    public $trainer_object_id;              // varchar(-1) not_null
    public $training_date;                  // varchar(-1) not_null
    public $training_time;                  // varchar(-1) not_null
    public $venue;                          // varchar(-1) not_null
    public $session;                        // text(-1) not_null
    public $status;                         // varchar(-1)
    public $scheduled_by;                   // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1) not_null
    public $modified_time;                  // timestamp(8) not_null
    public $reason;                         // text(-1)
    public $training_link;                  // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
