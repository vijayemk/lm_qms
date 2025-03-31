<?php
/**
 * Defines the attributes for organization
 * Project:     LogicMind
 * File:  Organization.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */


class Organization extends DB_Public_organization  {

    /** Attributes */
    /**
    * represents the id of the Organization
    * @var string
    */ 
    var $org_id;

    /**
    * represents the name of the Organization
    * @var string
    */
    var $org_name;

    /**
    * represents the address1 of the Organization
    * @var string
    */
	var $address;

    /**
    * represents the city of the Organization
    * @var string
    */
    var $city;

    /**
    * represents the state of the Organization
    * @var string
    */
    var $state; 

    /**
    * represents the country of the Organization
    * @var string
    */
    var $country;

    /**
    * represents the pincode of the Organization
    * @var integer
    */
    var $pincode;

    /**
    * represents the contact_number of the Organization
    * @var string
    */
    var $contact_number;

    /**
    * represents the Email of the Organization
    * @var string
    */
    var $email;
    
    /**
    * represents the Website of the Organization
    * @var string
    */
    var $website;
    
    /**
    * represents the Full Name of the Organization
    * @var string
    */
    var $short_name;
    /**
    * represents the created_by of the Organization
    * @var string
    */
    var $created_by;
    
    /**
    * represents the created_time of the Organization
    * @var string
    */
    var $created_time;
    
    /**
    * represents the modified_by of the Organization
    * @var string
    */
    var $modified_by;
    /**
    * represents the modified_time of the Organization
    * @var string
    */
    var $modified_time;
    /** Functions*/
    /**
    * Get the name of the Organization
    * @param string $org_id is the id of Organization.
    */

    function get_organization($org_id) {
        $this->get("org_id",$org_id);
        return ($this->org_name);
    }

    /**
    *  Get the Organization list
    */
    function organizationlist() {
        $organizationlist=array();
        $this->orderBy('org_name');
        $this->find();
        while ($this->fetch()) {
            $organizationlist[]= clone $this ;
        }
        return $organizationlist;
    }
}
?>
