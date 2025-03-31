
<?php
/**
 * Defines the attributes for department
 * Project:     LogicMind
 * File:      Department.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */

class Department extends DB_Public_department 
{
 
               /** Attributes */
/**
* represents the id of the Department
* @var string
*/
    var $department_id;

/**
* represents the Department Name
* @var string
*/
    var $department;

/**
* represents the Department Code
* @var string
*/
    var $department_code;

/**
* represents the Creator
* @var string
*/
    var $creator;
    
/**
* represents the created_time
* @var string
*/
    var $created_time;    
    
                        /** Functions*/
/**
* Get the name of the Department
* @param string $dep_id is the id of Department
*/
function get_department($dep_id)
{
 	$this->get("department_id",$dep_id);
	return ($this->department);
}


/**
*  Get the Department list
*/
function departmentlist()
{
	$departmentlist=array();
    $this->orderBy('department_code');
    $this->find();
    while ($this->fetch()){
		$departmentlist[]= clone $this;
    }
	return $departmentlist;
}

}
?>