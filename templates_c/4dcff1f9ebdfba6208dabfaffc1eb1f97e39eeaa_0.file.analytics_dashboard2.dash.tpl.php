<?php
/* Smarty version 3.1.30, created on 2025-03-18 14:18:01
  from "/var/www/html/lm_qms/lib/dash/templates/analytics_dashboard2.dash.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d9334116a1b7_65920129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dcff1f9ebdfba6208dabfaffc1eb1f97e39eeaa' => 
    array (
      0 => '/var/www/html/lm_qms/lib/dash/templates/analytics_dashboard2.dash.tpl',
      1 => 1742286643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_67d9334116a1b7_65920129 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<!--Bootstarp Select  Latest compiled and minified CSS -->
<link rel="stylesheet" href="plugins/bootstrap-select/bootstrap-select.min.css">

<!-- Bootstarp Select Latest compiled and minified JavaScript -->
<?php echo '<script'; ?>
 src="plugins/bootstrap-select/bootstrap-select.min.js"><?php echo '</script'; ?>
>



    <?php echo '<script'; ?>
 language="javascript">
        function reload_page() {
            setTimeout("location.reload(true);", 1500);
        }
    <?php echo '</script'; ?>
>

<style>
.bootstarp-select-custom-style{
    padding-top: 3px;
    padding-bottom: 3px;
}
#lineChart {
    max-height: 67vh;
    width: 100%;
}
</style>
<form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI'];?>
" role="form" name="default_dashboard" method="post">
    <div class="vd_head-section clearfix">
        <div class="vd_panel-header">
            <ul class="breadcrumb">
                <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
                <li class="active">Dashboard</li>
            </ul>
            <div class="vd_panel-menu hidden-sm hidden-xs"
                data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both."
                data-step=5 data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle"
                    data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i
                        class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip"
                    data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle"
                    data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i
                        class="glyphicon glyphicon-fullscreen"></i> </div>
            </div>
        </div>
    </div>
    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="tabs widget">
                    <ul class="nav nav-tabs widget">
                        <li class="active">
                            <a data-toggle="tab" href="#dashboard-tab">
                                <span class="menu-icon"><i class="fa fa-list"></i></span>
                                DASHBOARD
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#trending-tab" id="trending-dashboard" data-toggle="tab"> <i class="append-icon fa fa-fw fa-bar-chart-o"></i>
                                Trending <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
                        </li>
                    </ul>
                    <div class="tab-content"
                        style="background-color: #F0F0F0; border: 4px solid border-top: none;">
                        <div id="dashboard-tab" class="tab-pane active">
                            <div class="pd-20">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['docGroups']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                    <div class="row dash_template" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
Dash" data-doc_group="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
"
                                        data-doc_group_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="panel widget">
                                                    <div class="panel-heading vd_bg-grey">
                                                        <h3 class="panel-title">
                                                            <span class="menu-icon"><i class="icon-pie"></i></span>
                                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
 CHART
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body" style="display: block;">
                                                        <div class="panel vd_transaction-widget light-widget widget"
                                                            style="box-shadow:none; margin-bottom:0;">
                                                            <div class="panel-body" style="padding-bottom: 0;">
                                                                <!-- vd_panel-menu -->
                                                                <h5 class="mgbt-xs-0 mgtp-0">
                                                                    <span class="menu-icon append-icon"> <i
                                                                            class="icon-pie"></i></span>
                                                                    <strong id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
YearTitle">Current Year
                                                                        Data</strong>
                                                                </h5>
                                                                <div id="pie-chart-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
" class="pie-chart"
                                                                    style="height: 350px; padding: 0px; position: relative;">
                                                                    <canvas class="flot-base" width="463" height="388"
                                                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 463px; height: 350px;"></canvas>
                                                                    <canvas class="flot-overlay" width="463" height="388"
                                                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 463px; height: 350px;"></canvas>
                                                                    <div class="legend">
                                                                        <div
                                                                            style="position: absolute; width: 55px; height: 138px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vd_info br">
                                                                    <h5 class="text-right font-semibold"><strong>TOTAL
                                                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
</strong></h5>
                                                                    <h3 class="text-right  vd_red Total<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
"></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="panel widget">
                                                    <div class="panel-heading vd_bg-grey">
                                                        <h3 class="panel-title"> <span class="menu-icon"> <i
                                                                    class="icon-layout"></i> </span> <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
 TABLE
                                                        </h3>
                                                        <div class="vd_panel-menu" style="display: flex;">
                                                            <div data-action="refresh" data-original-title="Refresh"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                class=" menu entypo-icon smaller-font refreshTable"
                                                                id="refresh-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
">
                                                                <i class="icon-cycle"></i>
                                                            </div>

                                                            <div style="margin-right: 5px;margin-buttom: 5px;">
                                                            <select class="selectpicker ModuleFilter" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
ModuleFilter"  multiple data-style="bootstarp-select-custom-style" data-actions-box="true" multiple data-selected-text-format="count" data-none-selected-text="Modules Not Selected">
                                                                    
                                                          </select>
                                                            </div>
                                                            <div style="margin-right: 5px;">
                                                                <select class="width-100 YearTo" style="padding: 2px;"
                                                                    id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
YearTo">
                                                                </select>
                                                            </div>
                                                            <div style="margin-right: 5px;">
                                                                <select class="width-100 YearFrom" style="padding: 2px;"
                                                                    id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
YearFrom">
                                                                </select>
                                                            </div>
                                                            <div style="margin-right: 5px;">
                                                                <select class="width-100 PlantId" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
PlantId" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '#<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
DepartmentId', '', '', 'All Department');"
                                                                    style="padding: 2px;">
                                                                    <option value="">All Plant</option>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plants']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"
                                                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['plant_id'] == $_smarty_tpl->tpl_vars['userPlantId']->value) {?> selected <?php }?>>
                                                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
</option>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                </select>
                                                            </div>
                                                            <div>
                                                                <select class="width-100 DepartmentId"
                                                                    id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
DepartmentId" style="padding: 2px;">
                                                                    <option value="">All Department</option>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
">
                                                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</option>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                </select>
                                                                
                                                            </div>

                                                        </div>
                                                        <!-- vd_panel-menu -->
                                                    </div>
                                                    <div class="panel-body" style="display: block;min-height: 423px;">
                                                        <div class="panel widget">
                                                            <div
                                                                class="panel-body-list  table-responsive <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
-table">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                            </div>
                        </div>
                        
                        <div class="tab-pane" id="trending-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel widget">
                                        <div class="panel-heading vd_bg-blue">
                                            <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-layout"></i>
                                                </span>TRENDING CHART
                                            </h3>
                                            <div class="vd_panel-menu" style="display: flex;">
                                                
                                                <div style="margin-right: 5px;">
                                                    <select class="width-100" style="padding: 2px;" id="dashboardXaxes">
                                                        <option value="year" selected>X axes year</option>
                                                        <option value="status">X axes status</option>
                                                    </select>
                                                </div>
                                                <div style="margin-right: 5px;">
                                                    <select class="width-100" style="padding: 2px;" id="dashboardChart">
                                                        <option value="bar" selected>Bar Chart</option>
                                                        <option value="line">Line Chart</option>                                                
                                                        <option value="radar">Radar Chart</option>
                                                    </select>
                                                </div>
                                                <div style="margin-right: 5px;">
                                                    <select class="width-100" id="dashboardEntity" style="padding: 2px;">
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['docGroups']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </select>
                                                </div>
                                                <div style="margin-right: 5px;">
                                                    <select class="" id="dashboardModule" style="padding: 2px;" multiple data-style="bootstarp-select-custom-style" data-actions-box="true" multiple data-selected-text-format="count" data-none-selected-text="Modules Not Selected">
                                                    </select>
                                                </div>
                                                <div style="margin-right: 5px;">
                                                    <select class="width-100" style="padding: 2px;" id="dashboardYearFrom">
                                                    </select>
                                                </div>
                                                <div style="margin-right: 5px;">
                                                    <select class="width-100" style="padding: 2px;" id="dashboardYearTo">
                                                    </select>
                                                </div>
                                                <div style="margin-right: 5px;">
                                                    <select class="width-100" style="padding: 2px;" id="dashboardPlantId">
                                                        <option value="">All Plant</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
">
                                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </select>
                                                </div>
                                                <div style="margin-top: -3px;">
                                                    <button class="btn vd_btn vd_bg-red" style="padding: 4px 15px;" type="button" id="downloadBtn">Download &nbsp;<i class="fa  fa-cloud-download fa-fw "></i></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="panel-body" style="display: block; min-height: 423px;">
                                            <div class="panel widget">
                                                <canvas id="lineChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                   
                        </div>
                    </div>
                </div> <!-- tabs-widget -->
            </div>
        </div>
        <!-- .col-md-6 -->
    </div>
</form>




<div class="modal fade" id="trendingModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="trendingModal" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fa fa-times"></i></button>
                <h4 class="modal-title" id="edit_basic_details_ModalLabel">Trending Chart</h4>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="panel widget" style="margin-bottom: 0;">
                    <div class="panel-body">
                        <div class="form-group" style="margin-bottom: 40px;">
                            <div class="row mgbt-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Chart</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingChart">
                                            <option value="line" selected>Line Chart</option>
                                            <option value="bar">Bar Chart</option>
                                            <option value="radar">Radar Chart</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Module</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingModule">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingYear1">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingYear2">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Plant</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingPlantId">
                                            <option value="">All Plant Data</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plants']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
">
                                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
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
                        </div>
                        <h2 id="trendingTitle" style="margin-top: 10px; margin-bottom: 30px;text-align:center;"></h2>
                        <canvas id="trending-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer background-login">
                <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="misReport" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
    <div class="modal-dialog width-90 height-100">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fa fa-times"></i></button>
                <h4 class="modal-title" id="edit_basic_details_ModalLabel">MIS Report</h4>
            </div>
            <div class="modal-body pd-15">
                <div class="form-group panel-body">
                    <div class="row mgbt-md-12">
                        <input type="hidden" value="" id="doc_short_code">
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"module"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="module reset_filter search_ccm">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['docGroups']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
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
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"sub_module"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="sub_module reset_filter search_ccm">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="module_status reset_filter sub_module_filter search_ccm" id="status">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"wf_status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="wf_status reset_filter sub_module_filter search_ccm" id="wf_status">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" style="display: none;">
                            <label class="control-label">Published Status</label>
                            <div class="controls">
                                <select class="published_status reset_filter sub_module_filter search_ccm"
                                    id="published_status" title="Select Valid SOP">
                                    <option value="">All</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Dropped">Dropped</option>
                                    <option value="Published and Active">Published and Active</option>
                                    <option value="Published and Inactive">Published and Inactive</option>
                                    <option value="SOP Expired">SOP Expired</option>
                                    <option value="Transferred">Transferred</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"company_name"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="plant reset_filter sub_module_filter search_ccm" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '.dept', '', '', 'All Department');">
                                    <option value="">All</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plants']->value, 'item', false, 'key', 'list', array (
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
                            <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="dept reset_filter sub_module_filter search_ccm">
                                    <option value="">All Department</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
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
                            <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"user"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="created_by reset_filter sub_module_filter search_ccm">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"start_year"),$_smarty_tpl);?>
 </label>
                            <div class="controls">
                                <select class="required start_date reset_filter sub_module_filter search_ccm"
                                    id="start_date">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"end_year"),$_smarty_tpl);?>
 </label>
                            <div class="controls">
                                <select class="required end_date reset_filter sub_module_filter search_ccm"
                                    id="end_date">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-actions-condensed row mgbt-xs-0 mgtp-0">
                        <span class="total_result_area font-semibold pull-left" style="display: none;">(Found Total<span
                                class="label label-danger result_count">0</span> <span class="result_label">Change
                                Control</span>)</span>
                        <button class="btn vd_bg-red vd_white modal_refresh_button" type="button"><span
                                class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                        <button type="button" class="btn vd_btn vd_bg-grey pull-right" data-dismiss="modal"><i
                                class="glyphicon glyphicon-remove"></i>Close</button>

                    </div>
                </div>

                <div class="panel-body result_area" style="display: none;">
                    <table class="table table-bordered table-striped" id="search_output_table" width="100%"
                        title="MIS Report">
                        <thead></thead>
                        <tfoot></tfoot>
                    </table>
                </div>
                <div class="panel-body audit_trail_result no_records" style="display: none;">
                    <div class="alert alert-danger"> <span class="vd_alert-icon"><i
                                class="fa fa-exclamation-circle vd_red"></i></span><strong>No Records Found!</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php echo '<script'; ?>
>
        $(document).ready(function() {

            $('#trending-dashboard').on('click', function() {
                getModulesYearByEntity($('#dashboardEntity').val(),'dashboardModule','dashboardYearFrom','dashboardYearTo');
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $('#dashboardYearFrom').val(), $('#dashboardYearTo').val(),
                        $('#dashboardPlantId').val(), $('#dashboardChart').val(), $('#dashboardXaxes').val());
            });
            
            $('#dashboardEntity').on('change', async function() {
                await getModulesYearByEntity($(this).val(),'dashboardModule', 'dashboardYearFrom','dashboardYearTo');
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $('#dashboardYearFrom').val(), $('#dashboardYearTo').val(),
                        $('#dashboardPlantId').val(), $('#dashboardChart').val(), $('#dashboardXaxes').val());
            });


            $('#dashboardXaxes').on('change', function() {
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $('#dashboardYearFrom')
                    .val(), $('#dashboardYearTo').val(),
                    $('#dashboardPlantId').val(), $('#dashboardChart').val(),  $(this).val());
            });

            $('#dashboardChart').on('change', function() {
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $('#dashboardYearFrom')
                    .val(), $('#dashboardYearTo').val(),
                    $('#dashboardPlantId').val(), $(this).val(), $('#dashboardXaxes').val());
            });

            $('#dashboardModule').on('change', function() {
                if($('#dashboardYearFrom').val()){
                    trendingChartDashboard($('#dashboardEntity').val(), $(this).val(), $('#dashboardYearFrom').val(), $('#dashboardYearTo').val(),$('#dashboardPlantId').val(), $('#dashboardChart').val(), $('#dashboardXaxes').val());
                }
            });

            $('#dashboardYearFrom').on('change', function() {
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $(this)
                    .val(), $('#dashboardYearTo').val(),
                    $('#dashboardPlantId').val(), $('#dashboardChart').val(), $('#dashboardXaxes').val());
            });

            $('#dashboardYearTo').on('change', function() {
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $(
                        '#dashboardYearFrom').val(), $(this).val(),
                    $('#dashboardPlantId').val(), $('#dashboardChart').val(), $('#dashboardXaxes').val());
            });

            $('#dashboardPlantId').on('change', function() {
                trendingChartDashboard($('#dashboardEntity').val(), $('#dashboardModule').val(), $(
                        '#dashboardYearFrom').val(), $('#dashboardYearTo').val(),
                    $(this).val(), $('#dashboardChart').val(), $('#dashboardXaxes').val());
            });

            var ctxDashboard = document.getElementById('lineChart').getContext('2d');

            var trendingChartDataDashboard = {
                labels: [],
                datasets: []
            };

            var trendingChartOptionsDashboard = {
                responsive: true,
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            };

            var trendingChartsDashboard = new Chart(ctxDashboard, {
                type: 'bar',
                data: trendingChartDataDashboard,
                options: trendingChartOptionsDashboard
            });

            function trendingChartDashboard(entity, businessModule, yearFrom, yearTo, plantId, chartType, xAxes) {

                x_trendingChartDashboard(entity, businessModule, yearFrom, yearTo, plantId, function(result) {

                var colorsArray = [{"backgroundColor":"rgba(34, 241, 132, 0.2)","borderColor":"rgba(34, 241, 132, 1)"},{"backgroundColor":"rgba(163, 73, 173, 0.2)","borderColor":"rgba(163, 73, 173, 1)"},{"backgroundColor":"rgba(116, 203, 239, 0.2)","borderColor":"rgba(116, 203, 239, 1)"},{"backgroundColor":"rgba(50, 68, 168, 0.2)","borderColor":"rgba(50, 68, 168, 1)"},{"backgroundColor":"rgba(166, 135, 151, 0.2)","borderColor":"rgba(166, 135, 151, 1)"},{"backgroundColor":"rgba(166, 140, 45, 0.2)","borderColor":"rgba(166, 140, 45, 1)"},{"backgroundColor":"rgba(13, 89, 106, 0.2)","borderColor":"rgba(13, 89, 106, 1)"},{"backgroundColor":"rgba(28, 21, 42, 0.2)","borderColor":"rgba(28, 21, 42, 1)"},{"backgroundColor":"rgba(32, 224, 187, 0.2)","borderColor":"rgba(32, 224, 187, 1)"},{"backgroundColor":"rgba(152, 226, 254, 0.2)","borderColor":"rgba(152, 226, 254, 1)"},{"backgroundColor":"rgba(22, 144, 210, 0.2)","borderColor":"rgba(22, 144, 210, 1)"},{"backgroundColor":"rgba(194, 204, 169, 0.2)","borderColor":"rgba(194, 204, 169, 1)"},{"backgroundColor":"rgba(164, 66, 15, 0.2)","borderColor":"rgba(164, 66, 15, 1)"},{"backgroundColor":"rgba(203, 50, 161, 0.2)","borderColor":"rgba(203, 50, 161, 1)"},{"backgroundColor":"rgba(77, 50, 182, 0.2)","borderColor":"rgba(77, 50, 182, 1)"},{"backgroundColor":"rgba(130, 179, 54, 0.2)","borderColor":"rgba(130, 179, 54, 1)"},{"backgroundColor":"rgba(80, 243, 118, 0.2)","borderColor":"rgba(80, 243, 118, 1)"},{"backgroundColor":"rgba(95, 164, 13, 0.2)","borderColor":"rgba(95, 164, 13, 1)"},{"backgroundColor":"rgba(36, 175, 122, 0.2)","borderColor":"rgba(36, 175, 122, 1)"},{"backgroundColor":"rgba(213, 203, 68, 0.2)","borderColor":"rgba(213, 203, 68, 1)"},{"backgroundColor":"rgba(45, 120, 105, 0.2)","borderColor":"rgba(45, 120, 105, 1)"},{"backgroundColor":"rgba(28, 129, 65, 0.2)","borderColor":"rgba(28, 129, 65, 1)"},{"backgroundColor":"rgba(20, 27, 254, 0.2)","borderColor":"rgba(20, 27, 254, 1)"},{"backgroundColor":"rgba(167, 199, 82, 0.2)","borderColor":"rgba(167, 199, 82, 1)"},{"backgroundColor":"rgba(249, 27, 174, 0.2)","borderColor":"rgba(249, 27, 174, 1)"},{"backgroundColor":"rgba(110, 173, 39, 0.2)","borderColor":"rgba(110, 173, 39, 1)"},{"backgroundColor":"rgba(73, 236, 139, 0.2)","borderColor":"rgba(73, 236, 139, 1)"},{"backgroundColor":"rgba(150, 75, 15, 0.2)","borderColor":"rgba(150, 75, 15, 1)"},{"backgroundColor":"rgba(161, 244, 189, 0.2)","borderColor":"rgba(161, 244, 189, 1)"},{"backgroundColor":"rgba(129, 221, 202, 0.2)","borderColor":"rgba(129, 221, 202, 1)"},{"backgroundColor":"rgba(93, 45, 76, 0.2)","borderColor":"rgba(93, 45, 76, 1)"},{"backgroundColor":"rgba(217, 95, 254, 0.2)","borderColor":"rgba(217, 95, 254, 1)"},{"backgroundColor":"rgba(247, 181, 66, 0.2)","borderColor":"rgba(247, 181, 66, 1)"},{"backgroundColor":"rgba(23, 86, 30, 0.2)","borderColor":"rgba(23, 86, 30, 1)"},{"backgroundColor":"rgba(198, 92, 197, 0.2)","borderColor":"rgba(198, 92, 197, 1)"},{"backgroundColor":"rgba(137, 238, 101, 0.2)","borderColor":"rgba(137, 238, 101, 1)"},{"backgroundColor":"rgba(44, 184, 77, 0.2)","borderColor":"rgba(44, 184, 77, 1)"},{"backgroundColor":"rgba(238, 200, 4, 0.2)","borderColor":"rgba(238, 200, 4, 1)"},{"backgroundColor":"rgba(138, 136, 27, 0.2)","borderColor":"rgba(138, 136, 27, 1)"},{"backgroundColor":"rgba(157, 13, 224, 0.2)","borderColor":"rgba(157, 13, 224, 1)"},{"backgroundColor":"rgba(246, 157, 61, 0.2)","borderColor":"rgba(246, 157, 61, 1)"},{"backgroundColor":"rgba(188, 94, 127, 0.2)","borderColor":"rgba(188, 94, 127, 1)"},{"backgroundColor":"rgba(71, 63, 74, 0.2)","borderColor":"rgba(71, 63, 74, 1)"},{"backgroundColor":"rgba(3, 4, 11, 0.2)","borderColor":"rgba(3, 4, 11, 1)"},{"backgroundColor":"rgba(39, 134, 194, 0.2)","borderColor":"rgba(39, 134, 194, 1)"},{"backgroundColor":"rgba(166, 246, 245, 0.2)","borderColor":"rgba(166, 246, 245, 1)"},{"backgroundColor":"rgba(249, 37, 84, 0.2)","borderColor":"rgba(249, 37, 84, 1)"},{"backgroundColor":"rgba(218, 171, 55, 0.2)","borderColor":"rgba(218, 171, 55, 1)"},{"backgroundColor":"rgba(161, 10, 158, 0.2)","borderColor":"rgba(161, 10, 158, 1)"}];
                                  
                    if(xAxes == 'year'){
                                               
                        let labels = [];
                        let label = [];                        
                        let statusArray = [];

                        $.each(result, function(index, yearData) {                            
                            $.each(yearData, function(year, statuses) {                                
                                labels.push(year);                                
                                $.each(statuses, function(status, count) {                                     
                                     label.push(status);                                      
                                     statusArray.push(statuses);                                       
                                });                                                               
                            });
                        });
                        
                        let status = [...new Set(label)];                      
                        
                        var groupedData = {};

                        $.each([...new Set(statusArray)], function(index, obj) {
                            $.each(obj, function(key, value) {
                                if (!groupedData[key]) {
                                    groupedData[key] = []; 
                                }
                                groupedData[key].push(value);
                            });
                        });
                                                
                        
                        let datasets = [];
                        
                        $.each(status, function(index, status){        
                                 let countArray = [];
                            $.each(groupedData, function(index, value){
                                    if(status == index){
                                        countArray = value;
                                    }
                            });

                            datasets.push({
                                "label": status,
                                "data": countArray,
                                "backgroundColor": colorsArray[index].backgroundColor,
                                "borderColor": colorsArray[index].borderColor,
                                "borderWidth": 1
                            });
                        });

                                                
                        trendingChartsDashboard.destroy();

                        trendingChartOptionsDashboard = {
                            responsive: true,
                                scales: {
                                    xAxes: [{
                                        barPercentage: 0.5, // Adjust bar width
                                        categoryPercentage: 0.8 // Adjust spacing between groups
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                        };

                        trendingChartDataDashboard = {
                            labels: labels,
                            datasets: datasets
                        };

                        trendingChartsDashboard = new Chart(ctxDashboard, {
                            type: chartType,
                            data: trendingChartDataDashboard,
                            options: trendingChartOptionsDashboard
                        });
                    }

                    if(xAxes == 'status'){

                        let datasets = [];
                        let statuss = [];                        

                        $.each(result, function(index, yearData) {
                            $.each(yearData, function(year, statuses) {
                                let data = [];
                                $.each(statuses, function(status, count) {
                                    data.push(count);
                                    statuss.push(status);
                                });
                                datasets.push({
                                    "label": year,
                                    "data": data,
                                    "backgroundColor": colorsArray[index]
                                        .backgroundColor,
                                    "borderColor": colorsArray[index].borderColor,
                                    "borderWidth": 1
                                });
                            });
                        });

                        trendingChartsDashboard.destroy();

                        trendingChartDataDashboard = {
                            labels: [...new Set(statuss)],
                            datasets: datasets
                        };

                        trendingChartsDashboard = new Chart(ctxDashboard, {
                            type: chartType,
                            data: trendingChartDataDashboard,
                            options: trendingChartOptionsDashboard
                        });
                    }
                });

            }

            function getRandomColorPair() {
                var r = Math.floor(Math.random() * 256);
                var g = Math.floor(Math.random() * 256);
                var b = Math.floor(Math.random() * 256);
                return {
                    backgroundColor: `rgba(${r}, ${g}, ${b}, 0.2)`,
                    borderColor: `rgba(${r}, ${g}, ${b}, 1)`      
                };
            }

            function generateRandomColorsArray(size) {
                return Array.from({ length: size }, getRandomColorPair);
            }

            $('#downloadBtn').on('click', function() {
                var canvas = document.getElementById('lineChart');
                var image = canvas.toDataURL('image/png');

                var link = document.createElement('a');
                link.href = image;
                link.download = 'chart.png';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        function getModulesYearByEntity(businessModule, moduleSelector, yearFromSelector, yearToSelector) {
            
            return new Promise((resolve) => {
                x_search_view("dash", 'dashboard_filter_view', [businessModule], function(result) {
                    var yearFrom = '';
                    var moduleFilterOption = '';
                    $.each(result, function(index, value) {
                        yearFrom = value[0];
                        moduleFilterOption += "<option value=" + value[1] + ">" + value[1] + "</option>";
                    });

                    if(moduleSelector) {
                        $('#' + moduleSelector).empty().append(moduleFilterOption);
                        $('#' + moduleSelector).selectpicker('refresh');
                        $('#' + moduleSelector).selectpicker('selectAll');
                        $('#' + moduleSelector).selectpicker('refresh');
                    }

                    var yearTo = new Date().getFullYear();
                    var yearOptions = '';

                    for (var year = yearFrom; year <= yearTo; year++) {
                        yearOptions += "<option value=" + year + ">" + year + "</option>";
                    }

                    if(yearFromSelector){
                        $('#' + yearFromSelector).empty().append(yearOptions);
                        $('#' + yearFromSelector).val(yearTo);
                    }

                    if(yearToSelector){
                        $('#' + yearToSelector).empty().append(yearOptions);
                        $('#' + yearToSelector).val(yearTo);
                    }

                    resolve();
                });
            });
        }
        $(document).ready(function() {

            $('.dash_template').each(async function() {
                var docGroup = $(this).data('doc_group');
                var docGroupId = $(this).data('doc_group_id');

                await getModulesYearByEntity(docGroup.toLowerCase(), docGroup + 'ModuleFilter', docGroup + 'YearFrom', docGroup + 'YearTo');

                var yearFrom = $('#' + docGroup + 'YearFrom').val();
                var yearTo = $('#' + docGroup + 'YearTo').val();
                var plantId = $('#' + docGroup + 'PlantId').val();
                var departmentId = $('#' + docGroup + 'DepartmentId').val();
                var moduleFilter = $('#' + docGroup + 'ModuleFilter').val();

               
                
                
                pieChart(yearFrom, yearTo, plantId, departmentId, docGroup, docGroupId, moduleFilter);
            });

            /* Dashboard Filters */
            $('.YearFrom').on('change', function() {
                docGroup = $(this).closest('.dash_template').data('doc_group');
                docGroupId = $(this).closest('.dash_template').data('doc_group_id');
                applyFilterValues(docGroup);
                pieChart($(this).val(), yearTo, plantId, departmentId, docGroup, docGroupId,moduleFilter);
                $('#' + docGroup + 'YearTitle').text($(this).val() + ' To ' + yearTo + ' Years Data');
            });

            $('.YearTo').on('change', function() {
                docGroup = $(this).closest('.dash_template').data('doc_group');
                docGroupId = $(this).closest('.dash_template').data('doc_group_id');
                applyFilterValues(docGroup);
                pieChart(yearFrom, $(this).val(), plantId, departmentId, docGroup, docGroupId,moduleFilter);
                $('#' + docGroup + 'YearTitle').text(yearFrom + ' To ' + $(this).val() + ' Years Data');
            });

            $('.PlantId').on('change', function() {
                docGroup = $(this).closest('.dash_template').data('doc_group');
                docGroupId = $(this).closest('.dash_template').data('doc_group_id');
                applyFilterValues(docGroup);
                pieChart(yearFrom, yearTo, $(this).val(), departmentId, docGroup, docGroupId,moduleFilter);
            });

            $('.DepartmentId').on('change', function() {
                docGroup = $(this).closest('.dash_template').data('doc_group');
                docGroupId = $(this).closest('.dash_template').data('doc_group_id');
                applyFilterValues(docGroup);
                pieChart(yearFrom, yearTo, plantId, $(this).val(), docGroup, docGroupId,moduleFilter);
            });
            $('.ModuleFilter').on('change', function() {
                docGroup = $(this).closest('.dash_template').data('doc_group');
                docGroupId = $(this).closest('.dash_template').data('doc_group_id');
                applyFilterValues(docGroup);

                if(yearFrom){
                    pieChart(yearFrom, yearTo, plantId, departmentId, docGroup, docGroupId,moduleFilter);
                }
            });

            $('.refreshTable').click(function() {
                docGroup = $(this).closest('.dash_template').data('doc_group');
                docGroupId = $(this).closest('.dash_template').data('doc_group_id');
                $('#' + docGroup + 'YearFrom').val(new Date().getFullYear());
                $('#' + docGroup + 'YearTo').val(new Date().getFullYear());
                
                $('#' + docGroup + 'ModuleFilter').selectpicker('selectAll');
                $('#' + docGroup + 'ModuleFilter').selectpicker('refresh');
                
                    $('#'+docGroup+'PlantId').val('<?php echo $_smarty_tpl->tpl_vars['userPlantId']->value;?>
');
                  
                $('#' + docGroup + 'DepartmentId option:first').prop('selected', true);
                applyFilterValues(docGroup);
                pieChart(yearFrom, yearTo, plantId, departmentId, docGroup, docGroupId,moduleFilter);
            });


            function applyFilterValues() {
                yearFrom = $('#' + docGroup + 'YearFrom').val();
                yearTo = $('#' + docGroup + 'YearTo').val();
                plantId = $('#' + docGroup + 'PlantId').val();
                departmentId = $('#' + docGroup + 'DepartmentId').val();
                moduleFilter = ($('#' + docGroup + 'ModuleFilter').val()) ? $('#' + docGroup + 'ModuleFilter').val() : [] ;
                
            }

            /* TRENDING */
            var entity = '';
            $(document).on('click', '.trending-button', function() {
                let businessModule = $(this).data('module');

                entity = $(this).data('entity');

                var option = '';
                
                $.each(data[entity], function(index, value) {
                    option += `<option value="` + value + `">` + value +
                        `</option>`
                });
                
                yearFromOptionsVal =[];

                $('#' + entity + 'YearFrom option').each(function() {
                    yearFromOptionsVal.push($(this).val());
                });
                yearFromOptions = '';
                $.each(yearFromOptionsVal, function(index, value) {
                    yearFromOptions += `<option value="` + value + `">` + value +
                        `</option>`
                });
                
                $('#trendingYear1').empty().append(yearFromOptions);
                $('#trendingYear2').empty().append(yearFromOptions);


                    

                $('#trendingYear1').val($('#' + entity + 'YearFrom').val());
                $('#trendingYear2').val($('#' + entity + 'YearTo').val());
                $('#trendingPlantId').val($('#' + entity + 'PlantId').val());



                $('#trendingModal').modal('show');

                $('#trendingModule').html(option);
                $('#trendingModule').val(businessModule);

                trendingChart(entity, businessModule, $('#trendingYear1').val(), $('#trendingYear2').val(),
                $('#trendingPlantId').val(), $('#trendingChart').val());

            });

            $('#trendingChart').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $('#trendingYear1').val(), $(
                    '#trendingYear2').val(), $('#trendingPlantId').val(), $(this).val());
            });

            $('#trendingModule').on('change', function() {
                trendingChart(entity, $(this).val(), $('#trendingYear1').val(), $(
                    '#trendingYear2').val(), $('#trendingPlantId').val(), $('#trendingChart').val());
            });

            $('#trendingYear1').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $(this).val(), $(
                    '#trendingYear2').val(), $('#trendingPlantId').val(), $('#trendingChart').val());
            });

            $('#trendingYear2').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $('#trendingYear1').val(), $(this)
                    .val(), $('#trendingPlantId').val(), $('#trendingChart').val());
            });

            $('#trendingPlantId').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $('#trendingYear1').val(), $(
                    '#trendingYear2').val(), $(this).val(), $('#trendingChart').val());
            });

            var ctx = document.getElementById('trending-chart').getContext('2d');

            var trendingChartData = {
                labels: [],
                datasets: [{
                        label: '',
                        data: [],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                    },
                    {
                        label: '',
                        data: [],
                        backgroundColor: 'rgba(175, 12, 12, 0.2)',
                        borderColor: 'rgba(175, 12, 12, 1)',
                    }
                ]
            };

            var trendingChartOptions = {
                responsive: true,
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            };

            var trendingCharts = new Chart(ctx, {
                type: 'line',
                data: trendingChartData,
                options: trendingChartOptions
            });

            function trendingChart(entity, businessModule, year1, year2, plantId, chartType) {

                $('#trendingTitle').fadeOut().fadeIn().text(businessModule + " Trending Analytics of " +
                    year1 + " and " + year2);

                x_trendingChart(entity, businessModule, year1, year2, plantId, function(result) {
                    console.log(result);

                    let firstYear = result[0];
                    let secondYear = result[1];
                    let firstYearCount = [];
                    let secondYearCount = [];
                    let statuses = [];

                    $.each(firstYear, function(key, value) {
                        firstYearCount.push(value);
                        statuses.push(key);
                    });

                    $.each(secondYear, function(key, value) {
                        secondYearCount.push(value);
                    });

                    trendingCharts.destroy();

                    trendingChartData = {
                        labels: statuses,
                        datasets: [{
                                label: year1,
                                data: firstYearCount,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            },
                            {
                                label: year2,
                                data: secondYearCount,
                                backgroundColor: 'rgba(175, 12, 12, 0.2)',
                                borderColor: 'rgba(175, 12, 12, 1)',
                                borderWidth: 1
                            }
                        ]
                    };

                    trendingCharts = new Chart(ctx, {
                        type: chartType,
                        data: trendingChartData,
                        options: trendingChartOptions
                    });

                });
            }

        });

        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; font-weight:bold; text-align:center; padding:2px; color:white;'>" +
                label + "<br/>" + Math.round(series.percent) + "%</div>";
        }

        var data = {};

        function pieChart(yearFrom, yearTo, plantId, departmentId, docGroup, docGroupId,moduleFilter) {
            
            x_pieChart(yearFrom, yearTo, plantId, departmentId,docGroup,moduleFilter, function(result) {
                        
                var statuses = result[0];
                var modules = result[1];
                data[docGroup] = result[1];
                var rows = result[2];
                console.log(result);
                let table = `<table class="table no-head-border table-striped table-bordered">
                                <thead class="vd_bg-blue vd_white">
                                <tr><th style="text-align: center;">Module</th>`;

                $.each(statuses, function(index, status) {
                    table += `<th style="text-align: center;">${status}</th>`;
                });

                table += `<th style="text-align: center;">Total</th>
                            <th style="text-align: center;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>`;

                $.each(modules, function(index, businessObject) {

                    table += `<tr style="height: 45px;">
                               <td style="text-align: center; vertical-align:middle;">${businessObject}</td>`;
                            
                    var totalCount = 0;
                    $.each(statuses, function(statusIndex, status) {

                        var qmsStatusCount = 0;

                        $.each(rows, function(index, row) {

                            if (row[0] == businessObject) {

                                if (row[1] == status) {

                                    qmsStatusCount = Number(row[2]);

                                }
                            }

                        });

                        totalCount += qmsStatusCount;

                        table += `<td style="text-align: center; vertical-align:middle;" class="${status.replace(/\s+/g, '')}" id="${businessObject}${status}">`
                        if(qmsStatusCount == 0){
                            table +=  `<a data-status = "${status}" data-doc_name="${businessObject}"   data-doc_group="${docGroup}" data-doc_group_id="${docGroupId}">${qmsStatusCount}</d></td>`;
                        } else {
                            table +=  `<a class="statusCount" style="cursor: pointer;" data-status = "${status}" data-doc_name="${businessObject}"   data-doc_group="${docGroup}" data-doc_group_id="${docGroupId}">${qmsStatusCount}</d></td>`;
                        }
                    });

                    table += `<td style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;" class="${docGroup}Total" id="${businessObject}Total">${totalCount}</td>
                                <td style = "width: 18%;" >
                                <button class="btn vd_btn vd_bg-blue btn-xs trending-button" type="button"  data-module="${businessObject}" data-entity="${docGroup}">Trending</button>
                                <button class="btn vd_btn vd_bg-blue btn-xs report-button" type="button" data-doc_name="${businessObject}"  data-doc_group="${docGroup}" data-doc_group_id="${docGroupId}">Report</button>
                                </td>  </tr > `;
                });

                table += ` <tr style = "font-size: 15px; font-weight: bold; color: black;" >
                            <td style = "text-align: center;" > Total </td>`;
                $.each(statuses, function(statusIndex, status) {
                    table += `<td style="text-align: center; vertical-align:middle;"class="${status.replace(/\s+/g, '')}${docGroup}"></td>`;
                });
                table += `<td style="text-align: center; vertical-align:middle; border-right: 1px solid #ddd;"class="Total${docGroup}"></td>
                            </tr> </tbody> </table>`;

                $('.' + docGroup + '-table').html(table);
                let dynamicVars = {};
                $.each(statuses, function(statusIndex, status) {
                    let sum = 0;
                    $('.' + status.replace(/\s+/g, '')).each(function() {
                        sum += parseInt($(this).text()) || 0;
                    });
                    dynamicVars[status] = sum;
                    $('.' + status.replace(/\s+/g, '') + docGroup).text(sum);
                });

                let totalSum = 0;

                $('.' + docGroup + 'Total').each(function() {
                    totalSum += parseInt($(this).text()) || 0;
                });

                $('.Total' + docGroup).text(totalSum);

                var piePlaceholder = $('#pie-chart-' + docGroup);
                var pieData = [];

                $.each(dynamicVars, function(key, value) {
                    pieData.push({
                        label: key,
                        data: value
                    });
                });

                $.plot(piePlaceholder, pieData, {
                    series: {
                        pie: {
                            show: true,
                            label: {
                                show: true,
                                radius: .5,
                                formatter: labelFormatter,
                                background: {
                                    opacity: 0
                                }
                            },
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    colors: ["#FF0000", "#52D793", "#56A2CF", "#FFA500"]
                });

                piePlaceholder.unbind('plotclick');
                piePlaceholder.bind("plotclick", function(event, pos, obj) {
                    if (!obj) {
                        return;
                    }
                    percent = parseFloat(obj.series.percent).toFixed(2);
                    show_notification("i", 'topright', obj.series.label + ": " + percent +"%");
                });
            });
        }

        /* MIS Report */
        $(document).on('click', '.report-button', function() {

            let docName = $(this).data('doc_name');
            let docGroupId = $(this).data('doc_group_id');
            let docGroup = $(this).data('doc_group');
            let yearFrom = $('#' + docGroup + 'YearFrom').val();
            let yearTo = $('#' + docGroup + 'YearTo').val();
            let plantId = $('#' + docGroup + 'PlantId').val();
            let departmentId = $('#' + docGroup + 'DepartmentId').val();

            populateFilter(docName, docGroup, docGroupId, yearFrom, yearTo, plantId, departmentId,'');
            $('#misReport').modal('show');
        });

        $(document).on('click', '.statusCount', function() {

            let docName = $(this).data('doc_name');
            let docGroupId = $(this).data('doc_group_id');
            let docGroup = $(this).data('doc_group');
            let status =  $(this).data('status');
            let yearFrom = $('#' + docGroup + 'YearFrom').val();
            let yearTo = $('#' + docGroup + 'YearTo').val();
            let plantId = $('#' + docGroup + 'PlantId').val();
            let departmentId = $('#' + docGroup + 'DepartmentId').val();

            // console.log(docName);
            // console.log(status);
            // console.log(docGroupId);

            // console.log(yearFrom);
            // console.log(yearTo);
            // console.log(plantId);
            
                    
            populateFilter(docName, docGroup, docGroupId, yearFrom, yearTo, plantId, departmentId,status);
            $('#misReport').modal('show');
        });

        $(".module").change(function() {
            var moduleVal = $(this).val();
            $('.sub_module_filter').val('');
            x_getDocListByDocGroupId(moduleVal, function(result) {
                ajax_respone_handler_set_dropdown(
                    result,
                    '.sub_module',
                    '',
                    [],
                    ''
                );
            });
        });

        $(".sub_module").change(function() {
            docGroupId = $('.module').val();
            docGroup = $('.module').children('option:selected').text();
            docName =  $(this).val();
            populateFilter(docName, docGroup, docGroupId,'','','','','');
        });

        $(".module_status").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName =  $('.sub_module').children('option:selected').text();
            getFilterTableData(docGroup,docName,null);
        });

        $(".wf_status").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName =  $('.sub_module').val();
            getFilterTableData(docGroup,docName,null);
        });

        $(".plant").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').val();
            getFilterTableData(docGroup,docName,null);
        });

        $(".dept").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').val();
            get_dept_users(
                $(this).val(),
                '.created_by',
                '',
                '',
                'All'
            );
            getFilterTableData(docGroup,docName,null);
        });

        $(".created_by").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').children('option:selected').text();
            getFilterTableData(docGroup,docName,null);
        });

        $(".created_by").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').children('option:selected').text();
            getFilterTableData(docGroup,docName,null);
        });

        $(".start_date").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').children('option:selected').text();
            getFilterTableData(docGroup,docName,null);
        });

        $(".end_date").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').children('option:selected').text();
            getFilterTableData(docGroup,docName,null);
        });

        $(".published_status").change(function() {
            docGroup = $('.module').children('option:selected').text();
            docName = $('.sub_module').children('option:selected').text();
            getFilterTableData(docGroup,docName,null);
        });

        function populateFilter(docName, docGroup, docGroupId, yearFrom, yearTo, plantId, departmentId,status) {

            yearFromOptionsVal =[];
            moduleStatus = '';
            $('#' + docGroup + 'YearFrom option').each(function() {
                yearFromOptionsVal.push($(this).val());
            });
            yearFromOptions = '';
            $.each(yearFromOptionsVal, function(index, value) {
                yearFromOptions += `<option value="` + value + `">` + value +`</option>`
            });

            $('.start_date').empty().append(yearFromOptions);
            $('.end_date').empty().append(yearFromOptions);

            if (docGroupId) {
                $('.module').val(docGroupId);
                x_getDocListByDocGroupId(docGroupId, function(result) {
                    ajax_respone_handler_set_dropdown(
                        result,
                        '.sub_module',
                        '',
                        [],
                        '',
                        docName
                    );
                });
                $('.sub_module').filter(function() {
                    if($(this).text() === docName){

                        return $(this).text() === docName;
                    }

                }).prop('selected', true)
            }
            $('.sub_module_filter').val('');
            if (docName) {
                if (docGroupId == 4) {
                    $('.wf_status').parent().parent().hide();
                    $('.module_status').parent().parent().hide();
                    $('.published_status').parent().parent().show();
                    x_getStatusByDocId(docGroup, docName, "published_status", function(result1) {
                        ajax_respone_handler_set_dropdown(
                            result1,
                            '.published_status',
                            '',
                            [],
                            'All',
                            status
                        );

                    });
                    if(status) $('.published_status').val(status);
                    
                } else {
                    $('.wf_status').parent().parent().show();
                    $('.module_status').parent().parent().show();
                    $('.published_status').parent().parent().hide();

                    x_getStatusByDocId(docGroup, docName, "status", function(result1) {
                        ajax_respone_handler_set_dropdown(
                            result1,
                            '.module_status',
                            '',
                            [],
                            'All',
                            status
                        );
                    });


                    x_getStatusByDocId(docGroup, docName, "wf_status", function(result2) {
                        ajax_respone_handler_set_dropdown(
                            result2,
                            '.wf_status',
                            '',
                            [],
                            'All'
                        );
                    });
                    
                    $('.module_status').val(status);
                    moduleStatus = status;
                }

            }

            if(yearTo) $('.start_date').val(yearTo);
            if(yearFrom) $('.end_date').val(yearFrom);
            if(plantId) $('.plant').val(plantId);
            if(departmentId) {
                $('.dept').val(departmentId);
                get_dept_users(
                    departmentId,
                    '.created_by',
                    '',
                    '',
                    'All'
                );
            }

            getFilterTableData(docGroup, docName, moduleStatus);

        }

        function getFilterTableData(docGroup, docName, status) {
  
            var params = {
                dept_id: $(".dept").val(),
                user_id: $(".created_by").val(),
                start_date: $(".start_date").val(),
                end_date: $(".end_date").val(),
                plant_id: $(".plant").val(),
                wf_status: $(".wf_status").val(),
                published_status: $(".published_status").val(),
                status: ($(".module_status").val()) ? $(".module_status").val() : status,
            };
            lm_dom.append_search_icon(".search_ccm");
            var selectedValue = JSON.stringify(params);
            var dataSet = [];
            count = 0;

            x_dashboardFilterData(selectedValue, docGroup, docName, function(result) {
                var columns = [];
                if (Object.keys(result).length > 0) {
                    var header = Object.keys(result[0]);

                    $.each(header, function(index, key) {
                        var formattedKey = key.replace(/_/g, ' ');
                        columns.push({ title: formattedKey });
                    });
                }

                var dataSet = [];

                for (var y in result) {
                    var result_array = result[y];
                    count++;
                    var row = [];
                    row.push(...Object.values(result_array));
                    dataSet.push(row);
                }

                $('.result_count').html(count);
                $('.result_label').html(docName);
                $('.total_result_area').show();

                if(!columns.length){
                    $('.result_area').hide();
                } else {
                    $('.result_area').show();
                    clearFilterTableData();
                    generateDataTable("search_output_table", columns, dataSet);
                }

            });

        }

        function generateDataTable(tableName, columns, dataSet) {

                clearFilterTable(tableName);
                var theadHtml = '<tr>';
                var tfootHtml = '<tr>';
                columns.forEach(function(column) {
                    theadHtml += '<th>' + column.title + '</th>';
                    tfootHtml += '<th><input type="text" placeholder="Search ' + column.title + '" /></th>';
                });
                theadHtml += '</tr>';
                tfootHtml += '</tr>';

                $('#' + tableName + ' thead').html(theadHtml);
                $('#' + tableName + ' tfoot').html(tfootHtml);

                $('#' + tableName).dataTable({
                    destroy: true,
                    data: dataSet,
                    columns: columns,
                    pagingType: "full_numbers",
                    mark: true,
                    dom: 'Bfrtip',
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10 rows', '25 rows', '50 rows', 'Show all']
                    ],
                    buttons: [
                        'pageLength',
                        {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: ':visible'
                            },
                            download: 'open',
                            message: 'MIS Report',
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: ':visible',
                            },
                        },
                        {
                            extend: 'copy',
                            exportOptions: {
                                columns: ':visible'
                            },
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            },
                            message: 'MIS Report',
                        },
                        {
                            extend: 'colvis',
                            postfixButtons: ['colvisRestore']
                        }
                    ],
                    initComplete: function() {
                        this.api().columns().every(function() {
                            var column = this;
                            var input = $(column.footer()).find('input');
                            input.on('keyup change', function() {
                                column.search($(this).val()).draw();
                            });
                        });
                    }
                });
        }

        function clearFilterTable(tab_name) {
            var table_obj = document.getElementById(tab_name);
            for (i = table_obj.rows.length; i > 1; i--) {
                var row_ind = table_obj.rows[1].rowIndex
                table_obj.deleteRow(row_ind)
            }
        }
        function clearFilterTableData() {
            $('.result_area').empty();
            var tableHTML = `<table class="table table-bordered table-striped" id="search_output_table" width="100%" title="MIS Report">
                                <thead>
                                </thead>
                                <tfoot>
                                </tfoot>
                            </table>`;
            $('.result_area').html(tableHTML);
        }
    <?php echo '</script'; ?>
>
<?php }
}
