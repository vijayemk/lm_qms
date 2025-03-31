<?php
/* Smarty version 3.1.30, created on 2025-03-18 15:21:04
  from "/var/www/html/lm_qms/lib/dash/templates/analytics_dashboard1.dash.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67d94208dd5fd8_31616592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e68e148e87e6294067aff074fc1620d03efc6e02' => 
    array (
      0 => '/var/www/html/lm_qms/lib/dash/templates/analytics_dashboard1.dash.tpl',
      1 => 1742291456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_67d94208dd5fd8_31616592 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link rel="stylesheet" href="plugins/bootstrap-select/bootstrap-select.min.css">
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

        <div class="tabs">
            <ul class="nav nav-tabs widget" style="margin-bottom: 25px;">
                <li class="active">
                    <a href="#dashboard-tab" data-toggle="tab"> <span class="menu-icon"><i
                                class="fa fa-dashboard"></i></span> Dashboard <span class="menu-active"><i
                                class="fa fa-caret-up"></i></span> </a>
                </li>
                <li class="">
                    <a href="#trending-tab" class="trending-tab" data-toggle="tab"> <i class="append-icon fa fa-fw fa-bar-chart-o"></i>
                        Trending <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a>
                </li>
            </ul>
            <div class="tab-content  mgbt-xs-20" style="background-color: #F0F0F0;">
                <div class="tab-pane active" id="dashboard-tab">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['docGroups']->value, 'item', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <div class="row dashboard-analytics" data-doc-group="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
" data-doc-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <div class="col-sm-5">
                                <div class="panel widget">
                                    <div class="panel-heading vd_bg-black">
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
                                                    <span class="menu-icon append-icon"> <i class="icon-pie"></i></span>
                                                    <strong id="<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
Title"></strong>
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
                                                    <h5 class="text-right font-semibold"><strong>TOTAL <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
</strong></h5>
                                                    <h3 class="text-right  vd_red <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
-total-total"></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="panel widget">
                                    <div class="panel-heading vd_bg-black">
                                        <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-layout"></i>
                                            </span> <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
 TABLE
                                        </h3>
                                        <div class="vd_panel-menu" style="display: flex; align-items: center;">
                                            <div data-action="refresh" data-original-title="Refresh" data-toggle="tooltip"
                                                data-placement="bottom" class=" menu entypo-icon smaller-font refresh-dms">
                                                <i class="icon-cycle"></i>
                                            </div>
                                            <div style="margin-right: 5px;">
                                                <select class="selectpicker module" id="module-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
" multiple data-style="bootstarp-select-custom-style" data-actions-box="true" data-selected-text-format="count" data-none-selected-text="Modules Not Selected">
                                                </select>
                                            </div>
                                            <div style="margin-right: 5px;">
                                                <select class="width-100 cursor year-from" id="year-from-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
">
                                                    
                                                </select>
                                            </div>
                                            <div style="margin-right: 5px;">
                                                <select class="width-100 cursor year-to" id="year-to-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
">
                                                    
                                                </select>
                                            </div>
                                            <div style="margin-right: 5px;" a>
                                                <select class="width-100 cursor plant-id" id="plant-id-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
">
                                                    <option value="">ALL PLANT</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plants']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['plant_id'] == $_smarty_tpl->tpl_vars['userPlantId']->value) {?>
                                                            selected <?php }?>>
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
                                                <select class="cursor department-id" id="department-id-<?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
" style="width:200px;">
                                                    <option value="">ALL DEPARTMENT</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
">
                                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['full_name'];?>
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
                                            <div class="panel-body-list  table-responsive <?php echo $_smarty_tpl->tpl_vars['item']->value['group'];?>
-table">

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

                <div class="tab-pane" id="trending-tab">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel widget">
                                <div class="panel-heading vd_bg-black">
                                    <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-layout"></i>
                                        </span>TRENDING CHART
                                    </h3>
                                    
                                    <div class="vd_panel-menu chart-location" style="display: flex; align-items: center;" data-chart-location="tab">
                                        
                                        <div style="margin-right: 5px;">
                                            <select class="cursor trending-chart-type" id="trending-chart-type-tab">
                                                <option value="bar" selected>Bar Chart</option>
                                                <option value="line">Line Chart</option>
                                            </select>
                                        </div>
                                        <div style="margin-right: 5px;">
                                            <select class="cursor trending-entity" id="trending-entity-tab">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['docGroups']->value, 'item', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
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
                                            <select class="cursor trending-module" id="trending-module-tab">                                            
                                            </select>
                                        </div>  
                                        <div style="margin-right: 5px;">
                                            <select class="width-100 cursor trending-year-from" id="trending-year-from-tab"></select>
                                        </div>
                                        <div style="margin-right: 5px;">
                                            <select class="width-100 cursor trending-year-to" id="trending-year-to-tab"></select>
                                        </div>
                                        <div style="margin-right: 5px;">
                                            <select class="width-100 cursor trending-plant-id" id="trending-plant-id-tab">
                                                <option value="">ALL PLANT</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plants']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['plant_id'] == $_smarty_tpl->tpl_vars['userPlantId']->value) {?>
                                                        selected <?php }?>>
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
  
                                            </select>
                                        </div>
                                        <div style="margin-right: 5px;">
                                            <select class="cursor trending-department-id" id="trending-department-id-tab" style="width:200px;">
                                                <option value="">ALL DEPARTMENT</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['full_name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
                                            </select>
                                        </div>
                                        <div>
                                            <button class="btn vd_btn vd_bg-red" style="padding: 5px 15px;" type="button" id="downloadBtn">Download &nbsp;<i class="fa  fa-cloud-download fa-fw "></i></button>
                                        </div>
                                    </div>
                                    <!-- vd_panel-menu -->
                                </div>
                                <div class="panel-body" style="display: block; min-height: 423px;">
                                    <div class="panel widget">
                                        <canvas id="trending-chart-tab"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</form>




<div class="modal fade" id="trendingModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="trendingModal" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="edit_basic_details_ModalLabel">Trending Chart</h4>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="panel widget" style="margin-bottom: 0;">
                    <div class="panel-body">
                        <div class="form-group" style="margin-bottom: 40px;">
                            <div class="row mgbt-md-12 chart-location" data-chart-location="modal">
                                <div class="col-md-2">
                                    <label class="control-label">Chart</label>
                                    <div class="controls">
                                        <select class="width-100 cursor trending-chart-type" id="trending-chart-type-modal" style="padding: 2px;">                                            
                                            <option value="bar" selected>Bar Chart</option>
                                            <option value="line">Line Chart</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Entity</label>
                                    <div class="controls">
                                        <select class="width-100 cursor trending-entity" id="trending-entity-modal" style="padding: 2px;">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['docGroups']->value, 'item', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
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
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Module</label>
                                    <div class="controls">                                    
                                        <select class="width-100 cursor trending-module" id="trending-module-modal" style="padding: 2px;">
                                        </select>                              
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="control-label">Year From</label>
                                    <div class="controls">
                                        <select class="width-100 cursor trending-year-from" id="trending-year-from-modal" style="padding: 2px;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="control-label">Year To</label>
                                    <div class="controls">
                                        <select class="width-100 cursor trending-year-to" id="trending-year-to-modal" style="padding: 2px;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Plant</label>
                                    <div class="controls">
                                        <select class="width-100 cursor trending-plant-id" id="trending-plant-id-modal" style="padding: 2px;">
                                            <option value="">ALL PLANT</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plants']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['plant_id'] == $_smarty_tpl->tpl_vars['userPlantId']->value) {?>
                                                    selected <?php }?>>
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
                                <div class="col-md-2">
                                    <label class="control-label">Department</label>
                                    <div class="controls">
                                        <select class="width-100 cursor trending-department-id" id="trending-department-id-modal"  style="padding: 2px;">
                                        <option value="">ALL DEPARTMENT</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 id="trendingTitle" style="margin-top: 10px; margin-bottom: 30px;text-align:center;"></h2>
                        <canvas id="trending-chart-modal"></canvas>
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
                                <select class="module_report reset_filter show_filter_icon">
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
                                <select class="sub_module_report reset_filter show_filter_icon">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="module_status reset_filter sub_module_filter show_filter_icon" id="status">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"wf_status"),$_smarty_tpl);?>
</label>
                            <div class="controls">
                                <select class="wf_status reset_filter sub_module_filter show_filter_icon" id="wf_status">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" style="display: none;">
                            <label class="control-label">Published Status</label>
                            <div class="controls">
                                <select class="published_status reset_filter sub_module_filter show_filter_icon" id="published_status" title="Select Valid SOP">
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
                                <select class="plant reset_filter sub_module_filter show_filter_icon" onchange="get_plant_dept_list(this.options[this.selectedIndex].value, '.dept', '', '', 'All Department');">
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
                                <select class="dept reset_filter sub_module_filter show_filter_icon">
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
                                <select class="created_by reset_filter sub_module_filter show_filter_icon">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"start_year"),$_smarty_tpl);?>
 </label>
                            <div class="controls">
                                <select class="required start_date reset_filter sub_module_filter show_filter_icon" id="start_date"></select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dash",'attribute'=>"end_year"),$_smarty_tpl);?>
 </label>
                            <div class="controls">
                                <select class="required end_date reset_filter sub_module_filter show_filter_icon" id="end_date"></select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-actions-condensed row mgbt-xs-0 mgtp-0">
                        <span class="total_result_area font-semibold pull-left" style="display: none;">(Found Total<span class="label label-danger result_count">0</span> <span class="result_label">Change Control</span>)</span>
                        <button class="btn vd_bg-red vd_white modal_refresh_button  " type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                        <button type="button" class="btn vd_btn vd_bg-grey pull-right" data-dismiss="modal"><i  class="glyphicon glyphicon-remove"></i>Close</button>
                    </div>
                </div>
                <div class="panel-body result_area" style="display: none;">
                    <table class="table table-bordered table-striped" id="search_output_table" width="100%" title="MIS Report">
                        <thead></thead>
                        <tfoot></tfoot>
                    </table>
                </div>
                <div class="panel-body audit_trail_result no_records" style="display: none;">
                    <div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>No Records Found!</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #lineChart {
        max-height: 67vh;
        width: 100%;
    }
    .panel .panel-heading{
        padding: 12px 15px;
    }
    .cursor{
        border-radius: 4px;
        font-size: 15px;
    }
    .cursor:hover{
        cursor: pointer;
    }
    .modal-lg {
        width: 90%; /* Adjust width */
        max-width: 1200px; /* Set max width */
    }
</style>


    
    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            
            $('.dashboard-analytics').each(function(){
                let docGroup = $(this).data('doc-group');
                let docGroupId = $(this).data('doc-id');
                let plantId = $(`#plant-id-${docGroup}`).val();
                let departmentId = $(`#department-id-${docGroup}`).val();
                
                docGroupStartYear(docGroup, `#year-from-${docGroup}, #year-to-${docGroup}`);                
                modulesByDocGroup(`#module-${docGroup}`, docGroup, true);
                processTableAndChart(docGroup, docGroupId);
            });

            $('.module').on('change', function(){
                let docGroup = $(this).closest('.dashboard-analytics').data('doc-group');
                let docGroupId = $(this).closest('.dashboard-analytics').data('doc-id');
                processTableAndChart(docGroup, docGroupId);
            });

            $('.year-from').change(function() {                
                
                let docGroup = $(this).closest('.dashboard-analytics').data('doc-group');
                let docGroupId = $(this).closest('.dashboard-analytics').data('doc-id');
                
                let selectedYear = parseInt($(this).val(), 10);
                
                $('#year-to-'+docGroup+' option').each(function() {
                    let yearValue = parseInt($(this).val(), 10);
                    
                    if (yearValue < selectedYear) {
                        $(this).hide();  // Hide options less than selected year
                    } else {
                        $(this).show();  // Show valid options
                    }
                });

                // Reset second dropdown if its selected value is now hidden
                if ($('#year-to-'+docGroup).val() < selectedYear) {
                    $('#year-to-'+docGroup).val(selectedYear);
                }

                processTableAndChart(docGroup, docGroupId);
            });

            $('.year-to').change(function() {                
                
                let docGroup = $(this).closest('.dashboard-analytics').data('doc-group');
                let docGroupId = $(this).closest('.dashboard-analytics').data('doc-id');

                processTableAndChart(docGroup, docGroupId);
            });

            $('.plant-id').on('change', function(){
                let docGroup = $(this).closest('.dashboard-analytics').data('doc-group');
                let docGroupId = $(this).closest('.dashboard-analytics').data('doc-id');
                departmentsByPlantId($(this).val(), docGroup);
                processTableAndChart(docGroup, docGroupId);
            });

            $('.department-id').on('change', function(){
                let docGroup = $(this).closest('.dashboard-analytics').data('doc-group');
                let docGroupId = $(this).closest('.dashboard-analytics').data('doc-id');
                processTableAndChart(docGroup, docGroupId);
            });
                        
            function docGroupStartYear(docGroup, elements){                
                x_search_view("dash", 'dash_doc_group_start_year', [docGroup], function (result) {                    
                    let yearFrom = result[0][0];
                    let currentYear = new Date().getFullYear();
                    let option = '';
                    if(yearFrom){
                        for(let i = yearFrom; i<= currentYear; i++){
                            option += `<option value="${i}" ${currentYear === i ? 'selected' : ''}>${i}</option>`;
                        }
                        $(elements).html(option);    
                    }else{
                        $(elements).html(`<option value="${currentYear}">${currentYear}</option>`);    
                    }
                });
            }
            
            function departmentsByPlantId(plantId, docGroup){
                x_getDeptList(plantId, function (result) { 
                    let option = `<option value="">ALL DEPARTMENT</option>`;
                    $.each(result, function(index, value){
                        option += `<option value="${value.department_id}">${value.full_name}</option>`;
                    });         
                    if(docGroup){
                        $(`#department-id-${docGroup}`).html(option);
                    }else{
                        $(`.trending-department-id`).html(option);
                    }                      
                });
            }

            function modulesByDocGroup(element, docGroup, table = true ){ 
                x_search_view("dash", 'dash_modules', [docGroup], function (result) { 
                    let option = ``;
                    $.each(result, function(index, value){
                        option += `<option value="${value[1]}">${value[1]}</option>`;
                    });           
                    $(element).html(option);
                    if(table){
                        $(element).selectpicker('refresh');
                        $(element).selectpicker('selectAll'); 
                    }                                                           
                });
            }
             
            async function processTableAndChart(docGroup, docGroupId) {
                
                const moduleStatus = {};                
                                                   
                // Ensure moduleStatus stores multiple docGroups
                if (!moduleStatus[docGroupId]) {
                    moduleStatus[docGroupId] = {docGroupId: docGroupId, docGroup: docGroup, modules: []};
                }
                                        
                let modulePromises = [];
                let modulesList = $(`#module-${docGroup}`).val() || [];
                if(modulesList.length <= 0){
                    $(`.${docGroup}-table tbody`).empty();
                    $(`#pie-chart-${docGroup}`).empty();
                } 
                                        
                $.each(modulesList, function (index, modVal) {
                                            
                    let moduleObj = { module: modVal, status_count: [] };
                    moduleStatus[docGroupId].modules.push(moduleObj);

                    // Fetch all possible statuses first
                    let statusPromise = new Promise((statusResolve) => {
                        x_search_view("dash", 'dash_module_statuses', [docGroup], function (statusList) {

                            let statusMap = {};
                            
                            moduleStatus[docGroupId].statuses = statusList;
                            
                            $.each(statusList, function (index1, statusVal) {
                                statusMap[statusVal[0]] = {status: statusVal[0], status_count: 0};
                            });

                            let module = modVal;
                            let yearFrom = $(`#year-from-${docGroup}`).val();
                            let yearTo = $(`#year-to-${docGroup}`).val();
                            let plantId = $(`#plant-id-${docGroup}`).val() || '*';
                            let departmentId = $(`#department-id-${docGroup}`).val() || '*';
                            
                            // Fetch module-specific status count
                            x_search_view("dash", 'dash_modules_status_count', [docGroup, module, yearFrom, yearTo, plantId, departmentId], function (statusCountList) {
                                if (statusCountList.length === 0) {
                                    // ✅ Ensure statusResolve() is always called, even if no status data exists
                                    moduleObj.status_count = Object.values(statusMap);
                                    statusResolve();
                                    return;
                                }

                                $.each(statusCountList, function (sc_index, scVal) {
                                    if (statusMap[scVal[3]]) {
                                        statusMap[scVal[3]].status_count = scVal[0] || 0;
                                    }
                                });

                                // ✅ Assign processed status counts
                                moduleObj.status_count = Object.values(statusMap);
                                statusResolve();
                            });
                        });
                    });

                    modulePromises.push(statusPromise);
                });
                
                // ✅ Wait for all x_search_view calls to complete before logging
                await Promise.all(modulePromises);
                
                                                
                generateTable(moduleStatus, docGroup, docGroupId);

                generatePieChart(moduleStatus, docGroup, docGroupId);

                statusTotal(moduleStatus, docGroup, docGroupId);
            }
                                   
            function generateTable(moduleStatus, docGroup, docGroupId){

                let statuses = moduleStatus[docGroupId]['statuses'];
                let modules = moduleStatus[docGroupId]['modules'];
                
                let table = `<table class="table no-head-border table-striped table-bordered table-${docGroup}">
                                <thead class="vd_bg-blue vd_white">
                                <tr>
                                    <th style="text-align: center;">Module</th>`;
                                    $.each(statuses, function (index, status) { 
                                        table += `<th style="text-align: center;">${status[0]}</th>`;
                                    });                                    
                        table += `<th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Trending</th>
                                    <th style="text-align: center;">Report</th>
                                </tr>
                            </thead>
                            <tbody>`;
                            
                            $.each(modules, function (index, module) {          

                                let total = 0;

                                table += `<tr style="height: 45px;">
                                            <td style="text-align: center; vertical-align:middle;">${module['module']}</td>`;
                                            
                                $.each(module['status_count'], function(index, count){
                                    let counts = count['status_count'];
                                    total += Number(counts);

                                    if (counts == 0) {
                                        table += `<td style="text-align: center;"><a class="${docGroup}-${count['status'].replace(/\s+/g, '-')}" data-doc-name="${count['status']}" data-doc-group="${docGroup}" data-doc-group-id="${docGroupId}">${counts}</a></td>`;
                                    }else {
                                        table += `<td style="text-align: center;"><a class="${docGroup}-${count['status'].replace(/\s+/g, '-')} statusCount" data-module="${module['module']}" data-status="${count['status']}"  data-doc-group="${docGroup}" data-doc-group-id="${docGroupId}" style="cursor: pointer;">${counts}</a></td>`;
                                    }

                                });                              

                                table += `<td style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;" class="${docGroup}-total">${total}</td>
                                            <td style="text-align: center;"><button class="btn vd_btn vd_bg-blue btn-xs trending-button" type="button" data-module="${module['module']}" data-doc-group="${docGroup}">Trending</button></td>
                                            <td style="text-align: center;"><button class="btn vd_btn vd_bg-blue btn-xs report-button" type="button" data-module="${module['module']}" data-doc-group="${docGroup}" data-doc-group-id="${docGroupId}">Report</button></td>  
                                        </tr>`;
                            });

                            table += `<tr>
                                        <td style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;">Total</td>`;
                                    $.each(statuses, function (index, status) {                                         
                                        table += `<td class="${docGroup}-${status[0].replace(/\s+/g, '-')}-total" style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;"></td>`;
                                    });         
                                                            
                            table += `<td class="${docGroup}-total-total" style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;"></td>
                                    <td colspan="2"></td>                                    
                                </tr>
                        
                            </tbody> </table>`;

                $(`.${docGroup}-table`).html(table);
            }

            function generatePieChart(moduleStatus, docGroup, docGroupId){

                let statuses = moduleStatus[docGroupId]['statuses'];
                let modules = moduleStatus[docGroupId]['modules'];

                let piePlaceholder = $(`#pie-chart-${docGroup}`);
                var pieData = [];
                                
                $.each(statuses, function (key, value) {

                    let status = value[0];
                    let total = 0;

                    $.each(modules, function(index, module){
                        let mod = module['status_count'];
                        $.each(mod, function(keys, values){
                            if(values['status'] == status){
                                total += Number(values['status_count']);                                
                            }
                        });                
                    });  
                    pieData.push({ label: status, data: total });                          
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
                    colors: ["#FF0000", "#52D793", "#56A2CF", "#FFA500", "#EE82EE"]
                });
                piePlaceholder.unbind('plotclick');
                piePlaceholder.bind("plotclick", function (event, pos, obj) {
                    if (!obj) {
                        return;
                    }
                    percent = parseFloat(obj.series.percent).toFixed(2);
                    show_notification("i", 'topright', obj.series.label + ": " + percent + "%");
                });
            }

            function labelFormatter(label, series) {
                return `<div style='font-size:8pt; font-weight:bold; text-align:center; padding:2px; color:white;'>${label}<br/> ${Math.round(series.percent)}%</div>`;
            }

            function statusTotal(moduleStatus, docGroup, docGroupId){
                
                let statuses = moduleStatus[docGroupId]['statuses'];
                $.each(statuses, function (index, status) { 
                    let stat = status[0].replace(/\s+/g, '-');
                    let total = 0;     
                    $(`.${docGroup}-${stat}`).each(function(index){
                        total += Number($(this).text());
                    });
                    $(`.${docGroup}-${stat}-total`).text(total);       
                }); 
                let total = 0;            

                $(`.${docGroup}-total`).each(function(index){
                    total += Number($(this).text());
                });
                $(`.${docGroup}-total-total`).text(total);               
            }


            


            // Trendig Pop-up Chart 
            $(document).on('click', '.trending-button', function(){
                let chartType = 'bar';
                let docGroup = $(this).data('doc-group');
                let modules = $(this).data('module');
                let yearFrom = $(`#year-from-${docGroup}`).val();
                let yearTo = $(`#year-to-${docGroup}`).val();
                let plantId = $(`#plant-id-${docGroup}`).val();
                let departmentId = $(`#department-id-${docGroup}`).val();
                              
                modulesByDocGroup('#trending-module-modal', docGroup, false);
                docGroupStartYear(docGroup, '#trending-year-from-modal, #trending-year-to-modal');
                departmentsByPlantId(plantId, false);
                
                $(`#trending-entity-modal`).val(docGroup);                              
                $(`#trending-plant-id-modal`).val(plantId);
                
                setTimeout(function() {
                    $(`#trending-module-modal`).val(modules);  
                    $(`#trending-year-from-modal`).val(yearFrom);
                    $(`#trending-year-to-modal`).val(yearTo);
                    $(`#trending-department-id-modal`).val(departmentId);
                }, 1000); // 1000ms = 1 seconds

                $('#trendingModal').modal('show');

                trendingChart(docGroup, modules, yearFrom, yearTo, plantId, departmentId, chartType, 'modal');
            });

            $('.trending-chart-type').on('change', function(){
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location");
                trendingChart($(`#trending-entity-${chartLocation}`).val(), $(`#trending-module-${chartLocation}`).val(), $(`#trending-year-from-${chartLocation}`).val(), $(`#trending-year-to-${chartLocation}`).val(), $(`#trending-plant-id-${chartLocation}`).val(), $(`#trending-department-id-${chartLocation}`).val(), $(this).val(), chartLocation);                
            });  

            $('.trending-entity').change(function(){
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location");
                modulesByDocGroup('.trending-module', $(this).val(), table = false);
                docGroupStartYear($(this).val(), '.trending-year-from, .trending-year-to');    
                setTimeout(function() {
                    let modules = $(`#trending-module-${chartLocation}`).val();        
                    trendingChart($(`#trending-entity-${chartLocation}`).val(), modules, $(`#trending-year-from-${chartLocation}`).val(), $(`#trending-year-to-${chartLocation}`).val(), $(`#trending-plant-id-${chartLocation}`).val(), $(`#trending-department-id-${chartLocation}`).val(), $(`#trending-chart-type-${chartLocation}`).val(), chartLocation);              
                }, 1000); // 1000ms = 1 seconds     
                       
                
            });

            $('.trending-module').on('change', function(){
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location");
                trendingChart($(`#trending-entity-${chartLocation}`).val(), $(this).val(), $(`#trending-year-from-${chartLocation}`).val(), $(`#trending-year-to-${chartLocation}`).val(), $(`#trending-plant-id-${chartLocation}`).val(), $(`#trending-department-id-${chartLocation}`).val(), $(`#trending-chart-type-${chartLocation}`).val(), chartLocation); 
            });  

            $('.trending-year-from').change(function() {                
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location");                               
                let selectedYear = parseInt($(this).val(), 10);
                
                $('.trending-year-to option').each(function() {
                    let yearValue = parseInt($(this).val(), 10);
                    
                    if (yearValue < selectedYear) {
                        $(this).hide();  // Hide options less than selected year
                    } else {
                        $(this).show();  // Show valid options
                    }
                });

                // Reset second dropdown if its selected value is now hidden
                if ($('trending-year-to').val() < selectedYear) {
                    $('trending-year-to').val(selectedYear);
                }
                
                trendingChart($(`#trending-entity-${chartLocation}`).val(), $(`#trending-module-${chartLocation}`).val(), $(this).val(), $(`#trending-year-to-${chartLocation}`).val(), $(`#trending-plant-id-${chartLocation}`).val(), $(`#trending-department-id-${chartLocation}`).val(), $(`#trending-chart-type-${chartLocation}`).val(), chartLocation); 
            });

            $('.trending-year-to').change(function() {  
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location");   
                trendingChart($(`#trending-entity-${chartLocation}`).val(), $(`#trending-module-${chartLocation}`).val(), $(`#trending-year-from-${chartLocation}`).val(), $(this).val(), $(`#trending-plant-id-${chartLocation}`).val(), $(`#trending-department-id-${chartLocation}`).val(), $(`#trending-chart-type-${chartLocation}`).val(), chartLocation); 
            });

            $('.trending-plant-id').on('change', function(){
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location");
                departmentsByPlantId($(this).val(), false);
               
                trendingChart($(`#trending-entity-${chartLocation}`).val(), $(`#trending-module-${chartLocation}`).val(), $(`#trending-year-from-${chartLocation}`).val(), $(`#trending-year-to-${chartLocation}`).val(), $(this).val(), $(`#trending-department-id-${chartLocation}`).val(), $(`#trending-chart-type-${chartLocation}`).val(), chartLocation); 
            });

            $('.trending-department-id').on('change', function(){
                let parent = $(this).closest(".chart-location"); 
                let chartLocation = parent.data("chart-location"); 
                        
                trendingChart($(`#trending-entity-${chartLocation}`).val(), $(`#trending-module-${chartLocation}`).val(), $(`#trending-year-from-${chartLocation}`).val(), $(`#trending-year-to-${chartLocation}`).val(), $(`#trending-plant-id-${chartLocation}`).val(), $(this).val(), $(`#trending-chart-type-${chartLocation}`).val(), chartLocation); 
            });                     

            var ctxTab = document.getElementById('trending-chart-tab').getContext('2d');
            var ctxModal = document.getElementById('trending-chart-modal').getContext('2d');
            
            let chartConfig = {
                type: '', // Default chart type
                data: [],  
                options:{
                    plugins: {
                        datalabels: {
                            anchor: 'end',   // Position of the label
                            align: 'top',    // Align the label above the point
                            color: 'black',  // Label color
                            font: {
                                weight: 'bold'
                            },
                            formatter: (value) => value  // Show data values on points
                        }
                    }
                },
                plugins: [ChartDataLabels]                      
                
                
            };

            var trendingChartTab = new Chart(ctxTab, chartConfig);
            var trendingChartModal = new Chart(ctxModal, chartConfig);

            function chartOptions(type){
                let options = '';
                let plugins = '';
                if(type == 'line'){
                    options = {
                                plugins: {
                                    datalabels: {
                                        anchor: 'end',   
                                        align: 'top',    
                                        color: 'black',  
                                        font: {
                                            weight: 'bold'
                                        },
                                        formatter: (value) => value  
                                    }
                                }
                            },

                    plugins = [ChartDataLabels];
                }

                if(type == 'bar'){

                    options = {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: true
                                    },
                                    tooltip: {
                                        enabled: true
                                    }
                                },
                            },

                    plugins = [{ afterDatasetsDraw: function (chart) {
                                    let ctx = chart.ctx;                                    
                                    chart.data.datasets.forEach((dataset, i) => {
                                        let meta = chart.getDatasetMeta(i);
                                                                                
                                        if (meta.hidden) return;

                                        meta.data.forEach((bar, index) => {
                                            let data = dataset.data[index];
                                            let label = dataset.label;

                                            // Style the text
                                            ctx.fillStyle = 'black';
                                            ctx.font = '12px Arial';
                                            ctx.textAlign = 'center';

                                            // Draw count on top of the bar
                                            ctx.fillText(data, bar.x, bar.y - 5);

                                            // Draw label inside the bar (vertically)
                                            ctx.save();
                                            ctx.translate(bar.x, bar.y + (bar.height / 2));
                                            ctx.rotate(-Math.PI / 2);
                                            ctx.fillText(label, 0, 0);
                                            ctx.restore();
                                        });
                                    });
                                }                                
                            }];
                }

                return { 'options': options, 'plugins': plugins };
            }

            async function trendingChart(docGroup, module, yearFrom, yearTo, plantId, deptId, chartType, chartLocation) {
                console.log('docGroup:'+docGroup+ ', module:'+module+', yearFrom:'+yearFrom+', yearTo:'+yearTo+', plantId:'+plantId+', deptId:'+deptId+', chartType:'+chartType+', chartLocation:'+chartLocation);
                const data = {
                    labels: [], 
                    datasets: []
                };

                colors = ["rgba(255, 0, 0, 1)", "rgba(82, 215, 147, 1)", "rgba(86, 162, 207, 1)", "rgba(255, 165, 0, 1)", "rgba(238, 130, 238, 1)"];

                try {

                    // Fetch status list first
                    const rawStatusList = await new Promise((resolve) => {
                        x_search_view("dash", 'dash_module_statuses', [docGroup], resolve);
                    });
                
                    let statusList = Object.values(rawStatusList).map(item => item[0]);

                    // Create dataset objects for each status
                    let statusMap = statusList.map((status, index) => ({
                        label: status, 
                        data: [], 
                        backgroundColor: colors[index], 
                        borderColor: colors[index],
                        borderWidth: 1,
                        tension: 0.4
                    }));

                    // Store all promises
                    let yearPromises = [];
                    
                    for (let i = yearFrom; i <= yearTo; i++) {

                        data.labels.push(i.toString()); 

                        // Fetch trending data for the year
                        let trendingPromise = new Promise((resolve) => {

                            x_search_view("dash", 'dash_trending_data', [docGroup, module, i, plantId?plantId:'*', deptId?deptId:'*'], resolve);

                        }).then(trendingData => {
                                                        
                            statusList.forEach((status, index) => {
                                let count = 0;
                                $.each(trendingData, function(index, value){
                                    if(value[2]==status){
                                        count = +value[0];
                                    }
                                });
                                statusMap[index].data.push(count);
                            });
                        });

                        yearPromises.push(trendingPromise);
                    }
                    
                    await Promise.all(yearPromises);
                    
                    data.datasets = statusMap;

                    // console.log("Final Data:", data); // Debugging

                    if(chartLocation == 'tab'){
                        trendingChartTab.destroy(); 
                        chartConfig.type = chartType; 
                        chartConfig.data = data; 
                        chartConfig.options = chartOptions(chartType).options;
                        chartConfig.plugins = chartOptions(chartType).plugins;
                        trendingChartTab = new Chart(ctxTab, chartConfig); 
                    }
                    
                    if(chartLocation == 'modal'){
                        trendingChartModal.destroy(); 
                        chartConfig.type = chartType; 
                        chartConfig.data = data; 
                        chartConfig.options = chartOptions(chartType).options;
                        chartConfig.plugins = chartOptions(chartType).plugins;
                        trendingChartModal = new Chart(ctxModal, chartConfig); 
                    }

                } catch (error) {

                    console.error("Error fetching trending data:", error);
                }                               
            }
            
            // Trending Tab Chart
            $('.trending-tab').click(function(){                
                modulesByDocGroup('.trending-module', $('.trending-entity').val(), table = false);
                docGroupStartYear($('.trending-entity').val(), `.trending-year-from, .trending-year-to`);    
                setTimeout(function() {                                    
                    trendingChart($('.trending-entity').val(), $('.trending-module').val(), $('.trending-year-from').val(), $('.trending-year-to').val(), $('.trending-plant-id').val(), $('.trending-department-id').val(), 'bar', 'tab');
                }, 1000); // 1000ms = 1 seconds
            });

            $('#downloadBtn').on('click', function() {
                var canvas = document.getElementById('trending-chart-tab');
                var image = canvas.toDataURL('image/png');
                var link = document.createElement('a');
                link.href = image;
                link.download = 'chart.png';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            /* 9.MIS Report */
            function disableDatesInRange(YearFromVal,yearToSelector){
                $(yearToSelector).each(function () {
                    var optionValue = parseInt($(this).val());
                    if (optionValue < YearFromVal) {
                        $(this).attr('disabled', true);
                    } else {    
                        $(this).removeAttr('disabled');
                    }
                });
                
            }
            $(document).on('click', '.report-button', function () {
                let docName = $(this).data('module');
                let docGroupId = $(this).data('doc-group-id');
                let docGroup = $(this).data('doc-group');
                let yearFrom = $(`#year-from-${docGroup}`).val();
                let yearTo = $(`#year-to-${docGroup}`).val();
                let plantId = $(`#plant-id-${docGroup}`).val();
                let departmentId = $(`#department-id-${docGroup}`).val();
                console.log(docName);
                console.log(docGroup);
                console.log(docGroupId);
                
                populateFilter(docName, docGroup, docGroupId, yearFrom, yearTo, plantId, departmentId, '');
                $('#misReport').modal('show');
            });

            $(document).on('click', '.statusCount', function () {
                let docName = $(this).data('module');
                let docGroupId = $(this).data('doc-group-id');
                let docGroup = $(this).data('doc-group');
                let status = $(this).data('status');
                let yearFrom = $(`#year-from-${docGroup}`).val();
                let yearTo = $(`#year-to-${docGroup}`).val();
                let plantId = $(`#plant-id-${docGroup}`).val();
                let departmentId = $(`#department-id-${docGroup}`).val();
                console.log(docName);
                console.log(docGroupId);
                console.log(docGroup);
                console.log(status);
                console.log(yearFrom);
                console.log(yearTo);
                console.log(plantId);
                console.log(departmentId);
                
                populateFilter(docName, docGroup, docGroupId, yearFrom, yearTo, plantId, departmentId, status);

                $('#misReport').modal('show');
            });

            $(".module_report").change(function () {
                var moduleVal = $(this).val();
                $('.sub_module_filter').val('');
                x_getDocListByDocGroupId(moduleVal, function (result) {
                    ajax_respone_handler_set_dropdown(result, '.sub_module_report', '', [], '');
                });
            });

            $(".sub_module_report").change(function () {
                docGroupId = $('.module_report').val();
                docGroup = $('.module_report').children('option:selected').text();
                docName = $(this).val();
                populateFilter(docName, docGroup, docGroupId, '', '', '', '', '');
            });

            $(".start_date").change(function () {
                docGroup = $('.module_report').children('option:selected').text();
                docName = $('.sub_module_report').children('option:selected').text();
                disableDatesInRange($(this).val(),'.end_date option');
                getFilterTableData(docGroup, docName, null);
            });

            $(".module_status,.wf_status,.plant,.created_by,.end_date,.published_status").change(function () {
                docGroup = $('.module_report').children('option:selected').text();
                docName = $('.sub_module_report').children('option:selected').text();
                getFilterTableData(docGroup, docName, null);
            });

            $(".dept").change(function () {
                docGroup = $('.module').children('option:selected').text();
                docName = $('.sub_module_report').val();
                get_dept_users($(this).val(), '.created_by', '', '', 'All');
                getFilterTableData(docGroup, docName, null);
            });

            async function populateFilter(docName, docGroup, docGroupId, yearFrom, yearTo, plantId, departmentId, status) {
                yearFromOptionsVal = [];
                moduleStatus = '';
                $('#year-from-' + docGroup + ' option').each(function () {
                    yearFromOptionsVal.push($(this).val());
                });
                yearFromOptions = '';
                $.each(yearFromOptionsVal, function (index, value) {
                    yearFromOptions += `<option value="` + value + `">` + value + `</option>`
                });

                $('.start_date').empty().append(yearFromOptions);
                $('.end_date').empty().append(yearFromOptions);
                disableDatesInRange(yearFrom,'.end_date option');

                if (docGroupId) {
                    $('.module_report').val(docGroupId);
                    x_getDocListByDocGroupId(docGroupId, function (result) {
                        ajax_respone_handler_set_dropdown(result, '.sub_module_report', '', [], '', docName);
                    });
                    $('.sub_module_report').filter(function () {
                        if ($(this).text() === docName) {

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
                        x_getStatusByDocId(docGroup, docName, "published_status", function (result1) {
                            ajax_respone_handler_set_dropdown(result1, '.published_status', '', [], 'All', status);
                        });
                        if (status)
                            $('.published_status').val(status);

                    } else {
                        $('.wf_status').parent().parent().show();
                        $('.module_status').parent().parent().show();
                        $('.published_status').parent().parent().hide();
                        x_getStatusByDocId(docGroup, docName, "status", function (result1) {
                            ajax_respone_handler_set_dropdown(result1, '.module_status', '', [], 'All', status);
                        });
                        x_getStatusByDocId(docGroup, docName, "wf_status", function (result2) {
                            ajax_respone_handler_set_dropdown(result2, '.wf_status', '', [], 'All');
                        });

                        $('.module_status').val(status);
                        moduleStatus = status;
                    }
                }

                if (yearFrom)
                    $('.start_date').val(yearFrom);
                if (yearTo)
                    $('.end_date').val(yearTo);
                if (plantId){
                    await new Promise((resolve) => {
                        get_plant_dept_list(plantId, '.dept', '', '', 'All');
                        resolve(); // Assuming get_plant_dept_list has a callback or it's synchronous
                    });
                    get_plant_dept_list(plantId,'.dept','','','All');
                    $('.plant').val(plantId);
                }
                if (departmentId) {
                    $('.dept').val(departmentId);
                    get_dept_users(departmentId, '.created_by', '', '', 'All');
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
                lm_dom.append_search_icon(".show_filter_icon");
                var selectedValue = JSON.stringify(params);
                var dataSet = [];
                count = 0;
                // console.log(selectedValue);
                
                x_dashboardFilterData(selectedValue, docGroup, docName, function (result) {
                    var columns = [];
                    if (Object.keys(result).length > 0) {
                        var header = Object.keys(result[0]);
                        $.each(header, function (index, key) {
                            var formattedKey = key.replace(/_/g, ' ');
                            columns.push({title: formattedKey});
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
                    if (!columns.length) {
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
                columns.forEach(function (column) {
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
                    initComplete: function () {
                        this.api().columns().every(function () {
                            var column = this;
                            var input = $(column.footer()).find('input');
                            input.on('keyup change', function () {
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
                                    <thead></thead>
                                    <tfoot></tfoot>
                                </table>`;
                $('.result_area').html(tableHTML);
            }

        });
    <?php echo '</script'; ?>
>
<?php }
}
