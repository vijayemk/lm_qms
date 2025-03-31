<?php
/**
 * Project:     Logicmind
 * File:       list_operation.admin.php
 *
 * @author Ananthakumar V
 * @since 22/02/2017
 * @package admin
 * @version 1.0
 * @see list_operation.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$operation = new DB_Public_pdf_operation();
$operation->orderBy('operation_name');
$operation->find();
$operationlist= array();
while($operation->fetch()){
    $operationlist[] = clone $operation;
}

if (isset($_POST['add'])){
    $usr_id = $_SESSION['user_id'];
    $time =  date('Y-m-d G:i:s');
    $dept_id = getDeptId($usr_id);
    $createyear=date('y');
    $month=date('m');
    
    $sequence_object = new Sequence;
    $id="admin.operation:".$sequence_object->get_next_sequence();

    $operations = new DB_Public_pdf_operation();
    $operations->operation_id = $id;
    $operations->operation_name = trim($_POST['operation']);
    $operations->creator = $usr_id;
    $operations->created_time = $time;
    $operations->insert();
    
    //Audit Trial
    $audit_id="audit.operation:".$sequence_object->get_next_sequence();
    $post_data = "Operation : ".trim($_POST['operation']);    
    
    $audit_obj = new DB_Public_lm_audit_operation();
    $audit_obj->object_id = $audit_id;
    $audit_obj->user_id = $usr_id;
    $audit_obj->created_date = $time;
    $audit_obj->action = "add";
    $audit_obj->ip_address = getIp();
    //$audit_obj->url = $_SERVER['REQUEST_URI'];
    $audit_obj->post_data = $post_data;
    $audit_obj->status = "Successfully Added";
    $audit_obj->year = $createyear;
    $audit_obj->month = $month;
    $audit_obj->department = $dept_id;
    $audit_obj->insert();
    header("Location:?module=admin&action=sop_pdf_operation");
}
$smarty->assign('operationlist',$operationlist);
$smarty->assign('main',_TEMPLATE_PATH_."sop_pdf_operation.admin.tpl");
?>
