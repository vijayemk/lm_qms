<?php

/**
 * Project: Logicmind
 * File: add_ccm.ccm.php
 *
 * @author Benila Arthi O G, Puneet
 * @since 24/02/2020
 * @package ccm
 * @version 1.0
 * @see   add_ccm.ccm.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'ccm_create', 'yes')) {
    $error_handler->raiseError("ccm_create");
}
$usr_id = $_SESSION['user_id'];
$usr_dept_id = getDeptId($usr_id);
$usr_plant_id = getUserPlantId($usr_id);
$date_time = date('Y-m-d G:i:s');
$lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-11');

$change_type_list = getChangeTypeDetails(null, null, 'yes');
$classification_list = getClassificationMasterList(null, null, 'yes');
$changes_related_to_list = getChangeRelatedToList(null, null, 'yes');
$temp_cc_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);

// throw error if if $change_type_list ,$changes_related_to_list ,$classification_list  not exist
if (empty($temp_cc_no)) {
    $error_handler->raiseError("CCM NUMBER SEQUENCE NOT EXIST");
} else if (empty($change_type_list) || empty($classification_list) || empty($changes_related_to_list)) {
    $smarty->assign('master_data_creation_alert', true);
}

/** Add CCM Details  * */
if (isset($_POST['add_ccm'])) {
    $ccm_process = new Ccm_Processor();
    $sorurce_doc_no = $_POST['sorurce_doc_no'] ?? null;
    $sorurce_doc_no_others = $_POST['sorurce_doc_no_others'] ?? null;
    $access_dept = $_POST['access_dept'] ?? NULL;
    $cc_from = $_POST['cc_from'] ?? null;
    $reason = $_POST['reason'] ?? NULL;

    if ($cc_from === "OTHERS") {
        $source_lm_doc_id = $cc_from;
        $source_doc = $sorurce_doc_no_others;
    } else {
        $source_lm_doc_id = getLmDocIdByShortName($cc_from);
        $source_doc = $sorurce_doc_no;
    }

    $cc_object_id = $ccm_process->add_ccm_details($source_doc, $source_lm_doc_id, "manual", $reason, $usr_id, $access_dept, $date_time, $audit_trail_action);
    if (empty($cc_object_id)) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:?module=ccm&action=view_ccm&object_id=$cc_object_id");
    }
}

$smarty->assign('temp_cc_no', $temp_cc_no);
$smarty->assign('plant_list', getPlantList());
$smarty->assign('usr_dept_id', $usr_dept_id);
$smarty->assign('usr_dept_name', getDepartment($usr_dept_id));
$smarty->assign('usr_plant_id', getUserPlantId($usr_id));
$smarty->assign('usr_plant_name', getPlantShortName(getUserPlantId($usr_id)));
$smarty->assign('main', _TEMPLATE_PATH_ . "add_ccm.ccm.tpl");
