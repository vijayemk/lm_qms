<?php

/**
 * Project:Logicmind
 * File:dm_type.admin.php
 *
 * @author Sivaranjani S,Puneet
 * @since 05/03/2020
 * @package dms
 * @version 1.0
 * @see dm_type.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $adev_data = array('type' => $_POST['adms_type'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addDevTypeMaster($adev_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $udev_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'type' => $_POST['udms_type'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL,'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateDevTypeMaster($udev_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign("dms_type_list", getDevTypeMasterDetailsList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_dms_type_master.admin.tpl");
?>
