<?php

/**
 * Project:     LogicMind
 * File:        process_stage.admin.php
 *
 * @author sivaranjani S, Puneet
 * @since 22/09/2021
 * @package admin
 * @version 1.0
 * @see process_stage.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $aprocess_stage = array('process_stage' => $_POST['aprocess_stage'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addProcessStageMaster($aprocess_stage) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $uprocess_stage = array('object_id' => $_POST['uobject_id'] ?: NULL, 'process_stage' => $_POST['uprocess_stage'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateProcessStageMaster($uprocess_stage) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('process_stage_list', getProcessStageMasterList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_process_stage_master.admin.tpl");
?>