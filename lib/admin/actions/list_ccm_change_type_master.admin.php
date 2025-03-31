<?php

/**
 * Project:     Logicmind
 * File:        change_type.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 26/05/2020
 * @package ccm
 * @version 1.0
 * @see change_type.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $achangetype = array('change_type' => $_POST['achange_type'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addChangeTypeDetails($achangetype) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

/* Update Type of Changes */
if (isset($_POST['submit_update'])) {
    $uchangetype = array('object_id' => $_POST['uobject_id'] ?: NULL, 'change_type' => $_POST['uchange_type'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL,'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateChangeTypeDetails($uchangetype) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("changes_list", getChangeTypeDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_ccm_change_type_master.admin.tpl");
?>
