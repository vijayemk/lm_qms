<?php

/**
 * Project: Logicmind
 * File:vm_score.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 12/05/2021
 * @package vms
 * @version 1.0
 * @see vm_score.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['add'])) {
    $ascore = array('score' => $_POST['uscore'] ?: NULL, 'reason' => $_POST['reason_for_change'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addVendorScore($ascore) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("score_range", range(0, 100, 5));
$smarty->assign("vms_score", getVendorApprovalScore());
$smarty->assign("vms_score_remarks", getVendorScoreRemarks());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_vms_vendor_score_master.admin.tpl");
?>
