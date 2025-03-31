<?php

/**
 * Project:Logicmind (AMS)
 * File:audit_trial.audit.php
 *
 * @author Sivaranjani S, Puneet
 * @since 16/03/2020
 * @package admin
 * @version 1.0
 * @see audit_trial.audit.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'audit_trial', 'yes')) {
    $error_handler->raiseError("audit_trial");
}
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
$currentyear = date('y');
$startyear = date('y', strtotime(get_audit_min_max_date_details()['min_date']));

$smarty->assign("am_list", get_qms_doc_no_list("ams"));
$smarty->assign('plantlist', getPlantList(null, null));
$smarty->assign("dept_list", getDeptList(null));
$smarty->assign("year_range", range($startyear, date('y')));
$smarty->assign("month_range", $month_range);
$smarty->assign("start_date", get_audit_min_max_date_details()['min_date']);
$smarty->assign("end_date", get_audit_min_max_date_details()['max_date']);
$smarty->assign("def_start_date", getModifiedDateFormat("Y-m-d", date('Y-m-d'), 0, 0, -15));
$smarty->assign("def_end_date", date('Y-m-d'));
$smarty->assign('main', _TEMPLATE_PATH_ . "ams_audit_trail.audit.tpl");
?>