<?php
/**
 * Project:  Logicmind
 * File: view_user_profile_info.admin.php
 *
 * @author Ananthakumar V
 * @since 23/02/2017
 * @package admin
 * @version 1.0
 * @see view_user_profile_info.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
$usr_id=$_SESSION['user_id'];
$users  = new Users();
$users->get('user_id',$usr_id);

$user_profile = new UserProfile();
$user_profile->get('user_id',$usr_id);
$user_department =getDeptName($usr_id);
$user_designation=getDesignation($users->designation_id);
$user_organization=getOrganization($users->org_id);
$user_plant=getPlantName($users->plant_id);
$email = $users->email;

if (isset($_POST['update_profile'])) {
    $time =  date('Y-m-d G:i:s');
    $ip_address = getenv("REMOTE_ADDR");
    
    $delete_profile =new UserProfile();
    $delete_profile->user_id =$usr_id;
    $delete_profile->delete();

    $update_profile = new UserProfile();
    $update_profile->user_id=$usr_id;
    $update_profile->mothers_maiden_name=trim($_POST['mothers_maiden_name']);
    $update_profile->dob=trim($_POST['dob']);
    $update_profile->place_of_birth=trim($_POST['place_of_birth']);
    $update_profile->modified_by = $usr_id;
    $update_profile->modified_time=$time;  
    $update_profile->insert();

    $mail = new changeMailer();    
    $subject = "CONFIDENTIAL: Your Account Profile has been Updated";
    $actionDescription = "Your Account Profile has been updated successfully";
    $detailsHeading = "Account Details";
    $securityTips = <<<ENDOFSTRING
                        <ol style="padding: 0;">
                            <li>The above information is confidential and hence keep it as secret.</li>
                            <li>Note: If you don't know what this is about, then someone else has tried to change your account. Please contact directly to Admin to report this incident.</li>
                        </ol>
ENDOFSTRING;

    $details =  ["Modified By" => $_SESSION[full_name], 
                 "IP Address" => $ip_address,
                 "Username" => $users->user_name, 
                 "Organization" => $user_organization,
                 "Department" => $user_department,
                 "Designation" => $user_designation,
                 "Mothers Maiden Name" => trim($_POST['mothers_maiden_name']),
                 "Date of Birth" => trim($_POST['dob']),
                 "Place of Birth" => trim($_POST['place_of_birth']),
                 "Security Tips" => $securityTips,
                ];
    $buttonLink = _URL_;
    $bodyDetails = [ 
                    "actionDescription" => $actionDescription,
                    "detailsHeading" => $detailsHeading,
                    "details" => $details,
                    "buttonLink" => $buttonLink
                    ];                        
    $mail->sendNotification(array($email), [], [], $subject, $bodyDetails, []);
    header("Location:?action=logout");
}

if(isset($_POST['change_password'])){
    $user_pass = new Users();
    $user_pass->get("user_id",$usr_id);
    $password=$user_pass->password;

    $old_password = $_POST['oldpassword'];
    $new_password = $_POST['newpassword'];

    if (md5($old_password) == $password ){
        $change_pass=new Users();
        $change_pass->whereAdd("user_id ='$usr_id'");
        $change_pass->password = md5($new_password);
        $change_pass->update(DB_DATAOBJECT_WHEREADD_ONLY);
        header("Location:?action=logout");
    }else{
        echo "<script language=javascript>";
        echo "alert(\"Invalid Password Entered! Please enter the correct old password\")";
        echo "</script>";
    }
}

$smarty->assign('user_name',$users->user_name);
$smarty->assign('full_name',$users->full_name);
$smarty->assign('emp_id',$users->emp_id);
$smarty->assign('department',$user_department);
$smarty->assign('designation',$user_designation);
$smarty->assign('organization',$user_organization);
$smarty->assign('user_plant',$user_plant);
$smarty->assign('email',$users->email);
$smarty->assign('mothers_maiden_name',$user_profile->mothers_maiden_name);
$smarty->assign('user_photo',$user_profile->file_id);
$smarty->assign('dob',$user_profile->dob);
$smarty->assign('place_of_birth',$user_profile->place_of_birth);
$smarty->assign('account_status',$users->account_status);
$smarty->assign('created_time',get_modified_date_time_format($users->create_time));
$smarty->assign('main',_TEMPLATE_PATH_."view_user_profile_info.admin.tpl");	
?>
