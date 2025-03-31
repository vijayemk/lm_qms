<?php

/**
 * Project:     Logicmind
 * File:        view_sop_training_file.file.php

 * @author Ananthakumar .V
 * @since 08/06/2017
 * @package file
 * @version 1.0
 */
require_once('includes/tcpdf/tcpdf.php');
require_once ('lib/sop/functions/Sop_Processor.func.php');
$sop_process = new Sop_Processor();
$createtime = date('Y-m-d G:i:s');
$download_usr_id = $_SESSION['user_id'];
$download_usr_dept = getDeptName($download_usr_id);
$download_usr_name = getUserName($download_usr_id);
$download_usr_full_name = getFullName($download_usr_id);
$dept_id = getDeptId($download_usr_id);

$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$meeting_obj = new DB_Public_lm_sop_meeting_schedule();
if ($meeting_obj->get("sop_object_id", $sop_object_id)) {
    $sop_no = $sop_process->get_sop_no($sop_object_id);
    if ($meeting_obj->is_training_required == "yes") {
        $sop_training_details = $sop_process->get_sop_training_details($sop_object_id, 'yes', null);
        $sop_trainees_details = $sop_process->get_sop_trainees_list($sop_object_id);
        $sop_nah_trainees_details = $sop_process->get_sop_nah_trainees_list($sop_object_id);

        /** Department Restriction */
        if (!check_doc_dept_access($sop_object_id, $dept_id, 'yes')) {
            $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
        }

        if (!empty($sop_training_details)) {
            $training_markup = "";
            foreach ($sop_training_details as $key => $value) {
                $training_markup .= "<tr><td width=\"40px\" style=\"border:1px solid #000000;\">$value[count]</td><td width=\"120px\" style=\"border:1px solid #000000;\">$value[training_date]</td><td width=\"150px\" style=\"border:1px solid #000000;\">$value[trainer]</td><td width=\"115px\" style=\"border:1px solid #000000;\">$value[trainer_dept]</td><td width=\"115px\" style=\"border:1px solid #000000;\">$value[training_venue]</td><td width=\"115px\" style=\"border:1px solid #000000;\">$value[status]</td></tr>";
            }
        }
        if (!empty($sop_trainees_details)) {
            $trainees_list_markup = "";
            foreach ($sop_trainees_details as $key => $value) {
                $trainees_list_markup .= "<tr><td width=\"40px\" style=\"border:1px solid #000000;\">$value[count]</td><td width=\"320px\" style=\"border:1px solid #000000;\">$value[trainee_name]</td><td width=\"150px\" style=\"border:1px solid #000000;\">$value[trainee_dept]</td><td width=\"145px\" style=\"border:1px solid #000000;\">$value[training_date]</td></tr>";
            }
        }
        if (!empty($sop_nah_trainees_details)) {
            $nah_trainees_list_markup = "";
            foreach ($sop_nah_trainees_details as $key => $value) {
                $nah_trainees_list_markup .= "<tr><td width=\"40px\" style=\"border:1px solid #000000;\">$value[count]</td><td width=\"320px\" style=\"border:1px solid #000000;\">$value[trainee_name]</td><td width=\"150px\" style=\"border:1px solid #000000;\">$value[trainee_dept]</td><td width=\"145px\" style=\"border:1px solid #000000;\">$value[training_date]</td></tr>";
            }
        }

        $sop_master = new DB_Public_lm_sop_master();
        $sop_master->get("sop_object_id", $sop_object_id);
        $sop_name = $sop_master->sop_name;
        $org_name = getActiveOrganizationName();
        $plant_logo = getPlantLogo($sop_master->sop_plant);
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }

    // Extend the TCPDF class to create custom Header and Footer
    class TRAINING_PDF extends TCPDF {

        //Page header
        public function Header() {
            $hstyle = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
            $this->Rect(15, 8, 185, 25, 'D', array('all' => $hstyle));

            //$image_file = _URL_ . "img/custom_logicmind_img/logo.jpg";
            $this->Image($GLOBALS['plant_logo'], 18, 10, 40, 15, '', $GLOBALS['org_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Ln(4);
            // Set font
            $this->SetFont('arial', 'B', 10);
            // Title
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 0, 'SOP GROUP TRAINING DETAILS', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(10);
            $this->SetFont('arial', 'B', 10);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 0, "    " . $GLOBALS['sop_name'], 0, 1, 'C', 0, '', 0, false, 'M', 'M');
        }

        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('arial', '', 10, true);
            $this->SetTextColor(0, 0, 0);

            // Page number
            $this->SetTextColor(0, 0, 0);
            $this->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
            $this->Line(15, 281, 200, 281, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
            $this->Cell(205, 5, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
            $this->Ln();

            // Download By
            $this->SetFont('Arial', 'B', 8);
            $this->SetTextColor(255, 195, 195);
            $this->Rotate(0, 200, 200);
            $this->Rotate(0);
            $this->Text(15, 282, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[createtime]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'M', FALSE);

            $this->SetFont('Arial', 'B', 8);
            $this->SetTextColor(0, 0, 0);
            $this->Rotate(0, 0, 0);
            $this->Rotate(0);
            $this->Text(15, 282, $GLOBALS[sop_no], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'M', FALSE);
            $this->Ln();

            $image_file = _URL_ . "img/logo_pdf.jpg";
            $this->Image($image_file, 184, 294, 16, 0, 'jpg', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);

            $this->SetFont('Arial', '', 6);
            $this->SetTextColor(0, 0, 0);
            $this->Rotate(0, 200, 200);
            $this->Rotate(0);
            $this->Text(15, 290, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'M', FALSE);
            $this->Ln();

            $this->SetFont('arial', 'B', 15, true);
            //$this->SetTextColor(31,174,102);
            $this->SetTextColor($GLOBALS[copy_type_rgb1], $GLOBALS[copy_type_rgb2], $GLOBALS[copy_type_rgb3]);
            $this->Rotate(90, 202, 0);
            $this->Text(20, 0, " " . $GLOBALS['copy_type'], FALSE, FALSE, TRUE, 0, 0, $align = "B", FALSE, "", 0, false, 'T', 'M', FALSE);
        }

    }

    // create new PDF document
    $pdf = new TRAINING_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetProtection($permissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass = '', $owner_pass = "", 0, null);

    // set document information
    $pdf->SetCreator("LogicMind");
    $pdf->SetAuthor('Logicmind');
    $pdf->SetTitle('LogicMind Solutions PDF');
    $pdf->SetSubject('Training Details');
    $pdf->SetKeywords('Training Details');

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
    $pdf->AddPage();
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $training_tbl = <<<EODTRAINING
    <table cellspacing="0" cellpadding="2" border="0">
        <thead>
            <tr>
                <td align="center" width="40px" style="border:1px solid #000000;"><b>S.No</b></td>
                <td align="center" width="120px" style="border:1px solid #000000;"><b>Training Date</b></td>
                <td align="center" width="150px" style="border:1px solid #000000;"><b>Trainer</b></td>
                <td align="center" width="115px" style="border:1px solid #000000;"><b>Department</b></td>
                <td align="center" width="115px" style="border:1px solid #000000;"><b>Venue</b></td>
                <td align="center" width="115px" style="border:1px solid #000000;"><b>Status</b></td>
            </tr>
        </thead>
        {$training_markup}
    </table>
EODTRAINING;
    if (isset($training_markup)) {
        $pdf->writeHTML($training_tbl, true, false, false, false, '');
    } else {
        $pdf->Ln();
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(180, 5, "Training details not available", 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();
        $pdf->Ln();
    }

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $tbl = <<<EOD
        <table cellspacing="0" cellpadding="2" border="0">
            <thead>
                <tr>
                    <td align="center" width="40px" style="border:1px solid #000000;"><b>S.No</b></td>
                    <td align="center" width="320px" style="border:1px solid #000000;"><b>Participants Name</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Department</b></td>
                    <td align="center" width="145px" style="border:1px solid #000000;"><b>Training Date</b></td>
                </tr>
            </thead>
            {$trainees_list_markup}
        </table>
EOD;
    if (isset($trainees_list_markup)) {
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->Cell(180, 5, "Account Holders", 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('arial', '', 10, true);
        $pdf->Ln();
        $pdf->writeHTML($tbl, true, false, false, false, '');
    } else {
        $pdf->Ln();
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(180, 5, "Participants details not available", 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();
        $pdf->Ln();
    }

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('arial', '', 10);
    $tbl = <<<EOD
        <table cellspacing="0" cellpadding="2" border="0">
            <thead>
                <tr>
                    <td align="center" width="40px" style="border:1px solid #000000;"><b>S.No</b></td>
                    <td align="center" width="320px" style="border:1px solid #000000;"><b>Participants Name</b></td>
                    <td align="center" width="150px" style="border:1px solid #000000;"><b>Department</b></td>
                    <td align="center" width="145px" style="border:1px solid #000000;"><b>Training Date</b></td>
                </tr>
            </thead>
            {$nah_trainees_list_markup}
        </table>
EOD;
    if (isset($nah_trainees_list_markup)) {
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->Cell(180, 5, "Non Account Holders", 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('arial', '', 10, true);
        $pdf->Ln();
        $pdf->writeHTML($tbl, true, false, false, false, '');
    } else {
        $pdf->Ln();
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(180, 5, "Participants details not available", 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();
        $pdf->Ln();
    }

    $pdf->SetFont('arial', 'B', 7, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(185, 5, "\n\n------------END OF DOCUMENT------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    //Close and output PDF document
    $pdf->Output("Training Details.pdf", 'I');
    //============================================================+
    // END OF FILE
    //============================================================+
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
