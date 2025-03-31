<?php

/**
 * Project:     Logicmind
 * File:        unit_details.admin.php
 *
 * @author Sivaranjani S
 * @since 09/08/2022
 * @package admin
 * @version 1.0
 * @see unit_details.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $aunit = array('unit' => $_POST['aunit_type'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addUnitOfMeasurementMaster($aunit) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $uunit = array('object_id' => $_POST['uobject_id'] ?: NULL, 'unit' => $_POST['uunit_type'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateUnitOfMeasurementMaster($uunit) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("unit_of_measurement_details", getUnitOfMeasuremenMasterDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_unit_details_master.admin.tpl");
?>
