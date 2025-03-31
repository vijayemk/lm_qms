<?php

/**
 * Project:     Logicmind
 * File:        sop_dept_permission_list.sop.php
 *
 * @author Ananthakumar V
 * @since 26/08/2022
 * @package sop
 * @version 1.0
 * @see sop_dept_permission_list.sop.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'view_department_permission', 'yes')) {
    $error_handler->raiseError("view_department_permission");
}

$usr_id = $_SESSION['user_id'];
$usr_plant_id = getUserPlantId($usr_id);

$access_type = (isset($_REQUEST['access_type'])) ? $_REQUEST['access_type'] : null;
$sop_process = new Sop_Processor();

if ($access_type == "dept_wise") {
    $dept_id = (isset($_REQUEST['dept_id'])) ? $_REQUEST['dept_id'] : null;

    $sop_dept_per_list = $sop_process->get_sop_doc_dept_permission_list(null, $dept_id, 'yes');
    $smarty->assign("plant_dept_list", getPlantDeptList($usr_plant_id));
    $smarty->assign("dept_id", $dept_id);
} else if ($access_type == "sop_wise") {
    $sop_dept_per_list = $sop_process->get_sop_doc_dept_permission_list(null, null, 'yes');
} else {
    $sop_dept_per_list = null;
}
$smarty->assign("access_type", $access_type);
$smarty->assign("sop_dept_per_list", $sop_dept_per_list);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_dept_permission_list.sop.tpl");
?>
