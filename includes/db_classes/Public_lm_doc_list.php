<?php
/**
 * Table Definition for public.lm_doc_list
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_doc_list extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_doc_list';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $u_key;                          // varchar(-1) unique_key
    public $short_name;                     // varchar(-1)
    public $doc_name;                       // varchar(-1)
    public $doc_code;                       // varchar(-1) unique_key
    public $is_enabled;                     // varchar(-1)
    public $order1;                         // int4(4)
    public $doc_group;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
