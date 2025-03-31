<?php

/** ==========Capa Online Exam Details Start================ * ** */
function addCapaExamPassMark($data) {
    $mark = trim($data['mark']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_mark = getCapaExamPassMark();

    $delete_obj = new DB_Public_lm_capa_online_exam_passmark();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_capa_online_exam_passmark();
    $add_obj->pass_mark = $mark;
    if ($add_obj->insert()) {

        $remarks_obj = new DB_Public_lm_capa_online_exam_passmark_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_mark;
        $remarks_obj->changed_to = $mark;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Pass Marks'] = array($old_mark, $mark, $mark);
            addAuditTrailLog('exam_passmark_capa_master', null, $at_data, "Update Exam Passmark", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getCapaExamPassMark() {
    $pass_mark_obj = new DB_Public_lm_capa_online_exam_passmark();
    $pass_mark_obj->find();
    if ($pass_mark_obj->fetch()) {
        return $pass_mark_obj->pass_mark;
    }
}

function getCapaExamPassMarkRemarks() {
    $obj = new DB_Public_lm_capa_online_exam_passmark_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = array("changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time);
    }
    return $remarks_list;
}

/** ==========Capa Online Exam Details Stop================ * ** */

/** ==========Capa Online Exam Attempt Limit Start================ * ** */
function addCapaExamAttemptLimit($data) {
    $limit = trim($data['limit']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_attempt = getCapaExamAttemptLimit();

    $delete_obj = new DB_Public_lm_capa_online_exam_attempt_limit();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_capa_online_exam_attempt_limit();
    $add_obj->attempt_limit = $limit;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_lm_capa_online_exam_attempt_limit_remarks();
        $remarks_obj->reason_for_change = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->changed_from = $old_attempt;
        $remarks_obj->changed_to = $limit;
        if ($remarks_obj->insert()) {
            //Audit Trail
            $at_data['Exam Attempt Limit'] = array($old_attempt, $limit, $limit);
            addAuditTrailLog('exam_attempt_limit_capa_master', null, $at_data, "Update Exam Attempt Limit", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getCapaExamAttemptLimit() {
    $obj = new DB_Public_lm_capa_online_exam_attempt_limit();
    $obj->find();
    if ($obj->fetch()) {
        return $obj->attempt_limit;
    }
}

function getCapaExamAttemptLimitRemarks() {
    $obj = new DB_Public_lm_capa_online_exam_attempt_limit_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $remarks_list[] = ["changed_from" => $obj->changed_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_change, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time];
    }
    return $remarks_list;
}

/** ==========Capa Online Exam Attempt Limit Stop================ * ** */

/** ==========Capa Target Date Expiry Days Details Start================ * ** */
function addCapaTargetDateExpiry($data) {
    $days = trim($data['days']);
    $reason = trim($data['reason']);
    $usr_id = $data['usr_id'];
    $date_time = $data['date_time'];
    $usr_dept = $data['usr_dept'];
    $old_days = getCapaTargetDateExpiry();

    $delete_obj = new DB_Public_lm_capa_target_date_expiry();
    $delete_obj->find();
    if ($delete_obj->fetch()) {
        $delete_obj->delete();
    }

    $add_obj = new DB_Public_lm_capa_target_date_expiry();
    $add_obj->days = $days;
    if ($add_obj->insert()) {
        $remarks_obj = new DB_Public_lm_capa_target_date_expiry_remarks();
        $remarks_obj->reason_for_cahnge = $reason;
        $remarks_obj->effective_from = $date_time;
        $remarks_obj->updated_by = $usr_id;
        $remarks_obj->updated_time = $date_time;
        $remarks_obj->change_from = $old_days;
        $remarks_obj->changed_to = $days;
        if ($remarks_obj->insert()) {           
            //Audit Trail
            $at_data['Expiry Year'] = array($old_days, $days, $days);
            addAuditTrailLog('expiry_year_capa_master', null, $at_data, "Update Target Date Expiry Year", "Successfuly Updated");
            return true;
        }
    }
    return false;
}

function getCapaTargetDateExpiry() {
    $date_expiry_obj = new DB_Public_lm_capa_target_date_expiry();
    $date_expiry_obj->find();
    if ($date_expiry_obj->fetch()) {
        return $date_expiry_obj->days;
    } else {
        return 0;
    }
}

function getCapaTargetDateExpiryRemarks() {
    $obj = new DB_Public_lm_capa_target_date_expiry_remarks();
    $obj->orderBy('effective_from');
    $obj->find();
    while ($obj->fetch()) {
        $return_list[] = ["changed_from" => $obj->change_from, "changed_to" => $obj->changed_to, "effective_from" => $obj->effective_from, "reason" => $obj->reason_for_cahnge, "updated_by" => getFullName($obj->updated_by), "date" => $obj->updated_time];
    }
    return $return_list;
}

function getCAPANumber($object_id) {
    $check_det_obj = new DB_Public_lm_capa_master();
    if ($check_det_obj->get("doc_no", $object_id)) {
        return $check_det_obj->capa_no;
    }
    return false;
}

/** ==========Capa Target Date Expiry Days Details Stop================ * ** */
function currentCapaNo($req_method) {
    $business_object_id = getBusinessObjId('capa');
    $sub_business_object_id = getSubBusinessObjId('CAPA');
    $sequence = new Sequence;
    if ($req_method == 'get') {
        $capa_number = $sequence->capa_number_sequence($business_object_id, $sub_business_object_id);
        return $capa_number;
    } elseif ($req_method == "update") {
        $sequence->update_number_sequence($business_object_id, $sub_business_object_id);
        return true;
    } else {
        return null;
    }
}

?>
