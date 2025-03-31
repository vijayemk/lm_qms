<?php
/**
 * Table Definition for public.lm_dm_type_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_type_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_type_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $type;                           // varchar(-1) not_null
    public $description;                    // varchar(-1)
    public $is_enabled;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
