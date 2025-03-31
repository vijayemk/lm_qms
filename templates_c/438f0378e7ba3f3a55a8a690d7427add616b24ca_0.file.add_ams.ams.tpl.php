<?php
/* Smarty version 3.1.30, created on 2024-10-28 11:08:12
  from "/var/www/html/lm_qms/lib/ams/templates/add_ams.ams.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671f709cb04108_55632182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '438f0378e7ba3f3a55a8a690d7427add616b24ca' => 
    array (
      0 => '/var/www/html/lm_qms/lib/ams/templates/add_ams.ams.tpl',
      1 => 1728369345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_671f709cb04108_55632182 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>
<head>
    <style>
        span.fc-header-title > h2{
            margin: 0px !important;
        }
        .fc-event{
            font-weight: bold !important;
        }
    </style>
</head>
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<!-- Specific CSS -->
<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css">
<link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css">    
<link href="css/theme.min.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> Add </li>
            <li class="active"> QMS </li>
            <li class="active"> Audit Management (AMS)</li>
            <li class="active"> Add Audit Schedule</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" >
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="panel-group" id="accordion">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabs widget">
                        <ul class="nav nav-tabs widget">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_audit_schedule_list">
                                    <span class="menu-icon"><i class="fa fa-list"></i></span> Scheduled List<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_initiate_audit">
                                    <span class="menu-icon"><i class="fa fa-plus"></i></span> Audit Schedule<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                            <li >
                                <a data-toggle="tab" href="#tab_audit_calendar">
                                    <span class="menu-icon"><i class="fa fa-calendar"></i></span> Audit Calendar<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                            <li >
                                <a data-toggle="tab" href="#tab_audit_calendar1" class="audit_calendar">
                                    <span class="menu-icon"><i class="fa fa-calendar"></i></span> Audit Calendar List<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab_audit_schedule_list" class="tab-pane sidebar-widget active">
                                <div class="vd_content-section clearfix">
                                    <div class="panel-body  panel-bd-left">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['ams_list']->value)) {?>
                                            <table class="table table-bordered table-striped generate_datatable" title="Audit Schdule List" data-sort_column=5 data-show_rows=15 data-whitespace="nowrap" data-ori="landscape" data-pagesize="A3" data-sort_column=0>
                                                <thead>
                                                    <tr>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_no"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"wf_status"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['doc_link'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['audit_type_name'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['audit_sub_type_name'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['audit_plant'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['audit_dept'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['from_date'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['to_date'];?>
</td>
                                                            <td style="white-space: pre-wrap !important"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                                                            <td><span class="font-semibold label vd_bg-grey"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span></td>
                                                            <td><span class="font-semibold label vd_bg-grey"><?php echo $_smarty_tpl->tpl_vars['item']->value['wf_status'];?>
</span></td>
                                                            <td class="menu-action" data-ams_data='<?php echo htmlspecialchars(json_encode($_smarty_tpl->tpl_vars['item']->value));?>
'>
                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['can_initiate']) {?>
                                                                    <span class="initiate_audit" data-target="#modal_initiate_audit" data-toggle="modal">
                                                                        <a data-original-title="Initiate Audit" data-toggle="tooltip" data-placement="bottom" class="btn menu-icon vd_bd-green vd_green"><i class="fa fa-fw fa-plus"></i></a>
                                                                    </span>
                                                                    <span class="edit_audit_schedule" data-target="#modal_edit_audit_details" data-toggle="modal">
                                                                        <a data-original-title="Edit Audit Schedule" data-toggle="tooltip" data-placement="bottom" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil-square-o"></i></a>
                                                                    </span>
                                                                    <span class="delete_audit_schedule" data-target="#modal_delete_audit_details" data-toggle="modal">
                                                                        <a data-original-title="Cancel Audit Schedule" data-toggle="tooltip" data-placement="bottom" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>
                                                                    </span>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        <?php } else { ?>
                                            <div class="alert alert-danger alert-dismissable alert-condensed mgbt-md-0">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                <i class="fa fa-exclamation-circle append-icon"></i> No Audit Scheduled
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_initiate_audit" class="tab-pane sidebar-widget">
                                <div class="vd_content-section clearfix">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">INPUT FORM</h3>
                                    </div>
                                    <div class="panel-body  panel-bd-left">
                                        <!-- Audit Schedule Form -->
                                        <form name="add_audit_schedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_audit_schedule-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"temporary_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" class="am_no" name="aams_am_no" title="Invalid Audit No" value="<?php echo $_smarty_tpl->tpl_vars['temp_ams_no']->value;?>
" placeholder="Auto Generated" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select name="aams_plant" title="Select Valid Plant" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '#aams_audit_dept', '', '', '');">
                                                            <option value="">Select</option>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</option>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select class="audit_type" name="aams_audit_type" title="Select Valid Audit Type">
                                                            <option value="">Select</option>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['am_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select class="audit_sub_type" name="aams_audit_sub_type" title="Select Valid Audit Sub Type">
                                                            <option value="">Select</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 audit_dept" style="display:none;">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select name="aams_audit_dept" id="aams_audit_dept" title="Select Valid Audit Department">
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" class="generate_datepicker date_changed" name="aams_start_date" title="Select Valid Date" data-datepicker_min=0 data-date_changed="aams_end_date" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" class="generate_datepicker" name="aams_end_date" title="Select Valid Date" data-datepicker_min=0 readonly disabled>                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="aams_desc" title="Enter Valid Description">  
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($_smarty_tpl->tpl_vars['master_data_creation_alert']->value) {?>
                                                <div class="alert alert-danger">
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Some of the master data entries are still not created in the admin section under AMS Master Data such as "Audit Sub Type". Before proceeding further, please ensure these entries are created.
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-actions-condensed row mgbt-xs-0 text-right" >
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="audit_trail_action" value="Add Audit Schedule">
                                                        <input type="hidden" name="add_audit_schedule">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="add_audit_schedule" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_audit_calendar" class="tab-pane sidebar-widget">
                                <div class="vd_content-section clearfix">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="panel widget light-widget panel-bd-top">
                                                <div class="panel-body">
                                                    <div id="audit_calendar" class="mgtp-10"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_audit_calendar1" class="tab-pane sidebar-widget">
                                <div class="vd_content-section clearfix">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="panel widget light-widget panel-bd-top">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="row mgbt-md-10">
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select class="ac_plant ca_sf" id="ac_plant" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '#ac_dept', '', '', '');">
                                                                        <option value="">All</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['usr_plant_id']->value == $_smarty_tpl->tpl_vars['item']->value['plant_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</option>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select class="ac_type ca_sf">
                                                                        <option value="">All</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['am_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select class="ac_sub_type ca_sf">
                                                                        <option value="">All</option>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select class="ac_dept ca_sf">
                                                                        <option value="">All</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"start_date"),$_smarty_tpl);?>
 </label>
                                                                <div class="controls">
                                                                    <input type=text class="required generate_datepicker date_changed ac_start_date ca_sf" data-datepicker=0 value="<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"end_date"),$_smarty_tpl);?>
 </label>
                                                                <div class="controls">
                                                                    <input type=text class="required generate_datepicker ac_end_date ca_sf" data-datepicker=0 value="<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"status"),$_smarty_tpl);?>
 </label>
                                                                <div class="controls">
                                                                    <select class="ac_status ca_sf">
                                                                        <option value="">All</option>
                                                                        <option value="Pending">Open</option>
                                                                        <option value="Closed">Closed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_status"),$_smarty_tpl);?>
 </label>
                                                                <div class="controls">
                                                                    <select class="ac_audit_status ca_sf">
                                                                        <option value="">All</option>
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="Cancelled">Cancelled</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 mgtp-0">
                                                        <button class="btn vd_bg-green vd_white ac_search_btn  pull-right mgl-10"><span class="menu-icon"><i class="fa fa-fw fa-search"></i></span> Search</button>
                                                        <button class="btn vd_bg-red vd_white page_reload  pull-right" type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel widget light-widget panel-bd-top">
                                                <div class="panel-body result_area">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-calendar"></i>Audit Calendar</span></h4>
                                                    <table class="table table-bordered table-striped generate_datatable audit_ca_result_table" title="Audit Calendar" data-whitespace="nowrap" data-ori="landscape" data-pagesize="A3" data-sort_column=0>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_month"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_status"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"wf_status"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="panel-body audit_trail_result no_records" style="display: none;"> 
                                                    <div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>No Records Found!</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>
</div>
<!-- Start Of Show AUdit Details Modal -->
<div class="modal fade" id="modal_show_audit_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg width-60">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Audit Schedule Details<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"temporary_no"),$_smarty_tpl);?>
</label>
                            <input type="text" class="show_audit_no" readonly>
                        </div>
                        <div class="col-md-6 audit_dept">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_audit_plant" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 audit_dept">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_audit_dept" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_audit_type_name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_audit_sub_type_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_from_date" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_to_date" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_description" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scheduled_by"),$_smarty_tpl);?>
</label>
                            <input type="text" class="show_sch_by_info" readonly>
                        </div>
                        <div class="col-md-6 audit_dept">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scheduled_date"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_sch_date" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"assigned_by"),$_smarty_tpl);?>
</label>
                            <input type="text" class="show_assigned_by_info" readonly>
                        </div>
                        <div class="col-md-6 audit_dept">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"assigned_date"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_assigned_date" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_lead"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_audit_lead_info" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_audit_status" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_status" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"wf_status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="show_wf_status" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer background-login"></div>
        </div>
    </div>
</div>
<!-- End Of Show AUdit Details Modal -->          
<!-- Start Of Initiate Audit Modal -->
<div class="modal fade" id="modal_initiate_audit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg width-60">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Initiate Audit <span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="initiate_audit-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="initiate_audit-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"temporary_no"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="am_no initiate_audit_no" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" class="initiate_description" readonly> 
                            </div>
                        </div>
                    </div>
                    <hr><h4><span class="vd_blue"><strong>Assign Audit Lead</strong></span></h4>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select name="audit_lead_plant" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '#audit_lead_dept', '', '', '');" title="Select Valid Plant">
                                    <option value="">Select</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="control">
                                <select name="audit_lead_dept" id="audit_lead_dept" onchange="get_dept_users(this.options[this.selectedIndex].value, '#audit_lead', '', '', '');" title="Select Valid Department">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"audit_lead"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls ">
                                <select name="audit_lead" id="audit_lead" required title="Select Valid User Name">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="am_object_id" class="initiate_object_id">
                    <div class="form-actions-condensed row mgbt-xs-0 text-right pdlr-10">
                        <input type="hidden" name="audit_trail_action" value="Initiate Audit">
                        <input type="hidden" name="initiate_audit">
                        <button class="btn vd_bg-green vd_white" type="submit" id="initiate_audit" ><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Initiate </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Start Of Initiate Audit Modal -->
<div class="modal fade" id="modal_edit_audit_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  width-60">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Audit Schedule Details<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="update_audit_schedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_audit_schedule-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"temporary_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <input type="text" class="audit_no update_audit_no" name="uams_audit_no" title="Invalid Audit No" readonly="true">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="update_audit_plant_id" name="uams_audit_plant" title="Select Valid Audit Plant" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '.update_audit_dept', '', '', '');">
                                    <option value="">All</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="audit_type update_audit_type_id" name="uams_audit_type" title="Select Valid Audit Type">
                                    <option value="">Select</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['am_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select> 
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="audit_sub_type update_audit_sub_type_id" name="uams_audit_sub_type" title="Select Valid Audit Sub Type">
                                    <option value="">Select</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4 audit_dept">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <select class="update_audit_dept" name="uams_audit_dept" title="Select Valid Audit Department">
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <input type="text" class="generate_datepicker date_changed update_from_date" name="uams_start_date" title="Select Valid Date" data-datepicker_min=0 data-date_changed="uams_end_date" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <input type="text" class="generate_datepicker  update_to_date" name="uams_end_date" title="Select Valid Date" data-datepicker_min=0 readonly disabled>                                                        
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <input class="update_description" type="text" name="uams_desc" title="Enter Valid Description">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="audit_sch_id" class="update_object_id">
                    <div class="form-actions-condensed row mgbt-xs-0 text-right pdlr-10">
                        <input type="hidden" name="am_object_id" class="update_object_id">
                        <input type="hidden" name="audit_trail_action" value="Update Audit Schedule">
                        <input type="hidden" name="update_audit_schedule">
                        <button class="btn vd_bg-blue vd_white" type="submit" id="update_audit_schedule" ><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Of Edit Audit Details Modal -->  
<!-- Start Of Delete Audit Details Modal -->
<div class="modal fade" id="modal_delete_audit_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Cancel Audit Schedule<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="delete_audit_schedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="delete_audit_schedule-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"temporary_no"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input type="text" name="audit_no" class="audit_no delete_audit_no" title="Invalid Audit no" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <input class="delete_description" type="text" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                            <div class="controls">
                                <textarea class="delete_reason" name="cancel_reason" title="Enter Valid Reason" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="am_object_id" class="delete_object_id">
                    <div class="form-actions-condensed row mgbt-xs-0 text-right pdlr-10">
                        <input type="hidden" name="audit_trail_action" value="Cancel Audit Schedule">
                        <input type="hidden" name="delete_audit_schedule">
                        <button class="btn vd_bg-red vd_white" type="submit" id="delete_audit_schedule" ><span class="menu-icon"><i class="glyphicon glyphicon-trash"></i></span> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Of Edit Audit Details Modal -->  

    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Calendar -->
    <?php echo '<script'; ?>
 type="text/javascript" src='plugins/moment/moment.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src='plugins/fullcalendar/fullcalendar.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            //Add Audit Schedule Form
            $('#add_audit_schedule-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ":hidden",
                rules: {
                    aams_audit_type: {
                        required: true
                    },
                    aams_plant: {
                        required: true
                    },
                    aams_audit_sub_type: {
                        required: true
                    },
                    aams_am_no: {
                        required: true
                    },
                    aams_audit_dept: {
                        required: true
                    },
                    aams_start_date: {
                        required: true
                    },
                    aams_end_date: {
                        required: true
                    },
                    aams_desc: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#add_audit_schedule-form')).fadeIn(500);
                    scrollTo($('#add_audit_schedule-form'), -100);
                },
                submitHandler: function (form) {
                    $('#add_audit_schedule').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
            //initiate Audit Form
            $('#initiate_audit-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    audit_lead: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#initiate_audit-form')).fadeIn(500);
                    scrollTo($('#initiate_audit-form'), -100);
                },
                submitHandler: function (form) {
                    $('#delete_audit_schedule').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
            //Update Audit Schedule Form
            $('#update_audit_schedule-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ":hidden",
                rules: {
                    uams_am_no: {
                        required: true
                    },
                    uams_audit_type: {
                        required: true
                    },
                    uams_audit_plant: {
                        required: true
                    },
                    uams_audit_sub_type: {
                        required: true
                    },
                    uams_audit_dept: {
                        required: true
                    },
                    uams_start_date: {
                        required: true
                    },
                    uams_end_date: {
                        required: true
                    },
                    uams_desc: {
                        minlength: 3,
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#update_audit_schedule-form')).fadeIn(500);
                    scrollTo($('#update_audit_schedule-form'), -100);
                },
                submitHandler: function (form) {
                    $('#add_audit_schedule').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
            //Delete Audit Schedule Form
            $('#delete_audit_schedule-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ":hidden",
                rules: {
                    delete_audit_no: {
                        required: true
                    },
                    am_object_id: {
                        required: true
                    },
                    cancel_reason: {
                        required: true,
                        minlength: 3
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#delete_audit_schedule-form')).fadeIn(500);
                    scrollTo($('#delete_audit_schedule-form'), -100);
                },
                submitHandler: function (form) {
                    $('#delete_audit_schedule').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
            //Add audit schedule
            $(document).on("change", '.audit_type', (e) => ($(e.target).find("option:selected").text() === "INTERNAL") ? $(".audit_dept").show() : $(".audit_dept").hide());
            $(document).on('change', '.audit_type', (e) => x_get_ams_sub_type($(e.target).val(), (result) => ajax_respone_handler_set_dropdown(result, ".audit_sub_type")));
            //Initiate audit
            $(document).on('click', '.initiate_audit', (e) => $.each($(e.target).closest("td").data('ams_data'), (key, value) => $('#modal_initiate_audit').find(`.initiate_${key}`).val(value)));
            //edit audit schedule
            $(document).on('click', '.edit_audit_schedule', function (e) {
                let ams_data = $(e.target).closest("td").data('ams_data');
                x_get_ams_sub_type(ams_data.audit_type_id, function (result) {
                    ajax_respone_handler_set_dropdown(result, $('#modal_edit_audit_details').find(".audit_sub_type"));
                    $.each(ams_data, (key, value) => $('#modal_edit_audit_details').find(`.update_${key}`).val(value));
                    (ams_data.audit_type_name === "INTERNAL") ? $('#modal_edit_audit_details').find(".audit_dept").show() : $('#modal_edit_audit_details').find(".audit_dept").hide();
                    x_get_dept_list(ams_data.audit_plant_id, function (dept_result) {
                        ajax_respone_handler_set_dropdown(dept_result, $('#modal_edit_audit_details').find(".update_audit_dept"));
                        $(".update_audit_dept").val(`${ams_data.audit_dept_id}`);
                    });


                });
            });
            //Delete audit schedule
            $(document).on('click', '.delete_audit_schedule', (e) => $.each($(e.target).closest("td").data('ams_data'), (key, value) => $('#modal_delete_audit_details').find(`.delete_${key}`).val(value)));
            //Audit Calendar
            if ($.fullCalendar) {
                $('#audit_calendar').html("").fullCalendar({
                    defaultView: 'month',
                    header: {
                        left: 'title, prev,next',
                        center: '',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: <?php echo $_smarty_tpl->tpl_vars['ams_calendor_data']->value;?>
,
                    eventClick: function (ams_data) {
                        $("#modal_show_audit_details").modal();
                        $.each(ams_data.audit_details, (key, value) => $('#modal_show_audit_details').find(`.show_${key}`).val(value));
                    }
                });
            }
            //Audit Calendar
            $(document).on('change click', '.ac_type, .audit_calendar', (e) => x_get_ams_sub_type($(".ac_type").val(), (result) => ajax_respone_handler_set_dropdown(result, ".ac_sub_type", null, [], 'All')));
            $(document).on('click', '.audit_calendar', (e) => x_get_dept_list($(".ac_plant").val(), (result) => ajax_respone_handler_set_dropdown(result, ".ac_dept", null, [], 'All')));
            $(document).on("click", ".audit_calendar ,.ac_search_btn", function () {
                var params = {
                    audit_plant: $(".ac_plant").val(),
                    audit_type_id: $(".ac_type").val(),
                    audit_sub_type_id: $(".ac_sub_type").val(),
                    start_date: $(".ac_start_date").val(),
                    end_date: $(".ac_end_date").val(),
                    status: $(".ac_status").val(),
                    audit_status: $(".ac_audit_status").val(),
                };
                lm_dom.append_search_icon(".ca_sf");
                loading.show(this);
                x_get_ams_schedule_list(JSON.stringify(params), function (result) {
                    console.log(result);
                    let table = ($.fn.dataTable.isDataTable('.audit_ca_result_table')) ? $('.audit_ca_result_table').DataTable() : null;
                    if (typeof result === 'object') {
                        table.clear().draw();
                        $('.result_area').show();
                        $.each(result, function (key, val) {
                            table.row.add(['', val['from_date'], val['to_date'], val['audit_month'], val['doc_link'], val['audit_type_name'], val['audit_sub_type_name'], val['audit_dept'], `<span class="lm_prewrap">${val['description']}</span>`, val['status'], val['audit_status'], val['wf_status']]).draw(true);
                        });
                        $('.no_records').hide();
                        loading.hide(this);
                        return;
                    }
                    loading.hide(this);
                    $('.result_area').hide();
                    $('.no_records').show();
                });
            });
        });
    <?php echo '</script'; ?>
>


<?php }
}
