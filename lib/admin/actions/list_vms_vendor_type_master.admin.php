<?php

/**
 * Project:Logicmind
 * File: vendor_type.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 03/05/2021
 * @package vms
 * @version 1.0
 * @see vendor_type.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $avendor_type = array('vendor_type' => $_POST['avendor_type'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addVendorType($avendor_type) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $uvendor_type = array('object_id' => $_POST['uobject_id'] ?: NULL, 'vendor_type' => $_POST['uvendor_type'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateVendorType($uvendor_type) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("vendor_type_list", getVendorTypeDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_vms_vendor_type_master.admin.tpl");
?>
