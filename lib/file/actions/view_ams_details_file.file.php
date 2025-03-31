<?php

/**
 * Project: Logicmind
 * File: view_ams_details_file.file.php

 * @author Sivaranjani.S, Puneet
 * @since 13/03/2020
 * @package ams
 * @version 1.0
 */
ini_set('memory_limit', '560M');
ini_set("pcre.backtrack_limit", "10000000");
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes

if (!check_access($username, 'ams_view', 'yes')) {
    $error_handler->raiseError("ams_view");
}

require_once('includes/tcpdf/tcpdf.php');
require_once('lib/ams/functions/Ams_Processor.func.php');

$am_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$ori = (isset($_REQUEST['ori'])) ? $_REQUEST['ori'] : null;
$paper_size = (isset($_REQUEST['paper_size'])) ? $_REQUEST['paper_size'] : null;
$rtype = (isset($_REQUEST['rtype'])) ? $_REQUEST['rtype'] : null;

$ams_processor = new Ams_processor();
$am_schedule = new DB_Public_lm_audit_scheduled_details();

if ($am_schedule->get("object_id", $am_object_id) && ($ori == "p" || $ori == "l") && ($paper_size == 'a2' || $paper_size == 'a3' || $paper_size == 'a4') && ($rtype == 'full_report' || $rtype == 'agenda' || $rtype == 'observation' || $rtype == 'feedback' || $rtype == 'manual_entry')) {
    $am_master_obj = $am_schedule;
    $usr_id = trim($_SESSION['user_id']);
    $usr_plant_id = getUserPlantId($usr_id);
    $usr_dept_id = getDeptId($usr_id);
    if (!isDeptAccessRightsExist($am_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
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
    $plant_logo = getPlantLogo(getUserPlantId($am_master_obj->created_by));

    $lm_doc_name = getLmDocName($am_master_obj->lm_doc_id);
    $lm_doc_short_name = getLmDocShortName($am_master_obj->lm_doc_id);
    $am_number = $am_master_obj->audit_no;
    $audit_type = getAuditType($am_master_obj->audit_type_id);
    $qa_approve_array = $ams_processor->get_ams_mgmt_review_comments($am_object_id, null, 'qa_approve');
    $qa_review_array = $ams_processor->get_ams_mgmt_review_comments($am_object_id, null, 'qa_review');
    $access_rights = getAccessRightsDeptList($am_object_id);
    $extension_details = get_extension_details(null, $am_object_id);
    $integration_details = get_integration_details(null, $am_object_id, null);
    $doc_file_processor_object = new Doc_File_Processor();
    $fileobjectarray = $doc_file_processor_object->getLmAmDocFileObjectArray($am_object_id);
    $workflow_users_array = get_all_workflow_actions($am_object_id);
    $ams_auditors = ($audit_type === "INTERNAL") ? $ams_processor->get_ams_int_auditors($am_object_id) : $ams_processor->get_ams_ext_auditors($am_object_id);

    $smarty->assign('rtype', $rtype);
    $smarty->assign('am_master_obj', $am_master_obj);
    $smarty->assign('initiator', getFullName($am_master_obj->created_by));
    $smarty->assign('am_plant', getPlantName(getUserPlantId($am_master_obj->created_by)));
    $smarty->assign('am_department', getDeptName($am_master_obj->created_by));
    $smarty->assign('audit_lead_name', getFullName($am_master_obj->audit_lead));
    $smarty->assign('audit_lead_plant', getPlantName(getUserPlantId($am_master_obj->audit_lead)));
    $smarty->assign('audit_lead_dept', getDeptName($am_master_obj->audit_lead));
    $smarty->assign('audit_type', getAuditType($am_master_obj->audit_type_id));
    $smarty->assign('audit_sub_type', getAuditSubType($am_master_obj->audit_sub_type_id));
    $smarty->assign('audit_dept', array_shift($ams_processor->get_ams_audit_dept_deatils($am_master_obj->audit_schedule_id))['audit_dept']);
    $smarty->assign('audit_plant', array_shift($ams_processor->get_ams_audit_dept_deatils($am_master_obj->audit_schedule_id))['audit_plant_name']);
    $smarty->assign('ams_audit_plan', ($ams_processor->get_ams_audit_plan($am_object_id)));
    $smarty->assign('ams_agenda_list', $ams_processor->get_ams_agenda_details($am_object_id));
    $smarty->assign("ams_auditors", $ams_auditors);
    $smarty->assign("ams_auditees", $ams_processor->get_ams_auditees($am_object_id));
    $smarty->assign('qa_approve_array', $qa_approve_array);
    $smarty->assign('audit_findings_review_comments', $ams_processor->get_ams_mgmt_review_comments($am_object_id, null, 'audit_findings_review'));
    $smarty->assign('access_rights', $access_rights);
    $smarty->assign('extension_details', $extension_details);
    $smarty->assign('integration_details', $integration_details);
    $smarty->assign('fileobjectarray', $fileobjectarray);
    $smarty->assign('workflow_users_array', $workflow_users_array);

    class ams_PDF extends TCPDF {

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
            $this->set_footer($this);
        }

        function set_footer($pdf) {
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
                $pdf->Text(5, 285, $GLOBALS['am_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

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
                $pdf->Text(5, 198, $GLOBALS['am_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

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
                $pdf->Text(5, 408, $GLOBALS['am_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

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
                $pdf->Text(5, 285, $GLOBALS['am_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

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
                $pdf->Text(5, 578, $GLOBALS['am_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

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
                $pdf->Text(5, 403, $GLOBALS['am_number'], FALSE, FALSE, TRUE, 0, 0, $align = "L", FALSE, "", 0, false, 'T', 'C', FALSE);

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
    $pdf = new ams_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator($lm_contact_obj->name);
    $pdf->SetAuthor($lm_contact_obj->name);
    $pdf->SetTitle($am_master_obj->audit_no);
    $pdf->SetSubject("$lm_doc_short_name Report");
    $pdf->SetKeywords("$lm_doc_short_name Report");
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
    $import_tpl = $smarty->fetch(_TEMPLATE_PATH_ . "view_ams_details_file.file.tpl");
    $pdf->writeHTML($import_tpl, true, false, false, false, '');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell($pdf->getPageWidth() - 10, 5, "\n------------ END OF DOCUMENT ------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    ob_end_clean();
    $pdf->Output("$am_number.pdf", 'I');
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
    