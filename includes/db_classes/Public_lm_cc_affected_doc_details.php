<?php
/**
 * Table Definition for public.lm_cc_affected_doc_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_affected_doc_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_affected_doc_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $cc_object_id;                   // varchar(-1)
    public $affected_doc_id;                // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
