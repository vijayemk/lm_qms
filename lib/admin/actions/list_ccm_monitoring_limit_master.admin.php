<?php

/**
 * Project:     Logicmind
 * File:        cc_monitoring_limit.admin.php
 *
 * @author Puneet
 * @since o8/11/2023
 * @package admin
 * @version 1.0
 * @see cc_monitoring_limit.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $alimit = array('limit' => $_POST['umonitoring_limit'] ?: NULL, 'reason' => $_POST['reason_for_change'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addCcMonitoringLimit($alimit) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("cc_monitoring_limit", getCcMonitoringLimit());
$smarty->assign("cc_monitoring_limit_remarks", getCcMonitoringLimitRemarks());
$smarty->assign("limit_range", range(1, 5));
$smarty->assign('main', _TEMPLATE_PATH_ . "list_ccm_monitoring_limit_master.admin.tpl");
?>
