<?php

/**
 * Project:Logicmind
 * File:add_dms.dms.php
 *
 * @author Sivaranjani S
 * @since0 05/03/2020
 * @package dms
 * @version 1.0
 * @see add_dms.dms.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'dms_create', 'yes')) {
    $error_handler->raiseError("dms_create");
}
$usr_id = $_SESSION['user_id'];
$usr_dept_id = getDeptId($usr_id);
$date_time = date('Y-m-d G:i:s');
$usr_plant_id = getUserPlantId($usr_id);
$lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-5');

$dms_process = new Dms_Processor();

$dev_type_list = getDevTypeMasterDetailsList(null, null, 'yes');
$classification_list = getClassificationMasterList(null, null, 'yes');
$dev_realted_to_list = getDevRelatedToMasterDetails(null, null, 'yes');
$temp_dev_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);

// throw error if if dev rleated , sub related ,classifi ,dev_type not exist
if (empty($temp_dev_no)) {
    $error_handler->raiseError("DMS NUMBER SEQUENCE NOT EXIST");
} else if (empty($dev_type_list) || empty($classification_list) || empty($dev_realted_to_list)) {
    $smarty->assign('master_data_creation_alert', true);
}

/** Add DMS Details  * */
if (isset($_POST['add_dms'])) {
    $adms_data = array(
        'dev_type' => $_POST['adev_type'] ?: NULL,
        'dev_classification' => $_POST['adev_classification'] ?: NULL,
        'dev_date_of_occ' => $_POST['adev_date_of_occ'] ?: NULL,
        'dev_time_of_occ' => $_POST['adev_time_of_occ'] ?: NULL,
        'dev_date_of_discover' => $_POST['adev_date_of_discover'] ?: NULL,
        'dev_time_of_discover' => $_POST['adev_time_of_discover'] ?: NULL,
        'dev_related_to_array' => $_POST['adev_related_to'] ?: NULL,
        'adev_repetitive_dms_no_array' => $_POST['adev_repetitive_dms_no'] ?: NULL,
        'dev_meeting' => $_POST['adev_meeting'],
        'dev_training' => $_POST['adev_training'],
        'dev_exam' => $_POST['adev_exam'],
        'dev_task' => $_POST['adev_task'],
        'access_dept' => $_POST['access_dept'],
        'usr_id' => $usr_id,
        'usr_plant_id' => $usr_plant_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'lm_doc_id' => $lm_doc_id,
        'audit_trail_action' => $_POST['audit_trail_action']
    );
    $dev_object_id = $dms_process->add_dms_details($adms_data);
    if (empty($dev_object_id)) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header(get_lm_json_value_by_key("definitions->url->dms->header_redirect") . $dev_object_id);
    }
}

$smarty->assign('temp_dev_no', $temp_dev_no);
$smarty->assign('dev_type_list', $dev_type_list);
$smarty->assign('classification_list', $classification_list);
$smarty->assign('dev_realted_to_list', $dev_realted_to_list);
$smarty->assign('plant_list', getPlantList());
$smarty->assign('usr_dept_id', $usr_dept_id);
$smarty->assign('usr_dept_name', getDepartment($usr_dept_id));
$smarty->assign('usr_plant_id', getUserPlantId($usr_id));
$smarty->assign('usr_plant_name', getPlantShortName(getUserPlantId($usr_id)));
$smarty->assign('main', _TEMPLATE_PATH_ . "add_dms.dms.tpl");
?>


