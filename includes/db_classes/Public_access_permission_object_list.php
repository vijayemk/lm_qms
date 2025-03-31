<?php
/**
 * Table Definition for public.access_permission_object_list
 */
require_once 'DB/DataObject.php';

class DB_Public_access_permission_object_list extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.access_permission_object_list';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $name;                           // varchar(-1)
    public $description;                    // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
