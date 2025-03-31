<?php
/**
 * Project:     Logicmind
 * File:        sop_online_exam_attempt_limit.admin.php
 *
 * @author Ananthakumar V
 * @since 19/04/2019
 * @package admin
 * @version 1.0
 * @see sop_online_exam_attempt_limit.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$sop_exam_attempt_limit = getSopExamAttemptLimit();
$sop_exam_attempt_limit_remarks_obj = new DB_Public_lm_sop_online_exam_attempt_limit_remarks();
$sop_exam_attempt_limit_remarks_obj->orderBy('effective_from');
$sop_exam_attempt_limit_remarks_obj->find();
while ($sop_exam_attempt_limit_remarks_obj->fetch()){
    $sop_exam_limit_remarks[]= ["changed_from"=>$sop_exam_attempt_limit_remarks_obj->changed_from,"changed_to"=>$sop_exam_attempt_limit_remarks_obj->changed_to,"effective_from"=>$sop_exam_attempt_limit_remarks_obj->effective_from,"reason"=>$sop_exam_attempt_limit_remarks_obj->reason_for_change,"updated_by"=> getFullName($sop_exam_attempt_limit_remarks_obj->updated_by),"date"=>$sop_exam_attempt_limit_remarks_obj->updated_time];
}

if (isset($_POST['update'])) {
    $usr_id = $_SESSION['user_id'];
    $time =  date('Y-m-d G:i:s');
    /**Delete */
    $delete_exam_limit_obj = new DB_Public_lm_sop_online_exam_attempt_limit();
    $delete_exam_limit_obj->find();
    if($delete_exam_limit_obj->fetch()){
        $delete_exam_limit_obj->delete();    
    }
    /**Add */
    $aexam_limit_obj = new DB_Public_lm_sop_online_exam_attempt_limit();
    $aexam_limit_obj->attempt_limit = trim($_POST['usop_exam_limit']);
    $aexam_limit_obj->insert();
    /**Update Remarks */
    $aexam_limit_remarks_obj = new DB_Public_lm_sop_online_exam_attempt_limit_remarks();
    $aexam_limit_remarks_obj->reason_for_change = trim($_POST['reason_for_change']);
    $aexam_limit_remarks_obj->effective_from = $time;
    $aexam_limit_remarks_obj->updated_by = $usr_id;
    $aexam_limit_remarks_obj->updated_time = $time;
    $aexam_limit_remarks_obj->changed_from = $sop_exam_attempt_limit;
    $aexam_limit_remarks_obj->changed_to = trim($_POST['usop_exam_limit']);
    $aexam_limit_remarks_obj->insert();
    
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Attempt Limit Changed To ".trim($_POST['usop_exam_limit'])."\nReason for Change : ".trim($_POST['reason_for_change']);    
    $old_val = $sop_exam_attempt_limit;

    $sequence_object = new Sequence;
    $audit_id="audit.sop_exam_limit:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_online_exam_attempt_limit(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

$limit_range =range(1, 5);
$smarty->assign("limit_range",$limit_range);
if(!empty($sop_exam_attempt_limit)){
    $smarty->assign("sop_exam_attempt_limit",$sop_exam_attempt_limit);
}
if(!empty($sop_exam_limit_remarks)){
    $smarty->assign("sop_exam_limit_remarks",$sop_exam_limit_remarks);
}
$smarty->assign('main',_TEMPLATE_PATH_."sop_online_exam_attempt_limit.admin.tpl");
?>
