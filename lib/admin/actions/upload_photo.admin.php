<?php
/**
 * Project:  Logicmind
 * File: upload_photo.admin.php
 *
 * @author Ananthakumar V
 * @since 01/06/2017
 * @package admin
 * @version 1.0
 * @see upload_photo.admin.tpl
 */
error_reporting(E_ALL & ~E_NOTICE );
$usr_id=$_SESSION['user_id'];
$time =  date('Y-m-d G:i:s');
$users  = new Users();
$users->get('user_id',$usr_id);

$user_profile = new UserProfile();
$user_profile->get('user_id',$usr_id);

$view_user_file = new DB_Public_user_profile_file();
$view_user_file->get('user_id',$usr_id);

//define('IMAGE_MEDIUM_DIR', './data_vault/profile/uploades/medium/');
//define('IMAGE_SMALL_DIR', './data_vault/profile/uploades/small/');
ini_set("memory_limit", "99M");
ini_set('post_max_size', '20M');
ini_set('max_execution_time', 600);
define('IMAGE_SMALL_SIZE', 50);
define('IMAGE_MEDIUM_SIZE', 250);
/*defined settings - end*/

if(isset($_FILES['image_upload_file'])){
    $output['status']=FALSE;
    set_time_limit(0);
    $allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
	
    if ($_FILES['image_upload_file']["error"] > 0) {
        $output['error']= "Error in File";
    }
    elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
        $output['error']= "You can only upload JPG, PNG and GIF file";
    }
    elseif (round($_FILES['image_upload_file']["size"] / 1024) > 4096) {
        $output['error']= "You can upload file size up to 4 MB";
    } else {
        /*create directory with 777 permission if not exist - start*/
        $user_profile->createDir(IMAGE_SMALL_DIR);
        $user_profile->createDir(IMAGE_MEDIUM_DIR);
        
        /*create directory with 777 permission if not exist - end*/
        $path[0] = $_FILES['image_upload_file']['tmp_name'];
        $file = pathinfo($_FILES['image_upload_file']['name']);
        
        $file_type = $_FILES['image_upload_file']['type'];
        $file_size = $_FILES['image_upload_file']['size'];
        $file_name = $_FILES['image_upload_file']['name'];
        
        $fileType = $file["extension"];
        $desiredExt='jpg';
        $fileNameNew = rand(333, 999) . time() . ".$desiredExt";
        $path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
        $path[2] = IMAGE_SMALL_DIR . $fileNameNew;

        if ($user_profile->createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {
            if ($user_profile->createThumb($path[1], $path[2],"$desiredExt", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
                    $output['status']=TRUE;
                    $output['image_medium']= $path[1];
                    $output['image_small']= $path[2];
                    
                    //Delete the file from data _vault
                    if($view_user_file->name){
                        $del_medium_user_image = IMAGE_MEDIUM_DIR.$view_user_file->name;
                        $del_small_user_image = IMAGE_SMALL_DIR.$view_user_file->name;
                        unlink($del_medium_user_image);
                        unlink($del_small_user_image);
                    }
                    
                    //Delete the daabase row
                    $del_file_obj = new DB_Public_user_profile_file();
                    $del_file_obj->user_id = $usr_id;
                    $del_file_obj->find();
                    $del_file_obj->delete();
                            
                    
                    //Insert the new file to database
                    $user_file_obj = new DB_Public_user_profile_file();
                    $user_file_obj->user_id = $usr_id;
                    $user_file_obj->type = $file_type;
                    $user_file_obj->name = $fileNameNew;
                    $user_file_obj->size = $file_size;
                    $user_file_obj->created_by = $usr_id;
                    $user_file_obj->created_time = $time;
                    $user_file_obj->modified_by = $usr_id;
                    $user_file_obj->modified_time = $time;
                    $user_file_obj->is_latest_file = "yes";
                    $user_file_obj->insert();
               
                    $usr_profile = new DB_Public_user_profile_file();
                    
            }
        }
    }
    //echo json_encode($output);
}
$smarty->assign('main',_TEMPLATE_PATH_."upload_photo.admin.tpl");	
?>