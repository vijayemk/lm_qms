<?php

/**
 * Project:     Logicmind
 * File:        ins_equip_details.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 29/09/2021
 * @package admin
 * @version 1.0
 * @see ins_equip_details.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);


if (isset($_POST['submit_add'])) {
    $ainst_equip_data = array('inst_equip_type' => $_POST['ainst_equip_type'] ?: NULL, 'inst_equip_id' => $_POST['ainst_equip_id'] ?: NULL, 'inst_equip_name' => $_POST['ainst_equip_name'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addInstEuipMasterDetails($ainst_equip_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $uinst_equip_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'inst_equip_type' => $_POST['uinst_equip_type_id'] ?: NULL, 'inst_equip_id' => $_POST['uinst_equip_id'] ?: NULL, 'inst_equip_name' => $_POST['uinst_equip_name'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateInstEuipMasterDetails($uinst_equip_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("inst_equip_type_list", getInstEquipTypeMasterList());
$smarty->assign("inst_equip_details_list", getInstrumentEquipmentMasterDetailsList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_inst_equip_details_master.admin.tpl");
?>
