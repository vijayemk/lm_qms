<?php

/**
 * Project:Logicmind
 * File:vm_reminder_mail_config.admin.php
 *
 * @author sivaranjani S, Puneet
 * @since 16/01/2021
 * @package admin
 * @version 1.0
 * @see vm_reminder_mail_config.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $amail_alert = array('mail_alert' => $_POST['umail_alert'] ?: NULL, 'reason' => $_POST['reason_for_change'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addVendorReminderMailAlert($amail_alert) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}


$smarty->assign("days_range", range(1, 30));
$smarty->assign("remarks_array", getVendorReminderMailRemarks());
$smarty->assign("vm_expiry_reminder_mail_days", get_reminder_mail_days("vendor_approval_expiry"));
$smarty->assign('main', _TEMPLATE_PATH_ . "list_vms_reminder_mail_alert_master.admin.tpl");
?>
