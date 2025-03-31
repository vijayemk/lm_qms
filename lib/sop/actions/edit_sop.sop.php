<?php
/**
 * Project:     Logicmind
 * File:        edit_sop.sop.php
 *
 * @author Ananthakumar.v 
 * @since 12/04/2017
 * @package sop
 * @version 1.0
 * @see edit_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE );

$sop_object_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;
$sop_master = new DB_Public_lm_sop_master();
if($sop_master->get("sop_object_id",$sop_object_id)){
    $date_time = date('Y-m-d G:i:s');
    $usr_id = trim($_SESSION['user_id']);
    $usr_plant_id = getUserPlantId($usr_id);
    $sop_process = new Sop_Processor();
    include_module("admin");
    
    if (empty($sop_process->is_sop_elegible_to_edit($sop_master->sop_object_id, $usr_id))) {
        $error_handler->raiseError("INVALID REQUEST");
    } else {
        $smarty->assign('edit_content', true);
    }
    $sop_details = new DB_Public_lm_sop_details();
    $sop_details->get("sop_object_id",$sop_object_id);
    
    //Edit SOP Name
    if(isset($_POST['edit_sop_name'])) {
        $edit_sop_master = new DB_Public_lm_sop_master();
        $edit_sop_master->whereAdd("sop_object_id='$sop_object_id'");
        $edit_sop_master->sop_name = trim($_POST['sop_name']);
        $edit_sop_master->update(DB_DATAOBJECT_WHEREADD_ONLY);

        //Audit Trial
        $remarks = "SOP Name Updated."."\nOld Name : ". $sop_master->sop_name.".\nNew Name : ". trim($_POST['sop_name'])."\nReason : ". trim($_POST['change_reason']);
        add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
        header("Location:$_SERVER[REQUEST_URI]");
    }
    /**Edit SOP Supersedes */
    if(isset($_POST['edit_usupersedes'])) {
        $edit_sop_master = new DB_Public_lm_sop_master();
        $edit_sop_master->whereAdd("sop_object_id='$sop_object_id'");
        $edit_sop_master->supersedes = trim($_POST['usupersedes']);
        $edit_sop_master->update(DB_DATAOBJECT_WHEREADD_ONLY);

        //Audit Trial
        $remarks = "SOP Supersedes Updated."."\nOld : ". $sop_master->supersedes.".\nNew : ". trim($_POST['usupersedes'])."\nReason : ". trim($_POST['change_reason_usupersedes']);
        add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
        header("Location:$_SERVER[REQUEST_URI]");
    }
    /**Edit SOP Language */
    if(isset($_POST['edit_lang'])) {
        $edit_sop_master = new DB_Public_lm_sop_master();
        $edit_sop_master->whereAdd("sop_object_id='$sop_object_id'");
        $edit_sop_master->lang = trim($_POST['usop_lang']);
        $edit_sop_master->update(DB_DATAOBJECT_WHEREADD_ONLY);

        //Audit Trial
        $remarks = "SOP Lnaguage Updated."."\nOld : ". $sop_master->lang.".\nNew : ". trim($_POST['usop_lang']);
        add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
        header("Location:$_SERVER[REQUEST_URI]");
    }

    if(isset($_POST['editor_details'])) {
        // echo $_POST['editor'];
        $update_obj = new DB_Public_lm_sop_details();
        $update_obj->whereAdd("sop_object_id='$sop_object_id'");
        $update_obj->sop_content = $_POST['editor_details'];
        $update_obj->last_modified_by = $usr_id;
        $update_obj->last_modified_time =$date_time;
        $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        header("Location:$_SERVER[REQUEST_URI]");
    }
    
    if (isset($_POST['copy_sop_content'])) {
        $sop_copy_id = (isset($_REQUEST['sop_copy_id'])) ? $_REQUEST['sop_copy_id'] : null;
        $copy_sop_content_obj = new DB_Public_lm_sop_details();
        $copy_sop_content_obj->get("sop_object_id", $sop_copy_id);

        $update_obj = new DB_Public_lm_sop_details();
        $update_obj->whereAdd("sop_object_id='$sop_object_id'");
        $update_obj->sop_content = $copy_sop_content_obj->sop_content;
        $update_obj->last_modified_by = $usr_id;
        $update_obj->last_modified_time = $date_time;
        $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        header("Location:$_SERVER[REQUEST_URI]");
    }
    $sop_pdf_sup_lang_list = getPdfSupportLang();

    $smarty->assign("regobj",$sop_master);
    $smarty->assign("sop_object_id",$sop_object_id);
    $smarty->assign("sop_editor_details",$sop_details->sop_content);
    $smarty->assign("print_copy_list", $sop_process->get_sop_print_copy_list($usr_id, $sop_object_id));
    $smarty->assign("sop_pdf_sup_lang_list", $sop_pdf_sup_lang_list);
    $smarty->assign("sop_list", $sop_process->sop_list("NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", $usr_plant_id, "NA"));
    $smarty->assign('main',_TEMPLATE_PATH_."edit_sop.sop.tpl");  
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
