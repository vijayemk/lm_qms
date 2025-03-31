<?php
/**
 * Project:     Logicmind
 * File:        view_pre_loaded_template.file.php

* @author Ananthakumar .V
* @since 02/05/2019
* @package file
* @version 1.0
*/
error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'sop_view','yes')) {
    $error_handler->raiseError("sop_view");
}
$template_id = $_REQUEST['object_id'];
$temp_obj = new DB_Public_lm_pre_loaded_template();
if($temp_obj->get("object_id",$template_id)){
    if($temp_obj->orientation=="L"){
        $format_orientation = "l";
    }
    if($temp_obj->orientation=="P"){
        $format_orientation = "p";
    }
    Redirect("?module=file&action=view_pre_loaded_template_file_{$format_orientation}&object_id={$template_id}", false);
}else {
    $error_handler->raiseError("INVALID REQUEST");
}
function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
?>
