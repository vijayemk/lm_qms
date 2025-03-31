<?php
/**
 * Table Definition for public.pdf_permission
 */
require_once 'DB/DataObject.php';

class DB_Public_pdf_permission extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.pdf_permission';    // table name
    public $user_id;                        // varchar(-1)
    public $object;                         // varchar(-1)
    public $operation;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
