<?php
/**
 * Table Definition for public.file
 */
require_once 'DB/DataObject.php';

class DB_Public_file extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.file';         // table name
    public $object_id;                      // varchar(-1) not_null default_ primary_key
    public $type;                           // varchar(-1)
    public $name;                           // varchar(-1)
    public $size;                           // varchar(-1)
    public $hash;                           // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
