<?php

/**
 * Project: Logicmind
 * File: view_ams.ams.php
 *
 * @author Sivaranjani S, Puneet
 * @since 08/12/2020
 * @package ams
 * @version 1.0
 * @see view_ams.ams.tpl
 * */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'audit_schedule', 'audit_schedule')) {
    $error_handler->raiseError("view_audit");
}

$usr_id = trim($_SESSION['user_id']);
$usr_plant_id = getUserPlantId($usr_id);
$usr_dept_id = getDeptId($usr_id);
$date_time = date('Y-m-d G:i:s');
$today_date = date('Y-m-d');

$am_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$am_schedule = new DB_Public_lm_audit_scheduled_details();
if ($am_schedule->get("object_id", $am_object_id)) {
    /** Department Restriction */
    if (!isDeptAccessRightsExist($am_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    if ($am_schedule->wf_status == "To be initiated") {
        $smarty->assign('show_initiation_error_msg', true);
        $smarty->assign('am_schedule_obj', $am_schedule);
    } else {
        $ams_processor = new Ams_processor();
        $doc_file_processor_object = new Doc_File_Processor();

        $am_no = get_qms_doc_no("ams", $am_object_id)['doc_no'];
        $lm_doc_id = $am_schedule->lm_doc_id;
        $wf_status = $am_schedule->wf_status;
        $audit_plant = ($am_schedule->audit_plant) ? getPlantShortName($am_schedule->audit_plant) : null;
        $audit_dept = ($am_schedule->audit_dept) ? getDepartment($am_schedule->audit_dept) : null;
        $audit_type = getAuditType($am_schedule->audit_type_id);

        $creator = get_workflow_action_user($am_object_id, 'create');
        $qa_approver = get_workflow_action_user($am_object_id, 'qa_approve');
        $auditors = ($audit_type === "INTERNAL") ? array_column($ams_processor->get_ams_int_auditors($am_object_id), 'auditor_id') : array_column($ams_processor->get_ams_ext_auditors($am_object_id), 'auditor_id');

        $meeting_schedule = $ams_processor->get_ams_meeting_details($am_object_id, null, 'yes');
        $meeting_attendee_details = $ams_processor->get_ams_meeting_attendee_details($am_object_id, null);

        $at_data['Audit No'] = array($am_no, $am_no, $am_no . "\nlm_doc_id : $lm_doc_id");
        $lm_doc_name = getLmDocName($lm_doc_id);
        $lm_doc_short_name = getLmDocShortName($lm_doc_id);
        $mail_heading = "$lm_doc_name ($lm_doc_short_name)";
        $mail_link_btn = _URL_ . get_lm_json_value_by_key('definitions->url->ams->view_ams') . $am_object_id;

        $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : $wf_status;

        $wf_remarks = (isset($_REQUEST['wf_remarks'])) ? $_REQUEST['wf_remarks'] : null;
        ($wf_remarks) ? addWorkflowRemarks($am_object_id, $wf_remarks, $usr_id, $date_time) : false;

        //**** Start Of Status Created, Dept,QA Approval Need Correction**//
        if (($wf_status == "Created" || $wf_status === "QA Approval Needs Correction") && ($creator == $usr_id)) {
            if (check_user_in_workflow($am_object_id, $usr_id, "Created", 'create') && (check_user_in_worklist($am_object_id, $usr_id))) {

                $add_file_attachemnt = true;
                $smarty->assign('edit_button', true);
                $smarty->assign('edit_attachment', $add_file_attachemnt);
                $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmAmDocFileObjectArray($am_object_id));
                $smarty->assign('file_attachment_towards', "general");
                $smarty->assign('cancel_button', true);

                //Edit Option
                $smarty->assign('file_attachment_towards', "general");
                $add_file_attachemnt = true;

                //**** Edit Audit Schedule,Agenda Auditor, Auditee**//
                if (isset($_POST['update_audit_schedule'])) {
                    ($ams_processor->update_ams_audit_schedule($am_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                if (isset($_POST['update_agenda'])) {
                    ($ams_processor->update_ams_agenda($am_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                if (isset($_POST['update_audit_plan'])) {
                    ($ams_processor->update_ams_audit_plan($am_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                if (isset($_POST['update_int_auditors'])) {
                    ($ams_processor->update_ams_int_auditors($am_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                if (isset($_POST['update_ext_auditors'])) {
                    ($ams_processor->update_ams_ext_auditors($am_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                if (isset($_POST['update_auditees'])) {
                    ($ams_processor->update_ams_auditees($am_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }

                // **** Show QA Approval request**//
                if ($ams_processor->is_all_fields_in_edit_tab_completed($am_object_id)) {
                    $smarty->assign('request_qa_approve_button', true);

                    if (isset($_POST['request_qa_approval'])) {
                        if ($ams_processor->update_ams_wf_status($am_object_id, "Pending for QA Approval")) {
                            $qa_approver_user = (isset($_REQUEST['qa_approver_user'])) ? $_REQUEST['qa_approver_user'] : null;

                            delete_workflow_action($am_object_id, "Needs Correction", "qa_approve");
                            delete_worklist($usr_id, $am_object_id);
                            add_worklist($qa_approver_user, $am_object_id);
                            save_workflow($am_object_id, $qa_approver_user, 'Pending', 'qa_approve');

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $am_no | Request for QA Approval | [Action Required]";
                            $actionDescription = "The Audit  is Pending for QA Approval";
                            $mail_details = [
                                "Audit No." => $am_no,
                                "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($qa_approver_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Audit Trail**//
                            $at_data['QA Approver'] = array('NA', getFullName($qa_approver_user), $qa_approver_user . " - " . getFullName($qa_approver_user));
                            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'QA Approval Pending');
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                } else {
                    $smarty->assign('show_edit_error_msg', true);
                }

                //**** Cancel AMS**//
                if (isset($_POST['submit_request_cancel'])) {
                    if ($ams_processor->update_ams_wf_status($am_object_id, "Cancelled")) {
                        $ams_processor->update_ams_status($am_object_id, "Closed");
                        $ams_processor->update_ams_approval_status($am_object_id, "Cancelled");
                        $ams_processor->update_ams_audit_status($am_object_id, "Cancelled");

                        delete_all_worklist($am_object_id);
                        save_workflow($am_object_id, $usr_id, 'Cancelled', 'cancel');

                        if ($ams_processor->cancel_ams_schedule($am_object_id, $wf_remarks, $usr_id, $date_time, $audit_trail_action)) {
                            //**** Audit Trail**//
                            $at_data['Reason'] = array("NA", $wf_remarks, $wf_remarks);
                            addAuditTrailLog($am_object_id, $id, $at_data, $audit_trail_action, "Successfuly Cancelled");

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $am_no | Cancelled | [Info Mail]";
                            $actionDescription = "The Audit  is Cancelled";
                            $mail_details = [
                                "Audit No." => $am_no,
                                "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                "Reason" => $wf_remarks,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            $workflow_userslist = get_all_workflow_users_list($am_object_id);
                            send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }

        //****Start Of QA Approval**//
        if ($wf_status == "Pending for QA Approval") {
            if (check_user_in_workflow($am_object_id, $usr_id, "Pending", 'qa_approve') && check_user_in_worklist($am_object_id, $usr_id)) {
                $smarty->assign('show_qa_approve_button', true);

                //****QA Approval Need Correction**//
                if (isset($_POST['qa_approval_need_correction'])) {
                    $ams_processor->update_ams_wf_status($am_object_id, "QA Approval Needs Correction");
                    update_workflow($am_object_id, $usr_id, 'Needs Correction', 'qa_approve');
                    delete_worklist($usr_id, $am_object_id);
                    add_worklist($creator, $am_object_id);

                    //**** Audit Trail**//
                    $creator_name = getFullName($creator);
                    $at_data['Sent To'] = array("NA", getFullName($creator), "$creator - $creator_name");
                    $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                    addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'QA Approval Needs Correction');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $am_no | Needs Correction | [Action Required]";
                    $actionDescription = "The Audit  Needs a Few Corrections";
                    $mail_details = [
                        "Audit No." => $am_no,
                        "Query/Remarks" => $wf_remarks,
                        "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                    ];
                    send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }

                //****QA Accepted**//
                if (isset($_POST['qa_accepted'])) {
                    $qa_approve_comments = (isset($_REQUEST['qa_approve_comments'])) ? $_REQUEST['qa_approve_comments'] : null;
                    //$uams_meeting = ($_POST['uams_meeting']) ? $_POST['uams_meeting'] : "NA";

                    if ($ams_processor->add_ams_review_comments($am_object_id, $qa_approve_comments, $usr_id, $date_time, $audit_trail_action, 'qa_approve')) {
                        $ams_processor->update_ams_audit_schedule($am_object_id, data_null_validator($_POST));
                        $ams_processor->update_ams_approval_status($am_object_id, "Accepted");
                        update_workflow($am_object_id, $usr_id, 'Approved', 'qa_approve');
                        delete_worklist($usr_id, $am_object_id);
                        add_worklist($creator, $am_object_id);
                        save_workflow($am_object_id, $creator, 'Pending', 'to_assign_auditors');
                        $ams_processor->update_ams_wf_status($am_object_id, "Pending Auditors Assignment");

                        //**** Audit Trail**//
                        $at_data['Approved By'] = array('NA', getFullName($qa_approver), $qa_approver . " - " . getFullName($qa_approver));
                        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'QA Approved');

                        $subject = "$lm_doc_short_name | $am_no | Approved | [Info Mail]";
                        $actionDescription = "The Audit is Approved by QA";
                        $mail_details = [
                            "Audit No." => $am_no,
                            "Audit From Date" => display_date_format($am_schedule->audit_date_from),
                            "Audit To Date" => display_date_format($am_schedule->audit_date_to),
                            "Scope" => $am_schedule->scope,
                            "Objectives" => $am_schedule->objectives,
                            "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                            "Approved By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
                //****QA Rejected**//
                if (isset($_POST['qa_rejected'])) {
                    $reject_reason = (isset($_REQUEST['udev_reject_reason'])) ? $_REQUEST['udev_reject_reason'] : null;
                    if ($ams_processor->update_ams_closeout($am_object_id, "Rejected", "Closed", "Rejected", "Rejected", $reject_reason)) {
                        update_workflow($am_object_id, $usr_id, 'Rejected', 'qa_approve');
                        delete_all_worklist($am_object_id);

                        //**** Audit Trail**//
                        $at_data['Reason'] = array('NA', $reject_reason, $reject_reason);
                        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Rejected');

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $am_no | Rejected | [Info Mail]";
                        $actionDescription = "The Audit  is Rejected by QA Approver";
                        $mail_details = [
                            "Audit No." => $am_no,
                            "Reason" => $reject_reason,
                            "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                            "Rejected By" => $_SESSION['full_name']
                        ];
                        $workflow_userslist = get_all_workflow_users_list($am_object_id);
                        send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        header("Location:$_SERVER[REQUEST_URI]");
                    } else {
                        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                    }
                }
            }
            //****Recall QA Approver**//
            if (check_user_in_workflow($am_object_id, $usr_id, "Created", 'create') && check_user_in_workflow($am_object_id, $qa_approver, "Pending", 'qa_approve')) {
                $smarty->assign('recall_qa_approver_btn', true);

                $qa_approver_pending_userlist = get_workflow_userlist_by_objectid_action_status($am_object_id, 'qa_approve', 'Pending');
                $smarty->assign('recall_from', 'QA Approval');
                $smarty->assign('recall_replace_option', true);
                $smarty->assign('recall_action_user', true);
                $smarty->assign('recall_action', 'qa_approve');
                $smarty->assign('recall_object_id', $am_object_id);
                $smarty->assign('recall_pending_users_list', $qa_approver_pending_userlist);
                $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($am_object_id, 'qa_approve'), 'user_id'));

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

                            if (check_user_in_workflow($am_object_id, $recall_user, "Pending", 'qa_approve')) {
                                delete_worklist($recall_user, $am_object_id);
                                delete_user_workflow_action($am_object_id, $recall_user, "Pending", "qa_approve");

                                add_worklist($replaced_by, $am_object_id);
                                save_workflow($am_object_id, $replaced_by, 'Pending', 'qa_approve');

                                //**** Audit Trail**//
                                $recall_user_name = getFullName($recall_user);
                                $replaced_by_name = getFullName($replaced_by);

                                $recall_user_at_o .= "\n\t\t$recall_user_name";
                                $recall_user_at_n .= "\n\t\t$replaced_by_name";
                                $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $am_no | Request for QA Approval | [Action Required]";
                                $actionDescription = "The Audit  is Pending for QA Approval";
                                $mail_details = [
                                    "Audit No." => $am_no,
                                    "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $am_no | Recalled | [Info Mail]";
                                $actionDescription = "The Audit  is Recalled from QA Approver";
                                $mail_details = [
                                    "Audit No." => $am_no,
                                    "Status" => $ams_processor->get_ams_wf_status($am_object_id),
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
                            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                        }
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }

        //****Start Of Assigning Auditors**//
        if ($wf_status == "Pending Auditors Assignment" && $usr_id === $creator) {
            if (check_user_in_workflow($am_object_id, $usr_id, "Pending", 'to_assign_auditors') && check_user_in_worklist($am_object_id, $usr_id)) {
                $smarty->assign('show_assign_auditor_button', true);

                //****Assign Auditors**//
                if (isset($_POST['assign_auditors'])) {
                    $agenda_object_id_array = (isset($_REQUEST['agenda_object_id'])) ? $_REQUEST['agenda_object_id'] : null;
                    $auditors_array = (isset($_REQUEST['uams_assign_auditors'])) ? $_REQUEST['uams_assign_auditors'] : null;

                    if ($ams_processor->assign_ams_auditors($am_object_id, $agenda_object_id_array, $auditors_array)) {
                        update_workflow($am_object_id, $creator, 'Assigned', 'to_assign_auditors');

                        if ($am_schedule->is_meeting_required === "yes") {
                            $ams_processor->update_ams_wf_status($am_object_id, "Pending Opening Meeting Schedule");
                            save_workflow($am_object_id, $creator, 'Pending', 'opening_meeting');
                        } else {
                            $ams_processor->update_ams_wf_status($am_object_id, "Pending Audit");
                            save_workflow($am_object_id, $creator, 'Pending', 'audit');
                        }
                        $auditees = $ams_processor->get_ams_auditees($am_object_id);
                        $auditees_details = implode("\n", array_map(function ($key, $index) {
                                    return ($index + 1) . ". " . $key['auditee_name'] . "<br>";
                                }, $auditees, array_keys($auditees)));

                        $auditors = $ams_processor->get_ams_int_auditors($am_object_id);
                        $auditors_details = implode("\n", array_map(function ($ele, $index) {
                                    return ($index + 1) . ". " . $ele['auditor_name'] . "<br>";
                                }, $auditors, array_keys($auditors)));

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $am_no | Audit Scheduled | [Info Mail]";
                        $actionDescription = "The Audit has been Assigned";
                        $mail_details = [
                            "Audit No." => $am_no,
                            "Audit From Date" => display_date_format($am_schedule->audit_date_from),
                            "Audit To Date" => display_date_format($am_schedule->audit_date_to),
                            "Audit Lead" => getFullName($am_schedule->audit_lead),
                            "Auditors" => $auditors_details,
                            "Auditees" => $auditees_details,
                            "Scope" => $am_schedule->scope,
                            "Objectives" => $am_schedule->objectives,
                            "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                            "Assigned By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($auditors, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }

        //Opening Meeting 
        if ($wf_status == "Pending Opening Meeting Schedule") {
            if (check_user_in_workflow($am_object_id, $usr_id, "Pending", 'opening_meeting') && (check_user_in_worklist($am_object_id, $usr_id))) {
                $smarty->assign('show_meeting_schedule_button', true);

                if (isset($_POST['meeting_scheduled'])) {
                    $meeting_date = (isset($_REQUEST['meeting_date'])) ? $_REQUEST['meeting_date'] : null;
                    $meeting_time = (isset($_REQUEST['meeting_time'])) ? $_REQUEST['meeting_time'] : null;
                    $meeting_venue = (isset($_REQUEST['meeting_venue'])) ? $_REQUEST['meeting_venue'] : null;
                    $meeting_link = (isset($_REQUEST['meeting_link'])) ? $_REQUEST['meeting_link'] : null;
                    $participants = (isset($_REQUEST['participants'])) ? $_REQUEST['participants'] : null;
                    $meeting_agenda = (isset($_REQUEST['meeting_agenda'])) ? $_REQUEST['meeting_agenda'] : null;
                    if ($ams_processor->add_ams_meeting_schedule($am_object_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $participants, $usr_id, $date_time)) {
                        $ams_processor->update_ams_wf_status($am_object_id, "Pending Opening Meeting");

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $am_no | Opening Meeting Scheduled | [Info Mail]";
                        $actionDescription = "The Meeting is Scheduled";
                        $mail_details = [
                            "Audit No." => $am_no,
                            "Date" => display_date_format($meeting_date),
                            "Time" => $meeting_time,
                            "Venue" => $meeting_venue,
                            "Meeting Link" => $meeting_link,
                            "Status" => $ams_processor->get_ams_wf_status($am_object_id),
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

        //****Start Of Opening Meeting Reshedule, Update Attendees, Meeting Completed **//
        if ($wf_status == "Pending Opening Meeting") {
            if (check_user_in_workflow($am_object_id, $usr_id, "Pending", 'opening_meeting') && (check_user_in_worklist($am_object_id, $usr_id))) {
                $meeting_date_time = new DateTime($meeting_schedule['meeting_date_time']);
                $meeting_participant_id_details = array_column($ams_processor->get_ams_meeting_participant_details(null, $am_object_id, null, null), 'participant_id');

                //Recall - Add additional particiapnts
                $smarty->assign('recall_meeting_schedule_button', true);
                $smarty->assign('recall_from', 'Meeting Schedule');
                $smarty->assign('recall_add_option', true);
                $smarty->assign('recall_dept_user', true);
                $smarty->assign('recall_object_id', $am_object_id);
                $smarty->assign('recall_workflow_users', $meeting_participant_id_details);

                //**** Add **//
                if (isset($_POST['recall_add'])) {
                    $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                    $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                    $ams_processor->add_ams_meeting_participants_details($recall_add_users_to, $am_object_id, $meeting_schedule['object_id'], $recall_reason, $usr_id, $date_time);

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $am_no | Opening Meeting Scheduled | [Info Mail]";
                    $actionDescription = "The Meeting is Scheduled";
                    $mail_details = [
                        "Audit No." => $am_no,
                        "Date" => display_date_format($meeting_schedule['meeting_date']),
                        "Time" => $meeting_schedule['meeting_time'],
                        "Venue" => $meeting_schedule['venue'],
                        "Meeting Link" => $meeting_schedule['meeting_link'],
                        "Status" => $ams_processor->get_ams_wf_status($am_object_id),
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

                        if ($ams_processor->update_ams_meeting_schedule($am_object_id, $meeting_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $reason, $usr_id, $date_time)) {
                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $am_no | Opening Meeting Re-Scheduled | [Info Mail]";
                            $actionDescription = "The Meeting is Re-scheduled";
                            $mail_details = [
                                "Audit No." => $am_no,
                                "Date" => display_date_format($meeting_date),
                                "Time" => $meeting_time,
                                "Venue" => $meeting_venue,
                                "Meeting Link" => $meeting_link,
                                "Status" => $ams_processor->get_ams_wf_status($am_object_id),
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

                        if ($ams_processor->add_ams_meeting_attendee_details($am_object_id, $meeting_id, $meeting_attendess, $usr_id, $date_time)) {
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

                        update_workflow($am_object_id, $usr_id, 'Completed', 'opening_meeting');
                        if ($ams_processor->update_ams_meeting_status($am_object_id, "Completed")) {
                            $ams_processor->update_ams_wf_status($am_object_id, "Pending Audit");
                            save_workflow($am_object_id, $creator, 'Pending', 'audit');

                            //**** Audit Trail**//
                            addAuditTrailLog($am_object_id, $meeting_id, $at_data, $audit_trail_action, 'Meeting Completed');
                        } else {
                            $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                        }
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }

        //****Start Of Pending Audit**//
        if (($wf_status == "Pending Audit" || $wf_status == "Audit Findings Review Needs Correction") && $usr_id === $creator) {
            if ((check_user_in_workflow($am_object_id, $usr_id, "Pending", 'audit') || check_user_in_workflow($am_object_id, $usr_id, "Completed", 'audit')) && check_user_in_worklist($am_object_id, $usr_id)) {
                $smarty->assign('show_update_observation_button', true);

                //$obs_array = $ams_processor->get_ams_obseravtion_details($am_object_id);
                //print_r($obs_array);

                if (isset($_POST['save_observation']) || isset($_POST['complete_observatio'])) {
                    // print_r($_FILES);
                    //print_r($_POST);

                    $obs_array = $ams_processor->get_ams_obseravtion_details($am_object_id);

// Another array to check existence
                    $anotherArray = $_POST['uams_audit_observation_id'];

                    $anotherArray1 = array_values(array_merge(...$anotherArray));

// Step 1: Extract object_id values
                    $objectIds = array_map(function ($item) {
                        return $item['object_id'];
                    }, $obs_array);

// Step 2: Check if object_ids exist in another array
                    $matchingIds = array_filter($objectIds, function ($id) use ($anotherArray1) {
                        if (in_array($id, $anotherArray1)) {
                            $obj = new DB_Public_lm_audit_observation();
                            $obj->whereAdd("audit_object_id='$am_object_id'");
                            $obj->whereAdd("object_id='$id'");
                            $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
                        }
                    });

// Output matching object_ids
                    print_r($anotherArray1);
                }
                if (isset($_POST['save_observation2']) || isset($_POST['complete_observation2'])) {
                    $agenda_object_id = $_REQUEST['agenda_object_id'];
                    $uams_audit_observation = $_REQUEST['uams_audit_observation'];

                    for ($i = 0; $i < count($agenda_object_id); $i++) {
                        for ($j = 0; $j < count($uams_audit_observation[$i]); $j++) {

                            $object_id = get_object_id("definitions->object_id->workflow->ams->observation");
                            print_r($object_id . "-->" . $agenda_object_id[$i] . "-->" . $uams_audit_observation[$i][$j] . "\n");
                            if ($_FILES['file']['tmp_name'][$i]) {
                                $attached_files_array = array('ref_object_id' => $object_id, 'tmp_name_array' => $_FILES['file']['tmp_name'][$i], 'type' => $_FILES['file']['type'][$i], 'size' => $_FILES['file']['size'][$i], 'name' => $_FILES['file']['name'][$i]);

                                //foreach ($attached_files_array as $key => $val) {
                                for ($k = 0; $k < count($attached_files_array['tmp_name_array']); $k++) {
                                    print_r($attached_files_array['tmp_name_array'][$k] . "\n");
                                    print_r($attached_files_array['type'][$k] . "\n");
                                    print_r($attached_files_array['size'][$k] . "\n");
                                    print_r($attached_files_array['name'][$k] . "\n");
                                }
                            }
                        }
                    }
                }

                if (isset($_POST['save_observation1']) || isset($_POST['complete_observation1'])) {
                    if ($ams_processor->update_audit_observation($am_object_id, data_null_validator($_POST))) {
                        if (isset($_POST['complete_observation'])) {
                            delete_workflow_action($am_object_id, "Needs Correction", "audit_findings_review");
                            $ams_processor->update_ams_wf_status($am_object_id, "Pending for Audit Findings Review");
                            update_workflow($am_object_id, $creator, 'Completed', 'audit');
                            delete_worklist($usr_id, $am_object_id);
                            add_worklist($qa_approver, $am_object_id);
                            save_workflow($am_object_id, $qa_approver, 'Pending', 'audit_findings_review');

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $am_no | Request for Audit Findings Review | [Action Required]";
                            $actionDescription = "The Vendor Audit is Pending for Findings Review";
                            $mail_details = [
                                "Audit Tracking No." => $am_no,
                                "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Audit Trail**//
                            $at_data['Send to Findings Review'] = array('NA', getFullName($qa_approver), $qa_approver . " - " . getFullName($qa_approver));
                            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Audit Findings Review Pending');
                        }
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }

        //****Audit Findings Review**//
        if ($wf_status == "Pending for Audit Findings Review") {
            if (check_user_in_workflow($am_object_id, $usr_id, "Pending", 'audit_findings_review') && (check_user_in_worklist($am_object_id, $usr_id))) {
                $smarty->assign('show_audit_findings_review_btn', true);
                $add_file_attachemnt = true;
                $smarty->assign('edit_attachment', $add_file_attachemnt);
                $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmAmDocFileObjectArray($am_object_id));
                $smarty->assign('file_attachment_towards', "general");

                //****  Audit Findings Review Need Correction**//
                if (isset($_POST['audit_findings_review_need_correction'])) {
                    $ams_processor->update_ams_wf_status($am_object_id, "Audit Findings Review Needs Correction");
                    update_workflow($am_object_id, $usr_id, 'Needs Correction', 'audit_findings_review');
                    delete_worklist($usr_id, $am_object_id);
                    add_worklist($creator, $am_object_id);

                    //**** Audit Trail**//
                    $audit_lead_name = getFullName($creator);
                    $at_data['Sent To'] = array("NA", getFullName($audit_lead), "$audit_lead - $audit_lead_name");
                    $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                    addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Audit Findings Review Needs Correction');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $am_no | Needs Correction | [Action Required]";
                    $actionDescription = "The Audit Needs a Few Corrections";
                    $mail_details = [
                        "Audit No." => $am_no,
                        "Query/Remarks" => $wf_remarks,
                        "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                    ];
                    send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
                //**** Audit Findings Review**//
                if (isset($_POST['audit_findings_reviewed'])) {
                    $audit_findings_review_comments = (isset($_REQUEST['audit_findings_review_comments'])) ? $_REQUEST['audit_findings_review_comments'] : null;
                    $capa_user = (isset($_REQUEST['capa_user'])) ? $_REQUEST['capa_user'] : null;
                    $capa_reason = (isset($_REQUEST['capa_reason'])) ? $_REQUEST['capa_reason'] : null;
                    $observation_object_id = (isset($_REQUEST['observation_object_id'])) ? $_REQUEST['observation_object_id'] : null;

                    if ($ams_processor->add_ams_review_comments($am_object_id, $audit_findings_review_comments, $usr_id, $date_time, $audit_trail_action, 'audit_findings_review')) {
                        update_workflow($am_object_id, $usr_id, 'Reviewed', 'audit_findings_review');
                        delete_worklist($usr_id, $am_object_id);

                        //**** Audit Trail**//
                        $at_data['Reviewed By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
                        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Reviewed');

                        if (is_action_finished($am_object_id, "audit_findings_review", "Reviewed")) {
                            $ams_processor->update_ams_wf_status($am_object_id, "Completed");
                            $ams_processor->update_ams_status($am_object_id, "Closed");
                            $ams_processor->update_ams_audit_status($am_object_id, "Completed");

                            //CAPA Integration
                            for ($i = 0; $i < count($capa_user); $i++) {
                                $capa_integration_id = add_integration($am_object_id, $lm_doc_id, $observation_object_id[$i], getLmDocObjectIdByDocCode('LM-DOC-12'), "audit_finding", $usr_id, $capa_user[$i], null, $capa_reason[$i]);
                                if ($capa_integration_id) {
                                    //**** Send Mail**//
                                    $subject = "$lm_doc_short_name | $am_no | CAPA Triggered and Pending Assignment | [Action Required]";
                                    $actionDescription = "The $lm_doc_short_name Triggered CAPA and Pending Assignment";
                                    $mail_details = [
                                        "Audit No." => $am_no,
                                        "Reason" => $capa_reason[$i],
                                        "Tracking No" => get_integration_tracking_no($capa_integration_id, 'tracking_link'),
                                        "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                    ];
                                    send_workflow_mail($capa_user[$i], $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                                }
                            }

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $am_no | Completed | [Info Mail]";
                            $actionDescription = "The Audit is Completed";
                            $mail_details = [
                                "Audit No." => $am_no,
                                "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            $workflow_userslist = get_all_workflow_users_list($am_object_id);
                            send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                            header("Location:$_SERVER[REQUEST_URI]");
                        }
                    }
                }
            }

            //****Recall Audit Findings Reviewer**//
            if (check_user_in_workflow($am_object_id, $creator, "Completed", 'audit')) {
                $smarty->assign('recall_audit_findings_review_btn', true);

                $audit_findings_reviewer_pending_userlist = get_workflow_userlist_by_objectid_action_status($am_object_id, 'audit_findings_review', 'Pending');
                $smarty->assign('recall_from', 'Audit Findings Reviewer');
                $smarty->assign('recall_replace_option', true);
                $smarty->assign('recall_action_user', true);
                $smarty->assign('recall_action', 'qa_approve');
                $smarty->assign('recall_object_id', $am_object_id);
                $smarty->assign('recall_pending_users_list', $audit_findings_reviewer_pending_userlist);
                $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($am_object_id, 'audit_findings_review'), 'user_id'));

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

                            if (check_user_in_workflow($am_object_id, $recall_user, "Pending", 'audit_findings_review')) {
                                delete_worklist($recall_user, $am_object_id);
                                delete_user_workflow_action($am_object_id, $recall_user, "Pending", "audit_findings_review");

                                add_worklist($replaced_by, $am_object_id);
                                save_workflow($am_object_id, $replaced_by, 'Pending', 'audit_findings_review');

                                //**** Audit Trail**//
                                $recall_user_name = getFullName($recall_user);
                                $replaced_by_name = getFullName($replaced_by);

                                $recall_user_at_o .= "\n\t\t$recall_user_name";
                                $recall_user_at_n .= "\n\t\t$replaced_by_name";
                                $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $am_no | Request for Audit Findings Review | [Action Required]";
                                $actionDescription = "The Audit is Pending for Audit Findings Review";
                                $mail_details = [
                                    "Audit No." => $am_no,
                                    "Status" => $ams_processor->get_ams_wf_status($am_object_id),
                                    "Sent By" => $_SESSION['full_name']
                                ];
                                send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                                //**** Send Mail**//
                                $subject = "$lm_doc_short_name | $am_no | Recalled | [Info Mail]";
                                $actionDescription = "The Audit is Recalled from Audit Findings Reviewer";
                                $mail_details = [
                                    "Audit No." => $am_no,
                                    "Status" => $ams_processor->get_ams_wf_status($am_object_id),
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
                            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                        }
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }

        //****Add File attachemnt**//
        ($add_file_attachemnt) ? $ams_processor->add_attachments_ams($am_object_id, $_POST['file_attachment_towards'], $usr_id, $date_time) : false;

        //****Add/Update Access **//
        if (($usr_id == $creator) && ($wf_status != "Cancelled" && $wf_status != "Closed")) {
            $smarty->assign('edit_access_rights', true);
            $smarty->assign('plant_list', getPlantList());

            if (isset($_POST['edit_access_rights'])) {
                if (addDeptAccessRights($am_object_id, "$usr_plant_id-$usr_dept_id", $_POST['doc_access_dept'], $usr_id, $date_time, $am_no, $audit_trail_action)) {
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
        $smarty->assign('lm_doc_id', $lm_doc_id);
        $smarty->assign('am_schedule_obj', $am_schedule);
        $smarty->assign('am_no', $am_no);
        $smarty->assign('audit_plant', $audit_plant);
        $smarty->assign('audit_dept', $audit_dept);
        $smarty->assign('sch_by', getFullName($am_schedule->schedule_by));
        $smarty->assign('sch_by_plant', getPlantName($am_schedule->schedule_by_plant));
        $smarty->assign('sch_by_dept', getDepartment($am_schedule->schedule_by_dept));
        $smarty->assign('assigned_by', getFullName($am_schedule->assigned_by));
        $smarty->assign('assigned_by_plant', getPlantName(getUserPlantId($am_schedule->assigned_by)));
        $smarty->assign('assigned_by_dept', getDeptName($am_schedule->assigned_by));
        $smarty->assign('audit_lead', getFullName($am_schedule->audit_lead));
        $smarty->assign('audit_lead_plant', getPlantName($am_schedule->audit_lead_plant));
        $smarty->assign('audit_lead_dept', getDepartment($am_schedule->audit_lead_dept));
        $smarty->assign('audit_type_name', $audit_type);
        $smarty->assign('audit_sub_type', getAuditSubType($am_schedule->audit_sub_type_id));
        $smarty->assign('ams_agenda_list', $ams_processor->get_ams_agenda_details($am_object_id));
        $smarty->assign('audit_days', getDeptName($am_schedule->no_of_days));
        $smarty->assign('ams_aduit_agenda_list', $ams_processor->get_ams_agenda_details($am_object_id));
        $smarty->assign('ams_aduit_plan_list', $ams_processor->get_ams_audit_plan($am_object_id));
        $smarty->assign('ams_aduit_plan_calender_data', $ams_processor->get_ams_audit_plan_calendor_data($am_object_id));
        $smarty->assign('ams_int_auditors', $ams_processor->get_ams_int_auditors($am_object_id));
        $smarty->assign('ams_ext_auditors', $ams_processor->get_ams_ext_auditors($am_object_id));
        $smarty->assign('ams_auditees', $ams_processor->get_ams_auditees($am_object_id));
        $smarty->assign('meeting_schedule', $meeting_schedule);
        $smarty->assign('meeting_participant_details', $ams_processor->get_ams_meeting_participant_details(null, $am_object_id, null, null));
        $smarty->assign('meeting_attendees_details', $meeting_attendee_details);
        $smarty->assign('etrigger_details', get_integration_details(null, $am_object_id, null));
        $smarty->assign('qa_approve_comments', $ams_processor->get_ams_mgmt_review_comments($am_object_id, null, 'qa_approve'));
        $smarty->assign('audit_findings_review', $ams_processor->get_ams_mgmt_review_comments($am_object_id, null, 'audit_findings_review'));
        $smarty->assign('general_file_objectarray', $doc_file_processor_object->getLmAmDocFileObjectArray($am_object_id, 'general'));
        $smarty->assign('audit_observation_file_objectarray', $doc_file_processor_object->getLmAmDocFileObjectArray($am_object_id, 'observation'));
        $smarty->assign("ar_plant_list", getAccessRightsPlantList($am_object_id));
        $smarty->assign("worklist_pending_details", getWorklistPendingDetails($am_object_id));
        $smarty->assign('status_details', get_all_workflow_actions($am_object_id));
        $smarty->assign('cancelled_details', $ams_processor->get_ams_cancelled_details($am_object_id));
        $smarty->assign('wf_remarks_array', getWorkflowRemarks(null, $am_object_id, null));
        $smarty->assign("progress_bar_status_per", get_ams_progress_bar_status($wf_status));
        $smarty->assign("current_access_rights", getAccessRightsDeptList($am_object_id));
        $smarty->assign("at_start_date", get_audit_min_max_date_details()['min_date']);
        $smarty->assign("at_end_date", get_audit_min_max_date_details()['max_date']);
    }
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_ams.ams.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
