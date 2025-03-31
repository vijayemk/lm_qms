<?php

/**
 * Project:     Logicmind
 * File:        cc_type.admin.php
 *
 * @author Benila Arthi O G, Puneet
 * @since 24/02/2020
 * @package cc
 * @version 1.0
 * @see cc_type.admin.tpl
 */
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

/* Add type of changes */
if (isset($_POST['submit_add'])) {
    $arelatedto = array('related_to' => $_POST['achange_related_to'] ?: NULL, 'description' => $_POST['adescription'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (addChangeRelatedTo($arelatedto) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

/* Update Type of Changes */
if (isset($_POST['submit_update'])) {
    $urelatedto = array('object_id' => $_POST['uobject_id'] ?: NULL, 'related_to' => $_POST['uchange_related_to'] ?: NULL, 'description' => $_POST['udescription'] ?: NULL, 'is_enabled' => $_POST['uis_enabled'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept);

    if (updateChangeRelatedTo($urelatedto) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign('changes_list', getChangeRelatedToList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_ccm_related_to_master.admin.tpl");
?>

