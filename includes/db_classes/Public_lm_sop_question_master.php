<?php
/**
 * Table Definition for public.lm_sop_question_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_sop_question_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_sop_question_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $sop_object_id;                  // varchar(-1)
    public $type;                           // varchar(-1)
    public $question;                       // text(-1)
    public $answer_no;                      // text(-1)
    public $order1;                         // int4(4)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
