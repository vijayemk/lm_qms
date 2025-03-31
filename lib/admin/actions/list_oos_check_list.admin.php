<?php
/**
 * Project:Logicmind
 * File: list_oos_check_list.admin.php
 *
 * @author Jithin
 * @since 26/10/2024
 * @package OOS
 * @version 1.0
 * @see list_oos_check_list.admin.tpl
 **/

error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$userId = $_SESSION['user_id'];
$dateTime = date('Y-m-d G:i:s');
$departmentId = getDeptId($userId);

// Create checklist 
if (isset($_POST['submit_add'])) {   
    $checkList =[
                'checkPoints' => $_POST['check_points'] ?: NULL,
                'userId' => $userId, 
                'dateTime' => $dateTime
                ];                

    if (addOosCheckList($checkList) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

// Update checklist 
if (isset($_POST['submit_update'])) {
    $ucheckList = [
                    'objectId' => $_POST['uobject_id'] ?: NULL,
                    'checkPoints' => $_POST['ucheck_points'] ?: NULL, 
                    'isEnabled' => $_POST['uis_enabled'] ?: NULL, 
                    'userId' => $userId, 
                    'dateTime' => $dateTime, 
                    'departmentId' => $departmentId
                ];

    if (updateOosCheckList($ucheckList) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign('checklistList', getOosChecklistDetails());
$smarty->assign('main', _TEMPLATE_PATH_.'list_oos_check_list.admin.tpl');




 