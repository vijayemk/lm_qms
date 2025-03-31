<?php
/**
 * Table Definition for public.pdf_language
 */
require_once 'DB/DataObject.php';

class DB_Public_pdf_language extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.pdf_language';    // table name
    public $language;                       // varchar(-1)
    public $code;                           // varchar(-1)
    public $is_default;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
