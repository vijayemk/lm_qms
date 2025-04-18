<?php
/**
 * Project:     Logicmind
 * File:        view_mom_review_meeting_file_l.file.php

* @author Sivaranjani.S
* @since 07/11/2019
* @package mrm
* @version 1.0
*/
require_once('includes/tcpdf/tcpdf.php');
require_once ('lib/ams/functions/Ams_Processor.func.php');

$am_object_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;
$am_master_obj = new DB_Public_lm_audit_master();
if($am_master_obj->get("object_id",$am_object_id)){
        $createtime =  date('Y-m-d G:i:s');
        $download_usr_id = $_SESSION['user_id'];
        $download_usr_dept = getDeptName($download_usr_id);
        $download_usr_name = getUserName($download_usr_id);
        $download_usr_full_name = getFullName($download_usr_id);
        $org_name = getActiveOrganizationName();
        $lm_web = $lm_contact_obj->website;
        
        $ams_process = new Ams_Processor();
        $open_meeting_details = $ams_process->get_open_meeting_details($open_meeting_object_id, $am_object_id);
        $closing_meeting_details = $ams_process->get_closing_meeting_details($closing_meeting_object_id, $am_object_id);
                
        $audit_number = $am_master_obj->audit_no;
        $am_department = getDeptName($am_master_obj->created_by);
        $initiator = getFullName($am_master_obj->created_by);
        $initiated_date = get_modified_date_time_format($am_master_obj->created_time);
        $objectives = $am_master_obj->objectives;
        $status = $am_master_obj->status;
 
        $audit_type = getAuditType($am_master_obj->audit_type_id);
        $audit_sub_type = getAuditSubType($am_master_obj->audit_sub_type_id);
        $audit_lead = getFullName($am_master_obj->audit_lead);
        $audit_date_from = get_modified_date_format($am_master_obj->audit_date_from);
        $audit_date_to = get_modified_date_format($am_master_obj->audit_date_to);
        $no_of_audit_days = $am_master_obj->no_of_audit_days;
        $audit_plan_details_list = $ams_process->get_audit_plan_details($am_object_id);
        
        if(!empty($sop_process->get_creater_id_digital_sign($am_object_id))){
            $creator = $sop_process->get_creater_id_digital_sign($am_object_id);
            $creator_name = getFullName($creator);    
            $creator_dept = getDeptName($creator);
            $creator_designation = getDesignationByUserId($creator);
            $created_time = $sop_process->get_created_time_digital_sign($am_object_id);
        } if(!empty($sop_process->get_approver_id_digital_sign($am_object_id))){
            $approver = $sop_process->get_approver_id_digital_sign($am_object_id);
            $approver_name = getFullName($approver);    
            $approver_dept = getDeptName($approver);
            $approver_designation = getDesignationByUserId($approver);
            $approved_time = $sop_process->get_approved_time_digital_sign($am_object_id);
        }
        
        if ($audit_type == "INTERNAL") {
            $audit_location = $ams_process->get_internal_audit_location($am_object_id);
        } elseif ($audit_type == "EXTERNAL") {
            $audit_location = $ams_process->get_external_audit_location($am_object_id);
        }
        
        if(!empty($audit_plan_details_list)){
            $audit_plan_markup = "";
            foreach($audit_plan_details_list as $key => $value) {
                $audit_plan_markup .= "<tr><td width=\"70px\" style=\"border:1px solid #000000;text-align: center;\">$value[count]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[date]</td><td width=\"230px\" style=\"border:1px solid #000000;text-align: center;\">$value[from_time]</td><td width=\"200px\" style=\"border:1px solid #000000;text-align: center;\">$value[to_time]</td><td width=\"453px\" style=\"border:1px solid #000000;text-align: justify;\">$value[plan]</td></tr>";
            }
        }
        
        $ams_markup .= "<tr><td width=\"270px\" style=\"border:1px solid #000000;text-align: center;\">$audit_number</td><td width=\"270px\" style=\"border:1px solid #000000;text-align: center;\">$initiator</td><td width=\"320px\" style=\"border:1px solid #000000;text-align: center;\">$am_department</td><td width=\"293px\" style=\"border:1px solid #000000;text-align: center;\">$initiated_date</td></tr>";

        
   // Extend the TCPDF class to create custom Header and Footer
    class MOM_REVIEW extends TCPDF {
        //Page header
        public function Header() {
            $hstyle = array('width' => 0.25, 'cap' => '', 'join' => '', 'dash' => '', 'color' => array(0,0,0));
            $this->Rect(15, 8, 325, 25,'D',array('all' => $hstyle));
            
            $image_file=_URL_."img/mrm_report_logo.jpg";
            $this->Image($image_file, 18, 10, 30, 21, 'JPEG', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Ln(7);
            // Position at 20 mm from top
            $this->SetY(20);
            // Set font
            $this->SetFont('arial', 'B', 10);
            // Title
            $this->SetTextColor(0, 0, 0);
            $this->Cell(0, 0, 'REPORT - AUDIT PLAN', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Ln(10);
        }
        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('arial', '', 10, true);
            $this->SetTextColor(0,0,0);
            
            // Page number
            $this->SetTextColor(0,0,0);
            $this->SetLineStyle(array('width' => 5, 'cap' => 'round', 'join' => 'round','dash'=>'0'));
            $this->Line(15, 235, 340, 235,$style= array('width'=>0.07,'color' => array(0, 0, 0)));
            $this->Cell(340, 8, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
            $this->Ln();

            // Download By
            $this->SetFont('Arial','B',8);
            $this->SetTextColor(255,195,195);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
            $this->Rotate(0,200,200);
            $this->Rotate(0);
            $this->Text(5,238,"Downloaded By [$GLOBALS[download_usr_full_name]] [$GLOBALS[download_usr_dept]] [$GLOBALS[createtime]]",FALSE,FALSE,TRUE,0,0,$align="C",FALSE,"",0,false,'T','M',FALSE);
            
            $this->SetFont('Arial','B',8);
            $this->SetTextColor(0, 0, 0);
            $this->Rotate(0,0,0);
            $this->Rotate(0);
            $this->Text(15,238,$GLOBALS['audit_number'],FALSE,FALSE,TRUE,0,0,$align="L",FALSE,"",0,false,'T','M',FALSE);
            $this->Ln();
            
            $image_file =_URL_."img/logo_pdf.jpg";
            $this->Image($image_file, 320,244, 16, 0, 'jpg', $GLOBALS['lm_web'], 'T', false, 300, '', false, false, 0, false, false, false);

            $this->SetFont('Arial','',6);
            $this->SetTextColor(0,0,0);
            $this->Rotate(0,200,200);
            $this->Rotate(0);
            $this->Text(15,244,"CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of $GLOBALS[org_name]",FALSE,FALSE,TRUE,0,0,$align="C",FALSE,"",0,false,'T','M',FALSE);
            $this->Ln();
        }
    }
    // create new PDF document
    $pdf = new MOM_REVIEW(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetProtection($permissions=array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'), $user_pass='', $owner_pass="", 0, null);
    
    // set document information
    $pdf->SetCreator("LogicMind");
    $pdf->SetAuthor('Logicmind');
    $pdf->SetTitle('LogicMind Solutions PDF');
    $pdf->SetSubject('Audit Plan Report');
    $pdf->SetKeywords('Audit Plan Report');

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
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

     // add a page
    $pdf->AddPage('L', 'B4'); 
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $my_tbl = <<<EODDEVIATION
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
             <tr>
                <td align="center"width="1153px" style="border:1px solid #000000;"><b> SECTION - 1: INITIATION OF AUDIT </b></td>
            </tr>
            <tr>
                <td align="center" width="270px" style="border:1px solid #000000;"><b>Audit No.</b></td>
                <td align="center" width="270px" style="border:1px solid #000000;"><b>Initiator</b></td>
                <td align="center" width="320px" style="border:1px solid #000000;"><b>Department</b></td>
                <td align="center" width="293px" style="border:1px solid #000000;"><b>Initiation Date</b></td>
            </tr>
        </thead>
        {$ams_markup}
    </table>
EODDEVIATION;
    if(isset($ams_markup)){
        $pdf->writeHTML($my_tbl, true, false, false, false, '');
    }
    
   $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $vendor_tbl = <<<EODAUDITSCHED
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
             <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b>SECTION - 2: AUDIT SCHEDULE </b></td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Audit Type</b></td>
                <td  width="883px" style="border:1px solid #000000;">$audit_type - $audit_sub_type</td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Audit Date (From-To)</b></td>
                <td  width="883px" style="border:1px solid #000000;">$audit_date_from - $audit_date_to</td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>No of Days</b></td>
                <td  width="883px" style="border:1px solid #000000;">$no_of_audit_days</td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Audit Location</b></td>
                <td  width="883px" style="border:1px solid #000000;">$audit_location</td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Audit Lead</b></td>
                <td  width="883px" style="border:1px solid #000000;">$audit_lead</td>
            </tr>
           <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Meeting Objectives</b></td>
                <td align="justify" width="883px" style="border:1px solid #000000;">$objectives</td>
           </tr>
           <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Status</b></td>
                <td  width="883px" style="border:1px solid #000000;">$status</td>
           </tr>
        </thead>
    </table>
EODAUDITSCHED;
        $pdf->writeHTML($vendor_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    
     $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $vendorr_tbl = <<<EODAUDITSCHED
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
             <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b> SIGNATURES </b></td>
            </tr>
            <tr>
                <td rowspan="2"  width="270px" style="border:1px solid #000000;text-align:center;line-height: 50px;"><b>Initiated By</b></td>
                <td  width="230px" style="border:1px solid #000000;"><b>Name</b></td>
                <td  width="200px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td  width="233px" style="border:1px solid #000000;"><b>Department</b></td>
                <td  width="220px" style="border:1px solid #000000;"><b>Date & Time</b></td>
           </tr>
            <tr>
                <td  width="230px" style="border:1px solid #000000;">$creator_name</td>
                <td  width="200px" style="border:1px solid #000000;">$creator_dept</td>
                <td  width="233px" style="border:1px solid #000000;">$creator_designation</td>
                <td  width="220px" style="border:1px solid #000000;">$created_time</td>
           </tr>
            <tr>
                <td rowspan="2"  width="270px" style="border:1px solid #000000;text-align:center;line-height: 50px;"><b>Approved By</b></td>
                <td   width="230px" style="border:1px solid #000000;"><b>Name</b></td>
                <td   width="200px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td   width="233px" style="border:1px solid #000000;"><b>Department</b></td>
                <td   width="220px" style="border:1px solid #000000;"><b>Date & Time</b></td>
           </tr>
            <tr>
                <td  width="230px" style="border:1px solid #000000;">$approver_name</td>
                <td  width="200px" style="border:1px solid #000000;">$approver_dept</td>
                <td  width="233px" style="border:1px solid #000000;">$approver_designation</td>
                <td  width="220px" style="border:1px solid #000000;">$approved_time</td>
           </tr>
        </thead>
    </table>
EODAUDITSCHED;
        $pdf->writeHTML($vendorr_tbl, true, false, false, false, '');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
   
    
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $audit_plan_tbl = <<<EODAPLAN
    <table cellspacing="0" cellpadding="6" border="0">
             <tr>
                <td align="center" width="1154px" style="border:1px solid #000000;"><b> SECTION - 3: AUDIT PLAN </b></td>
            </tr>
            <tr>
                 <td align="center" width="70px" style="border:1px solid #000000;"><b>S.No.</b></td>
                 <td align="center" width="200px" style="border:1px solid #000000;"><b>Date</b></td>
                 <td align="center" width="230px" style="border:1px solid #000000;"><b>From Time</b></td>
                 <td align="center" width="200px" style="border:1px solid #000000;"><b>To Time</b></td>
                 <td align="center" width="453px" style="border:1px solid #000000;"><b>Plan</b></td>
           </tr>
           {$audit_plan_markup}
    </table>
EODAPLAN;
     if(isset($audit_plan_markup)){
        $pdf->writeHTML($audit_plan_tbl, true, false, false, false, '');
     }else{
        $pdf->Ln();
        $pdf->SetFont('arial', 'B', 10, true);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(325, 5, "Audit Plan Details not available", 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();
        $pdf->Ln();
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    
   
        $pdf->SetFont('arial', 'B', 7, true);
        $pdf->SetTextColor(0,0,0);
        $pdf->MultiCell(325,5,"\n\n------------END OF DOCUMENT------------",0,'C',0,0,'','',false,0,FALSE,false,0,'T',false);
        ob_end_clean();
       //Close and output PDF document
        $pdf->Output("Audit Plan Report.pdf", 'I');
        //============================================================+
        // END OF FILE
        //============================================================+
    }else {
    $error_handler->raiseError("INVALID REQUEST");
}
    
?>


