<?php

/**
 * Project       : Logicmind
 * @version      : $id$
 * @author �     : Ananthakumar V
 * @since �      : 06/03/2017
 * @see          : index.tpl	
 */
error_reporting(E_ALL);
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); //For HTTP/1.0

require_once("global_functions.php");
require_once("initialize.php");

if (!isset($_SESSION['username'])) {    
    $lm_auth = new Auth("DB", $auth_params);
    $lm_auth->start();
    if ($lm_auth->getAuth()) {
        $_SESSION['username'] = $lm_auth->getUserName();
        if (isset($_POST['username'])) {
            if (!isset($_SESSION['loginfrom'])) {
                if (!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != _URL_ . 'index.php') {
                    $_SESSION['loginfrom'] = $_SERVER['HTTP_REFERER'];
                }
            }
        }
    }
    if (isset($_POST['force_login_comfirm'])) {
        if ($_POST['force_login_comfirm'] == "force_login") {
            foreach ($dataobject_setting as $class => $values) {
                $options = &PEAR::getStaticProperty($class, 'options');
                $options = $values;
            }
            $_SESSION['forced_loggedin'] = $_POST['force_login_comfirm'];
            $_SESSION['already_user_id'] = $_POST['already_user_id'];
            $_SESSION['already_session_id'] = $_POST['already_session_id'];
            $obj = new UserSession();
            $obj->forced_logout();
        }
    }
}

//If the user already logged in .
if (isset($_SESSION['username'])) {

    
    $username = $_SESSION['username'];
    $copy_right_year = date('Y');
    $module = (isset($_REQUEST['module'])) ? $_REQUEST['module'] : null;
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : null;
    $_SESSION['module'] = $module;
    $obj = new UserSession();

    /** Load all functions file located in _FUNCTIONS_ (General functions) */
    if ($dir = opendir(_FUNCTIONS_)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            if (is_file(_FUNCTIONS_ . $item) and eregi("\.func\.php$", $item)) {
                include_once(_FUNCTIONS_ . $item);
            }
        }
    }

    /** Load all resource files located in _RESOURCES_ (General resources) */
    if ($dir = opendir(_RESOURCES_)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            if (is_file(_RESOURCES_ . $item)) {
                if (eregi("res", $item))
                    include_once(_RESOURCES_ . $item);
            }
        }
    }

    /* Opening Directory of Modules */
    if ($dir = opendir(_MODULES_)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            $dirpath = _MODULES_ . $item . "/resources";
            /* To check whether it is a directory */
            if (is_dir(_MODULES_ . $item) && is_dir($dirpath)) {
                if ($resdir = opendir($dirpath)) {
                    while (($item = readdir($resdir)) !== FALSE) {
                        if ($item == "." or $item == ".." or $item == "CVS") {
                            continue;
                        }
                        if (is_file($dirpath . "/" . $item)) {
                            if (eregi("res", $item)) {
                                include_once ($dirpath . "/" . $item);
                            }
                        }
                    }
                }
            }
        }
    }

    // Error Handler
    if (!isset($error_handler)) {
        if (defined("ERROR_HANDLER_LOADED")) {
            $error_handler = new LogicmindError();
            $error_handler->importDefinitions(_ERROR_FILE_);
            if ($dir = opendir(_MODULES_)) {
                while (($item = readdir($dir)) !== FALSE) {
                    if ($item == "." or $item == ".." or $item == "CVS") {
                        continue;
                    }
                    $dirpath = _MODULES_ . $item . "/errors";
                    if (is_dir(_MODULES_ . $item) && is_dir($dirpath)) {
                        if ($errordir = opendir($dirpath)) {
                            while (($item = readdir($errordir)) !== FALSE) {
                                if ($item == "." or $item == ".." or $item == "CVS") {
                                    continue;
                                }
                                if (is_file($dirpath . "/" . $item)) {
                                    if (eregi("errors", $item)) {
                                        $error_handler->importDefinitions($dirpath . "/" . $item);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        // Set the templates for fatal and non-fatal errors...
        $error_handler->setTemplates("templates/fatal_error.tpl", "templates/non-fatal_error.tpl");
        // Set the error log...
        $error_handler->setLogFile("logs/ErrorHandler.log");
        // Log fatal errors...
        $error_handler->logFatalErrors(true);
    }

    foreach ($dataobject_setting as $class => $values) {
        $options = &PEAR::getStaticProperty($class, 'options');
        $options = $values;
    }

    /** Calling SAJAX function */
    if (isset($_SESSION['module']))
        include_once ('includes/ajax/sajax_functions.php');
    /** If user click logout */
    if ($action == "logout") {
        /** logged_in as false in UserSession table when logged out */
        if (isset($_SESSION['username'])) {
            $obj->sessionDestroy();
        }
        /** logout function called */
        $lm_auth->logout();
        session_unset();
        echo '<i><div align="center"><strong>Sucessfully Logged out</strong></div></i>' . "\n";
        Header("Refresh:1;URL=\"" . _URL_ . "index.php\"");
    } else {
        $users = new DB_Public_users();
        $users->get("user_name", $_SESSION['username']);
        $user_id = $users->user_id;
        $fullname = $users->full_name;
        $dept_id = $users->department_id;

        $_SESSION['full_name'] = $fullname;
        $_SESSION['user_id'] = $user_id;
        if (is_user_password_expired($user_id)) {
            session_unset();
            $smarty->display("password_expired.tpl");
            exit();
        }
        if ($users->account_status == "disable") {
            session_unset();
            $smarty->display("account_disabled.tpl");
            exit();
        }
        if (isset($_SESSION['username'])) {
            $obj->sessionWrite();
            if (isset($_SESSION['already_loggedin'])) {
                $smarty->assign('already_loggedin', $_SESSION['already_loggedin']);
                $smarty->assign('already_userid', $_SESSION['already_userid']);
                if (!empty($_SESSION['already_session_id'])) {
                    $smarty->assign('already_session_id', $_SESSION['already_session_id']);
                }
                $smarty->assign('already_username', $_SESSION['already_username']);
                $smarty->assign('already_fullname', $_SESSION['already_fullname']);
                $smarty->assign('already_ip_address', $_SESSION['already_ip_address']);
                $smarty->assign('already_useragent', $_SESSION['already_useragent']);
                $smarty->assign('alrady_last_visited_time', $_SESSION['alrady_last_visited_time']);
            }

            $obj->sessionExpiry();
            if (!isset($_SESSION['username'])) {
                if (isset($_SESSION['already_loggedin'])) {
                    $smarty->display("already_loggedin.tpl");
                    exit();
                }if (isset($_SESSION['session_expired'])) {
                    $smarty->assign('session_expired', $_SESSION['session_expired']);
                    $smarty->assign('expired_idle_time', $_SESSION['expired_idle_time']);
                    $smarty->assign('max_idle_time', $_SESSION['max_idle_time']);
                    $smarty->display("expiry.tpl");
                    exit();
                }
            }
        }
    }
    /**
     * Assign the max file size upload 
     */
    $_SESSION['max_upload_file_size'] = round(_UPLOAD_MAX_FILE_SIZE_);

    if (check_access($username, 'admin_module', 'yes')) {
        $smarty->assign('access_admin_module', true);
    }

    $online_users = get_online_users();
    if (isset($online_users)) {
        $smarty->assign('online_users', $online_users);
        $smarty->assign('count_online_users', count($online_users));
    }

    $user_image = get_user_image($user_id);
    $smarty->assign('user_image', $user_image);

    $lm_contact_obj = get_lm_contact_obj();
    $smarty->assign('lm_version', $lm_contact_obj->version);

    /** Worklist pending */
    $user_worklist_array = getWorkflowList($user_id);
    if ($user_worklist_array) {
        $smarty->assign('user_worklist_array', $user_worklist_array);
        $smarty->assign('total_user_count', count($user_worklist_array));
    }

    /**
     * Include Class Files for required module
     */
    $includes = module_includes("classes", FALSE);
    foreach ($includes as $inc) {
        include_once($inc);
    }

    /**
     * Include Functions for required module
     */
    $includes = module_includes("functions", FALSE);
    foreach ($includes as $inc) {
        include_once($inc);
    }
    if ((empty($module) and empty($action)) || (empty($module) and isset($action))) {
        if (empty($_SESSION['loginfrom'])) {
            header("Location:index.php?module=dash&action=default_dashboard");
        } else {
            header("Location:index.php?");
        }
        unset($_SESSION['loginfrom']);
    } else if (isset($module) and isset($action)) {
        if (file_exists(_MODULES_ . $module . "/actions/" . $action . "." . $module . ".php")) {
            $template_path = _MODULES_ . $module . "/templates/";
            define("_TEMPLATE_PATH_", $template_path);
            $smarty->assign("_TEMPLATE_PATH_", $template_path);
            include_once(_MODULES_ . $module . "/actions/" . $action . "." . $module . ".php");
        } else {
            $error_handler->raiseError('INVALID PAGE');
        }
    } else if (isset($module) and empty($action)) {
        if (file_exists(_MODULES_ . $module . "/actions/home." . $module . ".php")) {
            $template_path = _MODULES_ . $module . "/templates/";
            define("_TEMPLATE_PATH_", $template_path);
            $smarty->assign("_TEMPLATE_PATH_", $template_path);
            include_once(_MODULES_ . $module . "/actions/home." . $module . ".php");
        } else {
            $error_handler->raiseError('INVALID PAGE');
        }
    }

    global $error_handler;
    $error_handler->writeLog();
    $error_handler->flushErrors();
    $smarty->assign('mod', $module);
    $smarty->assign('action', $action);
    $smarty->assign('username', $username);
    $smarty->assign('copy_right_year', $copy_right_year);
    $smarty->assign('dept_id', $dept_id);
    $smarty->display("index.tpl");
}
?>
