<?php

/**
 * Project:    Logicmind
 * File:       update_plant.admin.php
 *
 * @author Ananthakumar V
 * @since 06/10/2018
 * @package admin
 * @version 1.0
 * @see update_plant.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'admin_module', 'yes')) {
    $error_handler->raiseError("admin_module");
}
$org_obj = new Organization();
$orglist = $org_obj->organizationlist();

$plant_id = $_REQUEST['object_id'];
$view_plant = new OrgPlants();
if ($view_plant->get("plant_id", $plant_id)) {
    $doc_file_processor_object = new Doc_File_Processor();
    $fileobjectarray = $doc_file_processor_object->getLmDocFileObjectArray($plant_id);
    if (isset($_POST['update'])) {
        $usr_id = $_SESSION['user_id'];
        $time = date('Y-m-d G:i:s');
        $dept_id = getDeptId($usr_id);

        // Getting old val for audit trail
        $at_plant_old = new OrgPlants();
        $at_plant_old->get("plant_id", $plant_id);

        $org_plants = new OrgPlants();
        $org_plants->whereAdd("plant_id = '$plant_id'");
        $org_plants->org_id = trim($_POST['porg_name']);
        ;
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
        $org_plants->update();

        if (!empty($_FILES['ufile']['tmp_name'])) {
            foreach ($fileobjectarray as $key => $val) {
                delete_lm_doc_file_file($val['object_id'], $plant_id);
            }
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
            $doc_file->object_id = $plant_id;
            $doc_file->attached_by = $usr_id;
            $doc_file->attached_date = $time;
            $doc_file->insert();
        }

        // Audit Trail
        $new_val = "Short Name : " . trim($_POST['pshort_name']) . "\nPlant Name : " . trim($_POST['plant_name']) . "\nOrganization : " . getOrganization(trim($_POST['porg_name'])) . "\nAddress : " . trim($_POST['paddress']) . "\nCity : " . trim($_POST['pcity']) . "\nState : " . trim($_POST['pstate']) . "\nCountry : " . trim($_POST['pcountry']) . "\nPinCode : " . trim($_POST['ppincode']) . "\nContact Number : " . trim($_POST['pcontact_number']) . "\nEmail : " . trim($_POST['pemail']) . "\nWebsite : " . trim($_POST['pwebsite']);
        $old_val = "Short Name : " . $at_plant_old->short_name . "\nPlant Name : " . $at_plant_old->plant_name . "\nOrganization : " . getOrganization($at_plant_old->org_id) . "\nAddress : " . $at_plant_old->address . "\nCity : " . $at_plant_old->city . "\nState : " . $at_plant_old->state . "\nCountry : " . $at_plant_old->country . "\nPinCode : " . $at_plant_old->pincode . "\nContact Number : " . $at_plant_old->contact_number . "\nEmail : " . $at_plant_old->email . "\nWebsite : " . $at_plant_old->website;
        $sequence_object = new Sequence;
        $audit_id = "audit.plant:" . $sequence_object->get_next_sequence();
        AddAuditTrial(new DB_Public_lm_audit_plant(), $audit_id, $usr_id, $dept_id, 'Update', $new_val, $old_val, "Successfully Updated");
        header("Location:$_SERVER[REQUEST_URI]");
    }

    $smarty->assign("regobj", $view_plant);
    $smarty->assign("fileobjectarray", $fileobjectarray);
    $smarty->assign('orglist', $orglist);
    $smarty->assign('main', _TEMPLATE_PATH_ . "update_plant.admin.tpl");
} else {
    $error_handler->raiseError("INVALID REQUEST");
}
?>
