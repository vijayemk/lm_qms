<?php

/**
 * Project: Logicmind
 * File: view_vms_meeting_file_p.file.php

 * @author Sivaranjani.S
 * @since 13/03/2020
 * @package vms
 * @version 1.0
 */
ini_set('memory_limit', '560M');
ini_set("pcre.backtrack_limit", "10000000");
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes

if (!check_access($username, 'vms_view', 'yes')) {
    $error_handler->raiseError("vms_view");
}

require_once('includes/tcpdf/tcpdf.php');
require_once('lib/vms/functions/Vms_Processor.func.php');

$vm_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$ori = (isset($_REQUEST['ori'])) ? $_REQUEST['ori'] : null;
$paper_size = (isset($_REQUEST['paper_size'])) ? $_REQUEST['paper_size'] : null;
$rtype = (isset($_REQUEST['rtype'])) ? $_REQUEST['rtype'] : null;

$vms_processor = new vms_processor();
$vm_details = $vms_processor->get_vms_details(array('vm_object_id' => $vm_object_id));
if ($vm_details && ($ori == "p" || $ori == "l") && ($paper_size == 'a2' || $paper_size == 'a3' || $paper_size == 'a4') && ($rtype == 'full_report' || $rtype == 'agenda' || $rtype == 'observation' || $rtype == 'feedback' || $rtype == 'manual_entry')) {
    $vm_master_obj = (object) array_shift($vm_details);
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
    $plant_logo = getPlantLogo($vm_master_obj->created_by_plant_id);

    $lm_doc_name = $vm_master_obj->lm_doc_name;
    $vm_number = $vm_master_obj->vm_no;
    $qa_approve_array = $vms_processor->get_vms_mgmt_review_comments($vm_object_id, null, 'qa_approve');
    $access_rights = getAccessRightsDeptList($vm_object_id);
    $extension_details = get_extension_details(null, $vm_object_id);
    $integration_details = get_integration_details(null, $vm_object_id, null);
    $doc_file_processor_object = new Doc_File_Processor();
    $fileobjectarray = $doc_file_processor_object->getLmVmDocFileObjectArray($vm_object_id);
    $workflow_users_array = get_all_workflow_actions($vm_object_id);

    $esign_user = ["qa_approve" => "Approved", "audit_findings_review1" => "Reviewed", "audit_findings_review2" => "Reviewed"];
    foreach ($esign_user as $key => $val) {
        $esign_user_dtls = get_workflow_userlist_by_objectid_action($vm_object_id, $key);
        foreach ($esign_user as $key1 => $val2) {
            $esign_dtls=$key1;
        }
     //   $esign_user_dtls = is_action_finished($vm_object_id, $key, $val);
    }
    
    $smarty->assign('rtype', $rtype);
    $smarty->assign('vm_master_obj', $vm_master_obj);
    $smarty->assign('vm_plant_obj', (object) array_shift($vms_processor->get_vms_plants($vm_master_obj->vendor_org_id, $vm_master_obj->vendor_plant_id)));
    $smarty->assign('vm_audit_plan', ($vms_processor->get_vms_audit_plan($vm_object_id)));
    $smarty->assign('vm_agenda_list', $vms_processor->get_vms_agenda_details($vm_object_id));
    $smarty->assign("vm_auditors", $vms_processor->get_vms_auditors($vm_object_id));
    $smarty->assign("vm_auditees", $vms_processor->get_vms_auditees($vm_object_id));
    $smarty->assign('qa_approve_array', $qa_approve_array);
    $smarty->assign('audit_findings_review1_comments', $vms_processor->get_vms_mgmt_review_comments($vm_object_id, null, 'audit_findings_review1'));
    $smarty->assign('audit_findings_review2_comments', $vms_processor->get_vms_mgmt_review_comments($vm_object_id, null, 'audit_findings_review2'));
    $smarty->assign('access_rights', $access_rights);
    $smarty->assign('extension_details', $extension_details);
    $smarty->assign('integration_details', $integration_details);
    $smarty->assign('fileobjectarray', $fileobjectarray);
    $smarty->assign('workflow_users_array', $workflow_users_array);
    $smarty->assign('esign_dtls', $esign_dtls);

    //$smarty->assign('main', _TEMPLATE_PATH_ . "view_vms_details_file.vms.tpl");

    class VMS_PDF extends TCPDF
    {

        public function Header()
        {
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

        public function Footer()
        {
            $this->set_footer($this);
        }

        function set_footer($pdf)
        {
            $paper_size = $GLOBALS['paper_size'];
            $ori = $GLOBALS['ori'];

            if ($paper_size == "a4" && $ori == "p") {
                //A4-P  210*297              //W*H
                // Position at 15 mm from bottom
                $pdf->SetY(-15);

                $pdf->SetFont('Arial', 'B', 8);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                $pdf->Line(5, 282, 205, 282, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                // Doc No 
                $pdf->Text(5, 285, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Download By
                $pdf->SetTextColor(255, 195, 195);
                $pdf->Text(5, 285, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Page number
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(5, 285, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

                $pdf->SetFont('Arial', '', 5);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(15, 292, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
                $pdf->Ln();
                // logicmind logo
                $image_file = _URL_ . "img/logo_pdf.jpg";
                $pdf->Image($image_file, 174, 291, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            }
            if ($paper_size == "a4" && $ori == "l") {
                //A4-L  297*210     W*H
                // Position at 15 mm from bottom
                $pdf->SetY(-15);

                $pdf->SetFont('Arial', 'B', 8);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                $pdf->Line(5, 195, 292, 195, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                // Doc No 
                $pdf->Text(5, 198, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Download By
                $pdf->SetTextColor(255, 195, 195);
                $pdf->Text(5, 198, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Page number
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(5, 198, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

                $pdf->SetFont('Arial', '', 5);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(15, 205, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
                $pdf->Ln();
                // logicmind logo
                $image_file = _URL_ . "img/logo_pdf.jpg";
                $pdf->Image($image_file, 262, 204, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            }
            if ($paper_size == "a3" && $ori == "p") {
                //A3-P  297*420     W*H
                // Position at 15 mm from bottom
                $pdf->SetY(-15);

                $pdf->SetFont('Arial', 'B', 10);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                $pdf->Line(5, 405, 292, 405, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                // Doc No 
                $pdf->Text(5, 408, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Download By
                $pdf->SetTextColor(255, 195, 195);
                $pdf->Text(5, 408, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Page number
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(5, 408, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

                $pdf->SetFont('Arial', '', 7);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(15, 415, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
                $pdf->Ln();
                // logicmind logo
                $image_file = _URL_ . "img/logo_pdf.jpg";
                $pdf->Image($image_file, 254, 414, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            }
            if ($paper_size == "a3" && $ori == "l") {
                //A3-L  420*297 W*H
                // Position at 15 mm from bottom
                $pdf->SetY(-15);

                $pdf->SetFont('Arial', 'B', 10);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                $pdf->Line(5, 282, 415, 282, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                // Doc No 
                $pdf->Text(5, 285, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Download By
                $pdf->SetTextColor(255, 195, 195);
                $pdf->Text(5, 285, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Page number
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(5, 285, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

                $pdf->SetFont('Arial', '', 7);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(15, 292, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
                $pdf->Ln();
                // logicmind logo
                $image_file = _URL_ . "img/logo_pdf.jpg";
                $pdf->Image($image_file, 378, 291, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            }
            if ($paper_size == "a2" && $ori == "p") {
                //A2-P  420*594      W*H
                // Position at 15 mm from bottom
                $pdf->SetY(-15);

                $pdf->SetFont('Arial', 'B', 13);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                $pdf->Line(5, 575, 415, 575, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                // Doc No 
                $pdf->Text(5, 578, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Download By
                $pdf->SetTextColor(255, 195, 195);
                $pdf->Text(5, 578, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Page number
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(5, 578, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(15, 587, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
                $pdf->Ln();
                // logicmind logo
                $image_file = _URL_ . "img/logo_pdf.jpg";
                $pdf->Image($image_file, 365, 587, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            }
            if ($paper_size == "a2" && $ori == "l") {
                //A2-L  594*420      W*H
                // Position at 15 mm from bottom
                $pdf->SetY(-15);

                $pdf->SetFont('Arial', 'B', 13);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '0'));
                $pdf->Line(5, 400, 589, 400, $style = array('width' => 0.07, 'color' => array(0, 0, 0)));
                // Doc No 
                $pdf->Text(5, 403, $GLOBALS['vm_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Download By
                $pdf->SetTextColor(255, 195, 195);
                $pdf->Text(5, 403, "Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[download_time]]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);

                // Page number
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(5, 403, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), FALSE, FALSE, TRUE, 0, 0, $align = "R", FALSE, "", 0, false, 'T', 'C', FALSE);

                $pdf->SetFont('Arial', '', 8);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Text(15, 411, "CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]", FALSE, FALSE, TRUE, 0, 0, $align = "C", FALSE, "", 0, false, 'T', 'C', FALSE);
                $pdf->Ln();
                // logicmind logo
                $image_file = _URL_ . "img/logo_pdf.jpg";
                $pdf->Image($image_file, 540, 411, 20, 0, '', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            }
        }
    }

    //*********** start Of pdf Object And Settings ***********//
    $pdf = new VMS_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator($lm_contact_obj->name);
    $pdf->SetAuthor($lm_contact_obj->name);
    $pdf->SetTitle($vm_master_obj->vm_no);
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
    if ($ori == "l") {
        $pdf->SetFont('arial', '', 12);
    } else {
        $pdf->SetFont('arial', '', 10);
    }

    $pdf->AddPage(strtoupper($ori), strtoupper($paper_size));
    // Fetch Smarty template
    $import_tpl = $smarty->fetch(_TEMPLATE_PATH_ . "view_vms_details_file.file.tpl");
    $pdf->writeHTML($import_tpl, true, false, false, false, '');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell($pdf->getPageWidth() - 10, 5, "\n------------ END OF DOCUMENT ------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    ob_end_clean();
    $pdf->Output("$vm_number.pdf", 'I');
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
