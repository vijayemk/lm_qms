<?php

/**
 * Project:     Logicmind
 * File:       management_action.admin.php
 *
 * @author Ananthakumar V
 * @since 18/02/2020
 * @package admin
 * @version 1.0
 * @see management_action.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$doc_obj = new LmDocList();
$doc_list = $doc_obj->get_lm_doc_detaillist();

if (isset($_POST['update'])) {
    $lm_doc = (isset($_POST['lm_doc'])) ? $_POST['lm_doc'] : null;
    $mgmt_action_to_array = (isset($_POST['mgmt_action_to'])) ? $_POST['mgmt_action_to'] : null;

    /** Delete previous action */
    $dobj = new DB_Public_lm_doc_management_actions();
    $dobj->whereAdd("lm_doc_id='$lm_doc'");
    $dobj->delete(DB_DATAOBJECT_WHEREADD_ONLY);

    for ($i = 0; $i < count($mgmt_action_to_array); $i++) {
        $aobj = new DB_Public_lm_doc_management_actions();
        $aobj->lm_doc_id = $lm_doc;
        $aobj->workflow_action_id = $mgmt_action_to_array[$i];
        $aobj->insert();
    }
    header("Location:$_SERVER[REQUEST_URI]");
}
$smarty->assign('doc_list', $doc_list);
$smarty->assign('main', _TEMPLATE_PATH_ . "management_action.admin.tpl");
?>
