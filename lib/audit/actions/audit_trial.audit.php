<?php
/**
 * Project:     Logicmind
 * File:        audit_trial.audit.php
 *
 * @author Ananthakumar V
 * @since 30/03/2017
 * @package admin
 * @version 1.0
 * @see audit_trial.audit.tpl
 */

error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'audit_trial', 'yes')) {
    $error_handler->raiseError("audit_trial");
}
$usr_id	= $_SESSION['user_id'];
include_module("sop");
$sop_process=new Sop_Processor();
$deptlist = get_All_DeptList();
if(!empty($deptlist)){
    $smarty->assign("deptlist",$deptlist);
}
$sop_master = new DB_Public_lm_sop_master();
$sop_master->orderBy('sop_name');
$sop_master->find();
while($sop_master->fetch()){
    $soplist[]=array('sop_object_id'=>$sop_master->sop_object_id,'sop_name'=>$sop_master->sop_name,'sop_no'=>$sop_process->get_sop_no($sop_master->sop_object_id));
}

$sop_type = new DB_Public_lm_sop_type();
$sop_type->orderBy('type');
$sop_type->find();
while($sop_type->fetch()){
    $soptypelist[]=array('object_id'=>$sop_type->object_id,'type'=>$sop_type->type,'desc'=>$sop_type->description);
}

if(!empty($soplist)){
    $smarty->assign("soplist",$soplist);
}
if(!empty($soptypelist)){
    $smarty->assign("soptypelist",$soptypelist);
}
$currentyear=date('y');
$startyear=17;
$month_range= array(
	'01' => 'Jan',
	'02' => 'Feb',
	'03' => 'Mar',
	'04' => 'Apr',
	'05' => 'May',
	'06' => 'Jun',
	'07' => 'Jul',
	'08' => 'Aug',
	'09' => 'Sep',
	'10' => 'Oct',
	'11' => 'Nov',
	'12' => 'Dec',
	);
$list=$sop_process->count_worklist($usr_id);
if(!empty($list)){
    $smarty->assign('list',$list);
}
$year_range =range($startyear,$currentyear);
$smarty->assign("year_range",$year_range);
$smarty->assign("currentyear",$currentyear);
$smarty->assign("month_range",$month_range);
$smarty->assign('main',_TEMPLATE_PATH_."audit_trial.audit.tpl");
?>
