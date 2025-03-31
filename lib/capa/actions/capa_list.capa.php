<?php

/**
 * Project: Logicmind
 * File: capa_list.capa.php
 *
 * @author Sivaranjani S,Puneet
 * @since 07/03/2020
 * @package capa
 * @version 1.0
 * @see capa_list.capa.tpl
 * */

$capa_process = new Capa_Processor();
$smarty->assign("capa_list", $capa_process->get_capa_details());
$smarty->assign('main', _TEMPLATE_PATH_ . "capa_list.capa.tpl");
