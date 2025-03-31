<?php

/**
 * Project:     Logicmind
 * File:        capa_timeline.capa.php
 *
 * @author Gopinath R
 * @since0 25/03/2020
 * @package capa
 * @version 1.0
 * @see capa_timeline.capa.tpl
 */
$usr_id = $_SESSION['user_id'];
$plant_id = getUserPlantId($usr_id);

$sop_process = new Sop_Processor();
$capa_process = new Capa_Processor();

$capa_list = $capa_process->get_capa_list(null, $plant_id);

$capa_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;

$capa_master = new DB_Public_lm_capa_master();
if ($capa_master->get("capa_object_id", $capa_object_id)) {


    $capa_no = $capa_master->capa_no;
    $target_date = get_modified_date_format($capa_master->target_date);
    $close_out_date = get_modified_date_time_format($capa_master->modified_time);

    // Creator Info
    $creator = $sop_process->get_creater_id_digital_sign($capa_object_id);
    $creator_name = getFullName($creator);
    $creator_dept = getDeptName($creator);
    $created_date_time = $sop_process->get_created_time_digital_sign($capa_object_id);
    list($create_year, $create_month, $create_day, $create_h, $create_i, $create_s) = sscanf($created_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $created_year = date('Y', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_month = date('M', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_date = date('d', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_month_date = $created_date . " " . $created_month;
    $creator_remarks = $capa_process->get_capa_workflow_remarks($capa_object_id, $creator);
    $creator_image = get_user_image($creator);

    // Dept. Approver Info 
    $dept_approve = $sop_process->get_dept_approver_id_digital_sign($capa_object_id);
    $dept_approver_name = getFullName($dept_approve);
    $dept_approver_dept = getDeptName($dept_approve);
    $dept_approved_date_time = $sop_process->get_dept_approved_time_digital_sign($capa_object_id);
    list($dept_approve_year, $dept_approve_month, $dept_approve_day, $dept_approve_h, $dept_approve_i, $dept_approve_s) = sscanf($dept_approved_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $dept_approved_year = date('Y', mktime($dept_approve_h, $dept_approve_i, $dept_approve_s, $dept_approve_month, $dept_approve_year, $dept_approve_day));
    $dept_approved_month = date('M', mktime($dept_approve_h, $dept_approve_i, $dept_approve_s, $dept_approve_month, $dept_approve_year, $dept_approve_day));
    $dept_approved_date = date('d', mktime($dept_approve_h, $dept_approve_i, $dept_approve_s, $dept_approve_month, $dept_approve_year, $dept_approve_day));
    $dept_approved_month_date = $dept_approved_date . " " . $dept_approved_month;
    $dept_approver_remarks = $capa_process->get_capa_workflow_remarks($capa_object_id, $dept_approve);
    $dept_approver_image = get_user_image($dept_approve);

    // Reviewer Info
    $reviwer = $sop_process->get_capa_pre_reviewer_array_id_digital_sign($capa_object_id);
    $reviewed_date_time = $sop_process->get_pre_reviewed_time_digital_sign($capa_object_id);
    list($review_year, $review_month, $review_day, $review_h, $review_i, $review_s) = sscanf($reviewed_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $reviewed_month = date('M', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
    $reviewed_date = date('d', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
    $reviewed_year = date('Y', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
    $reviewed_month_date = $reviewed_date . " " . $reviewed_month;

    // Approver Info
    $approver = $sop_process->get_approver_id_digital_sign($capa_object_id);
    $approver_name = getFullName($approver);
    $approver_dept = getDeptName($approver);
    $approved_date_time = $sop_process->get_approved_time_digital_sign($capa_object_id);
    list($approve_year, $approve_month, $approve_day, $approve_h, $approve_i, $approve_s) = sscanf($approved_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $approved_year = date('Y', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_month = date('M', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_date = date('d', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_month_date = $approved_date . " " . $approved_month;
    $approver_remarks = $capa_process->get_capa_workflow_remarks($capa_object_id, $approver);
    $approver_image = get_user_image($approver);

    // Meeting Details
    $meeting_object_id = $capa_process->get_capa_meeting_object_id($capa_object_id, "yes");
    if (!empty($meeting_object_id)) {
        $capa_meeting_details = $capa_process->get_capa_meeting_details(null, $meeting_object_id);
    }
    if (!empty($capa_meeting_details)) {
        for ($i = 0; $i < count($capa_meeting_details); $i++) {
            $meeting_date_time = $capa_meeting_details[$i]['meeting_date'];
            $meeting_venue = $capa_meeting_details[$i]['meeting_venue'];
            $meeting_time = $capa_meeting_details[$i]['meeting_time'];
            $meeting_status = $capa_meeting_details[$i]['status'];

            list($meet_year, $meeting__month, $meeting__day, $meeting__h, $meeting__i, $meeting__s) = sscanf($meeting_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $meeting_year = date('Y', mktime($meeting__h, $meeting__i, $meeting__s, $meeting__month, $meet_year, $meeting__day));
            $meeting_month = date('M', mktime($meeting__h, $meeting__i, $meeting__s, $meeting__month, $meet_year, $meeting__day));
            $meeting_date = date('d', mktime($meeting__h, $meeting__i, $meeting__s, $meeting__month, $meet_year, $meeting__day));
            $meeting_month_date = $meeting_date . " " . $meeting_month;
        }
    }

    // Attendee Details
    $attendee_details = $capa_process->get_capa_meet_attendees_details($capa_object_id);

    // Training Details
    $training_object_id = $capa_process->get_capa_training_object_id($capa_object_id, "yes");
    $capa_training_details = $capa_process->get_capa_training_details($capa_object_id, $training_object_id);
    if (!empty($capa_training_details)) {
        for ($i = 0; $i < count($capa_training_details); $i++) {
            $training_date_time = $capa_training_details[$i]['training_date'];
            list($training_year, $training__month, $training__day, $training__h, $training__i, $training__s) = sscanf($training_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $trained_year = date('Y', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_month = date('M', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_date = date('d', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_month_date = $trained_date . " " . $trained_month;
            $trainer_image = get_user_image($capa_training_details[$i]['trainer_id']);
            $trainer_name = $capa_training_details[$i]['trainer'];
            $trainer_dept = $capa_training_details[$i]['trainer_dept'];
            $training_venue = $capa_training_details[$i]['training_venue'];
        }
    }

    // Trainee Details
    $trainee_details = $capa_process->get_capa_trainees_list($capa_object_id);

    // Interim Extension Details
    $capa_extension_details = $capa_process->get_capa_extension_details($capa_object_id);
    $smarty->assign('capa_extension_details', $capa_extension_details);
    if (!empty($capa_extension_details)) {
        for ($i = 0; $i < count($capa_extension_details); $i++) {
            $existing_target_date = $capa_extension_details[$i]['existing_target_date'];
            $proposed_target_date = $capa_extension_details[$i]['proposed_target_date'];
            $reason = $capa_extension_details[$i]['reason'];
            $status = $capa_extension_details[$i]['status'];
        }
    }

    $smarty->assign("created_year", $created_year);
    $smarty->assign("created_month_date", $created_month_date);
    $smarty->assign("creator_name", $creator_name);
    $smarty->assign("creator_dept", $creator_dept);
    $smarty->assign("created_date_time", $created_date_time);
    $smarty->assign("creator_remarks", $creator_remarks);
    $smarty->assign("creator_image", $creator_image);

    $smarty->assign("reviwer", $reviwer);
    $smarty->assign("reviewed_year", $reviewed_year);
    $smarty->assign("reviewed_month_date", $reviewed_month_date);
    $smarty->assign("reviewed_date_time", $reviewed_date_time);

    $smarty->assign("dept_approved_year", $dept_approved_year);
    $smarty->assign("dept_approved_month_date", $dept_approved_month_date);
    $smarty->assign("dept_approver_name", $dept_approver_name);
    $smarty->assign("dept_approver_dept", $dept_approver_dept);
    $smarty->assign("dept_approve_date_time", $dept_approve_date_time);
    $smarty->assign("dept_approver_remarks", $dept_approver_remarks);
    $smarty->assign("dept_approver_image", $dept_approver_image);

    $smarty->assign("approved_year", $approved_year);
    $smarty->assign("approved_month_date", $approved_month_date);
    $smarty->assign("approver_name", $approver_name);
    $smarty->assign("approver_dept", $approver_dept);
    $smarty->assign("approved_date_time", $approved_date_time);
    $smarty->assign("approver_remarks", $approver_remarks);
    $smarty->assign("approver_image", $approver_image);

    $smarty->assign("meeting_year", $meeting_year);
    $smarty->assign("meeting_month", $meeting_month);
    $smarty->assign("meeting_date", $meeting_date);
    $smarty->assign("meeting_date_time", $meeting_date_time);
    $smarty->assign("meeting_month_date", $meeting_month_date);
    $smarty->assign("meeting_venue", $meeting_venue);
    $smarty->assign("meeting_status", $meeting_status);
    $smarty->assign("meeting_time", $meeting_time);
    $smarty->assign("attendee_details", $attendee_details);

    $smarty->assign('mom_details', $capa_process->get_capa_mom_details($capa_object_id, null, null, null));

    $smarty->assign("trained_year", $trained_year);
    $smarty->assign("trained_month", $trained_month);
    $smarty->assign("trained_date", $trained_date);
    $smarty->assign("trained_month_date", $trained_month_date);
    $smarty->assign("trainer_image", $trainer_image);
    $smarty->assign("trainer_name", $trainer_name);
    $smarty->assign("trainer_dept", $trainer_dept);
    $smarty->assign("training_date_time", $training_date_time);
    $smarty->assign("trainee_details", $trainee_details);
    $smarty->assign("training_venue", $training_venue);
}
$smarty->assign("capa_obj_id", $capa_object_id);
$smarty->assign("capa_master", $capa_master);
$smarty->assign("capa_list", $capa_list);
$smarty->assign("close_out_date", $close_out_date);
$smarty->assign("target_date", $target_date);
$smarty->assign("approved_status", $capa_master->approved_status);
$smarty->assign('main', _TEMPLATE_PATH_ . "capa_timeline.capa.tpl");
?>

