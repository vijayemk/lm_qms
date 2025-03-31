<?php
// Make sure register globals is turned off.
// php_flag register_globals off
if (ini_get("register_globals") == 1) {
    print "Please turn off register_globals in your php.ini \n";
    print "or make sure your webserver is setup to obey .htaccess files.\n";
    exit;
}
// Make sure _PATH_ is defined, otherwise when we pull in the config
// file it will have no idea where to find our directories
if (!defined("_PATH_")) {
    define("_PATH_", dirname(__FILE__));
}
//ini_set("include_path",".:/usr/share/pear/");
$separator = '';
$current_path = ini_get('include_path');
if (strstr($current_path, ';')) {
    $separator = ';';       //for windows
} else {
    $separator = ':';   //for linux
}

if ($separator == '') $separator = ':'; // If no pre defined  path
ini_set('include_path', _PATH_ . '/pear' . $separator . $current_path);
ini_set("include_path", "." . $separator . _PATH_ . '/pear');
ini_set("session.use_trans_sid", 0);

// Without these two files we're screwed
require_once(_PATH_ . "/configs/const.php");
require_once(_DB_ . "lm-db.php");
include_once(SMARTY_DIR . "Smarty.class.php");

//Including PEAR related Files
require_once("DB.php");
require_once("PEAR.php");
require_once("Auth/Auth.php");
require_once("Auth/Auth_HTTP.php");

// If the logs directory is not writable, quit now
if (!is_writable(_LOGS_)) {
    print "Logs directory is not writable by the web server.  Please correct this.";
    print " Set Permissions for the logs directory : " . _LOGS_;
    exit;
}

/*******************Smarty Initilaization************************************/
$smarty = new Smarty;
//$smarty->debugging    = $DEBUG;
$smarty->debugging    = FALSE;
//$smarty->debug_tpl  = _TEMPLATES_ ."/debug.tpl";
$smarty->debug_tpl  = "Smarty/libs/debug.tpl";
/*$smarty->template_dir = _TEMPLATES_.$_SESSION['theme']."/tpl/";
$smarty->compile_dir  = _TPLCOMPILE_;
$smarty->config_dir   = _TPLCONFIG_;
$smarty->cache_dir    = _TPLCACHE_;
$smarty->debugging    = FALSE;
$smarty->caching      = FALSE;  // DO NOT CHANGE THIS!*/

$smarty->assign('LM_URL', _URL_ . "index.php");
$smarty->assign('LM_IMAGE', _URL_ . "/images/");

/*******************Smarty Initilaization************************************/

// Load all classes file located in _CLASSES_
if ($dir = opendir(_CLASSES_)) {
    while (($item = readdir($dir)) !== FALSE) {
        if ($item == "." or $item == ".." or $item == "CVS") {
            continue;
        }
        //if (is_file(_CLASSES_.$item) and eregi("\.class\.php$",$item)) {
        if (is_file(_CLASSES_ . $item)) {
            if (eregi("class", $item))
                include_once(_CLASSES_ . $item);
            //print(_CLASSES_.$item);
        }
    }
}
if ($dir = opendir(_DB_CLASSES_)) {
    while (($item = readdir($dir)) !== FALSE) {
        if ($item == "." or $item == ".." or $item == "CVS") {
            continue;
        }
        if (is_file(_DB_CLASSES_ . $item)) {
            include_once(_DB_CLASSES_ . $item);
        }
    }
}

// Load all resource files of each module
/**********************************************************/

/*Opening Directory of Modules*/
if ($dir = opendir(_MODULES_)) {
    while (($item = readdir($dir)) !== FALSE) {
        if ($item == "." or $item == ".." or $item == "CVS") {
            continue;
        }
        $dirpath = _MODULES_ . $item . "/resources";
        /*To check whether it is a directory*/
        if (is_dir(_MODULES_ . $item) && is_dir($dirpath)) {
            if ($resdir = opendir($dirpath)) {
                //print_r($dirpath);
                while (($item = readdir($resdir)) !== FALSE) {
                    //print_r($item);
                    if ($item == "." or $item == ".." or $item == "CVS") {
                        continue;
                    }
                    if (is_file($dirpath . "/" . $item)) {
                        if (eregi("res", $item)) {
                            include_once($dirpath . "/" . $item);
                            //print("included" .$dirpath."/".$item."<br>");
                        }
                    }
                }
            }
        }
    }
}

/*******************Load Debugger************************************/
if (!isset($myDebugger)) {
    if (defined("DEBUGGER_LOADED"))
        $myDebugger = new Debugger(
            array(
                'color' => 'violet',
                'prefix' => 'MAIN',
                'buffer' =>  1
            )
        );
    // Set the debug log...
    $myDebugger->setLogFile("logs/debug.log");
    if ($DEBUG)
        $myDebugger->write("Debugger started");
}
/********************Load Debugger***************************************/

/******************* Error Handler************************************/
if (!isset($error_handler)) {
    if (defined("ERROR_HANDLER_LOADED")) {
        $error_handler = new LogicmindError();
        $myDebugger->write("Error Handler started");
        // Import error definitions...
        $error_handler->importDefinitions(_ERROR_FILE_);

        // Load all error definitions of all modules
        /**********************************************************/
        /*Opening Directory of Modules*/
        if ($dir = opendir(_MODULES_)) {
            while (($item = readdir($dir)) !== FALSE) {
                if ($item == "." or $item == ".." or $item == "CVS") {
                    continue;
                }
                $dirpath = _MODULES_ . $item . "/errors";
                /*To check whether it is a directory*/
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
        //End of opening modules
    } //End of if (defined("ERROR_HANDLER_LOADED"))

    // Set the templates for fatal and non-fatal errors...
    $error_handler->setTemplates("templates/fatal_error.tpl", "templates/non-fatal_error.tpl");

    // Set the error log...
    $error_handler->setLogFile("logs/ErrorHandler.log");

    // Log fatal errors...
    $error_handler->logFatalErrors(true);
}
// If using the  error handler
// instead of default, then set it now
//my_error_handler is an callback function
// Dont display any errors, just log them in
// the logs directory
ini_set("display_errors", $DEBUG);
ini_set("log_errors", 1);
ini_set("error_log", _LOGS_ . "phperrors");
