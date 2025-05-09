<?php
/**
 * Table Definition for public.lm_capa_monitoring_updated_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_capa_monitoring_updated_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_capa_monitoring_updated_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $capa_object_id;                 // varchar(-1) not_null
    public $comments;                       // text(-1) not_null
    public $effectiveness;                  // text(-1) not_null
    public $updated_by;                     // varchar(-1) not_null
    public $updated_date;                   // timestamp(8) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
