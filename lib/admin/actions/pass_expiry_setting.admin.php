<?php
/**
 * Project:     Logicmind
 * File:        pass_expiry_setting.admin.php
 *
 * @author Ananthakumar V
 * @since 19/09/2018
 * @package admin
 * @version 1.0
 * @see current_setting.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$pass_exp_remarks_obj = new DB_Public_password_expiry_remarks();
$pass_exp_remarks_obj->orderBy('effective_from');
$pss_expiry_remarks=array();
$pass_exp_remarks_obj->find();
while ($pass_exp_remarks_obj->fetch()){
    $pass_expiry_remarks[]= ["changed_from"=>$pass_exp_remarks_obj->changed_from,"changed_to"=>$pass_exp_remarks_obj->changed_to,"effective_from"=>$pass_exp_remarks_obj->effective_from,"reason"=>$pass_exp_remarks_obj->reason_for_change,"updated_by"=> getFullName($pass_exp_remarks_obj->updated_by),"date"=>$pass_exp_remarks_obj->updated_time];
}
$current_expiry = get_current_password_expiry_days();
if (isset($_POST['update'])) {
    $usr_id = $_SESSION['user_id'];
    $time =  date('Y-m-d G:i:s');
        
    $delete_expiry_obj = new DB_Public_password_expiry();
    $delete_expiry_obj->find();
    if($delete_expiry_obj->fetch()){
        $delete_expiry_obj->delete();    
    }
    
    $expiry_obj = new DB_Public_password_expiry();
    $expiry_obj->days = trim($_POST['expiry_changed_to']);
    $expiry_obj->insert();
    
    $expiry_remarks_obj = new DB_Public_password_expiry_remarks();
    $expiry_remarks_obj->reason_for_change = trim($_POST['reason_for_change']);
    $expiry_remarks_obj->effective_from = $time;
    $expiry_remarks_obj->updated_by = $usr_id;
    $expiry_remarks_obj->updated_time = $time;
    $expiry_remarks_obj->changed_from = $current_expiry;
    $expiry_remarks_obj->changed_to = trim($_POST['expiry_changed_to']);
    $expiry_remarks_obj->insert();
        
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Expiry Days : {$_POST['expiry_changed_to']}";
    $old_val = "Expiry Days : $current_expiry";

    $sequence_object = new Sequence;
    $audit_id="audit.pass_expiry:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_password_expiry(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}
if(!empty($current_expiry)){
    $smarty->assign("current_expiry",$current_expiry);
}
if(!empty($pass_expiry_remarks)){
    $smarty->assign("pass_expiry_remarks",$pass_expiry_remarks);
}
$smarty->assign('main',_TEMPLATE_PATH_."pass_expiry_setting.admin.tpl");
?>
