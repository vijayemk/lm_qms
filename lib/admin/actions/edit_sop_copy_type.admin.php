<?php

/**
 * Project:     Logicmind
 * File:        sop_copy_type.admin.php
 *
 * @author Ananthakumar.v 
 * @since 13/03/2016
 * @package sop
 * @version 1.0
 * @see sop_copy_type.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$createtime = date('Y-m-d G:i:s');
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$createyear = date('y');
$month = date('m');
$task_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$gsop_print_copy = new DB_Public_lm_sop_print_copy();
if ($gsop_print_copy->get("object_id", $task_id)) {
    if (isset($_POST['update'])) {
        $sop_copy_type = $_REQUEST['sop_copy_type'] ?: NULL;
        $label_type = $_REQUEST['label_type'] ?: NULL;
        $sop_copy_desc = $_REQUEST['sop_copy_desc'] ?: NULL;
        $sop_copy_type_color = $_REQUEST['sop_copy_type_color'] ?: NULL;
        $sop_copy_type_is_enabled = $_REQUEST['sop_copy_type_is_enabled'] ?: NULL;
        
        $sop_copy_type_color = "#".$sop_copy_type_color;

        // Getting old val for audit trail
        $gsop_copy_obj = new SopPrintCopy();
        $gsop_copy_obj->get("object_id", $task_id);

        // Update new value
        $usop_copy_obj = new SopPrintCopy();
        $usop_copy_obj->whereAdd("object_id='$task_id'");
        $usop_copy_obj->copy_type = trim($sop_copy_type);
        $usop_copy_obj->description = trim($sop_copy_desc);
        $usop_copy_obj->copy_type_color = $sop_copy_type_color;
        $usop_copy_obj->label_type = $label_type;
        $usop_copy_obj->is_enabled = $sop_copy_type_is_enabled;
        $usop_copy_obj->modified_by = $usr_id;
        $usop_copy_obj->modified_time = $createtime;
        $usop_copy_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
       
        // Audit Trail
        $dept_id = getDeptId($usr_id);
        $new_val = "Copy Type : " . trim($sop_copy_type) . "\nDescription : " . trim($sop_copy_desc) . "\nHex Value : " . trim($sop_copy_type_color)."\nLabel Type : $label_type\nIs Enabled : $sop_copy_type_is_enabled";
        $old_val = "Copy Type : " . $gsop_copy_obj->copy_type . "\nDescription : " . $gsop_copy_obj->description . "\nHex Value : ".$gsop_copy_obj->copy_type_color. "\nLabel Type : " . $gsop_copy_obj->label_type. "\nIs Enabled : " . $gsop_copy_obj->is_enabled;

        $sequence_object = new Sequence;
        $audit_id = "audit.print_copy:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_print_copy(), $audit_id, $usr_id, $dept_id, 'update', $new_val, $old_val, "Successfully Updated");
        header("Location:index.php?module=admin&action=sop_copy_type");
    }
    $smarty->assign("regobj", $gsop_print_copy);
    $smarty->assign('main', _TEMPLATE_PATH_ . "edit_sop_copy_type.admin.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
