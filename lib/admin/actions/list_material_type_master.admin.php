<?php

/**
 * Project:LogicMind
 * File:material_type.admin.php
 *
 * @author Sivaranjani S,Puneet
 * @since 05/07/2021
 * @package admin
 * @version 1.0
 * @see material_type
 *  */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $am_data = array('material_type' => $_POST['amaterial_type'] ?: NULL, 'is_enabled' => 'yes', 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addMaterialTypeMasterDetails($am_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $um_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'material_type' => $_POST['umaterial_type'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL,
        'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateMaterialTypeMasterDetails($um_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('material_type_list', getMaterialTypeMasterDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_material_type_master.admin.tpl");
?>