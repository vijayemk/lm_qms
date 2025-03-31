<?php

/**
 * Project:LogicMind
 * File:material_type_sub_category.admin.php
 *
 * @author Sivaranjani s, Puneet
 * @since 30/09/2021
 * @package admin
 * @version 1.0
 * @see material_type_sub_category.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $asc_data = array('material_type' => $_POST['amaterial_type'] ?: NULL, 'sub_category' => $_POST['amaterial_type_sub_category'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addMaterialTypeSubCateoryMasterDetails($asc_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $usc_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'material_type' => $_POST['umaterial_type_id'] ?: NULL, 'sub_category' => $_POST['umaterial_sub_category'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);
    if (updateMaterialTypeSubCateoryMasterDetails($usc_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('material_type_list', getMaterialTypeMasterDetails());
$smarty->assign('material_sub_category_list', getMaterialTypeSubCategoryMasterList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_material_sub_type_master.admin.tpl");
?>