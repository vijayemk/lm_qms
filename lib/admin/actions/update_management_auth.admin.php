<?php

/**
 * Project:     Logicmind
 * File:        update_management_auth.admin.php
 *
 * @author Ananthakumar V
 * @since 12/12/2018
 * @package admin
 * @version 1.0
 * @see update_management_auth.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$doc_object_id = (isset($_REQUEST['object_id'])) ? $_REQUEST['object_id'] : null;
$lm_doc_obj = new DB_Public_lm_doc_list();
if ($lm_doc_obj->get("object_id", $doc_object_id)) {

    $auth_user_list = getLmManagementAuthUserList($doc_object_id);
    //$deptlist = get_All_DeptList();
    $plant_list = getPlantList(null, null);
    if (isset($_POST['add_mgmt_user'])) {
        // Audit Trail
        $usr_id = $_SESSION['user_id'];
        $time = date('Y-m-d G:i:s');
        $dept_id = getDeptId($usr_id);

        $mgmt_auth_user_to_array = (isset($_POST['mgmt_auth_user_to'])) ? $_POST['mgmt_auth_user_to'] : null;
        $workflow_action = (isset($_POST['workflow_action'])) ? $_POST['workflow_action'] : null;

        /** Delete previous action users */
        $dlm_doc_mgmt_auth = new DB_Public_lm_doc_management_auth();
        $dlm_doc_mgmt_auth->whereAdd("lm_doc_id='$doc_object_id'");
        $dlm_doc_mgmt_auth->whereAdd("action='$workflow_action'");
        $dlm_doc_mgmt_auth->delete(DB_DATAOBJECT_WHEREADD_ONLY);

        $new_val = getLmDocShortName($doc_object_id) . " All $workflow_action Authorization Removed Successfully";
        $old_val = null;
        $sequence_object = new Sequence;
        $audit_id = "audit.perm:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_permission(), $audit_id, $usr_id, $dept_id, 'delete', $new_val, $old_val, "Successfully removed");

        /** Add workflow action users */
        for ($i = 0; $i < count($mgmt_auth_user_to_array); $i++) {
            /** Insert new action users */
            $alm_doc_mgmt_auth = new DB_Public_lm_doc_management_auth();
            $alm_doc_mgmt_auth->lm_doc_id = $doc_object_id;
            $alm_doc_mgmt_auth->user_id = $mgmt_auth_user_to_array[$i];
            $alm_doc_mgmt_auth->action = $workflow_action;
            $alm_doc_mgmt_auth->user_dept = getdeptId($mgmt_auth_user_to_array[$i]);
            $alm_doc_mgmt_auth->insert();

            $new_val = getLmDocShortName($doc_object_id) . " " . $workflow_action . " Authorization enabled for " . getFullName($mgmt_auth_user_to_array[$i]);
            $old_val = null;

            $sequence_object = new Sequence;
            $audit_id = "audit.perm:" . $sequence_object->get_next_sequence();
            AddAuditTrial(new DB_Public_lm_audit_permission(), $audit_id, $usr_id, $dept_id, 'enable', $new_val, $old_val, "Successfully enabled");
        }
        header("Location:index.php?module=admin&action=update_management_auth&object_id=$doc_object_id");
    }

    $smarty->assign('workflow_actionlist', getManagementActionByLmDocId($doc_object_id));
    $smarty->assign('auth_user_list', $auth_user_list);
    //$smarty->assign('deptlist', $deptlist);
    $smarty->assign('plant_list', $plant_list);
    $smarty->assign('doc_object_id', $doc_object_id);
    $smarty->assign('doc_short_name', $lm_doc_obj->short_name);
    $smarty->assign('main', _TEMPLATE_PATH_ . "update_management_auth.admin.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
