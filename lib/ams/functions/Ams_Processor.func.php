<?php

class Ams_Processor {

    function add_ams_schedule($data) {
        $object_id = get_object_id("definitions->object_id->workflow->ams->object_id");
        $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-7');

        $audit_type = $data['audit_type'];
        $audit_sub_type = $data['audit_sub_type'];
        $audit_start_date = $data['audit_start_date'];
        $audit_end_date = $data['audit_end_date'];
        $audit_desc = $data['audit_desc'];
        $usr_id = $data['usr_id'];
        $usr_plant_id = getUserPlantId($usr_id);
        $date_time = $data['date_time'];
        $usr_dept = $data['usr_dept'];
        $audit_trail_action = $data['audit_trail_action'];
        $audit_plant = $data['audit_plant'];
        $audit_dept = $data['audit_dept'];

        $current_access_dept = $usr_plant_id . "-" . $usr_dept;
        $ams_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);
        if ($ams_no) {
            $obj = new DB_Public_lm_audit_scheduled_details();
            $obj->object_id = $object_id;
            $obj->lm_doc_id = $lm_doc_id;
            $obj->audit_type_id = $audit_type;
            $obj->audit_plant = $audit_plant;
            $obj->audit_dept = $audit_dept;
            $obj->audit_sub_type_id = $audit_sub_type;
            $obj->audit_no = $ams_no;
            $obj->description = $audit_desc;
            $obj->from_date = $audit_start_date;
            $obj->to_date = $audit_end_date;
            $obj->no_of_days = dateDiffInDays($audit_start_date, $audit_end_date) + 1;
            $obj->status = "Open";
            $obj->audit_status = "Pending";
            $obj->approval_status = "Pending";
            $obj->wf_status = "To be initiated";
            $obj->schedule_by = $usr_id;
            $obj->schedule_time = $date_time;
            $obj->schedule_by_plant = $usr_plant_id;
            $obj->schedule_by_dept = $usr_dept;
            $obj->modified_by = $usr_dept;
            $obj->modified_time = $date_time;
            if ($obj->insert()) {
                update_qms_no_seq($usr_plant_id, $lm_doc_id);

                //Audit Trail
                $at_data['Audit No'] = array("NA", $ams_no, "$ams_no \nlm_doc_id : $lm_doc_id");
                $at_data['Audit Plant'] = array("NA", getPlantShortName($audit_plant), "$audit_plant - " . getPlantShortName($audit_plant));
                $at_data['Type'] = array("NA", getAuditType($audit_type), "$audit_type - " . getAuditType($audit_type));
                $at_data['Sub Type'] = array("NA", getAuditSubType($audit_sub_type), "$audit_sub_type - " . getAuditSubType($audit_sub_type));
                if ($audit_dept) {
                    $at_data['Audit Dept'] = array("NA", getDepartment($audit_dept), "$audit_dept - " . getDepartment($audit_dept));
                }
                $at_data['From Date'] = array("NA", $audit_start_date, $audit_start_date);
                $at_data['To Date'] = array("NA", $audit_end_date, $audit_end_date);
                $at_data['Description'] = array("NA", $audit_desc, $audit_desc);
                addAuditTrailLog($object_id, null, $at_data, $audit_trail_action, "Successfuly Scheduled");

                addDeptAccessRights($object_id, $current_access_dept, null, $usr_id, $date_time, $ams_no, $audit_trail_action);
                return $object_id;
            }
        }
        return null;
    }

    function get_ams_schedule_deatils($data = null) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        if ($data) {
            extract($data);
            ($object_id) ? $obj->whereAdd("object_id='$object_id'") : null;
            ($audit_type_id) ? $obj->whereAdd("audit_type_id='$audit_type_id'") : null;
            ($audit_sub_type_id) ? $obj->whereAdd("audit_sub_type_id='$audit_sub_type_id'") : null;
            ($start_date) ? $obj->whereAdd("from_date>='$start_date'") : null;
            ($end_date) ? $obj->whereAdd("from_date<='$end_date'") : null;
            ($status) ? $obj->whereAdd("status='$status'") : null;
            ($audit_status) ? $obj->whereAdd("audit_status='$audit_status'") : null;
            ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
            ($audit_plant) ? $obj->whereAdd("audit_plant='$audit_plant'") : null;
            ($audit_dept) ? $obj->whereAdd("audit_dept='$audit_dept'") : null;
        }
        $count = 1;
        $obj->orderBy('from_date');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $ams_sch_list[] = array(
                    'object_id' => $obj->object_id,
                    'audit_no' => $obj->audit_no,
                    'can_initiate' => $this->is_ams_elegible_to_initiate($obj->object_id),
                    'audit_type_id' => $obj->audit_type_id,
                    'audit_type_name' => getAuditType($obj->audit_type_id),
                    'audit_sub_type_id' => $obj->audit_sub_type_id,
                    'audit_sub_type_name' => getAuditSubType($obj->audit_sub_type_id),
                    'description' => $obj->description,
                    'audit_month' => getModifiedDateTimeFormat(display_date_format($obj->from_date), 'f201'),
                    'from_date' => display_date_format($obj->from_date),
                    'to_date' => display_date_format($obj->to_date),
                    'audit_plant_id' => ($obj->audit_plant) ? $obj->audit_plant : null,
                    'audit_plant' => ($obj->audit_plant) ? getPlantShortName($obj->audit_plant) : null,
                    'audit_dept_id' => ($obj->audit_dept) ? $obj->audit_dept : null,
                    'audit_dept' => ($obj->audit_dept) ? getDepartment($obj->audit_dept) : null,
                    'sch_by_id' => $obj->schedule_by,
                    'sch_by_name' => getFullName($obj->schedule_by),
                    'sch_by_info' => getFullName($obj->schedule_by) . " [" . getPlantShortName($obj->schedule_by_plant) . "] [" . getDepartment($obj->schedule_by_dept) . "]",
                    'sch_date' => display_datetime_format($obj->schedule_time),
                    'assigned_by_id' => $obj->assigned_by,
                    'assigned_by_name' => getFullName($obj->assigned_by),
                    'assigned_by_by_info' => getFullName($obj->assigned_by) . " [" . getPlantShortName($obj->assigned_by) . "] [" . getDepartment($obj->assigned_by) . "]",
                    'assigned_date' => display_datetime_format($obj->assigned_date),
                    'status' => $obj->status,
                    'audit_status' => $obj->audit_status,
                    'wf_status' => $obj->wf_status,
                    'approval_status' => $obj->approval_status,
                    'audit_lead_id' => $obj->audit_lead,
                    'audit_lead_name' => getFullName($obj->audit_lead),
                    'audit_lead_dept_name' => getPlantName(getUserPlantId($obj->audit_lead)),
                    'audit_lead_plant_name' => getDeptName($obj->audit_lead),
                    'audit_lead_info' => ($obj->audit_lead) ? getFullName($obj->audit_lead) . " [" . getPlantShortName(getUserPlantId($obj->audit_lead)) . "] [" . getDeptName($obj->audit_lead) . "]" : null,
                    'doc_link' => get_qms_doc_no("ams", $obj->object_id)["doc_link"],
                    'doc_url' => get_qms_doc_no("ams", $obj->object_id)["doc_url"],
                    'count' => $count,
                );
                $count++;
            }
            return $ams_sch_list;
        }
    }

    function is_ams_elegible_to_initiate($object_id) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $object_id);
        $usr_id = $_SESSION['user_id'];
        $usr_plant_id = getUserPlantId($usr_id);
        $usr_dept_id = getDeptId($usr_id);
        $can_initiate = ((isDeptAccessRightsExist($obj->object_id, $usr_plant_id, $usr_dept_id, 'yes') && $obj->status == "Open" && $obj->audit_status == "Pending" && $obj->wf_status == "To be initiated") ? true : false);
        return $can_initiate;
    }

    function get_ams_calendor_data() {
        require_once('plugins/fullcalendar/demos/php/utils.php');
        $input_arrays = [];
        $ams_list = $this->get_ams_schedule_deatils();
        foreach ($ams_list as $ams) {
            $input_arrays[] = [
                'id' => $ams['object_id'],
                'title' => $ams['am_no'],
                'start' => getModifiedDateTimeFormat($ams['from_date'], 'f1') . " 09:00",
                'end' => getModifiedDateTimeFormat($ams['to_date'], 'f1') . " 18:00",
                'audit_details' => $ams,
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . " !important",
                'textColor' => '#FFFFFF !important',
                'className' => 'vd_hover'
            ];
        }
        foreach ($input_arrays as $array) {
            $event = new Event($array);
            $output_arrays[] = $event->toArray();
        }

        return json_encode($output_arrays);
    }

    function cancel_ams_schedule($am_object_id, $cancel_reason, $cancelled_by, $date_time, $audit_trail_action) {
        //Object to get old vlaues
        $old_obj = new DB_Public_lm_audit_scheduled_details();
        $old_obj->get("object_id", $am_object_id);

        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->whereAdd("object_id='$am_object_id'");
        $obj->status = "Closed";
        $obj->wf_status = "Cancelled";
        $obj->audit_status = "Cancelled";
        $obj->approval_status = "Cancelled";
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            $id = get_object_id("definitions->object_id->workflow->ams->cancel");
            $cancel_obj = new DB_Public_lm_audit_cancel_details();
            $cancel_obj->object_id = $id;
            $cancel_obj->audit_object_id = $am_object_id;
            $cancel_obj->reason = $cancel_reason;
            $cancel_obj->created_by = $cancelled_by;
            $cancel_obj->created_time = $date_time;
            $cancel_obj->insert();

            $at_data['Audit No'] = array("NA", $old_obj->audit_no, $old_obj->audit_no);
            $at_data['Reason'] = array("NA", $cancel_reason, $cancel_reason);
            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Cancelled");
            return true;
        }
        return false;
    }

    function get_ams_cancelled_details($am_object_id) {
        $cancel_obj = new DB_Public_lm_audit_cancel_details();
        $cancel_obj->whereAdd("audit_object_id='$am_object_id'");
        if ($cancel_obj->find()) {
            while ($cancel_obj->fetch()) {
                $cancel_details[] = array(
                    'am_object_id' => $cancel_obj->audit_object_id,
                    'object_id' => $cancel_obj->object_id,
                    'reason' => $cancel_obj->reason,
                    'cancelled_by' => getFullName($cancel_obj->created_by),
                    'cancelled_time' => display_datetime_format($cancel_obj->created_time)
                );
            }
            return $cancel_details;
        }
        return null;
    }

    function update_ams_schedule($data) {
        extract($data);

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_audit_scheduled_details();
        $old_obj->get("object_id", $am_object_id);

        //Object to insert new values
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->whereAdd("object_id='$am_object_id'");

        //Audit Plant
        ($uams_audit_plant) ? ($obj->audit_plant = $uams_audit_plant and $at_data['Audit Plant'] = array(getPlantShortName($old_obj->audit_plant), getPlantShortName($uams_audit_plant), $uams_audit_plant . " - " . getPlantShortName($uams_audit_plant))) : false;

        //Audit dept
        ($uams_audit_dept) ? ($obj->audit_dept = $uams_audit_dept and $at_data['Audit Dept'] = array(getDepartment($old_obj->audit_dept), getDepartment($uams_audit_dept), $uams_audit_dept . " - " . getDepartment($uams_audit_dept))) : false;

        //Audit Type
        ($uams_audit_type) ? ($obj->audit_type_id = $uams_audit_type and $at_data['Audit Type'] = array(getAuditType($old_obj->audit_type_id), getAuditType($uams_audit_type), $uams_audit_type . " - " . getAuditType($uams_audit_type))) : false;

        //Audit Sub Type
        ($uams_audit_sub_type) ? ($obj->audit_sub_type_id = $uams_audit_sub_type and $at_data['Audit Sub Type'] = array(getAuditSubType($old_obj->audit_sub_type_id), getAuditSubType($uams_audit_sub_type), $uams_audit_sub_type . " - " . getAuditSubType($uams_audit_sub_type))) : false;

        //Audit Start Date
        ($uams_start_date) ? ($obj->from_date = $uams_start_date and $at_data['Audit Start Date'] = array($old_obj->from_date, $uams_start_date, $uams_start_date)) : false;

        //Audit End Date
        ($uams_end_date) ? ($obj->to_date = $uams_end_date and $at_data['Audit End Date'] = array($old_obj->to_date, $uams_end_date, $uams_end_date)) : false;

        //Audit Description
        ($uams_desc) ? ($obj->description = $uams_desc and $at_data['Descriotion'] = array($old_obj->description, $uams_desc, $uams_desc)) : false;

        //Status
        ($uams_status) ? ($obj->status = $uams_status and $at_data['Status'] = array($old_obj->status, $uams_status, $uams_status)) : false;

        //Audit Lead
        ($uams_audit_lead) ? ($obj->audit_lead = $uams_audit_lead and $at_data['Audit Lead'] = array("NA", getFullName($uams_audit_lead), "$uams_audit_lead - " . getFullName($uams_audit_lead))) : false;

        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
        }
        return true;
    }

    function initiate_ams($data) {
        $am_object_id = $data['am_object_id'];
        $audit_lead = $data['audit_lead'];
        $audit_lead_plant = $data['audit_lead_plant'];
        $audit_lead_dept = $data['audit_lead_dept'];
        $usr_id = $data['usr_id'];
        $date_time = $data['date_time'];
        $usr_dept = $data['usr_dept'];
        $current_access_dept = getUserPlantId($usr_id) . "-" . $usr_dept;
        $audit_trail_action = $data['audit_trail_action'];

        if ($this->is_ams_elegible_to_initiate($am_object_id)) {
            //Object to get old vlaues
            $old_obj = new DB_Public_lm_audit_scheduled_details();
            $old_obj->get("object_id", $am_object_id);

            $obj = new DB_Public_lm_audit_scheduled_details();
            $obj->whereAdd("object_id='$am_object_id'");
            $obj->audit_lead = $audit_lead;
            $obj->audit_lead_plant = $audit_lead_plant;
            $obj->audit_lead_dept = $audit_lead_dept;
            $obj->assigned_by = $usr_id;
            $obj->assigned_date = $date_time;
            $obj->wf_status = "Created";
            if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                add_worklist($audit_lead, $am_object_id);
                save_workflow($am_object_id, $usr_id, 'Assigned', 'assign_audit_lead');
                save_workflow($am_object_id, $audit_lead, 'Created', 'create');

                //Audit Trail
                $at_data['Audit No'] = array($old_obj->audit_no, $old_obj->audit_no, "$old_obj->audit_no; \nlm_doc_id : $old_obj->lm_doc_id");
                $at_data['Type'] = array(getAuditType($old_obj->audit_type_id), getAuditType($old_obj->audit_type_id), "$old_obj->audit_type_id - " . getAuditType($old_obj->audit_type_id));
                $at_data['Sub Type'] = array(getAuditSubType($old_obj->audit_sub_type_id), getAuditSubType($old_obj->audit_sub_type_id), "$old_obj->audit_sub_type_id - " . getAuditType($old_obj->audit_sub_type_id));
                $at_data['From Date'] = array($old_obj->from_date, $old_obj->from_date, $old_obj->from_date);
                $at_data['To Date'] = array($old_obj->to_date, $old_obj->to_date, $old_obj->to_date);
                $at_data['Audit Lead'] = array("NA", getFullName($audit_lead), "$audit_lead - " . getFullName($audit_lead));
                addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Added");
                addDeptAccessRights($am_object_id, $current_access_dept, array(getUserPlantId($audit_lead) . "-" . getDeptId($audit_lead)), $usr_id, $date_time, $old_obj->audit_no, $audit_trail_action);
                return $am_object_id;
            }
        }
        return false;
    }

    function add_attachments_ams($am_object_id, $type, $usr_id, $date_time, $refrence_object_id = null) {
        /* Dropzone File Upload */
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_name = $_FILES['file']['name'];
            $file_name = clean_filename($file_name, 0, 80);

            $fhash = md5($tempFile);
            $hash = uniqid($fhash);

            $file_info = new SplFileInfo($_FILES['file']['name']);
            $extension = $file_info->getExtension();

            $file_id = get_object_id("definitions->object_id->workflow->ams->file_upload");

            $file = new DB_Public_file();
            $file->object_id = $file_id;
            $file->type = $file_type;
            $file->name = $file_name;
            $file->size = $file_size;
            $file->hash = $hash . "." . $extension;
            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
            $file->insert();

            $doc_file = new DB_Public_lm_audit_doc_file();
            $doc_file->file_id = $file_id;
            $doc_file->object_id = $am_object_id;
            $doc_file->type = $type;
            $doc_file->attached_by = $usr_id;
            $doc_file->attached_date = $date_time;
            $doc_file->ref_object_id = $refrence_object_id;
            if ($doc_file->insert()) {
                //audit trail
                $at_data['File Name'] = array('NA', $file_name, $file_name);
                $at_data['File Type'] = array('NA', $file_type, $file_type);
                $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                $at_data['Refrence Towards'] = array('NA', $type, $type);
                $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                addAuditTrailLog($am_object_id, $refrence_object_id, $at_data, "Attach File", 'File Attached Successfully');
                return true;
            }
            return false;
        }
    }

    function update_ams_audit_schedule($am_object_id, $data) {
        extract($data);

        //old object
        $old_obj = new DB_Public_lm_audit_scheduled_details();
        $old_obj->get("object_id", $am_object_id);

        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->whereAdd("object_id='$am_object_id'");

        //From Date
        ($uams_start_date) ? ($obj->from_date = $uams_start_date and $at_data['From Date'] = array($old_obj->from_date, $uams_start_date, $uams_start_date)) : false;
        //To Date
        ($uams_end_date) ? ($obj->to_date = $uams_end_date and $at_data['To Date'] = array($old_obj->to_date, $uams_end_date, $uams_end_date)) : false;
        //Scope
        ($uams_scope) ? ($obj->scope = $uams_scope) : false;
        //Objectives
        ($uams_objectives) ? ($obj->objectives = $uams_objectives) : false;
        //Meeting
        ($uams_meeting) ? ($obj->is_meeting_required = $uams_meeting and $at_data['Is Meeting Required'] = array($old_obj->is_meeting_required, $uams_meeting, $uams_meeting)) : false;

        //Meeting Status 
        if ($uams_meeting === "yes") {
            $obj->meeting_status = "Pending";
            $at_data['Meeting Status'] = array($old_obj->meeting_status, "Pending", "Pending");
        } elseif ($uams_meeting === "no") {
            $obj->meeting_status = "NA";
            $at_data['Meeting Status'] = array($old_obj->meeting_status, "NA", "NA");
        }
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            //delete audit plan if from to or to date chnaged
            if ($uams_start_date && $uams_end_date) {
                if ($uams_start_date !== $old_obj->from_date || $uams_end_date !== $old_obj->to_date) {
                    $this->delete_ams_audit_plan($am_object_id);
                }
            }
            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function update_ams_agenda($am_object_id, $data) {
        extract($data);
        $this->delete_ams_agenda($am_object_id);
        for ($i = 0; $i < count($uams_agenda); $i++) {
            //insert object
            $object_id = get_object_id("definitions->object_id->workflow->ams->agenda");

            $obj = new DB_Public_lm_audit_agenda_details();
            $obj->object_id = $object_id;
            $obj->audit_object_id = $am_object_id;
            $obj->agenda = $uams_agenda[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            if ($obj->insert()) {
                $at_data[] = array("NA", "Updated", "Updated");
                addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
            }
        }
        return true;
    }

    function delete_ams_agenda($am_object_id) {
        $obj = new DB_Public_lm_audit_agenda_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_ams_agenda_details($am_object_id) {
        $obj = new DB_Public_lm_audit_agenda_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $auditor_name = getFullName($obj->auditor_id);
                if ($auditor_name) {
                    $auditor_id = $obj->auditor_id;
                } else {
                    $auditor_id = $obj->auditor_id;
                    $auditor_name = $obj->auditor_id;
                }
                $ams_agenda_list[] = array(
                    'object_id' => $obj->object_id,
                    'ams_object_id' => $obj->audit_object_id,
                    'agenda' => $obj->agenda,
                    'auditor_id' => $obj->auditor_id,
                    'auditor_name' => $auditor_name,
                    'conformity' => $obj->conformity,
                    'severity_level' => $obj->severity_level,
                    'is_capa_required' => $obj->is_capa_required,
                    'completion_date' => display_date_format($obj->completion_date),
                    'nc' => $obj->nc,
                    'action_to_be_taken' => $obj->action_to_be_taken,
                    'observation' => $this->get_ams_obseravtion_details($am_object_id, $obj->object_id),
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_dept_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_plant_name' => getDeptName($obj->created_by),
                );
            }
            return $ams_agenda_list;
        }
        return null;
    }

    function update_ams_audit_plan($am_object_id, $data) {
        extract($data);
        $this->delete_ams_audit_plan($am_object_id);
        for ($i = 0; $i < count($uams_plan); $i++) {
            //insert object
            $object_id = get_object_id("definitions->object_id->workflow->ams->audit_plan");

            $obj = new DB_Public_lm_audit_plan();
            $obj->object_id = $object_id;
            $obj->audit_object_id = $am_object_id;
            $obj->date = $uams_plan_date[$i];
            $obj->from_time = $uams_plan_from_time[$i];
            $obj->to_time = $uams_plan_to_time[$i];
            $obj->plan = $uams_plan[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            if ($obj->insert()) {
                $at_data['Audit Plan'] = array("NA", "Updated", "Updated");
                addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
            }
        }
        return true;
    }

    function delete_ams_audit_plan($am_object_id) {
        $obj = new DB_Public_lm_audit_plan();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_ams_audit_plan($am_object_id) {
        $obj = new DB_Public_lm_audit_plan();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $audit_plan_list[] = array(
                    'object_id' => $obj->object_id,
                    'ams_object_id' => $obj->audit_object_id,
                    'date' => $obj->date,
                    'from_time' => $obj->from_time,
                    'to_time' => $obj->to_time,
                    'plan' => $obj->plan,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_dept_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_plant_name' => getDeptName($obj->created_by),
                );
            }
            return $audit_plan_list;
        }
        return null;
    }

    function get_ams_audit_plan_calendor_data($am_object_id) {
        require_once('plugins/fullcalendar/demos/php/utils.php');
        $input_arrays = [];
        $ams_plan_list = $this->get_ams_audit_plan($am_object_id);
        foreach ($ams_plan_list as $ams) {
            $input_arrays[] = [
                'title' => $ams['plan'],
                'start' => getModifiedDateTimeFormat($ams['date'], 'f1') . $ams['from_time'],
                'end' => getModifiedDateTimeFormat($ams['date'], 'f1') . $ams['to_time'],
                'color' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . " !important",
                'textColor' => '#FFFFFF !important',
                'className' => 'vd_hover'
            ];
        }
        foreach ($input_arrays as $array) {
            $event = new Event($array);
            $output_arrays[] = $event->toArray();
        }

        return json_encode($output_arrays);
    }

    function update_ams_int_auditors($am_object_id, $data) {
        extract($data);
        $at_o = $at_p = $at_n = '';
        //old auditors
        $old_auditors = $this->get_ams_int_auditors($am_object_id);
        for ($i = 0; $i < count($old_auditors); $i++) {
            $at_o .= "\n\t\t" . $old_auditors[$i]['auditor_name'];
        }

        if ($old_auditors && !$this->delete_ams_int_auditors($am_object_id)) {
            return false;
        }
        for ($i = 0; $i < count($uams_auditors); $i++) {
            //insert object
            $object_id = get_object_id("definitions->object_id->workflow->ams->int_auditor");

            $obj = new DB_Public_lm_audit_int_auditor_details();
            $obj->object_id = $object_id;
            $obj->audit_object_id = $am_object_id;
            $obj->auditor_id = $uams_auditors[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            if ($obj->insert(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_n .= "\n\t\t" . getFullName($uams_auditors[$i]);
                $at_p .= "\n\t\t" . $uams_auditors[$i] . " - " . getFullName($uams_auditors[$i]);
            }
        }
        $at_data['Auditors'] = array($at_o, $at_n, $at_p);
        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
        return true;
    }

    function delete_ams_int_auditors($am_object_id) {
        $obj = new DB_Public_lm_audit_int_auditor_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        if ($obj->delete(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        } else {
            return false;
        }
    }

    function get_ams_int_auditors($am_object_id) {
        $obj = new DB_Public_lm_audit_int_auditor_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $list[] = array(
                    'object_id' => $obj->object_id,
                    'ams_object_id' => $obj->audit_object_id,
                    'auditor_id' => $obj->auditor_id,
                    'auditor_name' => getFullName($obj->auditor_id),
                    'auditor_dept_name' => getPlantName(getUserPlantId($obj->auditor_id)),
                    'auditor_plant_name' => getDeptName($obj->auditor_id),
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_dept_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_plant_name' => getDeptName($obj->created_by),
                );
            }
            return $list;
        }
        return null;
    }

    function update_ams_auditees($am_object_id, $data) {
        extract($data);
        $at_o = $at_p = $at_n = '';
        //old auditees
        $old_auditess = $this->get_ams_auditees($am_object_id);
        for ($i = 0; $i < count($old_auditess); $i++) {
            $at_o .= "\n\t\t" . $old_auditess[$i]['auditee_name'];
        }

        if ($old_auditess && !$this->delete_ams_auditees($am_object_id)) {
            return false;
        }
        for ($i = 0; $i < count($uams_auditees); $i++) {
            //insert object
            $object_id = get_object_id("definitions->object_id->workflow->ams->auditees");

            $obj = new DB_Public_lm_audit_auditee_details();
            $obj->object_id = $object_id;
            $obj->audit_object_id = $am_object_id;
            $obj->auditee_id = $uams_auditees[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            if ($obj->insert(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_n .= "\n\t\t" . getFullName($uams_auditees[$i]);
                $at_p .= "\n\t\t" . $uams_auditees[$i] . " - " . getFullName($uams_auditees[$i]);
            }
        }
        $at_data['Auditees'] = array($at_o, $at_n, $at_p);
        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
        return true;
    }

    function delete_ams_auditees($am_object_id) {
        $obj = new DB_Public_lm_audit_auditee_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        if ($obj->delete(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        } else {
            return false;
        }
    }

    function get_ams_auditees($am_object_id) {
        $obj = new DB_Public_lm_audit_auditee_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $list[] = array(
                    'object_id' => $obj->object_id,
                    'ams_object_id' => $obj->audit_object_id,
                    'auditee_id' => $obj->auditee_id,
                    'auditee_name' => getFullName($obj->auditee_id),
                    'auditee_dept_name' => getPlantName(getUserPlantId($obj->auditee_id)),
                    'auditee_plant_name' => getDeptName($obj->auditee_id),
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_dept_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_plant_name' => getDeptName($obj->created_by),
                );
            }
            return $list;
        }
        return null;
    }

    function update_ams_ext_auditors($am_object_id, $data) {
        extract($data);
        $at_o = $at_p = $at_n = '';
        //old auditees
        $old_auditors = $this->get_ams_ext_auditors($am_object_id);
        for ($i = 0; $i < count($old_auditors); $i++) {
            $at_o .= "\nAgency : " . $old_auditors[$i]['ext_agency'] . "\nAuditor : " . $old_auditors[$i]['auditor_name'] . "\nDesignation : " . $old_auditors[$i]['designation'] . "\nEmail : " . $old_auditors[$i]['email'] . "\nContact Number : " . $old_auditors[$i]['contact_number'];
        }

        if ($old_auditors && !$this->delete_ams_ext_auditors($am_object_id)) {
            return false;
        }
        for ($i = 0; $i < count($uams_auditor_name); $i++) {
            //insert object
            $object_id = get_object_id("definitions->object_id->workflow->ams->ext_auditor");

            $obj = new DB_Public_lm_audit_ext_auditor_details();
            $obj->object_id = $object_id;
            $obj->audit_object_id = $am_object_id;
            $obj->ext_agency = $uams_ext_agency[$i];
            $obj->auditor_name = $uams_auditor_name[$i];
            $obj->designation = $uams_auditor_designation[$i];
            $obj->email = $uams_auditor_email[$i];
            $obj->contact_number = $uams_auditor_contact_number[$i];
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            if ($obj->insert(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_n .= "\nAgency : " . $uams_ext_agency[$i] . "\nAuditor : " . $uams_auditor_name[$i] . "\nDesignation : " . $uams_auditor_designation[$i] . "\nEmail : " . $uams_auditor_email[$i] . "\nContact Number : " . $uams_auditor_contact_number[$i];
                $at_p .= "\nAgency : " . $uams_ext_agency[$i] . "\nAuditor : " . $uams_auditor_name[$i] . "\nDesignation : " . $uams_auditor_designation[$i] . "\nEmail : " . $uams_auditor_email[$i] . "\nContact Number : " . $uams_auditor_contact_number[$i];
            } else {
                return false;
            }
        }
        $at_data['Auditors'] = array($at_o, $at_n, $at_p);
        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
        return true;
    }

    function delete_ams_ext_auditors($am_object_id) {
        $obj = new DB_Public_lm_audit_ext_auditor_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        if ($obj->delete(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        } else {
            return false;
        }
    }

    function get_ams_ext_auditors($am_object_id) {
        $obj = new DB_Public_lm_audit_ext_auditor_details();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $list[] = array(
                    'object_id' => $obj->object_id,
                    'ams_object_id' => $obj->audit_object_id,
                    'ext_agency' => $obj->ext_agency,
                    'auditor_name' => $obj->auditor_name,
                    'designation' => $obj->designation,
                    'email' => $obj->email,
                    'contact_number' => $obj->contact_number,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_dept_name' => getPlantName(getUserPlantId($obj->created_by)),
                    'created_by_plant_name' => getDeptName($obj->created_by),
                );
            }
            return $list;
        }
        return null;
    }

    function is_all_fields_in_edit_tab_completed($am_object_id) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $am_object_id);
        $auditors = (getAuditType($obj->audit_type_id) === "INTERNAL") ? $this->get_ams_int_auditors($am_object_id) : $this->get_ams_ext_auditors($am_object_id);
        if (!$obj->scope || !$obj->from_date || !$obj->to_date || !$obj->objectives || !$obj->is_meeting_required || empty($this->get_ams_agenda_details($am_object_id)) || empty($this->get_ams_audit_plan($am_object_id)) || empty($auditors) || empty($this->get_ams_auditees($am_object_id))) {
            return false;
        }
        return true;
    }

    function update_ams_wf_status($am_object_id, $status) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $am_object_id);
        $obj->wf_status = $status;
        $obj->update();
        return true;
    }

    function update_ams_status($am_object_id, $status) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $am_object_id);
        $obj->status = $status;
        $obj->update();
        return true;
    }

    function update_ams_approval_status($am_object_id, $status) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $am_object_id);
        $obj->approval_status = $status;
        $obj->update();
        return true;
    }

    function update_ams_audit_status($am_object_id, $status) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $am_object_id);
        $obj->audit_status = $status;
        $obj->update();
        return true;
    }

    function get_ams_wf_status($am_object_id) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->get("object_id", $am_object_id);
        return $obj->wf_status;
    }

    function update_ams_closeout($am_object_id, $wf_status, $status, $approval_status, $audit_status, $rejected_reason) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->whereAdd("object_id='$am_object_id'");
        $obj->wf_status = $wf_status;
        $obj->status = $status;
        $obj->approval_status = $approval_status;
        $obj->audit_status = $audit_status;
        $obj->rejected_reason = $rejected_reason;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function add_ams_review_comments($am_object_id, $review_comments, $usr_id, $date_time, $audit_trail_action, $review_stage) {
        $id = get_object_id("definitions->object_id->workflow->ams->review_comments");

        $obj = new DB_Public_lm_audit_review_comments();
        $obj->object_id = $id;
        $obj->audit_object_id = $am_object_id;
        $obj->remarks = $review_comments;
        $obj->review_stage = $review_stage;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        if ($obj->insert()) {
            //Audit Trail
            $commented_by = getFullName($usr_id);
            $at_data['Comments'] = array('NA', $review_comments, $review_comments);
            $at_data['Given By'] = array('NA', $commented_by, "$usr_id - $commented_by");
            addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, 'Successfully Updated');
            return true;
        }
        return false;
    }

    function get_ams_mgmt_review_comments($am_object_id, $created_by = null, $review_stage = null) {
        $obj = new DB_Public_lm_audit_review_comments();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        (!empty($created_by)) ? $obj->whereAdd("created_by='$created_by'") : null;
        (!empty($review_stage)) ? $obj->whereAdd("review_stage='$review_stage'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $review_array[] = array(
                    'object_id' => $obj->object_id,
                    'am_object_id' => $obj->audit_object_id,
                    'user_name' => getFullName($obj->created_by),
                    'department' => getDeptName($obj->created_by),
                    "plant" => getPlantShortName(getUserPlantId($obj->created_by)),
                    'remarks' => trim($obj->remarks),
                    'review_stage' => $obj->review_stage,
                    'date_time' => display_datetime_format($obj->created_time),
                    'date' => get_modified_date_format($obj->created_time),
                    'count' => $count
                );
                $count++;
            }
            return $review_array;
        }
        return false;
    }

    function assign_ams_auditors($am_object_id, $agenda_object_id_array, $auditors_array) {
        for ($i = 0; $i < count($agenda_object_id_array); $i++) {
            $obj = new DB_Public_lm_audit_agenda_details();
            $obj->whereAdd("object_id='$agenda_object_id_array[$i]'");
            $obj->auditor_id = $auditors_array[$i];
            $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $at_data['Assign Auditors'] = array("Updated", 'Updated', 'Updated');
        addAuditTrailLog($am_object_id, null, $at_data, $_POST['audit_trail_action'], "Updated");
        return true;
    }

    function add_ams_observation_attachment($am_object_id, $type, $usr_id, $date_time, $attached_files_array) {
        /* Dropzone File Upload */
        for ($k = 0; $k < count($attached_files_array['tmp_name_array']); $k++) {
            $tempFile = $attached_files_array['tmp_name_array'][$k];
            $file_type = $attached_files_array['type'][$k];
            $file_size = $attached_files_array['size'][$k];
            $file_name = clean_filename($attached_files_array['name'][$k], 0, 80);
            if ($file_name) {
                $fhash = md5($tempFile);
                $hash = uniqid($fhash);

                $file_info = new SplFileInfo($file_name);
                $extension = $file_info->getExtension();

                $file_id = get_object_id("definitions->object_id->workflow->ams->obseravtion_file_upload");

                $file = new DB_Public_file();
                $file->object_id = $file_id;
                $file->type = $file_type;
                $file->name = $file_name;
                $file->size = $file_size;
                $file->hash = $hash . "." . $extension;
                move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
                $file->insert();

                $doc_file = new DB_Public_lm_audit_doc_file();
                $doc_file->file_id = $file_id;
                $doc_file->object_id = $am_object_id;
                $doc_file->type = $type;
                $doc_file->attached_by = $usr_id;
                $doc_file->attached_date = $date_time;
                $doc_file->ref_object_id = $attached_files_array['ref_object_id'];
                if ($doc_file->insert()) {
                    //audit trail
                    $at_data['File Name'] = array('NA', $file_name, $file_name);
                    $at_data['File Type'] = array('NA', $file_type, $file_type);
                    $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                    $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                    addAuditTrailLog($am_object_id, $attached_files_array['ref_object_id'], $at_data, "Attach File", 'File Attached Successfully');
                }
            }
        }
        return true;
    }

    function update_ams_agenda_details($data) {
        extract($data);

        for ($i = 0; $i < count($agenda_object_id); $i++) {
            //Object to insert new values
            $obj = new DB_Public_lm_audit_agenda_details();
            $obj->whereAdd("object_id='$agenda_object_id[$i]'");

            //Audit Observation
            ($uams_audit_observation) ? ($obj->observation = $uams_audit_observation[$i]) : false;

            //Conformity
            ($uams_conformity) ? ($obj->conformity = $uams_conformity[$i]) : false;

            //Severity Level
            ($uams_severity_level) ? ($obj->severity_level = $uams_severity_level[$i]) : false;

            //Action To Be Taken
            ($uams_nc_action) ? ($obj->action_to_be_taken = $uams_nc_action[$i]) : false;

            //Severity Level
            ($is_capa_required) ? ($obj->is_capa_required = $is_capa_required[$i][0]) : false;

            if (!$obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                return false;
            }
        }
        addAuditTrailLog($am_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
        return true;
    }

    function add_ams_meeting_schedule($am_object_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $participants, $usr_id, $date_time) {
        $meeting_sched_id = get_object_id("definitions->object_id->meeting->ams->meeting_schedule");

        $obj = new DB_Public_lm_audit_meeting_schedule();
        $obj->object_id = $meeting_sched_id;
        $obj->audit_object_id = $am_object_id;
        $obj->meeting_date = $meeting_date;
        $obj->meeting_time = $meeting_time;
        $obj->venue = $meeting_venue;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->status = "Pending";
        $obj->is_latest = "yes";
        $obj->meeting_link = trim($meeting_link);
        if ($obj->insert()) {
            $at_data['Meeting Date'] = array('NA', get_modified_date_format($meeting_date), get_modified_date_format($meeting_date));
            $at_data['Meeting Time'] = array('NA', $meeting_time, $meeting_time);
            $at_data['Meeting Venue'] = array('NA', $meeting_venue, $meeting_venue);
            $at_data['Scheduled By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
            addAuditTrailLog($am_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');

            $this->add_ams_meeting_participants_details($participants, $am_object_id, $meeting_sched_id, null, $usr_id, $date_time);

            return true;
        }
        return false;
    }

    function update_ams_meeting_schedule($am_object_id, $meeting_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $reason, $usr_id, $date_time) {
        //old_obj
        $old_obj = new DB_Public_lm_audit_meeting_schedule();
        $old_obj->get("object_id", $meeting_id);

        //update_obj
        $u_obj = new DB_Public_lm_audit_meeting_schedule();
        $u_obj->whereAdd("object_id='$meeting_id'");
        $u_obj->whereAdd("audit_object_id='$am_object_id'");
        $u_obj->meeting_date = $meeting_date;
        $u_obj->meeting_time = $meeting_time;
        $u_obj->venue = $meeting_venue;
        $u_obj->modified_by = $usr_id;
        $u_obj->modified_time = $date_time;
        $u_obj->reason = $reason;
        $u_obj->meeting_link = $meeting_link;
        if ($u_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            $at_data['Meeting Date'] = array(get_modified_date_format($old_obj->meeting_date), get_modified_date_format($meeting_date), get_modified_date_format($meeting_date));
            $at_data['Meeting Time'] = array($old_obj->meeting_time, $meeting_time, $meeting_time);
            $at_data['Meeting Venue'] = array($old_obj->venue, $meeting_venue, $meeting_venue);
            $at_data['Reason'] = array("NA", $reason, $reason);
            addAuditTrailLog($am_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Successfully Updated');
            return true;
        } else {
            return false;
        }
    }

    function get_ams_meeting_details($am_object_id = null, $meeting_id = null, $is_latest = 'yes') {
        $obj = new DB_Public_lm_audit_meeting_schedule();
        ($am_object_id) ? $obj->whereAdd("audit_object_id='$am_object_id'") : false;
        ($meeting_id) ? $obj->whereAdd("object_id='$meeting_id'") : false;
        ($is_latest) ? $obj->whereAdd("is_latest='$is_latest'") : false;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $meeting_date_time = getModifiedDateTimeFormat($obj->meeting_date . " " . $obj->meeting_time, 'f2');
                $meeting_details = array(
                    'object_id' => $obj->object_id,
                    'meeting_date' => $obj->meeting_date,
                    'meeting_date1' => display_date_format($obj->meeting_date),
                    'meeting_time' => $obj->meeting_time,
                    'meeting_date_time' => $meeting_date_time,
                    'venue' => $obj->venue,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'am_object_id' => $obj->audit_object_id,
                    'is_latest' => $obj->is_latest,
                    'status' => $obj->status,
                    'reason' => $obj->reason,
                    'meeting_link' => $obj->meeting_link,
                    'created_time' => display_datetime_format($obj->created_time),
                    'modified_by' => $obj->modified_by,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_time' => $obj->modified_time,
                    'count' => $count
                );
                $count++;
            }
            return $meeting_details;
        }
        return null;
    }

    function add_ams_meeting_participants_details($participants, $am_object_id, $meeting_sched_id, $reason, $usr_id, $date_time) {
        $old_participant = $this->get_ams_meeting_participant_details(null, $am_object_id, null, null);
        if ($old_participant) {
            for ($i = 0; $i < count($old_participant); $i++) {
                $old_participant_at_old .= "\n\t\t\t" . $old_participant[$i]['participant'];
            }
        } else {
            $old_participant_at_old = "NA";
        }

        //Meeting Participants
        for ($i = 0; $i < count($participants); $i++) {
            $participant_id = get_object_id("definitions->object_id->meeting->ams->meeting_participant");
            $p_obj = new DB_Public_lm_audit_participant();
            $p_obj->object_id = $participant_id;
            $p_obj->audit_object_id = $am_object_id;
            $p_obj->participant_id = $participants[$i];
            $p_obj->created_by = $usr_id;
            $p_obj->created_time = $date_time;
            $p_obj->meeting_object_id = $meeting_sched_id;
            if ($p_obj->insert()) {
                $participant_at_n .= "\n\t\t\t" . getFullName($participants[$i]);
                $participant_at_p .= "\n\t\t\t" . $participants[$i] . " - " . getFullName($participants[$i]) . " : " . getDeptId($participants[$i]) . " - " . getDeptName($participants[$i]);
            }
        }
        ($reason) ? $at_data['Reason'] = array('NA', $reason, $reason) : null;
        $at_data['Partcicpants'] = array($old_participant_at_old, $participant_at_n, $participant_at_p);
        addAuditTrailLog($am_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
    }

    function get_ams_meeting_participant_details($object_id = null, $am_object_id = null, $participant_id = null, $meeting_sch_id = null) {
        $obj = new DB_Public_lm_audit_participant();
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($am_object_id) ? $obj->whereAdd("audit_object_id='$am_object_id'") : false;
        ($participant_id) ? $obj->whereAdd("participant_id='$participant_id'") : false;
        ($meeting_sch_id) ? $obj->whereAdd("meeting_object_id='$meeting_sch_id'") : false;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $participant_array[] = array(
                    'object_id' => $obj->object_id,
                    'participant_id' => $obj->participant_id,
                    'participant' => getFullName($obj->participant_id),
                    'plant' => getUserPlantShortName($obj->participant_id),
                    'department' => getDeptName($obj->participant_id),
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => display_datetime_format($obj->created_time)
                );
            }
            return $participant_array;
        }
        return null;
    }

    function add_ams_meeting_attendee_details($am_object_id, $meeting_id, $attendees, $usr_id, $date_time) {
        $old_attendees = $this->get_ams_meeting_attendee_details($am_object_id, null);
        if ($old_attendees) {
            for ($i = 0; $i < count($old_attendees); $i++) {
                $old_attendees_at_old .= "\n\t\t\t" . $old_attendees[$i]['attendee'];
            }
        } else {
            $old_attendees_at_old = "NA";
        }

        for ($i = 0; $i < count($attendees); $i++) {
            $att_id = get_object_id("definitions->object_id->meeting->ams->meeting_attendee");
            $attendee_obj = new DB_Public_lm_audit_meeting_attendence();
            $attendee_obj->object_id = $att_id;
            $attendee_obj->meeting_object_id = $meeting_id;
            $attendee_obj->audit_object_id = $am_object_id;
            $attendee_obj->attendee_id = $attendees[$i];
            $attendee_obj->created_by = $usr_id;
            $attendee_obj->created_time = $date_time;

            $attendee_presesnt = $this->get_ams_meeting_attendee_details($am_object_id, $attendees[$i]);
            if ($attendee_presesnt == null) {
                if ($attendee_obj->insert()) {
                    $attendees_at_n .= "\n\t\t\t" . getFullName($attendees[$i]);
                    $attendees_at_p .= "\n\t\t\t" . $attendees[$i] . " - " . getFullName($attendees[$i]) . " : " . getDeptId($attendees[$i]) . " - " . getDeptName($attendees[$i]);
                } else {
                    return false;
                }
            }
        }
        if (!empty($attendees_at_n)) {
            $at_data['Meeting Attendees'] = array($old_attendees_at_old, $attendees_at_n, $attendees_at_p);
            addAuditTrailLog($am_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Succesfully Added');
        }
        return true;
    }

    function get_ams_meeting_attendee_details($am_object_id, $attendee_id = null) {
        $obj = new DB_Public_lm_audit_meeting_attendence();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        ($attendee_id) ? $obj->whereAdd("attendee_id='$attendee_id'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $attendee_array[] = array(
                    'attendee' => getFullName($obj->attendee_id),
                    'object_id' => $obj->object_id,
                    'department' => getDeptName($obj->attendee_id),
                    'plant' => getUserPlantShortName($obj->attendee_id),
                    'created_by' => $obj->created_by,
                    'created_time' => $obj->created_time,
                    'count' => $count
                );
                $count++;
            }
            return $attendee_array;
        }
        return null;
    }

    function update_ams_meeting_status($am_object_id, $status) {
        $obj = new DB_Public_lm_audit_scheduled_details();
        $obj->whereAdd("object_id='$am_object_id'");
        $obj->meeting_status = $status;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_audit_observation($am_object_id, $data) {
        extract($data);
        $this->delete_audit_observation($am_object_id, $uams_audit_observation_id_array);
        for ($i = 0; $i < count($agenda_object_id); $i++) {
            for ($j = 0; $j < count($uams_audit_observation[$i]); $j++) {
                $obj = new DB_Public_lm_audit_observation();
                ($uams_audit_observation_id[$i][$j]) ? $obj->whereAdd("object_id='$uams_audit_observation_id[$i][$j]'") : null;

                $obj->audit_object_id = $am_object_id;
                $obj->agenda_object_id = $agenda_object_id[$i];
                $obj->observation = $uams_audit_observation[$i][$j];
                $obj->conformity = $uams_conformity[$i][$j];
                $obj->severity_level = $uams_severity_level[$i][$j];
                $obj->action_to_be_taken = $uams_nc_action[$i][$j];
                $obj->is_capa_required = $is_capa_required[$i][$j];
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                if ($uams_audit_observation_id[$i][$j] != '') {
                    $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                } else {
                    $object_id = get_object_id("definitions->object_id->workflow->ams->observation");
                    $obj->object_id = $object_id;
                    $obj->insert();
                }
                for ($k = 0; $k < count($_FILES['file']['tmp_name'][$i][$j]); $k++) {
                    if ($_FILES['file']['tmp_name'][$i][$j][$k]) {
                        $attached_files_array = array('ref_object_id' => $object_id, 'tmp_name_array' => $_FILES['file']['tmp_name'][$i][$j], 'type' => $_FILES['file']['type'][$i][$j], 'size' => $_FILES['file']['size'][$i][$j], 'name' => $_FILES['file']['name'][$i][$j]);
                        $this->add_ams_observation_attachment($am_object_id, 'observation', $usr_id, $date_time, $attached_files_array);
                    }
                }
            }
        }
        return true;
        //}
    }

    function delete_audit_observation($am_object_id, $audit_obs_array) {
        
        $est_obs_array = $this->get_ams_obseravtion_details($am_object_id);
        
        $obj = new DB_Public_lm_audit_observation();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        //$obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_ams_obseravtion_details($am_object_id, $agenda_object_id = null) {
        $obj = new DB_Public_lm_audit_observation();
        $obj->whereAdd("audit_object_id='$am_object_id'");
        ($agenda_object_id) ? $obj->whereAdd("agenda_object_id='$agenda_object_id'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {

                $file_obj = new Doc_File_Processor();
                $attachments_observation = $file_obj->getLmAmDocFileObjectArray($am_object_id, "observation", $obj->object_id);

                $attendee_array[] = array(
                    'object_id' => $obj->object_id,
                    'am_object_id' => $obj->audit_object_id,
                    'agenda_object_id' => $obj->agenda_object_id,
                    'observation' => $obj->observation,
                    'conformity' => $obj->conformity,
                    'severity_level' => $obj->severity_level,
                    'is_capa_required' => $obj->is_capa_required,
                    'action_to_be_taken' => $obj->action_to_be_taken,
                    'integration_details' => (object) array_shift(get_integration_details(null, $am_object_id, null, $obj->object_id)),
                    'attachments' => $attachments_observation
                );
                $count++;
            }
            return $attendee_array;
        }
        return null;
    }
}

?>
