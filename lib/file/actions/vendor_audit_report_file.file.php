<?php

/**
 * Project: Logicmind
 * File: vendor_audit_report_file.file.php

 * @author Puneet
 * @since 28/08/2024
 * @package vms
 * @version 1.0
 */
ini_set('memory_limit', '560M');
ini_set("pcre.backtrack_limit", "10000000");
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes

if (!check_access($username, 'view_vendor', 'yes')) {
    $error_handler->raiseError("view_vendor");
}

require_once('includes/tcpdf/tcpdf.php');
require_once('lib/vms/functions/Vms_Processor.func.php');

$vm_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$op_type = (isset($_REQUEST['op_type'])) ? $_REQUEST['op_type'] : null;

$vms_processor = new vms_processor();
$vms_details = $vms_processor->get_vms_details(array('vm_object_id' => $vm_object_id));
if ($vms_details) {
    $vm_master_obj = (object) array_shift($vms_details);

    $usr_id = trim($_SESSION['user_id']);
    $usr_plant_id = getUserPlantId($usr_id);
    $usr_dept_id = getDeptId($usr_id);
    if (!isDeptAccessRightsExist($vm_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
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
    $plant_logo = getPlantLogo(getUserPlantId($vm_master_obj->created_by));

    $vm_number = $vm_master_obj->vm_no;
    $smarty->assign('vm_master_obj', $vm_master_obj);
    $smarty->assign('vm_agenda_list', $vms_processor->get_vms_agenda_details($vm_object_id));
    $smarty->assign('vm_plant_obj', (object) array_shift($vms_processor->get_vms_plants($vm_master_obj->vendor_org_id, $vm_master_obj->vendor_plant_id)));
    $smarty->assign('vendor_approval_score', (int) getVendorApprovalScore());
    $smarty->assign('audit_lead_email', getEmailbyUserId($vm_master_obj->audit_lead_id));

    class VENDOR_AUDIT_PDF extends TCPDF {

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
            $this->Cell(0, 25, "AUDIT FINDINGS REPORT", 1, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(10);
        }

        public function Footer() {
            //A4-L  297*210     W*H
            // Position at 15 mm from bottom
            $this->SetY(-15);

            $this->SetFont('Arial', 'B', 8);
            $this->SetTextColor(0, 0, 0);
            $this->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
            $this->Line(5, 195, 292, 195, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
            // Doc No 
            $this->Text(5, 198, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

            // Download By
            $this->SetTextColor(255, 195, 195);
            if ($GLOBALS['op_type'] === 'd') {
                $this->Text(5, 198, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
            } else {
                $this->Text(5, 198, "Report Generated On [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
            }

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
    $pdf = new VENDOR_AUDIT_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator($lm_contact_obj->name);
    $pdf->SetAuthor($lm_contact_obj->name);
    $pdf->SetTitle($vm_number);
    $pdf->SetSubject("$vm_master_obj->lm_doc_short_name Report");
    $pdf->SetKeywords("$vm_master_obj->lm_doc_short_name Report");
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
    $pdf->SetFont('arial', '', 10);

    $pdf->AddPage('L', 'A4');
    // Fetch Smarty template
    //$import_tpl = $smarty->fetch(_TEMPLATE_PATH_ . "vendor_audit_report_file.file.tpl");
    $import_tpl = $smarty->fetch(dirname(__DIR__, 2) . '/file/templates/vendor_audit_report_file.file.tpl');
    $pdf->writeHTML($import_tpl, true, false, false, false, '');

    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell($pdf->getPageWidth() - 10, 5, "\n------------ END OF DOCUMENT ------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    ob_end_clean();
    if ($op_type === "d") {
        $pdf->Output("$vm_number-AFR.pdf", 'I');
    } else {
        $pdf->Output(_TMP_VAULT_ . str_replace('/', '-', $vm_number) . "-AFR.pdf", "F");
    }
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
