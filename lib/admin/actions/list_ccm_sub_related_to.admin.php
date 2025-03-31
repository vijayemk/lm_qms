<?php

/**
 * Project:     Logicmind
 * File:        cc_sub_related_to.admin.php
 *
 * @author Puneet
 * @since 02/12/2023
 * @package admin
 * @version 1.0
 * @see cc_sub_related_to.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $asub_related_to = array('related_to' => $_POST['arelated_to'] ?: NULL, 'sub_related_to' => $_POST['asub_related_to'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addChangeSubRelatedTo($asub_related_to) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $usub_related_to = array('object_id' => $_POST['uobject_id'] ?: NULL, 'related_to' => $_POST['urelated_to_id'] ?: NULL, 'sub_related_to' => $_POST['usub_related_to'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateChangeSubRelatedTo($usub_related_to) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign('related_to', getChangeRelatedToList());
$smarty->assign('sub_rel_list', getChangeSubRelatedList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_ccm_sub_related_to.admin.tpl");
?>
