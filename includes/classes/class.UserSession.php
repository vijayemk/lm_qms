<?php
/**
* UserSession
*
* The UserSession class provides methods for storing session details
* in table using PHP.
*
* @author Ananthakumar V
* @since 24/02/2017
* @package session
* @version 1.0
*/
class UserSession {
    /**
    * Object id of session
    *
    * @access public
    * @var   string
    * 
    */  
    var $object_id;

    /**
    * session id of the session
    *
    * @access public
    * @var   string
    * 
    */
    var $ascii_session_id;

    /**
    * Has the auth session logged in or not?
    *
    * @access public
    * @var   bool
    * 
    */
    var $logged_in;

    /**
    * user id of the user
    *
    * @access public
    * @var   string
    * 
    */
    var $user_id; 

    /**
    * last access of the session
    *
    * @access public
    * @var   timestamp
    * 
    */
    var $last_impression;

    /**
    * created time of session
    *
    * @access public
    * @var   timestamp
    * 
    */
    var $created;

    /**
    * Browser details
    *
    * @access public
    * @var   string
    * 
    */
    var $user_agent;

    /**
    * No of times visited the site
    *
    * @access public
    * @var   integer
    * 
    */
    var $no_of_hits;

    /**
    * IP address of the machine
    *
    * @access public
    * @var   string
    * 
    */
    var $ip_address;

    /**
    * function for storing the session details in UserSession table
    */
    static $max_lifetime = 1800;
    function get_session_max_lifetime(){
        return self::$max_lifetime;
    }
    function login_logout_audit_trial($action,$remarks,$status){
        $usr_id = $_SESSION['user_id'];
        $dept_id = getDeptId($usr_id);
        $time =  date('Y-m-d G:i:s');
        $createyear=date('y');
        $month=date('m');
        
        $sequence_object = new Sequence;
        $audit_id="audit.login:".$sequence_object->get_next_sequence();
        $audit_obj = new DB_Public_lm_audit_user_login_info();
        $audit_obj->object_id = $audit_id;
        $audit_obj->user_id = $usr_id;
        $audit_obj->created_date = $time;
        $audit_obj->action = $action;
        $audit_obj->ip_address = getIp();
        //$audit_obj->url = $_SERVER['REQUEST_URI'];
        $audit_obj->post_data = $remarks;
        $audit_obj->status = $status;
        $audit_obj->year = $createyear;
        $audit_obj->month = $month;
        $audit_obj->department = getDeptId($usr_id);
        $audit_obj->old_value = "N/A";
        $audit_obj->insert();
        return TRUE;
    }
    function sessionWrite() {
        if (!(isset($_SESSION['session_id']))){
            $sequence_object=new Sequence;
            $session_id=md5($sequence_object->get_next_session_sequence());
            $object_id=$sequence_object->get_objectid_sequence();
            $_SESSION['session_id'] = $session_id;
            $_SESSION['object_id'] = $object_id;
        }
        $object_id = $_SESSION['object_id'];
        $ascii_session_id = $_SESSION['session_id'];
        $time_stamp=date('Y-m-d G:i:s');
        $useragent = getenv("HTTP_USER_AGENT");
        $URL = getenv("REQUEST_URI");
        $ip_address = getenv("REMOTE_ADDR");
        $user_id=$_SESSION['user_id'];
        $count=1;

        $session_write = new DB_Public_user_session();
        $row = $session_write->get("user_id", $user_id);
        if($row == 0){
            $session_write = new DB_Public_user_session();
            $session_write->object_id =  $object_id;
            $session_write->ascii_session_id = $ascii_session_id;
            $session_write->logged_in ='t';
            $session_write->user_id = $user_id;
            $session_write->last_visited_time =$time_stamp;
            $session_write->last_impression =$time_stamp;
            $session_write->created = $time_stamp;
            $session_write->user_agent = $useragent;
            $session_write->no_of_hits = $count;
            $session_write->ip_address = $ip_address;
            $session_write->last_visited_url = $URL;
            $session_write->insert();
            
            //Audit Trial
            $audit_remarks = getFullName($user_id)." Loggedin"."\nLoggedin Time : ".get_modified_date_time_format($time_stamp);
            $this->login_logout_audit_trial('Loggedin', $audit_remarks, "Success");
            $UserSession=new UserSession;
            $UserSession->writeLog($session_write);			
        }else{           
            $hits = $session_write->no_of_hits;
            $session_write = new DB_Public_user_session();
            $session_write->whereAdd ("ascii_session_id = '$ascii_session_id'");
            $session_write->whereAdd ("logged_in = 't'");
            $session_write->whereAdd ("user_id = '$user_id'");
            $last_imp_obj = new DB_Public_user_session();
            $last_imp_obj->get("user_id", $user_id);
            $session_write->last_visited_time = $last_imp_obj->last_impression;      
            // Check if the user is come from the same browser session.
            // If the current session id is same as the session id fetched from the database
            if($last_imp_obj->ascii_session_id == $_SESSION['session_id']){
                $session_write->last_impression =$time_stamp;
                $session_write->no_of_hits = $hits+1;
                $session_write->last_visited_url = $URL;
                $session_write->update(DB_DATAOBJECT_WHEREADD_ONLY);

                $session_object = new DB_Public_user_session();
                $session_object->get("user_id",$user_id);
                $UserSession=new UserSession;
                $UserSession->writeLog($session_object);
            }else{
                $idle_time = 0;
                $now = time();
                if(isset($last_imp_obj->last_visited_time)){
                    $idle_time =  $now - strtotime($last_imp_obj->last_visited_time);
                }
                if($idle_time > self::$max_lifetime){
                    $session_garbage = new DB_Public_user_session();
                    $session_garbage->whereAdd ("ascii_session_id = '$last_imp_obj->ascii_session_id'");
                    $session_garbage->delete(DB_DATAOBJECT_WHEREADD_ONLY);

                    // As the previously logged in session has expired, we will let the user to login.
                    $session_write = new DB_Public_user_session();
                    $session_write->object_id =  $object_id;
                    $session_write->ascii_session_id = $ascii_session_id;
                    $session_write->logged_in ='t';
                    $session_write->user_id = $user_id;
                    $session_write->last_visited_time =$time_stamp;
                    $session_write->last_impression =$time_stamp;
                    $session_write->created = $time_stamp;
                    $session_write->user_agent = $useragent;
                    $session_write->no_of_hits = $count;
                    $session_write->ip_address = $ip_address;
                    $session_write->last_visited_url = $URL;
                    $session_write->insert();
                    
                    //Audit Trial
                    $audit_remarks = getFullName($user_id)." Loggedin"."\nLoggedin Time : ".get_modified_date_time_format($time_stamp);
                    $this->login_logout_audit_trial('Loggedin', $audit_remarks, "Success");

                    $UserSession=new UserSession;
                    $UserSession->writeLog($session_write);	
                }else{
                    session_unset();
                    $_SESSION['already_loggedin'] = true;
                    $_SESSION['already_userid'] = $last_imp_obj->user_id;
                    $_SESSION['already_session_id'] = $last_imp_obj->ascii_session_id;
                    $_SESSION['already_username'] = getUserName($last_imp_obj->user_id);
                    $_SESSION['already_fullname'] = getFullName($last_imp_obj->user_id);
                    $_SESSION['already_ip_address'] = $last_imp_obj->ip_address;
                    $_SESSION['already_useragent'] = $last_imp_obj->user_agent;
                    $_SESSION['alrady_last_visited_time'] = $last_imp_obj->last_visited_time;
                }         
            }
        }
    }
    function forced_logout(){
        $user_id = $_SESSION['already_user_id'];
        //Audit Trial
        $createyear=date('y');
        $month=date('m');
        $time_stamp=date('Y-m-d G:i:s');        
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        $usr_obj = new DB_Public_users;
        $usr_obj->get("user_id",$user_id);
        list($year,$month,$day, $h,$i,$s) = sscanf($time_stamp, '%4s-%2s-%2s %2s:%2s:%2s');
        $modified_format= date('d/m/Y H:i:s', mktime($h,$i,$s,$month,$day,$year));
        $audit_remarks_force_logout = $usr_obj->full_name." Foreced Logout by ".$ip."\nForced Log Out Time : ".$modified_format;
        
        $sequence_object = new Sequence;
        $audit_id="audit.login:".$sequence_object->get_next_sequence();
        $audit_obj = new DB_Public_lm_audit_user_login_info();
        $audit_obj->object_id = $audit_id;
        $audit_obj->user_id = $user_id;
        $audit_obj->created_date = $time_stamp;
        $audit_obj->action = "force_logout";
        $audit_obj->ip_address = $ip;
        //$audit_obj->url = $_SERVER['REQUEST_URI'];
        $audit_obj->post_data = $audit_remarks_force_logout;
        $audit_obj->status = "Success";
        $audit_obj->year = $createyear;
        $audit_obj->month = $month;
        $audit_obj->department = $usr_obj->department_id;;
        $audit_obj->insert();

        $session_write = new DB_Public_user_session();
        $session_write->whereAdd ("user_id = '$user_id'");
        $session_write->delete(DB_DATAOBJECT_WHEREADD_ONLY);
        
        unset($_SESSION['already_session_id']);
        $sequence_object = new Sequence;
        $session_id = md5($sequence_object->get_next_session_sequence());
        $object_id = $sequence_object->get_objectid_sequence();
        $_SESSION['session_id'] = $session_id;
        $_SESSION['object_id'] = $object_id;
        $object_id = $_SESSION['object_id'];
        
        $ascii_session_id = $_SESSION['session_id'];
        $time_stamp=date('Y-m-d G:i:s');
        $useragent = getenv("HTTP_USER_AGENT");
        $URL = getenv("REQUEST_URI");
        $ip_address = getenv("REMOTE_ADDR");
        $user_id=$_SESSION['already_user_id'];
        $count=1;
                                
        // As the previously logged in session has expired, we will let the user to login.
        $session_write = new DB_Public_user_session();
        $session_write->object_id =  $object_id;
        $session_write->ascii_session_id = $ascii_session_id;
        $session_write->logged_in ='t';
        $session_write->user_id = $user_id;
        $session_write->last_visited_time =$time_stamp;
        $session_write->last_impression =$time_stamp;
        $session_write->created = $time_stamp;
        $session_write->user_agent = $useragent;
        $session_write->no_of_hits = $count;
        $session_write->ip_address = $ip_address;
        $session_write->last_visited_url = $URL;
        $session_write->insert();
        
        
        //Audit Trial
        $audit_remarks_force_login = $usr_obj->full_name." Foreced Login by ".$ip."\nForced Login Time : ".$modified_format;
        $sequence_object = new Sequence;
        $audit_id="audit.login:".$sequence_object->get_next_sequence();
        $audit_obj = new DB_Public_lm_audit_user_login_info();
        $audit_obj->object_id = $audit_id;
        $audit_obj->user_id = $user_id;
        $audit_obj->created_date = $time_stamp;
        $audit_obj->action = "Loggedin";
        $audit_obj->ip_address = $ip;
        //$audit_obj->url = $_SERVER['REQUEST_URI'];
        $audit_obj->post_data = $audit_remarks_force_login;
        $audit_obj->status = "Success";
        $audit_obj->year = $createyear;
        $audit_obj->month = $month;
        $audit_obj->department = $usr_obj->department_id;;
        $audit_obj->insert();
       
        $UserSession=new UserSession;
        $UserSession->writeLog($session_write);	
        header("Location:".$LM_URL);                   
        //$this->sessionWrite();
    }
    function sessionDestroy() {
        $ascii_session_id = $_SESSION['session_id'];
        $user_id=$_SESSION['user_id'];
        //Audit Trial
        $time =  date('Y-m-d G:i:s');
        $audit_remarks = getFullName($user_id)." Logged Out"."\nLogged Out Time : ".get_modified_date_time_format($time);
        $this->login_logout_audit_trial('Logged Out', $audit_remarks, "Success");
        
        $session_write = new DB_Public_user_session();
        $session_write->whereAdd("ascii_session_id = '$ascii_session_id'");
        $session_write->whereAdd ("logged_in = 't'");
        $session_write->whereAdd ("user_id = '$user_id'");
        $session_write->delete(DB_DATAOBJECT_WHEREADD_ONLY);
    }

    function sessionExpiry() {
        $ascii_session_id = $_SESSION['session_id'];
        $session_created= new DB_Public_user_session();
        $session_created->get("ascii_session_id",$ascii_session_id);
        $created = $session_created->created;
        $created_time=strtotime($created); //converts datetime to seconds        
        $idle_time = 0;
        $now = time();
        if(isset($session_created->last_visited_time)){
            $idle_time =  $now - strtotime($session_created->last_visited_time);
        }
        if($idle_time < self::$max_lifetime){
            //do nothing
        }else{
            //Audit Trial
            $user_id=$_SESSION['user_id'];
            $time =  date('Y-m-d G:i:s');
            $audit_remarks = getFullName($user_id)." Session Expired"."\nExpired Time : ".get_modified_date_time_format($time);
            $this->login_logout_audit_trial('expiry', $audit_remarks, "Session Expired");
        
            $session_garbage = new DB_Public_user_session();
            @session_unset();
            unset($_SESSION['username']);
            $session_garbage->whereAdd ("ascii_session_id = '$ascii_session_id'");
            $session_garbage->delete(DB_DATAOBJECT_WHEREADD_ONLY);
            $_SESSION['session_expired'] = true;
            $_SESSION['expired_idle_time'] = gmdate("H:i:s", $idle_time);
            $_SESSION['max_idle_time'] = gmdate("H:i:s",self::$max_lifetime);
        }
    }
    /** 
    * Write the Session details in SessionLog
    */
    function writeLog($session_object) {
        $fp = fopen (_LOGS_."SessionLog", "a" );
        $object = $session_object->object_id;
        $user = $session_object->user_id;
        $ip = $session_object->ip_address;
        $last_impression = $session_object->last_impression;
        $user_agent=$session_object->user_agent;
        $url = $session_object->last_visited_url;
        
        $auth = new DB_Public_users();
        $auth->get("user_id",$user);
        $UserName = $auth->user_name;
        $logString =$last_impression.",".$object.",".$UserName.",".$ip.",".$user_agent.",".$url."\n";
        fputs ( $fp, $logString);
        fclose ( $fp );
    }
}
?>
