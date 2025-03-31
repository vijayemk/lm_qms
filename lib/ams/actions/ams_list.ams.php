<?php

/**
 * Project: Logicmind
 * File: ams_list.ams.php
 *
 * @author Sivaranjani S,Puneet
 * @since 07/03/2020
 * @package ams
 * @version 1.0
 * @see ams_list.ams.tpl
 * */

$ams_process = new Ams_Processor();
$smarty->assign("ams_list", $ams_process->get_ams_schedule_deatils());
$smarty->assign('main', _TEMPLATE_PATH_ . "ams_list.ams.tpl");
?>