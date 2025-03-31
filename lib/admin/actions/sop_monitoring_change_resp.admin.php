<?php

/**
 * Project:     Logicmind
 * File:        sop_monitoring_change_resp.sop.php
 *
 * @author Ananthakumar.v 
 * @since 25/11/2021
 * @package sop
 * @version 1.0
 * @see sop_monitoring_change_resp.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');

if (isset($_POST['save_rt'])) {
    $sop_process = new Sop_Processor();
    $rt_dept_user_id = (isset($_REQUEST['rt_dept_user_id'])) ? $_REQUEST['rt_dept_user_id'] : null;
    $rt_monitoring_id_array = (isset($_REQUEST['rt_monitoring_id'])) ? $_REQUEST['rt_monitoring_id'] : null;

    $sop_process->replace_sop_monitoring_details($rt_monitoring_id_array, $rt_dept_user_id, $usr_id, $date_time);
    header("Location:$_SERVER[REQUEST_URI]");
}

$smarty->assign("plant_list", getPlantList(null, null));
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_monitoring_change_resp.admin.tpl");
?>