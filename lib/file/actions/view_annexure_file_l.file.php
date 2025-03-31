<?php

/**
 * Project:     Logicmind
 * File:        view_mannexure_file_l.sop.php
 * @author Ananthakumar .V
 * @since 20/03/2019
 * @package file
 * @version 1.0
 */
ini_set("pcre.backtrack_limit", "10000000");
//ini_set ('max_execution_time', 1200);

error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}
require_once('includes/mpdf/vendor/autoload.php');
require_once ('lib/sop/functions/Sop_Processor.func.php');

$appName = explode("/", $_SERVER['REQUEST_URI'])[1];
$server_addr = "http://www.{$_SERVER['SERVER_NAME']}/$appName/";

$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$sop_copy_type = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;
$annexure_object_id = (isset($_REQUEST['annexure_id'])) ? $_REQUEST['annexure_id'] : null;
$access_id = (isset($_REQUEST['access_id'])) ? $_REQUEST['access_id'] : null;

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

/** Restrict to download if access frequently in future */
if ($sop_process->is_sop_pdf_page_expired($sop_object_id, $annexure_object_id, $access_id) == true) {
    $error_handler->raiseError("PAGE EXPIRED");
}

/** Department Restriction */
if (!check_doc_dept_access($sop_object_id, $dept_id, 'yes')) {
    $error_handler->raiseError("DEPARTMENT VIEWING RESTRICTED");
}

$sop_print_copy_obj = new DB_Public_lm_sop_print_copy();
if (!$sop_print_copy_obj->get("object_id", $sop_copy_type)) {
    $error_handler->raiseError("INVALID COPY TYPE");
}

if (!pdf_check_access($username, $sop_copy_type, 'download')) {
    $error_handler->raiseError("PERMISSION DENIED TO DOWNLOAD THIS COPY TYPE");
}
if ($sop_process->is_user_can_download_sop_print_label($sop_object_id, $sop_print_copy_obj->label_type, $sop_print_copy_obj->is_enabled) == false) {
    $error_handler->raiseError("INVALID REQUEST");
}
$print_option = pdf_check_access($username, $sop_copy_type, 'enable_print');

$sop_master = new DB_Public_lm_sop_master();
if ($sop_master->get("sop_object_id", $sop_object_id)) {
    $published_status = $sop_process->get_published_status($sop_object_id);
    if (($published_status == "SOP Expired" || $published_status == "Dropped" || $published_status == "Cancelled" || $published_status == "Transferred") && !check_access($username, 'expired_sop', 'yes')) {
        $error_handler->raiseError("expired_sop");
    }
    $org_name = getActiveOrganizationName();
    $sop_details = new DB_Public_lm_sop_details();
    $sop_details->get("sop_object_id", $sop_object_id);

    $sop_no = $sop_process->get_sop_no($sop_object_id);
    $sop_plant = getPlantShortName($sop_master->sop_plant);
    $plant_logo = getPlantLogo($sop_master->sop_plant);

    if (!empty($sop_master->expiry_date)) {
        $sop_expiry_date = get_modified_date_format($sop_master->expiry_date);
    } else {
        $sop_expiry_date = "-";
    }
    $reason_for_revision = get_sop_creation_reason($sop_master->reason_for_revision);
    $sop_revision = $sop_master->revision;
    $sop_name = $sop_master->sop_name;
    $sop_supersedes = $sop_master->supersedes;
    $sop_type_desc = $sop_process->get_sop_type_desc($sop_master->sop_type);
    if (!empty($sop_master->effective_date)) {
        $sop_effective_date = get_modified_date_format($sop_master->effective_date);
    } else {
        $sop_effective_date = '-';
    }
    $copy_type = $sop_print_copy_obj->copy_type;

    $copy_type_hex = $sop_print_copy_obj->copy_type_color;
    $copy_type_rgb = hex2rgb($sop_print_copy_obj->copy_type_color);
    $copy_type_rgb1 = $copy_type_rgb[0];
    $copy_type_rgb2 = $copy_type_rgb[1];
    $copy_type_rgb3 = $copy_type_rgb[2];

    // Invalid Sign
    $invalid_digital_sign_info = "Not Yet Digitally Signed - Invalid Document";
    $invalid_image_path = 'img/custom_logicmind_img/invalid.jpg';
    $valid_image_path = 'img/custom_logicmind_img/valid.jpg';

    //strlen , mb_strimwidth	 ("Hello World", 0, 10, "...")
    if (!empty($sop_process->get_creater_id_digital_sign($sop_object_id))) {
        $creator = $sop_process->get_creater_id_digital_sign($sop_object_id);
        $creator_name = getFullName($creator);
        $creator_dept = getDeptName($creator);
        $creator_designation = getDesignationByUserId($creator);
        $created_time = $sop_process->get_created_time_digital_sign($sop_object_id);
    }if (!empty($sop_process->get_reviewer_id_digital_sign($sop_object_id))) {
        $reviewer = $sop_process->get_reviewer_id_digital_sign($sop_object_id);
        $reviewer_name = getFullName($reviewer);
        $reviewer_dept = getDeptName($reviewer);
        $reviewer_designation = getDesignationByUserId($reviewer);
        $reviewed_time = $sop_process->get_reviewed_time_digital_sign($sop_object_id);
    }if (!empty($sop_process->get_approver_id_digital_sign($sop_object_id))) {
        $approver = $sop_process->get_approver_id_digital_sign($sop_object_id);
        $approver_name = getFullName($approver);
        $approver_dept = getDeptName($approver);
        $approver_designation = getDesignationByUserId($approver);
        $approved_time = $sop_process->get_approved_time_digital_sign($sop_object_id);
    }if (!empty($sop_process->get_authorizer_id_digital_sign($sop_object_id))) {
        $authorizer = $sop_process->get_authorizer_id_digital_sign($sop_object_id);
        $authorizer_name = getFullName($authorizer);
        $authorizer_dept = getDeptName($authorizer);
        $authorizer_designation = getDesignationByUserId($authorizer);
        $authorized_time = $sop_process->get_authorized_time_digital_sign($sop_object_id);
    }
    // Valid sign
    if (!empty($creator)) {
        $valid_creator_digital_sign_info = "Digitally Signed Information \n SOP NO : $sop_no \nCreated By : $creator_name \nDesigntation : $creator_designation \nDepartment : $creator_dept \nDate : $created_time";
        $valid_creator_digital_sign_path = $valid_image_path;
    } else {
        $valid_creator_digital_sign_info = $invalid_digital_sign_info;
        $valid_creator_digital_sign_path = $invalid_image_path;
    }
    if (!empty($reviewer)) {
        $valid_reviewer_digital_sign_info = "Digitally Signed Information \nSOP NO : $sop_no \nReviewed By : $reviewer_name \nDesigntation : $reviewer_designation \nDepartment : $reviewer_dept \nDate : $reviewed_time";
        $valid_reviewer_digital_sign_path = $valid_image_path;
    } else {
        $valid_reviewer_digital_sign_info = $invalid_digital_sign_info;
        $valid_reviewer_digital_sign_path = $invalid_image_path;
    }
    if (!empty($approver)) {
        $valid_approver_digital_sign_info = "Digitally Signed Information \nSOP NO : $sop_no \nApproved By : $approver_name \nDesigntation : $approver_designation \nDepartment : $approver_dept \nDate : $approved_time";
        $valid_approver_digital_sign_path = $valid_image_path;
    } else {
        $valid_approver_digital_sign_info = $invalid_digital_sign_info;
        $valid_approver_digital_sign_path = $invalid_image_path;
    }
    if (!empty($authorizer)) {
        $valid_authorizer_digital_sign_info = "Digitally Signed Information \nSOP NO : $sop_no \nAuthorized By : $authorizer_name \nDesigntation : $authorizer_designation \nDepartment : $authorizer_dept \nDate : $authorized_time";
        $valid_authorizer_digital_sign_path = $valid_image_path;
    } else {
        $valid_authorizer_digital_sign_info = $invalid_digital_sign_info;
        $valid_authorizer_digital_sign_path = $invalid_image_path;
        $authorized_time = "-";
    }
    //Get the Annexure list
    $annexure_master = new DB_Public_lm_sop_annexure_master();
    if ($annexure_master->get("annexure_object_id", $annexure_object_id)) {
        if ($annexure_master->orientation != "L") {
            $error_handler->raiseError("INVALID REQUEST");
        }
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }

    $pdf_lang = $annexure_master->lang;
    if ($pdf_lang == "en") {
        $rfont = 'muli.ttf';
        $bfont = 'mulib.ttf';
        $ifont = 'mulii.ttf';
        $bifont = 'mulibi.ttf';
    } elseif ($pdf_lang == "guj" || $pdf_lang == "hin" || $pdf_lang == "kan" || $pdf_lang == "mal" || $pdf_lang == "mar") {
        $rfont = 'Nirmala.ttf';
        $bfont = 'NirmalaB.ttf';
    } else {
        $rfont = 'muli.ttf';
        $bfont = 'mulib.ttf';
        $ifont = 'mulii.ttf';
        $bifont = 'mulibi.ttf';
    }
    /*     * MPDF Font Configuration * */
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];
    /*     * MPDF Object * */
    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [__DIR__]),
        'fontdata' => $fontData + ['muli' => [
        'R' => $rfont,
        'B' => $bfont,
        'I' => $ifont,
        'BI' => $bifont,
    ]],
        'mode' => 'utf-8',
        'margin_left' => 15,
        'margin_right' => 15,
        'margin_top' => 50,
        'margin_bottom' => 15,
        'margin_header' => 5,
        'margin_footer' => 1,
        'format' => 'B4-L',
        'default_font' => 'muli',
    ]);
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetCreator("LogicMind");
    $mpdf->SetAuthor('Logicmind');
    $mpdf->SetTitle('LogicMind Digitally Signed PDF');
    $mpdf->SetSubject('SOP Details');
    $mpdf->SetKeywords('SOP Details');
    if ($print_option) {
        $mpdf->SetProtection(array('print'));
    } else {
        $mpdf->SetProtection(array());
    }
    /** Define the Header/Footer* */
    $mpdf->SetHTMLHeader('
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td width="100%" style="font-size: 15px;font-family: muli;font-weight: bold;color:' . $copy_type_hex . ';text-align:right;">' . $copy_type . '</td>
            </tr>
        </table>
        <table width="100%" style="border: 0.5px solid #000000;border-collapse: collapse;">
            <tr>
                <td rowspan="4" width="10%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000000;text-align:center;"><a href=http://' . $org_web . '><img alt="logo" src="' . $plant_logo . '" style="float:left; padding:1px; height:90px; width:150px";/></a></td>
                <td rowspan="2" width="50%" style="padding:16px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">STANDARD OPERATING PROCEDURE</td>
                <td width="17%" style="padding:8px;font-size: 13px;font-family: muli;font-normal: bold;color:#000000;text-align:center;border:1px solid #000000;">Annexure No</td>
                <td width="23%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $sop_process->get_sop_annexure_no($annexure_master->annexure_object_id) . '</td>
            </tr>
            <tr>
                <td width="17%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Status</td>
                <td width="23%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $published_status . '</td>
            </tr>
            <tr>
                <td rowspan="2" width="50%" style="padding:5px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $annexure_master->annexure_name . '</td>
                <td width="17%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Effective Date</td>
                <td width="23%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $sop_effective_date . '</td>
            </tr>
            <tr>
                <td width="17%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Next Review Date</td>
                <td width="23%" style="padding:8px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $sop_expiry_date . '</td>
            </tr>
        </table>
    ');
    $mpdf->SetHTMLFooter('
    <table width="100%" style="margin: 7px 0px 5px 0px;border-bottom: 1px solid #000000;padding-bottom:5px;">
        <tr>
            <td width="100%" colspan="6" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;"></td>
        </tr>
    </table>
    <table width="100%" style="margin: 5px 0px 0px 0px;padding:1px;">
        <tr>
            <td width="15%" style="font-size: 12px;font-family: muli;font-weight: bold;">' . $sop_no . '</td>
            <td width="75%" style="text-align: center;font-size: 12px;font-family: muli;font-weight: bold;color: #ffc3c3;">Downloaded By [' . $usr_full_nmae . '] [' . $usr_dept . '] [' . $createtime . ']</td>
            <td width="10%" align="right" style="font-size: 12px;font-family: muli;">Page {PAGENO}/{nbpg}</td>
        </tr>
    </table>
    <div style="width: 100%; text-align:center;font-size: 7px;font-family: muli;padding:2px;"> <span >CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of ' . $org_name . '</span><span ></span><br>
    </div>
    ');
    $mpdf->AddPage();
    //$mpdf->ln();
    $sop_annexure_details = new DB_Public_lm_sop_annexure_details();
    $sop_annexure_details->get("annexure_object_id", $annexure_master->annexure_object_id);
    if ($annexure_master->status == "Enabled") {
        $annexure_details = $sop_annexure_details->annexure_content;
    } else {
        $error_message = <<<ENDOFSTRING
            <div>
                <table width="100%" style="border: 0px solid #000000;border-collapse: collapse;">
                    <tr>
                        <td style="text-align:center;color:red;">
                           Annexure Has been Removed
                        </td>
                    </tr>
                </table>
            </div>
ENDOFSTRING;
        $annexure_details = $error_message;
    }
    if (!empty($annexure_details)) {
        $mpdf->WriteHTML($annexure_details);
    }
    $mpdf->Output("$sop_no-Annexure.pdf", 'I');
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
