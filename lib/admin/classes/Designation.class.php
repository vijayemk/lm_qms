<?php
/**
 * Defines the attributes for Designation 
 * Project:     LogicMind
 * File:  Designation.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */

class Designation extends DB_Public_designation 
{
               /** Attributes */
/**
* represents Designation Id
* @var string
*/
    var $designation_id;

/**
* represents Designation Name
* @var string
*/
    var $designation_name;
/**
* represents creator
* @var string
*/
    var $created_by;
    /**
* represents created_time
* @var string
*/
    var $created_time;

/**
* represents created_time
* @var string
*/
    var $full_name;
                        /** Functions*/
/**
* Get the name of the Designation
* @param string $desg_id is the id of Designation.
*/
function get_designation($desg_id)
{
	$this->get("designation_id",$desg_id);
	return ($this->designation_name);
}

/**
*  Get the Designation list
*/
function designationlist() {
    $designationlist=array();
    $this->orderBy('designation_name');
    $this->find();
    while ($this->fetch()){
        $designationlist[]= clone $this;
    }
    return $designationlist;
}

}
?>
