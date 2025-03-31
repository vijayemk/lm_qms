<?php
/**
 * Project:     Logicmind
 * File:        upcoming_training.sop.php
 *
 * @author Ananthakumar.v 
 * @since 02/06/2017
 * @package sop
 * @version 1.0
 * @see upcoming_training.sop.php
 */
$date_time=date('Y-m-d G:i:s');
$sop_process=new Sop_Processor();
$sop_training_array = $sop_process->upcoming_training_details();
$sop_oe_array = $sop_process->get_sop_online_exam_userlist(null,null,null,'yes','Not Completed');
if(!empty($sop_training_array)){
    $smarty->assign("sop_training_array",$sop_training_array);
}
if(!empty($sop_oe_array)){
    $smarty->assign("sop_oe_array",$sop_oe_array);
}
$smarty->assign('main',_TEMPLATE_PATH_."upcoming_training.sop.tpl");
?>
