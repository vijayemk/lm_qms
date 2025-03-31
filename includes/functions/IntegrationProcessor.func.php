<?php

function add_integration($source_doc_id, $source_lm_doc_id, $ref_object_id, $dest_lm_doc_id, $condition, $triggered_by, $trigger_to, $assigned_to = null, $reason) {
    if ($source_doc_id) {
        $year = date("y");
        $month = date("m");
        $date = date("d");

        $next_seq_no = get_next_integration_no($year, $month, $date);
        $tracking_no = "e-trigger/{$date}{$month}{$year}/$next_seq_no";

        $object_id = get_object_id("definitions->object_id->integration->object_id");
        $obj = new DB_Public_lm_doc_integration_details();
        $obj->object_id = $object_id;
        $obj->source_doc_id = $source_doc_id;
        $obj->cond_id = get_integration_cond_id($condition);
        $obj->triggered_by = $triggered_by;
        $obj->triggered_to = $trigger_to;
        $obj->triggered_date = date('Y-m-d G:i:s');
        $obj->status = "Open";
        $obj->wf_status = "e-trigger Pending Assignment";
        $obj->reason = $reason;
        $obj->date = $date;
        $obj->month = $month;
        $obj->year = $year;
        $obj->description = "e-trigger";
        $obj->seq_no = $next_seq_no;
        $obj->ref_object_id = $ref_object_id;
        $obj->tracking_no = $tracking_no;
        $obj->assigned_to = $assigned_to;
        $obj->source_lm_doc_id = $source_lm_doc_id;
        $obj->dest_lm_doc_id = $dest_lm_doc_id;
        if ($obj->insert()) {
            $at_data['Triggered No'] = array("NA", $tracking_no, $tracking_no);
            $at_data['Triggered From'] = array("NA", getLmDocShortName($source_lm_doc_id), "Source Doc Id : $source_lm_doc_id" . getLmDocShortName($source_lm_doc_id));
            $at_data['Triggered To'] = array("NA", getLmDocShortName($dest_lm_doc_id), "Dest Doc Id : $dest_lm_doc_id" . getLmDocShortName($dest_lm_doc_id));
            $at_data['Tiggred For'] = array("NA", $condition, $condition);
            $at_data['Triggered By'] = array("NA", getFullName($triggered_by), $triggered_by . " - " . getFullName($triggered_by) . "\nSource Doc ID : $source_doc_id\nRef Object_id : $ref_object_id\nIntegration Id : $object_id");
            $at_data['Triggered To'] = array("NA", getFullName($trigger_to), $trigger_to . " - " . getFullName($trigger_to));
            $at_data['Status'] = array("NA", "e-trigger Pending Assignment", "e-trigger Pending Assignment");
            $at_data['Reason'] = array("NA", $reason, $reason);
            addAuditTrailLog($object_id, null, $at_data, "e-trigger", "Succesfully Triggered");
            if ($assigned_to == null) {
                add_worklist($trigger_to, $object_id);
                //save_workflow($object_id, $trigger_to, 'Created', 'create');
                return $object_id;
            } else {
                $dest_doc_id = trigger_integration($object_id, $assigned_to);
                update_integration_status($object_id, $dest_doc_id, $assigned_to, date('Y-m-d G:i:s'));
                return $dest_doc_id;
            }
        }
    }
    return false;
}

function trigger_integration($integration_id, $assigned_to) {
    $date_time = date('Y-m-d G:i:s');
    $obj = new DB_Public_lm_doc_integration_details();
    if ($obj->get("object_id", $integration_id)) {
        if (getLmDocShortName($obj->dest_lm_doc_id) === "CAPA") {
            include_module("capa");
            $capa_process = new Capa_Processor();
            $dest_doc_id = $capa_process->add_capa_details($obj->source_doc_id, $obj->source_lm_doc_id, 'e-trigger', $obj->reason, $assigned_to, array_column(getAccessRightsDeptList($obj->source_doc_id), 'plant_dept_id'), $date_time, 'Add CAPA');
            update_integration_status($integration_id, $dest_doc_id, $assigned_to, $date_time);
        }
        if (getLmDocShortName($obj->dest_lm_doc_id) === "CCM") {
            include_module("ccm");
            $ccm_process = new Ccm_Processor();
            $dest_doc_id = $ccm_process->add_ccm_details($obj->source_doc_id,$obj->source_lm_doc_id, 'e-trigger', $obj->reason, $assigned_to, array_column(getAccessRightsDeptList($obj->source_doc_id), 'plant_dept_id'), $date_time, 'Add CCM');
            update_integration_status($integration_id, $dest_doc_id, $assigned_to, $date_time);
        }
        $at_data['Source Document'] = array(get_qms_doc_no(null, $obj->source_doc_id)['doc_no'], getLmDocShortName($obj->source_lm_doc_id) . " - " . get_qms_doc_no(null, $obj->source_doc_id)['doc_no'], $obj->source_doc_id . " - " . get_qms_doc_no(null, $obj->source_doc_id)['doc_no'] . "\n$obj->source_lm_doc_id");
        $at_data['Destination Document'] = array("NA", getLmDocShortName($obj->dest_lm_doc_id) . " - " . get_qms_doc_no(null, $obj->dest_doc_id)['doc_no'], $obj->dest_doc_id . " - " . get_qms_doc_no(null, $obj->dest_doc_id)['doc_no'] . "\n$obj->dest_lm_doc_id");
        $at_data['Assigned By'] = array("NA", getFullName($obj->triggered_to) . "\nDepartment : " . getDeptName($obj->triggered_to) . "\nPlant : " . getPlantShortName(getUserPlantId($obj->triggered_to)), $obj->triggered_to . " - " . getFullName($obj->triggered_to) . "\nDepartment : " . getDeptId($obj->triggered_to) . " - " . getDeptName($obj->triggered_to) . "\nPlant : " . getUserPlantId($obj->triggered_to) . " - " . getPlantShortName(getUserPlantId($obj->triggered_to)));
        $at_data['Assigned To'] = array("NA", getFullName($assigned_to) . "\nDepartment : " . getDeptName($assigned_to) . "\nPlant : " . getPlantShortName(getUserPlantId($assigned_to)), $assigned_to . " - " . getFullName($assigned_to) . "\nDepartment : " . getDeptId($assigned_to) . " - " . getDeptName($assigned_to) . "\nPlant : " . getUserPlantId($assigned_to) . " - " . getPlantShortName(getUserPlantId($assigned_to)));
        $at_data['Status'] = array($obj->status, "Assigned", "Successfully Assigned");
        addAuditTrailLog($obj->source_doc_id, $obj->object_id, $at_data, "e-trigger", "Succesfully Triggered");
        return $dest_doc_id;
    }
}

function update_integration_status($integration_id, $dest_doc_id, $assigned_to, $date_time) {
    $obj = new DB_Public_lm_doc_integration_details();
    $obj->whereAdd("object_id='$integration_id'");
    $obj->dest_doc_id = $dest_doc_id;
    $obj->assigned_to = $assigned_to;
    $obj->assigned_date = $date_time;
    $obj->status = "Closed";
    $obj->wf_status = "Completed";
    if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
        return true;
    }
    return false;
}

function get_integration_details($integration_id = null, $source_doc_id = null, $dest_doc_id = null, $ref_object_id = null, $source_lm_doc_id = null, $dest_lm_doc_id = null, $cond = null) {
    $obj = new DB_Public_lm_doc_integration_details();
    ($integration_id) ? $obj->whereAdd("object_id='$integration_id'") : null;
    ($source_doc_id) ? $obj->whereAdd("source_doc_id='$source_doc_id'") : null;
    ($dest_doc_id) ? $obj->whereAdd("dest_doc_id='$dest_doc_id'") : null;
    ($ref_object_id) ? $obj->whereAdd("ref_object_id='$ref_object_id'") : null;
    ($source_lm_doc_id) ? $obj->whereAdd("source_lm_doc_id='$source_lm_doc_id'") : null;
    ($dest_lm_doc_id) ? $obj->whereAdd("dest_lm_doc_id='$dest_lm_doc_id'") : null;
    ($cond) ? $obj->whereAdd("cond_id='" . get_integration_cond_id($cond) . "'") : null;
    if ($obj->find()) {
        $count = 1;
        while ($obj->fetch()) {
            if ($obj->source_doc_id) {
                $source_doc_no = get_qms_doc_no(null, $obj->source_doc_id)['doc_no'];
                $source_doc_no_link = get_qms_doc_no(null, $obj->source_doc_id)['doc_link'];
            }
            if ($obj->dest_doc_id) {
                $dest_doc_no = get_qms_doc_no(null, $obj->dest_doc_id)['doc_no'];
                $dest_doc_no_link = get_qms_doc_no(null, $obj->dest_doc_id)['doc_link'];
            }

            $integration_details[] = array(
                'object_id' => $obj->object_id, 'source_doc_id' => $obj->source_doc_id, 'source_doc_name' => getLmDocShortName($obj->source_lm_doc_id), 'source_doc_no' => $source_doc_no,
                'source_doc_no_link' => $source_doc_no_link, 'dest_doc_id' => $obj->dest_doc_id, 'dest_doc_name' => getLmDocShortName($obj->dest_lm_doc_id), 'dest_doc_no' => $dest_doc_no, 'dest_doc_no_link' => $dest_doc_no_link, 'tracking_no' => $obj->tracking_no,
                'cond_id' => $obj->cond_id, 'cond' => get_integration_cond_name($obj->cond_id),
                'triggered_by' => $obj->triggered_by, 'triggered_by_name' => getFullName($obj->triggered_by), 'triggered_by_dept' => getDeptName($obj->triggered_by), 'triggered_by_plant' => getUserPlantShortName($obj->triggered_by),
                'triggered_to' => $obj->triggered_to, 'triggered_to_name' => getFullName($obj->triggered_to), 'triggered_to_dept' => getDeptName($obj->triggered_to), 'triggered_to_plant' => getUserPlantShortName($obj->triggered_to),
                'assigned_to' => $obj->assigned_to, 'assigned_to_name' => getFullName($obj->assigned_to), 'assigned_to_dept' => getDeptName($obj->assigned_to), 'assigned_to_plant' => getUserPlantShortName($obj->assigned_to),
                'assigned_date' => $obj->assigned_date, 'status' => $obj->status, 'wf_status' => $obj->wf_status, 'reason' => $obj->reason, 'triggered_date' => $obj->triggered_date,
                'year' => $obj->year, 'month' => $obj->month, 'date' => $obj->date, 'desc' => $obj->description,
                'seq_no' => $obj->seq_no, 'ref_object_id' => $obj->ref_object_id, 'tracking_link' => get_integration_tracking_no($obj->object_id, 'tracking_link'), '$count' => $count
            );
            $count++;
        }
        return $integration_details;
    }
    return null;
}

function get_next_integration_no($year, $month, $date) {
    $obj = new DB_Public_lm_doc_integration_details();
    $obj->whereAdd("year='$year'");
    $obj->whereAdd("month='$month'");
    $obj->whereAdd("date='$date'");
    if ($obj->find()) {
        while ($obj->fetch()) {
            $num_seq_array[] = $obj->seq_no;
        }
        $max_val = max($num_seq_array) + 1;
        $num_seq = str_pad($max_val, strlen($obj->seq_no), "0", STR_PAD_LEFT);
        return $num_seq;
    } else {
        return "001";
    }
}

function get_integration_cond_id($condition) {
    $obj = new DB_Public_lm_doc_integration_cond_master();
    $obj->get("condition", $condition);
    return $obj->id;
}

function get_integration_cond_name($cond_id) {
    $obj = new DB_Public_lm_doc_integration_cond_master();
    $obj->get("id", $cond_id);
    return $obj->condition;
}

function get_integration_tracking_no($integration_id, $required) {
    $obj = new DB_Public_lm_doc_integration_details();
    $obj->get("object_id", $integration_id);
    $tracking_link = "<a href=" . _URL_ . get_lm_json_value_by_key('definitions->url->integration->view') . $obj->object_id . " target=_blank>$obj->tracking_no</a>";
    $tracking_details = array('tracking_no' => $obj->tracking_no, 'tracking_link' => $tracking_link);
    return $tracking_details[$required];
}

function is_integration_elegible_for_assignment($integration_id, $status) {
    $obj = new DB_Public_lm_doc_integration_details();
    $obj->whereAdd("object_id='$integration_id'");
    if ($obj->find()) {
        while ($obj->fetch()) {
            if ($status === "e-Trigger Pending Assignment") {
                return true;
            }
        }
    }
    return false;
}
