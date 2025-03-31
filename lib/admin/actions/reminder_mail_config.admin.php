<?php
/**
 * Project:     Logicmind
 * File:        reminder_mail_config.admin.php
 *
 * @author Ananthakumar V
 * @since 07/04/2017
 * @package admin
 * @version 1.0
 * @see reminder_mail_config.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$pending_reminder_mail_days = get_reminder_mail_days("pendinglist");
$sop_expiry_reminder_mail_days = get_reminder_mail_days("sop_expiry");
$sop_online_exam_reminder_mail_days = get_reminder_mail_days("sop_online_exam");
$pass_expiry_reminder_mail_days = get_reminder_mail_days("pass_expiry");

if(!empty($pending_reminder_mail_days)){
    $smarty->assign("pending_reminder_mail_days",$pending_reminder_mail_days);
}
if(!empty($sop_online_exam_reminder_mail_days)){
    $smarty->assign("sop_online_exam_reminder_mail_days",$sop_online_exam_reminder_mail_days);
}
if(!empty($sop_expiry_reminder_mail_days)){
    $smarty->assign("sop_expiry_reminder_mail_days",$sop_expiry_reminder_mail_days);
}
if(!empty($pass_expiry_reminder_mail_days)){
    $smarty->assign("pass_expiry_reminder_mail_days",$pass_expiry_reminder_mail_days);
}
$remarks_obj = new DB_Public_reminder_mail_config_remarks();
$remarks_array=array();
$remarks_obj->orderBy('effective_from');
$remarks_obj->find();
while ($remarks_obj->fetch()){
    $remarks_array[]= ["reminder_mail_for"=>$remarks_obj->reminder_mail_for,"changed_from"=>$remarks_obj->changed_from,"changed_to"=>$remarks_obj->changed_to,"effective_from"=> get_modified_date_time_format($remarks_obj->effective_from),"reason"=>$remarks_obj->reason_for_change,"updated_by"=> getFullName($remarks_obj->updated_by),"date"=>get_modified_date_time_format($remarks_obj->updated_time)];
}

if(!empty($remarks_array)){
    $smarty->assign("remarks_array",$remarks_array);
}
$usr_id = $_SESSION['user_id'];
$time =  date('Y-m-d G:i:s');
    
if (isset($_POST['update_pending'])) {
    $reminder_mail_for = "pendinglist";
    
    $delete_mail_obj = new DB_Public_reminder_mail_config();
    $delete_mail_obj->get('reminder_mail_for',$reminder_mail_for);
    $delete_mail_obj->delete();
    
    $add_mail_obj = new DB_Public_reminder_mail_config();
    $add_mail_obj->no_of_days = trim($_POST['pendinglist_alert_days']);
    $add_mail_obj->reminder_mail_for = $reminder_mail_for;
    $add_mail_obj->insert();
    
    $penidng_remarks_obj = new DB_Public_reminder_mail_config_remarks();
    $penidng_remarks_obj->reason_for_change = trim($_POST['pendinglist_reason_for_change']);
    $penidng_remarks_obj->effective_from = $time;
    $penidng_remarks_obj->updated_by = $usr_id;
    $penidng_remarks_obj->updated_time = $time;
    $penidng_remarks_obj->changed_from = $pending_reminder_mail_days;
    $penidng_remarks_obj->changed_to = trim($_POST['pendinglist_alert_days']);
    $penidng_remarks_obj->reminder_mail_for = "penidnglist";
    $penidng_remarks_obj->insert();
       
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Reminder Mail Alert changed to ".trim($_POST['pendinglist_alert_days'])." days for Pendinglist\nReason for Change : ".trim($_POST['pendinglist_reason_for_change']); 
    $old_val = $pending_reminder_mail_days;

    $sequence_object = new Sequence;
    $audit_id="audit.mail_reminder:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_reminder_mail_config(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

if (isset($_POST['update_sop_expiry'])) {
    $reminder_mail_for = "sop_expiry";
    
    $delete_mail_obj = new DB_Public_reminder_mail_config();
    $delete_mail_obj->get('reminder_mail_for',$reminder_mail_for); 
    $delete_mail_obj->delete();
    
    $add_mail_obj = new DB_Public_reminder_mail_config();
    $add_mail_obj->no_of_days = trim($_POST['sop_expiry_alert_days']);
    $add_mail_obj->reminder_mail_for = $reminder_mail_for;
    $add_mail_obj->insert();
    
    $penidng_remarks_obj = new DB_Public_reminder_mail_config_remarks();
    $penidng_remarks_obj->reason_for_change = trim($_POST['sop_expiry_reason_for_change']);
    $penidng_remarks_obj->effective_from = $time;
    $penidng_remarks_obj->updated_by = $usr_id;
    $penidng_remarks_obj->updated_time = $time;
    $penidng_remarks_obj->changed_from = $sop_expiry_reminder_mail_days;
    $penidng_remarks_obj->changed_to = trim($_POST['sop_expiry_alert_days']);
    $penidng_remarks_obj->reminder_mail_for = $reminder_mail_for;
    $penidng_remarks_obj->insert();
    
    //Audit Trial
    $dept_id = getDeptId($usr_id);
    $new_val = "Reminder Mail Alert changed to ".trim($_POST['sop_expiry_alert_days'])." days for SOP Expiry\nReason for Change : ".trim($_POST['sop_expiry_reason_for_change']); 
    $old_val = $sop_expiry_reminder_mail_days;
    
    $sequence_object = new Sequence;
    $audit_id="audit.mail_reminder:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_reminder_mail_config(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}
if (isset($_POST['update_sop_oe'])) {
    $reminder_mail_for = "sop_online_exam";
    
    $delete_mail_obj = new DB_Public_reminder_mail_config();
    $delete_mail_obj->get('reminder_mail_for',$reminder_mail_for); 
    $delete_mail_obj->delete();
    
    $add_mail_obj = new DB_Public_reminder_mail_config();
    $add_mail_obj->no_of_days = trim($_POST['sop_oe_alert_days']);
    $add_mail_obj->reminder_mail_for = $reminder_mail_for;
    $add_mail_obj->insert();
    
    $penidng_remarks_obj = new DB_Public_reminder_mail_config_remarks();
    $penidng_remarks_obj->reason_for_change = trim($_POST['sop_oe_reason_for_change']);
    $penidng_remarks_obj->effective_from = $time;
    $penidng_remarks_obj->updated_by = $usr_id;
    $penidng_remarks_obj->updated_time = $time;
    $penidng_remarks_obj->changed_from = $sop_online_exam_reminder_mail_days;
    $penidng_remarks_obj->changed_to = trim($_POST['sop_oe_alert_days']);
    $penidng_remarks_obj->reminder_mail_for = $reminder_mail_for;
    $penidng_remarks_obj->insert();
    
    //Audit Trial
    $dept_id = getDeptId($usr_id);
    $new_val = "Reminder Mail Alert changed to ".trim($_POST['sop_oe_alert_days'])." days for SOP Online Exam\nReason for Change : ".trim($_POST['sop_oe_reason_for_change']); 
    $old_val = $sop_online_exam_reminder_mail_days;
    
    $sequence_object = new Sequence;
    $audit_id="audit.mail_reminder:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_reminder_mail_config(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}
if (isset($_POST['update_pass_expiry'])) {
    $reminder_mail_for = "pass_expiry";
    $delete_mail_obj = new DB_Public_reminder_mail_config();
    $delete_mail_obj->get('reminder_mail_for',$reminder_mail_for); 
    $delete_mail_obj->delete();
    
    $add_mail_obj = new DB_Public_reminder_mail_config();
    $add_mail_obj->no_of_days = trim($_POST['pass_expiry_alert_days']);
    $add_mail_obj->reminder_mail_for = $reminder_mail_for;
    $add_mail_obj->insert();
    
    $penidng_remarks_obj = new DB_Public_reminder_mail_config_remarks();
    $penidng_remarks_obj->reason_for_change = trim($_POST['pass_expiry_reason_for_change']);
    $penidng_remarks_obj->effective_from = $time;
    $penidng_remarks_obj->updated_by = $usr_id;
    $penidng_remarks_obj->updated_time = $time;
    $penidng_remarks_obj->changed_from = $pass_expiry_reminder_mail_days;
    $penidng_remarks_obj->changed_to = trim($_POST['pass_expiry_alert_days']);
    $penidng_remarks_obj->reminder_mail_for = $reminder_mail_for;
    $penidng_remarks_obj->insert();
    
    //Audit Trial
    $dept_id = getDeptId($usr_id);
    $new_val = "Reminder Mail Alert changed to ".trim($_POST['pass_expiry_alert_days'])." days for Password Expiry\nReason for Change : ".trim($_POST['pass_expiry_reason_for_change']); 
    $old_val = $pass_expiry_reminder_mail_days;
    
    $sequence_object = new Sequence;
    $audit_id="audit.mail_reminder:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_reminder_mail_config(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

$days_range =range(1, 30);
$smarty->assign("days_range",$days_range);
$smarty->assign('main',_TEMPLATE_PATH_."reminder_mail_config.admin.tpl");
?>
