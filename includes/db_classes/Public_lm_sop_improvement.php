<?php
/**
 * Table Definition for public.lm_sop_improvement
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_improvement extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_improvement';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $sop_object_id;                  // varchar(-1)
    public $comments;                       // text(-1)
    public $commented_by;                   // varchar(-1)
    public $commented_date;                 // timestamp(8)
    public $comment_implementation_status;   // varchar(-1)
    public $comment_reviewed_by;            // varchar(-1)
    public $reviewer_comments;              // text(-1)
    public $reviewed_date;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
