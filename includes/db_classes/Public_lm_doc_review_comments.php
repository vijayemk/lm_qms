<?php
/**
 * Table Definition for public.lm_doc_review_comments
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_doc_review_comments extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_doc_review_comments';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $doc_object_id;                  // varchar(-1)
    public $action;                         // int4(4)
    public $comments;                       // text(-1)
    public $commented_by;                   // varchar(-1)
    public $commented_date;                 // timestamp(8)
    public $accept_status;                  // varchar(-1)
    public $status;                         // varchar(-1)
    public $reviewed_by;                    // varchar(-1)
    public $reviewed_date;                  // timestamp(8)
    public $reviewer_comments;              // text(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
