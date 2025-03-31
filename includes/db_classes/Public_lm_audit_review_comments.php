<?php
/**
 * Table Definition for public.lm_audit_review_comments
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_audit_review_comments extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_audit_review_comments';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $audit_object_id;                // varchar(-1) not_null
    public $remarks;                        // text(-1) not_null
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $review_stage;                   // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
