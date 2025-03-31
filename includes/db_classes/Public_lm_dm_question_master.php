<?php
/**
 * Table Definition for public.lm_dm_question_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_dm_question_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_dm_question_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $dm_object_id;                   // varchar(-1) not_null
    public $type;                           // varchar(-1) not_null
    public $question;                       // text(-1) not_null
    public $answer_no;                      // int4(4) not_null
    public $order1;                         // int4(4)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $trainer_object_id;              // varchar(-1) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
