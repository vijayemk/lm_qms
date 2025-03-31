<?php
/**
 * Table Definition for public.lm_cc_question_options
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_cc_question_options extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_cc_question_options';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $question_id;                    // varchar(-1)
    public $option;                         // text(-1)
    public $option_no;                      // varchar(-1)
    public $order1;                         // int4(4)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
