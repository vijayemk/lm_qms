<?php

/**
 * Project:     Logicmind
 * File:        mangement_auth.admin.php
 *
 * @author Ananthakumar V
 * @since 12/12/2018
 * @package admin
 * @version 1.0
 * @see mangement_auth.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$user_workflow_auth_array = getLmDocWorkflowActionUserList();
$smarty->assign("user_workflow_auth_array", $user_workflow_auth_array);
$smarty->assign('lm_doc_list_count', count($user_workflow_auth_array));
$smarty->assign('main', _TEMPLATE_PATH_ . "management_auth.admin.tpl");
?>
