<?php

class Ccm_Processor {

    function add_ccm_details($sorurce_doc_no, $source_lm_doc_id, $trigger_type, $reason, $usr_id, $access_dept, $date_time, $audit_trail_action) {
        $object_id = get_object_id("definitions->object_id->workflow->ccm->object_id");
        $lm_doc_id = getLmDocObjectIdByDocCode('LM-DOC-11');
        $usr_dept_id = getDeptId($usr_id);
        $usr_plant_id = getUserPlantId($usr_id);

        $cc_no = get_qms_no_seq($usr_plant_id, $lm_doc_id);
        if ($cc_no) {
            $current_access_dept = getUserPlantId($usr_id) . "-" . $usr_dept_id;

            $obj = new DB_Public_lm_cc_master();
            $obj->cc_object_id = $object_id;
            $obj->lm_doc_id = $lm_doc_id;
            $obj->cc_department = $usr_dept_id;
            $obj->plant_id = getUserPlantId($usr_id);
            $obj->cc_no = $cc_no;
            $obj->status = "Open";
            $obj->wf_status = "Created";
            $obj->is_meeting_required = "no";
            $obj->is_training_required = "no";
            $obj->is_online_exam_required = "no";
            $obj->is_task_required = "no";
            $obj->meeting_status = "NA";
            $obj->training_status = "NA";
            $obj->exam_status = "NA";
            $obj->task_status = "NA";
            $obj->approval_status = "Pending";
            $obj->trigger_type = $trigger_type;
            $obj->reason = $reason;
            $obj->source_doc_no = $sorurce_doc_no;
            $obj->created_by = $usr_id;
            $obj->created_time = $date_time;
            $obj->modified_by = $usr_id;
            $obj->modified_time = $date_time;
            $obj->cc_triggered_from = $source_lm_doc_id;
            if ($obj->insert()) {
                add_worklist($usr_id, $object_id);
                save_workflow($object_id, $usr_id, 'Created', 'create');
                update_qms_no_seq($usr_plant_id, $lm_doc_id);

                if ($source_lm_doc_id == "OTHERS") {
                    $source_doc = $sorurce_doc_no;
                } else {
                    $source_doc = get_qms_doc_no(null, $sorurce_doc_no)['doc_no'];
                }

                $at_data['CC No'] = array("NA", $cc_no, "$cc_no \nlm_doc_id : $lm_doc_id");
                $at_data['Source Doc No'] = array("NA", $source_doc, $source_doc);
                $at_data['Reason'] = array("NA", $reason, $reason);
                $at_data['Trigger Type'] = array("NA", $trigger_type, $trigger_type);
                addAuditTrailLog($object_id, null, $at_data, $audit_trail_action, "Successfuly Added");

                addDeptAccessRights($object_id, $current_access_dept, $access_dept, $usr_id, $date_time, $cc_no, $audit_trail_action);
                return $object_id;
            }
        }
        return null;
    }

    function update_ccm_details($cc_object_id, $data) {
        extract($data);

        //Object to get old vlaues
        $old_obj = new DB_Public_lm_cc_master();
        $old_obj->get("cc_object_id", $cc_object_id);

        //Object to insert new values
        $update_obj = new DB_Public_lm_cc_master();
        $update_obj->whereAdd("cc_object_id='$cc_object_id'");

        $at_data['Change Control No'] = array($old_obj->cc_no, $old_obj->cc_no, $old_obj->cc_no . "\nlm_doc_id : $old_obj->lm_doc_id");

        //Brief Description Of Change
        ($uccm_brief_desc) ? ($update_obj->brief_desc = $uccm_brief_desc and $at_data['Brief Description Of Change'] = array($old_obj->brief_desc . "\n", $uccm_brief_desc . "\n", $uccm_brief_desc)) : false;

        //Presnt System
        ($uccm_present_system) ? ($update_obj->present_system = $uccm_present_system and $at_data['Present System'] = array($old_obj->present_system . "\n", $uccm_present_system . "\n", $uccm_present_system)) : false;

        //Proposed Change
        ($uccm_proposed_change) ? ($update_obj->proposed_change = $uccm_proposed_change and $at_data['Proposed Change'] = array($old_obj->proposed_change . "\n", $uccm_proposed_change . "\n", $uccm_proposed_change)) : false;

        //Impact Assesment
        ($uccm_impact_assessment) ? ($update_obj->impact_assessment = $uccm_impact_assessment and $at_data['Impact Assesment'] = array($old_obj->impact_assessment . "\n", $uccm_impact_assessment . "\n", $uccm_impact_assessment)) : false;

        //Justification
        ($uccm_justification) ? ($update_obj->justification = $uccm_justification and $at_data['Justification For Change'] = array($old_obj->justification . "\n", $uccm_justification . "\n", $uccm_justification)) : false;

        //Benifits
        ($uccm_benifit) ? ($update_obj->excpected_benifits = $uccm_benifit and $at_data['Expected Benifit'] = array($old_obj->excpected_benifits . "\n", $uccm_benifit . "\n", $uccm_benifit)) : false; //Benifits
        //Estimated Cost
        ($uccm_cost) ? ($update_obj->estimated_cost = $uccm_cost and $at_data['Estimated Cost'] = array($old_obj->estimated_cost . "\n", $uccm_cost . "\n", $uccm_cost)) : false;

        //Classification
        ($uccm_classification) ? ($update_obj->classification = $uccm_classification and $at_data['Classification'] = array(getClassificationName($old_obj->classification), getClassificationName($uccm_classification), getClassificationName($uccm_classification))) : false;

        //Approval Status
        ($uccm_approved_status) ? ($update_obj->approved_status = $uccm_approved_status and $at_data['Approval Status'] = array($old_obj->approved_status, $uccm_approved_status, $uccm_approved_status)) : false;

        //Rejected Reason
        ($uccm_reject_reason) ? ($update_obj->rejected_reason = $uccm_reject_reason and $at_data['Rejected Status'] = array("NA", $uccm_reject_reason, $uccm_reject_reason)) : false;

        //Proposed Methodology
        ($uccm_proposed_methodology) ? ($update_obj->proposed_methodology = $uccm_proposed_methodology and $at_data['Proposed Methodology'] = array($old_obj->proposed_methodology, $uccm_proposed_methodology, $uccm_proposed_methodology)) : false;

        //Target date
        ($uccm_target_date) ? ($update_obj->target_date = $uccm_target_date and $at_data['Target Date'] = array($old_obj->target_date, $uccm_target_date, $uccm_target_date)) : false;

        //Change Follow Up
        ($uccm_change_follow_up) ? ($update_obj->change_follow_up = $uccm_change_follow_up and $at_data['Change Follow Up'] = array($old_obj->change_follow_up, $uccm_change_follow_up, $uccm_change_follow_up)) : false;

        //Change Effectiveness In Doc
        ($uccm_change_effectiveness_in_doc) ? ($update_obj->change_effectiveness_in_doc = $uccm_change_effectiveness_in_doc and $at_data['Change Effectiveness In Doc'] = array($old_obj->change_effectiveness_in_doc, $uccm_change_effectiveness_in_doc, $uccm_change_effectiveness_in_doc)) : false;

        //Change Effectiveness In Consequence Doc
        ($uccm_change_effectiveness_in_conseq_doc) ? ($update_obj->change_effectiveness_in_conseq_doc = $uccm_change_effectiveness_in_conseq_doc and $at_data['Change Effectiveness Consequence In Doc'] = array($old_obj->change_effectiveness_in_conseq_doc, $uccm_change_effectiveness_in_conseq_doc, $uccm_change_effectiveness_in_conseq_doc)) : false;

        //Close Out Date
        ($uccm_change_close_out_date) ? ($update_obj->close_out_date = $uccm_change_close_out_date and $at_data['Close Out Date'] = array($old_obj->close_out_date, $uccm_change_close_out_date, $uccm_change_close_out_date)) : false;

        //Change Type
        ($uccm_change_type) ? ($update_obj->change_type_id = $uccm_change_type and $at_data['Change Type'] = array(getChangeType($old_obj->change_type_id), getChangeType($uccm_change_type), getChangeType($uccm_change_type))) : false;

        //Is Meeting required
        ($uccm_meeting) ? ($update_obj->is_meeting_required = $uccm_meeting and $at_data['Is Meeting Required'] = array($old_obj->is_meeting_required, $uccm_meeting, $uccm_meeting)) : false;

        //Is Training required
        ($uccm_training) ? ($update_obj->is_training_required = $uccm_training and $at_data['Is Training Required'] = array($old_obj->is_training_required, $uccm_training, $uccm_training)) : false;

        ($uccm_exam) ? ($update_obj->is_online_exam_required = $uccm_exam and $at_data['Is Exam Required'] = array($old_obj->is_online_exam_required, $uccm_exam, $uccm_exam)) : false;

        //Is Task required
        ($uccm_task) ? ($update_obj->is_task_required = $uccm_task and $at_data['Is task required'] = array($old_obj->is_task_required, $uccm_task, $uccm_task)) : false;

        //Effectiveness date
        ($uccm_effectiveness_date) ? ($update_obj->effectiveness_date = $uccm_effectiveness_date and $at_data['Effectiveness Date'] = array($old_obj->effectiveness_date, $uccm_effectiveness_date, $uccm_effectiveness_date)) : false;

        //Material Type
        ($uccm_mat_id) ? ($update_obj->material_type_id = $uccm_mat_id and $at_data['Material Type'] = array(getMaterialType($old_obj->material_type_id), getMaterialType($uccm_mat_id), $uccm_mat_id . " - " . getMaterialType($uccm_mat_id))) : false;

        //Material Name
        ($uccm_mat_name) ? ($update_obj->material_name = $uccm_mat_name and $at_data['Material Name'] = array($old_obj->material_name, $uccm_mat_name, $uccm_mat_name)) : false;

        //Product Name
        ($uccm_prod_name) ? ($update_obj->product_id = $uccm_prod_name and $at_data['Product Name'] = array(getProductName($old_obj->product_id), getProductName($uccm_prod_name), $uccm_prod_name . " - " . getProductName($uccm_prod_name))) : false;

        //Scope Market
        ($uccm_scope) ? ($update_obj->scope = $uccm_scope and $at_data['Scope/Market'] = array(getMarketName($old_obj->scope), getMarketName($uccm_scope), $uccm_scope . " - " . getMarketName($uccm_scope))) : false;

        //Customer
        ($uccm_customer) ? ($update_obj->customer = $uccm_customer and $at_data['Customer'] = array(getCustomerName($old_obj->customer), getCustomerName($uccm_customer), $uccm_customer . " - " . getCustomerName($uccm_customer))) : false;

        //Batch No
        ($uccm_batch_no) ? ($update_obj->batch_no = $uccm_batch_no and $at_data['Bacth No'] = array($old_obj->batch_no, $uccm_batch_no, $uccm_batch_no)) : false;

        //Batch Size
        ($uccm_batch_size) ? ($update_obj->batch_size = $uccm_batch_size and $at_data['Bacth Size'] = array($old_obj->batch_size, $uccm_batch_size, $uccm_batch_size)) : false;

        //Lot Number
        ($uccm_lot_no) ? ($update_obj->lot_no = $uccm_lot_no and $at_data['Lot Number'] = array($old_obj->lot_no, $uccm_lot_no, $uccm_lot_no)) : false;

        //Process Stage
        ($uccm_processing_stage) ? ($update_obj->process_stage_id = $uccm_processing_stage and $at_data['Process Stage'] = array(getProcessStage($old_obj->process_stage_id), getProcessStage($uccm_processing_stage), $uccm_processing_stage . " - " . getProcessStage($uccm_processing_stage))) : false;

        //Manufactring Date
        ($uccm_manu_date) ? ($update_obj->manu_date = $uccm_manu_date and $at_data['Manufactering date'] = array($old_obj->manu_date, $uccm_manu_date, $uccm_manu_date)) : false;

        //Expiry Date
        ($uccm_manu_expiry_date) ? ($update_obj->manu_expiry_date = $uccm_manu_expiry_date and $at_data['Expiry date'] = array($old_obj->manu_expiry_date, $uccm_manu_expiry_date, $uccm_manu_expiry_date)) : false;

        //DMF Status
        ($ucc_dmf_status) ? ($update_obj->dmf_status = $ucc_dmf_status and $at_data['DMF Status'] = array($old_obj->dmf_status, $ucc_dmf_status, $ucc_dmf_status)) : false;

        //DMF Type
        ($ucc_dmf_desc) ? ($update_obj->dmf_desc = $ucc_dmf_desc and $at_data['DMF Type'] = array($old_obj->dmf_desc, $ucc_dmf_desc, $ucc_dmf_desc)) : false; //DMF Type
        //Customer Approval
        ($uccm_cust_approval) ? ($update_obj->is_cutomer_approval_required = $uccm_cust_approval and $at_data['Is Customer Approval Required'] = array($old_obj->is_cutomer_approval_required, $uccm_cust_approval, $uccm_cust_approval)) : false;

        //Regulatory Approval
        ($uccm_reg_approval) ? ($update_obj->is_regulatory_approval_required = $uccm_reg_approval and $at_data['Is Regulatory Approval Required'] = array($old_obj->is_regulatory_approval_required, $uccm_reg_approval, $uccm_reg_approval)) : false;

        //Meeting Target Date
        ($uccm_meeting_date) ? ($update_obj->meeting_target_date = $uccm_meeting_date and $at_data['Meeting Traget Date'] = ["NA", $uccm_meeting_date, $uccm_meeting_date]) : false;

        //Training Target Date
        ($uccm_training_date) ? ($update_obj->training_target_date = $uccm_training_date and $at_data['Training Traget Date'] = ["NA", $uccm_training_date, $uccm_training_date]) : false;

        //Exam Target Date
        ($uccm_exam_date) ? ($update_obj->exam_target_date = $uccm_exam_date and $at_data['Exam Traget Date'] = ["NA", $uccm_exam_date, $uccm_exam_date]) : false;

        //Task Target Date
        ($uccm_task_date) ? ($update_obj->task_target_date = $uccm_task_date and $at_data['Task Traget Date'] = ["NA", $task_target_date, $task_target_date]) : false;

        //Meeting Status 
        if ($uccm_meeting === "yes") {
            $update_obj->meeting_status = "Pending";
            $at_data['Meeting Status'] = array($old_obj->meeting_status, "Pending", "Pending");
        } elseif ($uccm_meeting === "no") {
            $update_obj->meeting_status = "NA";
            $at_data['Meeting Status'] = array($old_obj->meeting_status, "NA", "NA");
        }

        // Training Status
        if ($uccm_training === "yes") {
            $update_obj->training_status = "Pending";
            $at_data['Training Status'] = array($old_obj->training_status, "Pending", "Pending");
        } elseif ($uccm_training === "no") {
            $update_obj->training_status = "NA";
            $at_data['Training Status'] = array($old_obj->training_status, "NA", "NA");
        }

        // Exam Status
        if ($uccm_exam === "yes") {
            $update_obj->exam_status = "Pending";
            $at_data['Exam Status'] = array($old_obj->exam_status, "Pending", "Pending");
        } elseif ($uccm_exam === "no") {
            $update_obj->exam_status = "NA";
            $at_data['Exam Status'] = array($old_obj->exam_status, "NA", "NA");
        }

        // Task Status
        if ($uccm_task === "yes") {
            $update_obj->task_status = "Pending";
            $at_data['Task Status'] = array($old_obj->task_status, "Pending", "Pending");
        } elseif ($uccm_task === "no") {
            $update_obj->task_status = "NA";
            $at_data['Task Status'] = array($old_obj->task_status, "NA", "NA");
        }
        //Close Out Target Date
        ($uccm_close_out_date) ? ($update_obj->close_out_date = $uccm_close_out_date and $at_data['Close Out Date'] = array($old_obj->close_out_date, $uccm_close_out_date, $uccm_close_out_date)) : false;

        //Completed  Date
        ($uccm_completed_date) ? ($update_obj->completed_date = $uccm_completed_date and $at_data['Completed Date'] = array("NA", $uccm_completed_date, $uccm_completed_date)) : false;

        //Close Out Comments
        ($uccm_close_out_comments) ? ($update_obj->close_out_comments = $uccm_close_out_comments and $at_data['Close Out Comments'] = array("NA", $uccm_close_out_comments, $uccm_close_out_comments)) : false;

        //Customer Approval Status
        ($uccm_customer_approval_status) ? ($update_obj->customer_approval_status = $uccm_customer_approval_status and $at_data['Customer Approval Status'] = array("NA", $uccm_customer_approval_status, $uccm_customer_approval_status)) : false;

        //Is Monitoring REquired
        ($uccm_monitoring) ? ($update_obj->is_monitoring_required = $uccm_monitoring and $at_data['Is Monitoring Required'] = ["NA", $uccm_monitoring, $uccm_monitoring]) : false;

        //Monitoring Target Date
        ($uccm_monitoring_date) ? ($update_obj->monitoring_target_date = $uccm_monitoring_date and $at_data['Monitoring Target Date'] = ["NA", $uccm_monitoring_date, $uccm_monitoring_date]) : false;

        //Task Qa Review
        ($task_close_out_review) ? ($update_obj->task_qa_review = $task_close_out_review and $at_data['Task QA Review'] = array("NA", $task_close_out_review, $task_close_out_review)) : false;

        //Meeting Status 
        if ($update_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            //CCM Sub Realted To
            if ($uccm_related_to) {
                //Old values
                $old_related_to = $this->get_ccm_sub_related_to_details($cc_object_id);
                for ($i = 0; $i < count($old_related_to); $i++) {
                    $ccm_related_to_at_old .= "\n\t\t\t" . $old_related_to[$i]['related_to_name'] . " - " . $old_related_to[$i]['sub_type'];
                }
                //Delete Old realted To
                if ($this->delete_ccm_related_to($cc_object_id)) {
                    //Insert New Related To
                    for ($i = 0; $i < count($uccm_related_to); $i++) {
                        $ccm_related_to_id = explode("-", $uccm_related_to[$i]);
                        $id = get_object_id("definitions->object_id->workflow->ccm->ccm_related_to_details");

                        $ccm_rel_to_obj = new DB_Public_lm_cc_type_details();
                        $ccm_rel_to_obj->object_id = $id;
                        $ccm_rel_to_obj->cc_object_id = $cc_object_id;
                        $ccm_rel_to_obj->cc_type_id = $ccm_related_to_id[0];
                        $ccm_rel_to_obj->cc_sub_related_to_id = $ccm_related_to_id[1];

                        $ccm_related_to = getCcRelatedToName($ccm_related_to_id[0]);
                        $ccm_sub_related_to = getCcSubRelatedToName($ccm_related_to_id[1]);

                        $ccm_related_to_at_new .= "\n\t\t\t$ccm_related_to - $ccm_sub_related_to";
                        $ccm_related_to_at_p .= "\n\t\t\t{$ccm_related_to_id[0]} - {$ccm_related_to} : {$ccm_related_to_id[1]} - {$ccm_sub_related_to}";
                        if (!($ccm_rel_to_obj->insert())) {
                            return false;
                        }
                    }
                }

                $at_data['Change Related To'] = array($ccm_related_to_at_old, $ccm_related_to_at_new, $ccm_related_to_at_p);
            }

            addAuditTrailLog($cc_object_id, null, $at_data, $audit_trail_action, "Successfuly Updated");
            return true;
        }
        return false;
    }

    function get_ccm_source_doc_no($cc_object_id) {
        $obj = new DB_Public_lm_cc_master();
        $obj->get("cc_object_id", $cc_object_id);
        if ($obj->cc_triggered_from == "OTHERS") {
            $source_doc_no = array('source_doc_no' => $obj->source_doc_no, "source_doc_link" => $obj->source_doc_no);
        } else {
            $source_doc_no = array('source_doc_no' => get_qms_doc_no(null, $obj->source_doc_no)['doc_no'], "source_doc_link" => get_qms_doc_no(null, $obj->source_doc_no)['doc_link']);
        }
        return $source_doc_no;
    }

    function add_attachments_ccm($cc_object_id, $type, $usr_id, $date_time) {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];
            $file_size = $_FILES['file']['size'];
            $file_name = $_FILES['file']['name'];
            $file_name = clean_filename($file_name, 0, 50);

            $fhash = md5($tempFile);
            $hash = uniqid($fhash);

            $file_info = new SplFileInfo($_FILES['file']['name']);
            $extension = $file_info->getExtension();

            $file_id = get_object_id("definitions->object_id->workflow->ccm->file_upload");

            $file = new DB_Public_file();
            $file->object_id = $file_id;
            $file->type = $file_type;
            $file->name = $file_name;
            $file->size = $file_size;
            $file->hash = $hash . "." . $extension;
            move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
            $file->insert();

            $doc_file = new DB_Public_lm_cc_doc_file();
            $doc_file->file_id = $file_id;
            $doc_file->object_id = $cc_object_id;
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
                addAuditTrailLog($cc_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                return true;
            }
            return false;
        }
    }

    function get_ccm_related_to_list_for_edit($cc_object_id) {
        $cc_rel_master_list = getChangeRelatedToList(null, null, 'yes');

        for ($i = 0; $i < count($cc_rel_master_list); $i++) {
            $sub_related_to_details = [];
            $sub_related = $cc_rel_master_list[$i]['sub_realted_details'];
            for ($j = 0; $j < count($sub_related); $j++) {
                $is_exist = $this->isCcmRelatedSubDevRelatedExist($cc_object_id, $cc_rel_master_list[$i]['object_id'], $sub_related[$j]['object_id']);
                $sub_related_to_details[] = array('sub_related_to_id' => $sub_related[$j]['object_id'], 'sub_related_to' => $sub_related[$j]['sub_related_to_name'], 'desc' => $sub_related[$j]['description'], 'is_sub_related_exist' => $is_exist);
            }
            $dev_realted_sub_related_detais[] = array("realted_to_id" => $cc_rel_master_list[$i]['object_id'], 'realted_to' => $cc_rel_master_list[$i]['related_to'], 'desc' => $cc_rel_master_list[$i]['description'], 'sub_related_to_details' => $sub_related_to_details);
        }
        return $dev_realted_sub_related_detais;
    }

    function isCcmRelatedSubDevRelatedExist($cc_object_id, $cc_realted_id, $cc_sub_related_id) {
        $obj = new DB_Public_lm_cc_type_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(cc_object_id) = lower('$cc_object_id') and lower(cc_type_id) = lower('$cc_realted_id') and lower(cc_sub_related_to_id) = lower('$cc_sub_related_id')");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function update_cc_wf_status($object_id, $wf_status) {
        $cc_obj = new DB_Public_lm_cc_master();
        $cc_obj->whereAdd("cc_object_id='$object_id'");
        $cc_obj->wf_status = $wf_status;
        $cc_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function update_ccm_status($cc_object_id, $status) {
        $dm_status_obj = new DB_Public_lm_cc_master();
        $dm_status_obj->get("cc_object_id", $cc_object_id);
        $dm_status_obj->status = $status;
        $dm_status_obj->update();
        return true;
    }

    function get_ccm_wf_status($cc_object_id) {
        $obj = new DB_Public_lm_cc_master();
        $obj->get("cc_object_id", $cc_object_id);
        return $obj->wf_status;
    }

    function update_ccm_approval_status($cc_object_id, $status) {
        $dm_status_obj = new DB_Public_lm_cc_master();
        $dm_status_obj->get("cc_object_id", $cc_object_id);
        $dm_status_obj->approval_status = $status;
        $dm_status_obj->update();
        return true;
    }

    function get_ccm_sub_related_to_details($cc_object_id = null, $related_to_id = null, $sub_related_to_id = null) {
        $obj = new DB_Public_lm_cc_type_details();
        ($cc_object_id) ? $obj->whereAdd("cc_object_id='$cc_object_id'") : null;
        ($related_to_id) ? $obj->whereAdd("cc_type_id	='$related_to_id'") : null;
        ($sub_related_to_id) ? $obj->whereAdd("cc_sub_related_to_id='$sub_related_to_id'") : null;

        $obj->find();
        while ($obj->fetch()) {
            $sub_rel_to_array[] = array(
                'related_to' => $obj->cc_type_id,
                'related_to_name' => getCcRelatedToName($obj->cc_type_id),
                'sub_type_id' => $obj->cc_sub_related_to_id,
                'sub_type' => getCcSubRelatedToName($obj->cc_sub_related_to_id),
            );
        }
        return $sub_rel_to_array;
    }

    function get_cc_related_name_id($object_id) {
        $rel_obj = new DB_Public_lm_cc_type_master();
        $rel_obj->get("object_id", $object_id);
        return $rel_obj->type;
    }

    function get_cc_sub_related_to_name($object_id) {
        $obj = new DB_Public_lm_cc_sub_related_to_master();
        $obj->get("object_id", $object_id);
        return $obj->type;
    }

    function get_cc_sub_related_to($object_id, $related_to_id) {
        $cc_related_to_obj = new DB_Public_lm_cc_type_details();
        $cc_related_to_obj->whereAdd("cc_object_id='$object_id'");
        $cc_related_to_obj->whereAdd("cc_type_id='$related_to_id'");
        $cc_related_to_obj->find();
        while ($cc_related_to_obj->fetch()) {
            $sub_rel_to_array[] = array(
                'sub_type' => $this->get_cc_sub_related_to_name($cc_related_to_obj->cc_sub_related_to_id),
                'sub_type_id' => $cc_related_to_obj->cc_sub_related_to_id,
                'desc' => getCcSubRelatedToDesc($cc_related_to_obj->cc_sub_related_to_id)
            );
        }
        return $sub_rel_to_array;
    }

    function get_cc_changes_to($object_id) {
        $cc_type_details_obj = new DB_Public_lm_cc_type_details();
        $cc_type_details_obj->whereAdd("cc_object_id='$object_id'");
        $cc_type_details_obj->selectAdd();
        $cc_type_details_obj->selectAdd("cc_type_id,cc_object_id");
        $cc_type_details_obj->groupBy('cc_type_id,cc_object_id');
        $cc_type_details_obj->find();
        $count = 1;
        while ($cc_type_details_obj->fetch()) {
            $cc_type_details_obj_array[] = array(
                'object_id' => $cc_type_details_obj->object_id,
                'related_to' => $this->get_cc_related_name_id($cc_type_details_obj->cc_type_id),
                'related_to_id' => $cc_type_details_obj->cc_type_id,
                'cc_sub_related_to' => $this->get_cc_sub_related_to($cc_type_details_obj->cc_object_id, $cc_type_details_obj->cc_type_id)
            );
            $count++;
        }
        return $cc_type_details_obj_array;
    }

    function get_ccm_details($data = null) {
        $obj = new DB_Public_lm_cc_master();
        if ($data) {
            extract($data);
            ($cc_object_id) ? $obj->whereAdd("cc_object_id='$cc_object_id'") : null;
            ($plant_id) ? $obj->whereAdd("plant_id='$plant_id'") : null;
            ($dept) ? $obj->whereAdd("cc_department='$dept'") : null;
            ($created_by) ? $obj->whereAdd("created_by='$created_by'") : null;
            ($start_date) ? $obj->whereAdd("created_time>='$start_date'") : null;
            ($end_date) ? $obj->whereAdd("created_time<='$end_date'") : null;
            ($plant) ? $obj->whereAdd("plant_id='$plant'") : null;
            ($mat_type) ? $obj->whereAdd("material_type_id='$mat_type'") : null;
            ($pro_name) ? $obj->whereAdd("product_id='$pro_name'") : null;
            ($cc_no) ? $obj->whereAdd("cc_no='$cc_no'") : null;
            ($appr_status) ? $obj->whereAdd("approval_status='$appr_status'") : null;
            ($pro_stage) ? $obj->whereAdd("process_stage_id='$pro_stage'") : null;
            ($classification) ? $obj->whereAdd("classification='$classification'") : null;
            ($change_type) ? $obj->whereAdd("change_type_id='$change_type'") : null;
            ($wf_status) ? $obj->whereAdd("wf_status='$wf_status'") : null;
            ($status) ? $obj->whereAdd("status='$status'") : null;
        }
        $count = 1;
        $obj->orderBy('created_time');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $ccm_list[] = array(
                    'cc_object_id' => $obj->cc_object_id,
                    'lm_doc_id' => $obj->lm_doc_id,
                    'lm_doc_name' => getLmDocName($obj->lm_doc_id),
                    'cc_department' => $obj->cc_department,
                    'cc_department_name' => getDepartment($obj->cc_department),
                    'cc_no' => $obj->cc_no,
                    'brief_desc' => $obj->brief_desc,
                    'present_system' => $obj->present_system,
                    'proposed_change' => $obj->proposed_change,
                    'impact_assessment' => $obj->impact_assessment,
                    'justification' => $obj->justification,
                    'excpected_benifits' => $obj->excpected_benifits,
                    'proposed_methodology' => $obj->proposed_methodology,
                    'change_follow_up' => $obj->change_follow_up,
                    'change_effectiveness_in_doc' => $obj->change_effectiveness_in_doc,
                    'change_effectiveness_in_conseq_doc' => $obj->change_effectiveness_in_conseq_doc,
                    'batch_no' => $obj->batch_no,
                    'process_stage_id' => $obj->process_stage_id,
                    'process_stage_name' => getProcessStage($obj->process_stage_id),
                    'scope' => $obj->scope,
                    'market_name' => getMarketName($obj->scope),
                    'classification' => $obj->classification,
                    'classification_name' => display_hypen_if_null(getClassificationName($obj->classification)),
                    'approval_status' => display_hypen_if_null($obj->approval_status),
                    'status' => $obj->status,
                    'created_by' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => display_datetime_format($obj->created_time),
                    'modified_by' => $obj->modified_by,
                    'modified_by_name' => getFullName($obj->modified_by),
                    'modified_time' => display_datetime_format($obj->modified_time),
                    'rejected_reason' => $obj->rejected_reason,
                    'is_meeting_required' => $obj->is_meeting_required,
                    'manu_date' => display_date_format($obj->manu_date),
                    'manu_expiry_date' => display_date_format($obj->manu_expiry_date),
                    'customer' => $obj->customer,
                    'customer_name' => getCustomerName($obj->customer),
                    'product_id' => $obj->product_id,
                    'product_name' => getProductName($obj->product_id),
                    'target_date' => display_hypen_if_null(display_date_format($obj->target_date)),
                    'target_date1' => $obj->target_date,
                    'plant_id' => $obj->plant_id,
                    'plant_name' => getPlantName($obj->plant_id),
                    'lot_no' => $obj->lot_no,
                    'batch_size' => $obj->batch_size,
                    'material_type_id' => $obj->material_type_id,
                    'material_type_name' => getMaterialType($obj->material_type_id),
                    'material_name' => $obj->material_name,
                    'close_out_date' => display_hypen_if_null(display_date_format($obj->close_out_date)),
                    'cc_type_id' => $obj->change_type_id,
                    'cc_type_name' => getChangeType($obj->change_type_id),
                    'is_task_required' => $obj->is_task_required,
                    'is_training_required' => $obj->is_training_required,
                    'effectiveness_date' => display_date_format($obj->effectiveness_date),
                    'is_online_exam_required' => $obj->is_online_exam_required,
                    'is_exam_required' => $obj->is_online_exam_required,
                    'meeting_target_date' => display_date_format($obj->meeting_target_date),
                    'training_target_date' => display_date_format($obj->training_target_date),
                    'exam_target_date' => display_date_format($obj->exam_target_date),
                    'task_target_date' => display_date_format($obj->task_target_date),
                    'meeting_status' => $obj->meeting_status,
                    'training_status' => $obj->training_status,
                    'exam_status' => $obj->exam_status,
                    'task_status' => $obj->task_status,
                    'wf_status' => $obj->wf_status,
                    'estimated_cost' => $obj->estimated_cost,
                    'dmf_status' => $obj->dmf_status,
                    'source_doc_no' => $obj->source_doc_no,
                    'is_cutomer_approval_required' => $obj->is_cutomer_approval_required,
                    'is_regulatory_approval_required' => $obj->is_regulatory_approval_required,
                    'is_monitoring_required' => $obj->is_monitoring_required,
                    'monitoring_target_date' => display_date_format($obj->monitoring_target_date),
                    'close_out_comments' => $obj->close_out_comments,
                    'dmf_desc' => $obj->dmf_desc,
                    'customer_approval_status' => $obj->customer_approval_status,
                    'eff_of_change_in_doc' => $obj->change_effectiveness_in_doc,
                    'reason' => $obj->reason,
                    'trigger_type' => $obj->trigger_type,
                    'task_qa_review' => $obj->task_qa_review,
                    'completed_date' => display_hypen_if_null($obj->completed_date),
                    'doc_link' => get_qms_doc_no("ccm", $obj->cc_object_id)["doc_link"],
                    'count' => $count,
                );
                $count++;
            }
            return $ccm_list;
        }
        return null;
    }

    function add_ccm_review_comments($cc_object_id, $review_comments, $usr_id, $date_time, $audit_trail_action, $review_stage) {
        $object_id = get_object_id("definitions->object_id->workflow->ccm->review_comments");

        $obj = new DB_Public_lm_cc_review_comments();
        $obj->object_id = $object_id;
        $obj->cc_object_id = $cc_object_id;
        $obj->remarks = $review_comments;
        $obj->review_stage = $review_stage;
        $obj->created_by = trim($usr_id);
        $obj->created_time = $date_time;
        if ($obj->insert()) {
            $commented_by = getFullName($usr_id);
            $at_data['Comments'] = array('NA', $review_comments, $review_comments);
            $at_data['Given By'] = array('NA', $commented_by, "$usr_id - $commented_by");
            addAuditTrailLog($cc_object_id, null, $at_data, $audit_trail_action, 'Successfully Updated');
            return true;
        }
        return false;
    }

    function get_ccm_mgmt_review_comments($cc_object_id, $created_by = null, $review_stage = null) {
        $obj = new DB_Public_lm_cc_review_comments();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        (!empty($created_by)) ? $obj->whereAdd("created_by='$created_by'") : null;
        (!empty($review_stage)) ? $obj->whereAdd("review_stage='$review_stage'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $cmt_array[] = array(
                    'object_id' => $obj->object_id,
                    'cc_object_id' => $obj->cc_object_id,
                    'user_name' => getFullName($obj->created_by),
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
            return $cmt_array;
        }
        return false;
    }

    function update_ccm_closeout($cc_object_id, $wf_status, $status, $approval_status, $rejected_reason, $close_out_date) {
        $obj = new DB_Public_lm_cc_master();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function decide_meeting_training_task($cc_object_id, $creator, $approver, $mail_heading, $mail_link_btn) {
        $obj = new DB_Public_lm_cc_master();
        $obj->get("cc_object_id", $cc_object_id);

        $lm_doc_short_name = getLmDocShortName($obj->lm_doc_id);
        $is_meeting_required = $obj->is_meeting_required;
        $is_training_required = $obj->is_training_required;
        $is_task_required = $obj->is_task_required;
        $cc_no = $obj->cc_no;

        $meeting_status = $obj->meeting_status;
        $training_status = $obj->training_status;
        $task_status = $obj->task_status;

        if ($is_meeting_required == "yes" && $meeting_status == "Pending") {
            $cc_status = "Pending for Meeting Schedule";
            add_worklist($creator, $cc_object_id);
            save_workflow($cc_object_id, $creator, 'Pending', 'meeting');
        } elseif (($is_meeting_required == "no" || $meeting_status != "Pending") && ($is_training_required == "yes" && $training_status == "Pending")) {
            $cc_status = "Pending for Trainer Assignment";
            add_worklist($creator, $cc_object_id);
            save_workflow($cc_object_id, $creator, 'Pending', 'to_assign_trainer');
        } elseif (($is_meeting_required == "no" || $meeting_status != "Pending") && ($is_training_required == "no" || $training_status != "Pending") && ($is_task_required == "yes" && $task_status == "Pending")) {
            $cc_status = "Pending for Task Creation";
            add_worklist($creator, $cc_object_id);
            save_workflow($cc_object_id, $creator, 'Pending', 'to_assign_task');
        } elseif (($is_meeting_required == "no" || $meeting_status != "Pending") && ($is_training_required == "no" || $training_status != "Pending") && ($is_task_required == "no" && $task_status != "Pending")) {
            $cc_status = "Pending Close Out";
            add_worklist($approver, $cc_object_id);
            save_workflow($cc_object_id, $approver, 'Pending', 'close_out');
            $mail_send_to_approver = true;
        }
        $this->update_cc_wf_status($cc_object_id, $cc_status);

        //**** Send Mail**//
        $subject = "$lm_doc_short_name | $cc_no | $cc_status | [Action Required]";
        $actionDescription = "The $lm_doc_short_name is $cc_status";
        $mail_details = [
            "Change Control No." => $cc_no,
            "Status" => $cc_status,
            "Sent By" => $_SESSION['full_name']
        ];
        if ($mail_send_to_approver) {
            send_workflow_mail($approver, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
        } else {
            send_workflow_mail($creator, $subject, $actionDescription, $mail_heading, $mail_details, $mail_link_btn);
        }
        return true;
    }

    function get_ccm_cancelled_details($cc_object_id) {
        $cancel_obj = new DB_Public_lm_cc_cancel_details();
        $cancel_obj->whereAdd("cc_object_id='$cc_object_id'");
        if ($cancel_obj->find()) {
            while ($cancel_obj->fetch()) {
                $cancel_details[] = array(
                    'cc_object_id' => $cancel_obj->cc_object_id,
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

    function add_ccm_affc_doc_details($cc_object_id, $doc_arr) {
        for ($i = 0; $i < count($doc_arr); $i++) {
            $object_id = get_object_id("definitions->object_id->workflow->ccm->affected_doc");

            $obj = new DB_Public_lm_cc_affected_doc_details();
            $obj->object_id = $object_id;
            $obj->cc_object_id = $cc_object_id;
            $obj->affected_doc_id = $doc_arr[$i];
            if ($obj->insert()) {
                $doc_at_n .= "\n\t\t\t" . getCcAffectedDocName($doc_arr[$i]);
                $doc_at_p .= "\n\t\t\t" . $doc_arr[$i] . " - " . getCcAffectedDocName($doc_arr[$i]);
            } else {
                return false;
            }
        }
        //**** Audit Trail**//
        $at_data['CCM Affected Document'] = array('NA', $doc_at_n, $doc_at_p);
        addAuditTrailLog($cc_object_id, null, $at_data, $_REQUEST['audit_trail_action'], 'Sucessfully Added');
        return true;
    }

    function get_ccm_affected_doc($object_id) {
        $obj = new DB_Public_lm_cc_affected_doc_details();
        $obj->whereAdd("cc_object_id='$object_id'");
        $obj->find();
        $count = 1;
        while ($obj->fetch()) {
            $doc_array[] = array('object_id' => $obj->object_id, 'doc_name' => getCcAffectedDocName($obj->affected_doc_id), 'description' => getCcAffectedDocDesc($obj->affected_doc_id), 'count' => $count);
            $count++;
        }
        return $doc_array;
    }

    function update_ccm_meeting_training_exam_task_status($cc_object_id, $type, $status) {
        $obj = new DB_Public_lm_cc_master();
        $obj->whereAdd("cc_object_id='$cc_object_id'");

        ($type == "meeting") ? $obj->meeting_status = $status : false;
        ($type == "training") ? $obj->training_status = $status : false;
        ($type == "exam") ? $obj->exam_status = $status : false;
        ($type == "task") ? $obj->task_status = $status : false;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function delete_ccm_related_to($cc_object_id) {
        $realted_to_obj = new DB_Public_lm_cc_type_details();
        $realted_to_obj->whereAdd("cc_object_id='$cc_object_id'");
        $realted_to_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_ccm_workflow_remarks($object_id, $remarks_user) {
        $ccm_remarks = new DB_Public_lm_cc_remarks();
        $ccm_remarks->whereAdd("object_id='$object_id'");
        if (!empty($remarks_user)) {
            $ccm_remarks->whereAdd("remarks_user='$remarks_user'");
        }
        $ccm_remarks->find();
        while ($ccm_remarks->fetch()) {
            $ccm_remarks_array[] = array('username' => getFullName($ccm_remarks->remarks_user), 'department_name' => getDeptName($ccm_remarks->remarks_user), 'remarks' => trim($ccm_remarks->remarks), 'date_time' => get_modified_date_time_format($ccm_remarks->remarks_date));
        }
        return $ccm_remarks_array;
    }

    function get_ccm_review_comments($object_id, $created_by) {
        $ccm_remarks = new DB_Public_lm_cc_review_comments();
        $ccm_remarks->whereAdd("cc_object_id='$object_id'");

        if (!empty($created_by)) {
            $ccm_remarks->whereAdd("created_by='$created_by'");
        }
        $ccm_remarks->find();
        while ($ccm_remarks->fetch()) {
            $ccm_remarks_array[] = array(
                'username' => getFullName($ccm_remarks->created_by),
                'department_name' => getDeptName($ccm_remarks->created_by),
                'remarks' => trim($ccm_remarks->remarks),
                'date_time' => get_modified_date_time_format($ccm_remarks->created_time),
                'designation' => getDesignationByUserId($ccm_remarks->created_by)
            );
        }
        return $ccm_remarks_array;
    }

    function show_ccm_extension_btn_for($cc_object_id) {
        $obj = new DB_Public_lm_cc_master();
        $obj->get("cc_object_id", $cc_object_id);
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
                return "show_task_ex_btn";
            }
            if (($obj->is_meeting_required === "no" || $obj->meeting_status === "Completed") && ($obj->is_training_required === "no" || $obj->training_status === "Completed") && ($obj->is_online_exam_required === "no" || $obj->exam_status === "Completed") && ($obj->is_task_required === "no" || $obj->task_status === "Completed")) {
                return "show_closeout_ext_btn";
            }
        }
    }

    function is_all_fields_in_edit_tab_completed_ccm($cc_object_id) {
        $ccm_master_obj = new DB_Public_lm_cc_master();
        $ccm_master_obj->get("cc_object_id", $cc_object_id);
        if (($ccm_master_obj->change_type_id != '') && ($ccm_master_obj->classification != '') && ($ccm_master_obj->dmf_status != '') && ($ccm_master_obj->brief_desc != '') && ($ccm_master_obj->present_system != '') && ($ccm_master_obj->proposed_change != '') && ($ccm_master_obj->justification != '') && ($ccm_master_obj->excpected_benifits != '') && ($ccm_master_obj->estimated_cost != '') && !empty($this->get_cc_changes_to($cc_object_id))) {
            return true;
        }
        return false;
    }

    //---------Start Of Meeting Functions----------------------------//
    function add_ccm_meeting_schedule($cc_object_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $participants, $meeting_agenda, $usr_id, $date_time) {
        $meeting_sched_id = get_object_id("definitions->object_id->meeting->ccm->meeting_schedule");

        $obj = new DB_Public_lm_cc_meeting_schedule();
        $obj->object_id = $meeting_sched_id;
        $obj->cc_object_id = $cc_object_id;
        $obj->meeting_date = $meeting_date;
        $obj->meeting_time = $meeting_time;
        $obj->venue = $meeting_venue;
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        $obj->modified_by = $usr_id;
        $obj->modified_time = $date_time;
        $obj->status = "pending";
        $obj->is_latest = "yes";
        $obj->meeting_link = trim($meeting_link);
        if ($obj->insert()) {
            $at_data['Meeting Date'] = array('NA', get_modified_date_format($meeting_date), get_modified_date_format($meeting_date));
            $at_data['Meeting Time'] = array('NA', $meeting_time, $meeting_time);
            $at_data['Meeting Venue'] = array('NA', $meeting_venue, $meeting_venue);
            $at_data['Scheduled By'] = array('NA', getFullName($usr_id), "{$usr_id} - " . getFullName($usr_id));
            addAuditTrailLog($cc_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');

            $this->add_ccm_meeting_participants_details($participants, $cc_object_id, $meeting_sched_id, null, $usr_id, $date_time);

            //Meeting Agenda
            for ($i = 0; $i < count($meeting_agenda); $i++) {
                $object_id = $object_id = get_object_id("definitions->object_id->meeting->ccm->meeting_agenda");

                $obj = new DB_Public_lm_cc_meeting_agenda_details();
                $obj->object_id = $object_id;
                $obj->cc_object_id = $cc_object_id;
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

    function update_ccm_meeting_schedule($cc_object_id, $meeting_id, $meeting_date, $meeting_time, $meeting_venue, $meeting_link, $reason, $usr_id, $date_time) {
        //old_obj
        $old_obj = new DB_Public_lm_cc_meeting_schedule();
        $old_obj->get("object_id", $meeting_id);

        //update_obj
        $u_obj = new DB_Public_lm_cc_meeting_schedule();
        $u_obj->whereAdd("object_id='$meeting_id'");
        $u_obj->whereAdd("cc_object_id='$cc_object_id'");
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
            addAuditTrailLog($cc_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Successfully Updated');
            return true;
        } else {
            return false;
        }
    }

    function get_ccm_meeting_details($cc_object_id = null, $meeting_id = null, $is_latest = 'yes') {
        $obj = new DB_Public_lm_cc_meeting_schedule();
        ($cc_object_id) ? $obj->whereAdd("cc_object_id='$cc_object_id'") : false;
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
                    'cc_object_id' => $obj->cc_object_id,
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

    function update_ccm_meeting_conclusion($cc_object_id, $meeting_id, $meeting_agenda_id, $meeting_conclusion, $date_time) {
        for ($i = 0; $i < count($meeting_conclusion); $i++) {
            $obj = new DB_Public_lm_cc_meeting_agenda_details();
            $obj->whereAdd("cc_object_id='$cc_object_id'");
            $obj->whereAdd("object_id='$meeting_agenda_id[$i]'");
            $obj->whereAdd("meeting_object_id='$meeting_id'");
            $obj->conclusion = $meeting_conclusion[$i];
            $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $mobj = new DB_Public_lm_cc_meeting_schedule();
        $mobj->whereAdd("cc_object_id='$cc_object_id'");
        $obj->whereAdd("object_id='$meeting_id'");
        $mobj->status = "completed";
        $mobj->modified_time = $date_time;
        $mobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function add_ccm_meeting_participants_details($participants, $cc_object_id, $meeting_sched_id, $reason, $usr_id, $date_time) {
        $old_participant = $this->get_ccm_meeting_participant_details(null, $cc_object_id, null, null);
        if ($old_participant) {
            for ($i = 0; $i < count($old_participant); $i++) {
                $old_participant_at_old .= "\n\t\t\t" . $old_participant[$i]['participant'];
            }
        } else {
            $old_participant_at_old = "NA";
        }

        //Meeting Participants
        for ($i = 0; $i < count($participants); $i++) {
            $participant_id = get_object_id("definitions->object_id->meeting->ccm->meeting_participant");
            $p_obj = new DB_Public_lm_cc_participant();
            $p_obj->object_id = $participant_id;
            $p_obj->cc_object_id = $cc_object_id;
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
        addAuditTrailLog($cc_object_id, $meeting_sched_id, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
    }

    function get_ccm_meeting_participant_details($object_id = null, $cc_object_id = null, $participant_id = null, $meeting_sch_id = null) {
        $obj = new DB_Public_lm_cc_participant();
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($cc_object_id) ? $obj->whereAdd("cc_object_id='$cc_object_id'") : false;
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

    function get_ccm_meeting_agenda_details($cc_object_id) {
        $obj = new DB_Public_lm_cc_meeting_agenda_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function add_ccm_meeting_attendee_details($cc_object_id, $meeting_id, $attendees, $usr_id, $date_time) {
        $old_attendees = $this->get_ccm_meeting_attendee_details($cc_object_id, null);
        if ($old_attendees) {
            for ($i = 0; $i < count($old_attendees); $i++) {
                $old_attendees_at_old .= "\n\t\t\t" . $old_attendees[$i]['attendee'];
            }
        } else {
            $old_attendees_at_old = "NA";
        }

        for ($i = 0; $i < count($attendees); $i++) {
            $att_id = get_object_id("definitions->object_id->meeting->ccm->meeting_attendee");
            $attendee_obj = new DB_Public_lm_cc_attendee();
            $attendee_obj->object_id = $att_id;
            $attendee_obj->meeting_object_id = $meeting_id;
            $attendee_obj->cc_object_id = $cc_object_id;
            $attendee_obj->attendee_id = $attendees[$i];
            $attendee_obj->created_by = $usr_id;
            $attendee_obj->created_time = $date_time;

            $attendee_presesnt = $this->get_ccm_meeting_attendee_details($cc_object_id, $attendees[$i]);
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
            addAuditTrailLog($cc_object_id, $meeting_id, $at_data, $_POST['audit_trail_action'], 'Succesfully Added');
        }
        return true;
    }

    function get_ccm_meeting_attendee_details($cc_object_id, $attendee_id = null) {
        $obj = new DB_Public_lm_cc_attendee();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function extend_ccm_target_dates($cc_object_id, $extension_for, $proposed_date) {
        $ccm_details = new DB_Public_lm_dm_master();
        $ccm_details->get("cc_object_id", $cc_object_id);

        $uobj = new DB_Public_lm_cc_master();
        $uobj->whereAdd("cc_object_id='$cc_object_id'");
        if ($extension_for === "meeting") {
            if ($ccm_details->is_meeting_required === "yes" && $ccm_details->meeting_target_date && $ccm_details->meeting_status == "Pending") {
                $pm_extended_days = dateDiffInDays($ccm_details->meeting_target_date, $proposed_date);
                $p_meeting_date = $proposed_date;
                $at_data['Meeting Target Date'] = array($ccm_details->meeting_target_date, $p_meeting_date, $p_meeting_date);
                $uobj->meeting_target_date = $p_meeting_date;
                if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "training")) {
                    $p_training_date = getModifiedDateFormat("Y-m-d", $ccm_details->training_target_date, 0, 0, $pm_extended_days);
                    $uobj->training_target_date = $p_training_date;
                    $at_data['Training Target Date'] = array($ccm_details->training_target_date, $p_training_date, $p_training_date);
                }
                if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "exam")) {
                    $p_exam_date = getModifiedDateFormat("Y-m-d", $ccm_details->exam_target_date, 0, 0, $pm_extended_days);
                    $uobj->exam_target_date = $p_exam_date;
                    $at_data['Exam Target Date'] = array($ccm_details->exam_target_date, $p_exam_date, $p_exam_date);
                }
                if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "task")) {
                    $p_task_date = getModifiedDateFormat("Y-m-d", $ccm_details->task_target_date, 0, 0, $pm_extended_days);
                    $uobj->task_target_date = $p_task_date;
                    $at_data['Task Target Date'] = array($ccm_details->task_target_date, $p_task_date, $p_task_date);
                }
                $p_close_out_date = getModifiedDateFormat("Y-m-d", $ccm_details->target_date1, 0, 0, $pm_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($ccm_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($cc_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "training") {
            if ($ccm_details->is_training_required === "yes" && $ccm_details->training_target_date && $ccm_details->training_status == "Pending") {
                $pt_extended_days = dateDiffInDays($ccm_details->meeting_target_date, $proposed_date);
                $p_training_date = $proposed_date;
                $at_data['Training Target Date'] = array($ccm_details->training_target_date, $p_training_date, $p_training_date);
                $uobj->training_target_date = $p_training_date;
                if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "exam")) {
                    $p_exam_date = getModifiedDateFormat("Y-m-d", $ccm_details->exam_target_date, 0, 0, $pt_extended_days);
                    $uobj->exam_target_date = $p_exam_date;
                    $at_data['Exam Target Date'] = array($ccm_details->exam_target_date, $p_exam_date, $p_exam_date);
                }
                if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "task")) {
                    $p_task_date = getModifiedDateFormat("Y-m-d", $ccm_details->task_target_date, 0, 0, $pt_extended_days);
                    $uobj->task_target_date = $p_task_date;
                    $at_data['Task Target Date'] = array($ccm_details->task_target_date, $p_task_date, $p_task_date);
                }
                $p_close_out_date = getModifiedDateFormat("Y-m-d", $ccm_details->target_date1, 0, 0, $pt_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($ccm_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($cc_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "exam") {
            if ($ccm_details->is_online_exam_required === "yes" && $ccm_details->exam_target_date && $ccm_details->exam_status == "Pending") {
                $pe_extended_days = dateDiffInDays($ccm_details->meeting_target_date, $proposed_date);
                $p_exam_date = $proposed_date;
                $at_data['Exam Target Date'] = array($ccm_details->exam_target_date, $p_exam_date, $p_exam_date);
                $uobj->exam_target_date = $p_exam_date;
                if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "task")) {
                    $p_task_date = getModifiedDateFormat("Y-m-d", $ccm_details->task_target_date, 0, 0, $pe_extended_days);
                    $uobj->task_target_date = $p_task_date;
                    $at_data['Task Target Date'] = array($ccm_details->task_target_date, $p_task_date, $p_task_date);
                }
                $p_close_out_date = getModifiedDateFormat("Y-m-d", $ccm_details->target_date1, 0, 0, $pe_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($ccm_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($cc_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "task") {
            if ($ccm_details->is_task_required === "yes" && $ccm_details->task_target_date && $ccm_details->task_status == "Pending") {
                $task_target_date = $proposed_date;
                $uobj->task_target_date = $task_target_date;
                $at_data['Task Target Date'] = array($ccm_details->task_target_date, $task_target_date, $task_target_date);

                $p_close_out_date = getModifiedDateFormat("Y-m-d", $ccm_details->target_date1, 0, 0, $pm_extended_days);
                $uobj->target_date = $p_close_out_date;
                $at_data['Close-out Target Date'] = array($ccm_details->target_date1, $p_close_out_date, $p_close_out_date);
                $uobj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                addAuditTrailLog($cc_object_id, null, $at_data, "Extension", 'Successfully Extended');
            }
            return true;
        }
        if ($extension_for === "close_out") {
            $target_date = $proposed_date;
            $uobj->target_date = $target_date;
            if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_data['Close-out Target Date'] = array($ccm_details->target_date1, $target_date, $target_date);
                addAuditTrailLog($cc_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
                return true;
            }
            return false;
        }
        if ($extension_for === "monitoring") {
            $target_date = $proposed_date;
            $uobj->monitoring_target_date = $target_date;
            if ($uobj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $at_data['Monitoring Target Date'] = array($ccm_details->monitoring_target_date, $target_date, $target_date);
                addAuditTrailLog($cc_object_id, null, $at_data, "Extension - Traget Date", 'Successfully Extended');
                return true;
            }
            return false;
        }
    }

    function show_extended_ccm_target_date_details($cc_object_id, $extension_for, $proposed_date) {
        $obj = new DB_Public_lm_cc_master();
        $obj->get("cc_object_id", $cc_object_id);
        $p_extended_days = '';
        if ($extension_for === "meeting") {
            $p_extended_days = dateDiffInDays($obj->meeting_target_date, $proposed_date);
            $date_obj->date1['name'] = "Meeting";
            $date_obj->date1['from'] = get_modified_date_format($obj->meeting_target_date);
            $date_obj->date1['to'] = get_modified_date_format($proposed_date);
            if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "training")) {
                $date_obj->date2['name'] = "Training";
                $date_obj->date2['from'] = get_modified_date_format($obj->training_target_date);
                $date_obj->date2['to'] = getModifiedDateFormat("d/m/Y", $obj->training_target_date, 0, 0, $p_extended_days);
            }
            if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "training")) {
                $date_obj->date3['name'] = "Exam";
                $date_obj->date3['from'] = get_modified_date_format($obj->exam_target_date);
                $date_obj->date3['to'] = getModifiedDateFormat("d/m/Y", $obj->exam_target_date, 0, 0, $p_extended_days);
            }
            if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "task")) {
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
            if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "exam")) {
                $date_obj->date2['name'] = "Exam";
                $date_obj->date2['from'] = get_modified_date_format($obj->exam_target_date);
                $date_obj->date2['to'] = getModifiedDateFormat("d/m/Y", $obj->exam_target_date, 0, 0, $p_extended_days);
            }
            if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "task")) {
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
            if ($this->is_ccm_meeting_training_exam_task_required($cc_object_id, "task")) {
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

    function is_ccm_meeting_training_exam_task_required($cc_object_id, $type) {
        $obj = new DB_Public_lm_cc_master();
        if ($obj->get("cc_object_id", $cc_object_id)) {
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

    //---------End Of Meeting Functions----------------------------//
    //---------Start Of Training Functions----------------------------// 

    function assign_ccm_trainers($cc_object_id, $title, $trainers, $target_date, $usr_id, $date_time) {
        $training_dtls_n = $training_dtls_p = "";
        $i = 0;
        foreach ($trainers as $trainers_id) {
            $trainer_at_n = $trainer_at_p = "";
            //    $trainers_array = ($trainers_id) ? array_unique($trainers_id) : null;
            $trainers_array[] = $trainers_id;
            for ($j = 0; $j < count($trainers_array); $j++) {
                $object_id = get_object_id("definitions->object_id->training->ccm->trainer");
                $obj = new DB_Public_lm_cc_trainer_details();
                $obj->object_id = $object_id;
                $obj->cc_object_id = $cc_object_id;
                $obj->trainer = $trainers_array[$j];
                $obj->title = $title[$i];
                $obj->status = "Pending";
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                $obj->modified_by = $usr_id;
                $obj->modified_time = $date_time;
                $obj->is_latest = "yes";
                if ($obj->insert()) {
                    add_worklist($trainers_array[$j], $cc_object_id);
                    save_workflow($cc_object_id, $trainers_array[$j], 'Pending', 'training');

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
        addAuditTrailLog($cc_object_id, null, $at_data, $_POST['audit_trail_action'], 'Trainer Assigned');
        return true;
    }

    function replace_ccm_trainer_details($cc_object_id, $trainer, $replaced_by, $usr_id, $date_time) {
        $training_obj = new DB_Public_lm_cc_trainer_details();
        $training_obj->whereAdd("cc_object_id='$cc_object_id'");
        $training_obj->whereAdd("trainer='$trainer'");
        $training_obj->find();
        while ($training_obj->fetch()) {
            $sch_obj = new DB_Public_lm_cc_training_schedule();
            $sch_obj->whereAdd("cc_object_id='$cc_object_id'");
            $sch_obj->whereAdd("trainer_object_id='$training_obj->object_id'");
            $sch_obj->scheduled_by = $replaced_by;
            $sch_obj->modified_by = $usr_id;
            $sch_obj->modified_time = $date_time;
            $sch_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        }
        $utraining_obj = new DB_Public_lm_cc_trainer_details();
        $utraining_obj->whereAdd("cc_object_id='$cc_object_id'");
        $utraining_obj->whereAdd("trainer='$trainer'");
        $utraining_obj->trainer = $replaced_by;
        $utraining_obj->modified_by = $usr_id;
        $utraining_obj->modified_time = $date_time;
        $utraining_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_ccm_training_details($cc_object_id, $training_object_id = null, $trainer_id = null, $status = null) {
        $obj = new DB_Public_lm_cc_trainer_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        ($training_object_id) ? $obj->whereAdd("object_id='$training_object_id'") : false;
        ($trainer_id) ? $obj->whereAdd("trainer='$trainer_id'") : false;
        ($status) ? $obj->whereAdd("status='$status'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $schedule_details = $this->get_ccm_training_schedule_details($cc_object_id, null, $obj->object_id);
                $trainers_array[] = array(
                    'object_id' => $obj->object_id,
                    'cc_object_id' => $obj->cc_object_id,
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

    function is_ccm_elegible_for_training_schedule($cc_object_id, $trainer) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            return false;
        }
        return true;
    }

    function add_ccm_training_schedule($cc_object_id, $trainer_object_id, $training_date, $training_time, $venue, $session, $training_link, $training_invitees, $usr_id, $date_time) {
        $training_dtls_n = $training_dtls_p = "";
        //$i=trainer wise assigned title by creator object_id ---( 1d_array eg : $trainer_object_id[0]=ccm_training_sch:373665)
        for ($i = 0; $i < count($trainer_object_id); $i++) {
            //Add training Schedule details ---( 2d_array eg : $title[0][]=title1  )
            //$j=Training Title/remarks for each schedulue
            for ($j = 0; $j < count($session[$i]); $j++) {
                $object_id = get_object_id("definitions->object_id->training->ccm->training_schedule");
                $obj = new DB_Public_lm_cc_training_schedule();
                $obj->object_id = $object_id;
                $obj->cc_object_id = $cc_object_id;
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
                    //Add Invites --- ( 3d_array with random index eg : $training_invitees=[ccm_training_sch:373665][99][]   )
                    $invitees_at_n = $invitees_at_p = "";
                    $invitees_array = array_unique($training_invitees[$trainer_object_id[$i]][$j]);
                    if ($invitees_array) {
                        foreach ($invitees_array as $invitees_id) {
                            $invite_obj = new DB_Public_lm_cc_training_schedule_mail();
                            $invite_obj->cc_object_id = $cc_object_id;
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
        addAuditTrailLog($cc_object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfully Scheduled');
        return true;
    }

    function get_ccm_training_schedule_details($cc_object_id, $object_id = null, $trainer_object_id = null, $scheduled_by = null, $status = null) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        ($object_id) ? $obj->whereAdd("object_id='$object_id'") : false;
        ($trainer_object_id) ? $obj->whereAdd("trainer_object_id='$trainer_object_id'") : false;
        ($scheduled_by) ? $obj->whereAdd("scheduled_by='$scheduled_by'") : false;
        ($status) ? $obj->whereAdd("status='$status'") : false;
        $obj->orderBy('training_date,training_time');
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $participants = $this->get_ccm_training_participants_details($cc_object_id, $obj->object_id);
                $attendees = $this->get_ccm_training_attendee_details($cc_object_id, $obj->object_id, null);
                $training_sch_array[] = array(
                    'object_id' => $obj->object_id,
                    'cc_object_id' => $obj->cc_object_id,
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

    function get_ccm_training_participants_details($cc_object_id, $training_sch_id = null) {
        $obj = new DB_Public_lm_cc_training_schedule_mail();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        ($training_sch_id) ? $obj->whereAdd("training_sch_id='$training_sch_id'") : false;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $trainees[] = array(
                    'trainee_name' => getFullName($obj->mail_send_to),
                    'training_sch_id' => $obj->training_sch_id,
                    'trainee' => $obj->mail_send_to,
                    'trainee_dept' => getDeptName($obj->mail_send_to),
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

    function get_ccm_eligible_rescheduled_training_details($cc_object_id, $trainer, $date_time) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if ($this->is_ccm_eligible_for_training_reschedule_by_schedule_id($cc_object_id, $obj->object_id, $date_time)) {
                    $trainees[] = array(
                        'object_id' => $obj->object_id,
                        'cc_object_id' => $obj->cc_object_id,
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

    function update_ccm_training_reschedule_details($cc_object_id, $training_sch_id, $training_date, $training_time, $venue, $reason, $usr_id, $date_time) {
        $training_sch_o = $training_sch_n = $training_sch_p = "";
        for ($i = 0; $i < count($training_sch_id); $i++) {
            if ($this->is_ccm_eligible_for_training_reschedule_by_schedule_id($cc_object_id, $training_sch_id[$i], $date_time)) {
                //old_obj
                $old_obj = new DB_Public_lm_cc_training_schedule();
                $old_obj->get("object_id", $training_sch_id[$i]);

                $obj = new DB_Public_lm_cc_training_schedule();
                $obj->whereAdd("cc_object_id='$cc_object_id'");
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
            $at_data['Training Rescheduled Details '] = array($training_sch_o, $training_sch_n, $training_sch_p);
            $at_data['Reason'] = array("NA", $reason, $reason);
            addAuditTrailLog($cc_object_id, null, $at_data, $_POST['audit_trail_action'], 'Successfully Rescheduled');
        }
        return true;
    }

    function is_ccm_eligible_for_training_reschedule_by_trainer($cc_object_id, $trainer, $date_time) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function is_ccm_eligible_for_training_reschedule_by_schedule_id($cc_object_id, $schedule_id, $date_time) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function is_ccm_elegible_for_update_training_details($cc_object_id, $trainer, $date_time) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function is_ccm_elegible_for_training_completion($cc_object_id, $trainer) {
        $obj = new DB_Public_lm_cc_training_schedule();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        $obj->whereAdd("scheduled_by='$trainer'");
        if ($obj->find()) {
            while ($obj->fetch()) {
                if (empty($this->get_ccm_training_attendee_details($cc_object_id, $obj->object_id, null))) {
                    return false;
                }
            }
        }
        return true;
    }

    function get_ccm_elegible_training_details_for_update($cc_object_id, $trainer, $status, $date_time) {
        $training_details = $this->get_ccm_training_details($cc_object_id, null, $trainer, $status);
        for ($i = 0; $i < count($training_details); $i++) {
            $schedule_details = $training_details[$i]['schedule_details'];
            $schedule_details_list = [];
            foreach ($schedule_details as $val) {
                if ($this->is_ccm_eligible_for_training_reschedule_by_schedule_id($cc_object_id, $val['object_id'], $date_time) === false) {
                    $schedule_details_list[] = array('schedule_id' => $val['object_id'], 'session' => $val['session'], 'training_date' => $val['training_date'], 'training_time' => $val['training_time']);
                }
            }
            if ($schedule_details_list) {
                $elegible_training_details[] = array('title' => $training_details[$i]['title'], 'trainer_object_id' => $training_details[$i]['object_id'], 'schedule_details' => $schedule_details_list);
            }
        }
        return $elegible_training_details;
    }

    function get_ccm_unique_attendess_details_for_attendence($cc_object_id, $schedule_id) {
        $training_details = $this->get_ccm_training_schedule_details($cc_object_id, $schedule_id);
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

    function update_ccm_training_attendee_details($cc_object_id, $training_sch_id, $attendees, $usr_id, $date_time) {
        if ($this->is_ccm_eligible_for_training_reschedule_by_schedule_id($cc_object_id, $training_sch_id, $date_time) == false) {
            $attendees_at_n = $attendees_at_p = '';

            $old_attendees = $this->get_ccm_training_attendee_details($cc_object_id, $training_sch_id);
            if ($old_attendees) {
                for ($i = 0; $i < count($old_attendees); $i++) {
                    $old_attendees_at_old .= "\n\t\t\t" . $old_attendees[$i]['trainee_name'];
                }
            } else {
                $old_attendees_at_old = "NA";
            }
            for ($i = 0; $i < count($attendees); $i++) {
                $obj = new DB_Public_lm_cc_training_attendence();
                $obj->cc_object_id = $cc_object_id;
                $obj->training_sch_id = $training_sch_id;
                $obj->attended_user_id = $attendees[$i];
                $obj->created_by = $usr_id;
                $obj->created_time = $date_time;
                $attendee_presesnt = $this->get_ccm_training_attendee_details($cc_object_id, $training_sch_id, $attendees[$i]);
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
                addAuditTrailLog($cc_object_id, $training_sch_id, $at_data, $_POST['audit_trail_action'], 'Successfully Added');
            }
            return true;
        }
        return false;
    }

    function get_ccm_training_attendee_details($cc_object_id, $training_sch_id = null, $attendee = null) {
        $obj = new DB_Public_lm_cc_training_attendence();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function update_ccm_training_completion_details($cc_object_id, $training_details) {
        foreach ($training_details as $val) {
            $trainer_object_id = $val['trainer_object_id'];
            $trainer_details_obj = new DB_Public_lm_cc_trainer_details();
            $trainer_details_obj->whereAdd("object_id='$trainer_object_id'");
            $trainer_details_obj->whereAdd("cc_object_id='$cc_object_id'");
            $trainer_details_obj->status = "Completed";
            if ($trainer_details_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                $trainer_sch_obj = new DB_Public_lm_cc_training_schedule();
                $trainer_sch_obj->whereAdd("trainer_object_id='$trainer_object_id'");
                $trainer_sch_obj->whereAdd("cc_object_id='$cc_object_id'");
                $trainer_sch_obj->status = "Completed";
                if ($trainer_sch_obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
                    return true;
                }
            }
        }
        return false;
    }

    function get_ccm_trainer_object_id($cc_object_id, $trainer_id) {
        $obj = new DB_Public_lm_cc_trainer_details();
        $obj->get("cc_object_id", $cc_object_id);
        if ($obj->trainer === $trainer_id) {
            return $obj->object_id;
        }
        return null;
    }

    //---------End Of Training Functions----------------------------//
    //---------Start Of Exam Functions----------------------------//

    function add_ccm_exam_questions($cc_object_id, $trainer_object_id_array, $tf_qns_array, $mcq_array, $usr_id, $date_time) {
        //Delete Old Questions, Answers, Options
        //Loop trainer_object_id
        for ($i = 0; $i < count($trainer_object_id_array); $i++) {
            if ($this->delete_ccm_exam_questions($cc_object_id, $trainer_object_id_array[$i])) {
                //Add True Or False Questions
                if ($tf_qns_array['questions'][$i]) {
                    for ($j = 0; $j < count($tf_qns_array['questions'][$i]); $j++) {
                        $id = get_object_id("definitions->object_id->exam->ccm->exam_qns_master");
                        $obj = new DB_Public_lm_cc_question_master();
                        $obj->object_id = $id;
                        $obj->cc_object_id = $cc_object_id;
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
                                $aid = get_object_id("definitions->object_id->exam->ccm->exam_qns_opt_master");
                                $opt_obj = new DB_Public_lm_cc_question_options();
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
                        $id = get_object_id("definitions->object_id->exam->ccm->exam_qns_master");
                        $obj = new DB_Public_lm_cc_question_master();
                        $obj->object_id = $id;
                        $obj->cc_object_id = $cc_object_id;
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
                                $aid = get_object_id("definitions->object_id->exam->ccm->exam_qns_opt_master");
                                $opt_obj = new DB_Public_lm_cc_question_options();
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

    function delete_ccm_exam_questions($cc_object_id, $trainer_object_id) {
        $qa_obj = new DB_Public_lm_cc_question_master();
        $qa_obj->whereAdd("cc_object_id='$cc_object_id'");
        $qa_obj->whereAdd("trainer_object_id='$trainer_object_id'");
        if ($qa_obj->find()) {
            while ($qa_obj->fetch()) {
                $opt_obj = new DB_Public_lm_cc_question_options();
                $opt_obj->whereAdd("question_id	='$qa_obj->object_id'");
                $opt_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
            }
        }
        $dqa_obj = new DB_Public_lm_cc_question_master();
        $dqa_obj->whereAdd("cc_object_id='$cc_object_id'");
        $dqa_obj->whereAdd("trainer_object_id='$trainer_object_id'");
        $dqa_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function get_ccm_question_ans_list($cc_object_id, $trainer_object_id = null, $trainer = null) {
        $obj = new DB_Public_lm_cc_question_master();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        ($trainer_object_id) ? $obj->whereAdd("trainer_object_id='$trainer_object_id'") : null;
        ($trainer) ? $obj->whereAdd("created_by='$trainer'") : null;
        $obj->orderBy('order1');
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $qns_options_list = $this->get_ccm_qns_options($obj->object_id);
                $qns_list[] = array(
                    "object_id" => $obj->object_id,
                    'cc_object_id' => $obj->cc_object_id,
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

    function get_ccm_qns_options($qns_id) {
        $obj = new DB_Public_lm_cc_question_options();
        $obj->whereAdd("question_id='$qns_id'");
        $obj->orderBy('order1');
        if ($obj->find()) {
            while ($obj->fetch()) {
                $qns_options_list[] = array(
                    "object_id" => $obj->object_id,
                    'option' => $obj->option,
                    'question_id' => $obj->question_id,
                    'option_no' => $obj->option_no,
                    'created_by_id' => $obj->created_by,
                    'created_by_name' => getFullName($obj->created_by),
                    'created_time' => $obj->created_time,
                    'order' => $obj->order1
                );
            }
            return $qns_options_list;
        }
        return null;
    }

    function add_ccm_online_exam_details($cc_object_id, $trainer_object_id, $usr_id, $date_time) {
        $id = get_object_id("definitions->object_id->exam->ccm->exam_details");
        $obj = new DB_Public_lm_cc_online_exam_details();
        $obj->object_id = $id;
        $obj->cc_object_id = $cc_object_id;
        $obj->trainer_object_id = $trainer_object_id;
        $obj->status = "Pending";
        $obj->created_by = $usr_id;
        $obj->created_time = $date_time;
        if ($obj->insert()) {
            return $id;
        }
        return false;
    }

    function assign_ccm_online_exam($cc_object_id, $trainer_object_id, $trainer, $exam_details_id, $assigned_by, $exam_user, $qns_limit, $status, $is_latest, $attempt, $attempt_status, $capa_no, $date_time) {
        if ($status === "Assigned" && $this->is_ccm_online_exam_exist_for_user($cc_object_id, $exam_details_id, $exam_user)) {
            return false;
        } else {
            $object_id = get_object_id("definitions->object_id->exam->ccm->online_exam");
            $e_obj = new DB_Public_lm_cc_online_exam_user_details();
            $e_obj->object_id = $object_id;
            $e_obj->cc_object_id = $cc_object_id;
            $e_obj->exam_details_id = $exam_details_id;
            $e_obj->assigned_by = $assigned_by;
            $e_obj->assigned_to = $exam_user;
            $e_obj->assigned_date = $date_time;
            $e_obj->pass_mark = getCcExamPassMark();
            $e_obj->attempt = $attempt;
            $e_obj->status = $status;
            $e_obj->is_latest = $is_latest;
            $e_obj->capa_no = $capa_no;
            $e_obj->question_limit = $qns_limit;
            $e_obj->attempt_limit = getCcExamAttemptLimit();
            $e_obj->attempt_status = $attempt_status;
            if ($e_obj->insert()) {
                $qna_list = $this->get_ccm_question_ans_list($cc_object_id, $trainer_object_id, $trainer);
                shuffle($qna_list);
                $final_qna_list = array_slice($qna_list, 0, $qns_limit);
                for ($i = 0; $i < count($final_qna_list); $i++) {
                    $oe_user_id = get_object_id("definitions->object_id->exam->ccm->oe_user_qns_ans");
                    $user_obj = new DB_Public_lm_cc_online_exam_user_question_ans_details();
                    $user_obj->object_id = $oe_user_id;
                    $user_obj->exam_id = $object_id;
                    $user_obj->question_id = $final_qna_list[$i]['object_id'];
                    $user_obj->ans = null;
                    $user_obj->ans_date = null;
                    $user_obj->insert();
                }
            }
        }
        return true;
    }

    function is_ccm_online_exam_exist_for_user($cc_object_id, $exam_details_id, $exam_user) {
        $obj = new DB_Public_lm_cc_online_exam_user_details();
        $obj->query("SELECT * FROM {$obj->__table} WHERE lower(cc_object_id) = lower('$cc_object_id') and lower(exam_details_id) = lower('$exam_details_id')  and lower(assigned_to) = lower('$exam_user') ");
        while ($obj->fetch()) {
            return true;
        }
        return false;
    }

    function get_ccm_online_exam_details($cc_object_id, $trainer_object_id = null, $trainer = null, $is_latest = null, $exam_user = null) {
        $obj = new DB_Public_lm_cc_online_exam_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        ($trainer_object_id) ? $obj->whereAdd("trainer_object_id='$trainer_object_id'") : null;
        ($trainer) ? $obj->whereAdd("created_by='$trainer'") : null;
        if ($obj->find()) {
            $count = 1;
            while ($obj->fetch()) {
                $user_details = $this->get_ccm_online_exam_user_details($cc_object_id, $obj->object_id, null, $is_latest, $exam_user);
                $title = array_shift(array_column($this->get_ccm_training_details($cc_object_id, $trainer_object_id), 'title'));
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
    }

    function get_ccm_online_exam_user_details($cc_object_id, $exam_details_id = null, $trainer = null, $is_latest = null, $exam_user = null) {
        $exam_user_obj = new DB_Public_lm_cc_online_exam_user_details();
        $exam_user_obj->whereAdd("cc_object_id='$cc_object_id'");
        ($exam_details_id) ? $exam_user_obj->whereAdd("exam_details_id='$exam_details_id'") : null;
        ($trainer) ? $exam_user_obj->whereAdd("assigned_by='$trainer'") : null;
        ($is_latest) ? $exam_user_obj->whereAdd("is_latest='$is_latest'") : null;
        ($exam_user) ? $exam_user_obj->whereAdd("assigned_to='$exam_user'") : null;
        if ($exam_user_obj->find()) {
            $count = 1;
            while ($exam_user_obj->fetch()) {
                $qna_details = $this->get_ccm_user_question_ans_details($exam_user_obj->object_id);
                $capa_no = ($exam_user_obj->capa_no === "NA") ? "NA" : get_qms_doc_no(null, $exam_user_obj->capa_no)['doc_no'];
                $capa_link = ($exam_user_obj->capa_no === "NA") ? "NA" : get_qms_doc_no(null, $exam_user_obj->capa_no)['doc_link'];

                $qns_list[] = array(
                    'exam_object_id' => $exam_user_obj->object_id,
                    'cc_object_id' => $exam_user_obj->cc_object_id,
                    'exam_details_id' => $exam_user_obj->exam_details_id,
                    'assigned_date' => getModifiedDateTimeFormat($exam_user_obj->assigned_date, 'f6'),
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
                    'count' => $count
                );
                $count++;
            }
            return $qns_list;
        }
        return null;
    }

    function get_ccm_user_question_ans_details($exam_id) {
        $user_qns_ans_obj = new DB_Public_lm_cc_online_exam_user_question_ans_details();
        $user_qns_ans_obj->whereAdd("exam_id='$exam_id'");
        if ($user_qns_ans_obj->find()) {
            $count = 1;
            while ($user_qns_ans_obj->fetch()) {
                $qns_master_obj = $this->get_ccm_question_master_obj($user_qns_ans_obj->question_id);
                $qns_option_array = $this->get_ccm_qns_options($user_qns_ans_obj->question_id);
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

    function get_ccm_question_master_obj($object_id) {
        $qns_master_obj = new DB_Public_lm_cc_question_master();
        $qns_master_obj->get("object_id", $object_id);
        return $qns_master_obj;
    }

    function update_ccm_online_exam_ans($exam_id, $answers, $date_time) {
        foreach ($answers as $answer_list) {
            $qna_dtls = explode("-", $answer_list);
            $answer = $qna_dtls[0];
            $qna_id = $qna_dtls[1];

            $obj = new DB_Public_lm_cc_online_exam_user_question_ans_details();
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

    function get_ccm_exam_mark($exam_id) {
        $correct_ans = 0;
        $exam_user_obj = new DB_Public_lm_cc_online_exam_user_details();
        $exam_user_obj->get("object_id", $exam_id);
        $question_limit = $exam_user_obj->question_limit;

        $user_qns_ans_obj = new DB_Public_lm_cc_online_exam_user_question_ans_details();
        $user_qns_ans_obj->whereAdd("exam_id='$exam_id'");
        if ($user_qns_ans_obj->find()) {
            while ($user_qns_ans_obj->fetch()) {
                $qns_master_obj = $this->get_ccm_question_master_obj($user_qns_ans_obj->question_id);
                if ($user_qns_ans_obj->ans == $qns_master_obj->answer_no) {
                    $correct_ans++;
                }
            }
            $exam_mark = round((($correct_ans / $question_limit) * 100), 2);
            return $exam_mark;
        }
        return null;
    }

    function get_ccm_exam_result($marks_scored, $pass_mark) {
        return ($marks_scored < $pass_mark) ? 'Failed' : 'Pass';
    }

    function update_ccm_exam_completion_details($object_id, $exam_details_id, $status, $attempt_status, $marks, $result, $completed_date) {
        $obj = new DB_Public_lm_cc_online_exam_user_details();
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

    function is_ccm_exam_capa_required($attempt_limit, $attempt) {
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

    function get_ccm_unique_non_attended_exam_user_list($cc_object_id, $trainer_object_id, $trainer) {
        $attendees_array = array_column($this->get_ccm_training_schedule_details($cc_object_id, null, $trainer_object_id, null, null), 'attendees');
        for ($i = 0; $i < count($attendees_array); $i++) {
            for ($j = 0; $j < count($attendees_array[$i]); $j++) {
                $attendees_user_array[] = $attendees_array[$i][$j]['trainee_id'];
            }
        }
        $exam_user_array = array_column(array_shift(array_column($this->get_ccm_online_exam_details($cc_object_id, $trainer_object_id, $trainer), 'user_details')), 'assigned_to_id');
        $unique_users_list = array_diff($attendees_user_array, $exam_user_array);
        if ($unique_users_list) {
            foreach ($unique_users_list as $key => $val) {
                $unique_users[] = array('drop_down_value' => $val, 'drop_down_option' => getFullName($val));
            }
            return $unique_users;
        }
        return null;
    }

    function update_ccm_online_exam_user_status($cc_object_id, $exam_details_id, $exam_user, $status, $attempt_status, $is_latest) {
        $obj = new DB_Public_lm_cc_online_exam_user_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function update_ccm_online_exam_status($exam_details_id, $status) {
        $obj = new DB_Public_lm_cc_online_exam_details();
        $obj->whereAdd("object_id='$exam_details_id'");
        $obj->status = $status;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function get_ccm_online_exam_status($cc_object_id) {
        $exam_obj = new DB_Public_lm_cc_online_exam_details();
        $exam_obj->get("cc_object_id", $cc_object_id);
        return $exam_obj->status;
    }

    //---------End Of Exam Functions----------------------------//
    //***Start Of Task Functions ***//
    //***Start Of Task Functions ***//
    function add_ccm_task_details($cc_object_id, $task_id, $task, $pri_per_id, $submission_type, $task_type, $usr_id, $date_time) {
        $task_at_n = $task_at_p = "";
        $task_at_o = "NA";
        // Delete Task
        if ($task_type == "first_time") {
            $this->delete_all_ccm_task($cc_object_id);
        }
        if ($task_type == "add_more_task") {
            $old_task = $this->get_ccm_task_details($cc_object_id, null);
            for ($i = 0; $i < count($old_task); $i++) {
                $task_at_o .= "\n\nTask Id : " . $old_task[$i]['task_id'] . "\nPrimary Responsible Person : " . $old_task[$i]['pri_per_name'];
            }
        }
        // Add Task
        for ($i = 0; $i < count($task); $i++) {
            $object_id = get_object_id("definitions->object_id->task->ccm->task");
            $obj = new DB_Public_lm_cc_task_details();
            $obj->object_id = $object_id;
            $obj->cc_object_id = $cc_object_id;
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
            addAuditTrailLog($cc_object_id, null, $at_data, $_POST['audit_trail_action'], 'Sucessfully Added');
        }
        return true;
    }

    function delete_all_ccm_task($cc_object_id) {
        $realted_to_obj = new DB_Public_lm_cc_task_details();
        $realted_to_obj->whereAdd("cc_object_id='$cc_object_id'");
        $realted_to_obj->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        return true;
    }

    function update_ccm_task_details($object_id, $cc_object_id, $pri_per_id, $sec_per_id, $task_status_pri, $task_status_sec, $task_completion_date_pri, $task_completion_date_sec, $task_status_creator, $task_completion_date_creator, $task_status, $task_wf_status) {
        $obj = new DB_Public_lm_cc_task_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function get_ccm_task_details($cc_object_id, $task_object_id = null, $pri_per_id = null, $sec_per_id = null, $task_status_pri = null, $task_status_sec = null, $task_status_creator = null, $status = null, $wf_status = null) {
        $obj = new DB_Public_lm_cc_task_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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
                $attachments_sec = $doc_file_processor_object->getLmCcmDocFileObjectArray($cc_object_id, "task_sec_per", $obj->object_id, $obj->sec_per_id);
                $attachments_pri = $doc_file_processor_object->getLmCcmDocFileObjectArray($cc_object_id, "task_pri_per", $obj->object_id, $obj->pri_per_id);
                $attachments_creator = $doc_file_processor_object->getLmCcmDocFileObjectArray($cc_object_id, "task_creator", $obj->object_id, $obj->created_by);

                $latest_sec_review_comments = array_shift($this->get_ccm_task_review_comments($obj->object_id, null, "task_sec_per", 'yes'));
                $latest_pri_review_comments = array_shift($this->get_ccm_task_review_comments($obj->object_id, null, "task_pri_per", 'yes'));
                $latest_creator_comments = array_shift($this->get_ccm_task_review_comments($obj->object_id, null, "task_creator", 'yes'));

                $all_sec_review_comments = $this->get_ccm_task_review_comments($obj->object_id, null, "task_sec_per", null);
                $all_pri_review_comments = $this->get_ccm_task_review_comments($obj->object_id, null, "task_pri_per", null);
                $all_creator_review_comments = $this->get_ccm_task_review_comments($obj->object_id, null, "task_creator", null);
                $qa_verification_comments = array_shift($this->get_ccm_task_review_comments($obj->object_id, null, "task_verification", null));

                $task_list_array[] = array(
                    'object_id' => $obj->object_id,
                    'cc_object_id' => $obj->cc_object_id,
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

    function is_ccm_task_eligible_to_assign_sec_per($cc_object_id, $pri_per_id) {
        $obj = new DB_Public_lm_cc_task_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function get_ccm_task_obj($task_object_id) {
        $obj = new DB_Public_lm_cc_task_details();
        $obj->get("object_id", $task_object_id);
        return $obj;
    }

    function add_ccm_task_review_comments($task_object_id_array, $review_comments_array, $commented_by, $usr_id, $date_time) {
        for ($i = 0; $i < count($review_comments_array); $i++) {
            if ($review_comments_array[$i]) {
                //If Review Comments Present Update
                if ($this->get_ccm_task_review_comments($task_object_id_array[$i], $usr_id, $commented_by, "yes")) {
                    $task_obj = $this->get_ccm_task_obj($task_object_id_array[$i]);

                    $update = false;
                    if ($commented_by === 'task_pri_per') {
                        $update = ($task_obj->task_status_pri === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_sec_per') {
                        $update = ($task_obj->task_status_sec === "Pending") ? true : false;
                    } elseif ($commented_by === 'task_creator') {
                        $update = ($task_obj->task_status_creator === "Pending") ? true : false;
                    }
                    if ($update) {
                        $obj = new DB_Public_lm_cc_task_review_comments();
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
                    $object_id = get_object_id("definitions->object_id->task->ccm->task_review_comments");
                    $obj = new DB_Public_lm_cc_task_review_comments();
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

    function get_ccm_task_review_comments($task_object_id, $created_by = null, $commented_by = null, $is_latest = null) {
        $obj = new DB_Public_lm_cc_task_review_comments();
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
                    'created_date' => $obj->created_date,
                    'commented_by' => $obj->commented_by,
                    'is_latest' => $obj->is_latest
                );
            }
            return $comments_array;
        }
        return null;
    }

    function update_ccm_task_review_comments_is_latest($task_object_id, $commented_by, $is_latest) {
        $obj = new DB_Public_lm_cc_task_review_comments();
        $obj->whereAdd("task_object_id='$task_object_id'");
        $obj->whereAdd("commented_by='$commented_by'");
        $obj->whereAdd("is_latest='yes'");
        $obj->is_latest = $is_latest;
        if ($obj->update(DB_DATAOBJECT_WHEREADD_ONLY)) {
            return true;
        }
        return false;
    }

    function add_ccm_task_attachment($cc_object_id, $type, $usr_id, $date_time) {
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

                        $file_id = get_object_id("definitions->object_id->task->ccm->task_file_upload");

                        $file = new DB_Public_file();
                        $file->object_id = $file_id;
                        $file->type = $file_type;
                        $file->name = $file_name;
                        $file->size = $file_size;
                        $file->hash = $hash . "." . $extension;
                        move_uploaded_file($tempFile, _DOC_VAULT_ . $hash . "." . $extension);
                        $file->insert();

                        $doc_file = new DB_Public_lm_cc_doc_file();
                        $doc_file->file_id = $file_id;
                        $doc_file->object_id = $cc_object_id;
                        $doc_file->type = $type;
                        $doc_file->attached_by = $usr_id;
                        $doc_file->attached_date = $date_time;
                        $doc_file->ref_object_id = $task_obj_id;
                        if ($doc_file->insert()) {
                            $task_details = $this->get_ccm_task_obj($task_obj_id);
                            //audit trail
                            $at_data['File Name'] = array('NA', $file_name, $file_name);
                            $at_data['File Type'] = array('NA', $file_type, $file_type);
                            $at_data['File Size'] = array('NA', GetFriendlySize($file_size), GetFriendlySize($file_size));
                            $at_data['Task Id'] = array('NA', $task_details->task_id, $task_details->task_id);
                            $at_data['Attached By'] = array('NA', getFullName($usr_id), $usr_id . " - " . getFullName($usr_id));
                            addAuditTrailLog($cc_object_id, $file_id, $at_data, "Attach File", 'File Attached Successfully');
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
    }

    function is_ccm_task_completed($cc_object_id, $pri_per_id = null, $sec_per_id = null, $creator_id = null) {
        $obj = new DB_Public_lm_cc_task_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
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


    function add_ccm_montioring_details($cc_object_id, $resp_per, $level, $is_active, $usr_id, $date_time) {
        if (!empty($resp_per)) {

            $id = get_object_id("definitions->object_id->workflow->ccm->monitoring");
            $date_time = date('Y-m-d G:i:s');
            $monitoring = new DB_Public_lm_cc_monitoring_details();
            $monitoring->monitoring_id = $id;
            $monitoring->cc_object_id = $cc_object_id;
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

    function check_if_user_is_monitoring($cc_object_id, $user) {
        $monitoring_obj = new DB_Public_lm_cc_monitoring_details();
        $monitoring_obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function add_ccm_monitoring_feedback($cc_object_id, $feedback, $effectiveness, $user_id) {

        $object_id = get_object_id("definitions->object_id->workflow->ccm->monitoring_feedback");
        $updated_date = date('Y-m-d G:i:s');
        $monitoring = new DB_Public_lm_cc_monitoring_updated_details();
        $monitoring->object_id = $object_id;
        $monitoring->cc_object_id = $cc_object_id;
        $monitoring->comments = $feedback;
        $monitoring->effectiveness = $effectiveness;
        $monitoring->updated_by = $user_id;
        $monitoring->updated_date = $updated_date;
        $monitoring->insert();
    }

    function update_ccm_monitoring_final_feedback($cc_object_id, $feedback, $effectiveness, $user_id) {
        $updated_date = date('Y-m-d G:i:s');
        $obj = new DB_Public_lm_cc_monitoring_details();
        $obj->whereAdd("cc_object_id='$cc_object_id'");
        $obj->whereAdd("resp='$user_id'");
        $obj->final_feedback = $feedback;
        $obj->effectiveness = $effectiveness;
        $obj->modified_time = $updated_date;
        $obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function get_interim_feedback_comments($cc_object_id) {
        $feedback_obj = new DB_Public_lm_cc_monitoring_updated_details();
        $feedback_obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function get_final_feedback_comments($cc_object_id) {
        $feedback_obj = new DB_Public_lm_cc_monitoring_details();
        $feedback_obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function is_monitoring_completed($cc_object_id) {
        $monitoring_obj = new DB_Public_lm_cc_monitoring_details();
        $monitoring_obj->whereAdd("cc_object_id='$cc_object_id'");
        if ($monitoring_obj->find()) {
            while ($monitoring_obj->fetch()) {
                if (!empty($monitoring_obj->final_feedback) && !empty($monitoring_obj->effectiveness)) {
                    return true;
                }
                return false;
            }
        }
    }

    function get_ccm_resp_persons($cc_object_id) {
        $resp_per_obj = new DB_Public_lm_cc_monitoring_details();
        $resp_per_obj->whereAdd("cc_object_id='$cc_object_id'");
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

    function get_monitoring_completion_date($monitoring_id) {
        $obj = new DB_Public_lm_cc_monitoring_details();
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
