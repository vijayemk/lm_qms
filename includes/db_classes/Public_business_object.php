<?php
/**
 * Table Definition for public.business_object
 */
require_once 'DB/DataObject.php';

class DB_Public_business_object extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.business_object';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $object_name;                    // varchar(-1)
    public $full_name;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
