<?php

/**
 * Project: Logicmind
 * File: oos_list.oos.php
 *
 * @author Jithin 
 * @since 24/01/2025
 * @package oos
 * @version 1.0
 * @see oos_list.oos.php
 **/

$oosProcess = new Oos_Processor;
// d($oosProcess->getOosDetails());
$smarty->assign("oosLists", $oosProcess->getOosDetails());
$smarty->assign('main', _TEMPLATE_PATH_ . "oos_list.oos.tpl");
