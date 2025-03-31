<?php

/**
 * Project:     Logicmind
 * File:        view_msop_file.sop.php
 * @author Ananthakumar .V
 * @since 09/03/2019
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
if ($sop_process->is_sop_pdf_page_expired($sop_object_id, $sop_object_id, $access_id) == true) {
    //$error_handler->raiseError("PAGE EXPIRED");
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
    $sop_acronym = "STANDARD OPERATING PROCEDURE";
    $sop_supersedes = $sop_master->supersedes;
    $sop_type_desc = $sop_process->get_sop_type_desc($sop_master->sop_type);
    if (!empty($sop_master->effective_date)) {
        $sop_effective_date = get_modified_date_format($sop_master->effective_date);
    } else {
        $sop_effective_date = '-';
    }
    $copy_type = $sop_print_copy_obj->copy_type;

    $annexurelist = count($sop_process->get_annexurelist($sop_object_id));

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
        //$created_time = get_modified_date_format($sop_process->get_created_time_digital_sign($sop_object_id));
        $created_time = getModifiedDateTimeFormat($sop_process->get_created_time_digital_sign($sop_object_id), 'f16');
    }if (!empty($sop_process->get_reviewer_id_digital_sign($sop_object_id))) {
        $reviewer = $sop_process->get_reviewer_id_digital_sign($sop_object_id);
        $reviewer_name = getFullName($reviewer);
        $reviewer_dept = getDeptName($reviewer);
        $reviewer_designation = getDesignationByUserId($reviewer);
        //$reviewed_time = get_modified_date_format($sop_process->get_reviewed_time_digital_sign($sop_object_id));
        $reviewed_time = getModifiedDateTimeFormat($sop_process->get_reviewed_time_digital_sign($sop_object_id), 'f16');
    }if (!empty($sop_process->get_approver_id_digital_sign($sop_object_id))) {
        $approver = $sop_process->get_approver_id_digital_sign($sop_object_id);
        $approver_name = getFullName($approver);
        $approver_dept = getDeptName($approver);
        $approver_designation = getDesignationByUserId($approver);
        //$approved_time = get_modified_date_format($sop_process->get_approved_time_digital_sign($sop_object_id));
        $approved_time = getModifiedDateTimeFormat($sop_process->get_approved_time_digital_sign($sop_object_id), 'f16');
    }if (!empty($sop_process->get_authorizer_id_digital_sign($sop_object_id))) {
        $authorizer = $sop_process->get_authorizer_id_digital_sign($sop_object_id);
        $authorizer_name = getFullName($authorizer);
        $authorizer_dept = getDeptName($authorizer);
        $authorizer_designation = getDesignationByUserId($authorizer);
        $authorized_time = get_modified_date_format($sop_process->get_authorized_time_digital_sign($sop_object_id));
        $authorized_time = getModifiedDateTimeFormat($sop_process->get_authorized_time_digital_sign($sop_object_id), 'f16');
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
    }
    //Get the Format list
    $formatlist = count($sop_process->get_formatlist($sop_object_id));
    $pdf_lang = $sop_master->lang;
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
        'margin_bottom' => 70,
        'margin_header' => 5,
        'margin_footer' => 1,
        'format' => 'B4-P',
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
    $pagetotal = $mpdf->AliasNbPages('[pagetotal]');

    /** Cover Page */
    $mpdf->AddPage();
    $mpdf->Ln(-45);
    $mpdf->WriteHTML('
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td width="100%" style="font-size: 15px;font-family: muli;font-weight: bold;color:' . $copy_type_hex . ';text-align:right;">' . $copy_type . '</td>
            </tr>
        </table>
    ');
    $mpdf->Ln(60);
    $mpdf->WriteHTML('
        <table width="100%" style="border: 0px solid #000000;border-collapse: collapse;">
            <tr>
                <td width="100%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000000;text-align:center;"><a href=http://' . $org_web . '><img alt="logo" src="' . $plant_logo . '" style="float:left; padding:1px; height:100px; width:200px";/></a></td>
            </tr>
        </table>
        <br>
        <table width="100%" style="padding:7px;background-color: #002060;">
            <tr>
                <td width="100%" style="padding:7px;font-size: 27px;font-family: muli;font-weight: bold;color:#FFFFFF;text-align:center;border:1px solid #FFFFFF;">' . $sop_name . '</td>
            </tr>
        </table>
    ');
    $mpdf->Ln(10);
    $mpdf->WriteHTML('
        <table width="100%" style="border: 0.5px solid #000000;border-collapse: collapse;">
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">SOP TITLE</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">' . $sop_name . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">SOP NUMBER</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $sop_no . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">STATUS</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $published_status . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">VERSION NUMBER</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $sop_revision . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">EFFECTIVE DATE</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $sop_effective_date . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">NEXT REVIEW DATE</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $sop_expiry_date . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">BUSINESS | FUNCTION</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $sop_plant . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">DEPARTMENT | SUB DEPARTMENT</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;">  ' . $creator_dept . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">INITIATED BY</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;"><a href="' . $server_addr . '   ' . $valid_creator_digital_sign_info . '"><img alt="logo" src="' . $valid_creator_digital_sign_path . '" style="float:left; height:14px; width:13px";/></a> ' . $creator_name . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">REVIEWED BY</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;"><a href="' . $server_addr . '   ' . $valid_reviewer_digital_sign_info . '"><img alt="logo" src="' . $valid_reviewer_digital_sign_path . '" style="float:left; height:14px; width:13px";/></a> ' . $reviewer_name . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">APPROVED BY</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;"><a href="' . $server_addr . '   ' . $valid_approver_digital_sign_info . '"><img alt="logo" src="' . $valid_approver_digital_sign_path . '" style="float:left; height:14px; width:13px";/></a> ' . $approver_name . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">AUTHORIZED BY</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;"><a href="' . $server_addr . '   ' . $valid_authoriZer_digital_sign_info . '"><img alt="logo" src="' . $valid_authorizer_digital_sign_path . '" style="float:left; height:14px; width:13px";/></a> ' . $authorizer_name . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">FORMAT LIST</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;"> ' . $formatlist . '</td>
            </tr>
            <tr>
                <td width="40%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:left;border:1px solid #000000;">ANNEXURE LIST</td>
                <td width="60%" style="padding:10px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:left;border:1px solid #000000;"> ' . $annexurelist . '</td>
            </tr>
        </table>');

    /** Define the Header/Footer* */
    $mpdf->SetHTMLHeader('
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td width="100%" style="font-size: 15px;font-family: muli;font-weight: bold;color:' . $copy_type_hex . ';text-align:right;">' . $copy_type . '</td>
            </tr>
        </table>
        <table width="100%" style="border: 0.5px solid #000000;border-collapse: collapse;">
            <tr>
                <td rowspan="5" width="10%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000000;text-align:center;"><a href=http://' . $org_web . '><img alt="logo" src="' . $plant_logo . '" style="float:left; padding:1px; height:90px; width:150px";/></a></td>
                <td rowspan="2" width="50%" style="padding:16px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">STANDARD OPERATING PROCEDURE</td>
                <td width="17%" style="padding:6px;font-size: 13px;font-family: muli;font-normal: bold;color:#000000;text-align:center;border:1px solid #000000;">SOP No</td>
                <td width="23%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;"> ' . $sop_no . "/" . $sop_revision . '</td>
            </tr>
            <tr>
                <td width="17%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Status</td>
                <td width="23%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $published_status . '</td>
            </tr>
            <tr>
                <td rowspan="3" width="50%" style="padding:5px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $sop_name . '</td>
                <td width="17%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Effective Date</td>
                <td width="23%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $sop_effective_date . '</td>
            </tr>
            <tr>
                <td width="17%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Next Review Date</td>
                <td width="23%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">' . $sop_expiry_date . '</td>
            </tr>
            <tr>
                <td width="17%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: normal;color:#000000;text-align:center;border:1px solid #000000;">Page Number</td>
                <td width="23%" style="padding:6px;font-size: 13px;font-family: muli;font-weight: bold;color:#000000;text-align:center;border:1px solid #000000;">{PAGENO} of {nbpg}</td>
            </tr>
        </table>
    ');
    $mpdf->AddPage();
    $mpdf->SetHTMLFooter('
    <div style="background-color:#b8b8b8;padding:1px; align=left;"><span style="color:#ffffff"><b>&nbsp; Digitally Signed By</b></span></div>
    <table width="100%" style="margin: 7px 0px 5px 0px;border-bottom: 2px dotted #3cb3e6;padding-bottom:5px;">
        <tr>
            <td width="10%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;">Prepared By </td>
            <td width="3%" style="font-size: 8px;font-family: muli;font-weight: bold;color:#000080;"><a href="' . $server_addr . '   ' . $valid_creator_digital_sign_info . '"><img alt="logo" src="' . $valid_creator_digital_sign_path . '" style="float:left; height:18px; width:17px";/></a></td>
            <td width="38%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $creator_name . '</td>
            <td width="22%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $creator_designation . '</td>
            <td width="16%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $creator_dept . '</td>
            <td width="11%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $created_time . '</td>
        </tr>
        <tr>
            <td width="100%" colspan="6" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;"></td>
        </tr>
    </table>
    <table width="100%" style="margin: 7px 0px 5px 0px;border-bottom: 2px dotted #3cb3e6;padding-bottom:5px;">
        <tr>
            <td width="10%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;">Checked By </td>
            <td width="3%" style="font-size: 8px;font-family: muli;font-weight: bold;color:#000080;"><a href="' . $server_addr . '   ' . $valid_reviewer_digital_sign_info . '"><img alt="logo" src="' . $valid_reviewer_digital_sign_path . '" style="float:left; height:18px; width:17px";/></a></td>
            <td width="38%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $reviewer_name . '</td>
            <td width="22%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $reviewer_designation . '</td>
            <td width="16%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $reviewer_dept . '</td>
            <td width="11%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $reviewed_time . '</td>
        </tr>
        <tr>
            <td width="100%" colspan="6" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;"></td>
        </tr>
    </table>
    <table width="100%" style="margin: 7px 0px 5px 0px;border-bottom: 2px dotted #3cb3e6;padding-bottom:5px;">
        <tr>
            <td width="10%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;">Approved By </td>
            <td width="3%" style="font-size: 8px;font-family: muli;font-weight: bold;color:#000080;"><a href="' . $server_addr . '   ' . $valid_approver_digital_sign_info . '"><img alt="logo" src="' . $valid_approver_digital_sign_path . '" style="float:left; height:18px; width:17px";/></a></td>
            <td width="38%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $approver_name . '</td>
            <td width="22%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $approver_designation . '</td>
            <td width="16%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $approver_dept . '</td>
            <td width="11%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $approved_time . '</td>
        </tr>
        <tr>
            <td width="100%" colspan="6" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;"></td>
        </tr>
    </table>
    <table width="100%" style="margin: 7px 0px 5px 0px;border-bottom: 2px dotted #3cb3e6;padding-bottom:5px;">
        <tr>
            <td width="10%" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;">Authorized By </td>
            <td width="3%" style="font-size: 8px;font-family: muli;font-weight: bold;color:#000080;"><a href="' . $server_addr . '   ' . $valid_authorizer_digital_sign_info . '"><img alt="logo" src="' . $valid_authorizer_digital_sign_path . '" style="float:left; height:18px; width:17px";/></a></td>
            <td width="38%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $authorizer_name . '</td>
            <td width="22%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $authorizer_designation . '</td>
            <td width="16%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $authorizer_dept . '</td>
            <td width="11%" style="font-size: 12px;font-family: muli;font-weight: bold;color:#000080;">' . $authorized_time . '</td>
        </tr>
        <tr>
            <td width="100%" colspan="6" style="font-size: 10px;font-family: muli;font-weight: bold;color:#000080;"></td>
        </tr>
    </table>
    <table width="100%" style="margin: 5px 0px 0px 0px;padding:1px;">
        <tr>
            <td width="100%" style="text-align: center;font-size: 12px;font-family: muli;font-weight: bold;color: #ffc3c3;"> Downloaded By [' . $usr_full_nmae . '] [' . $usr_dept . '] [' . $createtime . ']</td>
        </tr>
    </table>
    <div style="width: 100%; text-align:center;font-size: 12px;font-family: muli;padding:2px;"> <span >For restricted circulation only</span><span ></span><br>
    </div>
    ');
    $mpdf->allow_charset_conversion = true;
    $mpdf->charset_in = 'utf-8';

    //$mpdf->AddPage();
    if (!empty($sop_details->sop_content)) {
        $mpdf->WriteHTML($sop_details->sop_content);
    }
    $mpdf->Ln();
    $mpdf->WriteHTML('
    <div style="width: 100%; font-size: 9px;font-weight: bold;text-align:center;padding:2px;"> <p ><br>------------END OF DOCUMENT------------</p><br></div>
    ');
    $mpdf->Output("$sop_no.pdf", 'I');
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
