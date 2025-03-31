<?php

/**
 * Project: Logicmind
 * File:dev_related_to.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 05/03/2020
 * @package admin
 * @version 1.0
 * @see dev_related_to.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $adev_realted_to = array('related_to' => $_POST['adev_related_to'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addDevRelatedToMaster($adev_realted_to) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $udev_realted_to = array('object_id' => $_POST['uobject_id'] ?: NULL, 'related_to' => $_POST['udev_related_to'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateDevRelatedToMaster($udev_realted_to) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("dev_related_to_list", getDevRelatedToMasterDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_dms_dev_related_to_master.admin.tpl");
?>
