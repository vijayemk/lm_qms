<?php
/**
 * Table Definition for public.lm_oos_cft_review_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_oos_cft_review_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_oos_cft_review_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $oos_object_id;                  // varchar(-1)
    public $ref_phase_id;                   // varchar(-1)
    public $review_comments;                // text(-1)
    public $reviewed_by;                    // varchar(-1)
    public $reviewed_date;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
