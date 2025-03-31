<?php
/**
 * Table Definition for public.lm_oos_spec_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_oos_spec_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_oos_spec_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $oos_object_id;                  // varchar(-1) not_null
    public $test_object_id;                 // varchar(-1) not_null
    public $spec_limit;                     // text(-1)
    public $updated_by;                     // varchar(-1)
    public $updated_date;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
