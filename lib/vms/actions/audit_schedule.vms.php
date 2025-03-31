<?php

/**
 * Project: Logicmind
 * File: initiate_vms.vms.php
 *
 * @author Sivaranjani S, Puneet
 * @since 08/12/2020
 * @package vms
 * @version 1.0
 * @see initiate_vms.vms.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'vendor_create', 'yes')) {
    $error_handler->raiseError("create_vendor");
}

$agenda = getVendorAgendaCatList(null, null, 'yes');
if (empty($agenda)) {
    $smarty->assign('master_data_creation_alert', true);
} else {
    $usr_id = $_SESSION['user_id'];
    $usr_dept_id = getDeptId($usr_id);
    $date_time = date('Y-m-d G:i:s');
    $usr_plant_id = getUserPlantId($usr_id);
    $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-6');

    $temp_vms_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);
    // throw error if if dev rleated , sub related ,classifi ,dev_type not exist
    if (empty($temp_vms_no)) {
        $error_handler->raiseError("VMS NUMBER SEQUENCE NOT EXIST");
    }
    $vms_processor = new Vms_processor();

    /** Add VMS Details  * */
    if (isset($_POST['initiate_vendor'])) {
        $avms_data = array(
            'org' => $_POST['org'] ?: NULL,
            'plant' => $_POST['plant'],
            'is_latest' => 'yes',
            'agenda_cat' => $_POST['agenda_cat'],
            'agenda_sub_cat' => $_POST['agenda_sub_cat'],
            'score' => $_POST['score'],
            'audit_from_date' => $_POST['audit_from_date'],
            'audit_to_date' => $_POST['audit_to_date'],
            'scope' => $_POST['avms_scope'],
            'objectives' => $_POST['avms_objectives'],
            'usr_id' => $usr_id,
            'usr_dept' => $usr_dept_id,
            'usr_plant' => $usr_plant_id,
            'date_time' => $date_time,
            'audit_type' => "First Time",
            'lm_doc_id' => $lm_doc_id,
            'audit_trail_action' => $_POST['audit_trail_action']
        );
        $vms_object_id = $vms_processor->add_vms_audit_schedule($avms_data);
        if (empty($vms_object_id)) {
            $error_handler->raiseError("INSERT_REQUEST_FAILED");
        } else {
            header(get_lm_json_value_by_key("definitions->url->vms->header_redirect") . $vms_object_id);
        }
    }

    /** Re Audit  * */
    if (isset($_POST['reaudit'])) {
        $avms_data = array(
            'org' => $_POST['reaudit_org_id'] ?: NULL,
            'plant' => $_POST['reaudit_plant_id'],
            'is_latest' => 'no',
            'agenda_cat' => $_POST['agenda_cat'],
            'agenda_sub_cat' => $_POST['agenda_sub_cat'],
            'score' => $_POST['score'],
            'audit_from_date' => $_POST['audit_from_date'],
            'audit_to_date' => $_POST['audit_to_date'],
            'scope' => $_POST['avms_scope'],
            'objectives' => $_POST['avms_objectives'],
            'usr_id' => $usr_id,
            'usr_dept' => $usr_dept_id,
            'usr_plant' => $usr_plant_id,
            'date_time' => $date_time,
            'audit_type' => "Re Audit",
            'lm_doc_id' => $lm_doc_id,
            'audit_trail_action' => $_POST['audit_trail_action']
        );
        $vms_object_id = $vms_processor->add_vms_audit_schedule($avms_data);
        if (empty($vms_object_id)) {
            $error_handler->raiseError("INSERT_REQUEST_FAILED");
        } else {
            header(get_lm_json_value_by_key("definitions->url->vms->header_redirect") . $vms_object_id);
        }
    }

    $smarty->assign('vm_no', $temp_vms_no);
    $smarty->assign('agenda', $agenda);
    $smarty->assign('organization_list', $vms_processor->get_vms_org(null, 'yes'));
    $smarty->assign('vm_list', $vms_processor->get_vms_details(["status" => "Open"]));
}
$smarty->assign('main', _TEMPLATE_PATH_ . "audit_schedule.vms.tpl");
