<?php
/**
 * pdf_check_access function
 *
 * @author Ananthakumar V
 * @since 10/05/2017
 * @package 
 * @version 1.0
 */

function pdf_check_access($username,$objname,$opname) {
    $user_obj = new DB_Public_users;
    $user_obj->user_name = $username;
    $user_obj->find();
    $user_obj->fetch();

    $object = new DB_Public_lm_sop_print_copy();
    $object->object_id = $objname;
    $object->find();
    $object->fetch();

    $operation = new DB_Public_pdf_operation;
    $operation->operation_name = $opname;
    $operation->find();
    $operation->fetch();

    $permissionassignment = new DB_Public_pdf_permission;
    $permissionassignment->whereAdd("user_id = '$user_obj->user_id'");
    $permissionassignment->whereAdd("object = '$object->object_id'");
    $permissionassignment->whereAdd("operation = '$operation->operation_id'");
    $permissionassignment->find();
    if($permissionassignment->fetch()){
        return true;
    }else{
        return false;
    }
}
?>
