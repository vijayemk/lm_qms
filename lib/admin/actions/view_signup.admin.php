<?php
$signup_object_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;
$selected_users=(isset($_REQUEST['selected_users_array']))?$_REQUEST['selected_users_array']:null;
$comments=(isset($_REQUEST['comments']))?$_REQUEST['comments']:null;

include_module("sop");
$sop_process=new Sop_Processor();
$date_time=date('Y-m-d G:i:s');
$usr_id=trim($_SESSION['user_id']);
$dept_id=getDeptId($usr_id);

$signup_obj = new DB_Public_user_signup();
if($signup_obj->get("object_id",$signup_object_id)){
    $lm_doc_id = $signup_obj->lm_doc_id;
    $deptlist = get_All_DeptList();
    $itadmin_array = getAdminUserList();
    $workflow_access_per_list = getSignupUserWorkflowPermission($signup_obj->user_id);

    $creator=$sop_process->get_creater_id($signup_object_id);
    $reviewer = $sop_process->get_reviewer_id($signup_object_id);
    $approver = $sop_process->get_approver_id($signup_object_id);
    
    if(!empty($sop_process->get_approver_id($signup_object_id))){
        $approver=$sop_process->get_approver_id($signup_object_id);
    }
    if(!empty($sop_process->get_all_workflow_actions($signup_object_id))) {
        $status_details=$sop_process->get_all_workflow_actions($signup_object_id);
    }
    if(!empty($comments)){
        $user_signup_remarks_obj = new DB_Public_user_signup_remarks();
        $user_signup_remarks_obj->signup_object_id = $signup_object_id;
        $user_signup_remarks_obj->remarks_date = $date_time;
        $user_signup_remarks_obj->remarks_user = $usr_id;
        $user_signup_remarks_obj->remarks = $comments;
        $user_signup_remarks_obj->insert();
    }
    /**Get the remarks details from user_signup_remarks table */
    $signup_remarks_obj=new DB_Public_user_signup_remarks();
    $signup_remarks_obj->whereAdd("signup_object_id='$signup_object_id'");
    $signup_remarks_obj->find();
    while($signup_remarks_obj->fetch()) {
        $signup_remarks_array[]=array('remarks_user'=> getFullName($signup_remarks_obj->remarks_user),'department_name'=>getDeptName($signup_remarks_obj->remarks_user),'remarks_date'=> get_modified_date_time_format($signup_remarks_obj->remarks_date),'remarks'=>$signup_remarks_obj->remarks);
    }
     
    /** Can i show 'Edit' Option and Request Review Button? */
    if ($signup_obj->status == "Request Created" && $creator == $usr_id || $signup_obj->status =="Review Need Correction" && $creator == $usr_id) {
        if($sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Created",'create') && $sop_process->check_user_in_worklist($signup_object_id,$usr_id)){
            $smarty->assign('edit_button', true);
            $smarty->assign('request_review_button', true);
            
            /**If request for Reviewal...*/
            if(isset($_POST['request_reviewal'])) {
                if($sop_process->update_signup_status($signup_object_id,"Reviewal Pending")){
                    $sop_process->delete_workflow_action($signup_object_id,"Review Need Correction","review");
                    $sop_process->delete_worklist($creator,$signup_object_id);
                    $review_user=(isset($_REQUEST['review_user']))?$_REQUEST['review_user']:null;
                    
                    //Audit Trial
                    $audit_remarks = "Request No : ".$signup_obj->request_no." sent for Reviewal"."\nEmployee Id : ".$signup_obj->emp_id;
                    add_signup_audit_trial($signup_object_id,'review',$audit_remarks,null,'Sent');
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$review_user);
                    $sop_process->add_worklist($review_user,$signup_object_id);
                    $sop_process->save_workflow($signup_object_id,$review_user,'Waiting','review');
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $signup = new DB_Public_user_signup();
                    $signup->get("object_id",$signup_object_id);
                    $signup->find();
                    $subject = "SIGNUP Request - Reviewal Regarding";
                    $actionDescription = "The Signup Request is Waiting for Your Reviewal.";
                    $detailsHeading = "Signup Details";                                                                                                                                                                                                                                                                                                                       
                    $details =  ["Request Number" => $signup->request_no,                                     
                                     "Request Status" => $signup->status,
                                     "Sent By" => $_SESSION['full_name']
                                    ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);  
                }
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");				
            }
            
        } 
    }
    /** Can i show Review Button*/
    if ($signup_obj->status == "Reviewal Pending" || $signup_obj->status =="Approve Need Correction"){
        if(($sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Waiting",'review') || $sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Reviewed",'review')) && $sop_process->check_user_in_worklist($signup_object_id,$usr_id)){
            $smarty->assign('edit_button', true);
            $smarty->assign('show_review_button', true);
            
            /** If Review need correction...*/
            if(isset($_POST['review_need_correction'])) {
                $sop_process->update_signup_status($signup_object_id,"Review Need Correction");
                $sop_process->update_workflow($signup_object_id,$usr_id,'Review Need Correction','review');
                $sop_process->delete_worklist($usr_id,$signup_object_id);
                $sop_process->add_worklist($creator,$signup_object_id);
                //Audit Trial
                $audit_remarks = "Request No : ".$signup_obj->request_no." sent back to ".getFullName($creator)."\nEmployee Id : ".$signup_obj->emp_id."\nReason : ".$comments;
                add_signup_audit_trial($signup_object_id,'review',$audit_remarks,null,'Review Need Correction');

                $user_obj = new DB_Public_users();
                $user_obj->get('user_id',$signup_obj->creator);
                $user_name = $user_obj->user_name;
                $full_name = $user_obj->full_name;	
                $email = $user_obj->email;
                $mail = new changeMailer;
                $signup = new DB_Public_user_signup();
                $signup->get("object_id",$signup_object_id);
                $signup->find();
                $subject = "SIGNUP Request - Review Needs Correction";
                $actionDescription = "The Singnup Request Needs a Few Corrections.";
                $detailsHeading = "Signup Details";  
                $details =  ["Request Number" => $signup->request_no,                                     
                            "Request Status" => $signup->status,
                            "Query" => $comments,
                            "Sent By" => $_SESSION['full_name']
                           ];
                $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                $bodyDetails = ["actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                               ];
                $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);        
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");				
            }
            /** If Reviewed...*/
            if(isset($_POST['reviewed'])) {
                $sop_process->update_workflow($signup_object_id,$usr_id,'Reviewed','review');
                $sop_process->delete_worklist($usr_id,$signup_object_id);
                if($sop_process->is_action_finished($signup_object_id,"review","Reviewed")){
                    $sop_process->update_signup_status($signup_object_id,"Waiting for Sending Approval");
                    $sop_process->add_worklist($usr_id,$signup_object_id);
                    //Audit Trial
                    $audit_remarks = "Request No : ".$signup_obj->request_no." Reviewed By ".getFullName($usr_id)."\nEmployee Id : ".$signup_obj->emp_id;
                    add_signup_audit_trial($signup_object_id,'review',$audit_remarks,null,'Reviewed');
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$signup_obj->creator);
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;	
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $signup = new DB_Public_user_signup();
                    $signup->get("object_id",$signup_object_id);
                    $signup->find();
                    $subject = "SIGNUP Request - Reviewed";
                    $actionDescription = "The Singnup Request is Reviewed.";
                    $detailsHeading = "Signup Details";  
                    $details =  ["Request Number" => $signup->request_no,                                     
                                "Request Status" => $signup->status,
                                "Reviewed By" => $_SESSION['full_name']
                               ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []); 
                }
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");				
            }
        }
    }
        
    /** Can i show Request Approve Button*/
    if ($signup_obj->status =="Waiting for Sending Approval"){
        if($sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Reviewed",'review') && ($sop_process->check_user_in_worklist($signup_object_id,$usr_id))){
            $smarty->assign('request_approve_button', true);
            
            /**If request for Approval...*/
            if(isset($_POST['request_approval'])) {
                if($sop_process->update_signup_status($signup_object_id,"Approval Pending")){
                    $sop_process->delete_workflow_action($signup_object_id,"approver_query","approve");
                    $sop_process->delete_worklist($usr_id,$signup_object_id);
                    $approve_user=(isset($_REQUEST['approve_user']))?$_REQUEST['approve_user']:null;
                    //Audit Trial
                    $audit_remarks = "Request No : ".$signup_obj->request_no." sent for Approval"."\nEmployee Id : ".$signup_obj->emp_id;
                    add_signup_audit_trial($signup_object_id,'approve',$audit_remarks,null,'Sent');
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$approve_user);
                    $sop_process->add_worklist($approve_user,$signup_object_id);
                    $sop_process->save_workflow($signup_object_id,$approve_user,'Waiting','approve');
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $signup = new DB_Public_user_signup();
                    $signup->get("object_id",$signup_object_id);
                    $signup->find();
                    $subject = "SIGNUP Request - Approval Regarding";
                    $actionDescription = "The Signup Request is Waiting for Your Approval.";
                    $detailsHeading = "Signup Details";                                                                                                                                                                                                                                                                                                                       
                    $details =  ["Request Number" => $signup->request_no,                                     
                                     "Request Status" => $signup->status,
                                     "Sent By" => $_SESSION['full_name']
                                    ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                }
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");				
            }
        }
    }
    /** Can i show Approve Button*/
    if ($signup_obj->status =="Approval Pending"){
        if($sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Waiting",'approve') && $sop_process->check_user_in_worklist($signup_object_id,$usr_id)){
            $smarty->assign('edit_button', true);
            $smarty->assign('show_approve_button', true);
            
            /** If Approve need correction...*/
            if(isset($_POST['approve_need_correction'])) {
                $sop_process->update_signup_status($signup_object_id,"Approve Need Correction");
                $workflow_userslist = $sop_process->get_all_workflow_users_list($signup_object_id);
                $sop_process->update_workflow($signup_object_id,$usr_id,'approver_query','approve');
                $sop_process->delete_worklist($usr_id,$signup_object_id);
                $sop_process->add_worklist($reviewer,$signup_object_id);
                //Audit Trial
                $audit_remarks = "Request No : ".$signup_obj->request_no." sent back to ".getFullName($reviewer).".\nEmployee Id : ".$signup_obj->emp_id."\nReason : ".$comments;
                add_signup_audit_trial($signup_object_id,'approve',$audit_remarks,null,'Approve Need Correction');
                foreach ($workflow_userslist as $users_id) {
                    if ($_SESSION['user_id']!= $users_id) {
                        $user_obj = new DB_Public_users();
                        $user_obj->get('user_id',$users_id);
                        $user_name = $user_obj->user_name;
                        $full_name = $user_obj->full_name;	
                        $email = $user_obj->email;
                        $mail = new changeMailer;
                        $signup = new DB_Public_user_signup();
                        $signup->get("object_id",$signup_object_id);
                        $signup->find();
                        $subject = "SIGNUP Request - Approve Needs Correction";
                        $actionDescription = "The Singnup Request Needs a Few Corrections.";
                        $detailsHeading = "Signup Details";  
                        $details =  ["Request Number" => $signup->request_no,                                     
                                    "Request Status" => $signup->status,
                                    "Query" => $comments,
                                    "Sent By" => $_SESSION['full_name']
                                   ];
                        $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                        $bodyDetails = ["actionDescription" => $actionDescription,
                                        "detailsHeading" => $detailsHeading,
                                        "details" => $details,
                                        "buttonLink" => $buttonLink
                                       ];
                        $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
                    }
                }        
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");				
            }
            /** If Approved...*/
            if(isset($_POST['approved'])) {
                $sop_process->update_workflow($signup_object_id,$usr_id,'Approved','approve');
                $sop_process->delete_worklist($usr_id,$signup_object_id);
                if($sop_process->is_action_finished($signup_object_id,"approve","Approved")){
                    $sop_process->update_signup_status($signup_object_id,"Approved");
                    $sop_process->add_worklist($creator,$signup_object_id);
                    //Audit Trial
                    $audit_remarks = "Request No : ".$signup_obj->request_no." Approved By ".getFullName($usr_id).".\nEmployee Id : ".$signup_obj->emp_id;
                    add_signup_audit_trial($signup_object_id,'approve',$audit_remarks,null,'Approved');

                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$signup_obj->creator);
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;	
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $signup = new DB_Public_user_signup();
                    $signup->get("object_id",$signup_object_id);
                    $signup->find();
                    $subject = "SIGNUP Request - Approved";
                    $actionDescription = "The Singnup Request is Approved.";
                    $detailsHeading = "Signup Details";  
                    $details =  ["Request Number" => $signup->request_no,                                     
                                "Request Status" => $signup->status,
                                "Approved By" => $_SESSION['full_name']
                               ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []); 
                }
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");				
            }
        }
    }
    /** Can i show Send Copy Button*/
    if ($signup_obj->status =="Approved"){
        if($sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Created",'create') && $sop_process->check_user_in_worklist($signup_object_id,$usr_id)){
            $smarty->assign('send_copy_button', true);
                
            /**If Send Copy To IT Admin...*/
            if(isset($_POST['send_copy'])) {
                if($sop_process->update_signup_status($signup_object_id,"Waiting for Activate")){
                    $sop_process->delete_worklist($usr_id,$signup_object_id);
                    $copy_user=(isset($_REQUEST['copy_user']))?$_REQUEST['copy_user']:null;
                    $user_obj = new DB_Public_users();
                    $user_obj->get('user_id',$copy_user);
                    $sop_process->add_worklist($copy_user,$signup_object_id);
                    $sop_process->save_workflow($signup_object_id,$copy_user,'Waiting','copy');
                    //Audit Trial
                    $audit_remarks = "Request No : ".$signup_obj->request_no." sent to IT Department for Activation"."\nEmployee Id : ".$signup_obj->emp_id;
                    add_signup_audit_trial($signup_object_id,'copy',$audit_remarks,null,'Sent');
                    $user_name = $user_obj->user_name;
                    $full_name = $user_obj->full_name;
                    $email = $user_obj->email;
                    $mail = new changeMailer;
                    $signup = new DB_Public_user_signup();
                    $signup->get("object_id",$signup_object_id);
                    $signup->find();
                    $subject = "SIGNUP Request - Activate";
                    $actionDescription = "The Signup Request is Waiting for Activation.";
                    $detailsHeading = "Signup Details";                                                                                                                                                                                                                                                                                                                       
                    $details =  ["Request Number" => $signup->request_no,                                     
                                 "Request Status" => $signup->status,
                                 "Sent By" => $_SESSION['full_name']
                                ];
                    $buttonLink = _URL_."index.php?module=admin&action=view_signup&object_id=$signup_object_id";
                    $bodyDetails = ["actionDescription" => $actionDescription,
                                    "detailsHeading" => $detailsHeading,
                                    "details" => $details,
                                    "buttonLink" => $buttonLink
                                   ];
                    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);   
                }
                header("Location:index.php?module=admin&action=view_signup&object_id=$signup_object_id");
            }
        }
    }
    /** Can i show Activate Button*/
    if ($signup_obj->status =="Waiting for Activate"){
        if($sop_process->check_user_in_workflow($signup_object_id,$usr_id,"Waiting",'copy') && $sop_process->check_user_in_worklist($signup_object_id,$usr_id)){
            $smarty->assign('show_activate_button', true);
            
            if (isset($_POST['activated'])){
                $user_name = strtolower($_POST['user_name']);
                $user_name = str_replace(' ', '', $user_name);
                $password  = $_POST['password'];

                $user_obj = new DB_Public_users();
                $user_obj->user_id = $signup_obj->user_id;
                $user_obj->user_name = $user_name;
                $user_obj->full_name = $signup_obj->full_name;
                $user_obj->designation_id = $signup_obj->designation_id;
                $user_obj->org_id = $signup_obj->org_id;
                $user_obj->plant_id = $signup_obj->plant_id;
                $user_obj->email = $signup_obj->email;
                $user_obj->creator = $usr_id;
                $user_obj->create_time = $date_time;
                $user_obj->modifier = $usr_id;
                $user_obj->modify_time = $date_time;
                $user_obj->department_id = $signup_obj->department_id;
                $user_obj->emp_id = $signup_obj->emp_id;
                $user_obj->password = md5($password);
                $user_obj->account_status = 'enable';
                $user_obj->password_expired_on = calculate_next_user_password_expiry_date();
                $user_obj->insert();
                
                for($i=0;$i<count($workflow_access_per_list);$i++){
                    $access_per_id = $workflow_access_per_list[$i]['access_per_id'];
                    $auser_per_obj = new DB_Public_users_permission();
                    $auser_per_obj->user_id = $signup_obj->user_id;
                    $auser_per_obj->access_per_id = $access_per_id;
                    if($workflow_access_per_list[$i]['is_enabled']==1){
                        $auser_per_obj->is_enabled = 'yes';
                        $auser_per_obj->insert();
                        
                        $new_val = getAccessPermissionName($access_per_id)." Permission enabled for ". getFullName($signup_obj->user_id);
                        $old_val = null;

                        $sequence_object = new Sequence;
                        $audit_id="audit.perm:".$sequence_object->get_next_sequence();
                        AddAuditTrial(new DB_Public_lm_audit_permission(),$audit_id,$usr_id,$dept_id,'enable',$new_val,$old_val,"Successfully enabled");
                    }
                }

                $update_signup_obj = new DB_Public_user_signup();
                $update_signup_obj->whereAdd("object_id = '$signup_object_id'");
                $update_signup_obj->is_activated = 'yes';
                $update_signup_obj->status = "Completed";
                $update_signup_obj->update(DB_DATAOBJECT_WHEREADD_ONLY);

                $sop_process->update_signup_status($signup_object_id,"Completed");
                $sop_process->update_workflow($signup_object_id,$usr_id,'Activated','copy');
                $sop_process->delete_worklist($usr_id,$signup_object_id);

                //Audit Trial
                $audit_remarks = "Request No : ".$signup_obj->request_no." Completed"."\nEmployee Id : ".$signup_obj->emp_id;
                add_signup_audit_trial($signup_object_id,'activate',$audit_remarks,null,'Activated Successfully');

                $email = $signup_obj->email;
                //$user_name = strtolower($_POST['user_name']);
                //$password = $_POST['password'];
                $mail = new changeMailer();
                $subject = "CONFIDENTIAL: Your Account has been Activated";
                $actionDescription = "Your Account has been activated successfully";
                $detailsHeading = "Account Details";
$securityTips = <<<ENDOFSTRING
    <ol style="padding: 0;">
        <li>Do not discolse your Account details (username and password) to others.</li>
        <li>Change your password when you log-in to Account for the first time.</li>
        <li>It is recommended that you change your password after every three months.</li>
    </ol>
ENDOFSTRING;
                $details =  ["Sent By" => $_SESSION['full_name'], 
                            "Username" => $user_name, 
                            "Password" => $password,
                            "Security Tips" => $securityTips
                            ];
                $buttonLink = _URL_;
                $bodyDetails = [ 
                                "actionDescription" => $actionDescription,
                                "detailsHeading" => $detailsHeading,
                                "details" => $details,
                                "buttonLink" => $buttonLink
                                ];
                $mail->sendloginNotification(array($email), $subject, $bodyDetails, []);
                header("Location:?module=admin&action=list_user");
            }
            
        }
    }
    $smarty->assign('signup_object_id', $signup_object_id);
    $smarty->assign('org', getOrganization($signup_obj->org_id));
    $smarty->assign('plant_name', getPlantName($signup_obj->plant_id));
    $smarty->assign('dep', getDepartment($signup_obj->department_id));
    $smarty->assign('emp_id', $signup_obj->emp_id);
    $smarty->assign('full_name', $signup_obj->full_name);
    $smarty->assign('desi', getDesignation($signup_obj->designation_id));
    $smarty->assign('email', $signup_obj->email);
    $smarty->assign('is_activated', $signup_obj->is_activated);
    $smarty->assign('request_no', $signup_obj->request_no);
    $smarty->assign('requested_by', getFullName($signup_obj->creator));
    $smarty->assign('requested_date', get_modified_date_time_format($signup_obj->created_time));
    $smarty->assign('status', $signup_obj->status);
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
    if(!empty($signup_remarks_array)) {
        $smarty->assign('signup_remarks_array', $signup_remarks_array);
    }
    if(!empty($workflow_access_per_list)) {
        $smarty->assign('workflow_access_per_list', $workflow_access_per_list);
    }
    $smarty->assign('main',_TEMPLATE_PATH_."view_signup.admin.tpl");
}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
