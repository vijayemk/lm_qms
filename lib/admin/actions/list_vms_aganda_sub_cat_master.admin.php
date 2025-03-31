<?php

/**
 * Project:Logicmind
 * File:vm_sub_category.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 28/11/2020
 * @package vms
 * @version 1.0
 * @see vm_sub_category.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['add'])) {
    $asub_category = array('category' => $_POST['avendor_category'] ?: NULL, 'sub_category' => $_POST['asub_category'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'risk_category' => $_POST['arisk_category'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addVendorAgendaSubCategory($asub_category) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['update'])) {
    $usub_category = array('object_id' => $_POST['uobject_id'] ?: NULL, 'category' => $_POST['uvendor_category_id'] ?: NULL, 'sub_category' => $_POST['usub_category'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'risk_category' => $_POST['urisk_category'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateVendorAgendaSubCategory($usub_category) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("classificationlist", getClassificationMasterList());
$smarty->assign("categorylist", getVendorAgendaCatList());
$smarty->assign("subcategorylist", getVendorAgendaSubCategoryList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_vms_aganda_sub_cat_master.admin.tpl");
?>
