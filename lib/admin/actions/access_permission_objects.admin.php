<?php
/**
 * Project:     Logicmind
 * File:       access_permission_objects.admin.php
 *
 * @author Ananthakumar V
 * @since 22/10/2018
 * @package admin
 * @version 1.0
 * @see access_permission_objects.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$access_per_obj = new AccessPermissionObjects();
$access_permission_list  = $access_per_obj->access_permission_list();
if (isset($_POST['add'])) {
    $usr_id = $_SESSION['user_id'];
    $time =  date('Y-m-d G:i:s');
    
    $sequence_object = new Sequence;
    $id="admin.access_per:".$sequence_object->get_next_sequence();

    $add_access_per_obj = new AccessPermissionObjects();
    $add_access_per_obj->object_id = $id;
    $add_access_per_obj->name = trim($_POST['object_name']);
    $add_access_per_obj->description = trim($_POST['object_desc']);
    $add_access_per_obj->insert();
    header("Location:$_SERVER[REQUEST_URI]");
}
$smarty->assign('access_permission_list',$access_permission_list);
$smarty->assign('main',_TEMPLATE_PATH_."access_permission_objects.admin.tpl");
?>
