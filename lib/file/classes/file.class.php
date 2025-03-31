<?php
/**
 * Defines the attributes for File 
 * Project:     LogicMind
 * File:      file.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package file
 * @version 1.0
 */
class File extends DB_Public_file
{
               /** Attributes */
/**
* represents file id
* @var string
*/
	var $object_id;

/**
* represents file type
* @var string
*/
	var $type;

/**
* represents file name
* @var string
*/
	var $name;

/**
* represents file size
* @var string
*/
	var $size;

/**
* represents hash of file
* @var string
*/
	var $hash;


	function set_file_id($oid)
	{
		$this->oid=$oid;
	}

	function get_file_id( )
	{
		$oid=$this->oid;
		return($oid);
	}

	function set_file_type($file_type)
	{
		$this->file_type=$file_type;
	}

	function get_file_type( )
	{
		$file_type=$this->file_type;
		return($file_type);
	}

	function set_file_name($file_name)
	{
		$this->file_name=$file_name;
	}

	function get_file_name( )
	{
		$file_name=$this->file_name;
		return($file_name);
	}

	function set_file_size($file_size)
	{
		$this->file_size=$file_size;
	}

	function get_file_size( )
	{
		$file_size=$this->file_size;
		return($file_size);
	}

	function set_file_hash($hash)
	{
		$this->file_hash=$hash;
	}

	function get_file_hash( )
	{
		$file_hash=$this->file_hash;
		return($file_hash);
	}
}
?>
