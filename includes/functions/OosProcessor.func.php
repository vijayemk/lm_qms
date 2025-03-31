<?php

function addOosCheckList($data)
{
    $checkPoints = trim($data['checkPoints']);
    $userId = $data['userId'];
    $dateTime = $data['dateTime'];

    if (isOosCheckListExist($checkPoints) == false) {

        $id = get_object_id("definitions->object_id->qms->oos_master_data->check_list->object_id");

        $obj = new DB_Public_lm_oos_checklist_master();
        $obj->object_id = $id;
        $obj->check_points = $checkPoints;
        $obj->is_enabled = "yes";
        $obj->created_by = $userId;
        $obj->created_time = $dateTime;
        $obj->modified_by = $userId;
        $obj->modified_time = $dateTime;

        if ($obj->insert()) {

            //Audit Trail            
            $atData['Check Points'] = array("NA", $checkPoints, $checkPoints);
            $atData['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($id, null, $atData, "Add Checklist Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function isOosCheckListExist($checkPoints)
{
    $obj = new DB_Public_lm_oos_checklist_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(check_points) = lower('$checkPoints')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getOosChecklistDetails($isEnabled = null)
{
    $obj = new DB_Public_lm_oos_checklist_master();
    if ($isEnabled) {
        $obj->whereAdd("is_enabled='$isEnabled'");
    }
    $obj->orderBy('object_id');

    if ($obj->find()) {

        while ($obj->fetch()) {

            $checklistList[] = [
                'objectId' => $obj->object_id,
                'checkPoints' => $obj->check_points,
                'isEnabled' => $obj->is_enabled,
                'createdBy' => getFullName($obj->created_by),
                'createdTime' => $obj->created_time,
                'modifiedBy' => getFullName($obj->modified_by),
                'modifiedTime' => $obj->modified_time
            ];
        }
        return $checklistList;
    }
    return null;
}

function getOosCheckListByPhase($refPhaseId)
{
    $obj = new DB_Public_lm_oos_checklist_details();
    $obj->whereAdd("ref_phase_id='$refPhaseId'");
    $obj->orderBy('object_id');
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $checkList[] = [
            'objectId' => $obj->object_id,
            'oosObjectId' => $obj->oos_object_id,
            'checkListId' => $obj->checklist_id,
            'checkPoint' => getOosCheckPoints($obj->checklist_id),
            'refPhaseId' => $obj->ref_phase_id,
            'createdBy' => $obj->created_by,
            'yesNoNa' => $obj->yes_no_na,
            'observation' => $obj->observation,
            'createdTime' => $obj->created_time,
            'modifiedBy' => $obj->modified_by,
            'modifiedTime' => $obj->modified_time,
            'count' => $count++
        ];

    }
    return $checkList;
}

function updateOosCheckList($data)
{
    $objectId = trim($data['objectId']);
    $checkPoints = trim($data['checkPoints']);
    $userId = $data['userId'];
    $dateTime = $data['dateTime'];
    $isEnabled = trim($data['isEnabled']);

    if (isOosCheckListExist($checkPoints) == false) {

        $oldObj = new DB_Public_lm_oos_checklist_master();
        $oldObj->get("object_id", $objectId);

        $obj = new DB_Public_lm_oos_checklist_master();
        $obj->whereAdd("object_id='$objectId'");
        $obj->check_points = $checkPoints;
        $obj->is_enabled = $isEnabled;
        $obj->modified_by = $userId;
        $obj->modified_time = $dateTime;

        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

            //Audit Trail
            $atData['Check Points'] = array($oldObj->check_points, $checkPoints, "$objectId - " . $checkPoints);
            $atData['Is Enabled'] = array($oldObj->is_enabled, $isEnabled, $isEnabled);
            addAuditTrailLog($objectId, null, $atData, "Update Checklist Master", "Successfuly Updated");
            return true;
        }
        return false;
    }
    return false;
}

function addOosTestDetails($data)
{
    $testName = trim($data['testName']);
    $userId = $data['userId'];
    $dateTime = $data['dateTime'];

    if (isOosTestNameExist($testName) == false) {

        $id = get_object_id("definitions->object_id->qms->oos_master_data->test_details->object_id");

        $obj = new DB_Public_lm_oos_test_details_master();
        $obj->object_id = $id;
        $obj->test_name = $testName;
        $obj->created_by = $userId;
        $obj->created_time = $dateTime;
        $obj->modified_by = null;
        $obj->modified_time = null;

        if ($obj->insert()) {

            //Audit Trail            
            $atData['Test Name'] = array("NA", $testName, $testName);
            addAuditTrailLog($id, null, $atData, "Add Test Details Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function isOosTestNameExist($testName)
{
    $obj = new DB_Public_lm_oos_test_details_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(test_name) = lower('$testName')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getOosTestDetailsList()
{
    $obj = new DB_Public_lm_oos_test_details_master();
    $obj->orderBy('object_id');

    if ($obj->find()) {

        while ($obj->fetch()) {

            $testDetailsList[] = [
                'objectId' => $obj->object_id,
                'testName' => $obj->test_name,
                'createdBy' => getFullName($obj->created_by),
                'createdTime' => $obj->created_time,
                'modifiedBy' => getFullName($obj->modified_by),
                'modifiedTime' => $obj->modified_time
            ];
        }
        return $testDetailsList;
    }
    return null;
}

function updateOosTestDetails($data)
{
    $objectId = trim($data['objectId']);
    $testName = trim($data['testName']);
    $userId = $data['userId'];
    $dateTime = $data['dateTime'];

    if (isOosTestNameExist($testName) == false) {

        $oldObj = new DB_Public_lm_oos_test_details_master();
        $oldObj->get("object_id", $objectId);

        $obj = new DB_Public_lm_oos_test_details_master();
        $obj->whereAdd("object_id='$objectId'");
        $obj->test_name = $testName;
        $obj->modified_by = $userId;
        $obj->modified_time = $dateTime;

        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

            //Audit Trail
            $atData['Test Name'] = array($oldObj->test_name, $testName, "$objectId - " . $testName);

            addAuditTrailLog($objectId, null, $atData, "Update Test Details Master", "Successfuly Updated");
            return true;
        }
        return false;
    }
    return false;
}

function getOosCheckPoints($objectId)
{
    $obj = new DB_Public_lm_oos_checklist_master();
    $obj->get("object_id", $objectId);
    return $obj->check_points;
}

function getErrorClass($errorClassificationId) {
    $obj = new DB_Public_lm_error_classification_master();
    $obj->get("object_id", $errorClassificationId);
    return $obj->type;
}

function getErrorType($errorTypeId) {
    $eobj = new DB_Public_lm_error_type_master();
    $eobj->get("object_id", $errorTypeId);
    return $eobj->type;
}