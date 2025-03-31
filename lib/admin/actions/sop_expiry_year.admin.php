<?php
/**
 * Project:     Logicmind
 * File:        sop_expiry_year.admin.php
 *
 * @author Ananthakumar V
 * @since 07/04/2017
 * @package admin
 * @version 1.0
 * @see sop_expiry_year.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$sop_expiry_year = get_sop_expiry_year();
if(!empty($sop_expiry_year)){
    $smarty->assign("sop_expiry_year",$sop_expiry_year);
}
$sop_exp_obj = new DB_Public_lm_sop_expiry_year_remarks();
$sop_expiry_remarks=array();
$sop_exp_obj->orderBy('effective_from');
$sop_exp_obj->find();
while ($sop_exp_obj->fetch()){
    $sop_expiry_remarks[]= ["changed_from"=>$sop_exp_obj->changed_from,"changed_to"=>$sop_exp_obj->changed_to,"effective_from"=>$sop_exp_obj->effective_from,"reason"=>$sop_exp_obj->reason_for_change,"updated_by"=> getFullName($sop_exp_obj->updated_by),"date"=>$sop_exp_obj->updated_time];
}

if(!empty($sop_expiry_remarks)){
    $smarty->assign("sop_expiry_remarks",$sop_expiry_remarks);
}
$time =  date('Y-m-d G:i:s');
    
if (isset($_POST['update'])) {
    $usr_id = $_SESSION['user_id'];
    
    
    $delete_expiry_obj = new DB_Public_lm_sop_expiry_year();
    $delete_expiry_obj->find();
    if($delete_expiry_obj->fetch()){
        $delete_expiry_obj->delete();    
    }
    
    $expiry_obj = new DB_Public_lm_sop_expiry_year();
    $expiry_obj->no_of_year = trim($_POST['expiry_year']);
    $expiry_obj->insert();
    
    $expiry_remarks_obj = new DB_Public_lm_sop_expiry_year_remarks();
    $expiry_remarks_obj->reason_for_change = trim($_POST['reason_for_change']);
    $expiry_remarks_obj->effective_from = $time;
    $expiry_remarks_obj->updated_by = $usr_id;
    $expiry_remarks_obj->updated_time = $time;
    $expiry_remarks_obj->changed_from = $sop_expiry_year;
    $expiry_remarks_obj->changed_to = trim($_POST['expiry_year']);
    $expiry_remarks_obj->insert();
    
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Expiry Year Changed To ".trim($_POST['expiry_year'])." Years\nReason for Change : ".trim($_POST['reason_for_change']);    
    $old_val = $sop_expiry_year;

    $sequence_object = new Sequence;
    $audit_id="audit.sop_expiry_year:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_expiry_year(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

$year_range =range(1, 10);
$smarty->assign("year_range",$year_range);
$smarty->assign('main',_TEMPLATE_PATH_."sop_expiry_year.admin.tpl");
?>
