<?php

/** ==========Vendor Type Details Start================ * */
function addVendorType($data) {
    $vendor_type = trim($data['vendor_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_vendor_type_exists($vendor_type) == false) {
        $id = get_object_id("definitions->object_id->qms->vms_master_data->vendor_type->object_id");

        $obj = new DB_Public_lm_vm_type_master();
        $obj->object_id = $id;
        $obj->type = $vendor_type;
        $obj->description = $desc;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $date_time;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Vendor Type'] = array("NA", $vendor_type, $vendor_type);
            $at_data['Description'] = array("NA", $desc, $desc);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($id, null, $at_data, "Add Vendor Type Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateVendorType($data) {
    $object_id = trim($data['object_id']);
    $vendor_type = trim($data['vendor_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_vm_type_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_vm_type_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->type = $vendor_type;
    $obj->description = $desc;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Vendor Type'] = array($old_obj->type, $vendor_type, $vendor_type);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Vendor Type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getVendorTypeDetails($object_id = null, $type = null, $is_enabled = null) {
    $obj = new DB_Public_lm_vm_type_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($type) {
        $obj->whereAdd("type='$type'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->orderBy('type');
    if ($obj->find()) {
        $count = 1;
        while ($obj->fetch()) {
            $vendor_type_list[] = array(
                'object_id' => $obj->object_id,
                'type' => $obj->type,
                'description' => $obj->description,
                'is_enabled' => $obj->is_enabled,
                'created_by' => getFullName($obj->created_by),
                'created_by_id' => $obj->created_by,
                'created_time' => $obj->created_time,
                'modified_by' => getFullName($obj->modified_by),
                'modified_by_id' => $obj->modified_by,
                'modified_time' => $obj->modified_time
            );
            $count++;
        }
        return $vendor_type_list;
    }
    return null;
}

function is_vendor_type_exists($type) {
    $obj = new DB_Public_lm_vm_type_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(type) = lower('$type')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getVendorType($type_id) {
    $obj = new DB_Public_lm_vm_type_master();
    $obj->get("object_id", $type_id);
    return $obj->type;
}

function getVendorTypeIdByVendor($vendor_plant_id) {
    $obj = new DB_Public_lm_vm_vendor_org_plants();
    $obj->get("plant_id", $vendor_plant_id);
    return $obj->vendor_type_id;
}

/** ==========Vendor Type Details Stop================ * */

/** ==========Vendor Agenda Details Start================ * */
function addVendorAgendaCategory($data) {
    $agenda = trim($data['category']);
    $score = trim($data['score']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    if (is_vendor_agenda_exists($agenda) == false) {
        $id = get_object_id("definitions->object_id->qms->vms_master_data->agenda_category->object_id");

        $obj = new DB_Public_lm_vm_category_master();
        $obj->object_id = $id;
        $obj->category = $agenda;
        $obj->description = $desc;
        $obj->category_score = $score;
        $obj->is_enabled = "yes";
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Vendor Agenda Category'] = array("NA", $agenda, $agenda);
            $at_data['Description'] = array("NA", $desc, $desc);
            $at_data['Category Score'] = array("NA", $score, $score);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($id, null, $at_data, "Add Vendor Agenda Category Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateVendorAgendaCategory($data) {
    $object_id = trim($data['object_id']);
    $agenda = trim($data['category']);
    $is_enabled = trim($data['is_enabled']);
    $score = trim($data['score']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    $old_obj = new DB_Public_lm_vm_category_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_vm_category_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->category = $agenda;
    $obj->description = $desc;
    $obj->category_score = $score;
    $obj->is_enabled = $is_enabled;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Vendor Agenda Category'] = array($old_obj->category, $agenda, $agenda);
        $at_data['Category Score'] = array("NA", $score, $score);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Vendor Agenda Category Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function is_vendor_agenda_exists($category) {
    $obj = new DB_Public_lm_vm_category_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(category) = lower('$category')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getVendorAgendaCatList($object_id = null, $category = null, $is_enabled = null) {
    $obj = new DB_Public_lm_vm_category_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($category) {
        $obj->whereAdd("category='$category'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->find();
    $obj->orderBy('category');
    $count = 1;
    while ($obj->fetch()) {
        $agenda_categoy_list[] = array(
            'object_id' => $obj->object_id,
            'category' => $obj->category,
            'category_score' => $obj->category_score,
            'is_enabled' => $obj->is_enabled,
            'description' => $obj->description,
            'count' => $count,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => get_modified_date_time_format($obj->created_time),
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'subcategorylist' => getVendorAgendaSubCategoryList(null, $obj->object_id, null, null, null),
        );
        $count++;
    }
    return $agenda_categoy_list;
}

function get_vendor_agenda_category($category_id) {
    $vm_category_obj = new DB_Public_lm_vm_category_master();
    $vm_category_obj->get('object_id', $category_id);
    return $vm_category_obj->category;
}

function get_vendor_agenda_category_desc($category_id) {
    $vm_category_obj = new DB_Public_lm_vm_category_master();
    $vm_category_obj->get('object_id', $category_id);
    return $vm_category_obj->description;
}

/** ==========Vendor Agenda Details Stop================ * */

/** ==========Vendor Agenda Sub category Details Start================ * */
function addVendorAgendaSubCategory($data) {
    $category = trim($data['category']);
    $sub_category = $data['sub_category'];
    $desc = $data['description'];
    $risk_category = $data['risk_category'];
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    for ($i = 0; $i < count($sub_category); $i++) {
        if (is_vendor_sub_category_exists($category, $sub_category) == false) {

            $id = get_object_id("definitions->object_id->qms->vms_master_data->agenda_sub_category->object_id");
            $obj = new DB_Public_lm_vm_sub_category_master();
            $obj->object_id = $id;
            $obj->category_id = $category;
            $obj->sub_category = $sub_category[$i];
            $obj->risk_category = $risk_category[$i];
            $obj->description = $desc[$i];
            $obj->is_enabled = "yes";
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            if ($obj->insert()) {
                //Audit Trail
                $at_at_new .= "\n\t\t\t" . $sub_category[$i] . " - " . get_vendor_agenda_category($category) . " - " . getClassificationName($risk_category[$i]) . " - " . $desc[$i];
                $dev_related_to_at_p .= "\n\t\t\t$sub_category[$i] -" . get_vendor_agenda_category($category) . " - " . $category . " : " . getClassificationName($risk_category[$i]) . " - " . $risk_category[$i] . " - " . $desc[$i];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    $at_data["Vendor Agenda Sub Category"] = array("NA", $at_at_new, $dev_related_to_at_p);
    addAuditTrailLog($id, null, $at_data, "Add Vendor Agenda Sub Category Master", "Successfuly Added");
    return true;
}

function updateVendorAgendaSubCategory($data) {
    $object_id = trim($data['object_id']);
    $category = trim($data['category']);
    $sub_category = $data['sub_category'];
    $desc = $data['description'];
    $risk_category = $data['risk_category'];
    $is_enabled = trim($data['is_enabled']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    $old_obj = new DB_Public_lm_vm_sub_category_master();
    $old_obj->get("object_id", $object_id);
    $old_category_name = get_vendor_agenda_category($old_obj->category_id);
    $new_categy_name = get_vendor_agenda_category($category);

    $risk_category_old = getClassificationName($old_obj->risk_category);
    $risk_category_new = getClassificationName($risk_category);

    $obj = new DB_Public_lm_vm_sub_category_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->category_id = $category;
    $obj->sub_category = $sub_category;
    $obj->risk_category = $risk_category;
    $obj->description = $desc;
    $obj->is_enabled = $is_enabled;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Agenda Category'] = array($old_category_name, $new_categy_name, $category . " - " . $new_categy_name);
        $at_data['Agenda Sub Category'] = array($old_obj->sub_category, $sub_category, $sub_category);
        $at_data['Risk Category'] = array($risk_category_old, $risk_category_new, $risk_category . " - " . $risk_category_new);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Vendor Agenda Sub Category Mater", "Successfuly Updated");
        return true;
    }
    return false;
}

function getVendorAgendaSubCategoryList($object_id = null, $category = null, $sub_category = null, $risk_cat = null, $is_enabled = null) {
    $obj = new DB_Public_lm_vm_sub_category_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($category) {
        $obj->whereAdd("category_id='$category'");
    }
    if ($sub_category) {
        $obj->whereAdd("sub_category='$sub_category'");
    }
    if ($risk_cat) {
        $obj->whereAdd("risk_category='$risk_cat'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $agenda_sub_cat_list[] = array(
            'object_id' => $obj->object_id,
            'sub_category' => $obj->sub_category,
            'category' => get_vendor_agenda_category($obj->category_id),
            'risk_category_id' => $obj->risk_category,
            'risk_category_name' => getClassificationName($obj->risk_category),
            'is_enabled' => $obj->is_enabled,
            'description' => $obj->description,
            'count' => $count,
            'created_by' => getFullName($obj->created_by),
            'created_time' => get_modified_date_time_format($obj->created_time),
            'category_id' => $obj->category_id
        );
        $count++;
    }
    return $agenda_sub_cat_list;
}

function is_vendor_sub_category_exists($category, $sub_category) {
    $sub_category_obj = new DB_Public_lm_vm_sub_category_master();
    $sub_category_obj->query("SELECT * FROM {$sub_category_obj->__table} WHERE lower(category_id) = lower('$category') and lower(sub_category)=lower('$sub_category')");
    while ($sub_category_obj->fetch()) {
        return true;
    }
    return false;
}

function get_vendor_agenda_sub_category($sub_category_id) {
    $vm_category_obj = new DB_Public_lm_vm_sub_category_master();
    $vm_category_obj->get('object_id', $sub_category_id);
    return $vm_category_obj->sub_category;
}

function get_vendor_agenda_sub_category_desc($sub_category_id) {
    $vm_category_obj = new DB_Public_lm_vm_sub_category_master();
    $vm_category_obj->get('object_id', $sub_category_id);
    return $vm_category_obj->description;
}

/** ==========Vendor Agenda Sub category Details Stop================ * */

/** ==========Vendor Score Details Start================ * */
function addVendorScore($data) {
    $score = trim($data['score']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $old_score = getVendorApprovalScore();

    $delete_obj = new DB_Public_lm_vm_score_master();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_vm_score_master();
    $add_obj->score = $score;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_lm_vm_score_master_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_score;
        $remarks_obj->changed_to = $score;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Vendor Score'] = array($old_score, $score, $score);
            addAuditTrailLog('vendor_score_vms_master', null, $at_data, "Update Vendor Score", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getVendorApprovalScore() {
    $score_obj = new DB_Public_lm_vm_score_master();
    $score_obj->find();
    if ($score_obj->fetch()) {
        return $score_obj->score;
    }
}

function getVendorScoreRemarks() {
    $obj = new DB_Public_lm_vm_score_master_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = array("changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time);
    }
    return $remarks_list;
}

/** ==========Vendor Score Details Stop================ * */

/** ==========Vendor Validity Details Start================ * */
function addVendorValidity($data) {
    $expiry = trim($data['expiry']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_expiry = getVendorApprovalExpiryYear();

    $delete_obj = new DB_Public_lm_vm_expiry_year();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_vm_expiry_year();
    $add_obj->no_of_year = $expiry;
    if ($add_obj->insert()) {

        $remarks_obj = new DB_Public_lm_vm_expiry_year_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_expiry;
        $remarks_obj->changed_to = $expiry;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Expiry Year'] = array($old_expiry, $expiry, $expiry);
            addAuditTrailLog('expiry_year_vms_master', null, $at_data, "Update Expiry Year", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getVendorApprovalExpiryYear() {
    $obj = new DB_Public_lm_vm_expiry_year();
    $obj->find();
    if ($obj->fetch()) {
        return $obj->no_of_year;
    }
}

function getVendorApprovalExpiryYearDate() {
    $ex_year = getVendorApprovalExpiryYear();
    $date_obj = new DateTime();
    return display_date_format($date_obj->modify("+" . $ex_year . ' years')->format('d-m-Y'));
}

function getVendorValidityRemarks() {
    $obj = new DB_Public_lm_vm_expiry_year_remarks();
    $obj->orderBy('updated_time');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = ["changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time];
    }
    return $remarks_list;
}

/** ==========Vendor Validity Details Stop================ * */

/** ==========Vendor Reminder Mail Settings Start================ * */
function addVendorReminderMailAlert($data) {
    $alert_days = trim($data['mail_alert']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $reminder_mail_for = "vendor_approval_expiry";
    $old_value = get_reminder_mail_days($reminder_mail_for);

    $delete_obj = new DB_Public_reminder_mail_config();
    $delete_obj->get('reminder_mail_for', $reminder_mail_for);
    $delete_obj->delete();

    $add_obj = new DB_Public_reminder_mail_config();
    $add_obj->no_of_days = $alert_days;
    $add_obj->reminder_mail_for = $reminder_mail_for;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_reminder_mail_config_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_value;
        $remarks_obj->changed_to = $alert_days;
        $remarks_obj->reminder_mail_for = $reminder_mail_for;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Reminder Mail Alert'] = array($old_value, $alert_days, $alert_days);
            addAuditTrailLog('reminder_mail_alert_vms_master', null, $at_data, "Update Reminder Mail Alert", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getVendorReminderMailRemarks() {
    $obj = new DB_Public_reminder_mail_config_remarks();
    $obj->whereAdd("reminder_mail_for='vendor_approval_expiry'");
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = ["reminder_mail_for" => $obj->reminder_mail_for, "changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => get_modified_date_time_format($obj->effective_from), "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => get_modified_date_time_format($obj->updated_time)];
    }
    return $remarks_list;
}

/** ==========Vendor Reminder Mail Settings Stop================ * */
function vms_organization_exist($orgname) {
    $obj = new DB_Public_lm_vm_vendor_org();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(org_name) = lower('$orgname')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function vms_organization_short_name_exist($short_name) {
    $obj = new DB_Public_lm_vm_vendor_org();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(short_name) = lower('$short_name')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function vms_plant_exist($org_id, $plant_name) {
    $obj = new DB_Public_lm_vm_vendor_org_plants();
    $obj->query("SELECT * FROM {$obj->__table} WHERE org_id = '$org_id' and lower(plant_name) = lower('$plant_name')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function vms_plant_short_name_exist($org_id, $short_name) {
    $obj = new DB_Public_lm_vm_vendor_org_plants();
    $obj->query("SELECT * FROM {$obj->__table} WHERE org_id = '$org_id' and lower(short_name) = lower('$short_name')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

?>