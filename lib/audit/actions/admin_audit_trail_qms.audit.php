<?php
/**
 * ProjectLogicmind (CCM)
 * File: admin_audit_trail_qms.audit.php
 *
 * @author Puneet
 * @since 23/03/2024
 * @package admin
 * @version 1.0
 * @see admin_audit_trail_qms.audit.tol
 */


error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'audit_trial', 'yes')) {
    $error_handler->raiseError("audit_trial");
}

$usr_id = $_SESSION['user_id'];
$plant_id = getUserPlantId($usr_id);
include_module("admin");


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
$smarty->assign("start_date", get_audit_min_max_date_details()['min_date']);
$smarty->assign("end_date",get_audit_min_max_date_details()['max_date']);
$smarty->assign('main', _TEMPLATE_PATH_ . "admin_audit_trail_qms.audit.tpl");
?>