<?php
/**
 * Table Definition for public.lm_vm_vendor_org
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_vm_vendor_org extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_vm_vendor_org';    // table name
    public $org_id;                         // varchar(-1) not_null primary_key
    public $org_name;                       // varchar(-1) not_null
    public $address;                        // text(-1) not_null
    public $city;                           // varchar(-1) not_null
    public $state;                          // varchar(-1) not_null
    public $country;                        // varchar(-1) not_null
    public $pincode;                        // varchar(-1) not_null
    public $landline_number;                // varchar(-1)
    public $email;                          // varchar(-1)
    public $website;                        // varchar(-1)
    public $established_year;               // varchar(-1)
    public $no_of_employees;                // varchar(-1)
    public $annual_turn_over;               // varchar(-1)
    public $certifications;                 // text(-1)
    public $created_by;                     // varchar(-1) not_null
    public $created_time;                   // timestamp(8) not_null
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $primary_contact;                // varchar(-1)
    public $primary_contact_number;         // varchar(-1)
    public $secondary_contact;              // varchar(-1)
    public $secondary_contact_number;       // varchar(-1)
    public $short_name;                     // varchar(-1)
    public $is_active;                      // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
