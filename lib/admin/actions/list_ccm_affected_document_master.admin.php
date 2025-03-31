<?php

/**
 * Project:     Logicmind
 * File:        cc_type.admin.php
 *
 * @author Benila Arthi O G,Puneet
 * @since 24/02/2020
 * @package cc
 * @version 1.0
 * @see cc_affected_document.admin.tpl
 */
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

/* Add Affected Document */
if (isset($_POST['submit_add'])) {
    $adoc = array('doc_name' => $_POST['adoc_name'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addCcAffectedDocument($adoc) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

if (isset($_POST['submit_update'])) {
    $udoc = array('object_id' => $_POST['uobject_id'] ?: NULL, 'doc_name' => $_POST['udoc_name'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateCcAffectedDocument($udoc) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign('document_list', getCcAffectedDoclist());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_ccm_affected_document_master.admin.tpl");
?>

