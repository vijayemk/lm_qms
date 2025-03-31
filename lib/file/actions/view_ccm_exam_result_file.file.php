<?php

/**
 * Project: Logicmind
 * File: view_ccm_meeting_file_p.file.php

 * @author Puneet
 * @since 18/08/2024
 * @package ccm
 * @version 1.0
 */
ini_set('memory_limit', '560M');
ini_set("pcre.backtrack_limit", "10000000");
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes

if (!check_access($username, 'ccm_view', 'yes')) {
    $error_handler->raiseError("ccm_view");
}

require_once('includes/tcpdf/tcpdf.php');
require_once('lib/ccm/functions/Ccm_Processor.func.php');

$cc_object_id = (isset($_REQUEST['cc_object_id'])) ? $_REQUEST['cc_object_id'] : null;
$exam_object_id = (isset($_REQUEST['exam_object_id'])) ? $_REQUEST['exam_object_id'] : null;

$exam_user_obj = new DB_Public_lm_cc_online_exam_user_details();
if ($exam_user_obj->get("object_id", $exam_object_id)) {
    $ccm_processor = new Ccm_Processor();
    $exam_details_array = $ccm_processor->get_ccm_online_exam_user_details($cc_object_id, $exam_user_obj->exam_details_id, null, null, $exam_user_obj->assigned_to);
    $cc_master = new DB_Public_lm_cc_master();
    $cc_master->get("cc_object_id", $cc_object_id);

    $usr_id = trim($_SESSION['user_id']);
    $usr_plant_id = getUserPlantId($usr_id);
    $usr_dept_id = getDeptId($usr_id);
    if (!isDeptAccessRightsExist($cc_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }
    $download_time = display_datetime_format(date('Y-m-d G:i:s'));
    $download_usr_dept = getDeptName($usr_id);
    $download_usr_full_name = getFullName($usr_id);
    $org_web_obj = getActiveOrganizationObj();
    $org_web = $org_web_obj->website;
    $org_name = $org_web_obj->org_name;
    $lm_contact_obj = get_lm_contact_obj();
    $lm_web = $lm_contact_obj->website;
    $plant_logo = getPlantLogo($cc_master->plant_id);
    $lm_doc_name = getLmDocName($cc_master->lm_doc_id);
    $cc_number = $cc_master->cc_no;
    $smarty->assign('exam_details_array', $exam_details_array);

    class CCM_PDF extends TCPDF {

        public function Header() {
            //$hstyle = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
            //$this->Rect(15, 8, 220, 25, 'D', array('all' => $hstyle));

            $image_file = $GLOBALS['plant_logo'];
            //$image_file = _URL_ . "img/logo_pdf.jpg";
            $this->Image($image_file, 20, 12, 25, 17, '', $GLOBALS['org_web'], 'T', false, 300, '', false, false, 0, false, false, false);

            $this->Ln(7);
            // Position at 20 mm from top
            $this->SetY(20);
            // Set font
            $this->SetFont('arial', 'B', 15);
            // Title
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 25, $GLOBALS['lm_doc_name'], 1, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(10);
        }

        public function Footer() {
            $this->SetY(-15);

            $this->SetFont('Arial', 'B', 8);
            $this->SetTextColor(0, 0, 0);
            $this->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
            $this->Line(5, 195, 292, 195, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
            // Doc No 
            $this->Text(5, 198, $GLOBALS['cc_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

            // Download By
            $this->SetTextColor(255, 195, 195);
            $this->Text(5, 198, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

            // Page number
            $this->SetTextColor(0, 0, 0);
            $this->Text(5, 198, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

            $this->SetFont('Arial', '', 5);
            $this->SetTextColor(0, 0, 0);
            $this->Text(15, 205, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
            $this->Ln();
            // logicmind logo
            $image_file = _URL_ . "img/logo_pdf.jpg";
            $this->Image($image_file, 262, 204, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
        }
    }

    //*********** start Of pdf Object And Settings ***********//
    $pdf = new CCM_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator($lm_contact_obj->name);
    $pdf->SetAuthor($lm_contact_obj->name);
    $pdf->SetTitle($cc_master->cc_no);
    $pdf->SetSubject("$cc_master->cc_no Report");
    $pdf->SetKeywords("$cc_master->cc_no Report");
    $pdf->SetMargins(5, 40, 5);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    //*********** End Of pdf Object And Settings ***********//
    //*********** start Of Prinitng Contents ***********//
    // add a page
    $pdf->AddPage('L', 'A4');
    $pdf->SetFont('arial', '', 10);

    // Fetch Smarty template
    $import_tpl = $smarty->fetch(_TEMPLATE_PATH_ . "view_exam_result_file.file.tpl");
    $pdf->writeHTML($import_tpl, true, false, false, false, '');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell($pdf->getPageWidth() - 10, 5, "\n------------ END OF DOCUMENT ------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    ob_end_clean();
    $pdf->Output("$cc_number.pdf", 'I');
} else {
    $error_handler->raiseError("INVALID REQUEST");
}

    


