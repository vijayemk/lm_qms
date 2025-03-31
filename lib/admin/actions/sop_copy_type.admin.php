<?php
/**
 * Project:     Logicmind
 * File:        sop_copy_type.admin.php
 *
 * @author Ananthakumar.v 
 * @since 13/03/2016
 * @package sop
 * @version 1.0
 * @see sop_copy_type.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$createtime=date('Y-m-d G:i:s');
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$createyear=date('y');
$month=date('m');

if (isset($_POST['add'])){
    $sequence_object = new Sequence;
    $id = "admin.sop_copy:".$sequence_object->get_next_sequence();
    
    $sop_copy_type_color = "#".trim($_POST['sop_copy_type_color']);
    
    $add_sop_copy_obj = new SopPrintCopy();
    $add_sop_copy_obj->object_id = $id;
    $add_sop_copy_obj->copy_type = trim($_POST['sop_copy_type']);
    $add_sop_copy_obj->description = trim($_POST['sop_copy_desc']);
    $add_sop_copy_obj->created_by = $usr_id;
    $add_sop_copy_obj->modified_by = $usr_id;
    $add_sop_copy_obj->created_time = $createtime;
    $add_sop_copy_obj->modified_time = $createtime;
    $add_sop_copy_obj->copy_type_color = $sop_copy_type_color;
    $add_sop_copy_obj->label_type = trim($_POST['label_type']);
    $add_sop_copy_obj->is_enabled = 'yes';
    $add_sop_copy_obj->insert();
    
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Copy Type : ".trim($_POST['sop_copy_type'])."\nDescription : ".trim($_POST['sop_copy_desc']) . "\nHex Value : " . trim($sop_copy_type_color. "\nLabel Type : " . trim($_POST['label_type']) . "\nIs Enabled : yes");
    $old_val = null;

    $sequence_object = new Sequence;
    $audit_id="audit.print_copy:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_print_copy(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
$view_sop_print_copy_type_details = new SopPrintCopy();
$sopprintcopytypelistdetails = $view_sop_print_copy_type_details->sop_print_copy_list_details();
$smarty->assign("sopprintcopytypelistdetails",$sopprintcopytypelistdetails);
$smarty->assign('main',_TEMPLATE_PATH_."sop_copy_type.admin.tpl");
?>
