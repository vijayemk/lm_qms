<?php

/**
 * Project:     Logicmind
 * File:        search_sop.sop.php
 *
 * @author Ananthakumar.v 
 * @since 24/03/2017
 * @package sop
 * @version 1.0
 * @see search_sop.sop.php
 */
error_reporting(E_ALL & ~E_NOTICE);
if (!check_access($username, 'sop_create', 'yes')) {
    $error_handler->raiseError("sop_create");
}

include_module("admin");
$sop_process = new Sop_Processor();

$sop_object_id = (isset($_REQUEST['sop_object_id'])) ? $_REQUEST['sop_object_id'] : null;
$sop_type_id = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : null;

$sop_liveno_list = $sop_process->get_sop_revise_list($sop_type_id);
$view_sop_type = new SopType();
$soptypelist = $view_sop_type->sop_type_list(null);
$sop_creation_reason_obj = new SopCreationReason();
$sop_reason_list = $sop_creation_reason_obj->sop_reason_list();

if (!empty($sop_object_id)) {
    $sop_master = new DB_Public_lm_sop_master();
    if ($sop_master->get("sop_object_id", $sop_object_id) && $sop_process->is_sop_eligible_for_revise($sop_object_id)) {
        //Current SOP Details
        $createtime = date('Y-m-d G:i:s');
        $createyear = date('y');
        $month = date('m');
        $usr_id = $_SESSION['user_id'];
        $dept_id = getDeptId($usr_id);
        $usr_org_id = getUserOrganizationId($usr_id);
        $usr_plant_id = getUserPlantId($usr_id);
        $sop_type = $sop_process->get_sop_type($sop_master->sop_type);
        $current_sop_name = $sop_master->sop_name;
        $sop_no = $sop_process->get_sop_no($sop_object_id);
        $current_sop_revison = $sop_master->revision;
        $current_sop_supersedes = $sop_master->supersedes;

        //Revise SOP Revision and supersedes for revised SOP
        $revised_revision = $sop_process->revise_sop_revision($sop_object_id);
        $revised_supersedes = $sop_master->revision;
        //$revised_supersedes = $sop_master->sop_no . " & " . get_modified_date_format($sop_master->effective_date);
        if ($sop_process->get_published_status($sop_object_id) == "SOP Expired") {
            $smarty->assign("is_sop_capa_required", TRUE);
        }

        if (isset($_POST['revise']) && $sop_process->is_sop_eligible_for_revise($sop_object_id)) {
            if ($sop_process->update_sop_is_revised($sop_object_id, 'yes')) {
                $acapa_no = (isset($_POST['acapa_no'])) ? $_POST['acapa_no'] : null;
                $dept_view_array = (isset($_REQUEST['dept_view'])) ? $_REQUEST['dept_view'] : null;
                if (empty($acapa_no)) {
                    $acapa_no = "N/A";
                }

                $sop_master_revise = new DB_Public_lm_sop_master();
                $sop_master_revise->get("sop_object_id", $sop_object_id);
                $revised_sop_object_id = $sop_process->add_sop_draft_master($sop_master_revise->sop_type, $sop_master_revise->sop_name, $_POST['acc_no'], $revised_revision, $revised_supersedes, $_POST['reason_for_revision'], $sop_master_revise->sop_plant, $sop_master_revise->lang, $createyear, $month, $usr_id, $createtime, $usr_org_id, $dept_id, $sop_master_revise->uname, $acapa_no);
                $sop_rev_master = new DB_Public_lm_sop_revision_master();
                $sop_rev_master->prev_sop_object_id = $sop_object_id;
                $sop_rev_master->revised_sop_object_id = $revised_sop_object_id;
                $sop_rev_master->insert();

                if (!empty($revised_sop_object_id)) {
                    add_dept_doc_view_details($revised_sop_object_id, $dept_id, $dept_view_array, $usr_id, $createtime);
                }

                //Audit Trial
                $remarks = $sop_master_revise->sop_name . " Revised." . "\nReason for Revision : " . trim($_POST['reason_for_revision']);
                add_sop_audit_trial($revised_sop_object_id, $sop_master_revise->sop_type, 'revise', $remarks, 'Revised');

                $sop_details_content_obj = new DB_Public_lm_sop_details();
                $sop_details_content_obj->get("sop_object_id", $sop_object_id);

                $sop_details = new DB_Public_lm_sop_details();
                $sop_details->sop_object_id = $revised_sop_object_id;
                $sop_details->sop_content = $sop_details_content_obj->sop_content;
                $sop_details->created_by = $usr_id;
                $sop_details->created_time = $createtime;
                $sop_details->last_modified_by = $usr_id;
                $sop_details->last_modified_time = $createtime;
                $sop_details->insert();

                //insert formatlist
                //$sop_revise = $_POST['revise_sop'];
                $format_object_id = $_POST['format_object_id'];
                $annexure_object_id = $_POST['annexure_object_id'];
                $format_revise = $_POST['revise_format'];
                $annexure_revise = $_POST['revise_annexure'];
                if (!empty($format_revise)) {
                    foreach ($format_revise as $format_key => $format_val) {
                        // echo $format_object_id[$format_key];
                        // echo $format_revise[$format_key];
                        $prev_format_obj = new DB_Public_lm_sop_format_master();
                        $prev_format_obj->get("format_object_id", $format_object_id[$format_key]);

                        $sop_format_master_obj = new DB_Public_lm_sop_format_master();
                        $sop_format_master_obj->whereAdd("format_object_id = '$format_object_id[$format_key]'");

                        //If previous format revision is disabled then set default status as Disabled even though user may changed when revise
                        if ($prev_format_obj->status == "Disabled") {
                            $sop_format_master_obj->is_revised = "no";
                            $revised_format_revision = $prev_format_obj->revision;
                            $revised_format_supersedes = $prev_format_obj->supersedes;
                            $revised_format_status = "Disabled";
                        } else {
                            if ($format_revise[$format_key] == "Yes") {
                                $sop_format_master_obj->is_revised = "yes";
                                $revised_format_revision = $sop_process->revise_sop_format_revision($format_object_id[$format_key]);
                                $revised_format_supersedes = $prev_format_obj->revision;
                                $revised_format_status = "Enabled";
                            }if ($format_revise[$format_key] == "No") {
                                $sop_format_master_obj->is_revised = "no";
                                $revised_format_revision = $prev_format_obj->revision;
                                $revised_format_supersedes = $prev_format_obj->supersedes;
                                $revised_format_status = "Enabled";
                            }if ($format_revise[$format_key] == "Disabled") {
                                $sop_format_master_obj->is_revised = "no";
                                $revised_format_revision = $prev_format_obj->revision;
                                $revised_format_supersedes = $prev_format_obj->supersedes;
                                $revised_format_status = "Disabled";
                            }
                        }
                        $sop_format_master_obj->is_latest_revision = "false";
                        $sop_format_master_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

                        $sequence_object = new Sequence;
                        $format_id = "sop.format:" . $sequence_object->get_next_sequence();

                        //insert format number and desc details for the revise SOP
                        $sequence_object->get_format_number_sequence($revised_sop_object_id);
                        $sequence_object->get_format_desc_number_sequence($revised_sop_object_id);

                        $add_sop_format_obj = new DB_Public_lm_sop_format_master();
                        $add_sop_format_obj->format_object_id = $format_id;
                        $add_sop_format_obj->sop_object_id = $revised_sop_object_id;
                        $add_sop_format_obj->format_department = $dept_id;
                        $add_sop_format_obj->format_name = $prev_format_obj->format_name;
                        $add_sop_format_obj->revision = $revised_format_revision;
                        $add_sop_format_obj->supersedes = $revised_format_supersedes;
                        $add_sop_format_obj->revision_desc = "R";
                        $add_sop_format_obj->created_year = $createyear;
                        $add_sop_format_obj->created_month = $month;
                        $add_sop_format_obj->created_by = $usr_id;
                        $add_sop_format_obj->created_time = $createtime;
                        $add_sop_format_obj->modified_by = $usr_id;
                        $add_sop_format_obj->modified_time = $createtime;
                        $add_sop_format_obj->is_latest_revision = 'true';
                        $add_sop_format_obj->is_revised = 'no';
                        $add_sop_format_obj->format_no = $prev_format_obj->format_no;
                        $add_sop_format_obj->status = $revised_format_status;
                        $add_sop_format_obj->format_desc = $prev_format_obj->format_desc;
                        $add_sop_format_obj->orientation = $prev_format_obj->orientation;
                        $add_sop_format_obj->lang = $prev_format_obj->lang;
                        $add_sop_format_obj->insert();

                        $sequence_object->update_format_number_sequence($revised_sop_object_id);
                        $sequence_object->update_format_desc_number_sequence($revised_sop_object_id);

                        $format_details_obj = new DB_Public_lm_sop_format_details();
                        $format_details_obj->get("format_object_id", $format_object_id[$format_key]);

                        $sop_format_details = new DB_Public_lm_sop_format_details();
                        $sop_format_details->format_object_id = $format_id;
                        $sop_format_details->format_content = $format_details_obj->format_content;
                        $sop_format_details->created_by = $usr_id;
                        $sop_format_details->created_time = $createtime;
                        $sop_format_details->last_modified_by = $usr_id;
                        $sop_format_details->last_modified_time = $createtime;
                        $sop_format_details->insert();
                    }
                }

                //insert annexurelist
                if (!empty($annexure_revise)) {
                    foreach ($annexure_revise as $annexure_key => $annexure_val) {
                        // echo $annexure_key;
                        $prev_annexure_obj = new DB_Public_lm_sop_annexure_master();
                        $prev_annexure_obj->get("annexure_object_id", $annexure_object_id[$annexure_key]);

                        $sop_annexure_master_obj = new DB_Public_lm_sop_annexure_master();
                        $sop_annexure_master_obj->whereAdd("annexure_object_id = '$annexure_object_id[$annexure_key]'");

                        //If previous annexure revision is disabled then set default status as Disabled even though user may changed when revise
                        if ($prev_annexure_obj->status == "Disabled") {
                            $sop_annexure_master_obj->is_revised = "no";
                            $revised_annexure_revision = $prev_annexure_obj->revision;
                            $revised_annexure_supersedes = $prev_annexure_obj->supersedes;
                            $revised_annexure_status = "Disabled";
                        } else {
                            if ($annexure_revise[$annexure_key] == "Yes") {
                                $sop_annexure_master_obj->is_revised = "yes";
                                $revised_annexure_revision = $sop_process->revise_sop_annexure_revision($annexure_object_id[$annexure_key]);
                                $revised_annexure_supersedes = $prev_annexure_obj->revision;
                                $revised_annexure_status = "Enabled";
                            }if ($annexure_revise[$annexure_key] == "No") {
                                $sop_annexure_master_obj->is_revised = "no";
                                $revised_annexure_revision = $prev_annexure_obj->revision;
                                $revised_annexure_supersedes = $prev_annexure_obj->supersedes;
                                $revised_annexure_status = "Enabled";
                            }if ($annexure_revise[$annexure_key] == "Disabled") {
                                $sop_annexure_master_obj->is_revised = "no";
                                $revised_annexure_revision = $prev_annexure_obj->revision;
                                $revised_annexure_supersedes = $prev_annexure_obj->supersedes;
                                $revised_annexure_status = "Disabled";
                            }
                        }
                        $sop_annexure_master_obj->is_latest_revision = "false";
                        $sop_annexure_master_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

                        $sequence_object = new Sequence;
                        $annexure_id = "sop.annexure:" . $sequence_object->get_next_sequence();

                        //insert annexure number and desc details for the revise SOP
                        $sequence_object->get_annexure_number_sequence($revised_sop_object_id);
                        $sequence_object->get_annexure_desc_number_sequence($revised_sop_object_id);
                        //get sop format_no
                        $annexure_format_id = $sop_process->get_lastet_format_no_id("Annexure", $sop_type);

                        $add_sop_annexure_obj = new DB_Public_lm_sop_annexure_master();
                        $add_sop_annexure_obj->annexure_object_id = $annexure_id;
                        $add_sop_annexure_obj->sop_object_id = $revised_sop_object_id;
                        $add_sop_annexure_obj->annexure_desc = $prev_annexure_obj->annexure_desc;
                        $add_sop_annexure_obj->annexure_department = $dept_id;
                        $add_sop_annexure_obj->annexure_name = $prev_annexure_obj->annexure_name;
                        $add_sop_annexure_obj->revision = $revised_annexure_revision;
                        $add_sop_annexure_obj->supersedes = $revised_annexure_supersedes;
                        $add_sop_annexure_obj->created_year = $createyear;
                        $add_sop_annexure_obj->created_month = $month;
                        $add_sop_annexure_obj->created_by = $usr_id;
                        $add_sop_annexure_obj->created_time = $createtime;
                        $add_sop_annexure_obj->modified_by = $usr_id;
                        $add_sop_annexure_obj->modified_time = $createtime;
                        $add_sop_annexure_obj->is_latest_revision = 'true';
                        $add_sop_annexure_obj->is_revised = 'no';
                        $add_sop_annexure_obj->annexure_no = $prev_annexure_obj->annexure_no;
                        $add_sop_annexure_obj->status = $revised_annexure_status;
                        $add_sop_annexure_obj->annexure_format_no = $annexure_format_id;
                        $add_sop_annexure_obj->orientation = $prev_annexure_obj->orientation;
                        $add_sop_annexure_obj->lang = $prev_annexure_obj->lang;
                        $add_sop_annexure_obj->insert();

                        $sequence_object->update_annexure_number_sequence($revised_sop_object_id);
                        $sequence_object->update_annexure_desc_number_sequence($revised_sop_object_id);

                        $annexure_details_obj = new DB_Public_lm_sop_annexure_details();
                        $annexure_details_obj->get("annexure_object_id", $annexure_object_id[$annexure_key]);

                        $sop_annexure_details = new DB_Public_lm_sop_annexure_details();
                        $sop_annexure_details->annexure_object_id = $annexure_id;
                        $sop_annexure_details->annexure_content = $annexure_details_obj->annexure_content;
                        $sop_annexure_details->created_by = $usr_id;
                        $sop_annexure_details->created_time = $createtime;
                        $sop_annexure_details->last_modified_by = $usr_id;
                        $sop_annexure_details->last_modified_time = $createtime;
                        $sop_annexure_details->insert();
                    }
                }

                //insert Interlinked SOP
                $mail_to_interlink_sop = $_POST['mail_to_interlink_sop'] ?: NULL;
                $interlink_sop_to_array = $_POST['interlink_sop_to'] ?: NULL;
                $interlink_user_to_array = $_POST['interlink_user_to'] ?: NULL;
                $mail_comments = $_POST['mail_comments'] ?: NULL;

                if ($mail_to_interlink_sop == "yes" && !empty($interlink_sop_to_array)) {
                    $sequence_object = new Sequence;
                    $interlink_sop_master_id = "interlink_sop_master:" . $sequence_object->get_next_sequence();

                    $interlink_sop_master_obj = new DB_Public_lm_interlinked_sop_master();
                    $interlink_sop_master_obj->object_id = $interlink_sop_master_id;
                    $interlink_sop_master_obj->sop_object_id = $revised_sop_object_id;
                    $interlink_sop_master_obj->remarks = $mail_comments;
                    $interlink_sop_master_obj->created_by = $usr_id;
                    $interlink_sop_master_obj->created_time = $createtime;
                    $interlink_sop_master_obj->insert();

                    $tmp_interlinked_sop_array = array();
                    $interlink_sop_count = 1;
                    for ($i = 0; $i < count($interlink_sop_to_array); $i++) {
                        $sequence_object = new Sequence;
                        $interlink_sop_id = "interlink_sop:" . $sequence_object->get_next_sequence();

                        $interlink_sop_list_obj = new DB_Public_lm_interlinked_sop_list();
                        $interlink_sop_list_obj->object_id = $interlink_sop_id;
                        $interlink_sop_list_obj->interlink_sop_master_id = $interlink_sop_master_id;
                        $interlink_sop_list_obj->interlinked_sop_id = $interlink_sop_to_array[$i];
                        $interlink_sop_list_obj->insert();

                        $insterlink_sop_master_obj = new DB_Public_lm_sop_master();
                        $insterlink_sop_master_obj->get("sop_object_id", $revised_sop_object_id);
                        $interlink_sop_list = $interlink_sop_count . ". $insterlink_sop_master_obj->sop_name \n";
                        array_push($tmp_interlinked_sop_array, $interlink_sop_list);
                        $interlink_sop_count;
                    }
                    $insterlinked_sop_list_array = implode("", $tmp_interlinked_sop_array);
                    for ($i = 0; $i < count($interlink_user_to_array); $i++) {
                        $sequence_object = new Sequence;
                        $interlink_sop_mail_user_id = "interlink_sop_mail_user:" . $sequence_object->get_next_sequence();

                        $interlink_sop_mail_users_list_obj = new DB_Public_lm_interlinked_sop_mail_users_list();
                        $interlink_sop_mail_users_list_obj->object_id = $interlink_sop_mail_user_id;
                        $interlink_sop_mail_users_list_obj->interlink_sop_master_id = $interlink_sop_master_id;
                        $interlink_sop_mail_users_list_obj->mail_send_to = $interlink_user_to_array[$i];
                        $interlink_sop_mail_users_list_obj->insert();

                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id', $interlink_user_to_array[$i]);
                        $email = $user_obj->email;
                        $mail = new changeMailer;
                        $subject = "Interlinked SOP Revision";
                        $actionDescription = "The $sop_master_revise->sop_name is Revised.Request to revise the interlinked SOPs";
                        $detailsHeading = "Interlinked SOP Details";
                        $details = ["Interlinked SOPs" => $insterlinked_sop_list_array,
                            "Remarks" => $mail_comments,
                            "Sent By" => $_SESSION['full_name']
                        ];
                        $buttonLink = _URL_ . "index.php?module=sop&action=view_sop&object_id=$revised_sop_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                            "detailsHeading" => $detailsHeading,
                            "details" => $details,
                            "buttonLink" => $buttonLink
                        ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }

                /** Add Pending */
                $sop_process->add_worklist($usr_id, $revised_sop_object_id);
                /*                 * Insert workflow  * */
                $sop_process->save_workflow($revised_sop_object_id, $usr_id, 'Created', 'create');
            }
            header("Location:?module=sop&action=view_sop&object_id=$revised_sop_object_id");
        }
        //Format and annexure list
        $formatlist = $sop_process->get_formatlist($sop_object_id);
        $annexurelist = $sop_process->get_annexurelist($sop_object_id);
        $plant_dept_list = getPlantDeptList($usr_plant_id);
        
        $smarty->assign("sop_type", $sop_type);
        if (!empty($sop_object_id)) {
            $smarty->assign("sop_object_id", $sop_object_id);
        }if (!empty($current_sop_name)) {
            $smarty->assign("current_sop_name", $current_sop_name);
        }if (!empty($current_sop_revison)) {
            $smarty->assign("current_sop_revison", $current_sop_revison);
        }if (!empty($current_sop_supersedes)) {
            $smarty->assign("current_sop_supersedes", $current_sop_supersedes);
        }if (!empty($revised_revision)) {
            $smarty->assign("revised_revision", $revised_revision);
        }if (!empty($revised_supersedes)) {
            $smarty->assign("revised_supersedes", $revised_supersedes);
        }if (!empty($annexurelist)) {
            $smarty->assign("annexurelist", $annexurelist);
        }if (!empty($formatlist)) {
            $smarty->assign("formatlist", $formatlist);
        }if (!empty($sop_no)) {
            $smarty->assign("sop_no", $sop_no);
        }
        $smarty->assign("dept_id", $dept_id);
        $smarty->assign("plant_dept_list", $plant_dept_list);
    } else {
        $error_handler->raiseError("INVALID REQUEST");
    }
}
if (!empty($sop_liveno_list)) {
    $smarty->assign("sop_liveno_list", $sop_liveno_list);
}
$smarty->assign("soptypelist", $soptypelist);
$smarty->assign("sop_reason_list", $sop_reason_list);
$smarty->assign("sop_type_id", $sop_type_id);
$smarty->assign('main', _TEMPLATE_PATH_ . "sop_revise.sop.tpl");
?>
