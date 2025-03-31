<?php
/* Smarty version 3.1.30, created on 2024-10-09 17:19:30
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/capa/templates/view_capa.capa.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67066dcab94ff6_40739204',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e4dbae5617fc406f49754c000dfb3537e44712e' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/capa/templates/view_capa.capa.tpl',
      1 => 1726554610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
    'file:templates/common/edit_access_rights.tpl' => 1,
    'file:templates/common/recall.tpl' => 6,
    'file:pass_auth.tpl' => 8,
    'file:templates/common/extension_request.tpl' => 3,
    'file:templates/common/extension_approval.tpl' => 3,
    'file:templates/worklist_pending_details.tpl' => 1,
  ),
),false)) {
function content_67066dcab94ff6_40739204 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/inelplm/www/html/lm_qms_atul_22sep24/Smarty/libs/plugins/function.counter.php';
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
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">View CAPA Management </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> CAPA Details</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-wizard generate_wizard">
                            <ul>
                                <li><a href="#tab_pri_dtls" data-toggle="tab"><div class="menu-icon"> 1 </div> Primary Details </a></li>
                                <li><a href="#tab_correct_prevent" data-toggle="tab"><div class="menu-icon"> 2 </div> CA & PA </a></li>
                                <li><a href="#tab_implement" data-toggle="tab"><div class="menu-icon"> 3 </div>Implementation</a> </li>
                                <li><a href="#tab_attachments" data-toggle="tab"> <div class="menu-icon"> 4 </div>Attachments </a></li>
                                <li><a href="#tab_reports" data-toggle="tab"><div class="menu-icon"> 5 </div>Reports</a></li>
                                <li><a href="#tab_insight" data-toggle="tab"><div class="menu-icon"> 6 </div>Insight</a></li>
                            </ul>
                            <div class="progress progress-striped">
                                <div class="progress-bar vd_bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only"></span> </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="tab_pri_dtls">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><span class="append-icon icon-vcard"></span>Basic Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'capa_no'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['capa_no']->value;?>
" >
                                                    </div>
                                                    <div class="col-sm-3"> 
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'initiator'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['created_by']->value;?>
" >
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'plant_name'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['plant_name']->value;?>
" >
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'department'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['capa_department']->value;?>
" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'initiation_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['initiated_time']->value;?>
" >
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'doc_no'),$_smarty_tpl);?>
</div>
                                                        <div class="input-border pd-10 col-md-12">
                                                            <?php echo $_smarty_tpl->tpl_vars['source_doc_no']->value['source_doc_link'];?>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'trigger_type'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->trigger_type;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'status'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->status;?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'monitoring_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->is_monitoring_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->monitoring_target_date) {?>
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                    <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->monitoring_target_date),$_smarty_tpl);?>
">
                                                                </div>
                                                            <?php }?>
                                                            <input type="hidden" id="capa_object_id" value="<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
">
                                                            <input type="hidden" id="wf_status" value="<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->wf_status;?>
" />
                                                            <input type="hidden" id="status" value="<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->status;?>
" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-delicious"></i>CAPA Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'approved_status'),$_smarty_tpl);?>
</div>
                                                        <div class="input-border pd-5"><span class="font-semibold badge"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->approval_status),$_smarty_tpl);?>
</span></div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'implementation_target_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_target_date),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->target_date),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable2),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'close_out_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->close_out_date),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable3),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'completion_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->completed_date),$_smarty_tpl);
$_prefixVariable4=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable4),$_smarty_tpl);?>
">
                                                    </div>
                                                </div>
                                                <div class="row mgbt-md-10">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'reason'),$_smarty_tpl);?>
</div>
                                                        <textarea type="text" rows="4" readonly><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->reason;?>
</textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'pd_nc'),$_smarty_tpl);?>
</div>
                                                        <textarea type="text" rows="4" readonly><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->present_system),$_smarty_tpl);?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'corrections'),$_smarty_tpl);?>
</div>
                                                        <textarea type="text" rows="4" readonly><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->immed_action_taken),$_smarty_tpl);?>
</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Dept Head Approver Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['dept_approver_comments']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dept_approver_comments']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>QA Review Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['qa_review_comments']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qa_review_comments']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Pre Approver Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['pre_approver_comments']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pre_approver_comments']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Effectiveness Monitoring Responsible Persons</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['capa_moni_resp_per_array']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Final Feed back Comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'user_name'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'department'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'level'),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_moni_resp_per_array']->value, 'cmt', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['cmt']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['resp_per'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['dept'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['level'];?>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Effectiveness Monitoring Interim-Feedback</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['capa_interim_feedback_comments_array']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable"  title="Interim Feed Back Comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'date'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'user_name'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'feedback'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'effectiveness'),$_smarty_tpl);?>

                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_interim_feedback_comments_array']->value, 'cmt', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['cmt']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['date'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['updated_by'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['feedback'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['effectiveness'];?>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Effectiveness Monitoring Final-Feedback</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['capa_final_feedback_comments_array']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Final Feed Back Comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'date'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'user_name'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'feedback'),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'effectiveness'),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_final_feedback_comments_array']->value, 'cmt', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['cmt']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['date'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['updated_by'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['feedback'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['effectiveness'];?>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_correct_prevent">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-certificate"></i>Corrective Action</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if ($_smarty_tpl->tpl_vars['capa_task_list']->value) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="CAPA Corrective Actions" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"corrective_action"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"responsible_person"),$_smarty_tpl);?>
</th>                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_plant'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_dept'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                                    </tr>
                                                                <?php }?>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </tbody>
                                                    </table> 
                                                <?php } else { ?>
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-shield"></i>Preventive Action | Risk Mitigation Action</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if ($_smarty_tpl->tpl_vars['capa_task_list']->value) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="CAPA Preventive Actions" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"preventive_action"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"responsible_person"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'pa') {?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_plant'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_dept'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                                    </tr>
                                                                <?php }?>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </tbody>
                                                    </table> 
                                                <?php } else { ?>
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_implement">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon append-icon fa fa-fw fa-user"></i>Implementation Responsible Persons</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['capa_task_list']->value) && !empty($_smarty_tpl->tpl_vars['capa_master_obj']->value->task_status)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Task Responsible Persons" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1 pd-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2 pd-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2 pd-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['pri_per_name']),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['task_status_pri'] == 'Completed') {?> | <span class="label vd_bg-green append-icon"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_status_pri'];?>
</span><?php } else { ?> | <span class="label vd_bg-red append-icon"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_status_pri'];?>
</span><?php }?></td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['sec_per_name']),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['sec_per_name']) {?> <?php if ($_smarty_tpl->tpl_vars['item']->value['task_status_sec'] == 'Completed') {?> | <span class="label vd_bg-green append-icon"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_status_sec'];?>
</span><?php } else { ?> | <span class="label vd_bg-red append-icon"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_status_sec'];?>
</span><?php }
}?></td>
                                                                    <td><span class="<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 'Completed') {?>label vd_bg-green<?php } else { ?>label vd_bg-red<?php }?> append-icon"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span></td>
                                                                </tr>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-tasks"></i>IMPLEMENTATION REVIEW | VERIFICATION | COMMENTS</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['capa_task_list']->value) && !empty($_smarty_tpl->tpl_vars['capa_master_obj']->value->task_status)) {?>
                                                    <table class="table table-bordered generate_datatable" title="Attacments" data-ori="landscape" data-pagesize="B4" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1 pd-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
 </th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_verification"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"dept_head_review"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="row mgbt-md-0 pdlr-10">
                                                                            <div>
                                                                                <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
<button class="btn btn-default show_task_history pd-0 mgl-10" type="button" data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history" data-original-title="Show Task History" data-toggle="tooltip" data-placement="bottom"></i></button>
                                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?> <span class="append-icon icon-sound mgtp-20 mgl-5 vd_hover" data-original-title="Change Control Triggred" data-toggle="tooltip" data-placement="bottom"></span><?php }?>
                                                                                <br> <span class="<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 'Completed') {?>label vd_bg-green<?php } else { ?>label vd_bg-red<?php }?> append-icon"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span>
                                                                                <br><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>

                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10 ">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_sec_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_sec_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                    <br>
                                                                                    <i class="append-icon fa fa-fw fa-user mgtp-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_by_name'];?>

                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10 ">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_pri_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_pri_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                    <br>
                                                                                    <i class="append-icon fa fa-fw fa-user mgtp-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_by_name'];?>

                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_creator_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_creator_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_creator_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_dept_head_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_attachments">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>General - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if ($_smarty_tpl->tpl_vars['general_file_objectarray']->value) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Attachments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"size"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"attached_by"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['general_file_objectarray']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
                                                                    <td><?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item']->value['size']),$_smarty_tpl);?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_by'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_date'];?>
</td>
                                                                    <td class="menu-action text-nowrap">
                                                                        <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><i class="fa fa-download"></i></a>
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
                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>Task - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['capa_task_list']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Attacments" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"name"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"size"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"attached_by"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"type"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['attachments_sec'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                            <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item2']->value['name'];?>
</a></td>
                                                                            <td><?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item2']->value['size']),$_smarty_tpl);?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['attached_by'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['attached_date'];?>
</td>
                                                                            <td>Secondary Person</td>
                                                                            <td class="menu-action text-nowrap">
                                                                                <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['object_id'];?>
"><i class="fa fa-download"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['attachments_pri'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                            <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item2']->value['name'];?>
</a></td>
                                                                            <td><?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item2']->value['size']),$_smarty_tpl);?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['attached_by'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['attached_date'];?>
</td>
                                                                            <td>Primary Person</td>
                                                                            <td class="menu-action text-nowrap">
                                                                                <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['object_id'];?>
"><i class="fa fa-download"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['attachments_creator'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                            <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item2']->value['name'];?>
</a></td>
                                                                            <td><?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item2']->value['size']),$_smarty_tpl);?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['attached_by'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['attached_date'];?>
</td>
                                                                            <td>Task Verifier</td>
                                                                            <td class="menu-action text-nowrap">
                                                                                <a type="button"  class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['object_id'];?>
"><i class="fa fa-download"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </tbody>
                                                        </table>
                                                    <?php } else { ?>
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_reports">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-file-pdf-o"></i>Reports </span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body pdlr-10"> 
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-blue" style="box-shadow:none;">
                                                            <label class="vd_white">Full Report</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a2&rtype=full_report">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a2&rtype=full_report">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a3&rtype=full_report">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a3&rtype=full_report">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a4&rtype=full_report">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a4&rtype=full_report">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-dark-green" style="box-shadow:none;">
                                                            <label class="vd_white">CA & PA</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a2&rtype=ca_pa">CA&PA Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a2&rtype=ca_pa">CA&PA Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a3&rtype=ca_pa">CA&PA Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a3&rtype=ca_pa">CA&PA Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a4&rtype=ca_pa">CA&PA Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a4&rtype=ca_pa">CA&PA Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group vd_bg-black" style="box-shadow:none;">
                                                            <label class="vd_white">Implementation</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a2&rtype=task">Task Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a2&rtype=task">Task Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a3&rtype=task">Task Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a3&rtype=task">Task Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a4&rtype=task">Task Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a4&rtype=task">Task Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                        <div class="lm_e-sign form-group" style="box-shadow:none;">
                                                            <label class="vd_white">Meeting</label>
                                                        </div>
                                                        <select  class="show_report mgbt-md-20">
                                                            <option value="">Select Type</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a2&rtype=meeting">Meeting Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a2&rtype=meeting">Meeting Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a3&rtype=meeting">Meeting Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a3&rtype=meeting">Meeting Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=p&paper_size=a4&rtype=meeting">Meeting Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_capa_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
&ori=l&paper_size=a4&rtype=meeting">Meeting Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_insight">
                                    <div id="insight_wizard" class="form-wizard condensed input-border generate_wizard">
                                        <ul class="nav nav-tabs nav-justified font-semibold">
                                            <li class="input-border"><a class="pd-10" href="#insight_meeting"  data-toggle="tab"><div class="menu-icon"> <i class="icon-users vd_red"></i> </div>Meeting</a></li>
                                            <li class="input-border"><a class="pd-10" href="#insight_access_rights" data-toggle="tab"><div class="menu-icon"><i class="icon-key vd_red"></i></div>Access Rights</a></li>
                                            <?php if ($_smarty_tpl->tpl_vars['cancelled_details']->value) {?><li class="input-border"><a class="pd-10" href="#insight_cancel_details" data-toggle="tab"><div class="menu-icon"><i class="icon-blocked vd_red"></i></div>Cancellation Details</a></li><?php }?>
                                            <li class="input-border"><a class="pd-10" href="#insight_extension" data-toggle="tab"><div class="menu-icon"><i class="fa  fa-external-link vd_red"></i></div>Interim Extension</a></li>
                                            <li class="input-border"><a class="pd-10" href="#insight_etrigger" data-toggle="tab"><div class="menu-icon"><i class="icon-sound vd_red"></i></div>Integration Details</a></li>
                                            <li class="input-border search_audit_trail"><a class="pd-10" href="#insight_audit_trail" data-toggle="tab"><div class="menu-icon"><i class="fa fa-fw fa-road vd_red"></i></div>Audit Trail</a></li>
                                        </ul>
                                        <div class="panel-body pd-15">
                                            <div class="tab-content pd-0 mgtp-0 no-bd">
                                                <div class="tab-pane active" id="insight_meeting">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-calendar"></i>Meeting Scheduled Information </span></h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <?php if (($_smarty_tpl->tpl_vars['meeting_schedule']->value)) {?>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'meeting_date'),$_smarty_tpl);?>
</div>
                                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_date1'];?>
">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'meeting_time'),$_smarty_tpl);?>
</div>
                                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_time'];?>
">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'venue'),$_smarty_tpl);?>
</div>
                                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['venue'];?>
">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'status'),$_smarty_tpl);?>
</div>
                                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['status'];?>
">
                                                                        </div>
                                                                    </div>
                                                                    <?php if (($_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'])) {?>
                                                                        <div class="row">
                                                                            <div class="col-sm-9">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'online_meeting_link'),$_smarty_tpl);?>
</div>
                                                                                <a class="vd_blue" target="_blank" href=<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'];?>
>Click Here</a>
                                                                            </div>
                                                                        </div>
                                                                    <?php }?>
                                                                <?php } else { ?>
                                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                                    </div>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-bullseye"></i>Meeting Agenda & Conclusion Details</span></h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['meeting_agenda_details']->value)) {?>
                                                                    <table class="table table-bordered table-striped generate_datatable" title="Meeting Details" data-sort_column=1>
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"meeting_agenda"),$_smarty_tpl);?>
</th>
                                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"meeting_conclusion"),$_smarty_tpl);?>

                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_agenda_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['conclusion'];?>
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
                                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                                    </div>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="insight_access_rights">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>ACCESS RIGHTS </span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['current_access_rights']->value)) {?>
                                                        <table   class="table table-bordered table-striped generate_datatable" title="Access Rights" data-whitespace="pre-wrap" data-ori="landscape" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"last_modified_by"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"last_modified_date"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['current_access_rights']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr >
                                                                        <td></td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['dept_name'];?>
</td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_by'];?>
</td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_time'];?>
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
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="tab-pane" id="insight_cancel_details">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-blocked"></i>Cancellation Details</span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['cancelled_details']->value)) {?>
                                                        <table   class="table table-bordered table-striped generate_datatable" title="Cancelled Details" data-whitespace="pre-wrap" data-ori="landscape" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"cancelled_by"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"cancelled_date"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cancelled_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr >
                                                                        <td></td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
</td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['cancelled_by'];?>
</td>
                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['cancelled_time'];?>
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
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="tab-pane" id="insight_extension">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-external-link"></i>INTERIM EXTENSION</span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['extension_details']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Interim Extension" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"requested_date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"requested_by"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"exisiting_target_date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"proposed_target_date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approved_by"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approved_date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"extension_for"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approval_status"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extension_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_time'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['existing_target_date'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['proposed_target_date'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
</td>
                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['approved_by']),$_smarty_tpl);?>
</td>
                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['approved_date']),$_smarty_tpl);?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['extension_for'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['approval_status'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
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
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="tab-pane" id="insight_etrigger">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-sound"></i>INTEGRATION DETAILS</span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['etrigger_details']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Interim Extension" data-ori="landscape" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"src_doc"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"dest_doc"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"triggered_by"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"triggered_to"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"triggered_date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"reason"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"assigned_to"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"assigned_date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"tracking_no"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['etrigger_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['source_doc_no_link'];?>
<br><?php echo $_smarty_tpl->tpl_vars['item']->value['source_doc_name'];?>
</td>
                                                                        <td><?php if ($_smarty_tpl->tpl_vars['item']->value['dest_doc_no']) {
echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['dest_doc_no_link']),$_smarty_tpl);
}?><br><?php echo $_smarty_tpl->tpl_vars['item']->value['dest_doc_name'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_by_name'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_to_name'];?>
</td>
                                                                        <td><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['triggered_date']),$_smarty_tpl);?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['wf_status'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
</td>
                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['assigned_to_name']),$_smarty_tpl);?>
</td>
                                                                        <td><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['assigned_date']),$_smarty_tpl);?>
</td>
                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['tracking_link']),$_smarty_tpl);?>
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
                                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                            <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="tab-pane" id="insight_audit_trail">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-road"></i>Audit Trail</span></h4>
                                                    <table class="table table-bordered table-striped generate_datatable audit_trail_result_table" title="Audit trail" data-whitespace="nowrap" data-ori="landscape" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"ip_address"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"action"),$_smarty_tpl);?>
 </th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"new_value"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"old_value"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" class="query" type="hidden" value="capa_wf_audit_trail">
                                                    <input type="hidden" class="refrence_object_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
">
                                                    <input type="hidden" class="from_date"  data-datepicker_min="<?php echo $_smarty_tpl->tpl_vars['at_start_date']->value;?>
" data-datepicker_max="<?php echo $_smarty_tpl->tpl_vars['at_end_date']->value;?>
">
                                                    <input type="hidden" class="to_date"  data-datepicker_min="<?php echo $_smarty_tpl->tpl_vars['at_start_date']->value;?>
" data-datepicker_max="<?php echo $_smarty_tpl->tpl_vars['at_end_date']->value;?>
">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions-condensed wizard">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-sm-9 col-sm-offset-0"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" href="javascript:void(0);">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsestatus"> Status </a> </h4>
                </div>
                <div id="collapsestatus" class="panel-collapse collapse">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="col-md-8 h4 mgtp-0 mgbt-md-0 pd-0 row"><span class="vd_blue"><strong><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->wf_status;?>
</strong></span>
                                <?php if (!empty($_smarty_tpl->tpl_vars['worklist_pending_details']->value)) {?> <span data-original-title="Pending Details" data-toggle="tooltip" data-placement="bottom"> <i style="cursor: pointer;" data-target="#modal-worklist" data-toggle="modal" class="btn menu-icon vd_bd-red vd_red fa fa-tasks"></i> </span><?php }?>
                            </div>
                            <div class="progress progress-striped active mgtp-5 mgbt-md-0 vd_hover" data-original-title="<div class='mgtp-5 font-semibold'><span><i class='fa fa-circle fa-fw vd_green fa-beat-animation'></i>Completion : </span><span> <?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
</span></div><div class='mgtp-5 font-semibold'><span><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->status;?>
 </span><span> - [<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->wf_status;?>
]</span></div>" data-toggle="tooltip" data-placement="bottom" data-html="true">
                                <div class="progress-bar font-semibold" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
"> <span><?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
</span> </div>
                            </div>
                            <div class="row mgtp-10">
                                <table class="table table-bordered table-hover table-striped mgtp-5">
                                    <thead>
                                        <tr>
                                            <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"date"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"username"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"action"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"status"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['status_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="mgtp-0 mgbt-md-0">
                        <div class="panel-body">
                            <h4 class="mgbt-xs-20 row font-semibold text-uppercase vd_grey">Comments</h4>
                            <form name="dms_comments_form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal row" role="form" id="dms_comments_form" autocomplete="off">
                                <table class="table table-bordered table-striped generate_datatable" title="Comments" data-sort_column=1>
                                    <thead>
                                        <tr>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"date"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"username"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"remarks"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wf_remarks_array']->value, 'cmt', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['cmt']->value) {
?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['created_time'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['created_by'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['plant'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['department'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['cmt']->value['remarks'];?>
</td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($_smarty_tpl->tpl_vars['edit_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseEdit"> Edit <i class="fa  fa-exclamation-triangle vd_white"></i> <?php if ($_smarty_tpl->tpl_vars['show_edit_error_msg']->value) {?><span class="badge vd_bg-red fa-beat-animation" data-toggle="tooltip" data-placement="bottom" data-original-title="Kindly upadte the Mandatory Fields to proceed to the next stage"><i class="fa fa-exclamation"></i></span><?php }?></a> </h4>
                    </div>
                    <div id="collapseEdit" class="panel-collapse collapse">
                        <div class="panel widget light-widget">
                            <div class="panel widget">
                                <div class="panel-body">
                                    <div class="form-wizard condensed">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_basic_details" class="btn vd_green font-semibold"><div class="menu-icon"><span class="icon-vcard vd_red"></span></div>Basic Details</a></li>
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_prev_action_accept"  class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa-fw fa-delicious vd_red"></i></div>Corrective Action & Preventive Action | Risk Mitigation Action</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-------- Start Of Modal Edit Baisc Details ---------------------------------->
                                <div class="modal fade" id="edit_basic_details" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog width-60">
                                        <div class="modal-content">
                                            <div class="modal-header vd_bg-dark-green vd_white">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Basic Details</h4>
                                            </div>
                                            <div class="modal-body pd-15">
                                                <form name="edit_basic_details-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="edit_basic_details-form" autocomplete="off">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div class="controls">
                                                                <textarea placeholder="Enter description" rows="4"  name="ucapa_reason"  required title="Enter Valid Reason" <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->trigger_type == 'e-trigger') {?>readonly disabled<?php }?> ><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->reason;?>
</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pd_nc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div class="controls">
                                                                <textarea placeholder="Enter Present Discrepancy | Non-Conformity" rows="4"  name="ucapa_present_system"  required title="Enter Valid Present Discrepancy | Non-Conformity"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->present_system;?>
</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"corrections"),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <textarea type="text" rows="4" name="ucapa_immed_action" title="Enter Corrections | Immediate Action" placeholder="Please specify the immediate actions taken in response to this incident or deviation."><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->immed_action_taken;?>
</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="input-border panel-body pd-15">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
</div>
                                                                <div class="controls mgtp-5">
                                                                    <input type="checkbox" class="switch_unchecked" name="ucapa_meeting"  data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No"  title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->wf_status != 'Created') {?>readonly<?php }?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0" >
                                                            <div class="col-sm-12">
                                                                <input type="hidden" name="audit_trail_action" value="Update Basic Information">
                                                                <input type="hidden" name="update_basic_info">
                                                                <button class="btn vd_bg-green vd_white" type="submit"  id="update_basic_info"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span> Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-------- End Of Modal Edit Baisc Details ------------------------------------>
                                <!-------- Start Of Modal Preventive Action Acceptance Criteria ----------------->
                                <div class="modal fade" id="edit_prev_action_accept" tabindex="-1" role="dialog" aria-labelledby="edit_prev_action_accept" aria-hidden="true">
                                    <div class="modal-dialog width-80">
                                        <div class="modal-content">
                                            <div class="modal-header vd_bg-dark-green vd_white">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title" >Add Corrective & Preventive Action | Risk Mitigation Action</h4>
                                            </div>
                                            <div class="modal-body pd-15">
                                                <form name="edit_ccp-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="edit_ccp-form" autocomplete="off">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <!-- Start of Corrective Actions -->
                                                    <table class="table table-bordered table-striped table-hover mgbt-md-0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4" class="pd-5">
                                                                    <button class="btn vd_bg-green vd_white add_ca_task_id" type="button" onclick="add_element('.add_ca_task_child_ele', '.add_ca_task_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_details"),$_smarty_tpl);?>
 (<?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"corrective_action"),$_smarty_tpl);?>
)<span class="vd_red">*</span></th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="add_ca_task_parent_ele">
                                                            <?php if ($_smarty_tpl->tpl_vars['capa_task_list']->value) {?>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>
                                                                        <tr class="add_ca_task_child_ele">
                                                                            <td><input type="text" class="ca_task_id" name="task_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" readonly><input type="hidden" name="task_type[]" value="ca" class="no_reset_ele" readonly></td>
                                                                            <td>
                                                                                <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</textarea>
                                                                            </td>
                                                                            <td class="pd-5">
                                                                                <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'td', '#task_department'));" title="Select Valid Plant">
                                                                                    <option value="">Company</option>
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item1', false, 'key1', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item1']->value['drop_down_option'];?>
</option>
                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                </select>
                                                                                <select class="mgtp-5" id="task_department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.add_ca_task_child_ele', '.task_pri_resp_per'), null);" title="Select Valid Department">
                                                                                    <option value="">Department</option>
                                                                                </select>
                                                                                <select class="mgtp-5 task_pri_resp_per reset_select" name="pri_per_id[]" title="Select Valid User Name">
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn menu-icon vd_bd-red vd_red delete_ca_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }?>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            <?php } else { ?>
                                                                <tr class="add_ca_task_child_ele">
                                                                    <td><input type="text" class="ca_task_id" name="task_id[]" readonly value="CA1"><input type="hidden" name="task_type[]" value="ca" class="no_reset_ele" readonly></td>
                                                                    <td>
                                                                        <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"></textarea>
                                                                    </td>
                                                                    <td class="pd-5">
                                                                        <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'td', '#task_department'));" title="Select Valid Plant">
                                                                            <option value="">Company</option>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
</option>
                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                        </select>
                                                                        <select class="mgtp-5" id="task_department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.add_ca_task_child_ele', '.task_pri_resp_per'), null);" title="Select Valid Department">
                                                                            <option value="">Department</option>
                                                                        </select>
                                                                        <select class="mgtp-5 task_pri_resp_per" name="pri_per_id[]" title="Select Valid User Name">
                                                                            <option value="">Responsible Person</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn menu-icon vd_bd-red vd_red delete_ca_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                    </td>
                                                                </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                    <!-- End of Corrective Actions -->
                                                    <!-- Start of Preventive Actions -->
                                                    <table class="table table-bordered table-striped table-hover mgbt-md-0 mgtp-20">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4" class="pd-5">
                                                                    <button class="btn vd_bg-green vd_white add_pa_task_id" type="button" onclick="add_element('.add_pa_task_child_ele', '.add_pa_task_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
<span class="vd_red">*</span></th>
                                                                <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_details"),$_smarty_tpl);?>
  (<?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"preventive_action"),$_smarty_tpl);?>
)<span class="vd_red">*</span></th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="add_pa_task_parent_ele">
                                                            <?php if ($_smarty_tpl->tpl_vars['capa_task_list']->value) {?>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'pa') {?>
                                                                        <tr class="add_pa_task_child_ele">
                                                                            <td><input type="text" class="pa_task_id" name="task_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" readonly><input type="hidden" name="task_type[]" value="pa" class="no_reset_ele" readonly></td>
                                                                            <td>
                                                                                <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</textarea>
                                                                            </td>
                                                                            <td class="pd-5">
                                                                                <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'td', '#task_department'));" title="Select Valid Plant">
                                                                                    <option value="">Company</option>
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item1', false, 'key1', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item1']->value['drop_down_option'];?>
</option>
                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                </select>
                                                                                <select class="mgtp-5" id="task_department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.add_pa_task_child_ele', '.task_pri_resp_per'), null);" title="Select Valid Department">
                                                                                    <option value="">Department</option>
                                                                                </select>
                                                                                <select class="mgtp-5 task_pri_resp_per reset_select" name="pri_per_id[]" title="Select Valid User Name">
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn menu-icon vd_bd-red vd_red delete_pa_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }?>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            <?php } else { ?>
                                                                <tr class="add_pa_task_child_ele">
                                                                    <td><input type="text" class="pa_task_id" name="task_id[]" readonly value="PA1"><input type="hidden" name="task_type[]" value="pa" class="no_reset_ele" readonly></td>
                                                                    <td>
                                                                        <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"></textarea>
                                                                    </td>
                                                                    <td class="pd-5">
                                                                        <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'td', '#task_department'));" title="Select Valid Plant">
                                                                            <option value="">Company</option>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
</option>
                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                        </select>
                                                                        <select class="mgtp-5" id="task_department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.add_pa_task_child_ele', '.task_pri_resp_per'), null);" title="Select Valid Department">
                                                                            <option value="">Department</option>
                                                                        </select>
                                                                        <select class="mgtp-5 task_pri_resp_per" name="pri_per_id[]" title="Select Valid User Name">
                                                                            <option value="">Responsible Person</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn menu-icon vd_bd-red vd_red delete_pa_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                    </td>
                                                                </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                    <!-- End of Preventive Actions -->
                                                    <div class="modal-footer">
                                                        <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                            <input type="hidden" name="save_ccp">
                                                            <input type="hidden" name="audit_trail_action" value="Edit Corrections | Immediate Action,Corrective Action, Prevetive Action | Risk Mitigation">
                                                            <button class="btn vd_bg-green vd_white" type="submit" id="save_ccp"><span class="menu-icon"><i class="fa fa-fw fa-save"></i></span> Save</button>
                                                        </div>    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---------- End Of Modal Preventive Action Acceptance Criteria--------------->
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['edit_attachment']->value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_dms_attachments">Edit Attachments <i class="fa  fa-exclamation-triangle vd_white"></i></a></h4>
                    </div>
                    <div id="collapse_dms_attachments" class="panel-collapse collapse">
                        <div class="panel-body pdlr-10">
                            <div class="col-md-12">
                                <form name="upload-doc-form" id="upload-doc-form" method="POST" autocomplete="off" class="form-separated">
                                    <!--Dont delete. Dropzone Custom File Upload Script See vendors/custom_inel/file_upload/all_file_upload.js-->
                                    <input type="hidden" name="upload_file_url" id="upload_file_url" value="<?php echo $_SERVER['REQUEST_URI'];?>
" />
                                    <input type="hidden" id="file_attachment_towards" value="<?php echo $_smarty_tpl->tpl_vars['file_attachment_towards']->value;?>
" />
                                    <input type="hidden" name="upload_file_max_size" id="upload_file_max_size" value="<?php echo $_SESSION['max_upload_file_size'];?>
" />
                                    <div id="mydropzone" class="dropzone"></div>
                                </form>
                            </div>
                            <div class="col-md-12 mgtp-15">
                                <div class="table-responsive">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['fileobjectarray']->value)) {?>
                                        <table class="table table-bordered table-striped text-nowrap" title="Attachments">
                                            <thead>
                                                <tr>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"name"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"size"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"attached_by"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"actions"),$_smarty_tpl);?>
</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fileobjectarray']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                                                        <td style='white-space: pre-wrap;'><a  class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><i class="fa fa-download"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
                                                        <td><?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item']->value['size']),$_smarty_tpl);?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_by'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_date'];?>
</td>
                                                        <td class="menu-action text-nowrap">
                                                            <a class="btn menu-icon vd_bd-green vd_green" data-original-title="Download" data-toggle="tooltip" data-placement="bottom"  href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><i class="fa fa-download"></i></a>
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['can_delete']) && ($_smarty_tpl->tpl_vars['file_attachment_towards']->value == $_smarty_tpl->tpl_vars['item']->value['attachment_towards'])) {?>
                                                                <button type="button"  class="btn menu-icon vd_bd-red vd_red removebutton" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom" onclick="delete_file_row('<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
')"><i class="fa fa-trash-o"></i></button>
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
                                        <div class="dropzone panel-body input-border">
                                            <div class="alert alert-danger alert-dismissable alert-condensed">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                            </div>
                                        </div>  
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-20">
                                    <button class="btn vd_bg-red vd_white page_reload" type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                                    <button class="btn menu-icon vd_bg-green vd_white" id="submit-all"><span class="menu-icon"><i class="fa fa-fw fa-upload"></i></span> Upload</button>
                                </div>
                            </div>

                        </div>
                    </div>  
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['edit_access_rights']->value) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/edit_access_rights.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_meeting_dept_approve_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestreviewdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequestreviewdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body"> 
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">MEETING | REQUEST DEPARTMENT APPROVAL FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-2 pd-0">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"req_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="decide_meeting_cft_dept_app">
                                                        <option value="">Select</option>
                                                        <option value="meeeting_schedule" <?php if (!$_smarty_tpl->tpl_vars['show_meeting_option']->value) {?>disabled<?php }?>>Schedule Meeting</option>
                                                        <option value="request_dept_approve" <?php if ($_smarty_tpl->tpl_vars['show_meeting_option']->value) {?>disabled<?php }?>>Department Approval</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mgtp-5 decide_meeting_cft_dept_app" style="display: none;" id="meeeting_schedule">
                                    <form name="meeting_schedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="meeting_schedule-form" autocomplete="off">
                                        <div class="panel-body panel-bd-left">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-3 pd-0">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"meeting_date"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <input type="text" class="generate_datepicker" name="meeting_date" title="Select Valid Meeting Date" data-datepicker_min=0>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"meeting_time"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <input type="text" class="generate_timepicker" name="meeting_time"  title="Select Valid Meeting Time">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"venue"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <input type="text"  name="meeting_venue" placeholder="(e.g.) Meeting hall" title="Enter Valid Venue">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 verfiy_parent">
                                                    <div class="col-md-12 pd-0">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"online_meeting_link"),$_smarty_tpl);?>
</label>
                                                        <div  class="controls"><textarea name="meeting_link" class="verify_link"></textarea></div>
                                                        <div  class="controls font-semibold verify_div" style="display:none;">Verify Link : <a class="vd_blue verify_tag" target="_blank"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-3 pd-0">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                        <div class="controls">
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#department');" title="Select Valid Plant">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                        <div class="controls">
                                                            <select name="department" id="department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#participant_from_users', 'multiselect', '<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->created_by;?>
');" title="Select Valid Department">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"schedule_to"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div class="control row mgbt-md-0">
                                                        <div class="col-md-3">
                                                            <select name="participant_from[]" id="participant_from_users" class="participant_users form-control generate_multiselect" size="7" multiple="multiple"></select>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <br>
                                                            <button type="button" id="participant_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                            <button type="button" id="participant_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                            <button type="button" id="participant_from_users_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                            <button type="button" id="participant_from_users_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select name="participants[]" id="participant_from_users_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-heading bordered vd_bg-blue mgtp-5">
                                            <h3 class="panel-title vd_white font-semibold">MEETING AGENDA FORM</h3>
                                        </div>
                                        <div class="panel-body panel-bd-left">
                                            <div class="form-group mgbt-md-0">
                                                <div class="mgbt-xs-0 text-left mgtp-0" >
                                                    <div class="col-md-12">
                                                        <button class="btn vd_bg-green vd_white" type="button" onclick="add_element('.meeting_agenda_child_ele', '.meeting_agenda_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                    </div>
                                                </div>
                                                <div class="meeting_agenda_parent_ele">
                                                    <div class="meeting_agenda_child_ele">
                                                        <div class="mgtp-10 col-md-12">
                                                            <div  class="controls">
                                                                <div class="input-group">
                                                                    <textarea  rows="2" name="meeting_agenda[]"  class="required meeting_agenda" required placeholder="Enter Meeting Agenda" title="Enter Valid Agenda"></textarea>
                                                                    <span class="menu-icon input-group-addon btn vd_bg-red vd_white mgtp-5 delete_ele" data-delete_ele=".meeting_agenda_child_ele"><i class="fa fa-trash-o"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body panel-bd-left mgtp-5">
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="meeting_scheduled">
                                                <input type="hidden" name="audit_trail_action" value="Meeting Schedule">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="meeting_scheduled"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Schedule</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-body panel-bd-left mgtp-5 decide_meeting_cft_dept_app" style="display: none;" id="request_cft">
                                    <!-- Request Pre Review Form -->
                                    <form name="request_cft_assessment-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="request_cft_assessment-form" autocomplete="off">

                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                <div class="controls">
                                                    <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#cft_drop');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                            <div class="col-md-4 mgl-10">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                <div class="controls">
                                                    <select name="department" id="cft_drop"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#cft_users', 'multiselect');" title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                <div class="controls">
                                                    <div class="col-md-3 pd-0">
                                                        <select name="cft_users_from[]" id="cft_users" class="generate_multiselect form-control" size="7" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <br>
                                                        <button type="button" id="cft_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="cft_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="cft_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="cft_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-md-3 pd-0">
                                                        <select name="cft_users_to[]" id="cft_users_to"  class="form-control" size="7" multiple="multiple"  title="Select Valid User Name"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-7">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly provide your comments" rows="2" class="required" name="wf_remarks" id="wf_remarks" required  title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="request_cft_assessment">
                                            <input type="hidden" name="audit_trail_action" value="Send To CFT Assessment">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="request_cft_assessment"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Send</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-body panel-bd-left mgtp-5 decide_meeting_cft_dept_app" id="request_dept_approve" style="display: none;">
                                    <form name="request_dept_approve-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
"  class="form-horizontal" role="form" id="request_dept_approve-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#dept_approve_drop');" title="Select Valid Plant">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                                <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department" id="dept_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'dept_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls ">
                                                    <select name="dept_approve_user" id="userid" required title="Select Valid User Name">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly verify the deviation and approve" rows="3" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="audit_trail_action" value="Send To Dept Approval">
                                            <input type="hidden" name="request_dept_approval">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="request_dept_approval"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_meeting_schedule_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_meeting_reschedule_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseMeetingReSchedule"> Meeting Reschedule <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseMeetingReSchedule" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">MEETING RESHEDULE FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">
                                        <!-- Meeting Reschedule Form -->
                                        <form name="meeting_reschedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="meeting_reschedule-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"meeting_date"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <input type=text class="generate_datepicker" name="rmeeting_date" id="rmeeting_date"  title="Select Valid Meeting Date" data-datepicker_min=0  value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_date'];?>
">
                                                    </div>
                                                    <div id="rexist_error_meeting_date_message"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"meeting_time"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <input type=text class="generate_timepicker" name="rmeeting_time" id="rmeeting_time" placeholder="HH:MM" title="Select Valid Meeting Time" value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_time'];?>
">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"venue"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <input type=text  name="rvenue" id="rvenue" placeholder="(e.g.) Meeting hall" title="Enter Venue" value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['venue'];?>
">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 verfiy_parent">
                                                    <div class="col-md-12 pd-0">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"online_meeting_link"),$_smarty_tpl);?>
</label>
                                                        <div  class="controls"><textarea name="rmeeting_link" class="verify_link"><?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'];?>
</textarea></div>
                                                        <div class="controls font-semibold verify_div" <?php if (empty($_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'])) {?> style="display:none" <?php }?>>Verify Link : <a class="vd_blue verify_tag" target="_blank" href=<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'];?>
><?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'];?>
</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Enter valid reason" rows="3"  name="resched_reason" id="resched_reason" rows="2" required title="Enter Valid Reason"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="meeting_id" value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['object_id'];?>
">
                                                <input type="hidden" name="meeting_rescheduled">
                                                <input type="hidden" name="audit_trail_action" value="Meeting Reschedule">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="meeting_rescheduled"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Re Schedule</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['update_meeting_attendees_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseMeetingUpdate"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseMeetingUpdate" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">UPDATE MEETING ATTENDANCE AND CONCLUSION FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">                                                               
                                        <div class="form-group col-md-12 row mgbt-md-0">
                                            <div class="col-md-3 row">
                                                <label class="control-label">Update Meeting Status <span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <select class="show_hide_ele set_area_height" required title="Select Valid Option" data-hide_forms="update_meeting">
                                                        <option value="">Select</option>
                                                        <option value="update_meeting_attendees-form">Update Attendees</option>
                                                        <option value="update_meeting_conclusion-form" <?php if ($_smarty_tpl->tpl_vars['disable_meeting_completion_option']->value) {?> disabled <?php }?>>Meeting Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <form name="update_meeting_attendees-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal update_meeting" role="form" id="update_meeting_attendees-form" autocomplete="off" style="display:none">
                                            <div class="form-group mgbt-md-0">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"attendees"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                    <div class="controls row">
                                                        <div class="col-md-5">
                                                            <select id="attendee_from_users" class="attendee_users form-control generate_multiselect" size="15" multiple="multiple">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_participant_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['participant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['participant'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
] - [<?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
]</option>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <br><br><br><br>
                                                            <button type="button" id="attendee_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                            <button type="button" id="attendee_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                            <button type="button" id="attendee_from_users_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                            <button type="button" id="attendee_from_users_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <select name="attendee[]" id="attendee_from_users_to" class="form-control" size="15" multiple="multiple" title="Select valid user"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                            
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="meeting_id" value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['object_id'];?>
">
                                                <input type="hidden" name="update_meet_attn_button">
                                                <input type="hidden" name="audit_trail_action" value="Meeting Attendence">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="update_meet_attn_button"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                            </div>
                                        </form>
                                        <form name="update_meeting_conclusion-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal update_meeting" role="form" id="update_meeting_conclusion-form" autocomplete="off" style="display:none">       
                                            <div class="form-group mgbt-md-0">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div>
                                                                <table class="table table-bordered table-striped" title="Meeting Conclusion">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><?php echo template_get_attribute_name(array('module'=>'ccm','attribute'=>"meeting_agenda"),$_smarty_tpl);?>
</th>
                                                                            <th> <?php echo template_get_attribute_name(array('module'=>'ccm','attribute'=>"meeting_conclusion"),$_smarty_tpl);?>
</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_agenda_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <tr>
                                                                                <td class="col-md-6"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" name="meeting_agenda_id[]"></td>
                                                                                <td class="col-md-6"><textarea name="meeting_conclusion[]" class="required" required placeholder="Enter Meeting Conclusion" title="Enter Meeting Conclusion"></textarea></td>
                                                                            </tr>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="meeting_id" value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['object_id'];?>
">
                                                        <input type="hidden"  name="meeting_completed">
                                                        <input type="hidden" name="audit_trail_action" value="Update Meeting Conclusion">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="meeting_completed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Complete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_dept_approve_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">     
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">DEPARTMENT APPROVAL FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <div class="alert alert-danger vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 row">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approval_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                            <div class="controls">
                                                <select class="show_hide_ele" name="select_dept_approve" id="select_dept_approve" required title="Select Valid Review Type" data-hide_forms="dept_approval">
                                                    <option value="">Select</option>
                                                    <option value="dept_approve_div">Approve</option>
                                                    <option value="dept_approve_need_correction_div">Needs Correction</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dept_approval" id="dept_approve_div" style="display:none;">
                                    <form name="dept_approve-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="dept_approve-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">                                           
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="(e.g.) Deviation has been verified and approved or Given my suggestion, kindly make the changes and send to me again for verification" rows="4" class="required" name="review_comments" id="review_comments" required title="Enter Valid Comments"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="Department Approval">
                                                    <input type="hidden" name="dept_approved" >
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="dept_approved"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Approve</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="dept_approval" id="dept_approve_need_correction_div" style="display:none;">
                                    <form name="dept_approve_correction-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="dept_approve_correction-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="(e.g.) Deviation has been verified and approved or Given my suggestion, kindly make the changes and send to me again for verification" rows="4" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="dept_approve_need_correction">
                                                    <input type="hidden" name="audit_trail_action" value="Department Approval">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  id="dept_approve_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span> Needs Correction</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_dept_head_approve_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_qa_review_btn']->value)) {?>
                <div class="panel panel-default btn_ck">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowApprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseShowApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">REQUEST QA REVIEW FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <form name="request_qa_review-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
"  class="form-horizontal" role="form" id="request_qa_review-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#qa_review_drop');" title="Select Valid Plant">
                                                            <option value="">Select</option>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                                    <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="control">
                                                        <select name="department" id="qa_review_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'qa_review', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls ">
                                                        <select name="qa_review_user" id="userid" required title="Select Valid User Name">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Kindly verify the deviation and approve" rows="3" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Send To QA Review">
                                                <input type="hidden" name="request_qa_review">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="request_qa_review"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_qa_review_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">   
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QA REVIEW FORM</h3>
                                </div>
                                <div class="panel widget light-widget">
                                    <div class="panel-body panel widget panel-bd-left light-widget">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3 row">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" name="select_qa_review" required title="Select Valid Review Type" data-hide_forms="qa_review_div">
                                                        <option value="">Select</option>
                                                        <option value="qa_review_div">Review</option>
                                                        <option value="qa_review_need_correction_div">Needs Correction</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel widget light-widget qa_review_div" id="qa_review_div" style="display:none;">
                                        <form name="qa_review-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="qa_review-form" autocomplete="off">
                                            <div class="panel-bd-left">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div id="first-name-input-wrapper" class="controls  ">
                                                                <textarea placeholder="(e.g.) Reviewed" rows="4" class="required" name="qa_review_comments" id="qa_review_comments" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                            </div>    
                                            <div class="light-widget">
                                                <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                            </div>
                                            <div class="panel widget panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="qa_reviewed">
                                                        <input type="hidden" name="audit_trail_action" value="QA review">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="qa_reviewed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="panel widget light-widget qa_review_div" id="qa_review_need_correction_div" style="display:none;">
                                        <form name="qa_review_need_correction-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="qa_review_need_correction-form" autocomplete="off">
                                            <div class="panel-bd-left">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div id="first-name-input-wrapper" class="controls  ">
                                                                <textarea placeholder="(e.g.) Kindly provide your comments" rows="4" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </div>    
                                            </div>    
                                            <div class="light-widget">
                                                <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                            </div>
                                            <div class="panel widget panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="qa_review_need_correction">
                                                        <input type="hidden" name="audit_trail_action" value="QA review">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="qa_review_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span>Needs Correction</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>               
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_qa_reviewer_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_qa_approve_btn']->value)) {?>
                <div class="panel panel-default btn_ck">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowApprove"> Action </a> </h4>
                    </div>
                    <div id="collapseShowApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">REQUEST QA APPROVAL FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <form name="request_qa_approval-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
"  class="form-horizontal" role="form" id="request_qa_approval-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#qa_approve_drop');" title="Select Valid Plant">
                                                            <option value="">Select</option>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                                    <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="control">
                                                        <select name="department" id="qa_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'qa_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls ">
                                                        <select name="qa_approver_user" id="userid" requiredtitle="Select Valid User Name">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Kindly verify the deviation and approve" rows="3" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Send To QA Approval">
                                                <input type="hidden" name="request_qa_approval">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="request_qa_approval"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_qa_approve_button']->value)) {?>
                <div class="panel panel-default btn_ck">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseShowApprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseShowApprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">QA APPROVAL FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
</label>
                                            <table class="table table-striped table-hover table table-bordered vd_hover">
                                                <thead style="white-space:nowrap">
                                                    <tr>
                                                    <tr>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_stage"),$_smarty_tpl);?>
</th>

                                                    </tr>
                                                    </tr>
                                                </thead>
                                                <tbody class="input-border">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['review_comments']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                                                            <td>
                                                                <span class="label label-default">
                                                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['review_stage'];?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="alert alert-info mgbt-md-0"> 
                                            <div class="vd_checkbox checkbox-success">
                                                <input type="checkbox" id="qa_comments_check_box">
                                                <label for="qa_comments_check_box"> I have read all review comments </label>
                                            </div>
                                        </div>
                                        <div class="form-group row qa_approval_drop mgtp-10" style="display:none">
                                            <div class="col-md-2">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approve_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="qa_approve_type">
                                                        <option value="">Select</option>
                                                        <option value="qa_approval_need_correction_div">Needs Correction</option>
                                                        <option value="qa_pre_approval_div" <?php if ($_smarty_tpl->tpl_vars['disable_pre_approve_btn']->value) {?>disabled<?php }?>>Pre Approval</option>
                                                        <option value="qa_accepted_div">Accepted</option>
                                                        <option value="qa_rejected_div">Rejected</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="qa_approve_type" style="display:none" id="qa_approval_need_correction_div">
                                    <form name="qa_approval_need_correction-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="qa_approval_need_correction-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="col-md-12 row mgbt-md-0">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="(e.g.) Verified and Approved / Rejected" rows="3" class="" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="QA Approval">
                                                    <input type="hidden" name="qa_approval_need_correction">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="qa_approval_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span> Needs Correction</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="qa_approve_type" style="display:none" id="qa_pre_approval_div">
                                    <div class="panel-heading bordered vd_bg-blue mgtp-5">
                                        <h3 class="panel-title vd_white font-semibold">REQUEST PRE APPROVAL FORM</h3>
                                    </div>
                                    <form name="request_pre_approve-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="request_pre_approve-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                        <div class="controls">
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#pre_approve_drop');" title="Select Valid Plant">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                                    <div class="col-md-4">
                                                        <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                        <div class="control">
                                                            <select name="department" id="pre_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'pre_approve', this.options[this.selectedIndex].value, '#pre_approval_from_users', 'multiselect');"  title="Select Valid Department">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                        <div class="controls">
                                                            <div class="col-md-3 pd-0">
                                                                <select name="pre_approval_from[]" id="pre_approval_from_users" class="generate_multiselect form-control" size="7" multiple="multiple"></select>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <br>
                                                                <button type="button" id="pre_approval_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                <button type="button" id="pre_approval_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                <button type="button" id="pre_approval_from_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                                <button type="button" id="pre_approval_from_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                            </div>
                                                            <div class="col-md-3 pd-0">
                                                                <select name="pre_approval_to[]" id="pre_approval_from_users_to"  class="form-control" size="7" multiple="multiple"  required title="Select Valid User Name"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-7">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <textarea placeholder="Send the request for pre-approval to the relevant individuals, such as the site head, corporate QA, or other necessary pre-approval authorities." rows="3" class="" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="Send To Pre Approval">
                                                    <input type="hidden" name="request_pre_approve">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="request_pre_approve"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="qa_approve_type" style="display:none" id="qa_accepted_div">
                                    <form name="qa_accepted-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="qa_accepted-form" autocomplete="off">
                                        <div class="panel widget light-widget">
                                            <div class="panel-body panel-bd-left">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2">
                                                        <div class="form-label font-semibold"></div>
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'doc_name'),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="input-border pd-10 col-md-12"><?php echo $_smarty_tpl->tpl_vars['source_doc_no']->value['source_doc_link'];?>
</div>
                                                    </div>
                                                    <div class="col-md-2 pd-0 date_diff">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"implementation_target_date"),$_smarty_tpl);?>
<span class="vd_red">*</span> <span class="date_diff_days font-semibold label label-danger"></span></label>
                                                        <div class="controls">
                                                            <input type=text id="implementation_target_date" class="generate_datepicker show_date_diff" data-datepicker_min="0"  name="ucapa_task_target_date"  placeholder="DD/MM/YYYY" title="Select Valid Target Date" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 date_diff">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"closeout_target_date"),$_smarty_tpl);?>
<span class="vd_red">*</span> <span class="date_diff_days target_days font-semibold label label-danger"></span></label>
                                                        <div class="controls">
                                                            <input type=text id="close_out_target_date" class="generate_datepicker show_date_diff" data-datepicker_min="0"  name="ucapa_closeout_target_date"  placeholder="DD/MM/YYYY" title="Select Valid Target Date" disabled readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'reason'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <textarea placeholder="Enter Reason" rows="4" name="ucapa_reason" required="" title="Enter Valid Reason" <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->trigger_type == 'e-trigger') {?>readonly disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->reason;?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'pd_nc'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <textarea placeholder="Enter description" rows="4" name="ucapa_present_system" required="" title="Enter Valid Present Discrepancy | Non-Conformity"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->present_system;?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'corrections'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <textarea placeholder="Enter Reason" rows="4" name="ucapa_immed_action" required="" title="Enter Valid Reason"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->immed_action_taken;?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group pd-15 mgbt-md-0">
                                                    <!-- Start of Corrective Actions -->
                                                    <table class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"corrective_action"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"responsible_person"),$_smarty_tpl);?>
</th>                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>
                                                                    <tr>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_plant'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_dept'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                                    </tr>
                                                                <?php }?>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </tbody>
                                                    </table> 
                                                    <!-- End of Corrective Actions -->
                                                    <!-- Start of Preventive Actions -->
                                                    <table class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"preventive_action"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"responsible_person"),$_smarty_tpl);?>
</th>                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'pa') {?>
                                                                    <tr>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_plant'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_dept'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                                    </tr>
                                                                <?php }?>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </tbody>
                                                    </table> 
                                                    <!-- End of Preventive Actions -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="QA Approval">
                                                    <input type="hidden" name="qa_accepted">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="qa_accepeted"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="qa_approve_type" style="display:none"  id="qa_rejected_div">
                                    <form name="qa_rejected-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="qa_rejected-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget ">
                                            <div class="panel-body">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="col-md-12 row mgbt-md-0">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"rejected_reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="Enter reason for rejection" rows="3" name="ucapa_reject_reason" title="Enter Valid Reason"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="QA Approval">
                                                    <input type="hidden" name="qa_rejected">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="qa_rejected"><span class="menu-icon"><i class="fa fa-fw fa-times"></i></span> Reject</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_qa_approver_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_pre_approve_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_pre_approve_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">     
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PRE APPROVAL FORM</h3>
                                </div>
                                <div class="light-widget">
                                    <div class="alert alert-danger vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                    </div>
                                    <form name="pre_approve-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="pre_approve-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="Enter Valid Comments" rows="4" class="required" name="pre_approve_comments" id="pre_approve_comments" required title="Enter Valid Comments"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="light-widget">
                                            <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                        </div>
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="Pre Approval">
                                                    <input type="hidden" name="pre_approved" >
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="pre_approved"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Pre-Approve</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['add_more_task_tab']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseenablemom"> Add More Task <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseenablemom" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ADD MORE TASK FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <form name="add_more_task-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_more_task-form" autocomplete="off">
                                        <div class="panel-body">
                                            <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                <div class="row mgbt-md-0">
                                                    <div class="col-md-12 font-semibold">
                                                        <button class="btn vd_bg-green vd_white add_more_task_id" type="button" onclick="add_element('.add_task_child_ele', '.add_task_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mgbt-md-0">
                                                <div class="col-sm-12">
                                                    <table class="table table-bordered mgbt-md-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_details"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="vd_bg-grey vd_white"><td colspan="4">Assigned Task Details</td></tr>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_status_pri'];?>
</td>
                                                                </tr>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            <tr class="vd_bg-grey vd_white"><td colspan="4">Add More Task Details</td></tr>
                                                        </tbody>
                                                        <tbody class="add_task_parent_ele">
                                                            <tr class="add_task_child_ele">
                                                                <td><input type="text" class="task_id" name="task_id[]" readonly value="T<?php echo count($_smarty_tpl->tpl_vars['capa_task_list']->value)+1;?>
"></td>
                                                                <td>
                                                                    <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"></textarea>
                                                                </td>
                                                                <td class="pd-5">
                                                                    <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'td', '#task_department'));" title="Select Valid Plant">
                                                                        <option value="">Company</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
</option>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </select>
                                                                    <select class="mgtp-5" id="task_department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.add_task_child_ele', '.task_pri_resp_per'), null);" title="Select Valid Department">
                                                                        <option value="">Department</option>
                                                                    </select>
                                                                    <select class="mgtp-5 task_pri_resp_per" name="pri_per_id[]" title="Select Valid User Name">
                                                                        <option value="">Responsible Person</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <button class="btn menu-icon vd_bd-red vd_red delete_more_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" class="old_task_count" value="<?php echo count($_smarty_tpl->tpl_vars['capa_task_list']->value);?>
">
                                                </div>
                                            </div>
                                            <div class="alert alert-warning pd-10 input-border">
                                                <div class="row mgbt-md-0">
                                                    <div class="col-md-12 font-semibold">
                                                        <button class="btn vd_bg-green vd_white add_more_task_id" type="button" onclick="add_element('.add_task_child_ele', '.add_task_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-info"> 
                                                <div class="vd_checkbox checkbox-success">
                                                    <input type="checkbox" id="assign_more_task_check_box">
                                                    <label for="assign_more_task_check_box"> I have ensured that all the tasks created are correct, and the selected assignees(Primary Persons) are the right persons for the task.</label>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                                <input type="hidden" name="audit_trail_action" value="Add More Task Details">
                                                <input type="hidden" name="add_more_task">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="add_more_task" disabled><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_task_pri_per_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['task_assign_to_sec_per_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_assign_sec_per"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_assign_sec_per" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN TASK TO SECONDARY RESPONSIBLE PERSON FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <form name="assign_sec_res_per-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="assign_sec_res_per-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="panel-body pd-0">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead style="white-space:nowrap;">
                                                    <tr>
                                                        <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"my_self"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-5"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['task_to_sec_res_person']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr>
                                                            <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td>
                                                                <div class="vd_checkbox checkbox-danger">
                                                                    <input type="checkbox" class="myself" name="sec_per_id[]" value="<?php echo $_smarty_tpl->tpl_vars['my_self']->value;?>
" id="task_myself_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                                                    <label class="width-100" for="task_myself_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-md-4 pdlr-10">
                                                                    <select class="assign_others" name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'tr', '.department'));" title="Select Valid Plant">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
</option>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 pdlr-10">
                                                                    <select class="department assign_others" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, 'tr', '.task_sec_resp_per'), null, '<?php echo $_smarty_tpl->tpl_vars['my_self']->value;?>
');" title="Select Valid Department">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4 pdlr-10">
                                                                    <select class="task_sec_resp_per assign_others" name="sec_per_id[]"  title="Select Valid Person">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                            <input type="hidden" name="audit_trail_action" value="Assign to Secondary Responsible Person">
                                            <input type="hidden" name="assign_task_to_sec_per">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="assign_task_to_sec_per"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_task_sec_per_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_replace_task_sec"> Add | Recall | Replace  <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_replace_task_sec" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">TASK SECONDARY RESPONSIBLE PERSON</h3>
                                </div>
                                <div class="panel-body">
                                    <form name="recall_replace_task_sec-from" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="recall_replace_task_sec-from" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th rowspan='2'>
                                                        <div class="vd_checkbox checkbox-danger">
                                                            <input type="checkbox" class="select_all_sec" value="1" id="replacemnt_select_all_sec">
                                                            <label class="width-100" for="replacemnt_select_all_sec"></label>
                                                        </div>
                                                    </th>
                                                    <th class="text-center" colspan="4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"recall_user"),$_smarty_tpl);?>
</th>
                                                    <th class="text-center" colspan="3"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"replaced_by"),$_smarty_tpl);?>
</th>
                                                </tr>
                                                <tr>
                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"recall_user"),$_smarty_tpl);?>
</th>
                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"replaced_by"),$_smarty_tpl);?>
</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recall_sec_pending_users_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <tr>
                                                        <td> 
                                                            <div class="vd_checkbox checkbox-danger">
                                                                <input type="checkbox" name="replacement_pending_user[]" class="recall_checbox_sec" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sec_per_id'];?>
" id="replacemnt_checkbox_sec_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" title="Select Atleast One User">
                                                                <label class="width-100" for="replacemnt_checkbox_sec_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></label>
                                                            </div>
                                                        </td>
                                                        <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
<button class="btn btn-default show_task_history pd-0 mgl-10" type="button" data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history" data-original-title="Show Task History" data-toggle="tooltip" data-placement="bottom"></i></button></td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sec_per_plant'];?>
<input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"  class="recall_task_object_id" disabled></td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sec_per_dept'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['sec_per_name'];?>
</td>
                                                        <td> 
                                                            <select name="plant[]" class="recall_ed" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'tr', '.department'));" title="Select Valid Plant" disabled>
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
</option>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select  name="department[]" class="department recall_ed" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, 'tr', '.replacement_user'), null, '');" title="Select Valid Department" disabled>
                                                                <option value="">Select</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select  name="replacement_user[]" class="replacement_user recall_ed" title="Select Valid User" data-dupliate_field="replacement_user" data-duplicate_msg="Cannot Assign Same Person" disabled><option value="" >Select</option> </select>
                                                        </td>
                                                    </tr>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="recall_reason" id="recall_reason" required title="Enter Valid Reason"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="recall_replace_sec">
                                            <input type="hidden" name="audit_trail_action" value="Recall - Secondary Person - Replace User">
                                            <button class="btn vd_bg-green vd_white" type="submit"  id="recall_replace_sec"> <span class="menu-icon"><i class="fa fa-fw fa-exchange"></i></span> Replace</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['sec_per_task_update_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_task_sec_per"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_task_sec_per" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">SECONDARY PERSON TASK UPDATE FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <form name="task_sec_per-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="task_sec_per-form" autocomplete="off" enctype="multipart/form-data">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="panel-body pd-0">
                                            <table class="table table-bordered">
                                                <thead class="vd_bg-dark-blue vd_white ">
                                                    <tr>
                                                        <th class="pdlr-10"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"assigned_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sec_per_pending_task_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr class="bg-<?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>info<?php } else { ?>warning<?php }?>">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];
if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'pri_per_needs_correction') {?><i class="fa fa-fw fa-arrow-right vd_red vd_hover" data-original-title="Task Needs Correction" data-toggle="tooltip" data-placement="bottom"></i><?php } else { ?><i class="fa fa-fw fa-arrow-right vd_green vd_hover" data-original-title="New Task" data-toggle="tooltip" data-placement="bottom"></i><?php }?></td>
                                                            <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
                                                        </tr>
                                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];
$_prefixVariable5=ob_get_clean();
if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'pri_per_needs_correction' && $_prefixVariable5) {?>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_date'];?>

                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_pri_count']) {?>
                                                                            <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-type="task_pri_per"  data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
">
                                                                                    <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
</span>
                                                                                </span>
                                                                            </span>
                                                                        <?php }?>
                                                                        <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td colspan="5">
                                                                <textarea rows="4" class="sec_per_task_comments" name="sec_per_task_comments[]" title="Enter Valid Comments" placeholder="Task Comments"><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>
</textarea>
                                                                <div class="col-md-6 pd-0" >
                                                                    <input type="file" name="file[<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
][]" multiple class="pd-5">
                                                                </div>
                                                                <div class="col-md-2 btn-group pd-0" >
                                                                    <button  class="btn btn-default pdlr-10 width-100 show_task_attachments" type="button"  data-target="#modal_task_attachment" data-toggle="modal" id="sec_per_task_files_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-can_delete=true data-towards="task_sec_per"><i class="append-icon glyphicon glyphicon-paperclip"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
</span></button>
                                                                </div>
                                                                <button  class="btn btn-default col-md-2 show_task_history" type="button"  data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history"></i>History</button>
                                                                <div class="col-md-2 pd-0">
                                                                    <select class="select_task_status" name="sec_per_task_status[]"  title="Select Valid Status">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                            <input type="hidden" name="audit_trail_action" value="Update Task - Secondary Person">
                                            <input type="hidden" name="sec_per_task_update_submit">
                                            <button class="btn vd_bg-green vd_white" name="submit" type="submit" id="sec_per_task_update_submit"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['pri_per_task_update_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_task_pri_per"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_task_pri_per" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PRIMARY PERSON TASK UPDATE FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <form name="task_pri_per-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="task_pri_per-form" autocomplete="off" enctype="multipart/form-data">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="panel-body pd-0">
                                            <table class="table table-bordered">
                                                <thead class="vd_bg-dark-blue vd_white ">
                                                    <tr>
                                                        <th class="pdlr-10"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sent_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pri_per_pending_task_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr class="bg-<?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>info<?php } else { ?>warning<?php }?>">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'creator_needs_correction') {
echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
<i class="fa fa-fw fa-arrow-right vd_red vd_hover" data-original-title="Task Needs Correction" data-toggle="tooltip" data-placement="bottom"></i><?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['sec_per_name'];?>
<i class="fa fa-fw fa-arrow-right vd_green vd_hover" data-original-title="Task To be Reviewed" data-toggle="tooltip" data-placement="bottom"></i><?php }?></td>
                                                            <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'creator_needs_correction') {?>
                                                                    <!--Show Creator Comments -->
                                                                    <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['created_date'];?>

                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_creator_count']) {?>
                                                                            <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-can_delete=true data-towards="task_creator">
                                                                                    <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
</span>
                                                                                </span>
                                                                            </span>
                                                                        <?php }?>
                                                                        <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>

                                                                    </div>
                                                                <?php } else { ?>
                                                                    <!--Show Secondary Person Comments -->
                                                                    <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_date'];?>

                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_sec_count']) {?>
                                                                            <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-can_delete=true data-towards="task_sec_per">
                                                                                    <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
</span>
                                                                                </span>
                                                                            </span>
                                                                        <?php }?>
                                                                        <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

                                                                    </div>
                                                                <?php }?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <textarea rows="4" class="pri_per_task_comments" name="pri_per_task_comments[]" title="Enter Valid Comments" placeholder="Task Comments"><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>
</textarea>
                                                                <div class="col-md-6 pd-0" >
                                                                    <input type="file" name="file[<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
][]" multiple class="pd-5">
                                                                </div>
                                                                <div class="col-md-2 btn-group pd-0" >
                                                                    <button  class="btn btn-default pdlr-10 width-100 show_task_attachments" type="button"  data-target="#modal_task_attachment" data-toggle="modal" id="sec_per_task_files_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-can_delete=true data-towards="task_pri_per"><i class="append-icon glyphicon glyphicon-paperclip"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
</span></button>
                                                                </div>
                                                                <button  class="btn btn-default col-md-2 show_task_history" type="button"  data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history"></i>History</button>
                                                                <div class="col-md-2 pd-0">
                                                                    <select class="select_task_status" name="pri_per_task_status[]"  title="Select Valid Status">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="needs_correction">Needs Correction [Send to Secondary Person]</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                            <input type="hidden" name="audit_trail_action" value="Update Task - Primary Person">
                                            <input type="hidden" name="pri_per_task_update_submit">
                                            <button class="btn vd_bg-green vd_white" name="submit" type="submit" id="pri_per_task_update_submit"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['creator_task_update_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_task_verification"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_task_verification" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">TASK VERIFICATION FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <form name="task_verification-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="task_verification-form" autocomplete="off" enctype="multipart/form-data">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="panel-body pd-0">
                                            <table class="table table-bordered">
                                                <thead class="vd_bg-dark-blue vd_white ">
                                                    <tr>
                                                        <th class="pdlr-10"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sent_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['creator_pending_task_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr class="bg-<?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>info<?php } else { ?>warning<?php }?>">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'dept_head_needs_correction') {
echo $_smarty_tpl->tpl_vars['dept_head_name']->value;?>
<i class="fa fa-fw fa-arrow-right vd_red vd_hover" data-original-title="Task Needs Correction" data-toggle="tooltip" data-placement="bottom"></i><?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
<i class="fa fa-fw fa-arrow-right vd_green vd_hover" data-original-title="Task To be Reviewed" data-toggle="tooltip" data-placement="bottom"></i><?php }?></td>
                                                            <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
                                                        </tr>
                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] != 'dept_head_needs_correction') {?>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_date'];?>

                                                                        <i class="append-icon fa fa-fw fa-user mgl-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['sec_per_name'];?>
 - Secodary Person
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_sec_count']) {?>
                                                                            <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-towards="task_sec_per">
                                                                                    <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
</span>
                                                                                </span>
                                                                            </span>
                                                                        <?php }?>
                                                                        <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

                                                                    </div>
                                                                    <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_date'];?>

                                                                        <i class="append-icon fa fa-fw fa-user mgl-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
  - Primary Person
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_pri_count']) {?>
                                                                            <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-towards="task_pri_per">
                                                                                    <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
</span>
                                                                                </span>
                                                                            </span>
                                                                        <?php }?>
                                                                        <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['created_date'];?>

                                                                        <i class="append-icon fa fa-fw fa-user mgl-10"></i><?php echo $_smarty_tpl->tpl_vars['dept_head_name']->value;?>

                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head_count']) {?>
                                                                            <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-towards="task_dept_head">
                                                                                    <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head']);?>
</span>
                                                                                </span>
                                                                            </span>
                                                                        <?php }?>
                                                                        <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <tr>
                                                            <td colspan="5">
                                                                <textarea rows="4" class="task_review_comments" name="task_review_comments[]" title="Enter Valid Comments" placeholder="Task Comments"><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>
</textarea>
                                                                <div class="col-md-6 pd-0" >
                                                                    <input type="file" name="file[<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
][]" multiple class="pd-5">
                                                                </div>
                                                                <div class="col-md-2 btn-group pd-0" >
                                                                    <button  class="btn btn-default pdlr-10 width-100 show_task_attachments" type="button"  data-target="#modal_task_attachment" data-toggle="modal" id="sec_per_task_files_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-towards="task_creator" data-can_delete=true><i class="append-icon glyphicon glyphicon-paperclip"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
</span></button>
                                                                </div>
                                                                <button  class="btn btn-default col-md-2 show_task_history" type="button"  data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history"></i>History</button>
                                                                <div class="col-md-2 pd-0">
                                                                    <select class="select_task_status" name="task_review_status[]"  title="Select Valid Status">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="needs_correction">Needs Correction [Send to Primary Person]</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                            <input type="hidden" name="audit_trail_action" value="Update Task Verification">
                                            <input type="hidden" name="creator_task_update_submit">
                                            <button class="btn vd_bg-green vd_white" name="submit" type="submit" id="creator_task_update_submit"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['dept_head_task_update_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_task_dept_head_review"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_task_dept_head_review" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">DEPARTMENT HEAD TASK REVIEW FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <form name="task_dept_head_review-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="task_dept_head_review-form" autocomplete="off" enctype="multipart/form-data">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="panel-body pd-0">
                                            <table class="table table-bordered">
                                                <thead class="vd_bg-dark-blue vd_white ">
                                                    <tr>
                                                        <th class="pdlr-10"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sent_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dept_head_pending_task_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr class="bg-<?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>info<?php } else { ?>warning<?php }?>">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="input-border dropzone unset_min_height pd-10 mgbt-md-10">
                                                                    <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['created_date'];?>

                                                                    <i class="append-icon fa fa-fw fa-user mgl-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
  - Creator
                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_creator_count']) {?>
                                                                        <span data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                            <span class="show_task_attachments pd-0 pdlr-10 mgl-10 vd_hover" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-towards="task_creator">
                                                                                <i class="fa fa-paperclip append-icon"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
</span>
                                                                            </span>
                                                                        </span>
                                                                    <?php }?>
                                                                    <br><br><i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="col-md-3 pd-5 input-border dropzone unset_min_height ">
                                                                    <label class="control-label"><i class="append-icon icon-sound"></i><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"cc_required"),$_smarty_tpl);?>
 : </label>
                                                                    <span class="vd_radio radio-success mgl-10">
                                                                        <input type="radio" name="is_cc_required[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" id="capa_cc_yes_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="yes" title="Select Is CAPA Required" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>checked<?php }?>>
                                                                        <label for="capa_cc_yes_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"> yes </label>
                                                                        <input type="radio" name="is_cc_required[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" id="capa_cc_no_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="no" title="Select Is CAPA Required" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'no') {?>checked<?php }?>>
                                                                        <label for="capa_cc_no_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"> no </label>
                                                                    </span>
                                                                </div>
                                                                <textarea rows="4" class="task_review_comments" name="task_review_comments[]" title="Enter Valid Comments" placeholder="Task Comments"><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['review_comments'];?>
</textarea>
                                                                <div class="col-md-6 pd-0" >
                                                                    <input type="file" name="file[<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
][]" multiple class="pd-5">
                                                                </div>
                                                                <div class="col-md-2 btn-group pd-0" >
                                                                    <button  class="btn btn-default pdlr-10 width-100 show_task_attachments" type="button"  data-target="#modal_task_attachment" data-toggle="modal" id="sec_per_task_files_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" data-towards="task_dept_head" data-can_delete=true><i class="append-icon glyphicon glyphicon-paperclip"></i>Attachments <span class="badge vd_bg-green"><?php echo count($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head']);?>
</span></button>
                                                                </div>
                                                                <button  class="btn btn-default col-md-2 show_task_history" type="button"  data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history"></i>History</button>
                                                                <div class="col-md-2 pd-0">
                                                                    <select class="select_task_status" name="task_review_status[]"  title="Select Valid Status">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="needs_correction">Needs Correction [Send to Creator]</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                            <input type="hidden" name="audit_trail_action" value="Update Task Department Head Review">
                                            <input type="hidden" name="dept_head_task_update_submit">
                                            <button class="btn vd_bg-green vd_white" name="submit" type="submit" id="creator_task_update_submit"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_task_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['task_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_close_out_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['close_out_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['close_out_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseChangeEffectiveness"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseChangeEffectiveness" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">CLOSE-OUT FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="close_out-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="close_out-form" autocomplete="off">
                                            <div class="form-group panel-body mgbt-md-0 pd-15">
                                                <?php if ($_smarty_tpl->tpl_vars['capa_task_list']->value) {?>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1 pd-10"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_id"),$_smarty_tpl);?>
 </th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_verification"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"dept_head_review"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td rowspan="2">
                                                                        <div class="row mgbt-md-0 pdlr-10">
                                                                            <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
<button class="btn btn-default show_task_history pd-0 mgl-10" type="button" data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history" data-original-title="Show Task History" data-toggle="tooltip" data-placement="bottom"></i></button>
                                                                        </div>
                                                                        <input type="hidden" name="task_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
">
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10 ">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_sec_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_sec']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_sec_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                    <br>
                                                                                    <i class="append-icon fa fa-fw fa-user mgtp-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_by_name'];?>

                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10 ">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_pri_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_pri']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_pri_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                    <br>
                                                                                    <i class="append-icon fa fa-fw fa-user mgtp-10"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_by_name'];?>

                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_creator_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_creator']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_creator_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['review_comments']) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['created_date'];?>

                                                                                    </div>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['attachments_creator_count']) {?>
                                                                                        <div class="col-md-2 pd-0" data-original-title="Show Attachments" data-toggle="tooltip" data-placement="bottom">
                                                                                            <span><button class="btn btn-default show_task_attachments pd-0 pdlr-10" type="button" data-target="#modal_task_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value['attachments_dept_head']);?>
' data-task_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
"><i class="fa fa-paperclip append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['attachments_dept_head_count'];?>
</button></span>
                                                                                        </div>
                                                                                    <?php }?>
                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-1 pd-0">
                                                                                        <i class="append-icon fa fa-fw <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>fa-certificate<?php } else { ?>fa-fw fa-shield<?php }?>"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <div class="input-border dropzone unset_min_height pd-10">
                                                                            <div class="row mgbt-md-0 mgl-10 pdlr-20 mgtp-5">
                                                                                <div class="form-label col-md-2 font-semibold pd-0 mgtp-5"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'cc_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                                <div class="controls col-md-1 pd-0">
                                                                                    <input type="checkbox" class="switch_unchecked" id="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="ucapa_cc[]"  data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>checked<?php }?>>
                                                                                </div>
                                                                                <div class="form-label col-md-1 font-semibold pd-0 mgtp-5" data-toggle_to="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>block<?php } else { ?>none<?php }?>;"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'dept_head'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                                <div class="controls col-md-2" data-toggle_to="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>block<?php } else { ?>none<?php }?>;">
                                                                                    <select class="cc_dept_head" name="cc_dept_head[]"  title="Select Valid Status"  data-toggle_to="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  style="display:<?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>block<?php } else { ?>none<?php }?>;">
                                                                                        <option value="">Select</option>
                                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dept_head_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</option>
                                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-label col-md-1 font-semibold mgtp-5" data-toggle_to="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>block<?php } else { ?>none<?php }?>;"><?php echo template_get_attribute_name(array('module'=>'capa','attribute'=>'reason'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                                <div class="controls col-md-4 pd-0" data-toggle_to="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>block<?php } else { ?>none<?php }?>;">
                                                                                    <input class="cc_reason" type="text" name="cc_reason[]"  title="Enter Valid Reason"  data-toggle_to="ucapa_cc_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['item']->value['is_cc_required'] == 'yes') {?>block<?php } else { ?>none<?php }?>;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </tbody>
                                                    </table>
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"qa_review"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div  class="controls">
                                                                <textarea placeholder="Task Review Comments" rows="4" name="task_close_out_review" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                                <div class="input-border panel-body pd-15">
                                                    <!--Start Monitoring Switch,Target Date -->
                                                    <div class="col-md-12 date_diff pd-0">
                                                        <div class="form-label col-md-2 font-semibold pd-0"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'monitoring_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-1 pd-0">
                                                            <input type="checkbox" class="switch_unchecked" id="ucapa_monitoring" name="ucapa_monitoring"  data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no">
                                                        </div>
                                                        <div class="form-label col-md-1 font-semibold" data-toggle_to="ucapa_monitoring" style="display:none;"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-2" data-toggle_to="ucapa_monitoring" style="display:none;">
                                                            <input type=text class="generate_datepicker show_date_diff " data-datepicker_min="0" name="ucapa_monitoring_date" title="Select Valid Target Date">
                                                        </div>
                                                        <div class="col-md-1 pd-0 mgtp-5" data-toggle_to="ucapa_monitoring" style="display:none;">
                                                            <span class="date_diff_days font-semibold meeting_days label label-danger"></span>
                                                        </div>
                                                    </div>
                                                    <!--End Monitoring Switch,Target Date -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"closeout_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="(e.g.) Enter the Close out comments" rows="4" name="ucapa_close_out_comments" required title="Enter Valid Comments"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Update Close Out">
                                                <input type="hidden" name="close_out">
                                                <button class="btn vd_bg-green vd_white" type="submit"  id="close_out"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_monitoring_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['monitoring_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['assign_responsible_person']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_res_person"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_res_person" class="panel-collapse collapse">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <div class="vd_content-section clearfix">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">ASSIGN EFFECTIVENESS MONITORING RESPONSIBLE PERSON FORM</h3>
                                    </div>
                                    <div class="panel-body  panel-bd-left">
                                        <button class="btn vd_bg-green vd_white add_more_eff_mon" type="button" onclick="add_element('.eff_mon_child_div', '.eff_mon_parent_div');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                        <form name="assign_monitoring_resp-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="assign_monitoring_resp-form" autocomplete="off">
                                            <div class="form-group eff_mon_parent_div">
                                                <div class="eff_mon_child_div child_ele col-md-12">
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                        <div  class="controls">
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, '.eff_mon_child_div', '.department'));" title="Select Valid Plant">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ar_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
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
                                                        <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="control">
                                                            <select class="department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.eff_mon_child_div', '.res_person'));"  title="Select Valid Department">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <select class="res_person dupliate_field_val_req" name="resp_person[]" title="Select Valid User Name" data-dupliate_field="monitoring_responsible Person" data-duplicate_msg="Cannot Assign Same Person">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="control-label"></label>
                                                        <div class="controls">
                                                            <button class="btn vd_bg-red vd_white delete_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="add_responsible_person">
                                                <input type="hidden" name="audit_trail_action" value="Assign Monitoring responsible Person">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="add_responsible_person"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['enable_monitoring']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsemonitor"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapsemonitor" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">EFFECTIVENESS MONITORING FEEDBACK FORM</h3>
                                </div>
                                <div class="panel widget light-widget panel-bd-left">
                                    <div class="panel-body">
                                        <form name="effectiveness_monitoring-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="effectiveness_monitoring-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i  class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"feedback_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <select type="text" class="required" name="monitoring_feedback_type" id="monitoring_feedback_type" title="Select Valid Feedback Type">
                                                            <option value="">Select</option>
                                                            <option value="interim">Interim Feedback</option>
                                                            <option value="final">Final Feedback</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"feedback"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Enter Feedback" rows="3" class="required" name="monitoring_feedback" id="monitoring_feedback" required="" title="Enter Valid Feedback"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"effectiveness"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Enter  Effectiveness" rows="3" class="required" name="effectiveness" id="effectiveness" title="Enter Valid Effectiveness"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Update Monitoring Feedback">
                                                <input type="hidden" name="update_monitoring_feedback">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="update_monitoring_feedback"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['cancel_button']->value)) {?>
                <div class="panel panel-default mgtp-5">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_cancel_button"> Cancel <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_show_cancel_button" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">CANCEL FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">
                                        <!--Cancel Form -->
                                        <form name="request_cancel-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="request_cancel-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason"),$_smarty_tpl);?>

                                                        <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper" class="controls">
                                                        <textarea placeholder="Min 3 - Max 500" rows="3" class="width-100 required" name="wf_remarks" id="wf_remarks"  required title="Enter Valid Reason"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Cancel">
                                                <input type="hidden" name="submit_request_cancel">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="request_cancel"><span class="menu-icon"><i class="fa fa-fw fa-times"></i></span> Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_info_tab_info']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#acc_info_tab"> Information Tab <i class="fa fa-exclamation-circle vd_red vd_white"></i></a> </h4>
                    </div>
                    <div id="acc_info_tab" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="alert alert-warning alert-dismissable alert-condensed">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                <i class="fa fa-exclamation-triangle append-icon"></i><strong>Information: </strong> <?php echo $_smarty_tpl->tpl_vars['show_info_tab_info']->value;?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- Start Of Task History Modal -->
<div class="modal fade" id="modal_task_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog width-90">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Task History</h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped table-hover"><thead class="show_task_history_thead"></thead></table>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"task_verification"),$_smarty_tpl);?>
</th>
                            <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"dept_head_review"),$_smarty_tpl);?>
  
                            </th>
                        </tr>
                    </thead>
                    <tbody class="show_task_history_tbody"></tbody>
                </table>
                <table class="table table-bordered table-striped table-hover"><thead class="show_task_history_thead_qa"></thead></table>
                <table class="table table-bordered table-striped table-hover"><thead class="show_task_cc_thead">
                        <tr>
                            <th class="col-md-3">
                                <div class="pd-10 input-border dropzone unset_min_height">
                                    <label class="control-label"><i class="append-icon icon-sound"></i><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"cc_required"),$_smarty_tpl);?>
 : </label>
                                    <span class="vd_radio radio-success mgl-10">
                                        <input type="radio" name="is_cc_required[]" id="capa_cc_yes_history" value="yes" class="cc_history">
                                        <label for="capa_cc_yes_history"> yes </label>
                                        <input type="radio" name="is_cc_required[]" id="capa_cc_no_history" value="no" class="cc_history">
                                        <label for="capa_cc_no_history"> no </label>
                                    </span>
                                </div>
                            </th>
                            <th class="col-md-3">
                                <div class="pd-10 input-border dropzone unset_min_height">
                                    <label class="control-label"><i class="append-icon icon-ellipsis"></i><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"reason"),$_smarty_tpl);?>
 : <span id="cc_reason_history"></span></label>
                                </div>
                            </th>
                            <th class="col-md-3">
                                <div class="pd-10 input-border dropzone unset_min_height">
                                    <label class="control-label"><i class="append-icon glyphicon glyphicon-link"></i><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"tracking_no"),$_smarty_tpl);?>
 : <span id="cc_tracking_link_history"></span></label>
                                </div>
                            </th>
                            <th class="col-md-3">
                                <div class="pd-10 input-border dropzone unset_min_height">
                                    <label class="control-label"><i class="append-icon fa fa-cog"></i><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"cc_no"),$_smarty_tpl);?>
 : <span id="cc_no_history"></span></label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer background-login">
            </div>
        </div>
    </div>
</div>
<!-- End Of Task History Modal -->
<!-- Start Of Task Attachments Modal -->
<div class="modal fade" id="modal_task_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Task Attachments <span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped table-hover show_task_attachments_table">
                    <thead>
                        <tr>
                            <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"name"),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"size"),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"attached_by"),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                            <th class="show_task_attachments_action"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                        </tr>
                    </thead>
                    <tbody class="show_task_attachments_tbody"></tbody>
                </table>
                <div class="alert alert-danger alert-dismissable alert-condensed no_attachments mgbt-md-0" style="display:none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                    <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                </div>
            </div>
            <div class="modal-footer background-login"></div>
        </div>
    </div>
</div>
<!-- End Of Task Attachments Modal -->
<?php $_smarty_tpl->_subTemplateRender("file:templates/worklist_pending_details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="vendors/dropzone/js/dropzone.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="vendors/custom_lm/file_upload/all_file_upload.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="vendors/custom_lm//timeline/js/timeline.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
                                                                $(document).ready(function () {
                                                                    notification("topright", "success", "fa fa-info-circle vd_blue", "Status", `${$("#status").val()} - [${$("#wf_status").val()}]`);
                                                                    "use strict";
                                                                    $('#edit_basic_details-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error messsage class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            ucapa_reason: {
                                                                                required: true
                                                                            },
                                                                            ucapa_present_system: {
                                                                                required: true
                                                                            },
                                                                            ucapa_immed_action: {
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#edit_basic_details-form')).fadeIn(500);
                                                                            scrollTo($('#edit_basic_details-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#update_basic_info').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Add & Delete Task
                                                                    $(".add_ca_task_id").click(() => $('.add_ca_task_parent_ele').find("tr").each((index, element) => $(element).find(".ca_task_id").val(`CA${index + 1}`)));
                                                                    $(".add_pa_task_id").click(() => $('.add_pa_task_parent_ele').find("tr").each((index, element) => $(element).find(".pa_task_id").val(`PA${index + 1}`)));
                                                                    $(document).on("click", ".delete_ca_task", function () {
                                                                        if ($('.add_ca_task_parent_ele').find("tr").length > 1) {
                                                                            $(this).closest("tr").remove();
                                                                            $('.add_ca_task_parent_ele').find("tr").each(function (index) {
                                                                                $(this).find(".ca_task_id").val(`CA${index + 1}`);
                                                                            });
                                                                        } else {
                                                                            show_notification("e", 'topright', 'Can not delete.Atleast one input required');
                                                                        }
                                                                    });
                                                                    $(document).on("click", ".delete_pa_task", function () {
                                                                        if ($('.add_pa_task_parent_ele').find("tr").length > 1) {
                                                                            $(this).closest("tr").remove();
                                                                            $('.add_pa_task_parent_ele').find("tr").each(function (index) {
                                                                                $(this).find(".pa_task_id").val(`PA${index + 1}`);
                                                                            });
                                                                        } else {
                                                                            show_notification("e", 'topright', 'Can not delete.Atleast one input required');
                                                                        }
                                                                    });
                                                                    // Edit Corrective Action,Preventive Action | Risk Mitigation Form Validation
                                                                    $('#edit_ccp-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                        },
                                                                        // Ensures hidden fields are ignored
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#add_task-form')).fadeIn(500);
                                                                            scrollTo($('#add_task-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            var type = event.submitter.id;
                                                                            //Save Task
                                                                            if (lm_validate.array_of_input(["task_id[]", "task[]", "pri_per_id[]"])) {
                                                                                if (type === "save_task") {
                                                                                    $("#task_submit_type").attr("name", "save_task");
                                                                                } else if (type === "add_task") {
                                                                                    $("#task_submit_type").attr("name", "add_task");
                                                                                }
                                                                                $('#save_task,#add_task').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    // Meeting Schedule Form Validation
                                                                    $('#meeting_schedule-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            meeting_date: {
                                                                                required: true,
                                                                            },
                                                                            meeting_time: {
                                                                                required: true,
                                                                            },
                                                                            meeting_venue: {
                                                                                required: true,
                                                                            },
                                                                            'participants[]': {
                                                                                required: true,
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit      
                                                                            $('.alert-danger', $('#meeting_schedule-form')).fadeIn(500);
                                                                            scrollTo($('#meeting_schedule-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if (lm_validate.array_of_input(["meeting_agenda[]"])) {
                                                                                let time = $('[name="meeting_time"]').val().split(":");
                                                                                if (time[0] > 23 || time[0] < 0 || time[1] > 59 || time[1] < 0) {
                                                                                    show_notification("e", 'topright', "Select Valid Time");
                                                                                    return false;
                                                                                }
                                                                                $('#meeting_scheduled').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    $(document).on("input", ".verify_link", function () {
                                                                        let a_tag = lm_dom.find_in_parent(this, '.verfiy_parent', '.verify_tag').show();
                                                                        if ($(this).val() !== "") {
                                                                            lm_dom.find_in_parent(this, '.verfiy_parent', '.verify_div').show();
                                                                            $(a_tag).attr('href', $(this).val()).html($(this).val());
                                                                        } else {
                                                                            lm_dom.find_in_parent(this, '.verfiy_parent', '.verify_div').hide();
                                                                            $(a_tag).attr('href', "").html("");
                                                                        }
                                                                    });
                                                                    // Meeting  ReSchedule Form Validation) {
                                                                    $('#meeting_reschedule-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            rmeeting_date: {
                                                                                required: true
                                                                            },
                                                                            rmeeting_time: {
                                                                                required: true
                                                                            },
                                                                            rvenue: {
                                                                                required: true
                                                                            },
                                                                            resched_reason: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#meeting_reschedule-form')).fadeIn(500);
                                                                            scrollTo($('#meeting_reschedule-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {

                                                                            $('#meeting_rescheduled').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Update Meeting Attendees Form Valiadtion
                                                                    $('#update_meeting_attendees-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            'attendee[]': {
                                                                                required: true
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#update_meeting_attendees-form')).fadeIn(500);
                                                                            scrollTo($('#update_meeting_attendees-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#update_meet_attn_button').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Update Meeting Conclusion Form Valiadtion
                                                                    $('#update_meeting_conclusion-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            'meeting_conclusion[]': {
                                                                                required: true
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#update_meeting_conclusion-form')).fadeIn(500);
                                                                            scrollTo($('#update_meeting_conclusion-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if (lm_validate.array_of_input(["meeting_conclusion[]"])) {
                                                                                $('#meeting_completed').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    // Request Department Approve Form Validation
                                                                    $('#request_dept_approve-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            plant: {
                                                                                required: true
                                                                            },
                                                                            department: {
                                                                                required: true
                                                                            },
                                                                            dept_approve_user: {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_dept_approve-form')).fadeIn(500);
                                                                            scrollTo($('#request_dept_approve-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_dept_approval').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        },
                                                                    });
                                                                    // Recall Department Approve Form Validation
                                                                    $('#recall_dept_approve-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#recall_dept_approve-form')).fadeIn(500);
                                                                            scrollTo($('#recall_dept_approve-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#recall_dept_approve').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Dept approval form
                                                                    $('#dept_approve-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#dept_approve-form')).fadeIn(500);
                                                                            scrollTo($('#dept_approve-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#dept_approved').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Dept approval Need Correcrtion form
                                                                    $('#dept_approve_correction-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#dept_approve_correction-form')).fadeIn(500);
                                                                            scrollTo($('#dept_approve_correction-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#dept_approve_need_correction').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Request QA Review Form Validation
                                                                    $('#request_qa_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            plant: {
                                                                                required: true
                                                                            },
                                                                            department: {
                                                                                required: true
                                                                            },
                                                                            qa_review_user: {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_qa_review-form')).fadeIn(500);
                                                                            scrollTo($('#request_qa_review-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_qa_review').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // QA Review Form Validation
                                                                    $('#qa_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#qa_review-form')).fadeIn(500);
                                                                            scrollTo($('#qa_review-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#qa_reviewed').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // QA Review Form Validation
                                                                    $('#qa_review_need_correction-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#qa_review_need_correction-form')).fadeIn(500);
                                                                            scrollTo($('#qa_review_need_correction-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#qa_review_need_correction').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Recall QA Review Form Validation
                                                                    $('#recall_qa_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#recall_qa_review-form')).fadeIn(500);
                                                                            scrollTo($('#recall_qa_review-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#recall_qa_reviewer').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Request QA Approval Form Validation
                                                                    $('#request_qa_approval-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            plant: {
                                                                                required: true
                                                                            },
                                                                            department: {
                                                                                required: true
                                                                            },
                                                                            qa_approver_user: {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_qa_approval-form')).fadeIn(500);
                                                                            scrollTo($('#request_qa_approval-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_qa_approval').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //QA Approval Need Correction Form
                                                                    $('#qa_approval_need_correction-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true,
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#qa_approval_need_correction-form')).fadeIn(500);
                                                                            scrollTo($('#qa_approval_need_correction-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#qa_approval_need_correction').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    $(document).on("change", "[name='ucapa_task_target_date']", function () {
                                                                        $("[name='ucapa_closeout_target_date']").removeAttr("disabled").val("").attr("data-datepicker_min", $(this).val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $(this).val(), dateFormat: 'yy-mm-dd'});
                                                                        $(".target_days,.training_days,.exam_days").html("");
                                                                    });
                                                                    //QA Rejectd Form
                                                                    $('#qa_rejected-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            ucapa_reject_reason: {
                                                                                minlength: 3,
                                                                                required: true,
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#qa_rejected-form')).fadeIn(500);
                                                                            scrollTo($('#qa_rejected-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#qa_rejected').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Request Pre Approve Form Validation
                                                                    $('#request_pre_approve-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            'pre_approval_to[]': {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true,
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_pre_approve-form')).fadeIn(500);
                                                                            scrollTo($('#request_pre_approve-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_pre_approve').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Pre Approve Form Validation
                                                                    $('#pre_approve-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            pre_approve_comments: {
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#pre_approve-form')).fadeIn(500);
                                                                            scrollTo($('#pre_approve-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#pre_approved').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //QA Accepted form
                                                                    $('#qa_accepted-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: ":hidden", // Ensures hidden fields are ignored
                                                                        rules: {
                                                                            ucapa_task_target_date: {
                                                                                required: true,
                                                                            },
                                                                            ucapa_closeout_target_date: {
                                                                                required: true
                                                                            },
                                                                            ucapa_reason: {
                                                                                required: true
                                                                            },
                                                                            ucapa_present_system: {
                                                                                required: true
                                                                            },
                                                                            ucapa_immed_action: {
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#qa_accepted-form')).fadeIn(500);
                                                                            scrollTo($('#qa_accepted-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            var type = event.submitter.id;
                                                                            //Save Task
                                                                            if (lm_validate.array_of_input(["task_id[]", "task[]", "pri_per_id[]"])) {
                                                                                if (type === "save_task") {
                                                                                    $("#task_submit_type").attr("name", "save_task");
                                                                                } else if (type === "add_task") {
                                                                                    $("#task_submit_type").attr("name", "add_task");
                                                                                }
                                                                                $('#qa_accepeted').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    $(document).on("click", ".add_more_task_id", function () {
                                                                        let old_task_count = Number($('.old_task_count').val());
                                                                        $('.add_task_parent_ele').find("tr").each(function (index) {
                                                                            $(this).find(".task_id").val(`T${index + old_task_count + 1}`);
                                                                        });
                                                                    });
                                                                    $(document).on("click", ".delete_more_task", function () {
                                                                        if ($('.add_task_parent_ele').find("tr").length > 1) {
                                                                            let old_task_count = Number($('.old_task_count').val());
                                                                            $(this).closest("tr").remove();
                                                                            $('.add_task_parent_ele').find("tr").each(function (index) {
                                                                                $(this).find(".task_id").val(`T${index + old_task_count + 1}`);
                                                                            });
                                                                        } else {
                                                                            show_notification("e", 'topright', 'Can not delete.Atleast one input required');
                                                                        }
                                                                    });
                                                                    //Task Read All Comments Check Box
                                                                    $('#assign_more_task_check_box').on('click', function () {
                                                                        ($(this).is(':checked')) ? $("#add_more_task").attr("disabled", false) : lm_dom.reload_page();
                                                                    });
                                                                    // Add More Task Form Validation
                                                                    $('#add_more_task-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                        },
                                                                        // Ensures hidden fields are ignored
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#add_more_task-form')).fadeIn(500);
                                                                            scrollTo($('#add_more_task-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if (lm_validate.array_of_input(["task_id[]", "task[]", "pri_per_id[]"])) {
                                                                                $('#add_more_task').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    //Assign To myself
                                                                    $(".myself").on('click', function () {
                                                                        if ($(this).is(':checked')) {
                                                                            lm_dom.find_in_parent(this, 'tr', '.assign_others').attr("disabled", true).val("");
                                                                        } else {
                                                                            lm_dom.find_in_parent(this, 'tr', '.assign_others').attr("disabled", false).val("");
                                                                        }
                                                                    });
                                                                    //Assign Task to Sceondary Responsible Person Form Validation
                                                                    $('#assign_sec_res_per-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#assign_sec_res_per-form')).fadeIn(500);
                                                                            scrollTo($('#assign_sec_res_per-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if (lm_validate.array_of_input(["sec_per_id[]"])) {
                                                                                $('#assign_task_to_sec_per').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    //If recall checkbox checked enable dropdowns
                                                                    $('.recall_checbox_sec').on('click', function () {
                                                                        if ($(this).is(':checked')) {
                                                                            lm_dom.find_in_parent(this, 'tr', '.recall_ed').removeAttr("disabled");
                                                                            //task object id
                                                                            lm_dom.find_in_parent(this, 'tr', '.recall_task_object_id').removeAttr("disabled");
                                                                        } else {
                                                                            lm_dom.find_in_parent(this, 'tr', '.recall_ed').prop("disabled", true).val("");
                                                                            //task object id
                                                                            lm_dom.find_in_parent(this, 'tr', '.recall_task_object_id').prop("disabled", true);
                                                                        }
                                                                    });
                                                                    //If Select all checkbox checked enable all dropdowns
                                                                    $('.select_all_sec').on('click', function () {
                                                                        if ($(this).is(':checked')) {
                                                                            lm_dom.find_in_parent(this, 'form', '.recall_ed').removeAttr("disabled").val("");
                                                                            //task object id
                                                                            lm_dom.find_in_parent(this, 'form', '.recall_task_object_id').removeAttr("disabled");
                                                                            lm_dom.find_in_parent(this, 'form', '.recall_checbox_sec').prop("checked", true);
                                                                        } else {
                                                                            lm_dom.find_in_parent(this, 'form', '.recall_ed').attr("disabled", true).val("");
                                                                            lm_dom.find_in_parent(this, 'form', '.recall_task_object_id').attr("disabled", true);
                                                                            //task object id
                                                                            lm_dom.find_in_parent(this, 'form', '.recall_checbox_sec').prop("checked", false);
                                                                        }
                                                                    });
                                                                    //Recall Task to Sceondary Responsible Person Form Validation
                                                                    $('#recall_replace_task_sec-from').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#recall_replace_task_sec-from')).fadeIn(500);
                                                                            scrollTo($('#recall_replace_task_sec-from'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let users = $(form).find('[name="replacement_user[]"]').filter(function () {
                                                                                return $(this).val() !== "";
                                                                            });
                                                                            let replacement_checkbox = $(form).find('[name="replacement_pending_user[]"]:checked');
                                                                            if (lm_validate.check_box(["replacement_pending_user[]"])) {
                                                                                if (replacement_checkbox.length === users.length) {
                                                                                    $('#recall_replace_sec').attr("disabled", true);
                                                                                    loading.show();
                                                                                    form.submit();
                                                                                } else {
                                                                                    show_notification("e", 'topright', "Select Valid User");
                                                                                }
                                                                            }
                                                                        }
                                                                    });
                                                                    //Sceondary Person Task Update Form Validation
                                                                    $('#task_sec_per-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#task_sec_per-form')).fadeIn(500);
                                                                            scrollTo($('#task_sec_per-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let  task_status = $(form).find(".select_task_status");
                                                                            for (let i = 0; i < task_status.length; i++) {
                                                                                let sec_per_task_comments = $(task_status[i]).closest("tr").find(".sec_per_task_comments");
                                                                                if ($(task_status[i]).val() === "Completed" && sec_per_task_comments.val().length < 3) {
                                                                                    $(sec_per_task_comments).focus();
                                                                                    show_notification("e", 'topright', 'Enter Valid Comments');
                                                                                    return false;
                                                                                }
                                                                            }
                                                                            $('#sec_per_task_update_submit').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    $(document).on("click", ".show_task_history", function () {
                                                                        loading.show();
                                                                        let result = $(this).data('task_details'), writter = "";
                                                                        let task_type = (result.type === "ca") ? "Corrective Action" : "Preventive Action";
                                                                        let task_icon = (result.type === "ca") ? "fa-certificate" : "fa-shield";
                                                                        let task_close_out_review = (result.qa_verification_comments) ?? " - ";
                                                                        let cc_reason = (result.cc_details) ? (result.cc_details.reason) ?? "NA" : "NA";
                                                                        let tracking_link = (result.cc_details) ? (result.cc_details.tracking_link) ?? "NA" : "NA";
                                                                        let cc_no = (result.cc_details) ? (result.cc_details.dest_doc_no_link) ?? "NA" : "NA";
                                                                        $(".cc_history").prop('checked', false);

                                                                        let sec_cmts = pri_cmts = creator_cmts = qa_cmts = dept_head_cmts = '';
                                                                        (result.all_sec_review_comments) ? $.each(result.all_sec_review_comments, (index, value) => sec_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon fa fa-fw  ${task_icon}"></i>${value.review_comments}<br></div>`) : sec_cmts += `-`;
                                                                        (result.all_pri_review_comments) ? $.each(result.all_pri_review_comments, (index, value) => pri_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon fa fa-fw  ${task_icon}"></i>${value.review_comments}<br></div>`) : pri_cmts += `-`;
                                                                        (result.all_creator_review_comments) ? $.each(result.all_creator_review_comments, (index, value) => creator_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon fa fa-fw  ${task_icon}"></i>${value.review_comments}<br></div>`) : creator_cmts += `-`;
                                                                        (result.all_dept_head_review_comments) ? $.each(result.all_dept_head_review_comments, (index, value) => dept_head_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon fa fa-fw  ${task_icon}"></i>${value.review_comments}<br></div>`) : dept_head_cmts += `-`;
                                                                        writter += `<tr><td>${sec_cmts}</td><td>${pri_cmts}</td><td>${creator_cmts}</td><td>${dept_head_cmts}</td></tr>`;
                                                                        $(".show_task_history_thead").empty().append(`<tr><td colspan="4"><span class="font-semibold"><i class="fa fa-fw  ${task_icon}"></i>${task_type} <span class="badge vd_bg-blue">${result.task_id}</span> : </span>${result.task}</td></tr>`);
                                                                        $(".show_task_history_thead_qa").empty().append(`<tr><td colspan="4"><span class="font-semibold"><i class="append-icon fa fa-fw fa-gavel"></i>QA Verification : </span>${task_close_out_review}</td></tr>`);
                                                                        if (result.is_cc_required === "yes") {
                                                                            $("#capa_cc_yes_history").prop('checked', true);
                                                                        } else if (result.is_cc_required === "no") {
                                                                            $("#capa_cc_no_history").prop('checked', true)
                                                                        }
                                                                        $("#cc_reason_history").html(cc_reason);
                                                                        $("#cc_tracking_link_history").html(tracking_link);
                                                                        $("#cc_no_history").html(cc_no);
                                                                        $(".show_task_history_tbody").empty().append(writter);
                                                                        loading.hide();
                                                                    });
                                                                    $(document).on("click", ".show_task_attachments", function () {
                                                                        loading.show();
                                                                        $(".show_task_attachments_id").html(`[ ${$(this).data('task_id')} ]`);
                                                                        let result = $(this).data('attachments'), writter = "";
                                                                        let towards = $(this).data('towards');
                                                                        let can_delete = $(this).data('can_delete');
                                                                        if (result) {
                                                                            for (var i = 0; i < Object.keys(result).length; i++) {
                                                                                writter += `<tr>
                                                                                    <td><a href="?module=file&action=view_request_file&file_id=${result[i].object_id}" >${result[i].name}</a></td>
                                                                                    <td>${result[i].friendly_size}</td>
                                                                                    <td>${result[i].attached_by}</td>
                                                                                    <td>${result[i].attached_date}</td>`;
                                                                                if (result[i].can_delete && result[i].towards === towards && can_delete) {
                                                                                    $(".show_task_attachments_action").show();
                                                                                    writter += `<td><i class="append-icon icon-trash vd_red vd_hover del_task_file" data-file_id="${result[i].object_id}" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i></td>`;
                                                                                } else {
                                                                                    $(".show_task_attachments_action").hide();
                                                                                }
                                                                                writter += `</tr>`;
                                                                            }
                                                                            $(".show_task_attachments_tbody").empty().append(writter);
                                                                            $(".show_task_attachments_table").show();
                                                                            $(".no_attachments").hide();
                                                                        } else {
                                                                            $(".show_task_attachments_table").hide();
                                                                            $(".no_attachments").show();
                                                                        }
                                                                        loading.hide();
                                                                    });
                                                                    $(document).on("click", ".del_task_file", function () {
                                                                        var c_this = this;
                                                                        x_delete_lm_capa_doc_file($(this).data('file_id'), $("#capa_object_id").val(), function (result) {
                                                                            if (result == "true") {
                                                                                show_notification("s", 'topright', "File Deleted Successfully");
                                                                                $(c_this).closest('tr').remove();
                                                                            } else {
                                                                                show_notification("s", 'topright', " File Not Deleted.Invalid Request Called");
                                                                            }
                                                                        });
                                                                    });
                                                                    $(document).on("click", ".cc_history", (event) => event.preventDefault());
                                                                    //Primary Person Task Update Form Validation
                                                                    $('#task_pri_per-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#task_pri_per-form')).fadeIn(500);
                                                                            scrollTo($('#task_pri_per-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let  task_status = $(form).find(".select_task_status");
                                                                            for (let i = 0; i < task_status.length; i++) {
                                                                                let pri_per_task_comments = $(task_status[i]).closest("tr").find(".pri_per_task_comments");
                                                                                if (($(task_status[i]).val() === "Completed" || $(task_status[i]).val() === "needs_correction") && pri_per_task_comments.val().length < 3) {
                                                                                    $(pri_per_task_comments).focus();
                                                                                    show_notification("e", 'topright', 'Enter Valid Comments');
                                                                                    return false;
                                                                                }
                                                                            }
                                                                            $('#pri_per_task_update_submit').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Task Review Form Validation
                                                                    $('#task_verification-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#task_verification-form')).fadeIn(500);
                                                                            scrollTo($('#task_verification-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let  task_status = $(form).find(".select_task_status");
                                                                            for (let i = 0; i < task_status.length; i++) {
                                                                                let creator_task_comments = $(task_status[i]).closest("tr").find(".task_review_comments");
                                                                                if (($(task_status[i]).val() === "Completed" || $(task_status[i]).val() === "needs_correction") && creator_task_comments.val().length < 3) {
                                                                                    $(creator_task_comments).focus();
                                                                                    show_notification("e", 'topright', 'Enter Valid Comments');
                                                                                    return false;
                                                                                }
                                                                            }
                                                                            $('#creator_task_update_submit').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Task Dept. Head Review Form Validation
                                                                    $('#task_dept_head_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#task_dept_head_review-form')).fadeIn(500);
                                                                            scrollTo($('#task_dept_head_review-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let  task_status = $(form).find(".select_task_status");
                                                                            for (let i = 0; i < task_status.length; i++) {
                                                                                let creator_task_comments = $(task_status[i]).closest("tr").find(".task_review_comments");
                                                                                let is_cc_required = $(task_status[i]).closest("tr").find(".task_review_comments");
                                                                                if (($(task_status[i]).val() === "Completed" || $(task_status[i]).val() === "needs_correction")) {
                                                                                    if (creator_task_comments.val().length < 3) {
                                                                                        $(creator_task_comments).focus();
                                                                                        show_notification("e", 'topright', 'Enter Valid Comments');
                                                                                        return false;
                                                                                    }
                                                                                    if (!lm_validate.radio_button($(task_status[i]).closest("tr").find("input[type='radio']"))) {
                                                                                        return false;
                                                                                    }
                                                                                }
                                                                            }
                                                                            $('#creator_task_update_submit').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Closeout Form Validation
                                                                    $('#close_out-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: ":hidden", // Ensures hidden fields are ignored
                                                                        rules: {
                                                                            task_close_out_review: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            ucapa_monitoring_date: {
                                                                                required: true
                                                                            },
                                                                            ucapa_close_out_comments: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#close_out-form')).fadeIn(500);
                                                                            scrollTo($('#close_out-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let cc_dept_head = $(form).find(".cc_dept_head:visible");
                                                                            let cc_reason = $(form).find(".cc_reason:visible");

                                                                            for (let i = 0; i < cc_dept_head.length; i++) {
                                                                                if ($(cc_dept_head[i]).val() == '') {
                                                                                    show_notification("e", 'topright', "Select Valid User");
                                                                                    $(cc_dept_head[i]).focus();
                                                                                    return false;
                                                                                }
                                                                            }
                                                                            for (let i = 0; i < cc_reason.length; i++) {
                                                                                if ($(cc_reason[i]).val() == '') {
                                                                                    show_notification("e", 'topright', "Select Valid User");
                                                                                    $(cc_reason[i]).focus();
                                                                                    return false;
                                                                                }
                                                                            }

                                                                            $('#close_out').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    $('#assign_monitoring_resp-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#assign_monitoring_resp-form')).fadeIn(500);
                                                                            scrollTo($('#assign_monitoring_resp-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if (lm_validate.array_of_input(["resp_person[]"])) {
                                                                                $('#add_responsible_person').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    //Monitoring Form Vliadtion
                                                                    $('#effectiveness_monitoring-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            monitoring_feedback_type: {
                                                                                required: true
                                                                            },
                                                                            monitoring_feedback: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            effectiveness: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#effectiveness_monitoring-form')).fadeIn(500);
                                                                            scrollTo($('#effectiveness_monitoring-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#update_monitoring_feedback').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Cancel Form Validation
                                                                    $('#request_cancel-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_cancel-form')).fadeIn(500);
                                                                            scrollTo($('#request_cancel-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_cancel').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //--------End of Form valiadtion --------------------------------------------------------------------//  
                                                                    $(document).on("change", ".show_report", (e) => {
                                                                        window.open($(e.target).val(), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=500,width=800,height=600");
                                                                        $(e.target).val('');
                                                                    });
                                                                });
                                                                $(".add_more_meeting_schedule").click(function () {
                                                                    add_element(".meeting_schedule_child_div", ".meeting_schedule_parent_div");
                                                                    lm_dom.assign_unique_attr_val(".meeting_schedule_date", "id");
                                                                    lm_dom.assign_id_to_multiselect(this);
                                                                    lm_dom.re_initialize();
                                                                });
                                                                $(".add_more_ccp").click(function () {
                                                                    add_element(".add_ccp_child_ele", ".add_ccp_parent_ele");
                                                                    lm_dom.assign_unique_attr_val(".ccp_date", "id");
                                                                    lm_dom.re_initialize();
                                                                });
                                                                function delete_file_row(file_id, capa_object_id) {
                                                                    let tr = event.target.closest('tr');
                                                                    x_delete_lm_capa_doc_file(file_id, capa_object_id, function (result) {
                                                                        (result == "true") ? show_notification("s", 'topright', "File Deleted Successfully")(tr.remove()) : show_notification("e", 'topright', "File Not Deleted.Invalid Request Called");
                                                                    });
                                                                }
                                                                //QA Approval Read All Comments Check Box
                                                                $('#qa_comments_check_box').on('click', function () {
                                                                    ($(this).is(':checked')) ? $(".qa_approval_drop").show() : lm_dom.reload_page();
                                                                });

    <?php echo '</script'; ?>
>






<?php }
}
