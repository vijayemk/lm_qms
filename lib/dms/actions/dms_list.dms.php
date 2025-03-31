<?php

/**
 * Project:     Logicmind
 * File:        dms_list.dms.php
 *
 * @author Sivaranjani S,Puneet
 * @since0 07/03/2020
 * @package dms
 * @version 1.0
 * @see dms_list.dms.tpl
 * */

$dms_process = new Dms_Processor();
$smarty->assign("dm_list", $dms_process->get_dms_details());
$smarty->assign('main', _TEMPLATE_PATH_ . "dms_list.dms.tpl");
?>