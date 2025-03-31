<?php

/**
 * Project: Logicmind
 * File:view_oos.oos.php
 *
 * @author Jithin
 * @since 06/11/2024
 * @package OOS
 * @version 1.0
 * @see view_oos.oos.tpl
 **/

error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'oos_view', 'yes')) {
    $error_handler->raiseError("oos_view");
}

$userId = $_SESSION['user_id'];
$userDepartmentId = getDeptId($userId);
$userPlantId = getUserPlantId($userId);
$documentId = getLmDocObjectIdByDocCode('LM-DOC-10');
$dateTime = date('Y-m-d G:i:s');
$todayDate = date('Y-m-d');

$oosObjectId = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;

$oosDetailsObj = new DB_Public_lm_oos_details();

if ($oosDetailsObj->get("object_id", $oosObjectId)) {
    
    // Department Restriction
    if (!isDeptAccessRightsExist($oosObjectId, $userPlantId, $userDepartmentId, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }

    $oosNo = $oosDetailsObj->oos_no;
    $wfStatus = $oosDetailsObj->wf_status;
    $auditTrailAction = (isset($_REQUEST['audit_trail_action'])) ? $_REQUEST['audit_trail_action'] : $wfStatus;
   
    $oosProcess = new Oos_Processor();
    
    $allDepartmentList = get_All_DeptList();    
    $documentName = getLmDocName($documentId);
    $documentShortName = getLmDocShortName($documentId);
    $mailHeading = "$documentName ($documentShortName)";
    $mailLinkButton = _URL_ . get_lm_json_value_by_key('definitions->url->oos->view_oos') . $oosObjectId;
    $workFlowUsersList = $oosProcess->getOosWorkFlowUsersList($oosObjectId);
    $oosSpecificationDetailsArray = $oosProcess->getOosSpecificationDetails($oosObjectId);
    
        
    $creator = get_workflow_action_user($oosObjectId, 'create');
    $qcReviewer = get_workflow_action_user($oosObjectId, 'qc_review');
    $qaReviewer = get_workflow_action_user($oosObjectId, 'qa_review');
    $qcApprover = get_workflow_action_user($oosObjectId, 'qc_approve');
    $qaApprover = get_workflow_action_user($oosObjectId, 'qa_approve');
    

    $preliminaryObjectId = $oosProcess->getOosPreliminaryReferenceId($oosObjectId);
    $preliminaryTestResultsArray = $oosProcess->getOosSpecificationResultDetails($preliminaryObjectId, null); 
    $preliminaryChecklistId = $oosProcess->getOosCheckListDetails($preliminaryObjectId);
    $preliminaryChecklistDetails = $oosProcess->getOosCheckListDetailsByPhase($preliminaryObjectId);
    $preliminaryInvestigatioinObject = $oosProcess->getOosPreliminaryInvestigationDetailsObject($oosObjectId);
    

    $phase1ObjectId = $oosProcess->getOosPhase1ObjectId($oosObjectId);
    $phase1CheckListDetails = $oosProcess->getOosCheckListDetailsByPhase($phase1ObjectId);
    $phase1AnalystDetails = $oosProcess->getOosAnalystDetails($phase1ObjectId);
    $phase1InvestigationDetailsObject = $oosProcess->getOosPhase1InvestigationDetailsObject($oosObjectId);
    $phase1CalculationCount = 1;
    for ($i = 0; $i < count($oosSpecificationDetailsArray); $i++) {
        $phase1TestResultsArray = $oosProcess->getOosTestSpecificationResultDetails($phase1ObjectId, $oosSpecificationDetailsArray[$i]['objectId'], null);
        $phase1StandardDeviation[] = ['count' => $phase1CalculationCount++, 'testName' => $phase1TestResultsArray[$i]['testName'], 'testResult' => $oosProcess->getOosTestCalculations($phase1TestResultsArray)];
    }
    

    $phase1ManufacturingObjectId = $oosProcess->getOosPhase1ManufaturingObjectId($oosObjectId);
    $phase1ManufacturingCheckListDetails  = $oosProcess->getOosCheckListDetailsByPhase($phase1ManufacturingObjectId);
    $phase1ManufacturingAnalystDetails = $oosProcess->getOosAnalystDetails($phase1ManufacturingObjectId);
    $phase1ManufacturingInvestigationDetailsObject = $oosProcess->getOosManufacturingInvestigationDetailsObject($oosObjectId);
    

    $phase2RetestObjectId = $oosProcess->getOosPhase2RetestObjectId($oosObjectId);
    $phase2RetestCheckListDetails = $oosProcess->getOosCheckListDetailsByPhase($phase2RetestObjectId);
    $phase2RetestAnalystDetails = $oosProcess->getOosAnalystDetails($phase2RetestObjectId);
    $phase2RetestInvestigationDetailsObject = $oosProcess->getOosPhase2RetestInvestigationDetailsObject($oosObjectId);
    $phase2RetestCalculationCount = 1;
    for ($i = 0; $i < count($oosSpecificationDetailsArray); $i++) {
        $phase2TestResultsArray = $oosProcess->getOosTestSpecificationResultDetails($phase2RetestObjectId, $oosSpecificationDetailsArray[$i]['objectId'], null);
        $phase2RetestStandardDeviation[] = ['count' => $phase2RetestCalculationCount++, 'testName' => $phase2TestResultsArray[$i]['testName'], 'testResult' => $oosProcess->getOosTestCalculations($phase2TestResultsArray)];
    }


    $phase2ResampleObjectId = $oosProcess->getOosPhase2ResampleObjectId($oosObjectId);
    $phase2ResampleCheckListDetails = $oosProcess->getOosCheckListDetailsByPhase($phase2ResampleObjectId);
    $phase2ResampleAnalystDetails = $oosProcess->getOosAnalystDetails($phase2ResampleObjectId);
    $phase2ResampleDetailsObject = $oosProcess->getOosPhase2ResampleInvestigationDetailsObject($oosObjectId);    
    $phase2ResampleCalculationCount = 1;
    for ($i = 0; $i < count($oosSpecificationDetailsArray); $i++) {
        $phase2ResampleTestResultsArray = $oosProcess->getOosTestSpecificationResultDetails($phase2ResampleObjectId, $oosSpecificationDetailsArray[$i]['objectId'], null);
        $phase2ResampleStandardDeviation[] = ['count' => $phase2ResampleCalculationCount++, 'testName' => $phase2ResampleTestResultsArray[$i]['testName'], 'testResult' => $oosProcess->getOosTestCalculations($phase2TestResultsArray)];
    }


    $phase3ObjectId = $oosProcess->getOosPhase3ObjectId($oosObjectId);
    $phase3InvestigationDetailsObject = $oosProcess->getOosPhase3InvestigationDetailsObject($phase3ObjectId);
       

    $cftReviews = $oosProcess->getOosCftReviews($oosObjectId, null);
    $interimExtensionDetails = $oosProcess->getOosInterimExtensionDetails($oosObjectId);
    
    if (!empty($oosDetailsObj->target_date)) {
        $oosTargetDateBefore = get_date_before_four_days(get_modified_ymd_format($oosDetailsObj->target_date));
    }

              
    // OOS Created & Enabled Preliminary Investigator Assign Form
    if ($wfStatus == "Created" && $creator == $userId) {

        if (check_user_in_workflow($oosObjectId, $userId, "Created", 'create') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            // Update Basic Details
            if(isset($_POST['update_basic_info'])){                
                if($oosProcess->updateOosBasicDetails($oosObjectId, array_merge(['user_id' => $userId, 'date_time' => $dateTime], $_POST))){
                    header("Location:$_SERVER[REQUEST_URI]");
                }else{
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
            }   
            
            // Update Product Details 
            if(isset($_POST['update_product_details'])){                
                if($oosProcess->updateOosProductDetails($oosObjectId, $_POST)){
                    header("Location:$_SERVER[REQUEST_URI]");
                }else{
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
            }

            // Update Test Result & Remarks 
            if(isset($_POST['update_test_result_and_remarks'])){                
                if($oosProcess->updateOosTestResultDetails(array_merge(['user_id' => $userId, 'date_time' => $dateTime], $_POST))){
                    header("Location:$_SERVER[REQUEST_URI]");
                }else{
                    $error_handler->raiseError("UPDATE_REQUEST_FAILED");
                }
            }
            
            // Assign To Preliminary Investigation 
            if (isset($_POST['assign_to_preliminary_investigation'])) { 
             
                $preliminaryInvestigatorId = $_POST['user_id'];                
                                
                if ($oosProcess->updateOosWorkFlowStatus($oosObjectId, "Preliminary Investigation to be Started")) {
                    
                    delete_worklist($creator, $oosObjectId);
                    add_worklist($preliminaryInvestigatorId, $oosObjectId);
                    save_workflow($oosObjectId, $preliminaryInvestigatorId, 'Waiting', 'ip_invest');
                                                            
                    // Audit Trail
                    $atData['Preliminary Investigator Details'] = array('NA', getFullName($preliminaryInvestigatorId), $preliminaryInvestigatorId . " - " . getFullName($preliminaryInvestigatorId));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');
                
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Preliminary Investigation to be Started | [Action Required]";
                    $actionDescription = "The $documentShortName is Pending for Your Preliminary Investigation.";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$preliminaryInvestigatorId], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }
                header("Location:$_SERVER[REQUEST_URI]");                                
            }
            
                           
            $smarty->assign('editButton', true);            
            $smarty->assign('enablePreliminaryInvestigationAssignForm', true);
            $smarty->assign('cancelButton', true); 
            $smarty->assign('materialTypeList', getMaterialTypeMasterDetails(null, null, 'yes'));
            $smarty->assign('customerList', getCustomerMasterList(null, null, null, 'yes'));
            $smarty->assign('productList', getProductMasterDetails(null, null, null, 'yes'));
            $smarty->assign('processStageList', getProcessStageMasterList(null, null, 'yes'));
            $smarty->assign('instrumentList', getInstrumentEquipmentMasterDetailsList(null, null, null, null, 'yes'));
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "general");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'general')); 
                       
            $addFileAttachemnt = true;    
        }
    }

    // Add/Edit Access Rights
    if (($creator == $userId) && ($wfStatus != "Cancelled" && $wfStatus != "Closed")) {
        
        $smarty->assign('editAccessRights', true);
        $smarty->assign('plant_list', getPlantList()); 
        $smarty->assign('usr_plant_id', $userPlantId);
        $smarty->assign('usr_dept_id', $userDepartmentId); 
        $smarty->assign("current_access_rights", getAccessRightsDeptList($oosObjectId));
        
        if (isset($_POST['edit_access_rights'])) {
            if (addDeptAccessRights($oosObjectId, "$oosDetailsObj->plant_id-$userDepartmentId", $_POST['doc_access_dept'], $userId, $dateTime, $oosNo, $auditTrailAction)) {
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
    
    // Add Preliminary Investigation Checklist
    if ($wfStatus == "Preliminary Investigation to be Started") {

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'ip_invest') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_preliminary_checklist'])) {

                $preliminaryCheckPointsArray = (isset($_POST['preliminary_check_points'])) ? $_POST['preliminary_check_points'] : null;
                
                $existingChecklist = [];
                foreach($preliminaryChecklistId as $checklistPoint){    
                    $existingChecklist[] =  $checklistPoint['checklistId'];           
                } 

                for ($j = 0; $j < count($preliminaryCheckPointsArray); $j++) {                       
                    if(!in_array($preliminaryCheckPointsArray[$j], $existingChecklist)){
                        $oosProcess->addOosChecklistDetails($oosObjectId, $preliminaryObjectId, $preliminaryCheckPointsArray[$j], $userId, $dateTime);
                    }                                                       
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['submit_preliminary_checklist'])) {
                                
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Preliminary Investigation is in Progress");

                $checkPointsList = $oosProcess->getOosChecklistDetails($oosObjectId);

                // Audit Trial
                for ($j=0; $j < count($checkPointsList); $j++){
                    $atData['Preliminary Investigation Check Points Are Created'] = array('NA', $oosProcess->getOosCheckPoint($checkPointsList[$j]), $checkPointsList[$j] . '-' . $oosProcess->getOosCheckPoint($checkPointsList[$j]));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Done');
                }                
               
                header("Location:$_SERVER[REQUEST_URI]");
            } 

            $smarty->assign('enablePreliminaryCheckListAddForm', true);            
        }
    }

    // Add Preliminary Investigation Observation
    if ($wfStatus == "Preliminary Investigation is in Progress") {

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'ip_invest') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_preliminary_observation'])) {
                
                $preliminaryChecklistObject = (isset($_REQUEST['preliminary_checklist_object'])) ? $_REQUEST['preliminary_checklist_object'] : null;
                $preliminaryYesNoNa = (isset($_REQUEST['preliminary_yes_no_na'])) ? $_REQUEST['preliminary_yes_no_na'] : null;
                $preliminaryObservation = (isset($_REQUEST['preliminary_observation'])) ? $_REQUEST['preliminary_observation'] : null;

                for ($j = 0; $j < count($preliminaryChecklistObject); $j++) {
                    $oosProcess->updateOosPreliminaryObservation($preliminaryChecklistObject[$j], $preliminaryYesNoNa[$j], $preliminaryObservation[$j], $userId, $dateTime);
                }
                
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Preliminary Investigation Conclusion");
                                
                $checkPointsList = $oosProcess->getOosChecklistDetails($oosObjectId);

                // Audit Trial
                for ($j=0; $j < count($checkPointsList); $j++){
                    $atData['Preliminary Investigation Checklist'] = array('NA', $oosProcess->getOosCheckPoint($checkPointsList[$j]), $oosProcess->getOosCheckPoint($checkPointsList[$j]));
                    $atData['Preliminary Investigation Result'] = array('NA', $preliminaryYesNoNa, $preliminaryYesNoNa);
                    $atData['Preliminary Investigation Observation'] = array('NA', $preliminaryObservation, $preliminaryObservation);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Done');
                }  

                $subject = "$documentShortName | $oosNo | Preliminary Investigator Completed the Checklist | [Action Required]";
                $actionDescription = "The $documentShortName is Pending to Add the Preliminary Investigation Conclusion.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$usersId], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");                
            }

            $smarty->assign('enablePreliminaryObservationAddForm', true);
        }
    }

    // Add Preliminary Investigation Conclusion 
    if($wfStatus == "Waiting for Preliminary Investigation Conclusion"){
        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'ip_invest') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_preliminary_investigation_conclusion'])) {

                $preliminaryInvestigation = (isset($_REQUEST['preliminary_investigation'])) ? $_REQUEST['preliminary_investigation'] : null;
                $preliminaryInvestigationConclusion = (isset($_REQUEST['preliminary_investigation_conclusion'])) ? $_REQUEST['preliminary_investigation_conclusion'] : null;
                $targetDate = (isset($_REQUEST['target_date'])) ? $_REQUEST['target_date'] : null;

                $oosProcess->updateOosPreliminaryInvestigationDetails($oosObjectId, $preliminaryInvestigation, $preliminaryInvestigationConclusion);
                $oosProcess->updateOosTargetDate($oosObjectId, $targetDate);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QC Review");
                                
                update_workflow($oosObjectId, $userId, 'Done', 'ip_invest');
                delete_worklist($userId, $oosObjectId);
                add_worklist($creator, $oosObjectId);
                
                // Audit Trial
                $atData['Preliminary Investigation'] = array('NA', $preliminaryInvestigation, $preliminaryInvestigation);
                $atData['Preliminary Investigation Conclusion'] = array('NA', $preliminaryInvestigationConclusion, $preliminaryInvestigationConclusion);
                $atData['Target Date'] = array('NA', $targetDate, $targetDate);
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Done');
                
                $subject = "$documentShortName | $oosNo | Preliminary Investigation Conclusion | [Action Required]";
                $actionDescription = "The $documentShortName is Pending for Assigning QC Review";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$creator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                
                header("Location:$_SERVER[REQUEST_URI]"); 
            }

            $smarty->assign('enablePreliminaryInvestigationConclusionForm', true);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "preliminary-investigation-conclusion");
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'preliminary-investigation-conclusion')); 

            $addFileAttachemnt = true;
        }
    }

    // Enabled QC Reviewer Assign Form 
    if($wfStatus == "Waiting for Assigning QC Review" || $wfStatus == "QC Review Need Correction"){
        
        if (check_user_in_workflow($oosObjectId, $userId, "Created", 'create') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['assign_for_qc_review'])) {

                if ($oosProcess->updateOosWorkFlowStatus($oosObjectId, "QC Review Is Pending")) {

                    $qcReviewer = (isset($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : null;
                    
                    delete_worklist($userId, $oosObjectId);
                    add_worklist($qcReviewer, $oosObjectId);
                    save_workflow($oosObjectId, $qcReviewer, 'Waiting', 'qc_review');
                    
                    // Audit Trail
                    $atData['Assigned for QC Review'] = array('NA', getFullName($qcReviewer), $qcReviewer . " - " . getFullName($qcReviewer));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | QC Review to be Started | [Action Required]";
                    $actionDescription = "The $documentShortName is Pending for Your QC Review.";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('enableQcReviewAssignForm', true);
            $smarty->assign('editButton', true);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "general");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'general')); 
        }
    }

    // Enabled Target Date Extension Request Form 
    if (($oosDetailsObj->target_date != "NULL" && $oosDetailsObj->target_date != "" && $creator == $userId && $oosDetailsObj->status != "Completed") && ($todayDate <= $oosTargetDateBefore)) {
        
        if (check_user_in_workflow($oosObjectId, $userId, "Created", 'create')) {
            
            $existingTargetDate = get_modified_ymd_format($oosDetailsObj->target_date);

            // /** Add Extension Details  * */
            if (isset($_POST['add_extension_details'])) {
                
                $proposedTargetDate = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                $reason = (isset($_REQUEST['reason'])) ? $_REQUEST['reason'] : null;

                $extensionObjectId = get_object_id("definitions->object_id->common->oos_extension_details");

                $extensionObj = new DB_Public_lm_extension_details();
                $extensionObj->object_id = $extensionObjectId;
                $extensionObj->ref_object_id = $oosObjectId;
                $extensionObj->existing_target_date = $existingTargetDate;
                $extensionObj->proposed_target_date = get_modified_ymd_format($proposedTargetDate);
                $extensionObj->status = "Pending";
                $extensionObj->action_status = "Extension Request Created";
                $extensionObj->reason = $reason;
                $extensionObj->created_by = $userId;
                $extensionObj->created_time = $dateTime;
                $extensionObj->insert();
                
                add_worklist($userId, $extensionObjectId);                
                save_workflow($extensionObjectId, $userId, 'Created', 'create');
               
                // Audit Trail
                $atData['Extension Request Initiated'] = array('NA', $proposedTargetDate, $existingTargetDate . " - " . $proposedTargetDate);
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Created');
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Requesting Extension for Target Date | [Action Required]";
                $actionDescription = "The $documentShortName is Waiting for  Extension Request.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);

                header("Location:?module=oos&action=view_extension_request&object_id=$extensionObjectId");
            }

            $smarty->assign('enableTargetDateExtensionRequest', true);
            $smarty->assign('existingTargetDate', $existingTargetDate);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "extension-request");
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'extension-request')); 
            
        }
    }

    // Enabled QC Review Form && Recall QC Reviewer
    if($wfStatus == "QC Review Is Pending"){
        
        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['qc_review_correction'])) {

                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QC Review Need Correction");
                update_workflow($oosObjectId, $userId, 'Need Correction', 'qc_review');
                delete_worklist($userId, $oosObjectId);
                add_worklist($creator, $oosObjectId);

                // Audit Trial                
                $atData['QC Review Need Correction'] = array('NA', $workFlowRemarks, $workFlowRemarks);
                addAuditTrailLog($oosObjectId, null, $atData, 'QC Review Need Correction', 'Waiting');
                                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Need Correction | [Action Required]";
                $actionDescription = "The $documentShortName Needs to be Corrected.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$creator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['qc_reviewed'])) {

                $isAssignCauseIdentified = (isset($_REQUEST['is_assign_cause_identified'])) ? $_REQUEST['is_assign_cause_identified'] : null;
                $isFurtherInvestigationRequired = (isset($_REQUEST['is_further_invest_required'])) ? $_REQUEST['is_further_invest_required'] : null;
                $assignCauseDetails = (isset($_REQUEST['assign_cause_details'])) ? $_REQUEST['assign_cause_details'] : null;

                update_workflow($oosObjectId, $userId, 'Done', 'qc_review');
                $oosProcess->updateOosPreliminaryInvestigationConclusionDetails($oosObjectId, $isAssignCauseIdentified, $isFurtherInvestigationRequired);
                $oosProcess->updateOosPreliminaryInvestigationAssignCauseDetails($oosObjectId, $assignCauseDetails);
                
                if ($isFurtherInvestigationRequired == "yes") {
                    $oosProcess->updateOosPreliminaryValidDetails($oosObjectId, "yes");
                }
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QA Review");

                // Audit Trial                
                $atData['QC Reviewed'] = array('NA', "Reviewed By " . getFullName($userId), "Reviewed By " . getFullName($userId));
                addAuditTrailLog($oosObjectId, null, $atData, 'QC Review', 'Done');
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Review Done | [Action Required]";
                $actionDescription = "The $documentShortName Review Is Done.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$creator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('enableQcReviewAddForm', true);
        }

        // Recall QC Reviewer
        if (check_user_in_workflow($oosObjectId, $userId, "Created", 'create') && check_user_in_workflow($oosObjectId, $qcReviewer, "Waiting", 'qc_review')) {
            
            $qcReviewersList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'qc_review', 'Waiting');
                       
            // Remove
            if (isset($_POST['recall_remove'])) {

                $recallRemoveUserArray = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recallReason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recallRemoveUserArray) {

                    foreach ($recallRemoveUserArray as $recallUser) {

                        if (check_user_in_workflow($oosObjectId, $recallUser, "Waiting", 'qc_review')) {
                            
                            delete_worklist($recallUser, $oosObjectId);
                            delete_user_workflow_action($oosObjectId, $recallUser, "Waiting", "qc_review");

                            // Audit Trail
                            $recallUserName = getFullName($recallUser);
                            $recall_qc_reviewer_at_n .= "\n\t\t\t" . $recallUserName;
                            $recall_qc_reviewer_at_p .= "\n\t\t\t$recallUser - $recallUserName";

                            // Send Mail
                            $subject = "$documentShortName | $oosNo | Recalled | [Info Mail]";
                            $actionDescription = "The $documentShortName is Recalled from QC Review";
                            $mailDetails = [
                                "OOS No." => $oosNo,
                                "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                                "Reason for Recall" => $recallReason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail([$recallUser], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                        }
                    }
                    // Audit Trail
                    foreach ($qcReviewersList as $qcRveiewUser) {
                        $recall_qc_reviewer_at_o .= "\n\t\t\t" . $qcRveiewUser['user_name'];
                    }
                    $atData['Reason'] = array('NA', $recallReason, $recallReason);
                    $atData[''] = array("Existing User List : $recall_qc_reviewer_at_o", "Recalled User List : $recall_qc_reviewer_at_n", $recall_qc_reviewer_at_p);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Succesfully Recalled');
                }

                $checkPendingQcReviewersList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'qc_review', 'Waiting');
                
                if (count($checkPendingQcReviewersList) == 0) {
                    if (is_action_finished($oosObjectId, "qc_review", "Waiting")) {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QC Review Is Pending");                        
                    } else {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QC Review");                        
                    }
                    add_worklist($userId, $oosObjectId);                   
                }
                header("Location:$_SERVER[REQUEST_URI]");                                
            }


            $smarty->assign('enableRecallQcReview', true);
            $smarty->assign('recall_from', 'QC REVIEW');
            $smarty->assign('recall_remove_option', true);            
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qc_review');
            $smarty->assign('recall_object_id', $ooObjectId);
            $smarty->assign('recall_pending_users_list', $qcReviewersList);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($oosObjectId, 'qc_review'), 'user_id'));
        }
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "qc-review");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qc-review')); 
            $addFileAttachemnt = true; 
    }
    
    // Enabled QA Reviewer Assign Form 
    if($wfStatus == "Waiting for Assigning QA Review" || $wfStatus == "QA Review Need Correction"){
            
        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
                       
            if (isset($_POST['assign_for_qa_review'])) {

                if ($oosProcess->updateOosWorkFlowStatus($oosObjectId, "QA Review Is Pending")) {

                    $qaReviewer = (isset($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : null;
                    delete_worklist($userId, $oosObjectId);
                    add_worklist($qaReviewer, $oosObjectId);
                    save_workflow($oosObjectId, $qaReviewer, 'Waiting', 'qa_review');
                   
                    // Audit Trail
                    $atData['Assigned for QA Review'] = array('NA', getFullName($qaReviewer), $qaReviewer . " - " . getFullName($qaReviewer));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | QA Review to be Started | [Action Required]";
                    $actionDescription = "The $documentShortName is Pending for Your QA Review.";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }
            

            $smarty->assign('enableQaReviewAssignForm', true); 
            $smarty->assign('editButton', true);              
        }
    }

    // Enabled QA Review Form && Recall QA Reviewer
    if($wfStatus == "QA Review Is Pending"){
        
        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'qa_review') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['qa_reviewed'])) {
                
                update_workflow($oosObjectId, $userId, 'Done', 'qa_review');                
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QC Approve");

                // Audit Trial                
                $atData['QA Reviewed'] = array('NA', "Reviewed By " . getFullName($userId), "Reviewed By " . getFullName($userId));
                addAuditTrailLog($oosObjectId, null, $atData, 'QA Review', 'Done');
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Review Done | [Action Required]";
                $actionDescription = "The $documentShortName Review Is Done.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$creator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['qa_review_correction'])) {

                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QA Review Need Correction");
                update_workflow($oosObjectId, $userId, 'Need Correction', 'qa_review');
                delete_worklist($userId, $oosObjectId);
                add_worklist($qcReviewer, $oosObjectId);

                // Audit Trial                
                $atData['QA Review Need Correction'] = array('NA', $workFlowRemarks, $workFlowRemarks);
                addAuditTrailLog($oosObjectId, null, $atData, 'QA Review Need Correction', 'Waiting');
                                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Need Correction | [Action Required]";
                $actionDescription = "The $documentShortName Needs to be Corrected.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$creator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }            

            $smarty->assign('enableQaReviewAddForm', true);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "qa-review");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qa-review')); 
            $addFileAttachemnt = true; 
        }

        // Recall QA Reviewer
        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && check_user_in_workflow($oosObjectId, $qaReviewer, "Waiting", 'qa_review')) {
            
            $qaReviewersList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'qa_review', 'Waiting');
                       
            // Remove
            if (isset($_POST['recall_remove'])) {

                $recallRemoveUserArray = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recallReason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recallRemoveUserArray) {

                    foreach ($recallRemoveUserArray as $recallUser) {

                        if (check_user_in_workflow($oosObjectId, $recallUser, "Waiting", 'qa_review')) {
                            
                            delete_worklist($recallUser, $oosObjectId);
                            delete_user_workflow_action($oosObjectId, $recallUser, "Waiting", "qa_review");

                            // Audit Trail
                            $recallUserName = getFullName($recallUser);
                            $recall_qc_reviewer_at_n .= "\n\t\t\t" . $recallUserName;
                            $recall_qc_reviewer_at_p .= "\n\t\t\t$recallUser - $recallUserName";

                            // Send Mail
                            $subject = "$documentShortName | $oosNo | Recalled | [Info Mail]";
                            $actionDescription = "The $documentShortName is Recalled from QA Review";
                            $mailDetails = [
                                "OOS No." => $oosNo,
                                "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                                "Reason for Recall" => $recallReason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail([$recallUser], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                        }
                    }
                    // Audit Trail
                    foreach ($qaReviewersList as $qaRveiewUser) {
                        $recall_qa_reviewer_at_o .= "\n\t\t\t" . $qaRveiewUser['user_name'];
                    }
                    $atData['Reason'] = array('NA', $recallReason, $recallReason);
                    $atData[''] = array("Existing User List : $recall_qa_reviewer_at_o", "Recalled User List : $recall_qa_reviewer_at_n", $recall_qa_reviewer_at_p);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Succesfully Recalled');
                }

                $checkPendingQaReviewersList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'qa_review', 'Waiting');
                
                if (count($checkPendingQcReviewersList) == 0) {
                    if (is_action_finished($oosObjectId, "qa_review", "Waiting")) {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QA Review Is Pending");                        
                    } else {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QA Review");                        
                    }
                    add_worklist($userId, $oosObjectId);                   
                }
                header("Location:$_SERVER[REQUEST_URI]");                                
            }

            $smarty->assign('enableRecallQaReview', true);
            $smarty->assign('recall_from', 'QA REVIEW');
            $smarty->assign('recall_remove_option', true);            
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qc_review');
            $smarty->assign('recall_object_id', $ooObjectId);
            $smarty->assign('recall_pending_users_list', $qaReviewersList);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($oosObjectId, 'qa_review'), 'user_id'));
        }
    }

    // Enabled QC Approve Assign Form
    if($wfStatus == "Waiting for Assigning QC Approve" || $wfStatus == "QC Approve Need Correction"){
        if(check_user_in_workflow($oosObjectId, $userId, 'Done', 'qa_review') && check_user_in_worklist($oosObjectId, $qaReviewer)){

            if (isset($_POST['assign_for_qc_approve'])) {

                if ($oosProcess->updateOosWorkFlowStatus($oosObjectId, "QC Approve Is Pending")) {

                    $qcApprover = (isset($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : null;
                    
                    delete_worklist($userId, $oosObjectId);
                    add_worklist($qcApprover, $oosObjectId);
                    save_workflow($oosObjectId, $qcApprover, 'Waiting', 'qc_approve');
                    
                    // Audit Trail
                    $atData['Assigned for QC Approve'] = array('NA', getFullName($qcApprover), $qcApprover . " - " . getFullName($qcApprover));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | QC Approve to be Done | [Action Required]";
                    $actionDescription = "The $documentShortName is Pending for Your QC Approve.";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('enableQcApproveAssiginForm', true);
            $smarty->assign('editButton', true);  
        }
    }

    // Enabled QC Approve Form && Recall QC ApproverNeha
    if($wfStatus == "QC Approve Is Pending"){
        
        if(check_user_in_workflow($oosObjectId, $userId, "Waiting", 'qc_approve') && check_user_in_worklist($oosObjectId, $userId)){

            if (isset($_POST['qc_approve_need_correction'])) {

                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QC Approve Need Correction");
                update_workflow($oosObjectId, $userId, 'Need Correction', 'qc_approve');
                delete_worklist($userId, $oosObjectId);
                add_worklist($qaReviewer, $oosObjectId);
                
                // Audit Trial                
                $atData['QC Approve Need Correction'] = array('NA', $workFlowRemarks, $workFlowRemarks);
                addAuditTrailLog($oosObjectId, null, $atData, 'QC Approve Need Correction', 'Waiting');
                 
                // Send Mail
                $subject = "$documentShortName | $oosNo | Need Correction | [Action Required]";
                $actionDescription = "The $documentShortName Needs to be Corrected.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qaReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['qc_rejected'])) {

                $qcReasonForRejection = (isset($_REQUEST['reason_for_rejection'])) ? $_REQUEST['reason_for_rejection'] : null;

                $oosProcess->updateOosReasonForRejection($oosObjectId, $qcReasonForRejection, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QA Approve");
                update_workflow($oosObjectId, $userId, 'Rejected', 'qc_approve');
                
                // Audit Trial                
                $atData['QC Rejected'] = array('NA', "Rejected By " . getFullName($userId), "Rejected By $userId - " . getFullName($userId));
                $atData['QC Rejected Reason'] = array('NA', $qcReasonForRejection, $qcReasonForRejection);
                addAuditTrailLog($oosObjectId, null, $atData, 'QC Rejected', 'Rejected');
                 
                // Send Mail
                $subject = "$documentShortName | $oosNo | Get Rejected | [Action Required]";
                $actionDescription = "The $documentShortName Get Rejected.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qaReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['qc_approved'])) {

                update_workflow($oosObjectId, $userId, 'Approved', 'qc_approve');
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QA Approve");

                // Audit Trial                
                $atData['QC Approved'] = array('NA', "Approved By " . getFullName($userId), "Approved By $userId - " . getFullName($userId));                
                addAuditTrailLog($oosObjectId, null, $atData, 'QC Approved', 'Approved');

                // Send Mail
                $subject = "$documentShortName | $oosNo | QC Approved | [Action Required]";
                $actionDescription = "The $documentShortName QC Approved.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qaReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('enableQcApproveAddForm', true);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "qc-approve");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qc-approve')); 
            $addFileAttachemnt = true; 
        }

        // Recall QC Approver
        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qa_review') && check_user_in_workflow($oosObjectId, $qcApprover, "Waiting", 'qc_approve')) {
         
            $qcApproversList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'qc_approve', 'Waiting');
                   
            // Remove
            if (isset($_POST['recall_remove'])) {

                $recallRemoveUserArray = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recallReason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recallRemoveUserArray) {

                    foreach ($recallRemoveUserArray as $recallUser) {

                        if (check_user_in_workflow($oosObjectId, $recallUser, "Waiting", 'qc_approve')) {
                            
                            delete_worklist($recallUser, $oosObjectId);
                            delete_user_workflow_action($oosObjectId, $recallUser, "Waiting", "qc_approve");

                            // Audit Trail
                            $recallUserName = getFullName($recallUser);
                            $recall_qc_approver_at_n .= "\n\t\t\t" . $recallUserName;
                            $recall_qc_approver_at_p .= "\n\t\t\t$recallUser - $recallUserName";

                            // Send Mail
                            $subject = "$documentShortName | $oosNo | Recalled | [Info Mail]";
                            $actionDescription = "The $documentShortName is Recalled from QC Approve";
                            $mailDetails = [
                                "OOS No." => $oosNo,
                                "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                                "Reason for Recall" => $recallReason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail([$recallUser], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                        }
                    }
                    // Audit Trail
                    foreach ($qcApproversList as $qcApproverUser) {
                        $recall_qc_approver_at_o .= "\n\t\t\t" . $qcApproverUser['user_name'];
                    }
                    $atData['Reason'] = array('NA', $recallReason, $recallReason);
                    $atData[''] = array("Existing User List : $recall_qc_approver_at_o", "Recalled User List : $recall_qc_approver_at_n", $recall_qc_approver_at_p);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Succesfully Recalled');
                }

                $checkPendingQcApproversList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'qc_approve', 'Waiting');
                
                if (count($checkPendingQcApproversList) == 0) {
                    if (is_action_finished($oosObjectId, "qc_approve", "Waiting")) {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QC Approve Is Pending");                        
                    } else {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Assigning QC Approve");                        
                    }
                    add_worklist($userId, $oosObjectId);                   
                }
                header("Location:$_SERVER[REQUEST_URI]");                                
            }

            $smarty->assign('enableRecallQcApprove', true);
            $smarty->assign('recall_from', 'QC APPROVE');
            $smarty->assign('recall_remove_option', true);            
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'qc_approve');
            $smarty->assign('recall_object_id', $ooObjectId);
            $smarty->assign('recall_pending_users_list', $qcApproversList);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($oosObjectId, 'qc_approve'), 'user_id'));
        } 
    }

    // Enabled QA Approve Assign Form
    if($wfStatus == "Waiting for Assigning QA Approve" || $wfStatus == "QA Approve Need Correction"){
        
        if((check_user_in_workflow($oosObjectId, $userId, "Rejected", "qc_approve") || check_user_in_workflow($oosObjectId, $userId, "Approved", "qc_approve")) && check_user_in_worklist($oosObjectId, $userId)){
            
            if (isset($_POST['assign_for_qa_approve'])) {

                if ($oosProcess->updateOosWorkFlowStatus($oosObjectId, "QA Approve Is Pending")) {

                    $qaApprover = (isset($_REQUEST['user_id'])) ? $_REQUEST['user_id'] : null;

                    delete_workflow_action($oosObjectId, "Need Correction", "qa_approve");
                    delete_worklist($userId, $oosObjectId);
                    add_worklist($qaApprover, $oosObjectId);
                    save_workflow($oosObjectId, $qaApprover, 'Waiting', 'qa_approve');

                    // Audit Trial                
                    $atData['Assigned for QA Approve'] = array('NA', getFullName($qaApprover), $qaApprover . " - " . getFullName($qaApprover));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');
                    
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | QA Approve to be Done | [Action Required]";
                    $actionDescription = "The $documentShortName is Pending for Your QA Approve.";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('enableQaApproveAssiginForm', true);
        }
    }

    // Enabled QA Approve Form
    if($wfStatus == "QA Approve Is Pending"){
        if(check_user_in_workflow($oosObjectId, $userId, "Waiting", "qa_approve") && check_user_in_worklist($oosObjectId, $userId)){
            
            if (isset($_POST['qa_approved'])) {

                $isCapaRequired = (isset($_REQUEST['is_capa_required'])) ? $_REQUEST['is_capa_required'] : null;
                $qmsCapaNo = (isset($_REQUEST['qms_capa_no'])) ? $_REQUEST['qms_capa_no'] : null;
                $manualCapaNo = (isset($_REQUEST['manual_capa_no'])) ? $_REQUEST['manual_capa_no'] : null;
                $isPhase1ManufacturingInvestigationRequired = (isset($_REQUEST['is_phase1_mfg_invest_required'])) ? $_REQUEST['is_phase1_mfg_invest_required'] : null;
               
                $oosProcess->updateOosQaApproveDetails($oosObjectId, $isCapaRequired, $qmsCapaNo, $manualCapaNo, $isPhase1ManufacturingInvestigationRequired);
                update_workflow($oosObjectId, $userId, 'Approved', 'qa_approve');
                
                // Audit Trial                
                $atData['QC Approved'] = array('NA', getFullName($qaApprover), $qaApprover . '-' . getFullName($qaApprover));
                addAuditTrailLog($oosObjectId, null, $atData, 'QC Approve Need Correction', 'Waiting');


                if ($oosProcess->isOosActionFinished($oosObjectId, "qa_approve", "Approved")) {

                    if ($isPhase1ManufacturingInvestigationRequired == "yes") {

                        $oosProcess->addOosManufaturingInvestigationDetails($oosObjectId, $userId, $dateTime);
                    }

                    if ($preliminaryInvestigatioinObject->is_assign_cause_identified == "no" && $preliminaryInvestigatioinObject->is_further_invest_required == "yes") {

                        $oosProcess->addOosPhase1InvestigationDetails($oosObjectId);
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-1 Investigation to be Started");
                        delete_worklist($userId, $oosObjectId);                        
                        add_worklist($qcReviewer, $oosObjectId);
                        save_workflow($oosObjectId, $qcReviewer, 'Waiting', 'to_assign');
                        
                        // Audit Trial                
                        $atData['Phase-1 Investigation'] = array('NA', getFullName($qcReviewer), $qcReviewer . " - " . getFullName($qcReviewer));
                        addAuditTrailLog($oosObjectId, null, $atData, "Phase-1 Investigation to be Started", 'Waiting');
                    
                        // Send Mail
                        $subject = "$documentShortName | $oosNo | QA Approved | [Action Required]";
                        $actionDescription = "The $documentShortName QA Approved.";
                        $mailDetails = [
                            "OOS No." => $oosNo,
                            "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail([$initiator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                    } 
                    
                    if ($prelim_invest_obj->is_assign_cause_identified == "yes" || ($prelim_invest_obj->is_assign_cause_identified == "no" && $prelim_invest_obj->is_further_invest_required == "no")) {
                        
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");
                        save_workflow($oosObjectId, $qaApprover, 'Waiting', 'close_out');
                        
                        // Audit Trial                
                        $atData['Waiting for Close-out'] = array('NA', getFullName($qaApprover), $qaApprover . " - " . getFullName($qaApprover));
                        addAuditTrailLog($oosObjectId, null, $atData, "close_out", 'Waiting');

                        // Send Mail
                        $subject = "$documentShortName | $oosNo | QA Close-out ";
                        $actionDescription = "The $documentShortName QA Close-out.";
                        $mailDetails = [
                            "OOS No." => $oosNo,
                            "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                            "Sent By" => $_SESSION['full_name']
                        ];
                        send_workflow_mail([$initiator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                    }
                   
                    header("Location:$_SERVER[REQUEST_URI]");
                }
            }

            if (isset($_POST['qa_approve_need_correction'])) {

                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "QA Approve Need Correction");
                update_workflow($oosObjectId, $userId, 'Need Correction', 'qa_approve');
                delete_worklist($userId, $oosObjectId);
                add_worklist($qcApprover, $oosObjectId);
                
                // Audit Trial                
                $atData['QA Approve Need Correction'] = array('NA', getFullName($qaApprover), $qaApprover . " - " . getFullName($qaApprover));
                addAuditTrailLog($oosObjectId, null, $atData, "QA Approve Need Correction", 'Waiting');

                // Send Mail
                $subject = "$documentShortName | $oosNo | QA Approve Needs Correction | [Action Required]";
                $actionDescription = "The $documentShortName Needs to be corrected.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['qa_rejected'])) {

                $qaReasonForRejection = (isset($_REQUEST['qa_reason_for_rejection'])) ? $_REQUEST['qa_reason_for_rejection'] : null;

                $oosProcess->updateOosReasonForRejection($oosObjectId, null, $qaReasonForRejection);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Rejected");
                update_workflow($oosObjectId, $userId, 'Rejected', 'qa_approve');
                delete_worklist($userId, $oosObjectId);

                // Audit Trial                
                $atData['QA Rejected'] = array('NA', getFullName($qaApprover), $qaApprover . " - " . getFullName($qaApprover));
                addAuditTrailLog($oosObjectId, null, $atData, "QA Rejected", 'Rejected');

                // Send Mail
                $subject = "$documentShortName | $oosNo | QA Rejected | [Action Required]";
                $actionDescription = "The $documentShortName is Rejected.";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
            
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('enableQaApproveAddForm', true);            
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "qa-approve");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qa-approve')); 
            $addFileAttachemnt = true; 
        }
    }

    // Enabled Phase-1 Investigation Form 
    if($wfStatus == "Phase-1 Investigation to be Started"){
        if(check_user_in_workflow($oosObjectId, $userId, "Waiting", "to_assign") && check_user_in_worklist($oosObjectId, $userId)){
            
            if(isset($_POST['add_checklist_analyst'])){
                                
                $checkPointsArray = (isset($_REQUEST['phase1_check_points'])) ? $_REQUEST['phase1_check_points'] : null;
                $phase1Analyst = (isset($_REQUEST['phase1_analyst'])) ? $_REQUEST['phase1_analyst'] : null;
                
                $existingChecklist = [];
                foreach($phase1CheckListDetails as $checklistPoint){    
                    $existingChecklist[] =  $checklistPoint['checklistId'];           
                } 

                for ($j = 0; $j < count($checkPointsArray); $j++) {
                    if(!in_array($checkPointsArray[$j], $existingChecklist)){
                        $oosProcess->addOosChecklistDetails($oosObjectId, $phase1ObjectId, $checkPointsArray[$j], $userId, $dateTime);
                    }
                }

                $existingAnalyst = [];
                foreach($phase1AnalystDetails as $analyst){
                    $existingAnalyst[] = $analyst['analystId'];
                }

                for ($i = 0; $i < count($phase1Analyst); $i++) {
                    if(!in_array($phase1Analyst[$i], $existingAnalyst)){
                        $oosProcess->addOosAnalystDetails($oosObjectId, $phase1ObjectId, $phase1Analyst[$i], $userId, $dateTime);
                    }
                }
                header("Location:$_SERVER[REQUEST_URI]");                
            }

            if (isset($_POST['assign_phase1_analyst'])) {

                $phase1AnalystArray = (isset($_REQUEST['phase1_analyst_array'])) ? $_REQUEST['phase1_analyst_array'] : null;
                $phase1AnalystObjArray = (isset($_REQUEST['phase1_analyst_obj_array'])) ? $_REQUEST['phase1_analyst_obj_array'] : null;

                for ($i = 0; $i < count($phase1AnalystObjArray); $i++) {

                    $atAnalysts .= "\n" . getFullName($phase1AnalystArray[$i]) . ", ";
                    $atAnalystsId .= "\n" . $phase1AnalystArray[$i] . " - " . getFullName($phase1AnalystArray[$i]) . ", ";

                    for ($j = 0; $j < count($oosSpecificationDetailsArray); $j++) {

                        $oosProcess->addOosSpecificationDetails($oosObjectId, $phase1ObjectId, $phase1AnalystObjArray[$i], $oosSpecificationDetailsArray[$j]['objectId']);
                    }
                }                               

                update_workflow($oosObjectId, $userId, 'Assigned', 'to_assign');
                if ($oosProcess->isOosActionFinished($oosObjectId, "to_assign", "Assigned")) {

                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-1 Investigation is in Progress");
                }

                delete_worklist($userId, $oosObjectId);
                for ($i = 0; $i < count($phase1AnalystArray); $i++) {

                    add_worklist($phase1AnalystArray[$i], $oosObjectId);
                    save_workflow($oosObjectId, $phase1AnalystArray[$i], 'Waiting', '1p_retest_analyst');
                }

                // Audit Trial                
                $atData['Assigned to analysts for Phase 1 Investigation'] = array('NA', $atAnalysts, $atAnalystsId);
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Assigned');

                for ($j = 0; $j < count($phase1AnalystArray); $j++) {
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Assigned to Analyst for Re-testing | [Action Required] ";
                    $actionDescription = "The $documentShortName Assigned to Analyst for Re-testing.";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$phase1AnalystArray[$j]], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }

                header("Location:$_SERVER[REQUEST_URI]");                  
            }
            
            $smarty->assign('enablePhase1InvestigationAssignForm', true);  
        }
    }

    // Enabled Phase-1 Investigation is in Progress Form 
    if($wfStatus == "Phase-1 Investigation is in Progress"){        
        
        for ($i = 0; $i < count($phase1AnalystDetails); $i++) {
            
            if (check_user_in_workflow($oosObjectId, $userId, "Waiting", '1p_retest_analyst') && (check_user_in_worklist($oosObjectId, $userId))) {
                               
                if (isset($_POST['update_phase1_test_result_and_remarks'])) {
                    
                    $phase1SpecificationResultObjArray = (isset($_REQUEST['phase1_spec_result_obj_array'])) ? $_REQUEST['phase1_spec_result_obj_array'] : null;
                    $phase1ObtainedResultArray = (isset($_REQUEST['phase1_obtained_result'])) ? $_REQUEST['phase1_obtained_result'] : null;
                    $phase1ObtainedResultRemarksArray = (isset($_REQUEST['phase1_obtained_result_remarks'])) ? $_REQUEST['phase1_obtained_result_remarks'] : null;

                    for ($i = 0; $i < count($phase1SpecificationResultObjArray); $i++) {
                        
                        $oosProcess->updateOosSpecificationResultDetails($phase1SpecificationResultObjArray[$i], $phase1ObtainedResultArray[$i], $phase1ObtainedResultRemarksArray[$i], $userId, $dateTime);
                    }
                    
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-1 Analysis | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-1 Analysis done by the assigned Analyst";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                    header("Location:$_SERVER[REQUEST_URI]");  
                }

                if (isset($_POST['submit_phase1_retest_result'])) {

                    // Audit Trial
                    $atData['Phase-1 Re-testing Completed'] = array('NA', $phase1AnalystDetails['analystName'], "AnalystId - " . $phase1AnalystDetails['analystId']);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Assigned');
                    
                    update_workflow($oosObjectId, $userId, 'Done', '1p_retest_analyst');
                    delete_worklist($userId, $oosObjectId);
                    if ($oosProcess->isOosActionFinished($oosObjectId, "1p_retest_analyst", "Done")) {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-1 Updation");
                    }
                    add_worklist($qcReviewer, $oosObjectId);
                    header("Location:$_SERVER[REQUEST_URI]"); 
                }


                $phase1RetestAanalystDetailsArray = $oosProcess->getOosAnalystTestDetails($phase1ObjectId, $userId);
                $smarty->assign('phase1RetestAnalystDetailsArray', $phase1RetestAanalystDetailsArray);
                $smarty->assign('enablePhase1InvestigationIsInProgressForm', true);
                
                if ($oosProcess->isOosObtainedResultsSaved($phase1ObjectId, $userId) != false) {
                    $smarty->assign('submitPhase1ResultButton', true);
                }
            }
        }             
    }
    
    // Enable Phase-1 Checklist Observation Form  
    if($wfStatus == "Waiting for Phase-1 Updation"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['phase1_checklist_save'])) {

                $phase1CheckPointsObjArray = (isset($_REQUEST['p1_check_points_obj'])) ? $_REQUEST['p1_check_points_obj'] : null;
                $phase1YesNoNaArray = (isset($_REQUEST['p1_yes_no_na'])) ? $_REQUEST['p1_yes_no_na'] : null;
                $phase1ObservationArray = (isset($_REQUEST['p1_observation'])) ? $_REQUEST['p1_observation'] : null;

                for ($j = 0; $j < count($phase1CheckPointsObjArray); $j++) {
                   
                    $oosProcess->updateOosChecklistDetails($phase1CheckPointsObjArray[$j], $phase1YesNoNaArray[$j], $phase1ObservationArray[$j], $userId, $dateTime);
                }

                // Send Mail
                $subject = "$documentShortName | $oosNo | Checklist Updation | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer Verified the Checklist";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$creator], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            if (isset($_POST['phase1_checklist_completed'])) {

                if ($oosDetailsObj->is_1phase_mfg_invest_required == "yes") {
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-1 Manufacturing Investigation to be Started");
                } else {
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-1 Conclusion");
                }
                                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-1 Investigation Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer has to Conclude the Phase-1 Analysis";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }
            
            $smarty->assign('enablePhase1ChecklistUpdationForm', true);
            
            if ($oosProcess->isOosCompletedAllFieldsInChecklist($phase1ObjectId, $oosObjectId) == true) {

                $smarty->assign('submitChecklistCompletedButton', true);
            }
        }
    }

    // Enable Phase-1 Manufacturing Investigation, Add Checklist and Assign Analyst Form 
    if($wfStatus == "Phase-1 Manufacturing Investigation to be Started"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && check_user_in_worklist($oosObjectId, $userId)) {
            
            if (isset($_POST['add_p1_mfg_analyst'])) {

                $phase1ManufacturingAnalyst = (isset($_REQUEST['p1_mfg_responsible_person'])) ? $_REQUEST['p1_mfg_responsible_person'] : null;
                $phase1ManufacturingCheckPointsArray = (isset($_REQUEST['p1_mfg_check_points'])) ? $_REQUEST['p1_mfg_check_points'] : null;

                if(empty($phase1ManufacturingAnalystDetails)){
                    $oosProcess->addOosAnalystDetails($oosObjectId, $phase1ManufacturingObjectId, $phase1ManufacturingAnalyst, $userId, $dateTime);
                }           
                
                $existingChecklist = [];
                foreach($phase1ManufacturingCheckListDetails as $exist){
                    array_push($existingChecklist, $exist['checklistId']);
                }                

                for ($j = 0; $j < count($phase1ManufacturingCheckPointsArray); $j++) {

                    if(!in_array($phase1ManufacturingCheckPointsArray[$j], $existingChecklist)){
                        $oosProcess->addOosChecklistDetails($oosObjectId, $phase1ManufacturingObjectId, $phase1ManufacturingCheckPointsArray[$j], $userId, $dateTime);
                    }                    
                }

                header("Location:$_SERVER[REQUEST_URI]");
            }

            if (isset($_POST['assign_p1_mfg_investigation'])) {

                $p1_mfg_analyst = (isset($_REQUEST['p1_mfg_analyst'])) ? $_REQUEST['p1_mfg_analyst'] : null;

                delete_worklist($userId, $oosObjectId);
                add_worklist($p1_mfg_analyst, $oosObjectId);
                save_workflow($oosObjectId, $p1_mfg_analyst, 'Waiting', '1p_mfg_invest');
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-1 Manufacturing Investigation is in Progress");

                // Audit Trial
                $atData['Phase-1 Manufacturing Investigation is in Progress'] = array('NA', $p1_mfg_analyst['analystName'], "AnalystId - " . $p1_mfg_analyst['analystId']);
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Manufacturing Investigation | [Action Required] ";
                $actionDescription = "The $documentShortName Manufacturing Investigation Started";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$phase1ManufacturingAnalyst], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            if ($oosDetailsObj->is_1phase_mfg_invest_required == "yes") {
                $smarty->assign('enablePhase1ManufacturingInvestAddChecklistAndAssignAnalystForm', true);
            }
        }
    }
   
    // Enable Phase-1 Manufacturing Investigation, Update Checklist and add Observations 
    if($wfStatus == "Phase-1 Manufacturing Investigation is in Progress"){

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", '1p_mfg_invest') && check_user_in_worklist($oosObjectId, $userId)) {
            
            $phase1AnalystIds = [];
            foreach($phase1AnalystDetails as $p1Analyst){
                array_push($phase1AnalystIds, $p1Analyst['analystId']);
            }

            if (isset($_POST['phase1_mfg_checklist_save'])) {

                $manufacturingInvestigationDetails = (isset($_REQUEST['manufacturing_investigation_details'])) ? $_REQUEST['manufacturing_investigation_details'] : null;
                $phase1ManufacturingInvestigationCheckPointsObjArray = (isset($_REQUEST['p1_mfg_check_points_obj'])) ? $_REQUEST['p1_mfg_check_points_obj'] : null;
                $phase1ManufacturingInvestigationYesNoNaArray = (isset($_REQUEST['p1_mfg_yes_no_na'])) ? $_REQUEST['p1_mfg_yes_no_na'] : null;
                $phase1ManufacturingInvestigationObservationArray = (isset($_REQUEST['p1_mfg_observation'])) ? $_REQUEST['p1_mfg_observation'] : null;

                $oosProcess->updateOosManufacturingInvestigationDetails($oosObjectId, $manufacturingInvestigationDetails, $userId, $dateTime);

                for ($j = 0; $j < count($phase1ManufacturingInvestigationCheckPointsObjArray); $j++) {

                    $oosProcess->updateOosChecklistDetails($phase1ManufacturingInvestigationCheckPointsObjArray[$j], $phase1ManufacturingInvestigationYesNoNaArray[$j], $phase1ManufacturingInvestigationObservationArray[$j], $userId, $dateTime);
                }
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Manufacturing Investigation Checklist Update | [Action Required] ";
                $actionDescription = "The $documentShortName Checklist is filled by Manufacturing Investigator ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];

                send_workflow_mail($phase1AnalystIds, $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            if (isset($_POST['phase1_mfg_checklist_completed'])) {

                update_workflow($oosObjectId, $userId, 'Done', '1p_mfg_invest');
                delete_worklist($userId, $oosObjectId);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-1 Conclusion");
                add_worklist($qcReviewer, $oosObjectId);
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-1 Manufacturing Investigation Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer has to Conclude the Phase-1 Re-sampling Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];

                send_workflow_mail([$qc_reviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enablePhase1ManufacturingInvestigationCheckListUpdateForm', true);

            if ($oosProcess->isOosCompletedAllFieldsInChecklist($phase1ManufacturingObjectId, $oosObjectId) == true) {
                $smarty->assign('submitPhase1ManufacturingInvestigationCheckListCompletedButton', true);
            }
        }
    }

    // Enable Phase-1 Conclusion Form 
    if($wfStatus == "Waiting for Phase-1 Conclusion"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
                        
            if (isset($_POST['add_phase1_conclusion_button'])) {

                $phase1ErrorTypeId = (isset($_REQUEST['phase1_error_type'])) ? $_REQUEST['phase1_error_type'] : null;
                $phase1ErrorClassificationId = (isset($_REQUEST['phase1_error_classification'])) ? $_REQUEST['phase1_error_classification'] : null;
                $phase1QcReviewerComments = (isset($_REQUEST['phase1_qc_reviewer_comments'])) ? $_REQUEST['phase1_qc_reviewer_comments'] : null;
                
                $oosProcess->updateOosPhase1ConclusionDetails($oosObjectId, $phase1ErrorTypeId, $phase1ErrorClassificationId, null, null);
                $oosProcess->updateOosPhase1InvestigationReviewerComments($oosObjectId, $phase1QcReviewerComments, null, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-1 QC Verification");
                
                delete_worklist($userId, $oosObjectId);                
                add_worklist($qcApprover, $oosObjectId);
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-1 Investigation Verification | [Action Required] ";
                $actionDescription = "The $documentShortName QC Approver has to Verify the Phase-1 Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];

                send_workflow_mail([$qaReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enablePhase1ConclusionForm', true);
        }
    }

    // Enable Phase-1 QC Verification Form 
    if ($wfStatus == "Waiting for Phase-1 QC Verification") {

        if (check_user_in_workflow($oosObjectId, $userId, "Rejected", 'qc_approve') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_phase1_qc_verification_button'])) {

                $phase1QcApproverComments = (isset($_REQUEST['phase1_qc_approver_comments'])) ? $_REQUEST['phase1_qc_approver_comments'] : null;

                $oosProcess->updateOosPhase1InvestigationReviewerComments($oosObjectId, null, $phase1QcApproverComments, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-1 QA Verification");

                delete_worklist($userId, $oosObjectId);                
                add_worklist($qaApprover, $oosObjectId);
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-1 Investigation Final Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QA Approver has to Conclude the Phase-1 Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];

                send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enablePhase1QcVerificationForm', true);
        }
    }

    // Enable Phase-1 QA Verification Form 
    if ($wfStatus == "Waiting for Phase-1 QA Verification") {

        if (check_user_in_workflow($oosObjectId, $userId, "Approved", 'qa_approve') && (check_user_in_worklist($oosObjectId, $userId))) {
                        
            if (isset($_POST['add_phase1_final_conclusion_button'])) {

                $phase1IsAssignableCauseIdentified = (isset($_REQUEST['p1_is_assign_cause_identified'])) ? $_REQUEST['p1_is_assign_cause_identified'] : null;
                $phase1AssignableCauseDetails = (isset($_REQUEST['p1_assign_cause_details'])) ? $_REQUEST['p1_assign_cause_details'] : null;
                $phase1IsFurtherInvestigationRequired = (isset($_REQUEST['p1_is_further_invest_required'])) ? $_REQUEST['p1_is_further_invest_required'] : null;
                $phase1QaApproverComments = (isset($_REQUEST['p1_qa_approver_comments'])) ? $_REQUEST['p1_qa_approver_comments'] : null;

                $oosProcess->updateOosPhase1ConclusionDetails($oosObjectId, null, null, $phase1IsAssignableCauseIdentified, $phase1IsFurtherInvestigationRequired);
                $oosProcess->updateOosPhase1AssignableCauseDetails($oosObjectId, $phase1AssignableCauseDetails);
                
                if ($phase1IsFurtherInvestigationRequired == "yes") {
                    $oosProcess->updateOosPhase1ValidDetails($oosObjectId, "yes");
                }

                $oosProcess->updateOosPhase1InvestigationReviewerComments($oosObjectId, null, null, $phase1QaApproverComments);

                if ($phase1IsAssignableCauseIdentified == "no" && $phase1IsFurtherInvestigationRequired == "yes") {
                    
                    $oosProcess->addOosPhase2RetestInvestigationDetails($oosObjectId);
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-2(Re-testing) Investigation to be Started");
                    delete_worklist($userId, $oosObjectId);                    
                    add_worklist($qcReviewer, $oosObjectId);
                    save_workflow($oosObjectId, $qcReviewer, 'Waiting', 'to_assign');
                    
                    // Audit Trial
                    $atData['Phase-2(Re-testing) Investigation to be Started'] = array('NA', getUserName($qcReviewer), "userId - " . $qcReviewer);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');
                    
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-1 Investigation Final Conclusion | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-1 Investigation Concluded ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                } 
                
                if ($phase1IsAssignableCauseIdentified == "yes" || ($phase1IsAssignableCauseIdentified == "no" && $phase1IsFurtherInvestigationRequired == "no")) {
                    
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");
                    save_workflow($oosObjectId, $qaApprover, 'Waiting', 'close_out');
                    
                    // Audit Trial
                    $atData['Waiting for Close-out'] = array('NA', getUserName($qaApprover), "userId - " . $qaApprover);
                    addAuditTrailLog($oosObjectId, null, $atData, "Waiting for Close-out", 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-1 Investigation Final Conclusion | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-1 Investigation Concluded ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }

                header("Location:$_SERVER[REQUEST_URI]"); 
            }

            $smarty->assign('enablePhase1FinalConclusionForm', true);

            if ($oosProcess->isOosActionFinished($oosObjectId, "1p_retest_analyst", "Done")) {

                $smarty->assign('submitPhase1FinalConclusionButton', true);
            }
        }
    }
    
    // Enabled Phase-2 Re-testing Investigation Form 
    if ($wfStatus == "Phase-2(Re-testing) Investigation to be Started") {

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'to_assign') && check_user_in_worklist($oosObjectId, $userId)) {
            
            if (isset($_POST['add_phase2_retest_analyst'])) {
                
                $phase2RetestCheckPointsArray = (isset($_REQUEST['phase2_retest_check_points'])) ? $_REQUEST['phase2_retest_check_points'] : null;
                $phase2RetestAnalystArray = (isset($_REQUEST['phase2_analyst'])) ? $_REQUEST['phase2_analyst'] : null;
                $retestingDescription = (isset($_REQUEST['retesting_description'])) ? $_REQUEST['retesting_description'] : null;
                
                $oosProcess->updateOosPhase2RetestConclusionDetails($oosObjectId, $retestingDescription, null, null, null, null);

                $phase2RetestCheckPointExist = [];
                foreach($phase2RetestCheckListDetails as $checkPoint){
                    array_push($phase2RetestCheckPointExist, $checkPoint['checklistId']);
                }

                for ($j = 0; $j < count($phase2RetestCheckPointsArray); $j++) {
                    if(!in_array($phase2RetestCheckPointsArray[$j], $phase2RetestCheckPointExist)){
                        $oosProcess->addOosChecklistDetails($oosObjectId, $phase2RetestObjectId, $phase2RetestCheckPointsArray[$j], $userId, $dateTime);
                    }                    
                }

                $phase2RetestAnalystExist = [];                
                foreach($phase2RetestAnalystDetails as $analyst){
                    array_push($phase2RetestAnalystExist, $analyst['analystId']);                    
                }

                for ($i = 0; $i < count(array_unique($phase2RetestAnalystArray)); $i++) {
                    if(!in_array($phase2RetestAnalystArray[$i], $phase2RetestAnalystExist)){
                        $oosProcess->addOosAnalystDetails($oosObjectId, $phase2RetestObjectId, $phase2RetestAnalystArray[$i], $userId, $dateTime);
                    }                    
                }

                header("Location:$_SERVER[REQUEST_URI]");
            }


            if (isset($_POST['assign_phase2_retest_analyst'])) {
                
                $phase2RetestAnalystArray = (isset($_REQUEST['p2_rt_analyst_array'])) ? $_REQUEST['p2_rt_analyst_array'] : null;
                $phase2RetestAnalystObjArray = (isset($_REQUEST['p2_rt_analyst_obj_array'])) ? $_REQUEST['p2_rt_analyst_obj_array'] : null;

                for ($i = 0; $i < count($phase2RetestAnalystObjArray); $i++) {

                    for ($j = 0; $j < count($oosSpecificationDetailsArray); $j++) {

                        $oosProcess->addOosSpecificationDetails($oosObjectId, $phase2RetestObjectId, $phase2RetestAnalystObjArray[$i], $oosSpecificationDetailsArray[$j]['objectId']);
                    }
                }

                if ($oosProcess->isOosActionFinished($oosObjectId, "to_assign", "Assigned")) {

                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-2(Re-testing) Investigation is in Progress");
                }

                $phase2RetestAnalystNames = [];
                $phase2RetestAnalystNameAndId = [];
                foreach($phase2RetestAnalystDetails as $analyst){                    
                    array_push($phase2RetestAnalystNames, $analyst['analystName']);
                    array_push($phase2RetestAnalystNameAndId, $analyst['analystId'] . " - " . $analyst['analystName']);
                }

                
                update_workflow($oosObjectId, $userId, 'Assigned', 'to_assign');
                delete_worklist($userId, $oosObjectId);

                for ($i = 0; $i < count($phase2RetestAnalystArray); $i++) {
                    add_worklist($phase2RetestAnalystArray[$i], $oosObjectId);
                    save_workflow($oosObjectId, $phase2RetestAnalystArray[$i], 'Waiting', '2p_retest_analyst');
                }

                
                // Audit Trial
                $atData['Analyst assigned for Phase-2 Re-testing'] = array('NA', implode(', ', $phase2RetestAnalystNames), implode(', ', $phase2RetestAnalystNameAndId));
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Assigned');

                // Send Mail
                $subject = "$documentShortName | $oosNo | Assign Analyst for Phase-2 Re-testing | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer assigned Analyst for Phase-2 Re-testing ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail($phase2RetestAnalystArray, $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");
            }

            $smarty->assign('phase2RetestingInvestigationAddCheckListAndAssignAnalystForm', true);
            $smarty->assign('phase2RetestDescription', $oosProcess->getOosPhase2RetestConclusionDescription($oosObjectId));
        }
    }

    // Enable phase-2 retest obtained result and remarks update From 
    if($wfStatus == "Phase-2(Re-testing) Investigation is in Progress"){
        
        // if (!empty($_FILES)) {

        //     $spec_details_id = (isset($_POST['spec_details_id'])) ? $_POST['spec_details_id'] : null;
        //     $oos_process->add_attachments_in_file_array($spec_details_id, "2p_retest_analyst", $usr_id, $date_time);
        // }
       

        for ($i = 0; $i < count($phase2RetestAnalystDetails); $i++) {
            
            if (check_user_in_workflow($oosObjectId, $userId, "Waiting", '2p_retest_analyst') && (check_user_in_worklist($oosObjectId, $userId))) {
                
                if (isset($_POST['update_phase2_retest_result_and_remarks'])) {

                    $phase2RetestSpecificationResultObjArray = (isset($_REQUEST['phase2_retest_specification_result_obj_array'])) ? $_REQUEST['phase2_retest_specification_result_obj_array'] : null;
                    $phase2RetestObtainedResultArray = (isset($_REQUEST['phase2_retest_obtained_result'])) ? $_REQUEST['phase2_retest_obtained_result'] : null;
                    $phase2RetestObtainedResultRemarksArray = (isset($_REQUEST['phase2_retest_obtained_result_remarks'])) ? $_REQUEST['phase2_retest_obtained_result_remarks'] : null;
                    
                    for ($i = 0; $i < count($phase2RetestSpecificationResultObjArray); $i++) {
                        $oosProcess->updateOosSpecificationResultDetails($phase2RetestSpecificationResultObjArray[$i], $phase2RetestObtainedResultArray[$i], $phase2RetestObtainedResultRemarksArray[$i], $userId, $dateTime);
                    }

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-2 Retest Analysis | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-2 Retest Analysis done by the assigned Analyst ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                    header("Location:$_SERVER[REQUEST_URI]");                    
                }

                

                if (isset($_POST['submit_phase2_retest_result'])) {
                   
                    // Audit Trial
                    $atData['Phase-2 Re-testing Completed'] = array('NA', getUserName($userId), $userId . " - ". getUserName($userId));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Assigned');

                    update_workflow($oosObjectId, $userId, 'Done', '2p_retest_analyst');
                    delete_worklist($userId, $oosObjectId);
                    
                    if ($oosProcess->isOosActionFinished($oosObjectId, "2p_retest_analyst", "Done")) {

                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-testing) Updation");
                    }

                    add_worklist($qcReviewer, $oosObjectId);
                    header("Location:$_SERVER[REQUEST_URI]");
                }

                if ($oosProcess->IsOosObtainedResultsSaved($phase2RetestObjectId, $userId) != false) {
                                       
                    $smarty->assign('submitPhase2ResultButton', true);
                }
                
                $smarty->assign('enablePhase2RetesInvestigationForm', true);
                $phase2RetestAnalystDetailsArray = $oosProcess->getOosAnalystTestDetails($phase2RetestObjectId, $userId);
                $smarty->assign('phase2RetestAnalystDetailsArray', $phase2RetestAnalystDetailsArray);
                
            }
        }
    }

    // Enable Phase-2 retest Checklist Observation Form  
    if($wfStatus == "Waiting for Phase-2(Re-testing) Updation"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['phase2_retest_checklist_save'])) {

                $phase2RetestCheckPointsObjArray = (isset($_REQUEST['phase2_retest_check_points_obj'])) ? $_REQUEST['phase2_retest_check_points_obj'] : null;
                $phase2RetestYesNoNaArray = (isset($_REQUEST['phase2_retest_yes_no_na'])) ? $_REQUEST['phase2_retest_yes_no_na'] : null;
                $phase2RetestObservationArray = (isset($_REQUEST['phase2_retest_observation'])) ? $_REQUEST['phase2_retest_observation'] : null;

                for ($j = 0; $j < count($phase2RetestCheckPointsObjArray); $j++) {

                    $oosProcess->updateOosChecklistDetails($phase2RetestCheckPointsObjArray[$j], $phase2RetestYesNoNaArray[$j], $phase2RetestObservationArray[$j], $userId, $dateTime);
                }

                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Checklist Updation | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer Updated the Checklist ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");       
            }

            if (isset($_POST['phase2_retest_checklist_completed'])) {

                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-testing) Conclusion");

                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Investigation Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer has to Conclude the Phase-2 Re-testing Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");       
            }

            $smarty->assign('enablePhase2RetestChecklistUpdationForm', true);
            
            if ($oosProcess->isOosCompletedAllFieldsInChecklist($phase2RetestObjectId, $oosObjectId) == true) {
                
                $smarty->assign('submitPhase2RetestChecklistCompletedButton', true);
            }
        }
    }

    // Enable Phase-2 Retest Conclusion Form 
    if($wfStatus == "Waiting for Phase-2(Re-testing) Conclusion"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
                        
            if (isset($_POST['add_phase2_retest_conclusion_button'])) {

                $phase2RetestErrorTypeId = (isset($_REQUEST['phase2_retest_error_type'])) ? $_REQUEST['phase2_retest_error_type'] : null;
                $phase2RetestErrorClassificationId = (isset($_REQUEST['phase2_retest_error_classification'])) ? $_REQUEST['phase2_retest_error_classification'] : null;
                $phase2RetestQcReviewerComments = (isset($_REQUEST['phase2_retest_qc_reviewer_comments'])) ? $_REQUEST['phase2_retest_qc_reviewer_comments'] : null;

                $oosProcess->updateOosPhase2RetestConclusionDetails($oosObjectId, null, $phase2RetestErrorTypeId, $phase2RetestErrorClassificationId, null, null);
                $oosProcess->updateOosPhase2RetestInvestigationReviewerComments($oosObjectId, $phase2RetestQcReviewerComments, null, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-testing) QC Verification");
                
                delete_worklist($userId, $oosObjectId);
                add_worklist($qcApprover, $oosObjectId);

                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2  Re-testing Investigation Verification | [Action Required] ";
                $actionDescription = "The $documentShortName QA Reviewer has to Verify the Phase-2 (Re-testing) Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");    
            }

            $smarty->assign('enablePhase2RetestConclusionForm', true);
        }
    }

    // Enable Phase-2 Retest QC Verification Form 
    if($wfStatus == "Waiting for Phase-2(Re-testing) QC Verification"){

        if (check_user_in_workflow($oosObjectId, $userId, "Rejected", 'qc_approve') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_phase2_qc_verification_button'])) {

                $phase2RetestQcApproverComments = (isset($_REQUEST['phase2_qc_approver_comments'])) ? $_REQUEST['phase2_qc_approver_comments'] : null;

                $oosProcess->updateOosPhase2RetestInvestigationReviewerComments($oosObjectId, null, $phase2RetestQcApproverComments, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-testing) QA Verification");
                delete_worklist($userId, $oosObjectId);                
                add_worklist($qaApprover, $oosObjectId);

                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Investigation Final Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QA Approver has to Conclude the Phase-2 Re-testing Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");  
               
            }

            $smarty->assign('enablePhase2RetestQcVerificationForm', true);
        }
    }

    // Enable Phase-2 Retest QA Verification Form 
    if($wfStatus == "Waiting for Phase-2(Re-testing) QA Verification"){

        if (check_user_in_workflow($oosObjectId, $userId, "Approved", 'qa_approve') && (check_user_in_worklist($oosObjectId, $userId))) {

            if (isset($_POST['add_phase2_final_conclusion_button'])) {
                
                $phase2RetestIsAssignCauseIdentified = (isset($_REQUEST['p2_is_assign_cause_identified'])) ? $_REQUEST['p2_is_assign_cause_identified'] : null;
                $phase2RetestAssignCauseDetails = (isset($_REQUEST['p2_assign_cause_details'])) ? $_REQUEST['p2_assign_cause_details'] : null;
                $phase2RetestIsFurtherInvestigationRequired = (isset($_REQUEST['p2_is_further_invest_required'])) ? $_REQUEST['p2_is_further_invest_required'] : null;
                $phase2RetestQaApproverComments = (isset($_REQUEST['p2_qa_approver_comments'])) ? $_REQUEST['p2_qa_approver_comments'] : null;

                $oosProcess->updateOosPhase2RetestConclusionDetails($oosObjectId, null, null, null, $phase2RetestIsAssignCauseIdentified, $phase2RetestIsFurtherInvestigationRequired);
                $oosProcess->updateOosPhase2RetestAssignCauseDetails($oosObjectId, $phase2RetestAssignCauseDetails);
                
                if ($phase2RetestIsFurtherInvestigationRequired == "yes") {

                    $oosProcess->updateOosPhase2RetestValidDetails($oosObjectId, "yes");
                }

                $oosProcess->updateOosPhase2RetestInvestigationReviewerComments($oosObjectId, null, null, $phase2RetestQaApproverComments);

                if ($phase2RetestIsAssignCauseIdentified == "no" && $phase2RetestIsFurtherInvestigationRequired == "yes") {

                    $oosProcess->addOosPhase2ResampleInvestigationDetails($oosObjectId);
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-2(Re-sampling) Investigation to be Started");
                    delete_worklist($userId, $oosObjectId);                    
                    add_worklist($qcReviewer, $oosObjectId);
                    save_workflow($oosObjectId, $qcReviewer, 'Waiting', 'to_assign');
                    
                    // Audit Trial
                    $atData['Phase-2(Re-sampling) Investigation to be Started'] = array('NA', getUserName($qcReviewer), $qcReviewer . " - ". getUserName($qcReviewer));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Investigation Final Conclusion | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-2 Re-testing Investigation Concluded ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);

                } 
                
                if ($phase2RetestIsAssignCauseIdentified == "yes" || ($phase2RetestIsAssignCauseIdentified == "no" && $phase2RetestIsFurtherInvestigationRequired == "no")) {
                    
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");
                    save_workflow($oosObjectId, $qaApprover, 'Waiting', 'close_out');
                    
                     // Audit Trial
                     $atData['Waiting for Close-out'] = array('NA', getUserName($qcReviewer), $qcReviewer . " - ". getUserName($qcReviewer));
                     addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Investigation Final Conclusion | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-2 Re-testing Investigation Concluded ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }                
                 
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enablePhase2RetestFinalConclusionForm', true);
        }
    }

    // Enable Phase-2 Resampling Investigation Form 
    if($wfStatus == "Phase-2(Re-sampling) Investigation to be Started"){

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'to_assign') && check_user_in_worklist($oosObjectId, $userId)) {

            if (isset($_POST['add_phase2_resample_analyst'])) {

                $phase2ResampleCheckPointsArray = (isset($_REQUEST['phase2_resample_check_points'])) ? $_REQUEST['phase2_resample_check_points'] : null;
                $phase2ResampleAnalystArray = (isset($_REQUEST['phase2_analyst'])) ? $_REQUEST['phase2_analyst'] : null;
                $phase2ResampleDescription = (isset($_REQUEST['resampling_description'])) ? $_REQUEST['resampling_description'] : null;
                $processStageId = (isset($_REQUEST['process_stage_id'])) ? $_REQUEST['process_stage_id'] : null;
                $batchNo = (isset($_REQUEST['batch_no'])) ? $_REQUEST['batch_no'] : null;
                $arNo = (isset($_REQUEST['ar_no'])) ? $_REQUEST['ar_no'] : null;
                $quantity = (isset($_REQUEST['sample_quantity'])) ? $_REQUEST['sample_quantity'] : null;

                $oosProcess->updateOosPhase2ResampleDetails($oosObjectId, $phase2ResampleDescription, $processStageId, $batchNo, $arNo, $quantity);

                $phase2ResampleCheckPointExist = [];
                foreach($phase2ResampleCheckListDetails as $checklist){
                    array_push($phase2ResampleCheckPointExist, $checklist['checklistId']);
                }

                for ($j = 0; $j < count($phase2ResampleCheckPointsArray); $j++) {
                    if(!in_array($phase2ResampleCheckPointsArray[$j], $phase2ResampleCheckPointExist)){
                        $oosProcess->addOosChecklistDetails($oosObjectId, $phase2ResampleObjectId, $phase2ResampleCheckPointsArray[$j], $userId, $dateTime);
                    }                    
                }

                $phase2ResampleAnalystExist = [];                
                foreach($phase2ResampleAnalystDetails as $analyst){
                    array_push($phase2ResampleAnalystExist, $analyst['analystId']);                    
                }
                
                for ($i = 0; $i < count($phase2ResampleAnalystArray); $i++) {
                    if(!in_array($phase2ResampleAnalystArray[$i], $phase2ResampleAnalystExist)){
                        $oosProcess->addOosAnalystDetails($oosObjectId, $phase2ResampleObjectId, $phase2ResampleAnalystArray[$i], $userId, $dateTime);
                    }                    
                }

                header("Location:$_SERVER[REQUEST_URI]");
            }


            if (isset($_POST['assign_phase2_retest_analyst'])) {

                $phase2ResampleAnalystArray = (isset($_REQUEST['p2_rs_analyst_array'])) ? $_REQUEST['p2_rs_analyst_array'] : null;
                $phase2ResampleAnalystObjArray = (isset($_REQUEST['p2_rs_analyst_obj_array'])) ? $_REQUEST['p2_rs_analyst_obj_array'] : null;
                
                $phase2ResampleAnalystName = [];
                $phase2ResampleAnalystId = [];
                $phase2ResampleAnalystIdName = [];
                foreach($phase2ResampleAnalystDetails as $analyst){
                    array_push($phase2ResampleAnalystId, $analyst['analystId']);
                    array_push($phase2ResampleAnalystName, getUserName($analyst['analystId']));
                    array_push($phase2ResampleAnalystIdName, $analyst['analystId']. " - ". getUserName($analyst['analystId']));
                }

                for ($i = 0; $i < count($phase2ResampleAnalystObjArray); $i++) {                    
                    for ($j = 0; $j < count($oosSpecificationDetailsArray); $j++) {
                        $oosProcess->addOosSpecificationDetails($oosObjectId, $phase2ResampleObjectId, $phase2ResampleAnalystObjArray[$i], $oosSpecificationDetailsArray[$j]['objectId']);
                    }
                }

                update_workflow($oosObjectId, $userId, 'Assigned', 'to_assign');
                if ($oosProcess->isOosActionFinished($oosObjectId, "to_assign", "Assigned")) {
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-2(Re-sampling) Investigation is in Progress");
                }

                delete_worklist($userId, $oosObjectId);
                for ($i = 0; $i < count($phase2ResampleAnalystArray); $i++) {
                    add_worklist($phase2ResampleAnalystArray[$i], $oosObjectId);
                    save_workflow($oosObjectId, $phase2ResampleAnalystArray[$i], 'Waiting', '2p_resample_analyst');
                }

                
                // Audit Trial
                $atData['Assign Analyst for Phase-2 Re-sampling'] = array('NA', implode(", ", $phase2ResampleAnalystName), implode(", ", $phase2ResampleAnalystIdName));
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                // Send Mail
                $subject = "$documentShortName | $oosNo | Assign Analyst for Phase-2 Re-sampling | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer assigned Analyst for Phase-2 Re-sampling ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail($phase2ResampleAnalystId, $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");                  
            }

            $smarty->assign('phase2ResampleInvestigationAddChecklistAssignAnalystForm', true);
            $smarty->assign('processStageList', getProcessStageMasterList(null, null, 'yes'));
        }
    }

    // Enable phase-2 Resampling obtained result and remarks update From 
    if($wfStatus == "Phase-2(Re-sampling) Investigation is in Progress"){

        // if (!empty($_FILES)) {

        //     $spec_details_id = (isset($_POST['spec_details_id'])) ? $_POST['spec_details_id'] : null;
        //     $oos_process->add_attachments_in_file_array($spec_details_id, "2p_resample_analyst", $usr_id, $date_time);
        // }

        for ($i = 0; $i < count($phase2ResampleAnalystDetails); $i++) {

            if (check_user_in_workflow($oosObjectId, $userId, "Waiting", '2p_resample_analyst') && (check_user_in_worklist($oosObjectId, $userId))) {
               
                if (isset($_POST['update_phase2_resample_result_and_remarks'])) {

                    $phase2ResampleSpecificationResultObjArray = (isset($_REQUEST['phase2_retest_specification_result_obj_array'])) ? $_REQUEST['phase2_retest_specification_result_obj_array'] : null;
                    $phase2ResampleObtainedResultArray = (isset($_REQUEST['phase2_resample_obtained_result'])) ? $_REQUEST['phase2_resample_obtained_result'] : null;
                    $phase2ResampleObtainedResultRemarksArray = (isset($_REQUEST['phase2_resample_obtained_result_remarks'])) ? $_REQUEST['phase2_resample_obtained_result_remarks'] : null;

                    for ($i = 0; $i < count($phase2ResampleObtainedResultArray); $i++) {
                        $oosProcess->updateOosSpecificationResultDetails($phase2ResampleSpecificationResultObjArray[$i], $phase2ResampleObtainedResultArray[$i], $phase2ResampleObtainedResultRemarksArray[$i], $userId, $dateTime);
                    }
                    
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-2 Re-sampling Analysis | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-2 Re-sampling Analysis done by the assigned Analyst ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail($qcReviewer, $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                    header("Location:$_SERVER[REQUEST_URI]");           
                }
              

                if (isset($_POST['submit_phase2_resample_result'])) {
                   
                    // Audit Trial
                    $atData['Phase-2 Re-sampling Completed'] = array('NA', getUserName($userId), $userId . "- " . getUserName($userId));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Done');

                    update_workflow($oosObjectId, $userId, 'Done', '2p_resample_analyst');
                    delete_worklist($userId, $oosObjectId);

                    if ($oosProcess->isOosActionFinished($oosObjectId, "2p_resample_analyst", "Done")) {

                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-sampling) Updation");
                    }
                    add_worklist($qcReviewer, $oosObjectId);
                    header("Location:$_SERVER[REQUEST_URI]");
                }

                $smarty->assign('enablePhase2ResampleForm', true);
                $phase2ResampleAnalystDetailsArray = $oosProcess->getOosAnalystTestDetails($phase2ResampleObjectId, $userId);                
                $smarty->assign('phase2ResampleAnalystDetailsArray', $phase2ResampleAnalystDetailsArray);
                if ($oosProcess->IsOosObtainedResultsSaved($phase2ResampleObjectId, $userId) != false) {
                    $smarty->assign('submitPhase2ResampleResultButton', true);
                }
            }
        }
    }

    // Enable Phase-2 resample Checklist Observation Form 
    if($wfStatus == "Waiting for Phase-2(Re-sampling) Updation"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['phase2_resample_checklist_save'])) {

                $phase2ResampleCheckPointsObjArray = (isset($_REQUEST['phase2_resample_check_points_obj'])) ? $_REQUEST['phase2_resample_check_points_obj'] : null;
                $phase2ResampleYesNoNaArray = (isset($_REQUEST['phase2_resample_yes_no_na'])) ? $_REQUEST['phase2_resample_yes_no_na'] : null;
                $phase2ResampleObservationArray = (isset($_REQUEST['phase2_resample_observation'])) ? $_REQUEST['phase2_resample_observation'] : null;

                for ($j = 0; $j < count($phase2ResampleCheckPointsObjArray); $j++) {

                    $oosProcess->updateOosChecklistDetails($phase2ResampleCheckPointsObjArray[$j], $phase2ResampleYesNoNaArray[$j], $phase2ResampleObservationArray[$j], $userId, $dateTime);
                }
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-sampling Checklist Updation | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer Updated the Checklist ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]");   
            }

            if (isset($_POST['phase2_resample_checklist_completed'])) {

                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-sampling) Conclusion");

                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-sampling Investigation Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QC Reviewer has to Conclude the Phase-2 Re-sampling Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcReviewer], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]"); 
            }

            $smarty->assign('enablePhase2ResampleChecklistUpdationForm', true);
            
            if ($oosProcess->IsOosCompletedAllFieldsInChecklist($phase2ResampleObjectId, $oosObjectId) == true) {

                $smarty->assign('submitPhase2ResampleChecklistCompletedButton', true);
            }
        }
    }

    // Enable Phase-2 Resample Conclusion Form 
    if($wfStatus == "Waiting for Phase-2(Re-sampling) Conclusion"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", 'qc_review') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_phase2_resample_conclusion_button'])) {

                $phase2ResampleErrorTypeId = (isset($_REQUEST['phase2_resample_error_type'])) ? $_REQUEST['phase2_resample_error_type'] : null;
                $phase2ResampleErrorClassificationId = (isset($_REQUEST['phase2_resample_error_classification'])) ? $_REQUEST['phase2_resample_error_classification'] : null;
                $phase2ResampleQcReviewerComments = (isset($_REQUEST['phase2_resample_qc_reviewer_comments'])) ? $_REQUEST['phase2_resample_qc_reviewer_comments'] : null;


                $oosProcess->updateOosPhase2ResampleConclusionDetails($oosObjectId, $phase2ResampleErrorTypeId, $phase2ResampleErrorClassificationId, null, null);
                $oosProcess->updateOosPhase2ResampleInvestigationReviewerComments($oosObjectId, $phase2ResampleQcReviewerComments, null, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-sampling) QC Verification");
                delete_worklist($userId, $oosObjectId);                
                add_worklist($qcApprover, $oosObjectId);

                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-sampling Investigation Verification | [Action Required] ";
                $actionDescription = "The $documentShortName QC Approver has to Verify the Phase-2 (Re-sampling) Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qcApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]"); 

            }
            $smarty->assign('enablePhase2ResampleConclusionForm', true);
        }
    }

    // Enable Phase-2 Resample QC Verification Form 
    if($wfStatus == "Waiting for Phase-2(Re-sampling) QC Verification"){

        if (check_user_in_workflow($oosObjectId, $userId, "Rejected", 'qc_approve') && (check_user_in_worklist($oosObjectId, $userId))) {

            if (isset($_POST['add_phase2_resample_qc_verification_button'])) {

                $phase2ResampleQcApproverComments = (isset($_REQUEST['phase2_resample_qc_approver_comments'])) ? $_REQUEST['phase2_resample_qc_approver_comments'] : null;

                $oosProcess->updateOosPhase2ResampleInvestigationReviewerComments($oosObjectId, null, $phase2ResampleQcApproverComments, null);
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Phase-2(Re-sampling) QA Verification");
                delete_worklist($userId, $oosObjectId);                
                add_worklist($qaApprover, $oosObjectId);

                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-2 Re-sampling Investigation Final Conclusion | [Action Required] ";
                $actionDescription = "The $documentShortName QA Approver has to Conclude the Phase-2 Re-sampling Analysis ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                header("Location:$_SERVER[REQUEST_URI]"); 
                
            }

            $smarty->assign('enablePhase2ResampleQcVerificationForm', true);
        }
    }

    // Enable Phase-2 Resample QA Verification Form 
    if($wfStatus == "Waiting for Phase-2(Re-sampling) QA Verification"){

        if (check_user_in_workflow($oosObjectId, $userId, "Approved", 'qa_approve') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['add_phase2_resample_final_conclusion_button'])) {
                
                $phase2ResampleIsAssignCauseIdentified = (isset($_REQUEST['p2_is_assign_cause_identified'])) ? $_REQUEST['p2_is_assign_cause_identified'] : null;
                $phase2ResampleAssignCauseDetails = (isset($_REQUEST['p2_assign_cause_details'])) ? $_REQUEST['p2_assign_cause_details'] : null;
                $phase2ResampleIsFurtherInvestigationRequired = (isset($_REQUEST['p2_is_further_invest_required'])) ? $_REQUEST['p2_is_further_invest_required'] : null;
                $phase2ResampleQaApproverComments = (isset($_REQUEST['p2_qa_approver_comments'])) ? $_REQUEST['p2_qa_approver_comments'] : null;

                $oosProcess->updateOosPhase2ResampleConclusionDetails($oosObjectId, null, null, $phase2ResampleIsAssignCauseIdentified, $phase2ResampleIsFurtherInvestigationRequired);
                $oosProcess->updateOosPhase2ResampleAssignCauseDetails($oosObjectId, $phase2ResampleAssignCauseDetails);
                
                if ($phase2ResampleIsFurtherInvestigationRequired == "yes") {

                    $oosProcess->updateOosPhase2ResampleValidDetails($oosObjectId, "yes");
                }

                $oosProcess->updateOosPhase2ResampleInvestigationReviewerComments($oosObjectId, null, null, $phase2ResampleQaApproverComments);

                if ($phase2ResampleIsAssignCauseIdentified == "no" && $phase2ResampleIsFurtherInvestigationRequired == "yes") {

                    $oosProcess->addOosPhase3InvestigationDetails($oosObjectId);
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Phase-3 Investigation to be Started");
                    save_workflow($oosObjectId, $userId, 'Waiting', '3p_invest');
                    
                    // Audit Trial
                    $atData['Phase-3 Investigation to be Started'] = array('NA', getUserName($qaApprover), $qaApprover . " - ". getUserName($qaApprover));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Investigation Final Conclusion | [Action Required] ";
                    $actionDescription = "The $documentShortName Phase-2 Re-testing Investigation Concluded ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);

                } 
                
                if ($phase2ResampleIsAssignCauseIdentified == "yes" || ($phase2ResampleIsAssignCauseIdentified == "no" && $phase2ResampleIsFurtherInvestigationRequired == "no")) {
                    
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");
                    save_workflow($oosObjectId, $qaApprover, 'Waiting', 'close_out');
                   
                    // Audit Trial
                    $atData['Waiting for Close-out'] = array('NA', getUserName($qcApprover), $qcReviewer . " - ". getUserName($qcReviewer));
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');

                   // Send Mail
                   $subject = "$documentShortName | $oosNo | Phase-2 Re-testing Investigation Final Conclusion | [Action Required] ";
                   $actionDescription = "The $documentShortName Phase-2 Re-sampling Investigation Concluded ";
                   $mailDetails = [
                       "OOS No." => $oosNo,
                       "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                       "Sent By" => $_SESSION['full_name']
                   ];
                   send_workflow_mail([$qaApprover], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }

                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enablePhase2ResampleFinalConclusionForm', true);
        }
    }

    // Enable Phase-3 Investigation Form 
    if($wfStatus == "Phase-3 Investigation to be Started"){

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", '3p_invest') && (check_user_in_worklist($oosObjectId, $userId))) {

            if (isset($_POST['add_phase3_investigation_button'])) {
                
                $isCftReviewRequired = (isset($_REQUEST['cft_review_required'])) ? $_REQUEST['cft_review_required'] : null;
                $labInvestigationReview = (isset($_REQUEST['lab_investigation_review'])) ? $_REQUEST['lab_investigation_review'] : null;
                $manufacturingInvestigationReview = (isset($_REQUEST['manufacturing_investigation_review'])) ? $_REQUEST['manufacturing_investigation_review'] : null;
                $assignCauseDetails = (isset($_REQUEST['assign_cause_details'])) ? $_REQUEST['assign_cause_details'] : null;                
                $closureComments = (isset($_REQUEST['closure_comments'])) ? $_REQUEST['closure_comments'] : null;
                
                $oosProcess->updateOosPhase3InvestigationDetails($oosObjectId, $manufacturingInvestigationReview, $labInvestigationReview, $closureComments, $assignCauseDetails, $isCftReviewRequired, "yes");

                if ($isCftReviewRequired == "yes") {

                    update_workflow($oosObjectId, $userId, 'Done', '3p_invest');
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Sending to get CFT Comments");
                    
                    // Audit Trial
                    $atData['Phase-3 Investigation'] = array('NA', getUserName($userId), $userId . " - ". getUserName($userId));
                    addAuditTrailLog($oosObjectId, null, $atData, "Phase-3 Investigation", 'Waiting');
                }

                if ($isCftReviewRequired == "no") {

                    save_workflow($oosObjectId, $qaApprover, 'Waiting', 'close_out');
                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");
                                        
                    // Audit Trial
                    $atData['Waiting for Close-out'] = array('NA', getUserName($userId), $userId . " - ". getUserName($userId));
                    addAuditTrailLog($oosObjectId, null, $atData, "Waiting for Close-out", 'Waiting');
                }
                
                // Send Mail
                $subject = "$documentShortName | $oosNo | Phase-3 Investigation | [Action Required] ";
                $actionDescription = "The $documentShortName Phase-3 Investigation is Completed ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$userId], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);

                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enablePhase3InvestigationForm', true);
        }
    }
    
    // Enable CFT Comment Assign Form 
    if($wfStatus == "Waiting for Sending to get CFT Comments"){

        if (check_user_in_workflow($oosObjectId, $userId, "Done", '3p_invest') && (check_user_in_worklist($oosObjectId, $userId))) {

            if (isset($_POST['assign_cft_review'])) {
                
                $cftReviewUsers = (isset($_REQUEST['cft_review_to'])) ? $_REQUEST['cft_review_to'] : null;

                if ($oosProcess->updateOosWorkFlowStatus($oosObjectId, "CFT Reviewal Pending")) {

                    delete_worklist($userId, $oosObjectId);
                    $atData['sent for CFT Reviewal'] = [] ;
                    if (!empty($cftReviewUsers)) {

                        foreach (array_unique($cftReviewUsers) as $user) {                       

                            add_worklist($user, $oosObjectId);
                            save_workflow($oosObjectId, $user, 'Waiting', 'cft_review');
                            
                            // Send Mail
                            $subject = "$documentShortName | $oosNo | CFT Review | [Action Required] ";
                            $actionDescription = "The $documentShortName will be sent for CFT Reveiew ";
                            $mailDetails = [
                                "OOS No." => $oosNo,
                                "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                                "Sent By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail([$user], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);

                            // Audit Trial
                            array_push($atData['sent for CFT Reviewal'], ['NA', getUserName($user), $user . " - ". getUserName($user)])  ;
                        }
                    }
                    
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Waiting');
                }
                header("Location:$_SERVER[REQUEST_URI]"); 
            }
            
            $smarty->assign('requestCftReviewForm', true);
        }
    }

    // Enable CFT comment Form & Recall CFT Review  
    if ($wfStatus == "CFT Reviewal Pending") {

        if ((check_user_in_workflow($oosObjectId, $userId, "Waiting", 'cft_review')) && check_user_in_worklist($oosObjectId, $userId)) {

            if (isset($_POST['cft_reviewed'])) {

                $cftReviewComments = (isset($_REQUEST['review_comments'])) ? $_REQUEST['review_comments'] : null;

                $oosProcess->addOosCftReviewComments($oosObjectId, $phase3ObjectId, $cftReviewComments, $userId, $dateTime);
                update_workflow($oosObjectId, $userId, 'Reviewed', 'cft_review');
                delete_worklist($userId, $oosObjectId);
                
                // Audit Trial
                $atData['CFT Reviewed'] = array('NA', getUserName($userId), $userId . " - ". getUserName($userId));
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'CFT Reviewed');

                if ($oosProcess->isOosActionFinished($oosObjectId, "cft_review", "Reviewed")) {

                    $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");
                    add_worklist($qaApprover, $oosObjectId);
                    save_workflow($oosObjectId, $qaApprover, 'Waiting', 'close_out');
                    
                    // Send Mail
                    $subject = "$documentShortName | $oosNo | Regarding CFT Review | [Action Required] ";
                    $actionDescription = "The $documentShortName is Reveiewed ";
                    $mailDetails = [
                        "OOS No." => $oosNo,
                        "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                        "Sent By" => $_SESSION['full_name']
                    ];
                    send_workflow_mail([$user], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                }
                header("Location:$_SERVER[REQUEST_URI]"); 
            }

            $smarty->assign('enableCftReviewForm', true);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "cft-comments");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'cft-comments')); 
            $addFileAttachemnt = true; 
        }

        // Recall CFT Reviewer
        if (check_user_in_workflow($oosObjectId, $userId, "Done", '3p_invest')) {
         
            $cftList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'cft_review', 'Waiting');
                   
            // Remove
            if (isset($_POST['recall_remove'])) {

                $recallRemoveUserArray = (isset($_REQUEST['recall_remove_user'])) ? $_REQUEST['recall_remove_user'] : null;
                $recallReason = (isset($_REQUEST['recall_reason'])) ? $_REQUEST['recall_reason'] : null;

                if ($recallRemoveUserArray) {

                    foreach ($recallRemoveUserArray as $recallUser) {

                        if (check_user_in_workflow($oosObjectId, $recallUser, "Waiting", 'cft_review')) {
                            
                            delete_worklist($recallUser, $oosObjectId);
                            delete_user_workflow_action($oosObjectId, $recallUser, "Waiting", "cft_review");

                            // Audit Trail
                            $recallUserName = getFullName($recallUser);
                            $recallCftReviewerAtNew .= "\n\t\t\t" . $recallUserName;
                            $recallCftReviewerAtPost .= "\n\t\t\t$recallUser - $recallUserName";

                            // Send Mail
                            $subject = "$documentShortName | $oosNo | Recalled | [Info Mail]";
                            $actionDescription = "The $documentShortName is Recalled from QC Approve";
                            $mailDetails = [
                                "OOS No." => $oosNo,
                                "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                                "Reason for Recall" => $recallReason,
                                "Recalled By" => $_SESSION['full_name']
                            ];
                            send_workflow_mail([$recallUser], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                        }
                    }
                    // Audit Trail
                    foreach ($cftList as $cftUser) {
                        $recallCftReveiwerAtOld .= "\n\t\t\t" . $cftUser['user_name'];
                    }
                    $atData['Reason'] = array('NA', $recallReason, $recallReason);
                    $atData[''] = array("Existing User List : $recallCftReveiwerAtOld", "Recalled User List : $recallCftReviewerAtNew", $recallCftReviewerAtPost);
                    addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Succesfully Recalled');
                }

                $checkPendingCftReviewerList = get_workflow_userlist_by_objectid_action_status($oosObjectId, 'cft_review', 'Waiting');
                
                if (count($checkPendingCftReviewerList) == 0) {
                    if (is_action_finished($oosObjectId, "cft_review", "Waiting")) {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Close-out");                        
                    } else {
                        $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Waiting for Sending to get CFT Comments");                        
                    }
                    add_worklist($userId, $oosObjectId);                   
                }
                header("Location:$_SERVER[REQUEST_URI]");                                
            }

            $smarty->assign('enableRecallCftReview', true);
            $smarty->assign('recall_from', 'CFT REVIEW');
            $smarty->assign('recall_remove_option', true);            
            $smarty->assign('recall_action_user', true);
            $smarty->assign('recall_action', 'cft_review');
            $smarty->assign('recall_object_id', $ooObjectId);
            $smarty->assign('recall_pending_users_list', $cftList);
            $smarty->assign('recall_workflow_users', array_column(get_workflow_userlist_by_objectid_action($oosObjectId, 'cft_review'), 'user_id'));
        } 
    }

    // Enable Close-out Form 
    if ($wfStatus == "Waiting for Close-out") {

        if (check_user_in_workflow($oosObjectId, $userId, "Waiting", 'close_out') && (check_user_in_worklist($oosObjectId, $userId))) {
            
            if (isset($_POST['submit_close_out'])) {
                
                $impactAssessment = (isset($_REQUEST['impact_assessment'])) ? $_REQUEST['impact_assessment'] : null;
                $riskAssessment = (isset($_REQUEST['risk_assessment'])) ? $_REQUEST['risk_assessment'] : null;
                $finalCosureConclusion = (isset($_REQUEST['final_closure_conclusion'])) ? $_REQUEST['final_closure_conclusion'] : null;

                $oosProcess->updateOosCloseOutDetails($oosObjectId, $impactAssessment, $riskAssessment, $finalClosureConclusion, $dateTime);
                update_workflow($oosObjectId, $userId, 'Done', 'close_out');
                $oosProcess->updateOosWorkFlowStatus($oosObjectId, "Completed");
                delete_worklist($userId, $oosObjectId);

                // Audit Trial
                $atData['Completed by'] = array('NA', getFullName($userId), $userId . " - ". getFullName($userId));
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Done');

                // Send Mail
                $subject = "$documentShortName | $oosNo | Waiting for Close-out | [Action Required] ";
                $actionDescription = "The $documentShortName is Completed ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$userId], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                
                header("Location:$_SERVER[REQUEST_URI]");                 
            }

            $smarty->assign('enableCloseOutForm', true);
        }
    }

    // Enable Request Extension Form 
    if (($oosDetailsObj->target_date != "NULL" && $oosDetailsObj->target_date != "" && $creator == $userId && $oosDetailsObj->status != "Completed") && (date('Y-m-d') <= $oosTargetDateBefore)) {
        
        if (check_user_in_workflow($oosObjectId, $userId, "Created", 'create')) {

            if (isset($_POST['add_extension_details'])) {

                $existingTargetDate = get_modified_ymd_format($oos_master->target_date);
                $proposedTargetDate = (isset($_REQUEST['proposed_target_date'])) ? $_REQUEST['proposed_target_date'] : null;
                $reason = (isset($_REQUEST['reason'])) ? $_REQUEST['reason'] : null;
                
                $extensionObjectId = get_object_id("definitions->object_id->workflow->oos->oos_extension_details");

                $extensionObj = new DB_Public_lm_extension_details();
                $extensionObj->object_id = $extensionObjectId;
                $extensionObj->ref_object_id = $oosObjectId;
                $extensionObj->existing_target_date = $existingTargetDate;
                $extensionObj->proposed_target_date = get_modified_ymd_format($proposedTargetDate);
                $extensionObj->status = "Pending";
                $extensionObj->action_status = "Extension Request Created";
                $extensionObj->reason = $reason;
                $extensionObj->created_by = $usr_id;
                $extensionObj->created_time = $date_time;
                $extensionObj->insert();
                
                add_worklist($usr_id, $extensionObjectId);                
                save_workflow($extensionObjectId, $userId, 'Created', 'create');
               
                // Audit Trial
                $atData['Extension Request Initiated'] = array('NA', getFullName($userId), $userId . " - ". getFullName($userId));
                addAuditTrailLog($oosObjectId, null, $atData, $auditTrailAction, 'Created');

                // Send Mail
                $subject = "$documentShortName | $oosNo | Requesting Extension for Target Date | [Action Required] ";
                $actionDescription = "The $documentShortName is Waiting for Extension Request ";
                $mailDetails = [
                    "OOS No." => $oosNo,
                    "Status" => $oosProcess->getOosWorkFlowStatus($oosObjectId),
                    "Sent By" => $_SESSION['full_name']
                ];
                send_workflow_mail([$userId], $subject, $actionDescription, $mailHeading, $mailDetails, $mailLinkButton);
                
                header("Location:$_SERVER[REQUEST_URI]");  
            }

            $smarty->assign('enableTargetDateExtensionRequest', true);
            $smarty->assign('editAttachment', true);
            $smarty->assign('fileAttachmentTowards', "extension-request");   
            $smarty->assign('fileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'extension-request')); 
            $addFileAttachemnt = true;
        }
    }









    



    // Add file attachemnt in each request, if exist.
    ($addFileAttachemnt) ? $oosProcess->addOosAttachments($oosObjectId, $_POST['file_attachment_towards'], $userId, $dateTime) : false;

    // Add work flow remarks in each request, if exist.
    $workFlowRemarks = (isset($_REQUEST['wf_remarks'])) ? $_REQUEST['wf_remarks'] : null;
    ($workFlowRemarks) ? addWorkflowRemarks($oosObjectId, $workFlowRemarks, $userId, $dateTime) : false;
   
    if (!empty($allDepartmentList)) {
        $smarty->assign('allDepartmentList', $allDepartmentList);
    }
    
    $smarty->assign('oosNo', $oosNo);
    $smarty->assign('lmDocumentId', $documentId);
    $smarty->assign('initiator', getFullName($oosDetailsObj->created_by));
    $smarty->assign('department', getDepartment($oosDetailsObj->department_id));
    $smarty->assign('departmentList', getDeptList($userPlantId));
    $smarty->assign('company', getPlantName($oosDetailsObj->plant_id));
    $smarty->assign('oosDetailsObj', $oosDetailsObj);
    $smarty->assign('productName', getProductName($oosDetailsObj->product_id));
    $smarty->assign('processStage', getProcessStage($oosDetailsObj->process_stage_id));
    $smarty->assign('materialType', getMaterialType($oosDetailsObj->material_type_id));
    $smarty->assign('instrumentName', getInstrumentName($oosDetailsObj->instrument_id));
    $smarty->assign('preliminaryTestResultsArray', $preliminaryTestResultsArray);
    $smarty->assign('initiationFilesArray', $initiationFilesArray);
    $smarty->assign('worklist_pending_details', getWorklistPendingDetails($oosObjectId));
    $smarty->assign('statusDetails', get_all_workflow_actions($oosObjectId));
    $smarty->assign('workFlowRemarks', getWorkflowRemarks(null, $oosObjectId, null));
    $smarty->assign('progressBarStatusPercentage', getOOSProgressBarStatus($wfStatus));
    $smarty->assign('authorisedPlantList', getAccessRightsPlantList($oosObjectId));
    $smarty->assign('oosCheckList', getOosChecklistDetails("yes"));
    $smarty->assign('preliminaryCheckListDetails', $preliminaryChecklistDetails);
    $smarty->assign('preliminaryInvestigatioinObject', $preliminaryInvestigatioinObject);
    $smarty->assign('qcFileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qc-review')); 
    $smarty->assign('qaFileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qa-review')); 
    $smarty->assign('qcApproveFileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qc-approve')); 
    $smarty->assign('qaApproveFileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'qa-approve'));
    $smarty->assign('oosSpecificationDetailsArray', $oosSpecificationDetailsArray); 
    $smarty->assign('errorTypes', $oosProcess->getOosErrorTypeList());
    $smarty->assign('errorClassifications', $oosProcess->getOosErrorClassificationList());
        
    $smarty->assign('phase1CheckListDetails', $phase1CheckListDetails);
    $smarty->assign('phase1AnalystDetails', $phase1AnalystDetails);
    $smarty->assign('phase1StandardDeviation', $phase1StandardDeviation);
    $smarty->assign('phase1InvestigationDetailsObject', $phase1InvestigationDetailsObject);    

    $smarty->assign('phase1ManufacturingCheckListDetails', $phase1ManufacturingCheckListDetails);
    $smarty->assign('phase1ManufacturingAnalystDetails', $phase1ManufacturingAnalystDetails);
    $smarty->assign('phase1ManufacturingInvestigationDetailsObject', $phase1ManufacturingInvestigationDetailsObject);

    $smarty->assign('phase2RetestCheckListDetails', $phase2RetestCheckListDetails);
    $smarty->assign('phase2RetestAnalystDetails', $phase2RetestAnalystDetails);
    $smarty->assign('phase2RetestInvestigationDetailsObject', $phase2RetestInvestigationDetailsObject);
    $smarty->assign('phase2RetestStandardDeviation', $phase2RetestStandardDeviation);

    $smarty->assign('phase2ResampleCheckListDetails', $phase2ResampleCheckListDetails);
    $smarty->assign('phase2ResampleAnalystDetails', $phase2ResampleAnalystDetails);
    $smarty->assign('phase2ResampleDetailsObject', $phase2ResampleDetailsObject); 
    $smarty->assign('phase2ResampleStandardDeviation', $phase2ResampleStandardDeviation);
    $smarty->assign('phase2ResampleProcessingStage', getProcessStage($phase2ResampleDetailsObject->process_stage_id));
    
    $smarty->assign('phase3InvestigationDetailsObject', $phase3InvestigationDetailsObject);
    $smarty->assign('cftReviews', $cftReviews);
    $smarty->assign('cftFileObjectArray', $oosProcess->getOosDocFileObjectArray($oosObjectId, 'cft-comments'));


    
    
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_oos.oos.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
