<?php
/**
 * Table Definition for public.lm_doc_management_auth
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_doc_management_auth extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_doc_management_auth';    // table name
    public $lm_doc_id;                      // varchar(-1)
    public $user_id;                        // varchar(-1)
    public $action;                         // varchar(-1)
    public $user_dept;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
