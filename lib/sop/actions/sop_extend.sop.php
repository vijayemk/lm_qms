<?php

/**
 * Project:     Logicmind
 * File:        search_sop.sop.php
 *
 * @author Ananthakumar.v 
 * @since 24/03/2017
 * @package sop
 * @version 1.0
 * @see search_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_extend', 'yes')) {
    $error_handler->raiseError("sop_extend");
}

include_module("admin");
$sop_process = new Sop_Processor();

$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$sop_type_id = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;

$sop_extend_list = $sop_process->get_sop_extend_list($sop_type_id);
$view_sop_type = new SopType();
$soptypelist = $view_sop_type->sop_type_list(null);

if (!empty($sop_object_id)) {
    $sop_master = new DB_Public_lm_sop_master();
    if ($sop_master->get("sop_object_id", $sop_object_id) && $sop_process->is_sop_eligible_for_extend($sop_object_id)) {
        //Current SOP Details
        $createtime = date('Y-m-d G:i:s');
        $createyear = date('y');
        $month = date('m');
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);
        $sop_type = $sop_process->get_sop_type($sop_master->sop_type);
        $current_sop_name = $sop_master->sop_name;
        $sop_no = $sop_process->get_sop_no($sop_object_id);
        $current_sop_revison = $sop_master->revision;
        $current_sop_supersedes = $sop_master->supersedes;
        $current_sop_effective_date = get_modified_date_format($sop_master->effective_date);
        $current_sop_expiry_date = get_modified_date_format($sop_master->expiry_date);
        if ($sop_process->get_published_status($sop_object_id) == "SOP Expired") {
            $smarty->assign("is_sop_capa_required", TRUE);
        }
        if (isset($_POST['extend']) && $sop_process->is_sop_eligible_for_extend($sop_object_id)) {
            $aextend_reason = (isset($_POST['aextend_reason'])) ? $_POST['aextend_reason'] : null;
            $acapa_no = (isset($_POST['acapa_no'])) ? $_POST['acapa_no'] : null;
            if (empty($acapa_no)) {
                $acapa_no = "N/A";
            }

            $extend_expiry_date = $sop_process->get_sop_expiry_date($current_sop_expiry_date);
            /*             * Update Extend date */
            $sop_master_extend_obj = new DB_Public_lm_sop_master();
            $sop_master_extend_obj->whereAdd("sop_object_id='$sop_object_id'");
            $sop_master_extend_obj->expiry_date = $extend_expiry_date;
            $sop_master_extend_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

            $sop_process->save_workflow($sop_object_id, $usr_id, 'Extended', 'extend');

            /*             * Insert Extend details */
            $sequence_object = new Sequence;
            $id = "sop.extend_details:" . $sequence_object->get_next_sequence();

            $sop_extend_details_obj = new DB_Public_lm_sop_extend_details();
            $sop_extend_details_obj->object_id = $id;
            $sop_extend_details_obj->sop_object_id = $sop_object_id;
            $sop_extend_details_obj->extend_from = $sop_master->expiry_date;
            $sop_extend_details_obj->extend_to = $extend_expiry_date;
            $sop_extend_details_obj->capa_no = $acapa_no;
            $sop_extend_details_obj->reason = $aextend_reason;
            $sop_extend_details_obj->created_by = $usr_id;
            $sop_extend_details_obj->created_time = $createtime;
            $sop_extend_details_obj->insert();

            /*             * Insert Extend mail details */
            $mail_to_user_to_array = $_POST['mail_to_user_to'] ?: NULL;
            $mail_comments = $_POST['mail_comments'] ?: NULL;

            $sequence_object = new Sequence;
            $extend_details_mail_id = "sop.extend_details_mail:" . $sequence_object->get_next_sequence();

            for ($i = 0; $i < count($mail_to_user_to_array); $i++) {
                $sop_extend_details_mail_obj = new DB_Public_lm_sop_extend_mail_details();
                $sop_extend_details_mail_obj->object_id = $extend_details_mail_id;
                $sop_extend_details_mail_obj->sop_extend_id = $id;
                $sop_extend_details_mail_obj->mail_send_to = $mail_to_user_to_array[$i];
                $sop_extend_details_mail_obj->insert();

                $user_obj = new DB_Public_users();
                $user_obj->get('user_id', $mail_to_user_to_array[$i]);
                $email = $user_obj->email;
                $mail = new changeMailer;
                $subject = "SOP Extended - Information Mail";
                $actionDescription = "The $sop_master->sop_name is Extended.";
                $detailsHeading = "SOP Details";
                $details = [
                    "Name" => $sop_master->sop_name,
                    "Revision" => $sop_master->revision,
                    "Extend From" => $sop_master->expiry_date,
                    "Extend To" => $extend_expiry_date,
                    "Remarks" => $mail_comments,
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
            //Audit Trial
            $remarks = $sop_master->sop_name . " Extended." . "\nReason for Extend : " . $aextend_reason . "\nExtend From :  $current_sop_expiry_date\n Extend To : $extend_expiry_date";
            add_sop_audit_trial($sop_object_id, $sop_master->sop_type, 'extend', $remarks, 'Extended');
            header("Location:?module=sop&action=view_sop&object_id=$sop_object_id");
        }
        //$deptlist = get_All_DeptList();
        $plant_dept_list = getPlantDeptList($usr_plant_id);

        $smarty->assign("sop_type", $sop_type);
        if (!empty($sop_object_id)) {
            $smarty->assign("sop_object_id", $sop_object_id);
        }if (!empty($current_sop_name)) {
            $smarty->assign("current_sop_name", $current_sop_name);
        }if (!empty($current_sop_revison)) {
            $smarty->assign("current_sop_revison", $current_sop_revison);
        }if (!empty($current_sop_supersedes)) {
            $smarty->assign("current_sop_supersedes", $current_sop_supersedes);
        }if (!empty($current_sop_effective_date)) {
            $smarty->assign("current_sop_effective_date", $current_sop_effective_date);
        }if (!empty($current_sop_expiry_date)) {
            $smarty->assign("current_sop_expiry_date", $current_sop_expiry_date);
        }if (!empty($sop_no)) {
            $smarty->assign("sop_no", $sop_no);
        }if (!empty($plant_dept_list)) {
            $smarty->assign("plant_dept_list", $plant_dept_list);
        }
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
}
if (!empty($sop_extend_list)) {
    $smarty->assign("sop_extend_list", $sop_extend_list);
}
$smarty->assign("soptypelist", $soptypelist);
$smarty->assign("sop_type_id", $sop_type_id);
$smarty->assign("sop_object_id", $sop_object_id);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_extend.sop.tpl");
?>
