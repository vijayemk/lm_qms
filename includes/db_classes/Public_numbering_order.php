<?php
/**
 * Table Definition for public.numbering_order
 */
require_once 'DB/DataObject.php';

class DB_Public_numbering_order extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.numbering_order';    // table name
    public $business_object;                // varchar(-1) not_null
    public $sub_business_object;            // varchar(-1) not_null primary_key
    public $prefix;                         // varchar(-1)
    public $initial_number;                 // varchar(-1)
    public $body;                           // varchar(-1)
    public $suffix;                         // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
