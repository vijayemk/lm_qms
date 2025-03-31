<?php

/**
 * Project:     Logicmind
 * File:        ccm_timeline.ccm.php
 *
 * @author Benila Arthi O G
 * @since0 02/03/2020
 * @package ccm
 * @version 1.0
 * @see cccm_timeline.ccm.tpl
 */
$usr_id = $_SESSION['user_id'];
$plant_id = getUserPlantId($usr_id);

$ccm_process = new Ccm_Processor();
$cc_list = $ccm_process->getCcList(null, $plant_id);

$cc_object_id = (isset($_REQUEST['cc_object_id'])) ? $_REQUEST['cc_object_id'] : null;

$ccm_master = new DB_Public_lm_cc_master();
if ($ccm_master->get("cc_object_id", $cc_object_id)) {
    $sop_process = new Sop_Processor();

    $cc_no = $ccm_process->get_cc_no($cc_object_id);
    $target_date = get_modified_date_format($ccm_master->target_date);
    $close_out_date = get_modified_date_time_format($ccm_master->close_out_date);

    // Creator Info
    $creator = $sop_process->get_creater_id_digital_sign($cc_object_id);
    $creator_name = getFullName($creator);
    $creator_dept = getDeptName($creator);
    $created_date_time = $sop_process->get_created_time_digital_sign($cc_object_id);
    list($create_year, $create_month, $create_day, $create_h, $create_i, $create_s) = sscanf($created_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $created_year = date('Y', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_month = date('M', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_date = date('d', mktime($create_h, $create_i, $create_s, $create_month, $create_year, $create_day));
    $created_month_date = $created_date . " " . $created_month;
    $creator_remarks = $ccm_process->get_ccm_workflow_remarks($cc_object_id, $creator);
    $creator_image = get_user_image($creator);

    // Dept. Approver Info 
    $dept_approve = $sop_process->get_dept_approver_id_digital_sign($cc_object_id);
    $dept_approver_name = getFullName($dept_approve);
    $dept_approver_dept = getDeptName($dept_approve);
    $dept_approved_date_time = $sop_process->get_dept_approved_time_digital_sign($cc_object_id);
    list($dept_approve_year, $dept_approve_month, $dept_approve_day, $dept_approve_h, $dept_approve_i, $dept_approve_s) = sscanf($dept_approved_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $dept_approved_year = date('Y', mktime($dept_approve_h, $dept_approve_i, $dept_approve_s, $dept_approve_month, $dept_approve_year, $dept_approve_day));
    $dept_approved_month = date('M', mktime($dept_approve_h, $dept_approve_i, $dept_approve_s, $dept_approve_month, $dept_approve_year, $dept_approve_day));
    $dept_approved_date = date('d', mktime($dept_approve_h, $dept_approve_i, $dept_approve_s, $dept_approve_month, $dept_approve_year, $dept_approve_day));
    $dept_approved_month_date = $dept_approved_date . " " . $dept_approved_month;
    $dept_approver_remarks = $ccm_process->get_ccm_workflow_remarks($cc_object_id, $dept_approve);
    $dept_approver_image = get_user_image($dept_approve);

    // CFT Reviewer Info
    $reviwer = $sop_process->get_ccm_cft_reviewer_array_id_digital_sign($cc_object_id);
    $reviewed_date_time = $sop_process->get_cft_reviewed_time_digital_sign($cc_object_id);
    list($review_year, $review_month, $review_day, $review_h, $review_i, $review_s) = sscanf($reviewed_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $reviewed_month = date('M', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
    $reviewed_date = date('d', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
    $reviewed_year = date('Y', mktime($review_h, $review_i, $review_s, $review_month, $review_year, $review_day));
    $reviewed_month_date = $reviewed_date . " " . $reviewed_month;

    // Approver Info
    $approver = $sop_process->get_approver_id_digital_sign($cc_object_id);
    $approver_name = getFullName($approver);
    $approver_dept = getDeptName($approver);
    $approved_date_time = $sop_process->get_approved_time_digital_sign($cc_object_id);
    list($approve_year, $approve_month, $approve_day, $approve_h, $approve_i, $approve_s) = sscanf($approved_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
    $approved_year = date('Y', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_month = date('M', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_date = date('d', mktime($approve_h, $approve_i, $approve_s, $approve_month, $approve_year, $approve_day));
    $approved_month_date = $approved_date . " " . $approved_month;
    $approver_remarks = $ccm_process->get_ccm_workflow_remarks($cc_object_id, $approver);
    $approver_image = get_user_image($approver);

    // Meeting Details
    $meeting_object_id = $ccm_process->get_cc_meeting_object_id($cc_object_id, "yes");
    if (!empty($meeting_object_id)) {
        $cc_meeting_details = $ccm_process->get_cc_meeting_details(null, $meeting_object_id);
    }
    if (!empty($cc_meeting_details)) {
        for ($i = 0; $i < count($cc_meeting_details); $i++) {
            $meeting_date_time = $cc_meeting_details[$i]['meeting_date'];
            $meeting_venue = $cc_meeting_details[$i]['venue'];
            $meeting_time = $cc_meeting_details[$i]['meeting_time'];
            $meeting_status = $cc_meeting_details[$i]['status'];

            list($meet_year, $meeting__month, $meeting__day, $meeting__h, $meeting__i, $meeting__s) = sscanf($meeting_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $meeting_year = date('Y', mktime($meeting__h, $meeting__i, $meeting__s, $meeting__month, $meet_year, $meeting__day));
            $meeting_month = date('M', mktime($meeting__h, $meeting__i, $meeting__s, $meeting__month, $meet_year, $meeting__day));
            $meeting_date = date('d', mktime($meeting__h, $meeting__i, $meeting__s, $meeting__month, $meet_year, $meeting__day));
            $meeting_month_date = $meeting_date . " " . $meeting_month;
        }
    }

    // Attendee Details
    $attendee_details = $ccm_process->get_cc_meeting_attendees_details($cc_object_id);

    // Training Details
    $training_object_id = $ccm_process->get_cc_training_object_id($cc_object_id, "yes");
    $cc_training_details = $ccm_process->get_cc_training_details($cc_object_id, $training_object_id);
    if (!empty($cc_training_details)) {
        for ($i = 0; $i < count($cc_training_details); $i++) {
            $training_date_time = $cc_training_details[$i]['training_date'];
            list($training_year, $training__month, $training__day, $training__h, $training__i, $training__s) = sscanf($training_date_time, '%2s/%2s/%4s %2s:%2s:%2s');
            $trained_year = date('Y', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_month = date('M', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_date = date('d', mktime($training__h, $training__i, $training__s, $training__month, $training_year, $training__day));
            $trained_month_date = $trained_date . " " . $trained_month;
            $trainer_image = get_user_image($cc_training_details[$i]['trainer_id']);
            $trainer_name = $cc_training_details[$i]['trainer'];
            $trainer_dept = $cc_training_details[$i]['trainer_dept'];
        }
    }

    // Trainee Details
    $training_details = $ccm_process->get_cc_training_attendees_details($cc_object_id);

    // Interim Extension Details
    $cc_extension_details = $ccm_process->get_cc_extension_details($cc_object_id);
    $smarty->assign('cc_extension_details', $cc_extension_details);

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
    $smarty->assign("dept_approved_date_time", $dept_approved_date_time);
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

    $smarty->assign('mom_details', $ccm_process->getCcMomDetails($cc_object_id, null, null, null));

    $smarty->assign("trained_year", $trained_year);
    $smarty->assign("trained_month", $trained_month);
    $smarty->assign("trained_date", $trained_date);
    $smarty->assign("trained_month_date", $trained_month_date);
    $smarty->assign("trainer_image", $trainer_image);
    $smarty->assign("trainer_name", $trainer_name);
    $smarty->assign("trainer_dept", $trainer_dept);
    $smarty->assign("training_date_time", $training_date_time);
    $smarty->assign("training_details", $training_details);
}
$smarty->assign('change_type', getChangeType($ccm_master->change_type_id));
$smarty->assign("change_follow_up", $ccm_master->change_follow_up);
$smarty->assign("approved_status", $ccm_master->approved_status);
$smarty->assign("close_out_date", $close_out_date);
$smarty->assign("target_date", $target_date);
$smarty->assign("cc_object_id", $cc_object_id);
$smarty->assign("cc_list", $cc_list);
$smarty->assign('main', _TEMPLATE_PATH_ . "ccm_timeline.ccm.tpl");
?>