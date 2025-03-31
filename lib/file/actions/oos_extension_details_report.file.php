<?php

/**
 * Project: Logicmind
 * File: oos_final_report.file.php
 *
 * @author Jithin 
 * @since 22/01/2025
 * @package oos
 * @version 1.0
 * @see oos_final_report.file.php
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
    
    $oosProcess = new Oos_Processor();
    
    $docFileProcessorObject = new Doc_File_Processor();
    $fileObjectArray = $docFileProcessorObject->getAllLmOosDocfileObjectArray($oosObjectId, "extension-request");

    $oosList = $oosProcess->getOosList($oosObjectId, null);

    $extensionDetails = $oosProcess->getOosInterimExtensionDetails($oosObjectId);

    if (!empty($oosList)) {
        $initiationMarkup = "";
        foreach ($oosList as $key => $value) {
            $initiationMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[oosNo]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[createdBy]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[department]</td><td width=\"180px\" style=\"border:1px solid #000000;text-align: center;\">$value[createdTime]</td></tr>";
        }
    }

    $extensionMarkup = "";
    if (!empty($extensionDetails)) {
        foreach ($extensionDetails as $key => $value) {
            $extensionMarkup .= "<tr><td width=\"50px\" style=\"border:1px solid #000000;text-align: center;\">$value[count]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[existing_target_date]</td><td width=\"150px\" style=\"border:1px solid #000000;text-align: center;\">$value[proposed_target_date]</td><td width=\"190px\" style=\"border:1px solid #000000;text-align: center;\">$value[status]</td><td width=\"240px\" style=\"border:1px solid #000000;text-align: center;\">$value[action_status]</td></tr>";
        }
    } else {
        $extensionMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    $fileMarkup = "";
    if (isset($fileObjectArray)) {
        foreach ($fileObjectArray as $key => $value) {
            $fileMarkup .= "<tr><td width=\"200px\" style=\"border:1px solid #000000;text-align: justify;\">$value[name]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[file_type]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[attached_by]</td><td width=\"180px\" style=\"border:1px solid #000000;text-align: center;\">$value[attached_date]</td></tr>";
        }
    } else {
        $fileMarkup .= "<tr><td colspan = \"5\" width=\"780px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
    }

    

    // Extend the TCPDF class to create custom Header and Footer
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
            $this->Cell(0, 0, 'REPORT - INTERIM EXTENSION REQUEST', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
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
    $pdf->SetSubject('Extension Request Details Report');
    $pdf->SetKeywords('Extension Request Details Report');

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
    $my_tbl = <<<OOSDETAILS
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
    OOSDETAILS;
    
    if (isset($initiationMarkup)) {
        $pdf->writeHTML($my_tbl, true, false, false, false, '');
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    foreach ($oosList as $key => $value) {
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
    $dmss_ob_tbl = <<<EODMARKETT
        <table cellspacing="0" cellpadding="7" border="0">
            <tr>
                <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 2 : EXTENSION REQUEST DETAILS </b></td>
            </tr>
            <thead>
                <tr>
                    <td align="center" width="50px" style="border:1px solid #000000;"><b>S.No.</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Existing Target Date</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Proposed Target Date</b></td>
                    <td align="center" width="190px" style="border:1px solid #000000;"><b>Status</b></td>
                    <td align="center" width="240px" style="border:1px solid #000000;"><b>Action Status</b></td>
                </tr>
            </thead>
             {$extensionMarkup}
        </table>
    EODMARKETT;
    $pdf->writeHTML($dmss_ob_tbl, true, false, false, false, '');


    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $attach_tbl = <<<EODMARKETING
        <table cellspacing="0" cellpadding="7" border="0">
            <thead>
                <tr>
                    <td align="center" width="780px" style="border:1px solid #000000;"><b>SECTION - 3 : ATTACHMENTS (Supporting Documents) </b></td>
                </tr>
                <tr>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>File Name</b></td>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Type</b></td>
                    <td align="center" width="200px" style="border:1px solid #000000;"><b>Attached By</b></td>
                    <td align="center" width="180px" style="border:1px solid #000000;"><b>Attached Date</b></td>
                </tr>
            </thead>
            {$fileMarkup}
        </table>
    EODMARKETING;
    $pdf->writeHTML($attach_tbl, true, false, false, false, '');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();


    $pdf->SetFont('arial', 'B', 7, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(225, 5, "\n\n------------END OF DOCUMENT------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    ob_end_clean();
    //Close and output PDF document
    $pdf->Output("OOS Interim Extension Details.pdf", 'I');
    //============================================================+
    // END OF FILE
    //============================================================+
} else {
    $error_handler->raiseError("INVALID REQUEST");
}