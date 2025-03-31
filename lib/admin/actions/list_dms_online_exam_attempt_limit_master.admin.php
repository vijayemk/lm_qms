<?php

/**
 * Project: Logicmind
 * File:dm_online_exam_attempt_limit.admin.php
 *
 * @author Benila Arthi O G, Puneet
 * @since 12/03/2020
 * @package admin
 * @version 1.0
 * @see dm_online_exam_attempt_limit.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $alimit = array('limit' => $_POST['uattempt_limit'] ?: NULL, 'reason' => $_POST['reason_for_change'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addDevExamAttemptLimitMaster($alimit) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("limit_range", range(1, 5));
$smarty->assign("dm_exam_attempt_limit", getDevExamAttemptLimit());
$smarty->assign("dm_exam_limit_remarks", getDevExamAttemptLimitRemarks());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_dms_online_exam_attempt_limit_master.admin.tpl");
?>
