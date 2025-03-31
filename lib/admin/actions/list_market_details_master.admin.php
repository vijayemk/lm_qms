<?php

/**
 * Project:     LogicMind
 * File:        market_details.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 19/05/2021
 * @package admin
 * @version 1.0
 * @see market_details.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $amarket_data = array('market_name' => $_POST['amarket_name'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addMarketMasterDetails($amarket_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $umarket_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'market_name' => $_POST['umarket_name'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept, 'is_enabled' => $_POST['uis_enabled'] ?: NULL);

    if (updateMarketMasterDetails($umarket_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('marketlist', getMarketMasterList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_market_details_master.admin.tpl");
?>