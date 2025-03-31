<?php

/**
 * Project:     LogicMind
 * File:        test_details.admin.php
 *
 * @author Sivaranjani S
 * @since 15/02/2022
 * @package admin
 * @version 1.0
 * @see test_details.admin.tpl
 */

error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$time = date('Y-m-d G:i:s');

if (isset($_POST['add'])) {
    $sequence_object = new Sequence;
    $task_id = "test_details:" . $sequence_object->get_next_sequence();

    $test_obj = new DB_Public_lm_test_details_master();
    $test_obj->object_id = $task_id;
    $test_obj->test_name = $_POST['test_name'];
    $test_obj->created_by = $usr_id;
    $test_obj->created_time = $time;
    $test_obj->modified_by = NULL;
    $test_obj->modified_time = NULL;
    $test_obj->insert();
    
    /** Audit Trial * */
    $new_val = "Test Name : " . $_POST['test_name'];
    $old_val = null;
    $audit_id = "audit.test_details:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_test_details_master(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");
    header("Location:?module=admin&action=test_details");
}

if (isset($_POST['update'])) {
    $uobject_id = $_REQUEST['uobject_id'] ?: NULL;
    $utest_name = $_REQUEST['utest_name'] ?: NULL;
    
    /** Getting old val for audit trail * */
    $attest_obj_old = new DB_Public_lm_test_details_master();
    $attest_obj_old->get("object_id", $uobject_id);

    $utest_obj = new DB_Public_lm_test_details_master();
    $utest_obj->whereAdd("object_id='$uobject_id'");
    $utest_obj->test_name = $utest_name;
    $utest_obj->modified_by = $usr_id;
    $utest_obj->modified_time = $time;
    $utest_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    
    /** Audit Trial * */
    $new_val = "Test Name : " . $utest_name ;
    $old_val = "Test Name : $attest_obj_old->test_name";
    
    $sequence_object = new Sequence;
    $audit_id = "audit.test_details:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_test_details_master(), $audit_id, $usr_id, $dept_id, 'update', $new_val, $old_val, "Successfully Updated");
    header("Location:?module=admin&action=test_details");
}


$test_obj = new TestDetails();
$test_details_list = $test_obj->TestDetailsList();

$smarty->assign('test_details_list', $test_details_list);
$smarty->assign('main', _TEMPLATE_PATH_ . "test_details.admin.tpl");
?>