<?php
/**
 * Project:     Logicmind
 * File:        sop_reason.admin.php
 *
 * @author Ananthakumar V
 * @since 28/03/2018
 * @package admin
 * @version 1.0
 * @see sop_reason.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$time =  date('Y-m-d G:i:s');

if (isset($_POST['add'])) {
    $asop_reason = $_REQUEST['asop_reason'] ?: NULL;
    
    $sequence_object = new Sequence;
    $id = "admin.sop_reason:".$sequence_object->get_next_sequence();
    
    //Add
    $asop_reason_obj = new SopCreationReason();
    $asop_reason_obj->object_id = $id;
    $asop_reason_obj->reason = $asop_reason;
    $asop_reason_obj->created_by = $usr_id;
    $asop_reason_obj->created_time = $time;
    $asop_reason_obj->insert();
    
    // Audit Trail
    $new_val = "Reason : $asop_reason"; 
    $old_val = null;

    $sequence_object = new Sequence;
    $audit_id="audit.sop_reason:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_creation_reason(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
if (isset($_POST['update'])) {
    $usop_reason_id = $_REQUEST['usop_reason_id'] ?: NULL;
    $usop_reason = $_REQUEST['usop_reason'] ?: NULL;
    
    // Getting old val for audit trail
    $atreason_old = new SopCreationReason();
    $atreason_old->get("object_id",$usop_reason_id);
    
    // Update new value
    $usop_reason_obj = new SopCreationReason();
    $usop_reason_obj->whereAdd("object_id='$usop_reason_id'");
    $usop_reason_obj->reason = $usop_reason;
    $usop_reason_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    
    // Audit Trail
    $new_val = "Reason : $usop_reason"; 
    $old_val = "Reason : $atreason_old->reason";
    
    $sequence_object = new Sequence;
    $audit_id="audit.sop_reason:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_creation_reason(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}
$dsop_creation_reason_obj = new SopCreationReason();
$reasonlist = $dsop_creation_reason_obj->sop_reason_list();
$smarty->assign('reasonlist',$reasonlist);
$smarty->assign('main',_TEMPLATE_PATH_."sop_reason.admin.tpl");
?>
