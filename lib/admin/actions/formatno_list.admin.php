<?php
/**
 * Project:     Logicmind
 * File:        formatno_list.admin.php
 *
 * @author Ananthakumar V
 * @since 09/06/2017
 * @package admin
 * @version 1.0
 * @see formatno_list.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$time =  date('Y-m-d G:i:s');
$createyear=date('y');
$createmonth=date('m');
include_module("sop");
$sop_process=new Sop_Processor();

$view_sop_type = new SopType();
$soptypelist = $view_sop_type->sop_type_list(null);

//latest
$formatlist_obj = new DB_Public_lm_formatno_list();
$formatlist_obj->whereAdd("is_latest_revision='yes'");
$formatlist_obj->find();
while ($formatlist_obj->fetch()){
    $sop_type = $sop_process->get_sop_type($sop_obj->sop_type);
    $latest_formatlist[] = array('object'=>$formatlist_obj->object,'sop_type'=>$sop_process->get_sop_type($formatlist_obj->sop_type),'format_no'=>$formatlist_obj->format_no,'valid_from'=> get_modified_date_format($formatlist_obj->valid_from),'created_by'=> getFullName($formatlist_obj->created_by),'created_time'=> get_modified_date_time_format($formatlist_obj->created_time));
}
if(isset($latest_formatlist)){
    $smarty->assign('latest_formatlist',$latest_formatlist);
}
//old
$formatlist_obj = new DB_Public_lm_formatno_list();
$formatlist_obj->whereAdd("is_latest_revision='no'");
$formatlist_obj->find();
while ($formatlist_obj->fetch()){
    $sop_type = $sop_process->get_sop_type($sop_obj->sop_type);
    $old_formatlist[] = array('object'=>$formatlist_obj->object,'sop_type'=>$sop_process->get_sop_type($formatlist_obj->sop_type),'format_no'=>$formatlist_obj->format_no,'valid_from'=> get_modified_date_format($formatlist_obj->valid_from),'valid_to'=> get_modified_date_format($formatlist_obj->valid_to),'created_by'=> getFullName($formatlist_obj->created_by),'created_time'=> get_modified_date_time_format($formatlist_obj->created_time));
}
if(isset($old_formatlist)){
    $smarty->assign('old_formatlist',$old_formatlist);
}

if (isset($_POST['add'])) {
    $sequence_object = new Sequence;
    $id="admin.format:".$sequence_object->get_next_sequence();

    $object = trim($_POST['sop_format_annexure_type']);
    $sop_type = trim($_POST['sop_type']);
    $format_no = trim($_POST['format_no']);
    
    $prev_format_exist = $sop_process->check_prev_formatno($object, $sop_type);
    if($prev_format_exist){
        //Update previous format no valid to date
        $valid_to =  date('Y-m-d');
        $is_latest_revision = "no";
        $sop_process->update_format_no_validto_revision($object, $sop_type, $valid_to,$is_latest_revision);
        
        list($year,$month,$day, $h,$i,$s) = sscanf(date('Y-m-d'), '%4s-%2s-%2s');
        $valid_from= date('Y-m-d', mktime($h,$i,$s,$month,$day+1,$year));
    }else{
        $valid_from =  date('Y-m-d');
    }
    
    $format_obj = new DB_Public_lm_formatno_list();
    $format_obj->object_id = $id;
    $format_obj->object = $object;
    $format_obj->sop_type = $sop_type;
    $format_obj->format_no = trim($_POST['format_no']);
    $format_obj->valid_from = $valid_from;
    $format_obj->valid_to = NULL;
    $format_obj->created_by = $usr_id;
    $format_obj->created_time = $time;
    $format_obj->modified_by = $usr_id;
    $format_obj->modified_time = $time;
    $format_obj->insert();
    
    // Audit Trail
    $new_val = "Object : ".$object."n\SOP Type : ".$sop_process->get_sop_type($sop_type)."\nFormat No : ".trim($_POST['format_no']);
    $old_val = null;

    $sequence_object = new Sequence;
    $audit_id="audit.format:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_formatno_list(),$audit_id,$usr_id,$dept_id,'add',$new_val,$old_val,"Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}
$smarty->assign('soptypelist',$soptypelist);
$smarty->assign('main',_TEMPLATE_PATH_."formatno_list.admin.tpl");
?>
