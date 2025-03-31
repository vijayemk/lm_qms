<?php
/**
 * Project:     Logicmind
 * File:        sop_online_exam_passmark.admin.php
 *
 * @author Ananthakumar V
 * @since 19/04/209
 * @package admin
 * @version 1.0
 * @see sop_online_exam_passmark.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$sop_pass_mark = getSopExamPassMark();
$sop_passmark_obj = new DB_Public_lm_sop_online_exam_pass_mark_remarks();
$sop_passmark_obj->orderBy('effective_from');
$sop_passmark_obj->find();
while ($sop_passmark_obj->fetch()){
    $sop_passmark_remarks[]= array("changed_from"=>$sop_passmark_obj->changed_from,"changed_to"=>$sop_passmark_obj->changed_to,"effective_from"=>$sop_passmark_obj->effective_from,"reason"=>$sop_passmark_obj->reason_for_change,"updated_by"=> getFullName($sop_passmark_obj->updated_by),"date"=>$sop_passmark_obj->updated_time);
}
if (isset($_POST['update'])) {
    $usr_id = $_SESSION['user_id'];
    $time =  date('Y-m-d G:i:s');
    /**Delete */
    $delete_passmark_obj = new DB_Public_lm_sop_online_exam_pass_mark();
    $delete_passmark_obj->find();
    if($delete_passmark_obj->fetch()){
        $delete_passmark_obj->delete();    
    }
    /**Add */
    $apassmark_obj = new DB_Public_lm_sop_online_exam_pass_mark();
    $apassmark_obj->pass_mark = trim($_POST['usop_pass_mark']);
    $apassmark_obj->insert();
    /**Update Remarks */
    $apassmark_remarks_obj = new DB_Public_lm_sop_online_exam_pass_mark_remarks();
    $apassmark_remarks_obj->reason_for_change = trim($_POST['reason_for_change']);
    $apassmark_remarks_obj->effective_from = $time;
    $apassmark_remarks_obj->updated_by = $usr_id;
    $apassmark_remarks_obj->updated_time = $time;
    $apassmark_remarks_obj->changed_from = $sop_pass_mark;
    $apassmark_remarks_obj->changed_to = trim($_POST['usop_pass_mark']);
    $apassmark_remarks_obj->insert();
    
    // Audit Trail
    $dept_id = getDeptId($usr_id);
    $new_val = "Passmark Changed To ".trim($_POST['usop_pass_mark'])."\nReason for Change : ".trim($_POST['reason_for_change']);    
    $old_val = $sop_pass_mark;

    $sequence_object = new Sequence;
    $audit_id="audit.sop_passmark:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_sop_online_exam_pass_mark(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}
$mark_range = range(50, 100,5);
$smarty->assign("mark_range",$mark_range);
if(!empty($sop_pass_mark)){
    $smarty->assign("sop_pass_mark",$sop_pass_mark);
}
if(!empty($sop_passmark_remarks)){
    $smarty->assign("sop_passmark_remarks",$sop_passmark_remarks);
}
$smarty->assign('main',_TEMPLATE_PATH_."sop_online_exam_passmark.admin.tpl");
?>
