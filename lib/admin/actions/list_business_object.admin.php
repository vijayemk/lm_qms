<?php
/**
 * Project:     Logicmind
 * File:       list_business_object.admin.php
 *
 * @author Ananthakumar V
 * @since 16/02/2017
 * @package admin
 * @version 1.0
 * @see list_business_object.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$object = new BusinessObject;
$objectlist = $object->business_object_list();

if (isset($_POST['add'])){
    $sequence_object = new Sequence;
    $id="admin.business_object:".$sequence_object->get_next_sequence();
    
    $usr_id = $_SESSION['user_id'];
    $time = date('Y-m-d G:i:s');
    $createyear=date('y');
    $month=date('m');
    
    $object = new BusinessObject();
    $object->object_id = $id;
    $object->object_name = trim($_POST['objectname']);
    $object->full_name = trim($_POST['fullname']);
    $object->insert();
    
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Business Object : ".trim($_POST['objectname'])."\nFull Name : ".trim($_POST['fullname']);
    $old_val = null;
    $sequence_object = new Sequence;
    $audit_id="audit.buss:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_business_object(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:?module=admin&action=list_business_object");
}
$smarty->assign('objectlist',$objectlist);
$smarty->assign('main',_TEMPLATE_PATH_."list_business_object.admin.tpl");
?>
