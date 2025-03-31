<?php

/**
 * Project:Logicmind
 * File:vm_approval_expiry_year.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 16/01/2021
 * @package admin
 * @version 1.0
 * @see vm_approval_expiry_year.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $avalidity = array('expiry' => $_POST['uexpiry'] ?: NULL, 'reason' => $_POST['reason_for_change'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addVendorValidity($avalidity) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("year_range", range(1, 10));
$smarty->assign("vm_expiry_remarks", getVendorValidityRemarks());
$smarty->assign("vm_expiry_year", getVendorApprovalExpiryYear());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_vms_vendor_validity_master.admin.tpl");
?>
