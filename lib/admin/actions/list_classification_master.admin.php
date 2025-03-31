<?php

/**
 * Project:     LogicMind
 * File:        classification.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 08/10/2021
 * @package admin
 * @version 1.0
 * @see classification.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $aclassificaton = array('classification' => $_POST['aclassification'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addClassificationMaster($aclassificaton) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $uclassificaton = array('object_id' => $_POST['uobject_id'] ?: NULL, 'classification' => $_POST['uclassification'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateClassificationMaster($uclassificaton) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('classification_list', getClassificationMasterList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_classification_master.admin.tpl");
?>