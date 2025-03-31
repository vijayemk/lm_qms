<?php

/**
 * Project:     Logicmind
 * File:        add_sop.sop.php
 *
 * @author Ananthakumar.v 
 * @since 10/02/2017
 * @package sop
 * @version 1.0
 * @see add_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_create', 'yes')) {
    $error_handler->raiseError("sop_create");
}

include_module("admin");
$view_sop_type = new SopType();
$soptypelist = $view_sop_type->sop_type_list('yes');

$sop_creation_reason_obj = new SopCreationReason();
$sop_pdf_sup_lang_list = getPdfSupportLang();
$sop_reason_list = $sop_creation_reason_obj->sop_reason_list();

$createtime = date('Y-m-d G:i:s');
$createyear = date('y');
$month = date('m');
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$usr_org_id = getUserOrganizationId($usr_id);
$usr_plant_id = getUserPlantId($usr_id);
$plant_dept_list = getPlantDeptList($usr_plant_id);

//create object for the sop function Module
$sop_process = new Sop_Processor();
$sop_type_id = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;
$sop_draft_number = $sop_process->get_sop_draft_no($sop_type_id, 'get');

if (isset($_POST['add_sop'])) {
    $sop_type = (isset($_REQUEST['sop_type'])) ? $_REQUEST['sop_type'] : null;
    $sop_name = (isset($_POST['sop_name'])) ? $_POST['sop_name'] : null;
    $cc_no = (isset($_POST['cc_no'])) ? $_POST['cc_no'] : null;
    $reason_for_revision = (isset($_POST['reason_for_revision'])) ? $_POST['reason_for_revision'] : null;
    $sop_supersedes = (isset($_POST['sop_supersedes'])) ? $_POST['sop_supersedes'] : null;
    $sop_lang = (isset($_POST['sop_lang'])) ? $_POST['sop_lang'] : null;
    $dept_view_array = (isset($_REQUEST['dept_view'])) ? $_REQUEST['dept_view'] : null;

    $rdept1_resp = (isset($_REQUEST['rdept1_resp'])) ? $_REQUEST['rdept1_resp'] : null;
    $rdept2_resp = (isset($_REQUEST['rdept2_resp'])) ? $_REQUEST['rdept2_resp'] : null;
    $rdept3_resp = (isset($_REQUEST['rdept3_resp'])) ? $_REQUEST['rdept3_resp'] : null;

    $sop_unique_name = md5(md5($sop_name) . md5($createtime) . md5(rand()));
    if (sop_uname_exist($sop_unique_name) == "true") {
        $error_handler->raiseError("NAME EXIST");
    }
    if ($sop_draft_number == "invalid_type") {
        $error_handler->raiseError("SOP DRAFT NUMBER SEQUENCE NOT EXIST");
    }

    $sop_object_id = $sop_process->add_sop_draft_master($sop_type, trim($sop_name), $cc_no, "00", $sop_supersedes, $reason_for_revision, $usr_plant_id, $sop_lang, $createyear, $month, $usr_id, $createtime, $usr_org_id, $dept_id, $sop_unique_name, "N/A");
    if (!empty($sop_object_id)) {
        add_dept_doc_view_details($sop_object_id, $dept_id, $dept_view_array, $usr_id, $createtime);
        if (!empty($rdept1_resp)) {
            $sop_process->add_sop_montioring_details($sop_object_id, $rdept1_resp, '1', 'yes', $usr_id, $createtime);
        }
        if (!empty($rdept2_resp)) {
            $sop_process->add_sop_montioring_details($sop_object_id, $rdept2_resp, '2', 'yes', $usr_id, $createtime);
        }
        if (!empty($rdept3_resp)) {
            $sop_process->add_sop_montioring_details($sop_object_id, $rdept3_resp, '3', 'yes', $usr_id, $createtime);
        }
    }

    //Audit Trial
    $remarks = trim($_POST['sop_name']) . " Added";
    add_sop_audit_trial($sop_object_id, $_POST['sop_type'], 'create', $remarks, 'Created');

    //Insert Default Template
    $sop_content = <<<ENDOFSTRING
<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>1.0&nbsp;<span style="font-size:15px"><strong>PURPOSE</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>2.0&nbsp;<span style="font-size:15px"><strong>SCOPE</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>
    
<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>3.0&nbsp;<span style="font-size:15px"><strong>RESPONSIBILITY</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>
    
<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>4.0&nbsp;<span style="font-size:15px"><strong>POLICY STATEMENT</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>
    
<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>5.0&nbsp;<span style="font-size:15px"><strong>PROCEDURE</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>      
    
<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>6.0&nbsp;<span style="font-size:15px"><strong>KEY PERFORMANCE PARAMETERS</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>   

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>7.0&nbsp;<span style="font-size:15px"><strong>EHS</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>8.0&nbsp;<span style="font-size:15px"><strong>TRAINING</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>9.0&nbsp;<span style="font-size:15px"><strong>REFERENCE TO RELATED POLICY l PROCEDURE</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>10.0&nbsp;<span style="font-size:15px"><strong>INTERPRETATION</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>11.0&nbsp;<span style="font-size:15px"><strong>DEFINITIONS | ABBREVIATIONS</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>12.0&nbsp;<span style="font-size:15px"><strong>SOP HISTORY</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="color:#000000"><span style="font-size:15px;font-weight: bold"><strong>13.0&nbsp;<span style="font-size:15px"><strong>ANNEXURES</strong></span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

ENDOFSTRING;

    //Insert Default Template
    $sop_details = new DB_Public_lm_sop_details();
    $sop_details->sop_object_id = $sop_object_id;
    $sop_details->sop_content = $sop_content;
    $sop_details->created_by = $usr_id;
    $sop_details->created_time = $createtime;
    $sop_details->last_modified_by = $usr_id;
    $sop_details->last_modified_time = $createtime;
    $sop_details->insert();

    /** Add Pending */
    $sop_process->add_worklist($usr_id, $sop_object_id);
    /*     * Insert workflow  * */
    $sop_process->save_workflow($sop_object_id, $usr_id, 'Created', 'create');
    header("Location:?module=sop&action=view_sop&object_id=$sop_object_id");
}
if (!empty($sop_process->get_sop_type($sop_type_id))) {
    $smarty->assign("sop_type", $sop_process->get_sop_type($sop_type_id));
}
$smarty->assign("soptypelist", $soptypelist);
$smarty->assign("sop_type_id", $sop_type_id);
$smarty->assign("sop_draft_number", $sop_draft_number);
$smarty->assign("usr_plant", getPlantName($usr_plant_id));
$smarty->assign("sop_reason_list", $sop_reason_list);
$smarty->assign("sop_pdf_sup_lang_list", $sop_pdf_sup_lang_list);
$smarty->assign("plant_dept_list", $plant_dept_list);
$smarty->assign("dept_id", $dept_id);
$smarty->assign("def_sop_moni_limit", getSopMonitoringLimit());
$smarty->assign('main', _TEMPLATE_PATH_ . "add_sop.sop.tpl");
?>
