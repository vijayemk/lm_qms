<?php

class Capa_Processor
{

    function add_capa_details($sorurce_doc_no, $source_lm_doc_id, $trigger_type, $reason, $usr_id, $access_dept, $date_time, $audit_trail_action)
    {
        $object_id = get_object_id("definitions->object_id->workflow->capa->object_id");
        $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-12');
        $usr_plant_id = getUserPlantId($usr_id);

        $capa_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);
        $usr_dept_id = getDeptId($usr_id);
        $current_access_dept = getUserPlantId($usr_id) . "-" . $usr_dept_id;
        if ($capa_no) {
            $obj = new DB_Public_lm_capa_master();
            $obj->capa_object_id = $object_id;
            $obj->capa_no = $capa_no;
            $obj->capa_department = $usr_dept_id;
            $obj->source_doc_no = $sorurce_doc_no;
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->plant_id = $usr_plant_id;
            $obj->lm_doc_id = $lm_doc_id;
            $obj->is_meeting_required = "no";
            $obj->meeting_status = "NA";
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->status = "Open";
            $obj->wf_status = "Created";
            $obj->trigger_type = $trigger_type;
            $obj->reason = $reason;
            $obj->approval_status = "Pending";
            $obj->capa_triggered_from = $source_lm_doc_id;
            if ($obj->insert()) {
                add_worklist($usr_id, $object_id);
                save_workflow($object_id, $usr_id, 'Created', 'create');
                update_qms_no_seq($usr_plant_id, $lm_doc_id);

                if ($source_lm_doc_id == "OTHERS") {
                    $source_doc = $sorurce_doc_no;
                } else {
                    $source_doc = get_qms_doc_no(null, $sorurce_doc_no)['doc_no'];
                }

                $at_data['CAPA No'] = array("NA", $capa_no, "$capa_no \nlm_doc_id : $lm_doc_id");
                $at_data['Source Doc No'] = array("NA", $source_doc, $source_doc);
                $at_data['Reason'] = array("NA", $reason, $reason);
                $at_data['Trigger Type'] = array("NA", $trigger_type, $trigger_type);
                addAuditTrailLog($object_id, null, $at_data, $audit_trail_action, "Successfuly Added");

                addDeptAccessRights($object_id, $current_access_dept, $access_dept, $usr_id, $date_time, $capa_no, $audit_trail_action);
                return $object_id;
            }
        }
        return null;
    }

    function update_capa_details($capa_object_id, $data)
    {
        extract($data);

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_capa_master();
        $old_obj->get("capa_object_id", $capa_object_id);

        //Object to insert new values
        $update_obj = new DB_Public_lm_capa_master();
        $update_obj->whereAdd("capa_object_id='$capa_object_id'");

        $at_data['CAPA No'] = array($old_obj->capa_no, $old_obj->capa_no, $old_obj->capa_no . "\nlm_doc_id : $old_obj->lm_doc_id");

        //Reason
        ($ucapa_reason) ? ($update_obj->reason = $ucapa_reason and $at_data['Reason'] = array($old_obj->reason . "\n", $ucapa_reason . "\n", $ucapa_reason)) : false;

        //Present System
        ($ucapa_present_system) ? ($update_obj->present_system = $ucapa_present_system and $at_data['Present Discrepancy | Non-Conformity'] = array($old_obj->present_system . "\n", $ucapa_present_system . "\n", $ucapa_present_system)) : false;

        //Corrections | Immediate Action
        ($ucapa_immed_action) ? ($update_obj->immed_action_taken = $ucapa_immed_action and $at_data['Corrections | Immediate Action'] = array($old_obj->immed_action_taken . "\n", $ucapa_immed_action . "\n", $ucapa_immed_action)) : false;

        //Immediate Action Take By
        ($ucapa_immed_action_taken_by) ? ($update_obj->immed_action_taken_by = $ucapa_immed_action_taken_by and $at_data['Immediate Action Taken By'] = array("NA", $ucapa_immed_action_taken_by, $ucapa_immed_action_taken_by)) : null;

        //Immediate Action Take Date
        ($ucapa_immed_action_taken_date) ? ($update_obj->immed_action_taken_date = $ucapa_immed_action_taken_date and $at_data['Immediate Action Taken By'] = array("NA", $ucapa_immed_action_taken_date, $ucapa_immed_action_taken_date)) : null;
        //Close Out Comments
        //Is Meeting Required
        ($ucapa_meeting) ? ($update_obj->is_meeting_required = $ucapa_meeting and $at_data['Is Meeting Required'] = array($old_obj->is_meeting_required, $ucapa_meeting, $ucapa_meeting)) : false;
        if ($ucapa_meeting === "yes") {
            $update_obj->meeting_status = "Pending";
            $at_data['Meeting Status'] = array($old_obj->meeting_status, "Pending", "Pending");
        } elseif ($ucapa_meeting === "no") {
            $update_obj->meeting_status = "NA";
            $at_data['Meeting Status'] = array($old_obj->meeting_status, "NA", "NA");
        }
        //Task Target Date
        ($ucapa_task_target_date) ? ($update_obj->task_target_date = $ucapa_task_target_date and $at_data['Implememtation Target Date'] = array("NA", $ucapa_task_target_date, $ucapa_task_target_date)) : null;

        //close out target date
        ($ucapa_closeout_target_date) ? ($update_obj->target_date = $ucapa_closeout_target_date and $at_data['Close Out Target Date'] = array("NA", $ucapa_closeout_target_date, $ucapa_closeout_target_date)) : null;

        //Close Out date
        ($ucapa_close_out_date) ? ($update_obj->close_out_date = $ucapa_close_out_date and $at_data['Close Out Date'] = array("NA", $ucapa_close_out_date, $ucapa_close_out_date)) : null;

        //Close Out Comments
        ($task_close_out_review) ? ($update_obj->task_qa_review = $task_close_out_review and $at_data['Task QA Review'] = array("NA", $task_close_out_review, $task_close_out_review)) : false;

        //Completetd Date
        ($ucapa_completed_date) ? ($update_obj->completed_date = $ucapa_completed_date and $at_data['Completed Date'] = array("NA", $ucapa_completed_date, $ucapa_completed_date)) : null;

        //Task Qa Review
        ($task_close_out_review) ? ($update_obj->task_qa_review = $task_close_out_review and $at_data['Task QA Review'] = array("NA", $task_close_out_review, $task_close_out_review)) : false;  //Task Qa Review
        //Is Monitoring required
        ($ucapa_monitoring) ? ($update_obj->is_monitoring_required = $ucapa_monitoring and $at_data['Is Monitoring required'] = array("NA", $ucapa_monitoring, $ucapa_monitoring)) : false;

        //Monitoring Target Date
        ($ucapa_monitoring_date) ? ($update_obj->monitoring_target_date = $ucapa_monitoring_date and $at_data['Is Monitoring required'] = array("NA", $ucapa_monitoring_date, $ucapa_monitoring_date)) : false;

        if ($update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            addAuditTrailLog($capa_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function get_capa_source_doc_no($capa_object_id)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        if ($obj->capa_triggered_from == "OTHERS") {
            $source_doc_no = array('source_doc_no' => $obj->source_doc_no, "source_doc_link" => $obj->source_doc_no);
        } else {
            $source_doc_no = array('source_doc_no' => get_qms_doc_no(null, $obj->source_doc_no)['doc_no'], "source_doc_link" => get_qms_doc_no(null, $obj->source_doc_no)['doc_link']);
        }
        return $source_doc_no;
    }

    function get_capa_details($data = null)
    {
        $obj = new DB_Public_lm_capa_master();
        if ($data) {
            extract($data);
            ($capa_object_id) ? $obj->whereAdd("capa_object_id='$capa_object_id'") : null;
            ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
            ($dept) ? $obj->whereAdd("capa_department='$dept'") : null;
            ($created_by) ? $obj->whereAdd("created_by='$created_by'") : null;
            ($start_date) ? $obj->whereAdd("created_time>='$start_date'") : null;
            ($end_date) ? $obj->whereAdd("created_time<='$end_date'") : null;
            ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
            ($capa_no) ? $obj->whereAdd("capa_no='$capa_no'") : null;
            ($appr_status) ? $obj->whereAdd("approval_status='$appr_status'") : null;
        }
        $count = 1;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $capa_list[] = array(
                    'capa_object_id' => $obj->capa_object_id,
                    'lm_doc_id' => $obj->lm_doc_id,
                    'lm_doc_name' => getLmDocName($obj->lm_doc_id),
                    'capa_department' => $obj->capa_department,
                    'capa_department_name' => getDepartment($obj->capa_department),
                    'capa_no' => $obj->capa_no,
                    'source_doc_no' => $obj->source_doc_no,
                    'present_system' => $obj->present_system,
                    'reason' => $obj->reason,
                    'immed_action_taken' => $obj->immed_action_taken,
                    'approval_status' => $obj->approval_status,
                    'status' => $obj->status,
                    'wf_status' => $obj->wf_status,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => display_datetime_format($obj->created_time),
                    'modified_by' => $obj->modified_by,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_time' => $obj->modified_time,
                    'rejected_reason' => $obj->rejected_reason,
                    'target_date' => display_date_format(display_date_format($obj->target_date)),
                    'target_date1' => $obj->target_date,
                    'plant_id' => $obj->plant_id,
                    'plant_name' => getPlantName($obj->plant_id),
                    'close_out_date' => display_hypen_if_null(display_date_format($obj->close_out_date)),
                    'task_target_date' => display_hypen_if_null(display_date_format($obj->task_target_date)),
                    'is_meeting_required' => $obj->is_meeting_required,
                    'meeting_status' => $obj->meeting_status,
                    'task_status' => $obj->task_status,
                    'trigger_type' => $obj->trigger_type,
                    'task_qa_review' => $obj->task_qa_review,
                    'close_out_comments' => $obj->close_out_comments,
                    'completed_date' => display_hypen_if_null($obj->completed_date),
                    'immed_action_taken_by' => $obj->immed_action_taken_by,
                    'immed_action_by_date' => $obj->immed_action_taken_date,
                    'is_monitoring_required' => $obj->is_monitoring_required,
                    'doc_link' => get_qms_doc_no("capa", $obj->capa_object_id)["doc_link"],
                    'count' => $count,
                );
                $count++;
            }
            return $capa_list;
        }
        return null;
    }

    function get_capa_wf_status($capa_object_id)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        return $obj->wf_status;
    }

    function update_capa_wf_status($capa_object_id, $status)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        $obj->wf_status = $status;
        $obj->update();
        return true;
    }

    function update_capa_status($capa_object_id, $status)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        $obj->status = $status;
        $obj->update();
        return true;
    }

    function get_capa_cancelled_details($capa_object_id)
    {
        $cancel_obj = new DB_Public_lm_capa_cancel_details();
        $cancel_obj->whereAdd("capa_object_id='$capa_object_id'");
        if ($cancel_obj->find()) {
            while ($cancel_obj->fetch()) {
                $cancel_details[] = array(
                    'capa_object_id' => $cancel_obj->capa_object_id,
                    'object_id' => $cancel_obj->object_id,
                    'reason' => $cancel_obj->reason,
                    'cancelled_by' => getFullName($cancel_obj->created_by),
                    'cancelled_time' => get_modified_date_time_format($cancel_obj->created_time)
                );
            }
            return $cancel_details;
        }
        return null;
    }

    function is_all_fields_in_edit_tab_completed($capa_object_id)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        if (($obj->immed_action_taken != '') && ($obj->present_system != '') && !empty($this->get_capa_task_details($capa_object_id))) {
            return true;
        }
        return false;
    }

    function add_capa_review_comments($capa_object_id, $review_comments, $usr_id, $date_time, $audit_trail_action, $review_stage)
    {
        $id = get_object_id("definitions->object_id->workflow->capa->review_comments");

        $obj = new DB_Public_lm_capa_review_comments();
        $obj->object_id = $id;
        $obj->capa_object_id = $capa_object_id;
        $obj->remarks = $review_comments;
        $obj->review_stage = $review_stage;
        $obj->created_time = $date_time;
        $obj->created_by = $usr_id;
        if ($obj->insert()) {
            //Audit Trail
            $commented_by = getFullName($usr_id);
            $at_data['Comments'] = array('NA', $review_comments, $review_comments);
            $at_data['Given By'] = array('NA', $commented_by, "$usr_id - $commented_by");
            addAuditTrailLog($capa_object_id, null, $at_data, $audit_trail_action, 'Successfully Updated');
            return true;
        }
        return false;
    }

    function get_capa_mgmt_review_comments($capa_object_id, $created_by = null, $review_stage = null)
    {
        $obj = new DB_Public_lm_capa_review_comments();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        (!empty($created_by)) ? $obj->whereAdd("created_by='$created_by'") : null;
        (!empty($review_stage)) ? $obj->whereAdd("review_stage='$review_stage'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $capa_rev_comm_array[] = array(
                    'object_id' => $obj->object_id,
                    'capa_object_id' => $obj->capa_object_id,
                    'user_name' => getFullName($obj->created_by),
                    'department' => getDeptName($obj->created_by),
                    'department' => getDeptName($obj->created_by),
                    "plant" => getPlantShortName(getUserPlantId($obj->created_by)),
                    'remarks' => trim($obj->remarks),
                    'review_stage' => $obj->review_stage,
                    'date_time' => get_modified_date_time_format($obj->created_time),
                    'date' => get_modified_date_format($obj->created_time),
                    'count' => $count
                );
                $count++;
            }
            return $capa_rev_comm_array;
        }
        return false;
    }

    function add_attachments_capa($capa_object_id, $type, $usr_id, $date_time)
    {
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

            $file_id = get_object_id("definitions->object_id->workflow->capa->file_upload");

            $file = new DB_Public_file();
            $file->object_id = $file_id;
            $file->type = $file_type;
            $file->name = $file_name;
            $file->size = $file_size;
            $file->hash = $hash . "." . $extension;
            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
            $file->insert();

            $doc_file = new DB_Public_lm_capa_doc_file();
            $doc_file->file_id = $file_id;
            $doc_file->object_id = $capa_object_id;
            $doc_file->type = $type;
            $doc_file->attached_by = $usr_id;
            $doc_file->attached_date = $date_time;
            if ($doc_file->insert()) {
                //audit trail
                $at_data['File Name'] = array('NA', $file_name, $file_name);
                $at_data['File Type'] = array('NA', $file_type, $file_type);
                $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                $at_data['Refrence Towards'] = array('NA', $type, $type);
                $at_data['Attach By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                addAuditTrailLog($capa_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                return true;
            }
            return false;
        }
    }

    function update_capa_meeting_task_status($capa_object_id, $type, $status)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->whereAdd("capa_object_id='$capa_object_id'");

        ($type == "meeting") ? $obj->meeting_status = $status : false;
        ($type == "task") ? $obj->task_status = $status : false;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_capa_closeout($capa_object_id, $wf_status, $status, $approval_status, $rejected_reason, $close_out_date)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        $obj->wf_status = $wf_status;
        $obj->status = $status;
        $obj->approval_status = $approval_status;
        $obj->rejected_reason = $rejected_reason;
        $obj->close_out_date = $close_out_date;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_capa_approval_status($capa_object_id, $status)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        $obj->approval_status = $status;
        $obj->update();
        return true;
    }

    //---------Start Of Meeting Functions----------------------------//
    function add_capa_meeting_schedule($capa_object_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $participants, $meeting_agenda, $usr_id, $date_time)
    {
        $meeting_sched_id = get_object_id("definitions->object_id->meeting->capa->meeting_schedule");

        $obj = new DB_Public_lm_capa_meeting_schedule();
        $obj->object_id = $meeting_sched_id;
        $obj->capa_object_id = $capa_object_id;
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
            addAuditTrailLog($capa_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');

            $this->add_capa_meeting_participants_details($participants, $capa_object_id, $meeting_sched_id, null, $usr_id, $date_time);

            //Meeting Agenda
            for ($i = 0; $i < count($meeting_agenda); $i++) {
                $object_id = $object_id = get_object_id("definitions->object_id->meeting->capa->meeting_agenda");

                $obj = new DB_Public_lm_capa_meeting_agenda_details();
                $obj->object_id = $object_id;
                $obj->capa_object_id = $capa_object_id;
                $obj->agenda = $meeting_agenda[$i];
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                $obj->meeting_object_id = $meeting_sched_id;
                $obj->insert();
            }
            return true;
        }
        return false;
    }

    function update_capa_meeting_schedule($capa_object_id, $meeting_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $reason, $usr_id, $date_time)
    {
        //old_obj
        $old_obj = new DB_Public_lm_capa_meeting_schedule();
        $old_obj->get("object_id", $meeting_id);

        //update_obj
        $u_obj = new DB_Public_lm_capa_meeting_schedule();
        $u_obj->whereAdd("object_id='$meeting_id'");
        $u_obj->whereAdd("capa_object_id='$capa_object_id'");
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
            addAuditTrailLog($capa_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Successfully Updated');
            return true;
        } else {
            return false;
        }
    }

    function get_capa_meeting_details($capa_object_id = null, $meeting_id = null, $is_latest = 'yes')
    {
        $obj = new DB_Public_lm_capa_meeting_schedule();
        ($capa_object_id) ? $obj->whereAdd("capa_object_id='$capa_object_id'") : false;
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
                    'meeting_date1' => get_modified_date_format($obj->meeting_date),
                    'meeting_time' => $obj->meeting_time,
                    'meeting_date_time' => $meeting_date_time,
                    'venue' => $obj->venue,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'capa_object_id' => $obj->capa_object_id,
                    'is_latest' => $obj->is_latest,
                    'status' => $obj->status,
                    'reason' => $obj->reason,
                    'meeting_link' => $obj->meeting_link,
                    'created_time' => get_modified_date_time_format($obj->created_time),
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

    function update_capa_meeting_conclusion($capa_object_id, $meeting_id, $meeting_agenda_id, $meeting_conclusion, $date_time)
    {
        for ($i = 0; $i < count($meeting_conclusion); $i++) {
            $obj = new DB_Public_lm_capa_meeting_agenda_details();
            $obj->whereAdd("capa_object_id='$capa_object_id'");
            $obj->whereAdd("object_id='$meeting_agenda_id[$i]'");
            $obj->whereAdd("meeting_object_id='$meeting_id'");
            $obj->conclusion = $meeting_conclusion[$i];
            $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $mobj = new DB_Public_lm_capa_meeting_schedule();
        $mobj->whereAdd("capa_object_id='$capa_object_id'");
        $obj->whereAdd("object_id='$meeting_id'");
        $mobj->status = "Completed";
        $mobj->modified_time = $date_time;
        $mobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function add_capa_meeting_participants_details($participants, $capa_object_id, $meeting_sched_id, $reason, $usr_id, $date_time)
    {
        $old_participant = $this->get_capa_meeting_participant_details(null, $capa_object_id, null, null);
        if ($old_participant) {
            for ($i = 0; $i < count($old_participant); $i++) {
                $old_participant_at_old .= "\n\t\t\t" . $old_participant[$i]['participant'];
            }
        } else {
            $old_participant_at_old = "NA";
        }

        //Meeting Participants
        for ($i = 0; $i < count($participants); $i++) {
            $participant_id = get_object_id("definitions->object_id->meeting->capa->meeting_participant");
            $p_obj = new DB_Public_lm_capa_participant();
            $p_obj->object_id = $participant_id;
            $p_obj->capa_object_id = $capa_object_id;
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
        addAuditTrailLog($capa_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
    }

    function get_capa_meeting_participant_details($object_id = null, $capa_object_id = null, $participant_id = null, $meeting_sch_id = null)
    {
        $obj = new DB_Public_lm_capa_participant();
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($capa_object_id) ? $obj->whereAdd("capa_object_id='$capa_object_id'") : false;
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
                    'created_time' => get_modified_date_time_format($obj->created_time)
                );
            }
            return $participant_array;
        }
        return null;
    }

    function get_capa_meeting_agenda_details($capa_object_id)
    {
        $obj = new DB_Public_lm_capa_meeting_agenda_details();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $agenda_array[] = array(
                    'agenda' => $obj->agenda,
                    'object_id' => $obj->object_id,
                    'conclusion' => $obj->conclusion,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => $obj->created_time,
                    'count' => $count
                );
                $count++;
            }
            return $agenda_array;
        }
        return null;
    }

    function add_capa_meeting_attendee_details($capa_object_id, $meeting_id, $attendees, $usr_id, $date_time)
    {
        $old_attendees = $this->get_capa_meeting_attendee_details($capa_object_id, null);
        if ($old_attendees) {
            for ($i = 0; $i < count($old_attendees); $i++) {
                $old_attendees_at_old .= "\n\t\t\t" . $old_attendees[$i]['attendee'];
            }
        } else {
            $old_attendees_at_old = "NA";
        }

        for ($i = 0; $i < count($attendees); $i++) {
            $att_id = get_object_id("definitions->object_id->meeting->capa->meeting_attendee");
            $attendee_obj = new DB_Public_lm_capa_meeting_attendence();
            $attendee_obj->object_id = $att_id;
            $attendee_obj->meeting_object_id = $meeting_id;
            $attendee_obj->capa_object_id = $capa_object_id;
            $attendee_obj->attendee_id = $attendees[$i];
            $attendee_obj->created_by = $usr_id;
            $attendee_obj->created_time = $date_time;

            $attendee_presesnt = $this->get_capa_meeting_attendee_details($capa_object_id, $attendees[$i]);
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
            addAuditTrailLog($capa_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Succesfully Added');
        }
        return true;
    }

    function get_capa_meeting_attendee_details($capa_object_id, $attendee_id = null)
    {
        $obj = new DB_Public_lm_capa_meeting_attendence();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
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

    //---------End Of Meeting Functions----------------------------//
    //---------Start Of Task Functions----------------------------//
    function add_capa_task_details($capa_object_id, $task_id, $task, $pri_per_id, $submission_type, $task_type, $type, $usr_id, $date_time)
    {
        $task_at_n = $task_at_p = "";
        $task_at_o = "NA";
        // Delete Task
        if ($task_type == "first_time") {
            $this->delete_all_capa_task($capa_object_id);
        }
        if ($task_type == "add_more_task") {
            $old_task = $this->get_capa_task_details($capa_object_id, null);
            for ($i = 0; $i < count($old_task); $i++) {
                $task_at_o .= "\n\nTask Id : " . $old_task[$i]['task_id'] . "\nPrimary Responsible Person : " . $old_task[$i]['pri_per_name'];
            }
        }
        // Add Task
        for ($i = 0; $i < count($task); $i++) {
            $object_id = get_object_id("definitions->object_id->task->capa->task");
            $obj = new DB_Public_lm_capa_task_details();
            $obj->object_id = $object_id;
            $obj->capa_object_id = $capa_object_id;
            $obj->task_id = $task_id[$i];
            $obj->task = $task[$i];
            $obj->pri_per_id = $pri_per_id[$i];
            $obj->created_by = $usr_id;
            $obj->created_date = $date_time;
            $obj->task_status_pri = "Pending";
            $obj->status = "Pending";
            $obj->wf_status = "to_be_assigned";
            $obj->type = $type[$i];
            $obj->order1 = $i + 1;
            if ($obj->insert()) {
                $task_type = ($type[$i] === "ca") ? "Corrective Action" : "Prevetive Action";
                $task_at_n .= "\n\nTask Id : {$task_id[$i]}\nType : $task_type\nPrimary Responsible Person : " . getFullName($pri_per_id[$i]);
                $task_at_p .= "\n\nTask Id: {$task_id[$i]}\nType : $type\nPrimary Responsible Person : {$pri_per_id[$i]} - " . getFullName($pri_per_id[$i]) . "\nDepartment : " . getDeptId($pri_per_id[$i]) . " - " . getDeptName($pri_per_id[$i]) . "\nPlant : " . getUserPlantId($pri_per_id[$i]) . " - " . getPlantShortName(getUserPlantId($pri_per_id[$i]));
            } else {
                return false;
            }
        }
        if ($submission_type == "assing_pri_per") {
            //Audit Trail
            $at_data['Task Details'] = array($task_at_o, $task_at_n, $task_at_p);
            addAuditTrailLog($capa_object_id, null, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
        }
        return true;
    }

    function delete_all_capa_task($capa_object_id)
    {
        $realted_to_obj = new DB_Public_lm_capa_task_details();
        $realted_to_obj->whereAdd("capa_object_id='$capa_object_id'");
        $realted_to_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function update_capa_task_details($object_id, $capa_object_id, $pri_per_id, $sec_per_id, $task_status_pri, $task_status_sec, $task_completion_date_pri, $task_completion_date_sec, $task_status_creator, $task_completion_date_creator, $task_status_dept_head, $task_completion_date_dept_head, $task_status, $task_wf_status)
    {
        $obj = new DB_Public_lm_capa_task_details();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($pri_per_id) ? ($obj->pri_per_id = $pri_per_id) : false;
        ($sec_per_id) ? ($obj->sec_per_id = $sec_per_id) : false;
        ($task_status_pri) ? ($obj->task_status_pri = $task_status_pri) : false;
        ($task_status_sec) ? ($obj->task_status_sec = $task_status_sec) : false;
        ($task_completion_date_pri) ? ($obj->task_completion_date_pri = $task_completion_date_pri) : false;
        ($task_completion_date_sec) ? ($obj->task_completion_date_sec = $task_completion_date_sec) : false;
        ($task_status_creator) ? ($obj->task_status_creator = $task_status_creator) : false;
        ($task_completion_date_creator) ? ($obj->task_completion_date_creator = $task_completion_date_creator) : false;
        ($task_status_dept_head) ? ($obj->task_status_dept_head = $task_status_dept_head) : false;
        ($task_completion_date_dept_head) ? ($obj->task_completion_date_dept_head = $task_completion_date_dept_head) : false;
        ($task_status) ? ($obj->status = $task_status) : false;
        ($task_wf_status) ? ($obj->wf_status = $task_wf_status) : false;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function get_capa_task_details($capa_object_id, $task_object_id = null, $pri_per_id = null, $sec_per_id = null, $task_status_pri = null, $task_status_sec = null, $task_status_creator = null, $status = null, $wf_status = null)
    {
        $obj = new DB_Public_lm_capa_task_details();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        ($task_object_id) ? $obj->whereAdd("object_id='$task_object_id'") : false;
        ($pri_per_id) ? $obj->whereAdd("pri_per_id='$pri_per_id'") : false;
        ($sec_per_id) ? $obj->whereAdd("sec_per_id='$sec_per_id'") : false;
        ($task_status_pri) ? $obj->whereAdd("task_status_pri='$task_status_pri'") : false;
        ($task_status_sec) ? $obj->whereAdd("task_status_sec='$task_status_sec'") : false;
        ($task_status_creator) ? $obj->whereAdd("task_status_creator='$task_status_creator'") : false;
        ($status) ? $obj->whereAdd("status='$status'") : false;
        ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $doc_file_processor_object = new Doc_File_Processor();
                $attachments_sec = $doc_file_processor_object->getLmCapaDocFileObjectArray($capa_object_id, "task_sec_per", $obj->object_id, $obj->sec_per_id);
                $attachments_pri = $doc_file_processor_object->getLmCapaDocFileObjectArray($capa_object_id, "task_pri_per", $obj->object_id, $obj->pri_per_id);
                $attachments_creator = $doc_file_processor_object->getLmCapaDocFileObjectArray($capa_object_id, "task_creator", $obj->object_id, $obj->created_by);
                $attachments_dept_head = $doc_file_processor_object->getLmCapaDocFileObjectArray($capa_object_id, "task_dept_head", $obj->object_id, $obj->created_by);

                $latest_sec_review_comments = array_shift($this->get_capa_task_review_comments($obj->object_id, null, "task_sec_per", 'yes'));
                $latest_pri_review_comments = array_shift($this->get_capa_task_review_comments($obj->object_id, null, "task_pri_per", 'yes'));
                $latest_creator_comments = array_shift($this->get_capa_task_review_comments($obj->object_id, null, "task_creator", 'yes'));
                $latest_dept_head_comments = array_shift($this->get_capa_task_review_comments($obj->object_id, null, "task_dept_head", 'yes'));

                $all_sec_review_comments = $this->get_capa_task_review_comments($obj->object_id, null, "task_sec_per", null);
                $all_pri_review_comments = $this->get_capa_task_review_comments($obj->object_id, null, "task_pri_per", null);
                $all_creator_review_comments = $this->get_capa_task_review_comments($obj->object_id, null, "task_creator", null);
                $all_dept_head_review_comments = $this->get_capa_task_review_comments($obj->object_id, null, "task_dept_head", null);
                $qa_verification_comments = array_shift(array_column($this->get_capa_details($capa_object_id), 'task_qa_review'));

                $cc_details = array_shift(get_integration_details(null, $capa_object_id, null, $obj->object_id));

                $task_list_array[] = array(
                    'object_id' => $obj->object_id,
                    'capa_object_id' => $obj->capa_object_id,
                    'task' => $obj->task,
                    'task_id' => $obj->task_id,
                    'pri_per_id' => $obj->pri_per_id,
                    'pri_per_name' => getFullName($obj->pri_per_id),
                    'pri_per_dept' => getDeptName($obj->pri_per_id),
                    'pri_per_plant_id' => getUserPlantId($obj->pri_per_id),
                    'pri_per_plant' => getPlantShortName(getUserPlantId($obj->pri_per_id)),
                    'sec_per_id' => $obj->sec_per_id,
                    'sec_per_name' => getFullName($obj->sec_per_id),
                    'sec_per_dept' => getDeptName($obj->sec_per_id),
                    'sec_per_plant' => getPlantShortName(getUserPlantId($obj->sec_per_id)),
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_date' => $obj->created_date,
                    'task_status_pri' => $obj->task_status_pri,
                    'task_status_sec' => $obj->task_status_sec,
                    'task_status_creator' => $obj->task_status_creator,
                    'task_completion_date' => $obj->task_completion_date,
                    'status' => $obj->status,
                    'latest_sec_review_comments' => $latest_sec_review_comments,
                    'latest_pri_review_comments' => $latest_pri_review_comments,
                    'attachments_sec' => $attachments_sec,
                    'attachments_pri' => $attachments_pri,
                    'attachments_creator' => $attachments_creator,
                    'attachments_dept_head' => $attachments_dept_head,
                    'attachments_sec_count' => count($attachments_sec),
                    'attachments_pri_count' => count($attachments_pri),
                    'attachments_creator_count' => count($attachments_creator),
                    'attachments_dept_head_count' => count($attachments_dept_head),
                    'all_sec_review_comments' => $all_sec_review_comments,
                    'all_pri_review_comments' => $all_pri_review_comments,
                    'latest_creator_review_comments' => $latest_creator_comments,
                    'all_creator_review_comments' => $all_creator_review_comments,
                    'latest_dept_head_review_comments' => $latest_dept_head_comments,
                    'all_dept_head_review_comments' => $all_dept_head_review_comments,
                    'qa_verification_comments' => $qa_verification_comments,
                    'type' => $obj->type,
                    'is_cc_required' => $obj->is_cc_required,
                    'wf_status' => $obj->wf_status,
                    'cc_details' => $cc_details,
                    'count' => $count
                );
                $count++;
            }
            asort($task_list_array);
            return $task_list_array;
        }
        return null;
    }

    function is_capa_task_eligible_to_assign_sec_per($capa_object_id, $pri_per_id)
    {
        $obj = new DB_Public_lm_capa_task_details();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        ($pri_per_id) ? $obj->whereAdd("pri_per_id='$pri_per_id'") : false;
        if ($obj->find()) {
            while ($obj->fetch()) {
                if (($obj->task_status_pri === "Pending") && ($obj->wf_status === "to_be_assigned")) {
                    return true;
                }
            }
        }
        return false;
    }

    function get_capa_task_obj($task_object_id)
    {
        $obj = new DB_Public_lm_capa_task_details();
        $obj->get("object_id", $task_object_id);
        return $obj;
    }

    function add_capa_task_review_comments($task_object_id_array, $review_comments_array, $commented_by, $usr_id, $date_time)
    {
        for ($i = 0; $i < count($review_comments_array); $i++) {
            if ($review_comments_array[$i]) {
                //If Review Comments Present Update
                if ($this->get_capa_task_review_comments($task_object_id_array[$i], $usr_id, $commented_by, "yes")) {
                    $task_obj = $this->get_capa_task_obj($task_object_id_array[$i]);

                    $update = false;
                    if ($commented_by === 'task_pri_per') {
                        $update = ($task_obj->task_status_pri === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_sec_per') {
                        $update = ($task_obj->task_status_sec === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_creator') {
                        $update = ($task_obj->task_status_creator === "Pending") ? true : false;
                    }
                    if ($update) {
                        $obj = new DB_Public_lm_capa_task_review_comments();
                        $obj->whereAdd("task_object_id='$task_object_id_array[$i]'");
                        $obj->whereAdd("commented_by='$commented_by'");
                        $obj->whereAdd("is_latest='yes'");
                        $obj->review_comments = $review_comments_array[$i];
                        $obj->commented_by = $commented_by;
                        $obj->is_latest = 'yes';
                        $obj->created_by = $usr_id;
                        $obj->created_date = $date_time;
                        $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                    }
                }
                //If Review Not Comments Present Insert
                else {
                    $object_id = get_object_id("definitions->object_id->task->capa->task_review_comments");
                    $obj = new DB_Public_lm_capa_task_review_comments();
                    $obj->object_id = $object_id;
                    $obj->task_object_id = $task_object_id_array[$i];
                    $obj->review_comments = $review_comments_array[$i];
                    $obj->commented_by = $commented_by;
                    $obj->is_latest = 'yes';
                    $obj->created_by = $usr_id;
                    $obj->created_date = $date_time;
                    $obj->insert();
                }
            }
        }
        return true;
    }

    function get_capa_task_review_comments($task_object_id, $created_by = null, $commented_by = null, $is_latest = null)
    {
        $obj = new DB_Public_lm_capa_task_review_comments();
        $obj->whereAdd("task_object_id='$task_object_id'");
        ($created_by) ? $obj->whereAdd("created_by='$created_by'") : false;
        ($commented_by) ? $obj->whereAdd("commented_by='$commented_by'") : false;
        ($is_latest) ? $obj->whereAdd("is_latest='$is_latest'") : false;
        if ($obj->find()) {
            while ($obj->fetch()) {
                $comments_array[] = array(
                    'object_id' => $obj->object_id,
                    'task_object_id' => $obj->task_object_id,
                    'review_comments' => $obj->review_comments,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_plant' => getPlantShortName(getUserPlantId($obj->created_by)),
                    'created_by_dept' => getDeptName($obj->created_by),
                    'created_date' => display_datetime_format($obj->created_date),
                    'commented_by' => $obj->commented_by,
                    'is_latest' => $obj->is_latest
                );
            }
            return $comments_array;
        }
        return null;
    }

    function update_capa_task_review_comments_is_latest($task_object_id, $commented_by, $is_latest)
    {
        $obj = new DB_Public_lm_capa_task_review_comments();
        $obj->whereAdd("task_object_id='$task_object_id'");
        $obj->whereAdd("commented_by='$commented_by'");
        $obj->whereAdd("is_latest='yes'");
        $obj->is_latest = $is_latest;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function add_capa_task_attachment($capa_object_id, $type, $usr_id, $date_time)
    {
        /* Dropzone File Upload */
        if (!empty($_FILES)) {
            foreach ($_FILES['file']['name'] as $task_obj_id => $task_files) {
                for ($i = 0; $i < count($_FILES['file']['name'][$task_obj_id]); $i++) {
                    $tempFile = $_FILES['file']['tmp_name'][$task_obj_id][$i];
                    $file_type = $_FILES['file']['type'][$task_obj_id][$i];
                    $file_size = $_FILES['file']['size'][$task_obj_id][$i];
                    $file_name = $_FILES['file']['name'][$task_obj_id][$i];
                    $file_name = clean_filename($file_name, 0, 80);

                    if ($file_name) {
                        $fhash = md5($tempFile);
                        $hash = uniqid($fhash);

                        $file_info = new SplFileInfo($_FILES['file']['name'][$task_obj_id][$i]);
                        $extension = $file_info->getExtension();

                        $file_id = get_object_id("definitions->object_id->task->capa->task_file_upload");

                        $file = new DB_Public_file();
                        $file->object_id = $file_id;
                        $file->type = $file_type;
                        $file->name = $file_name;
                        $file->size = $file_size;
                        $file->hash = $hash . "." . $extension;
                        move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
                        $file->insert();

                        $doc_file = new DB_Public_lm_capa_doc_file();
                        $doc_file->file_id = $file_id;
                        $doc_file->object_id = $capa_object_id;
                        $doc_file->type = $type;
                        $doc_file->attached_by = $usr_id;
                        $doc_file->attached_date = $date_time;
                        $doc_file->ref_object_id = $task_obj_id;
                        if ($doc_file->insert()) {
                            $task_details = $this->get_capa_task_obj($task_obj_id);
                            //audit trail
                            $at_data['File Name'] = array('NA', $file_name, $file_name);
                            $at_data['File Type'] = array('NA', $file_type, $file_type);
                            $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                            $at_data['Task Id'] = array('NA', $task_details->task_id, $task_details->task_id);
                            $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                            addAuditTrailLog($capa_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
    }

    function is_capa_task_completed($capa_object_id, $pri_per_id = null, $sec_per_id = null, $creator_id = null, $dept_head = null)
    {
        $obj = new DB_Public_lm_capa_task_details();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        ($pri_per_id) ? $obj->whereAdd("pri_per_id='$pri_per_id'") : null;
        ($sec_per_id) ? $obj->whereAdd("sec_per_id='$sec_per_id'") : null;
        ($creator_id) ? $obj->whereAdd("created_by='$creator_id'") : null;
        if ($obj->find()) {
            while ($obj->fetch()) {
                //If a task compeleted by sec person - sent to pri person
                if ($sec_per_id && $obj->task_status_sec !== "Completed" && $obj->status !== "Completed") {
                    return "Pending";
                }
                //If a task compeleted by pri person - sent to creator
                if ($pri_per_id && $obj->task_status_pri !== "Completed" && $obj->status !== "Completed") {
                    return "Pending";
                }
                //If all task compeleted - sent to Dept. Head
                if ($creator_id && $obj->task_status_creator !== "Completed") {
                    return "Pending";
                }
                //If all task compeleted - sent to QA
                if ($dept_head && (($obj->wf_status !== "Completed") || ($obj->task_status_sec !== "Completed" || $obj->task_status_pri !== "Completed" || $obj->task_status_creator !== "Completed"))) {
                    return "Pending";
                }
            }
            return "Completed";
        }
        return "not_in_task";
    }

    function update_capa_is_cc_required($object_id, $capa_object_id, $is_cc_required = null)
    {
        $obj = new DB_Public_lm_capa_task_details();
        $obj->whereAdd("object_id='$object_id'");
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        ($is_cc_required) ? ($obj->is_cc_required = $is_cc_required) : false;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    //---------End Of Task Functions----------------------------//

    function show_extended_capa_target_date_details($capa_object_id, $proposed_date)
    {
        $obj = new DB_Public_lm_capa_master();
        $obj->get("capa_object_id", $capa_object_id);
        $p_extended_days = '';
        // task 
        $p_extended_days = dateDiffInDays($obj->task_target_date, $proposed_date);
        $date_obj->date1['name'] = "Task";
        $date_obj->date1['from'] = get_modified_date_format($obj->task_target_date);
        $date_obj->date1['to'] = get_modified_date_format($proposed_date);
        // close out
        $date_obj->closeout['name'] = "Close Out";
        $date_obj->closeout['from'] = get_modified_date_format($obj->target_date);
        $date_obj->closeout['to'] = getModifiedDateFormat("d/m/Y", $obj->target_date, 0, 0, $p_extended_days);
        return $date_obj;
    }

    function extend_capa_target_dates($capa_object_id, $extension_for, $proposed_date)
    {
        $dms_details = (object) $this->get_capa_details($capa_object_id)[0];

        $uobj = new DB_Public_lm_capa_master();
        $uobj->whereAdd("capa_object_id='$capa_object_id'");

        if ($extension_for === "task") {
            if ($dms_details->task_target_date && $dms_details->task_status == "Pending") {
                $pta_extended_days = dateDiffInDays($dms_details->task_target_date, $proposed_date);
                $task_target_date = $proposed_date;
                $uobj->task_target_date = $task_target_date;
                $at_data['Task Target Date'] = array($dms_details->task_target_date, $task_target_date, $task_target_date);

                $p_close_out_date = getModifiedDateFormat("Y-m-d", $dms_details->target_date1, 0, 0, $pta_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($dms_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($capa_object_id, null, $at_data, "Extension", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "close_out") {
            $target_date = $proposed_date;
            $uobj->target_date = $target_date;
            if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_data['Close-out Target Date'] = array($dms_details->target_date1, $target_date, $target_date);
                addAuditTrailLog($capa_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
                return true;
            }
            return false;
        }
        if ($extension_for === "monitoring") {
            $target_date = $proposed_date;
            $uobj->monitoring_target_date = $target_date;
            if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_data['Monitoring Target Date'] = array($dms_details->monitoing_target_date, $target_date, $target_date);
                addAuditTrailLog($capa_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
                return true;
            }
            return false;
        }
    }

    //***Start Of Monitoring Functions  ***//
    function add_capa_montioring_details($capa_object_id, $resp_per, $level, $is_active, $usr_id, $date_time)
    {
        if (!empty($resp_per)) {

            $id = get_object_id("definitions->object_id->workflow->capa->monitoring");
            $date_time = date('Y-m-d G:i:s');
            $monitoring = new DB_Public_lm_capa_monitoring_details();
            $monitoring->monitoring_id = $id;
            $monitoring->capa_object_id = $capa_object_id;
            $monitoring->resp = $resp_per;
            $monitoring->level = $level;
            $monitoring->dept_id = getDeptId($resp_per);
            $monitoring->is_active = $is_active;
            $monitoring->created_by = $usr_id;
            $monitoring->created_time = $date_time;
            $monitoring->modified_by = $usr_id;
            $monitoring->modified_time = $date_time;
            if ($monitoring->insert()) {
                return true;
            }
        }
    }

    function check_if_user_is_monitoring($capa_object_id, $user)
    {
        $monitoring_obj = new DB_Public_lm_capa_monitoring_details();
        $monitoring_obj->whereAdd("capa_object_id='$capa_object_id'");
        $monitoring_obj->whereAdd("resp='$user'");
        $monitoring_obj->find();
        while ($monitoring_obj->fetch()) {
            if (is_null($monitoring_obj->final_feedback) && is_null($monitoring_obj->effectiveness)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function add_capa_monitoring_feedback($capa_object_id, $feedback, $effectiveness, $user_id)
    {

        $object_id = get_object_id("definitions->object_id->workflow->capa->monitoring_feedback");
        $updated_date = date('Y-m-d G:i:s');
        $monitoring = new DB_Public_lm_capa_monitoring_updated_details();
        $monitoring->object_id = $object_id;
        $monitoring->capa_object_id = $capa_object_id;
        $monitoring->comments = $feedback;
        $monitoring->effectiveness = $effectiveness;
        $monitoring->updated_by = $user_id;
        $monitoring->updated_date = $updated_date;
        $monitoring->insert();
    }

    function update_capa_monitoring_final_feedback($capa_object_id, $feedback, $effectiveness, $user_id)
    {
        $updated_date = date('Y-m-d G:i:s');
        $obj = new DB_Public_lm_capa_monitoring_details();
        $obj->whereAdd("capa_object_id='$capa_object_id'");
        $obj->whereAdd("resp='$user_id'");
        $obj->final_feedback = $feedback;
        $obj->effectiveness = $effectiveness;
        $obj->modified_time = $updated_date;
        $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function get_interim_feedback_comments($capa_object_id)
    {
        $feedback_obj = new DB_Public_lm_capa_monitoring_updated_details();
        $feedback_obj->whereAdd("capa_object_id='$capa_object_id'");
        if ($feedback_obj->find()) {
            while ($feedback_obj->fetch()) {
                $comments_list[] = array(
                    'object_id' => $feedback_obj->object_id,
                    'feedback' => $feedback_obj->comments,
                    'date' => $feedback_obj->updated_date,
                    'updated_by' => getUserName($feedback_obj->updated_by),
                    'updated_by_dept' => getDeptName($feedback_obj->updated_by),
                    'effectiveness' => $feedback_obj->effectiveness,
                );
            }
            return $comments_list;
        }
        return null;
    }

    function get_final_feedback_comments($capa_object_id)
    {
        $feedback_obj = new DB_Public_lm_capa_monitoring_details();
        $feedback_obj->whereAdd("capa_object_id='$capa_object_id'");
        if ($feedback_obj->find()) {
            while ($feedback_obj->fetch()) {
                if (!empty($feedback_obj->final_feedback) && !empty($feedback_obj->effectiveness)) {
                    $comments_list[] = array(
                        'object_id' => $feedback_obj->monitoring_id,
                        'feedback' => $feedback_obj->final_feedback,
                        'date' => $feedback_obj->created_time,
                        'updated_by' => getUserName($feedback_obj->resp),
                        'updated_by_dept' => getDeptName($feedback_obj->resp),
                        'effectiveness' => $feedback_obj->effectiveness,
                    );
                }
            }
            return $comments_list;
        }
        return null;
    }

    function is_monitoring_completed($capa_object_id)
    {
        $monitoring_obj = new DB_Public_lm_capa_monitoring_details();
        $monitoring_obj->whereAdd("capa_object_id='$capa_object_id'");
        if ($monitoring_obj->find()) {
            while ($monitoring_obj->fetch()) {
                if (!empty($monitoring_obj->final_feedback) && !empty($monitoring_obj->effectiveness)) {
                    return true;
                }
                return false;
            }
        }
    }

    function get_capa_resp_persons($capa_object_id)
    {
        $resp_per_obj = new DB_Public_lm_capa_monitoring_details();
        $resp_per_obj->whereAdd("capa_object_id='$capa_object_id'");
        if ($resp_per_obj->find()) {
            while ($resp_per_obj->fetch()) {
                $user_list[] = array(
                    'object_id' => $resp_per_obj->monitoring_id,
                    'monitoring_id' => $resp_per_obj->monitoring_id,
                    'resp_per' => getUserName($resp_per_obj->resp),
                    'level' => $resp_per_obj->level,
                    'plant' => getPlantShortName(getUserPlantId($resp_per_obj->resp)),
                    'dept' => getDeptName($resp_per_obj->resp),
                    'created_time' => $resp_per_obj->created_time,
                    "completed_date" => $this->get_monitoring_completion_date($resp_per_obj->monitoring_id),
                    "time_taken" => time_taken($resp_per_obj->created_time, $this->get_monitoring_completion_date($resp_per_obj->monitoring_id))
                );
            }
            return $user_list;
        }
        return null;
    }

    function get_monitoring_completion_date($monitoring_id)
    {
        $obj = new DB_Public_lm_capa_monitoring_details();
        $obj->whereAdd("monitoring_id='$monitoring_id'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                $date = (empty($obj->final_feedback)) ? null : $obj->modified_time;
            }
            return $date;
        }
    }

    //***END Of Monitoring Functions ***//
}
