<?php

/**
 * Project: Logicmind
 * File: vms_list.vms.php
 *
 * @author Sivaranjani S,Puneet
 * @since 07/03/2020
 * @package vms
 * @version 1.0
 * @see vms_list.vms.tpl
 * */

$vms_process = new Vms_Processor();
$smarty->assign("vm_list", $vms_process->get_vms_details());
$smarty->assign('main', _TEMPLATE_PATH_ . "vms_list.vms.tpl");
?>