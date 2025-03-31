<?php
/**
 * Table Definition for public.lm_customer_details_master
 */
require_once 'DB/DataObject.php';

class DB_Public_lm_customer_details_master extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'public.lm_customer_details_master';    // table name
    public $object_id;                      // varchar(-1) not_null primary_key
    public $customer_name;                  // varchar(-1)
    public $address;                        // text(-1)
    public $city;                           // varchar(-1)
    public $state;                          // varchar(-1)
    public $country;                        // varchar(-1)
    public $pincode;                        // varchar(-1)
    public $contact_no;                     // varchar(-1)
    public $contact_email;                  // varchar(-1)
    public $created_by;                     // varchar(-1)
    public $created_time;                   // timestamp(8)
    public $modified_by;                    // varchar(-1)
    public $modified_time;                  // timestamp(8)
    public $contact_person_name;            // varchar(-1)
    public $short_name;                     // varchar(-1)
    public $is_enabled;                     // varchar(-1)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
