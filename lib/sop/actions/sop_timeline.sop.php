<?php

/**
 * Project:     Logicmind
 * File:        add_sop.sop.php
 *
 * @author Ananthakumar.v 
 * @since 10/02/2017
 * @package sop
 * @version 1.0
 * @see add_sop.sop.php
 */
if (!check_access($username, 'sop_timeline', 'yes')) {
    $error_handler->raiseError("sop_timeline");
}
error_reporting(E_ALL & ~E_NOTICE);
include_module("admin");
$view_sop_type = new SopType();
$soptypelist = $view_sop_type->sop_type_list(null);
$usr_id = $_SESSION['user_id'];

//create object for the sop function Module
$sop_process = new Sop_Processor();
$sop_type_id = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;
$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;

$sop_count = 0;
$sop_obj = new DB_Public_lm_sop_master();
$sop_obj->orderBy('created_time');
if (!empty($sop_type_id)) {
    $sop_obj->whereAdd("sop_type='$sop_type_id'");
}
if ($sop_obj->find()) {
    while ($sop_obj->fetch()) {
        $sop_type = $sop_process->get_sop_type($sop_obj->sop_type);
        $sop_no = $sop_process->get_sop_no($sop_obj->sop_object_id);
        $sop_no = "<a href=" . "index.php?module=sop&action=view_sop&object_id=$sop_obj->sop_object_id target='_blank'" . "><font color=blue>" . $sop_no . "</font></a>";
        $sop_name = $sop_obj->sop_name;
        $revision = $sop_obj->revision;
        $supersedes = $sop_obj->supersedes;
        if (!empty($sop_obj->effective_date)) {
            $effective_date = get_modified_date_format($sop_obj->effective_date);
        } else {
            $effective_date = "";
        }
        if (!empty($sop_obj->expiry_date)) {
            $expiry_date = $sop_obj->expiry_date;
        } else {
            $expiry_date = "";
        }
        $is_latest_revision = $sop_obj->is_latest_revision;
        $status = $sop_process->get_published_status($sop_obj->sop_object_id);
        $sop_list[] = array('sop_object_id' => $sop_obj->sop_object_id, 'sop_type' => $sop_type, 'sop_no' => $sop_no, 'sop_name' => $sop_name, 'revision' => $revision, 'supersedes' => $supersedes, 'effective_date' => $effective_date, 'expiry_date' => $expiry_date, 'is_latest_revision' => $is_latest_revision, 'status' => $status);
    }
}
$view_sop_obj = new DB_Public_lm_sop_master();
if ($view_sop_obj->get("sop_object_id", $sop_object_id)) {
    if (!empty($view_sop_obj->effective_date)) {
        $sop_effective_date = get_modified_date_format($view_sop_obj->effective_date);
    } else {
        $sop_effective_date = "-";
    }
    if (!empty($view_sop_obj->expiry_date)) {
        $sop_expiry_date = get_modified_date_format($view_sop_obj->expiry_date);
    } else {
        $sop_expiry_date = "-";
    }
    //Creator Info
    $creator = $sop_process->get_creater_id_digital_sign($sop_object_id);
    $creator_name = getFullName($creator);
    $creator_dept = getDeptName($creator);
    $created_date_time = $sop_process->get_created_time_digital_sign($sop_object_id);
    list($create_year, $create_month, $create_day, $create_h, $create_i, $create_s) = sscanf($created_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $created_year = date('Y', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_month = date('M', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_date = date('d', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_month_date = $created_date . " " . $created_month;
    $creator_remarks = $sop_process->get_sop_remarks($sop_object_id, $creator);
    $creator_image = get_user_image($creator);
    
    //Reviewer Info
    $reviwer = $sop_process->get_reviewer_id_digital_sign($sop_object_id);
    $reviwer_name = getFullName($reviwer);
    $reviwer_dept = getDeptName($reviwer);
    $reviewed_date_time = $sop_process->get_reviewed_time_digital_sign($sop_object_id);
    list($review_year,$review_month,$review_day, $review_h,$review_i,$review_s) = sscanf($reviewed_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $reviewed_year= date('Y', mktime($review_h,$review_i,$review_s,$review_month,$review_year,$review_day));
    $reviewed_month= date('M', mktime($review_h,$review_i,$review_s,$review_month,$review_year,$review_day));
    $reviewed_date= date('d', mktime($review_h,$review_i,$review_s,$review_month,$review_year,$review_day));
    $reviewed_month_date = $reviewed_date." ".$reviewed_month;
    $reviewer_remarks = $sop_process->get_sop_remarks($sop_object_id,$reviwer);
    $reviewer_image = get_user_image($reviwer);

    //Approver Info
    $approver = $sop_process->get_approver_id_digital_sign($sop_object_id);
    $approver_name = getFullName($approver);
    $approver_dept = getDeptName($approver);
    $approved_date_time = $sop_process->get_approved_time_digital_sign($sop_object_id);
    list($approve_year, $approve_month, $approve_day, $approve_h, $approve_i, $approve_s) = sscanf($approved_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $approved_year = date('Y', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_month = date('M', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_date = date('d', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_month_date = $approved_date . " " . $approved_month;
    $approver_remarks = $sop_process->get_sop_remarks($sop_object_id, $approver);
    $approver_image = get_user_image($approver);

    //Authorizer Info
    $authorizer = $sop_process->get_authorizer_id_digital_sign($sop_object_id);
    $authorizer_name = getFullName($authorizer);
    $authorizer_dept = getDeptName($authorizer);
    $authorized_date_time = $sop_process->get_authorized_time_digital_sign($sop_object_id);
    list($authorize_year, $authorize_month, $authorize_day, $authorize_h, $authorize_i, $authorize_s) = sscanf($authorized_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $authorized_year = date('Y', mktime($authorize_h, $authorize_i, $authorize_s, $authorize_month, $authorize_year, $authorize_day));
    $authorized_month = date('M', mktime($authorize_h, $authorize_i, $authorize_s, $authorize_month, $authorize_year, $authorize_day));
    $authorized_date = date('d', mktime($authorize_h, $authorize_i, $authorize_s, $authorize_month, $authorize_year, $authorize_day));
    $authorized_month_date = $authorized_date . " " . $authorized_month;
    $authorizer_remarks = $sop_process->get_sop_remarks($sop_object_id, $authorizer);
    $authorizer_image = get_user_image($authorizer);

    //Training Details
    $sop_training_details = $sop_process->get_sop_training_details($sop_object_id, 'yes', 'yes');
    if (!empty($sop_training_details)) {
        for ($i = 0; $i < count($sop_training_details); $i++) {
            $training_date_time = $sop_training_details[$i]['training_date'];
            list($training_year, $training__month, $training__day, $training__h, $training__i, $training__s) = sscanf($authorized_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $trained_year = date('Y', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_month = date('M', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_date = date('d', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_month_date = $trained_date . " " . $trained_month;
            $trainer_image = get_user_image($sop_training_details[$i]['trainer_id']);
            $trainer_name = $sop_training_details[$i]['trainer'];
            $trainer_dept = $sop_training_details[$i]['trainer_dept'];
        }
    }
    $sop_trainees_details = $sop_process->get_sop_trainees_list($sop_object_id);

    $smarty->assign("created_year", $created_year);
    $smarty->assign("created_month_date", $created_month_date);
    $smarty->assign("creator_name", $creator_name);
    $smarty->assign("creator_dept", $creator_dept);
    $smarty->assign("created_date_time", $created_date_time);
    $smarty->assign("creator_remarks", $creator_remarks);
    $smarty->assign("creator_image", $creator_image);
    
    $smarty->assign("reviewed_year",$reviewed_year);
    $smarty->assign("reviewed_month_date",$reviewed_month_date);
    $smarty->assign("reviwer_name",$reviwer_name);
    $smarty->assign("reviwer_dept",$reviwer_dept);
    $smarty->assign("reviewed_date_time",$reviewed_date_time);
    $smarty->assign("reviewer_remarks",$reviewer_remarks);
    $smarty->assign("reviewer_image",$reviewer_image);

    $smarty->assign("approved_year", $approved_year);
    $smarty->assign("approved_month_date", $approved_month_date);
    $smarty->assign("approver_name", $approver_name);
    $smarty->assign("approver_dept", $approver_dept);
    $smarty->assign("approved_date_time", $approved_date_time);
    $smarty->assign("approver_remarks", $approver_remarks);
    $smarty->assign("approver_image", $approver_image);

    $smarty->assign("authorized_year", $authorized_year);
    $smarty->assign("authorized_month_date", $authorized_month_date);
    $smarty->assign("authorizer_name", $authorizer_name);
    $smarty->assign("authorizer_dept", $authorizer_dept);
    $smarty->assign("authorized_date_time", $authorized_date_time);
    $smarty->assign("authorizer_remarks", $authorizer_remarks);
    $smarty->assign("authorizer_image", $authorizer_image);

    $smarty->assign("trained_year", $trained_year);
    $smarty->assign("trained_month", $trained_month);
    $smarty->assign("trained_date", $trained_date);
    $smarty->assign("trained_month_date", $trained_month_date);
    $smarty->assign("trainer_image", $trainer_image);
    $smarty->assign("trainer_name", $trainer_name);
    $smarty->assign("trainer_dept", $trainer_dept);
    $smarty->assign("training_date_time", $training_date_time);
    $smarty->assign("sop_trainees_details", $sop_trainees_details);
    $smarty->assign("sop_effective_date", $sop_effective_date);
    $smarty->assign("sop_expiry_date", $sop_expiry_date);
    $smarty->assign("sop_name", $view_sop_obj->sop_name);
}
if (!empty($sop_process->get_sop_type($sop_type_id))) {
    $smarty->assign("sop_type", $sop_process->get_sop_type($sop_type_id));
}
$smarty->assign("soptypelist", $soptypelist);
$smarty->assign("sop_list", $sop_list);
$smarty->assign("sop_type_id", $sop_type_id);
$smarty->assign("sop_object_id", $sop_object_id);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_timeline.sop.tpl");
?>
