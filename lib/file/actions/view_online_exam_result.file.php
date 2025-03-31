<?php

/**
 * Project:     Logicmind
 * File:        view_online_exam_result.file.php

 * @author Ananthakumar .V
 * @since 24/04/2019
 * @package file
 * @version 1.0
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}
require_once('includes/tcpdf/tcpdf.php');
require_once ('lib/sop/functions/Sop_Processor.func.php');

$createtime = date('d/m/Y G:i:s');
$lm_contact_obj = get_lm_contact_obj();
$lm_web = $lm_contact_obj->website;
$org_web_obj = getActiveOrganizationObj();
$org_web = $org_web_obj->website;
$sop_process = new Sop_Processor();
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$usr_dept = getDepartment($dept_id);
$usr_name = getUserName($usr_id);
$usr_full_nmae = getFullName($usr_id);

$task_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$oeud_obj = new DB_Public_lm_sop_online_exam_user_details();
if ($oeud_obj->get("object_id", $task_id) && $oeud_obj->status != "Recalled") {
    $sop_master = new DB_Public_lm_sop_master();
    if ($sop_master->get("sop_object_id", $oeud_obj->sop_object_id)) {
        $sop_object_id = $oeud_obj->sop_object_id;
        $sop_online_exam_status = $sop_process->get_sop_online_exam_status($sop_object_id);
        $is_sop_online_exam_required = $sop_process->get_sop_online_exam_is_required($sop_object_id);
        if ($is_sop_online_exam_required == "yes" && $sop_online_exam_status == "Completed") {
            $attend_online_exam_user_details = $sop_process->get_sop_online_exam_user_details($task_id);
            foreach ($attend_online_exam_user_details as $aoul_details) {
                $eassigned_by = $aoul_details['assigned_by'];
                $eassigned_to = $aoul_details['assigned_to'];
                $eassigned_to_dept = getDeptName($aoul_details['assigned_to_id']);
                $eassigned_date = $aoul_details['assigned_date'];
                $etarget_date = $aoul_details['target_date'];
                $ecompleted_date = $aoul_details['completed_date'];
                $epass_mark = $aoul_details['pass_mark'];
                $eattempt = $aoul_details['attempt'];
                $emarks_scored = $aoul_details['marks_scored'];
                $eresult = $aoul_details['result'];
                $eis_latest = $aoul_details['is_latest'];
            }
            if (empty($emarks_scored)) {
                $error_handler->raiseError("INVALID REQUEST");
            }
            if ($eis_latest == "no") {
                $error_handler->raiseError("INVALID REQUEST");
            }
            $exam_qns_list = $sop_process->get_sop_online_exam_user_question_ans_details($task_id);
            $valid_image_path = 'img/custom_logicmind_img/valid.jpg';
            $invalid_image_path = 'img/custom_logicmind_img/invalid.jpg';

            $org_name = getActiveOrganizationName();
            $sop_no = $sop_process->get_sop_no($sop_object_id);
            $sop_plant = getPlantShortName($sop_master->sop_plant);
            $plant_logo = getPlantLogo($sop_master->sop_plant);
            $published_status = $sop_process->get_published_status($sop_object_id);
            /** Department Restriction */
            if (!check_doc_dept_access($sop_object_id, $dept_id, 'yes')) {
                $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
            }
            if (($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") && !check_access($username, 'expired_sop', 'yes')) {
                $error_handler->raiseError("expired_sop");
            }
            $sop_revision = $sop_master->revision;
            $sop_name = $sop_master->sop_name;
            $sop_supersedes = $sop_master->supersedes;

            class SOP_PDF extends TCPDF {

                //Page header
                public function Header() {
                    $hstyle = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
                    $this->Rect(15, 8, 220, 28, 'D', array('all' => $hstyle));

                    //$image_file = _URL_ . "img/custom_logicmind_img/logo.png";
                    $this->Image($GLOBALS['plant_logo'], 18, 10, 40, 15, '', $GLOBALS['org_web'], 'T', false, 300, '', false, false, 0, false, false, false);
                    $this->Ln(4);
                    // Set font
                    $this->SetFont('arial', 'B', 10);
                    // Title
                    $this->SetTextColor(0, 0, 0);
                    $this->Cell(0, 0, 'ONLINE EXAM', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
                    $this->Ln(8);
                    $this->SetFont('arial', 'B', 10);
                    $this->SetTextColor(0, 0, 0);
                    $this->MultiCell(220, 5, $GLOBALS['sop_name'], 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
                    $this->Ln(15);

                    $sop_info_style = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
                    $this->Rect(15, 36, 60, 12, 'D', array('all' => $sop_info_style));
                    $this->Rect(75, 36, 60, 12, 'D', array('all' => $sop_info_style));
                    $this->Rect(135, 36, 50, 12, 'D', array('all' => $sop_info_style));
                    $this->Rect(185, 36, 50, 12, 'D', array('all' => $sop_info_style));

                    $this->SetFont('arial', 'B', 10, true);
                    $this->SetTextColor(0, 0, 0);
                    $this->Cell(60, 5, '  SOP No :', 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Cell(60, 5, '  Revision :', 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Cell(50, 5, '  Supersedes :', 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Cell(50, 5, '  SOP Plant :', 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Ln(6);

                    $this->SetFont('arial', '', 9, true);
                    $this->SetTextColor(0, 0, 0);
                    $this->Cell(60, 5, "  " . $GLOBALS['sop_no'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Cell(60, 5, "  " . $GLOBALS['sop_revision'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Cell(50, 5, "  " . $GLOBALS['sop_supersedes'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Cell(50, 5, "  " . $GLOBALS['sop_plant'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
                    $this->Ln(7);
                }

                // Page footer
                public function Footer() {
                    // Position at 15 mm from bottom
                    $this->SetY(-12);
                    // Set font
                    $this->SetFont('arial', '', 10, true);
                    $this->SetTextColor(0, 0, 0);

                    // Page number
                    $this->SetTextColor(0, 0, 0);
                    $this->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                    $this->Line(15, 341, 235, 341, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                    $this->Cell(240, 5, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
                    $this->Ln();

                    // Download By
                    $this->SetFont('Arial', 'B', 8);
                    $this->SetTextColor(255, 195, 195);
                    $this->Rotate(0, 200, 200);
                    $this->Rotate(0);
                    $this->Text(15, 343, "Downloaded By [$GLOBALS[usr_full_nmae]] [$GLOBALS[usr_dept]] [$GLOBALS[createtime]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'M', FALSE);

                    $this->SetFont('Arial', 'B', 8);
                    $this->SetTextColor(0, 0, 0);
                    $this->Rotate(0, 0, 0);
                    $this->Rotate(0);
                    $this->Text(15, 343, $GLOBALS[sop_no], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'M', FALSE);
                    $this->Ln();

                    $image_file = _URL_ . "img/logo_pdf.jpg";
                    $this->Image($image_file, 220, 348, 16, 0, 'jpg', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);

                    $this->SetFont('Arial', '', 6);
                    $this->SetTextColor(0, 0, 0);
                    $this->Rotate(0, 200, 200);
                    $this->Rotate(0);
                    $this->Text(15, 349, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'M', FALSE);
                    $this->Ln();

                    $this->SetFont('arial', 'B', 15, true);
                    $this->Rotate(90, 242, 0);
                    $this->Text(40, 0, " " . $GLOBALS['copy_type'], FALSE, FALSE, TRUE, 0, 0, $align = "B", FALSE, "", 0, false, 'T', 'M', FALSE);
                }

            }

            // create new PDF document
            $pdf = new SOP_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            if ($print_option) {
                $pdf->SetProtection($permissions = array('', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass = '', $owner_pass = "", 0, null);
            } else {
                $pdf->SetProtection($permissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass = '', $owner_pass = "", 0, null);
            }
            // set document information
            $pdf->SetCreator("LogicMind");
            $pdf->SetAuthor('Logicmind');
            $pdf->SetTitle('LogicMind Solutions PDF');
            $pdf->SetSubject('SOP Online Exam Details');
            $pdf->SetKeywords('SOP Online Exam Details');

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, 55, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetAutoPageBreak(TRUE, 60);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                require_once(dirname(__FILE__) . '/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            $pdf->AddPage('P', 'B4');
            $pdf->SetFont('arial', 'B', 12, true);
            $pdf->SetFillColor(184, 184, 184);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->MultiCell(220, 0, ' Online Exam Details : ', 0, 'L', 1, 1, '', '', true);
            $pdf->ln();

            $pdf->SetFont('arial', '', 10, true);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->MultiCell(28, 0, 'Assigned By    : ', 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->MultiCell(83, 0, $eassigned_by, 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', '', 10, true);
            $pdf->MultiCell(30, 0, 'Assigned To       : ', 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->MultiCell(83, 0, $eassigned_to, 0, 'L', 0, 0, '', '', true);
            $pdf->ln();
            $pdf->ln();

            $pdf->SetFont('arial', '', 10, true);
            $pdf->MultiCell(28, 0, 'Assigned Date : ', 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->MultiCell(83, 0, $eassigned_date, 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', '', 10, true);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->MultiCell(30, 0, 'Target Date        : ', 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->MultiCell(83, 0, $etarget_date, 0, 'L', 0, 0, '', '', true);

            $pdf->ln();
            $pdf->ln();
            $pdf->SetFont('arial', '', 10, true);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->MultiCell(28, 0, 'Department      : ', 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->MultiCell(83, 0, $eassigned_to_dept, 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', '', 10, true);
            $pdf->MultiCell(30, 0, 'Completed Date : ', 0, 'L', 0, 0, '', '', true);
            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->MultiCell(40, 0, $ecompleted_date, 0, 'L', 0, 0, '', '', true);
            $pdf->ln();
            $pdf->ln();

            $pdf->SetFont('arial', 'B', 12, true);
            $pdf->SetFillColor(184, 184, 184);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->MultiCell(220, 0, ' Questions : ', 0, 'L', 1, 1, '', '', true);
            $pdf->ln();

            $qns_count = 1;
            foreach ($exam_qns_list as $exam_qns) {
                $pdf->SetFont('arial', '', 10, true);
                $pdf->SetTextColor(0, 0, 128);
                $pdf->MultiCell(220, 5, $qns_count . ". " . $exam_qns['question'], 0, 'L', 0, 0, '', '', true, 0, false, false, 0, 'M', false);
                $pdf->ln();

                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetFont('arial', '', 10, true);
                $pdf->MultiCell(50, 5, "   Answered : " . $exam_qns['exam_ans'], 0, 'L', 0, 0, '', '', true);
                $pdf->MultiCell(50, 5, "   Correct Answer : " . $exam_qns['correct_ans'], 0, 'L', 0, 0, '', '', true);

                if ($exam_qns['exam_ans'] == $exam_qns['correct_ans']) {
                    $pdf->Image(_URL_ . $valid_image_path, $pdf->GetX() + 20, $pdf->GetY() + 0.5, 4, 4, 'JPG', "Correct Answer", '', true, 150, '', false, false, 0, false, false, false);
                } else {
                    $pdf->Image(_URL_ . $invalid_image_path, $pdf->GetX() + 20, $pdf->GetY() + 1, 4, 4, 'JPG', "In Correct Answer", '', true, 150, '', false, false, 0, false, false, false);
                }
                $pdf->MultiCell(40, 5, " Result : ", 0, 'L', 0, 0, '', '', true);
                $pdf->ln();
                $pdf->ln();
                $pdf->SetTextColor(0, 0, 0);
                $qns_count++;
            }

            $pdf->SetFont('arial', 'B', 12, true);
            $pdf->SetFillColor(184, 184, 184);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->MultiCell(220, 0, ' Result : ', 0, 'L', 1, 1, '', '', true);
            $pdf->ln();

            $pdf->SetFont('arial', 'B', 10, true);
            $pdf->SetTextColor(0, 0, 128);
            $pdf->MultiCell(55, 0, "Marks Scored : $emarks_scored", 0, 'L', 0, 0, '', '', true);
            $pdf->MultiCell(55, 0, "Pass Mark : $epass_mark", 0, 'L', 0, 0, '', '', true);
            $pdf->MultiCell(55, 0, "Attempt : $eattempt", 0, 'L', 0, 0, '', '', true);
            $pdf->MultiCell(30, 0, "Result : $eresult", 0, 'L', 0, 0, '', '', true);
            if ($eresult == "Pass") {
                $pdf->Image(_URL_ . $valid_image_path, $pdf->GetX() + 5, $pdf->GetY() + 0.5, 4, 4, 'JPG', "PASS", '', true, 150, '', false, false, 0, false, false, false);
            } else {
                $pdf->Image(_URL_ . $invalid_image_path, $pdf->GetX() + 5, $pdf->GetY() + 0.5, 4, 4, 'JPG', "FAILED", '', true, 150, '', false, false, 0, false, false, false);
            }
            $pdf->ln();
            $pdf->ln();
            $pdf->ln();

            $pdf->SetFont('arial', 'B', 7, true);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->MultiCell(220, 0, "\n\n------------END OF DOCUMENT------------", 0, 'C', 0, 0, '', '', true);

            // reset pointer to the last page
            $pdf->lastPage();

            //Close and output PDF document
            $pdf->Output("$sop_no.pdf", 'I');
            //============================================================+
            // END OF FILE
            //============================================================+
        } else {
            $error_handler->raiseError("INVALID REQUEST");
        }
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
