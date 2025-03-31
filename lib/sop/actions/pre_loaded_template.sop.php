<?php
/**
 * Project:     Logicmind
 * File:        pre_loaded.sop.php
 *
 * @author Ananthakumar.v 
 * @since 08/10/2018
 * @package sop
 * @version 1.0
 * @see pre_loaded.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'preloaded_template', 'yes')) {
    $error_handler->raiseError("preloaded_template");
}
$usr_id = $_SESSION['user_id'];
$createtime = date('Y-m-d G:i:s');
$template_id = $_REQUEST['template_id'];

$sop_process = new Sop_Processor();
$not_moved_pre_loaded_template_list = $sop_process->pre_loaded_template_list(null,'no');
$pre_loaded_template_list = $sop_process->pre_loaded_template_list(null,null);

$sop_list = $sop_process->sop_list("NA","NA","NA","NA","NA","NA",'true',"Draft","NA","NA","NA","NA","NA","NA","NA","Draft Created");
if(!empty($template_id)){
    $pre_loaded_tempalte_obj = $sop_process->get_pre_loaded_template_obj($template_id);
    if($pre_loaded_tempalte_obj->is_moved=="no") {
        $smarty->assign("regobj",$pre_loaded_tempalte_obj);
        $smarty->assign("template_id",$template_id);
        if($pre_loaded_tempalte_obj->orientation=="P"){
            $smarty->assign("a4p",'block');
        }else{
            $smarty->assign("a4p",'none');
        }
        if($pre_loaded_tempalte_obj->orientation=="L"){
            $smarty->assign("a4l",'block');
        }else{
            $smarty->assign("a4l",'none');
        }
        $smarty->assign("layout_orientation", $pre_loaded_tempalte_obj->orientation);
        if($pre_loaded_tempalte_obj->created_by==$usr_id){
            $smarty->assign("can_edit_tempalte",true);
            if(isset($_POST['editor_details_p'])) {
                $update_obj = new DB_Public_lm_pre_loaded_template();
                $update_obj->whereAdd("object_id='$template_id'");
                $update_obj->content = $_POST['editor_details_p'];
                $update_obj->modified_by = $usr_id;
                $update_obj->modified_time =$createtime;
                $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if(isset($_POST['editor_details_l'])) {
                $update_obj = new DB_Public_lm_pre_loaded_template();
                $update_obj->whereAdd("object_id='$template_id'");
                $update_obj->content = $_POST['editor_details_l'];
                $update_obj->modified_by = $usr_id;
                $update_obj->modified_time =$createtime;
                $update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if(isset($_POST['move_template'])) {
                $move_pre_loaded_template_to = $_POST['move_pre_loaded_template_to'] ?: NULL;
                $move_pre_loaded_template_sop_id = $_POST['move_pre_loaded_template_sop'] ?: NULL;
                $move_pre_loaded_template_format_id = $_POST['move_pre_loaded_template_format'] ?: NULL;
                $move_pre_loaded_template_annexure_id = $_POST['move_pre_loaded_template_annexure'] ?: NULL;
                if($move_pre_loaded_template_to=="sop") {
                    $usop_details_obj = new DB_Public_lm_sop_details();
                    $usop_details_obj->whereAdd("sop_object_id='$move_pre_loaded_template_sop_id'");
                    $usop_details_obj->sop_content = $pre_loaded_tempalte_obj->content;
                    $usop_details_obj->last_modified_by = $usr_id;
                    $usop_details_obj->last_modified_time =$createtime;
                    $usop_details_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                    $sop_reference_id = $move_pre_loaded_template_sop_id;
                }elseif($move_pre_loaded_template_to=="format"){
                    $uformat_obj = new DB_Public_lm_sop_format_details();
                    $uformat_obj->whereAdd("format_object_id='$move_pre_loaded_template_format_id'");
                    $uformat_obj->format_content = $pre_loaded_tempalte_obj->content;
                    $uformat_obj->last_modified_by = $usr_id;
                    $uformat_obj->last_modified_time =$createtime;
                    $uformat_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                    $sop_reference_id = $move_pre_loaded_template_format_id;
                }elseif($move_pre_loaded_template_to=="annexure"){
                    $uannexure_obj = new DB_Public_lm_sop_annexure_details();
                    $uannexure_obj->whereAdd("annexure_object_id='$move_pre_loaded_template_annexure_id'");
                    $uannexure_obj->annexure_content = $pre_loaded_tempalte_obj->content;
                    $uannexure_obj->last_modified_by = $usr_id;
                    $uannexure_obj->last_modified_time =$createtime;
                    $sop_reference_id = $move_pre_loaded_template_annexure_id;
                    $uannexure_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                }
                $upre_loaded_template_obj = new DB_Public_lm_pre_loaded_template();
                $upre_loaded_template_obj->whereAdd("object_id='$template_id'");
                $upre_loaded_template_obj->is_moved = 'yes';
                $upre_loaded_template_obj->content = null;
                $upre_loaded_template_obj->sop_object_id = $move_pre_loaded_template_sop_id;
                $upre_loaded_template_obj->sop_reference = $sop_reference_id;
                $upre_loaded_template_obj->moved_by = $usr_id;
                $upre_loaded_template_obj->moved_date = $createtime;
                $upre_loaded_template_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            if(isset($_POST['edit_pre_loaded_template_ori'])) {
                $edit_pre_loaded_temp_obj = new DB_Public_lm_pre_loaded_template();
                $edit_pre_loaded_temp_obj->whereAdd("object_id='$template_id'");
                $edit_pre_loaded_temp_obj->orientation = trim($_POST['upre_loaded_template_ori']);
                $edit_pre_loaded_temp_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                header("Location:$_SERVER[REQUEST_URI]");
            }
            /**Edit SOP Language */
            if(isset($_POST['edit_lang'])) {
                $edit_pre_loaded_temp_obj = new DB_Public_lm_pre_loaded_template();
                $edit_pre_loaded_temp_obj->whereAdd("object_id='$template_id'");
                $edit_pre_loaded_temp_obj->lang = trim($_POST['usop_lang']);
                $edit_pre_loaded_temp_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                header("Location:$_SERVER[REQUEST_URI]");
            }
        }
    }
}

if(isset($_POST['add_template'])) {
    $sequence_object = new Sequence;
    $id = "admin_pre_loaded:".$sequence_object->get_next_sequence();
    $pre_loaded_sop_obj = new DB_Public_lm_pre_loaded_template();
    $pre_loaded_sop_obj->object_id = $id;
    $pre_loaded_sop_obj->name = trim($_POST['pre_loaded_template_name']);
    $pre_loaded_sop_obj->content = null;
    $pre_loaded_sop_obj->is_moved = "no";
    $pre_loaded_sop_obj->sop_object_id = null;
    $pre_loaded_sop_obj->sop_reference = null;
    $pre_loaded_sop_obj->created_by = $usr_id;
    $pre_loaded_sop_obj->created_time = $createtime;
    $pre_loaded_sop_obj->modified_by = $usr_id;
    $pre_loaded_sop_obj->modified_time = $createtime;
    $pre_loaded_sop_obj->moved_by = null;
    $pre_loaded_sop_obj->moved_date = null;
    $pre_loaded_sop_obj->orientation = trim($_POST['pre_loaded_template_ori']);
    $pre_loaded_sop_obj->lang = trim($_POST['sop_lang']);
    $pre_loaded_sop_obj->insert();
    header("Location:?module=sop&action=pre_loaded_template&template_id=$id");
}
$sop_pdf_sup_lang_list = getPdfSupportLang();
$smarty->assign("not_moved_pre_loaded_template_list",$not_moved_pre_loaded_template_list);
$smarty->assign("pre_loaded_template_list",$pre_loaded_template_list);
$smarty->assign("sop_list",$sop_list);
$smarty->assign("sop_pdf_sup_lang_list", $sop_pdf_sup_lang_list);
$smarty->assign('main',_TEMPLATE_PATH_."pre_loaded_template.sop.tpl");
?>

