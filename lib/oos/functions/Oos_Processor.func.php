<?php

/**
 * Project: Logicmind
 * File: oos_Processor.func.php
 *
 * @author Jithin 
 * @since 20/01/2025
 * @package oos
 * @version 1.0
 * @see oos_Processor.func.php
 **/
class Oos_Processor
{
    function addOosDetails($data)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->object_id");
        $userId = $data['userId'];
        $dateTime = date('Y-m-d G:i:s');
        $auditTrailAction = $data['auditTrailAction'];
        $currentAccessPlantIdAndDepartmentId = $data['plantId'] . "-" . $data['departmentId'];
        $accessDepartmentArray = $data['accessDepartment'];

        $obj = new DB_Public_lm_oos_details();
        $obj->object_id = $objectId;
        $obj->lm_doc_id = $data['lmDocumentId'];
        $obj->oos_no = $data['oosNo'];
        $obj->date_of_occurrence = $data['dateOfOccurrence'];
        $obj->time_of_occurrence = $data['timeOfOccurrence'];
        $obj->reporting_date = $dateTime;
        $obj->specification_no = $data['specificationNo'];
        $obj->test_procedure_no = $data['testProcedureNo'];
        $obj->ar_no = $data['arNo'];
        $obj->description = $data['description'];
        $obj->department_id = $data['departmentId'];
        $obj->plant_id = $data['plantId'];
        $obj->status = "Open";
        $obj->wf_status = "Created";
        $obj->created_by = $userId;
        $obj->created_time = $dateTime;

        if ($obj->insert()) {

            $ipObjectId = get_object_id("definitions->object_id->workflow->oos->ip_invest_details");

            $ipObj = new DB_Public_lm_oos_ip_invest_details();
            $ipObj->object_id = $ipObjectId;
            $ipObj->oos_object_id = $objectId;
            $ipObj->is_assign_cause_identified = NULL;
            $ipObj->is_further_invest_required = NULL;
            $ipObj->is_oos_valid = NULL;
        }

        if ($ipObj->insert()) {

            $testNameArray = $data['testNameArray'];
            $specificationLimitArray = $data['specificationLimitArray'];

            for ($i = 0; $i < count($testNameArray); $i++) {

                $specObjectId = get_object_id("definitions->object_id->workflow->oos->spec_details");

                $specObj = new DB_Public_lm_oos_spec_details();
                $specObj->object_id = $specObjectId;
                $specObj->oos_object_id = $objectId;
                $specObj->test_object_id = $testNameArray[$i];
                $specObj->spec_limit = $specificationLimitArray[$i];
                $specObj->updated_by = $userId;
                $specObj->updated_date = $dateTime;
                $specObj->insert();
            }
        }

        $specDetailsArray = $this->getOosSpecificationDetails($objectId);
        $this->addOosAnalystDetails($objectId, $ipObjectId, $userId, $userId, $dateTime);
        $analystDetailsArray = $this->getOosAnalystDetails($ipObjectId);

        for ($i = 0; $i < count($analystDetailsArray); $i++) {
            for ($j = 0; $j < count($specDetailsArray); $j++) {
                $this->addOosSpecificationResultDetails($objectId, $ipObjectId, $analystDetailsArray[$i]['objectId'], $specDetailsArray[$j]['objectId'], $data['obtainedResultArray'][$j], $data['obtainedResultRemarksArray'][$j], $userId, $dateTime);
            }
        }


        add_worklist($userId, $objectId);
        save_workflow($objectId, $userId, 'Created', 'create');
        update_qms_no_seq($data['plantId'], $data['lmDocumentId']);


        // Audit Trial           
        $atData['OOS Temporary No'] = array("NA", $data['oosNo'], $data['oosNo']);
        $atData['Specification No'] = array("NA", $data['specificationNo'], $data['specificationNo']);
        $atData['Test Procedure No'] = array("NA", $data['testProcedureNo'], $data['testProcedureNo']);
        $atData['AR No'] = array("NA", $data['arNo'], $data['arNo']);
        $atData['Date Of Occurrence'] = array("NA", $data['dateOfOccurrence'], $data['dateOfOccurrence']);
        $atData['Time Of Occurrence'] = array("NA", $data['timeOfOccurrence'], $data['timeOfOccurrence']);
        $atData['Description'] = array("NA", $data['description'], $data['description']);
        addAuditTrailLog($objectId, null, $atData, $auditTrailAction, "Successfuly Added");

        // Add Department Access Rights 
        addDeptAccessRights($objectId, $currentAccessPlantIdAndDepartmentId, $accessDepartmentArray, $userId, $dateTime, $data['oosNo'], $auditTrailAction);
        return $objectId;
    }

    function addOosAnalystDetails($oosObjectId, $ipObjectId, $analystId, $userId, $dateTime)
    {
        $analystObjectId = get_object_id("definitions->object_id->workflow->oos->analyst_details");

        $obj = new DB_Public_lm_oos_invest_analyst_details();
        $obj->object_id = $analystObjectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->ref_phase_id = $ipObjectId;
        $obj->analyst_id = $analystId;
        $obj->assigned_by = $userId;
        $obj->assigned_date = $dateTime;
        $obj->insert();
        return true;
    }

    function addOosSpecificationResultDetails($oosObjectId, $ipObjectId, $analystDetailsId, $specDetailsId, $obtainedResultArray, $obtainedResultRemarksArray, $userId, $dateTime)
    {
        $specResultId = get_object_id("definitions->object_id->workflow->oos->spec_result_details");

        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->object_id = $specResultId;
        $obj->oos_object_id = $oosObjectId;
        $obj->ref_phase_id = $ipObjectId;
        $obj->analyst_details_id = $analystDetailsId;
        $obj->spec_details_id = $specDetailsId;
        $obj->obtained_result = $obtainedResultArray;
        $obj->obtained_result_remarks = $obtainedResultRemarksArray;
        $obj->updated_by = $userId;
        $obj->updated_time = $dateTime;
        $obj->insert();
        return true;
    }

    function addOosAttachments($objectId, $type, $userId, $dateTime, $refrenceObjectId = null)
    {
        /* Dropzone File Upload */
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileType = $_FILES['file']['type'];
            $fileSize = $_FILES['file']['size'];
            $fileName = $_FILES['file']['name'];
            $fileName = clean_filename($fileName, 0, 80);

            $fhash = md5($tempFile);
            $hash = uniqid($fhash);

            $fileInfo = new SplFileInfo($_FILES['file']['name']);
            $extension = $fileInfo->getExtension();

            $fileId = get_object_id("definitions->object_id->workflow->oos->file_upload");

            $file = new DB_Public_file();
            $file->object_id = $fileId;
            $file->type = $fileType;
            $file->name = $fileName;
            $file->size = $fileSize;
            $file->hash = $hash . "." . $extension;
            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
            $file->insert();

            $doc_file = new DB_Public_lm_oos_doc_file();
            $doc_file->file_id = $fileId;
            $doc_file->object_id = $objectId;
            $doc_file->type = $type;
            $doc_file->attached_by = $userId;
            $doc_file->attached_date = $dateTime;
            $doc_file->ref_object_id = $refrenceObjectId;
            if ($doc_file->insert()) {
                //audit trail
                $atData['File Name'] = array('NA', $fileName, $fileName);
                $atData['File Type'] = array('NA', $fileType, $fileType);
                $atData['File Size'] = array('NA', GetFriendlySize($fileSize), GetFriendlySize($fileSize));
                $atData['Refrence Towards'] = array('NA', $type, $type);
                $atData['Attached By'] = array('NA', getFullName($userId), $userId . " - " . getFullName($userId));
                addAuditTrailLog($objectId, $fileId, $atData, "Attach File", 'File Attached Successfully');
                return true;
            }
            return false;
        }
    }

    function addOosChecklistDetails($oosObjectId, $ref_phase_id, $checklistId, $userId, $dateTime)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->checklist_details");

        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->ref_phase_id = $ref_phase_id;
        $obj->checklist_id = $checklistId;
        $obj->yes_no_na = NULL;
        $obj->observation = NULL;
        $obj->created_by = $userId;
        $obj->created_time = $dateTime;
        $obj->modified_by = $userId;
        $obj->modified_time = $dateTime;
        $obj->insert();
        return true;
    }

    function addOosManufaturingInvestigationDetails($oosObjectId, $userId, $dateTime)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->manufacturing_investigation_details");
        $obj = new DB_Public_lm_oos_manufacturing_investigation_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->assigned_by = $userId;
        $obj->assigned_date = $dateTime;
        $obj->details = NULL;
        $obj->updated_by = NULL;
        $obj->updated_date = NULL;
        $obj->insert();
        return true;
    }

    function addOosPhase1InvestigationDetails($oosObjectId)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->1phase_investigation_details");
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->is_oos_valid = null;
        $obj->is_assign_cause_identified = null;
        $obj->assign_cause_details = null;
        $obj->is_further_investigation_required = null;
        $obj->error_type_id = null;
        $obj->error_class_id = null;
        $obj->qc_reviewer_comments = null;
        $obj->qc_approver_comments = null;
        $obj->qa_approver_comments = null;
        $obj->insert();
        return true;
    }

    function addOosSpecificationDetails($oosObjectId, $refPhaseId, $analystDetailsId, $specDetailsId)
    {
        $specResultId = get_object_id("definitions->object_id->workflow->oos->spec_result_details");

        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->object_id = $specResultId;
        $obj->oos_object_id = $oosObjectId;
        $obj->ref_phase_id = $refPhaseId;
        $obj->analyst_details_id = $analystDetailsId;
        $obj->spec_details_id = $specDetailsId;
        $obj->insert();
        return true;

    }

    function addOosPhase2RetestInvestigationDetails($oosObjectId)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->phase2_retest_investigation_details");

        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->retesting_description = NULL;
        $obj->is_oos_valid = NULL;
        $obj->is_assign_cause_identified = NULL;
        $obj->assign_cause_details = NULL;
        $obj->is_further_invest_required = NULL;
        $obj->error_type_id = NULL;
        $obj->error_classification_id = NULL;
        $obj->qc_reviewer_comments = NULL;
        $obj->qc_approver_comments = NULL;
        $obj->qa_approver_comments = NULL;
        $obj->insert();
        return true;
    }

    function addOosPhase2ResampleInvestigationDetails($oosObjectId)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->phase2_resample_investigation_details");

        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->retesting_description = NULL;
        $obj->is_oos_valid = NULL;
        $obj->is_assign_cause_identified = NULL;
        $obj->assign_cause_details = NULL;
        $obj->is_further_invest_required = NULL;
        $obj->error_type_id = NULL;
        $obj->error_class_id = NULL;
        $obj->qc_reviewer_comments = NULL;
        $obj->qc_approver_comments = NULL;
        $obj->qa_approver_comments = NULL;
        $obj->insert();
        return true;
    }

    function addOosPhase3InvestigationDetails($oosObjectId)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->phase3_investigation_details");

        $obj = new DB_Public_lm_oos_3phase_investigation_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->mfg_investigation_review = NULL;
        $obj->lab_investigation_review = NULL;
        $obj->final_closure_comments = NULL;
        $obj->assign_cause_details = NULL;
        $obj->is_3phase_cft_review_required = NULL;
        $obj->is_oos_valid = NULL;
        $obj->insert();
        return true;
    }

    function addOosCftReviewComments($oosObjectId, $refPhaseId, $reviewComments, $userId, $dateTime)
    {
        $objectId = get_object_id("definitions->object_id->workflow->oos->cft_review_comments");

        $obj = new DB_Public_lm_oos_cft_review_details();
        $obj->object_id = $objectId;
        $obj->oos_object_id = $oosObjectId;
        $obj->ref_phase_id = $refPhaseId;
        $obj->review_comments = $reviewComments;
        $obj->reviewed_by = $userId;
        $obj->reviewed_date = $dateTime;
        $obj->insert();
        return true;
    }





    function getOosTestDetailsList()
    {
        $obj = new DB_Public_lm_oos_test_details_master();
        $obj->orderBy('object_id ASC');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $testDetailsList[] = [
                    'objectId' => $obj->object_id,
                    'testName' => $obj->test_name
                ];
            }
            return $testDetailsList;
        }
        return null;
    }

    function getOosSpecificationDetails($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_spec_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->find();
        while ($obj->fetch()) {
            $specDetailsArray[] = [
                'objectId' => $obj->object_id,
                'testObjectId' => $obj->test_object_id,
                'testName' => $this->getOosTestName($obj->test_object_id),
                'specLimit' => $obj->spec_limit,
                'updatedBy' => getFullName($obj->updated_by),
                'updatedDate' => get_modified_date_time_format($obj->updated_date)
            ];
        }
        return $specDetailsArray;
    }

    function getOosAnalystDetails($refPhaseId)
    {
        $obj = new DB_Public_lm_oos_invest_analyst_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        $obj->orderBy('object_id');
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $analystDetailsArray[] = [
                'objectId' => $obj->object_id,
                'analystId' => $obj->analyst_id,
                'refPhaseId' => $obj->ref_phase_id,
                'analystName' => getFullName($obj->analyst_id),
                'analystDepartment' => getDeptName($obj->analyst_id),
                'assignedBy' => getFullName($obj->assigned_by),
                'specDetailsId' => $this->getOosSpecificationDetailsId($obj->object_id),
                'analystSpecResultDetails' => $this->getOosSpecResultDetails($obj->ref_phase_id, $obj->object_id),
                'assignedDate' => get_modified_date_time_format($obj->assigned_date),
                'count' => $count
            ];
            $count++;
        }
        return $analystDetailsArray;
    }

    function getOosSpecificationDetailsId($analystObjectId)
    {
        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->get("analyst_details_id", $analystObjectId);
        return $obj->spec_details_id;
    }

    function getOosSpecResultDetails($refPhaseId, $analystDetailsId)
    {
        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        if (!empty($analystDetailsId)) {
            $obj->whereAdd("analyst_details_id='$analystDetailsId'");
        }
        $obj->orderBy('object_id');
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $docFileProcessorObject = new Doc_File_Processor();
            $p1_fileobjectarray = $docFileProcessorObject->getLmoostestDocFileObjectArray($obj->spec_details_id, "1p_retest_analyst", $obj->updated_by);
            $p2_rt_fileobjectarray = $docFileProcessorObject->getLmoostestDocFileObjectArray($obj->spec_details_id, "2p_retest_analyst", $obj->updated_by);
            $p2_rs_fileobjectarray = $docFileProcessorObject->getLmoostestDocFileObjectArray($obj->spec_details_id, "2p_resample_analyst", $obj->updated_by);
            $specDetailsArray[] = [
                'object_id' => $obj->object_id,
                'analyst_details_id' => $obj->analyst_details_id,
                'spec_details_id' => $obj->spec_details_id,
                'spec_limit' => $this->getOosSpecificationLimit($obj->spec_details_id),
                'obtained_result' => $obj->obtained_result,
                'obtained_result_remarks' => $obj->obtained_result_remarks,
                'test_name' => $this->getOosTestName($this->getOosTestID($obj->spec_details_id)),
                'p1_fileobjectarray' => $p1_fileobjectarray,
                'p2_rt_fileobjectarray' => $p2_rt_fileobjectarray,
                'p2_rs_fileobjectarray' => $p2_rs_fileobjectarray,
                'updated_by' => getFullName($obj->updated_by),
                'updated_date' => get_modified_date_time_format($obj->updated_time),
                'count' => $count
            ];

            $count++;
        }
        return $specDetailsArray;
    }

    function getOosSpecificationLimit($objectId)
    {
        $obj = new DB_Public_lm_oos_spec_details();
        $obj->get("object_id", $objectId);
        return $obj->spec_limit;
    }

    function getOosTestID($objectId)
    {
        $obj = new DB_Public_lm_oos_spec_details();
        $obj->get("object_id", $objectId);
        return $obj->test_object_id;
    }

    function getOosTestName($objectId)
    {
        $obj = new DB_Public_lm_oos_test_details_master();
        $obj->get("object_id", $objectId);
        return $obj->test_name;
    }

    function getOosPreliminaryReferenceId($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_ip_invest_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->object_id;
    }

    function getOosSpecificationResultDetails($preliminaryObjectId, $analystDetailsId)
    {
        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->whereAdd("ref_phase_id='$preliminaryObjectId'");
        if (!empty($analystDetailsId)) {
            $obj->whereAdd("analyst_details_id='$analystDetailsId'");
        }
        $obj->orderBy('object_id');
        $obj->find();

        $count = 1;
        while ($obj->fetch()) {

            $docFileProcessorObj = new Doc_File_Processor();
            $p1FileObjectArray = $docFileProcessorObj->getLmoostestDocFileObjectArray($obj->spec_details_id, "1p_retest_analyst", $obj->updated_by);
            $p2RTFileObjectArray = $docFileProcessorObj->getLmoostestDocFileObjectArray($obj->spec_details_id, "2p_retest_analyst", $obj->updated_by);
            $p2RSFileObjectArray = $docFileProcessorObj->getLmoostestDocFileObjectArray($obj->spec_details_id, "2p_resample_analyst", $obj->updated_by);

            $specificationDetailsArray[] = [
                'objectId' => $obj->object_id,
                'analystDetailsId' => $obj->analyst_details_id,
                'specDetailsId' => $obj->spec_details_id,
                'specificationLimit' => $this->getOosSpecificationLimit($obj->spec_details_id),
                'obtainedResult' => $obj->obtained_result,
                'obtainedResultRemarks' => $obj->obtained_result_remarks,
                'testName' => $this->getOosTestName($this->getOosTestID($obj->spec_details_id)),
                'p1fileObjectArray' => $p1FileObjectArray,
                'p2RTFileObjectArray' => $p2RTFileObjectArray,
                'p2RSFileObjectArray' => $p2RSFileObjectArray,
                'updatedBy' => getFullName($obj->updated_by),
                'updatedDate' => get_modified_date_time_format($obj->updated_time),
                'count' => $count
            ];
            $count++;
        }
        return $specificationDetailsArray;
    }

    function getOosDocFileObjectArray($objectId, $type)
    {
        $fileObjectArray = array();
        $count = 0;
        $obj = new DB_Public_lm_oos_doc_file();
        $obj->whereAdd("object_id='$objectId'");
        $obj->whereAdd("type='$type'");
        $obj->find();
        while ($obj->fetch()) {
            $fileObject = new DB_Public_file();
            $fileObject->get("object_id", $obj->file_id);
            $type = strtolower(substr(strrchr($fileObject->name, "."), 1));
            $fileObjectArray[$count]['objectId'] = $fileObject->object_id;
            $fileObjectArray[$count]['type'] = $type;
            $fileObjectArray[$count]['name'] = $fileObject->name;
            $fileObjectArray[$count]['hash'] = $fileObject->hash;
            $fileObjectArray[$count]['size'] = $fileObject->size;
            $fileObjectArray[$count]['attachmentTowards'] = $obj->type;
            $fileObjectArray[$count]['attachedBy'] = getFullName($obj->attached_by);
            $fileObjectArray[$count]['attachedDate'] = get_modified_date_time_format($obj->attached_date);
            if ($_SESSION['user_id'] == $obj->attached_by) {
                $fileObjectArray[$count]['canDelete'] = TRUE;
            }
            $count++;
        }
        return $fileObjectArray;
    }

    function getOosWorkFlowStatus($objectId)
    {
        $obj = new DB_Public_lm_oos_details();
        $obj->get("object_id", $objectId);
        return $obj->wf_status;
    }

    function getOosCheckListDetails($oosObjectId)
    {
        $checkList = [];
        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->find();
        while ($obj->fetch()) {
            $checkList[] = $obj->checklist_id;
        }
        return ($checkList);
    }

    function getOosWorkFlowUsersList($objectId)
    {
        $usersList = [];
        $obj = new DB_Public_lm_workflow();
        $obj->whereAdd("object_id='$objectId'");
        $obj->find();
        while ($obj->fetch()) {
            $usersList[] = $obj->lm_workflow_user;
        }
        return ($usersList);
    }

    function getOosCheckListDetailsByPhase($refPhaseId)
    {
        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        $obj->orderBy('object_id');
        $obj->find();
        $count = 1;
        $preliminaryCheckList = [];
        while ($obj->fetch()) {
            $preliminaryCheckList[] = [
                'objectId' => $obj->object_id,
                'oosObjectId' => $obj->oos_object_id,
                'checklistId' => $obj->checklist_id,
                'checkPoint' => $this->getOosCheckPoint($obj->checklist_id),
                'refPhaseId' => $obj->ref_phase_id,
                'createdBy' => $obj->created_by,
                'yesNoNa' => $obj->yes_no_na,
                'observation' => $obj->observation,
                'createdTime' => $obj->created_time,
                'modifiedBy' => $obj->modified_by,
                'modifiedtime' => $obj->modified_time,
                'count' => $count
            ];
            $count++;
        }
        return $preliminaryCheckList;
    }

    function getOosCheckPoint($objectId)
    {
        $obj = new DB_Public_lm_oos_checklist_master();
        $obj->get("object_id", $objectId);
        return $obj->check_points;
    }

    function getOosPreliminaryInvestigationDetailsObject($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_ip_invest_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj;
    }

    function getOosWorkflowActionId($actionName)
    {
        $obj = new DB_Public_lm_workflow_actions();
        $obj->get("lm_workflow_action_name", $actionName);
        return $obj->lm_workflow_action_id;
    }

    function getOosPhase1ObjectId($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->object_id;
    }

    function getOosAnalystTestDetails($refPhaseId, $userId)
    {
        $obj = new DB_Public_lm_oos_invest_analyst_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        $obj->whereAdd("analyst_id='$userId'");
        $obj->orderBy('object_id');
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $test_result_det_array[] = [
                'object_id' => $obj->object_id,
                'spec_details_id' => $this->getOosSpecificationDetailsId($obj->object_id),
                'analyst_id' => $obj->analyst_id,
                'ref_phase_id' => $obj->ref_phase_id,
                'analyst_name' => getFullName($obj->analyst_id),
                'analyst_dept' => getDeptName($obj->analyst_id),
                'assigned_by' => getFullName($obj->assigned_by),
                'analyst_spec_result_details' => $this->getOosSpecResultDetails($obj->ref_phase_id, $obj->object_id),
                'assigned_date' => get_modified_date_time_format($obj->assigned_date),
                'count' => $count
            ];
            $count++;
        }
        return $test_result_det_array;
    }

    function getOosPhase1ManufaturingObjectId($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_manufacturing_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->object_id;
    }

    function getOosManufacturingInvestigationDetailsObject($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_manufacturing_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj;
    }

    function getOosTestSpecificationResultDetails($refPhaseId, $specificationDetailsId, $analystDetailsId)
    {
        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        $obj->whereAdd("spec_details_id='$specificationDetailsId'");
        if (!empty($analystDetailsId)) {
            $obj->whereAdd("analyst_details_id='$analystDetailsId'");
        }
        $obj->orderBy('object_id');
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $testDetailsArray[] = [
                'objectId' => $obj->object_id,
                'analystDetailsId' => $obj->analyst_details_id,
                'specificationDetailsId' => $obj->spec_details_id,
                'specificationLimit' => $this->getOosSpecificationLimit($obj->spec_details_id),
                'obtainedResult' => $obj->obtained_result,
                'obtainedResultRemarks' => $obj->obtained_result_remarks,
                'testName' => $this->getOosTestName($this->getOosTestID($obj->spec_details_id)),
                'updatedBy' => getFullName($obj->updated_by),
                'updatedDate' => get_modified_date_time_format($obj->updated_time),
                'count' => $count++
            ];
        }
        return $testDetailsArray;
    }

    function getOosTestCalculations($testResultsArray)
    {
        $analystTotalCount = count($testResultsArray);
        $obtainedResultSum = 0;
        for ($j = 0; $j < count($testResultsArray); $j++) {
            $obtainedResultSum += $testResultsArray[$j]['obtainedResult'];
        }

        $mean = $obtainedResultSum / $analystTotalCount;
        for ($j = 0; $j < count($testResultsArray); $j++) {
            $sumOfObtainedResultMean += pow(($testResultsArray[$j]['obtainedResult'] - $mean), 2);
        }

        $variance = $sumOfObtainedResultMean / $analystTotalCount;
        $standardDeviation = (float) sqrt($variance);
        $relativeStandardDeviationPercentage = round(($standardDeviation * 100) / $mean, 4);
        $calculationDetails = ['obtainedResultSum' => $obtainedResultSum, 'mean' => $mean, 'variance' => $variance, 'stdDeviation' => $standardDeviation, 'rsdPercentage' => $relativeStandardDeviationPercentage];
        return $calculationDetails;
    }

    function getOosErrorTypeList()
    {
        $obj = new DB_Public_lm_error_type_master();
        $obj->orderBy('object_id');
        $obj->find();
        while ($obj->fetch()) {
            $errorTypes[] = [
                'objectId' => $obj->object_id,
                'errorType' => $obj->type,
                'createdBy' => $obj->created_by,
                'createdTime' => $obj->created_time,
                'modifiedBy' => $obj->modified_by,
                'modifiedTime' => $obj->modified_time
            ];

        }
        return $errorTypes;
    }

    function getOosErrorClassificationList()
    {
        $obj = new DB_Public_lm_error_classification_master();
        $obj->orderBy('object_id');
        $obj->find();
        while ($obj->fetch()) {
            $errorClassifications[] = [
                'objectId' => $obj->object_id,
                'type' => $obj->type,
                'createdBy' => $obj->created_by,
                'createdTime' => $obj->created_time,
                'modifiedBy' => $obj->modified_by,
                'modifiedTime' => $obj->modified_time
            ];
        }
        return $errorClassifications;
    }

    function getOosPhase1InvestigationDetailsObject($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj;
    }

    function getOosPhase2RetestObjectId($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->object_id;
    }

    function getOosPhase2RetestConclusionDescription($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->retesting_description;
    }

    function getOosPhase2RetestInvestigationDetailsObject($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj;
    }

    function getOosPhase2ResampleObjectId($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->object_id;
    }

    function getOosPhase2ResampleInvestigationDetailsObject($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj;
    }
    function getOosPhase3ObjectId($oosObjectId)
    {
        $obj = new DB_Public_lm_oos_3phase_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        return $obj->object_id;
    }

    function getOosPhase3InvestigationDetailsObject($objectId)
    {
        $obj = new DB_Public_lm_oos_3phase_investigation_details();
        $obj->get("object_id", $objectId);
        return $obj;
    }

    function getOosCftReviews($oosObjectId, $reviewedBy)
    {
        $obj = new DB_Public_lm_oos_cft_review_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        if (!empty($reviewedBy)) {
            $obj->whereAdd("reviewed_by='$reviewedBy'");
        }
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $cftReviews[] = [
                'objectId' => $obj->object_id,
                'oosObjectId' => $obj->oos_object_id,
                'refPhaseId' => $obj->ref_phase_id,
                'reviewedBy' => getFullName($obj->reviewed_by),
                'department' => getDeptName($obj->reviewed_by),
                'comment' => trim($obj->review_comments),
                'dateTime' => get_modified_date_time_format($obj->reviewed_date),
                'count' => $count++
            ];

        }
        return $cftReviews;
    }

    function getOosInterimExtensionDetails($oosObjectId)
    {
        $obj = new DB_Public_lm_extension_details();
        $obj->whereAdd("ref_object_id='$oosObjectId'");
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $docFileProcessorObj = new Doc_File_Processor();
            $fileObjectArray = $docFileProcessorObj->getAllLmOosDocFileObjectArray($oosObjectId, "extension_request");
            $extensionDetails[] = [
                'object_id' => $obj->object_id,
                'action_status' => $obj->action_status,
                'status' => $obj->status,
                'reason' => $obj->reason,
                'proposed_target_date' => get_modified_date_format($obj->proposed_target_date),
                'ref_object_id' => $obj->ref_object_id,
                'existing_target_date' => get_modified_date_format($obj->existing_target_date),
                'fileobjectarray' => $fileObjectArray,
                'created_by' => getFullName($obj->created_by),
                'created_time' => get_modified_date_time_format($obj->created_time),
                'count' => $count++
            ];
        }
        return $extensionDetails;
    }

    function getOosList($oosObjectId, $plantId)
    {
        $oosObj = new DB_Public_lm_oos_details();

        if (!empty($oosObjectId)) {
            $oosObj->whereAdd("object_id='$oosObjectId'");
        }

        if (!empty($plantId)) {
            $oosObj->whereAdd("plant='$plantId'");
        }

        $oosObj->orderBy('created_time');
        $oosObj->find();
        $count = 1;

        while ($oosObj->fetch()) {

            $oosNo = $oosObj->oos_no;
            $oosNo = "<a href=" . "index.php?module=oos&action=view_oos&object_id=$oosObj->object_id target='_blank'" . "><font color=blue>" . $oosNo . "</font></a>";
            $oosList[] = [
                'objectId' => $oosObj->object_id,
                'oosNo' => $oosNo,
                'reportingDate' => get_modified_date_format($oosObj->reporting_date),
                'productName' => $oosObj->product_id ? getProductName($oosObj->product_id) : "NA",
                'materialName' => $oosObj->material_name ? $oosObj->material_name : "NA",
                'quantity' => $oosObj->quantity ? $oosObj->quantity : "NA",
                'batchNo' => $oosObj->batch_no ? $oosObj->batch_no : "-",
                'batchSize' => $oosObj->batch_size ? $oosObj->batch_size : "-",
                'processStage' => $oosObj->process_stage_id ? getProcessStage($oosObj->process_stage_id) : "-",
                'manufacturingDate' => $oosObj->manufacturing_date ? get_modified_date_format($oosObj->manufacturing_date) : "-",
                'description' => $oosObj->description,
                'expiryDate' => $oosObj->expiry_date ? get_modified_date_format($oosObj->expiry_date) : "-",
                'materialType' => $oosObj->material_type_id ? getMaterialType($oosObj->material_type_id) : "NA",
                'instrumentEquipmentName' => $oosObj->instrument_id ? getInstrumentEquipmentName($oosObj->instrument_id) : "-",
                'customerName' => $oosObj->customer_id ? getCustomerName($oosObj->customer_id) : "NA",
                'calibratedOn' => $oosObj->calibrated_on ? get_modified_date_format($oosObj->calibrated_on) : "-",
                'nextCalibrationDate' => $oosObj->next_calibration_date ? get_modified_date_format($oosObj->next_calibration_date) : "-",
                'qmsCapaNo' => $oosObj->qms_capa_no ? $oosObj->qms_capa_no : "-",
                'manualCapaNo' => $oosObj->manual_capa_no ? $oosObj->manual_capa_no : "-",
                'targetDate' => $oosObj->target_date ? get_modified_date_format($oosObj->target_date) : "-",
                'createdBy' => getFullName($oosObj->created_by),
                'createdTime' => get_modified_date_time_format($oosObj->created_time),
                'closeOutDate' => $oosObj->final_closure_date ? get_modified_date_format($oosObj->final_closure_date) : "-",
                'specificationNo' => $oosObj->specification_no,
                'testProcedureNo' => $oosObj->test_procedure_no,
                'arNo' => $oosObj->ar_no,
                'refTestProtocol' => $oosObj->ref_test_protocol ? $oosObj->ref_test_protocol : "-",
                'timePoint' => $oosObj->time_point ? $oosObj->time_point : "NA",
                'storageCondition' => $oosObj->storage_condition ? $oosObj->storage_condition : "NA",
                'lotNo' => $oosObj->lot_no ? $oosObj->lot_no : "-",
                'status' => $oosObj->status,
                'isCapaRequired' => $oosObj->is_capa_required,
                'department' => getDepartment($oosObj->department_id),
                'qcReasonForRejection' => $oosObj->qa_reason_for_rejection ? $oosObj->qa_reason_for_rejection : "-",
                'qaReasonForRejection' => $oosObj->qc_reason_for_rejection ? $oosObj->qc_reason_for_rejection : "-",
                'dateOfOccurrence' => $oosObj->date_of_occurrence ? get_modified_date_format($oosObj->date_of_occurrence) : "-",
                'is1phaseMfgInvestigationRequired' => $oosObj->is_1phase_mfg_invest_required,
                'modifiedBy' => getFullName($oosObj->modified_by),
                'modifiedTime' => get_modified_date_time_format($oosObj->modified_time),
                'finalClosureConclusion' => $oosObj->final_closure_conclusion,
                'count' => $count++
            ];
        }
        return $oosList;
    }

    function getOosDigitalSignByUserActions($objectId, $action, $status)
    {
        $actionId = $this->getOosWorkflowActionId($action);
        $obj = new DB_Public_lm_workflow();
        $obj->whereAdd("object_id='$objectId'");
        $obj->whereAdd("lm_workflow_actions='$actionId'");
        $obj->whereAdd("lm_workflow_status='$status'");
        $obj->find();
        while ($obj->fetch()) {
            $userId = $obj->lm_workflow_user;
            $time = get_modified_date_time_format($obj->lm_workflow_date);
        }

        return [$userId ? $userId : "", $time ? $time : ""];
    }

    function getOosDetails($data = null)
    {
        $obj = new DB_Public_lm_oos_details();
        if ($data) {
            extract($data);
            ($object_id) ? $obj->whereAdd("object_id='$object_id'") : null;
            ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
            ($dept) ? $obj->whereAdd("dm_department='$dept'") : null;
            ($created_by) ? $obj->whereAdd("created_by='$created_by'") : null;
            ($start_date) ? $obj->whereAdd("reporting_date>='$start_date'") : null;
            ($end_date) ? $obj->whereAdd("reporting_date<='$end_date'") : null;
            ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
            ($mat_type) ? $obj->whereAdd("material_type_id='$mat_type'") : null;
            ($pro_name) ? $obj->whereAdd("product_id='$pro_name'") : null;
            ($dm_no) ? $obj->whereAdd("dm_no like '%$dm_no%'") : null;
            ($appr_status) ? $obj->whereAdd("approval_status='$appr_status'") : null;
            ($pro_stage) ? $obj->whereAdd("process_stage_id='$pro_stage'") : null;
            ($classification) ? $obj->whereAdd("classification='$classification'") : null;
            ($dm_type) ? $obj->whereAdd("dm_type_id='$dm_type'") : null;
            ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
            ($status) ? $obj->whereAdd("status='$status'") : null;
        }
        $count = 1;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {

                $OosLists[] = [
                    'object_id' => $obj->object_id,
                    'lm_doc_id' => $obj->lm_doc_id,
                    'lm_doc_name' => getLmDocName($obj->lm_doc_id),
                    'lm_doc_short_name' => getLmDocShortName($obj->lm_doc_id),
                    'dm_department' => $obj->dm_department,
                    'dm_department_name' => getDepartment($obj->department_id),
                    'dm_no' => $obj->dm_no,
                    'batch_no' => display_hypen_if_null($obj->batch_no),
                    'date_of_occurrence' => display_date_format($obj->date_of_occurrence),
                    'time_of_occurrence' => $obj->time_of_occurrence,
                    'date_of_discovery' => display_date_format($obj->reporting_date),
                    'time_of_discovery' => $obj->time_of_discovery,
                    'description' => $obj->description,
                    'immed_action_taken' => $obj->immed_action_taken,
                    'risk_impact_assessment' => $obj->risk_impact_assessment,
                    'process_stage_id' => $obj->process_stage_id,
                    'process_stage_name' => display_hypen_if_null(getProcessStage($obj->process_stage_id)),
                    'market_name' => display_hypen_if_null(getMarketName($obj->scope)),
                    'classification' => $obj->classification,
                    'classification_name' => getClassificationName($obj->classification),
                    'approval_status' => $obj->approval_status,
                    'status' => $obj->status,
                    'wf_status' => $obj->wf_status,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => display_datetime_format($obj->created_time),
                    'modified_by' => $obj->modified_by,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_time' => $obj->modified_time,
                    'rejected_reason' => display_hypen_if_null($obj->rejected_reason),
                    'is_meeting_required' => $obj->is_meeting_required,
                    'is_capa_required' => $obj->is_capa_required,
                    'is_cc_required' => $obj->is_cc_required,
                    'reporting_date' => display_date_format($obj->reporting_date),
                    'reporting_time' => $obj->reporting_time,
                    'manu_date' => display_hypen_if_null($obj->manu_date),
                    'manu_expiry_date' => display_hypen_if_null($obj->manu_expiry_date),
                    'customer_id' => $obj->customer,
                    'customer_name' => display_hypen_if_null(getCustomerName($obj->customer)),
                    'product_id' => $obj->product_id,
                    'product_name' => display_hypen_if_null(getProductName($obj->product_id)),
                    'target_date' => display_hypen_if_null(display_date_format($obj->target_date)),
                    'completed_date' => display_hypen_if_null(display_datetime_format($obj->final_closure_date)),
                    'target_date1' => $obj->target_date,
                    'close_out_comments' => display_hypen_if_null($obj->close_out_comments),
                    'plant_id' => $obj->plant_id,
                    'plant_name' => getPlantName($obj->plant_id),
                    'lot_no' => display_hypen_if_null($obj->lot_no),
                    'batch_size' => display_hypen_if_null($obj->batch_size),
                    'material_type_id' => $obj->material_type_id,
                    'material_type_name' => display_hypen_if_null(getMaterialType($obj->material_type_id)),
                    'material_name' => display_hypen_if_null($obj->material_name),
                    'close_out_date' => display_hypen_if_null(display_datetime_format($obj->close_out_date)),
                    'dm_type_id' => $obj->dm_type_id,
                    'dm_type_name' => getDevTypeName($obj->dm_type_id),
                    'is_task_required' => $obj->is_task_required,
                    'is_training_required' => $obj->is_training_required,
                    'is_online_exam_required' => $obj->is_online_exam_required,
                    'is_investigation_required' => $obj->is_investigation_required,
                    'meeting_target_date' => display_date_format($obj->meeting_target_date),
                    'training_target_date' => display_date_format($obj->training_target_date),
                    'exam_target_date' => display_date_format($obj->exam_target_date),
                    'task_target_date' => display_date_format($obj->task_target_date),
                    'meeting_status' => $obj->meeting_status,
                    'training_status' => $obj->training_status,
                    'exam_status' => $obj->exam_status,
                    'task_status' => $obj->task_status,
                    'task_qa_review' => $obj->task_qa_review,
                    'doc_link' => get_qms_doc_no("oos", $obj->object_id)["doc_link"],
                    'count' => $count++,
                ];
            }
            return $OosLists;
        }
        return null;
    }





    function updateOosBasicDetails($objectId, $data)
    {
        extract($data);

        //Object to get old vlaues
        $atOldObj = new DB_Public_lm_oos_details();
        $atOldObj->get("object_id", $objectId);

        //Object to update new values
        $oosObj = new DB_Public_lm_oos_details();
        $oosObj->whereAdd("object_id='$objectId'");


        // Date of occurrence
        ($date_of_occurrence) ? ($oosObj->date_of_occurrence = $date_of_occurrence and $atData['Date Of Occurrence'] = [$atOldObj->date_of_occurrence, $date_of_occurrence, $date_of_occurrence]) : false;

        // Time of occurrence
        ($time_of_occurrence) ? ($oosObj->time_of_occurrence = $time_of_occurrence and $atData['Time Of Occurrence'] = [$atOldObj->time_of_occurrence, $time_of_occurrence, $time_of_occurrence]) : false;

        // Specification No
        ($specification_no) ? ($oosObj->specification_no = $specification_no and $atData['Specification No'] = [$atOldObj->specification_no, $specification_no, $specification_no]) : false;

        // Test procedure No
        ($test_procedure_no) ? ($oosObj->test_procedure_no = $test_procedure_no and $atData['Test Procedure No'] = [$atOldObj->test_procedure_no, $test_procedure_no, $test_procedure_no]) : false;

        // A R No
        ($ar_no) ? ($oosObj->ar_no = $ar_no and $atData['AR No'] = [$atOldObj->ar_no, $ar_no, $ar_no]) : false;

        // Description
        ($description) ? ($oosObj->description = $description and $atData['Description'] = [$atOldObj->description, $description, $description]) : false;

        $oosObj->modified_by = $user_id;
        $oosObj->modified_time = $date_time;

        if ($oosObj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            addAuditTrailLog($objectId, null, $atData, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function updateOosProductDetails($objectId, $data)
    {
        extract($data);

        //Object to get old vlaues
        $atOldObj = new DB_Public_lm_oos_details();
        $atOldObj->get("object_id", $objectId);

        //Object to update new values
        $oosObj = new DB_Public_lm_oos_details();
        $oosObj->whereAdd("object_id='$objectId'");

        // Material Type Id
        ($material_type_id) ? ($oosObj->material_type_id = $material_type_id and $atData['Material Type'] = [getMaterialType($atOldObj->material_type_id), getMaterialType($material_type_id), getMaterialType($material_type_id)]) : false;

        // Material Name
        ($material_name) ? ($oosObj->material_name = $material_name and $atData['Material Name'] = [$atOldObj->material_name, $material_name, $material_name]) : false;

        // Customer Id
        ($customer_id) ? ($oosObj->customer_id = $customer_id and $atData['Customer Name'] = [getCustomerName($atOldObj->customer_id), getCustomerName($customer_id), getCustomerName($customer_id)]) : false;

        // Product Id
        ($product_id) ? ($oosObj->product_id = $product_id and $atData['Product Name'] = [getProductName($atOldObj->product_id), getProductName($product_id), getProductName($product_id)]) : false;

        // Process Stage Id
        ($process_stage_id) ? ($oosObj->process_stage_id = $process_stage_id and $atData['Process Stage'] = [getProcessStage($atOldObj->process_stage_id), getProcessStage($process_stage_id), getProcessStage($process_stage_id)]) : false;

        // Manufacturing Date
        ($manufacturing_date) ? ($oosObj->manufacturing_date = $manufacturing_date and $atData['Manufacturing Date'] = [$atOldObj->manufacturing_date, $manufacturing_date, $manufacturing_date]) : false;

        // Expiry Date
        ($expiry_date) ? ($oosObj->expiry_date = $expiry_date and $atData['Expiry Date'] = [$atOldObj->expiry_date, $expiry_date, $expiry_date]) : false;

        // Batch No
        ($batch_no) ? ($oosObj->batch_no = $batch_no and $atData['Batch No'] = [$atOldObj->batch_no, $batch_no, $batch_no]) : false;

        // Batch Size
        ($batch_size) ? ($oosObj->batch_size = $batch_size and $atData['Batch Size'] = [$atOldObj->batch_size, $batch_size, $batch_size]) : false;

        // Lot No
        ($lot_no) ? ($oosObj->lot_no = $lot_no and $atData['Lot No'] = [$atOldObj->lot_no, $lot_no, $lot_no]) : false;

        // Quantity
        ($quantity) ? ($oosObj->quantity = $quantity and $atData['Quantity'] = [$atOldObj->quantity, $quantity, $quantity]) : false;

        // Instrument Id
        ($instrument_id) ? ($oosObj->instrument_id = $instrument_id and $atData['Instrument'] = [getInstEquipName($atOldObj->instrument_id), getInstEquipName($instrument_id), getInstEquipName($instrument_id)]) : false;

        // Calibrated On
        ($calibrated_on) ? ($oosObj->calibrated_on = $calibrated_on and $atData['Calibrated On'] = [$atOldObj->calibrated_on, $calibrated_on, $calibrated_on]) : false;

        // Next Calibration Date
        ($next_calibration_date) ? ($oosObj->next_calibration_date = $next_calibration_date and $atData['Next Calibration Date'] = [$atOldObj->next_calibration_date, $next_calibration_date, $next_calibration_date]) : false;

        // Ref Test Protocol
        ($ref_test_protocol) ? ($oosObj->ref_test_protocol = $ref_test_protocol and $atData['Reference Test Protocol'] = [$atOldObj->ref_test_protocol, $ref_test_protocol, $ref_test_protocol]) : false;

        // Time Point
        ($time_point) ? ($oosObj->time_point = $time_point and $atData['Time Point'] = [$atOldObj->time_point, $time_point, $time_point]) : false;

        // Storage Condition
        ($storage_condition) ? ($oosObj->storage_condition = $storage_condition and $atData['Storage Condition'] = [$atOldObj->storage_condition, $storage_condition, $storage_condition]) : false;


        if ($oosObj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            addAuditTrailLog($objectId, null, $atData, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function updateOosTestResultDetails($data)
    {
        extract($data);

        for ($i = 0; $i < count($spec_result_obj_array); $i++) {

            //Object to get old vlaues
            $atOldObj = new DB_Public_lm_oos_spec_result_details();
            $atOldObj->get("object_id", $spec_result_obj_array[$i]);


            //Object to update new values
            $specObj = new DB_Public_lm_oos_spec_result_details();
            $specObj->whereAdd("object_id='$spec_result_obj_array[$i]'");

            $specObj->obtained_result = $obtained_result[$i] and $atData['Test Obtained Result'] = [$atOldObj->obtained_result, $obtained_result[$i], $$obtained_result[$i]];
            $specObj->obtained_result_remarks = $obtained_result_remarks[$i] and $atData['Test Obtained Result Remarks'] = [$atOldObj->obtained_result_remarks, $obtained_result_remarks[$i], $$obtained_result_remarks[$i]];
            $specObj->updated_by = $user_id;
            $specObj->updated_time = $date_time;

            if ($specObj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                addAuditTrailLog($spec_result_obj_array[$i], null, $atData, $audit_trail_action, "Successfuly Updated");
            }
        }
        return true;
    }

    function updateOosWorkFlowStatus($objectId, $wfStatus)
    {
        $obj = new DB_Public_lm_oos_details();
        $obj->get("object_id", $objectId);
        $obj->wf_status = $wfStatus;
        $obj->update();
        return true;
    }

    function updateOosPreliminaryObservation($preliminaryChecklistObject, $preliminaryYesNoNa, $preliminaryObservation, $userId, $dateTime)
    {
        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->get("object_id", $preliminaryChecklistObject);
        $obj->yes_no_na = $preliminaryYesNoNa;
        if ($preliminaryYesNoNa != 'no') {
            $observation = $preliminaryObservation;
        } else {
            $observation = null;
        }
        $obj->observation = $observation;
        $obj->modified_by = $userId;
        $obj->modified_time = $dateTime;
        $obj->update();
        return true;
    }

    function updateOosPreliminaryInvestigationDetails($oosObjectId, $preliminaryInvestigation, $preliminaryInvestigationConclusion)
    {
        $obj = new DB_Public_lm_oos_ip_invest_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->initial_investigation = $preliminaryInvestigation;
        $obj->initial_investigation_conclusion = $preliminaryInvestigationConclusion;
        $obj->update();
        return true;
    }

    function updateOosTargetDate($oosObjectId, $targetDate)
    {
        $obj = new DB_Public_lm_oos_details();
        $obj->whereAdd("object_id='$oosObjectId'");
        $obj->target_date = get_modified_ymd_format($targetDate);
        $obj->update();
        return true;
    }

    function updateOosPreliminaryInvestigationConclusionDetails($oosObjectId, $isAssignCauseIdentified, $isFurtherInvestigationRequired)
    {
        $obj = new DB_Public_lm_oos_ip_invest_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->is_assign_cause_identified = $isAssignCauseIdentified;
        $obj->is_further_invest_required = $isFurtherInvestigationRequired;
        $obj->update();
        return true;
    }

    function updateOosPreliminaryInvestigationAssignCauseDetails($oosObjectId, $assignCauseDetails)
    {
        $obj = new DB_Public_lm_oos_ip_invest_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->assign_cause_details = $assignCauseDetails;
        $obj->update();
        return true;
    }

    function updateOosPreliminaryValidDetails($oosObjectId, $isOosValid)
    {
        $obj = new DB_Public_lm_oos_ip_invest_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->is_oos_valid = $isOosValid;
        $obj->update();
        return true;
    }

    function updateOosReasonForRejection($oosObjectId, $qcReasonForRejection = null, $qaReasonForRejection = null)
    {
        $obj = new DB_Public_lm_oos_details();
        $obj->whereAdd("object_id='$oosObjectId'");
        if ($qcReasonForRejection) {
            $obj->qc_reason_for_rejection = $qcReasonForRejection;
        }
        if ($qaReasonForRejection) {
            $obj->qa_reason_for_rejection = $qaReasonForRejection;
        }
        $obj->update();
        return true;
    }

    function updateOosQaApproveDetails($oosObjectId, $isCapaRequired, $qmsCapaNo, $manualCapaNo, $isPhase1ManufacturingInvestigationRequired)
    {
        $obj = new DB_Public_lm_oos_details();
        $obj->whereAdd("object_id='$oosObjectId'");
        $obj->is_capa_required = $isCapaRequired;
        $obj->qms_capa_no = $qmsCapaNo;
        $obj->manual_capa_no = $manualCapaNo;
        $obj->is_1phase_mfg_invest_required = $isPhase1ManufacturingInvestigationRequired;
        $obj->update();
        return true;
    }

    function updateOosSpecificationResultDetails($specificationResultObjArray, $obtainedResultArray, $obtainedResultRemarksArray, $userId, $dateTime)
    {
        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->whereAdd("object_id='$specificationResultObjArray'");
        $obj->obtained_result = $obtainedResultArray;
        $obj->obtained_result_remarks = $obtainedResultRemarksArray;
        $obj->updated_by = $userId;
        $obj->updated_time = $dateTime;
        $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function updateOosChecklistDetails($checkPointsObjArray, $yesNoNaArray, $observationArray, $userId, $dateTime)
    {
        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->get("object_id", $checkPointsObjArray);
        $obj->yes_no_na = $yesNoNaArray;
        $obj->observation = $observationArray;
        $obj->modified_by = $userId;
        $obj->modified_time = $dateTime;
        $obj->update();
        return true;
    }

    function updateOosManufacturingInvestigationDetails($oosObjectId, $manufacturingInvestigationDetails, $userId, $dateTime)
    {
        $obj = new DB_Public_lm_oos_manufacturing_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->details = $manufacturingInvestigationDetails;
        $obj->updated_by = $userId;
        $obj->updated_time = $dateTime;
        $obj->update();
        return true;
    }

    function updateOosPhase1ConclusionDetails($oosObjectId, $phase1ErrorTypeId, $phase1ErrorClassificationId, $phase1IsAssignCauseIdentified, $phase1IsFurtherInvestigationRequired)
    {
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->error_type_id = $phase1ErrorTypeId;
        $obj->error_class_id = $phase1ErrorClassificationId;
        $obj->is_assign_cause_identified = $phase1IsAssignCauseIdentified;
        $obj->is_further_invest_required = $phase1IsFurtherInvestigationRequired;
        $obj->update();
        return true;
    }

    function updateOosPhase1InvestigationReviewerComments($oosObjectId, $phase1QcReviewerComments, $phase1QcApproverComments, $phase1QaApproverComments)
    {
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->qc_reviewer_comments = $phase1QcReviewerComments;
        $obj->qc_approver_comments = $phase1QcApproverComments;
        $obj->qa_approver_comments = $phase1QaApproverComments;
        $obj->update();
        return true;
    }

    function updateOosPhase1AssignableCauseDetails($oosObjectId, $phase1AssignableCauseDetails)
    {
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->assign_cause_details = $phase1AssignableCauseDetails;
        $obj->update();
        return true;
    }

    function updateOosPhase1ValidDetails($oosObjectId, $isOosValid)
    {
        $obj = new DB_Public_lm_oos_1phase_investigation_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->is_oos_valid = $isOosValid;
        $obj->update();
        return true;
    }

    function updateOosPhase2RetestConclusionDetails($oosObjectId, $retestingDescription, $phase2RetestErrorTypeId, $phase2RetestErrorClassificationId, $phase2RetestIsAssignCauseIdentified, $phase2RetestIsFurtherInvestRequired)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->retesting_description = $retestingDescription;
        $obj->error_type_id = $phase2RetestErrorTypeId;
        $obj->error_class_id = $phase2RetestErrorClassificationId;
        $obj->is_assign_cause_identified = $phase2RetestIsAssignCauseIdentified;
        $obj->is_further_invest_required = $phase2RetestIsFurtherInvestRequired;
        $obj->update();
        return true;
    }

    function updateOosPhase2RetestInvestigationReviewerComments($oosObjectId, $phase2RetestQcReviewerComments, $phase2RetestQcApproverComments, $phase2RetestQaApproverComments)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->qc_reviewer_comments = $phase2RetestQcReviewerComments;
        $obj->qc_approver_comments = $phase2RetestQcApproverComments;
        $obj->qa_approver_comments = $phase2RetestQaApproverComments;
        $obj->update();
        return true;
    }

    function updateOosPhase2RetestAssignCauseDetails($oosObjectId, $phase2RetestAssignCauseDetails)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->assign_cause_details = $phase2RetestAssignCauseDetails;
        $obj->update();
        return true;
    }

    function updateOosPhase2RetestValidDetails($oosObjectId, $isOosValid)
    {
        $obj = new DB_Public_lm_oos_2phase_retest_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->is_oos_valid = $isOosValid;
        $obj->update();
        return true;
    }

    function updateOosPhase2ResampleDetails($oosObjectId, $resamplingDescription, $processStageId, $batchNo, $arNo, $quantity)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->resampling_description = $resamplingDescription;
        $obj->process_stage_id = $processStageId;
        $obj->batch_no = $batchNo;
        $obj->ar_no = $arNo;
        $obj->quantity = $quantity;
        $obj->update();
        return true;
    }

    function updateOosPhase2ResampleConclusionDetails($oosObjectId, $phase2ResampleErrorTypeId, $phase2ResampleErrorClassificationId, $phase2ResampleIsAssignCauseIdentified, $phase2ResampleIsFurtherInvestigationRequired)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->whereAdd("oosObjectId='$oosObjectId'");
        $obj->error_type_id = $phase2ResampleErrorTypeId;
        $obj->error_class_id = $phase2ResampleErrorClassificationId;
        $obj->is_assign_cause_identified = $phase2ResampleIsAssignCauseIdentified;
        $obj->is_further_invest_required = $phase2ResampleIsFurtherInvestigationRequired;
        $obj->update();
        return true;
    }

    function updateOosPhase2ResampleInvestigationReviewerComments($oosObjectId, $phase2ResampleQcReviewerComments, $phase2ResampleQcApproverComments, $phase2ResampleQaApproverComments)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->qc_reviewer_comments = $phase2ResampleQcReviewerComments;
        $obj->qc_approver_comments = $phase2ResampleQcApproverComments;
        $obj->qa_approver_comments = $phase2ResampleQaApproverComments;
        $obj->update();
        return true;
    }

    function updateOosPhase2ResampleAssignCauseDetails($oosObjectId, $phase2ResampleAssignCauseDetails)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->assign_cause_details = $phase2ResampleAssignCauseDetails;
        $obj->update();
        return true;
    }

    function updateOosPhase2ResampleValidDetails($oosObjectId, $isOosValid)
    {
        $obj = new DB_Public_lm_oos_2phase_resample_details();
        $obj->get("oos_object_id", $oosObjectId);
        $obj->is_oos_valid = $isOosValid;
        $obj->update();
        return true;
    }

    function updateOosPhase3InvestigationDetails($oosObjectId, $manufacturingInvestigationReview, $labInvestigationReview, $closureComments, $assignCauseDetails, $isCftReviewRequired, $isOosvalid)
    {
        $obj = new DB_Public_lm_oos_3phase_investigation_details();
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        $obj->mfg_investigation_review = $manufacturingInvestigationReview;
        $obj->lab_investigation_review = $labInvestigationReview;
        $obj->final_closure_comments = $closureComments;
        $obj->assign_cause_details = $assignCauseDetails;
        $obj->is_3phase_cft_review_required = $isCftReviewRequired;
        $obj->is_oos_valid = $isOosvalid;
        $obj->update();
        return true;
    }

    function updateOosCloseOutDetails($oosObjectId, $impactAssessment, $riskAssessment, $finalClosureConclusion, $dateTime)
    {
        $obj = new DB_Public_lm_oos_details();
        $obj->get("object_id", $oosObjectId);
        $obj->impact_assesment = $impactAssessment;
        $obj->risk_assesment = $riskAssessment;
        $obj->final_closure_conclusion = $finalClosureConclusion;
        $obj->final_closure_date = $dateTime;
        $obj->update();
        return true;
    }





    function isOosObtainedResultsSaved($refPhaseId, $userId)
    {
        $obj = new DB_Public_lm_oos_spec_result_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        $obj->whereAdd("updated_by='$userId'");
        $obj->find();
        while ($obj->fetch()) {
            return $obj->obtained_result;
        }
        return false;
    }

    function isOosActionFinished($objectId, $action, $status)
    {
        $obj = new DB_Public_lm_workflow();
        $actionId = $this->getOosWorkflowActionId($action);
        $obj->whereAdd("object_id='$objectId'");
        $obj->whereAdd("lm_workflow_actions='$actionId'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if ($obj->lm_workflow_status != $status)
                    return false;
            }
            return true;
        }
        return false;
    }

    function isOosCompletedAllFieldsInChecklist($refPhaseId, $oosObjectId)
    {
        $obj = new DB_Public_lm_oos_checklist_details();
        $obj->whereAdd("ref_phase_id='$refPhaseId'");
        $obj->whereAdd("oos_object_id='$oosObjectId'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if (($obj->yes_no_na == "") || ($obj->observation == "")) {
                    return false;
                }
            }
        }
        return true;
    }

}