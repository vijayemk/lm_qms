<?php
/**
 * Table Definition for public.lm_qms_numbering_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_qms_numbering_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_qms_numbering_master';    // table name
    public $org_id;                         // varchar(-1) not_null
    public $plant_id;                       // varchar(-1) not_null
    public $prefix;                         // varchar(-1) not_null
    public $lm_doc_id;                      // varchar(-1) not_null
    public $doc_short_name;                 // varchar(-1) not_null
    public $number;                         // varchar(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $object_id;                      // varchar(-1) not_null primary_key

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
