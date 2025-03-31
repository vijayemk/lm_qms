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
$operation = new Operation;
$operationlist  = $operation->operationlist();
if (isset($_POST['add'])){
    $usr_id = $_SESSION['user_id'];
    $time =  date('Y-m-d G:i:s');
    $dept_id = getDeptId($usr_id);
    $createyear=date('y');
    $month=date('m');
    
    $sequence_object = new Sequence;
    $id="admin.operation:".$sequence_object->get_next_sequence();

    $operations = new Operation();
    $operations->operation_id = $id;
    $operations->operation_name = trim($_POST['operation']);
    $operations->insert();
    
    // Audit Trail
    $new_val = "Operation : ".trim($_POST['operation']);
    $old_val = null;
    $sequence_object = new Sequence;
    $audit_id="audit.operation:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_operation(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
$smarty->assign('operationlist',$operationlist);
$smarty->assign('main',_TEMPLATE_PATH_."list_operation.admin.tpl");
?>
