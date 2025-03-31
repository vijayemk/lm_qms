<?php

/**
 * Project:Logicmind
 * File:add_oos.oos.php
 *
 * @author Jithin
 * @since 29/10/2024
 * @package OOS
 * @version 1.0
 * @see add_oos.oos.tpl
 **/

error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'oos_create', 'yes')) {
    $error_handler->raiseError("oos_create");
}

$userId = $_SESSION['user_id'];
$userDepartmentId = getDeptId($userId);
$userPlantId = getUserPlantId($userId);
$lmDocumentId = getLmDocObjectIdByDocCode('LM-DOC-10');
$oosNo = get_qms_no_seq($userPlantId, $lmDocumentId);

$checkListMasterList = getOosChecklistDetails('yes');
$testDetailsMaserList = getOosTestDetailsList();

if (empty($oosNo)) {
    $error_handler->raiseError("OOS NUMBER SEQUENCE NOT EXIST");
}

// If Master Datas Are Empty 
if (empty($checkListMasterList) or empty($testDetailsMaserList)) {
    $smarty->assign('masterDataCreationAlert', true);
}


$oosProcess = new Oos_Processor();
$testDetailsList = $oosProcess->getOosTestDetailsList();

// /** Add OOS Details  * */
if (isset($_POST['add_oos'])) {
    $oosData = [
        'specificationNo' => $_POST['specification_no'],
        'testProcedureNo' => $_POST['test_procedure_no'],
        'arNo' => $_POST['ar_no'],
        'dateOfOccurrence' => $_POST['date_of_occurrence'],
        'timeOfOccurrence' => $_POST['time_of_occurrence'],
        'description' => $_POST['description'],
        'testNameArray' => $_POST['test_name'],
        'specificationLimitArray' => $_POST['specification_limit'],
        'obtainedResultArray' => $_POST['obtained_result'],
        'obtainedResultRemarksArray' => $_POST['obtained_result_remarks'],
        'accessDepartment' => $_POST['access_dept'],
        'auditTrailAction' => $_POST['audit_trail_action'],
        'lmDocumentId' => $lmDocumentId,
        'oosNo' => $oosNo,
        'departmentId' => $userDepartmentId,
        'plantId' => $userPlantId,
        'userId' => $userId
    ];

    $objectId = $oosProcess->addOosDetails($oosData);

    if ($objectId == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:?module=oos&action=view_oos&object_id=$objectId");
    }
}



$smarty->assign('oosNo', $oosNo);
$smarty->assign('testDetailsList', $testDetailsList);
$smarty->assign('plantList', getPlantList());
$smarty->assign('userDepartmentId', $userDepartmentId);
$smarty->assign('userDepartmentName', getDepartment($userDepartmentId));
$smarty->assign('userPlantId', getUserPlantId($userId));
$smarty->assign('userPlantName', getPlantShortName(getUserPlantId($userId)));
$smarty->assign('main', _TEMPLATE_PATH_ . "add_oos.oos.tpl");









