<?php

/**
 * Project:Logicmind
 * File: vm_category.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 28/11/2020
 * @package vms
 * @version 1.0
 * @see vm_category.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $aagenda_category = array('category' => $_POST['aagenda_category'] ?: NULL, 'score' => $_POST['aagenda_score'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addVendorAgendaCategory($aagenda_category) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $aagenda_category = array('object_id' => $_POST['uobject_id'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'category' => $_POST['uagenda_category'] ?: NULL, 'score' => $_POST['uagenda_score'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateVendorAgendaCategory($aagenda_category) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign("category_list", getVendorAgendaCatList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_vms_aganda_cat_master.admin.tpl");
?>
