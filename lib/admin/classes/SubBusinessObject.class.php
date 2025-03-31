<?php
/**
 * Defines the attributes for sub_business_object
 * Project:     LogicMind
 * File: SubBusinessObject.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */

class SubBusinessObject extends DB_Public_sub_business_object 
{

               /** Attributes */
/**
* represents the id of the SubBusinessObject
* @var string
*/
    var $sub_object_id; 

/**
* represents the name of the SubBusinessObject
* @var string
*/
    var $sub_object_name;

/**
* represents the id of the BusinessObject
* @var string
*/
    var $buss_object_id; 

/**
* represents the Description
* @var string
*/
    var $description; 



						/** Functions*/

/**
*  Get the SubBusinessObject list
*/
function SubBusinessObject_list($object)
{
	$objectlist= array();
        $this->orderBy('sub_object_name');
	$this->whereAdd ("buss_object_id = '$object'");
	$this->find();
	while($this->fetch()){
		$objectlist[] = clone $this;
	}
	return $objectlist;
}


}
?>