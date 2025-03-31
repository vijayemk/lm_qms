<?php
/* Smarty version 3.1.30, created on 2025-02-17 12:09:55
  from "/var/www/html/lm_qms/lib/ccm/templates/search.ccm.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67b2d9bb1ec1f2_12902011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fd141f46bce90dadb054c0ccf77426636876d95' => 
    array (
      0 => '/var/www/html/lm_qms/lib/ccm/templates/search.ccm.tpl',
      1 => 1726641750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_67b2d9bb1ec1f2_12902011 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Search </li>
            <li class="active">Search Change Control</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <span class="panel-title h4"> 
                        <i class="icon-cog"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">Search Change Control </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row mgbt-md-10">
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="plant search_ccm show_ccm_no">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plantlist']->value, 'item', false, 'key', 'list', array (
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
                                <div class="col-md-2">
                                    <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="dept search_ccm show_ccm_no">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dept_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['dropdwon_value'];?>
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
                                <div class="col-md-2">
                                    <label class="control-label"> <?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"user_name"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="created_by search_ccm">All</select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="controls">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"cc_no"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <input type="text" class="ccm_no search_ccm" list="ccm_no_data_list">
                                            <datalist id="ccm_no_data_list" class="ccm_no">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ccm_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
"></option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"start_date"),$_smarty_tpl);?>
 </label>
                                    <div class="controls">
                                        <input type=text class="required generate_datepicker date_changed start_date search_ccm" data-datepicker=0>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"end_date"),$_smarty_tpl);?>
 </label>
                                    <div class="controls">
                                        <input type=text class="required generate_datepicker end_date search_ccm" data-datepicker=0>
                                    </div>
                                </div> 
                            </div>
                            <div class="row mgbt-md-10">
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"type"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="change_type search_ccm">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ccm_type_list']->value, 'item', false, 'key', 'list', array (
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
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"classification"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="classification search_ccm">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['classification_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
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
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"approval_status"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="appr_status search_ccm">
                                            <option value="">All</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Accepted">Accepted</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"wf_status"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="wf_status search_ccm">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wf_status']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
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
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"status"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="search_ccm" id="status">
                                            <option value="">All</option>
                                            <option value="Open">Open</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"material_type"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="mat_type search_ccm">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['material_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['material_type'];?>
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
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"processing_stage"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="pro_stage search_ccm">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['process_stage_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['process_stage'];?>
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
                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"product_name"),$_smarty_tpl);?>
</label>
                                    <div class="controls">
                                        <select class="pro_name search_ccm">
                                            <option value="">All</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
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
                        <div class="form-actions-condensed row mgbt-xs-0 mgtp-0">
                            <span class="result_area font-semibold" style="display:none;">(Found <span class="label label-danger result_count">0</span> Change Control)</span>
                            <button class="btn vd_bg-green vd_white search_ccm_btn pull-right mgl-10"><span class="menu-icon search_ccm"><i class="fa fa-fw fa-search"></i></span> Search</button>
                            <button class="btn vd_bg-red vd_white page_reload  pull-right" type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                        </div>
                    </div>
                    <div class="panel-body result_area" style="display: none;">
                        <table class="table table-bordered table-striped generate_datatable search_result_table" title="Search CCM" data-whitespace="nowrap">
                            <thead>
                                <tr>
                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"cc_no"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"created_by"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"classification"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"close_out_date"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"completed_date"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"approval_status"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"wf_status"),$_smarty_tpl);?>
</th>
                                    <th><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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

    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {

            $(document).on("change", ".plant", (e) => get_dept_list($(e.target).val(), '.dept', '', '', 'All'));
            $(document).on("change", ".dept", (e) => get_dept_users($(e.target).val().split("-")[1], '.created_by', '', '', 'All'));
            $(document).on("change", ".show_ccm_no", function () {
                loading.show();
                let plant = ($(".plant").val()) ?? '';
                let dept = ($(".dept").val().split("-")[1]) ?? '';

                x_get_qms_doc_no_list("ccm", plant, dept, function (result) {
                    $(".ccm_no").empty();
                    let writter = '';
                    $.each(result, function (key, val) {
                        writter += `<option value=${val.drop_down_option}>${val.drop_down_option}</option>`;
                    });
                    // $(".ccm_no").focus();
                    $(".ccm_no").append(writter);
                });
                loading.hide();
            });

            $(document).on("click", ".search_ccm_btn", function () {
                var params = {
                    dept: $(".dept").val().split("-")[1],
                    created_by: $(".created_by").val(),
                    start_date: $(".start_date").val(),
                    end_date: $(".end_date").val(),
                    org: $(".org").val(),
                    plant: $(".plant").val(),
                    mat_type: $(".mat_type").val(),
                    pro_name: $(".pro_name").val(),
                    ccm_no: ($(".ccm_no").val() === "All") ? '' : $(".ccm_no").val(),
                    appr_status: $(".appr_status").val(),
                    wf_status: $(".wf_status").val(),
                    status: $("#status").val(),
                    pro_stage: $(".pro_stage").val(),
                    classification: $(".classification").val(),
                    change_type: $(".change_type").val()
                };
                lm_dom.append_search_icon(".search_ccm");
                loading.show(this);
                x_search_ccm(JSON.stringify(params), function (result) {

                    let table = ($.fn.dataTable.isDataTable('.search_result_table')) ? $('.search_result_table').DataTable() : null;
                    if (typeof result === 'object') {
                        table.clear().draw();
                        $('.result_area').show();
                        $.each(result, function (key, val) {
                            table.row.add([key + 1, val['doc_link'], val['plant_name'], val['cc_department_name'], val['created_by_name'], val['classification_name'], val['target_date'], val['close_out_date'], val['completed_date'], val['approval_status'], val['wf_status'], val['status']]).draw(true);
                        });
                        $('.no_records').hide();
                        loading.hide(".search_ccm");
                        $(".result_count").html(Object.keys(result).length);
                        return;
                    }
                    loading.hide(".search_ccm");
                    $('.result_area').hide();
                    $('.no_records').show();
                });
            });
        });

    <?php echo '</script'; ?>
>

<?php }
}
