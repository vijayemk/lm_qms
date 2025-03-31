<?php
/**
 * Table Definition for public.lm_doc_file
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_doc_file extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_doc_file';    // table name
    public $object_id;                      // varchar(-1) not_null
    public $file_id;                        // varchar(-1)
    public $attached_by;                    // varchar(-1)
    public $attached_date;                  // timestamp(8)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
