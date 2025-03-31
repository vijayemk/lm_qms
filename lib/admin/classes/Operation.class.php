<?php
/**
 * Defines the attributes for operation
 * Project:     LogicMind
 * File:  Operation.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
*/
class Operation extends DB_Public_operation
{
                        /** Attributes*/
/**
* represents the id of the Operation
* @var string
*/
var $operation_id;

/**
* represents the name of the Operation
* @var string
*/
var $operation_name;
/**
* represents the creator
* @var string
*/
var $creator;

/**
* represents the creator
* @var string
*/
var $created_time;        
        


                         /**Functions*/
/**
* this function is  used to delete Operation
* @param string $operation_id is the id of Operation.
*/
function delete_operation($operation_id)
{
    $this->get($operation_id);
    $res = $this->delete();
}


/**
*  Get the Operation list
*/
function operationlist()
{
	$this->orderBy('operation_name');
	$this->find();
	$operationlist= array();
		while($this->fetch()){
			$operationlist[] = clone $this;
		}
	return $operationlist;
}

}
 ?>
