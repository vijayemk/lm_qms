<?php
$sop_object_id = (isset($_REQUEST['sop_object_id']))? $_REQUEST['sop_object_id']:null;
$sop_details = new DB_Public_lm_sop_details();    
$sop_details->get("sop_object_id",$sop_object_id);
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=" . rand() . ".doc");
header("Pragma: no-cache");
header("Expires: 0");
echo $sop_details->sop_content;
?>