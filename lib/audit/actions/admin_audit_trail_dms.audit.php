<?php

/**
 * Project:     Logicmind
 * File:        admin_audit_trial.audit.php
 *
 * @author Ananthakumar V
 * @since 30/03/2017
 * @package admin
 * @version 1.0
 * @see admin_audit_trial.audit.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'audit_trial', 'yes')) {
    $error_handler->raiseError("audit_trial");
}

$usr_id = $_SESSION['user_id'];
$plant_id = getUserPlantId($usr_id);

$deptlist = get_All_DeptList();
if (!empty($deptlist)) {
    $smarty->assign("deptlist", $deptlist);
}

$currentyear = date('y');
$startyear = 17;
$month_range = array(
    '01' => 'Jan',
    '02' => 'Feb',
    '03' => 'Mar',
    '04' => 'Apr',
    '05' => 'May',
    '06' => 'Jun',
    '07' => 'Jul',
    '08' => 'Aug',
    '09' => 'Sep',
    '10' => 'Oct',
    '11' => 'Nov',
    '12' => 'Dec',
);

$year_range = range($startyear, $currentyear);
$smarty->assign("year_range", $year_range);
$smarty->assign("currentyear", $currentyear);
$smarty->assign("month_range", $month_range);
$smarty->assign('main', _TEMPLATE_PATH_ . "admin_audit_trail_dms.audit.tpl");
?>