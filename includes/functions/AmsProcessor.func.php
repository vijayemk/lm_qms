<?php

/** ==========Audit  Type Details Start================ * ** */
function addAuditType($data)
{
    $audit_type = trim($data['am_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_audit_type_exists($audit_type) == false) {
        $object_id = get_object_id("definitions->object_id->qms->ams_master_data->audit_type->object_id");
        $obj = new DB_Public_lm_audit_type_master();
        $obj->object_id = $object_id;
        $obj->type = $audit_type;
        $obj->description = $desc;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {

            //Audit Trail
            $at_data['Audit Type'] = array("NA", $audit_type, $audit_type);
            $at_data['Description'] = array("NA", $desc, $desc);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add Audit Type Master", "Successfully Added");
            return true;
        }
    }
    return false;
}

function updateAuditType($data)
{
    $object_id = trim($data['object_id']);
    $audit_type = trim($data['am_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_audit_type_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_audit_type_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->type = $audit_type;
    $obj->description = $desc;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

        //Audit Trail
        $at_data['Audit Type'] = array($old_obj->type, $audit_type, $audit_type);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, "yes", "yes");
        addAuditTrailLog($object_id, null, $at_data, "Update Audit Type To Master", "Successfully Updated");
        return true;
    }
    return false;
}

function getAuditTypeList($object_id = null, $type = null, $is_enabled = null)
{
    $obj = new DB_Public_lm_audit_type_master();
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
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $return_list[] = array(
            'object_id' => $obj->object_id,
            'type' => $obj->type,
            'is_enabled' => $obj->is_enabled,
            'description' => $obj->description,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time
        );
        $count++;
    }
    return $return_list;
}

function is_audit_type_exists($type)
{
    $obj = new DB_Public_lm_audit_type_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(type) = lower('$type')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getAuditType($object_id)
{
    $audit_type_obj = new DB_Public_lm_audit_type_master();
    $audit_type_obj->get("object_id", $object_id);
    return $audit_type_obj->type;
}

/** ==========Audit Type Details Stop================ * ** */

/** ==========Audit Sub Type Details Start================ * ** */
function addAuditSubType($data)
{
    $audit_type = trim($data['am_type']);
    $sub_type = $data['sub_type'];
    $desc = $data['description'];
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    for ($i = 0; $i < count($sub_type); $i++) {
        if (is_audit_sub_type_exists($audit_type[$i], $sub_type[$i]) == false) {
            $id = get_object_id("definitions->object_id->qms->ams_master_data->audit_sub_type->object_id");

            $obj = new DB_Public_lm_audit_sub_type_master();
            $obj->object_id = $id;
            $obj->audit_type_id = $audit_type;
            $obj->sub_type = trim($sub_type[$i]);
            $obj->description = trim($desc[$i]);
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->is_enabled = "yes";
            if ($obj->insert()) {
                //Audit Trail
                $at_at_new .= "\n\t\t\t" . getAuditType($audit_type) . " - " . $sub_type[$i];
                $at_at_p .= "\n\t\t\t" . getAuditType($audit_type) . " - $audit_type : " . $sub_type[$i];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    $at_data['Audit Sub Type'] = array("NA", $at_at_new, $at_at_p);
    addAuditTrailLog($id, null, $at_data, "Add Audit Sub Type Master", "Successfuly Added");
    return true;
}

function updateAuditSubType($data)
{
    $object_id = trim($data['object_id']);
    $audit_type = trim($data['am_type']);
    $sub_type = trim($data['sub_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_audit_sub_type_master();
    $old_obj->get("object_id", $object_id);
    $old_audit_type = getAuditType($old_obj->audit_type_id);

    $obj = new DB_Public_lm_audit_sub_type_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->audit_type_id = $audit_type;
    $obj->sub_type = $sub_type;
    $obj->description = $desc;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Audit Sub Type'] = array($old_obj->sub_type, $sub_type, getAuditType($audit_type) . " - " . $audit_type . " : " . $sub_type);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update Audit Sub Type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function is_audit_sub_type_exists($type, $sub_type)
{
    $obj = new DB_Public_lm_audit_sub_type_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE  lower(audit_type_id)= lower('$type') and lower(sub_type) = lower('$sub_type')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getAuditSubTypeList($object_id = null, $audit_type_id = null, $sub_type = null, $is_enabled = null)
{
    $obj = new DB_Public_lm_audit_sub_type_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($audit_type_id) {
        $obj->whereAdd("audit_type_id='$audit_type_id'");
    }
    if ($sub_type) {
        $obj->whereAdd("sub_type='$sub_type'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->orderBy('sub_type');
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $audit_sub_type_list[] = array(
            'object_id' => $obj->object_id,
            'audit_type_id' => $obj->audit_type_id,
            'is_enabled' => $obj->is_enabled,
            'type' => getAuditType($obj->audit_type_id),
            'sub_type' => $obj->sub_type,
            'description' => $obj->description,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time,
            'drop_down_value' => $obj->object_id,
            'drop_down_option' => $obj->sub_type
        );
        $count++;
    }
    return $audit_sub_type_list;
}

function getAuditSubType($object_id)
{
    $audit_sub_type_obj = new DB_Public_lm_audit_sub_type_master();
    $audit_sub_type_obj->get("object_id", $object_id);
    return $audit_sub_type_obj->sub_type;
}


/** ==========Audit Sub Type Details Stop================ * ** */
function get_ams_progress_bar_status($wf_status = null)
{
    $st_arr = array(
        "Created" => "10%",
        "Pending for QA Approval" => "25%",
        "QA Approval Needs Correction" => "25%",
        "Pending for Meeting Schedule" => "35%",
        "Pending for Meeting" => "40%",
        "Pending Auditors Assignment" => "45%",
        "Pending Audit" => "50%",
        "Pending for Sending QA Review" => "70%",
        "Pending for QA Review" => "90%",
        "QA Review Needs Correction" => "90%",
        "Completed" => "100%",
        "Cancelled" => "100%",
        "Rejected" => "100%"
    );
    return ($wf_status) ? $st_arr[$wf_status] : $st_arr;
}
