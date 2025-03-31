<?php

/**
 * Project:     Logicmind
 * File:        packing_type.admin.php
 *
 * @author Sivaranjani S
 * @since 09/08/2022
 * @package admin
 * @version 1.0
 * @see packing_type.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$time = date('Y-m-d G:i:s');
$usr_id = $_SESSION['user_id'];
$dept_id = getDeptId($usr_id);

if (isset($_POST['add_packing_type'])) {
    $type = $_POST['type'];
    $description = $_POST['description'];

    $sequence_object = new Sequence;
    $id = "packing_type:" . $sequence_object->get_next_sequence();

    $apack_type_obj = new DB_Public_lm_ssm_packing_type_master();
    $apack_type_obj->object_id = $id;
    $apack_type_obj->type = $type;
    $apack_type_obj->description = $description;
    $apack_type_obj->created_by = $usr_id;
    $apack_type_obj->created_time = $time;
    $apack_type_obj->insert();

    /** Audit Trial * */
    
    $new_val = "Type :$type\nDescription : $description";
    $old_val = null;
    $audit_id = "audit.packing_type_details:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_ssm_packing_type_master(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");
    header("Location:?module=admin&action=packing_type");
}

/* Update Unit */
if (isset($_POST['update_packing_type'])) {
    $uobject_id = $_REQUEST['uobject_id'] ?: NULL;
    $utype = $_REQUEST['utype'] ?: NULL;
    $udescription = $_REQUEST['udescription'] ?: NULL;

    // Getting old val for audit trail
    $at_pack_type_obj = new DB_Public_lm_ssm_packing_type_master();
    $at_pack_type_obj->get("object_id",$uobject_id);
    
    $upack_type_obj = new DB_Public_lm_ssm_packing_type_master();
    $upack_type_obj->whereAdd("object_id='$uobject_id'");
    $upack_type_obj->type = $utype;
    $upack_type_obj->description = $udescription;
    $upack_type_obj->modified_by = $usr_id;
    $upack_type_obj->modified_time = $time;
    $upack_type_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    
    /*Audit Trail*/
    $new_val = "Type : $utype\nDescription : $udescription";
    $old_val = "Type : $at_pack_type_obj->type\nDescription : $at_pack_type_obj->description";
    
    $sequence_object = new Sequence;
    $audit_id="audit.packing_type_details:".$sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_ssm_packing_type_master(),$audit_id,$usr_id,$dept_id,'update',$new_val,$old_val,"Successfully Updated");
    header("Location:?module=admin&action=packing_type");
}

$view_packing_type_obj = new PackingType();
$packing_type_details = $view_packing_type_obj->get_packing_type_details();

$smarty->assign("packing_type_details", $packing_type_details);
$smarty->assign('main', _TEMPLATE_PATH_ . "packing_type.admin.tpl");
?>
