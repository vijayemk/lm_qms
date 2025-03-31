<?php

/**
 * Project:     LogicMind
 * File:        product_details.admin.php
 *
 * @author Sivaranjani S,Ananthakuamr V
 * @since 05/07/2021
 * @package admin
 * @version 1.0
 * @see product_details.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);

if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

/** Add Product Details ** */
if (isset($_POST['submit_add'])) {
    $ap_data = array('product_code' => $_POST['aproduct_code'] ?: NULL, 'product_name' => $_POST['aproduct_name'] ?: NULL, 'generic_name' => $_POST['ageneric_name'] ?: NULL,
        'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addProductMasterDetails($ap_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $up_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'product_code' => $_POST['uproduct_code'] ?: NULL, 'product_name' => $_POST['uproduct_name'] ?: NULL, 'generic_name' => $_POST['ugeneric_name'] ?: NULL,
        'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateProductMasterDetails($up_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('product_list', getProductMasterDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_product_master.admin.tpl");
?>