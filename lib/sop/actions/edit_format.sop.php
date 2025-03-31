<?php
/**
 * Project:     Logicmind
 * File:        edit_format.sop.php
 *
 * @author Ananthakumar.v 
 * @since 12/04/2017
 * @package sop
 * @version 1.0
 * @see edit_format.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE );

$format_object_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;

$sop_format_master = new DB_Public_lm_sop_format_master();
if($sop_format_master->get("format_object_id",$format_object_id)){
    $sop_master = new DB_Public_lm_sop_master();
    if($sop_master->get("sop_object_id",$sop_format_master->sop_object_id)){
        $date_time = date('Y-m-d G:i:s');
        $usr_id = trim($_SESSION['user_id']);
        $sop_process = new Sop_Processor();
        include_module("admin");
        
        $sop_object_id = $sop_format_master->sop_object_id;
        if (empty($sop_process->is_sop_elegible_to_edit($sop_master->sop_object_id, $usr_id))) {
            $error_handler->raiseError("INVALID REQUEST");
        } else {
            $smarty->assign('edit_content', true);
        }
        
        $sop_format_details = new DB_Public_lm_sop_format_details();
        $sop_format_details->get("format_object_id",$format_object_id);
        
        //Edit Format Name
        if(isset($_POST['edit_format_name'])) {
            $edit_sop_format_obj = new DB_Public_lm_sop_format_master();
            $edit_sop_format_obj->whereAdd("format_object_id='$format_object_id'");
            $edit_sop_format_obj->format_name = trim($_POST['format_name']);
            $edit_sop_format_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "Format Name Updated."."\nOld Name : ". $sop_format_master->format_name.".\nNew Name : ". trim($_POST['format_name'])."\nReason : ". trim($_POST['change_reason']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_format&object_id=$format_object_id");
        }
        
        //Enable / Disable Format Name
        if(isset($_POST['edit_format_status'])) {
            $edit_sop_format_obj = new DB_Public_lm_sop_format_master();
            $edit_sop_format_obj->whereAdd("format_object_id='$format_object_id'");
            $edit_sop_format_obj->status = trim($_POST['enable_disable']);
            $edit_sop_format_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "Format Status Updated."."\nOld Status : ". $sop_format_master->status.".\nNew Status : ". trim($_POST['enable_disable'])."\nReason : ". trim($_POST['status_reason']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_format&object_id=$format_object_id");
        }
        if(isset($_POST['edit_format_orientation'])) {
            $edit_sop_format_obj = new DB_Public_lm_sop_format_master();
            $edit_sop_format_obj->whereAdd("format_object_id='$format_object_id'");
            $edit_sop_format_obj->orientation = trim($_POST['format_ori']);
            $edit_sop_format_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "Format Orientation Updated."."\nOld Orientation : ". $sop_format_master->orientation.".\nNew Orientation : ". trim($_POST['format_ori']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_format&object_id=$format_object_id");
        }
        /**Edit SOP Language */
        if(isset($_POST['edit_lang'])) {
            $edit_sop_format_obj = new DB_Public_lm_sop_format_master();
            $edit_sop_format_obj->whereAdd("format_object_id='$format_object_id'");
            $edit_sop_format_obj->lang = trim($_POST['usop_lang']);
            $edit_sop_format_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "SOP Lnaguage Updated."."\nOld : ". $sop_format_master->lang.".\nNew : ". trim($_POST['usop_lang']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_format&object_id=$format_object_id");
        }
        /**Insert format content details */
        if(isset($_POST['editor_details_p'])) {
            $update_obj = new DB_Public_lm_sop_format_details();
            $update_obj->whereAdd("format_object_id='$format_object_id'");
            $update_obj->format_content = $_POST['editor_details_p'];
            $update_obj->last_modified_by = $usr_id;
            $update_obj->last_modified_time =$date_time;
            $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
           header("Location:$_SERVER[REQUEST_URI]");
        }
        if(isset($_POST['editor_details_l'])) {
            $update_obj = new DB_Public_lm_sop_format_details();
            $update_obj->whereAdd("format_object_id='$format_object_id'");
            $update_obj->format_content = $_POST['editor_details_l'];
            $update_obj->last_modified_by = $usr_id;
            $update_obj->last_modified_time =$date_time;
            $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            header("Location:$_SERVER[REQUEST_URI]");
        }
        
        $sop_pdf_sup_lang_list = getPdfSupportLang();
        if($sop_format_master->orientation=="P"){
            $smarty->assign("a4p",'block');
        }else{
            $smarty->assign("a4p",'none');
        }
        if($sop_format_master->orientation=="L"){
            $smarty->assign("a4l",'block');
        }else{
            $smarty->assign("a4l",'none');
        }
        
        $smarty->assign("regobj",$sop_format_master);
        $smarty->assign("sop_object_id",$sop_object_id);
        $smarty->assign("sop_format_editor_details",$sop_format_details->format_content);
        $smarty->assign("sop_format_status",$sop_format_master->status);
        $smarty->assign("print_copy_list", $sop_process->get_sop_print_copy_list($usr_id, $sop_object_id));
        $smarty->assign("layout_orientation", $sop_format_master->orientation);
        $smarty->assign("sop_pdf_sup_lang_list", $sop_pdf_sup_lang_list);
        $smarty->assign('main',_TEMPLATE_PATH_."edit_format.sop.tpl");   
    }else{
        $error_handler->raiseError("INVALID REQUEST");
    }
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
