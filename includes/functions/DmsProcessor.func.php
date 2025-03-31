<?php

/** ==========Deviation Related To Details Start================ * ** */
function addDevRelatedToMaster($data) {
    $related_to = trim($data['related_to']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_dev_related_to_exist($related_to) == false) {
        $object_id = get_object_id("definitions->object_id->qms->dms_master_data->related_to->object_id");

        $obj = new DB_Public_lm_dev_related_to_master();
        $obj->object_id = $object_id;
        $obj->type = $related_to;
        $obj->description = $desc;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Deviation Realted To'] = array("NA", $related_to, $related_to);
            $at_data['Description'] = array("NA", $desc, $desc);
            addAuditTrailLog($object_id, null, $at_data, "Add DMS Realted To Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateDevRelatedToMaster($data) {
    $object_id = trim($data['object_id']);
    $related_to = trim($data['related_to']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_dev_related_to_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_dev_related_to_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->type = $related_to;
    $obj->description = $desc;
    $obj->created_by = $usr_id;
    $obj->created_time = $date_time;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Deviation Realted To'] = array($old_obj->type, $related_to, $related_to);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update DMS Realted To Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getDevRelatedToMasterDetails($related_to_id = null, $related_to = null, $is_enabled = null) {
    $drt_obj = new DB_Public_lm_dev_related_to_master();
    if ($related_to_id) {
        $drt_obj->whereAdd("object_id='$related_to_id'");
    }
    if ($related_to) {
        $drt_obj->whereAdd("type='$related_to'");
    }
    if ($is_enabled) {
        $drt_obj->whereAdd("is_enabled='$is_enabled'");
    }
    $drt_obj->orderBy('type');
    if ($drt_obj->find()) {
        $count = 1;
        while ($drt_obj->fetch()) {
            $sub_realted_details = getDevSubRelatedToMasterDetails(null, $drt_obj->object_id, null, $is_enabled);
            $dev_related_to_list[] = array(
                'object_id' => $drt_obj->object_id,
                'related_to' => $drt_obj->type,
                'desc' => $drt_obj->description,
                'is_enabled' => $drt_obj->is_enabled,
                'created_by' => getFullName($drt_obj->created_by),
                'created_by_id' => $drt_obj->created_by,
                'created_time' => $drt_obj->created_time,
                'modified_by' => getFullName($drt_obj->modified_by),
                'modified_by_id' => $drt_obj->modified_by,
                'modified_time' => $drt_obj->modified_time,
                'sub_realted_details' => $sub_realted_details
            );
            $count++;
        }
        return $dev_related_to_list;
    }
    return null;
}

function is_dev_related_to_exist($type) {
    $dm_related_to_obj = new DB_Public_lm_dev_related_to_master();
    $dm_related_to_obj->query("SELECT * FROM {$dm_related_to_obj->__table} WHERE lower(type) = lower('$type')");
    while ($dm_related_to_obj->fetch()) {
        return true;
    }
    return false;
}

function getDevRelatedToType($object_id) {
    $rel_obj = new DB_Public_lm_dev_related_to_master();
    $rel_obj->get("object_id", $object_id);
    return $rel_obj->type;
}

/** ==========Deviation Related To Details Stop================ * ** */

/** ==========Deviation Sub Related To Details Start================ * ** */
function addDevSubRelatedToMaster($data) {
    $realted_to = trim($data['related_to']);
    $sub_related_to = $data['sub_related_to'];
    $desc = $data['description'];
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    for ($i = 0; $i < count($sub_related_to); $i++) {
        if (is_dev_sub_related_to_exist($realted_to, $sub_related_to) == false) {
            $object_id = get_object_id("definitions->object_id->qms->dms_master_data->sub_related_to->object_id");

            $obj = new DB_Public_lm_dev_sub_related_to_master();
            $obj->object_id = $object_id;
            $obj->related_to_id = $realted_to;
            $obj->type = $sub_related_to[$i];
            $obj->description = trim($desc[$i]);
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->is_enabled = "yes";
            if ($obj->insert()) {
                $new_related_to_name = getDevRelatedToType($realted_to);

                //Audit Trail
                $at_at_new .= "\n\t\t\t" . $new_related_to_name . " - " . $sub_related_to[$i];
                $dev_related_to_at_p .= "\n\t\t\t$new_related_to_name - $realted_to : $sub_related_to[$i]";
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    $at_data['Devation Sub Related To'] = array("NA", $at_at_new, $dev_related_to_at_p);
    addAuditTrailLog($object_id, null, $at_data, "Add DMS Realted To Master", "Successfuly Added");

    return true;
}

function updateDevSubRelatedToMaster($data) {
    $object_id = trim($data['object_id']);
    $realted_to = trim($data['related_to']);
    $sub_related_to = trim($data['sub_related_to']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_dev_sub_related_to_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_dev_sub_related_to_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->related_to_id = $realted_to;
    $obj->type = $sub_related_to;
    $obj->description = $desc;
    $obj->created_by = $usr_id;
    $obj->created_time = $date_time;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        $old_related_to_name = getDevRelatedToType($old_obj->related_to_id);
        $new_related_to_name = getDevRelatedToType($realted_to);
        $old_sub_related_to_name = getDevSubRelatedToType($old_obj->type);
        $new_sub_related_to_name = getDevSubRelatedToType($sub_related_to);

        //Audit Trail
        $at_data['DMS Related To'] = array($old_related_to_name, $new_related_to_name, $new_related_to_name . "-" . $realted_to);
        $at_data['DMS Sub  Related To'] = array($old_sub_related_to_name, $new_sub_related_to_name, $new_sub_related_to_name . "-" . $sub_related_to);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update CCM Change Sub Related To Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getDevSubRelatedToMasterDetails($object_id = null, $related_to_id = null, $sub_type = null, $is_enabled = null) {
    $dsrt_obj = new DB_Public_lm_dev_sub_related_to_master();
    if ($object_id) {
        $dsrt_obj->whereAdd("object_id='$object_id'");
    }
    if ($related_to_id) {
        $dsrt_obj->whereAdd("related_to_id='$related_to_id'");
    }
    if ($sub_type) {
        $dsrt_obj->whereAdd("type='$sub_type'");
    }
    if ($is_enabled) {
        $dsrt_obj->whereAdd("is_enabled='$is_enabled'");
    }
    $dsrt_obj->orderBy('type');
    $dsrt_obj->find();
    $count = 1;
    while ($dsrt_obj->fetch()) {
        $dev_related_to_list[] = array(
            'object_id' => $dsrt_obj->object_id,
            'related_to_id' => $dsrt_obj->related_to_id,
            'related_to' => getDevRelatedToType($dsrt_obj->related_to_id),
            'is_enabled' => $dsrt_obj->is_enabled,
            'sub_type' => $dsrt_obj->type,
            'desc' => $dsrt_obj->description,
            'created_by' => getFullName($dsrt_obj->created_by),
            'created_by_id' => $dsrt_obj->created_by,
            'created_time' => $dsrt_obj->created_time,
            'modified_by' => getFullName($dsrt_obj->modified_by),
            'modified_by_id' => $dsrt_obj->modified_by,
            'modified_time' => $dsrt_obj->modified_time
        );
        $count++;
    }
    return $dev_related_to_list;
}

function getDevSubRelatedToType($object_id) {
    $obj = new DB_Public_lm_dev_sub_related_to_master();
    $obj->get("object_id", $object_id);
    return $obj->type;
}

function getDevSubRelatedToDesc($object_id) {
    $obj = new DB_Public_lm_dev_sub_related_to_master();
    $obj->get("object_id", $object_id);
    return $obj->description;
}

function is_dev_sub_related_to_exist($related_to_id, $sub_type) {
    $obj = new DB_Public_lm_dev_sub_related_to_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(related_to_id) = lower('$related_to_id') and lower(type) = lower('$sub_type')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

/** ==========Deviation Sub Related To Details Stop================ * ** */

/** ==========Deviation Target Date expiry Days Details Stop================ * ** */
function addtDevTargetDateExpiryMaster($data) {
    $days = trim($data['days']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_days = getCurrentTargetDateExpiryDays();

    $delete_obj = new DB_Public_lm_dm_target_date_expiry();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_dm_target_date_expiry();
    $add_obj->days = $days;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_lm_dm_target_date_expiry_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_days;
        $remarks_obj->changed_to = $days;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Expiry Year'] = array($old_days, $days, $days);
            addAuditTrailLog('expiry_year_dms_master', null, $at_data, "Update Target Date Expiry Year", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getDevTargetDateExpiryRemarks() {
    $obj = new DB_Public_lm_dm_target_date_expiry_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = [
            "changed_from" => $obj->changed_from,
            "changed_to" => $obj->changed_to,
            "effective_from" => $obj->effective_from,
            "reason" => $obj->reason_for_change,
            "updated_by" => getFullName($obj->updated_by),
            "date" => $obj->updated_time
        ];
    }
    return $remarks_list;
}

function getCurrentTargetDateExpiryDays() {
    $obj = new DB_Public_lm_dm_target_date_expiry();
    $obj->find();
    if ($obj->fetch()) {
        return $obj->days;
    } else {
        return 0;
    }
}

/** ==========Deviation Target Date expiry Days Details Stop================ * ** */

/** ==========Deviation Online Exam Pass Mark Details Start================ * ** */
function addDevExamPassMarkMaster($data) {
    $mark = trim($data['mark']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_mark = getDevExamPassMark();

    $delete_obj = new DB_Public_lm_dm_online_exam_passmark();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_dm_online_exam_passmark();
    $add_obj->pass_mark = $mark;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_lm_dm_online_exam_passmark_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_mark;
        $remarks_obj->changed_to = $mark;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Pass Mark'] = array($old_mark, $mark, $mark);
            addAuditTrailLog('exam_passmark_dms_master', null, $at_data, "Update Exam Passmark", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getDevExamPassMark() {
    $pass_mark_obj = new DB_Public_lm_dm_online_exam_passmark();
    $pass_mark_obj->find();
    if ($pass_mark_obj->fetch()) {
        return $pass_mark_obj->pass_mark;
    }
}

function getDevExamPassMarkRemarks() {
    $obj = new DB_Public_lm_dm_online_exam_passmark_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = array("changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time);
    }
    return $remarks_list;
}

/** ==========Deviation Online Exam Pass Mark Details Stop================ * ** */

/** ==========Deviation Online Exam Attempt Limit Details Start================ * ** */
function addDevExamAttemptLimitMaster($data) {
    $limit = trim($data['limit']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_limit = getDevExamAttemptLimit();

    $delete_obj = new DB_Public_lm_dm_online_exam_attempt_limit();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_dm_online_exam_attempt_limit();
    $add_obj->attempt_limit = $limit;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_lm_dm_online_exam_attempt_limit_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_limit;
        $remarks_obj->changed_to = $limit;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Exam Attempt Limit'] = array($old_limit, $limit, $limit);
            addAuditTrailLog('exam_attempt_limit_dms_master', null, $at_data, "Update Exam Attempt Limit", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getDevExamAttemptLimit() {
    $attempt_limit_obj = new DB_Public_lm_dm_online_exam_attempt_limit();
    $attempt_limit_obj->find();
    if ($attempt_limit_obj->fetch()) {
        return $attempt_limit_obj->attempt_limit;
    }
}

function getDevExamAttemptLimitRemarks() {
    $obj = new DB_Public_lm_dm_online_exam_attempt_limit_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = ["changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time];
    }
    return $remarks_list;
}

/** ==========Deviation Online Exam Attempt Limit Details Stop================ * ** */

/** ==========Deviation Type Details Start================ * ** */
function addDevTypeMaster($data) {
    $type = trim($data['type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_dev_type_exist($type) == false) {
        $object_id = get_object_id("definitions->object_id->qms->dms_master_data->type->object_id");

        $obj = new DB_Public_lm_dm_type_master();
        $obj->object_id = $object_id;
        $obj->type = $type;
        $obj->description = $desc;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            return true;
        }
    }
    return false;
}

function updateDevTypeMaster($data) {
    $object_id = trim($data['object_id']);
    $type = trim($data['type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $obj = new DB_Public_lm_dm_type_master();
    $obj->whereAdd("object_id = '$object_id'");
    $obj->type = $type;
    $obj->description = $desc;
    $obj->created_by = $usr_id;
    $obj->created_time = $date_time;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        return true;
    }
    return false;
}

function getDevTypeMasterDetailsList($object_id = null, $type = null, $is_enabled = null) {
    $obj = new DB_Public_lm_dm_type_master();
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
        $dev_related_to_list[] = array(
            'object_id' => $obj->object_id,
            'type' => $obj->type,
            'is_enabled' => $obj->is_enabled,
            'desc' => $obj->description,
            'created_by' => getFullName($obj->created_by),
            'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by),
            'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time
        );
        $count++;
    }
    return $dev_related_to_list;
}

function is_dev_type_exist($dms_type) {
    $obj = new DB_Public_lm_dm_type_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(type) = lower('$dms_type')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getDevTypeName($object_id) {
    $obj = new DB_Public_lm_dm_type_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    $obj->find();
    while ($obj->fetch()) {
        return $obj->type;
    }
}

/** ==========Deviation Type Details Stop================ * ** */
