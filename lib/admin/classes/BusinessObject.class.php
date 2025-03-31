<?php
/**
 * Defines the attributes for business_object 
 * Project:     LogicMind
 * File:        BusinessObject.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */

class BusinessObject extends DB_Public_business_object 
{
               /** Attributes */
/**
* represents the id of the BusinessObject
* @var string
*/
    var $object_id;

/**
* represents the name of the BusinessObject
* @var string
*/
    var $object_name;

/**
* represents the full name of the BusinessObject
* @var string
*/
    var $full_name;


                       /** Functions*/
/**
* Get the name of the BusinessObject
* @param string $uid is the id of BusinessObject.
*/

function get_business_object($uid)
{
    $this->get("object_id",$uid);
    return $this->object_name;
}

/**
*  Get the BusinessObject list
*/

function business_object_list()
{
	$objectlist= array();
	$this->orderBy('object_name');
	$this->find();
		while($this->fetch()){
			$objectlist[] = clone $this;
		}
	return $objectlist;
}

}

?>