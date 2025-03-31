<?php

/**
 * Project: Logicmind
 * File: add_ams.ams.php
 *
 * @author Sivaranjani S, Puneet
 * @since 23/03/2021
 * @package ams
 * @version 1.0
 * @see add_ams.ams.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'audit_schedule', 'yes')) {
    $error_handler->raiseError("ams_create");
}
$usr_id = $_SESSION['user_id'];
$usr_dept_id = getDeptId($usr_id);
$usr_plant_id = getUserPlantId($usr_id);
$date_time = date('Y-m-d G:i:s');
$lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-7');

$temp_ams_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);
if (empty($temp_ams_no)) {
    $error_handler->raiseError("AMS NUMBER SEQUENCE NOT EXIST");
}

$ams_processor = new Ams_processor();

// throw error if if audit sub type not exist
if (empty(getAuditSubTypeList())) {
    $smarty->assign('master_data_creation_alert', true);
}


/** Add AMS Details  * */
if (isset($_POST['add_audit_schedule'])) {
    $aams_data = array(
        'audit_plant' => $_POST['aams_plant'] ?: NULL,
        'audit_type' => $_POST['aams_audit_type'] ?: NULL,
        'audit_sub_type' => $_POST['aams_audit_sub_type'] ?: NULL,
        'audit_dept' => $_POST['aams_audit_dept'] ?: NULL,
        'usr_plant' => $usr_plant_id,
        'audit_start_date' => $_POST['aams_start_date'],
        'audit_end_date' => $_POST['aams_end_date'],
        'audit_desc' => $_POST['aams_desc'],
        'usr_id' => $usr_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'audit_trail_action' => $_POST['audit_trail_action']
    );
    $ams_object_id = $ams_processor->add_ams_schedule($aams_data);
    if (empty($ams_object_id)) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

/** Iniatate AMS * */
if (isset($_POST['initiate_audit'])) {
    $aams_data = array(
        'am_object_id' => $_POST['am_object_id'] ?: NULL,
        'audit_lead' => $_POST['audit_lead'] ?: NULL,
        'audit_lead_plant' => $_POST['audit_lead_plant'] ?: NULL,
        'audit_lead_dept' => $_POST['audit_lead_dept'] ?: NULL,
        'usr_id' => $usr_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'audit_trail_action' => $_POST['audit_trail_action']
    );

    $ams_object_id = $ams_processor->initiate_ams($aams_data);
    if (empty($ams_object_id)) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header(get_lm_json_value_by_key("definitions->url->ams->header_redirect") . $ams_object_id);
    }
}

/** Update AMS Details  * */
if (isset($_POST['update_audit_schedule'])) {
    if (empty($ams_processor->update_ams_schedule(data_null_validator($_POST)))) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

/** Delete AMS Details  * */
if (isset($_POST['delete_audit_schedule'])) {
    if (empty($ams_processor->cancel_ams_schedule($_POST['am_object_id'], trim($_POST['cancel_reason']), $usr_id, $date_time, trim($_POST['audit_trail_action'])))) {
        $error_handler->raiseError("INVALID REQUEST");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}


$smarty->assign('usr_plant_id', $usr_plant_id);
$smarty->assign('am_type_list', getAuditTypeList(null));
$smarty->assign('temp_ams_no', $temp_ams_no);
$smarty->assign('plant_list', getPlantList(null));
$smarty->assign('ams_list', $ams_processor->get_ams_schedule_deatils(["wf_status" => "To be initiated"]));
$smarty->assign('ams_calendor_data', $ams_processor->get_ams_calendor_data());
$smarty->assign('usr_plant_id', $usr_plant_id);
$smarty->assign('end_date', date('Y-m-d'));
$smarty->assign('start_date', getModifiedDateFormat('Y-m-d', date('Y-m-d'), -1, 0, 0));
$smarty->assign('main', _TEMPLATE_PATH_ . "add_ams.ams.tpl");
