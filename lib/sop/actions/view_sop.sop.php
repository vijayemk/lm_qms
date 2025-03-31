<?php

/**
 * Project:     Logicmind
 * File:        view_sop.sop.php
 *
 * @author Ananthakumar.v
 * @since 13/02/2016
 * @package sop
 * @version 1.0
 * @see view_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}

$sop_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$sop_master = new DB_Public_lm_sop_master();
if ($sop_master->get("sop_object_id", $sop_object_id)) {
    $comments = (isset($_REQUEST['comments'])) ? $_REQUEST['comments'] : null;
    $date_time = date('Y-m-d G:i:s');
    $usr_id = trim($_SESSION['user_id']);
    $usr_dept_id = getDeptId($usr_id);
    $usr_emp_id = getEmpId($usr_id);
    include_module("admin");
    $sop_process = new Sop_Processor();
    $doc_file_processor_object = new Doc_File_Processor();

    /** Department Restriction */
    if (!check_doc_dept_access($sop_object_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    /** Generate Reading Mode PDF */
    $published_status = $sop_process->get_published_status($sop_object_id);
    if ($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") {
        if (check_access($username, 'expired_sop', 'yes')) {
            $smarty->assign("view_sop_file", true);
        }
    } else {
        $smarty->assign("view_sop_file", true);
    }

    /* SOP Info */
    $sop_no = $sop_process->get_sop_no($sop_object_id);
    $reason_for_revision = get_sop_creation_reason($sop_master->reason_for_revision);

    /*  Workflow Dept and users */
    //$deptlist = get_All_DeptList();
    $plant_dept_list = getPlantDeptList($sop_master->sop_plant);

    $creator = $sop_process->get_creater_id($sop_object_id);
    if (!empty($sop_process->get_reviewer_id($sop_object_id))) {
        $reviewer = $sop_process->get_reviewer_id($sop_object_id);
    }if (!empty($sop_process->get_approver_id($sop_object_id))) {
        $approver = $sop_process->get_approver_id($sop_object_id);
    }if (!empty($sop_process->get_authorizer_id($sop_object_id))) {
        $authorizer = $sop_process->get_authorizer_id($sop_object_id);
    }if (!empty($sop_process->get_trainer_id($sop_object_id))) {
        $trainer = $sop_process->get_trainer_id($sop_object_id);
    }

    /* Insert and get Workflow remarks */
    if (!empty($comments)) {
        $sop_process->add_sop_workflow_remarks($sop_object_id, $comments, $usr_id, $date_time);
    }
    $sop_remarks_array = $sop_process->get_sop_workflow_remarks($sop_object_id);

    //SOP training Info
    $is_sop_training_required = $sop_process->get_sop_training_is_required($sop_object_id);
    $is_sop_online_exam_required = $sop_process->get_sop_online_exam_is_required($sop_object_id);
    $sop_online_exam_status = $sop_process->get_sop_online_exam_status($sop_object_id);
    if ($is_sop_online_exam_required == "yes" && $sop_online_exam_status == "Completed") {
        $smarty->assign('online_exam_user_list', $sop_process->get_sop_online_exam_userlist($sop_object_id, null, null, 'yes', 'Completed'));
    }
    $sop_training_details = $sop_process->get_sop_training_details($sop_object_id, 'yes', null);
    $sop_trainees_details = $sop_process->get_sop_trainees_list($sop_object_id);
    $sop_nah_trainees_details = $sop_process->get_sop_nah_trainees_list($sop_object_id);

    /** get extend,dropped details  */
    $extend_details = $sop_process->get_sop_extend_details($sop_object_id);
    $dropped_details = $sop_process->get_sop_dropped_details($sop_object_id);
    $cancelled_details = $sop_process->get_sop_cancelled_details($sop_object_id);
    $transferred_details = $sop_process->get_sop_transferred_details($sop_object_id);

    /** SOP Department viewing details */
    $dept_doc_view_details = get_doc_view_dept_details($sop_object_id, $sop_master->sop_plant);

    /** Dropzone file upload */
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_name = $_FILES['file']['name'];
        $file_name = clean_filename($file_name, 0, 80);

        $fhash = md5($tempFile);
        $hash = uniqid($fhash);

        $file_info = new SplFileInfo($_FILES['file']['name']);
        $extension = $file_info->getExtension();

        $sequence = new Sequence;
        $file_id = "lm_doc_file:" . $sequence->get_next_sequence();

        $file = new DB_Public_file();
        $file->object_id = $file_id;
        $file->type = $file_type;
        $file->name = $file_name;
        $file->size = $file_size;
        $file->hash = $hash . "." . $extension;
        move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
        $file->insert();

        $doc_file = new DB_Public_lm_doc_file();
        $doc_file->file_id = $file_id;
        $doc_file->object_id = $sop_object_id;
        $doc_file->attached_by = $usr_id;
        $doc_file->attached_date = $date_time;
        $doc_file->insert();
    }
    $fileobjectarray = $doc_file_processor_object->getLmDocFileObjectArray($sop_object_id);

    if (isset($_POST['add_format_annexure'])) {
        $createyear = date('y');
        $month = date('m');
        $format_annexure_type = $_POST['format_annexure_type'];
        $format_annexure_name = $_POST['format_annexure_name'];
        $format_annexure_ori = $_POST['format_annexure_ori'];
        $format_annexure_lang = $_POST['format_annexure_lang'];

        if ($format_annexure_type == "Format") {
            if ($sop_process->format_name_exist($format_annexure_name,$sop_object_id)) {
                $error_handler->raiseError("FORMAT NAME EXIST");
            }

            $sequence_object = new Sequence;
            $id = "sop.format:" . $sequence_object->get_next_sequence();

            $sequence_object = new Sequence;
            $format_no = $sequence_object->get_format_number_sequence($sop_object_id);
            $format_desc_no = $sequence_object->get_format_desc_number_sequence($sop_object_id);

            $add_sop_format_obj = new DB_Public_lm_sop_format_master();
            $add_sop_format_obj->format_object_id = $id;
            $add_sop_format_obj->sop_object_id = $sop_object_id;
            $add_sop_format_obj->format_department = $usr_dept_id;
            $add_sop_format_obj->format_name = $format_annexure_name;
            $add_sop_format_obj->revision = "00";
            $add_sop_format_obj->supersedes = "Nil";
            $add_sop_format_obj->revision_desc = "R";
            $add_sop_format_obj->created_year = $createyear;
            $add_sop_format_obj->created_month = $month;
            $add_sop_format_obj->created_by = $usr_id;
            $add_sop_format_obj->created_time = $date_time;
            $add_sop_format_obj->modified_by = $usr_id;
            $add_sop_format_obj->modified_time = $date_time;
            $add_sop_format_obj->is_latest_revision = 'true';
            $add_sop_format_obj->is_revised = 'no';
            $add_sop_format_obj->format_no = $format_no;
            $add_sop_format_obj->status = "Enabled";
            $add_sop_format_obj->format_desc = $format_desc_no;
            $add_sop_format_obj->orientation = $format_annexure_ori;
            $add_sop_format_obj->lang = $format_annexure_lang;
            $add_sop_format_obj->insert();

            $sequence_object->update_format_number_sequence($sop_object_id);
            $sequence_object->update_format_desc_number_sequence($sop_object_id);

            //Audit Trial
            $audit_remarks = "New Format" . $format_annexure_name . " Added";
            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'create', $audit_remarks, 'Created');

            $sop_format_details = new DB_Public_lm_sop_format_details();
            $sop_format_details->format_object_id = $id;
            $sop_format_details->format_content = NULL;
            $sop_format_details->created_by = $usr_id;
            $sop_format_details->created_time = $date_time;
            $sop_format_details->last_modified_by = $usr_id;
            $sop_format_details->last_modified_time = $date_time;
            $sop_format_details->insert();
        }
        if ($format_annexure_type == "Annexure") {
            if ($sop_process->annexure_name_exist($format_annexure_name,$sop_object_id)) {
                $error_handler->raiseError("ANNEXURE NAME EXIST");
            }
            $sequence_object = new Sequence;
            $id = "sop.annexure:" . $sequence_object->get_next_sequence();

            $annexure_no = $sequence_object->get_annexure_number_sequence($sop_object_id);
            $annexure_desc_no = $sequence_object->get_annexure_desc_number_sequence($sop_object_id);

            //get sop format_no
            $annexure_format_id = $sop_process->get_lastet_format_no_id("Annexure", $sop_master->sop_type);

            $add_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
            $add_sop_annexure_obj->annexure_object_id = $id;
            $add_sop_annexure_obj->sop_object_id = $sop_object_id;
            $add_sop_annexure_obj->annexure_desc = $annexure_desc_no;
            $add_sop_annexure_obj->annexure_department = $usr_dept_id;
            $add_sop_annexure_obj->annexure_name = $format_annexure_name;
            $add_sop_annexure_obj->revision = "00";
            $add_sop_annexure_obj->supersedes = "Nil";
            $add_sop_annexure_obj->created_year = $createyear;
            $add_sop_annexure_obj->created_month = $month;
            $add_sop_annexure_obj->created_by = $usr_id;
            $add_sop_annexure_obj->created_time = $date_time;
            $add_sop_annexure_obj->modified_by = $usr_id;
            $add_sop_annexure_obj->modified_time = $date_time;
            $add_sop_annexure_obj->is_latest_revision = 'true';
            $add_sop_annexure_obj->is_revised = 'no';
            $add_sop_annexure_obj->annexure_no = $annexure_no;
            $add_sop_annexure_obj->status = "Enabled";
            $add_sop_annexure_obj->annexure_format_no = $annexure_format_id;
            $add_sop_annexure_obj->orientation = $format_annexure_ori;
            $add_sop_annexure_obj->lang = $format_annexure_lang;
            $add_sop_annexure_obj->insert();

            //Audit Trial
            $audit_remarks = "New Annexure " . $format_annexure_name . " Added";
            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'create', $audit_remarks, 'Created');

            $sop_annexure_details = new DB_Public_lm_sop_annexure_details();
            $sop_annexure_details->annexure_object_id = $id;
            $sop_annexure_details->annexure_content = NULL;
            $sop_annexure_details->created_by = $usr_id;
            $sop_annexure_details->created_time = $date_time;
            $sop_annexure_details->last_modified_by = $usr_id;
            $sop_annexure_details->last_modified_time = $date_time;
            $sop_annexure_details->insert();

            $sequence_object->update_annexure_number_sequence($sop_object_id);
            $sequence_object->update_annexure_desc_number_sequence($sop_object_id);
        }
        header("Location:$_SERVER[REQUEST_URI]");
    }
    if (isset($_POST['edit_dept_view'])) {
        $dept_view_array = (isset($_REQUEST['dept_view'])) ? $_REQUEST['dept_view'] : null;
        add_dept_doc_view_details($sop_object_id, $usr_dept_id, $dept_view_array, $usr_id, $date_time);
        header("Location:$_SERVER[REQUEST_URI]");
    }

    /* Can i show Cancel Button */
    if (($sop_master->status == "Draft Created" || $sop_master->status == "Review Need Correction" || $sop_master->status == "Approve Need Correction" || $sop_master->status == "Authorization Need Correction") && ($creator == $usr_id)) {
        $smarty->assign('cancel_button', true);

        /* Request Cancel */
        if (isset($_POST['request_cancel'])) {
            if ($sop_process->update_sop_status($sop_object_id, "Cancelled")) {
                $sop_process->delete_worklist($usr_id, $sop_object_id);
                $sop_process->save_workflow($sop_object_id, $usr_id, 'Cancelled', 'cancel');

                if ($sop_process->check_previous_sop($sop_object_id)) {
                    $prev_sop_object_id = $sop_process->get_previous_sop_object_id($sop_object_id);
                    $sop_process->update_sop_is_revised($prev_sop_object_id, 'no');
                    $sop_process->update_sop_is_latest_revision($prev_sop_object_id, 'true');
                }

                $cancel_reason = (isset($_REQUEST['cancel_reason'])) ? $_REQUEST['cancel_reason'] : null;
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " cancelled" . "\nReason : " . $cancel_reason;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'cancel', $audit_remarks, 'Cancelled');

                /** Insert cancel details */
                $sequence_object = new Sequence;
                $id = "sop.cancelled:" . $sequence_object->get_next_sequence();

                $sop_cancel_obj = new DB_Public_lm_sop_cancel_details();
                $sop_cancel_obj->object_id = $id;
                $sop_cancel_obj->sop_object_id = $sop_object_id;
                $sop_cancel_obj->reason = $cancel_reason;
                $sop_cancel_obj->created_by = $usr_id;
                $sop_cancel_obj->created_time = $date_time;
                $sop_cancel_obj->insert();

                $workflow_userslist = $sop_process->get_all_workflow_users_list($sop_object_id);
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id'] != $users_id) {
                        $email = getEmailbyUserId(users_id);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        $subject = "$sop_no - Cancelled";
                        $actionDescription = "The SOP is Cancelled.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Status" => $sop_obj->status,
                            "Reason" => $cancel_reason,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }
    }
    /* Can i show Request Review or Request Pre Review Button */
    if (($sop_master->status == "Draft Created" || $sop_master->status == "Waiting for Sending Reviewal" || $sop_master->status == "Review Need Correction" ) && ($creator == $usr_id)) {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Created", 'create') && ($sop_process->check_user_in_worklist($sop_object_id, $usr_id))) {
            $edit_content = true;
            $smarty->assign('edit_content', $edit_content);
            $smarty->assign('request_review_pre_review_button', true);
            $smarty->assign('open_review_comments_array', $sop_process->get_doc_review_comments($sop_object_id, null, 'opened'));

            if (count($sop_process->get_doc_review_comments($sop_object_id, null, 'opened')) == 0) {
                $smarty->assign('request_review_pre_review_selection_option', true);
            } else {
                if (isset($_POST['ureview_comments_save']) || isset($_POST['ureview_comments_completed'])) {
                    $ureview_comments_array = (isset($_POST['ureview_comments'])) ? $_POST['ureview_comments'] : null;
                    $ureview_comments_id_array = (isset($_POST['ureview_comments_id'])) ? $_POST['ureview_comments_id'] : null;
                    $ureview_comments_action_array = (isset($_POST['ureview_comments_action'])) ? $_POST['ureview_comments_action'] : null;

                    if (isset($_POST['ureview_comments_completed'])) {
                        $review_comment_status = "closed";
                    } else {
                        $review_comment_status = "opened";
                    }
                    if (!empty($ureview_comments_id_array)) {
                        $sop_process->update_doc_reviewer_comments($ureview_comments_id_array, $ureview_comments_action_array, $review_comment_status, $usr_id, $date_time, $ureview_comments_array);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }

            /* Request Pre Review */
            if (isset($_POST['request_pre_review'])) {
                if ($sop_process->update_sop_status($sop_object_id, "Pre Reviewal Pending")) {
                    $sop_process->delete_workflow_action($sop_object_id, "Review Need Correction", "review");
                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " sent for Pre Reviewal";
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'pre_review', $audit_remarks, 'Waiting');

                    $sop_process->delete_worklist($creator, $sop_object_id);
                    $pre_review_to = (isset($_REQUEST['pre_review_to'])) ? $_REQUEST['pre_review_to'] : null;

                    foreach ($pre_review_to as $to_user) {
                        if (!$to_user == "") {
                            $sop_process->add_worklist($to_user, $sop_object_id);
                            $sop_process->save_workflow($sop_object_id, $to_user, 'Waiting', 'pre_review');
                            $email = getEmailbyUserId($to_user);
                            $mail = new changeMailer;
                            $sop_obj = new DB_Public_lm_sop_master();
                            $sop_obj->get("sop_object_id", $sop_object_id);
                            $sop_obj->find();
                            $subject = "$sop_no - Pre Reviewal Regarding";
                            $actionDescription = "The SOP is Waiting for Your Pre Reviewal.";
                            $detailsHeading = "SOP Details";
                            $details = ["Number" => $sop_no,
                                "Name" => $sop_master->sop_name,
                                "Revision" => $sop_master->revision,
                                "Reason for Creation/Revision" => $reason_for_revision,
                                "Status" => $sop_obj->status,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                            $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                            ];
                            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        }
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            /* Request Review */
            if (isset($_POST['request_reviewal'])) {
                if ($sop_process->update_sop_status($sop_object_id, "Reviewal Pending")) {
                    $sop_process->delete_workflow_action($sop_object_id, "Review Need Correction", "review");
                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " sent for Reviewal";
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'review', $audit_remarks, 'Waiting');

                    $sop_process->delete_worklist($creator, $sop_object_id);
                    $review_user = (isset($_REQUEST['review_user'])) ? $_REQUEST['review_user'] : null;

                    $sop_process->add_worklist($review_user, $sop_object_id);
                    $sop_process->save_workflow($sop_object_id, $review_user, 'Waiting', 'review');
                    $sop_process->add_sop_comparison($sop_object_id, $usr_id, $date_time, 'Send to Reviewal');
                    $email = getEmailbyUserId($review_user);
                    $mail = new changeMailer;
                    $sop_obj = new DB_Public_lm_sop_master();
                    $sop_obj->get("sop_object_id", $sop_object_id);
                    $sop_obj->find();
                    $subject = "$sop_no - Reviewal Regarding";
                    $actionDescription = "The SOP is Waiting for Your Reviewal.";
                    $detailsHeading = "SOP Details";
                    $details = ["Number" => $sop_no,
                        "Name" => $sop_master->sop_name,
                        "Revision" => $sop_master->revision,
                        "Reason for Creation/Revision" => $reason_for_revision,
                        "Status" => $sop_obj->status,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    /* Can i show Request ApproveButton */
    if ($sop_master->status == "Approve Need Correction" && $creator == $usr_id) {
        if (($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Created", 'create') && ($sop_process->check_user_in_worklist($sop_object_id, $usr_id)))) {
            $edit_content = true;
            $smarty->assign('edit_content', $edit_content);
            $smarty->assign('request_approve_button', true);
            $smarty->assign('open_review_comments_array', $sop_process->get_doc_review_comments($sop_object_id, null, 'opened'));

            if (count($sop_process->get_doc_review_comments($sop_object_id, null, 'opened')) == 0) {
                $smarty->assign('request_approver_selection_option', true);
            } else {
                if (isset($_POST['ureview_comments_save']) || isset($_POST['ureview_comments_completed'])) {
                    $ureview_comments_array = (isset($_POST['ureview_comments'])) ? $_POST['ureview_comments'] : null;
                    $ureview_comments_id_array = (isset($_POST['ureview_comments_id'])) ? $_POST['ureview_comments_id'] : null;
                    $ureview_comments_action_array = (isset($_POST['ureview_comments_action'])) ? $_POST['ureview_comments_action'] : null;

                    if (isset($_POST['ureview_comments_completed'])) {
                        $review_comment_status = "closed";
                    } else {
                        $review_comment_status = "opened";
                    }
                    if (!empty($ureview_comments_id_array)) {
                        $sop_process->update_doc_reviewer_comments($ureview_comments_id_array, $ureview_comments_action_array, $review_comment_status, $usr_id, $date_time, $ureview_comments_array);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
            if (isset($_POST['request_approval'])) {
                if ($sop_process->update_sop_status($sop_object_id, "Approval Pending")) {
                    $sop_process->delete_workflow_action($sop_object_id, "approver_query", "approve");
                    $sop_process->delete_worklist($usr_id, $sop_object_id);
                    $approve_user = (isset($_REQUEST['approve_user'])) ? $_REQUEST['approve_user'] : null;
                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " sent for Approval";
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'approve', $audit_remarks, 'Waiting');

                    $sop_process->add_worklist($approve_user, $sop_object_id);
                    $sop_process->save_workflow($sop_object_id, $approve_user, 'Waiting', 'approve');
                    $sop_process->add_sop_comparison($sop_object_id, $usr_id, $date_time, 'Send to Approval');
                    $email = getEmailbyUserId($approve_user);
                    $mail = new changeMailer;
                    $sop_obj = new DB_Public_lm_sop_master();
                    $sop_obj->get("sop_object_id", $sop_object_id);
                    $sop_obj->find();
                    $subject = "$sop_no - Approval Regarding";
                    $actionDescription = "The SOP is Waiting for Your Approval.";
                    $detailsHeading = "SOP Details";
                    $details = ["Number" => $sop_no,
                        "Name" => $sop_master->name,
                        "Revision" => $sop_master->revision,
                        "Reason for Creation/Revision" => $reason_for_revision,
                        "Status" => $sop_obj->status,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    /* Can i show Request Authorize Button */
    if ($sop_master->status == "Authorization Need Correction" && ($creator == $usr_id)) {
        if (($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Created", 'create') && ($sop_process->check_user_in_worklist($sop_object_id, $usr_id)))) {
            $edit_content = true;
            $smarty->assign('edit_content', $edit_content);
            $smarty->assign('request_authorize_button', true);
            $smarty->assign('is_trainng_required_disable_option', true);
            $smarty->assign('open_review_comments_array', $sop_process->get_doc_review_comments($sop_object_id, null, 'opened'));

            if (count($sop_process->get_doc_review_comments($sop_object_id, null, 'opened')) == 0) {
                $smarty->assign('request_authorizer_selection_option', true);
            } else {
                if (isset($_POST['ureview_comments_save']) || isset($_POST['ureview_comments_completed'])) {
                    $ureview_comments_array = (isset($_POST['ureview_comments'])) ? $_POST['ureview_comments'] : null;
                    $ureview_comments_id_array = (isset($_POST['ureview_comments_id'])) ? $_POST['ureview_comments_id'] : null;
                    $ureview_comments_action_array = (isset($_POST['ureview_comments_action'])) ? $_POST['ureview_comments_action'] : null;

                    if (isset($_POST['ureview_comments_completed'])) {
                        $review_comment_status = "closed";
                    } else {
                        $review_comment_status = "opened";
                    }
                    if (!empty($ureview_comments_id_array)) {
                        $sop_process->update_doc_reviewer_comments($ureview_comments_id_array, $ureview_comments_action_array, $review_comment_status, $usr_id, $date_time, $ureview_comments_array);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
            if (isset($_POST['request_authorize'])) {
                if ($sop_process->update_sop_status($sop_object_id, "Authorization Pending")) {
                    $sop_process->delete_workflow_action($sop_object_id, "authorizer_query", "authorize");
                    $sop_process->delete_worklist($usr_id, $sop_object_id);
                    $authorize_user = (isset($_REQUEST['authorize_user'])) ? $_REQUEST['authorize_user'] : null;

                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " sent for Authorization";
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'authorize', $audit_remarks, 'Waiting');

                    $sop_process->add_worklist($authorize_user, $sop_object_id);
                    $sop_process->save_workflow($sop_object_id, $authorize_user, 'Waiting', 'authorize');
                    $sop_process->add_sop_comparison($sop_object_id, $usr_id, $date_time, 'Send to Authorization');
                    $email = getEmailbyUserId($authorize_user);
                    $mail = new changeMailer;
                    $sop_obj = new DB_Public_lm_sop_master();
                    $sop_obj->get("sop_object_id", $sop_object_id);
                    $sop_obj->find();
                    $subject = "$sop_no - Authorization Regarding";
                    $actionDescription = "The SOP is Waiting for Your Authorization.";
                    $detailsHeading = "SOP Details";
                    $details = ["Number" => $sop_no,
                        "Name" => $sop_master->sop_name,
                        "Revision" => $sop_master->revision,
                        "Reason for Creation/Revision" => $reason_for_revision,
                        "Status" => $sop_obj->status,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Get resp person dept & persons list */
    if ($edit_content == true) {
        $smarty->assign("def_sop_moni_limit", getSopMonitoringLimit());
        $monitroing_resp_per1_active = $sop_process->get_sop_monitoring_details($sop_object_id, null, null, null, '1', 'yes');
        $monitroing_resp_per2_active = $sop_process->get_sop_monitoring_details($sop_object_id, null, null, null, '2', 'yes');
        $monitroing_resp_per3_active = $sop_process->get_sop_monitoring_details($sop_object_id, null, null, null, '3', 'yes');

        if (!empty($monitroing_resp_per1_active)) {
            $smarty->assign("monitroing_resp_per1_active", $monitroing_resp_per1_active);
            $smarty->assign("monitroing_resp1_dept_users", get_dept_users($monitroing_resp_per1_active['0']['resp_per_dept_id']));
        }
        if (!empty($monitroing_resp_per2_active)) {
            $smarty->assign("monitroing_resp_per2_active", $monitroing_resp_per2_active);
            $smarty->assign("monitroing_resp2_dept_users", get_dept_users($monitroing_resp_per2_active['0']['resp_per_dept_id']));
        }
        if (!empty($monitroing_resp_per3_active)) {
            $smarty->assign("monitroing_resp_per3_active", $monitroing_resp_per3_active);
            $smarty->assign("monitroing_resp3_dept_users", get_dept_users($monitroing_resp_per3_active['0']['resp_per_dept_id']));
        }
        if (isset($_POST['edit_resp_per'])) {
            $urdept1_resp = (isset($_REQUEST['urdept1_resp'])) ? $_REQUEST['urdept1_resp'] : null;
            $urdept2_resp = (isset($_REQUEST['urdept2_resp'])) ? $_REQUEST['urdept2_resp'] : null;
            $urdept3_resp = (isset($_REQUEST['urdept3_resp'])) ? $_REQUEST['urdept3_resp'] : null;

            $sop_process->update_sop_monitoring_details($sop_object_id, $urdept1_resp, '1', $usr_id, $date_time);
            $sop_process->update_sop_monitoring_details($sop_object_id, $urdept2_resp, '2', $usr_id, $date_time);
            $sop_process->update_sop_monitoring_details($sop_object_id, $urdept3_resp, '3', $usr_id, $date_time);
            header("Location:$_SERVER[REQUEST_URI]");
        }
    }

    /** Can i show Recall Pre Review Button */
    if ($sop_master->status == "Pre Reviewal Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Created", 'create')) {
            $pre_review_pending_userlist = $sop_process->get_workflow_userlist_by_objectid_action_status($sop_object_id, 'pre_review', 'Waiting');
            $smarty->assign('recall_pre_review_button', true);
            $smarty->assign('pre_review_pending_userlist', $pre_review_pending_userlist);

            if (isset($_POST['recall_pre_review'])) {
                $pre_review_recall_array = (isset($_REQUEST['pending_pre_review_user'])) ? $_REQUEST['pending_pre_review_user'] : null;
                if (!empty($pre_review_recall_array)) {
                    foreach ($pre_review_recall_array as $recall_user) {
                        if ($sop_process->check_user_in_workflow($sop_object_id, $recall_user, "Waiting", 'pre_review')) {
                            $email = getEmailbyUserId($recall_user);
                            $mail = new changeMailer;
                            $sop_obj = new DB_Public_lm_sop_master();
                            $sop_obj->get("sop_object_id", $sop_object_id);
                            $sop_obj->find();
                            $subject = "$sop_no - Recalled";
                            $actionDescription = "The SOP is Recalled.";
                            $detailsHeading = "SOP Details";
                            $details = ["Number" => $sop_no,
                                "Name" => $sop_master->sop_name,
                                "Revision" => $sop_master->revision,
                                "Reason for Creation/Revision" => $reason_for_revision,
                                "Reason for Recall" => $comments,
                                "Recalled Status" => $sop_obj->status,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                            $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                            ];
                            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                            $sop_process->delete_worklist($recall_user, $sop_object_id);
                            $sop_process->delete_user_workflow_action($sop_object_id, $recall_user, "Waiting", "pre_review");
                            //Audit Trial
                            $audit_remarks = $sop_master->sop_name . "\nRecalled User : " . getFullName($recall_user) . "\nRecalled By : " . getFullName($creator) . ".\nReason for Recall : " . $comments;
                            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'pre_review_recall', $audit_remarks, 'Recalled');
                        }
                    }
                }
                $check_pre_review_pending_userlist = $sop_process->get_workflow_userlist_by_objectid_action_status($sop_object_id, 'pre_review', 'Waiting');
                if (count($check_pre_review_pending_userlist) == 0) {
                    if ($sop_process->is_action_finished($sop_object_id, "pre_review", "Pre Reviewed")) {
                        $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Reviewal");
                    } else {
                        $sop_process->update_sop_status($sop_object_id, "Draft Created");
                    }
                    $sop_process->add_worklist($creator, $sop_object_id);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Can i show Pre Review and Pre Review Need Correction Button */
    if ($sop_master->status == "Pre Reviewal Pending" && $sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'pre_review') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
        $smarty->assign('show_pre_review_button', true);
        $smarty->assign('review_comments_user_array', $sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));

        // Add Review Comments
        if (isset($_POST['add_review_comments'])) {
            $areview_comments_array = (isset($_POST['areview_comments'])) ? $_POST['areview_comments'] : null;
            $areview_comments_id_array = (isset($_POST['areview_comments_id'])) ? $_POST['areview_comments_id'] : null;
            if (!empty($areview_comments_array)) {
                $sop_process->add_doc_review_comments($sop_object_id, 'pre_review', $areview_comments_array, $areview_comments_id_array, $usr_id, $date_time);
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }

        if (isset($_POST['pre_reviewed'])) {
            $sop_process->update_workflow($sop_object_id, $usr_id, 'Pre Reviewed', 'pre_review');
            $sop_process->delete_worklist($usr_id, $sop_object_id);
            //Audit Trial
            $audit_remarks = $sop_master->sop_name . " Pre Reviewed By " . getFullName($usr_id);
            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'pre_review', $audit_remarks, 'Pre Reviewed');
            if ($sop_process->is_action_finished($sop_object_id, "pre_review", "Pre Reviewed")) {
                $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Reviewal");
                $sop_process->add_worklist($creator, $sop_object_id);
                $email = getEmailbyUserId($creator);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Pre Reviewed";
                $actionDescription = "The SOP is Pre Reviewed.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Remarks" => $comments,
                    "Status" => $sop_obj->status,
                    "Sent By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }
    }
    /** Can i show Recall Review Button */
    if ($sop_master->status == "Reviewal Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Created", 'create')) {
            $smarty->assign('recall_review_button', true);

            if (isset($_POST['recall_review'])) {
                $email = getEmailbyUserId($reviewer);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Recalled";
                $actionDescription = "The SOP is Recalled.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Reason for Recall" => $comments,
                    "Recalled Status" => $sop_obj->status,
                    "Recalled By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);

                $sop_process->delete_worklist($reviewer, $sop_object_id);
                $sop_process->delete_workflow_action($sop_object_id, "Waiting", "review");
                if ($sop_process->is_action_finished($sop_object_id, "pre_review", "Pre Reviewed")) {
                    $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Reviewal");
                } else {
                    $sop_process->update_sop_status($sop_object_id, "Draft Created");
                }
                $sop_process->add_worklist($creator, $sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " Recalled By " . getFullName($creator) . ".\nReason for Recall : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'review_recall', $audit_remarks, 'Recalled');
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Can i show Review and Review Need Correction Button */
    if ($sop_master->status == "Reviewal Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'review') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
            $smarty->assign('show_review_button', true);
            $smarty->assign('review_comments_user_array', $sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));
            $review_comments_user_array_count = count($sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));
            if ($review_comments_user_array_count >= 1) {
                $smarty->assign('disable_review_option', true);
            }
            // Add Review Comments
            if (isset($_POST['add_review_comments'])) {
                $areview_comments_array = (isset($_POST['areview_comments'])) ? $_POST['areview_comments'] : null;
                $areview_comments_id_array = (isset($_POST['areview_comments_id'])) ? $_POST['areview_comments_id'] : null;
                if (!empty($areview_comments_array)) {
                    $sop_process->add_doc_review_comments($sop_object_id, 'review', $areview_comments_array, $areview_comments_id_array, $usr_id, $date_time);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if (isset($_POST['review_need_correction'])) {
                $sop_process->update_sop_status($sop_object_id, "Review Need Correction");
                $sop_process->update_workflow($sop_object_id, $usr_id, 'Review Need Correction', 'review');
                $sop_process->delete_worklist($usr_id, $sop_object_id);
                $sop_process->add_worklist($creator, $sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " sent back to " . getFullName($creator) . ".\n Reason : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'review', $audit_remarks, 'Review Need Correction');

                $email = getEmailbyUserId($creator);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Review Needs Correction";
                $actionDescription = "The SOP Needs a Few Corrections.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Query/Remarks" => $comments,
                    "Status" => $sop_obj->status,
                    "Rejected By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if ($review_comments_user_array_count == 0) {
                if (isset($_POST['reviewed'])) {
                    $sop_process->update_workflow($sop_object_id, $usr_id, 'Reviewed', 'review');
                    $sop_process->delete_worklist($usr_id, $sop_object_id);
                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " Reviewed By " . getFullName($usr_id);
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'review', $audit_remarks, 'Reviewed');
                    if ($sop_process->is_action_finished($sop_object_id, "review", "Reviewed")) {
                        $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Approval");
                        $sop_process->add_worklist($usr_id, $sop_object_id);
                        $email = getEmailbyUserId($creator);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        $subject = "$sop_no - Reviewed";
                        $actionDescription = "The SOP is Reviewed.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Status" => $sop_obj->status,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }

    /** Can i show Request Approve Button */
    if ($sop_master->status == "Waiting for Sending Approval") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Reviewed", 'review') && ($sop_process->check_user_in_worklist($sop_object_id, $usr_id))) {
            $smarty->assign('request_approve_button', true);
            $smarty->assign('request_approver_selection_option', true);

            if (isset($_POST['request_approval'])) {
                if ($sop_process->update_sop_status($sop_object_id, "Approval Pending")) {
                    $sop_process->delete_workflow_action($sop_object_id, "approver_query", "approve");
                    $sop_process->delete_worklist($usr_id, $sop_object_id);
                    $approve_user = (isset($_REQUEST['approve_user'])) ? $_REQUEST['approve_user'] : null;
                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " sent for Approval";
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'approve', $audit_remarks, 'Waiting');

                    $sop_process->add_worklist($approve_user, $sop_object_id);
                    $sop_process->save_workflow($sop_object_id, $approve_user, 'Waiting', 'approve');
                    $email = getEmailbyUserId($approve_user);
                    $mail = new changeMailer;
                    $sop_obj = new DB_Public_lm_sop_master();
                    $sop_obj->get("sop_object_id", $sop_object_id);
                    $sop_obj->find();
                    $subject = "$sop_no - Approval Regarding";
                    $actionDescription = "The SOP is Waiting for Your Approval.";
                    $detailsHeading = "SOP Details";
                    $details = ["Number" => $sop_no,
                        "Name" => $sop_master->sop_name,
                        "Revision" => $sop_master->revision,
                        "Reason for Creation/Revision" => $reason_for_revision,
                        "Status" => $sop_obj->status,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    /** Can i show Recall Approve Button */
    if ($sop_master->status == "Approval Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Reviewed", 'review')) {
            $smarty->assign('recall_approve_button', true);

            if (isset($_POST['recall_approve'])) {
                $email = getEmailbyUserId($approver);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Recalled";
                $actionDescription = "The SOP is Recalled.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Reason for Recall" => $comments,
                    "Recalled Status" => $sop_obj->status,
                    "Recalled By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);

                $sop_process->delete_worklist($approver, $sop_object_id);
                $sop_process->delete_workflow_action($sop_object_id, "Waiting", "approve");
                $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Approval");
                $sop_process->add_worklist($reviewer, $sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " Recalled By " . getFullName($reviewer) . ".\nReason for Recall : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'approve_recall', $audit_remarks, 'Recalled');
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Can i show Approve Button */
    if ($sop_master->status == "Approval Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'approve') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
            $smarty->assign('show_approve_button', true);

            $smarty->assign('review_comments_user_array', $sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));
            $review_comments_user_array_count = count($sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));
            if ($review_comments_user_array_count >= 1) {
                $smarty->assign('disable_approve_option', true);
            }
            // Add Review Comments
            if (isset($_POST['add_review_comments'])) {
                $areview_comments_array = (isset($_POST['areview_comments'])) ? $_POST['areview_comments'] : null;
                $areview_comments_id_array = (isset($_POST['areview_comments_id'])) ? $_POST['areview_comments_id'] : null;
                if (!empty($areview_comments_array)) {
                    $sop_process->add_doc_review_comments($sop_object_id, 'approve', $areview_comments_array, $areview_comments_id_array, $usr_id, $date_time);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['approve_need_correction'])) {
                $sop_process->update_sop_status($sop_object_id, "Approve Need Correction");
                $sop_process->update_workflow($sop_object_id, $usr_id, 'approver_query', 'approve');
                $sop_process->delete_worklist($usr_id, $sop_object_id);
                $sop_process->add_worklist($creator, $sop_object_id);
                $workflow_userslist = $sop_process->get_all_workflow_users_list($sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " sent back to " . getFullName($creator) . ".\n Reason : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'approve', $audit_remarks, 'Approve Need Correction');
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id'] != $users_id) {
                        $email = getEmailbyUserId($users_id);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        if ($creator == $users_id) {
                            $subject = "$sop_no - Approve Needs Correction";
                        } else {
                            $subject = "$sop_no - Approve Needs Correction - Information Mail";
                        }
                        $actionDescription = "The SOP Needs a Few Corrections.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Query/Remarks" => $comments,
                            "Status" => $sop_obj->status,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if ($review_comments_user_array_count == 0) {
                if (isset($_POST['approved'])) {
                    $sop_process->update_workflow($sop_object_id, $usr_id, 'Approved', 'approve');
                    if ($sop_process->is_action_finished($sop_object_id, "approve", "Approved")) {
                        $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Authorization");
                        $workflow_userslist = $sop_process->get_all_workflow_users_list($sop_object_id);
                        //Audit Trial
                        $audit_remarks = $sop_master->sop_name . " Approved By " . getFullName($usr_id);
                        add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'approve', $audit_remarks, 'Approved');
                        foreach ($workflow_userslist as $users_id) {
                            if ($_SESSION['user_id'] != $users_id) {
                                $email = getEmailbyUserId($users_id);
                                $mail = new changeMailer;
                                $sop_obj = new DB_Public_lm_sop_master();
                                $sop_obj->get("sop_object_id", $sop_object_id);
                                $sop_obj->find();
                                $subject = "$sop_no - Approved";
                                $actionDescription = "The SOP is Approved.";
                                $detailsHeading = "SOP Details";
                                $details = ["Number" => $sop_no,
                                    "Name" => $sop_master->sop_name,
                                    "Revision" => $sop_master->revision,
                                    "Reason for Creation/Revision" => $reason_for_revision,
                                    "Status" => $sop_obj->status,
                                    "Approved By" => $_SESSION['full_name']
                                ];
                                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                                $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                ];
                                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                            }
                        }
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }
    /** Can i show Request Authorize Button */
    if ($sop_master->status == "Waiting for Sending Authorization") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Approved", 'approve') && ($sop_process->check_user_in_worklist($sop_object_id, $usr_id))) {
            $smarty->assign('request_authorize_button', true);
            $smarty->assign('request_authorizer_selection_option', true);
            $smarty->assign('is_trainng_required_disable_option', false);

            if (isset($_POST['request_authorize'])) {
                if ($sop_process->update_sop_status($sop_object_id, "Authorization Pending")) {
                    $sop_process->delete_workflow_action($sop_object_id, "authorizer_query", "authorize");
                    $sop_process->delete_worklist($usr_id, $sop_object_id);
                    $authorize_user = (isset($_REQUEST['authorize_user'])) ? $_REQUEST['authorize_user'] : null;

                    //Add is_training_required details to DB
                    $is_training_required = (isset($_REQUEST['is_training_required'])) ? $_REQUEST['is_training_required'] : null;
                    if ($sop_process->is_sop_training_exist($sop_object_id)) {
                        $sop_process->delete_sop_training_details($sop_object_id);
                    }
                    if ($is_training_required == "yes") {
                        $sop_process->add_sop_training_details($sop_object_id, $is_training_required, null, null, null, null, "Not Completed", $usr_id, $date_time, null);
                    } else {
                        $sop_process->add_sop_training_details($sop_object_id, $is_training_required, null, null, null, null, "Not Required", $usr_id, $date_time, null);
                    }

                    //Audit Trial
                    $audit_remarks = $sop_master->sop_name . " sent for Authorization";
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'authorize', $audit_remarks, 'Waiting');

                    $sop_process->add_worklist($authorize_user, $sop_object_id);
                    $sop_process->save_workflow($sop_object_id, $authorize_user, 'Waiting', 'authorize');
                    $email = getEmailbyUserId($authorize_user);
                    $mail = new changeMailer;
                    $sop_obj = new DB_Public_lm_sop_master();
                    $sop_obj->get("sop_object_id", $sop_object_id);
                    $sop_obj->find();
                    $subject = "$sop_no - Authorization Regarding";
                    $actionDescription = "The SOP is Waiting for Your Authorization.";
                    $detailsHeading = "SOP Details";
                    $details = ["Number" => $sop_no,
                        "Name" => $sop_master->sop_name,
                        "Revision" => $sop_master->revision,
                        "Reason for Creation/Revision" => $reason_for_revision,
                        "Status" => $sop_obj->status,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Can i show Recall Authorize Button */
    if ($sop_master->status == "Authorization Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Approved", 'approve')) {
            $smarty->assign('recall_authorize_button', true);

            if (isset($_POST['recall_authorize'])) {
                $email = getEmailbyUserId($authorizer);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Recalled";
                $actionDescription = "The SOP is Recalled.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Reason for Recall" => $comments,
                    "Recalled Status" => $sop_obj->status,
                    "Recalled By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);

                $sop_process->delete_worklist($authorizer, $sop_object_id);
                $sop_process->delete_workflow_action($sop_object_id, "Waiting", "authorize");
                $sop_process->update_sop_status($sop_object_id, "Waiting for Sending Authorization");
                $sop_process->add_worklist($approver, $sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " Recalled By " . getFullName($approver) . ".\nReason for Recall : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'authorize_recall', $audit_remarks, 'Recalled');
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Can i show Authorization Button */
    if ($sop_master->status == "Authorization Pending") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'authorize') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
            $smarty->assign('show_authorize_button', true);
            $smarty->assign('review_comments_user_array', $sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));
            $review_comments_user_array_count = count($sop_process->get_doc_review_comments($sop_object_id, $usr_id, 'opened'));
            if ($review_comments_user_array_count >= 1) {
                $smarty->assign('disable_authorize_option', true);
            }
            // Add Review Comments
            if (isset($_POST['add_review_comments'])) {
                $areview_comments_array = (isset($_POST['areview_comments'])) ? $_POST['areview_comments'] : null;
                $areview_comments_id_array = (isset($_POST['areview_comments_id'])) ? $_POST['areview_comments_id'] : null;
                if (!empty($areview_comments_array)) {
                    $sop_process->add_doc_review_comments($sop_object_id, 'authorize', $areview_comments_array, $areview_comments_id_array, $usr_id, $date_time);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['authorize_need_correction'])) {
                $sop_process->update_sop_status($sop_object_id, "Authorization Need Correction");
                $workflow_userslist = $sop_process->get_all_workflow_users_list($sop_object_id);
                $sop_process->update_workflow($sop_object_id, $usr_id, 'authorizer_query', 'authorize');
                $sop_process->delete_worklist($usr_id, $sop_object_id);
                $sop_process->add_worklist($creator, $sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " sent back to " . getFullName($creator) . ".\n Reason : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'authorize', $audit_remarks, 'Authorization Need Correction');
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id'] != $users_id) {
                        $email = getEmailbyUserId($users_id);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        if ($creator == $users_id) {
                            $subject = "$sop_no - Authorization Needs Correction";
                        } else {
                            $subject = "$sop_no - Authorization Needs Correction - Information Mail";
                        }
                        $actionDescription = "The SOP Needs a Few Corrections.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Query/Remarks" => $comments,
                            "Status" => $sop_obj->status,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if ($review_comments_user_array_count == 0) {
                if (isset($_POST['authorized'])) {
                    if ($sop_process->get_sop_live_no($sop_master->sop_type, 'get') == "invalid_type") {
                        $error_handler->raiseError("LIVE NUMBER SEQUENCE NOT EXIST");
                    } else {
                        $sop_process->update_workflow($sop_object_id, $usr_id, 'Authorized', 'authorize');
                        if ($sop_process->is_action_finished($sop_object_id, "authorize", "Authorized")) {
                            $sop_process->delete_worklist($usr_id, $sop_object_id);
                            if ($is_sop_training_required == "yes") {
                                $sop_process->add_worklist($approver, $sop_object_id);
                                $sop_process->update_sop_status($sop_object_id, "Trainer To Be Assigned");
                                //Audit Trial
                                $audit_remarks = $sop_master->sop_name . " Authorized By " . getFullName($usr_id);
                                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'authorize', $audit_remarks, 'Authorized');
                            } else {
                                $effective_date = $_POST['effective_date'];
                                if ($sop_process->update_sop_effective_date($sop_object_id, $sop_master->sop_type, $effective_date, $sop_master->revision, $usr_id) == true) {
                                    $sop_process->add_worklist($creator, $sop_object_id);
                                    $sop_process->update_sop_status($sop_object_id, "Distribution Copy Pending");

                                    /** Send mail to all active restricted dept users */
                                    foreach ($dept_doc_view_details as $user_dept_val_id) {
										if ($user_dept_val_id['is_dept_can_view']) {
		                                    $dept_users = get_dept_users($user_dept_val_id['dept_id']);
		                                    foreach ($dept_users as $user_array) {
		                                        $email = getEmailbyUserId($user_array['user_id']);
		                                        $mail = new changeMailer;
		                                        $sop_obj = new DB_Public_lm_sop_master();
		                                        $sop_obj->get("sop_object_id", $sop_object_id);
		                                        $sop_obj->find();
		                                        $subject = "$sop_no - Authorized";
		                                        $actionDescription = "The SOP is Authorized.";
		                                        $detailsHeading = "SOP Details";
		                                        $details = ["Number" => $sop_no,
		                                            "Name" => $sop_master->sop_name,
		                                            "Revision" => $sop_master->revision,
		                                            "Reason for Creation/Revision" => $reason_for_revision,
		                                            "Status" => $sop_obj->status,
		                                            "Authorized By" => $_SESSION['full_name'],
		                                            "Sent By" => $_SESSION['full_name']
		                                        ];
		                                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
		                                        $bodyDetails = ["actionDescription" => $actionDescription,
		                                            "detailsHeading" => $detailsHeading,
		                                            "details" => $details,
		                                            "buttonLink" => $buttonLink
		                                        ];
		                                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
		                                    }
										}
                                    }
                                    //Audit Trial
                                    $audit_remarks = $sop_master->sop_name . " Authorized By " . getFullName($usr_id) . "\nEffective Date : " . $effective_date;
                                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'authorize', $audit_remarks, 'Authorized');
                                }
                            }
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }
    }
    /** Can i show Distribution Copy Button */
    if (($sop_master->status == "Distribution Copy Pending") && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
        if ($published_status == "Published and Active") {
            $smarty->assign('distribution_copy_button', true);
        } else {
            $error_msg = "Option available on " . get_modified_date_format($sop_master->effective_date);
            $smarty->assign('dist_copy_alert_msg', $error_msg);
        }

        if (isset($_POST['send_dist_copy'])) {
            $sop_process->delete_worklist($usr_id, $sop_object_id);
            $sop_process->update_sop_status($sop_object_id, "Waiting for Acknowledgement");
            $dist_copy_to_array = $_POST['dist_copy_to'] ?: NULL;
            foreach ($dist_copy_to_array as $key => $user_value) {
                if (!$user_value == "") {
                    $sop_process->add_worklist($user_value, $sop_object_id);
                    $sop_process->save_workflow($sop_object_id, $user_value, 'Waiting', 'copy');

                    $email = getEmailbyUserId($user_value);
                    $mail = new changeMailer;
                    $sop_obj = new DB_Public_lm_sop_master();
                    $sop_obj->get("sop_object_id", $sop_object_id);
                    $sop_obj->find();
                    $subject = "$sop_no - Waiting for Your Acknowledgement";
                    $actionDescription = "The SOP is Waiting for Your Acknowledgement.";
                    $detailsHeading = "SOP Details";
                    $details = ["Number" => $sop_no,
                        "Name" => $sop_master->sop_name,
                        "Revision" => $sop_master->revision,
                        "Reason for Creation/Revision" => $reason_for_revision,
                        "Status" => $sop_obj->status,
                        "Effective Date" => get_modified_date_format($sop_master->effective_date),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
            }
            header("Location:$_SERVER[REQUEST_URI]");
        }
    }
    /* Can i show Acknowledge button */
    if ($sop_master->status == "Waiting for Acknowledgement" && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'copy')) {
            $smarty->assign('ack_button', true);

            if (isset($_POST['copy_ack'])) {
                $sop_process->update_workflow($sop_object_id, $usr_id, 'Acknowledged', 'copy');
                $sop_process->delete_worklist($usr_id, $sop_object_id);
                if ($sop_process->is_action_finished($sop_object_id, "copy", "Acknowledged")) {
                    $sop_process->update_sop_status($sop_object_id, "Completed");
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /* Can i show trainer assign button */
    if ($sop_master->status == "Trainer To Be Assigned") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Approved", 'approve') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
            $smarty->assign('show_trainer_assign_button', true);
            if (isset($_POST['assign_to_trainer'])) {
                $trainer_user = $_POST['trainer'] ?: NULL;
                $sop_process->delete_worklist($usr_id, $sop_object_id);
                $sop_process->add_worklist($trainer_user, $sop_object_id);
                $sop_process->save_workflow($sop_object_id, $trainer_user, 'Waiting', 'train');
                $sop_process->update_sop_status($sop_object_id, "Training To Be Scheduled");
                $training_object_id = $sop_process->get_sop_training_object_id($sop_object_id, "yes", "yes");
                $sop_process->update_sop_training_details($training_object_id, $sop_object_id, $trainer_user, null, null, null, "Trainer Assigned", $usr_id, $date_time, null);
                //Audit Remarks
                $audit_remarks = $sop_master->sop_name . " " . getFullName($trainer_user) . " assigned as Trainer";
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'assign_trainer', $audit_remarks, 'Trainer Assigned');

                $email = getEmailbyUserId($trainer_user);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Trainer Assigned";
                $actionDescription = "The SOP is Waiting for Training.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Trainer" => getFullName($trainer_user),
                    "Status" => $sop_obj->status,
                    "Sent By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /** Can i show Recall Trainer Button */
    if ($sop_master->status == "Training To Be Scheduled") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Approved", 'approve')) {
            $smarty->assign('recall_trainer_button', true);

            if (isset($_POST['recall_trainer'])) {
                $email = getEmailbyUserId($trainer);
                $mail = new changeMailer;
                $sop_obj = new DB_Public_lm_sop_master();
                $sop_obj->get("sop_object_id", $sop_object_id);
                $sop_obj->find();
                $subject = "$sop_no - Recalled";
                $actionDescription = "The SOP is Recalled.";
                $detailsHeading = "SOP Details";
                $details = ["Number" => $sop_no,
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Reason for Creation/Revision" => $reason_for_revision,
                    "Reason for Recall" => $comments,
                    "Recalled Status" => $sop_obj->status,
                    "Recalled By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);

                $sop_process->delete_worklist($trainer, $sop_object_id);
                $sop_process->delete_workflow_action($sop_object_id, "Waiting", "train");
                $sop_process->update_sop_status($sop_object_id, "Trainer To Be Assigned");
                $sop_process->add_worklist($approver, $sop_object_id);
                //Audit Trial
                $audit_remarks = $sop_master->sop_name . " Recalled By " . getFullName($approver) . ".\nReason for Recall : " . $comments;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'trainer_recall', $audit_remarks, 'Recalled');
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /* Can i show training schedule button */
    if ($sop_master->status == "Training To Be Scheduled") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'train')) {
            $smarty->assign('show_training_schedule_button', true);

            if (isset($_POST['training_scheduled'])) {
                $training_date = (isset($_POST['training_date'])) ? $_POST['training_date'] : null;
                $training_date_time = (isset($_POST['training_date_time'])) ? $_POST['training_date_time'] : null;
                $venue = (isset($_POST['venue'])) ? $_POST['venue'] : null;
                $training_info_mail_to_dept = (isset($_POST['training_info_mail_to_dept'])) ? $_POST['training_info_mail_to_dept'] : null;
                $is_online_training_selected = (isset($_POST['training_link'])) ? $_POST['training_link'] : null;

                $sop_process->update_sop_status($sop_object_id, "Training Pending");
                $training_object_id = $sop_process->get_sop_training_object_id($sop_object_id, "yes", "yes");
                if ($is_online_training_selected == "yes") {
                    $random_meeting_link = $sop_process->get_random_meeting_link($date_time);
                } else {
                    $random_meeting_link = null;
                }
                $sop_process->update_sop_training_details($training_object_id, $sop_object_id, $usr_id, $training_date, $training_date_time, $venue, "Training Scheduled", $usr_id, $date_time, $random_meeting_link);

                foreach ($training_info_mail_to_dept as $key => $value) {
                    $add_meeting_schedule_mail_obj = new DB_Public_lm_sop_meeting_schedule_mail();
                    $add_meeting_schedule_mail_obj->sop_object_id = $sop_object_id;
                    $add_meeting_schedule_mail_obj->meeting_object_id = $training_object_id;
                    $add_meeting_schedule_mail_obj->mail_send_to_dept = $value;
                    $add_meeting_schedule_mail_obj->created_by = $usr_id;
                    $add_meeting_schedule_mail_obj->created_time = $date_time;
                    $add_meeting_schedule_mail_obj->modified_by = $usr_id;
                    $add_meeting_schedule_mail_obj->modified_time = $date_time;
                    $add_meeting_schedule_mail_obj->insert();

                    //Send Mail to dept users about training scheduled
                    $dept_userlist = $sop_process->get_dept_userlist($value);
                    foreach ($dept_userlist as $dept_users_id) {
                        $email = getEmailbyUserId($dept_users_id);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        $subject = "$sop_no - Training Scheduled";
                        $actionDescription = "The SOP Training is Scheduled.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Status" => $sop_obj->status,
                            "Training Date" => $training_date . " " . $training_date_time,
                            "Trainer" => getFullName($usr_id),
                            "Venue" => $venue,
                            "Remarks" => $comments,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }
                $audit_remarks = $sop_master->sop_name . " Training Scheduled" . "\nScheduled Date : " . $training_date . " " . $training_date_time . "\nTrainer : " . getFullName($usr_id) . "\nVenue : " . $venue;
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'training_schedule', $audit_remarks, 'Training Scheduled');
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    /* Can i show Reschedule or update trainee details  */
    if ($sop_master->status == "Training Pending" && $is_sop_training_required == "yes") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Waiting", 'train') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
            $training_object_id = $sop_process->get_sop_training_object_id($sop_object_id, "yes", "yes");
            $scheduled_training_date = $sop_process->get_sop_training_date($training_object_id);
            $today_date = date('Y-m-d');

            if ($today_date >= $scheduled_training_date) {
                $smarty->assign('update_trainees_button', true);
                $latest_sop_training_details = $sop_process->get_sop_training_details($sop_object_id, 'yes', 'yes');
                $smarty->assign('latest_sop_training_details', $latest_sop_training_details);
                if ($sop_process->is_sop_eligible_to_complete_training($sop_object_id) == false) {
                    $smarty->assign('disable_training_comleted_option', true);
                }

                /* If Update Trainees... */
                if (isset($_POST['update_trainees'])) {
                    $utraining_object_id = (isset($_REQUEST['trainee_training_date'])) ? $_REQUEST['trainee_training_date'] : null;
                    $trainees_list = (isset($_REQUEST['trainees_to'])) ? $_REQUEST['trainees_to'] : null;
                    $trainees_from_nah_array = (isset($_REQUEST['trainees_from_nah'])) ? $_REQUEST['trainees_from_nah'] : null;
                    $trainee_department_nah_array = (isset($_REQUEST['trainee_department_nah'])) ? $_REQUEST['trainee_department_nah'] : null;

                    if (count($trainees_list) >= 1) {
                        foreach ($trainees_list as $key => $value) {
                            $add_trainee_obj = new DB_Public_lm_sop_meeting_attendance();
                            $add_trainee_obj->sop_object_id = $sop_object_id;
                            $add_trainee_obj->attended_user = $value;
                            $add_trainee_obj->created_by = $usr_id;
                            $add_trainee_obj->created_time = $date_time;
                            $add_trainee_obj->modified_by = $usr_id;
                            $add_trainee_obj->modified_time = $date_time;
                            $add_trainee_obj->meeting_object_id = $utraining_object_id;
                            if (!$sop_process->check_trainee_exist($sop_object_id, $utraining_object_id, $value) && !empty($value)) {
                                $add_trainee_obj->insert();
                            }
                            $trainee_user = getFullName($value);
                            $audit_remarks = $sop_master->name . "\n $trainee_user Added";
                            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'update_trainee', $audit_remarks, 'Trainees details updated');
                        }
                    }
                    if (count($trainees_from_nah_array) >= 1) {
                        for ($i = 0; $i < count($trainees_from_nah_array); $i++) {
                            $add_trainee_nah_obj = new DB_Public_lm_sop_meeting_attendance_nah();
                            $add_trainee_nah_obj->sop_object_id = $sop_object_id;
                            $add_trainee_nah_obj->attended_user = $trainees_from_nah_array[$i];
                            $add_trainee_nah_obj->dept = $trainee_department_nah_array[$i];
                            $add_trainee_nah_obj->created_by = $usr_id;
                            $add_trainee_nah_obj->created_time = $date_time;
                            $add_trainee_nah_obj->modified_by = $usr_id;
                            $add_trainee_nah_obj->modified_time = $date_time;
                            $add_trainee_nah_obj->meeting_object_id = $utraining_object_id;
                            if (!$sop_process->check_sop_trainee_nah_exist($sop_object_id, $utraining_object_id, $trainees_from_nah_array[$i]) && !empty($trainees_from_nah_array[$i])) {
                                $add_trainee_nah_obj->insert();
                            }
                            $audit_remarks = $sop_master->name . "\n $trainees_from_nah_array[$i] Added";
                            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'update_trainee', $audit_remarks, 'Trainees details updated');
                        }
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }

                /** If Training Completed... */
                if (isset($_POST['training_completed'])) {
                    if ($sop_process->is_sop_eligible_to_complete_training($sop_object_id)) {
                        $online_exam_req = (isset($_REQUEST['online_exam_req'])) ? $_REQUEST['online_exam_req'] : null;
                        $training_object_id = $sop_process->get_sop_training_object_id($sop_object_id, "yes", "yes");
                        $sop_process->update_sop_training_status($training_object_id, "Completed");
                        $sop_process->update_workflow($sop_object_id, $usr_id, 'Trained', 'train');
                        $sop_process->delete_worklist($usr_id, $sop_object_id);

                        //Send to authorizer to set efective date if exam not required otherwise set to question preparation
                        if ($online_exam_req == "exam_required") {
                            //Add to online exam details
                            $sop_process->add_sop_online_exam($sop_object_id, 'yes', 'Not Completed', $usr_id, $date_time);
                            $sop_process->update_sop_status($sop_object_id, "Waiting for Question Preparation");
                            $sop_process->add_worklist($trainer, $sop_object_id);
                        } else {
                            $sop_process->add_sop_online_exam($sop_object_id, 'no', 'Completed', $usr_id, $date_time);
                            $sop_process->update_sop_status($sop_object_id, "Waiting for Setting Effective Date");
                            $sop_process->add_worklist($authorizer, $sop_object_id);
                        }
                        //Audit Remarks
                        $audit_remarks = $sop_master->sop_name . " Training Completed";
                        add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'train', $audit_remarks, 'Training Completed');

                        $workflow_userslist = $sop_process->get_all_workflow_users_list($sop_object_id);
                        foreach ($workflow_userslist as $users_id) {
                            $email = getEmailbyUserId($users_id);
                            $mail = new changeMailer;
                            $sop_obj = new DB_Public_lm_sop_master();
                            $sop_obj->get("sop_object_id", $sop_object_id);
                            $sop_obj->find();
                            $subject = "$sop_no - Training Completed";
                            $actionDescription = "The SOP Training is Completed.";
                            $detailsHeading = "SOP Details";
                            $details = ["Number" => $sop_no,
                                "Name" => $sop_master->sop_name,
                                "Revision" => $sop_master->revision,
                                "Reason for Creation/Revision" => $reason_for_revision,
                                "Status" => $sop_obj->status,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                            $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                            ];
                            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    } else {
                        $error_handler->raiseError("TRAINEES DETAILS NOT FOUND");
                    }
                }
            } else {
                $smarty->assign('rescheduled_training_button', true);
                $error_msg = "Update trainees option available on " . get_modified_date_format($scheduled_training_date);
                $smarty->assign('scheduled_training_date_alert_msg', $error_msg);

                if (isset($_POST['training_rescheduled'])) {
                    $rtraining_date = (isset($_POST['rtraining_date'])) ? $_POST['rtraining_date'] : null;
                    $rtraining_date_time = (isset($_POST['rtraining_date_time'])) ? $_POST['rtraining_date_time'] : null;
                    $rvenue = (isset($_POST['rvenue'])) ? $_POST['rvenue'] : null;
                    $rtraining_info_mail_to_dept = (isset($_POST['rtraining_info_mail_to_dept'])) ? $_POST['rtraining_info_mail_to_dept'] : null;
                    $is_online_training_selected = (isset($_POST['rtraining_link'])) ? $_POST['rtraining_link'] : null;
                    if ($is_online_training_selected == "yes") {
                        $random_meeting_link = $sop_process->get_random_meeting_link($date_time);
                    } else {
                        $random_meeting_link = null;
                    }

                    /*  update prev training is_latest field as 'no' and update status as 'Training Rescheduled' and then insert rescheduled details * */
                    $sop_process->update_sop_training_status($training_object_id, 'Training Rescheduled');
                    $sop_process->update_sop_training_is_latest($training_object_id, 'no');
                    $sop_process->add_sop_training_details($sop_object_id, $is_sop_training_required, $usr_id, $rtraining_date, $rtraining_date_time, $rvenue, "Training Scheduled", $usr_id, $date_time, $random_meeting_link);
                    $rtraining_object_id = $sop_process->get_sop_training_object_id($sop_object_id, "yes", "yes");
                    foreach ($rtraining_info_mail_to_dept as $key => $value) {
                        $add_meeting_schedule_mail_obj = new DB_Public_lm_sop_meeting_schedule_mail();
                        $add_meeting_schedule_mail_obj->sop_object_id = $sop_object_id;
                        $add_meeting_schedule_mail_obj->meeting_object_id = $rtraining_object_id;
                        $add_meeting_schedule_mail_obj->mail_send_to_dept = $value;
                        $add_meeting_schedule_mail_obj->created_by = $usr_id;
                        $add_meeting_schedule_mail_obj->created_time = $date_time;
                        $add_meeting_schedule_mail_obj->modified_by = $usr_id;
                        $add_meeting_schedule_mail_obj->modified_time = $date_time;
                        $add_meeting_schedule_mail_obj->insert();

                        //Send Mail to dept users about training scheduled
                        $dept_userlist = $sop_process->get_dept_userlist($value);
                        foreach ($dept_userlist as $dept_users_id) {
                            $email = getEmailbyUserId($dept_users_id);
                            $mail = new changeMailer;
                            $sop_obj = new DB_Public_lm_sop_master();
                            $sop_obj->get("sop_object_id", $sop_object_id);
                            $sop_obj->find();
                            $subject = "$sop_no - Training Rescheduled";
                            $actionDescription = "The SOP Training is Rescheduled.";
                            $detailsHeading = "SOP Details";
                            $details = ["Number" => $sop_no,
                                "Name" => $sop_master->sop_name,
                                "Revision" => $sop_master->revision,
                                "Reason for Creation/Revision" => $reason_for_revision,
                                "Status" => $sop_obj->status,
                                "Training Date" => $rtraining_date . " " . $rtraining_date_time,
                                "Trainer" => getFullName($usr_id),
                                "Venue" => $rvenue,
                                "Remarks" => $comments,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                            $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                            ];
                            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        }
                    }
                    $audit_remarks = $sop_master->sop_name . " Training Rescheduled" . "\nScheduled Date : " . $scheduled_training_date . "\nRescheduled Date : " . $rtraining_date . " " . $rtraining_date_time . "\nTrainer : " . getFullName($usr_id) . "\nVenue : " . $rvenue;
                    add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'training_reschedule', $audit_remarks, 'Training Rescheduled');
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }
    /* Can i show Question Preparation button after completion of training */
    if ($sop_master->status == "Waiting for Question Preparation" && $is_sop_online_exam_required == "yes" && $sop_online_exam_status == "Not Completed") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Trained", 'train') && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
            $smarty->assign('question_preparation_button', true);
            $tf_qns_opt = array("1" => "True", "2" => "False");
            $mc_qns_opt = array("1" => '1', "2" => '2', "3" => '3', "4" => '4');
            $sop_question_ans_count = count($sop_process->get_sop_question_ans_list($sop_object_id));
            $smarty->assign('true_false_qns_opt', $tf_qns_opt);
            $smarty->assign('mc_qns_opt', $mc_qns_opt);
            $smarty->assign('sop_question_ans_list', $sop_process->get_sop_question_ans_list($sop_object_id));
            $smarty->assign('sop_question_ans_count', $sop_question_ans_count);

            if (isset($_POST['atf_question'])) {
                $atf_qns_array = (isset($_POST['atf_qns'])) ? $_POST['atf_qns'] : null;
                $atf_qns_ans_array = (isset($_POST['atf_qns_ans'])) ? $_POST['atf_qns_ans'] : null;
                $atf_qns_order_array = (isset($_POST['atf_qns_order'])) ? $_POST['atf_qns_order'] : null;
                $sop_process->add_sop_tf_question($sop_object_id, 'true_false', $atf_qns_array, $tf_qns_opt, $atf_qns_ans_array, $atf_qns_order_array, $usr_id, $date_time);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if (isset($_POST['amc_question'])) {
                $amc_qns_array = (isset($_POST['amc_qns'])) ? $_POST['amc_qns'] : null;
                $amc_qns_ans_array = (isset($_POST['amc_qns_ans'])) ? $_POST['amc_qns_ans'] : null;
                $amc_qns_order_array = (isset($_POST['amc_qns_order'])) ? $_POST['amc_qns_order'] : null;
                $amc_qns_opt1_array = (isset($_POST['amc_qns_opt1'])) ? $_POST['amc_qns_opt1'] : null;
                $amc_qns_opt2_array = (isset($_POST['amc_qns_opt2'])) ? $_POST['amc_qns_opt2'] : null;
                $amc_qns_opt3_array = (isset($_POST['amc_qns_opt3'])) ? $_POST['amc_qns_opt3'] : null;
                $amc_qns_opt4_array = (isset($_POST['amc_qns_opt4'])) ? $_POST['amc_qns_opt4'] : null;
                for ($i = 0; $i < count($amc_qns_array); $i++) {
                    $mc_qns_opt_array[] = array("1" => $amc_qns_opt1_array[$i], "2" => $amc_qns_opt2_array[$i], "3" => $amc_qns_opt3_array[$i], "4" => $amc_qns_opt4_array[$i]);
                }
                $sop_process->add_sop_mc_question($sop_object_id, 'mc', $amc_qns_array, $mc_qns_opt_array, $amc_qns_ans_array, $amc_qns_order_array, $usr_id, $date_time);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if (isset($_POST['sub_assign_exam'])) {
                if (!empty($sop_question_ans_count)) {
                    $assign_exam_qns_limit = (isset($_POST['assign_exam_qns_limit'])) ? $_POST['assign_exam_qns_limit'] : null;
                    $assign_exam_target_date = (isset($_POST['assign_exam_target_date'])) ? $_POST['assign_exam_target_date'] : null;
                    $assign_exam_users_array = (isset($_POST['assign_exam_users'])) ? $_POST['assign_exam_users'] : null;
                    $default_pass_mark = getSopExamPassMark();
                    $default_attempt_limit = getSopExamAttemptLimit();
                    if (!empty($default_pass_mark) && !empty($default_attempt_limit)) {
                        $sop_process->delete_worklist($usr_id, $sop_object_id);
                        $sop_process->update_sop_status($sop_object_id, "Waiting for Online Exam");
                        $sop_process->update_sop_online_exam_status($sop_object_id, "Assigned");
                        for ($i = 0; $i < count($assign_exam_users_array); $i++) {
                            if ($sop_process->assign_sop_exam($sop_object_id, $usr_id, $assign_exam_users_array[$i], $date_time, $assign_exam_target_date, $default_pass_mark, $default_attempt_limit, 1, 'Assigned', 'Not Completed', 'yes', 'NA', $assign_exam_qns_limit)) {
                                $sop_process->add_worklist($assign_exam_users_array[$i], $sop_object_id);

                                /* Send Mail to exam attend user for exam */
                                $email = getEmailbyUserId($assign_exam_users_array[$i]);
                                $mail = new changeMailer;
                                $sop_obj = new DB_Public_lm_sop_master();
                                $sop_obj->get("sop_object_id", $sop_object_id);
                                $sop_obj->find();
                                $subject = "$sop_no - Online Exam Assigned";
                                $actionDescription = "Online Exam Assigned for Evaluation.";
                                $detailsHeading = "SOP Details";
                                $details = ["Number" => $sop_no,
                                    "Name" => $sop_master->sop_name,
                                    "Revision" => $sop_master->revision,
                                    "Reason for Creation/Revision" => $reason_for_revision,
                                    "Status" => $sop_obj->status,
                                    "Target Date" => $assign_exam_target_date,
                                    "Assigned By" => getFullName($usr_id),
                                    "Remarks" => $comments,
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                                $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                ];
                                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                            }
                        }
                        //Audit Remarks
                        $audit_remarks = $sop_master->sop_name . " Online Exam Assigned" . "\nTarget Date : " . $assign_exam_target_date;
                        add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'online_exam', $audit_remarks, 'Online Exam Assigned');
                        header("Location:$_SERVER[REQUEST_URI]");
                    } else {
                        $error_handler->raiseError("INVALID_EXAM_PASSMARK_LIMIT_SETTINGS");
                    }
                } else {
                    $error_handler->raiseError("INVALID_QUESTIONS");
                }
            }
        }
    }
    /** Can i show Recall Online Exam Button */
    if ($sop_master->status == "Waiting for Online Exam" && $is_sop_online_exam_required == "yes" && $sop_online_exam_status == "Assigned") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Trained", 'train')) {
            $smarty->assign('recall_online_exam_button', true);
            $smarty->assign('online_exam_userslist', $sop_process->get_sop_online_exam_userlist($sop_object_id, null, null, 'yes', 'Not Completed'));
            /** Recall exam user */
            if (isset($_POST['sub_recall_assign_exam'])) {
                $recall_exam_user_id = (isset($_POST['recall_exam_user_id'])) ? $_POST['recall_exam_user_id'] : null;
                $latest_exam_attempt_obj = $sop_process->get_sop_online_exam_latest_user_obj($sop_object_id, $recall_exam_user_id);
                if ($latest_exam_attempt_obj->attempt_status == "Not Completed") {
                    if ($sop_process->update_sop_online_exam_user_status($latest_exam_attempt_obj->object_id, "Recalled")) {
                        $sop_process->update_sop_online_exam_user_attempt_status($latest_exam_attempt_obj->object_id, "Completed");

                        $email = getEmailbyUserId($recall_exam_user_id);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        $subject = "$sop_no - Online Exam Recalled";
                        $actionDescription = "The Online Exam is Recalled.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Reason for Recall" => $comments,
                            "Recalled Status" => $sop_obj->status,
                            "Recalled By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        $sop_process->delete_worklist($recall_exam_user_id, $sop_object_id);

                        if ($sop_process->is_sop_online_exam_user_attempt_status_completed($sop_object_id, 'Completed')) {
                            $sop_process->update_sop_online_exam_status($sop_object_id, 'Completed');
                            if ($sop_process->get_sop_online_exam_status($sop_object_id) == "Completed") {
                                $sop_process->update_sop_status($sop_object_id, "Waiting for Setting Effective Date");
                                $sop_process->add_worklist($authorizer, $sop_object_id);
                            }
                        }
                        //Audit Trial
                        $audit_remarks = $sop_master->sop_name . " Recalled By " . getFullName($creator) . ".\nReason for Recall : " . $comments;
                        add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'online_exam_recall', $audit_remarks, 'Recalled');
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                } else {
                    $error_handler->raiseError("INVALID REQUEST");
                }
            }
        }
    }
    /** Can i view Online Exam Button */
    if ($sop_master->status == "Waiting for Online Exam" && $is_sop_online_exam_required == "yes" && $sop_online_exam_status == "Assigned" && $sop_process->check_user_in_worklist($sop_object_id, $usr_id)) {
        $latest_exam_obj = $sop_process->get_sop_online_exam_latest_user_obj($sop_object_id, $usr_id);
        if ($latest_exam_obj->status == "Assigned" || $latest_exam_obj->status == "Re Assigned") {
            $smarty->assign('attend_online_exam_button', true);
            if (is_online_exam_capa_required($latest_exam_obj->attempt_limit, $latest_exam_obj->attempt) && $latest_exam_obj->capa_no == "capa_required") {
                $smarty->assign('update_capa_no', true);
                $smarty->assign('update_capa_attempt', $latest_exam_obj->attempt);
                if (isset($_POST['save_aoe_capa_no'])) {
                    $aoe_capa_no = (isset($_POST['aoe_capa_no'])) ? $_POST['aoe_capa_no'] : null;
                    $sop_process->update_sop_online_exam_user_capa_no($latest_exam_obj->object_id, $aoe_capa_no);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            } else {
                $smarty->assign('attend_online_exam_user_details', $sop_process->get_sop_online_exam_user_details($latest_exam_obj->object_id));
                $smarty->assign('attend_online_exam_user_ans_details', $sop_process->get_sop_online_exam_user_question_ans_details($latest_exam_obj->object_id));
                if ($sop_process->Is_not_answerd_all_sop_online_exam_questions($sop_object_id, $usr_id, 'yes') == null) {
                    $smarty->assign('submit_online_exam_button', true);
                }
                /** Update exam ans */
                if (isset($_POST['save_aoe_ans'])) {
                    $aoe_object_id_array = (isset($_POST['aoe_object_id'])) ? $_POST['aoe_object_id'] : null;
                    $aoe_ans_array = (isset($_POST['aoe_ans'])) ? $_POST['aoe_ans'] : null;
                    $sop_process->update_sop_online_exam_ans($aoe_object_id_array, $aoe_ans_array, $date_time);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
                /** If Exam Completed */
                if (isset($_POST['sub_aoe_ans_completed'])) {
                    /** Check all the question got answerd */
                    if ($sop_process->Is_not_answerd_all_sop_online_exam_questions($sop_object_id, $usr_id, 'yes') == true) {
                        $error_handler->raiseError("ALL_QUESTIONS_NOT_ANSWERED");
                    } else {
                        $user_marks_scored = $sop_process->get_sop_online_exam_mark($latest_exam_obj->object_id);
                        $user_exam_result = $sop_process->get_sop_online_exam_result($user_marks_scored, $latest_exam_obj->pass_mark);
                        $sop_process->delete_worklist($usr_id, $sop_object_id);
                        $sop_process->update_sop_online_exam_user_status($latest_exam_obj->object_id, "Completed");
                        $sop_process->update_sop_online_exam_user_attempt_status($latest_exam_obj->object_id, "Completed");
                        $sop_process->update_sop_online_exam_user_marks_scored($latest_exam_obj->object_id, $user_marks_scored);
                        $sop_process->update_sop_online_exam_user_exam_result($latest_exam_obj->object_id, $user_exam_result);
                        $sop_process->update_sop_online_exam_user_exam_completed_date($latest_exam_obj->object_id, $date_time);

                        $email = getEmailbyUserId($usr_id);
                        $mail = new changeMailer;
                        $sop_obj = new DB_Public_lm_sop_master();
                        $sop_obj->get("sop_object_id", $sop_object_id);
                        $sop_obj->find();
                        $subject = "$sop_no - Online Exam Result";
                        $actionDescription = "The Online Exam Result Updated.";
                        $detailsHeading = "SOP Details";
                        $details = ["Number" => $sop_no,
                            "Name" => $sop_master->sop_name,
                            "Revision" => $sop_master->revision,
                            "Reason for Creation/Revision" => $reason_for_revision,
                            "Status" => $sop_obj->status,
                            "Pass Mark" => $latest_exam_obj->pass_mark,
                            "Marks Scored" => $user_marks_scored,
                            "Result" => $user_exam_result,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        /** Reassign Exam Initiation */
                        if ($user_exam_result == "Failed") {
                            if (is_online_exam_capa_required($latest_exam_obj->attempt_limit, $latest_exam_obj->attempt + 1)) {
                                $capa_no = "capa_required";
                            } else {
                                $capa_no = $latest_exam_obj->capa_no;
                            }
                            $sop_process->update_sop_online_exam_user_is_latest($latest_exam_obj->object_id, 'no');
                            if ($sop_process->assign_sop_exam($sop_object_id, $usr_id, $usr_id, $date_time, $latest_exam_obj->target_date, $latest_exam_obj->pass_mark, $latest_exam_obj->attempt_limit, $latest_exam_obj->attempt + 1, 'Re Assigned', 'Not Completed', 'yes', $capa_no, $latest_exam_obj->question_limit)) {
                                $sop_process->add_worklist($usr_id, $sop_object_id);
                                //Audit Remarks
                                $audit_remarks = $sop_master->sop_name . "\nOnline Exam Result" . "\nMarks Scored : " . $user_marks_scored . "\nResult : " . $user_exam_result;
                                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'online_exam', $audit_remarks, 'Online Exam Re Assigned');
                            }
                        }
                        if ($sop_process->is_sop_online_exam_user_attempt_status_completed($sop_object_id, 'Completed')) {
                            $sop_process->update_sop_online_exam_status($sop_object_id, 'Completed');
                            if ($sop_process->get_sop_online_exam_status($sop_object_id) == "Completed") {
                                $sop_process->update_sop_status($sop_object_id, "Waiting for Setting Effective Date");
                                $sop_process->add_worklist($authorizer, $sop_object_id);
                            }
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }
    }
    /* Can i show set effective button after completion of training */
    if ($sop_master->status == "Waiting for Setting Effective Date") {
        if ($sop_process->check_user_in_workflow($sop_object_id, $usr_id, "Authorized", 'authorize')) {
            $smarty->assign('set_effective_date_button', true);

            if (isset($_POST['sub_set_effective_date'])) {
                $set_effective_date = $_POST['set_effective_date'];
                $update_sop_eff_date_result = $sop_process->update_sop_effective_date($sop_object_id, $sop_master->sop_type, $set_effective_date, $sop_master->revision, $usr_id);
                if ($update_sop_eff_date_result == true) {
                    $sop_process->delete_worklist($usr_id, $sop_object_id);
                    $sop_process->add_worklist($creator, $sop_object_id);
                    $sop_process->update_sop_status($sop_object_id, "Distribution Copy Pending");

                    /** Send mail to all active restricted dept users */
                    foreach ($dept_doc_view_details as $user_dept_val_id) {
						if ($user_dept_val_id['is_dept_can_view']) {
		                    $dept_users = get_dept_users($user_dept_val_id['dept_id']);
		                    foreach ($dept_users as $user_array) {
		                        $email = getEmailbyUserId($user_array['user_id']);
		                        $mail = new changeMailer;
		                        $sop_obj = new DB_Public_lm_sop_master();
		                        $sop_obj->get("sop_object_id", $sop_object_id);
		                        $sop_obj->find();
		                        $subject = "$sop_no - Effective Date";
		                        $actionDescription = "The SOP become Efective.";
		                        $detailsHeading = "SOP Details";
		                        $details = ["Number" => $sop_no,
		                            "Name" => $sop_master->sop_name,
		                            "Revision" => $sop_master->revision,
		                            "Reason for Creation/Revision" => $reason_for_revision,
		                            "Status" => $sop_obj->status,
		                            "Effective Date" => $set_effective_date,
		                            "Sent By" => $_SESSION['full_name']
		                        ];
		                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$sop_object_id";
		                        $bodyDetails = ["actionDescription" => $actionDescription,
		                            "detailsHeading" => $detailsHeading,
		                            "details" => $details,
		                            "buttonLink" => $buttonLink
		                        ];
		                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
		                    }
						}
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }



    if ($published_status == "Published and Active" && $sop_master->is_latest_revision == "true" && $sop_master->status == "Completed") {
        $smarty->assign('add_suggestion_for_improvement', true);

        // Insert Suggestion for improvement
        if ((isset($_POST['add_suggestion']))) {
            $sequence_object = new Sequence;
            $id = "sop.suggestion:" . $sequence_object->get_next_sequence();

            $sop_sugg_obj = new DB_Public_lm_sop_improvement();
            $sop_sugg_obj->object_id = $id;
            $sop_sugg_obj->sop_object_id = $sop_object_id;
            $sop_sugg_obj->comments = trim($_POST['sugg_comments']);
            $sop_sugg_obj->commented_by = $usr_id;
            $sop_sugg_obj->commented_date = $date_time;
            $sop_sugg_obj->insert();
            //Audit Trial
            $audit_remarks = "New Suggestion added for " . $sop_master->sop_name;
            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'suggestion', $audit_remarks, 'Suggestion Added');
            header("Location:$_SERVER[REQUEST_URI]");
        }
    }
    /* Interlinked SOPs list */
    if ($sop_process->is_interlinked_sop_exist($sop_object_id)) {
        $interlinked_sop_master_obj = $sop_process->get_interlinked_sop_master_obj($sop_object_id);
        $interlinked_sop_list = $sop_process->get_interlinked_sop_list($sop_object_id);
        $interlinked_sop_users_list = $sop_process->get_interlinked_sop_users_list($sop_object_id);

        $smarty->assign('interlinked_sop_created_by', getFullName($interlinked_sop_master_obj->created_by));
        $smarty->assign('interlinked_sop_created_by_dept', getDeptName($interlinked_sop_master_obj->created_by));
        $smarty->assign('interlinked_sop_created_time', $interlinked_sop_master_obj->created_time);
        $smarty->assign('interlinked_sop_remarks', $interlinked_sop_master_obj->remarks);
        $smarty->assign('interlinked_sop_list', $interlinked_sop_list);
        $smarty->assign('interlinked_sop_users_list', $interlinked_sop_users_list);
    }

    //Get Previous SOP improvements if prev sop exist
    if ($sop_process->check_previous_sop($sop_object_id)) {
        $previous_sop_object_id = $sop_process->get_previous_sop_object_id($sop_object_id);
        $view_prev_sop_imp_obj = new DB_Public_lm_sop_improvement();
        $view_prev_sop_imp_obj->whereAdd("sop_object_id='$previous_sop_object_id'");
        $view_prev_sop_imp_obj->find();
        while ($view_prev_sop_imp_obj->fetch()) {
            $user_name = getFullName($view_prev_sop_imp_obj->commented_by);
            $department = getDeptName($view_prev_sop_imp_obj->commented_by);
            $prev_sop_received_suggestion_array[] = ['object_id' => $view_prev_sop_imp_obj->object_id, 'username' => $user_name, 'department_name' => $department, 'comments' => trim($view_prev_sop_imp_obj->comments), 'date_time' => get_modified_date_time_format($view_prev_sop_imp_obj->commented_date), "comment_reviewed_by" => getFullName($view_prev_sop_imp_obj->comment_reviewed_by), "imp_status" => $view_prev_sop_imp_obj->comment_implementation_status, "reviewer_comments" => $view_prev_sop_imp_obj->reviewer_comments, "reviewer_date" => $view_prev_sop_imp_obj->reviewed_date];
        }

        if (!empty($prev_sop_received_suggestion_array)) {
            $smarty->assign('prev_sop_received_suggestion_array', $prev_sop_received_suggestion_array);

            if (isset($_POST['review_suggestion'])) {
                $suggestion_id = $_POST['suggestion_id'];
                $review_status = $_POST['review_status'];
                $review_comments = $_POST['review_comments'];
                foreach ($suggestion_id as $a => $value) {
                    $review_sop_sugg_obj = new DB_Public_lm_sop_improvement();
                    $review_sop_sugg_obj->whereAdd("object_id='$suggestion_id[$a]'");
                    $review_sop_sugg_obj->comment_implementation_status = $review_status[$a];
                    $review_sop_sugg_obj->comment_reviewed_by = $usr_id;
                    $review_sop_sugg_obj->reviewer_comments = $review_comments[$a];
                    $review_sop_sugg_obj->reviewed_date = $date_time;
                    $review_sop_sugg_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                }
                header("Location:?module=sop&action=view_sop&object_id=$sop_object_id");
            }
        }
    }

    if (!empty($sop_master->effective_date)) {
        $effective_date = get_modified_date_format($sop_master->effective_date);
    } else {
        $effective_date = "-";
    }
    if (!empty($sop_master->expiry_date)) {
        $expiry_date = get_modified_date_format($sop_master->expiry_date);
    } else {
        $expiry_date = "-";
    }
    $sop_received_suggestion_array = $sop_process->get_sop_suggestion_details($sop_object_id);
    $sop_history = $sop_process->get_sop_revision_history($sop_master->uname);
    $sop_pdf_sup_lang_list = getPdfSupportLang();

    //Formatlist
    $formatlist = $sop_process->get_formatlist($sop_object_id);
    //Annexurelist
    $annexurelist = $sop_process->get_annexurelist($sop_object_id);
    $status_details = $sop_process->get_all_workflow_actions($sop_object_id);
    $workflow_comparison_link = "index.php?module=sop&action=compare_workflow_sop&object_id=$sop_object_id";
    $version_comparison_link = "index.php?module=sop&action=compare_version_sop&object_id=$sop_object_id";
    //$dept_doc_view_details = get_doc_view_dept_details($sop_object_id, $sop_master->sop_plant);
    
    $monitroing_resp_per1_all = $sop_process->get_sop_monitoring_details($sop_object_id, null, null, null, '1', null);
    $monitroing_resp_per2_all = $sop_process->get_sop_monitoring_details($sop_object_id, null, null, null, '2', null);
    $monitroing_resp_per3_all = $sop_process->get_sop_monitoring_details($sop_object_id, null, null, null, '3', null);

    $smarty->assign("regobj", $sop_master);
    $smarty->assign("sop_type", getSopType($sop_master->sop_type));
    $smarty->assign("print_copy_list", $sop_process->get_sop_print_copy_list($usr_id, $sop_object_id));
    $smarty->assign("sop_no", $sop_no);
    $smarty->assign("sop_name", $sop_master->sop_name);
    $smarty->assign("sop_plant", getPlantName($sop_master->sop_plant));
    $smarty->assign("sop_revision", $sop_master->revision);
    $smarty->assign("sop_cc_no", $sop_master->cc_no);
    $smarty->assign("sop_capa_no", $sop_master->capa_no);
    $smarty->assign("sop_supersedes", $sop_master->supersedes);
    $smarty->assign("sop_effective_date", $effective_date);
    $smarty->assign("sop_expiry_date", $expiry_date);
    $smarty->assign("reason_for_revision", $reason_for_revision);
    $smarty->assign("published_status", $published_status);
    $smarty->assign("sop_created_year", $sop_master->created_year);
    $smarty->assign("sop_created_month", $sop_master->created_month);
    $smarty->assign("creator", getFullName($sop_master->created_by));
    $smarty->assign("creator_dept", getDeptName($sop_master->created_by));
    $smarty->assign("created_time", $sop_master->created_time);
    $smarty->assign("status_details", $status_details);
    $smarty->assign("is_sop_training_required", $is_sop_training_required);
    $smarty->assign("sop_training_details", $sop_training_details);
    if (!empty($sop_trainees_details)) {
        $smarty->assign("sop_trainees_details", $sop_trainees_details);
    }
    if (!empty($sop_nah_trainees_details)) {
        $smarty->assign("sop_nah_trainees_details", $sop_nah_trainees_details);
    }
    $smarty->assign('review_comments_array', $sop_process->get_doc_review_comments($sop_object_id, null, null));
    if (!empty($sop_master->lm_doc_id)) {
        $smarty->assign('lm_doc_id', $sop_master->lm_doc_id);
    }
    //if (!empty($deptlist)) {
    //$smarty->assign('deptlist', $deptlist);
    //}
    //if (!empty($plant_dept_list)) {
    $smarty->assign('plant_dept_list', $dept_doc_view_details);
    //}
    if (!empty($sop_remarks_array)) {
        $smarty->assign("sop_remarks_array", $sop_remarks_array);
    }
    if (!empty($sop_received_suggestion_array)) {
        $smarty->assign('sop_received_suggestion_array', $sop_received_suggestion_array);
    }
    if (!empty($sop_history)) {
        $smarty->assign("sop_history", $sop_history);
    }
    if (!empty($formatlist)) {
        $smarty->assign("formatlist", $formatlist);
    }
    if (!empty($annexurelist)) {
        $smarty->assign("annexurelist", $annexurelist);
    }
    if (!empty($sop_pdf_sup_lang_list)) {
        $smarty->assign("sop_pdf_sup_lang_list", $sop_pdf_sup_lang_list);
    }
    if (!empty($fileobjectarray)) {
        $smarty->assign("fileobjectarray", $fileobjectarray);
    }
    if (!empty($extend_details)) {
        $smarty->assign("extend_details", $extend_details);
    }
    if (!empty($dropped_details)) {
        $smarty->assign("dropped_details", $dropped_details);
    }
    if (!empty($cancelled_details)) {
        $smarty->assign("cancelled_details", $cancelled_details);
    }
    if (!empty($transferred_details)) {
        $smarty->assign("transferred_details", $transferred_details);
    }
    if (!empty($dept_doc_view_details)) {
        $smarty->assign("dept_doc_view_details", $dept_doc_view_details);
    }
    if (!empty($monitroing_resp_per1_all)) {
        $smarty->assign("monitroing_resp_per1_all", $monitroing_resp_per1_all);
    }
    if (!empty($monitroing_resp_per2_all)) {
        $smarty->assign("monitroing_resp_per2_all", $monitroing_resp_per2_all);
    }
    if (!empty($monitroing_resp_per3_all)) {
        $smarty->assign("monitroing_resp_per3_all", $monitroing_resp_per3_all);
    }
    $smarty->assign("usr_dept_id", $usr_dept_id);

    $smarty->assign("workflow_comparison_link", $workflow_comparison_link);
    $smarty->assign("version_comparison_link", $version_comparison_link);
    $smarty->assign("sop_download_history", $sop_process->get_sop_download_history_details($sop_object_id));
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_sop.sop.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
