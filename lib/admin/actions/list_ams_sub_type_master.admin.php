<?php

/**
 * Project: Logicmind
 * File:am_sub_type.admin.php
 *
 * @author Sivaranjani S,Puneet
 * @since 22/03/2021
 * @package ams
 * @version 1.0
 * @see am_sub_type.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$time = date('Y-m-d G:i:s');
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $asub_type = array('am_type' => $_POST['aam_type'] ?: NULL, 'sub_type' => $_POST['aam_sub_type'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addAuditSubType($asub_type) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $usub_type = array('object_id' => $_POST['uobject_id'] ?: NULL, 'am_type' => $_POST['uam_type_id'] ?: NULL, 'sub_type' => $_POST['uam_sub_type'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL,'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateAuditSubType($usub_type) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("amtypelist", getAuditTypeList());
$smarty->assign("amsubtypelist", getAuditSubTypeList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_ams_sub_type_master.admin.tpl");
?>
