<?php
/**
 * Defines the attributes for operation
 * Project:     LogicMind
 * File:  AccessPermissionObjects.class.php
 *
 * @author Ananthakumar V
 * @since 22/10/2018
 * @package admin
 * @version 1.0
*/
class AccessPermissionObjects extends DB_Public_access_permission_object_list {
    /** Attributes*/
    /**
    * represents the id of the access_permission_object
    * @var string
    */
    var $object_id;

    /**
    * represents the name of the access_permission_object
    * @var string
    */
    var $name;
    
    /**
    * represents the description of the access_permission_object
    * @var string
    */
    var $description;
          
    /**
    *  Get the Operation list
    */
    function access_permission_list() {
        $this->orderBy('name');
        $this->find();
        $accesspermissionlist= array();
        while($this->fetch()){
            $accesspermissionlist[] = clone $this;
        }
        return $accesspermissionlist;
    }
    function access_permission_detail_list(){
        $this->orderBy('name');
        $this->find();
        while ($this->fetch()) {
            $access_per_list[] = array('access_per_id'=>$this->object_id,'access_per_name'=>$this->name,'description'=>$this->description);
        }
        return $access_per_list;
    }
}
 ?>
