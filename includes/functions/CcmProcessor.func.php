<?php

/** ==========Change Type Details Start================ * ** */
function addChangeTypeDetails($data) {
    $change_type = trim($data['change_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_change_type_exist($change_type) == false) {
        $object_id = get_object_id("definitions->object_id->qms->ccm_master_data->ccm_type->object_id");

        $obj = new DB_Public_lm_cc_change_type_master();
        $obj->object_id = $object_id;
        $obj->type = $change_type;
        $obj->description = $desc;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Change Type'] = array("NA", $change_type, $change_type);
            $at_data['Description'] = array("NA", $desc, $desc);
            $at_data['Is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add CCM Change Type Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateChangeTypeDetails($data) {
    $object_id = trim($data['object_id']);
    $change_type = trim($data['change_type']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_cc_change_type_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_cc_change_type_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->type = $change_type;
    $obj->description = $desc;
    $obj->is_enabled = $is_enabled;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        //Audit Trail
        $at_data['Deviation Realted To'] = array($old_obj->type, $change_type, $change_type);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update  CCM Change Type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getChangeTypeDetails($object_id = null, $type = null, $is_enabled = null) {
    $obj = new DB_Public_lm_cc_change_type_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($type) {
        $obj->whereAdd("type='$type'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $storage_condition_list[] = array(
            'object_id' => $obj->object_id, 'type' => $obj->type, 'is_enabled' => $obj->is_enabled,
            'description' => $obj->description, 'created_by' => getFullName($obj->created_by), 'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time, 'modified_by' => getFullName($obj->modified_by), 'modified_by_id' => $obj->modified_by,
            'modified_time' => $obj->modified_time, 'count' => $count
        );
        $count++;
    }
    return $storage_condition_list;
}

function is_change_type_exist($type) {
    $type_obj = new DB_Public_lm_cc_change_type_master();
    $type_obj->query("SELECT * FROM {$type_obj->__table} WHERE lower(type) = lower('$type')");
    while ($type_obj->fetch()) {
        return true;
    }
    return false;
}

function getChangeType($object_id) {
    $change_type_obj = new DB_Public_lm_cc_change_type_master();
    $change_type_obj->get("object_id", $object_id);
    return $change_type_obj->type;
}

function currentCCNo($req_method) {
    $business_object_id = getBusinessObjId('ccm');
    $sub_business_object_id = getSubBusinessObjId('CCM');
    $sequence = new Sequence;
    if ($req_method == 'get') {
        $cc_number = $sequence->cc_number_sequence($business_object_id, $sub_business_object_id);
        return $cc_number;
    } elseif ($req_method == "update") {
        $sequence->update_number_sequence($business_object_id, $sub_business_object_id);
        return true;
    } else {
        return null;
    }
}

/** ==========Change Type Details Stop================ * ** */

/** ==========Change Realted To  Details Start================ * ** */
function addChangeRelatedTo($data) {
    $change_type = trim($data['related_to']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_change_related_to_exist($change_type) == false) {
        $object_id = get_object_id("definitions->object_id->qms->ccm_master_data->ccm_realted_to->object_id");

        $obj = new DB_Public_lm_cc_type_master();
        $obj->object_id = $object_id;
        $obj->type = $change_type;
        $obj->description = $desc;
        $obj->created_time = $date_time;
        $obj->created_by = $usr_id;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Change Related To'] = array("NA", $change_type, $change_type);
            $at_data['Description'] = array("NA", $desc, $desc);
            $at_data['Is Enabled'] = array("NA", 'yes', 'yes');
            addAuditTrailLog($object_id, null, $at_data, "Add CCM Change Type Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateChangeRelatedTo($data) {
    $object_id = trim($data['object_id']);
    $realted_to = trim($data['related_to']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_cc_type_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_cc_type_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->type = $realted_to;
    $obj->description = $desc;
    $obj->is_enabled = $is_enabled;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

        //Audit Trail
        $at_data['Change Related To'] = array($old_obj->type, $realted_to, $realted_to);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update CCM Change Type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getChangeRelatedToList($object_id = null, $related_to = null, $is_enabled = null) {
    $obj = new DB_Public_lm_cc_type_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($related_to) {
        $obj->whereAdd("type='$related_to'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->orderBy(type);
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $sub_realted_details = getChangeSubRelatedList(null, $obj->object_id, null, $is_enabled);

        $return_list[] = array(
            'object_id' => $obj->object_id, 'related_to' => $obj->type, 'is_enabled' => $obj->is_enabled,
            'description' => $obj->description, 'created_by' => getFullName($obj->created_by), 'created_by_id' => $obj->created_by,
            'created_time' => $obj->created_time, 'modified_by' => getFullName($obj->modified_by), 'modified_by_id' => $obj->modified_by, 'count' => $count,
            'sub_realted_details' => $sub_realted_details
        );

        $count++;
    }
    return $return_list;
}

function is_change_related_to_exist($type) {
    $type_obj = new DB_Public_lm_cc_type_master();
    $type_obj->query("SELECT * FROM {$type_obj->__table} WHERE lower(type) = lower('$type')");
    while ($type_obj->fetch()) {
        return true;
    }
    return false;
}

function getCcRelatedToName($object_id) {
    $obj = new DB_Public_lm_cc_type_master();
    $obj->get("object_id", $object_id);
    return $obj->type;
}

/** ==========Change Realted To  Details Stop================ * ** */

/** ==========Change Sub Realted To  Details Stop================ * ** */
function addChangeSubRelatedTo($data) {
    $realted_to = trim($data['related_to']);
    $sub_related_to = $data['sub_related_to'];
    $desc = $data['description'];
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    for ($i = 0; $i < count($sub_related_to); $i++) {
        if (is_cc_sub_category_exist($realted_to, $sub_related_to) == false) {
            $object_id = get_object_id("definitions->object_id->qms->ccm_master_data->ccm_sub_related_to->object_id");

            $obj = new DB_Public_lm_cc_sub_related_to_master();
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
                $at_at_new .= "\n\t\t\t" . getCcRelatedToName($realted_to) . " - " . $sub_related_to[$i];
                $dev_related_to_at_p .= "\n\t\t\t" . getCcRelatedToName($realted_to) . " - " . $realted_to . " : " . $sub_related_to[$i];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    $at_data['CCM Sub Change Type Master'] = array("NA", $at_at_new, $dev_related_to_at_p);
    addAuditTrailLog($object_id, null, $at_data, "Add CCM Change Sub  Related To Master", "Successfuly Added");
    return true;
}

function updateChangeSubRelatedTo($data) {
    $object_id = trim($data['object_id']);
    $realted_to = trim($data['related_to']);
    $sub_related_to = trim($data['sub_related_to']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_cc_sub_related_to_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_cc_sub_related_to_master();
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
        //Audit Trail
        $at_data['CCM Sub Related To'] = array($old_obj->type, $sub_related_to, getCcRelatedToName($realted_to) . " - " . $realted_to . " : " . $sub_related_to);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update CCM Change Sub Related To Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getChangeSubRelatedList($object_id = null, $related_to = null, $sub_related_to = null, $is_enabled = null) {
    $obj = new DB_Public_lm_cc_sub_related_to_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($related_to) {
        $obj->whereAdd("related_to_id='$related_to'");
    }
    if ($sub_related_to) {
        $obj->whereAdd("type='$sub_related_to'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->orderBy(type);
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $return_list[] = array(
            'object_id' => $obj->object_id, 'related_to_id' => $obj->related_to_id, 'related_to_name' => getCcRelatedToName($obj->related_to_id), 'is_enabled' => $obj->is_enabled,
            'description' => $obj->description, 'created_by' => getFullName($obj->created_by), 'created_by_id' => $obj->created_by, 'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by), 'modified_by_id' => $obj->modified_by, 'count' => $count, "sub_related_to_name" => $obj->type
        );
        $count++;
    }
    return $return_list;
}

function is_cc_sub_category_exist($related_to, $sub_related_to) {
    $obj = new DB_Public_lm_cc_sub_related_to_master();
    $obj->query("SELECT * FROM {$obj->__table} WHERE lower(related_to_id) = lower('$related_to') and lower(type)=lower('$sub_related_to')");
    while ($obj->fetch()) {
        return true;
    }
    return false;
}

function getCcSubRelatedToName($object_id) {
    $obj = new DB_Public_lm_cc_sub_related_to_master();
    $obj->get("object_id", $object_id);
    return $obj->type;
}

function getCcSubRelatedToDesc($object_id) {
    $obj = new DB_Public_lm_cc_sub_related_to_master();
    $obj->get("object_id", $object_id);
    return $obj->description;
}


/** ==========Change Sub Realted To  Details Stop================ * ** */

/** ==========Affected Documents  Details Start================ * ** */
function addCcAffectedDocument($data) {
    $doc_name = trim($data['doc_name']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];

    if (is_cc_affected_doc_name_exist($doc_name) == false) {
        $object_id = get_object_id("definitions->object_id->qms->ccm_master_data->affected_documents->object_id");

        $obj = new DB_Public_lm_cc_affected_doc_master();
        $obj->object_id = $object_id;
        $obj->doc_name = $doc_name;
        $obj->description = $desc;
        $obj->created_time = $date_time;
        $obj->created_by = $usr_id;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->is_enabled = "yes";
        if ($obj->insert()) {
            //Audit Trail
            $at_data['Affected Documents'] = array("NA", $doc_name, $doc_name);
            $at_data['Description'] = array("NA", $desc, $desc);
            $at_data['is Enabled'] = array("NA", "yes", "yes");
            addAuditTrailLog($object_id, null, $at_data, "Add CCM Affeted Type Master", "Successfuly Added");
            return true;
        }
    }
    return false;
}

function updateCcAffectedDocument($data) {
    $object_id = trim($data['object_id']);
    $doc_name = trim($data['doc_name']);
    $desc = trim($data['description']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $is_enabled = trim($data['is_enabled']);

    $old_obj = new DB_Public_lm_cc_affected_doc_master();
    $old_obj->get("object_id", $object_id);

    $obj = new DB_Public_lm_cc_affected_doc_master();
    $obj->whereAdd("object_id='$object_id'");
    $obj->doc_name = $doc_name;
    $obj->description = $desc;
    $obj->modified_by = $usr_id;
    $obj->modified_time = $date_time;
    $obj->is_enabled = $is_enabled;
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {

        //Audit Trail
        $at_data['Affected Documents'] = array($old_obj->doc_name, $doc_name, $doc_name);
        $at_data['Description'] = array($old_obj->description, $desc, $desc);
        $at_data['Is Enabled'] = array($old_obj->is_enabled, $is_enabled, $is_enabled);
        addAuditTrailLog($object_id, null, $at_data, "Update CCM Affeted Type Master", "Successfuly Updated");
        return true;
    }
    return false;
}

function getCcAffectedDoclist($object_id = null, $doc_name = null, $is_enabled = null) {
    $obj = new DB_Public_lm_cc_affected_doc_master();
    if ($object_id) {
        $obj->whereAdd("object_id='$object_id'");
    }
    if ($doc_name) {
        $obj->whereAdd("doc_name='$doc_name'");
    }
    if ($is_enabled) {
        $obj->whereAdd("is_enabled='$is_enabled'");
    }
    $obj->find();
    $count = 1;
    while ($obj->fetch()) {
        $return_list[] = array(
            'object_id' => $obj->object_id, 'doc_name' => $obj->doc_name, 'is_enabled' => $obj->is_enabled,
            'description' => $obj->description, 'created_by' => getFullName($obj->created_by), 'created_by_id' => $obj->created_by, 'created_time' => $obj->created_time,
            'modified_by' => getFullName($obj->modified_by), 'modified_by_id' => $obj->modified_by, 'count' => $count, "sub_related_to_name" => $obj->type, 'description' => $obj->description
        );
        $count++;
    }
    return $return_list;
}

function is_cc_affected_doc_name_exist($doc_name) {
    $type_obj = new DB_Public_lm_cc_affected_doc_master();
    $type_obj->query("SELECT * FROM {$type_obj->__table} WHERE lower(doc_name) = lower('$doc_name')");
    while ($type_obj->fetch()) {
        return true;
    }
    return false;
}

function getCcAffectedDocName($object_id) {
    $obj = new DB_Public_lm_cc_affected_doc_master();
    $obj->get("object_id", $object_id);
    return $obj->doc_name;
}

function getCcAffectedDocDesc($object_id) {
    $obj = new DB_Public_lm_cc_affected_doc_master();
    $obj->get("object_id", $object_id);
    return $obj->description;
}

/** ==========Affected Documents  Details Stop================ * ** */

/** ==========Exam pass marks  Details Start================ * ** */
function addCcExamPassMark($data) {
    $mark = trim($data['mark']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $old_mark = getCcExamPassMark();

    $delete_obj = new DB_Public_lm_cc_online_exam_passmark();
    $delete_obj->find();
    $delete_obj->fetch();
    $delete_obj->delete();

    $add_obj = new DB_Public_lm_cc_online_exam_passmark();
    $add_obj->pass_mark = $mark;
    if ($add_obj->insert()) {

        $remarks_obj = new DB_Public_lm_cc_online_exam_passmark_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_mark;
        $remarks_obj->changed_to = $mark;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Pass Mark'] = array($old_mark, $mark, $mark);
            addAuditTrailLog('exam_passmark_cc_master', null, $at_data, "Update Exam Passmark", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getCcExamPassMark() {
    $obj = new DB_Public_lm_cc_online_exam_passmark();
    $obj->find();
    if ($obj->fetch()) {
        return $obj->pass_mark;
    }
}

function getCcExamPassMarkRemarks() {
    $obj = new DB_Public_lm_cc_online_exam_passmark_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = array("changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time);
    }
    return $remarks_list;
}

/** ==========Exam pass marks  Details Stop================ * ** */

/** ==========Exam Attempt Limit Details Start================ * ** */
function addCcExamAttemptLimit($data) {
    $limit = trim($data['limit']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $old_attempt = getCcExamAttemptLimit();

    $delete_obj = new DB_Public_lm_cc_online_exam_attempt_limit();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_cc_online_exam_attempt_limit();
    $add_obj->attempt_limit = $limit;
    if ($add_obj->insert()) {

        $remarks_obj = new DB_Public_lm_cc_online_exam_attempt_limit_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_attempt;
        $remarks_obj->changed_to = $limit;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Exam Attempt Limit'] = array($old_attempt, $limit, $limit);
            addAuditTrailLog('exam_attempt_limit_cc_master', null, $at_data, "Update Exam Attempt Limit", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getCcExamAttemptLimit() {
    $attempt_limit_obj = new DB_Public_lm_cc_online_exam_attempt_limit();
    $attempt_limit_obj->find();
    if ($attempt_limit_obj->fetch()) {
        return $attempt_limit_obj->attempt_limit;
    }
}

function getCcExamPassAttemptLimitRemarks() {
    $obj = new DB_Public_lm_cc_online_exam_attempt_limit_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $return_list[] = ["changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time];
    }
    return $return_list;
}

/** ==========Exam Attempt Limit Details Stop================ * ** */

/** ==========Exam Monitoring Limit Details Stop================ * ** */
function addCcMonitoringLimit($data) {
    $limit = trim($data['limit']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $old_limit = getCcMonitoringLimit();

    $delete_obj = new DB_Public_lm_cc_monitoring_limit();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_cc_monitoring_limit();
    $add_obj->max_limit = $limit;
    if ($add_obj->insert()) {

        $remarks_obj = new DB_Public_lm_cc_monitoring_limit_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_limit;
        $remarks_obj->changed_to = $limit;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Monitoring Limit'] = array($old_limit, $limit, $limit);
            addAuditTrailLog('monitoring_limit_cc_master', null, $at_data, "Update Monitoring Limit", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getCcMonitoringLimitRemarks() {
    $obj = new DB_Public_lm_cc_monitoring_limit_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $return_list[] = ["changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time];
    }
    return $return_list;
}

function getCcMonitoringLimit() {
    $obj = new DB_Public_lm_cc_monitoring_limit();
    $obj->find();
    if ($obj->fetch()) {
        return $obj->max_limit;
    }
}

/** ==========Exam Monitoring Limit Details Stop================ * ** */
