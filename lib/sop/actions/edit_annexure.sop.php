<?php
/**
 * Project:     Logicmind
 * File:        edit_annexure.sop.php
 *
 * @author Ananthakumar.v 
 * @since 12/04/2017
 * @package sop
 * @version 1.0
 * @see edit_annexure.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE );

$annexure_object_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;
$sop_annexure_master = new DB_Public_lm_sop_annexure_master();
if($sop_annexure_master->get("annexure_object_id",$annexure_object_id)){
    $sop_master = new DB_Public_lm_sop_master();
    if($sop_master->get("sop_object_id",$sop_annexure_master->sop_object_id)){
        $date_time = date('Y-m-d G:i:s');
        $usr_id = trim($_SESSION['user_id']);
        $sop_process = new Sop_Processor();
        include_module("admin");
        
        $sop_object_id = $sop_annexure_master->sop_object_id;
        if (empty($sop_process->is_sop_elegible_to_edit($sop_master->sop_object_id, $usr_id))) {
            $error_handler->raiseError("INVALID REQUEST");
        } else {
            $smarty->assign('edit_content', true);
        }
        
        $sop_annexure_details = new DB_Public_lm_sop_annexure_details();
        $sop_annexure_details->get("annexure_object_id",$annexure_object_id);
        
        //Edit Annexure Name
        if(isset($_POST['edit_annexure_name'])) {
            $edit_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
            $edit_sop_annexure_obj->whereAdd("annexure_object_id='$annexure_object_id'");
            $edit_sop_annexure_obj->annexure_name = trim($_POST['annexure_name']);
            $edit_sop_annexure_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "Annexure Name Updated."."\nOld Name : ". $sop_annexure_master->annexure_name.".\nNew Name : ". trim($_POST['annexure_name'])."\nReason : ". trim($_POST['change_reason']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_annexure&object_id=$annexure_object_id");
        }
        
        //Enable / Disable Annexure Name
        if(isset($_POST['edit_annexure_status'])) {
            $edit_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
            $edit_sop_annexure_obj->whereAdd("annexure_object_id='$annexure_object_id'");
            $edit_sop_annexure_obj->status = trim($_POST['enable_disable']);
            $edit_sop_annexure_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "Annexure Status Updated."."\nOld Status : ". $sop_annexure_master->status.".\nNew Status : ". trim($_POST['enable_disable'])."\nReason : ". trim($_POST['status_reason']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_annexure&object_id=$annexure_object_id");
        }
        if(isset($_POST['edit_annexure_orientation'])) {
            $edit_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
            $edit_sop_annexure_obj->whereAdd("annexure_object_id='$annexure_object_id'");
            $edit_sop_annexure_obj->orientation = trim($_POST['annexure_ori']);
            $edit_sop_annexure_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            
            //Audit Trial
            $remarks = "Annexure Orientation Updated."."\nOld Orientation : ". $sop_annexure_master->orientation.".\nNew Orientation : ". trim($_POST['annexure_ori']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_annexure&object_id=$annexure_object_id");
        }
        /**Edit SOP Language */
        if(isset($_POST['edit_lang'])) {
            $edit_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
            $edit_sop_annexure_obj->whereAdd("annexure_object_id='$annexure_object_id'");
            $edit_sop_annexure_obj->lang = trim($_POST['usop_lang']);
            $edit_sop_annexure_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
           
            //Audit Trial
            $remarks = "SOP Lnaguage Updated."."\nOld : ". $sop_annexure_master->lang.".\nNew : ". trim($_POST['usop_lang']);
            add_sop_audit_trial($sop_object_id,$sop_master->sop_type,'update',$remarks,'Updated');
            header("Location:?module=sop&action=edit_annexure&object_id=$annexure_object_id");
        }
        /**Insert format content details */
        if(isset($_POST['editor_details_p'])) {
            $update_obj = new DB_Public_lm_sop_annexure_details();
            $update_obj->whereAdd("annexure_object_id='$annexure_object_id'");
            $update_obj->annexure_content = $_POST['editor_details_p'];
            $update_obj->last_modified_by = $usr_id;
            $update_obj->last_modified_time =$date_time;
            $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            header("Location:$_SERVER[REQUEST_URI]");
        }
        if(isset($_POST['editor_details_l'])) {
            $update_obj = new DB_Public_lm_sop_annexure_details();
            $update_obj->whereAdd("annexure_object_id='$annexure_object_id'");
            $update_obj->annexure_content = $_POST['editor_details_l'];
            $update_obj->last_modified_by = $usr_id;
            $update_obj->last_modified_time =$date_time;
            $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
            header("Location:$_SERVER[REQUEST_URI]");
        }
        $sop_pdf_sup_lang_list = getPdfSupportLang();
        if($sop_annexure_master->orientation=="P"){
            $smarty->assign("a4p",'block');
        }else{
            $smarty->assign("a4p",'none');
        }
        if($sop_annexure_master->orientation=="L"){
            $smarty->assign("a4l",'block');
        }else{
            $smarty->assign("a4l",'none');
        }
        
        $smarty->assign("regobj",$sop_annexure_master);
        $smarty->assign("sop_object_id",$sop_object_id);
        $smarty->assign("sop_annexure_editor_details",$sop_annexure_details->annexure_content);
        $smarty->assign("sop_annexure_status",$sop_annexure_master->status);
        $smarty->assign("print_copy_list", $sop_process->get_sop_print_copy_list($usr_id, $sop_object_id));
        $smarty->assign("layout_orientation", $sop_annexure_master->orientation);
        $smarty->assign("sop_pdf_sup_lang_list", $sop_pdf_sup_lang_list);
        $smarty->assign('main',_TEMPLATE_PATH_."edit_annexure.sop.tpl");
    }else{
        $error_handler->raiseError("INVALID REQUEST");
    }
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
