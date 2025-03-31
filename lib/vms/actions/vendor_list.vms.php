<?php

/**
 * Project:     Logicmind
 * File:        add_vendor_org.vms.php
 *
 * @author Sivaranjani S, Puneet
 * @since 09/12/2020
 * @package vms
 * @version 1.0
 * @see add_vendor_org.vms.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'vendor_create', 'yes')) {
    $error_handler->raiseError("create_vendor");
}

$usr_id = $_SESSION['user_id'];
$usr_dept_id = getDeptId($usr_id);
$date_time = date('Y-m-d G:i:s');

$vms_process = new Vms_Processor();
$vendor_type_list = getVendorTypeDetails();

// throw error if if dev rleated , sub related ,classifi ,dev_type not exist
if (empty($vendor_type_list)) {
    $smarty->assign('master_data_creation_alert', true);
}

//Add Vendor Organization
if (isset($_POST['add_vendor_org'])) {
    $avms_data = array(
        'organization' => $_POST['ao_org'] ?: NULL,
        'short_name' => $_POST['ao_short_name'] ?: NULL,
        'address' => $_POST['ao_address'] ?: NULL,
        'city' => $_POST['ao_city'] ?: NULL,
        'state' => $_POST['ao_state'] ?: NULL,
        'country' => $_POST['ao_country'] ?: NULL,
        'pincode' => $_POST['ao_pincode'] ?: NULL,
        'landline_number' => $_POST['ao_landline_number'] ?: NULL,
        'primary_contact' => $_POST['ao_primary_contact'] ?: NULL,
        'primary_contact_number' => $_POST['ao_primary_contact_number'] ?: NULL,
        'secondary_contact' => $_POST['ao_secondary_contact'] ?: NULL,
        'secondary_contact_number' => $_POST['ao_secondary_contact_number'] ?: NULL,
        'email' => $_POST['ao_email'] ?: NULL,
        'website' => $_POST['ao_website'] ?: NULL,
        'no_of_employees' => $_POST['ao_no_of_employees'] ?: NULL,
        'annual_turnover' => $_POST['ao_annual_turnover'] ?: NULL,
        'established_year' => $_POST['ao_established_year'] ?: NULL,
        'certifications' => $_POST['ao_certifications'] ?: NULL,
        'usr_id' => $usr_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'audit_trail_action' => $_POST['audit_trail_action']
    );
    if ($vms_process->add_vms_org($avms_data)) {
        header("Location:$_SERVER[REQUEST_URI]");
    } else {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    }
}
//Update Vendor Organization
if (isset($_POST['update_vendor_org'])) {
    $avms_data = array(
        'org_id' => $_POST['uo_org_id'] ?: NULL,
        'organization' => $_POST['uo_org'] ?: NULL,
        'short_name' => $_POST['uo_short_name'] ?: NULL,
        'org_type' => $_POST['uo_org_type'] ?: NULL,
        'address' => $_POST['uo_address'] ?: NULL,
        'city' => $_POST['uo_city'] ?: NULL,
        'state' => $_POST['uo_state'] ?: NULL,
        'country' => $_POST['uo_country'] ?: NULL,
        'pincode' => $_POST['uo_pincode'] ?: NULL,
        'landline_number' => $_POST['uo_landline_number'] ?: NULL,
        'primary_contact' => $_POST['uo_primary_contact'] ?: NULL,
        'primary_contact_number' => $_POST['uo_primary_contact_number'] ?: NULL,
        'secondary_contact' => $_POST['uo_secondary_contact'] ?: NULL,
        'secondary_contact_number' => $_POST['uo_secondary_contact_number'] ?: NULL,
        'email' => $_POST['uo_email'] ?: NULL,
        'website' => $_POST['uo_website'] ?: NULL,
        'no_of_employees' => $_POST['uo_no_of_employees'] ?: NULL,
        'annual_turnover' => $_POST['uo_annual_turnover'] ?: NULL,
        'established_year' => $_POST['uo_established_year'] ?: NULL,
        'certifications' => $_POST['uo_certifications'] ?: NULL,
        'is_active' => $_POST['uo_is_active'] ?: NULL,
        'usr_id' => $usr_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'audit_trail_action' => $_POST['audit_trail_action']
    );
    if ($vms_process->update_vms_org($avms_data)) {
        header("Location:$_SERVER[REQUEST_URI]");
    } else {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    }
}

//Add Vendor Plant
if (isset($_POST['add_vendor_plant'])) {
    $avms_data = array(
        'organization' => $_POST['ap_org'] ?: NULL,
        'plant_name' => $_POST['ap_plant_name'] ?: NULL,
        'plant_short_name' => $_POST['ap_plant_short_name'] ?: NULL,
        'plant_type' => $_POST['ap_plant_type'] ?: NULL,
        'address' => $_POST['ap_address'] ?: NULL,
        'city' => $_POST['ap_city'] ?: NULL,
        'state' => $_POST['ap_state'] ?: NULL,
        'country' => $_POST['ap_country'] ?: NULL,
        'pincode' => $_POST['ap_pincode'] ?: NULL,
        'landline_number' => $_POST['ap_landline_number'] ?: NULL,
        'primary_contact' => $_POST['ap_primary_contact'] ?: NULL,
        'primary_contact_number' => $_POST['ap_primary_contact_number'] ?: NULL,
        'secondary_contact' => $_POST['ap_secondary_contact'] ?: NULL,
        'secondary_contact_number' => $_POST['ap_secondary_contact_number'] ?: NULL,
        'email' => $_POST['ap_email'] ?: NULL,
        'website' => $_POST['ap_website'] ?: NULL,
        'no_of_employees' => $_POST['ap_no_of_employees'] ?: NULL,
        'annual_turnover' => $_POST['ap_annual_turnover'] ?: NULL,
        'established_year' => $_POST['ap_established_year'] ?: NULL,
        'certifications' => $_POST['ap_certifications'] ?: NULL,
        'usr_id' => $usr_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'audit_trail_action' => $_POST['audit_trail_action']
    );

    if ($vms_process->add_vms_plant($avms_data)) {
        header("Location:$_SERVER[REQUEST_URI]");
    } else {
        $error_handler->raiseError("INSERT_REQUEST_FAILED");
    }
}

//Update Vendor Plant
if (isset($_POST['update_vendor_plant'])) {
    $avms_data = array(
        'plant_id' => $_POST['up_plant_id'] ?: NULL,
        'organization' => $_POST['up_organization'] ?: NULL,
        'plant_name' => $_POST['up_plant_name'] ?: NULL,
        'plant_short_name' => $_POST['up_plant_short_name'] ?: NULL,
        'plant_type' => $_POST['up_plant_type'] ?: NULL,
        'address' => $_POST['up_address'] ?: NULL,
        'city' => $_POST['up_city'] ?: NULL,
        'state' => $_POST['up_state'] ?: NULL,
        'country' => $_POST['up_country'] ?: NULL,
        'pincode' => $_POST['up_pincode'] ?: NULL,
        'landline_number' => $_POST['up_landline_number'] ?: NULL,
        'primary_contact' => $_POST['up_primary_contact'] ?: NULL,
        'primary_contact_number' => $_POST['up_primary_contact_number'] ?: NULL,
        'secondary_contact' => $_POST['up_secondary_contact'] ?: NULL,
        'secondary_contact_number' => $_POST['up_secondary_contact_number'] ?: NULL,
        'email' => $_POST['up_email'] ?: NULL,
        'website' => $_POST['uwebsite'] ?: NULL,
        'no_of_employees' => $_POST['up_no_of_employees'] ?: NULL,
        'annual_turnover' => $_POST['up_annual_turnover'] ?: NULL,
        'established_year' => $_POST['up_established_year'] ?: NULL,
        'certifications' => $_POST['up_certifications'] ?: NULL,
        'is_active' => $_POST['up_is_active'] ?: NULL,
        'usr_id' => $usr_id,
        'usr_dept' => $usr_dept_id,
        'date_time' => $date_time,
        'audit_trail_action' => $_POST['audit_trail_action']
    );

    if ($vms_process->update_vms_plant($avms_data)) {
        header("Location:$_SERVER[REQUEST_URI]");
    } else {
        $error_handler->raiseError("UPDATE_REQUEST_FAILED");
    }
}

$smarty->assign('vendor_type_list', getVendorTypeDetails());
$smarty->assign('vms_org_list', $vms_process->get_vms_org());
$smarty->assign('vms_plant_list', $vms_process->get_vms_plants());
$smarty->assign('main', _TEMPLATE_PATH_ . "vendor_list.vms.tpl");
