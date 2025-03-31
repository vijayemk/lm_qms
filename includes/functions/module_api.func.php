<?php
/* {{{ Function: module_includes */
/**
 * Create array of files to include from modules
 *
 * @param string $hook Name of folder to match for eg
 *$hook = classes includes all files inside classes directory of that module
 *
 * @returns array
 */
function module_includes($hook) {
    $includes = array();
    if (!empty($_GET['module'])) {
        $dirname = _MODULES_. $_GET['module']."/".$hook;
	if ($dir = opendir($dirname)) {
            while (($item = readdir($dir)) !== false) {
                if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
                }
                //	print($item."<br>");
                $include=$dirname."/".$item;
                if($hook == "functions")
                    $ext= "func";
                else if($hook == "classes")
                    $ext= "class";
                else if($hook == "errors")
                    $ext= "error";
                else if($hook == "resources")
                    $ext= "res";
                if (file_exists($include)) {
                    if(eregi("\.$ext\.php$",$item)){
                        //print("include".$include."<br>");
                        array_push($includes,$include);
                    }
                }
            }
            closedir($dir);
        }
    }
    return $includes;
}

/* {{{ Function: include_module */
/*
 * Include Files of a particular module
 *
 * @param string $hook Name of folder to match for eg
 * includes all files inside classes directory of that module
 *
 * @returns array
 */

function include_module($hook) {
    /**
    **including classes **
    */
    $dirpath=_MODULES_.$hook."/classes";
    //print_r($dirpath);
    if(is_dir($dirpath))
    if ($dir = opendir($dirpath)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            //print_r($dirpath.$item);print("<br>");
            //if (is_file(_CLASSES_.$item) and eregi("\.class\.php$",$item)) {
            if (is_file($dirpath."/".$item) ) {
                if(eregi("class",$item)){
                    include_once($dirpath."/".$item);
                    //print_r("Included File:".$dirpath."/".$item);
                }
            }
        }
    }
    /*
    *including Processors *
    */
    $dirpath=_MODULES_.$hook."/functions";
    //print_r($dirpath)	;
    if(is_dir($dirpath))
    if ($dir = opendir($dirpath)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            //print_r($dirpath.$item);print("<br>");
            //if (is_file(_CLASSES_.$item) and eregi("\.class\.php$",$item)) {
            if (is_file($dirpath."/".$item) ) {
                if(eregi("func",$item)){
                    include_once($dirpath."/".$item);
                    //print_r("Included File:".$dirpath."/".$item);
                }
            }
        }
    }
    /*
    ** including resources **
    */
    $dirpath=_MODULES_.$hook."/resources";
    //print_r($dirpath);
    if(is_dir($dirpath))
    if ($dir = opendir($dirpath)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            //print_r($dirpath.$item);print("<br>");
            //if (is_file(_CLASSES_.$item) and eregi("\.class\.php$",$item)) {
            if (is_file($dirpath."/".$item) ) {
                if(eregi("res",$item)){
                    include_once($dirpath."/".$item);
                    //print_r("Included File:".$dirpath."/".$item);
                }
            }
        }
    }
}

function getTree($inputArray,$parentID='') {
    $tree = array();
    foreach($inputArray as $link) {
        if($link['parent_id'] == $parentID) {
            $links[] = $link;
        }
    }
    if(is_array($links)) {
        foreach($links as $index=>$link) {
            $tree[$index] = $link;
            $tree[$index]['children'] = getTree($inputArray,$link['oid']);
        }
    }
    return $tree;
}

function include_classes($hook) {
    $dirpath=_MODULES_.$hook."/classes";
    if(is_dir($dirpath))
    if ($dir = opendir($dirpath)) {
        while (($item = readdir($dir)) !== FALSE) {
            if ($item == "." or $item == ".." or $item == "CVS") {
                continue;
            }
            if (is_file($dirpath."/".$item) ) {
                if(eregi("class",$item)){
                    include_once($dirpath."/".$item);
                }
            }
        }
    }
}
?>