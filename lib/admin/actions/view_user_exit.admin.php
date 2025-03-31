<?php
$exit_object_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;
$selected_users=(isset($_REQUEST['selected_users_array']))?$_REQUEST['selected_users_array']:null;
$comments=(isset($_REQUEST['comments']))?$_REQUEST['comments']:null;

include_module("sop");
$sop_process=new Sop_Processor();
$date_time=date('Y-m-d G:i:s');
$usr_id=trim($_SESSION['user_id']);
$dept_id=getDeptId($usr_id);
$exit_obj = new DB_Public_user_exit();
if($exit_obj->get("object_id",$exit_object_id)){
    $lm_doc_id = $exit_obj->lm_doc_id;
    $deptlist = get_All_DeptList();
    $itadmin_array = getAdminUserList();
    
    $creator=$sop_process->get_creater_id($exit_object_id);
    $reviewer = $sop_process->get_reviewer_id($exit_object_id);
    $approver = $sop_process->get_approver_id($exit_object_id);
    
    if(!empty($sop_process->get_approver_id($exit_object_id))){
        $approver=$sop_process->get_approver_id($exit_object_id);
    }
    if(!empty($sop_process->get_all_workflow_actions($exit_object_id))) {
        $status_details=$sop_process->get_all_workflow_actions($exit_object_id);
    }
    if(!empty($comments)){
        $user_exit_remarks_obj = new DB_Public_user_exit_remarks();
        $user_exit_remarks_obj->exit_object_id = $exit_object_id;
        $user_exit_remarks_obj->remarks_date = $date_time;
        $user_exit_remarks_obj->remarks_user = $usr_id;
        $user_exit_remarks_obj->remarks = $comments;
        $user_exit_remarks_obj->insert();
    }
    /**Get the remarks details from user_exit_remarks table */
    $exit_remarks_obj=new DB_Public_user_exit_remarks();
    $exit_remarks_obj->whereAdd("exit_object_id='$exit_object_id'");
    $exit_remarks_obj->find();
    while($exit_remarks_obj->fetch()) {
        $exit_remarks_array[]=array('remarks_user'=> getFullName($exit_remarks_obj->remarks_user),'department_name'=>getDeptName($exit_remarks_obj->remarks_user),'remarks_date'=>$exit_remarks_obj->remarks_date,'remarks'=>$exit_remarks_obj->remarks);
    }
    
    /** Can i show Request Review Button? */
    if ($exit_obj->status == "Request Created" && $creator == $usr_id || $exit_obj->status =="Review Need Correction" && $creator == $usr_id) {
        if($sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Created",'create') && $sop_process->check_user_in_worklist($exit_object_id,$usr_id)){
            $smarty->assign('request_review_button', true);
            
            /**If request for Reviewal...*/
            if(isset($_POST['request_reviewal'])) {
                if($sop_process->update_user_exit_status($exit_object_id,"Reviewal Pending")){
                    $sop_process->delete_workflow_action($exit_object_id,"Review Need Correction","review");
                    $sop_process->delete_worklist($creator,$exit_object_id);
                    $review_user=(isset($_REQUEST['review_user']))?$_REQUEST['review_user']:null;
                    //Audit Trial
                    $audit_remarks = "Request No : ".$exit_obj->request_no." sent for Reviewal"."\nEmployee Id : ".$exit_obj->emp_id;
                    add_user_exit_audit_trial($exit_object_id,'review',$audit_remarks,null,'Sent');
                    
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$review_user);
                    $sop_process->add_worklist($review_user,$exit_object_id);
                    $sop_process->save_workflow($exit_object_id,$review_user,'Waiting','review');
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $exit = new DB_Public_user_exit();
                    $exit->get("object_id",$exit_object_id);
                    $exit->find();
                    $subject = "User Exit Request - Reviewal Regarding";
                    $actionDescription = "The User Exit Request is Waiting for Your Reviewal.";
                    $detailsHeading = "User Exit Details";                                                                                                                                                                                                                                                                                                                       
                    $details =  ["Request Number" => $exit->request_no,                                     
                                     "Request Status" => $exit->status,
                                     "Sent By" => $_SESSION['full_name']
                                    ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []); 
                }
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");				
            }
        } 
    }
    /** Can i show Review Button*/
    if ($exit_obj->status == "Reviewal Pending" || $exit_obj->status =="Approve Need Correction"){
        if(($sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Waiting",'review') || $sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Reviewed",'review')) && $sop_process->check_user_in_worklist($exit_object_id,$usr_id)){
            $smarty->assign('show_review_button', true);
            
            /** If Review need correction...*/
            if(isset($_POST['review_need_correction'])) {
                $sop_process->update_user_exit_status($exit_object_id,"Review Need Correction");
                $sop_process->update_workflow($exit_object_id,$usr_id,'Review Need Correction','review');
                $sop_process->delete_worklist($usr_id,$exit_object_id);
                $sop_process->add_worklist($creator,$exit_object_id);
                //Audit Trial
                $audit_remarks = "Request No : ".$exit_obj->request_no." sent back to ".getFullName($creator)."\nEmployee Id : ".$exit_obj->emp_id."\nReason : ".$comments;
                add_user_exit_audit_trial($exit_object_id,'review',$audit_remarks,null,'Review Need Correction');

                $user_obj = new DB_Public_users();
                $user_obj->get('user_id',$exit_obj->creator);
                $user_name = $user_obj->user_name;
                $full_name = $user_obj->full_name;	
                $email = $user_obj->email;
                $mail = new changeMailer;
                $exit = new DB_Public_user_exit();
                $exit->get("object_id",$exit_object_id);
                $exit->find();
                $subject = "User Exit Request - Review Needs Correction";
                $actionDescription = "The User Exit Request Needs a Few Corrections.";
                $detailsHeading = "User Exit Details";  
                $details =  ["Request Number" => $exit->request_no,                                     
                            "Request Status" => $exit->status,
                            "Query" => $comments,
                            "Sent By" => $_SESSION['full_name']
                           ];
                $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                               ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);        
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");				
            }
            /** If Reviewed...*/
            if(isset($_POST['reviewed'])) {
                $sop_process->update_workflow($exit_object_id,$usr_id,'Reviewed','review');
                $sop_process->delete_worklist($usr_id,$exit_object_id);
                if($sop_process->is_action_finished($exit_object_id,"review","Reviewed")){
                    $sop_process->update_user_exit_status($exit_object_id,"Waiting for Sending Approval");
                    $sop_process->add_worklist($usr_id,$exit_object_id);
                    //Audit Trial
                    $audit_remarks = "Request No : ".$exit_obj->request_no." Reviewed By ".getFullName($usr_id)."\nEmployee Id : ".$exit_obj->emp_id;
                    add_user_exit_audit_trial($exit_object_id,'review',$audit_remarks,null,'Reviewed');
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$exit_obj->creator);
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;	
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $exit = new DB_Public_user_exit();
                    $exit->get("object_id",$exit_object_id);
                    $exit->find();
                    $subject = "User Exit Request - Reviewed";
                    $actionDescription = "The User Exit Request is Reviewed.";
                    $detailsHeading = "User Exit Details";  
                    $details =  ["Request Number" => $exit->request_no,                                     
                                "Request Status" => $exit->status,
                                "Reviewed By" => $_SESSION['full_name']
                               ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []); 
                }
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");				
            } 
        }
    }
    
    /** Can i show Request Approve Button*/
    if ($exit_obj->status =="Waiting for Sending Approval"){
        if($sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Reviewed",'review') && ($sop_process->check_user_in_worklist($exit_object_id,$usr_id))){
            $smarty->assign('request_approve_button', true);
            
            /**If request for Approval...*/
            if(isset($_POST['request_approval'])) {
                if($sop_process->update_user_exit_status($exit_object_id,"Approval Pending")){
                    $sop_process->delete_workflow_action($exit_object_id,"approver_query","approve");
                    $sop_process->delete_worklist($usr_id,$exit_object_id);
                    $approve_user=(isset($_REQUEST['approve_user']))?$_REQUEST['approve_user']:null;
                    //Audit Trial
                    $audit_remarks = "Request No : ".$exit_obj->request_no." sent for Approval"."\nEmployee Id : ".$exit_obj->emp_id;
                    add_user_exit_audit_trial($exit_object_id,'approve',$audit_remarks,null,'Sent');
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$approve_user);
                    $sop_process->add_worklist($approve_user,$exit_object_id);
                    $sop_process->save_workflow($exit_object_id,$approve_user,'Waiting','approve');
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $exit = new DB_Public_user_exit();
                    $exit->get("object_id",$exit_object_id);
                    $exit->find();
                    $subject = "User Exit Request - Approval Regarding";
                    $actionDescription = "The User Exit Request is Waiting for Your Approval.";
                    $detailsHeading = "User Exit Details";                                                                                                                                                                                                                                                                                                                       
                    $details =  ["Request Number" => $exit->request_no,                                     
                                     "Request Status" => $exit->status,
                                     "Sent By" => $_SESSION['full_name']
                                    ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");				
            }
        }
    }
    /** Can i show Approve Button*/
    if ($exit_obj->status =="Approval Pending"){
        if($sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Waiting",'approve') && $sop_process->check_user_in_worklist($exit_object_id,$usr_id)){
            $smarty->assign('show_approve_button', true);
            
            /** If Approve need correction...*/
            if(isset($_POST['approve_need_correction'])) {
                $sop_process->update_user_exit_status($exit_object_id,"Approve Need Correction");
                $workflow_userslist = $sop_process->get_all_workflow_users_list($exit_object_id);
                $sop_process->update_workflow($exit_object_id,$usr_id,'approver_query','approve');
                $sop_process->delete_worklist($usr_id,$exit_object_id);
                $sop_process->add_worklist($reviewer,$exit_object_id);
                //Audit Trial
                $audit_remarks = "Request No : ".$exit_obj->request_no." sent back to ".getFullName($reviewer).".\nEmployee Id : ".$exit_obj->emp_id."\nReason : ".$comments;
                add_user_exit_audit_trial($exit_object_id,'approve',$audit_remarks,null,'Approve Need Correction');
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id']!= $users_id) {
                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id',$users_id);
                        $user_name = $user_obj->user_name;
                        $full_name = $user_obj->full_name;	
                        $email = $user_obj->email;
                        $mail = new changeMailer;
                        $exit = new DB_Public_user_exit();
                        $exit->get("object_id",$exit_object_id);
                        $exit->find();
                        $subject = "User Exit Request - Approve Needs Correction";
                        $actionDescription = "The User Exit Request Needs a Few Corrections.";
                        $detailsHeading = "User Exit Details";  
                        $details =  ["Request Number" => $exit->request_no,                                     
                                    "Request Status" => $exit->status,
                                    "Query" => $comments,
                                    "Sent By" => $_SESSION['full_name']
                                   ];
                        $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                                        "detailsHeading" => $detailsHeading,
                                        "details" => $details,
                                        "buttonLink" => $buttonLink
                                       ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }        
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");				
            }
            /** If Approved...*/
            if(isset($_POST['approved'])) {
                $sop_process->update_workflow($exit_object_id,$usr_id,'Approved','approve');
                $sop_process->delete_worklist($usr_id,$exit_object_id);
                if($sop_process->is_action_finished($exit_object_id,"approve","Approved")){
                    $sop_process->update_user_exit_status($exit_object_id,"Approved");
                    $sop_process->add_worklist($creator,$exit_object_id);
                    //Audit Trial
                    $audit_remarks = "Request No : ".$exit_obj->request_no." Approved By ".getFullName($usr_id).".\nEmployee Id : ".$exit_obj->emp_id;
                    add_user_exit_audit_trial($exit_object_id,'approve',$audit_remarks,null,'Approved');

                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$exit_obj->creator);
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;	
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $exit = new DB_Public_user_exit();
                    $exit->get("object_id",$exit_object_id);
                    $exit->find();
                    $subject = "User Exit Request - Approved";
                    $actionDescription = "The User Exit Request is Approved.";
                    $detailsHeading = "User Exit Details";  
                    $details =  ["Request Number" => $exit->request_no,                                     
                                "Request Status" => $exit->status,
                                "Approved By" => $_SESSION['full_name']
                               ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []); 
                }
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");				
            }
        }
    }
    /** Can i show Send Copy Button*/
    if ($exit_obj->status =="Approved"){
        if($sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Created",'create') && $sop_process->check_user_in_worklist($exit_object_id,$usr_id)){
            $smarty->assign('send_copy_button', true);
        
            /**If Send Copy To IT Admin...*/
            if(isset($_POST['send_copy'])) {
                if($sop_process->update_user_exit_status($exit_object_id,"Waiting for DeActivate")){
                    $sop_process->delete_worklist($usr_id,$exit_object_id);
                    $copy_user=(isset($_REQUEST['copy_user']))?$_REQUEST['copy_user']:null;
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$copy_user);
                    $sop_process->add_worklist($copy_user,$exit_object_id);
                    $sop_process->save_workflow($exit_object_id,$copy_user,'Waiting','copy');
                    //Audit Trial
                    $audit_remarks = "Request No : ".$exit_obj->request_no." sent to IT Department for Deactivation"."\nEmployee Id : ".$exit_obj->emp_id;
                    add_user_exit_audit_trial($exit_object_id,'copy',$audit_remarks,null,'Sent');
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $exit = new DB_Public_user_exit();
                    $exit->get("object_id",$exit_object_id);
                    $exit->find();
                    $subject = "User Exit Request - DeActivate";
                    $actionDescription = "The User Exit Request is Waiting for DeActivation.";
                    $detailsHeading = "User Exit Details";                                                                                                                                                                                                                                                                                                                       
                    $details =  ["Request Number" => $exit->request_no,                                     
                                 "Request Status" => $exit->status,
                                 "Sent By" => $_SESSION['full_name']
                                ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_user_exit&object_id=$exit_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:index.php?module=admin&action=view_user_exit&object_id=$exit_object_id");
            }
        }
    }
    /** Can i show Activate Button*/
    if ($exit_obj->status =="Waiting for DeActivate"){
        if($sop_process->check_user_in_workflow($exit_object_id,$usr_id,"Waiting",'copy') && $sop_process->check_user_in_worklist($exit_object_id,$usr_id)){
            $smarty->assign('show_activate_button', true);
            
            if (isset($_POST['deactivated'])){
                $rand=rand();
                $pass=md5($rand);

                $user_obj = new DB_Public_users();
                $user_obj->whereAdd("user_id ='$exit_obj->user_id'");
                $user_obj->modifier = $usr_id;
                $user_obj->modify_time = $date_time;
                $user_obj->account_status = 'disable';
                $user_obj->password = $pass;
                $user_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);
                
                /** Delete workflow permission*/
                $duser_per_obj = new DB_Public_users_permission();
                $duser_per_obj->user_id = $exit_obj->user_id;
                $duser_per_obj->find();
                $duser_per_obj->delete();
                /**Delete SOP Pdf permission */
                $dpdf_per_obj = new DB_Public_pdf_permission();
                $dpdf_per_obj->user_id = $exit_obj->user_id;
                $dpdf_per_obj->find();
                $dpdf_per_obj->delete();

                $update_exit_obj = new DB_Public_user_exit();
                $update_exit_obj->whereAdd("object_id = '$exit_object_id'");
                $update_exit_obj->is_deactivated= 'yes';
                $update_exit_obj->status = "Completed";
                $update_exit_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

                $sop_process->update_user_exit_status($exit_object_id,"Completed");
                $sop_process->update_workflow($exit_object_id,$usr_id,'DeActivated','copy');
                $sop_process->delete_worklist($usr_id,$exit_object_id);

                //Audit Trial
                $audit_remarks = "Request No : ".$exit_obj->request_no." Completed"."\nEmployee Id : ".$exit_obj->emp_id."\nIs Active : No";
                add_user_exit_audit_trial($exit_object_id,'deactivate',$audit_remarks,null,'DeActivated Successfully');

                $workflow_userslist = $sop_process->get_all_workflow_users_list($exit_object_id);
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id']!= $users_id) {
                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id',$users_id);
                        $user_name = $user_obj->user_name;
                        $full_name = $user_obj->full_name;	
                        $email = $user_obj->email;
                        $mail = new changeMailer();
                        $subject = "CONFIDENTIAL: $exit_obj->full_name Account has been DeActivated-Information Mail";
                        $actionDescription = "$exit_obj->full_name Account has been Deactivated successfully";
                        $detailsHeading = "Account Details";
                        $details =  ["Sent By" => $_SESSION['full_name'], 
                                    "Full Name" => $exit_obj->full_name, 
                                    "Department" => getDepartment($exit_obj->department_id),
                                    "Designation" => getDesignation($exit_obj->designation_id),
                                    "Plant" => getPlantName($exit_obj->plant_id),
                                    ];
                        $buttonLink = _URL_;
                        $bodyDetails = [ 
                                        "actionDescription" => $actionDescription,
                                        "detailsHeading" => $detailsHeading,
                                        "details" => $details,
                                        "buttonLink" => $buttonLink
                                        ];
                        $mail->sendloginNotification(array($email), $subject, $bodyDetails, []);
                    }
                }
                header("Location:?module=admin&action=list_user");
            }
        }
    }
    $smarty->assign('exit_object_id', $exit_object_id);
    $smarty->assign('org', getOrganization($exit_obj->org_id));
    $smarty->assign('plant_name', getPlantName($exit_obj->plant_id));
    $smarty->assign('dep', getDepartment($exit_obj->department_id));
    $smarty->assign('emp_id', $exit_obj->emp_id);    
    $smarty->assign('full_name', $exit_obj->full_name);
    $smarty->assign('desi', getDesignation($exit_obj->designation_id));
    $smarty->assign('email', $exit_obj->email);
    $smarty->assign('is_deactivated', $exit_obj->is_deactivated);
    $smarty->assign('reason', $exit_obj->reason);
    $smarty->assign('request_no', $exit_obj->request_no);
    $smarty->assign('requested_by', getFullName($exit_obj->creator));
    $smarty->assign('requested_date', $exit_obj->created_time);
    $smarty->assign('status', $exit_obj->status);
    if(!empty($lm_doc_id)){
        $smarty->assign('lm_doc_id', $lm_doc_id);
    }
    if(!empty($status_details)){
        $smarty->assign('status_details', $status_details);
    }
    if(!empty($itadmin_array)){
        $smarty->assign('itadmin_array', $itadmin_array);
    }
    if(!empty($deptlist)){
        $smarty->assign('deptlist', $deptlist);
    }
    if(!empty($exit_remarks_array)) {
        $smarty->assign('exit_remarks_array', $exit_remarks_array);
    }
    $smarty->assign('main',_TEMPLATE_PATH_."view_user_exit.admin.tpl");
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
