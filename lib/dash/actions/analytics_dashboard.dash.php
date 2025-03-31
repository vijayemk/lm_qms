<?php

/**
 * Project    : Logicmind
 *
 * @package   : admin
 * @author    : Jithin
 * @since     : 26/01/2025
 * @see       : analytics_dashboard.dash.tpl
 *
 **/



// d(getQmsStatuses());
error_reporting(E_ALL & ~E_NOTICE);
$userId = $_SESSION['user_id'];
$userPlantId = getUserPlantId($userId);
$userDepartmentId = getDeptId($userId);

$smarty->assign("userPlantId", $userPlantId);
$smarty->assign("userDepartmentId", $userDepartmentId);
$smarty->assign("plants", getPlantList());
$smarty->assign('departments', getDeptList($userPlantId));
$smarty->assign('dmsModules', getDmsModules());
$smarty->assign('dmsStatuses', getDmsStatuses());
$smarty->assign('qmsModules', getQmsModules());
$smarty->assign('qmsStatuses', getQmsStatuses());
$smarty->assign('main', _TEMPLATE_PATH_ . "analytics_dashboard.dash.tpl");

