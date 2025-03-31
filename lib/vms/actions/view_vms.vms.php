<?php

/**
 * Project: Logicmind
 * File: view_vms.vms.php
 *
 * @author Sivaranjani S, Puneet
 * @since 08/12/2020
 * @package vms
 * @version 1.0
 * @see view_vms.vms.tpl
 * */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'vendor_view', 'view_vendor')) {
    $error_handler->raiseError("view_vendor");
}

$usr_id = trim($_SESSION['user_id']);
$usr_plant_id = getUserPlantId($usr_id);
$usr_dept_id = getDeptId($usr_id);
$date_time = date('Y-m-d G:i:s');
$today_date = date('Y-m-d');

$vm_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$vm_master = new DB_Public_lm_vm_vendor_details_master();
if ($vm_master->get("vm_object_id", $vm_object_id)) {
    /** Department Restriction */
    if (!isDeptAccessRightsExist($vm_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    $vms_processor = new vms_processor();
    $doc_file_processor_object = new Doc_File_Processor();

    $vm_no = get_qms_doc_no("vms", $vm_object_id)['doc_no'];
    $lm_doc_id = $vm_master->lm_doc_id;
    $wf_status = $vm_master->wf_status;

    $creator = get_workflow_action_user($vm_object_id, 'create');
    $audit_lead = $vm_master->audit_lead;
    $audit_lead_name = getFullName($vm_master->audit_lead);
    $qa_approver = get_workflow_action_user($vm_object_id, 'qa_approve');

    $auditors = array_column($vms_processor->get_vms_auditors($vm_object_id), 'auditor_id');
    $auditees_mail_id = array_column($vms_processor->get_vms_auditees($vm_object_id), 'auditee_email');

    $at_data['Audit Tracking No'] = array($vm_no, $vm_no, $vm_no . "\nlm_doc_id : $lm_doc_id");
    $lm_doc_name = getLmDocName($lm_doc_id);
    $lm_doc_short_name = getLmDocShortName($lm_doc_id);
    $mail_heading = "$lm_doc_name ($lm_doc_short_name)";
    $mail_link_btn = _URL_ . get_lm_json_value_by_key('definitions->url->vms->view_vms') . $vm_object_id;
    $audit_report = _TMP_VAULT_ . str_replace("/", "-", $vm_no) . "-AFR.pdf";
    $vac_report = _TMP_VAULT_ . str_replace("/", "-", $vm_no) . "-VAC.pdf";

    $audit_trail_action = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : $wf_status;

    $wf_remarks = (isset($_REQUEST['wf_remarks'])) ? $_REQUEST['wf_remarks'] : null;
    ($wf_remarks) ? addWorkflowRemarks($vm_object_id, $wf_remarks, $usr_id, $date_time) : false;

    //**** Start Of Status Created, Dept,QA Approval Need Correction**//
    if (($wf_status === "Created" || $wf_status === "QA Approval Needs Correction") && ($creator == $usr_id)) {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Created", 'create') && (check_user_in_worklist($vm_object_id, $usr_id))) {

            $add_file_attachemnt = true;
            $smarty->assign('edit_button', true);
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id));
            $smarty->assign('file_attachment_towards', "general");
            $smarty->assign('cancel_button', true);

            //**** Edit Option**//
            $smarty->assign('edit_agenda_list', $vms_processor->get_vms_agenda_for_edit($vm_object_id));
            $smarty->assign('classification_list', getClassificationMasterList(null, null, 'yes'));
            $smarty->assign('edit_plant_list', $vms_processor->get_vms_plants($vm_master->vendor_name));

            //**** Edit Audit Schedule,Audit Plan, Risk Category, Audit Schedule, Auditor, Auditee**//
            if (isset($_POST['update_audit_schedule'])) {
                ($vms_processor->update_vms_schedule_details($vm_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
            }
            if (isset($_POST['update_audit_plan'])) {
                ($vms_processor->update_vms_audit_plan($vm_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
            }
            if (isset($_POST['update_sub_cat_score_risk'])) {
                ($vms_processor->update_vms_sub_agenda_details($vm_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
            }
            if (isset($_POST['update_auditors'])) {
                ($vms_processor->add_vms_auditors($vm_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
            }
            if (isset($_POST['update_auditees'])) {
                ($vms_processor->add_vms_auditees($vm_object_id, data_null_validator($_POST))) ? header("Location:$_SERVER[REQUEST_URI]") : $error_handler->raiseError("UPDATE_REQUEST_FAILED");
            }

            //****Send To QA Approval**//
            if ($vms_processor->is_all_fields_in_edit_tab_completed($vm_object_id)) {
                $smarty->assign('request_qa_approve_button', true);

                if (isset($_POST['request_qa_approval'])) {
                    if ($vms_processor->update_vms_wf_status($vm_object_id, "Pending for QA Approval")) {
                        $qa_approver_user = (isset($_REQUEST['qa_approver_user'])) ? $_REQUEST['qa_approver_user'] : null;

                        delete_workflow_action($vm_object_id, "Needs Correction", "qa_approve");
                        delete_worklist($usr_id, $vm_object_id);
                        add_worklist($qa_approver_user, $vm_object_id);
                        save_workflow($vm_object_id, $qa_approver_user, 'Pending', 'qa_approve');

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Request for QA Approval | [Action Required]";
                        $actionDescription = "The Vendor Audit is Pending for QA Approval";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($qa_approver_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                        //**** Audit Trail**//
                        $at_data['QA Approver'] = array('NA', getFullName($qa_approver_user), $qa_approver_user . " - " . getFullName($qa_approver_user));
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'QA Approval Pending');
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            } else {
                $smarty->assign('show_edit_error_msg', true);
            }

            //**** Cancel VMS**//
            if (isset($_POST['submit_request_cancel'])) {
                if ($vms_processor->update_vms_wf_status($vm_object_id, "Cancelled")) {
                    $vms_processor->update_vms_status($vm_object_id, "Closed");
                    $vms_processor->update_vms_approval_status($vm_object_id, "Cancelled");
                    if ($vm_master->audit_type == "First Time") {
                        $vms_processor->update_vms_plant_audit_status(array("plant_id" => $vm_master->plant_name, 'vendor_status' => "Audit Pending", 'audit_status' => "Audit Pending", 'audit_type' => $vm_master->audit_type));
                    } else if ($vm_master->audit_type == "Re Audit") {
                        $vms_processor->update_vms_plant_audit_status(array("plant_id" => $vm_master->plant_name, 'vendor_status' => "Qualified", 'audit_status' => "Completed", 'audit_type' => $vm_master->audit_type));
                    }

                    delete_all_worklist($vm_object_id);
                    save_workflow($vm_object_id, $usr_id, 'Cancelled', 'cancel');

                    $id = get_object_id("definitions->object_id->workflow->vms->cancel");
                    $cancel_obj = new DB_Public_lm_vm_cancel_details();
                    $cancel_obj->object_id = $id;
                    $cancel_obj->vm_object_id = $vm_object_id;
                    $cancel_obj->reason = $wf_remarks;
                    $cancel_obj->created_by = $usr_id;
                    $cancel_obj->created_time = $date_time;
                    if ($cancel_obj->insert()) {
                        //**** Audit Trail**//
                        $at_data['Reason'] = array("NA", $wf_remarks, $wf_remarks);
                        addAuditTrailLog($vm_object_id, $id, $at_data, $audit_trail_action, "Successfuly Cancelled");

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Cancelled | [Info Mail]";
                        $actionDescription = "The Vendor Audit is Cancelled";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Reason" => $wf_remarks,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $workflow_userslist = get_all_workflow_users_list($vm_object_id);
                        send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }


    //****Start Of QA Approval**//
    if ($wf_status == "Pending for QA Approval") {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Pending", 'qa_approve') && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_qa_approve_button', true);

            //****QA Approval Need Correction**//
            if (isset($_POST['qa_approval_need_correction'])) {
                $vms_processor->update_vms_wf_status($vm_object_id, "QA Approval Needs Correction");
                update_workflow($vm_object_id, $usr_id, 'Needs Correction', 'qa_approve');
                delete_worklist($usr_id, $vm_object_id);
                add_worklist($creator, $vm_object_id);

                //**** Audit Trail**//
                $creator_name = getFullName($creator);
                $at_data['Sent To'] = array("NA", getFullName($creator), "$creator - $creator_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'QA Approval Needs Correction');

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $vm_no | Needs Correction | [Action Required]";
                $actionDescription = "The Vendor Audit Needs a Few Corrections";
                $mail_details = [
                    "Audit Tracking No." => $vm_no,
                    "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //****QA Approval**//
            if (isset($_POST['qa_accepted'])) {
                $qa_approve_comments = (isset($_REQUEST['qa_approve_comments'])) ? $_REQUEST['qa_approve_comments'] : null;
                if ($vms_processor->add_vms_review_comments($vm_object_id, $qa_approve_comments, $usr_id, $date_time, $audit_trail_action, 'qa_approve')) {
                    $vms_processor->update_vms_wf_status($vm_object_id, "Pending Auditors Assignment");
                    $vms_processor->update_vms_approval_status($vm_object_id, "Approved");
                    update_workflow($vm_object_id, $usr_id, 'Approved', 'qa_approve');
                    delete_worklist($usr_id, $vm_object_id);
                    add_worklist($audit_lead, $vm_object_id);
                    save_workflow($vm_object_id, $audit_lead, 'Pending', 'to_assign_auditors');

                    //**** Audit Trail**//
                    $at_data['Approved By'] = array('NA', getFullName($qa_approver), $qa_approver . " - " . getFullName($qa_approver));
                    addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'QA Approved');

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $vm_no | Approved | [Info Mail]";
                    $actionDescription = "The Vendor Audit is Approved by QA";
                    $mail_details = [
                        "Audit Tracking No." => $vm_no,
                        "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                        "Audit From Date" => display_date_format($vm_master->audit_from_date),
                        "Audit To Date" => display_date_format($vm_master->audit_to_date),
                        "Scope" => $vm_master->scope,
                        "Objectives" => $vm_master->objectives,
                        "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                        "Approved By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
        //****Recall QA Approver**//
        if (check_user_in_workflow($vm_object_id, $usr_id, "Created", 'create') && check_user_in_workflow($vm_object_id, $qa_approver, "Pending", 'qa_approve')) {
            $smarty->assign('recall_qa_approver_btn', true);

            $qa_approver_pending_userlist = get_workflow_userlist_by_objectid_action_status($vm_object_id, 'qa_approve', 'Pending');
            $smarty->assign('recall_from', 'QA Approval');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qa_approve');
            $smarty->assign('recall_object_id', $vm_object_id);
            $smarty->assign('recall_pending_users_list', $qa_approver_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($vm_object_id, 'qa_approve'), 'user_id'));

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

                        if (check_user_in_workflow($vm_object_id, $recall_user, "Pending", 'qa_approve')) {
                            delete_worklist($recall_user, $vm_object_id);
                            delete_user_workflow_action($vm_object_id, $recall_user, "Pending", "qa_approve");

                            add_worklist($replaced_by, $vm_object_id);
                            save_workflow($vm_object_id, $replaced_by, 'Pending', 'qa_approve');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Request for QA Approval | [Action Required]";
                            $actionDescription = "The Vendor Audit is Pending for QA Approval";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Recalled | [Info Mail]";
                            $actionDescription = "The Vendor Audit is Recalled from QA Approver";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
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
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Start Of Assigning Auditors**//
    if ($wf_status == "Pending Auditors Assignment" && $usr_id === $audit_lead) {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Pending", 'to_assign_auditors') && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_assign_auditor_button', true);

            //****Assign Auditors**//
            if (isset($_POST['assign_auditors'])) {
                $category_object_id_array = (isset($_REQUEST['category_object_id'])) ? $_REQUEST['category_object_id'] : null;
                $auditors_array = (isset($_REQUEST['uvms_assign_auditors'])) ? $_REQUEST['uvms_assign_auditors'] : null;

                if ($vms_processor->assign_vms_auditors($vm_object_id, $category_object_id_array, $auditors_array)) {
                    $vms_processor->update_vms_wf_status($vm_object_id, "Pending Audit");
                    update_workflow($vm_object_id, $audit_lead, 'Assigned', 'to_assign_auditors');
                    save_workflow($vm_object_id, $audit_lead, 'Pending', 'audit');

                    $auditees = $vms_processor->get_vms_auditees($vm_object_id);
                    $auditees_details = implode("\n", array_map(function ($key, $index) {
                                return ($index + 1) . ". " . $key['auditee_name'] . "<br>";
                            }, $auditees, array_keys($auditees)));

                    $auditors = $vms_processor->get_vms_auditors($vm_object_id);
                    $auditors_details = implode("\n", array_map(function ($ele, $index) {
                                return ($index + 1) . ". " . $ele['auditor_name'] . "<br>";
                            }, $auditors, array_keys($auditors)));

                    //$auditees_details = implode("\n", array_map(fn($ele, $index) => $index + 1 . ". " . $ele['auditee_name'] . "<br>", $vms_processor->get_vms_auditees($vm_object_id), array_keys($vms_processor->get_vms_auditees($vm_object_id))));
                    //$auditors_details = implode("\n", array_map(fn($ele, $index) => $index + 1 . ". " . $ele['auditor_name'] . "<br>", $vms_processor->get_vms_auditors($vm_object_id), array_keys($auditors)));
                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $vm_no | Vendor Audit Scheduled | [Info Mail]";
                    $actionDescription = "The Vendor Audit has been Assigned";
                    $mail_details = [
                        "Audit Tracking No." => $vm_no,
                        "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                        "Audit From Date" => display_date_format($vm_master->audit_from_date),
                        "Audit To Date" => display_date_format($vm_master->audit_to_date),
                        "Audit Lead" => getFullName($vm_master->audit_lead),
                        "Auditors" => $auditors_details,
                        "Auditees" => $auditees_details,
                        "Scope" => $vm_master->scope,
                        "Objectives" => $vm_master->objectives,
                        "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                        "Assigned By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($auditors, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }
        }
    }

    //****Start Of Pending Audit**//
    if (($wf_status == "Pending Audit" || $wf_status == "Audit Findings Review1 Needs Correction") && $usr_id === $audit_lead) {
        if ((check_user_in_workflow($vm_object_id, $usr_id, "Pending", 'audit') || check_user_in_workflow($vm_object_id, $usr_id, "Completed", 'audit')) && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_update_observation_button', true);

            if (isset($_POST['save_observation']) || isset($_POST['complete_observation'])) {
                if ($vms_processor->update_vms_sub_agenda_details($vm_object_id, data_null_validator($_POST))) {
                    $vms_processor->add_vms_audit_attachment($vm_object_id, 'observation', $usr_id, $date_time);

                    if (isset($_POST['complete_observation'])) {
                        delete_workflow_action($vm_object_id, "Needs Correction", "audit_findings_review1");
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending for Audit Findings Review1");
                        update_workflow($vm_object_id, $audit_lead, 'Completed', 'audit');
                        delete_worklist($usr_id, $vm_object_id);
                        add_worklist($qa_approver, $vm_object_id);
                        save_workflow($vm_object_id, $qa_approver, 'Pending', 'audit_findings_review1');

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Request for Audit Findings Review1 | [Action Required]";
                        $actionDescription = "The Vendor Audit is Pending for Findings Review1";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                        //**** Audit Trail**//
                        $at_data['Send to Findings Review1'] = array('NA', getFullName($qa_approver), $qa_approver . " - " . getFullName($qa_approver));
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Audit Findings Review1 Pending');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Audit Findings Review1**//
    if ($wf_status == "Pending for Audit Findings Review1") {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Pending", 'audit_findings_review1') && (check_user_in_worklist($vm_object_id, $usr_id))) {
            $smarty->assign('show_audit_findings_review1_btn', true);
            $add_file_attachemnt = true;
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id));
            $smarty->assign('file_attachment_towards', "general");

            //****  Audit Findings Review1 Need Correction**//
            if (isset($_POST['audit_findings_review1_need_correction'])) {
                $vms_processor->update_vms_wf_status($vm_object_id, "Audit Findings Review1 Needs Correction");
                update_workflow($vm_object_id, $usr_id, 'Needs Correction', 'audit_findings_review1');
                delete_worklist($usr_id, $vm_object_id);
                add_worklist($audit_lead, $vm_object_id);

                //**** Audit Trail**//
                $audit_lead_name = getFullName($audit_lead);
                $at_data['Sent To'] = array("NA", $audit_lead_name, "$audit_lead - $audit_lead_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Audit Findings Review1 Needs Correction');

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $vm_no | Needs Correction | [Action Required]";
                $actionDescription = "The Vendor Audit Needs a Few Corrections";
                $mail_details = [
                    "Audit Tracking No." => $vm_no,
                    "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                ];
                send_workflow_mail($audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //**** Audit Findings Review1**//
            if (isset($_POST['audit_findings_reviewed1'])) {
                $audit_findings_review1_comments = (isset($_REQUEST['audit_findings_review1_comments'])) ? $_REQUEST['audit_findings_review1_comments'] : null;
                if ($vms_processor->add_vms_review_comments($vm_object_id, $audit_findings_review1_comments, $usr_id, $date_time, $audit_trail_action, 'audit_findings_review1')) {
                    update_workflow($vm_object_id, $usr_id, 'Reviewed', 'audit_findings_review1');
                    delete_worklist($usr_id, $vm_object_id);

                    //**** Audit Trail**//
                    $at_data['Reviewed By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
                    addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Reviewed');

                    if (is_action_finished($vm_object_id, "audit_findings_review1", "Reviewed")) {
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending Sending Audit Report");
                        add_worklist($audit_lead, $vm_object_id);

                        //If there is no non conformance
                        $vm_score = array_sum(array_column($vms_processor->get_vms_sub_agenda_details($vm_object_id), "score1"));
                        if (!$vms_processor->is_vms_nc_present($vm_object_id)) {
                            $effective_to_date = getModifiedDateFormat('Y-m-d', $today_date, getVendorApprovalExpiryYear(), 0, 0);
                            $vms_processor->update_vms_is_latest($vm_master->vendor_name, $vm_master->plant_name, 'no');
                            $vms_processor->update_vms_score_status($vm_object_id, $vm_score, "Qualified", $today_date, $effective_to_date, 'yes');
                            $vms_processor->update_vms_plant_audit_status(array('plant_id' => $vm_master->plant_name, 'vendor_status' => "Qualified", 'audit_status' => "Completed", 'effective_from' => $today_date, 'effective_to' => $effective_to_date, 'audit_type' => 'Re Audit', 're_audit_date' => getModifiedDateFormat('Y-m-d', $effective_to_date, 0, 0, -get_reminder_mail_days('vendor_approval_expiry'))));
                        }
                        //Generate Vendor Findings & certificate Report
                        require_once('lib/file/actions/vendor_audit_report_file.file.php');
                        require_once('lib/file/actions/vendor_certificate_file.file.php');

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Pending Sending Audit Report | [Action Required]";
                        $actionDescription = "The Vendor Audit Findings is Reviewed & Pending For Sending Audit Report";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Reviewed By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        header("Location:$_SERVER[REQUEST_URI]");
                    }
                }
            }
        }

        //****Recall Audit Findings Reviewer1**//
        if (check_user_in_workflow($vm_object_id, $audit_lead, "Completed", 'audit')) {
            $smarty->assign('recall_audit_findings_review1_btn', true);

            $audit_findings_reviewer1_pending_userlist = get_workflow_userlist_by_objectid_action_status($vm_object_id, 'audit_findings_review1', 'Pending');
            $smarty->assign('recall_from', 'Audit Findings Reviewer1');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qa_approve');
            $smarty->assign('recall_object_id', $vm_object_id);
            $smarty->assign('recall_pending_users_list', $audit_findings_reviewer1_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($vm_object_id, 'audit_findings_review1'), 'user_id'));

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

                        if (check_user_in_workflow($vm_object_id, $recall_user, "Pending", 'audit_findings_review1')) {
                            delete_worklist($recall_user, $vm_object_id);
                            delete_user_workflow_action($vm_object_id, $recall_user, "Pending", "audit_findings_review1");

                            add_worklist($replaced_by, $vm_object_id);
                            save_workflow($vm_object_id, $replaced_by, 'Pending', 'audit_findings_review1');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Request for Audit Findings Review1 | [Action Required]";
                            $actionDescription = "The Vendor Audit is Pending for Audit Findings Review1";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Recalled | [Info Mail]";
                            $actionDescription = "The Vendor Audit is Recalled from Audit Findings Reviewer1";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
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
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Start Of Pending Sending Audit Report**//
    if ($wf_status == "Pending Sending Audit Report" && $usr_id === $audit_lead) {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Completed", 'audit') && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_send_report_button', true);

            if (isset($_POST['uvms_message']) || isset($_POST['uvms_message'])) {
                $target_date = (isset($_REQUEST['uvms_target_date'])) ? $_REQUEST['uvms_target_date'] : null;
                $message = (isset($_REQUEST['uvms_message'])) ? $_REQUEST['uvms_message'] : null;

                if ($vms_processor->update_vms_target_date_message($vm_object_id, $target_date, $message)) {
                    if ($vm_master->vendor_status === "Qualified") {
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending Sending for Intimation and Acknowledgement");

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Vendor Approval Status | [Info Mail]";
                        $actionDescription = "$message - Audit Lead [" . getFullName($vm_master->audit_lead) . "]";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Vendor Status" => $vm_master->vendor_status,
                        ];
                        send_workflow_mail($vm_master->audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn, [$audit_report, $vac_report]);
                        send_workflow_mail($auditors, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn, [$audit_report, $vac_report]);
                        send_external_mail($auditees_mail_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn, [$audit_report, $vac_report]);
                    } else {
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending for Audit Findings Completion");

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Vendor Pending for Audit Findings Completion | [Info Mail]";
                        $actionDescription = "$message - Audit Lead [" . getFullName($vm_master->audit_lead) . "]";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Target Date" => display_date_format($target_date),
                            "Remarks" => $message,
                            "Vendor Status" => $vm_master->vendor_status,
                        ];
                        send_workflow_mail($vm_master->audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn, [$audit_report]);
                        send_workflow_mail($auditors, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn, [$audit_report]);
                        send_external_mail($auditees_mail_id, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn, [$audit_report]);
                    }
                } else {
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Pending for Audit Findings Completion**//
    if (($wf_status == "Pending for Audit Findings Completion" || $wf_status == "Audit Findings Review2 Needs Correction") && $usr_id === $audit_lead) {
        if ((check_user_in_workflow($vm_object_id, $usr_id, "Completed", 'audit')) && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_update_observation_feedback_button', true);

            if (isset($_POST['save_observation_feedback']) || isset($_POST['complete_observation_feedback'])) {
                if ($vms_processor->update_vms_sub_agenda_details($vm_object_id, data_null_validator($_POST))) {

                    if (isset($_POST['complete_observation_feedback'])) {
                        delete_workflow_action($vm_object_id, "Needs Correction", "audit_findings_review2");
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending for Audit Findings Review2");
                        delete_worklist($usr_id, $vm_object_id);
                        add_worklist($qa_approver, $vm_object_id);
                        save_workflow($vm_object_id, $qa_approver, 'Pending', 'audit_findings_review2');

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Request for Audit Findings Review2 | [Action Required]";
                        $actionDescription = "The Vendor Audit is Pending for Findings Review2";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($qa_approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                        //**** Audit Trail**//
                        $at_data['Send to Findings Review2'] = array('NA', getFullName($qa_approver), $qa_approver . " - " . getFullName($qa_approver));
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Audit Findings Review2 Pending');
                    }
                }
                $vms_processor->add_vms_audit_attachment($vm_object_id, 'feedback', $usr_id, $date_time);
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Audit Findings Review1**//
    if ($wf_status == "Pending for Audit Findings Review2") {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Pending", 'audit_findings_review2') && (check_user_in_worklist($vm_object_id, $usr_id))) {
            $smarty->assign('show_audit_findings_review2_btn', true);
            $add_file_attachemnt = true;
            $smarty->assign('edit_attachment', $add_file_attachemnt);
            $smarty->assign('fileobjectarray', $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id));
            $smarty->assign('file_attachment_towards', "general");

            //****  Audit Findings Review2 Need Correction**//
            if (isset($_POST['audit_findings_review2_need_correction'])) {
                $vms_processor->update_vms_wf_status($vm_object_id, "Audit Findings Review2 Needs Correction");
                update_workflow($vm_object_id, $usr_id, 'Needs Correction', 'audit_findings_review2');
                delete_worklist($usr_id, $vm_object_id);
                add_worklist($audit_lead, $vm_object_id);

                //**** Audit Trail**//
                $audit_lead_name = getFullName($audit_lead);
                $at_data['Sent To'] = array("NA", $audit_lead_name, "$audit_lead - $audit_lead_name");
                $at_data['Reason'] = array('NA', $wf_remarks, $wf_remarks);
                addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Audit Findings Review2 Needs Correction');

                //**** Send Mail**//
                $subject = "$lm_doc_short_name | $vm_no | Needs Correction | [Action Required]";
                $actionDescription = "The Vendor Audit Needs a Few Corrections";
                $mail_details = [
                    "Audit Tracking No." => $vm_no,
                    "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                    "Query/Remarks" => $wf_remarks,
                    "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                ];
                send_workflow_mail($audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            //**** Audit Findings Review1**//
            if (isset($_POST['audit_findings_reviewed2'])) {
                $audit_findings_review2_comments = (isset($_REQUEST['audit_findings_review2_comments'])) ? $_REQUEST['audit_findings_review2_comments'] : null;
                if ($vms_processor->add_vms_review_comments($vm_object_id, $audit_findings_review2_comments, $usr_id, $date_time, $audit_trail_action, 'audit_findings_review2')) {
                    update_workflow($vm_object_id, $usr_id, 'Reviewed', 'audit_findings_review2');
                    delete_worklist($usr_id, $vm_object_id);
                    add_worklist($audit_lead, $vm_object_id);

                    //**** Audit Trail**//
                    $at_data['Reviewed By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
                    addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Reviewed');

                    if (is_action_finished($vm_object_id, "audit_findings_review2", "Reviewed")) {
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending Sending for Intimation and Acknowledgement");
                        add_worklist($audit_lead, $vm_object_id);

                        //If there is no non conformance
                        $vm_score = array_sum(array_column($vms_processor->get_vms_sub_agenda_details($vm_object_id), "score2"));
                        if ($vm_score >= (int) getVendorApprovalScore()) {
                            $effective_to_date = getModifiedDateFormat('Y-m-d', $today_date, getVendorApprovalExpiryYear(), 0, 0);
                            $vms_processor->update_vms_is_latest($vm_master->vendor_name, $vm_master->plant_name, 'no');
                            $vms_processor->update_vms_score_status($vm_object_id, $vm_score, "Qualified", $today_date, $effective_to_date, 'yes');
                            $vms_processor->update_vms_plant_audit_status(array('plant_id' => $vm_master->plant_name, 'vendor_status' => "Qualified", 'audit_status' => "Completed", 'effective_from' => $today_date, 'effective_to' => $effective_to_date, 'audit_type' => 'Re Audit', 're_audit_date' => getModifiedDateFormat('Y-m-d', $effective_to_date, 0, 0, -get_reminder_mail_days('vendor_approval_expiry'))));
                        } else {
                            $vms_processor->update_vms_is_latest($vm_master->vendor_name, $vm_master->plant_name, 'no');
                            $vms_processor->update_vms_score_status($vm_object_id, $vm_score, "Disqualified", null, null, 'yes');
                            $vms_processor->update_vms_plant_audit_status(array('plant_id' => $vm_master->plant_name, 'vendor_status' => "Disqualified", 'audit_status' => "Completed"));
                        }

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Pending Sending for Intimation and Acknowledgement | [Action Required]";
                        $actionDescription = "The Vendor Audit Findings is Reviewed & Pending Sending for Intimation and Acknowledgement";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Reviewed By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($audit_lead, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }

        //****Recall Audit Findings Reviewer2**//
        if (check_user_in_workflow($vm_object_id, $audit_lead, "Completed", 'audit')) {
            $smarty->assign('recall_audit_findings_review2_btn', true);

            $audit_findings_reviewer1_pending_userlist = get_workflow_userlist_by_objectid_action_status($vm_object_id, 'audit_findings_review2', 'Pending');
            $smarty->assign('recall_from', 'Audit Findings Reviewer2');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qa_approve');
            $smarty->assign('recall_object_id', $vm_object_id);
            $smarty->assign('recall_pending_users_list', $audit_findings_reviewer1_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($vm_object_id, 'audit_findings_review2'), 'user_id'));

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

                        if (check_user_in_workflow($vm_object_id, $recall_user, "Pending", 'audit_findings_review2')) {
                            delete_worklist($recall_user, $vm_object_id);
                            delete_user_workflow_action($vm_object_id, $recall_user, "Pending", "audit_findings_review2");

                            add_worklist($replaced_by, $vm_object_id);
                            save_workflow($vm_object_id, $replaced_by, 'Pending', 'audit_findings_review2');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Request for Audit Findings Review2 | [Action Required]";
                            $actionDescription = "The Vendor Audit is Pending for Audit Findings Review2";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Recalled | [Info Mail]";
                            $actionDescription = "The Vendor Audit is Recalled from Audit Findings Reviewer2";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
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
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Start Of Pending Sending for Intimation and Acknowledgement**//
    if ($wf_status == "Pending Sending for Intimation and Acknowledgement" && $usr_id === $audit_lead) {
        if (check_user_in_workflow($vm_object_id, $usr_id, "Completed", 'audit') && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_send_ack_button', true);

            if (isset($_POST['request_acknowledegment'])) {
                if ($vms_processor->update_vms_wf_status($vm_object_id, "Pending for Acknowledgement")) {
                    $ack_users_to = (isset($_REQUEST['ack_users'])) ? $_REQUEST['ack_users'] : null;

                    delete_worklist($usr_id, $vm_object_id);
                    foreach ($ack_users_to as $to_user) {
                        add_worklist($to_user, $vm_object_id);
                        save_workflow($vm_object_id, $to_user, 'Pending', 'acknowledgement');

                        $ack_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $ack_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Request for Acknowledgement | [Action Required]";
                        $actionDescription = "The Vendor Audit is Pending for Acknowledgement";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                    }

                    //**** Audit Trail**//
                    $at_data['User'] = array('NA', $ack_at_n, $ack_at_p);
                    addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Acknowledgement Pending');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Pending for Acknowledgement**//
    if ($wf_status == "Pending for Acknowledgement") {
        if ((check_user_in_workflow($vm_object_id, $usr_id, "Pending", 'acknowledgement')) && check_user_in_worklist($vm_object_id, $usr_id)) {
            $smarty->assign('show_ack_button', true);

            //****Acknowledgement**//
            if (isset($_POST['acknowledged'])) {
                update_workflow($vm_object_id, $usr_id, 'Completed', 'acknowledgement');
                delete_worklist($usr_id, $vm_object_id);

                //**** Audit Trail**//
                $ack_user = getFullName($usr_id);
                $at_data['Acknowledged By'] = array($ack_user, $ack_user, "$usr_id - $ack_user");
                addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Acknowledged');

                if (is_action_finished($vm_object_id, "acknowledgement", "Completed")) {
                    $vms_processor->update_vms_wf_status($vm_object_id, "Completed");
                    $vms_processor->update_vms_status($vm_object_id, "Closed");

                    //**** Send Mail**//
                    $subject = "$lm_doc_short_name | $vm_no | Completed | [Info Mail]";
                    $actionDescription = "The Vendor Audit is Completed";
                    $mail_details = [
                        "Audit Tracking No." => $vm_no,
                        "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                        "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $workflow_userslist = get_all_workflow_users_list($vm_object_id);
                    send_workflow_mail($workflow_userslist, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }

        //**** Recall Acknowlegement **//  
        if (check_user_in_workflow($vm_object_id, $usr_id, "Completed", 'audit')) {
            $smarty->assign('recall_ack_button', true);

            $ack_pending_userlist = get_workflow_userlist_by_objectid_action_status($vm_object_id, 'acknowledgement', 'Pending');
            $smarty->assign('recall_from', 'Acknowledgement');
            $smarty->assign('recall_replace_option', true);
            $smarty->assign('recall_add_option', true);
            $smarty->assign('recall_remove_option', true);
            $smarty->assign('recall_dept_users', true);
            $smarty->assign('recall_object_id', $vm_object_id);
            $smarty->assign('recall_pending_users_list', $ack_pending_userlist);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($vm_object_id, 'acknowledgement'), 'user_id'));

            //**** Add **//
            if (isset($_POST['recall_add'])) {
                $recall_add_users_to = (isset($_REQUEST['recall_add_users_to'])) ? $_REQUEST['recall_add_users_to'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                $add_count = 0;
                foreach ($recall_add_users_to as $to_user) {
                    if (is_user_in_workflow_action($vm_object_id, $to_user, 'acknowledgement') == false) {
                        add_worklist($to_user, $vm_object_id);
                        save_workflow($vm_object_id, $to_user, 'Pending', 'acknowledgement');

                        $ack_at_n .= "\n\t\t\t" . getFullName($to_user);
                        $ack_at_p .= "\n\t\t\t" . $to_user . " - " . getFullName($to_user);

                        //**** Send Mail**//
                        $subject = "$lm_doc_short_name | $vm_no | Request for Acknowledgement | [Action Required]";
                        $actionDescription = "The Vendor Audit is Pending for Acknowledgement";
                        $mail_details = [
                            "Audit Tracking No." => $vm_no,
                            "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                            "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail($to_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        $add_count++;
                    }
                }
                if ($add_count > 0) {
                    //**** Audit Trail**//
                    $at_data[] = array('', "Reason : $recall_reason\nUser Details : $ack_at_n", $ack_at_p);
                    addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Successfully Added');
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            //**** Remove **//
            if (isset($_POST['recall_remove'])) {
                $recall_remove_user_array = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recall_reason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recall_remove_user_array) {
                    foreach ($recall_remove_user_array as $recall_user) {
                        if (check_user_in_workflow($vm_object_id, $recall_user, "Pending", 'acknowledgement')) {
                            delete_worklist($recall_user, $vm_object_id);
                            delete_user_workflow_action($vm_object_id, $recall_user, "Pending", "acknowledgement");

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $recall_ack_at_n .= "\n\t\t\t" . $recall_user_name;
                            $recall_ack_at_p .= "\n\t\t\t$recall_user - $recall_user_name";

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Recalled | [Info Mail]";
                            $actionDescription = "The Vendor Audit is Recalled from Acknowledgement";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                                "Reason for Recall" => $recall_reason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($recall_user, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
                        }
                    }
                    //**** Audit Trail**//
                    foreach ($ack_pending_userlist as $cft_pending_user) {
                        $recall_ack_at_o .= "\n\t\t\t" . $cft_pending_user['user_name'];
                    }
                    $at_data['Reason'] = array('NA', $recall_reason, $recall_reason);
                    $at_data[''] = array("Existing User List : $recall_ack_at_o", "Recalled User List : $recall_ack_at_n", $recall_ack_at_p);
                    addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Recalled');
                }
                $check_ack_pending_userlist = get_workflow_userlist_by_objectid_action_status($vm_object_id, 'acknowledgement', 'Pending');
                if (count($check_ack_pending_userlist) == 0) {
                    if (is_action_finished($vm_object_id, "acknowledgement", "Completed")) {
                        $vms_processor->update_vms_wf_status($vm_object_id, "Completed");
                    } else {
                        $vms_processor->update_vms_wf_status($vm_object_id, "Pending Sending for Intimation and Acknowledgement");
                    }
                    add_worklist($audit_lead, $vm_object_id);
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

                        if (check_user_in_workflow($vm_object_id, $recall_user, "Pending", 'acknowledgement')) {
                            delete_worklist($recall_user, $vm_object_id);
                            delete_user_workflow_action($vm_object_id, $recall_user, "Pending", "acknowledgement");

                            add_worklist($replaced_by, $vm_object_id);
                            save_workflow($vm_object_id, $replaced_by, 'Pending', 'acknowledgement');

                            //**** Audit Trail**//
                            $recall_user_name = getFullName($recall_user);
                            $replaced_by_name = getFullName($replaced_by);

                            $recall_user_at_o .= "\n\t\t$recall_user_name";
                            $recall_user_at_n .= "\n\t\t$replaced_by_name";
                            $recall_user_at_p .= "\n\t\t$recall_user - $recall_user_name : $replaced_by - $replaced_by_name";

                            //**** Send Mail Recall user**//
                            $subject = "$lm_doc_short_name | $vm_no | Request for Acknowledgement | [Action Required]";
                            $actionDescription = "The Vendor Audit is Pending for Acknowledgement";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail($replaced_by, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);

                            //**** Send Mail**//
                            $subject = "$lm_doc_short_name | $vm_no | Recalled | [Info Mail]";
                            $actionDescription = "The Vendor Audit is Recalled from Acknowledgement";
                            $mail_details = [
                                "Audit Tracking No." => $vm_no,
                                "Vendor Name" => $vms_processor->get_vms_org_name($vm_master->vendor_name),
                                "Status" => $vms_processor->get_vms_wf_status($vm_object_id),
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
                        addAuditTrailLog($vm_object_id, null, $at_data, $audit_trail_action, 'Succesfully Replaced');
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    //****Add File attachemnt**//
    ($add_file_attachemnt) ? $vms_processor->add_attachments_vms($vm_object_id, $_POST['file_attachment_towards'], $usr_id, $date_time) : false;

    //****Add/Update Access **//
    if (($usr_id == $creator) && ($wf_status != "Cancelled" && $wf_status != "Closed")) {
        $smarty->assign('edit_access_rights', true);
        $smarty->assign('plant_list', getPlantList());

        if (isset($_POST['edit_access_rights'])) {
            if (addDeptAccessRights($vm_object_id, "$usr_plant_id-$usr_dept_id", $_POST['doc_access_dept'], $usr_id, $date_time, $vm_no, $audit_trail_action)) {
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }

    $smarty->assign('lm_doc_id', $lm_doc_id);
    $smarty->assign('vm_master_obj', $vm_master);
    $smarty->assign('usr_dept_id', $usr_dept_id);
    $smarty->assign('usr_plant_id', $usr_plant_id);
    $smarty->assign('vm_no', $vm_no);
    $smarty->assign('initiator', getFullName($vm_master->created_by));
    $smarty->assign('vm_plant', getPlantName(getUserPlantId($vm_master->created_by)));
    $smarty->assign('vm_department', getDeptName($vm_master->created_by));
    $smarty->assign('vm_plant_obj', (object) array_shift($vms_processor->get_vms_plants($vm_master->vendor_name, $vm_master->plant_name)));
    $smarty->assign('vm_agenda_list', $vms_processor->get_vms_agenda_details($vm_object_id));
    $smarty->assign("ar_plant_list", getAccessRightsPlantList($vm_object_id));
    $smarty->assign("vm_auditors", $vms_processor->get_vms_auditors($vm_object_id));
    $smarty->assign("vm_auditees", $vms_processor->get_vms_auditees($vm_object_id));
    $smarty->assign("audit_lead_name", getFullName($vm_master->audit_lead));
    $smarty->assign("audit_lead_plant", getPlantName(getUserPlantId($vm_master->audit_lead)));
    $smarty->assign("audit_lead_dept", getDeptName($vm_master->audit_lead));
    $smarty->assign('qa_approve_comments', $vms_processor->get_vms_mgmt_review_comments($vm_object_id, null, 'qa_approve'));
    $smarty->assign('audit_findings_review1_comments', $vms_processor->get_vms_mgmt_review_comments($vm_object_id, null, 'audit_findings_review1'));
    $smarty->assign('audit_findings_review2_comments', $vms_processor->get_vms_mgmt_review_comments($vm_object_id, null, 'audit_findings_review2'));
    $smarty->assign('general_file_objectarray', $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id, 'general'));
    $smarty->assign('audit_observation_file_objectarray', $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id, 'observation'));
    $smarty->assign('audit_feedback_file_objectarray', $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id, 'feedback'));
    $smarty->assign('show_vendor_report', is_action_finished($vm_object_id, 'audit_findings_review1', 'Reviewed'));
    $smarty->assign('show_vendor_certificate', ($vm_master->vendor_status != "Pending") ? true : false);
    $smarty->assign('vms_aduit_plan_list', $vms_processor->get_vms_audit_plan($vm_object_id));

    $smarty->assign("worklist_pending_details", getWorklistPendingDetails($vm_object_id));
    $smarty->assign('status_details', get_all_workflow_actions($vm_object_id));
    $smarty->assign('wf_remarks_array', getWorkflowRemarks(null, $vm_object_id, null));
    $smarty->assign("progress_bar_status_per", get_vms_progress_bar_status($wf_status));
    $smarty->assign('cancelled_details', $vms_processor->get_vms_cancelled_details($vm_object_id));
    $smarty->assign("current_access_rights", getAccessRightsDeptList($vm_object_id));
    $smarty->assign("at_start_date", get_audit_min_max_date_details()['min_date']);
    $smarty->assign("at_end_date", get_audit_min_max_date_details()['max_date']);
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_vms.vms.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
