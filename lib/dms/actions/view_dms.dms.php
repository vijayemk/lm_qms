<?php

/**
 * Project: Logicmind
 * File:view_dms.dms.php
 *
 * @author Sivaranjani S, Puneet
 * @since 06/03/2020
 * @package dms
 * @version 1.0
 * @see view_dms.dms.tpl
 * */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'dms_view', 'yes')) {
    $error_handler->raiseError("dms_view");
}

$usr_id = trim($_SESSION['user_id']);
$usr_plant_id = getUserPlantId($usr_id);
$usr_dept_id = getDeptId($usr_id);
$date_time = date('Y-m-d G:i:s');
$today_date = date('Y-m-d');

$dm_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$dm_master = new DB_Public_lm_dm_master();
if ($dm_master->get("dm_object_id", $dm_object_id)) {
    /** Department Restriction */
    if (!isDeptAccessRightsExist($dm_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    $dms_processor = new Dms_Processor();
    $doc_file_processor_object = new Doc_File_Processor();

    $dm_no = get_qms_doc_no("dms", $dm_object_id)['doc_no'];
    $lm_doc_id = $dm_master->lm_doc_id;
    $wf_status = $dm_master->wf_status;

    $creator = get_workflow_action_user($dm_object_id, 'create');
    $dept_approver = get_workflow_action_user($dm_object_id, 'dept_approve');
    $qa_reviewer = get_workflow_action_user($dm_object_id, 'qa_review');
    $qa_approver = get_workflow_action_user($dm_object_id, 'qa_approve');
    $trainer = get_workflow_action_user($dm_object_id, 'training');
    $latest_invest_details = (object) array_shift($dms_processor->get_investigation_details($dm_object_id, 'yes', null));
    $investigator = $latest_invest_details->investigated_by_id;

    $meeting_schedule = $dms_processor->get_dms_meeting_details($dm_object_id, null, 'yes');
    $meeting_attendee_details = $dms_processor->get_dms_meeting_attendee_details($dm_object_id, null);

    $at_data['Deviation No'] = array($dm_no, $dm_no, $dm_no . "\nlm_doc_id : $lm_doc_id");
    $lm_doc_name = getLmDocName($lm_doc_id);
    $lm_doc_short_name = getLmDocShortName($lm_doc_id);
    $mail_heading = "$lm_doc_name ($lm_doc_short_name)";
    $mail_link_btn = _URL_ . get_lm_json_value_by_key('definitions->url->dms->view_dms') . $dm_object_id;
    
    $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : $wf_status;

    $wf_remarks = (isset($_REQUEST['wf_remarks'])) ? $_REQUEST['wf_remarks'] : null;
    ($wf_remarks) ? addWorkflowRemarks($dm_object_id, $wf_remarks, $usr_id, $date_time) : false;

    
    //**** Start Of Status Created, Dept,QA Approval Need Correction**//
    if (($wf_status == "Created" || $wf_status == "Pending for Sending Department Head Approval" || $wf_status == "Department Head Approval Needs Correction") && $creator == $usr_id) {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Created", 'create') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            if ($wf_status == "Created" || $wf_status == "Department Head Approval Needs Correction") {
                $edit_option = true;
                $smarty->assign('edit_button', $edit_option);
                $smarty->assign('edit_attachment', true);
                $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
            }
            $cancel_button = true;
            $smarty->assign('cancel_button', $cancel_button);

            //**** Show pre Review / dept approval request**//
            if ($dms_processor->is_all_fields_in_edit_tab_completed_dev($dm_object_id)) {
                $smarty->assign('request_pre_review_dept_approve_button', true);

                //Request Pre view
                if (isset($_POST['request_pre_review'])) {
                    if ($dms_processor->update_dev_wf_status($dm_object_id, "Pre Review Pending")) {
                        $pre_review_to = (isset($_REQUEST['pre_review_to'])) ? $_REQUEST['pre_review_to'] : null;

                        delete_worklist($creator, $dm_object_id);
                        foreach ($pre_review_to as $to_user) {
                            add_worklist($to_user, $dm_object_id);
                            save_workflow($dm_object_id, $to_user, 'Pending', 'pre_review');

                            $pre_reviewer_at_n .= "\n\t\t\t" . getFullName($to_user);
                            $pre_reviewer_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);
                        }
                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for Pre Review | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for Your Pre Review";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($pre_review_to, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        //**** Audit Trail**//
                        $at_data['Pre Reviewer Details'] = array('NA', $pre_reviewer_at_n, $pre_reviewer_at_p);
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Pre Review Pending');
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }

                //**** Send Dept Approval**//
                if (isset($_POST['request_dept_approval'])) {
                    if ($dms_processor->update_dev_wf_status($dm_object_id, "Department Head Approval Pending")) {
                        $dept_approve_user = (isset($_REQUEST['dept_approve_user'])) ? $_REQUEST['dept_approve_user'] : null;

                        delete_workflow_action($dm_object_id, "Needs Correction", "dept_approve");
                        delete_worklist($creator, $dm_object_id);
                        add_worklist($dept_approve_user, $dm_object_id);
                        save_workflow($dm_object_id, $dept_approve_user, 'Pending', 'dept_approve');

                        //**** Send mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for Dept Head Approval | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for Your Approval";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($dept_approve_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                        //**** Audit Trail**//
                        $at_data['Dept Head Approver'] = array('NA', getFullName($dept_approve_user), $dept_approve_user . " - " . getFullName($dept_approve_user));
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Department Head Approval Pending');
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            } else {
                $smarty->assign('show_edit_error_msg', true);
            }
        }
    }

    //**** Pre Preview **//
    if ($wf_status == "Pre Review Pending") {
        if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'pre_review')) && check_user_in_worklist($dm_object_id, $usr_id)) {
            $smarty->assign('show_pre_review_button', true);

            if (isset($_POST['pre_reviewed'])) {
                $dm_review_comments = (isset($_REQUEST['review_comments'])) ? $_REQUEST['review_comments'] : null;
                if ($dms_processor->add_dms_review_comments($dm_object_id, $dm_review_comments, $usr_id, $date_time, $audit_trail_action, 'pre_review')) {
                    update_workflow($dm_object_id, $usr_id, 'Pre Reviewed', 'pre_review');
                    delete_worklist($usr_id, $dm_object_id);

                    //**** Audit Trail**//
                    $pre_reviewed_user = getFullName($usr_id);
                    $at_data['Pre Reviewed By'] = array($pre_reviewed_user, $pre_reviewed_user, "$usr_id - $pre_reviewed_user");
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Pre Reviewed');

                    if (is_action_finished($dm_object_id, "pre_review", "Pre Reviewed")) {
                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Sending Department Head Approval");
                        add_worklist($creator, $dm_object_id);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Pending for Sending Dept Head Approval | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pre Reviewed & Pending for Sending Dept Head Approval";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                } else {
                    $error_handler->raiseError("INSERT_REQUEST_FAILED");
                }
            }
        }

        //**** Start Of Recall Pre Review **//
        if (check_user_in_workflow($dm_object_id, $usr_id, "Created", 'create')) {
            $smarty->assign('recall_pre_review_button', true);

            $pre_review_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'pre_review', 'Pending');
            $smarty->assign('recall_from', 'Pre Review');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_add_option', true);
            $smarty->assign('recall_remove_option', true);
            $smarty->assign('recall_dept_users', true);
            $smarty->assign('recall_object_id', $dm_object_id);
            $smarty->assign('recall_pending_users_list', $pre_review_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'pre_review'), 'user_id'));

            //**** Add **//
            if (isset($_POST['recall_add'])) {
                $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                $add_count = 0;
                foreach ($recall_add_users_to as $to_user) {
                    if (is_user_in_workflow_action($dm_object_id, $to_user, 'pre_review') == false) {
                        add_worklist($to_user, $dm_object_id);
                        save_workflow($dm_object_id, $to_user, 'Pending', 'pre_review');

                        $pre_reviewer_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $pre_reviewer_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for Pre Review | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for Your Pre Review";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Reason" => $recall_reason,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        $add_count++;
                    }
                }
                if ($add_count > 0) {
                    //**** Audit Trail**//
                    $at_data[] = array('', "Reason : $recall_reason\nPre Reviewer Details : $pre_reviewer_at_n", $pre_reviewer_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Successfully Added');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //**** Remove **//
            if (isset($_POST['recall_remove'])) {
                $recall_remove_user_array = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recall_remove_user_array) {
                    foreach ($recall_remove_user_array as $recall_user) {
                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'pre_review')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "pre_review");

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $recall_pre_reviewer_at_n .= "\n\t\t\t" . $recall_user_name;
                            $recall_pre_reviewer_at_p .= "\n\t\t\t$recall_user - $recall_user_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from Pre Reviewer";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                    }
                    //**** Audit Trail**//
                    foreach ($pre_review_pending_userlist as $pre_review_pending_user) {
                        $recall_pre_reviewer_at_o .= "\n\t\t\t" . $pre_review_pending_user['user_name'];
                    }
                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                    $at_data[''] = array("Existing User List : $recall_pre_reviewer_at_o", "Recalled User List : $recall_pre_reviewer_at_n", $recall_pre_reviewer_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Recalled');
                }
                $check_pre_review_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'pre_review', 'Pending');
                if (count($check_pre_review_pending_userlist) == 0) {
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Sending Department Head Approval");
                    add_worklist($creator, $dm_object_id);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //**** Replace **//
            if (isset($_POST['recall_replace'])) {
                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($replacement_pending_user_array) {
                    $replacement_count = 1;
                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                        $recall_user = $replacement_pending_user_array[$i];
                        $replaced_by = $replacement_user_array[$i];

                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'pre_review')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "pre_review");

                            add_worklist($replaced_by, $dm_object_id);
                            save_workflow($dm_object_id, $replaced_by, 'Pending', 'pre_review');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail Recall user**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for Pre Review | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name is Pending for Your Pre Review";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from Pre Reviewer";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled From" => $recall_user_name,
                                "Replaced To" => $replaced_by_name,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            $replacement_count++;
                        }
                    }
                    if ($replacement_count != 1) {
                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //**** Start Of Dept Approval, Need correction **//
    if ($wf_status == "Department Head Approval Pending") {
        if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'dept_approve')) && check_user_in_worklist($dm_object_id, $usr_id)) {
            $smarty->assign('show_dept_approve_button', true);
            $add_file_attachemnt = true;
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
            $smarty->assign('file_attachment_towards', "general");

            if (isset($_POST['dept_approve_need_correction'])) {
                $dms_processor->update_dev_wf_status($dm_object_id, "Department Head Approval Needs Correction");
                update_workflow($dm_object_id, $usr_id, 'Needs Correction', 'dept_approve');
                delete_worklist($usr_id, $dm_object_id);
                add_worklist($creator, $dm_object_id);

                //**** Audit Trail**//
                $creator_name = getFullName($creator);
                $at_data['Sent To'] = array("NA", getFullName($creator), "$creator - $creator_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Department Head Approval Needs Correction');

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $dm_no | Needs Correction | [Action Required]";
                $actionDescription = "The $lm_doc_short_name Needs a Few Corrections";
                $mail_details = [
                    "Deviation No." => $dm_no,
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                ];
                send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['dept_approved'])) {
                $dm_review_comments = (isset($_REQUEST['review_comments'])) ? $_REQUEST['review_comments'] : null;
                if ($dms_processor->add_dms_review_comments($dm_object_id, $dm_review_comments, $usr_id, $date_time, $audit_trail_action, 'dept_approve')) {
                    update_workflow($dm_object_id, $usr_id, 'Approved', 'dept_approve');
                    delete_worklist($usr_id, $dm_object_id);
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Sending QA Review");
                    add_worklist($creator, $dm_object_id);

                    //**** Audit Trail**//
                    $at_data['Approved By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Pending for Sending QA Review');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Approved | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name is Approved By Dept Head & Pending for Sending QA Review";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Approved By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
        //****Recall Dept Approver**//
        if (check_user_in_workflow($dm_object_id, $usr_id, "Created", 'create') && check_user_in_workflow($dm_object_id, $dept_approver, "Pending", 'dept_approve')) {
            $smarty->assign('recall_dept_head_approve_button', true);

            $dept_approver_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'dept_approve', 'Pending');
            $smarty->assign('recall_from', 'Dept Head Approval');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'dept_approve');
            $smarty->assign('recall_object_id', $dm_object_id);
            $smarty->assign('recall_pending_users_list', $dept_approver_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'dept_approve'), 'user_id'));

            //**** Replace **//
            if (isset($_POST['recall_replace'])) {
                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($replacement_pending_user_array) {
                    $replacement_count = 1;
                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                        $recall_user = $replacement_pending_user_array[$i];
                        $replaced_by = $replacement_user_array[$i];

                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'dept_approve')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "dept_approve");

                            add_worklist($replaced_by, $dm_object_id);
                            save_workflow($dm_object_id, $replaced_by, 'Pending', 'dept_approve');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for Dept Head Approval | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name is Pending for Your Approval";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from Dept Head Approver";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled From" => $recall_user_name,
                                "Replaced To" => $replaced_by_name,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            $replacement_count++;
                        }
                    }
                    if ($replacement_count != 1) {
                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Send To QA Review**//
    if ($wf_status == "Pending for Sending QA Review" || $wf_status == "QA Review Needs Correction") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Created", 'create') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('request_qa_review_btn', true);
            $cancel_button = true;
            $smarty->assign('cancel_button', $cancel_button);

            if ($wf_status == "QA Review Needs Correction") {
                $edit_option = true;
                $add_file_attachemnt = true;

                $smarty->assign('edit_button', true);
                $smarty->assign('edit_attachment', $add_file_attachemnt);
                $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
                $smarty->assign('file_attachment_towards', "general");
            }

            if (isset($_POST['request_qa_review'])) {
                if ($dms_processor->update_dev_wf_status($dm_object_id, "Pending for QA Review")) {
                    $qa_review_user = (isset($_REQUEST['qa_review_user'])) ? $_REQUEST['qa_review_user'] : null;

                    delete_workflow_action($dm_object_id, "Needs Correction", "qa_review");
                    delete_worklist($creator, $dm_object_id);
                    add_worklist($qa_review_user, $dm_object_id);
                    save_workflow($dm_object_id, $qa_review_user, 'Pending', 'qa_review');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Request for QA Review | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name is Pending for QA Review";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($qa_review_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                    //**** Audit Trail**//
                    $at_data['QA Reviewer'] = array('NA', getFullName($qa_review_user), $qa_review_user . " - " . getFullName($qa_review_user));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'QA Review Pending');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    if ($wf_status == "Pending for QA Review") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'qa_review') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('show_qa_review_btn', true);
            $smarty->assign('repetitive_dms_list_edit', $dms_processor->get_dev_repetitive_dms_for_edit($dm_object_id));
            $add_file_attachemnt = true;
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
            $smarty->assign('file_attachment_towards', "general");

            //**** QA Review Need Correction**//
            if (isset($_POST['qa_review_need_correction'])) {
                $dms_processor->update_dev_wf_status($dm_object_id, "QA Review Needs Correction");
                update_workflow($dm_object_id, $usr_id, 'Needs Correction', 'qa_review');
                delete_worklist($usr_id, $dm_object_id);
                add_worklist($creator, $dm_object_id);

                //**** Audit Trail**//
                $creator_name = getFullName($creator);
                $at_data['Sent To'] = array("NA", getFullName($creator), "$creator - $creator_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'QA Review Needs Correction');

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $dm_no | Needs Correction | [Action Required]";
                $actionDescription = "The $lm_doc_short_name Needs a Few Corrections";
                $mail_details = [
                    "Deviation No." => $dm_no,
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                ];
                send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //**** QA Review**//
            if (isset($_POST['qa_reviewed'])) {
                $qa_review_comments = (isset($_REQUEST['qa_review_comments'])) ? $_REQUEST['qa_review_comments'] : null;
                if ($dms_processor->add_dms_review_comments($dm_object_id, $qa_review_comments, $usr_id, $date_time, $audit_trail_action, 'qa_review')) {
                    update_workflow($dm_object_id, $usr_id, 'Reviewed', 'qa_review');
                    delete_worklist($usr_id, $dm_object_id);

                    //**** Audit Trail**//
                    $at_data['Reviewed By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'QA Reviewed');

                    if (is_action_finished($dm_object_id, "qa_review", "Reviewed")) {
                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Sending CFT Assessment");
                        add_worklist($qa_reviewer, $dm_object_id);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Pending for Sending CFT Assessment | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Reviewed by QA & Pending for Sending CFT Assessment";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Reviewed By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }
        //****Recall QA Reviewer**//
        if (check_user_in_workflow($dm_object_id, $usr_id, "Created", 'create') && check_user_in_workflow($dm_object_id, $qa_reviewer, "Pending", 'qa_review')) {
            $smarty->assign('recall_qa_reviewer_btn', true);

            $qa_reviewer_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'qa_review', 'Pending');
            $smarty->assign('recall_from', 'QA Review');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qa_review');
            $smarty->assign('recall_object_id', $dm_object_id);
            $smarty->assign('recall_pending_users_list', $qa_reviewer_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'qa_review'), 'user_id'));

            //**** Replace **//
            if (isset($_POST['recall_replace'])) {
                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($replacement_pending_user_array) {
                    $replacement_count = 1;
                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                        $recall_user = $replacement_pending_user_array[$i];
                        $replaced_by = $replacement_user_array[$i];

                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'qa_review')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "qa_review");

                            add_worklist($replaced_by, $dm_object_id);
                            save_workflow($dm_object_id, $replaced_by, 'Pending', 'qa_review');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for QA Review | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name is Pending for QA Review";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from QA Reviewer";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled From" => $recall_user_name,
                                "Replaced To" => $replaced_by_name,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            $replacement_count++;
                        }
                    }
                    if ($replacement_count != 1) {
                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Send To CFT Assessment**//
    if ($wf_status == "Pending for Sending CFT Assessment") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Reviewed", 'qa_review') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('request_cft_assessment_btn', true);

            if (isset($_POST['request_cft_assessment'])) {
                if ($dms_processor->update_dev_wf_status($dm_object_id, "Pending for CFT Assessment")) {
                    $cft_users_to = (isset($_REQUEST['cft_users_to'])) ? $_REQUEST['cft_users_to'] : null;

                    delete_worklist($usr_id, $dm_object_id);
                    foreach ($cft_users_to as $to_user) {
                        add_worklist($to_user, $dm_object_id);
                        save_workflow($dm_object_id, $to_user, 'Pending', 'cft_assessment');

                        $cft_assessor_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $cft_assessor_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for CFT Assessment | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for CFT Assessment";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }

                    //**** Audit Trail**//
                    $at_data['CFT Assessor Details'] = array('NA', $cft_assessor_at_n, $cft_assessor_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'CFT Assessment Pending');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****CFT Assessment**//
    if ($wf_status == "Pending for CFT Assessment") {
        if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'cft_assessment')) && check_user_in_worklist($dm_object_id, $usr_id)) {
            $smarty->assign('show_cft_assessment_button', true);

            //****CFT Review**//
            if (isset($_POST['cft_assesed'])) {
                $cft_comments = (isset($_REQUEST['cft_comments'])) ? $_REQUEST['cft_comments'] : null;
                if ($dms_processor->add_dms_review_comments($dm_object_id, $cft_comments, $usr_id, $date_time, $audit_trail_action, 'cft_assessment')) {
                    update_workflow($dm_object_id, $usr_id, 'Assessed', 'cft_assessment');
                    delete_worklist($usr_id, $dm_object_id);

                    //**** Audit Trail**//
                    $cft_user = getFullName($usr_id);
                    $at_data['Assessed By'] = array($cft_user, $cft_user, "$usr_id - $cft_user");
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Assesed');

                    if (is_action_finished($dm_object_id, "cft_assessment", "Assessed")) {
                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending Decision on Investigation");
                        add_worklist($qa_reviewer, $dm_object_id);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Pending Decision on Investigation | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Assessed & Pending Decision on Investigation";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($qa_reviewer, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                } else {
                    $error_handler->raiseError("INSERT_REQUEST_FAILED");
                }
            }
        }

        //**** Recall CFT **//  
        if (check_user_in_workflow($dm_object_id, $usr_id, "Reviewed", 'qa_review')) {
            $smarty->assign('recall_cft_button', true);

            $cft_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'cft_assessment', 'Pending');
            $smarty->assign('recall_from', 'CFT Assessment');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_add_option', true);
            $smarty->assign('recall_remove_option', true);
            $smarty->assign('recall_dept_users', true);
            $smarty->assign('recall_object_id', $dm_object_id);
            $smarty->assign('recall_pending_users_list', $cft_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'cft_assessment'), 'user_id'));

            //**** Add **//
            if (isset($_POST['recall_add'])) {
                $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                $add_count = 0;
                foreach ($recall_add_users_to as $to_user) {
                    if (is_user_in_workflow_action($dm_object_id, $to_user, 'cft_assessment') == false) {
                        add_worklist($to_user, $dm_object_id);
                        save_workflow($dm_object_id, $to_user, 'Pending', 'cft_assessment');

                        $cft_assessor_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $cft_assessor_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for CFT Assessment | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for CFT Assessment";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        $add_count++;
                    }
                }
                if ($add_count > 0) {
                    //**** Audit Trail**//
                    $at_data[] = array('', "Reason : $recall_reason\nCFT Assessor Details : $cft_assessor_at_n", $cft_assessor_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Successfully Added');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //**** Remove **//
            if (isset($_POST['recall_remove'])) {
                $recall_remove_user_array = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recall_remove_user_array) {
                    foreach ($recall_remove_user_array as $recall_user) {
                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'cft_assessment')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "cft_assessment");

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $recall_cft_assessor_at_n .= "\n\t\t\t" . $recall_user_name;
                            $recall_cft_assessor_at_p .= "\n\t\t\t$recall_user - $recall_user_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from CFT Assessor";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                    }
                    //**** Audit Trail**//
                    foreach ($cft_pending_userlist as $cft_pending_user) {
                        $recall_cft_assessor_at_o .= "\n\t\t\t" . $cft_pending_user['user_name'];
                    }
                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                    $at_data[''] = array("Existing User List : $recall_cft_assessor_at_o", "Recalled User List : $recall_cft_assessor_at_n", $recall_cft_assessor_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Recalled');
                }
                $check_cft_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'cft_assessment', 'Pending');
                if (count($check_cft_pending_userlist) == 0) {
                    if (is_action_finished($dm_object_id, "cft_assessment", "Assessed")) {
                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending Decision on Investigation");
                    } else {
                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Sending CFT Assessment");
                    }
                    add_worklist($qa_reviewer, $dm_object_id);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //**** Replace **//
            if (isset($_POST['recall_replace'])) {
                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($replacement_pending_user_array) {
                    $replacement_count = 1;
                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                        $recall_user = $replacement_pending_user_array[$i];
                        $replaced_by = $replacement_user_array[$i];

                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'cft_assessment')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "cft_assessment");

                            add_worklist($replaced_by, $dm_object_id);
                            save_workflow($dm_object_id, $replaced_by, 'Pending', 'cft_assessment');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail Recall user**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for CFT Assessment | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name is Pending for CFT Assessment";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from CFT Assessor";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled From" => $recall_user_name,
                                "Replaced To" => $replaced_by_name,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            $replacement_count++;
                        }
                    }
                    if ($replacement_count != 1) {
                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Send To Investigation**//
    if ($wf_status == "Pending Decision on Investigation") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Reviewed", 'qa_review') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('request_invest_qa_approval_btn', true);

            //****Is Investigation Required**//
            if (isset($_POST['investigation_required'])) {
                if ($dms_processor->update_dms_details($dm_object_id, array("udev_investigation" => "yes", 'audit_trail_action' => $_POST['audit_trail_action']))) {
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Assigning Investigator");
                    delete_worklist($usr_id, $dm_object_id);
                    save_workflow($dm_object_id, $dept_approver, 'Pending', 'to_assign_investigator');
                    add_worklist($dept_approver, $dm_object_id);

                    $dept_approver_at_n .= "\n\t\t\t" . getFullName($dept_approver);
                    $dept_approver_at_P .= "\n\t\t\t" . $dept_approver . " - " . getFullName($dept_approver);

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Pending for Assigning Investigator | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name is Pending for Assigning Investigator";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($dept_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                    //**** Audit Trail**//
                    $at_data[] = array('', "Dept Head Approver : $dept_approver_at_n", $dept_approver_at_P);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Investigator Assignment Pending');
                } else {
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //****Is Investigation Not Required**//
            if (isset($_POST['request_qa_approval'])) {
                if ($dms_processor->update_dms_details($dm_object_id, array("udev_investigation" => "no", 'audit_trail_action' => $_POST['audit_trail_action']))) {
                    $request_qa_approval = true;
                }
            }
        }
    }

    //****Send To Investigator**//
    if ($wf_status == "Pending for Assigning Investigator") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'dept_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('assign_investgator_btn', true);

            if (isset($_POST['assign_investigator'])) {
                if ($dms_processor->update_dev_wf_status($dm_object_id, "Pending for Investigation")) {
                    $invest_user = (isset($_REQUEST['responsible_person'])) ? $_REQUEST['responsible_person'] : null;
                    $invest_target_date = (isset($_REQUEST['invest_target_date'])) ? $_REQUEST['invest_target_date'] : null;
                    $investigation_details = (isset($_REQUEST['investigation_details'])) ? $_REQUEST['investigation_details'] : null;

                    $dms_processor->add_dms_investigation_details($dm_object_id, $invest_user, $investigation_details, $invest_target_date, 'First Time', '', $usr_id, $date_time);
                    delete_worklist($usr_id, $dm_object_id);
                    update_workflow($dm_object_id, $usr_id, 'Assigned', 'to_assign_investigator');
                    add_worklist($invest_user, $dm_object_id);
                    save_workflow($dm_object_id, $invest_user, 'Pending', 'investigation');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Pending for Investigation | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name is Pending for Investigation";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Details" => $investigation_details,
                        "Taget Date" => display_date_format($invest_target_date),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($invest_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                    //**** Audit Trail**//
                    $at_data['Investigator'] = array('NA', getFullName($invest_user), $invest_user . " - " . getFullName($invest_user));
                    $at_data['Target Date'] = array('NA', $invest_target_date, $invest_target_date);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Investigation Pending');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Investigation Feedback**//
    if ($wf_status == "Pending for Investigation" || $wf_status == "Investigation Review Needs Correction") {
        if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'investigation') || check_user_in_workflow($dm_object_id, $usr_id, "Needs Correction", 'investigation')) && (check_user_in_worklist($dm_object_id, $usr_id)) && $dms_processor->is_investigation_feedback_elegible_to_edit($dm_object_id, $usr_id)) {
            $smarty->assign('investigation_feedback_btn', true);
            $add_file_attachemnt = true;
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
            $smarty->assign('file_attachment_towards', "investigation");

            if (isset($_POST['investigation_completed'])) {
                $uinst_investigation_feedback = (isset($_REQUEST['uinst_investigation_feedback'])) ? $_REQUEST['uinst_investigation_feedback'] : null;
                $uinst_root_cause = (isset($_REQUEST['uinst_root_cause'])) ? $_REQUEST['uinst_root_cause'] : null;

                if ($dms_processor->update_dm_investigation_feedback($latest_invest_details->object_id, $uinst_investigation_feedback, $uinst_root_cause)) {
                    update_workflow($dm_object_id, $usr_id, 'Done', 'investigation');
                    delete_worklist($usr_id, $dm_object_id);
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Investigation Review");
                    add_worklist($dept_approver, $dm_object_id);

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Pending Review of the Investigation | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name is Pending for Investigation Review";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($dept_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                    //**** Audit Trail**//
                    $at_data[] = array('Feedback : NA', "Feedback : $uinst_investigation_feedback\nProbable Root Cause : $uinst_root_cause", $dept_approver . " - " . getFullName($dept_approver));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Department Head Approval Pending');
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }

        //****Investigation Target Date Extension**//
        if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'investigation') || check_user_in_workflow($dm_object_id, $usr_id, "Needs Correction", 'investigation')) && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('request_investigation_extension_btn', true);
            ($dms_processor->is_investigation_feedback_elegible_to_edit($dm_object_id, $usr_id) == false) ? $smarty->assign('show_overdue_msg_notifi', true) : null;
            $smarty->assign('extension_for', "INVESTIGATION");
            $smarty->assign('existing_target_date', $latest_invest_details->target_date1);

            if (isset($_POST['extension_requested'])) {
                $exisiting_target_date = (isset($_REQUEST['exisiting_target_date'])) ? $_REQUEST['exisiting_target_date'] : null;
                $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                $extension_reason = (isset($_REQUEST['extension_reason'])) ? $_REQUEST['extension_reason'] : null;

                if (add_extension_details($dm_object_id, $latest_invest_details->object_id, $exisiting_target_date, $proposed_target_date, "Investigation", $extension_reason, "Investigation - Extension Requested", $dept_approver, $wf_status, $usr_id, $date_time)) {
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending Extension of Investigation Target Date");
                    update_workflow($dm_object_id, $usr_id, 'Extension Requested', 'investigation');
                    delete_worklist($usr_id, $dm_object_id);
                    add_worklist($dept_approver, $dm_object_id);

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Request for Extending Investigation Target Date | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name Requires Extension for the Investigation Target Date";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Extension for" => "INVESTIGATION",
                        "Existing Target Date" => display_date_format($exisiting_target_date),
                        "Proposed Target Date" => display_date_format($proposed_target_date),
                        "Reason" => $extension_reason,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($dept_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }

        //****Recall investigation**//
        if (check_user_in_workflow($dm_object_id, $usr_id, "Assigned", 'to_assign_investigator') && check_user_in_workflow($dm_object_id, $investigator, "Pending", 'investigation')) {
            $smarty->assign('recall_investigator_button', true);

            if (isset($_POST['recall_investigator'])) {
                $invest_user = (isset($_REQUEST['responsible_person'])) ? $_REQUEST['responsible_person'] : null;
                $invest_target_date = (isset($_REQUEST['invest_target_date'])) ? $_REQUEST['invest_target_date'] : null;
                $investigation_details = (isset($_REQUEST['investigation_details'])) ? $_REQUEST['investigation_details'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($dms_processor->add_dms_investigation_details($dm_object_id, $invest_user, $investigation_details, $invest_target_date, $recall_reason, "Recalled", $usr_id, $date_time)) {
                    delete_worklist($investigator, $dm_object_id);
                    delete_workflow_action($dm_object_id, "Pending", "investigation");
                    add_worklist($invest_user, $dm_object_id);
                    save_workflow($dm_object_id, $invest_user, 'Pending', 'investigation');

                    //**** Audit Trail**//
                    $old_investigator = getFullName($investigator);
                    $new_investigator = getFullName($invest_user);
                    $recall_qa_reviewer_at_p = "Existing User : $investigator - $old_investigator\nNew User : $invest_user - $new_investigator";
                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                    $at_data[] = array("Existing User : $old_investigator", "Replaced User : $new_investigator", $recall_qa_reviewer_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Recalled and Replaced');

                    //**** Send Mail to Recalled Person**//
                    $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                    $actionDescription = "The $lm_doc_short_name is Recalled from Investigator";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Reason for Recall" => $recall_reason,
                        "Recalled By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($investigator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }

    //***Extension of Investigation Targat Date Approval***/-
    if ($wf_status == "Pending Extension of Investigation Target Date") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'dept_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('investigation_extension_approval_btn', true);
            $smarty->assign('pending_extension_details', get_extension_details(null, $dm_object_id, 'Investigation', "Pending"));

            if (isset($_POST['extension_approval'])) {
                $extension_approval_type = (isset($_REQUEST['extension_approval_type'])) ? $_REQUEST['extension_approval_type'] : null;
                $extension_object_id = (isset($_REQUEST['extension_object_id'])) ? $_REQUEST['extension_object_id'] : null;
                $extension_for = (isset($_REQUEST['extension_for'])) ? $_REQUEST['extension_for'] : null;
                $ref_object_id1 = (isset($_REQUEST['ref_object_id1'])) ? $_REQUEST['ref_object_id1'] : null;
                $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                $extension_approval_comments = (isset($_REQUEST['extension_approval_comments'])) ? $_REQUEST['extension_approval_comments'] : null;
                $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;

                if (accept_reject_extension_details($extension_object_id, $dm_object_id, $extension_approval_type, $extension_approval_comments, "Investigation - Pending", $usr_id, $date_time, $audit_trail_action)) {
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Investigation");
                    update_workflow($dm_object_id, $investigator, 'Pending', 'investigation');
                    delete_worklist($usr_id, $dm_object_id);
                    add_worklist($investigator, $dm_object_id);

                    if ($extension_approval_type == "Accepted") {
                        $dms_processor->update_dm_investigation_target_date($ref_object_id1, $proposed_target_date);
                    }
                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Investigation Target Date Extension - $extension_approval_type | [Info Mail]";
                    $actionDescription = "The $lm_doc_short_name  Extension Request is $extension_approval_type";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Extension for" => $extension_for,
                        "Approval Status" => $extension_approval_type,
                        "Remarks" => $extension_approval_comments,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($investigator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }

    //**** Start Of Pending Sending Investigation **//
    if ($wf_status == "Pending for Investigation Review") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'dept_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('show_investigation_review', true);

            //**** Dept Head Reviewed**//
            if (isset($_POST['invest_reviewed'])) {
                $uinst_dept_head_review = (isset($_REQUEST['uinst_dept_head_review'])) ? $_REQUEST['uinst_dept_head_review'] : null;
                if ($dms_processor->update_dm_investigation_dept_head_review($latest_invest_details->object_id, $uinst_dept_head_review, $usr_id, $date_time)) {
                    delete_worklist($usr_id, $dm_object_id);
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Investigation Verification");
                    add_worklist($qa_reviewer, $dm_object_id);

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Pending for Investigation Verification | [Action Required]";
                    $actionDescription = "The $lm_doc_short_name Investigation Reviewed & Pending for Verification";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($qa_reviewer, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                    //**** Audit Trail**//
                    $at_data[] = array('Review : NA', "Review : $uinst_dept_head_review", $dept_approver . " - " . getFullName($dept_approver));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Pending for Investigation Verification');
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }

            //**** Need Correction**//
            if (isset($_POST['invest_review_need_correction'])) {
                delete_worklist($usr_id, $dm_object_id);
                $dms_processor->update_dev_wf_status($dm_object_id, "Investigation Review Needs Correction");
                update_workflow($dm_object_id, $investigator, 'Needs Correction', 'investigation');
                add_worklist($investigator, $dm_object_id);

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $dm_no | Needs Correction | [Action Required]";
                $actionDescription = "The $lm_doc_short_name Needs a Few Corrections";
                $mail_details = [
                    "Deviation No." => $dm_no,
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                ];
                send_workflow_mail($investigator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                //**** Audit Trail**//
                $investigator_name = getFullName($investigator);
                $at_data['Sent To'] = array($investigator_name, $investigator_name, "$investigator - $investigator_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Investigation Review Needs Correction');
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //**** Start Of Pending Investigation Approval **//
    if ($wf_status == "Pending for Investigation Verification") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Reviewed", 'qa_review') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $smarty->assign('show_investigation_verification', true);

            //**** Investigation Verification & Send To QA Approval**//
            if (isset($_POST['request_qa_approval'])) {
                $uinst_qa_reviewer_review = (isset($_REQUEST['uinst_qa_reviewer_review'])) ? $_REQUEST['uinst_qa_reviewer_review'] : null;
                if ($dms_processor->update_dm_investigation_qa_review($latest_invest_details->object_id, $uinst_qa_reviewer_review, $usr_id, $date_time)) {
                    //**** Audit Trail**//
                    $at_data[] = array('Verification Comments : NA', "Verification Comments : $uinst_qa_reviewer_review", $usr_id . " - " . getFullName($usr_id));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Investigation Verified');
                    $request_qa_approval = true;
                }
            }
        }
    }

    //****Send To QA Approval**//
    if ($wf_status == "QA Approval Needs Correction") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Created", 'create') && (check_user_in_worklist($dm_object_id, $usr_id))) {
            $request_qa_approval = true;
            $add_file_attachemnt = true;
            $edit_option = true;
            $cancel_button = true;
            $smarty->assign('cancel_button', $cancel_button);

            $smarty->assign('request_qa_approve_button', true);
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
            $smarty->assign('edit_button', $edit_option);
            $smarty->assign('file_attachment_towards', "general");
        }
    }

    if (isset($_POST['request_qa_approval']) && $request_qa_approval) {
        if ($dms_processor->update_dev_wf_status($dm_object_id, "Pending for QA Approval")) {
            $qa_approver_user = (isset($_REQUEST['qa_approver_user'])) ? $_REQUEST['qa_approver_user'] : null;

            delete_workflow_action($dm_object_id, "Needs Correction", "qa_approve");
            delete_worklist($usr_id, $dm_object_id);
            add_worklist($qa_approver_user, $dm_object_id);
            save_workflow($dm_object_id, $qa_approver_user, 'Pending', 'qa_approve');

            //**** Send Mail**//
            $subject = "$lm_doc_short_name | $dm_no | Request for QA Approval | [Action Required]";
            $actionDescription = "The $lm_doc_short_name is Pending for QA Approval";
            $mail_details = [
                "Deviation No." => $dm_no,
                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                "Sent By" => $_SESSION['full_name']
            ];
            send_workflow_mail($qa_approver_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

            //**** Audit Trail**//
            $at_data['QA Approver'] = array('NA', getFullName($qa_approver_user), $qa_approver_user . " - " . getFullName($qa_approver_user));
            addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'QA Approval Pending');
        }
        header("Location:$_SERVER[REQUEST_URI]");
    }

    //****Start Of QA Approval**//
    if ($wf_status == "Pending for QA Approval") {
        if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'qa_approve') && check_user_in_worklist($dm_object_id, $usr_id)) {
            $smarty->assign('show_qa_approve_button', true);

            $smarty->assign('disable_pre_approve_btn', is_action_finished($dm_object_id, 'pre_approve', 'Approved'));
            $smarty->assign('classification_list', getClassificationMasterList(null, null, 'yes'));
            $smarty->assign('dev_type_list_master', getDevTypeMasterDetailsList(null, null, 'yes'));
            $smarty->assign('dev_realted_to_list_edit', $dms_processor->get_dev_related_to_list_for_edit($dm_object_id));
            $smarty->assign('review_comments', $dms_processor->get_deviation_mgmt_review_comments($dm_object_id, null, null));

            //****QA Approval Need Correction**//
            if (isset($_POST['qa_approval_need_correction'])) {
                $dms_processor->update_dev_wf_status($dm_object_id, "QA Approval Needs Correction");
                update_workflow($dm_object_id, $usr_id, 'Needs Correction', 'qa_approve');
                delete_worklist($usr_id, $dm_object_id);
                add_worklist($creator, $dm_object_id);

                //**** Audit Trail**//
                $creator_name = getFullName($creator);
                $at_data['Sent To'] = array("NA", getFullName($creator), "$creator - $creator_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'QA Approval Needs Correction');

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $dm_no | Needs Correction | [Action Required]";
                $actionDescription = "The $lm_doc_short_name Needs a Few Corrections";
                $mail_details = [
                    "Deviation No." => $dm_no,
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                ];
                send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //****Send to Pre Approval**//
            if (isset($_POST['request_pre_approve'])) {
                if ($dms_processor->update_dev_wf_status($dm_object_id, "Pending for Pre Approval")) {
                    $pre_approval_to = (isset($_REQUEST['pre_approval_to'])) ? $_REQUEST['pre_approval_to'] : null;

                    delete_worklist($usr_id, $dm_object_id);
                    update_workflow($dm_object_id, $qa_approver, 'Pre Approval Requested', 'qa_approve');
                    foreach ($pre_approval_to as $to_user) {
                        add_worklist($to_user, $dm_object_id);
                        save_workflow($dm_object_id, $to_user, 'Pending', 'pre_approve');

                        $pre_approver_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $pre_approver_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for Pre Approval | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for Your Pre Approval";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }
                    //**** Audit Trail**//
                    $at_data['Pre Approver Details'] = array("NA", $pre_approver_at_n, $pre_approver_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Pre Approval Pending');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //****QA Accepted**//
            if (isset($_POST['qa_accepted'])) {
                if ($dms_processor->update_dms_details($dm_object_id, data_null_validator($_POST))) {
                    $dms_processor->update_dev_approval_status($dm_object_id, "Accepted");
                    update_workflow($dm_object_id, $usr_id, 'Approved', 'qa_approve');
                    delete_worklist($usr_id, $dm_object_id);

                    //**** Audit Trail**//
                    $at_data['Approved By'] = array('NA', getFullName($qa_approver), $qa_approver . " - " . getFullName($qa_approver));
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'QA Approved');

                    $dms_processor->decide_meeting_training_task($dm_object_id, $creator, $qa_approver, $mail_heading, $mail_link_btn);

                    $meeting_date = ($_POST['udev_meeting_date']) ? $_POST['udev_meeting_date'] : "NA";
                    $training_date = ($_POST['udev_training_date']) ? $_POST['udev_training_date'] : "NA";
                    $exam_date = ($_POST['udev_exam_date']) ? $_POST['udev_exam_date'] : "NA";
                    $task_date = ($_POST['udev_task_date']) ? $_POST['udev_task_date'] : "NA";

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Approved | [Info Mail]";
                    $actionDescription = "The $lm_doc_short_name is Approver by QA";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Meeting Target Date" => display_date_format($meeting_date),
                        "Training Target Date" => display_date_format($training_date),
                        "Exam Target Date" => display_date_format($exam_date),
                        "Task Target Date" => display_date_format($task_date),
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Approved By" => $_SESSION['full_name']
                    ];
                    $workflow_userslist = get_all_workflow_users_list($dm_object_id);
                    send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                } else {
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
            }
            //****QA Rejected**//
            if (isset($_POST['qa_rejected'])) {
                $reject_reason = (isset($_REQUEST['udev_reject_reason'])) ? $_REQUEST['udev_reject_reason'] : null;

                if ($dms_processor->update_dms_closeout($dm_object_id, "Rejected", "Closed", "Rejected", $reject_reason, $date_time)) {
                    update_workflow($dm_object_id, $usr_id, 'Rejected', 'qa_approve');
                    delete_all_worklist($dm_object_id);

                    //**** Audit Trail**//
                    $at_data['Reason'] = array('NA', $reject_reason, $reject_reason);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Rejected');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Rejected | [Info Mail]";
                    $actionDescription = "The $lm_doc_short_name is Rejected by QA Approver";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Reason" => $reject_reason,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Rejected By" => $_SESSION['full_name']
                    ];
                    $workflow_userslist = get_all_workflow_users_list($dm_object_id);
                    send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                } else {
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
            }
        }
        //****Recall QA Approver**//
        if (check_user_in_workflow($dm_object_id, $usr_id, "Reviewed", 'qa_review') && check_user_in_workflow($dm_object_id, $qa_approver, "Pending", 'qa_approve')) {
            $smarty->assign('recall_qa_approver_btn', true);

            $qa_approver_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'qa_approve', 'Pending');
            $smarty->assign('recall_from', 'QA Approval');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qa_approve');
            $smarty->assign('recall_object_id', $dm_object_id);
            $smarty->assign('recall_pending_users_list', $qa_approver_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'qa_approve'), 'user_id'));

            //**** Replace **//
            if (isset($_POST['recall_replace'])) {
                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($replacement_pending_user_array) {
                    $replacement_count = 1;
                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                        $recall_user = $replacement_pending_user_array[$i];
                        $replaced_by = $replacement_user_array[$i];

                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'qa_approve')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "qa_approve");

                            add_worklist($replaced_by, $dm_object_id);
                            save_workflow($dm_object_id, $replaced_by, 'Pending', 'qa_approve');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for QA Approval | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name is Pending for QA Approval";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from QA Approver";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled From" => $recall_user_name,
                                "Replaced To" => $replaced_by_name,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            $replacement_count++;
                        }
                    }
                    if ($replacement_count != 1) {
                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //**** Pre Approval **//
    if ($wf_status == "Pending for Pre Approval") {
        if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'pre_approve')) && check_user_in_worklist($dm_object_id, $usr_id)) {
            $smarty->assign('show_pre_approve_button', true);

            //**** Pre Approved**//
            if (isset($_POST['pre_approved'])) {
                $dm_review_comments = (isset($_REQUEST['pre_approve_comments'])) ? $_REQUEST['pre_approve_comments'] : null;
                if ($dms_processor->add_dms_review_comments($dm_object_id, $dm_review_comments, $usr_id, $date_time, $audit_trail_action, 'pre_approve')) {
                    update_workflow($dm_object_id, $usr_id, 'Approved', 'pre_approve');
                    delete_worklist($usr_id, $dm_object_id);

                    //**** Audit Trail**//
                    $pre_approver_name = getFullName($usr_id);
                    $at_data['Pre Approved By'] = array($pre_approver_name, $pre_approver_name, "$usr_id - $pre_approver_name");
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Pre Approved');

                    if (is_action_finished($dm_object_id, "pre_approve", "Approved")) {
                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending for QA Approval");
                        add_worklist($qa_approver, $dm_object_id);
                        update_workflow($dm_object_id, $qa_approver, 'Pending', 'qa_approve');

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Pending for QA Approval | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pre Approved & Pending for QA Approval";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }

        //****Recall Pre Approval**//
        if (check_user_in_workflow($dm_object_id, $usr_id, "Pre Approval Requested", 'qa_approve')) {
            $smarty->assign('recall_pre_approve_btn', true);

            $pre_approver_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'pre_approve', 'Pending');
            $smarty->assign('recall_from', 'Pre Approval');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_add_option', true);
            $smarty->assign('recall_remove_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'pre_approve');
            $smarty->assign('recall_object_id', $dm_object_id);
            $smarty->assign('recall_pending_users_list', $pre_approver_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'pre_approve'), 'user_id'));

            //**** Add **//
            if (isset($_POST['recall_add'])) {
                $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                $add_count = 0;
                foreach ($recall_add_users_to as $to_user) {
                    if (is_user_in_workflow_action($dm_object_id, $to_user, 'pre_approve') == false) {
                        add_worklist($to_user, $dm_object_id);
                        save_workflow($dm_object_id, $to_user, 'Pending', 'pre_approve');

                        $pre_approver_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $pre_approver_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $dm_no | Request for Pre Approval | [Action Required]";
                        $actionDescription = "The $lm_doc_short_name is Pending for Your Pre Approval";
                        $mail_details = [
                            "Deviation No." => $dm_no,
                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        $add_count++;
                    }
                }
                if ($add_count > 0) {
                    //**** Audit Trail**//
                    $at_data[] = array('', "Reason : $recall_reason\nPre Approver Details : $pre_approver_at_n", $pre_approver_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Successfully Added');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //**** Remove **//
            if (isset($_POST['recall_remove'])) {
                $recall_remove_user_array = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recall_remove_user_array) {
                    foreach ($recall_remove_user_array as $recall_user) {
                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'pre_approve')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "pre_approve");

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $recall_pre_approver_at_n .= "\n\t\t\t" . $recall_user_name;
                            $recall_pre_approver_at_p .= "\n\t\t\t$recall_user - $recall_user_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from Pre Approval";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                    }
                    //**** Audit Trail**//
                    foreach ($pre_approver_pending_userlist as $pre_approve_pending_user) {
                        $recall_pre_approver_at_o .= "\n\t\t\t" . $pre_approve_pending_user['user_name'];
                    }
                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                    $at_data[''] = array("Existing User List : $recall_pre_approver_at_o", "Recalled User List : $recall_pre_approver_at_n", $recall_pre_approver_at_p);
                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Recalled');
                }
                $check_pre_approve_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'pre_approve', 'Pending');
                if (count($check_pre_approve_pending_userlist) == 0) {
                    $dms_processor->update_dev_wf_status($dm_object_id, "Pending for QA Approval");
                    update_workflow($dm_object_id, $qa_approver, 'Pending', 'qa_approve');
                    add_worklist($qa_approver, $dm_object_id);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //**** Replace **//
            if (isset($_POST['recall_replace'])) {
                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($replacement_pending_user_array) {
                    $replacement_count = 1;
                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                        $recall_user = $replacement_pending_user_array[$i];
                        $replaced_by = $replacement_user_array[$i];

                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'pre_approve')) {
                            delete_worklist($recall_user, $dm_object_id);
                            delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "pre_approve");

                            add_worklist($replaced_by, $dm_object_id);
                            save_workflow($dm_object_id, $replaced_by, 'Pending', 'pre_approve');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for Pre Approval | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name is Pending for Your Pre Approval";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Recalled from Pre Approver";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled From" => $recall_user_name,
                                "Replaced To" => $replaced_by_name,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            $replacement_count++;
                        }
                    }
                    if ($replacement_count != 1) {
                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Sytem should not allow if the target date exceeded 1.Meeting 2.Training 3.Online Exam 4.Task**//
    if ($dm_master->status == "Open") {
        //**** 1. Meeting is required **//
        if ($dm_master->is_meeting_required == "yes" && $dm_master->meeting_status === "Pending") {
            //**** Allow Meeting Schedule,Rescdule,Meeting attendance if target date not exceed **//
            if ($dm_master->meeting_target_date && is_target_date_exceeded($dm_master->meeting_target_date, $date_time) == false) {
                //****Start Of Meeting Schedule **//
                if ($wf_status == "Pending for Meeting Schedule") {
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'meeting') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                        $smarty->assign('show_meeting_schedule_button', true);
                        if (isset($_POST['meeting_scheduled'])) {
                            $meeting_date = (isset($_REQUEST['meeting_date'])) ? $_REQUEST['meeting_date'] : null;
                            $meeting_time = (isset($_REQUEST['meeting_time'])) ? $_REQUEST['meeting_time'] : null;
                            $meeting_venue = (isset($_REQUEST['meeting_venue'])) ? $_REQUEST['meeting_venue'] : null;
                            $meeting_link = (isset($_REQUEST['meeting_link'])) ? $_REQUEST['meeting_link'] : null;
                            $participants = (isset($_REQUEST['participants'])) ? $_REQUEST['participants'] : null;
                            $meeting_agenda = (isset($_REQUEST['meeting_agenda'])) ? $_REQUEST['meeting_agenda'] : null;
                            if ($dms_processor->add_dms_meeting_schedule($dm_object_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $participants, $meeting_agenda, $usr_id, $date_time)) {
                                $dms_processor->update_dev_wf_status($dm_object_id, "Pending for Meeting");

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $dm_no | Meeting Scheduled | [Info Mail]";
                                $actionDescription = "The Meeting is Scheduled";
                                $mail_details = [
                                    "Deviation No." => $dm_no,
                                    "Date" => display_date_format($meeting_date),
                                    "Time" => $meeting_time,
                                    "Venue" => $meeting_venue,
                                    "Meeting Link" => $meeting_link,
                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($participants, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            } else {
                                $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                }

                //****Start Of Meeting Reshedule, Update Attendees, Meeting Completed **//
                if ($wf_status == "Pending for Meeting") {
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'meeting') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                        $meeting_date_time = new DateTime($meeting_schedule['meeting_date_time']);
                        $meeting_participant_id_details = array_column($dms_processor->get_dms_meeting_participant_details(null, $dm_object_id, null, null), 'participant_id');

                        //Recall - Add additional particiapnts
                        $smarty->assign('recall_meeting_schedule_button', true);
                        $smarty->assign('recall_from', 'Meeting Schedule');
                        $smarty->assign('recall_add_option', true);
                        $smarty->assign('recall_dept_user', true);
                        $smarty->assign('recall_object_id', $dm_object_id);
                        $smarty->assign('recall_workflow_users', $meeting_participant_id_details);

                        //**** Add **//
                        if (isset($_POST['recall_add'])) {
                            $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                            $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                            $dms_processor->add_dms_meeting_participants_details($recall_add_users_to, $dm_object_id, $meeting_schedule['object_id'], $recall_reason, $usr_id, $date_time);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Meeting Scheduled | [Info Mail]";
                            $actionDescription = "The Meeting is Scheduled";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Date" => display_date_format($meeting_schedule['meeting_date']),
                                "Time" => $meeting_schedule['meeting_time'],
                                "Venue" => $meeting_schedule['venue'],
                                "Meeting Link" => $meeting_schedule['meeting_link'],
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Reason" => $recall_reason,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_add_users_to, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            header("Location:$_SERVER[REQUEST_URI]");
                        }

                        //Meeting Reschedule
                        if (new DateTime($date_time) < $meeting_date_time) {
                            $smarty->assign('show_meeting_reschedule_button', true);
                            $smarty->assign('show_info_tab_info', "The attendance recording option will be activated on the day of the meeting [$meeting_schedule[meeting_date] $meeting_schedule[meeting_time]]");

                            if (isset($_POST['meeting_rescheduled'])) {
                                $meeting_id = (isset($_REQUEST['meeting_id'])) ? $_REQUEST['meeting_id'] : null;
                                $meeting_date = (isset($_REQUEST['rmeeting_date'])) ? $_REQUEST['rmeeting_date'] : null;
                                $meeting_time = (isset($_REQUEST['rmeeting_time'])) ? $_REQUEST['rmeeting_time'] : null;
                                $meeting_venue = (isset($_REQUEST['rvenue'])) ? $_REQUEST['rvenue'] : null;
                                $meeting_link = (isset($_REQUEST['rmeeting_link'])) ? $_REQUEST['rmeeting_link'] : null;
                                $reason = (isset($_REQUEST['resched_reason'])) ? $_REQUEST['resched_reason'] : null;

                                if ($dms_processor->update_dms_meeting_schedule($dm_object_id, $meeting_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $reason, $usr_id, $date_time)) {
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Meeting Re-Scheduled | [Info Mail]";
                                    $actionDescription = "The Meeting is Re-scheduled";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Date" => display_date_format($meeting_date),
                                        "Time" => $meeting_time,
                                        "Venue" => $meeting_venue,
                                        "Meeting Link" => $meeting_link,
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Reason" => $reason,
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($meeting_participant_id_details, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                } else {
                                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                        //Update Attendees & Meeting Completed
                        if (new DateTime($date_time) >= $meeting_date_time) {
                            $smarty->assign('update_meeting_attendees_button', true);
                            (empty($meeting_attendee_details)) ? $smarty->assign('disable_meeting_completion_option', true) : false;

                            //****Update Meeting attendess **//
                            if (isset($_POST['update_meet_attn_button'])) {
                                $meeting_attendess = (isset($_REQUEST['attendee'])) ? $_REQUEST['attendee'] : null;
                                $meeting_id = (isset($_REQUEST['meeting_id'])) ? $_REQUEST['meeting_id'] : null;

                                if ($dms_processor->add_dms_meeting_attendee_details($dm_object_id, $meeting_id, $meeting_attendess, $usr_id, $date_time)) {
                                    header("Location:$_SERVER[REQUEST_URI]");
                                } else {
                                    $error_handler->raiseError("INSERT_REQUEST_FAILED");
                                }
                            }

                            //****Meeting Completed **//
                            if (isset($_POST['meeting_completed']) && $meeting_attendee_details) {
                                $meeting_id = (isset($_REQUEST['meeting_id'])) ? $_REQUEST['meeting_id'] : null;
                                $meeting_agenda_id = (isset($_REQUEST['meeting_agenda_id'])) ? $_REQUEST['meeting_agenda_id'] : null;
                                $meeting_conclusion = (isset($_REQUEST['meeting_conclusion'])) ? $_REQUEST['meeting_conclusion'] : null;

                                if ($dms_processor->update_dms_meeting_conclusion($dm_object_id, $meeting_id, $meeting_agenda_id, $meeting_conclusion, $date_time)) {
                                    delete_worklist($usr_id, $dm_object_id);
                                    update_workflow($dm_object_id, $usr_id, 'Completed', 'meeting');
                                    if ($dms_processor->update_dms_meeting_training_exam_task_status($dm_object_id, 'meeting', "Completed")) {
                                        $dms_processor->decide_meeting_training_task($dm_object_id, $creator, $qa_approver, $mail_heading, $mail_link_btn);

                                        //**** Audit Trail**//
                                        addAuditTrailLog($dm_object_id, $meeting_id, $at_data, $audit_trail_action, 'Meeting Completed');
                                    } else {
                                        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                                    }
                                } else {
                                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }
                }
            } else {
                if ($dms_processor->show_dms_extension_btn_for($dm_object_id) == "show_meeting_ext_btn") {
                    $smarty->assign('show_overdue_msg_notifi', true);
                    $smarty->assign('show_info_tab_info', "Meeting Overdue ! The meeting target date (<span class='vd_red font-semibold'>$dm_master->meeting_target_date</span>) has exceeded. Request an extension.");

                    //****Meeting Target Date Extension**//
                    if ((is_extension_elegible_to_raise($dm_object_id, 'Meeting') == true) && check_user_in_worklist($dm_object_id, $usr_id)) {
                        $smarty->assign('request_meeting_extension_btn', true);
                        $smarty->assign('extension_for', "MEETING");
                        $smarty->assign('existing_target_date', $dm_master->meeting_target_date);

                        if (isset($_POST['extension_requested'])) {
                            $exisiting_target_date = (isset($_REQUEST['exisiting_target_date'])) ? $_REQUEST['exisiting_target_date'] : null;
                            $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                            $extension_reason = (isset($_REQUEST['extension_reason'])) ? $_REQUEST['extension_reason'] : null;

                            if (add_extension_details($dm_object_id, $dm_object_id, $exisiting_target_date, $proposed_target_date, "Meeting", $extension_reason, "Meeting - Extension Requested", $qa_approver, $wf_status, $usr_id, $date_time)) {
                                $dms_processor->update_dev_wf_status($dm_object_id, "Pending Extension of Meeting Target Date");
                                //delete_worklist($usr_id, $dm_object_id);
                                add_worklist($qa_approver, $dm_object_id);

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $dm_no | Request for Extending Meeting Target Date | [Action Required]";
                                $actionDescription = "The $lm_doc_short_name Requires Extension for the Meeting Target Date";
                                $mail_details = [
                                    "Deviation No." => $dm_no,
                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    "Extension for" => "Meeting",
                                    "Existing Target Date" => display_date_format($exisiting_target_date),
                                    "Proposed Target Date" => display_date_format($proposed_target_date),
                                    "Reason" => $extension_reason,
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                    //***Extension of Meeting Targat Date Approval***/-
                    if ($wf_status == "Pending Extension of Meeting Target Date") {
                        $smarty->assign('show_info_tab_info', "Meeting Overdue ! The meeting target date (<span class='vd_red font-semibold'>$dm_master->meeting_target_date</span>) has exceeded. Pending approval for an extension.");
                        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'qa_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                            $extension_details = get_extension_details(null, $dm_object_id, 'Meeting', "Pending");
                            $smarty->assign('meeting_extension_approval_btn', true);
                            $smarty->assign('pending_extension_details', $extension_details);
                            $smarty->assign('show_extended_dates', $dms_processor->show_extended_dms_target_date_details($dm_object_id, "meeting", $extension_details[0]['proposed_target_date']));

                            if (isset($_POST['extension_approval'])) {
                                $extension_approval_type = (isset($_REQUEST['extension_approval_type'])) ? $_REQUEST['extension_approval_type'] : null;
                                $extension_object_id = (isset($_REQUEST['extension_object_id'])) ? $_REQUEST['extension_object_id'] : null;
                                $extension_for = (isset($_REQUEST['extension_for'])) ? $_REQUEST['extension_for'] : null;
                                $ref_object_id1 = (isset($_REQUEST['ref_object_id1'])) ? $_REQUEST['ref_object_id1'] : null;
                                $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                                $extension_approval_comments = (isset($_REQUEST['extension_approval_comments'])) ? $_REQUEST['extension_approval_comments'] : null;
                                $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;

                                $extension_status = get_extension_details_by_request_field($dm_object_id, "Meeting", "Pending", "wf_status");
                                $extension_requested_by = get_extension_details_by_request_field($dm_object_id, "Meeting", "Pending", "created_by_id");
                                if (accept_reject_extension_details($extension_object_id, $dm_object_id, $extension_approval_type, $extension_approval_comments, "Meeting - Pending", $usr_id, $date_time, $audit_trail_action)) {
                                    $dms_processor->update_dev_wf_status($dm_object_id, $extension_status);
                                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", "meeting") == false) {
                                        delete_worklist($usr_id, $dm_object_id);
                                    }
                                    //add_worklist($extension_requested_by, $dm_object_id);

                                    if ($extension_approval_type == "Accepted") {
                                        $dms_processor->extend_dms_target_dates($dm_object_id, 'meeting', $proposed_target_date);
                                    }
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Meeting Target Date Extension - $extension_approval_type | [Info Mail]";
                                    $actionDescription = "The $lm_doc_short_name  Extension Request is $extension_approval_type";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Extension for" => $extension_for,
                                        "Approval Status" => $extension_approval_type,
                                        "Remarks" => $extension_approval_comments,
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($extension_requested_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                    header("Location:$_SERVER[REQUEST_URI]");
                                }
                            }
                        }
                    }
                }
            }
        }

        //**** 2. Training is required **//
        if ($dm_master->training_status === "Pending" && $dm_master->is_training_required == "yes") {
            //**** Allow Assigning trainer,Training schedule, recschedule, online exam, training  if target date not exceed **//
            if ($dm_master->training_target_date && is_target_date_exceeded($dm_master->training_target_date, $date_time) == false) {

                //**** Assign Trainer **//
                if ($wf_status == "Pending for Trainer Assignment") {
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'to_assign_trainer') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                        $smarty->assign('show_trainer_assign_button', true);

                        if (isset($_POST['assign_to_trainer'])) {
                            if ($dms_processor->update_dev_wf_status($dm_object_id, "Pending for Training and Online Exam")) {
                                $trainers_array = (isset($_POST['trainers'])) ? $_POST['trainers'] : null;
                                $title_array = (isset($_POST['title'])) ? $_POST['title'] : null;

                                delete_worklist($usr_id, $dm_object_id);
                                update_workflow($dm_object_id, $usr_id, 'Assigned', 'to_assign_trainer');

                                if ($dms_processor->assign_dms_trainers($dm_object_id, $title_array, $trainers_array, $dm_master->training_target_date, $usr_id, $date_time)) {
                                    // $i = 0;
                                    // foreach ($trainers_array as $trainer_id) {
                                    //     for ($j = 0; $j < count($trainer_id); $j++) {
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Pending for Training | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name is Pending for Training";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Title" => $title_array[0],
                                        "Target Date" => display_date_format($dm_master->training_target_date),
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($trainers_array[0], $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                    //     }
                                    //     $i++;
                                    // }
                                } else {
                                    $error_handler->raiseError("INSERT_REQUEST_FAILED");
                                }
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                }

                //****Replace Trainer, Training Schedule,training reschdule, Update Trainees, Training Completed, Question Preparation, Assign Exam**//
                if ($wf_status == "Pending for Training and Online Exam") {
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'training') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                        //Training Schedule
                        if ($dms_processor->is_dms_elegible_for_training_schedule($dm_object_id, $usr_id)) {
                            $smarty->assign('training_schedule_button', true);
                            $smarty->assign('trainer_wise_training_details', $dms_processor->get_dms_training_details($dm_object_id, null, $usr_id, 'Pending'));

                            if (isset($_POST['training_scheduled'])) {
                                $trainer_object_id = (isset($_POST['trainer_object_id'])) ? $_POST['trainer_object_id'] : null;
                                $training_session = (isset($_POST['session'])) ? $_POST['session'] : null;
                                $training_date = (isset($_POST['training_date'])) ? $_POST['training_date'] : null;
                                $training_time = (isset($_POST['training_time'])) ? $_POST['training_time'] : null;
                                $training_venue = (isset($_POST['training_venue'])) ? $_POST['training_venue'] : null;
                                $training_link = (isset($_POST['training_link'])) ? $_POST['training_link'] : null;
                                $training_invitees = (isset($_POST['participants'])) ? $_POST['participants'] : null;

                                if ($dms_processor->add_dms_training_schedule($dm_object_id, $trainer_object_id, $training_date, $training_time, $training_venue, $training_session, $training_link, $training_invitees, $usr_id, $date_time)) {
                                    // **** Send Mail**//
                                    for ($i = 0; $i < count($trainer_object_id); $i++) {
                                        for ($j = 0; $j < count($training_session[$i]); $j++) {
                                            $invitees_array = array_unique($training_invitees[$trainer_object_id[$i]][$j]);
                                            foreach ($invitees_array as $invitees_id) {
                                                // **** Send Mail**//
                                                $subject = "$lm_doc_short_name | $dm_no | Training Session Scheduled | [Info Mail]";
                                                $actionDescription = "The $lm_doc_short_name Training is Scheduled";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Training Date" => display_date_format($training_date[$i][$j]),
                                                    "Title" => $training_session[$i][$j],
                                                    "Time" => $training_time[$i][$j],
                                                    "Venue" => $training_venue[$i][$j],
                                                    "Link" => $training_link[$i][$j],
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Sent By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($invitees_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                            }
                                        }
                                    }
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }

                        //Reshedule Training
                        if ($dms_processor->is_dms_eligible_for_training_reschedule_by_trainer($dm_object_id, $usr_id, $date_time)) {
                            $smarty->assign('rescheduled_taining_button', true);
                            $smarty->assign('eligible_rescheduled_training_details', $dms_processor->get_dms_eligible_rescheduled_training_details($dm_object_id, $usr_id, $date_time));

                            if (isset($_POST['training_rescheduled'])) {
                                $training_reschedule_id = (isset($_POST['training_reschedule_id'])) ? $_POST['training_reschedule_id'] : null;
                                $training_rescheduled_session = (isset($_POST['training_rescheduled_session'])) ? $_POST['training_rescheduled_session'] : null;
                                $training_date = (isset($_POST['training_rescheduled_date'])) ? $_POST['training_rescheduled_date'] : null;
                                $training_time = (isset($_POST['training_rescheduled_time'])) ? $_POST['training_rescheduled_time'] : null;
                                $training_venue = (isset($_POST['training_rescheduled_venue'])) ? $_POST['training_rescheduled_venue'] : null;
                                $reason = (isset($_POST['resched_reason'])) ? $_POST['resched_reason'] : null;

                                if ($dms_processor->update_dms_training_reschedule_details($dm_object_id, $training_reschedule_id, $training_date, $training_time, $training_venue, $reason, $usr_id, $date_time)) {
                                    for ($i = 0; $i < count($training_reschedule_id); $i++) {
                                        if ($dms_processor->is_dms_eligible_for_training_reschedule_by_schedule_id($dm_object_id, $training_reschedule_id[$i], $date_time)) {
                                            $trainess_list = array_column($dms_processor->get_dms_training_participants_details($dm_object_id, $training_reschedule_id[$i]), 'trainee');
                                            //**** Send Mail**//
                                            $subject = "$lm_doc_short_name | $dm_no | Training Session Re-Scheduled | [Info Mail]";
                                            $actionDescription = "The $lm_doc_short_name Training Session is Re-Scheduled";
                                            $mail_details = [
                                                "Deviation No." => $dm_no,
                                                "Training Date" => display_date_format($training_date[$i]),
                                                "Title" => $training_rescheduled_session[$i],
                                                "Time" => $training_time[$i],
                                                "Venue" => $training_venue[$i],
                                                "Reason" => $reason,
                                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                "Sent By" => $_SESSION['full_name']
                                            ];
                                            send_workflow_mail($trainess_list, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                        }
                                    }
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }

                        //Update Training Attendess & Training Completed
                        if ($dms_processor->is_dms_elegible_for_update_training_details($dm_object_id, $usr_id, $date_time)) {
                            $elegible_training_details = $dms_processor->get_dms_elegible_training_details_for_update($dm_object_id, $usr_id, "Pending", $date_time);
                            $show_training_completion_button = $dms_processor->is_dms_elegible_for_training_completion($dm_object_id, $usr_id);
                            $smarty->assign('update_trainees_button', true);
                            $smarty->assign('elegible_training_details', $elegible_training_details);
                            $smarty->assign('show_training_completion_button', $show_training_completion_button);

                            if (isset($_POST['update_training_attn_button'])) {
                                $training_sch_id = (isset($_REQUEST['update_training_sch_id'])) ? $_REQUEST['update_training_sch_id'] : null;
                                $trainees = (isset($_REQUEST['trainees'])) ? $_REQUEST['trainees'] : null;

                                if ($dms_processor->update_dms_training_attendee_details($dm_object_id, $training_sch_id, $trainees, $usr_id, $date_time)) {
                                    header("Location:$_SERVER[REQUEST_URI]");
                                } else {
                                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                                }
                            }

                            //****Training Completed & Exam Not Required**//
                            if (isset($_POST['training_completed']) && $show_training_completion_button) {
                                if ($dms_processor->update_dms_training_completion_details($dm_object_id, $elegible_training_details)) {
                                    if ($dms_processor->update_dms_meeting_training_exam_task_status($dm_object_id, 'training', "Completed")) {
                                        delete_worklist($usr_id, $dm_object_id);
                                        update_workflow($dm_object_id, $usr_id, 'Completed', 'training');

                                        //If Exam Not required And All Training Completed
                                        if ($dm_master->is_online_exam_required === "no") {
                                            $dms_processor->decide_meeting_training_task($dm_object_id, $creator, $qa_approver, $mail_heading, $mail_link_btn);
                                        } else {
                                            add_worklist($usr_id, $dm_object_id);
                                            save_workflow($dm_object_id, $usr_id, 'Pending', 'to_assign_exam');
                                        }
                                        //**** Audit Trail**//
                                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Training Completed');
                                    }
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }
                    //**** Start Of Recall Trainer **//
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Assigned", 'to_assign_trainer')) {
                        $smarty->assign('recall_trainer_button', true);

                        $trainer_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'training', 'Pending');
                        $smarty->assign('recall_from', 'Training');
                        $smarty->assign('recall_replace_option', true);
                        $smarty->assign('recall_action_user', true);
                        $smarty->assign('recall_action', 'training');
                        $smarty->assign('recall_object_id', $dm_object_id);
                        $smarty->assign('recall_pending_users_list', $trainer_pending_userlist);
                        $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'training'), 'user_id'));

                        //**** Replace **//
                        if (isset($_POST['recall_replace'])) {
                            $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                            $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                            $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                            if ($replacement_pending_user_array) {
                                $replacement_count = 1;
                                for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                                    $recall_user = $replacement_pending_user_array[$i];
                                    $replaced_by = $replacement_user_array[$i];

                                    if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'training')) {
                                        delete_worklist($recall_user, $dm_object_id);
                                        delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "training");

                                        add_worklist($replaced_by, $dm_object_id);
                                        save_workflow($dm_object_id, $replaced_by, 'Pending', 'training');
                                        $dms_processor->replace_dms_trainer_details($dm_object_id, $recall_user, $replaced_by, $usr_id, $date_time);

                                        //**** Audit Trail**//
                                        $recall_user_name = getFullName($recall_user);
                                        $replaced_by_name = getFullName($replaced_by);

                                        $recall_user_at_o .= "\n\t\t$recall_user_name";
                                        $recall_user_at_n .= "\n\t\t$replaced_by_name";
                                        $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                                        //**** Send Mail Recall user**//
                                        $subject = "$lm_doc_short_name | $dm_no | Pending for Training | [Action Required]";
                                        $actionDescription = "The $lm_doc_short_name is Pending for Training";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Target Date" => display_date_format($dm_master->training_target_date),
                                            "Sent By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                                        $actionDescription = "The $lm_doc_short_name is Recalled from Training";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Reason for Recall" => $recall_reason,
                                            "Recalled From" => $recall_user_name,
                                            "Replaced To" => $replaced_by_name,
                                            "Recalled By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                        $replacement_count++;
                                    }
                                }
                                if ($replacement_count != 1) {
                                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                                    $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                                }
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                }
            } else {
                if ($dms_processor->show_dms_extension_btn_for($dm_object_id) == "show_training_ext_btn") {
                    $smarty->assign('show_overdue_msg_notifi', true);
                    $smarty->assign('show_info_tab_info', "Training Overdue ! The training target date (<span class='vd_red font-semibold'>$dm_master->training_target_date</span>) has exceeded. Request an extension.");

                    //****Training Target Date Extension**//
                    if ((is_extension_elegible_to_raise($dm_object_id, 'Training') == true) && check_user_in_worklist($dm_object_id, $usr_id)) {
                        $smarty->assign('request_training_extension_btn', true);
                        $smarty->assign('extension_for', "TRAINING");
                        $smarty->assign('existing_target_date', $dm_master->training_target_date);

                        if (isset($_POST['extension_requested'])) {
                            $exisiting_target_date = (isset($_REQUEST['exisiting_target_date'])) ? $_REQUEST['exisiting_target_date'] : null;
                            $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                            $extension_reason = (isset($_REQUEST['extension_reason'])) ? $_REQUEST['extension_reason'] : null;

                            if (add_extension_details($dm_object_id, $dm_object_id, $exisiting_target_date, $proposed_target_date, "Training", $extension_reason, "Training - Extension Requested", $qa_approver, $wf_status, $usr_id, $date_time)) {
                                $dms_processor->update_dev_wf_status($dm_object_id, "Pending Extension of Training Target Date");
                                //delete_worklist($usr_id, $dm_object_id);
                                add_worklist($qa_approver, $dm_object_id);

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $dm_no | Request for Extending Training Target Date | [Action Required]";
                                $actionDescription = "The $lm_doc_short_name Requires Extension for the Training Target Date";
                                $mail_details = [
                                    "Deviation No." => $dm_no,
                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    "Extension for" => "Training",
                                    "Existing Target Date" => display_date_format($exisiting_target_date),
                                    "Proposed Target Date" => display_date_format($proposed_target_date),
                                    "Reason" => $extension_reason,
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }

                    //***Extension of Training Targat Date Approval***/-
                    if ($wf_status == "Pending Extension of Training Target Date") {
                        $smarty->assign('show_info_tab_info', "Training Overdue ! The training target date (<span class='vd_red font-semibold'>$dm_master->training_target_date</span>) has exceeded. Pending approval for an extension.");
                        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'qa_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                            $extension_details = get_extension_details(null, $dm_object_id, 'Training', "Pending");
                            $smarty->assign('training_extension_approval_btn', true);
                            $smarty->assign('pending_extension_details', $extension_details);
                            $smarty->assign('show_extended_dates', $dms_processor->show_extended_dms_target_date_details($dm_object_id, "training", $extension_details[0]['proposed_target_date']));

                            if (isset($_POST['extension_approval'])) {
                                $extension_approval_type = (isset($_REQUEST['extension_approval_type'])) ? $_REQUEST['extension_approval_type'] : null;
                                $extension_object_id = (isset($_REQUEST['extension_object_id'])) ? $_REQUEST['extension_object_id'] : null;
                                $extension_for = (isset($_REQUEST['extension_for'])) ? $_REQUEST['extension_for'] : null;
                                $ref_object_id1 = (isset($_REQUEST['ref_object_id1'])) ? $_REQUEST['ref_object_id1'] : null;
                                $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                                $extension_approval_comments = (isset($_REQUEST['extension_approval_comments'])) ? $_REQUEST['extension_approval_comments'] : null;
                                $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;

                                $extension_status = get_extension_details_by_request_field($dm_object_id, "Training", "Pending", "wf_status");
                                $extension_requested_by = get_extension_details_by_request_field($dm_object_id, "Training", "Pending", "created_by_id");
                                if (accept_reject_extension_details($extension_object_id, $dm_object_id, $extension_approval_type, $extension_approval_comments, "Training - Pending", $usr_id, $date_time, $audit_trail_action)) {
                                    $dms_processor->update_dev_wf_status($dm_object_id, $extension_status);
                                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", "training") == false) {
                                        delete_worklist($usr_id, $dm_object_id);
                                    }
                                    //add_worklist($extension_requested_by, $dm_object_id);

                                    if ($extension_approval_type == "Accepted") {
                                        $dms_processor->extend_dms_target_dates($dm_object_id, 'training', $proposed_target_date);
                                    }
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Training Target Date Extension - $extension_approval_type | [Info Mail]";
                                    $actionDescription = "The $lm_doc_short_name  Extension Request is $extension_approval_type";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Extension for" => $extension_for,
                                        "Approval Status" => $extension_approval_type,
                                        "Remarks" => $extension_approval_comments,
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($extension_requested_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                    header("Location:$_SERVER[REQUEST_URI]");
                                }
                            }
                        }
                    }
                }
            }
        }

        //**** 3. Exam is required **//
        if ($dm_master->exam_status === "Pending" && $dm_master->is_online_exam_required == "yes") {
            //**** Allow question prepartion Assigning exam,Attend Exam, Re-Exam. if target date not exceed **//
            if ($dm_master->exam_target_date && is_target_date_exceeded($dm_master->exam_target_date, $date_time) == false) {

                //**** 1 Question Prepartion , Assiggn Exam ,Recall exam, Attend Exam, Re-Exam  *****//
                if ($wf_status == "Pending for Training and Online Exam") {
                    // Question Preparation
                    if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'to_assign_exam') && check_user_in_worklist($dm_object_id, $usr_id))) {
                        $qna_list = $dms_processor->get_dms_question_ans_list($dm_object_id, $dms_processor->get_dms_trainer_object_id($dm_object_id, $usr_id), $trainer);
                        $smarty->assign('show_question_pre_button', true);
                        $smarty->assign('trainer_training_details', $dms_processor->get_dms_training_details($dm_object_id, null, $trainer, 'Completed'));
                        $smarty->assign('qna_list', $qna_list);

                        //****Prepare Questions**//
                        if (isset($_POST['add_qns'])) {
                            $trainer_object_id_array = (isset($_POST['trainer_object_id'])) ? $_POST['trainer_object_id'] : null;

                            // True or False Question details 
                            $tf_qns_array['questions'] = (isset($_POST['atf_qns'])) ? $_POST['atf_qns'] : null;
                            $tf_qns_array['answers'] = (isset($_POST['atf_qns_ans'])) ? $_POST['atf_qns_ans'] : null;
                            $tf_qns_array['order'] = (isset($_POST['atf_qns_order'])) ? $_POST['atf_qns_order'] : null;
                            $tf_qns_array['options'] = array("1" => "True", "2" => "False");

                            //**** MCQ Option1,Option2,Option3,Option4**//
                            $mcq_option1 = (isset($_POST['amc_qns_opt1'])) ? $_POST['amc_qns_opt1'] : null;
                            $mcq_option2 = (isset($_POST['amc_qns_opt2'])) ? $_POST['amc_qns_opt2'] : null;
                            $mcq_option3 = (isset($_POST['amc_qns_opt3'])) ? $_POST['amc_qns_opt3'] : null;
                            $mcq_option4 = (isset($_POST['amc_qns_opt4'])) ? $_POST['amc_qns_opt4'] : null;

                            //Add MCQ Options
                            for ($i = 0; $i < count($_POST['amc_qns']); $i++) {
                                $mcq_opt[] = array("1" => $mcq_option1[$i], "2" => $mcq_option2[$i], "3" => $mcq_option3[$i], "4" => $mcq_option4[$i]);
                            }

                            $mcq_array['questions'] = (isset($_POST['amc_qns'])) ? $_POST['amc_qns'] : null;
                            $mcq_array['answers'] = (isset($_POST['amc_qns_ans'])) ? $_POST['amc_qns_ans'] : null;
                            $mcq_array['order'] = (isset($_POST['amc_qns_order'])) ? $_POST['amc_qns_order'] : null;
                            $mcq_array['options'] = $mcq_opt;

                            $dms_processor->add_dms_exam_questions($dm_object_id, $trainer_object_id_array, $tf_qns_array, $mcq_array, $usr_id, $date_time);
                            header("Location:$_SERVER[REQUEST_URI]");
                        }

                        //Assign Exam
                        if ($qna_list) {
                            $smarty->assign('show_exam_assign_button', true);
                            if (isset($_POST['assign_exam'])) {
                                $trainer_object_id_array = (isset($_POST['trainer_object_id'])) ? $_POST['trainer_object_id'] : null;
                                $qns_limit = (isset($_POST['qns_limit'])) ? $_POST['qns_limit'] : null;
                                $exam_users = (isset($_POST['exam_user'])) ? $_POST['exam_user'] : null;

                                delete_worklist($usr_id, $dm_object_id);
                                update_workflow($dm_object_id, $usr_id, 'Assigned', 'to_assign_exam');

                                for ($i = 0; $i < count($trainer_object_id_array); $i++) {
                                    $exam_details_id = $dms_processor->add_dms_online_exam_details($dm_object_id, $trainer_object_id_array[$i], $usr_id, $date_time);
                                    if ($exam_details_id) {
                                        for ($j = 0; $j < count($exam_users[$i]); $j++) {
                                            if ($dms_processor->assign_dms_online_exam($dm_object_id, $trainer_object_id_array[$i], $trainer, $exam_details_id, $usr_id, $exam_users[$i][$j], $qns_limit[$i], "Assigned", 'yes', '1', "Pending", "NA", $date_time)) {
                                                add_worklist($exam_users[$i][$j], $dm_object_id);
                                                save_workflow($dm_object_id, $exam_users[$i][$j], 'Pending', 'online_exam');

                                                $exam_user_at_n .= "\n\t\t\t" . getFullName($exam_users[$i][$j]);
                                                $exam_user_at_p .= "\n\t\t\t" . $exam_users[$i][$j] . " - " . getFullName($exam_users[$i][$j]);

                                                //**** Send Mail**//
                                                $subject = "$lm_doc_short_name | $dm_no | Pending for Online Exam | [Action Required]";
                                                $actionDescription = "The $lm_doc_short_name is Pending for Online Exam";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Target Date" => display_date_format($dm_master->exam_target_date),
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Sent By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($exam_users[$i][$j], $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                            }
                                        }
                                        if ($exam_user_at_n) {
                                            $at_data['Online Exam'] = array('NA', $exam_user_at_n, $exam_user_at_p);
                                            addAuditTrailLog($dm_object_id, $trainer_object_id_array[$i], $at_data, $audit_trail_action, 'Succesfully Assigned');
                                        }
                                    }
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }

                    //**** Start Of Recall Exam **//
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Assigned", 'to_assign_exam')) {
                        $smarty->assign('recall_exam_button', true);

                        $trainer_object_id = $dms_processor->get_dms_trainer_object_id($dm_object_id, $trainer);
                        $exam_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'online_exam', 'Pending');
                        $recall_default_add_user_list = $dms_processor->get_dms_unique_non_attended_exam_user_list($dm_object_id, $trainer_object_id, $trainer);

                        $smarty->assign('recall_from', 'Online Exam');
                        if ($recall_default_add_user_list) {
                            $smarty->assign('recall_add_option', true);
                            $smarty->assign('recall_default_add_user_list', $recall_default_add_user_list);
                        }
                        if (get_workflow_userlist_by_objectid_action_status($dm_object_id, 'online_exam', 'Completed')) {
                            $smarty->assign('recall_remove_option', true);
                        }

                        $smarty->assign('recall_object_id', $dm_object_id);
                        $smarty->assign('recall_pending_users_list', $exam_pending_userlist);
                        $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($dm_object_id, 'online_exam'), 'user_id'));

                        $online_exam_details = $dms_processor->get_dms_online_exam_details($dm_object_id, $trainer_object_id, $trainer, 'yes', null);
                        $exam_details_id = array_shift(array_column($online_exam_details, 'object_id'));

                        //**** Add **//
                        if (isset($_POST['recall_add'])) {
                            $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                            $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                            $qns_limit = array_shift(array_column(array_shift(array_column($online_exam_details, 'user_details')), 'question_limit'));
                            $already_oe_assigned_users = array_column(array_shift(array_column($online_exam_details, 'user_details')), 'assigned_to');

                            $add_count = 0;
                            foreach ($recall_add_users_to as $to_user) {
                                if (is_user_in_workflow_action($dm_object_id, $to_user, 'online_exam') == false) {
                                    if ($dms_processor->assign_dms_online_exam($dm_object_id, $trainer_object_id, $trainer, $exam_details_id, $usr_id, $to_user, $qns_limit, "Assigned", 'yes', '1', "Pending", "NA", $date_time)) {
                                        add_worklist($to_user, $dm_object_id);
                                        save_workflow($dm_object_id, $to_user, 'Pending', 'online_exam');

                                        $exam_user_at_n .= "\n\t\t\t" . getFullName($to_user);
                                        $exam_user_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Pending for Online Exam | [Action Required]";
                                        $actionDescription = "The $lm_doc_short_name is Pending for Online Exam";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Target Date" => display_date_format($dm_master->exam_target_date),
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Sent By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                        $add_count++;
                                    }
                                }
                            }
                            if ($add_count > 0) {
                                //**** Audit Trail**//
                                foreach ($already_oe_assigned_users as $val) {
                                    $exam_user_at_o .= "\n\t\t\t" . $val;
                                }
                                $at_data[] = array("Old Exam User Details : $exam_user_at_o", "Reason : $recall_reason\nNew Exam User Details : $exam_user_at_n", $exam_user_at_p);
                                addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Successfully Assigned');
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }

                        //**** Remove **//
                        if (isset($_POST['recall_remove'])) {
                            $recall_remove_user_array = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                            $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                            if ($recall_remove_user_array) {
                                $add_count = 0;
                                foreach ($recall_remove_user_array as $recall_user) {
                                    if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'online_exam')) {
                                        delete_worklist($recall_user, $dm_object_id);
                                        delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "online_exam");
                                        $dms_processor->update_dms_online_exam_user_status($dm_object_id, $exam_details_id, $recall_user, "Recalled", 'Completed', 'yes');

                                        //**** Audit Trail**//
                                        $recall_user_name = getFullName($recall_user);
                                        $exam_user_at_n .= "\n\t\t\t" . $recall_user_name;
                                        $exam_user_at_p .= "\n\t\t\t$recall_user - $recall_user_name";

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                                        $actionDescription = "The $lm_doc_short_name is Recalled from Online Exam";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Reason for Recall" => $recall_reason,
                                            "Recalled By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                        $add_count++;
                                    }
                                }
                                if ($add_count > 0) {
                                    //**** Audit Trail**//
                                    foreach ($exam_pending_userlist as $exam_pending_user) {
                                        $exam_user_at_o .= "\n\t\t\t" . $exam_pending_user['user_name'];
                                    }
                                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                                    $at_data[''] = array("Existing User List : $exam_user_at_o", "Recalled User List $exam_user_at_n", $exam_user_at_p);
                                    addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Recalled');
                                }
                                $check_exam_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'online_exam', 'Pending');
                                if (count($check_exam_pending_userlist) == 0) {
                                    if ($dms_processor->update_dms_online_exam_status($exam_details_id, 'Completed')) {
                                        $dms_processor->update_dms_meeting_training_exam_task_status($dm_object_id, 'exam', "Completed");
                                        $dms_processor->decide_meeting_training_task($dm_object_id, $creator, $qa_approver, $mail_heading, $mail_link_btn);
                                    }
                                }
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                    //Online Exam
                    if ((check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'online_exam') && check_user_in_worklist($dm_object_id, $usr_id))) {
                        $smarty->assign('show_online_exam_btn', true);
                        $trainer_object_id = $dms_processor->get_dms_trainer_object_id($dm_object_id, $trainer);
                        $smarty->assign('online_exam_user_details', $dms_processor->get_dms_online_exam_details($dm_object_id, $trainer_object_id, $trainer, 'yes', $usr_id));

                        $exam_object_id = (isset($_POST['exam_object_id'])) ? $_POST['exam_object_id'] : null;
                        $exam_details_id = (isset($_POST['exam_details_id'])) ? $_POST['exam_details_id'] : null;
                        $exam_pass_mark = (isset($_POST['exam_pass_mark'])) ? $_POST['exam_pass_mark'] : null;
                        $exam_attempt = (isset($_POST['exam_attempt'])) ? $_POST['exam_attempt'] : null;
                        $exam_qns_limit = (isset($_POST['exam_qns_limit'])) ? $_POST['exam_qns_limit'] : null;
                        $exam_attempt_limit = (isset($_POST['exam_attempt_limit'])) ? $_POST['exam_attempt_limit'] : null;

                        $answers = (isset($_POST['ans'])) ? $_POST['ans'] : null;

                        //Save Exam
                        if (isset($_POST['save_exam'])) {
                            ($dms_processor->update_dms_online_exam_ans($exam_object_id, $answers, $date_time)) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                        }

                        // If Exam Completed 
                        if (isset($_POST['exam_completed'])) {
                            //Update Answers
                            if ($dms_processor->update_dms_online_exam_ans($exam_object_id, $answers, $date_time)) {
                                $marks_scored = $dms_processor->get_dms_exam_mark($exam_object_id);
                                $exam_result = $dms_processor->get_dms_exam_result($marks_scored, $exam_pass_mark);

                                if ($dms_processor->update_dms_exam_completion_details($exam_object_id, $exam_details_id, "Completed", "Completed", $marks_scored, $exam_result, $date_time)) {
                                    //If Exam Failed
                                    if ($exam_result == "Failed") {
                                        $next_attemt = $exam_attempt + 1;
                                        $capa_no = "NA";
                                        //Trigger CAPA
                                        if ($dms_processor->is_dms_exam_capa_required($exam_attempt_limit, $next_attemt)) {
                                            $initiate_capa_integration = true;
                                            $failed_user_name = getFullName($usr_id);
                                        }
                                        //Re Assign Exam
                                        $next_exam_object_id = $dms_processor->assign_dms_online_exam($dm_object_id, $trainer_object_id, $trainer, $exam_details_id, $usr_id, $usr_id, $exam_qns_limit, "Re Assigned", 'yes', $next_attemt, "Pending", $capa_no, $date_time);
                                        if ($initiate_capa_integration && $next_exam_object_id) {
                                            //Add e-trigger(Integration Details)
                                            $capa_no = add_integration($dm_object_id, $lm_doc_id, $next_exam_object_id, getLmDocObjectIdByDocCode('LM-DOC-12'), "dms_exam_failed", $usr_id, $trainer, $trainer, "Exam Failed - $failed_user_name - Attempt : $next_attemt");
                                            if ($capa_no) {
                                                $dms_processor->update_dms_online_exam_capa_details($dm_object_id, $next_exam_object_id, $capa_no);
                                                //**** Send Mail**//
                                                $qms_capa_no = get_qms_doc_no(null, $capa_no)['doc_no'];

                                                $subject = "$lm_doc_short_name | $dm_no | CAPA Triggered | [Action Required]";
                                                $actionDescription = "The user $failed_user_name exceeded the online exam limit.Therefore, a CAPA has been triggered & assigned to you";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Exam Attended By" => $failed_user_name,
                                                    "Pass Mark" => $exam_pass_mark,
                                                    "Scored Marks" => $marks_scored,
                                                    "Result" => $exam_result,
                                                    "Attempt" => $next_attemt,
                                                    "CAPA no" => $qms_capa_no,
                                                    "Sent By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($trainer, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                                $at_data['Capa Details'] = array('NA', "$qms_capa_no Triggered", "$capa_no : $qms_capa_no");
                                            } else {
                                                $error_handler->raiseError("INTEGRATION_FAILED");
                                            }
                                        }

                                        $exam_user_at_n .= "\n\t\t\t" . getFullName($usr_id);
                                        $exam_user_at_p .= "\n\t\t\t" . $usr_id . " - " . getFullName($usr_id);

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Online Exam Result | [Info Mail]";
                                        $actionDescription = "You have failed the online exam";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Pass Mark" => $exam_pass_mark,
                                            "Scored Marks" => $marks_scored,
                                            "Result" => $exam_result,
                                            "Attempt" => $exam_attempt,
                                            "Sent By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($usr_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Online Exam Re Assigned | [Action Required]";
                                        $actionDescription = "The $lm_doc_short_name is Pending for Online Exam";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Target Date" => display_date_format($dm_master->exam_target_date),
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Sent By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($usr_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                        $at_data['Pass Mark'] = array('NA', $exam_pass_mark, $exam_pass_mark);
                                        $at_data['Scored Marks'] = array('NA', $marks_scored, $marks_scored);
                                        $at_data['Result'] = array('NA', $exam_result, $exam_result);
                                        $at_data['Attempt'] = array('NA', $exam_attempt, $exam_attempt);
                                        $at_data['Status'] = array('NA', "Re Assigned", "Re Assigned");
                                        addAuditTrailLog($dm_object_id, null, $at_data, "Online Exam", 'Succesfully Re Assigned');
                                    }

                                    //If Exam Passed
                                    if ($exam_result == "Pass") {
                                        update_workflow($dm_object_id, $usr_id, 'Completed', 'online_exam');
                                        delete_worklist($usr_id, $dm_object_id);

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Online Exam Result | [Info Mail]";
                                        $actionDescription = "You have passed the online exam";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Pass Mark" => $exam_pass_mark,
                                            "Scored Marks" => $marks_scored,
                                            "Result" => $exam_result,
                                            "Attempt" => $exam_attempt,
                                            "Sent By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($usr_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                        $at_data['Pass Mark'] = array('NA', $exam_pass_mark, $exam_pass_mark);
                                        $at_data['Scored Marks'] = array('NA', $marks_scored, $marks_scored);
                                        $at_data['Result'] = array('NA', $exam_result, $exam_result);
                                        $at_data['Attempt'] = array('NA', $exam_attempt, $exam_attempt);
                                        $at_data['Status'] = array('NA', "Passed", "Passed");
                                        addAuditTrailLog($dm_object_id, null, $at_data, "Online Exam", 'Succesfully Passed');

                                        if (is_action_finished($dm_object_id, "online_exam", "Completed")) {
                                            if ($dms_processor->update_dms_online_exam_status($exam_details_id, 'Completed')) {
                                                if ($dms_processor->update_dms_meeting_training_exam_task_status($dm_object_id, 'exam', "Completed")) {
                                                    $dms_processor->decide_meeting_training_task($dm_object_id, $creator, $qa_approver, $mail_heading, $mail_link_btn);
                                                } else {
                                                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                                                }
                                            } else {
                                                $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                                            }
                                        }
                                    }
                                    header("Location:$_SERVER[REQUEST_URI]");
                                }
                            }
                        }
                    }
                }
            } else {
                if ($dms_processor->show_dms_extension_btn_for($dm_object_id) == "show_exam_ext_btn") {
                    $smarty->assign('show_overdue_msg_notifi', true);
                    $smarty->assign('show_info_tab_info', "Exam Overdue ! The Exam target date (<span class='vd_red font-semibold'>$dm_master->exam_target_date</span>) has exceeded. Request an extension.");

                    //****Exam Target Date Extension**//
                    if ((is_extension_elegible_to_raise($dm_object_id, 'Exam') == true) && check_user_in_worklist($dm_object_id, $usr_id)) {
                        $smarty->assign('request_exam_extension_btn', true);
                        $smarty->assign('extension_for', "EXAM");
                        $smarty->assign('existing_target_date', $dm_master->exam_target_date);

                        if (isset($_POST['extension_requested'])) {
                            $exisiting_target_date = (isset($_REQUEST['exisiting_target_date'])) ? $_REQUEST['exisiting_target_date'] : null;
                            $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                            $extension_reason = (isset($_REQUEST['extension_reason'])) ? $_REQUEST['extension_reason'] : null;

                            if (add_extension_details($dm_object_id, $dm_object_id, $exisiting_target_date, $proposed_target_date, "Exam", $extension_reason, "Exam - Extension Requested", $qa_approver, $wf_status, $usr_id, $date_time)) {
                                $dms_processor->update_dev_wf_status($dm_object_id, "Pending Extension of Exam Target Date");
                                delete_worklist($usr_id, $dm_object_id);
                                add_worklist($qa_approver, $dm_object_id);

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $dm_no | Request for Extending Exam Target Date | [Action Required]";
                                $actionDescription = "The $lm_doc_short_name Requires Extension for the Exam Target Date";
                                $mail_details = [
                                    "Deviation No." => $dm_no,
                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    "Extension for" => "Exam",
                                    "Existing Target Date" => display_date_format($exisiting_target_date),
                                    "Proposed Target Date" => display_date_format($proposed_target_date),
                                    "Reason" => $extension_reason,
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }

                    //***Extension of Exam Targat Date Approval***/-
                    if ($wf_status == "Pending Extension of Exam Target Date") {
                        $smarty->assign('show_info_tab_info', "Exam Overdue ! The exam target date (<span class='vd_red font-semibold'>$dm_master->exam_target_date</span>) has exceeded. Pending approval for an extension.");
                        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'qa_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                            $extension_details = get_extension_details(null, $dm_object_id, 'Exam', "Pending");
                            $smarty->assign('exam_extension_approval_btn', true);
                            $smarty->assign('pending_extension_details', $extension_details);
                            $smarty->assign('show_extended_dates', $dms_processor->show_extended_dms_target_date_details($dm_object_id, "exam", $extension_details[0]['proposed_target_date']));

                            if (isset($_POST['extension_approval'])) {
                                $extension_approval_type = (isset($_REQUEST['extension_approval_type'])) ? $_REQUEST['extension_approval_type'] : null;
                                $extension_object_id = (isset($_REQUEST['extension_object_id'])) ? $_REQUEST['extension_object_id'] : null;
                                $extension_for = (isset($_REQUEST['extension_for'])) ? $_REQUEST['extension_for'] : null;
                                $ref_object_id1 = (isset($_REQUEST['ref_object_id1'])) ? $_REQUEST['ref_object_id1'] : null;
                                $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                                $extension_approval_comments = (isset($_REQUEST['extension_approval_comments'])) ? $_REQUEST['extension_approval_comments'] : null;
                                $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;

                                $extension_status = get_extension_details_by_request_field($dm_object_id, "Exam", "Pending", "wf_status");
                                $extension_requested_by = get_extension_details_by_request_field($dm_object_id, "Exam", "Pending", "created_by_id");
                                if (accept_reject_extension_details($extension_object_id, $dm_object_id, $extension_approval_type, $extension_approval_comments, "Exam - Pending", $usr_id, $date_time, $audit_trail_action)) {
                                    $dms_processor->update_dev_wf_status($dm_object_id, $extension_status);
                                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", "online_exam") == false) {
                                        delete_worklist($usr_id, $dm_object_id);
                                    }
                                    add_worklist($extension_requested_by, $dm_object_id);

                                    if ($extension_approval_type == "Accepted") {
                                        $dms_processor->extend_dms_target_dates($dm_object_id, 'exam', $proposed_target_date);
                                    }
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Exam Target Date Extension - $extension_approval_type | [Info Mail]";
                                    $actionDescription = "The $lm_doc_short_name  Extension Request is $extension_approval_type";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Extension for" => $extension_for,
                                        "Approval Status" => $extension_approval_type,
                                        "Remarks" => $extension_approval_comments,
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($extension_requested_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                    header("Location:$_SERVER[REQUEST_URI]");
                                }
                            }
                        }
                    }
                }
            }
        }

        //**** 4. Task Required **//
        if ($dm_master->task_status === "Pending" && $dm_master->is_task_required == "yes") {
            //1.Allow Task Creation,2.Assign to pri person 3.Assign Secondary Responsible Person,3.Recall Replacement Task priamry & sec person 4.Assigm more task to pri person, 5.task Update By Secondary Responsible Person, 6.task Update By Primary Responsible Person,7.task verification By Creator,if target date not exceed **//
            if ($dm_master->task_target_date && is_target_date_exceeded($dm_master->task_target_date, $date_time) == false) {

                //****1.Start Of Task Creation **//
                if ($wf_status == "Pending for Task Creation") {
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'to_assign_task') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                        $smarty->assign('task_creation_btn', true);

                        $task_id = (isset($_REQUEST['task_id'])) ? $_REQUEST['task_id'] : null;
                        $task = (isset($_REQUEST['task'])) ? $_REQUEST['task'] : null;
                        $pri_per_id = (isset($_REQUEST['pri_per_id'])) ? $_REQUEST['pri_per_id'] : null;

                        //Save Task
                        if (isset($_POST['save_task'])) {
                            if ($dms_processor->add_dms_task_details($dm_object_id, $task_id, $task, $pri_per_id, 'save', 'first_time', $usr_id, $date_time)) {
                                header("Location:$_SERVER[REQUEST_URI]");
                            } else {
                                $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                            }
                        }

                        //Submit Task
                        if (isset($_POST['add_task'])) {
                            if ($dms_processor->add_dms_task_details($dm_object_id, $task_id, $task, $pri_per_id, 'assing_pri_per', 'first_time', $usr_id, $date_time)) {
                                delete_worklist($usr_id, $dm_object_id);
                                update_workflow($dm_object_id, $usr_id, 'Assigned', 'to_assign_task');

                                $dms_processor->update_dev_wf_status($dm_object_id, "Pending Task Completion");
                                for ($i = 0; $i < count($task); $i++) {
                                    if (is_user_in_workflow_action($dm_object_id, $pri_per_id[$i], 'task_primary_person') == false) {
                                        add_worklist($pri_per_id[$i], $dm_object_id);
                                        save_workflow($dm_object_id, $pri_per_id[$i], 'Pending', 'task_primary_person');
                                    }
                                }

                                $unique_users = array_unique($pri_per_id);
                                foreach ($unique_users as $unique_user) {
                                    $task_details = '';
                                    $keys = array_keys($pri_per_id, $unique_user);
                                    for ($j = 0; $j < count($keys); $j++) {
                                        $index = $keys[$j];
                                        $task_details .= $task_id[$index] . " - " . $task[$index] . "<br>";
                                    }
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Task Assigned | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name is Pending for Task Completion";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Task Details" => $task_details,
                                        "Target Date" => display_date_format($dm_master->task_target_date),
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($unique_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                }
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                }
                //****1.Assign to sec , 2.Task Update By Sec per**//
                if ($wf_status == "Pending Task Completion") {
                    //****1.Assign Secondary responsible Person,2.Task Update By Pri per ,3.Recall Sec Per**//
                    if (check_user_in_worklist($dm_object_id, $usr_id) && (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'task_primary_person'))) {
                        // Assign Secondary Responsible Person
                        if ($dms_processor->is_dms_task_eligible_to_assign_sec_per($dm_object_id, $usr_id)) {
                            $smarty->assign('task_assign_to_sec_per_btn', true);
                            $smarty->assign('task_to_sec_res_person', $dms_processor->get_dms_task_details($dm_object_id, null, $usr_id, null, "Pending", null, null, null, "to_be_assigned"));

                            if (isset($_POST['assign_task_to_sec_per'])) {
                                $task_object_id_array = (isset($_REQUEST['task_object_id'])) ? $_REQUEST['task_object_id'] : null;
                                $sec_per_id = (isset($_REQUEST['sec_per_id'])) ? $_REQUEST['sec_per_id'] : null;

                                $unique_users = array_unique($sec_per_id);
                                foreach ($unique_users as $unique_user) {
                                    $task_at_o = "NA";
                                    $task_details_old = $dms_processor->get_dms_task_details($dm_object_id, null, null, $unique_user);
                                    for ($k = 0; $k < count($task_details_old); $k++) {
                                        $task_at_o .= "\n\nTask Id : " . $task_details_old[$k]['task_id'] . "\nSecondary Responsible Person : " . $task_details_old[$k]['sec_per_name'];
                                    }
                                }

                                for ($i = 0; $i < count($task_object_id_array); $i++) {
                                    if ($dms_processor->update_dms_task_details($task_object_id_array[$i], $dm_object_id, null, $sec_per_id[$i], null, 'Pending', null, null, null, null, null, 'Assigned')) {
                                        add_worklist($sec_per_id[$i], $dm_object_id);
                                        save_workflow($dm_object_id, $sec_per_id[$i], 'Pending', 'task_secondary_person');
                                    }
                                }

                                foreach ($unique_users as $unique_user) {
                                    $task_detls = '';
                                    $keys = array_keys($sec_per_id, $unique_user);
                                    for ($j = 0; $j < count($keys); $j++) {
                                        $index = $keys[$j];
                                        $task_details = array_shift($dms_processor->get_dms_task_details($dm_object_id, $task_object_id_array[$index]));
                                        $task_detls .= $task_details['task_id'] . " - " . $task_details['task'] . "<br>";

                                        $task_at_n .= "\n\nTask Id : " . $task_details['task_id'] . "\nSecondary Responsible Person : " . getFullName($unique_user);
                                        $task_at_p .= "\n\nTask Id: " . $task_details['task_id'] . "\nSecondary Responsible Person : " . $unique_user . " - " . getFullName($unique_user) . "\nDepartment : " . getDeptId($unique_user) . " - " . getDeptName($unique_user) . "\nPlant : " . getUserPlantId($unique_user) . " - " . getPlantShortName(getUserPlantId($unique_user));
                                    }

                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Task Assigned | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name is Pending for Task Completion";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Task Details" => $task_detls,
                                        "Target Date" => display_date_format($dm_master->task_target_date),
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($unique_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                }
                                $at_data['Task Details'] = array($task_at_o, $task_at_n, $task_at_p);
                                addAuditTrailLog($dm_object_id, null, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }

                        //Task Update By Pri per
                        if ($pri_per_pending_task_details = array_merge($dms_processor->get_dms_task_details($dm_object_id, null, $usr_id, null, 'Pending', 'Completed', null, 'Pending', "to_be_reviewed") ?? [], $dms_processor->get_dms_task_details($dm_object_id, null, $usr_id, null, 'Pending', 'Completed', 'Pending', 'Pending', "creator_needs_correction") ?? [])) {
                            $smarty->assign('pri_per_task_update_btn', true);
                            $smarty->assign('pri_per_pending_task_details', $pri_per_pending_task_details);

                            //Submit Task
                            if (isset($_POST['pri_per_task_update_submit'])) {
                                $task_object_id_array = (isset($_POST['task_object_id'])) ? $_POST['task_object_id'] : null;
                                $pri_per_task_comments = (isset($_POST['pri_per_task_comments'])) ? $_POST['pri_per_task_comments'] : null;
                                $pri_per_task_status = (isset($_POST['pri_per_task_status'])) ? $_POST['pri_per_task_status'] : null;

                                if ($dms_processor->add_dms_task_review_comments($task_object_id_array, $pri_per_task_comments, "task_pri_per", $usr_id, $date_time)) {
                                    for ($i = 0; $i < count($task_object_id_array); $i++) {
                                        $old_task = $dms_processor->get_dms_task_obj($task_object_id_array[$i]);

                                        // if task complted by pri per
                                        if ($old_task->task_status_pri == "Pending" && $pri_per_task_status[$i] === "Completed") {
                                            $dms_processor->update_dms_task_details($task_object_id_array[$i], $dm_object_id, $usr_id, null, 'Completed', null, $date_time, null, "Pending", null, "Completed", 'to_be_verified');
                                            add_worklist($old_task->created_by, $dm_object_id);
                                            save_workflow($dm_object_id, $old_task->created_by, 'Pending', 'task_verification');
                                            $dms_processor->update_dms_task_review_comments_is_latest($task_object_id_array[$i], "task_creator", "no");

                                            //**** Send Mail**//
                                            $subject = "$lm_doc_short_name | $dm_no | Task Completed - Primary Person | [Action Required]";
                                            $actionDescription = "The $lm_doc_short_name task ($old_task->task_id) has been completed";
                                            $mail_details = [
                                                "Deviation No." => $dm_no,
                                                "Task Details" => $old_task->task_id . " - " . $old_task->task,
                                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                "Sent By" => $_SESSION['full_name']
                                            ];
                                            send_workflow_mail($old_task->created_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                            $task_at_p = "\n\nTask Id: $old_task->task_id\n Task Object ID : $task_object_id_array[$i]\nPri Res Per : {$usr_id} - " . getFullName($usr_id) . "\nDepartment : " . getDeptId($usr_id) . " - " . getDeptName($usr_id) . "\nPlant : " . getUserPlantId($usr_id) . " - " . getPlantShortName(getUserPlantId($usr_id));
                                            $at_data['Task Id'] = array($old_task->task_id, $old_task->task_id, $task_at_p);
                                            $at_data['Task Status'] = array($old_task->task_status_pri, "Completed", "Completed");
                                            addAuditTrailLog($dm_object_id, $task_object_id_array[$i], $at_data, $_POST['audit_trail_action'], 'Task Completed');
                                        }
                                        //Needs Correction
                                        if ($pri_per_task_status[$i] === "needs_correction") {
                                            $dms_processor->update_dms_task_details($task_object_id_array[$i], $dm_object_id, $usr_id, null, null, "Pending", null, null, null, null, 'Pending', "pri_per_needs_correction");
                                            $dms_processor->update_dms_task_review_comments_is_latest($task_object_id_array[$i], "task_sec_per", "no");
                                            add_worklist($old_task->sec_per_id, $dm_object_id);
                                            update_workflow($dm_object_id, $old_task->sec_per_id, "Pending", 'task_secondary_person');

                                            //**** Send Mail**//
                                            $subject = "$lm_doc_short_name | $dm_no | Task Needs Correction | [Action Required]";
                                            $actionDescription = "The $lm_doc_short_name task ($old_task->task_id) Needs Some Corrections";
                                            $mail_details = [
                                                "Deviation No." => $dm_no,
                                                "Task Details" => $old_task->task_id . " - " . $old_task->task,
                                                "Target Date" => display_date_format($dm_master->task_target_date),
                                                "Query/Remarks" => $pri_per_task_comments[$i],
                                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                "Sent By" => $_SESSION['full_name']
                                            ];
                                            send_workflow_mail($old_task->sec_per_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                            $task_at_p = "\n\nTask Id: $old_task->task_id\n Task Object ID : $task_object_id_array[$i]\nPri Res Per : {$usr_id} - " . getFullName($usr_id) . "\nDepartment : " . getDeptId($usr_id) . " - " . getDeptName($usr_id) . "\nPlant : " . getUserPlantId($usr_id) . " - " . getPlantShortName(getUserPlantId($old_task->sec_per_id)) . "\nSec Res Per : {$old_task->sec_per_id} - " . getFullName($old_task->sec_per_id) . "\nDepartment : " . getDeptId($old_task->sec_per_id) . " - " . getDeptName($old_task->sec_per_id) . "\nPlant : " . getUserPlantId($old_task->sec_per_id) . " - " . getPlantShortName(getUserPlantId($old_task->sec_per_id));
                                            $at_data['Task Id'] = array($old_task->task_id, $old_task->task_id, $task_at_p);
                                            $at_data['Task Status'] = array("Review", "Needs Correction", "Needs Correction");
                                            $at_data['Needs Correction'] = array("NA", "From " . getFullName($usr_id) . " To " . getFullName($old_task->sec_per_id), $sec_per_id . " - " . getFullName($old_task->sec_per_id));
                                            $at_data['Reason'] = array('NA', $pri_per_task_comments[$i], $pri_per_task_comments[$i]);
                                            addAuditTrailLog($dm_object_id, $task_object_id_array[$i], $at_data, $_POST['audit_trail_action'], 'Task Needs Correction');
                                        }
                                    }
                                    // if all sec_per_task is completed
                                    if ($dms_processor->is_dms_task_completed($dm_object_id, $usr_id, null) === "Completed") {
                                        update_workflow($dm_object_id, $usr_id, "Completed", 'task_primary_person');
                                        if (check_user_in_workflow($dm_object_id, $usr_id, 'Pending', 'task_secondary_person') == false && check_user_in_workflow($dm_object_id, $usr_id, 'Pending', 'task_verification') == false) {
                                            delete_worklist($usr_id, $dm_object_id);
                                        }
                                    }
                                    //File attachments
                                    $dms_processor->add_dms_task_attachment($dm_object_id, 'task_pri_per', $usr_id, $date_time);
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }

                        //Recall Sec Per
                        if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'task_primary_person')) {
                            if ($sec_task_pending_userlist = $dms_processor->get_dms_task_details($dm_object_id, null, $usr_id, null, 'Pending', 'Pending', null, 'Pending', null)) {
                                $smarty->assign('recall_task_sec_per_button', true);
                                $smarty->assign('recall_sec_pending_users_list', $sec_task_pending_userlist);

                                //**** Replace **//
                                if (isset($_POST['recall_replace_sec'])) {
                                    $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                                    $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                                    $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;
                                    $task_object_id = (isset($_REQUEST['task_object_id'])) ? $_REQUEST['task_object_id'] : null;

                                    if ($replacement_pending_user_array) {
                                        $replacement_count = 1;
                                        for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                                            $recall_user = $replacement_pending_user_array[$i];
                                            $replaced_by = $replacement_user_array[$i];

                                            if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'task_secondary_person')) {
                                                if ($dms_processor->update_dms_task_details($task_object_id[$i], $dm_object_id, null, $replaced_by, null, null, null, null, null, null, null, null) == true) {
                                                    add_worklist($replaced_by, $dm_object_id);
                                                    save_workflow($dm_object_id, $replaced_by, 'Pending', 'task_secondary_person');

                                                    // if any pending with same pri per or some other prim peros are there
                                                    if ($dms_processor->is_dms_task_completed($dm_object_id, null, $recall_user) === "Completed") {
                                                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_primary_person") == false && check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_verification") == false) {
                                                            delete_worklist($recall_user, $dm_object_id);
                                                        }
                                                        update_workflow($dm_object_id, $recall_user, "Completed", 'task_secondary_person');
                                                    } elseif ($dms_processor->is_dms_task_completed($dm_object_id, null, $recall_user) === "not_in_task") {
                                                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_primary_person") == false && check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_verification") == false) {
                                                            delete_worklist($recall_user, $dm_object_id);
                                                        }
                                                        delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "task_secondary_person");
                                                    }
                                                }

                                                $task_obj = $dms_processor->get_dms_task_obj($task_object_id[$i]);
                                                //**** Audit Trail**//
                                                $recall_user_name = getFullName($recall_user);
                                                $replaced_by_name = getFullName($replaced_by);

                                                $recall_user_at_o .= "\n\t\tTask Id : $task_obj->task_id : $recall_user_name";
                                                $recall_user_at_n .= "\n\t\tTask Id : $task_obj->task_id : $replaced_by_name";
                                                $recall_user_at_p .= "\n\t\t$task_obj->object_id - $task_obj->task_id\n$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                                                $task_dtls = "\n\nTask Id : " . $task_obj->task_id . " - Task : " . $task_obj->task . "<br>";

                                                //**** Send Mail Recall user**//
                                                $subject = "$lm_doc_short_name | $dm_no | Task Assigned | [Action Required]";
                                                $actionDescription = "The $lm_doc_short_name is Pending for Task Completion";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Task Details" => $task_dtls,
                                                    "Target Date" => display_date_format($dm_master->task_target_date),
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Sent By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                                //**** Send Mail**//
                                                $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                                                $actionDescription = "The $lm_doc_short_name is Recalled from Task";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Reason for Recall" => $recall_reason,
                                                    "Recalled From" => $recall_user_name,
                                                    "Replaced To" => $replaced_by_name,
                                                    "Recalled By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                                $replacement_count++;
                                            }
                                        }
                                        if ($replacement_count != 1) {
                                            $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                                            $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                                            addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                                        }
                                    }
                                    header("Location:$_SERVER[REQUEST_URI]");
                                }
                            }
                        }
                    }

                    //****2.Add More Task & Recall Replace Of Pri Person By Creator**//
                    if (check_user_in_workflow($dm_object_id, $usr_id, "Assigned", 'to_assign_task')) {
                        $smarty->assign('add_more_task_tab', true);

                        //Add More Task
                        if (isset($_POST['add_more_task'])) {
                            $task_id = (isset($_REQUEST['task_id'])) ? $_REQUEST['task_id'] : null;
                            $task = (isset($_REQUEST['task'])) ? $_REQUEST['task'] : null;
                            $pri_per_id = (isset($_REQUEST['pri_per_id'])) ? $_REQUEST['pri_per_id'] : null;

                            if ($dms_processor->add_dms_task_details($dm_object_id, $task_id, $task, $pri_per_id, 'assing_pri_per', 'add_more_task', $usr_id, $date_time)) {
                                for ($i = 0; $i < count($task); $i++) {
                                    add_worklist($pri_per_id[$i], $dm_object_id);
                                    save_workflow($dm_object_id, $pri_per_id[$i], 'Pending', 'task_primary_person');
                                }
                                $unique_users = array_unique($pri_per_id);
                                foreach ($unique_users as $unique_user) {
                                    $task_details = '';
                                    $keys = array_keys($pri_per_id, $unique_user);
                                    for ($j = 0; $j < count($keys); $j++) {
                                        $index = $keys[$j];
                                        $task_details .= $task_id[$index] . " - " . $task[$index] . "<br>";
                                    }
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Task Assigned | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name is Pending for Task Completion";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Task Details" => $task_details,
                                        "Target Date" => display_date_format($dm_master->task_target_date),
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($unique_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                }
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }

                        //Recall Replace Pri person by Creator
                        if (is_action_finished($dm_object_id, 'task_primary_person', "Completed") == false) {
                            $smarty->assign('recall_task_pri_per_button', true);

                            $task_pri_pending_userlist = get_workflow_userlist_by_objectid_action_status($dm_object_id, 'task_primary_person', 'Pending');
                            $smarty->assign('recall_from', 'Task Primary Responsible Person');
                            $smarty->assign('disable_duplicate_validation', true);
                            $smarty->assign('recall_replace_option', true);
                            $smarty->assign('recall_dept_users', true);
                            $smarty->assign('recall_object_id', $dm_object_id);
                            $smarty->assign('recall_pending_users_list', $task_pri_pending_userlist);

                            //**** Replace **//
                            if (isset($_POST['recall_replace'])) {
                                $replacement_pending_user_array = (isset($_REQUEST['replacement_pending_user'])) ? $_REQUEST['replacement_pending_user'] : null;
                                $replacement_user_array = (isset($_REQUEST['replacement_user'])) ? $_REQUEST['replacement_user'] : null;
                                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                                if ($replacement_pending_user_array) {
                                    $replacement_count = 1;
                                    for ($i = 0; $i < count($replacement_pending_user_array); $i++) {
                                        $recall_user = $replacement_pending_user_array[$i];
                                        $replaced_by = $replacement_user_array[$i];

                                        if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", 'task_primary_person')) {
                                            $recall_user_task_pending_details = $dms_processor->get_dms_task_details($dm_object_id, null, $recall_user, null, "Pending");
                                            if ($recall_user_task_pending_details) {
                                                for ($j = 0; $j < count($recall_user_task_pending_details); $j++) {
                                                    $task_dtls .= "\n\nTask Id : " . $recall_user_task_pending_details[$j]['task_id'] . " - Task : " . $recall_user_task_pending_details[$j]['task'] . "<br>";
                                                    if ($dms_processor->update_dms_task_details($recall_user_task_pending_details[$j]['object_id'], $dm_object_id, $replaced_by, null, null, null, null, null, null, null, null, null)) {
                                                        add_worklist($replaced_by, $dm_object_id);
                                                        save_workflow($dm_object_id, $replaced_by, 'Pending', 'task_primary_person');
                                                        $task_obj = $dms_processor->get_dms_task_obj($recall_user_task_pending_details[$j]['object_id']);

                                                        //**** Audit Trail**//
                                                        $recall_user_name = getFullName($recall_user);
                                                        $replaced_by_name = getFullName($replaced_by);

                                                        $recall_user_at_o .= "\n\t\tTask Id : $task_obj->task_id : $recall_user_name";
                                                        $recall_user_at_n .= "\n\t\tTask Id : $task_obj->task_id : $replaced_by_name";
                                                        $recall_user_at_p .= "\n\t\t$task_obj->object_id - $task_obj->task_id\n$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";
                                                    }
                                                }

                                                // if any pending with sec per or is in task verfication
                                                if ($dms_processor->is_dms_task_completed($dm_object_id, $recall_user, null) === "Completed") {
                                                    if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_secondary_person") == false && check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_verification") == false) {
                                                        delete_worklist($recall_user, $dm_object_id);
                                                    }
                                                    update_workflow($dm_object_id, $recall_user, "Completed", 'task_primary_person');
                                                } elseif ($dms_processor->is_dms_task_completed($dm_object_id, $recall_user, null) === "not_in_task") {
                                                    if (check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_secondary_person") == false && check_user_in_workflow($dm_object_id, $recall_user, "Pending", "task_verification") == false) {
                                                        delete_worklist($recall_user, $dm_object_id);
                                                    }
                                                    delete_user_workflow_action($dm_object_id, $recall_user, "Pending", "task_primary_person");
                                                }

                                                //**** Send Mail Recall user**//
                                                $subject = "$lm_doc_short_name | $dm_no | Task Assigned | [Action Required]";
                                                $actionDescription = "The $lm_doc_short_name is Pending for Task Completion";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Task Details" => $task_dtls,
                                                    "Target Date" => display_date_format($dm_master->task_target_date),
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Sent By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                                //**** Send Mail**//
                                                $subject = "$lm_doc_short_name | $dm_no | Recalled | [Info Mail]";
                                                $actionDescription = "The $lm_doc_short_name is Recalled from Task";
                                                $mail_details = [
                                                    "Deviation No." => $dm_no,
                                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                    "Reason for Recall" => $recall_reason,
                                                    "Recalled From" => $recall_user_name,
                                                    "Replaced To" => $replaced_by_name,
                                                    "Recalled By" => $_SESSION['full_name']
                                                ];
                                                send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                                $replacement_count++;
                                            }
                                        }
                                    }
                                    if ($replacement_count != 1) {
                                        $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                                        $at_data[] = array("Recalled From : $recall_user_at_o", "Replaced To : $recall_user_at_n", "Replacement Details : $recall_user_at_p");
                                        addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                                    }
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }

                    //****3.Task Update By Sec per**//
                    if (check_user_in_worklist($dm_object_id, $usr_id) && (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'task_secondary_person'))) {
                        if ($sec_per_pending_task_details = $dms_processor->get_dms_task_details($dm_object_id, null, null, $usr_id, null, 'Pending', null, 'Pending', null)) {
                            $smarty->assign('sec_per_task_update_btn', true);
                            $smarty->assign('sec_per_pending_task_details', $sec_per_pending_task_details);

                            //Submit Task
                            if (isset($_POST['sec_per_task_update_submit'])) {
                                $task_object_id_array = (isset($_POST['task_object_id'])) ? $_POST['task_object_id'] : null;
                                $sec_per_task_comments = (isset($_POST['sec_per_task_comments'])) ? $_POST['sec_per_task_comments'] : null;
                                $sec_per_task_status = (isset($_POST['sec_per_task_status'])) ? $_POST['sec_per_task_status'] : null;

                                if ($dms_processor->add_dms_task_review_comments($task_object_id_array, $sec_per_task_comments, "task_sec_per", $usr_id, $date_time)) {
                                    for ($i = 0; $i < count($task_object_id_array); $i++) {
                                        $old_task = $dms_processor->get_dms_task_obj($task_object_id_array[$i]);
                                        // if task complted by sec per
                                        if ($old_task->task_status_sec == "Pending" && $sec_per_task_status[$i] === "Completed") {
                                            $dms_processor->update_dms_task_details($task_object_id_array[$i], $dm_object_id, null, $usr_id, null, 'Completed', null, $date_time, null, null, null, 'to_be_reviewed');
                                            $dms_processor->update_dms_task_review_comments_is_latest($task_object_id_array[$i], "task_pri_per", "no");

                                            //**** Send Mail**//
                                            $subject = "$lm_doc_short_name | $dm_no | Task Completed - Secondary Person | [Action Required]";
                                            $actionDescription = "The $lm_doc_short_name task ($old_task->task_id) has been completed";
                                            $mail_details = [
                                                "Deviation No." => $dm_no,
                                                "Task Details" => $old_task->task_id . " - " . $old_task->task,
                                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                "Sent By" => $_SESSION['full_name']
                                            ];
                                            send_workflow_mail($old_task->pri_per_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                            $task_at_p = "\n\nTask Id: $old_task->task_id\n Task Object ID : $task_object_id_array[$i]\nSec Res Per : {$usr_id} - " . getFullName($usr_id) . "\nDepartment : " . getDeptId($usr_id) . " - " . getDeptName($usr_id) . "\nPlant : " . getUserPlantId($usr_id) . " - " . getPlantShortName(getUserPlantId($usr_id));
                                            $at_data['Task Id'] = array($old_task->task_id, $old_task->task_id, $task_at_p);
                                            $at_data['Task Status'] = array($old_task->task_status_sec, "Completed", "Completed");
                                            addAuditTrailLog($dm_object_id, $task_object_id_array[$i], $at_data, $_POST['audit_trail_action'], 'Task Completed');
                                        }
                                    }
                                    // if all sec_per_task is completed
                                    if ($dms_processor->is_dms_task_completed($dm_object_id, null, $usr_id) == "Completed") {
                                        update_workflow($dm_object_id, $usr_id, "Completed", 'task_secondary_person');
                                        if (check_user_in_workflow($dm_object_id, $usr_id, 'Pending', 'task_primary_person') == false && check_user_in_workflow($dm_object_id, $usr_id, 'Pending', 'task_verification') == false) {
                                            delete_worklist($usr_id, $dm_object_id);
                                        }
                                    }
                                    //File attachments
                                    $dms_processor->add_dms_task_attachment($dm_object_id, 'task_sec_per', $usr_id, $date_time);
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }

                    //****4.Task Verify By Creator**//
                    if (check_user_in_worklist($dm_object_id, $usr_id) && (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'task_verification'))) {
                        if ($creator_pending_task_details = $dms_processor->get_dms_task_details($dm_object_id, null, null, null, 'Completed', 'Completed', "Pending", 'Completed', "to_be_verified")) {
                            $smarty->assign('creator_task_update_btn', true);
                            $smarty->assign('creator_pending_task_details', $creator_pending_task_details);

                            //Submit Task
                            if (isset($_POST['creator_task_update_submit'])) {
                                $task_object_id_array = (isset($_POST['task_object_id'])) ? $_POST['task_object_id'] : null;
                                $task_review_comments = (isset($_POST['task_review_comments'])) ? $_POST['task_review_comments'] : null;
                                $task_review_status = (isset($_POST['task_review_status'])) ? $_POST['task_review_status'] : null;

                                if ($dms_processor->add_dms_task_review_comments($task_object_id_array, $task_review_comments, "task_creator", $usr_id, $date_time)) {
                                    for ($i = 0; $i < count($task_object_id_array); $i++) {
                                        $old_task = $dms_processor->get_dms_task_obj($task_object_id_array[$i]);

                                        // If task completed by creator
                                        if ($old_task->task_status_creator == "Pending" && $task_review_status[$i] === "Completed") {
                                            $dms_processor->update_dms_task_details($task_object_id_array[$i], $dm_object_id, null, null, null, null, null, null, "Completed", $date_time, null, "Completed");

                                            $task_at_p = "\n\nTask Id: $old_task->task_id\n Task Object ID : $task_object_id_array[$i]\nCreator : {$usr_id} - " . getFullName($usr_id) . "\nDepartment : " . getDeptId($usr_id) . " - " . getDeptName($usr_id) . "\nPlant : " . getUserPlantId($usr_id) . " - " . getPlantShortName(getUserPlantId($usr_id));
                                            $at_data['Task Id'] = array($old_task->task_id, $old_task->task_id, $task_at_p);
                                            $at_data['Task Status'] = array($old_task->task_status_creator, "Completed", "Completed");
                                            addAuditTrailLog($dm_object_id, $task_object_id_array[$i], $at_data, $_POST['audit_trail_action'], 'Task Reviewed');
                                        }
                                        //Needs Correction
                                        if ($old_task->task_status_creator == "Pending" && $task_review_status[$i] === "needs_correction") {
                                            $dms_processor->update_dms_task_details($task_object_id_array[$i], $dm_object_id, null, null, "Pending", null, null, null, null, null, "Pending", "creator_needs_correction");
                                            $dms_processor->update_dms_task_review_comments_is_latest($task_object_id_array[$i], "task_pri_per", "no");
                                            add_worklist($old_task->pri_per_id, $dm_object_id);
                                            update_workflow($dm_object_id, $old_task->pri_per_id, "Pending", 'task_primary_person');

                                            //**** Send Mail**//
                                            $subject = "$lm_doc_short_name | $dm_no | Task Needs Correction | [Action Required]";
                                            $actionDescription = "The $lm_doc_short_name task ($old_task->task_id) needs correction";
                                            $mail_details = [
                                                "Deviation No." => $dm_no,
                                                "Task Details" => $old_task->task_id . " - " . $old_task->task,
                                                "Target Date" => display_date_format($dm_master->task_target_date),
                                                "Query/Remarks" => $task_review_comments[$i],
                                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                                "Sent By" => $_SESSION['full_name']
                                            ];
                                            send_workflow_mail($old_task->pri_per_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                            $task_at_p = "\n\nTask Id: $old_task->task_id\n Task Object ID : $task_object_id_array[$i]\nCreator : {$usr_id} - " . getFullName($usr_id) . "\nDepartment : " . getDeptId($usr_id) . " - " . getDeptName($usr_id) . "\nPlant : " . getUserPlantId($usr_id) . " - " . getPlantShortName(getUserPlantId($usr_id)) . "\nPri Res Per : {$old_task->pri_per_id} - " . getFullName($old_task->pri_per_id) . "\nDepartment : " . getDeptId($old_task->pri_per_id) . " - " . getDeptName($old_task->pri_per_id) . "\nPlant : " . getUserPlantId($old_task->pri_per_id) . " - " . getPlantShortName(getUserPlantId($old_task->pri_per_id));
                                            $at_data['Task Id'] = array($old_task->task_id, $old_task->task_id, $task_at_p);
                                            $at_data['Task Status'] = array("Verification", "Needs Correction", "Needs Correction");
                                            $at_data['Needs Correction'] = array("NA", "From " . getFullName($usr_id) . " To " . getFullName($old_task->pri_per_id), $pri_per_id . " - " . getFullName($old_task->pri_per_id));
                                            $at_data['Reason'] = array('NA', $task_review_comments[$i], $task_review_comments[$i]);
                                            addAuditTrailLog($dm_object_id, $task_object_id_array[$i], $at_data, $_POST['audit_trail_action'], 'Task Needs Correction');
                                        }
                                    }
                                    // If all tasks are completed
                                    if ($dms_processor->is_dms_task_completed($dm_object_id, null, null, $usr_id) === "Completed") {
                                        update_workflow($dm_object_id, $usr_id, "Completed", 'task_verification');
                                        $dms_processor->update_dms_meeting_training_exam_task_status($dm_object_id, 'task', "Completed");
                                        $dms_processor->update_dev_wf_status($dm_object_id, "Pending Close Out");
                                        delete_worklist($usr_id, $dm_object_id);
                                        add_worklist($qa_approver, $dm_object_id);
                                        save_workflow($dm_object_id, $qa_approver, 'Pending', 'close_out');

                                        //**** Send Mail**//
                                        $subject = "$lm_doc_short_name | $dm_no | Pending Close Out | [Action Required]";
                                        $actionDescription = "The $lm_doc_short_name is pending close out";
                                        $mail_details = [
                                            "Deviation No." => $dm_no,
                                            "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                            "Sent By" => $_SESSION['full_name']
                                        ];
                                        send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                    }
                                    //File attachments
                                    $dms_processor->add_dms_task_attachment($dm_object_id, 'task_creator', $usr_id, $date_time);
                                }
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }
                }
            } else {
                if ($dms_processor->show_dms_extension_btn_for($dm_object_id) == "show_task_ext_btn") {
                    $smarty->assign('show_overdue_msg_notifi', true);
                    $smarty->assign('show_info_tab_info', "Task Overdue ! The Task target date (<span class='vd_red font-semibold'>$dm_master->task_target_date</span>) has exceeded. Request an extension.");

                    //****Task Target Date Extension**//
                    if ((is_extension_elegible_to_raise($dm_object_id, 'Task') == true) && check_user_in_worklist($dm_object_id, $usr_id)) {
                        $smarty->assign('request_task_extension_btn', true);
                        $smarty->assign('extension_for', "TASK");
                        $smarty->assign('existing_target_date', $dm_master->task_target_date);

                        if (isset($_POST['extension_requested'])) {
                            $exisiting_target_date = (isset($_REQUEST['exisiting_target_date'])) ? $_REQUEST['exisiting_target_date'] : null;
                            $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                            $extension_reason = (isset($_REQUEST['extension_reason'])) ? $_REQUEST['extension_reason'] : null;

                            if (add_extension_details($dm_object_id, $dm_object_id, $exisiting_target_date, $proposed_target_date, "Task", $extension_reason, "Task - Extension Requested", $qa_approver, $wf_status, $usr_id, $date_time)) {
                                $dms_processor->update_dev_wf_status($dm_object_id, "Pending Extension of Task Target Date");
                                delete_worklist($usr_id, $dm_object_id);
                                add_worklist($qa_approver, $dm_object_id);

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $dm_no | Request for Extending Task Target Date | [Action Required]";
                                $actionDescription = "The $lm_doc_short_name Requires Extension for the Task Target Date";
                                $mail_details = [
                                    "Deviation No." => $dm_no,
                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    "Extension for" => "Task",
                                    "Existing Target Date" => display_date_format($exisiting_target_date),
                                    "Proposed Target Date" => display_date_format($proposed_target_date),
                                    "Reason" => $extension_reason,
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            }
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                    //***Extension of Task Targat Date Approval***/-
                    if ($wf_status == "Pending Extension of Task Target Date") {
                        $smarty->assign('show_info_tab_info', "Task Overdue ! The Task target date (<span class='vd_red font-semibold'>$dm_master->task_target_date</span>) has exceeded. Pending approval for an extension.");
                        if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'qa_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                            $extension_details = get_extension_details(null, $dm_object_id, 'Task', "Pending");
                            $smarty->assign('task_extension_approval_btn', true);
                            $smarty->assign('pending_extension_details', $extension_details);
                            $smarty->assign('show_extended_dates', $dms_processor->show_extended_dms_target_date_details($dm_object_id, "task", $extension_details[0]['proposed_target_date']));

                            if (isset($_POST['extension_approval'])) {
                                $extension_approval_type = (isset($_REQUEST['extension_approval_type'])) ? $_REQUEST['extension_approval_type'] : null;
                                $extension_object_id = (isset($_REQUEST['extension_object_id'])) ? $_REQUEST['extension_object_id'] : null;
                                $extension_for = (isset($_REQUEST['extension_for'])) ? $_REQUEST['extension_for'] : null;
                                $ref_object_id1 = (isset($_REQUEST['ref_object_id1'])) ? $_REQUEST['ref_object_id1'] : null;
                                $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                                $extension_approval_comments = (isset($_REQUEST['extension_approval_comments'])) ? $_REQUEST['extension_approval_comments'] : null;
                                $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;

                                $extension_status = get_extension_details_by_request_field($dm_object_id, "Task", "Pending", "wf_status");
                                $extension_requested_by = get_extension_details_by_request_field($dm_object_id, "Task", "Pending", "created_by_id");
                                if (accept_reject_extension_details($extension_object_id, $dm_object_id, $extension_approval_type, $extension_approval_comments, "Task - Pending", $usr_id, $date_time, $audit_trail_action)) {
                                    $dms_processor->update_dev_wf_status($dm_object_id, $extension_status);
                                    if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", "to_assign_task") == false && check_user_in_workflow($dm_object_id, $usr_id, "Pending", "task_primary_person") == false && check_user_in_workflow($dm_object_id, $usr_id, "Pending", "task_secondary_person") == false && check_user_in_workflow($dm_object_id, $usr_id, "Pending", "task_verification") == false) {
                                        delete_worklist($usr_id, $dm_object_id);
                                    }
                                    add_worklist($extension_requested_by, $dm_object_id);

                                    if ($extension_approval_type == "Accepted") {
                                        $dms_processor->extend_dms_target_dates($dm_object_id, 'task', $proposed_target_date);
                                    }
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | Task Target Date Extension - $extension_approval_type | [Info Mail]";
                                    $actionDescription = "The $lm_doc_short_name  Extension Request is $extension_approval_type";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                        "Extension for" => $extension_for,
                                        "Approval Status" => $extension_approval_type,
                                        "Remarks" => $extension_approval_comments,
                                        "Sent By" => $_SESSION['full_name']
                                    ];
                                    send_workflow_mail($extension_requested_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                    header("Location:$_SERVER[REQUEST_URI]");
                                }
                            }
                        }
                    }
                }
            }
        }

        //**** 5. Closeout.Sytem should not allow close out if the target date exceeded**/
        if (is_target_date_exceeded($dm_master->target_date, $date_time) == false) {
            //****Close Out **//
            if ($wf_status == "Pending Close Out") {
                if (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'close_out') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                    $smarty->assign('close_out_button', true);
                    $smarty->assign('dept_head_list', get_doc_mgmt_auth_users($lm_doc_id, 'dept_approve', null));
                    $add_file_attachemnt = true;
                    $smarty->assign('edit_attachment', $add_file_attachemnt);
                    $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id));
                    $smarty->assign('file_attachment_towards', "close_out");

                    if (isset($_POST['close_out'])) {
                        $is_capa_required = (isset($_REQUEST['udev_capa'])) ? $_REQUEST['udev_capa'] : null;
                        $capa_dept_head = (isset($_REQUEST['capa_dept_head'])) ? $_REQUEST['capa_dept_head'] : null;
                        $capa_reason = (isset($_REQUEST['capa_reason'])) ? $_REQUEST['capa_reason'] : null;
                        $is_cc_required = (isset($_REQUEST['udev_cc'])) ? $_REQUEST['udev_cc'] : null;
                        $cc_reason = (isset($_REQUEST['cc_reason'])) ? $_REQUEST['cc_reason'] : null;
                        $cc_dept_head = (isset($_REQUEST['cc_dept_head'])) ? $_REQUEST['cc_dept_head'] : null;
                        $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;
                        $_POST['udev_close_out_date'] = $date_time;
                        $_POST['udev_completed_date'] = $date_time;

                        if ($dms_processor->update_dms_details($dm_object_id, data_null_validator($_POST))) {
                            delete_worklist($usr_id, $dm_object_id);
                            update_workflow($dm_object_id, $usr_id, 'Closed', 'close_out');
                            $dms_processor->update_dev_wf_status($dm_object_id, "Completed");
                            $dms_processor->update_dev_status($dm_object_id, "Closed");

                            //If CAPA Required
                            if ($is_capa_required === "yes") {
                                $capa_integration_id = add_integration($dm_object_id, $lm_doc_id, $dm_object_id, getLmDocObjectIdByDocCode('LM-DOC-12'), "dms_close_out", $usr_id, $capa_dept_head, null, $capa_reason);
                                if ($capa_integration_id) {
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | CAPA Triggered and Pending Assignment | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name Triggered CAPA and Pending Assignment";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Reason" => $capa_reason,
                                        "Tracking No" => get_integration_tracking_no($capa_integration_id, 'tracking_link'),
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    ];
                                    send_workflow_mail($capa_dept_head, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                }
                            }
                            //If CC Required
                            if ($is_cc_required === "yes") {
                                $cc_integration_id = add_integration($dm_object_id, $lm_doc_id, $dm_object_id, getLmDocObjectIdByDocCode('LM-DOC-11'), "dms_close_out", $usr_id, $cc_dept_head, null, $cc_reason);
                                if ($cc_integration_id) {
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $dm_no | CCM Triggered and Pending Assignment | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name Triggered CCM and Pending Assignment";
                                    $mail_details = [
                                        "Deviation No." => $dm_no,
                                        "Reason" => $cc_reason,
                                        "Tracking No" => get_integration_tracking_no($cc_integration_id, 'tracking_link'),
                                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    ];
                                    send_workflow_mail($cc_dept_head, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                }
                            }
                            //**** Audit Trail**//
                            $at_data['Is CAPA Required'] = array('NA', $is_capa_required, $is_capa_required);
                            $at_data['Is Change Control Required'] = array('NA', $is_cc_required, $is_cc_required);
                            addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Completed');

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Completed | [Info Mail]";
                            $actionDescription = "The $lm_doc_short_name is Completed";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Initiated Date" => display_date_format($dm_master->created_time),
                                "Target Date" => display_date_format($dm_master->target_date),
                                "Completed Date" => display_date_format($date_time),
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                            ];
                            $workflow_userslist = get_all_workflow_users_list($dm_object_id);
                            send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        } else {
            if ($dms_processor->show_dms_extension_btn_for($dm_object_id) == "show_closeout_ext_btn") {
                $smarty->assign('show_overdue_msg_notifi', true);
                $smarty->assign('show_info_tab_info', "Close Out Overdue ! The Close Out target date (<span class='vd_red font-semibold'>$dm_master->target_date</span>) has exceeded. Request an extension.");

                //****Close Out Target Date Extension**//
                if ((is_extension_elegible_to_raise($dm_object_id, 'Close_out') == true) && check_user_in_worklist($dm_object_id, $usr_id)) {
                    $smarty->assign('request_close_out_extension_btn', true);
                    $smarty->assign('extension_for', "CLOSE OUT");
                    $smarty->assign('existing_target_date', $dm_master->target_date);

                    if (isset($_POST['extension_requested'])) {
                        $exisiting_target_date = (isset($_REQUEST['exisiting_target_date'])) ? $_REQUEST['exisiting_target_date'] : null;
                        $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                        $extension_reason = (isset($_REQUEST['extension_reason'])) ? $_REQUEST['extension_reason'] : null;

                        if (add_extension_details($dm_object_id, $dm_object_id, $exisiting_target_date, $proposed_target_date, "Close_out", $extension_reason, "Close Out - Extension Requested", $qa_approver, $wf_status, $usr_id, $date_time)) {
                            $dms_processor->update_dev_wf_status($dm_object_id, "Pending Extension of Close Out Target Date");

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $dm_no | Request for Extending Close Out Target Date | [Action Required]";
                            $actionDescription = "The $lm_doc_short_name Requires Extension for the Close Out Target Date";
                            $mail_details = [
                                "Deviation No." => $dm_no,
                                "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                "Extension for" => "Close Out",
                                "Existing Target Date" => display_date_format($exisiting_target_date),
                                "Proposed Target Date" => display_date_format($proposed_target_date),
                                "Reason" => $extension_reason,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
                //***Extension of Close Out Targat Date Approval***/-
                if ($wf_status == "Pending Extension of Close Out Target Date") {
                    $smarty->assign('show_info_tab_info', "Close Out Overdue ! The Close Out target date (<span class='vd_red font-semibold'>$dm_master->task_target_date</span>) has exceeded. Pending approval for an extension.");

                    if (check_user_in_workflow($dm_object_id, $usr_id, "Approved", 'qa_approve') && (check_user_in_worklist($dm_object_id, $usr_id))) {
                        $smarty->assign('close_out_extension_approval_btn', true);
                        $smarty->assign('pending_extension_details', get_extension_details(null, $dm_object_id, 'Close_out', "Pending"));

                        if (isset($_POST['extension_approval'])) {
                            $extension_approval_type = (isset($_REQUEST['extension_approval_type'])) ? $_REQUEST['extension_approval_type'] : null;
                            $extension_object_id = (isset($_REQUEST['extension_object_id'])) ? $_REQUEST['extension_object_id'] : null;
                            $extension_for = (isset($_REQUEST['extension_for'])) ? $_REQUEST['extension_for'] : null;
                            $ref_object_id1 = (isset($_REQUEST['ref_object_id1'])) ? $_REQUEST['ref_object_id1'] : null;
                            $proposed_target_date = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                            $extension_approval_comments = (isset($_REQUEST['extension_approval_comments'])) ? $_REQUEST['extension_approval_comments'] : null;
                            $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : null;

                            $extension_status = get_extension_details_by_request_field($dm_object_id, "Close_out", "Pending", "wf_status");
                            $extension_requested_by = get_extension_details_by_request_field($dm_object_id, "Close_out", "Pending", "created_by_id");
                            if (accept_reject_extension_details($extension_object_id, $dm_object_id, $extension_approval_type, $extension_approval_comments, "Close Out - Pending", $usr_id, $date_time, $audit_trail_action)) {
                                $dms_processor->update_dev_wf_status($dm_object_id, $extension_status);

                                if ($extension_approval_type == "Accepted") {
                                    $dms_processor->extend_dms_target_dates($dm_object_id, 'close_out', $proposed_target_date);
                                }
                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $dm_no | Close Out Target Date Extension - $extension_approval_type | [Info Mail]";
                                $actionDescription = "The $lm_doc_short_name  Extension Request is $extension_approval_type";
                                $mail_details = [
                                    "Deviation No." => $dm_no,
                                    "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                                    "Extension for" => $extension_for,
                                    "Approval Status" => $extension_approval_type,
                                    "Remarks" => $extension_approval_comments,
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($extension_requested_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                header("Location:$_SERVER[REQUEST_URI]");
                            }
                        }
                    }
                }
            }
        }
        //****6. Cancel DMS**//
        if (isset($_POST['submit_request_cancel']) && $cancel_button) {
            if ($dms_processor->update_dev_wf_status($dm_object_id, "Cancelled")) {
                $dms_processor->update_dev_status($dm_object_id, "Closed");
                $dms_processor->update_dev_approval_status($dm_object_id, "Cancelled");

                delete_all_worklist($dm_object_id);
                save_workflow($dm_object_id, $usr_id, 'Cancelled', 'cancel');

                $id = get_object_id("definitions->object_id->workflow->dms->cancel");
                $cancel_obj = new DB_Public_lm_dm_cancel_details();
                $cancel_obj->object_id = $id;
                $cancel_obj->dm_object_id = $dm_object_id;
                $cancel_obj->reason = $wf_remarks;
                $cancel_obj->created_by = $usr_id;
                $cancel_obj->created_time = $date_time;
                if ($cancel_obj->insert()) {
                    //**** Audit Trail**//
                    $at_data['Reason'] = array("NA", $wf_remarks, $wf_remarks);
                    addAuditTrailLog($dm_object_id, $id, $at_data, $audit_trail_action, "Successfuly Cancelled");

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $dm_no | Cancelled | [Info Mail]";
                    $actionDescription = "The $lm_doc_short_name is Cancelled";
                    $mail_details = [
                        "Deviation No." => $dm_no,
                        "Status" => $dms_processor->get_dev_wf_status($dm_object_id),
                        "Reason" => $wf_remarks,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $workflow_userslist = get_all_workflow_users_list($dm_object_id);
                    send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    if ($edit_option) {
        $smarty->assign('classification_list', getClassificationMasterList(null, null, 'yes'));
        $smarty->assign('dev_type_list_master', getDevTypeMasterDetailsList(null, null, 'yes'));
        $smarty->assign('dev_realted_to_list_edit', $dms_processor->get_dev_related_to_list_for_edit($dm_object_id));
        $smarty->assign('repetitive_dms_list_edit', $dms_processor->get_dev_repetitive_dms_for_edit($dm_object_id));
        $smarty->assign('material_category_list', getMaterialTypeMasterDetails(null, null, 'yes'));
        $smarty->assign('productlist', getProductMasterDetails(null, null, null, 'yes'));
        $smarty->assign('marketlist', getMarketMasterList(null, 'yes'));
        $smarty->assign('customerlist', getCustomerMasterList(null, null, null, 'yes'));
        $smarty->assign('process_stage_list', getProcessStageMasterList(null, null, 'yes'));
        $smarty->assign('file_attachment_towards', "general");
        $add_file_attachemnt = true;

        //**** Edit Basic Details, Product Details, Description,Risk Assesment,Immediate Action Taken**//
        if (isset($_POST['update_basic_info']) || isset($_POST['update_prod_details']) || isset($_POST['updatedesc_risk_ass_immed_action']) || isset($_POST['desc_imdactoion_riskasses'])) {
            if ($dms_processor->update_dms_details($dm_object_id, data_null_validator($_POST))) {
                header("Location:$_SERVER[REQUEST_URI]");
            } else {
                $error_handler->raiseError("UPDATE_REQUEST_FAILED");
            }
        }
    }

    //****Add File attachemnt**//
    ($add_file_attachemnt) ? $dms_processor->add_attachments_dms($dm_object_id, $_POST['file_attachment_towards'], $usr_id, $date_time) : false;

    //****Add/Update Access **//
    if (($usr_id == $creator) && ($wf_status != "Cancelled" && $wf_status != "Closed")) {
        $smarty->assign('edit_access_rights', true);
        $smarty->assign('plant_list', getPlantList());

        if (isset($_POST['edit_access_rights'])) {
            if (addDeptAccessRights($dm_object_id, "$dm_master->plant_id-$usr_dept_id", $_POST['doc_access_dept'], $usr_id, $date_time, $dm_no, $audit_trail_action)) {
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    // Etrigger Capa and CCC
    if ($dm_master->is_capa_required === "yes") {
        $capa_ref = array_shift(get_integration_details(null, $dm_object_id, null, null, null, getLmDocObjectIdByDocCode('LM-DOC-12'), 'dms_close_out'));
        $capa_ref_details = ($capa_ref['dest_doc_id']) ? $capa_ref['dest_doc_no_link'] : $capa_ref['tracking_link'];
    }
    if ($dm_master->is_cc_required === "yes") {
        $cc_ref = array_shift(get_integration_details(null, $dm_object_id, null, null, null, getLmDocObjectIdByDocCode('LM-DOC-11'), 'dms_close_out'));
        $cc_ref_details = ($cc_ref['dest_doc_id']) ? $cc_ref['dest_doc_no_link'] : $cc_ref['tracking_link'];
    }

    $smarty->assign('lm_doc_id', $lm_doc_id);
    $smarty->assign('dm_master_obj', $dm_master);
    $smarty->assign('usr_dept_id', $usr_dept_id);
    $smarty->assign('usr_plant_id', $usr_plant_id);
    $smarty->assign('dms_no', $dm_no);
    $smarty->assign('repetitive_dms_details', $dms_processor->get_repetitive_dms_details($dm_object_id));
    $smarty->assign('initiator', getFullName($dm_master->created_by));
    $smarty->assign('dm_department', getDepartment($dm_master->dm_department));
    $smarty->assign('plant_name', getPlantName($dm_master->plant_id));
    $smarty->assign("dm_type", getDevTypeName($dm_master->dm_type_id));
    $smarty->assign("dm_classification", getClassificationName($dm_master->classification));
    $smarty->assign('reporting_date', get_modified_date_format($dm_master->reporting_date));
    $smarty->assign('product_name', getProductName($dm_master->product_id));
    $smarty->assign('customer_name', getCustomerName($dm_master->customer));
    $smarty->assign('market_name', getMarketName($dm_master->scope));
    $smarty->assign('material_type', getMaterialType($dm_master->material_type_id));
    $smarty->assign('process_stage', getProcessStage($dm_master->process_stage_id));
    $smarty->assign('date_of_occurrence', get_modified_date_format($dm_master->date_of_occurrence));
    $smarty->assign('date_of_discovery', get_modified_date_format($dm_master->date_of_discovery));
    $smarty->assign('time_of_discovery', get_modified_date_format($dm_master->time_of_discovery));
    $smarty->assign('dev_related_to_list', $dms_processor->get_dms_related_to_details($dm_object_id));
    $smarty->assign('pre_review_comments', $dms_processor->get_deviation_mgmt_review_comments($dm_object_id, null, 'pre_review'));
    $smarty->assign('dept_approver_comments', $dms_processor->get_deviation_mgmt_review_comments($dm_object_id, null, 'dept_approve'));
    $smarty->assign('qa_review_comments', $dms_processor->get_deviation_mgmt_review_comments($dm_object_id, null, 'qa_review'));
    $smarty->assign('cft_review_comments', $dms_processor->get_deviation_mgmt_review_comments($dm_object_id, null, 'cft_assessment'));
    $smarty->assign('pre_approver_comments', $dms_processor->get_deviation_mgmt_review_comments($dm_object_id, null, 'pre_approve'));
    $smarty->assign("current_access_rights", getAccessRightsDeptList($dm_object_id));
    $smarty->assign("ar_plant_list", getAccessRightsPlantList($dm_object_id));
    $smarty->assign('general_file_objectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id, 'general'));
    $smarty->assign('investigation_file_objectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($dm_object_id, 'investigation'));
    $smarty->assign('capa_file_objectarray', $doc_file_processor_object->getLmDmDocFileObjectArray($task_id, 'capa'));
    $smarty->assign('investigation_details', $dms_processor->get_investigation_details($dm_object_id));
    $smarty->assign('latest_invest_details', $latest_invest_details);
    $smarty->assign('extension_details', get_extension_details(null, $dm_object_id));
    $smarty->assign('meeting_schedule', $meeting_schedule);
    $smarty->assign('meeting_agenda_details', $dms_processor->get_dms_meeting_agenda_details($dm_object_id));
    $smarty->assign('meeting_participant_details', $dms_processor->get_dms_meeting_participant_details(null, $dm_object_id, null, null));
    $smarty->assign('meeting_attendees_details', $meeting_attendee_details);
    $smarty->assign('training_details', $dms_processor->get_dms_training_details($dm_object_id, null, null, null));
    $smarty->assign('online_exam_user_list', $dms_processor->get_dms_online_exam_details($dm_object_id, null, null, 'yes', null));
    $smarty->assign('dms_task_list', $dms_processor->get_dms_task_details($dm_object_id, null));
    $smarty->assign('etrigger_details', get_integration_details(null, $dm_object_id, null));
    $smarty->assign("etrigger_capa_no", $capa_ref_details);
    $smarty->assign("etrigger_cc_no", $cc_ref_details);
    $smarty->assign('my_self', $usr_id);
    $smarty->assign("worklist_pending_details", getWorklistPendingDetails($dm_object_id));
    $smarty->assign('status_details', get_all_workflow_actions($dm_object_id));
    $smarty->assign('wf_remarks_array', getWorkflowRemarks(null, $dm_object_id, null));
    $smarty->assign("progress_bar_status_per", get_dms_progress_bar_status($wf_status));
    $smarty->assign('cancelled_details', $dms_processor->get_dev_cancelled_details($dm_object_id));
    $smarty->assign("at_start_date", get_audit_min_max_date_details()['min_date']);
    $smarty->assign("at_end_date", get_audit_min_max_date_details()['max_date']);
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_dms.dms.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
