<?php

/**
 * Project    : Logicmind
 *
 * @package   : admin
 * @author    : Jithin
 * @since     : 26/01/2025
 * @see       : analytics_dashboard.dash.tpl
 *
 * */

error_reporting(E_ALL & ~E_NOTICE);
$userId = $_SESSION['user_id'];
$userPlantId = getUserPlantId($userId);
$smarty->assign("userPlantId", $userPlantId);
$smarty->assign("plants", getPlantList());
$smarty->assign('departments', getDeptList($userPlantId));
$smarty->assign('docGroups', getLmDocGroupById([4, 5]));
$smarty->assign('main', _TEMPLATE_PATH_ . "analytics_dashboard1.dash.tpl");