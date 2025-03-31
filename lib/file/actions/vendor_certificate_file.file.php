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
$op_type = (isset($_REQUEST['op_type'])) ? $_REQUEST['op_type'] : null;

$vms_processor = new vms_processor();
$vm_details = $vms_processor->get_vms_details(array('vm_object_id' => $vm_object_id));
if ($vm_details && $vm_details[0]['approval_status'] == "Approved") {
    $vm_master_obj = (object) array_shift($vm_details);
    $usr_id = trim($_SESSION['user_id']);
    $usr_plant_id = getUserPlantId($usr_id);
    $usr_dept_id = getDeptId($usr_id);
    if (!isDeptAccessRightsExist($vm_object_id, $usr_plant_id, $usr_dept_id, 'yes')) {
        $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
    }
    $download_time = display_datetime_format(date('Y-m-d G:i:s'));
    $org_web_obj = getActiveOrganizationObj();
    $org_web = $org_web_obj->website;
    $org_name = $org_web_obj->org_name;
    $lm_contact_obj = get_lm_contact_obj();
    $lm_web = $lm_contact_obj->website;
    $plant_logo = getPlantLogo($vm_master_obj->created_by_plant_id);

    $lm_doc_name = $vm_master_obj->lm_doc_name;
    $vm_number = $vm_master_obj->vm_no;

    $smarty->assign('vm_master_obj', $vm_master_obj);
    $smarty->assign('vm_plant_obj', (object) array_shift($vms_processor->get_vms_plants($vm_master_obj->vendor_org_id, $vm_master_obj->plant_id)));
    $smarty->assign('org_web_obj', $org_web_obj);
    $smarty->assign('date_time', $date_time = date('Y-m-d'));
    $smarty->assign('valid_to', getVendorApprovalExpiryYearDate());
    $smarty->assign('qa_approver', getFullName(get_workflow_action_user($vm_object_id, 'qa_approve')));

    class VMS_PDF extends TCPDF {

        public function Header() {

            //Atul Logo
            $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $image_file = $GLOBALS['plant_logo'];
            $this->SetAlpha(0.1);
            $this->Image($image_file, 105, 90, 75, 40, '', '', 'T', true, 1000);
            $this->SetAlpha(1);
        }
    }

    //*********** start Of pdf Object And Settings ***********//
    $pdf = new VMS_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator($lm_contact_obj->name);
    $pdf->SetAuthor($lm_contact_obj->name);
    $pdf->SetTitle($vm_master_obj->vm_no);
    $pdf->SetSubject("$vm_master_obj->lm_doc_short_name Report");
    $pdf->SetKeywords("$vm_master_obj->lm_doc_short_name Report");
    $pdf->SetMargins(4.6, 0, 4.6);
    $pdf->SetAutoPageBreak(FALSE, 0);

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    //*********** End Of pdf Object And Settings ***********//
    //*********** start Of Prinitng Contents ***********//
    // add a page
    $pdf->SetFont('arial', '', 12);
    // Image example with resizing
    $pdf->AddPage('L', 'A4');
    // Fetch Smarty template
    //$import_tpl = $smarty->fetch(_TEMPLATE_PATH_ . "vendor_certificate_file.file.tpl");
    $import_tpl = $smarty->fetch(dirname(__DIR__, 2) . '/file/templates/vendor_certificate_file.file.tpl');
    $pdf->writeHTML($import_tpl, true, false, false, false, '');
    ob_end_clean();
    if ($op_type === "d") {
        $pdf->Output("$vm_number-VAC.pdf", 'I');
    } else {
        $pdf->Output(_TMP_VAULT_ . str_replace('/', '-', $vm_number) . "-VAC.pdf", "F");
    }
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
