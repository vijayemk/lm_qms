<?php
/**
 * Project:     Logicmind
 * File:        view_ams_final_report_file.file.php

* @author Sivaranjani.S
* @since 07/11/2019
* @package ams
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
        
        $doc_file_processor_object = new Doc_File_Processor();
        $fileobjectarray = $doc_file_processor_object->getLmAmsDocFileObjectArray($am_object_id);
        
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
        
        $agenda_list = $ams_process->get_ams_agenda_list($am_object_id, null, null, null, null);
        
        $ams_markup .= "<tr><td width=\"270px\" style=\"border:1px solid #000000;text-align: center;\">$audit_number</td><td width=\"270px\" style=\"border:1px solid #000000;text-align: center;\">$initiator</td><td width=\"320px\" style=\"border:1px solid #000000;text-align: center;\">$am_department</td><td width=\"293px\" style=\"border:1px solid #000000;text-align: center;\">$initiated_date</td></tr>";
        
        $omeeting_markup = "";
        if(!empty($open_meeting_details)){
            foreach($open_meeting_details as $key => $value) {
                $omeeting_markup .= "<tr><td width=\"153px\" style=\"border:1px solid #000000;text-align: center;\">$value[count]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[meeting_date]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[meeting_time]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[venue]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[status]</td></tr>";
            }
        }else {
            $omeeting_markup .= "<tr><td colspan = \"5\" width=\"1153px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
        }
        
        $cmeeting_markup = "";
        if(!empty($closing_meeting_details)){
            foreach($closing_meeting_details as $key => $value) {
                $cmeeting_markup .= "<tr><td width=\"153px\" style=\"border:1px solid #000000;text-align: center;\">$value[count]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[meeting_date]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[meeting_time]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[venue]</td><td width=\"250px\" style=\"border:1px solid #000000;text-align: center;\">$value[status]</td></tr>";
            }
        }else {
            $cmeeting_markup .= "<tr><td colspan = \"5\" width=\"1153px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
        }
        
        $mom_markup = "";
        if(!empty($agenda_list)){
            foreach($agenda_list as $key => $value) {
                $mom_markup .= "<tr><td width=\"52px\" style=\"border:1px solid #000000;\">$value[count]</td><td width=\"100px\" style=\"border:1px solid #000000;\">$value[category]</td><td width=\"150px\" style=\"border:1px solid #000000;\">$value[sub_category]</td><td width=\"120px\" style=\"border:1px solid #000000;\">$value[observation]</td><td width=\"95px\" style=\"border:1px solid #000000;text-align: center;\">$value[pri_responsible][$value[pri_responsible_dept]]</td><td width=\"95px\" style=\"border:1px solid #000000;text-align: center;\">$value[sec_responsible][$value[sec_responsible_dept]]</td><td width=\"79px\" style=\"border:1px solid #000000;text-align: center;\">$value[target_date]</td><td width=\"85px\" style=\"border:1px solid #000000;text-align: center;\">$value[completion_date]</td><td width=\"73px\" style=\"border:1px solid #000000;\">$value[task_status]</td><td width=\"59px\" style=\"border:1px solid #000000;\">$value[action_status]</td><td width=\"90px\" style=\"border:1px solid #000000;\">$value[review_comments]</td><td width=\"80px\" style=\"border:1px solid #000000;text-align: center;\">$value[reviewer_comments]</td><td width=\"75px\" style=\"border:1px solid #000000;\">$value[audit_lead_comments]</td></tr>";
            }
        }else {
            $mom_markup .= "<tr><td colspan = \"5\" width=\"1153px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
        }
        
        $file_markup = "";
        if (!empty($fileobjectarray)) {
        foreach ($fileobjectarray as $key => $value) {
            $file_markup .= "<tr><td width=\"452px\" style=\"border:1px solid #000000;text-align: justify;\">$value[name]</td><td width=\"400px\" style=\"border:1px solid #000000;text-align: center;\">$value[attached_by]</td><td width=\"301px\" style=\"border:1px solid #000000;text-align: center;\">$value[attached_date]</td></tr>";
        }
        }else {
            $file_markup .= "<tr><td colspan = \"5\" width=\"1153px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
        }
      
        $agenda_markup = "";
        if (!empty($agenda_list['fileobjectarray'] )) {
            foreach ($agenda_list as $key => $value) {
                foreach ($value['fileobjectarray'] as $key1 => $value1) {
                    $agenda_markup .= "<tr><td width=\"482px\" style=\"border:1px solid #000000;text-align: justify;\">$value1[name]</td><td width=\"342px\" style=\"border:1px solid #000000;text-align: center;\">$value1[attached_by]</td><td width=\"329px\" style=\"border:1px solid #000000;text-align: center;\">$value1[attached_date]</td></tr>";
                }
            }
        }else {
                $agenda_markup .= "<tr><td colspan = \"5\" width=\"1153px\" style=\"border:1px solid #000000;text-align: center;\">Records not Found</td></tr>";
        }
        
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
            $this->Cell(0, 0, 'REPORT - AUDIT & TASK MANAGEMENT', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
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
    $pdf->SetSubject('Audit Final Report');
    $pdf->SetKeywords('Audit Final Report');

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
                <td align="center"width="1153px" style="border:1px solid #000000;"><b>SECTION - 1 : INITIATION OF AUDIT </b></td>
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
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    
   $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $vendor_tble = <<<EODAUDITSCHED
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
             <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b>SECTION - 2 : AUDIT SCHEDULE </b></td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Audit Type</b></td>
                <td  width="883px" style="border:1px solid #000000;">$audit_type - $audit_sub_type</td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Audit Date (From - To)</b></td>
                <td  width="883px" style="border:1px solid #000000;">$audit_date_from - $audit_date_to</td>
            </tr>
            <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Number of Days</b></td>
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
                <td align="left" width="270px" style="border:1px solid #000000;"><b> Objectives</b></td>
                <td align="justify" width="883px" style="border:1px solid #000000;">$objectives</td>
           </tr>
           <tr>
                <td align="left" width="270px" style="border:1px solid #000000;"><b>Status</b></td>
                <td  width="883px" style="border:1px solid #000000;">$status</td>
           </tr>
            
        </thead>
    </table>
EODAUDITSCHED;
        $pdf->writeHTML($vendor_tble, true, false, false, false, '');
    
     $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $vendor_tbl = <<<EODAUDITSCHED
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
             <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b> SIGNATURES </b></td>
            </tr>
            <tr>
                <td rowspan="2"  width="153px" style="border:1px solid #000000;text-align:center;line-height: 50px;"><b>Initiated By</b></td>
                <td  width="250px" style="border:1px solid #000000;"><b>Name</b></td>
                <td  width="250px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td  width="250px" style="border:1px solid #000000;"><b>Department</b></td>
                <td  width="250px" style="border:1px solid #000000;"><b>Date & Time</b></td>
           </tr>
            <tr>
                <td  width="250px" style="border:1px solid #000000;">$creator_name</td>
                <td  width="250px" style="border:1px solid #000000;">$creator_designation</td>
                <td  width="250px" style="border:1px solid #000000;">$creator_dept</td>
                <td  width="250px" style="border:1px solid #000000;">$created_time</td>
           </tr>
            <tr>
                <td rowspan="2"  width="153px" style="border:1px solid #000000;text-align:center;line-height: 50px;"><b>Approved By</b></td>
                <td   width="250px" style="border:1px solid #000000;"><b>Name</b></td>
                <td   width="250px" style="border:1px solid #000000;"><b>Designation</b></td>
                <td   width="250px" style="border:1px solid #000000;"><b>Department</b></td>
                <td   width="250px" style="border:1px solid #000000;"><b>Date & Time</b></td>
           </tr>
            <tr>
                <td  width="250px" style="border:1px solid #000000;">$approver_name</td>
                <td  width="250px" style="border:1px solid #000000;">$approver_designation</td>
                <td  width="250px" style="border:1px solid #000000;">$approver_dept</td>
                <td  width="250px" style="border:1px solid #000000;">$approved_time</td>
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
    $meeting_tble = <<<EODTRAINING
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
            <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b>SECTION - 3 : OPENING MEETING SCHEDULE  </b></td>
            </tr>
            <tr>
                <td align="center" width="153px" style="border:1px solid #000000;"><b>S.No.</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Meeting Date</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Meeting Time</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Venue</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Status</b></td>
            </tr>
        </thead>
        {$omeeting_markup}
    </table>
EODTRAINING;
        $pdf->writeHTML($meeting_tble, true, false, false, false, '');
   
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $meeting_tbl = <<<EODTRAINING1
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
            <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b>SECTION - 4 : CLOSING MEETING SCHEDULE  </b></td>
            </tr>
            <tr>
                <td align="center" width="153px" style="border:1px solid #000000;"><b>S.No.</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Meeting Date</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Meeting Time</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Venue</b></td>
                <td align="center" width="250px" style="border:1px solid #000000;"><b>Status</b></td>
            </tr>
        </thead>
        {$cmeeting_markup}
    </table>
EODTRAINING1;
        $pdf->writeHTML($meeting_tbl, true, false, false, false, '');
  
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $mom_review_tbl = <<<EODMOM
    <table cellspacing="0" cellpadding="6" border="0">
        <thead>
             <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b>SECTION - 5 : AGENDA WITH TASK STATUS  </b></td>
            </tr>
            <tr>
                <td align="center" width="52px" style="border:1px solid #000000;"><b>S.No.</b></td>
                <td align="center" width="100px" style="border:1px solid #000000;"><b>Category</b></td>
                <td align="center" width="150px" style="border:1px solid #000000;"><b>Agenda Item</b></td>
                <td align="center" width="120px" style="border:1px solid #000000;"><b>Observation</b></td>
                <td align="center" width="95px" style="border:1px solid #000000;"><b>Primary Responsible Person</b></td>
                <td align="center" width="95px" style="border:1px solid #000000;"><b>Secondary Responsible Person</b></td>
                <td align="center" width="79px" style="border:1px solid #000000;"><b>Target Date</b></td>
                <td align="center" width="85px" style="border:1px solid #000000;"><b>Completion Date</b></td>
                <td align="center" width="73px" style="border:1px solid #000000;"><b>Task Status</b></td>
                <td align="center" width="59px" style="border:1px solid #000000;"><b>Action Status</b></td>
                <td align="center" width="90px" style="border:1px solid #000000;"><b>Responsible Person's Comment</b></td>
                <td align="center" width="80px" style="border:1px solid #000000;"><b>Task Reviewer's Comment</b></td>
                <td align="center" width="75px" style="border:1px solid #000000;"><b>Audit Lead's Comment</b></td>
            </tr>
        </thead>
        {$mom_markup}
            <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b> ATTACHMENTS (Supporting Documents) </b></td>
            </tr>
            <tr>
                <td align="center" width="482px" style="border:1px solid #000000;"><b>File Name</b></td>
                <td align="center" width="342px" style="border:1px solid #000000;"><b>Attached By</b></td>
                <td align="center" width="329px" style="border:1px solid #000000;"><b>Attached Date</b></td>
            </tr>
        {$agenda_markup}
    </table>
EODMOM;
        $pdf->writeHTML($mom_review_tbl, true, false, false, false, '');
    
     $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('arial', '', 10);
    $attach_tbl = <<<EODMARKETING
    <table cellspacing="0" cellpadding="7" border="0">
        <thead>
            <tr>
                <td align="center" width="1153px" style="border:1px solid #000000;"><b>ATTACHMENTS (Supporting Documents)</b></td>
            </tr>
            <tr>
                <td align="center" width="482px" style="border:1px solid #000000;"><b>File Name</b></td>
                <td align="center" width="342px" style="border:1px solid #000000;"><b>Attached By</b></td>
                <td align="center" width="329px" style="border:1px solid #000000;"><b>Attached Date</b></td>
            </tr>
        </thead>
        {$file_markup}
    </table>
EODMARKETING;
        $pdf->writeHTML($attach_tbl, true, false, false, false, '');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    
        $pdf->SetFont('arial', 'B', 7, true);
        $pdf->SetTextColor(0,0,0);
        $pdf->MultiCell(325,5,"\n\n------------END OF DOCUMENT------------",0,'C',0,0,'','',false,0,FALSE,false,0,'T',false);
        ob_end_clean();
       //Close and output PDF document
        $pdf->Output("Audit Final Report.pdf", 'I');
        //============================================================+
        // END OF FILE
        //============================================================+
    }else {
    $error_handler->raiseError("INVALID REQUEST");
}
    
?>


