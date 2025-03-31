<?php
/**
 * Table Definition for public.lm_dm_online_exam_user_question_ans_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_online_exam_user_question_ans_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_online_exam_user_question_ans_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $exam_id;                        // varchar(-1) not_null
    public $question_id;                    // varchar(-1) not_null
    public $ans;                            // varchar(-1)
    public $ans_date;                       // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
