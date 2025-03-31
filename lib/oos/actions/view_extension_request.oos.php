<?php

/**
 * Project:     Logicmind
 * File:        view_extension_request.oos.php
 *
 * @author Sivaranjani.S
 * @since 10/03/2022
 * @package oos
 * @version 1.0
 * @see view_extension_request.oos.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'oos_view', 'yes')) {
    $error_handler->raiseError("oos_view");
}

$ext_master = new DB_Public_lm_extension_details();
$ext_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
if ($ext_master->get("object_id", $ext_object_id)) {
    $date_time = date('Y-m-d G:i:s');
    $usr_id = trim($_SESSION['user_id']);
    $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-10');
    $sop_process = new Sop_Processor();
    $oos_process = new Oos_Processor();

    $oos_object_id = $ext_master->ref_object_id;
    $oos_no = $oos_process->get_oos_no($oos_object_id);
    $oos_master_obj = $oos_process->getOOSObject($oos_object_id);

    $extension_mgmt_comments = (isset($_REQUEST['oos_ext_comments'])) ? $_REQUEST['oos_ext_comments'] : null;
    /** To display the status in the status slide * */
    $extension_status_details = $sop_process->get_all_workflow_actions($ext_object_id);
    /** Insert and get Agenda Workflow remarks * */
    if (!empty($extension_mgmt_comments)) {
        $oos_process->add_oos_workflow_remarks($ext_object_id, $extension_mgmt_comments, $usr_id, $date_time);
    }
    $extension_remarks_array = $oos_process->get_oos_workflow_remarks($ext_object_id, null);
    $proposed_target_date = $ext_master->proposed_target_date;

    $deptlist = get_All_DeptList();
    $creator = $sop_process->get_creater_id($ext_object_id);
    if (!empty($sop_process->get_qc_reviewer_id($ext_object_id))) {
        $qc_reviewer = $sop_process->get_qc_reviewer_id($ext_object_id);
    }
    if (!empty($sop_process->get_qa_approver_id($ext_object_id))) {
        $qa_approver = $sop_process->get_qa_approver_id($ext_object_id);
    }
    $workflow_userslist = $sop_process->get_all_workflow_users_list($ext_object_id);

    /** Can i show Request QC Review Button * */
    if ($ext_master->action_status == "Extension Request Created" || $ext_master->action_status == "QC Reviewal Need Correction" && $creator == $usr_id) {
        if ($sop_process->check_user_in_workflow($ext_object_id, $usr_id, "Created", 'create') && ($sop_process->check_user_in_worklist($ext_object_id, $usr_id))) {
            $smarty->assign('request_qc_review_button', true);
            $smarty->assign('edit_content', true);

            if (isset($_POST['request_qc_review'])) {
                if ($oos_process->update_extension_action_status($ext_object_id, "QC Reviewal Pending")) {
                    $qc_reviewer = (isset($_REQUEST['qc_reviewer'])) ? $_REQUEST['qc_reviewer'] : null;
                    $sop_process->delete_workflow_action($ext_object_id, "Need Correction", "qc_review");
                    $sop_process->delete_worklist($creator, $ext_object_id);
                    $sop_process->add_worklist($qc_reviewer, $ext_object_id);
                    $sop_process->save_workflow($ext_object_id, $qc_reviewer, 'Waiting', 'qc_review');

                    /**  Audit Trial  * */
                    $remarks = $oos_no . "\nExtension Request Sent for QC Reviewal";
                    add_oos_audit_trial($oos_object_id, 'qc_review', $remarks, 'Waiting');

                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id', $qc_reviewer);
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $oos_obj = new DB_Public_lm_oos_details();
                    $oos_obj->get("object_id", $oos_object_id);
                    $oos_obj->find();
                    $subject = "$oos_no - Requesting QC Reviewal";
                    $actionDescription = "The OOS Extension Request is Waiting for  QC Reviewal";
                    $detailsHeading = "OOS Management";
                    $details = ["OOS" => $oos_no,
                        "Status" => $oos_obj->status,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
            }
        }
    }

    /** Can i show QC Review and QC Reviewal Need Correction Button * */
    if ($ext_master->action_status == "QC Reviewal Pending") {
        if ($sop_process->check_user_in_workflow($ext_object_id, $usr_id, "Waiting", 'qc_review') && $sop_process->check_user_in_worklist($ext_object_id, $usr_id)) {
            $smarty->assign('show_qc_review_button', true);

            if (isset($_POST['qc_review_correction'])) {
                $oos_process->update_extension_action_status($ext_object_id, "QC Reviewal Need Correction");
                $sop_process->update_workflow($ext_object_id, $usr_id, 'Need Correction', 'qc_review');
                $sop_process->delete_worklist($usr_id, $ext_object_id);
                $sop_process->add_worklist($creator, $ext_object_id);

                /**  Audit Trial  * */
                $remarks = $oos_no . "\nExtension Request sent back to " . getFullName($creator) . ".\n Reason : " . $extension_mgmt_comments;
                add_oos_audit_trial($oos_object_id, 'qc_review', $remarks, 'QC Reviewal Need Correction');

                $user_obj = new DB_Public_users();
                $user_obj->get('user_id', $qc_reviewer);
                $email = $user_obj->email;
                $mail = new changeMailer;
                $oos_obj = new DB_Public_lm_oos_details();
                $oos_obj->get("object_id", $oos_object_id);
                $oos_obj->find();
                $subject = "$oos_no - Regarding QC Reviewal Need Correction";
                $actionDescription = "The OOS Extension Request Needs to be Corrected";
                $detailsHeading = "OOS Management";
                $details = ["OOS" => $oos_no,
                    "Status" => $oos_obj->status,
                    "Sent By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
            }

            if (isset($_POST['qc_reviewed'])) {
                $sop_process->update_workflow($ext_object_id, $usr_id, 'Reviewed', 'qc_review');
                $oos_process->update_extension_action_status($ext_object_id, "Waiting for Sending QA Approval");
                $sop_process->delete_worklist($usr_id, $ext_object_id);
                $sop_process->add_worklist($creator, $ext_object_id);

                /**  Audit Trial  * */
                $remarks = $oos_no . "\nExtension Request Reviewed By " . getFullName($usr_id);
                add_oos_audit_trial($oos_object_id, 'qc_review', $remarks, 'Reviewed');

                $user_obj = new DB_Public_users();
                $user_obj->get('user_id', $qc_reviewer);
                $email = $user_obj->email;
                $mail = new changeMailer;
                $oos_obj = new DB_Public_lm_oos_details();
                $oos_obj->get("object_id", $oos_object_id);
                $oos_obj->find();
                $subject = "$oos_no - Regarding QC Review";
                $actionDescription = "The OOS Extension Request is Reviewed";
                $detailsHeading = "OOS Management";
                $details = ["OOS" => $oos_no,
                    "Status" => $oos_obj->status,
                    "Sent By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
            }
        }
    }

    /** Can I show Recall QC Review Button * */
    if ($ext_master->action_status == "QC Reviewal Pending") {
        if ($sop_process->check_user_in_workflow($ext_object_id, $usr_id, "Created", 'create')) {
            $smarty->assign('recall_qc_review_button', true);

            if (isset($_POST['recall_qc_review'])) {
                $user_obj = new DB_Public_users();
                $user_obj->get('user_id', $qc_reviewer);
                $email = $user_obj->email;
                $mail = new changeMailer;
                $oos_obj = new DB_Public_lm_oos_details();
                $oos_obj->get("object_id", $oos_object_id);
                $oos_obj->find();
                $subject = "$oos_no - Regarding Recall";
                $actionDescription = "The OOS Extension Request is Recalled";
                $detailsHeading = "OOS Management";
                $details = ["OOS" => $oos_no,
                    "Status" => $oos_obj->status,
                    "Sent By" => $_SESSION['full_name']
                ];
                $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$oos_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                $sop_process->delete_worklist($qc_reviewer, $oos_object_id);
                $sop_process->delete_workflow_action($oos_object_id, "Waiting", "qc_review");
                $oos_process->update_extension_action_status($ext_object_id, "Created");
                $sop_process->add_worklist($creator, $oos_object_id);
                /**   Audit Trial   * */
                $remarks = $oos_no . "\nRecalled By " . getFullName($creator) . ".\nReason for Recall : " . $extension_mgmt_comments;
                add_oos_audit_trial($oos_object_id, 'qc_review_recall', $remarks, 'Recalled');
                header("Location:index.php?module=oos&action=view_extension_request&object_id=$oos_object_id");
            }
        }
    }

    /** Can i show Request QA Approve Button * */
    if ($ext_master->action_status == "Waiting for Sending QA Approval" || $oos_master_obj->status == "QA Approval Need Correction" && $creator == $usr_id) {
        if ($sop_process->check_user_in_workflow($ext_object_id, $usr_id, "Created", 'create') && ($sop_process->check_user_in_worklist($ext_object_id, $usr_id))) {
            $smarty->assign('request_qa_approve_button', true);
            $smarty->assign('edit_content', true);

            if (isset($_POST['request_qa_approve'])) {
                if ($oos_process->update_extension_action_status($ext_object_id, "QA Approval Pending")) {
                    $qa_approver = (isset($_REQUEST['qa_approver'])) ? $_REQUEST['qa_approver'] : null;
                    $sop_process->delete_workflow_action($ext_object_id, "Need Correction", "qa_approver");
                    $sop_process->delete_worklist($creator, $ext_object_id);
                    $sop_process->add_worklist($qa_approver, $ext_object_id);
                    $sop_process->save_workflow($ext_object_id, $qa_approver, 'Waiting', 'qa_approve');

                    /**  Audit Trial  * */
                    $remarks = $oos_no . "\nExtension Request Sent for QA Approval";
                    add_oos_audit_trial($oos_object_id, 'qa_approve', $remarks, 'Waiting');

                    foreach ($workflow_userslist as $users_id) {
                        if ($_SESSION['user_id'] != $users_id) {
                            $user_obj = new DB_Public_users();
                            $user_obj->get('user_id', $users_id);
                            $email = $user_obj->email;
                            $mail = new changeMailer;
                            $oos_obj = new DB_Public_lm_oos_details();
                            $oos_obj->get("object_id", $oos_object_id);
                            $oos_obj->find();
                            $subject = "$oos_no - Requesting QA Approval";
                            $actionDescription = "The OOS Extension Request is Waiting for QA Approval";
                            $detailsHeading = "OOS Management";
                            $details = ["OOS" => $oos_no,
                                "Status" => $oos_obj->status,
                                "Sent By" => $_SESSION['full_name']
                            ];
                            $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                            $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                            ];
                            $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        }
                        header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
                    }
                }
            }
        }
    }

    /** Can i show QA Approve and QA Approval Need Correction Button * */
    if ($ext_master->action_status == "QA Approval Pending") {
        if ($sop_process->check_user_in_workflow($ext_object_id, $usr_id, "Waiting", 'qa_approve') && $sop_process->check_user_in_worklist($ext_object_id, $usr_id)) {
            $smarty->assign('show_qa_approve_button', true);

            if (isset($_POST['qa_approve_need_correction'])) {
                $oos_process->update_extension_action_status($ext_object_id, "QA Approval Need Correction");
                $sop_process->update_workflow($ext_object_id, $usr_id, 'Need Correction', 'qa_approve');
                $sop_process->delete_worklist($usr_id, $ext_object_id);
                $sop_process->add_worklist($creator, $ext_object_id);

                /**  Audit Trial  * */
                $remarks = $oos_no . "\nExtension Request sent back to " . getFullName($creator) . ".\n Reason : " . $extension_mgmt_comments;
                add_oos_audit_trial($oos_object_id, 'qa_approve', $remarks, 'QA Approval Need Correction');

                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id'] != $users_id) {
                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id', $users_id);
                        $email = $user_obj->email;
                        $mail = new changeMailer;
                        $oos_obj = new DB_Public_lm_oos_details();
                        $oos_obj->get("object_id", $oos_object_id);
                        $oos_obj->find();
                        $subject = "$oos_no - Regarding QA Approval Need Correction";
                        $actionDescription = "The OOS Extension Request Needs to be Corrected";
                        $detailsHeading = "OOS Management";
                        $details = ["OOS" => $oos_no,
                            "Status" => $oos_obj->status,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
                    }
                }
            }

            if (isset($_POST['qa_approved'])) {
                /**  Audit Trial  * */
                $remarks = $oos_no . "\nExtension Request Approved By " . getFullName($usr_id);
                add_oos_audit_trial($oos_object_id, 'qa_approve', $remarks, 'Approved');

                $sop_process->update_workflow($ext_object_id, $usr_id, 'Approved', 'qa_approve');
                $sop_process->delete_worklist($usr_id, $ext_object_id);
                $oos_process->update_extension_action_status($ext_object_id, "Extension Request Approved");
                $oos_process->update_extension_status($ext_object_id, "Completed");
                $oos_process->update_extended_target_date($oos_object_id, $proposed_target_date);

                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id'] != $users_id) {
                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id', $users_id);
                        $email = $user_obj->email;
                        $mail = new changeMailer;
                        $oos_obj = new DB_Public_lm_oos_details();
                        $oos_obj->get("object_id", $oos_object_id);
                        $oos_obj->find();
                        $subject = "$oos_no - Regarding QA Approval";
                        $actionDescription = "The OOS Extension Request is Approved";
                        $detailsHeading = "OOS Management";
                        $details = ["OOS" => $oos_no,
                            "Status" => $oos_obj->status,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                    header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
                }
            }
        }
    }

    /** Can I show Recall QA Approve Button * */
    if ($ext_master->action_status == "QA Approval Pending") {
        if ($sop_process->check_user_in_workflow($ext_object_id, $usr_id, "Created", 'create')) {
            $smarty->assign('recall_qa_approve_button', true);

            if (isset($_POST['recall_qa_approve'])) {
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id'] != $users_id) {
                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id', $users_id);
                        $email = $user_obj->email;
                        $mail = new changeMailer;
                        $oos_obj = new DB_Public_lm_oos_details();
                        $oos_obj->get("object_id", $oos_object_id);
                        $oos_obj->find();
                        $subject = "$oos_no - Regarding Recall";
                        $actionDescription = "The OOS Extension Request is Recalled";
                        $detailsHeading = "OOS Management";
                        $details = ["OOS" => $oos_no,
                            "Status" => $oos_obj->status,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=oos&action=view_extension_request&object_id=$ext_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                        $sop_process->delete_worklist($qa_approver, $ext_object_id);
                        $sop_process->delete_workflow_action($ext_object_id, "Waiting", "qa_approve");
                        $oos_process->update_extension_action_status($ext_object_id, "Waiting for Sending QA Approval");
                        $sop_process->add_worklist($creator, $ext_object_id);

                        /**   Audit Trial   * */
                        $remarks = $oos_no . "\nExtension Request Recalled By" . getFullName($creator) . ".\nReason for Recall: " . $extension_mgmt_comments;
                        add_oos_audit_trial($oos_object_id, 'qa_approve_recall', $remarks, 'Recalled');
                        header("Location:index.php?module=oos&action=view_extension_request&object_id=$ext_object_id");
                    }
                }
            }
        }
    }

    if (!empty($deptlist)) {
        $smarty->assign('deptlist', $deptlist);
    }

    if (!empty($extension_remarks_array)) {
        $smarty->assign('extension_remarks_array', $extension_remarks_array);
    }

    if (!empty($extension_status_details)) {
        $smarty->assign('extension_status_details', $extension_status_details);
    }

    $smarty->assign('lm_doc_id', $lm_doc_id);
    $smarty->assign('existing_target_date', get_modified_date_format($ext_master->existing_target_date));
    $smarty->assign('proposed_target_date', get_modified_date_format($ext_master->proposed_target_date));
    $smarty->assign('action_status', $ext_master->action_status);
    $smarty->assign('status', $ext_master->status);
    $smarty->assign('ext_object_id', $ext_object_id);
    $smarty->assign('oos_master_obj', $oos_master_obj);
    $smarty->assign('ext_master_obj', $ext_master);
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_extension_request.oos.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
