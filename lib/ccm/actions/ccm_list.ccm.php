<?php

/**
 * Project: Logicmind
 * File: ccm_list.ccm.php
 *
 * @author Sivaranjani S,Puneet
 * @since 07/03/2020
 * @package ccm
 * @version 1.0
 * @see ccm_list.ccm.tpl
 * */

$ccm_process = new Ccm_Processor();
$smarty->assign("ccm_list", $ccm_process->get_ccm_details());
$smarty->assign('main', _TEMPLATE_PATH_ . "ccm_list.ccm.tpl");
?>