<?php

class Dms_Processor {

    function add_dms_details($data) {
        $object_id = get_object_id("definitions->object_id->workflow->dms->object_id");

        $dev_type = $data['dev_type'];
        $lm_doc_id = $data['lm_doc_id'];
        $dev_classfi = $data['dev_classification'];
        $dev_date_of_occ = $data['dev_date_of_occ'];
        $dev_time_of_occ = $data['dev_time_of_occ'];
        $dev_date_of_discover = $data['dev_date_of_discover'];
        $dev_time_of_discover = $data['dev_time_of_discover'];
        $dev_related_to_array = $data['dev_related_to_array'];
        $adev_repetitive_dms_no_array = $data['adev_repetitive_dms_no_array'];
        $dev_meeting = $data['dev_meeting'];
        $dev_training = $data['dev_training'];
        $dev_task = $data['dev_task'];
        $access_dept = $data['access_dept'];
        $dev_exam = $data['dev_exam'];
        $usr_id = $data['usr_id'];
        $usr_plant_id = $data['usr_plant_id'];
        $date_time = $data['date_time'];
        $usr_dept = $data['usr_dept'];
        $reporting_date = date('Y-m-d');
        $reporting_time = date('G:i:s');
        $audit_trail_action = $data['audit_trail_action'];
        $current_access_dept = getUserPlantId($usr_id) . "-" . $usr_dept;
        $dev_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);

        $meeting_status = ($dev_meeting == 'yes') ? 'Pending' : 'NA';
        $training_status = ($dev_training == 'yes') ? 'Pending' : 'NA';
        $exam_status = ($dev_exam == 'yes') ? 'Pending' : 'NA';
        $task_status = ($dev_task == 'yes') ? 'Pending' : 'NA';

        if ($dev_no) {
            $dm_master_obj = new DB_Public_lm_dm_master();
            $dm_master_obj->dm_object_id = $object_id;
            $dm_master_obj->lm_doc_id = $lm_doc_id;
            $dm_master_obj->dm_department = $usr_dept;
            $dm_master_obj->dm_no = $dev_no;
            $dm_master_obj->dm_type_id = $dev_type;
            $dm_master_obj->classification = $dev_classfi;
            $dm_master_obj->date_of_occurrence = $dev_date_of_occ;
            $dm_master_obj->time_of_occurrence = $dev_time_of_occ;
            $dm_master_obj->reporting_date = $reporting_date;
            $dm_master_obj->reporting_time = $reporting_time;
            $dm_master_obj->status = "Open";
            $dm_master_obj->wf_status = "Created";
            $dm_master_obj->plant_id = getUserPlantId($usr_id);
            $dm_master_obj->is_meeting_required = $dev_meeting;
            $dm_master_obj->is_training_required = $dev_training;
            $dm_master_obj->is_task_required = $dev_task;
            $dm_master_obj->is_online_exam_required = $dev_exam;
            $dm_master_obj->meeting_status = $meeting_status;
            $dm_master_obj->training_status = $training_status;
            $dm_master_obj->exam_status = $exam_status;
            $dm_master_obj->task_status = $task_status;
            $dm_master_obj->date_of_discovery = $dev_date_of_discover;
            $dm_master_obj->time_of_discovery = $dev_time_of_discover;
            $dm_master_obj->batch_no = null;
            $dm_master_obj->material_type_id = null;
            $dm_master_obj->process_stage_id = null;
            $dm_master_obj->scope = null;
            $dm_master_obj->customer = null;
            $dm_master_obj->manu_date = null;
            $dm_master_obj->manu_expiry_date = null;
            $dm_master_obj->created_by = $usr_id;
            $dm_master_obj->created_time = $date_time;
            $dm_master_obj->modified_by = $usr_id;
            $dm_master_obj->modified_time = $date_time;
            $dm_master_obj->target_date = NULL;
            $dm_master_obj->description = NULL;
            $dm_master_obj->immed_action_taken = NULL;
            $dm_master_obj->risk_impact_assessment = NULL;
            $dm_master_obj->approval_status = "Pending";
            $dm_master_obj->rejected_reason = NULL;
            $dm_master_obj->is_capa_required = NULL;
            $dm_master_obj->capa_no = NULL;
            $dm_master_obj->close_out_comments = NULL;
            if ($dm_master_obj->insert()) {
                //Add Devation Related To
                $dev_related_to_at_new = '';
                $dev_related_to_at_p = '';
                for ($i = 0; $i < count($dev_related_to_array); $i++) {
                    $dev_related_to_id = explode("-", $dev_related_to_array[$i]);
                    $related_to_id = get_object_id("definitions->object_id->workflow->dms->dms_related_to_details");

                    $dm_rel_to_obj = new DB_Public_lm_dm_related_to_details();
                    $dm_rel_to_obj->object_id = $related_to_id;
                    $dm_rel_to_obj->dm_object_id = $object_id;
                    $dm_rel_to_obj->dev_related_to_id = $dev_related_to_id[0];
                    $dm_rel_to_obj->dm_sub_related_to_id = $dev_related_to_id[1];
                    $dm_rel_to_obj->insert();

                    //Audit Trail
                    $dev_related_to = getDevRelatedToType($dev_related_to_id[0]);
                    $dev_sub_related_to = getDevSubRelatedToType($dev_related_to_id[1]);
                    $dev_related_to_at_new .= "\n\t\t\t{$dev_related_to} - {$dev_sub_related_to}";
                    $dev_related_to_at_p .= "\n\t\t\t{$dev_related_to_id[0]} - {$dev_related_to} : {$dev_related_to_id[1]} - {$dev_sub_related_to}";
                }

                $repetitive_dms_no_at_new = '';
                $repetitive_dms_no_at_p = '';
                for ($i = 0; $i < count($adev_repetitive_dms_no_array); $i++) {
                    if ($adev_repetitive_dms_no_array[$i] != "NA") {
                        $repetitive_id = get_object_id("definitions->object_id->workflow->dms->repetitive_dms_details");

                        $add_repetitive_obj = new DB_Public_lm_dm_repetitive_details();
                        $add_repetitive_obj->object_id = $repetitive_id;
                        $add_repetitive_obj->dm_object_id = $object_id;
                        $add_repetitive_obj->repetitive_dm_object_id = $adev_repetitive_dms_no_array[$i];
                        $add_repetitive_obj->created_by = $usr_id;
                        $add_repetitive_obj->created_time = $date_time;
                        $add_repetitive_obj->insert();
                    }
                    //Audit Trail
                    $repetitive_dms_no = get_qms_doc_no('dms', $adev_repetitive_dms_no_array[$i])['doc_no'];
                    $repetitive_dms_no_at_new .= "\n\t\t\t{$repetitive_dms_no} ";
                    $repetitive_dms_no_at_p .= "\n\t\t\t{$adev_repetitive_dms_no_array[$i]} - {$repetitive_dms_no}";
                }

                add_worklist($usr_id, $object_id);
                save_workflow($object_id, $usr_id, 'Created', 'create');
                update_qms_no_seq($usr_plant_id, $lm_doc_id);

                //Audit Trail
                $dev_type_name = getDevTypeName($dev_type);
                $class_name = getClassificationName($dev_classfi);

                $at_data['Deviation No'] = array("NA", $dev_no, "$dev_no \nlm_doc_id : $lm_doc_id");
                $at_data['Deviation Type'] = array("NA", $dev_type_name, "$dev_type - $dev_type_name");
                $at_data['Classification'] = array("NA", $class_name, "$dev_classfi - $class_name");
                $at_data['Date of Occurrence'] = array("NA", $dev_date_of_occ, $dev_date_of_occ);
                $at_data['Time of Occurrence'] = array("NA", $dev_time_of_occ, $dev_time_of_occ);
                $at_data['Is Meeting Required'] = array("NA", $dev_meeting, $dev_meeting);
                $at_data['Is Training required'] = array("NA", $dev_training, $dev_training);
                $at_data['Is Task Required'] = array("NA", $dev_task, $dev_task);
                $at_data['Is Exam Required'] = array("NA", $dev_exam, $dev_exam);
                $at_data['Meeting Status'] = array("NA", $meeting_status, $meeting_status);
                $at_data['Training Status'] = array("NA", $training_status, $training_status);
                $at_data['Exam Status'] = array("NA", $exam_status, $exam_status);
                $at_data['Task Status'] = array("NA", $task_status, $task_status);
                $at_data['Reporting date'] = array("NA", $reporting_date, $reporting_date);
                $at_data['Reporting Time'] = array("NA", $reporting_time, $reporting_time);
                $at_data['Date of Discovery'] = array("NA", $dev_date_of_discover, $dev_date_of_discover);
                $at_data['Time of Discovery'] = array("NA", $dev_time_of_discover, $dev_time_of_discover);
                $at_data['Devation Related To'] = array("NA", $dev_related_to_at_new, $dev_related_to_at_p);
                $at_data['Repetitive DMS'] = array("NA", $repetitive_dms_no_at_new, $repetitive_dms_no_at_p);
                addAuditTrailLog($object_id, null, $at_data, $audit_trail_action, "Successfuly Added");

                addDeptAccessRights($object_id, $current_access_dept, $access_dept, $usr_id, $date_time, $dev_no, $audit_trail_action);
                return $object_id;
            }
        }
        return null;
    }

    function update_dms_details($dm_object_id, $data) {
        extract($data);

        //Object to get old vlaues
        $at_old_dm = new DB_Public_lm_dm_master();
        $at_old_dm->get("dm_object_id", $dm_object_id);

        //Object to insert new values
        $udm_master_obj = new DB_Public_lm_dm_master();
        $udm_master_obj->whereAdd("dm_object_id='$dm_object_id'");

        $at_data['Deviation No'] = array($at_old_dm->dm_no, $at_old_dm->dm_no, $at_old_dm->dm_no . "\nlm_doc_id : $at_old_dm->lm_doc_id");
        //Devaition type
        ($udev_type) ? ($udm_master_obj->dm_type_id = $udev_type and $at_data['Deviation Type'] = array(getDevTypeName($at_old_dm->dm_type_id), getDevTypeName($udev_type), $udev_type . " - " . getDevTypeName($udev_type))) : false;

        //Devaition Classification
        ($udev_classification) ? ($udm_master_obj->classification = $udev_classification and $at_data['Classification'] = array(getClassificationName($at_old_dm->classification), getClassificationName($udev_classification), $udev_classification . " - " . getClassificationName($udev_classification))) : false;

        //Devaition date of occurrence
        ($udev_date_of_occ) ? ($udm_master_obj->date_of_occurrence = $udev_date_of_occ and $at_data['Date of Occurrence'] = array($at_old_dm->date_of_occurrence, $udev_date_of_occ, $udev_date_of_occ)) : false;

        //Devaition time of occurrence
        ($udev_time_of_occ) ? ($udm_master_obj->time_of_occurrence = $udev_time_of_occ and $at_data['Time of Occurrence'] = array($at_old_dm->time_of_occurrence, $udev_time_of_occ, $udev_time_of_occ)) : false;

        //Devaition date of discovery
        ($udev_date_of_discover) ? ($udm_master_obj->date_of_discovery = $udev_date_of_discover and $at_data['Date of Discovery'] = array($at_old_dm->date_of_discovery, $udev_date_of_discover, $udev_date_of_discover)) : false;

        //Devaition Time of discovery
        ($udev_time_of_discover) ? ($udm_master_obj->time_of_discovery = $udev_time_of_discover and $at_data['Time of Discovery'] = array($at_old_dm->time_of_discovery, $udev_time_of_discover, $udev_time_of_discover)) : false;

        //Material Type
        ($udev_mat_id) ? ($udm_master_obj->material_type_id = $udev_mat_id and $at_data['Material Type'] = array(getMaterialType($at_old_dm->material_type_id), getMaterialType($udev_mat_id), $udev_mat_id . " - " . getMaterialType($udev_mat_id))) : false;

        //Material Name
        ($udev_mat_name) ? ($udm_master_obj->material_name = $udev_mat_name and $at_data['Material Name'] = array($at_old_dm->material_name, $udev_mat_name, $udev_mat_name)) : false;

        //Product Name
        ($udev_prod_name) ? ($udm_master_obj->product_id = $udev_prod_name and $at_data['Product Name'] = array(getProductName($at_old_dm->product_id), getProductName($udev_prod_name), $udev_prod_name . " - " . getProductName($udev_prod_name))) : false;

        //Scope Market
        ($udev_scope) ? ($udm_master_obj->scope = $udev_scope and $at_data['Scope/Market'] = array(getMarketName($at_old_dm->scope), getMarketName($udev_scope), $udev_scope . " - " . getMarketName($udev_scope))) : false;

        //Customer
        ($udev_customer) ? ($udm_master_obj->customer = $udev_customer and $at_data['Customer'] = array(getCustomerName($at_old_dm->customer), getCustomerName($udev_customer), $udev_customer . " - " . getCustomerName($udev_customer))) : false;

        //Batch No
        ($udev_batch_no) ? ($udm_master_obj->batch_no = $udev_batch_no and $at_data['Bacth No'] = array($at_old_dm->batch_no, $udev_batch_no, $udev_batch_no)) : false;

        //Batch Size
        ($udev_batch_size) ? ($udm_master_obj->batch_size = $udev_batch_size and $at_data['Bacth Size'] = array($at_old_dm->batch_size, $udev_batch_size, $udev_batch_size)) : false;

        //Lot Number
        ($udev_lot_no) ? ($udm_master_obj->lot_no = $udev_lot_no and $at_data['Lot Number'] = array($at_old_dm->lot_no, $udev_lot_no, $udev_lot_no)) : false;

        //Process Stage
        ($udev_processing_stage) ? ($udm_master_obj->process_stage_id = $udev_processing_stage and $at_data['Process Stage'] = array(getProcessStage($at_old_dm->process_stage_id), getProcessStage($udev_processing_stage), $udev_processing_stage . " - " . getProcessStage($udev_processing_stage))) : false;

        //Manufactring Date
        ($udev_manu_date) ? ($udm_master_obj->manu_date = $udev_manu_date and $at_data['Manufactering date'] = array($at_old_dm->manu_date, $udev_manu_date, $udev_manu_date)) : false;

        //Expiry Date
        ($udev_manu_expiry_date) ? ($udm_master_obj->manu_expiry_date = $udev_manu_expiry_date and $at_data['Expiry date'] = array($at_old_dm->manu_expiry_date, $udev_manu_expiry_date, $udev_manu_expiry_date)) : false;

        //Description
        ($udev_desc) ? ($udm_master_obj->description = $udev_desc and $at_data['Description'] = array($at_old_dm->description . "\n", $udev_desc . "\n", $udev_desc)) : false;

        //Immediate Action
        ($udev_imd_action) ? ($udm_master_obj->immed_action_taken = $udev_imd_action and $at_data['Immediate Action Taken'] = array($at_old_dm->immed_action_taken . "\n", $udev_imd_action . "\n", $udev_imd_action)) : false;

        //Risk Impact Assesment
        ($udev_risk_impact) ? ($udm_master_obj->risk_impact_assessment = $udev_risk_impact and $at_data['Risk Impact Assesement'] = array($at_old_dm->risk_impact_assessment, $udev_risk_impact . "\n", $udev_risk_impact)) : false;

        //Is Meeting Required
        ($udev_meeting) ? ($udm_master_obj->is_meeting_required = $udev_meeting and $at_data['Is Meeting Required'] = array($at_old_dm->is_meeting_required, $udev_meeting, $udev_meeting)) : false;

        //Is Training required
        ($udev_training) ? ($udm_master_obj->is_training_required = $udev_training and $at_data['Is Training Required'] = array($at_old_dm->is_training_required, $udev_training, $udev_training)) : false;

        //Is Exam Required
        ($udev_exam) ? ($udm_master_obj->is_online_exam_required = $udev_exam and $at_data['Is Exam Required'] = array($at_old_dm->is_online_exam_required, $udev_exam, $udev_exam)) : false;

        //Is Task Required
        ($udev_task) ? ($udm_master_obj->is_task_required = $udev_task and $at_data['Is Task Required'] = array($at_old_dm->is_task_required, $udev_task, $udev_task)) : false;

        //QA Approval Status
        ($udev_qa_approve_st) ? ($udm_master_obj->approval_status = $udev_qa_approve_st and $at_data['QA Approval Status'] = array($at_old_dm->approval_status, $udev_qa_approve_st, $udev_qa_approve_st)) : false;

        //Is CAPA Required
        ($udev_capa) ? ($udm_master_obj->is_capa_required = $udev_capa and $at_data['Is CAPA required'] = array($at_old_dm->is_capa_required, $udev_capa, $udev_capa)) : false;

        //Is CC Required
        ($udev_cc) ? ($udm_master_obj->is_cc_required = $udev_cc and $at_data['Is Change Control required'] = array($at_old_dm->is_cc_required, $udev_cc, $udev_cc)) : false;

        //Close Out Date
        ($udev_close_out_date) ? ($udm_master_obj->close_out_date = $udev_close_out_date and $at_data['Close Out Date'] = array($at_old_dm->close_out_date, $udev_close_out_date, $udev_close_out_date)) : false;

        //Rejected Reason
        ($udev_reject_reason) ? ($udm_master_obj->rejected_reason = $udev_reject_reason and $at_data['Rejected Reason'] = array("N/A", $udev_reject_reason, $udev_reject_reason)) : false;

        //Target date
        ($udev_target_date) ? ($udm_master_obj->target_date = $udev_target_date and $at_data['Close-outTarget Date'] = array($at_old_dm->target_date, $udev_target_date, $udev_target_date)) : false;

        //Change Effectiveness
        ($udev_close_out_comments) ? ($udm_master_obj->close_out_comments = $udev_close_out_comments and $at_data['Change Effectiveness'] = array("NA", $udev_close_out_comments, $udev_close_out_comments)) : false;

        //Is Investigation Required
        ($udev_investigation) ? ($udm_master_obj->is_investigation_required = $udev_investigation and $at_data['Is Investigation Required'] = [$at_old_dm->is_investigation_required, $udev_investigation, $udev_investigation]) : false;

        //Meeting Target Date
        ($udev_meeting_date) ? ($udm_master_obj->meeting_target_date = $udev_meeting_date and $at_data['Meeting Traget Date'] = ["NA", $udev_meeting_date, $udev_meeting_date]) : false;

        //Training Target Date
        ($udev_training_date) ? ($udm_master_obj->training_target_date = $udev_training_date and $at_data['Training Traget Date'] = ["NA", $udev_training_date, $udev_training_date]) : false;

        //Exam Target Date
        ($udev_exam_date) ? ($udm_master_obj->exam_target_date = $udev_exam_date and $at_data['Exam Traget Date'] = ["NA", $udev_exam_date, $udev_exam_date]) : false;

        //Task Target Date
        ($udev_task_date) ? ($udm_master_obj->task_target_date = $udev_task_date and $at_data['Task Traget Date'] = ["NA", $udev_task_date, $udev_task_date]) : false;

        //Meeting Status 
        if ($udev_meeting === "yes") {
            $udm_master_obj->meeting_status = "Pending";
            $at_data['Meeting Status'] = array($at_old_dm->meeting_status, "Pending", "Pending");
        } elseif ($udev_meeting === "no") {
            $udm_master_obj->meeting_status = "NA";
            $at_data['Meeting Status'] = array($at_old_dm->meeting_status, "NA", "NA");
        }

        // Training Status
        if ($udev_training === "yes") {
            $udm_master_obj->training_status = "Pending";
            $at_data['Training Status'] = array($at_old_dm->training_status, "Pending", "Pending");
        } elseif ($udev_training === "no") {
            $udm_master_obj->training_status = "NA";
            $at_data['Training Status'] = array($at_old_dm->training_status, "NA", "NA");
        }

        // Exam Status
        if ($udev_exam === "yes") {
            $udm_master_obj->exam_status = "Pending";
            $at_data['Exam Status'] = array($at_old_dm->exam_status, "Pending", "Pending");
        } elseif ($udev_exam === "no") {
            $udm_master_obj->exam_status = "NA";
            $at_data['Exam Status'] = array($at_old_dm->exam_status, "NA", "NA");
        }

        // Task Status
        if ($udev_task === "yes") {
            $udm_master_obj->task_status = "Pending";
            $at_data['Task Status'] = array($at_old_dm->task_status, "Pending", "Pending");
        } elseif ($udev_task === "no") {
            $udm_master_obj->task_status = "NA";
            $at_data['Task Status'] = array($at_old_dm->task_status, "NA", "NA");
        }

        //Is CC Required
        ($udev_cc === "yes") ? ($udm_master_obj->is_cc_required = $udev_cc and $at_data['Is Change Control Required'] = array($at_old_dm->is_cc_required, $udev_cc, $udev_cc)) : false;

        //Completed  Date
        ($udev_completed_date) ? ($udm_master_obj->completed_date = $udev_completed_date and $at_data['Completed Date'] = array("NA", $udev_completed_date, $udev_completed_date)) : false;

        //Task Qa Review
        ($task_close_out_review) ? ($udm_master_obj->task_qa_review = $task_close_out_review and $at_data['Task QA Review'] = array("NA", $task_close_out_review, $task_close_out_review)) : false;

        $udm_master_obj->modified_by = $usr_id;
        $udm_master_obj->modified_time = $date_time;
        if ($udm_master_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            //Devaition Sub Realted To
            if ($udev_related_to) {
                //Old values
                $old_related_to = $this->get_dms_sub_related_to_details($dm_object_id);
                for ($i = 0; $i < count($old_related_to); $i++) {
                    $dev_related_to_at_old .= "\n\t\t\t" . getDevRelatedToType($old_related_to[$i]['related_to']) . " - " . $old_related_to[$i]['sub_type'];
                }
                //Delete Old realted To
                if ($this->delete_dev_related_to($dm_object_id)) {
                    //Insert New Related To
                    for ($i = 0; $i < count($udev_related_to); $i++) {
                        $dev_related_to_id = explode("-", $udev_related_to[$i]);
                        $related_to_id = get_object_id("definitions->object_id->workflow->dms->dms_related_to_details");

                        $dm_rel_to_obj = new DB_Public_lm_dm_related_to_details();
                        $dm_rel_to_obj->object_id = $related_to_id;
                        $dm_rel_to_obj->dm_object_id = $dm_object_id;
                        $dm_rel_to_obj->dev_related_to_id = $dev_related_to_id[0];
                        $dm_rel_to_obj->dm_sub_related_to_id = $dev_related_to_id[1];

                        $dev_related_to = getDevRelatedToType($dev_related_to_id[0]);
                        $dev_sub_related_to = getDevSubRelatedToType($dev_related_to_id[1]);

                        $dev_related_to_at_new .= "\n\t\t\t$dev_related_to - $dev_sub_related_to";
                        $dev_related_to_at_p .= "\n\t\t\t{$dev_related_to_id[0]} - {$dev_related_to} : {$dev_related_to_id[1]} - {$dev_sub_related_to}";
                        if (!($dm_rel_to_obj->insert())) {
                            return false;
                        }
                    }
                }
                $at_data['Devation Related To'] = array($dev_related_to_at_old . "\n", $dev_related_to_at_new . "\n", $dev_related_to_at_p);
            }
            //If Repetitive dms 
            //Old values
            if ($udev_repetitive_dms_no) {
                $repetitive_dms_at_old = '';
                $repetitive_dms_at_new = 'NA';
                $repetitive_dms_at_p = '';

                $old_repetitive_dms = $this->get_repetitive_dms_details($dm_object_id);
                for ($i = 0; $i < count($old_repetitive_dms); $i++) {
                    $repetitive_dms_at_old .= "\n\t\t\t" . $old_repetitive_dms[$i]['repetitive_dm_no'];
                }
                //Delete Old repetitive_dms
                if ($this->delete_repetitive_dms($dm_object_id)) {
                    //Insert New Repetitive Dms
                    if ($udev_repetitive_dms_no[0] != "NA") {
                        $repetitive_dms_at_new = '';
                        for ($i = 0; $i < count($udev_repetitive_dms_no); $i++) {
                            if ($udev_repetitive_dms_no[$i] != "NA") {
                                $repetitive_id = get_object_id("definitions->object_id->workflow->dms->repetitive_dms_details");

                                $arepetitive_dms_obj = new DB_Public_lm_dm_repetitive_details();
                                $arepetitive_dms_obj->object_id = $repetitive_id;
                                $arepetitive_dms_obj->dm_object_id = $dm_object_id;
                                $arepetitive_dms_obj->repetitive_dm_object_id = $udev_repetitive_dms_no[$i];
                                $arepetitive_dms_obj->created_by = $usr_id;
                                $arepetitive_dms_obj->created_time = $date_time;

                                $repetitive_no = get_qms_doc_no('dms', $udev_repetitive_dms_no[$i])['doc_no'];

                                $repetitive_dms_at_new .= "\n\t\t\t$repetitive_no";
                                $repetitive_dms_at_p .= "\n\t\t\t{$udev_repetitive_dms_no[$i]} - {$repetitive_no}";
                                if (!($arepetitive_dms_obj->insert())) {
                                    return false;
                                }
                            }
                        }
                    }
                }
                $at_data['Repetitive DMS'] = array($repetitive_dms_at_old, $repetitive_dms_at_new, $repetitive_dms_at_p);
            }
            addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function add_attachments_dms($dm_object_id, $type, $usr_id, $date_time, $refrence_object_id = null) {
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

            $file_id = get_object_id("definitions->object_id->workflow->dms->file_upload");

            $file = new DB_Public_file();
            $file->object_id = $file_id;
            $file->type = $file_type;
            $file->name = $file_name;
            $file->size = $file_size;
            $file->hash = $hash . "." . $extension;
            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
            $file->insert();

            $doc_file = new DB_Public_lm_dm_doc_file();
            $doc_file->file_id = $file_id;
            $doc_file->object_id = $dm_object_id;
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
                addAuditTrailLog($dm_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                return true;
            }
            return false;
        }
    }

    function get_dev_related_to_list_for_edit($dm_object_id) {
        $dev_type_master_list = getDevRelatedToMasterDetails(null, null, 'yes');

        for ($i = 0; $i < count($dev_type_master_list); $i++) {
            $sub_related_to_details = [];
            $sub_related = $dev_type_master_list[$i]['sub_realted_details'];
            for ($j = 0; $j < count($sub_related); $j++) {
                $is_exist = $this->isDevRelatedSubDevRelatedExist($dm_object_id, $dev_type_master_list[$i]['object_id'], $sub_related[$j]['object_id']);
                $sub_related_to_details[] = array('sub_related_to_id' => $sub_related[$j]['object_id'], 'sub_related_to' => $sub_related[$j]['sub_type'], 'desc' => $sub_related[$j]['desc'], 'is_sub_related_exist' => $is_exist);
            }
            $dev_realted_sub_related_detais[] = array("dev_realted_to_id" => $dev_type_master_list[$i]['object_id'], 'dev_realted_to' => $dev_type_master_list[$i]['related_to'], 'desc' => $dev_type_master_list[$i]['desc'], 'sub_related_to_details' => $sub_related_to_details);
        }
        return $dev_realted_sub_related_detais;
    }

    function get_dev_repetitive_dms_for_edit($dm_object_id) {
        $dms_no_list = get_qms_doc_no_list('dms');

        for ($i = 0; $i < count($dms_no_list); $i++) {
            $is_exist = $this->isDevRepetitiveDmsExist($dm_object_id, $dms_no_list[$i]['drop_down_value']);
            $repetitive_dms_details[] = array('drop_down_option' => $dms_no_list[$i]['drop_down_option'], 'drop_down_value' => $dms_no_list[$i]['drop_down_value'], 'is_exist' => $is_exist);
        }
        return $repetitive_dms_details;
    }

    function isDevRelatedSubDevRelatedExist($dm_object_id, $dev_realted_id, $dev_sub_related_id) {
        $obj = new DB_Public_lm_dm_related_to_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(dm_object_id) = lower('$dm_object_id') and lower(dev_related_to_id) = lower('$dev_realted_id') and lower(dm_sub_related_to_id) = lower('$dev_sub_related_id')");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function isDevRepetitiveDmsExist($dm_object_id, $repetitive_dm_object_id) {
        $obj = new DB_Public_lm_dm_repetitive_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(dm_object_id) = lower('$dm_object_id') and lower(repetitive_dm_object_id) = lower('$repetitive_dm_object_id') ");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function delete_dev_related_to($dm_object_id) {
        $realted_to_obj = new DB_Public_lm_dm_related_to_details();
        $realted_to_obj->whereAdd("dm_object_id='$dm_object_id'");
        $realted_to_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function delete_repetitive_dms($dm_object_id) {
        $obj = new DB_Public_lm_dm_repetitive_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function is_all_fields_in_edit_tab_completed_dev($dm_object_id) {
        $dm_master_obj = new DB_Public_lm_dm_master();
        $dm_master_obj->get("dm_object_id", $dm_object_id);
        if (($dm_master_obj->description != '') && ($dm_master_obj->immed_action_taken != '') && ($dm_master_obj->risk_impact_assessment != '')) {
            return true;
        }
        return false;
    }

    function update_dev_wf_status($dm_object_id, $status) {
        $dm_status_obj = new DB_Public_lm_dm_master();
        $dm_status_obj->get("dm_object_id", $dm_object_id);
        $dm_status_obj->wf_status = $status;
        $dm_status_obj->update();
        return true;
    }

    function update_dev_status($dm_object_id, $status) {
        $dm_status_obj = new DB_Public_lm_dm_master();
        $dm_status_obj->get("dm_object_id", $dm_object_id);
        $dm_status_obj->status = $status;
        $dm_status_obj->update();
        return true;
    }

    function update_dev_approval_status($dm_object_id, $status) {
        $dm_status_obj = new DB_Public_lm_dm_master();
        $dm_status_obj->get("dm_object_id", $dm_object_id);
        $dm_status_obj->approval_status = $status;
        $dm_status_obj->update();
        return true;
    }

    function get_dev_wf_status($dm_object_id) {
        $obj = new DB_Public_lm_dm_master();
        $obj->get("dm_object_id", $dm_object_id);
        return $obj->wf_status;
    }

    function get_dms_related_to_details($dm_object_id) {
        $gdm_rel_to_obj = new DB_Public_lm_dm_related_to_details();
        $gdm_rel_to_obj->whereAdd("dm_object_id='$dm_object_id'");
        //$gdm_rel_to_obj->query('DISTINCT dev_related_to_id');
        $gdm_rel_to_obj->selectAdd();
        $gdm_rel_to_obj->selectAdd("dev_related_to_id,dm_object_id");
        $gdm_rel_to_obj->groupBy('dev_related_to_id,dm_object_id');
        $gdm_rel_to_obj->find();
        $count = 1;
        while ($gdm_rel_to_obj->fetch()) {
            $deviation_rel_to_array[] = array(
                'object_id' => $gdm_rel_to_obj->object_id,
                'dm_object_id' => $gdm_rel_to_obj->dm_object_id,
                'dev_related_to_id' => $gdm_rel_to_obj->dev_related_to_id,
                'dev_related_to' => getDevRelatedToType($gdm_rel_to_obj->dev_related_to_id),
                'dev_sub_related_to_id' => $gdm_rel_to_obj->dm_sub_related_to_id,
                'dev_sub_related_to' => $this->get_dms_sub_related_to_details($gdm_rel_to_obj->dm_object_id, $gdm_rel_to_obj->dev_related_to_id),
                'count' => $count,
            );
            $count++;
        }
        return $deviation_rel_to_array;
    }

    function get_dms_sub_related_to_details($dm_object_id = null, $related_to_id = null, $sub_related_to_id = null) {
        $dm_related_to_obj = new DB_Public_lm_dm_related_to_details();
        if ($dm_object_id) {
            $dm_related_to_obj->whereAdd("dm_object_id='$dm_object_id'");
        }
        if ($related_to_id) {
            $dm_related_to_obj->whereAdd("dev_related_to_id='$related_to_id'");
        }
        if ($sub_related_to_id) {
            $dm_related_to_obj->whereAdd("dm_sub_related_to_id='$sub_related_to_id'");
        }
        $dm_related_to_obj->find();
        while ($dm_related_to_obj->fetch()) {
            $sub_rel_to_array[] = array(
                'related_to' => $dm_related_to_obj->dev_related_to_id,
                'sub_type' => getDevSubRelatedToType($dm_related_to_obj->dm_sub_related_to_id),
                'sub_type_id' => $dm_related_to_obj->dm_sub_related_to_id,
                'desc' => getDevSubRelatedToDesc($dm_related_to_obj->dm_sub_related_to_id)
            );
        }
        return $sub_rel_to_array;
    }

    function get_dms_details($data = null) {
        $obj = new DB_Public_lm_dm_master();
        if ($data) {
            extract($data);
            ($dm_object_id) ? $obj->whereAdd("dm_object_id='$dm_object_id'") : null;
            ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
            ($dept) ? $obj->whereAdd("dm_department='$dept'") : null;
            ($created_by) ? $obj->whereAdd("created_by='$created_by'") : null;
            ($start_date) ? $obj->whereAdd("reporting_date>='$start_date'") : null;
            ($end_date) ? $obj->whereAdd("reporting_date<='$end_date'") : null;
            ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
            ($mat_type) ? $obj->whereAdd("material_type_id='$mat_type'") : null;
            ($pro_name) ? $obj->whereAdd("product_id='$pro_name'") : null;
            ($dm_no) ? $obj->whereAdd("dm_no like '%$dm_no%'") : null;
            ($appr_status) ? $obj->whereAdd("approval_status='$appr_status'") : null;
            ($pro_stage) ? $obj->whereAdd("process_stage_id='$pro_stage'") : null;
            ($classification) ? $obj->whereAdd("classification='$classification'") : null;
            ($dm_type) ? $obj->whereAdd("dm_type_id='$dm_type'") : null;
            ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
            ($status) ? $obj->whereAdd("status='$status'") : null;
        }
        $count = 1;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {

                $dms_list[] = array(
                    'dm_object_id' => $obj->dm_object_id,
                    'lm_doc_id' => $obj->lm_doc_id,
                    'lm_doc_name' => getLmDocName($obj->lm_doc_id),
                    'lm_doc_short_name' => getLmDocShortName($obj->lm_doc_id),
                    'dm_department' => $obj->dm_department,
                    'dm_department_name' => getDepartment($obj->dm_department),
                    'dm_no' => $obj->dm_no,
                    'batch_no' => display_hypen_if_null($obj->batch_no),
                    'date_of_occurrence' => display_date_format($obj->date_of_occurrence),
                    'time_of_occurrence' => $obj->time_of_occurrence,
                    'date_of_discovery' => display_date_format($obj->date_of_discovery),
                    'time_of_discovery' => $obj->time_of_discovery,
                    'description' => $obj->description,
                    'immed_action_taken' => $obj->immed_action_taken,
                    'risk_impact_assessment' => $obj->risk_impact_assessment,
                    'process_stage_id' => $obj->process_stage_id,
                    'process_stage_name' => display_hypen_if_null(getProcessStage($obj->process_stage_id)),
                    'market_name' => display_hypen_if_null(getMarketName($obj->scope)),
                    'classification' => $obj->classification,
                    'classification_name' => getClassificationName($obj->classification),
                    'approval_status' => $obj->approval_status,
                    'status' => $obj->status,
                    'wf_status' => $obj->wf_status,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => display_datetime_format($obj->created_time),
                    'modified_by' => $obj->modified_by,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_time' => $obj->modified_time,
                    'rejected_reason' => display_hypen_if_null($obj->rejected_reason),
                    'is_meeting_required' => $obj->is_meeting_required,
                    'is_capa_required' => $obj->is_capa_required,
                    'is_cc_required' => $obj->is_cc_required,
                    'reporting_date' => display_date_format($obj->reporting_date),
                    'reporting_time' => $obj->reporting_time,
                    'manu_date' => display_hypen_if_null($obj->manu_date),
                    'manu_expiry_date' => display_hypen_if_null($obj->manu_expiry_date),
                    'customer_id' => $obj->customer,
                    'customer_name' => display_hypen_if_null(getCustomerName($obj->customer)),
                    'product_id' => $obj->product_id,
                    'product_name' => display_hypen_if_null(getProductName($obj->product_id)),
                    'target_date' => display_hypen_if_null(display_date_format($obj->target_date)),
                    'completed_date' => display_hypen_if_null(display_datetime_format($obj->completed_date)),
                    'target_date1' => $obj->target_date,
                    'close_out_comments' => display_hypen_if_null($obj->close_out_comments),
                    'plant_id' => $obj->plant_id,
                    'plant_name' => getPlantName($obj->plant_id),
                    'lot_no' => display_hypen_if_null($obj->lot_no),
                    'batch_size' => display_hypen_if_null($obj->batch_size),
                    'material_type_id' => $obj->material_type_id,
                    'material_type_name' => display_hypen_if_null(getMaterialType($obj->material_type_id)),
                    'material_name' => display_hypen_if_null($obj->material_name),
                    'close_out_date' => display_hypen_if_null(display_datetime_format($obj->close_out_date)),
                    'dm_type_id' => $obj->dm_type_id,
                    'dm_type_name' => getDevTypeName($obj->dm_type_id),
                    'is_task_required' => $obj->is_task_required,
                    'is_training_required' => $obj->is_training_required,
                    'is_online_exam_required' => $obj->is_online_exam_required,
                    'is_investigation_required' => $obj->is_investigation_required,
                    'meeting_target_date' => display_date_format($obj->meeting_target_date),
                    'training_target_date' => display_date_format($obj->training_target_date),
                    'exam_target_date' => display_date_format($obj->exam_target_date),
                    'task_target_date' => display_date_format($obj->task_target_date),
                    'meeting_status' => $obj->meeting_status,
                    'training_status' => $obj->training_status,
                    'exam_status' => $obj->exam_status,
                    'task_status' => $obj->task_status,
                    'task_qa_review' => $obj->task_qa_review,
                    'doc_link' => get_qms_doc_no("dms", $obj->dm_object_id)["doc_link"],
                    'count' => $count,
                );
                $count++;
            }
            return $dms_list;
        }
        return null;
    }

    function add_dms_review_comments($dm_object_id, $review_comments, $usr_id, $date_time, $audit_trail_action, $review_stage) {
        $id = get_object_id("definitions->object_id->workflow->dms->review_comments");

        $dm_rev_comments_obj = new DB_Public_lm_dm_review_comments();
        $dm_rev_comments_obj->object_id = $id;
        $dm_rev_comments_obj->dm_object_id = $dm_object_id;
        $dm_rev_comments_obj->remarks = $review_comments;
        $dm_rev_comments_obj->review_stage = $review_stage;
        $dm_rev_comments_obj->created_by = $usr_id;
        $dm_rev_comments_obj->created_time = $date_time;
        if ($dm_rev_comments_obj->insert()) {
            //Audit Trail
            $commented_by = getFullName($usr_id);
            $at_data['Comments'] = array('NA', $review_comments, $review_comments);
            $at_data['Given By'] = array('NA', $commented_by, "$usr_id - $commented_by");
            addAuditTrailLog($dm_object_id, null, $at_data, $audit_trail_action, 'Successfully Updated');
            return true;
        }
        return false;
    }

    function get_repetitive_dms_details($dm_object_id) {
        $obj = new DB_Public_lm_dm_repetitive_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $repetitive_dm_no = get_qms_doc_no('dms', $obj->repetitive_dm_object_id)['doc_no'];
                $repetitive_dm_no_link = "<a href=index.php?module=dms&action=view_dms&object_id=$obj->repetitive_dm_object_id target='_blank'>$repetitive_dm_no</a>";
                $list[] = array(
                    'object_id' => $obj->object_id,
                    'dm_no' => get_qms_doc_no('dms', $obj->dm_object_id)['doc_no'],
                    'repetitive_dm_no' => $repetitive_dm_no,
                    'repetitive_dm_no_link' => $repetitive_dm_no_link,
                    'created_by' => getFullName($obj->created_by),
                    'created_time' => $obj->created_time,
                    'count' => $count
                );
                $count++;
            }
            return $list;
        }
        return null;
    }

    function add_dms_investigation_details($dm_object_id, $responsible_person, $investigation_details, $invest_target_date, $reason, $previous_status, $usr_id, $date_time) {
        $id = get_object_id("definitions->object_id->workflow->dms->investigation");
        $iteration = $this->get_dms_investigation_iteration($dm_object_id);

        if ($previous_status) {
            $udm_investigation_obj = new DB_Public_lm_dm_investigation_details();
            $udm_investigation_obj->whereAdd("dm_object_id='$dm_object_id'");
            $udm_investigation_obj->whereAdd("is_latest='yes'");
            $udm_investigation_obj->status = $previous_status;
            $udm_investigation_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }

        $udm_investigation_obj = new DB_Public_lm_dm_investigation_details();
        $udm_investigation_obj->whereAdd("dm_object_id='$dm_object_id'");
        $udm_investigation_obj->is_latest = 'no';
        $udm_investigation_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

        $adm_investigation_obj = new DB_Public_lm_dm_investigation_details();
        $adm_investigation_obj->object_id = $id;
        $adm_investigation_obj->dm_object_id = $dm_object_id;
        $adm_investigation_obj->responsible_person = $responsible_person;
        $adm_investigation_obj->target_date = $invest_target_date;
        $adm_investigation_obj->assigned_by = $usr_id;
        $adm_investigation_obj->assigned_date = $date_time;
        $adm_investigation_obj->completion_date = null;
        $adm_investigation_obj->investigation_details = $investigation_details;
        $adm_investigation_obj->investigation_feedback = NULL;
        $adm_investigation_obj->root_cause = NULL;
        $adm_investigation_obj->iteration = $iteration;
        $adm_investigation_obj->is_latest = 'yes';
        $adm_investigation_obj->status = 'Pending';
        $adm_investigation_obj->dept_head_review = null;
        $adm_investigation_obj->dept_head_review_date = null;
        $adm_investigation_obj->qa_reviewer_review = null;
        $adm_investigation_obj->qa_reviewer_review_date = null;
        $adm_investigation_obj->recall_reason = $reason;
        if ($adm_investigation_obj->insert()) {
            return true;
        }
        return false;
    }

    function get_dms_investigation_iteration($dm_object_id) {
        $iteration = 1;
        $adm_investigation_obj = new DB_Public_lm_dm_investigation_details();
        $adm_investigation_obj->whereAdd("dm_object_id='$dm_object_id'");
        $adm_investigation_obj->whereAdd("is_latest='yes'");
        if ($adm_investigation_obj->find()) {
            while ($adm_investigation_obj->fetch()) {
                $iteration = $adm_investigation_obj->iteration + 1;
            }
        }
        return $iteration;
    }

    function get_investigation_details($dm_object_id, $is_latest = null, $resp_person = null) {
        $obj = new DB_Public_lm_dm_investigation_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        if ($is_latest) {
            $obj->whereAdd("is_latest='$is_latest'");
        }
        if ($resp_person) {
            $obj->whereAdd("responsible_person='$resp_person'");
        }
        $obj->orderBy('assigned_date');
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $completion_date = ($obj->completion_date) ? get_modified_date_format($obj->completion_date) : null;
                $target_date = ($obj->target_date) ? get_modified_date_format($obj->target_date) : null;
                $investigation_details_list[] = array(
                    'object_id' => $obj->object_id,
                    'dm_object_id' => $obj->dm_object_id,
                    'investigation_details' => $obj->investigation_details,
                    'assigned_by' => getFullName($obj->assigned_by),
                    'assigned_date' => $obj->assigned_date,
                    'target_date' => $target_date,
                    'target_date1' => $obj->target_date,
                    'completion_date' => $completion_date,
                    'is_latest' => $obj->is_latest,
                    'iteration' => $obj->iteration,
                    'status' => $obj->status,
                    'investigated_by' => getFullName($obj->responsible_person),
                    'investigated_by_id' => $obj->responsible_person,
                    'investigator_plant' => getPlantName(getUserPlantId($obj->responsible_person)),
                    'investigator_dept' => getDeptName($obj->responsible_person),
                    'dept_head_review' => $obj->dept_head_review,
                    'dept_head_review_date' => $obj->dept_head_review_date,
                    'dept_head_name' => getFullName($obj->dept_head_id),
                    'dept_head_dept' => getDeptName($obj->dept_head_id),
                    'qa_reviewer_review' => $obj->qa_reviewer_review,
                    'qa_reviewer_review_date' => $obj->qa_reviewer_review_date,
                    'qa_reviewer' => getFullName($obj->qa_reviewer_id),
                    'qa_reviewer_dept' => getDeptName($obj->qa_reviewer_id),
                    'investigator_feedback' => $obj->investigation_feedback,
                    'root_cause' => $obj->root_cause,
                    'recall_reason' => $obj->recall_reason,
                    'count' => $count
                );
                $count++;
            }
            return $investigation_details_list;
        }
        return null;
    }

    function update_dm_investigation_target_date($object_id, $proposed_target_date) {
        $u_obj = new DB_Public_lm_dm_investigation_details();
        $u_obj->whereAdd("object_id='$object_id'");
        $u_obj->target_date = $proposed_target_date;
        if ($u_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_dm_investigation_feedback($object_id, $feedback, $root_cause) {
        $u_obj = new DB_Public_lm_dm_investigation_details();
        $u_obj->whereAdd("object_id='$object_id'");
        $u_obj->investigation_feedback = $feedback;
        $u_obj->root_cause = $root_cause;
        if ($u_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_dm_investigation_dept_head_review($object_id, $review_comments, $usr_id, $date_time) {
        $u_obj = new DB_Public_lm_dm_investigation_details();
        $u_obj->whereAdd("object_id='$object_id'");
        $u_obj->dept_head_id = $usr_id;
        $u_obj->dept_head_review = $review_comments;
        $u_obj->dept_head_review_date = $date_time;
        $u_obj->status = "Completed";
        $u_obj->completion_date = $date_time;
        if ($u_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_dm_investigation_qa_review($object_id, $review_comments, $usr_id, $date_time) {
        $u_obj = new DB_Public_lm_dm_investigation_details();
        $u_obj->whereAdd("object_id='$object_id'");
        $u_obj->qa_reviewer_id = $usr_id;
        $u_obj->qa_reviewer_review = $review_comments;
        $u_obj->qa_reviewer_review_date = $date_time;
        if ($u_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function is_investigation_feedback_elegible_to_edit($dm_object_id, $usr_id) {
        $dm_wf_status = $this->get_dev_wf_status($dm_object_id);
        $today_date = date('Y-m-d');
        $target_date = array_shift($this->get_investigation_details($dm_object_id, 'yes'))['target_date1'];
        if ($today_date <= getModifiedDateTimeFormat($target_date, 'f1') && ($dm_wf_status == "Pending for Investigation" || $dm_wf_status == "Investigation Review Needs Correction") && (check_user_in_workflow($dm_object_id, $usr_id, "Pending", 'investigation') || check_user_in_workflow($dm_object_id, $usr_id, "Needs Correction", 'investigation'))) {
            return true;
        }
        return false;
    }

    function update_dms_closeout($dm_object_id, $wf_status, $status, $approval_status, $rejected_reason, $close_out_date) {
        $udm_master_obj = new DB_Public_lm_dm_master();
        $udm_master_obj->whereAdd("dm_object_id='$dm_object_id'");
        $udm_master_obj->wf_status = $wf_status;
        $udm_master_obj->status = $status;
        $udm_master_obj->approval_status = $approval_status;
        $udm_master_obj->rejected_reason = $rejected_reason;
        $udm_master_obj->close_out_date = $close_out_date;
        if ($udm_master_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function decide_meeting_training_task($dm_object_id, $creator, $approver, $mail_heading, $mail_link_btn) {
        $obj = new DB_Public_lm_dm_master();
        $obj->get("dm_object_id", $dm_object_id);

        $lm_doc_short_name = getLmDocShortName($obj->lm_doc_id);
        $is_meeting_required = $obj->is_meeting_required;
        $is_training_required = $obj->is_training_required;
        $is_task_required = $obj->is_task_required;
        $dm_no = $obj->dm_no;

        $meeting_status = $obj->meeting_status;
        $training_status = $obj->training_status;
        $task_status = $obj->task_status;

        if ($is_meeting_required == "yes" && $meeting_status == "Pending") {
            $dm_status = "Pending for Meeting Schedule";
            add_worklist($creator, $dm_object_id);
            save_workflow($dm_object_id, $creator, 'Pending', 'meeting');
        } elseif (($is_meeting_required == "no" || $meeting_status != "Pending") && ($is_training_required == "yes" && $training_status == "Pending")) {
            $dm_status = "Pending for Trainer Assignment";
            add_worklist($creator, $dm_object_id);
            save_workflow($dm_object_id, $creator, 'Pending', 'to_assign_trainer');
        } elseif (($is_meeting_required == "no" || $meeting_status != "Pending") && ($is_training_required == "no" || $training_status != "Pending") && ($is_task_required == "yes" && $task_status == "Pending")) {
            $dm_status = "Pending for Task Creation";
            add_worklist($creator, $dm_object_id);
            save_workflow($dm_object_id, $creator, 'Pending', 'to_assign_task');
        } elseif (($is_meeting_required == "no" || $meeting_status != "Pending") && ($is_training_required == "no" || $training_status != "Pending") && ($is_task_required == "no" && $task_status != "Pending")) {
            $dm_status = "Pending Close Out";
            add_worklist($approver, $dm_object_id);
            save_workflow($dm_object_id, $approver, 'Pending', 'close_out');
            $mail_send_to_approver = true;
        }
        $this->update_dev_wf_status($dm_object_id, $dm_status);

        //**** Send Mail**//
        $subject = "$lm_doc_short_name | $dm_no | $dm_status | [Action Required]";
        $actionDescription = "The $lm_doc_short_name is $dm_status";
        $mail_details = [
            "Deviation No." => $dm_no,
            "Status" => $dm_status,
            "Sent By" => $_SESSION['full_name']
        ];
        if ($mail_send_to_approver) {
            send_workflow_mail($approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
        } else {
            send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
        }
        return true;
    }

    function get_deviation_mgmt_review_comments($dm_object_id, $created_by = null, $review_stage = null) {
        $gdm_rev_comm_obj = new DB_Public_lm_dm_review_comments();
        $gdm_rev_comm_obj->whereAdd("dm_object_id='$dm_object_id'");
        (!empty($created_by)) ? $gdm_rev_comm_obj->whereAdd("created_by='$created_by'") : null;
        (!empty($review_stage)) ? $gdm_rev_comm_obj->whereAdd("review_stage='$review_stage'") : null;
        if ($gdm_rev_comm_obj->find()) {
            $count = 1;
            while ($gdm_rev_comm_obj->fetch()) {
                $gdm_rev_comm_array[] = array(
                    'object_id' => $gdm_rev_comm_obj->object_id,
                    'dm_object_id' => $gdm_rev_comm_obj->dm_object_id,
                    'user_name' => getFullName($gdm_rev_comm_obj->created_by),
                    'department' => getDeptName($gdm_rev_comm_obj->created_by),
                    "plant" => getPlantShortName(getUserPlantId($gdm_rev_comm_obj->created_by)),
                    'remarks' => trim($gdm_rev_comm_obj->remarks),
                    'review_stage' => $gdm_rev_comm_obj->review_stage,
                    'date_time' => display_datetime_format($gdm_rev_comm_obj->created_time),
                    'date' => get_modified_date_format($gdm_rev_comm_obj->created_time),
                    'count' => $count
                );
                $count++;
            }
            return $gdm_rev_comm_array;
        }
        return false;
    }

    function get_dev_cancelled_details($dm_object_id) {
        $cancel_obj = new DB_Public_lm_dm_cancel_details();
        $cancel_obj->whereAdd("dm_object_id='$dm_object_id'");
        if ($cancel_obj->find()) {
            while ($cancel_obj->fetch()) {
                $cancel_details[] = array(
                    'dm_object_id' => $cancel_obj->dm_object_id,
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

    function update_dms_meeting_training_exam_task_status($dm_object_id, $type, $status) {
        $obj = new DB_Public_lm_dm_master();
        $obj->whereAdd("dm_object_id='$dm_object_id'");

        ($type == "meeting") ? $obj->meeting_status = $status : false;
        ($type == "training") ? $obj->training_status = $status : false;
        ($type == "exam") ? $obj->exam_status = $status : false;
        ($type == "task") ? $obj->task_status = $status : false;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    //***Start Of Meeting Functions ***//
    function show_dms_extension_btn_for($dm_object_id) {
        $obj = new DB_Public_lm_dm_master();
        $obj->get("dm_object_id", $dm_object_id);
        if ($obj->target_date) {
            if (($obj->is_meeting_required === "yes" && $obj->meeting_status === "Pending")) {
                return "show_meeting_ext_btn";
            }
            if (($obj->is_training_required === "yes" && $obj->training_status === "Pending") && ($obj->meeting_status === "Completed" || $obj->is_meeting_required === "no")) {
                return "show_training_ext_btn";
            }
            if ($obj->is_online_exam_required === "yes" && $obj->exam_status === "Pending" && $obj->training_status === "Completed") {
                return "show_exam_ext_btn";
            }
            if (($obj->is_task_required === "yes" && $obj->task_status === "Pending") && ($obj->meeting_status === "Completed" || $obj->is_meeting_required === "no") && ($obj->training_status === "Completed" || $obj->is_training_required === "no") && ($obj->exam_status === "Completed" || $obj->is_online_exam_required === "no")) {
                return "show_task_ext_btn";
            }
            if (($obj->is_meeting_required === "no" || $obj->meeting_status === "Completed") && ($obj->is_training_required === "no" || $obj->training_status === "Completed") && ($obj->is_online_exam_required === "no" || $obj->exam_status === "Completed") && ($obj->is_task_required === "no" || $obj->task_status === "Completed")) {
                return "show_closeout_ext_btn";
            }
        }
    }

    function add_dms_meeting_schedule($dm_object_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $participants, $meeting_agenda, $usr_id, $date_time) {
        $meeting_sched_id = get_object_id("definitions->object_id->meeting->dms->meeting_schedule");

        $obj = new DB_Public_lm_dm_meeting_schedule();
        $obj->object_id = $meeting_sched_id;
        $obj->dm_object_id = $dm_object_id;
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
            addAuditTrailLog($dm_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');

            $this->add_dms_meeting_participants_details($participants, $dm_object_id, $meeting_sched_id, null, $usr_id, $date_time);

            //Meeting Agenda
            for ($i = 0; $i < count($meeting_agenda); $i++) {
                $object_id = $object_id = get_object_id("definitions->object_id->meeting->dms->meeting_agenda");

                $obj = new DB_Public_lm_dm_meeting_agenda_details();
                $obj->object_id = $object_id;
                $obj->dm_object_id = $dm_object_id;
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

    function update_dms_meeting_schedule($dm_object_id, $meeting_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $reason, $usr_id, $date_time) {
        //old_obj
        $old_obj = new DB_Public_lm_dm_meeting_schedule();
        $old_obj->get("object_id", $meeting_id);

        //update_obj
        $u_obj = new DB_Public_lm_dm_meeting_schedule();
        $u_obj->whereAdd("object_id='$meeting_id'");
        $u_obj->whereAdd("dm_object_id='$dm_object_id'");
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
            addAuditTrailLog($dm_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Successfully Updated');
            return true;
        } else {
            return false;
        }
    }

    function get_dms_meeting_details($dm_object_id = null, $meeting_id = null, $is_latest = 'yes') {
        $obj = new DB_Public_lm_dm_meeting_schedule();
        ($dm_object_id) ? $obj->whereAdd("dm_object_id='$dm_object_id'") : false;
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
                    'dm_object_id' => $obj->dm_object_id,
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

    function update_dms_meeting_conclusion($dm_object_id, $meeting_id, $meeting_agenda_id, $meeting_conclusion, $date_time) {
        for ($i = 0; $i < count($meeting_conclusion); $i++) {
            $obj = new DB_Public_lm_dm_meeting_agenda_details();
            $obj->whereAdd("dm_object_id='$dm_object_id'");
            $obj->whereAdd("object_id='$meeting_agenda_id[$i]'");
            $obj->whereAdd("meeting_object_id='$meeting_id'");
            $obj->conclusion = $meeting_conclusion[$i];
            $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $mobj = new DB_Public_lm_dm_meeting_schedule();
        $mobj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("object_id='$meeting_id'");
        $mobj->status = "Completed";
        $mobj->modified_time = $date_time;
        $mobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function add_dms_meeting_participants_details($participants, $dm_object_id, $meeting_sched_id, $reason, $usr_id, $date_time) {
        $old_participant = $this->get_dms_meeting_participant_details(null, $dm_object_id, null, null);
        if ($old_participant) {
            for ($i = 0; $i < count($old_participant); $i++) {
                $old_participant_at_old .= "\n\t\t\t" . $old_participant[$i]['participant'];
            }
        } else {
            $old_participant_at_old = "NA";
        }

        //Meeting Participants
        for ($i = 0; $i < count($participants); $i++) {
            $participant_id = get_object_id("definitions->object_id->meeting->dms->meeting_participant");
            $p_obj = new DB_Public_lm_dm_participant();
            $p_obj->object_id = $participant_id;
            $p_obj->dm_object_id = $dm_object_id;
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
        addAuditTrailLog($dm_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
    }

    function get_dms_meeting_participant_details($object_id = null, $dm_object_id = null, $participant_id = null, $meeting_sch_id = null) {
        $obj = new DB_Public_lm_dm_participant();
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($dm_object_id) ? $obj->whereAdd("dm_object_id='$dm_object_id'") : false;
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

    function get_dms_meeting_agenda_details($dm_object_id) {
        $obj = new DB_Public_lm_dm_meeting_agenda_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
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

    function add_dms_meeting_attendee_details($dm_object_id, $meeting_id, $attendees, $usr_id, $date_time) {
        $old_attendees = $this->get_dms_meeting_attendee_details($dm_object_id, null);
        if ($old_attendees) {
            for ($i = 0; $i < count($old_attendees); $i++) {
                $old_attendees_at_old .= "\n\t\t\t" . $old_attendees[$i]['attendee'];
            }
        } else {
            $old_attendees_at_old = "NA";
        }

        for ($i = 0; $i < count($attendees); $i++) {
            $att_id = get_object_id("definitions->object_id->meeting->dms->meeting_attendee");
            $attendee_obj = new DB_Public_lm_dm_meeting_attendence();
            $attendee_obj->object_id = $att_id;
            $attendee_obj->meeting_object_id = $meeting_id;
            $attendee_obj->dm_object_id = $dm_object_id;
            $attendee_obj->attendee_id = $attendees[$i];
            $attendee_obj->created_by = $usr_id;
            $attendee_obj->created_time = $date_time;

            $attendee_presesnt = $this->get_dms_meeting_attendee_details($dm_object_id, $attendees[$i]);
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
            addAuditTrailLog($dm_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Succesfully Added');
        }
        return true;
    }

    function get_dms_meeting_attendee_details($dm_object_id, $attendee_id = null) {
        $obj = new DB_Public_lm_dm_meeting_attendence();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
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

    function extend_dms_target_dates($dm_object_id, $extension_for, $proposed_date) {
        $dms_details = new DB_Public_lm_dm_master();
        $dms_details->get("dm_object_id", $dm_object_id);

        $uobj = new DB_Public_lm_dm_master();
        $uobj->whereAdd("dm_object_id='$dm_object_id'");
        if ($extension_for === "meeting") {
            if ($dms_details->is_meeting_required === "yes" && $dms_details->meeting_target_date && $dms_details->meeting_status == "Pending") {
                $pm_extended_days = dateDiffInDays($dms_details->meeting_target_date, $proposed_date);
                $p_meeting_date = $proposed_date;
                $at_data['Meeting Target Date'] = array($dms_details->meeting_target_date, $p_meeting_date, $p_meeting_date);
                $uobj->meeting_target_date = $p_meeting_date;
                if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "training")) {
                    $p_training_date = getModifiedDateFormat("Y-m-d", $dms_details->training_target_date, 0, 0, $pm_extended_days);
                    $uobj->training_target_date = $p_training_date;
                    $at_data['Training Target Date'] = array($dms_details->training_target_date, $p_training_date, $p_training_date);
                }
                if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "exam")) {
                    $p_exam_date = getModifiedDateFormat("Y-m-d", $dms_details->exam_target_date, 0, 0, $pm_extended_days);
                    $uobj->exam_target_date = $p_exam_date;
                    $at_data['Exam Target Date'] = array($dms_details->exam_target_date, $p_exam_date, $p_exam_date);
                }
                if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "task")) {
                    $p_task_date = getModifiedDateFormat("Y-m-d", $dms_details->task_target_date, 0, 0, $pm_extended_days);
                    $uobj->task_target_date = $p_task_date;
                    $at_data['Task Target Date'] = array($dms_details->task_target_date, $p_task_date, $p_task_date);
                }
                $p_close_out_date = getModifiedDateFormat("Y-m-d", $dms_details->target_date, 0, 0, $pm_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($dms_details->target_date, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($dm_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "training") {
            if ($dms_details->is_training_required === "yes" && $dms_details->training_target_date && $dms_details->training_status == "Pending") {
                $pt_extended_days = dateDiffInDays($dms_details->training_target_date, $proposed_date);
                $p_training_date = $proposed_date;
                $at_data['Training Target Date'] = array($dms_details->training_target_date, $p_training_date, $p_training_date);
                $uobj->training_target_date = $p_training_date;
                if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "exam")) {
                    $p_exam_date = getModifiedDateFormat("Y-m-d", $dms_details->exam_target_date, 0, 0, $pt_extended_days);
                    $uobj->exam_target_date = $p_exam_date;
                    $at_data['Exam Target Date'] = array($dms_details->exam_target_date, $p_exam_date, $p_exam_date);
                }
                if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "task")) {
                    $p_task_date = getModifiedDateFormat("Y-m-d", $dms_details->task_target_date, 0, 0, $pt_extended_days);
                    $uobj->task_target_date = $p_task_date;
                    $at_data['Task Target Date'] = array($dms_details->task_target_date, $p_task_date, $p_task_date);
                }
                $p_close_out_date = getModifiedDateFormat("Y-m-d", $dms_details->target_date1, 0, 0, $pt_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($dms_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($dm_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "exam") {
            if ($dms_details->is_online_exam_required === "yes" && $dms_details->exam_target_date && $dms_details->exam_status == "Pending") {
                $pe_extended_days = dateDiffInDays($dms_details->exam_target_date, $proposed_date);
                $p_exam_date = $proposed_date;
                $at_data['Exam Target Date'] = array($dms_details->exam_target_date, $p_exam_date, $p_exam_date);
                $uobj->exam_target_date = $p_exam_date;
                if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "task")) {
                    $p_task_date = getModifiedDateFormat("Y-m-d", $dms_details->task_target_date, 0, 0, $pe_extended_days);
                    $uobj->task_target_date = $p_task_date;
                    $at_data['Task Target Date'] = array($dms_details->task_target_date, $p_task_date, $p_task_date);
                }
                $p_close_out_date = getModifiedDateFormat("Y-m-d", $dms_details->target_date1, 0, 0, $pe_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($dms_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($dm_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "task") {
            if ($dms_details->is_task_required === "yes" && $dms_details->task_target_date && $dms_details->task_status == "Pending") {
                $pta_extended_days = dateDiffInDays($dms_details->task_target_date, $proposed_date);
                $task_target_date = $proposed_date;
                $uobj->task_target_date = $task_target_date;
                $at_data['Task Target Date'] = array($dms_details->task_target_date, $task_target_date, $task_target_date);

                $p_close_out_date = getModifiedDateFormat("Y-m-d", $dms_details->target_date1, 0, 0, $pta_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($dms_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($dm_object_id, null, $at_data, "Extension", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "close_out") {
            $target_date = $proposed_date;
            $uobj->target_date = $target_date;
            if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_data['Close-out Target Date'] = array($dms_details->target_date1, $target_date, $target_date);
                addAuditTrailLog($dm_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
                return true;
            }
            return false;
        }
    }

    function show_extended_dms_target_date_details($dm_object_id, $extension_for, $proposed_date) {
        $obj = new DB_Public_lm_dm_master();
        $obj->get("dm_object_id", $dm_object_id);
        $p_extended_days = '';
        if ($extension_for === "meeting") {
            $p_extended_days = dateDiffInDays($obj->meeting_target_date, $proposed_date);
            $date_obj->date1['name'] = "Meeting";
            $date_obj->date1['from'] = get_modified_date_format($obj->meeting_target_date);
            $date_obj->date1['to'] = get_modified_date_format($proposed_date);
            if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "training")) {
                $date_obj->date2['name'] = "Training";
                $date_obj->date2['from'] = get_modified_date_format($obj->training_target_date);
                $date_obj->date2['to'] = getModifiedDateFormat("d/m/Y", $obj->training_target_date, 0, 0, $p_extended_days);
            }
            if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "training")) {
                $date_obj->date3['name'] = "Exam";
                $date_obj->date3['from'] = get_modified_date_format($obj->exam_target_date);
                $date_obj->date3['to'] = getModifiedDateFormat("d/m/Y", $obj->exam_target_date, 0, 0, $p_extended_days);
            }
            if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "task")) {
                $date_obj->date4['name'] = "Task";
                $date_obj->date4['from'] = get_modified_date_format($obj->task_target_date);
                $date_obj->date4['to'] = getModifiedDateFormat("d/m/Y", $obj->task_target_date, 0, 0, $p_extended_days);
            }
        }
        if ($extension_for === "training") {
            $p_extended_days = dateDiffInDays($obj->training_target_date, $proposed_date);
            $date_obj->date1['name'] = "Training";
            $date_obj->date1['from'] = get_modified_date_format($obj->training_target_date);
            $date_obj->date1['to'] = get_modified_date_format($proposed_date);
            if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "exam")) {
                $date_obj->date2['name'] = "Exam";
                $date_obj->date2['from'] = get_modified_date_format($obj->exam_target_date);
                $date_obj->date2['to'] = getModifiedDateFormat("d/m/Y", $obj->exam_target_date, 0, 0, $p_extended_days);
            }
            if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "task")) {
                $date_obj->date3['name'] = "Task";
                $date_obj->date3['from'] = get_modified_date_format($obj->task_target_date);
                $date_obj->date3['to'] = getModifiedDateFormat("d/m/Y", $obj->task_target_date, 0, 0, $p_extended_days);
            }
        }
        if ($extension_for === "exam") {
            $p_extended_days = dateDiffInDays($obj->exam_target_date, $proposed_date);
            $date_obj->date1['name'] = "Exam";
            $date_obj->date1['from'] = get_modified_date_format($obj->exam_target_date);
            $date_obj->date1['to'] = get_modified_date_format($proposed_date);
            if ($this->is_dms_meeting_training_exam_task_required($dm_object_id, "task")) {
                $date_obj->date2['name'] = "Task";
                $date_obj->date2['from'] = get_modified_date_format($obj->task_target_date);
                $date_obj->date2['to'] = getModifiedDateFormat("d/m/Y", $obj->task_target_date, 0, 0, $p_extended_days);
            }
        }
        if ($extension_for === "task") {
            $p_extended_days = dateDiffInDays($obj->task_target_date, $proposed_date);
            $date_obj->date1['name'] = "Task";
            $date_obj->date1['from'] = get_modified_date_format($obj->task_target_date);
            $date_obj->date1['to'] = get_modified_date_format($proposed_date);
        }
        $date_obj->closeout['name'] = "Close Out";
        $date_obj->closeout['from'] = get_modified_date_format($obj->target_date);
        $date_obj->closeout['to'] = getModifiedDateFormat("d/m/Y", $obj->target_date, 0, 0, $p_extended_days);
        return $date_obj;
    }

    function is_dms_meeting_training_exam_task_required($dm_object_id, $type) {
        $obj = new DB_Public_lm_dm_master();
        if ($obj->get("dm_object_id", $dm_object_id)) {
            if ($type == "meeting" && $obj->is_meeting_required == "yes") {
                return true;
            }
            if ($type == "training" && $obj->is_training_required == "yes") {
                return true;
            }
            if ($type == "exam" && $obj->is_online_exam_required == "yes") {
                return true;
            }
            if ($type == "task" && $obj->is_task_required == "yes") {
                return true;
            }
        }
        return false;
    }

    //***End Of Meeting Functions ***//
    //***start Of Training Functions ***//

    function assign_dms_trainers($dm_object_id, $title, $trainers, $target_date, $usr_id, $date_time) {
        $training_dtls_n = $training_dtls_p = "";
        $i = 0;
        foreach ($trainers as $trainers_id) {
            $trainer_at_n = $trainer_at_p = "";
            //    $trainers_array = ($trainers_id) ? array_unique($trainers_id) : null;
            $trainers_array[] = $trainers_id;
            for ($j = 0; $j < count($trainers_array); $j++) {
                $object_id = get_object_id("definitions->object_id->training->dms->trainer");
                $obj = new DB_Public_lm_dm_trainer_details();
                $obj->object_id = $object_id;
                $obj->dm_object_id = $dm_object_id;
                $obj->trainer = $trainers_array[$j];
                $obj->title = $title[$i];
                $obj->status = "Pending";
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                $obj->modified_by = $usr_id;
                $obj->modified_time = $date_time;
                $obj->is_latest = "yes";
                if ($obj->insert()) {
                    add_worklist($trainers_array[$j], $dm_object_id);
                    save_workflow($dm_object_id, $trainers_array[$j], 'Pending', 'training');

                    //**** Audit Trail**//
                    $trainer_at_n .= "\n\t\t\t" . getFullName($trainers_array[$j]);
                    $trainer_at_p .= "\n\t\t\t" . $trainers_array[$j] . " - " . getFullName($trainers_array[$j]);
                } else {
                    return false;
                }
            }
            $training_dtls_n .= "\n\t Title : " . $title[$i] . " \n\t Trainers : " . $trainer_at_n;
            $training_dtls_p .= "\n\t Title : " . $title[$i] . " \n\t Trainers : " . $trainer_at_p;
            $i++;
        }
        $at_data["Target Date"] = array($target_date, $target_date, $target_date);
        $at_data["Training Details"] = array("NA", $training_dtls_n, $training_dtls_p);
        addAuditTrailLog($dm_object_id, null, $at_data, $_POST['audit_trail_action'], 'Trainer Assigned');
        return true;
    }

    function replace_dms_trainer_details($dms_object_id, $trainer, $replaced_by, $usr_id, $date_time) {
        $training_obj = new DB_Public_lm_dm_trainer_details();
        $training_obj->whereAdd("dm_object_id='$dms_object_id'");
        $training_obj->whereAdd("trainer='$trainer'");
        $training_obj->find();
        while ($training_obj->fetch()) {
            $sch_obj = new DB_Public_lm_dm_training_schedule();
            $sch_obj->whereAdd("dm_object_id='$dms_object_id'");
            $sch_obj->whereAdd("trainer_object_id='$training_obj->object_id'");
            $sch_obj->scheduled_by = $replaced_by;
            $sch_obj->modified_by = $usr_id;
            $sch_obj->modified_time = $date_time;
            $sch_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $utraining_obj = new DB_Public_lm_dm_trainer_details();
        $utraining_obj->whereAdd("dm_object_id='$dms_object_id'");
        $utraining_obj->whereAdd("trainer='$trainer'");
        $utraining_obj->trainer = $replaced_by;
        $utraining_obj->modified_by = $usr_id;
        $utraining_obj->modified_time = $date_time;
        $utraining_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_dms_training_details($dms_object_id, $training_object_id = null, $trainer_id = null, $status = null) {
        $obj = new DB_Public_lm_dm_trainer_details();
        $obj->whereAdd("dm_object_id='$dms_object_id'");
        ($training_object_id) ? $obj->whereAdd("object_id='$training_object_id'") : false;
        ($trainer_id) ? $obj->whereAdd("trainer='$trainer_id'") : false;
        ($status) ? $obj->whereAdd("status='$status'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $schedule_details = $this->get_dms_training_schedule_details($dms_object_id, null, $obj->object_id);
                $trainers_array[] = array(
                    'object_id' => $obj->object_id,
                    'dm_object_id' => $obj->dm_object_id,
                    'trainer' => $obj->trainer,
                    'trainer_name' => getFullName($obj->trainer),
                    'trainer_dept' => getDeptName($obj->trainer),
                    'status' => $obj->status,
                    'is_latest' => $obj->is_latest,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_by_id' => $obj->created_by,
                    'created_time' => $obj->created_time,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_by_id' => $obj->modified_by,
                    'modified_time' => $obj->modified_time,
                    'title' => $obj->title,
                    'schedule_details' => $schedule_details
                );
                $count++;
            }
            return $trainers_array;
        }
        return null;
    }

    function is_dms_elegible_for_training_schedule($dms_object_id, $trainer) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dms_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            return false;
        }
        return true;
    }

    function add_dms_training_schedule($dm_object_id, $trainer_object_id, $training_date, $training_time, $venue, $session, $training_link, $training_invitees, $usr_id, $date_time) {
        $training_dtls_n = $training_dtls_p = "";
        //$i=trainer wise assigned title by creator object_id ---( 1d_array eg : $trainer_object_id[0]=dms_training_sch:373665)
        for ($i = 0; $i < count($trainer_object_id); $i++) {
            //Add training Schedule details ---( 2d_array eg : $title[0][]=title1  )
            //$j=Training Title/remarks for each schedulue
            for ($j = 0; $j < count($session[$i]); $j++) {
                $object_id = get_object_id("definitions->object_id->training->dms->training_schedule");
                $obj = new DB_Public_lm_dm_training_schedule();
                $obj->object_id = $object_id;
                $obj->dm_object_id = $dm_object_id;
                $obj->trainer_object_id = $trainer_object_id[$i];
                $obj->training_date = $training_date[$i][$j];
                $obj->training_time = $training_time[$i][$j];
                $obj->venue = $venue[$i][$j];
                $obj->session = $session[$i][$j];
                $obj->training_link = $training_link[$i][$j];
                $obj->scheduled_by = $usr_id;
                $obj->created_time = $date_time;
                $obj->modified_by = $usr_id;
                $obj->modified_time = $date_time;
                $obj->status = "Pending";
                if ($obj->insert()) {
                    //Add Invites --- ( 3d_array with random index eg : $training_invitees=[dms_training_sch:373665][99][]   )
                    $invitees_at_n = $invitees_at_p = "";
                    $invitees_array = array_unique($training_invitees[$trainer_object_id[$i]][$j]);
                    if ($invitees_array) {
                        foreach ($invitees_array as $invitees_id) {
                            $invite_obj = new DB_Public_lm_dm_training_schedule_mail();
                            $invite_obj->dm_object_id = $dm_object_id;
                            $invite_obj->training_sch_id = $object_id;
                            $invite_obj->mail_send_to = $invitees_id;
                            $invite_obj->created_by = $usr_id;
                            $invite_obj->created_time = $date_time;
                            $invite_obj->modified_by = $usr_id;
                            $invite_obj->modified_time = $date_time;
                            if ($invite_obj->insert()) {
                                $invitees_at_n .= "\n\t\t\t" . getFullName($invitees_id);
                                $invitees_at_p .= "\n\t\t\t" . $invitees_id . " - " . getFullName($invitees_id);
                            }
                        }
                    }
                }
                $training_dtls_n .= "\n\t Training Date : " . $training_date[$i][$j] . " \n\t Session : " . $session[$i][$j] . " \n\t Time : " . $training_time[$i][$j] . " \n\t Venue : " . $venue[$i][$j] . " \n\t Link : " . $training_link[$i][$j] . " \n\t Invited Users : " . $invitees_at_n;
                $training_dtls_p .= "\n\t Training Date : " . $training_date[$i][$j] . " \n\t Session : " . $session[$i][$j] . " \n\t Time : " . $training_time[$i][$j] . " \n\t Venue : " . $venue[$i][$j] . " \n\t Link : " . $training_link[$i][$j] . " \n\t Invited Users : " . $invitees_at_p . " \n\t Trainer Object Id : " . $trainer_object_id[$i] . " \n\t Training Schedule Object Id : " . $object_id;
            }
        }
        $at_data['Training Schedule Details'] = array("NA", $training_dtls_n, $training_dtls_p);
        addAuditTrailLog($dm_object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfully Scheduled');
        return true;
    }

    function get_dms_training_schedule_details($dms_object_id, $object_id = null, $trainer_object_id = null, $scheduled_by = null, $status = null) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dms_object_id'");
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($trainer_object_id) ? $obj->whereAdd("trainer_object_id='$trainer_object_id'") : false;
        ($scheduled_by) ? $obj->whereAdd("scheduled_by='$scheduled_by'") : false;
        ($status) ? $obj->whereAdd("status='$status'") : false;
        $obj->orderBy('training_date,training_time');
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $participants = $this->get_dms_training_participants_details($dms_object_id, $obj->object_id);
                $attendees = $this->get_dms_training_attendee_details($dms_object_id, $obj->object_id, null);
                $training_sch_array[] = array(
                    'object_id' => $obj->object_id,
                    'dm_object_id' => $obj->dm_object_id,
                    'trainer_object_id' => $obj->trainer_object_id,
                    'training_date' => $obj->training_date,
                    'training_time' => $obj->training_time,
                    'venue' => $obj->venue,
                    'session' => $obj->session,
                    'status' => $obj->status,
                    'scheduled_by_name' => getFullName($obj->scheduled_by),
                    'scheduled_by_id' => $obj->scheduled_by,
                    'created_time' => $obj->created_time,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_by_id' => $obj->modified_by,
                    'modified_time' => $obj->modified_time,
                    'reason' => $obj->reason,
                    'training_link' => $obj->training_link,
                    "participants" => $participants,
                    'attendees' => $attendees
                );
                $count++;
            }
            return $training_sch_array;
        }
        return null;
    }

    function get_dms_training_participants_details($dm_object_id, $training_sch_id = null) {
        $obj = new DB_Public_lm_dm_training_schedule_mail();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        ($training_sch_id) ? $obj->whereAdd("training_sch_id='$training_sch_id'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $trainees[] = array(
                    'trainee_name' => getFullName($obj->mail_send_to),
                    'training_sch_id' => $obj->training_sch_id,
                    'trainee' => $obj->mail_send_to,
                    'trainee_dept' => getDeptName($obj->mail_send_to),
                    "trainee_plant" => getPlantShortName(getUserPlantId($obj->created_by)),
                    'created_by' => $obj->created_by,
                    'created_by_id' => $obj->created_by,
                    'created_time' => $obj->created_time,
                    'modified_by' => getFullName($obj->modified_by),
                    'modified_by_id' => $obj->modified_by,
                    'modified_time' => $obj->modified_time,
                    'drop_down_value' => $obj->mail_send_to,
                    'drop_down_option' => getFullName($obj->mail_send_to),
                    'count' => $count
                );
                $count++;
            }
            asort($trainees);
            return $trainees;
        }
        return null;
    }

    function get_dms_eligible_rescheduled_training_details($dm_object_id, $trainer, $date_time) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if ($this->is_dms_eligible_for_training_reschedule_by_schedule_id($dm_object_id, $obj->object_id, $date_time)) {
                    $trainees[] = array(
                        'object_id' => $obj->object_id,
                        'dm_object_id' => $obj->dm_object_id,
                        'trainer_object_id' => $obj->trainer_object_id,
                        'training_date' => $obj->training_date,
                        'training_time' => $obj->training_time,
                        'venue' => $obj->venue,
                        'session' => $obj->session,
                        'status' => $obj->status,
                        'scheduled_by_name' => getFullName($obj->scheduled_by),
                        'scheduled_by_id' => $obj->scheduled_by,
                        'created_time' => $obj->created_time,
                        'modified_by_name' => getFullName($obj->modified_by),
                        'modified_by_id' => $obj->modified_by,
                        'modified_time' => $obj->modified_time,
                        'reason' => $obj->reason,
                        'training_link' => $obj->training_link
                    );
                }
            }
            return $trainees;
        }
        return null;
    }

    function update_dms_training_reschedule_details($dm_object_id, $training_sch_id, $training_date, $training_time, $venue, $reason, $usr_id, $date_time) {
        $training_sch_o = $training_sch_n = $training_sch_p = "";
        for ($i = 0; $i < count($training_sch_id); $i++) {
            if ($this->is_dms_eligible_for_training_reschedule_by_schedule_id($dm_object_id, $training_sch_id[$i], $date_time)) {
                //old_obj
                $old_obj = new DB_Public_lm_dm_training_schedule();
                $old_obj->get("object_id", $training_sch_id[$i]);

                $obj = new DB_Public_lm_dm_training_schedule();
                $obj->whereAdd("dm_object_id='$dm_object_id'");
                $obj->whereAdd("object_id='$training_sch_id[$i]'");
                $obj->training_date = $training_date[$i];
                $obj->training_time = $training_time[$i];
                $obj->venue = $venue[$i];
                $obj->reason = $reason;
                $obj->modified_by = $usr_id;
                $obj->modified_time = $date_time;
                if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                    $training_sch_o .= "\n\t Training Date : " . $old_obj->training_date . " \n\t Time : " . $old_obj->training_time . " \n\t Venue : " . $old_obj->venue;
                    $training_sch_n .= "\n\t Training Date : " . $training_date[$i] . " \n\t Time : " . $training_time[$i] . " \n\t Venue : " . $venue[$i];
                    $training_sch_p .= "\n\t Training Date : " . $training_date[$i] . " \n\t Time : " . $training_time[$i] . " \n\t Venue : " . $venue[$i] . " \n\t Schedule Object Id : " . $training_sch_id[$i];
                }
            }
        }
        if ($training_sch_o) {
            $at_data[''] = array("Training Scheduled Details : $training_sch_o", "Training Rescheduled Details : $training_sch_n", $training_sch_p);
            $at_data['Reason'] = array("NA", $reason, $reason);
            addAuditTrailLog($dm_object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfully Rescheduled');
        }
        return true;
    }

    function is_dms_eligible_for_training_reschedule_by_trainer($dm_object_id, $trainer, $date_time) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                $training_date_time = $obj->training_date . " " . $obj->training_time;
                if (new DateTime($date_time) <= new DateTime(getModifiedDateTimeFormat($training_date_time, 'f2'))) {
                    return true;
                }
            }
        }
        return false;
    }

    function is_dms_eligible_for_training_reschedule_by_schedule_id($dm_object_id, $schedule_id, $date_time) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("object_id='$schedule_id'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                $training_date_time = $obj->training_date . " " . $obj->training_time;
                if (new DateTime($date_time) <= new DateTime(getModifiedDateTimeFormat($training_date_time, 'f2'))) {
                    return true;
                }
            }
        }
        return false;
    }

    function is_dms_elegible_for_update_training_details($dm_object_id, $trainer, $date_time) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                $training_date_time = $obj->training_date . " " . $obj->training_time;
                if (new DateTime($date_time) >= new DateTime(getModifiedDateTimeFormat($training_date_time, 'f2'))) {
                    return true;
                }
            }
        }
        return false;
    }

    function is_dms_elegible_for_training_completion($dm_object_id, $trainer) {
        $obj = new DB_Public_lm_dm_training_schedule();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if (empty($this->get_dms_training_attendee_details($dm_object_id, $obj->object_id, null))) {
                    return false;
                }
            }
        }
        return true;
    }

    function get_dms_elegible_training_details_for_update($dm_object_id, $trainer, $status, $date_time) {
        $training_details = $this->get_dms_training_details($dm_object_id, null, $trainer, $status);
        for ($i = 0; $i < count($training_details); $i++) {
            $schedule_details = $training_details[$i]['schedule_details'];
            $schedule_details_list = [];
            foreach ($schedule_details as $val) {
                if ($this->is_dms_eligible_for_training_reschedule_by_schedule_id($dm_object_id, $val['object_id'], $date_time) === false) {
                    $schedule_details_list[] = array('schedule_id' => $val['object_id'], 'session' => $val['session'], 'training_date' => $val['training_date'], 'training_time' => $val['training_time']);
                }
            }
            if ($schedule_details_list) {
                $elegible_training_details[] = array('title' => $training_details[$i]['title'], 'trainer_object_id' => $training_details[$i]['object_id'], 'schedule_details' => $schedule_details_list);
            }
        }
        return $elegible_training_details;
    }

    function get_dms_unique_attendess_details_for_attendence($dm_object_id, $schedule_id) {
        $training_details = $this->get_dms_training_schedule_details($dm_object_id, $schedule_id);
        $participants_array = array_shift(array_column($training_details, 'participants'));
        $attendees_array = array_shift(array_column($training_details, 'attendees'));

        $participants_details = array();
        for ($i = 0; $i < count($participants_array); $i++) {
            $participant_id = $participants_array[$i]['trainee'];
            $participant_name = $participants_array[$i]['trainee_name'];
            $participants_details[$participant_id] = $participant_name;
        }
        $attendees_details = array();
        for ($i = 0; $i < count($attendees_array); $i++) {
            $trainee_id = $attendees_array[$i]['trainee_id'];
            $trainee_name = $attendees_array[$i]['trainee_name'];
            $attendees_details[$trainee_id] = $trainee_name;
        }
        $unique_attendess = array_diff($participants_details, $attendees_details);
        foreach ($unique_attendess as $key => $val) {
            $unique_attendess_detrails[] = array('drop_down_value' => $key, 'drop_down_option' => $val);
        }
        return $unique_attendess_detrails;
    }

    function update_dms_training_attendee_details($dm_object_id, $training_sch_id, $attendees, $usr_id, $date_time) {
        if ($this->is_dms_eligible_for_training_reschedule_by_schedule_id($dm_object_id, $training_sch_id, $date_time) == false) {
            $attendees_at_n = $attendees_at_p = '';

            $old_attendees = $this->get_dms_training_attendee_details($dm_object_id, $training_sch_id);
            if ($old_attendees) {
                for ($i = 0; $i < count($old_attendees); $i++) {
                    $old_attendees_at_old .= "\n\t\t\t" . $old_attendees[$i]['trainee_name'];
                }
            } else {
                $old_attendees_at_old = "NA";
            }
            for ($i = 0; $i < count($attendees); $i++) {
                $obj = new DB_Public_lm_dm_training_attendence();
                $obj->dm_object_id = $dm_object_id;
                $obj->training_sch_id = $training_sch_id;
                $obj->attended_user_id = $attendees[$i];
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                $attendee_presesnt = $this->get_dms_training_attendee_details($dm_object_id, $training_sch_id, $attendees[$i]);
                if (empty($attendee_presesnt)) {
                    if ($obj->insert()) {
                        $attendees_at_n .= "\n\t\t\t" . getFullName($attendees[$i]);
                        $attendees_at_p .= "\n\t\t\t" . $attendees[$i] . " - " . getFullName($attendees[$i]) . " : " . getDeptId($attendees[$i]) . " - " . getDeptName($attendees[$i]);
                    } else {
                        return false;
                    }
                }
            }
            if ($attendees_at_n) {
                $at_data["Training Attendess"] = array($old_attendees_at_old, $attendees_at_n, $attendees_at_p);
                addAuditTrailLog($dm_object_id, $training_sch_id, $at_data, $_POST['audit_trail_action'], 'Successfully Added');
            }
            return true;
        }
        return false;
    }

    function get_dms_training_attendee_details($dm_object_id, $training_sch_id = null, $attendee = null) {
        $obj = new DB_Public_lm_dm_training_attendence();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        ($training_sch_id) ? $obj->whereAdd("training_sch_id='$training_sch_id'") : null;
        ($attendee) ? $obj->whereAdd("attended_user_id='$attendee'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $trainees[] = array(
                    'training_sch_id' => $obj->training_sch_id,
                    'trainee_id' => $obj->attended_user_id,
                    'trainee_name' => getFullName($obj->attended_user_id),
                    'trainee_dept' => getDeptName($obj->attended_user_id),
                    'trainee_plant' => getUserPlantName($obj->attended_user_id),
                    'created_by' => $obj->created_by,
                    'created_by_id' => $obj->created_by,
                    'created_time' => $obj->created_time,
                    'count' => $count
                );
                $count++;
            }
            return $trainees;
        }
        return null;
    }

    function update_dms_training_completion_details($dm_object_id, $training_details) {
        foreach ($training_details as $val) {
            $trainer_object_id = $val['trainer_object_id'];
            $trainer_details_obj = new DB_Public_lm_dm_trainer_details();
            $trainer_details_obj->whereAdd("object_id='$trainer_object_id'");
            $trainer_details_obj->whereAdd("dm_object_id='$dm_object_id'");
            $trainer_details_obj->status = "Completed";
            if ($trainer_details_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $trainer_sch_obj = new DB_Public_lm_dm_training_schedule();
                $trainer_sch_obj->whereAdd("trainer_object_id='$trainer_object_id'");
                $trainer_sch_obj->whereAdd("dm_object_id='$dm_object_id'");
                $trainer_sch_obj->status = "Completed";
                if ($trainer_sch_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                    return true;
                }
            }
        }
        return false;
    }

    function get_dms_trainer_object_id($dm_object_id, $trainer_id) {
        $obj = new DB_Public_lm_dm_trainer_details();
        $obj->get("dm_object_id", $dm_object_id);
        if ($obj->trainer === $trainer_id) {
            return $obj->object_id;
        }
        return null;
    }

    //***End Of Training Functions ***//
    //***Start Of Exam Functions ***//

    function add_dms_exam_questions($dm_object_id, $trainer_object_id_array, $tf_qns_array, $mcq_array, $usr_id, $date_time) {
        //Delete Old Questions, Answers, Options
        //Loop trainer_object_id
        for ($i = 0; $i < count($trainer_object_id_array); $i++) {
            if ($this->delete_dms_exam_questions($dm_object_id, $trainer_object_id_array[$i])) {
                //Add True Or False Questions
                if ($tf_qns_array['questions'][$i]) {
                    for ($j = 0; $j < count($tf_qns_array['questions'][$i]); $j++) {
                        $id = get_object_id("definitions->object_id->exam->dms->exam_qns_master");
                        $obj = new DB_Public_lm_dm_question_master();
                        $obj->object_id = $id;
                        $obj->dm_object_id = $dm_object_id;
                        $obj->trainer_object_id = $trainer_object_id_array[$i];
                        $obj->type = "true_false";
                        $obj->question = $tf_qns_array['questions'][$i][$j];
                        $obj->answer_no = $tf_qns_array['answers'][$i][$j];
                        $obj->order1 = $tf_qns_array['order'][$i][$j];
                        $obj->created_by = $usr_id;
                        $obj->created_time = $date_time;
                        if ($obj->insert()) {
                            //Add Options
                            for ($k = 1; $k <= count($tf_qns_array['options']); $k++) {
                                $aid = get_object_id("definitions->object_id->exam->dms->exam_qns_opt_master");
                                $opt_obj = new DB_Public_lm_dm_question_options();
                                $opt_obj->object_id = $aid;
                                $opt_obj->question_id = $id;
                                $opt_obj->option = $tf_qns_array['options'][$k];
                                $opt_obj->option_no = $k;
                                $opt_obj->order1 = $k;
                                $opt_obj->created_by = $usr_id;
                                $opt_obj->created_time = $date_time;
                                $opt_obj->insert();
                            }
                        }
                    }
                }
                if ($mcq_array['questions'][$i]) {
                    //Add MCQ Questions
                    for ($j = 0; $j < count($mcq_array['questions'][$i]); $j++) {
                        $id = get_object_id("definitions->object_id->exam->dms->exam_qns_master");
                        $obj = new DB_Public_lm_dm_question_master();
                        $obj->object_id = $id;
                        $obj->dm_object_id = $dm_object_id;
                        $obj->trainer_object_id = $trainer_object_id_array[$i];
                        $obj->type = "mcq";
                        $obj->question = $mcq_array['questions'][$i][$j];
                        $obj->answer_no = $mcq_array['answers'][$i][$j];
                        $obj->order1 = $mcq_array['order'][$i][$j];
                        $obj->created_by = $usr_id;
                        $obj->created_time = $date_time;
                        if ($obj->insert()) {
                            //Add Options
                            for ($k = 1; $k <= count($mcq_array['options'][$i]); $k++) {
                                $aid = get_object_id("definitions->object_id->exam->dms->exam_qns_opt_master");
                                $opt_obj = new DB_Public_lm_dm_question_options();
                                $opt_obj->object_id = $aid;
                                $opt_obj->question_id = $id;
                                $opt_obj->option = $mcq_array['options'][$i][$k][$j];
                                $opt_obj->option_no = $k;
                                $opt_obj->order1 = $k;
                                $opt_obj->created_by = $usr_id;
                                $opt_obj->created_time = $date_time;
                                $opt_obj->insert();
                            }
                        }
                    }
                }
            }
        }
        return true;
    }

    function delete_dms_exam_questions($dm_object_id, $trainer_object_id) {
        $qa_obj = new DB_Public_lm_dm_question_master();
        $qa_obj->whereAdd("dm_object_id='$dm_object_id'");
        $qa_obj->whereAdd("trainer_object_id='$trainer_object_id'");
        if ($qa_obj->find()) {
            while ($qa_obj->fetch()) {
                $opt_obj = new DB_Public_lm_dm_question_options();
                $opt_obj->whereAdd("question_id	='$qa_obj->object_id'");
                $opt_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
            }
        }
        $dqa_obj = new DB_Public_lm_dm_question_master();
        $dqa_obj->whereAdd("dm_object_id='$dm_object_id'");
        $dqa_obj->whereAdd("trainer_object_id='$trainer_object_id'");
        $dqa_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_dms_question_ans_list($dm_object_id, $trainer_object_id = null, $trainer = null) {
        $obj = new DB_Public_lm_dm_question_master();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        ($trainer_object_id) ? $obj->whereAdd("trainer_object_id='$trainer_object_id'") : null;
        ($trainer) ? $obj->whereAdd("created_by='$trainer'") : null;
        $obj->orderBy('order1');
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $qns_options_list = $this->get_dms_qns_options($obj->object_id);
                $qns_list[] = array(
                    "object_id" => $obj->object_id,
                    'dm_object_id' => $obj->dm_object_id,
                    'type' => $obj->type,
                    'question' => $obj->question,
                    'answer_no' => $obj->answer_no,
                    'created_by_id' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => $obj->created_time,
                    'order' => $obj->order1,
                    'qns_options' => $qns_options_list,
                    'count' => $count
                );
                $count++;
            }
            return $qns_list;
        }
        return null;
    }

    function get_dms_qns_options($qns_id) {
        $dm_qns_opt_obj = new DB_Public_lm_dm_question_options();
        $dm_qns_opt_obj->whereAdd("question_id='$qns_id'");
        $dm_qns_opt_obj->orderBy('order1');
        if ($dm_qns_opt_obj->find()) {
            while ($dm_qns_opt_obj->fetch()) {
                $qns_options_list[] = array(
                    "object_id" => $dm_qns_opt_obj->object_id,
                    'option' => $dm_qns_opt_obj->option,
                    'question_id' => $dm_qns_opt_obj->question_id,
                    'option_no' => $dm_qns_opt_obj->option_no,
                    'created_by_id' => $dm_qns_opt_obj->created_by,
                    'created_by_name' => getFullName($dm_qns_opt_obj->created_by),
                    'created_time' => $dm_qns_opt_obj->created_time,
                    'order' => $dm_qns_opt_obj->order1
                );
            }
            return $qns_options_list;
        }
        return null;
    }

    function add_dms_online_exam_details($dm_object_id, $trainer_object_id, $usr_id, $date_time) {
        $id = get_object_id("definitions->object_id->exam->dms->exam_details");
        $obj = new DB_Public_lm_dm_online_exam_details();
        $obj->object_id = $id;
        $obj->dm_object_id = $dm_object_id;
        $obj->trainer_object_id = $trainer_object_id;
        $obj->status = "Pending";
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        if ($obj->insert()) {
            return $id;
        }
        return false;
    }

    function assign_dms_online_exam($dm_object_id, $trainer_object_id, $trainer, $exam_details_id, $assigned_by, $exam_user, $qns_limit, $status, $is_latest, $attempt, $attempt_status, $capa_no, $date_time) {
        if ($status === "Assigned" && $this->is_dms_online_exam_exist_for_user($dm_object_id, $exam_details_id, $exam_user)) {
            return false;
        } else {
            $object_id = get_object_id("definitions->object_id->exam->dms->online_exam");
            $e_obj = new DB_Public_lm_dm_online_exam_user_details();
            $e_obj->object_id = $object_id;
            $e_obj->dm_object_id = $dm_object_id;
            $e_obj->exam_details_id = $exam_details_id;
            $e_obj->assigned_by = $assigned_by;
            $e_obj->assigned_to = $exam_user;
            $e_obj->assigned_date = $date_time;
            $e_obj->pass_mark = getDevExamPassMark();
            $e_obj->attempt = $attempt;
            $e_obj->status = $status;
            $e_obj->is_latest = $is_latest;
            $e_obj->capa_no = $capa_no;
            $e_obj->question_limit = $qns_limit;
            $e_obj->attempt_limit = getDevExamAttemptLimit();
            $e_obj->attempt_status = $attempt_status;
            if ($e_obj->insert()) {
                $qna_list = $this->get_dms_question_ans_list($dm_object_id, $trainer_object_id, $trainer);
                shuffle($qna_list);
                $final_qna_list = array_slice($qna_list, 0, $qns_limit);
                for ($i = 0; $i < count($final_qna_list); $i++) {
                    $oe_user_id = get_object_id("definitions->object_id->exam->dms->oe_user_qns_ans");
                    $user_obj = new DB_Public_lm_dm_online_exam_user_question_ans_details();
                    $user_obj->object_id = $oe_user_id;
                    $user_obj->exam_id = $object_id;
                    $user_obj->question_id = $final_qna_list[$i]['object_id'];
                    $user_obj->ans = null;
                    $user_obj->ans_date = null;
                    $user_obj->insert();
                }
            }
        }
        return $object_id;
    }

    function is_dms_online_exam_exist_for_user($dm_object_id, $exam_details_id, $exam_user) {
        $obj = new DB_Public_lm_dm_online_exam_user_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(dm_object_id) = lower('$dm_object_id') and lower(exam_details_id) = lower('$exam_details_id')  and lower(assigned_to) = lower('$exam_user') ");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function get_dms_online_exam_details($dm_object_id, $trainer_object_id = null, $trainer = null, $is_latest = null, $exam_user = null) {
        $obj = new DB_Public_lm_dm_online_exam_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        ($trainer_object_id) ? $obj->whereAdd("trainer_object_id='$trainer_object_id'") : null;
        ($trainer) ? $obj->whereAdd("created_by='$trainer'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $user_details = $this->get_dms_online_exam_user_details($dm_object_id, $obj->object_id, null, $is_latest, $exam_user);
                $title = array_shift(array_column($this->get_dms_training_details($dm_object_id, $trainer_object_id), 'title'));
                $exam_details[] = array(
                    "object_id" => $obj->object_id,
                    'status' => $obj->status,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => $obj->created_time,
                    "user_details" => $user_details,
                    'title' => $title,
                    'count' => $count
                );
                $count++;
            }
            return $exam_details;
        }
        return null;
    }

    function update_dms_online_exam_capa_details($dm_object_id, $exam_object_id, $capa_no) {
        $uobj = new DB_Public_lm_dm_online_exam_user_details();
        $uobj->whereAdd("object_id='$exam_object_id'");
        $uobj->whereAdd("dm_object_id='$dm_object_id'");
        $uobj->capa_no = $capa_no;
        $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_dms_online_exam_user_details($dm_object_id, $exam_details_id = null, $trainer = null, $is_latest = null, $exam_user = null) {
        $exam_user_obj = new DB_Public_lm_dm_online_exam_user_details();
        $exam_user_obj->whereAdd("dm_object_id='$dm_object_id'");
        ($exam_details_id) ? $exam_user_obj->whereAdd("exam_details_id='$exam_details_id'") : null;
        ($trainer) ? $exam_user_obj->whereAdd("assigned_by='$trainer'") : null;
        ($is_latest) ? $exam_user_obj->whereAdd("is_latest='$is_latest'") : null;
        ($exam_user) ? $exam_user_obj->whereAdd("assigned_to='$exam_user'") : null;
        if ($exam_user_obj->find()) {
            $count = 1;
            while ($exam_user_obj->fetch()) {
                $qna_details = $this->get_dms_user_question_ans_details($exam_user_obj->object_id);
                $capa_no = ($exam_user_obj->capa_no === "NA") ? "NA" : get_qms_doc_no(null, $exam_user_obj->capa_no)['doc_no'];
                $capa_link = ($exam_user_obj->capa_no === "NA") ? "NA" : get_qms_doc_no(null, $exam_user_obj->capa_no)['doc_link'];
                $integration_details = array_shift(get_integration_details(null, $dm_object_id, $exam_user_obj->capa_no, $exam_user_obj->object_id));

                $qns_list[] = array(
                    'exam_object_id' => $exam_user_obj->object_id,
                    'dm_object_id' => $exam_user_obj->dm_object_id,
                    'exam_details_id' => $exam_user_obj->exam_details_id,
                    'assigned_date' => $exam_user_obj->assigned_date,
                    'assigned_by' => getFullName($exam_user_obj->assigned_by),
                    'assigned_to_id' => $exam_user_obj->assigned_to,
                    'assigned_to' => getfullname($exam_user_obj->assigned_to),
                    'assigned_to_plant' => getUserPlantShortName($exam_user_obj->assigned_to),
                    'assigned_to_dept' => getDeptName($exam_user_obj->assigned_to),
                    'completed_date' => $exam_user_obj->exam_completed_date,
                    'pass_mark' => $exam_user_obj->pass_mark,
                    'question_limit' => $exam_user_obj->question_limit,
                    'attempt_limit' => $exam_user_obj->attempt_limit,
                    'attempt_status' => $exam_user_obj->attempt_status,
                    'attempt' => $exam_user_obj->attempt,
                    'marks_scored' => $exam_user_obj->mark_scored,
                    'result' => $exam_user_obj->exam_result,
                    'status' => $exam_user_obj->status,
                    'capa_no' => $capa_no,
                    'capa_link' => $capa_link,
                    'is_latest' => $exam_user_obj->is_latest,
                    'qna_details' => $qna_details,
                    'int_details' => $integration_details,
                    'count' => $count
                );
                $count++;
            }
            return $qns_list;
        }
        return null;
    }

    function get_dms_user_question_ans_details($exam_id) {
        $user_qns_ans_obj = new DB_Public_lm_dm_online_exam_user_question_ans_details();
        $user_qns_ans_obj->whereAdd("exam_id='$exam_id'");
        if ($user_qns_ans_obj->find()) {
            $count = 1;
            while ($user_qns_ans_obj->fetch()) {
                $qns_master_obj = $this->get_dms_question_master_obj($user_qns_ans_obj->question_id);
                $qns_option_array = $this->get_dms_qns_options($user_qns_ans_obj->question_id);
                $qns_option_list[] = array(
                    'object_id' => $user_qns_ans_obj->object_id,
                    'question_id' => $user_qns_ans_obj->question_id,
                    'question' => $qns_master_obj->question,
                    'question_type' => $qns_master_obj->type,
                    'exam_object_id' => $user_qns_ans_obj->exam_id,
                    'exam_ans' => $user_qns_ans_obj->ans,
                    'exam_ans_date' => $user_qns_ans_obj->ans_date,
                    'qns_option_array' => $qns_option_array,
                    'count' => $count
                );
                $count++;
            }
            //asort($qns_option_list);
            return $qns_option_list;
        }
        return null;
    }

    function get_dms_question_master_obj($object_id) {
        $qns_master_obj = new DB_Public_lm_dm_question_master();
        $qns_master_obj->get("object_id", $object_id);
        return $qns_master_obj;
    }

    function update_dms_online_exam_ans($exam_id, $answers, $date_time) {
        foreach ($answers as $answer_list) {
            $qna_dtls = explode("-", $answer_list);
            $answer = $qna_dtls[0];
            $qna_id = $qna_dtls[1];

            $obj = new DB_Public_lm_dm_online_exam_user_question_ans_details();
            $obj->whereAdd("object_id='$qna_id'");
            $obj->whereAdd("exam_id='$exam_id'");
            $obj->ans = $answer;
            $obj->ans_date = $date_time;
            if (!$obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                return false;
            }
        }
        return true;
    }

    function get_dms_exam_mark($exam_id) {
        $correct_ans = 0;
        $exam_user_obj = new DB_Public_lm_dm_online_exam_user_details();
        $exam_user_obj->get("object_id", $exam_id);
        $question_limit = $exam_user_obj->question_limit;

        $user_qns_ans_obj = new DB_Public_lm_dm_online_exam_user_question_ans_details();
        $user_qns_ans_obj->whereAdd("exam_id='$exam_id'");
        if ($user_qns_ans_obj->find()) {
            while ($user_qns_ans_obj->fetch()) {
                $qns_master_obj = $this->get_dms_question_master_obj($user_qns_ans_obj->question_id);
                if ($user_qns_ans_obj->ans == $qns_master_obj->answer_no) {
                    $correct_ans++;
                }
            }
            $exam_mark = round((($correct_ans / $question_limit) * 100), 2);
            return $exam_mark;
        }
        return null;
    }

    function get_dms_exam_result($marks_scored, $pass_mark) {
        return ($marks_scored < $pass_mark) ? 'Failed' : 'Pass';
    }

    function update_dms_exam_completion_details($object_id, $exam_details_id, $status, $attempt_status, $marks, $result, $completed_date) {
        $obj = new DB_Public_lm_dm_online_exam_user_details();
        $obj->whereAdd("object_id='$object_id'");
        $obj->whereAdd("exam_details_id='$exam_details_id'");
        $obj->status = $status;
        $obj->attempt_status = $attempt_status;
        $obj->mark_scored = $marks;
        $obj->exam_result = $result;
        $obj->exam_completed_date = $completed_date;
        ($result == "Failed") ? $obj->is_latest = 'no' : 'yes';
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function is_dms_exam_capa_required($attempt_limit, $attempt) {
        $max_attempt_limit = 1000;
        $tmp_array = array();
        for ($i = 1; $i < $max_attempt_limit; $i++) {
            $attempt_val = ($i * $attempt_limit) + 1;
            array_push($tmp_array, $attempt_val);
        }
        if (in_array($attempt, $tmp_array)) {
            return true;
        } else {
            return null;
        }
    }

    function get_dms_unique_non_attended_exam_user_list($dms_object_id, $trainer_object_id, $trainer) {
        $attendees_array = array_column($this->get_dms_training_schedule_details($dms_object_id, null, $trainer_object_id, null, null), 'attendees');
        for ($i = 0; $i < count($attendees_array); $i++) {
            for ($j = 0; $j < count($attendees_array[$i]); $j++) {
                $attendees_user_array[] = $attendees_array[$i][$j]['trainee_id'];
            }
        }
        $exam_user_array = array_column(array_shift(array_column($this->get_dms_online_exam_details($dms_object_id, $trainer_object_id, $trainer), 'user_details')), 'assigned_to_id');
        $unique_users_list = array_diff($attendees_user_array, $exam_user_array);
        if ($unique_users_list) {
            foreach ($unique_users_list as $key => $val) {
                $unique_users[] = array('drop_down_value' => $val, 'drop_down_option' => getFullName($val));
            }
            return $unique_users;
        }
        return null;
    }

    function update_dms_online_exam_user_status($dm_object_id, $exam_details_id, $exam_user, $status, $attempt_status, $is_latest) {
        $obj = new DB_Public_lm_dm_online_exam_user_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        $obj->whereAdd("exam_details_id='$exam_details_id'");
        $obj->whereAdd("assigned_to='$exam_user'");
        $obj->whereAdd("is_latest='$is_latest'");
        $obj->status = $status;
        $obj->attempt_status = $attempt_status;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function update_dms_online_exam_status($exam_details_id, $status) {
        $obj = new DB_Public_lm_dm_online_exam_details();
        $obj->whereAdd("object_id='$exam_details_id'");
        $obj->status = $status;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    //***End Of Exam Functions ***//
    //***Start Of Task Functions ***//
    function add_dms_task_details($dms_object_id, $task_id, $task, $pri_per_id, $submission_type, $task_type, $usr_id, $date_time) {
        $task_at_n = $task_at_p = "";
        $task_at_o = "NA";
        // Delete Task
        if ($task_type == "first_time") {
            $this->delete_all_dms_task($dms_object_id);
        }
        if ($task_type == "add_more_task") {
            $old_task = $this->get_dms_task_details($dms_object_id, null);
            for ($i = 0; $i < count($old_task); $i++) {
                $task_at_o .= "\n\nTask Id : " . $old_task[$i]['task_id'] . "\nPrimary Responsible Person : " . $old_task[$i]['pri_per_name'];
            }
        }
        // Add Task
        for ($i = 0; $i < count($task); $i++) {
            $object_id = get_object_id("definitions->object_id->task->dms->task");
            $obj = new DB_Public_lm_dm_task_details();
            $obj->object_id = $object_id;
            $obj->dm_object_id = $dms_object_id;
            $obj->task_id = $task_id[$i];
            $obj->task = $task[$i];
            $obj->pri_per_id = $pri_per_id[$i];
            $obj->created_by = $usr_id;
            $obj->created_date = $date_time;
            $obj->task_status_pri = "Pending";
            $obj->status = "Pending";
            $obj->wf_status = "to_be_assigned";
            $obj->order1 = $i + 1;
            if ($obj->insert()) {
                $task_at_n .= "\n\nTask Id : {$task_id[$i]}\nPrimary Responsible Person : " . getFullName($pri_per_id[$i]);
                $task_at_p .= "\n\nTask Id: {$task_id[$i]}\nPrimary Responsible Person : {$pri_per_id[$i]} - " . getFullName($pri_per_id[$i]) . "\nDepartment : " . getDeptId($pri_per_id[$i]) . " - " . getDeptName($pri_per_id[$i]) . "\nPlant : " . getUserPlantId($pri_per_id[$i]) . " - " . getPlantShortName(getUserPlantId($pri_per_id[$i]));
            } else {
                return false;
            }
        }
        if ($submission_type == "assing_pri_per") {
            //Audit Trail
            $at_data['Task Details'] = array($task_at_o, $task_at_n, $task_at_p);
            addAuditTrailLog($dms_object_id, null, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
        }
        return true;
    }

    function delete_all_dms_task($dms_object_id) {
        $realted_to_obj = new DB_Public_lm_dm_task_details();
        $realted_to_obj->whereAdd("dm_object_id='$dms_object_id'");
        $realted_to_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function update_dms_task_details($object_id, $dm_object_id, $pri_per_id, $sec_per_id, $task_status_pri, $task_status_sec, $task_completion_date_pri, $task_completion_date_sec, $task_status_creator, $task_completion_date_creator, $task_status, $task_wf_status) {
        $obj = new DB_Public_lm_dm_task_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($pri_per_id) ? ($obj->pri_per_id = $pri_per_id) : false;
        ($sec_per_id) ? ($obj->sec_per_id = $sec_per_id) : false;
        ($task_status_pri) ? ($obj->task_status_pri = $task_status_pri) : false;
        ($task_status_sec) ? ($obj->task_status_sec = $task_status_sec) : false;
        ($task_completion_date_pri) ? ($obj->task_completion_date_pri = $task_completion_date_pri) : false;
        ($task_completion_date_sec) ? ($obj->task_completion_date_sec = $task_completion_date_sec) : false;
        ($task_status_creator) ? ($obj->task_status_creator = $task_status_creator) : false;
        ($task_completion_date_creator) ? ($obj->task_completion_date_creator = $task_completion_date_creator) : false;
        ($task_status) ? ($obj->status = $task_status) : false;
        ($task_wf_status) ? ($obj->wf_status = $task_wf_status) : false;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function get_dms_task_details($dms_object_id, $task_object_id = null, $pri_per_id = null, $sec_per_id = null, $task_status_pri = null, $task_status_sec = null, $task_status_creator = null, $status = null, $wf_status = null) {
        $obj = new DB_Public_lm_dm_task_details();
        $obj->orderBy('task_id');
        $obj->whereAdd("dm_object_id='$dms_object_id'");
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
                $attachments_sec = $doc_file_processor_object->getLmDmDocFileObjectArray($dms_object_id, "task_sec_per", $obj->object_id, $obj->sec_per_id);
                $attachments_pri = $doc_file_processor_object->getLmDmDocFileObjectArray($dms_object_id, "task_pri_per", $obj->object_id, $obj->pri_per_id);
                $attachments_creator = $doc_file_processor_object->getLmDmDocFileObjectArray($dms_object_id, "task_creator", $obj->object_id, $obj->created_by);

                $latest_sec_review_comments = array_shift($this->get_dms_task_review_comments($obj->object_id, null, "task_sec_per", 'yes'));
                $latest_pri_review_comments = array_shift($this->get_dms_task_review_comments($obj->object_id, null, "task_pri_per", 'yes'));
                $latest_creator_comments = array_shift($this->get_dms_task_review_comments($obj->object_id, null, "task_creator", 'yes'));

                $all_sec_review_comments = $this->get_dms_task_review_comments($obj->object_id, null, "task_sec_per", null);
                $all_pri_review_comments = $this->get_dms_task_review_comments($obj->object_id, null, "task_pri_per", null);
                $all_creator_review_comments = $this->get_dms_task_review_comments($obj->object_id, null, "task_creator", null);
                $qa_verification_comments = array_shift($this->get_dms_task_review_comments($obj->object_id, null, "task_verification", null));

                $task_list_array[] = array(
                    'object_id' => $obj->object_id,
                    'dm_object_id' => $obj->dm_object_id,
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
                    'attachments_sec_count' => count($attachments_sec),
                    'attachments_pri_count' => count($attachments_pri),
                    'attachments_creator_count' => count($attachments_creator),
                    'all_sec_review_comments' => $all_sec_review_comments,
                    'all_pri_review_comments' => $all_pri_review_comments,
                    'latest_creator_review_comments' => $latest_creator_comments,
                    'all_creator_review_comments' => $all_creator_review_comments,
                    'qa_verification_comments' => $qa_verification_comments,
                    'wf_status' => $obj->wf_status,
                    'count' => $count
                );
                $count++;
            }
            asort($task_list_array);
            return $task_list_array;
        }
        return null;
    }

    function is_dms_task_eligible_to_assign_sec_per($dm_object_id, $pri_per_id) {
        $obj = new DB_Public_lm_dm_task_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
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

    function get_dms_task_obj($task_object_id) {
        $obj = new DB_Public_lm_dm_task_details();
        $obj->get("object_id", $task_object_id);
        return $obj;
    }

    function add_dms_task_review_comments($task_object_id_array, $review_comments_array, $commented_by, $usr_id, $date_time) {
        for ($i = 0; $i < count($review_comments_array); $i++) {
            if ($review_comments_array[$i]) {
                //If Review Comments Present Update
                if ($this->get_dms_task_review_comments($task_object_id_array[$i], $usr_id, $commented_by, "yes")) {
                    $task_obj = $this->get_dms_task_obj($task_object_id_array[$i]);

                    $update = false;
                    if ($commented_by === 'task_pri_per') {
                        $update = ($task_obj->task_status_pri === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_sec_per') {
                        $update = ($task_obj->task_status_sec === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_creator') {
                        $update = ($task_obj->task_status_creator === "Pending") ? true : false;
                    }
                    if ($update) {
                        $obj = new DB_Public_lm_dm_task_review_comments();
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
                    $task_obj = $this->get_dms_task_obj($task_object_id_array[$i]);

                    $insert = false;
                    if ($commented_by === 'task_pri_per') {
                        $insert = ($task_obj->task_status_pri === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_sec_per') {
                        $insert = ($task_obj->task_status_sec === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_creator') {
                        $insert = ($task_obj->task_status_creator === "Pending") ? true : false;
                    }

                    if ($insert) {
                        $object_id = get_object_id("definitions->object_id->task->dms->task_review_comments");
                        $obj = new DB_Public_lm_dm_task_review_comments();
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
        }
        return true;
    }

    function get_dms_task_review_comments($task_object_id, $created_by = null, $commented_by = null, $is_latest = null) {
        $obj = new DB_Public_lm_dm_task_review_comments();
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

    function update_dms_task_review_comments_is_latest($task_object_id, $commented_by, $is_latest) {
        $obj = new DB_Public_lm_dm_task_review_comments();
        $obj->whereAdd("task_object_id='$task_object_id'");
        $obj->whereAdd("commented_by='$commented_by'");
        $obj->whereAdd("is_latest='yes'");
        $obj->is_latest = $is_latest;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function add_dms_task_attachment($dm_object_id, $type, $usr_id, $date_time) {
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

                        $file_id = get_object_id("definitions->object_id->task->dms->task_file_upload");

                        $file = new DB_Public_file();
                        $file->object_id = $file_id;
                        $file->type = $file_type;
                        $file->name = $file_name;
                        $file->size = $file_size;
                        $file->hash = $hash . "." . $extension;
                        move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
                        $file->insert();

                        $doc_file = new DB_Public_lm_dm_doc_file();
                        $doc_file->file_id = $file_id;
                        $doc_file->object_id = $dm_object_id;
                        $doc_file->type = $type;
                        $doc_file->attached_by = $usr_id;
                        $doc_file->attached_date = $date_time;
                        $doc_file->ref_object_id = $task_obj_id;
                        if ($doc_file->insert()) {
                            $task_details = $this->get_dms_task_obj($task_obj_id);
                            //audit trail
                            $at_data['File Name'] = array('NA', $file_name, $file_name);
                            $at_data['File Type'] = array('NA', $file_type, $file_type);
                            $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                            $at_data['Task Id'] = array('NA', $task_details->task_id, $task_details->task_id);
                            $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                            addAuditTrailLog($dm_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
    }

    function is_dms_task_completed($dm_object_id, $pri_per_id = null, $sec_per_id = null, $creator_id = null) {
        $obj = new DB_Public_lm_dm_task_details();
        $obj->whereAdd("dm_object_id='$dm_object_id'");
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
                //If all task compeleted - sent to QA
                if ($creator_id && $obj->task_status_creator !== "Completed") {
                    return "Pending";
                }
            }
            return "Completed";
        }
        return "not_in_task";
    }

    //***End Of Task Functions ***//
}
