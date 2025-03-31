<?php

/**
 * Project:     Logicmind
 * File:        sop_type.admin.php
 *
 * @author Ananthakumar.v 
 * @since 10/02/2016
 * @package sop
 * @version 1.0
 * @see sop_type.sop.php
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

if (isset($_POST['add'])) {
    $sequence_object = new Sequence;
    $id = "admin.sop.type:" . $sequence_object->get_next_sequence();

    $add_sop_obj = new SopType();
    $add_sop_obj->object_id = $id;
    $add_sop_obj->type = trim($_POST['sop_type']);
    $add_sop_obj->description = trim($_POST['sop_desc']);
    $add_sop_obj->creator = $usr_id;
    $add_sop_obj->modifier = $usr_id;
    $add_sop_obj->created_time = $createtime;
    $add_sop_obj->modified_time = $createtime;
    $add_sop_obj->is_enabled = 'yes';
    $add_sop_obj->insert();

    //Audit Trial
    $audit_id = "audit.sop_type:" . $sequence_object->get_next_sequence();
    $new_val = "SOP Type : " . trim($_POST['sop_type']) . "\nDescription : " . trim($_POST['sop_desc']) . "\Is Enabled : Yes";
    $old_val = null;

    AddAuditTrial(new DB_Public_lm_audit_sop_type(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");
    header("Location:?module=admin&action=sop_type");
}
if (isset($_POST['update'])) {
    $usop_type_id = $_POST['usop_type_id'] ?: NULL;
    $usop_type = $_POST['usop_type'] ?: NULL;
    $usop_desc = $_POST['usop_desc'] ?: NULL;
    $uis_enabled = $_POST['uis_enabled'] ?: NULL;

    // Getting old val for audit trail
    $atsoptype_old = new SopType();
    $atsoptype_old->get("object_id", $usop_type_id);

    $udd_sop_obj = new SopType();
    $udd_sop_obj->whereAdd("object_id='$usop_type_id'");
    $udd_sop_obj->type = trim($usop_type);
    $udd_sop_obj->description = trim($usop_desc);
    $udd_sop_obj->is_enabled = $uis_enabled;
    $udd_sop_obj->modifier = $usr_id;
    $udd_sop_obj->modified_time = $createtime;
    $udd_sop_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

    // Audit Trail
    $sequence_object = new Sequence;
    $audit_id = "audit.sop_type:" . $sequence_object->get_next_sequence();
    $new_val = "SOP Type : trim($usop_type)\nDescription : $usop_desc\nIs Enabled : $uis_enabled";
    $old_val = "SOP Type : $atsoptype_old->type\nDescription : $atsoptype_old->description\nIs Enabled : $atsoptype_old->is_enabled";

    AddAuditTrial(new DB_Public_lm_audit_sop_type(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Updated");
    header("Location:?module=admin&action=sop_type");
}
$view_sop_type_details = new SopType();
$soptypelistdetails = $view_sop_type_details->sop_type_list_details(null);
$smarty->assign("view_general_sop", true);
$smarty->assign("soptypelistdetails", $soptypelistdetails);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_type.admin.tpl");
?>
