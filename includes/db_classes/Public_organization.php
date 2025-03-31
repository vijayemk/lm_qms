<?php
/**
 * Table Definition for public.organization
 */
require_once 'DB/DataObject.php';

class DB_Public_organization extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.organization';    // table name
    public $org_id;                         // varchar(-1) not_null primary_key
    public $org_name;                       // varchar(-1)
    public $address;                        // text(-1)
    public $city;                           // varchar(-1)
    public $state;                          // varchar(-1)
    public $country;                        // varchar(-1)
    public $pincode;                        // varchar(-1)
    public $contact_number;                 // varchar(-1)
    public $email;                          // varchar(-1)
    public $website;                        // varchar(-1)
    public $short_name;                     // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $is_active;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
