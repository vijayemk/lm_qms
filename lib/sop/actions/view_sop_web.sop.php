<?php

/*
 * Project:     Logicmind
 * File:        view_sop_web.sop.php
 *
 * @author Ananthakumar.v 
 * @since 11/12/2019
 * @package sop
 * @version 1.0
 * @see view_sop_web.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}
$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$sop_master = new DB_Public_lm_sop_master();
if ($sop_master->get("sop_object_id", $sop_object_id)) {
    $usr_id = $_SESSION['user_id'];
    $usr_dept_id = getDeptId($usr_id);
    $date_time = date('Y-m-d G:i:s');
    $sop_process = new Sop_Processor();

    /** Department Restriction */
    if (!check_doc_dept_access($sop_object_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    /** Generate Reading Mode PDF */
    $published_status = $sop_process->get_published_status($sop_object_id);
    if ($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") {
        if (check_access($username, 'expired_sop', 'yes')) {
            $smarty->assign("view_sop_file", true);
        } else {
            $error_handler->raiseError("expired_sop");
        }
    } else {
        $smarty->assign("view_sop_file", true);
    }

    $object_id1 = (isset($_REQUEST['object_id1'])) ? $_REQUEST['object_id1'] : null;
    $sop_no = $sop_process->get_sop_no($sop_object_id);

    $sop_details_obj = new DB_Public_lm_sop_details();
    $sop_format_obj = new DB_Public_lm_sop_format_details();
    $sop_annexure_obj = new DB_Public_lm_sop_annexure_details();
    if ($sop_details_obj->get("sop_object_id", $object_id1)) {
        $dis_name = $sop_master->sop_name;
        $dis_no = $sop_no;
        $dis_rev = $sop_master->revision;
        $content_details = $sop_details_obj->sop_content;
    } elseif ($sop_format_obj->get("format_object_id", $object_id1)) {
        $format_master = new DB_Public_lm_sop_format_master();
        if ($format_master->get("format_object_id", $object_id1)) {
            $dis_name = $format_master->format_name;
            $dis_no = $sop_process->get_sop_format_no($object_id1);
            $dis_rev = $format_master->revision;
        }
        $content_details = $sop_format_obj->format_content;
    } elseif ($sop_annexure_obj->get("annexure_object_id", $object_id1)) {
        $annexure_master = new DB_Public_lm_sop_annexure_master();
        if ($annexure_master->get("annexure_object_id", $object_id1)) {
            $dis_name = $annexure_master->annexure_name;
            $dis_no = $sop_process->get_sop_annexure_no($object_id1);
            $dis_rev = $annexure_master->revision;
        }
        $content_details = $sop_annexure_obj->annexure_content;
    }

    $invalid_digital_sign_info = "Not Yet Digitally Signed - Invalid Document";
    $invalid_image_path = 'img/custom_logicmind_img/invalid.jpg';
    $valid_image_path = 'img/custom_logicmind_img/valid.jpg';

    if (!empty($sop_process->get_creater_id_digital_sign($sop_object_id))) {
        $creator = $sop_process->get_creater_id_digital_sign($sop_object_id);
        $creator_name = getFullName($creator);
        $creator_dept = getDeptName($creator);
        $creator_designation = getDesignationByUserId($creator);
        //$created_time = $sop_process->get_created_time_digital_sign($sop_object_id);
        $created_time = getModifiedDateTimeFormat($sop_process->get_created_time_digital_sign($sop_object_id), 'f16');

        $smarty->assign("creator_name", $creator_name);
        $smarty->assign("creator_dept", $creator_dept);
        $smarty->assign("creator_designation", $creator_designation);
        $smarty->assign("created_time", $created_time);
        $valid_creator_digital_sign_info = "Digitally Signed Information <br> SOP NO : $sop_no <br>Created By : $creator_name <br>Designtation : $creator_designation <br>Department : $creator_dept <br>Date : $created_time";
        $valid_creator_digital_sign_path = $valid_image_path;
    } else {
        $valid_creator_digital_sign_info = $invalid_digital_sign_info;
        $valid_creator_digital_sign_path = $invalid_image_path;
    }

    if (!empty($sop_process->get_reviewer_id_digital_sign($sop_object_id))) {
        $reviewer = $sop_process->get_reviewer_id_digital_sign($sop_object_id);
        $reviewer_name = getFullName($reviewer);
        $reviewer_dept = getDeptName($reviewer);
        $reviewer_designation = getDesignationByUserId($reviewer);
        //$reviewed_time = $sop_process->get_reviewed_time_digital_sign($sop_object_id);
        $reviewed_time = getModifiedDateTimeFormat($sop_process->get_reviewed_time_digital_sign($sop_object_id), 'f16');

        $smarty->assign("reviewer_name", $reviewer_name);
        $smarty->assign("reviewer_dept", $reviewer_dept);
        $smarty->assign("reviewer_designation", $reviewer_designation);
        $smarty->assign("reviewed_time", $reviewed_time);
        $valid_reviewer_digital_sign_info = "Digitally Signed Information <br> SOP NO : $sop_no <br>nReviewed By : $reviewer_name <br>Designtation : $reviewer_designation <br>Department : $reviewer_dept <br>Date : $reviewed_time";
        $valid_reviewer_digital_sign_path = $valid_image_path;
    } else {
        $valid_reviewer_digital_sign_info = $invalid_digital_sign_info;
        $valid_reviewer_digital_sign_path = $invalid_image_path;
    }

    if (!empty($sop_process->get_approver_id_digital_sign($sop_object_id))) {
        $approver = $sop_process->get_approver_id_digital_sign($sop_object_id);
        $approver_name = getFullName($approver);
        $approver_dept = getDeptName($approver);
        $approver_designation = getDesignationByUserId($approver);
        //$approved_time = $sop_process->get_approved_time_digital_sign($sop_object_id);
        $approved_time = getModifiedDateTimeFormat($sop_process->get_approved_time_digital_sign($sop_object_id), 'f16');

        $smarty->assign("approver_name", $approver_name);
        $smarty->assign("approver_dept", $approver_dept);
        $smarty->assign("approver_designation", $approver_designation);
        $smarty->assign("approved_time", $approved_time);
        $valid_approver_digital_sign_info = "Digitally Signed Information <br> SOP NO : $sop_no <br>nApproved By : $approver_name <br>Designtation : $approver_designation <br>Department : $approver_dept <br>Date : $approved_time";
        $valid_approver_digital_sign_path = $valid_image_path;
    } else {
        $valid_approver_digital_sign_info = $invalid_digital_sign_info;
        $valid_approver_digital_sign_path = $invalid_image_path;
    }

    if (!empty($sop_process->get_authorizer_id_digital_sign($sop_object_id))) {
        $authorizer = $sop_process->get_authorizer_id_digital_sign($sop_object_id);
        $authorizer_name = getFullName($authorizer);
        $authorizer_dept = getDeptName($authorizer);
        $authorizer_designation = getDesignationByUserId($authorizer);
        //$authorized_time = $sop_process->get_authorized_time_digital_sign($sop_object_id);
        $authorized_time = getModifiedDateTimeFormat($sop_process->get_authorized_time_digital_sign($sop_object_id), 'f16');

        $smarty->assign("authorizer_name", $authorizer_name);
        $smarty->assign("authorizer_dept", $authorizer_dept);
        $smarty->assign("authorizer_designation", $authorizer_designation);
        $smarty->assign("authorized_time", $authorized_time);
        $valid_authorizer_digital_sign_info = "Digitally Signed Information <br> SOP NO : $sop_no <br>nAuthorized By : $authorizer_name <br>Designtation : $authorizer_designation <br>Department : $authorizer_dept <br>Date : $authorized_time";
        $valid_authorizer_digital_sign_path = $valid_image_path;
    } else {
        $valid_authorizer_digital_sign_info = $invalid_digital_sign_info;
        $valid_authorizer_digital_sign_path = $invalid_image_path;
    }

    //$smarty->assign("regobj", $sop_master);
    $smarty->assign("dis_name", $dis_name);
    $smarty->assign("dis_no", $dis_no);
    $smarty->assign("dis_rev", $dis_rev);
    $smarty->assign("content_details", $content_details);
    $smarty->assign("published_status", $sop_process->get_published_status($sop_object_id));
    $smarty->assign("valid_creator_digital_sign_path", $valid_creator_digital_sign_path);
    $smarty->assign("valid_creator_digital_sign_info", $valid_creator_digital_sign_info);
    $smarty->assign("valid_reviewer_digital_sign_path", $valid_reviewer_digital_sign_path);
    $smarty->assign("valid_reviewer_digital_sign_info", $valid_reviewer_digital_sign_info);
    $smarty->assign("valid_approver_digital_sign_path", $valid_approver_digital_sign_path);
    $smarty->assign("valid_approver_digital_sign_info", $valid_approver_digital_sign_info);
    $smarty->assign("valid_authorizer_digital_sign_path", $valid_authorizer_digital_sign_path);
    $smarty->assign("valid_authorizer_digital_sign_info", $valid_authorizer_digital_sign_info);
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_sop_web.sop.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
