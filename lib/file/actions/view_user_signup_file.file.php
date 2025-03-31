<?php

/**
 * Project:     Logicmind
 * File:        view_user_signup_file.file.php

 * @author Ananthakumar .V
 * @since 26/05/2017
 * @package admin
 * @version 1.0
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

require_once('includes/tcpdf/tcpdf.php');
require_once ('lib/sop/functions/Sop_Processor.func.php');
$createtime = date('Y-m-d G:i:s');
$download_usr_id = $_SESSION['user_id'];
$download_usr_dept = getDeptName($download_usr_id);
$download_usr_name = getUserName($download_usr_id);
$download_usr_full_name = getFullName($download_usr_id);
$org_name = getActiveOrganizationName();
$lm_contact_obj = get_lm_contact_obj();
$lm_web = $lm_contact_obj->website;

$signup_user_id = (isset($_REQUEST['signup_user_id'])) ? $_REQUEST['signup_user_id'] : null;
$user_obj = new DB_Public_users();
if ($user_obj->get("user_id", $signup_user_id)) {
    if ($user_obj->account_status == "enable") {
        $signup_obj = new DB_Public_user_signup();
        $signup_obj->get("user_id", $signup_user_id);
        $signup_object_id = $signup_obj->object_id;

        $user_name = $user_obj->user_name;
        $full_name = $user_obj->full_name;
        $emp_id = $user_obj->emp_id;
        $user_department = getDeptName($signup_user_id);
        $user_designation = getDesignation($user_obj->designation_id);
        $active_organization = getActiveOrganizationName();
        $user_organization = getOrganization($user_obj->org_id);
        $user_plant = getPlantName($user_obj->plant_id);
        $plant_logo = getPlantLogo($user_obj->plant_id);
        $email = $user_obj->email;
        $requested_by = getFullName($signup_obj->creator);
        $requested_date = get_modified_date_time_format($signup_obj->created_time);
        $request_no = $signup_obj->request_no;
        $account_status = $user_obj->account_status;
        if (isset($request_no)) {
            $request_no = $signup_obj->request_no;
        } else {
            $request_no = "-";
        }
        if ($account_status == "enable") {
            $account_status = "Active";
        } else {
            $account_status = "Disabled";
        }

        if (!empty($sop_process->get_creater_id_digital_sign($signup_object_id))) {
            $creator = $sop_process->get_creater_id_digital_sign($signup_object_id);
            $creator_name = getFullName($creator);
            $creator_dept = getDeptName($creator);
            $creator_designation = getDesignationByUserId($creator);
            $created_time = $sop_process->get_created_time_digital_sign($signup_object_id);
        }if (!empty($sop_process->get_reviewer_id_digital_sign($signup_object_id))) {
            $reviewer = $sop_process->get_reviewer_id_digital_sign($signup_object_id);
            $reviewer_name = getFullName($reviewer);
            $reviewer_dept = getDeptName($reviewer);
            $reviewer_designation = getDesignationByUserId($reviewer);
            $reviewed_time = $sop_process->get_reviewed_time_digital_sign($signup_object_id);
        }if (!empty($sop_process->get_approver_id_digital_sign($signup_object_id))) {
            $approver = $sop_process->get_approver_id_digital_sign($signup_object_id);
            $approver_name = getFullName($approver);
            $approver_dept = getDeptName($approver);
            $approver_designation = getDesignationByUserId($approver);
            $approved_time = $sop_process->get_approved_time_digital_sign($signup_object_id);
        }if (!empty($sop_process->get_signup_copy_user_id_digital_sign($signup_object_id))) {
            $activator = $sop_process->get_signup_copy_user_id_digital_sign($signup_object_id);
            $activator_name = getFullName($activator);
            $activator_dept = getDeptName($activator);
            $activator_designation = getDesignationByUserId($activator);
            $activated_time = $sop_process->get_signup_copy_activated_time_digital_sign($signup_object_id);
        }
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }

    // Extend the TCPDF class to create custom Header and Footer
    class SIGNUP_PDF extends TCPDF {

        //Page header
        public function Header() {
            $hstyle = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
            $this->Rect(15, 8, 185, 25, 'D', array('all' => $hstyle));

            //$image_file = _URL_ . "img/custom_logicmind_img/logo.png";
            $this->Image($GLOBALS['plant_logo'], 18, 10, 40, 15, '', $_SESSION['org_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Ln(7);
            // Set font
            $this->SetFont('arial', 'B', 10);
            // Title
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 0, 'USER SIGNUP FORM', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
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
    $pdf = new SIGNUP_PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetProtection($permissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass = '', $owner_pass = "", 0, null);

    // set document information
    $pdf->SetCreator("LogicMind");
    $pdf->SetAuthor('Logicmind');
    $pdf->SetTitle('LogicMind Solutions PDF');
    $pdf->SetSubject('User Signup Details');
    $pdf->SetKeywords('User Signup Details');

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
    $pdf->MultiCell(120, 8, "", 0, 'C', 0, 1, $pdf->GetX(), $pdf->GetY(), false, 0, FALSE, false, 0, 'M', true);
    $pdf->Ln();

    $style3 = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0, 0, 0));
    $pdf->Rect(15, 45, 185, 65, 'D', array('all' => $style3));

    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 5, 'Request No. :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(85, 5, $GLOBALS['request_no'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(27, 5, 'Status :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(48, 5, $GLOBALS['account_status'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 5, 'Full Name :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(85, 5, $GLOBALS['full_name'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(27, 5, 'User Name :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(48, 5, $GLOBALS['user_name'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 5, 'Department :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(85, 5, $GLOBALS['user_department'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(27, 5, 'Emp. Id :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(48, 5, $GLOBALS['emp_id'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 5, 'Organization :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(85, 5, $GLOBALS['user_organization'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(27, 5, 'Plant :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(48, 5, $GLOBALS['user_plant'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 5, 'Designation :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(85, 5, $GLOBALS['user_designation'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(25, 5, 'Email ID :', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(85, 5, $GLOBALS['email'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', '', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(27, 5, '', 0, false, 'R', 0, '', 0, false, 'M', 'M');
    $pdf->SetFont('arial', 'B', 10, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(48, 5, '', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    if (empty($creator)) {
        $pdf->Ln();
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(180, 5, "Account activated manually by Admin", 0, false, 'C', 0, '', 0, false, 'M', 'M');
    } else {
        $pdf->SetFont('arial', 'B', 10);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFillColor(67, 179, 230);
        $pdf->MultiCell(185, 0, 'Digitally Signed By : ', 0, 'L', 1, 1, '', $pdf->GetY() + 5, true, 0, FALSE, false, 0, 'T', false);
        $pdf->Ln();
        $pdf->Ln();

        //Valid Digital Sign Info
        if (!empty($creator)) {
            $valid_creator_digital_sign_info = "Digitally Signed Information \nRequest No : $request_no \nCreated By : $creator_name \nDesigntation : $creator_designation \nDepartment : $creator_dept \nDate : $created_time";
        }if (!empty($reviewer)) {
            $valid_reviewer_digital_sign_info = "Digitally Signed Information \nRequest No : $request_no \nReviewed By : $reviewer_name \nDesigntation : $reviewer_designation \nDepartment : $reviewer_dept \nDate : $reviewed_time";
        }if (!empty($approver)) {
            $valid_aprover_digital_sign_info = "Digitally Signed Information \nRequest No : $request_no \nApproved By : $approver_name \nDesigntation : $approver_designation \nDepartment : $approver_dept \nDate : $approved_time";
        }if (!empty($activator)) {
            $valid_activator_digital_sign_info = "Digitally Signed Information \nRequest No : $request_no \nActivated By : $activator_name \nDesigntation : $activator_designation \nDepartment : $activator_dept \nDate : $activated_time";
        }
        $valid_image_path = 'img/custom_logicmind_img/valid.jpg';
        //Invalid Digital Sign Info
        $invalid_digital_sign_info = "Not Yet Digitally Signed - Invalid Docuemnt";
        $invalid_image_path = 'img/custom_logicmind_img/invalid.jpg';

        $pdf->SetFont('arial', 'B', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($creator_name)) {
            $pdf->Image(_URL_ . $valid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $valid_creator_digital_sign_info, '', true, 200, '', false, false, 0, false, false, false);
        } else {
            $pdf->Image(_URL_ . $invalid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $invalid_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        }

        $pdf->Cell(33, 5, "Created By ", 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('arial', '', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($creator)) {
            $pdf->Cell(72, 5, $creator_name, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(30, 5, $creator_designation, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(22, 5, $creator_dept, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(33, 5, $created_time, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        }
        $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
        $pdf->Line(15, $pdf->GetY() + 5, 200, $pdf->GetY() + 5, $style = array('width' => 0.05, 'color' => array(60, 179, 230)));
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('arial', 'B', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($reviewer_name)) {
            $pdf->Image(_URL_ . $valid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $valid_reviewer_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        } else {
            $pdf->Image(_URL_ . $invalid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $invalid_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        }
        $pdf->Cell(33, 5, "Reviewed By ", 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('arial', '', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($reviewer)) {
            $pdf->Cell(72, 5, $reviewer_name, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(30, 5, $reviewer_designation, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(22, 5, $reviewer_dept, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(33, 5, $reviewed_time, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        }
        $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
        $pdf->Line(15, $pdf->GetY() + 5, 200, $pdf->GetY() + 5, $style = array('width' => 0.05, 'color' => array(60, 179, 230)));
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('arial', 'B', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($approver_name)) {
            $pdf->Image(_URL_ . $valid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $valid_aprover_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        } else {
            $pdf->Image(_URL_ . $invalid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $invalid_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        }
        $pdf->Cell(33, 5, "Approved By ", 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('arial', '', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($approver)) {
            $pdf->Cell(72, 5, $approver_name, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(30, 5, $approver_designation, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(22, 5, $approver_dept, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(33, 5, $approved_time, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        }
        $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
        $pdf->Line(15, $pdf->GetY() + 5, 200, $pdf->GetY() + 5, $style = array('width' => 0.05, 'color' => array(60, 179, 230)));
        $pdf->Ln();
        $pdf->Ln();

        $pdf->SetFont('arial', 'B', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($activator_name)) {
            $pdf->Image(_URL_ . $valid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $valid_activator_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        } else {
            $pdf->Image(_URL_ . $invalid_image_path, $pdf->GetX() + 25, $pdf->GetY() - 2.2, 4, 4, 'JPG', $invalid_digital_sign_info, '', true, 150, '', false, false, 0, false, false, false);
        }
        $pdf->Cell(33, 5, "Activated By ", 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('arial', '', 8);
        $pdf->SetTextColor(0, 0, 128);
        if (!empty($activator)) {
            $pdf->Cell(72, 5, $activator_name, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(30, 5, $activator_designation, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(22, 5, $activator_dept, 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $pdf->Cell(33, 5, $activated_time, 0, false, 'L', 0, '', 0, false, 'M', 'M');
        }
        $pdf->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round', 'dash' => '2'));
        $pdf->Line(15, $pdf->GetY() + 5, 200, $pdf->GetY() + 5, $style = array('width' => 0.05, 'color' => array(60, 179, 230)));
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('arial', 'B', 7, true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(185, 5, "\n\n------------END OF DOCUMENT------------", 0, 'C', 0, 0, '', '', false, 0, FALSE, false, 0, 'T', false);
    //Close and output PDF document
    ob_end_clean();
    $pdf->Output("$emp_id.pdf", 'I');
    //============================================================+
    // END OF FILE
    //============================================================+
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
