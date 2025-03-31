<?php
/**
 * Table Definition for public.trash_file
 */
require_once 'DB/DataObject.php';

class DB_Public_trash_file extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.trash_file';    // table name
    public $file_id;                        // varchar(-1)
    public $deleted_by_user;                // varchar(-1)
    public $deleted_time;                   // timestamp(8)
    public $object_id;                      // varchar(-1)
    public $name;                           // varchar(-1)
    public $size;                           // varchar(-1)
    public $hash;                           // varchar(-1)
    public $type;                           // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
