<?php

/**
 * Project: LogicMind
 * File: qms_no_seq.admin.php
 *
 * @author Sivaranjani S,Ananthakuamr V
 * @since 05/07/2021
 * @package admin
 * @version 1.0
 * @see qms_no_seq.admin.tpl
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

    $org_id = $_POST['org_id'];
    $plant_id = $_POST['plant_id'];
    $lm_doc_id = $_POST['lm_doc_id'];
    $prefix = $_POST['prefix'];
    $number = $_POST['number'];

    if (add_qms_num_seq($org_id, $plant_id, $lm_doc_id, $prefix, $number, $usr_id, $date_time) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {

    $org_id = $_POST['uorg_id'];
    $plant_id = $_POST['uplant_id'];
    $lm_doc_id = $_POST['ulm_doc_id'];
    $prefix = $_POST['uprefix'];
    $number = $_POST['unumber'];

    if (update_qms_num_seq($org_id, $plant_id, $lm_doc_id, $prefix, $number, $usr_id, $date_time) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}


$smarty->assign('org_list', get_All_OrgList());
$smarty->assign('lm_doc_list', getLmDocList());
$smarty->assign('year', date('Y'));
$smarty->assign('num_seq_list', get_qms_num_seq_list());
$smarty->assign('main', _TEMPLATE_PATH_ . "qms_no_seq.admin.tpl");
?>