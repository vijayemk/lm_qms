<?php
/**
 * Project:     LogicMind
 * File:        session.admin.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 * @see session.admin.tpl
 */

error_reporting(E_ALL & ~E_NOTICE );

/** 
 * To list the details of users logged in for the current session 
 * from user_session table
 * @see includes/functions/Admin_Processor.func.php for function getUserName
 */
$session = new DB_Public_user_session;
$session->whereAdd ("logged_in = 'true'");
$session->find();
$sessionlist =array();
$cnt=0;
while($session->fetch()){
    $sessionlist[$cnt]['user_name']=getUserName($session->user_id);
    $sessionlist[$cnt]['user_agent']=$session->user_agent;
    $sessionlist[$cnt]['created']=$session->created;
    $sessionlist[$cnt]['no_of_hits']=$session->no_of_hits;
    $sessionlist[$cnt]['last_impression']=$session->last_impression;
    $sessionlist[$cnt]['ip_address']=$session->ip_address;
    $cnt++;
}
$smarty->assign('sessionlist',$sessionlist);
$smarty->assign('main',_TEMPLATE_PATH_."session.admin.tpl");
?>
