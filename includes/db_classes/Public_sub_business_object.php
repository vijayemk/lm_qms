<?php
/**
 * Table Definition for public.sub_business_object
 */
require_once 'DB/DataObject.php';

class DB_Public_sub_business_object extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.sub_business_object';    // table name
    public $sub_object_id;                  // varchar(-1) not_null default_ primary_key
    public $sub_object_name;                // varchar(-1)
    public $buss_object_id;                 // varchar(-1)
    public $description;                    // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
