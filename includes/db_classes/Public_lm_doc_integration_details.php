<?php
/**
 * Table Definition for public.lm_doc_integration_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_doc_integration_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_doc_integration_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $source_doc_id;                  // varchar(-1) not_null
    public $dest_doc_id;                    // varchar(-1)
    public $tracking_no;                    // varchar(-1) not_null unique_key
    public $cond_id;                        // varchar(-1) not_null
    public $triggered_by;                   // varchar(-1) not_null
    public $triggered_to;                   // varchar(-1)
    public $status;                         // varchar(-1) not_null
    public $reason;                         // text(-1)
    public $triggered_date;                 // timestamp(8)
    public $assigned_to;                    // varchar(-1)
    public $year;                           // varchar(-1)
    public $month;                          // varchar(-1)
    public $date;                           // varchar(-1)
    public $description;                    // varchar(-1)
    public $seq_no;                         // varchar(-1)
    public $ref_object_id;                  // varchar(-1)
    public $assigned_date;                  // timestamp(8)
    public $source_lm_doc_id;               // varchar(-1)
    public $dest_lm_doc_id;                 // varchar(-1)
    public $wf_status;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
