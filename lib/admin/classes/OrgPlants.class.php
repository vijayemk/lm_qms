<?php
/**
 * Defines the attributes for org_plants
 * Project:     LogicMind
 * File:  OrgPlants.class.php
 *
 * @author Ananthakumar V
 * @since 05/10/2018
 * @package admin
 * @version 1.0
 */

class OrgPlants extends DB_Public_org_plants  {

    /** Attributes */
    /**
    * represents the id of the Plant
    * @var string
    */ 
    var $plant_id;

    /**
    * represents the name of the org_plants
    * @var string
    */
    var $org_id;
    
    /**
    * represents the plant_name of the org_plants
    * @var string
    */
    var $plant_name;
    
    /**
    * represents the short_name of the org_plants
    * @var string
    */
    var $short_name;

    /**
    * represents the address of the org_plants
    * @var string
    */
    var $address;

    /**
    * represents the city of the org_plants
    * @var string
    */
    var $city;

    /**
    * represents the state of the org_plants
    * @var string
    */
    var $state; 

    /**
    * represents the country of the org_plants
    * @var string
    */
    var $country;

    /**
    * represents the pincode of the org_plants
    * @var integer
    */
    var $pincode;

    /**
    * represents the contact_number of the org_plants
    * @var string
    */
    var $contact_number;

    /**
    * represents the Email of the org_plants
    * @var string
    */
    var $email;
    
    /**
    * represents the Website of the org_plants
    * @var string
    */
    var $website;

    /**
    * represents the created_by of the org_plants
    * @var string
    */
    var $created_by;
    
    /**
    * represents the created_time of the org_plants
    * @var string
    */
    var $created_time;
    
    /**
    * represents the modified_by of the org_plants
    * @var string
    */
    var $modified_by;
    /**
    * represents the modified_time of the org_plants
    * @var string
    */
    var $modified_time;
    /** Functions*/
    /**
    * Get the name of the Plant
    * @param string $org_id is the id of Plant.
    */

    function get_plant($plant_id) {
        $this->get("plant_id",$plant_id);
        return ($this->plant_name);
    }

    /**
    *  Get the Plant list
    */
    function plantlist() {
        $plantlist = array();
        $this->orderBy('plant_name');
        $this->find();
        while ($this->fetch()) {
            $plantlist[]= clone $this ;
        }
        return $plantlist;
    }
}
?>
