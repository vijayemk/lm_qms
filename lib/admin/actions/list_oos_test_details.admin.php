<?php
/**
 * Project:Logicmind
 * File: list_oos_test_details.admin.php
 *
 * @author Jithin
 * @since 28/10/2024
 * @package OOS
 * @version 1.0
 * @see list_oos_test_details.admin.tpl
 **/

error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$userId = $_SESSION['user_id'];
$dateTime = date('Y-m-d G:i:s');
$departmentId = getDeptId($userId);

// Create Test Details 
if (isset($_POST['submit_add'])) {
    $testDetails = [
        'testName' => $_POST['test_name'] ?: NULL,
        'userId' => $userId,
        'dateTime' => $dateTime
    ];

    if (addOosTestDetails($testDetails) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

// Update Test Details 
if (isset($_POST['submit_update'])) {
    $uTestDetails = [
                    'objectId' => $_POST['uobject_id'] ?: NULL,
                    'testName' => $_POST['utest_name'] ?: NULL, 
                    'userId' => $userId, 
                    'dateTime' => $dateTime, 
                    'departmentId' => $departmentId
                ];

    if (updateOosTestDetails($uTestDetails) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}

$smarty->assign('testDetailsList', getOosTestDetailsList());
$smarty->assign('main', _TEMPLATE_PATH_ . 'list_oos_test_details.admin.tpl');




