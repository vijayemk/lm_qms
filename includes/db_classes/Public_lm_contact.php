<?php
/**
 * Table Definition for public.lm_contact
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_contact extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_contact';    // table name
    public $name;                           // varchar(-1)
    public $short_name;                     // varchar(-1)
    public $address;                        // text(-1)
    public $city;                           // text(-1)
    public $state;                          // varchar(-1)
    public $country;                        // varchar(-1)
    public $pincode;                        // varchar(-1)
    public $email;                          // varchar(-1)
    public $website;                        // varchar(-1)
    public $version;                        // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
