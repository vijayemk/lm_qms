<?php

/**
 * Project: Logicmind
 * File: oos_test_details_report.file.php
 *
 * @author Jithin 
 * @since 22/01/2025
 * @package oos
 * @version 1.0
 * @see oos_test_details_report.file.php
 **/

require_once('includes/tcpdf/tcpdf.php');
require_once('lib/oos/functions/Oos_Processor.func.php');
require_once('lib/sop/functions/Sop_Processor.func.php');

$oosObj = new DB_Public_lm_oos_details();
$oosObjectId = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;

if ($oosObj->get("object_id", $oosObjectId)) {

    $createTime = date('Y-m-d G:i:s');
    $downloadUserId = $_SESSION['user_id'];
    $downloadUserDepartment = getDeptName($downloadUserId);
    $downloadUserName = getUserName($downloadUserId);
    $downloadUserFullName = getFullName($downloadUserId);
    $organisationName = getActiveOrganizationName();
    $link = $lm_contact_obj->website;
    $oosNo = $oosObj->oos_no;

    if (!empty($oosObj->target_date)) {
        $targetTate = get_modified_date_format($oosObj->target_date);
    }

    if (!empty($oosObj->final_closure_date)) {
        $finalClosureDate = get_modified_date_format($oosObj->final_closure_date);
    }
    
    $oosProcess = new Oos_Processor();

    $oosList = $oosProcess->getOosList($oosObjectId, null);

    $specificationDetailsArray = $oosProcess->getOosSpecificationDetails($oosObjectId);

    $preliminaryInvestigationObject = $oosProcess->getOosPreliminaryInvestigationDetailsObject($oosObjectId);
    $phase1InvestigationObject = $oosProcess->getOosPhase1InvestigationDetailsObject($oosObjectId);
    $ManufacturintInvestigationObject = $oosProcess->getOosManufacturingInvestigationDetailsObject($oosObjectId);
    $phase2RetestInvestigationObject = $oosProcess->getOosPhase2RetestInvestigationDetailsObject($oosObjectId);
    $phase2ResampleInvestigationObject = $oosProcess->getOosPhase2ResampleInvestigationDetailsObject($oosObjectId);
    $phase3InvestigationObject = $oosProcess->getOosPhase3InvestigationDetailsObject($oosObjectId);

    $preliminaryObjectId = $oosProcess->getOosPreliminaryReferenceId($oosObjectId);
    $phase1ObjectId = $oosProcess->getOosPhase1ObjectId($oosObjectId);
    $phase1ManufacturingObjectId = $oosProcess->getOosPhase1ManufaturingObjectId($oosObjectId);
    $phase2RetestObjectId = $oosProcess->getOosPhase2RetestObjectId($oosObjectId);
    $phase2ResampleObjectId = $oosProcess->getOosPhase2ResampleObjectId($oosObjectId);

    $preliminaryCheckLists = getOosCheckListByPhase($preliminaryObjectId);
    $phase1CheckLists = getOosCheckListByPhase($phase1ObjectId);
    $phase1ManufacturingCheckLists = getOosCheckListByPhase($phase1ManufacturingObjectId);
    $phase2RetestCheckLists = getOosCheckListByPhase($phase2RetestObjectId);
    $phase2ResampleCheckLists = getOosCheckListByPhase($phase2ResampleObjectId);

    for ($i = 0; $i < count($specificationDetailsArray); $i++) {
        $phase1TestResultArray = $oosProcess->getOosTestSpecificationResultDetails($phase1ObjectId, $specificationDetailsArray[$i]['objectId'], null);
        $phase1TestCalculationArray[] = ['testName' => $phase1TestResultArray[$i]['testName'], 'testResult' => $oosProcess->getOosTestCalculations($phase1TestResultArray)];
    }

    for ($i = 0; $i < count($specificationDetailsArray); $i++) {
        $phase2RetestResultArray = $oosProcess->getOosTestSpecificationResultDetails($phase2RetestObjectId, $specificationDetailsArray[$i]['objectId'], null);
        $phase2RetestCalculationArray[] = ['testName' => $phase2RetestResultArray[$i]['testName'], 'testResult' => $oosProcess->getOosTestCalculations($phase2RetestResultArray)];
    }

    for ($i = 0; $i < count($specificationDetailsArray); $i++) {
        $phase2ResampleResultArray = $oosProcess->getOosTestSpecificationResultDetails($phase2ResampleObjectId, $specificationDetailsArray[$i]['objectId'], null);
        $phase2ResampleCalculationArray[] = ['testName' => $phase2ResampleResultArray[$i]['testName'], 'testResult' => $oosProcess->getOosTestCalculations($phase2ResampleResultArray)];
    }

    $phase1AnalystArray = $oosProcess->getOosAnalystDetails($phase1ObjectId);
    $phase2RetestAnalystArray = $oosProcess->getOosAnalystDetails($phase2RetestObjectId);
    $phase2ResampleAnalystArray = $oosProcess->getOosAnalystDetails($phase2ResampleObjectId);

    $preliminaryTestResultArray = $oosProcess->getOosSpecificationResultDetails($preliminaryObjectId, null);
    $phase1TestResultArray = $oosProcess->getOosSpecificationResultDetails($phase1ObjectId, null);
    $phase2RetestResultArray = $oosProcess->getOosSpecificationResultDetails($phase2RetestObjectId, null);
    $phase2ResampleResultArray = $oosProcess->getOosSpecificationResultDetails($phase2ResampleObjectId, null);

    $cftReview = $oosProcess->getOosCftReviews($oosObjectId, null);

    $p1ErrorType = getErrorType($phase1InvestigationObject->error_type_id);
    $p2RetestErrorType = getErrorType($phase2RetestInvestigationObject->error_type_id);
    $p2ResampleErrorType = getErrorType($phase2ResampleInvestigationObject->error_type_id);

    $p1ErrorClassification = getErrorClass($phase1InvestigationObject->error_class_id);
    $p2RetestErrorClassification = getErrorClass($phase2RetestInvestigationObject->error_classification_id);
    $p2ResampleErrorClassification = getErrorClass($phase2ResampleInvestigationObject->error_class_id);

    $docFileProcessorObject = new Doc_File_Processor();
    $fileObjectArray = $docFileProcessorObject->getAllLmOosDocFileObjectArray($oosObjectId, null);

    if (!empty($oosList)) {
        $initiationMarkup = "";
        foreach ($oosList as $key => $value) {
            $initiationMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[oosNo]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[createdBy]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[department]</td><td width=\"180px\" style=\"border:1px solid #000000;text-align: center;\">$value[createdTime]</td></tr>";
        }
    }

    if (!empty($preliminaryTestResultArray)) {
        $preliminaryTestResultMarkup = "";
        foreach ($preliminaryTestResultArray as $key => $value) {
            $preliminaryTestResultMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[count]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: justify;\">$value[testName]</td><td width=\"140px\" style=\"border:1px solid #000000;text-align: center;\">$value[specificationLimit]</td><td width=\"140px\" style=\"border:1px solid #000000;text-align: center;\">$value[obtainedResult]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[obtainedResultRemarks]</td></tr>";
        }
    }

    if (!empty($preliminaryCheckLists)) {
        $preliminaryCheckListMarkup = "";
        foreach ($preliminaryCheckLists as $key => $value) {
            $preliminaryCheckListMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: justify;\">$value[checkPoint]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[yesNoNa]</td><td width=\"430px\" style=\"border:1px solid #000000;text-align: justify;\">$value[observation]</td></tr>";
        }
    }

    $p1CheckListMarkup = "";
    if (!empty($phase1CheckLists)) {
        foreach ($phase1CheckLists as $key => $value) {
            $p1CheckListMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: justify;\">$value[checkPoint]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[yesNoNa]</td><td width=\"430px\" style=\"border:1px solid #000000;text-align: justify;\">$value[observation]</td></tr>";
        }
    } else {
        $p1CheckListMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $p1ManufacturintCheckListMarkup = "";
    if (!empty($phase1ManufacturingCheckLists)) {
        foreach ($phase1ManufacturingCheckLists as $key => $value) {
            $p1ManufacturingCheckListMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: justify;\">$value[checkPoint]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[yesNoNa]</td><td width=\"430px\" style=\"border:1px solid #000000;text-align: justify;\">$value[observation]</td></tr>";
        }
    } else {
        $p1ManufacturingCheckListMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $p2RetestCheckListMarkup = "";
    if (!empty($phase2RetestCheckLists)) {
        foreach ($phase2RetestCheckLists as $key => $value) {
            $p2RetestCheckListMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: justify;\">$value[checkPoint]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[yesNoNa]</td><td width=\"430px\" style=\"border:1px solid #000000;text-align: justify;\">$value[observation]</td></tr>";
        }
    } else {
        $p2RetestCheckListMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $p2ResampleCheckListMarkup = "";
    if (!empty($phase2ResampleCheckLists)) {
        foreach ($phase2ResampleCheckLists as $key => $value) {
            $p2ResampleCheckListMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: justify;\">$value[checkPoint]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[yesNoNa]</td><td width=\"430px\" style=\"border:1px solid #000000;text-align: justify;\">$value[observation]</td></tr>";
        }
    } else {
        $p2ResampleCheckListMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase1Markup = "";
    if (!empty($phase1AnalystArray)) {
        foreach ($specificationDetailsArray as $key => $value) {
            $phase1Markup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: justify;font-weight:bold\">$value[testName]</td></tr>";
            foreach ($phase1AnalystArray as $key1 => $value1) {
                foreach ($value1['analystSpecResultDetails'] as $key2 => $value2) {
                    if ($value['objectId'] == $value2['spec_details_id']) {
                        $phase1Markup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value1[analystName] [$value1[analystDepartment]]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[spec_limit]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[obtained_result]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[obtained_result_remarks]</td></tr>";
                    }
                }
            }
        }
    } else {
        $phase1Markup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase2RetestMarkup = "";
    if (!empty($phase2RetestAnalystArray)) {
        foreach ($specificationDetailsArray as $key => $value) {
            $phase2RetestMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: justify;font-weight:bold\">$value[testName]</td></tr>";
            foreach ($phase2RetestAnalystArray as $key1 => $value1) {
                foreach ($value1['analystSpecResultDetails'] as $key2 => $value2) {
                    if ($value['objectId'] == $value2['spec_details_id']) {
                        $phase2RetestMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value1[analystName] [$value1[analystDepartment]]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[spec_limit]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[obtained_result]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[obtained_result_remarks]</td></tr>";
                    }
                }
            }
        }
    } else {
        $phase2RetestMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase2ResampleMarkup = "";
    if (!empty($phase2ResampleAnalystArray)) {
        foreach ($specificationDetailsArray as $key => $value) {
            $phase2ResampleMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: justify;font-weight:bold\">$value[testName]</td></tr>";
            foreach ($phase2ResampleAnalystArray as $key1 => $value1) {
                foreach ($value1['analystSpecResultDetails'] as $key2 => $value2) {
                    if ($value['objectId'] == $value2['spec_details_id']) {
                        $phase2ResampleMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value1[analystName] [$value1[analystDepartment]]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[spec_limit]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[obtained_result]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[obtained_result_remarks]</td></tr>";
                    }
                }
            }
        }
    } else {
        $phase2ResampleMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $cftReviewMarkup = "";
    if (!empty($cftReview)) {
        foreach ($cftReview as $key => $value) {
            $cftReviewMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[reviewedBy]</td><td width=\"290px\" style=\"border:1px solid #000000;text-align: justify;\">$value[comment] </td><td width=\"140px\" style=\"border:1px solid #000000;text-align: center;\">$value[department]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[dateTime]</td></tr>";
        }
    } else {
        $cftReviewMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase1StdDeviationMarkup = "";
    if (!empty($phase1TestResultArray)) {
        foreach ($phase1TestCalculationArray as $key => $value) {
            $phase1TestCalcMean = $value['testResult']['mean'];
            $phase1TestCalcStdDeviation = $value['testResult']['stdDeviation'];
            $phase1TestCalcRsdPercentage = $value['testResult']['rsdPercentage'];
            $phase1StdDeviationMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value[testName]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase1TestCalcMean</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase1TestCalcStdDeviation</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase1TestCalcRsdPercentage</td></tr>";
        }
    } else {
        $phase1StdDeviationMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase2RetestStdDeviationMarkup = "";
    if (!empty($phase2RetestResultArray)) {
        foreach ($phase2RetestCalculationArray as $key => $value) {
            $phase2RetestCalcMean = $value['testResult']['mean'];
            $phase2RetestCalcStdDeviation = $value['testResult']['stdDeviation'];
            $phase2RetestCalcRsdPercentage = $value['testResult']['rsdPercentage'];
            $phase2RetestStdDeviationMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value[testName]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase2RetestCalcMean</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase2RetestCalcStdDeviation</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase2RetestCalcRsdPercentage</td></tr>";
        }
    } else {
        $phase2RetestStdDeviationMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase2ResampleStdDeviationMarkup = "";
    if (!empty($phase2ResampleResultArray)) {
        foreach ($phase2ResampleCalculationArray as $key => $value) {
            $phase2ResampleCalcMean = $value['testResult']['mean'];
            $phase2ResampleCalcStdDeviation = $value['testResult']['stdDeviation'];
            $phase2ResampleCalcRsdPercentage = $value['testResult']['rsdPercentage'];
            $phase2ResampleStdDeviationMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value[testName]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase2ResampleCalcMean</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase2ResampleCalcStdDeviation</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$phase2ResampleCalcRsdPercentage</td></tr>";
        }
    } else {
        $phase2ResampleStdDeviationMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase1FileMarkup = "";
    if (!empty($phase1AnalystArray)) {
        foreach ($phase1AnalystArray as $key => $value) {
            foreach ($value['analyst_spec_result_details'] as $key1 => $value1) {
                foreach ($value1['p1_fileobjectarray'] as $key2 => $value2) {
                    $phase1FileMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[name]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[attached_by]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[attached_date]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[type]</td></tr>";
                }
            }
        }
    } else {
        $phase1FileMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase2RetestFileMarkup = "";
    if (!empty($phase2RetestAnalystArray)) {
        foreach ($phase2RetestAnalystArray as $key => $value) {
            foreach ($value['analyst_spec_result_details'] as $key1 => $value1) {
                foreach ($value1['p2_rt_fileobjectarray'] as $key2 => $value2) {
                    $phase2RetestFileMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[name]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[attached_by]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[attached_date]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[type]</td></tr>";
                }
            }
        }
    } else {
        $phase2RetestFileMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $phase2ResampleFileMarkup = "";
    if (!empty($phase2ResampleAnalystArray)) {
        foreach ($phase2ResampleAnalystArray as $key => $value) {
            foreach ($value['analyst_spec_result_details'] as $key1 => $value1) {
                foreach ($value1['p2_rs_fileobjectarray'] as $key2 => $value2) {
                    $phase2ResampleFileMarkup .= "<tr><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[name]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[attached_by]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: center;\">$value2[attached_date]</td><td width=\"195px\" style=\"border:1px solid #000000;text-align: justify;\">$value2[type]</td></tr>";
                }
            }
        }
    } else {
        $phase2ResampleFileMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $creator = $oosProcess->getOosDigitalSignByUserActions($oosObjectId, "create", "Created");
    $creatorName = getFullName($creator[0]);
    $creatorDepartment = getDeptName($creator[0]);
    $creatorDesignation = getDesignationByUserId($creator[0]);
    $createdTime = $creator[1];

    $qcReviewer = $oosProcess->getOosDigitalSignByUserActions($oosObjectId, "qc_review", "Reviewed");
    $qcReviewerName = getFullName($qcReviewer[0]);
    $qcReviewerDepartment = getDeptName($qcReviewer[0]);
    $qcReviewerDesignation = getDesignationByUserId($qcReviewer[0]);
    $qcReviewedTime = $qcReviewer[1];

    $qaReviewer = $oosProcess->getOosDigitalSignByUserActions($oosObjectId, "qa_review", "Reviewed");
    $qaReviewerName = getFullName($qaReviewer[0]);
    $qaReviewerDepartment = getDeptName($qaReviewer[0]);
    $qaReviewerDesignation = getDesignationByUserId($qaReviewer[0]);
    $qaReviewedTime = $qaReviewer[1];

    $qcApprover = $oosProcess->getOosDigitalSignByUserActions($oosObjectId, "qc_approve", "Approved");
    $qcApproverName = getFullName($qcApprover[0]);
    $qcApproverDepartment = getDeptName($qcApprover[0]);
    $qcApproverDesignation = getDesignationByUserId($qcApprover[0]);
    $qcApprovedTime = $qcApprover[1];

    $qaApprover = $oosProcess->getOosDigitalSignByUserActions($oosObjectId, "qa_approve", "Approved");
    $qaApproverName = getFullName($qaApprover[0]);
    $qaApproverDepartment = getDeptName($qaApprover[0]);
    $qaApproverDesignation = getDesignationByUserId($qaApprover[0]);
    $qaApprovedTime = $qaApprover[1];

    $p1ManufacturingAnalyst = $oosProcess->getOosDigitalSignByUserActions($oosObjectId, "1p_mfg_invest", "Done");
    $p1ManufacturingAnalystName = getFullName($p1ManufacturingAnalyst[0]);
    $p1ManufacturingAnalystDepartment = getDeptName($p1ManufacturingAnalyst[0]);
    $p1ManufacturingAnalystDesignation = getDesignationByUserId($p1ManufacturingAnalyst[0]);
    $p1ManufacturingAnalystTime = $p1ManufacturingAnalyst[1];

    class OOS_PDF extends TCPDF
    {
        //Page header
        public function Header()
        {
            $hstyle = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
            $this->Rect(15, 8, 220, 25, 'D', array('all' => $hstyle));

            $image_file = _URL_ . "img/mrm_report_logo.jpg";
            $this->Image($image_file, 18, 11, 25, 17, 'JPEG', $GLOBALS['link'], 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Ln(7);
            // Position at 20 mm from top
            $this->SetY(20);
            // Set font
            $this->SetFont('arial', 'B', 10);
            // Title
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 0, 'REPORT - TEST DETAILS', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(10);
        }
        // Page footer
        public function Footer()
        {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('arial', '', 10, true);
            $this->SetTextColor(0, 0, 0);

            // Page number
            $this->SetTextColor(0, 0, 0);
            $this->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
            $this->Line(15, 337, 235, 337, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
            $this->Cell(238, 5, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
            $this->Ln();

            // Download By
            $this->SetFont('Arial', 'B', 8);
            $this->SetTextColor(255, 195, 195);
            $this->Rotate(0, 200, 200);
            $this->Rotate(0);
            $this->Text(15, 340, "Downloaded By [$GLOBALS[downloadUserFullName]] [$GLOBALS[downloadUserDepartment]] [$GLOBALS[createTime]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'M', FALSE);

            $this->SetFont('Arial', 'B', 8);
            $this->SetTextColor(0, 0, 0);
            $this->Rotate(0, 0, 0);
            $this->Rotate(0);
            $this->Text(15, 340, $GLOBALS['oosNo'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'M', FALSE);
            $this->Ln();

            $image_file = _URL_ . "img/logo_pdf.jpg";
            $this->Image($image_file, 215, 346, 20, 0, 'jpg', $GLOBALS['link'], 'T', false, 300, '', false, false, 0, false, false, false);

            $this->SetFont('Arial', '', 6);
            $this->SetTextColor(0, 0, 0);
            $this->Rotate(0, 200, 200);
            $this->Rotate(0);
            $this->Text(15, 346, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[organisationName]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'M', FALSE);
            $this->Ln();
        }
    }
    // create new PDF document
    $pdf = new OOS_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetProtection($permissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass = '', $owner_pass = "", 0, null);

    // set document information
    $pdf->SetCreator("LogicMind");
    $pdf->SetAuthor('Logicmind');
    $pdf->SetTitle('LogicMind Solutions PDF');
    $pdf->SetSubject('OOS Test Details Report');
    $pdf->SetKeywords('OOS Test Details Report');

    // set margins
    //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
    //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // add a page
    $pdf->AddPage('P', 'B4');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $my_tbl = <<<EODMARKETING
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>OOS No.</b></td>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Initiator</b></td>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Department</b></td>
                    <td align="center" width="180px" style="border:1px solid #000000;"><b>Initiation Date</b></td>
                </tr>
            </thead>
            {$initiationMarkup}
        </table>
    EODMARKETING;

    if (isset($initiationMarkup)) {
        $pdf->writeHTML($my_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    foreach ($oos_list as $key => $value) {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('arial', '', 10);
        $mcc_tbl = <<<EODPDROS
            <table cellspacing="0" cellpadding="7" border="0">
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 1 (A) : BASIC DETAILS </b></td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Date of Occurrence</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[dateOfOccurrence]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Reporting Date</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[reportingDate]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Specification No.</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[specificationNo]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Test Procedure No.</b></td>
                    <td align="justify" width="580px" style="border:1px solid #000000;">$value[testProcedureNo]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>A.R. No.</b></td>
                    <td align="justify" width="580px" style="border:1px solid #000000;">$value[arNo]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Material Type</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[materialType]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Material Name</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[materialName]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Product Name</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[productName]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Process Stage</b></td>
                    <td  width="580px" style="border:1px solid #000000;">$value[processStage]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Manufacturing Date</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[manufacturingDate]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Expiry Date</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[expiryDate]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Batch No.</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[batchNo]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Lot No.</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[lotNo]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Batch Size</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[batchSize]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Sample Quantity</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[quantity]</td>
                </tr>
                    <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Instrument / Equipment Name</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[instrumentEquipmentName]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Calibrated On</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[calibratedOn]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Next Calibration Date</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[nextCalibrationDate]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Reference Test Protocol</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[refTestProtocol]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Time Point</b></td>
                    <td align="justify"  width="580px" style="border:1px solid #000000;">$value[timePoint]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Storage Condition</b></td>
                    <td align="justify" width="580px" style="border:1px solid #000000;">$value[storageCondition]</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Target Date</b></td>
                    <td align="justify" width="580px" style="border:1px solid #000000;">$targetTate</td>
                </tr>
                <tr>
                    <td align="left" width="200px" style="border:1px solid #000000;"><b>Description</b></td>
                    <td align="justify" width="580px" style="border:1px solid #000000;">$value[description]</td>
                </tr>
                    <tr>
                    <td rowspan="2" width="200px" style="border:1px solid #000000; text-align:center; line-height:50px;"><b>Initiated By</b></td>
                    <td width="150px" style="border:1px solid #000000;"><b>Name</b></td>
                    <td width="140px" style="border:1px solid #000000;"><b>Designation</b></td>
                    <td width="140px" style="border:1px solid #000000;"><b>Department</b></td>
                    <td width="150px" style="border:1px solid #000000;"><b>Date & Time</b></td>
                </tr>
                <tr>
                    <td width="150px" style="border:1px solid #000000;">$creatorName</td>
                    <td width="140px" style="border:1px solid #000000;">$creatorDesignation</td>
                    <td width="140px" style="border:1px solid #000000;">$creatorDepartment</td>
                    <td width="150px" style="border:1px solid #000000;">$createdTime</td>
                </tr>
            </table>
        EODPDROS;
        $pdf->writeHTML($mcc_tbl, true, false, false, false, '');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
    }

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $my_initial_tbl = <<<EODOOS
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 1 (B) : INITIAL ANALYSIS DETAILS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>S.No.</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Test Name</b></td>
                    <td align="center" width="140px" style="border:1px solid #000000;"><b>Specification Limit</b></td>
                    <td align="center" width="140px" style="border:1px solid #000000;"><b>Obtained Result</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Remarks</b></td>
                </tr>
            </thead>
            {$preliminaryTestResultMarkup}
            <tr>
                <td rowspan="2" width="200px" style="border:1px solid #000000; text-align:center; line-height:50px;"><b>Analysed By</b></td>
                <td width="150px" style="border:1px solid #000000;"><b>Name</b></td>
                <td width="140px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td width="140px" style="border:1px solid #000000;"><b>Department</b></td>
                <td width="150px" style="border:1px solid #000000;"><b>Date & Time</b></td>
            </tr>
            <tr>
                <td width="150px" style="border:1px solid #000000;">$creatorName</td>
                <td width="140px" style="border:1px solid #000000;">$creatorDesignation</td>
                <td width="140px" style="border:1px solid #000000;">$creatorDepartment</td>
                <td width="150px" style="border:1px solid #000000;">$createdTime</td>
            </tr>
        </table>
    EODOOS;

    if (isset($preliminaryTestResultMarkup)) {
        $pdf->writeHTML($my_initial_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $myipy_tbl = <<<EODOOIP
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 2 (A) : PRELIMINARY CHECKLIST VERIFICATION DETAILS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Check Point</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Yes / No / NA</b></td>
                    <td align="center" width="430px" style="border:1px solid #000000;"><b>Observation</b></td>
                </tr>
            </thead>
            {$preliminaryTestResultMarkup}
        </table>
    EODOOIP;

    if (isset($preliminaryTestResultMarkup)) {
        $pdf->writeHTML($myipy_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mcmmd_tbl = <<<EODPDKRR
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 2 (B) : PRELIMINARY INVESTIGATION CONCLUSION </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Preliminary Investigation</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$preliminaryInvestigationObject->initial_investigation</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Investigation Conclusion</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$preliminaryInvestigationObject->initial_investigation_conclusion</td>
            </tr>
        </table>
    EODPDKRR;
    $pdf->writeHTML($mcmmd_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mcmm_tbl = <<<EODPDRR
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 3 : QC REVIEW DETAILS </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Assignable Cause Identified?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$preliminaryInvestigationObject->is_assign_cause_identified</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Assignable Cause Details</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$preliminaryAssignCauseDetails</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Further Investigation Required?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$preliminaryInvestigationObject->is_further_invest_required</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is OOS Valid?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$preliminaryInvestigationObject->is_oos_valid</td>
            </tr>
            <tr>
                <td rowspan="2" width="200px" style="border:1px solid #000000; text-align:center; line-height:50px;"><b>Reviewed By</b></td>
                <td width="150px" style="border:1px solid #000000;"><b>Name</b></td>
                <td width="140px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td width="140px" style="border:1px solid #000000;"><b>Department</b></td>
                <td width="150px" style="border:1px solid #000000;"><b>Date & Time</b></td>
            </tr>
            <tr>
                <td width="150px" style="border:1px solid #000000;">$qcReviewerName</td>
                <td width="140px" style="border:1px solid #000000;">$qcReviewerDesignation</td>
                <td width="140px" style="border:1px solid #000000;">$qcReviewerDepartment</td>
                <td width="150px" style="border:1px solid #000000;">$qcReviewedTime</td>
            </tr>
        </table>
    EODPDRR;
    $pdf->writeHTML($mcmm_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mc_tbl = <<<EODPDQA
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 4 : QA APPROVAL DETAILS </b></td>
            </tr>            
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Manufacturing Investigation Required?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$oosObj->is_1phase_mfg_invest_required</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is CAPA Required?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$oosObj->is_capa_required</td>
            </tr>
            <tr>
                <td rowspan="2" width="200px" style="border:1px solid #000000;text-align:center;line-height: 50px;"><b>Approved By</b></td>
                <td width="150px" style="border:1px solid #000000;"><b>Name</b></td>
                <td width="140px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td width="140px" style="border:1px solid #000000;"><b>Department</b></td>
                <td width="150px" style="border:1px solid #000000;"><b>Date & Time</b></td>
            </tr>
            <tr>
                <td width="150px" style="border:1px solid #000000;">$qaApproverName</td>
                <td width="140px" style="border:1px solid #000000;">$qaApproverDesignation</td>
                <td width="140px" style="border:1px solid #000000;">$qaApproverDepartment</td>
                <td width="150px" style="border:1px solid #000000;">$qaApprovedTime</td>
            </tr>
        </table>
    EODPDQA;
    $pdf->writeHTML($mc_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $myy_tbl = <<<EODOOSS
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 5 (A) : PHASE-1 CHECKLIST VERIFICATION DETAILS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Check Point</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Yes / No / NA</b></td>
                    <td align="center" width="430px" style="border:1px solid #000000;"><b>Observation</b></td>
                </tr>
            </thead>
            {$p1CheckListMarkup}
        </table>
    EODOOSS;

    if (isset($p1CheckListMarkup)) {
        $pdf->writeHTML($myy_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p1_analyst_tbl = <<<EODOOSSMFG
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 5 (B) : PHASE-1 (RE-TESTING) RESULTS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Analyst Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Specification Limit</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Obtained Result</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Remarks</b></td>
                </tr>
            </thead>
            {$phase1Markup}
        </table>
    EODOOSSMFG;

    if (isset($phase1Markup)) {
        $pdf->writeHTML($p1_analyst_tbl, true, false, false, false, '');
    }

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $attach_tbl1 = <<<EODMARKETTTING
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>ATTACHMENTS (Supporting Documents)</b></td>
                </tr>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>File Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Attached By</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Attached Date</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Type</b></td>
                </tr>
            </thead>
            {$phase1FileMarkup}
        </table>
    EODMARKETTTING;
    $pdf->writeHTML($attach_tbl1, true, false, false, false, '');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p1std_dev_tbl = <<<EODPSTD
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>STANDARD DEVIATION</b></td>
                </tr>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Test Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Mean (μ)</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Standard Deviation (σ)</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>RSD (%)</b></td>
                </tr>
            </thead>
            {$phase1StdDeviationMarkup}
        </table>
    EODPSTD;
    $pdf->writeHTML($p1std_dev_tbl, true, false, false, false, '');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $myy_mfg_tbl = <<<EODOOSSMFGCHECK
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 6 (A) : MANUFACTURING INVESTIGATION  CHECKLIST  VERIFICATION DETAILS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Check Point</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Yes / No / NA</b></td>
                    <td align="center" width="430px" style="border:1px solid #000000;"><b>Observation</b></td>
                </tr>
            </thead>
            {$p1ManufacturingCheckListMarkup}
            <tr>
                <td rowspan="2"  width="200px"  style="border:1px solid #000000;text-align:center;line-height: 50px;"><b>Investigated By</b></td>
                <td  width="150px" style="border:1px solid #000000;"><b>Name</b></td>
                <td  width="140px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td  width="140px" style="border:1px solid #000000;"><b>Department</b></td>
                <td  width="150px" style="border:1px solid #000000;"><b>Date & Time</b></td>
            </tr>
            <tr>
                <td  width="150px" style="border:1px solid #000000;">$p1ManufacturingAnalystName</td>
                <td  width="140px" style="border:1px solid #000000;">$p1ManufacturingAnalystDesignation</td>
                <td  width="140px" style="border:1px solid #000000;">$p1ManufacturingAnalystDepartment</td>
                <td  width="150px" style="border:1px solid #000000;">$p1ManufacturingAnalystTime</td>
            </tr> 
        </table>
    EODOOSSMFGCHECK;

    if (isset($p1ManufacturingCheckListMarkup)) {
        $pdf->writeHTML($myy_mfg_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mc_manu_tbl = <<<EODPD
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 6 (B) : MANUFACTURING INVESTIGATION DETAILS </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Manufacturing Investigation Details</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$ManufacturintInvestigationObject->details</td>
            </tr>
        </table>
    EODPD;
    $pdf->writeHTML($mc_manu_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p1_conclusion_tbl = <<<EODP1FINAL
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 7 : PHASE-1 CONCLUSION DETAILS </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Error Type</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$p1ErrorType</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Error Class</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$p1ErrorClassification</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Assignable Cause Identified?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1InvestigationObject->is_assign_cause_identified</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Assignable Cause Details</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1AssignCauseDetails</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is OOS Valid?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1InvestigationObject->is_oos_valid</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Further Investigation Required?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1InvestigationObject->is_further_invest_required</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QC Reviewer Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1InvestigationObject->qc_reviewer_comments</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QC Approver Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1InvestigationObject->qc_approver_comments</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QA Approver Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase1InvestigationObject->qa_approver_comments</td>
            </tr>
        </table>
    EODP1FINAL;

    $pdf->writeHTML($p1_conclusion_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $myyrt_tbl = <<<EODOOSSRT
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 8 (A) : PHASE-2 (RE-TESTING) CHECKLIST VERIFICATION DETAILS (Hypothetical Testing) </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Check Point</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Yes / No / NA</b></td>
                    <td align="center" width="430px" style="border:1px solid #000000;"><b>Observation</b></td>
                </tr>
            </thead>
            {$p2RetestCheckListMarkup}
        </table>
    EODOOSSRT;

    if (isset($p2RetestCheckListMarkup)) {
        $pdf->writeHTML($myyrt_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p2_rt_analyst_tbl = <<<EODOORTMFG
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 8 (B) : PHASE-2 (RE-TESTING) RESULTS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Analyst Name</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Test Name</b></td>
                    <td align="center" width="140px" style="border:1px solid #000000;"><b>Specification Limit</b></td>
                    <td align="center" width="140px" style="border:1px solid #000000;"><b>Obtained Result</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Remarks</b></td>
                </tr>
            </thead>
            {$phase2RetestMarkup}
        </table>
    EODOORTMFG;

    if (isset($phase2RetestMarkup)) {
        $pdf->writeHTML($p2_rt_analyst_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $attach_tbl2 = <<<EODMARKETTING
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>ATTACHMENTS (Supporting Documents)</b></td>
                </tr>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>File Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Attached By</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Attached Date</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Type</b></td>
                </tr>
            </thead>
            {$phase2RetestFileMarkup}
        </table>
    EODMARKETTING;
    $pdf->writeHTML($attach_tbl2, true, false, false, false, '');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p2_rt_std_dev_tbl = <<<EODPRTSTD
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>STANDARD DEVIATION</b></td>
                </tr>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Test Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Mean (μ)</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Standard Deviation (σ)</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>RSD (%)</b></td>
                </tr>
            </thead>
            {$phase2RetestStdDeviationMarkup}
        </table>
    EODPRTSTD;
    $pdf->writeHTML($p2_rt_std_dev_tbl, true, false, false, false, '');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mcfinal_rt_tbl = <<<EODPDQAART
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 9 : PHASE-2 (RE-TESTING) CONCLUSION DETAILS </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Retesting Description</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->retesting_description</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Error Type</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$p2RetestErrorType</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Error Class</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$p2RetestErrorClassification</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is OOS Valid?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->is_oos_valid</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Assignable Cause Identified?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->is_assign_cause_identified</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Assignable Cause Details</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestAssignCauseDetails</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Further Investigation Required?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->is_further_invest_required</td>
            </tr>
             <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QC Reviewer Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->qc_reviewer_comments</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QC Approver Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->qc_approver_comments</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QA Approver Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->qa_approver_comments</td>
           </tr>
        </table>
    EODPDQAART;
    $pdf->writeHTML($mcfinal_rt_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $myyrs_tbl = <<<EODOOSSRS
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 10 (A) : PHASE-2 (RE-SAMPLING) CHECKLIST VERIFICATION DETAILS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Check Point</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Yes / No / NA</b></td>
                    <td align="center" width="430px" style="border:1px solid #000000;"><b>Observation</b></td>
                </tr>
            </thead>
            {$phase2ResampleCheckLists}
        </table>
    EODOOSSRS;
    if (isset($phase2ResampleCheckLists)) {
        $pdf->writeHTML($myyrs_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p2_rs_analyst_tbl = <<<EODOORSMFG
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 10 (B) : PHASE-2 (RE-SAMPLING) RESULTS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Analyst Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Specification Limit</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Obtained Result</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Remarks</b></td>
                </tr>
            </thead>
            {$phase2ResampleMarkup}
        </table>
    EODOORSMFG;

    if (isset($phase2ResampleMarkup)) {
        $pdf->writeHTML($p2_rs_analyst_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $attach_tbl3 = <<<EODMARKTING
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>ATTACHMENTS (Supporting Documents)</b></td>
                </tr>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>File Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Attached By</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Attached Date</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Type</b></td>
                </tr>
            </thead>
            {$phase2ResampleFileMarkup}
        </table>
    EODMARKTING;
    $pdf->writeHTML($attach_tbl3, true, false, false, false, '');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $p2_rs_std_dev_tbl = <<<EODPRSSTD
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>STANDARD DEVIATION</b></td>
                </tr>
                <tr>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Test Name</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Mean (μ)</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>Standard Deviation (σ)</b></td>
                    <td align="center" width="195px" style="border:1px solid #000000;"><b>RSD (%)</b></td>
                </tr>
            </thead>
            {$phase2ResampleStdDeviationMarkup}
        </table>
    EODPRSSTD;
    $pdf->writeHTML($p2_rs_std_dev_tbl, true, false, false, false, '');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mcfinal_rs_tbl = <<<EODPDQAARS
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 11 : PHASE-2 (RE-SAMPLING) CONCLUSION DETAILS </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Resampling Description</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->resampling_description</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Processing Stage</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RsampleProcessingStage</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Batch No.</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->batch_no</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>AR No.</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->ar_no</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Quantity</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->quantity</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Error Type</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$p2ResampleErrorType</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Error Class</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$p2ResampleErrorClassification</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is OOS Valid?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->is_oos_valid</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Assignable Cause Identified?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->is_assign_cause_identified</td>
            </tr>
             <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Assignable Cause Details</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleAssignCauseDetails</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is Further Investigation Required?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->is_further_invest_required</td>
            </tr>          
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QC Reviewer Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2RetestInvestigationObject->qc_reviewer_comments</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QC Approver Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->qc_approver_comments</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>QA Approver Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase2ResampleInvestigationObject->qa_approver_comments</td>
           </tr>
        </table>
    EODPDQAARS;
    $pdf->writeHTML($mcfinal_rs_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $cft_review_tbl = <<<EODCFT
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 12 : CFT COMMENTS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>User Name</b></td>
                    <td align="center" width="290px" style="border:1px solid #000000;"><b>Comments</b></td>
                    <td align="center" width="140px" style="border:1px solid #000000;"><b>Department</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b> Date</b></td>
                </tr>
            </thead>
            {$cftReviewMarkup}
        </table>
    EODCFT;

    if (isset($cftReviewMarkup)) {
        $pdf->writeHTML($cft_review_tbl, true, false, false, false, '');
    } else {
        $pdf->Ln();
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(220, 5, "CFT  Review details not available", 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();
        $pdf->Ln();
    }

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $mcp3_tbl = <<<EODPDQAPHASE
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 13 : PHASE-3 INVESTIGATION DETAILS </b></td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Review of Lab Investigation</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase3LabInvestigationReview</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Review of Manufacturing Investigation</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase3ManufacturingInvestigationReview</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Is OOS Valid?</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase3IsOosValid</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Assignable Cause Details</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase3AssignCauseDetails</td>
            </tr>
            <tr>
                <td align="left" width="200px" style="border:1px solid #000000;"><b>Closure Comments</b></td>
                <td align="justify" width="580px" style="border:1px solid #000000;">$phase3FinalClosureComments</td>
           </tr>
        </table>
    EODPDQAPHASE;
    $pdf->writeHTML($mcp3_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('arial', 'B', 7, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(225, 5, "\n\n------------END OF DOCUMENT------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    ob_end_clean();
    //Close and output PDF document
    $pdf->Output("OOS Test Details.pdf", 'I');
    //============================================================+
    // END OF FILE
    //============================================================+
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
