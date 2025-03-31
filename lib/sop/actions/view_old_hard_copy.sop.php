<?php

/**
 * Project:     Logicmind
 * File:        upload_old_sop.sop.php
 *
 * @author Ananthakumar.v
 * @since 18/01/2019
 * @package sop
 * @version 1.0
 * @see upload_old_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_view', 'yes')) {
    $error_handler->raiseError("sop_view");
}
$task_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$hc_obj = new DB_Public_lm_hard_copy_details();
if ($hc_obj->get("object_id", $task_id)) {
    $date_time = date('Y-m-d G:i:s');
    $usr_id = trim($_SESSION['user_id']);

    $doc_file_processor_object = new Doc_File_Processor();
    $fileobjectarray = $doc_file_processor_object->getLmDocFileObjectArray($task_id);
    if($hc_obj->created_by==$usr_id){
        $smarty->assign("edit_button", TRUE);
    }
    
    /** Dropzone file upload */
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_name = $_FILES['file']['name'];
        $file_name = clean_filename($file_name, 0, 80);

        $fhash = md5($tempFile);
        $hash = uniqid($fhash);

        $file_info = new SplFileInfo($_FILES['file']['name']);
        $extension = $file_info->getExtension();

        $sequence = new Sequence;
        $file_id = "lm_doc_file:" . $sequence->get_next_sequence();

        $file = new DB_Public_file();
        $file->object_id = $file_id;
        $file->type = $file_type;
        $file->name = $file_name;
        $file->size = $file_size;
        $file->hash = $hash . "." . $extension;
        move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
        $file->insert();

        $doc_file = new DB_Public_lm_doc_file();
        $doc_file->file_id = $file_id;
        $doc_file->object_id = $task_id;
        $doc_file->attached_by = $usr_id;
        $doc_file->attached_date = $date_time;
        $doc_file->insert();
    }

    if (isset($_POST['update'])) {
        $udoc_type = (isset($_POST['udoc_type'])) ? $_POST['udoc_type'] : null;
        $udoc_no = (isset($_POST['udoc_no'])) ? $_POST['udoc_no'] : null;
        $udoc_name = (isset($_POST['udoc_name'])) ? $_POST['udoc_name'] : null;
        $udoc_remarks = (isset($_POST['udoc_remarks'])) ? $_POST['udoc_remarks'] : null;

        $uobj = new DB_Public_lm_hard_copy_details();
        $uobj->whereAdd("object_id='$task_id'");
        $uobj->type = $udoc_type;
        $uobj->doc_no = $udoc_no;
        $uobj->name = $udoc_name;
        $uobj->remarks = $udoc_remarks;
        $uobj->modified_by = $usr_id;
        $uobj->modified_time = $date_time;
        $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        header("Location:$_SERVER[REQUEST_URI]");
    }

    $smarty->assign("regobj", $hc_obj);
    $smarty->assign("doc_type", getLmDocShortName($hc_obj->type));
    $smarty->assign("created_by", getFullName($hc_obj->created_by));
    $smarty->assign("modified_by", getFullName($hc_obj->modified_by));
    $smarty->assign("created_time", $hc_obj->created_time);
    $smarty->assign("modified_time", $hc_obj->modified_time);
    $smarty->assign("doc_list", getLmDocList());
    if (!empty($fileobjectarray)) {
        $smarty->assign("fileobjectarray", $fileobjectarray);
    }
    $smarty->assign('main', _TEMPLATE_PATH_ . "view_old_hard_copy.sop.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
