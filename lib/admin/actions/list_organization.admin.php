<?php

/**
 * Project:    Logicmind
 * File:       list_organization.admin.php
 *
 * @author Ananthakumar V
 * @since 16/02/2017
 * @package admin
 * @version 1.0
 * @see list_organization.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}

$usr_id = $_SESSION['user_id'];
$time = date('Y-m-d G:i:s');
$dept_id = getDeptId($usr_id);

$org_obj = new Organization();
$orglist = $org_obj->organizationlist();
if (count($orglist) < 1) {
    $add_org = true;
    $add_plant = false;
    $smarty->assign('add_org', $add_org);
    $smarty->assign('add_plant', $add_plant);
} else {
    $add_org = false;
    $add_plant = true;
    $smarty->assign('add_org', $add_org);
    $smarty->assign('add_plant', $add_plant);
}
if (isset($_POST['oadd'])) {
    if (count($orglist) < 1) {
        $sequence_object = new Sequence;
        $id = "admin.org:" . $sequence_object->get_next_sequence();

        $org = new Organization();
        $org->org_id = $id;
        $org->org_name = trim($_POST['organization']);
        $org->address = trim($_POST['address']);
        $org->city = trim($_POST['city']);
        $org->state = trim($_POST['state']);
        $org->country = trim($_POST['country']);
        $org->pincode = trim($_POST['pincode']);
        $org->contact_number = trim($_POST['contact_number']);
        $org->email = trim($_POST['email']);
        $org->website = trim($_POST['website']);
        $org->short_name = trim($_POST['short_name']);
        $org->created_by = $usr_id;
        $org->created_time = $time;
        $org->modified_by = $usr_id;
        $org->modified_time = $time;
        $org->is_Active = 'yes';
        $org->insert();

        // Audit Trail
        $new_val = "Short Name : " . trim($_POST['short_name']) . "\nOrganization : " . trim($_POST['organization']) . "\nAddress : " . trim($_POST['address']) . "\nCity : " . trim($_POST['city']) . "\nState : " . trim($_POST['state']) . "\nCountry : " . trim($_POST['country']) . "\nPinCode : " . trim($_POST['pincode']) . "\nContact Number : " . trim($_POST['contact_number']) . "\nEmail : " . trim($_POST['email']) . "\nWebsite : " . trim($_POST['website']);
        $old_val = null;
        $sequence_object = new Sequence;
        $audit_id = "audit.org:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_organization(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");
        header("Location:$_SERVER[REQUEST_URI]");
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
}
if (isset($_POST['padd'])) {
    $sequence_object = new Sequence;
    $id = "admin.plant:" . $sequence_object->get_next_sequence();

    $org_plants = new OrgPlants();
    $org_plants->plant_id = $id;
    $org_plants->org_id = trim($_POST['porg_name']);
    $org_plants->plant_name = trim($_POST['plant_name']);
    $org_plants->short_name = trim($_POST['pshort_name']);
    $org_plants->address = trim($_POST['paddress']);
    $org_plants->city = trim($_POST['pcity']);
    $org_plants->state = trim($_POST['pstate']);
    $org_plants->country = trim($_POST['pcountry']);
    $org_plants->pincode = trim($_POST['ppincode']);
    $org_plants->contact_number = trim($_POST['pcontact_number']);
    $org_plants->email = trim($_POST['pemail']);
    $org_plants->website = trim($_POST['pwebsite']);
    $org_plants->created_by = $usr_id;
    $org_plants->created_time = $time;
    $org_plants->modified_by = $usr_id;
    $org_plants->modified_time = $time;
    $org_plants->insert();

    if (!empty($_FILES['ufile']['tmp_name'])) {
        $tempFile = $_FILES['ufile']['tmp_name'];
        $file_type = $_FILES['ufile']['type'];
        $file_size = $_FILES['ufile']['size'];
        $file_name = $_FILES['ufile']['name'];
        $file_name = $_FILES['ufile']['name'];
        $file_name = clean_filename($file_name, 0, 50);

        $fhash = md5($tempFile);
        $hash = uniqid($fhash);

        $file_info = new SplFileInfo($_FILES['ufile']['name']);
        $extension = $file_info->getExtension();

        $sequence = new Sequence;
        $file_id = "plant_logo:" . $sequence->get_next_sequence();

        $file = new DB_Public_file();
        $file->object_id = $file_id;
        $file->type = $file_type;
        $file->name = $file_name;
        $file->size = $file_size;
        $file->hash = $hash . "." . $extension;
        if (!move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension)) {
            //$error_handler->raiseError("FILE NOT COPIED");
        }
        $file->insert();

        $doc_file = new DB_Public_lm_doc_file();
        $doc_file->file_id = $file_id;
        $doc_file->object_id = $id;
        $doc_file->attached_by = $usr_id;
        $doc_file->attached_date = $time;
        $doc_file->insert();
    }

    // Audit Trail
    $new_val = "Short Name : " . trim($_POST['pshort_name']) . "\nComoany Name : " . trim($_POST['plant_name']) . "\nOrganization : " . getOrganization(trim($_POST['porg_name'])) . "\nAddress : " . trim($_POST['paddress']) . "\nCity : " . trim($_POST['pcity']) . "\nState : " . trim($_POST['pstate']) . "\nCountry : " . trim($_POST['pcountry']) . "\nPinCode : " . trim($_POST['ppincode']) . "\nContact Number : " . trim($_POST['pcontact_number']) . "\nEmail : " . trim($_POST['pemail']) . "\nWebsite : " . trim($_POST['pwebsite']);
    $old_val = null;
    $sequence_object = new Sequence;
    $audit_id = "audit.plant:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_plant(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}

if (isset($_POST['adept_add'])) {
    $adept_plant = $_REQUEST['adept_plant'] ?: NULL;
    $adept_short_name = $_REQUEST['adept_short_name'] ?: NULL;
    $adept_code = $_REQUEST['adept_code'] ?: NULL;
    $adept_full_name = $_REQUEST['adept_full_name'] ?: NULL;

    $sequence_object = new Sequence;
    $id = "admin.department:" . $sequence_object->get_next_sequence();

    //Add
    $dep = new Department();
    $dep->department_id = $id;
    $dep->department = $adept_short_name;
    $dep->department_code = $adept_code;
    $dep->creator = $usr_id;
    $dep->created_time = $time;
    $dep->full_name = $adept_full_name;
    $dep->plant_id = $adept_plant;
    $dep->insert();

    // Audit Trail
    $new_val = "Department Code : $adept_code\nShort Name : $adept_short_name\nFull name : $adept_full_name\nCompany name : " . getPlantName($adept_plant);
    $old_val = null;

    $sequence_object = new Sequence;
    $audit_id = "audit.dept:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_department(), $audit_id, $usr_id, $dept_id, 'add', $new_val, $old_val, "Successfully Added");
    header("Location:$_SERVER[REQUEST_URI]");
}

if (isset($_POST['udept_update'])) {
    $udept_id = $_REQUEST['udept_id'] ?: NULL;
    $udept_plant = $_REQUEST['udept_plant'] ?: NULL;
    $udept_code = $_REQUEST['udept_code'] ?: NULL;
    $udept_short_name = $_REQUEST['udept_short_name'] ?: NULL;
    $udept_full_name = $_REQUEST['udept_full_name'] ?: NULL;

    // Getting old val for audit trail
    $atdept_old = new Department();
    $atdept_old->get("department_id", $udept_id);

    // Update new value
    $udep = new Department();
    $udep->whereAdd("department_id='$udept_id'");
    $udep->department = $udept_short_name;
    $udep->department_code = $udept_code;
    $udep->full_name = $udept_full_name;
    $udep->$udept_plant = $udept_full_name;
    $udep->update(DB_DATAOBJECT_WHEREADD_ONLY);

    // Audit Trail
    $new_val = "Department Code : $udept_code\nShort Name : $udept_short_name\nFull name : $udept_full_name\nPlant name : " . getPlantName($udept_plant);
    $old_val = "Department Code : $atdept_old->department_code\nShort Name : $atdept_old->department\nFull name : $atdept_old->full_name\nCompany name : " . getPlantName($atdept_old->plant_id);

    $sequence_object = new Sequence;
    $audit_id = "audit.dept:" . $sequence_object->get_next_sequence();
    AddAuditTrial(new DB_Public_lm_audit_department(), $audit_id, $usr_id, $dept_id, 'update', $new_val, $old_val, "Successfully Updated");
    header("Location:$_SERVER[REQUEST_URI]");
}

$smarty->assign('orglist', $orglist);
$smarty->assign('plantlist', getPlantList(null, null));
$smarty->assign('deptlist', getDeptList(null));
$smarty->assign('main', _TEMPLATE_PATH_ . "list_organization.admin.tpl");
?>
