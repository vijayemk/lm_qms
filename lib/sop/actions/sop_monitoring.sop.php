<?php

/**
 * Project:     Logicmind
 * File:        sop_monitoring.sop.php
 *
 * @author Ananthakumar.v 
 * @since 22/10/2021
 * @package sop
 * @version 1.0
 * @see sop_monitoring.sop.php
 */
if (!check_access($username, 'sop_monitoring', 'yes')) {
    $error_handler->raiseError("sop_monitoring");
}
$smarty->assign("plant_list", getPlantList(null, null));
$smarty->assign("deptlist", get_All_DeptList());
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_monitoring.sop.tpl");
?>
