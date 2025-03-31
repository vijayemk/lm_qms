<?php

/**
 * Project: Logicmind
 * File: add_capa_details.capa.php
 *
 * @author Gopinath.R , Puneet
 * @since 10/03/2020
 * @package capa
 * @version 1.0
 * @see add_capa_details.capa.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'capa_create', 'yes')) {
    $error_handler->raiseError("capa_create");
}
$usr_id = $_SESSION['user_id'];
$usr_dept_id = getDeptId($usr_id);
$usr_plant_id = getUserPlantId($usr_id);
$date_time = date('Y-m-d G:i:s');
$lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-12');

$temp_capa_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);
if (empty($temp_capa_no)) {
    $error_handler->raiseError("CAPA NUMBER SEQUENCE NOT EXIST");
}

if (isset($_POST['add_capa'])) {
    $capa_process = new Capa_Processor();
    $sorurce_doc_no = $_POST['sorurce_doc_no'] ?? null;
    $sorurce_doc_no_others = $_POST['sorurce_doc_no_others'] ?? null;
    $access_dept = $_POST['access_dept'] ?? NULL;
    $audit_trail_action = $_POST['audit_trail_action'] ?? null;
    $capa_from = $_POST['capa_from'] ?? null;
    $reason = $_POST['reason'] ?? null;

    if ($capa_from === "OTHERS") {
        $source_lm_doc_id = $capa_from;
        $source_doc = $sorurce_doc_no_others;
    } else {
        $source_lm_doc_id = getLmDocIdByShortName($capa_from);
        $source_doc = $sorurce_doc_no;
    }

    $capa_object_id = $capa_process->add_capa_details($source_doc, $source_lm_doc_id, "manual", $reason, $usr_id, $access_dept, $date_time, $audit_trail_action);

    if (empty($capa_object_id)) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header(get_lm_json_value_by_key("definitions->url->capa->header_redirect") . $capa_object_id);
    }
}
$smarty->assign("temp_capa_number", $temp_capa_no);
$smarty->assign('plant_list', getPlantList());
$smarty->assign('usr_dept_id', $usr_dept_id);
$smarty->assign('usr_dept_name', getDepartment($usr_dept_id));
$smarty->assign('usr_plant_id', getUserPlantId($usr_id));
$smarty->assign('usr_plant_name', getPlantShortName(getUserPlantId($usr_id)));
$smarty->assign('main', _TEMPLATE_PATH_ . "add_capa.capa.tpl");
?>