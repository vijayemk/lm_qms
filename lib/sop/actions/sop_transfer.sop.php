<?php

/**
 * Project:     Logicmind
 * File:        sop_transfer.sop.php
 *
 * @author Ananthakumar.v 
 * @since 18/03/2020
 * @package sop
 * @version 1.0
 * @see sop_transfer.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_transfer', 'yes')) {
    $error_handler->raiseError("sop_transfer");
}

include_module("admin");
$sop_process = new Sop_Processor();
$sop_creation_reason_obj = new SopCreationReason();

$type_id = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;
$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$sop_type_id = (isset($_REQUEST['sop_type'])) ? $_REQUEST['sop_type'] : null;

$sop_transfer_list = $sop_process->get_sop_to_transfer_list($type_id);
$sop_draft_number = $sop_process->get_sop_draft_no($sop_type_id, 'get');
$view_sop_type = new SopType();
$soptypelist = $view_sop_type->sop_type_list(null);

if (!empty($sop_object_id)) {
    $sop_master = new DB_Public_lm_sop_master();
    if ($sop_master->get("sop_object_id", $sop_object_id) && $sop_process->is_sop_eligible_to_transfer($sop_object_id)) {
        //Current SOP Details
        $createtime = date('Y-m-d G:i:s');
        $createyear = date('y');
        $month = date('m');
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);
        $current_sop_type = $sop_process->get_sop_type($sop_master->sop_type);
        $current_sop_name = $sop_master->sop_name;
        $current_sop_no = $sop_process->get_sop_no($sop_object_id);
        $current_sop_revison = $sop_master->revision;
        $current_sop_supersedes = $sop_master->supersedes;
        $current_sop_effective_date = get_modified_date_format($sop_master->effective_date);
        $current_sop_expiry_date = get_modified_date_format($sop_master->expiry_date);
        $formatlist = $sop_process->get_formatlist($sop_object_id);
        $annexurelist = $sop_process->get_annexurelist($sop_object_id);

        if (isset($_POST['transfer']) && $sop_process->is_sop_eligible_to_transfer($sop_object_id)) {
            $atransfer_reason = (isset($_POST['atransfer_reason'])) ? $_POST['atransfer_reason'] : null;
            $cc_no = (isset($_POST['cc_no'])) ? $_POST['cc_no'] : null;
            $reason_for_revision = (isset($_POST['reason_for_revision'])) ? $_POST['reason_for_revision'] : null;
            $sop_supersedes = (isset($_POST['sop_supersedes'])) ? $_POST['sop_supersedes'] : null;
            $assign_to_user = (isset($_POST['assign_to_user'])) ? $_POST['assign_to_user'] : null;
            $sop_content_tansfer = (isset($_POST['sop_content_tansfer'])) ? $_POST['sop_content_tansfer'] : null;
            $sop_format_content_tansfer_array = (isset($_POST['sop_format_content_tansfer'])) ? $_POST['sop_format_content_tansfer'] : null;
            $sop_annexure_content_tansfer_array = (isset($_POST['sop_annexure_content_tansfer'])) ? $_POST['sop_annexure_content_tansfer'] : null;
            $dept_view_array = (isset($_REQUEST['dept_view'])) ? $_REQUEST['dept_view'] : null;
            $usr_org_id = getUserOrganizationId($assign_to_user);
            $usr_dept_id = getDeptId($assign_to_user);

            if ($sop_draft_number == "invalid_type") {
                $error_handler->raiseError("SOP DRAFT NUMBER SEQUENCE NOT EXIST");
            }

            /** Update Transfer */
            $changed_expiry_date = date('Y-m-d');
            $sop_master_transfer_obj = new DB_Public_lm_sop_master();
            $sop_master_transfer_obj->whereAdd("sop_object_id='$sop_object_id'");
            $sop_master_transfer_obj->status = "Transferred";
            $sop_master_transfer_obj->expiry_date = $changed_expiry_date;
            if ($sop_master_transfer_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $sop_process->save_workflow($sop_object_id, $usr_id, 'Transferred', 'transfer');

                $sop_unique_name = md5(md5($current_sop_name) . md5($createtime) . md5(rand()));
                $transferrred_sop_object_id = $sop_process->add_sop_draft_master($sop_type_id, trim($current_sop_name), $cc_no, "00", $sop_supersedes, $reason_for_revision, $usr_plant_id, $sop_master->lang, $createyear, $month, $assign_to_user, $createtime, $usr_org_id, $usr_dept_id, $sop_unique_name, "N/A");
                
                if (!empty($transferrred_sop_object_id)) {
                    add_dept_doc_view_details($transferrred_sop_object_id, $usr_dept_id, $dept_view_array, $usr_id, $createtime);
                }
                
                /** Insert Transfer details */
                $sequence_object = new Sequence;
                $id = "sop.transfer_details:" . $sequence_object->get_next_sequence();

                $sop_transfer_details_obj = new DB_Public_lm_sop_transfer_details();
                $sop_transfer_details_obj->object_id = $id;
                $sop_transfer_details_obj->sop_object_id = $sop_object_id;
                $sop_transfer_details_obj->cc_no = $cc_no;
                $sop_transfer_details_obj->reason = $atransfer_reason;
                $sop_transfer_details_obj->created_by = $usr_id;
                $sop_transfer_details_obj->created_time = $createtime;
                $sop_transfer_details_obj->insert();

                /** Add Pending */
                $sop_process->add_worklist($assign_to_user, $transferrred_sop_object_id);
                /** Insert workflow  * */
                $sop_process->save_workflow($transferrred_sop_object_id, $assign_to_user, 'Created', 'create');

                //Audit Trial
                $remarks = trim($current_sop_name) . " Transferred";
                add_sop_audit_trial($transferrred_sop_object_id, $sop_type_id, 'create', $remarks, 'Created');

                /** Copy SOP Content */
                if (!empty($sop_content_tansfer)) {
                    $gsop_details = new DB_Public_lm_sop_details();
                    $gsop_details->get("sop_object_id", $sop_content_tansfer);

                    /** get previous sop content */
                    $sop_details = new DB_Public_lm_sop_details();
                    $sop_details->sop_object_id = $transferrred_sop_object_id;
                    $sop_details->sop_content = $gsop_details->sop_content;
                    $sop_details->created_by = $assign_to_user;
                    $sop_details->created_time = $createtime;
                    $sop_details->last_modified_by = $assign_to_user;
                    $sop_details->last_modified_time = $createtime;
                    $sop_details->insert();
                }
                /** Copy Format Content */
                for ($i = 0; $i < count($sop_format_content_tansfer_array); $i++) {
                    $format_master = new DB_Public_lm_sop_format_master();
                    if ($format_master->get("format_object_id", $sop_format_content_tansfer_array[$i])) {
                        $gsop_format_details = new DB_Public_lm_sop_format_details();
                        $gsop_format_details->get("format_object_id", $format_master->format_object_id);

                        $sequence_object = new Sequence;
                        $format_id = "sop.format:" . $sequence_object->get_next_sequence();

                        $format_no = $sequence_object->get_format_number_sequence($transferrred_sop_object_id);
                        $format_desc_no = $sequence_object->get_format_desc_number_sequence($transferrred_sop_object_id);

                        $add_sop_format_obj = new DB_Public_lm_sop_format_master();
                        $add_sop_format_obj->format_object_id = $format_id;
                        $add_sop_format_obj->sop_object_id = $transferrred_sop_object_id;
                        $add_sop_format_obj->format_department = $usr_dept_id;
                        $add_sop_format_obj->format_name = $format_master->format_name;
                        $add_sop_format_obj->revision = "00";
                        $add_sop_format_obj->supersedes = "Nil";
                        $add_sop_format_obj->revision_desc = "R";
                        $add_sop_format_obj->created_year = $createyear;
                        $add_sop_format_obj->created_month = $month;
                        $add_sop_format_obj->created_by = $assign_to_user;
                        $add_sop_format_obj->created_time = $createtime;
                        $add_sop_format_obj->modified_by = $assign_to_user;
                        $add_sop_format_obj->modified_time = $createtime;
                        $add_sop_format_obj->is_latest_revision = 'true';
                        $add_sop_format_obj->is_revised = 'no';
                        $add_sop_format_obj->format_no = $format_no;
                        $add_sop_format_obj->status = "Enabled";
                        $add_sop_format_obj->format_desc = $format_desc_no;
                        $add_sop_format_obj->orientation = $format_master->orientation;
                        $add_sop_format_obj->lang = $format_master->lang;
                        $add_sop_format_obj->insert();

                        $sequence_object->update_format_number_sequence($transferrred_sop_object_id);
                        $sequence_object->update_format_desc_number_sequence($transferrred_sop_object_id);

                        //Audit Trial
                        $audit_remarks = $format_master->format_name . " Transferred";
                        add_sop_audit_trial($transferrred_sop_object_id, $sop_type_id, 'create', $audit_remarks, 'Created');

                        $sop_format_details = new DB_Public_lm_sop_format_details();
                        $sop_format_details->format_object_id = $format_id;
                        $sop_format_details->format_content = $gsop_format_details->format_content;
                        $sop_format_details->created_by = $assign_to_user;
                        $sop_format_details->created_time = $createtime;
                        $sop_format_details->last_modified_by = $assign_to_user;
                        $sop_format_details->last_modified_time = $createtime;
                        $sop_format_details->insert();
                    }
                }
                /** Copy Annexure Content */
                for ($i = 0; $i < count($sop_annexure_content_tansfer_array); $i++) {
                    $annexure_master = new DB_Public_lm_sop_annexure_master();
                    if ($annexure_master->get("annexure_object_id", $sop_annexure_content_tansfer_array[$i])) {
                        $gsop_annexure_details = new DB_Public_lm_sop_annexure_details();
                        $gsop_annexure_details->get("annexure_object_id", $annexure_master->annexure_object_id);

                        $sequence_object = new Sequence;
                        $annexure_id = "sop.annexure:" . $sequence_object->get_next_sequence();

                        $annexure_no = $sequence_object->get_annexure_number_sequence($transferrred_sop_object_id);
                        $annexure_desc_no = $sequence_object->get_annexure_desc_number_sequence($transferrred_sop_object_id);

                        //get sop format_no
                        $annexure_format_id = $sop_process->get_lastet_format_no_id("Annexure", $sop_master->sop_type);

                        $add_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
                        $add_sop_annexure_obj->annexure_object_id = $annexure_id;
                        $add_sop_annexure_obj->sop_object_id = $transferrred_sop_object_id;
                        $add_sop_annexure_obj->annexure_desc = $annexure_desc_no;
                        $add_sop_annexure_obj->annexure_department = $usr_dept_id;
                        $add_sop_annexure_obj->annexure_name = $annexure_master->annexure_name;
                        $add_sop_annexure_obj->revision = "00";
                        $add_sop_annexure_obj->supersedes = "Nil";
                        $add_sop_annexure_obj->created_year = $createyear;
                        $add_sop_annexure_obj->created_month = $month;
                        $add_sop_annexure_obj->created_by = $assign_to_user;
                        $add_sop_annexure_obj->created_time = $createtime;
                        $add_sop_annexure_obj->modified_by = $assign_to_user;
                        $add_sop_annexure_obj->modified_time = $createtime;
                        $add_sop_annexure_obj->is_latest_revision = 'true';
                        $add_sop_annexure_obj->is_revised = 'no';
                        $add_sop_annexure_obj->annexure_no = $annexure_no;
                        $add_sop_annexure_obj->status = "Enabled";
                        $add_sop_annexure_obj->annexure_format_no = $annexure_format_id;
                        $add_sop_annexure_obj->orientation = $annexure_master->orientation;
                        $add_sop_annexure_obj->lang = $annexure_master->lang;
                        $add_sop_annexure_obj->insert();

                        //Audit Trial
                        $audit_remarks = $annexure_master->annexure_name . " Transferred";
                        add_sop_audit_trial($transferrred_sop_object_id, $sop_type_id, 'create', $audit_remarks, 'Created');

                        $sop_annexure_details = new DB_Public_lm_sop_annexure_details();
                        $sop_annexure_details->annexure_object_id = $annexure_id;
                        $sop_annexure_details->annexure_content = $gsop_annexure_details->annexure_content;
                        $sop_annexure_details->created_by = $assign_to_user;
                        $sop_annexure_details->created_time = $createtime;
                        $sop_annexure_details->last_modified_by = $assign_to_user;
                        $sop_annexure_details->last_modified_time = $createtime;
                        $sop_annexure_details->insert();

                        $sequence_object->update_annexure_number_sequence($transferrred_sop_object_id);
                        $sequence_object->update_annexure_desc_number_sequence($transferrred_sop_object_id);
                    }
                }

                /** Insert Transfer mail details */
                $mail_to_user_to_array = $_POST['mail_to_user_to'] ?: NULL;
                $mail_comments = $_POST['mail_comments'] ?: NULL;

                $sequence_object = new Sequence;
                $transfer_details_mail_id = "sop.transfer_details_mail:" . $sequence_object->get_next_sequence();

                for ($i = 0; $i < count($mail_to_user_to_array); $i++) {
                    $sop_transfer_details_mail_obj = new DB_Public_lm_sop_transfer_mail_details();
                    $sop_transfer_details_mail_obj->object_id = $transfer_details_mail_id;
                    $sop_transfer_details_mail_obj->sop_transfer_id = $id;
                    $sop_transfer_details_mail_obj->mail_send_to = $mail_to_user_to_array[$i];
                    $sop_transfer_details_mail_obj->insert();

                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id', $mail_to_user_to_array[$i]);
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $subject = "SOP Transferred - Information Mail";
                    $actionDescription = "The $sop_master->sop_name is Transferred.";
                    $detailsHeading = "SOP Details";
                    $details = [
                        "Name" => $sop_master->sop_name,
                        "Revision" => $sop_master->revision,
                        "Reason" => $mail_comments,
                        "Sent By" => $_SESSION['full_name']
                    ];
                    $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$transferrred_sop_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                        "detailsHeading" => $detailsHeading,
                        "details" => $details,
                        "buttonLink" => $buttonLink
                    ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                //Audit Trial
                $remarks = $sop_master->sop_name . " Transferred." . "\nReason : " . $atransfer_reason . "\nChange Control No : " . $cc_no . "\nExpiry Date Changed From : " . get_modified_date_format($sop_master->expiry_date) . "\nExpiry Date Changed To : " . get_modified_date_format(date($changed_expiry_date));
                add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'transfer', $remarks, 'Transferred');
            }
            header("Location:?module=sop&action=view_sop&object_id=$transferrred_sop_object_id");
        }
        $smarty->assign("current_sop_type", $current_sop_type);
        
        if (!empty($current_sop_name)) {
            $smarty->assign("current_sop_name", $current_sop_name);
        }if (!empty($current_sop_revison)) {
            $smarty->assign("current_sop_revison", $current_sop_revison);
        }if (!empty($current_sop_supersedes)) {
            $smarty->assign("current_sop_supersedes", $current_sop_supersedes);
        }if (!empty($current_sop_effective_date)) {
            $smarty->assign("current_sop_effective_date", $current_sop_effective_date);
        }if (!empty($current_sop_expiry_date)) {
            $smarty->assign("current_sop_expiry_date", $current_sop_expiry_date);
        }if (!empty($current_sop_no)) {
            $smarty->assign("current_sop_no", $current_sop_no);
        }
        $smarty->assign("usr_dept_id", $usr_dept_id);
        $smarty->assign("sop_reason_list", $sop_creation_reason_obj->sop_reason_list());
        $smarty->assign("plant_dept_list", getPlantDeptList($usr_plant_id));
        if (!empty($formatlist)) {
            $smarty->assign("formatlist", $formatlist);
        }
        if (!empty($annexurelist)) {
            $smarty->assign("annexurelist", $annexurelist);
        }
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
}
$smarty->assign("type_id", $type_id);
if (!empty($sop_transfer_list)) {
    $smarty->assign("sop_transfer_list", $sop_transfer_list);
}
$smarty->assign("soptypelist", $soptypelist);
$smarty->assign("sop_type_id", $sop_type_id);
$smarty->assign("sop_draft_number", $sop_draft_number);
$smarty->assign("sop_object_id", $sop_object_id);
$smarty->assign("usr_plant", getPlantName($usr_plant_id));
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_transfer.sop.tpl");
?>
