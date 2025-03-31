<?php

/**
 * Project:     Logicmind
 * File:        search.sop.php
 *
 * @author Ananthakumar.v 
 * @since 18/02/2017
 * @package sop
 * @version 1.0
 * @see search.sop.php
 */
if (!check_access($username, 'sop_search', 'yes')) {
    $error_handler->raiseError("sop_search");
}
$sop_process = new Sop_Processor();

$deptlist = get_All_DeptList();
if (!empty($deptlist)) {
    $smarty->assign("deptlist", $deptlist);
}
$plant_list = getPlantList(null, null);
if (!empty($plant_list)) {
    $smarty->assign("plant_list", $plant_list);
}
$sop_no_list_completion = $sop_process->get_sop_no_list_completion();
if (!empty($sop_no_list_completion)) {
    $smarty->assign("sop_no_list_completion", $sop_no_list_completion);
}
$revision = array(
    '00' => '00',
    '01' => '01',
    '02' => '02',
    '03' => '03',
    '04' => '04',
    '05' => '05',
    '06' => '06',
    '07' => '07',
    '08' => '08',
    '09' => '09',
    '10' => '10',
    '11' => '11',
    '12' => '12',
    '13' => '13',
    '14' => '14',
    '15' => '15',
    '16' => '16',
    '17' => '17',
    '18' => '18',
    '19' => '19',
    '20' => '20',
    '21' => '21',
    '22' => '22',
    '23' => '23',
    '24' => '24',
    '25' => '25',
);
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
$sop_published_status = array("Cancelled" => "Cancelled", "Draft" => "Draft", "Dropped" => "Dropped", "Published and Active" => "Published and Active", "Published and Inactive" => "Published and Inactive", "SOP Expired" => "SOP Expired", "Transferred" => "Transferred");
$year_range = range($startyear, $currentyear);
$smarty->assign("year_range", $year_range);
$smarty->assign("currentyear", $currentyear);
$smarty->assign("month_range", $month_range);

$sop_master = new DB_Public_lm_sop_master();
$sop_master->orderBy('sop_name');
$sop_master->find();
$namelist = array();
while ($sop_master->fetch()) {
    $namelist[] = $sop_master->sop_name;
}
if (isset($_POST['search'])) {
    echo "testing";
}
if (!empty($revision)) {
    $smarty->assign("revision", $revision);
}
if (!empty($namelist)) {
    $smarty->assign("namelist", $namelist);
}
if (!empty($sop_process->sop_type_list_details(null))) {
    $smarty->assign("sop_type_list", $sop_process->sop_type_list_details(null));
}
if (!empty($sop_published_status)) {
    $smarty->assign("published_status", $sop_published_status);
}
$smarty->assign('main', _TEMPLATE_PATH_ . "search_sop.sop.tpl");
?>
