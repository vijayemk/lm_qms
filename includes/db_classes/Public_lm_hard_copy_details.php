<?php
/**
 * Table Definition for public.lm_hard_copy_details
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_hard_copy_details extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_hard_copy_details';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $type;                           // varchar(-1)
    public $doc_no;                         // varchar(-1)
    public $name;                           // varchar(-1)
    public $revision;                       // varchar(-1)
    public $supersedes;                     // varchar(-1)
    public $remarks;                        // text(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
