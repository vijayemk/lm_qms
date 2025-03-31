<?php

/**
 * Project:     LogicMind
 * File:        customer_details.admin.php
 *
 * @author Sivaranjani S, Puneet
 * @since 13/05/2021
 * @package admin
 * @version 1.0
 * @see customer_details.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$usr_id = $_SESSION['user_id'];
$date_time = date('Y-m-d G:i:s');
$usr_dept = getDeptId($usr_id);

if (isset($_POST['submit_add'])) {
    $acustomer_data = array('cust_name' => $_POST['acustomer_name'] ?: NULL, 'cust_short_name' => $_POST['ashort_name'] ?: NULL, 'cust_addr' => $_POST['aaddress'] ?: NULL, 'cust_city' => $_POST['acity'] ?: NULL,
        'cust_state' => $_POST['astate'] ?: NULL, 'cust_country' => $_POST['acountry'] ?: NULL, 'cust_pincode' => $_POST['apincode'] ?: NULL, 'cust_contact_person_name' => $_POST['acontact_person_name'] ?: NULL,
        'cust_email' => $_POST['acontact_email'] ?: NULL, 'cust_contact_no' => $_POST['acontact_no'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept
    );
    if (addCustomerMasterDetails($acustomer_data) == false) {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
if (isset($_POST['submit_update'])) {
    $ucustomer_data = array('object_id' => $_POST['uobject_id'] ?: NULL, 'cust_name' => $_POST['ucustomer_name'] ?: NULL, 'cust_short_name' => $_POST['ushort_name'] ?: NULL, 'cust_addr' => $_POST['uaddress'] ?: NULL, 'cust_city' => $_POST['ucity'] ?: NULL,
        'cust_state' => $_POST['ustate'] ?: NULL, 'cust_country' => $_POST['ucountry'] ?: NULL, 'cust_pincode' => $_POST['upincode'] ?: NULL, 'cust_contact_person_name' => $_POST['ucontact_person_name'] ?: NULL,
        'cust_email' => $_POST['ucontact_email'] ?: NULL, 'cust_contact_no' => $_POST['ucontact_no'] ?: NULL, 'usr_id' => $usr_id, 'date_time' => $date_time, 'usr_dept' => $usr_dept,'is_enabled' => $_POST['uis_enabled'] ?: NULL,
    );
    if (updateCustomerMasterDetails($ucustomer_data) == false) {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    } else {
        header("Location:$_SERVER[REQUEST_URI]");
    }
}
$smarty->assign('customerlist', getCustomerMasterList());
$smarty->assign('main', _TEMPLATE_PATH_ . "list_customer_master.admin.tpl");
?>