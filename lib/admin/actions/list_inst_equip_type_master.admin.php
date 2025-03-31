<?php

/**
 * Project:     LogicMind
 * File:        ins_equip_type.admin.php
 *
 * @author sivaranjani S, 
 * @since 28/09/2021
 * @package admin
 * @version 1.0
 * @see ins_equip_type.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $ains_equip_data = array('inst_equip' => $_POST['ains_equip_type'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addInstrumentEuipmentMasterDetails($ains_equip_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $uins_equip_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'inst_equip' => $_POST['uins_equip_type'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateInstrumentEuipmentMasterDetails($uins_equip_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign('ins_equip_type_list', getInstEquipTypeMasterList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_inst_equip_type_master.admin.tpl");
?>