<?php
/**
 * Defines the attributes for users
 * Project:     LogicMind
 * File: Users.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */
class Users extends DB_Public_users
{
               /** Attributes */
/**
* represents the id of the User
* @var string
*/
 var $user_id;

/**
* represents the name of the User
* @var string
*/
 var $user_name;

/**
* represents the full name of the User
* @var string
*/
 var $full_name;

/**
* represents the designation of the User
* @var string
*/
 var $designation_id;

/**
* represents the organization of the User
* @var string
*/
 var $org_id; 

/**
* represents the department of the User
* @var string
*/
 var $department_id;

/**
* represents the email of the User
* @var string
*/
 var $email;

/**
* represents the creator of the User
* @var string
*/
 var $creator; 

/**
* represents the modifier of the User
* @var string
*/
 var $modifier;

/**
* represents the created time of the User
* @var timestamp
*/
 var $create_time;

/**
* represents the modified time of the User
* @var timestamp
*/
 var $modify_time;

  

                        /** Functions*/
/**
* this function is  used to delete User
* @param string $id is the id of User.
*/
function delete_user($id)
{
    $this->get("user_id",$id);
    $res = $this->delete();
}

/**
* this function is  used to get UserName
* @param string $uid is id of User.
*/
function get_username($uid)
{
    $this->get("user_id",$uid);
    return $this->user_name;
}

/**
*  Get the Users list
*/

function userlist()
{
    $users=array();
    $this->orderBy('user_name');
    $this->find();
    while ($this->fetch()){
		$users[]= clone $this;
    }
	return $users;
}

}


?>
