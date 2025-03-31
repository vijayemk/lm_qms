<?php
/**
 * Table Definition for public.lm_cc_monitoring_updated_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_monitoring_updated_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_monitoring_updated_details';    // table name
    public $object_id;                      // varchar(-1)
    public $cc_object_id;                   // varchar(-1)
    public $comments;                       // text(-1)
    public $effectiveness;                  // text(-1)
    public $updated_by;                     // varchar(-1)
    public $updated_date;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
