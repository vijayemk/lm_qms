<?php
/* Smarty version 3.1.30, created on 2024-09-28 05:12:45
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/dms/templates/view_dms.dms.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66f7904d95e179_42020762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b4d53e347fe6c12f410d4f03e053fd6c2f99a9a' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/dms/templates/view_dms.dms.tpl',
      1 => 1726556878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
    'file:templates/common/edit_access_rights.tpl' => 1,
    'file:pass_auth.tpl' => 12,
    'file:templates/common/extension_request.tpl' => 6,
    'file:templates/common/extension_approval.tpl' => 6,
    'file:templates/common/recall.tpl' => 10,
    'file:templates/worklist_pending_details.tpl' => 1,
  ),
),false)) {
function content_66f7904d95e179_42020762 (Smarty_Internal_Template $_smarty_tpl) {
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
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> View Deviation Management System</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5 data-position="left">
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseagendadetails">Deviation Details </a> </h4>
                </div>
                <div id="collapseagendadetails" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-wizard generate_wizard">
                            <ul>
                                <li><a href="#tab_pri_dtls" data-toggle="tab"><div class="menu-icon"> 1 </div> Primary Details </a></li>
                                <li><a href="#tab_investigation" data-toggle="tab"><div class="menu-icon"> 2 </div> Investigation </a></li>                                
                                <li><a href="#tab_task_dtls" data-toggle="tab"><div class="menu-icon"> 3 </div> Task Details </a></li>
                                <li><a href="#tab_attachments" data-toggle="tab"><div class="menu-icon"> 4 </div> Attachments </a></li>
                                <li><a href="#tab_reports" data-toggle="tab"><div class="menu-icon"> 5 </div> Reports </a></li>
                                <li><a href="#tab_insight" data-toggle="tab"><div class="menu-icon"> 6 </div> Insight </a></li>
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
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'deviation_no'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['dms_no']->value;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'initiator'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['initiator']->value;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'plant_name'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['plant_name']->value;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'department'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['dm_department']->value;?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'dm_type'),$_smarty_tpl);?>
</div>
                                                        <div class="input-border pd-5" readonly ><?php echo $_smarty_tpl->tpl_vars['dm_type']->value;?>
</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'classification'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['dm_classification']->value;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'reporting_time'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['reporting_date']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->reporting_time;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'date_of_occurrence'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['date_of_occurrence']->value;?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'time_of_occurrence'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->time_of_occurrence;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'date_of_discovery'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['date_of_discovery']->value;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'time_of_discovery'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->time_of_discovery;?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'status'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->status;?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'invest_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_investigation_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['latest_invest_details']->value->target_date) {?>
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                    <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->target_date),$_smarty_tpl);?>
">
                                                                </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->meeting_target_date) {?>
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                    <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->meeting_target_date),$_smarty_tpl);?>
">
                                                                </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'training_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date) {?>
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                    <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date),$_smarty_tpl);?>
">
                                                                </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'exam_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_target_date) {?>
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                    <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_target_date),$_smarty_tpl);?>
">
                                                                </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-sm-6 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'task_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->task_target_date) {?>
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                    <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->task_target_date),$_smarty_tpl);?>
">
                                                                </div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-md-7 col-sm-7 col-xs-7 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'is_capa_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_capa_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <div class="form-label font-semibold mgtp-20">
                                                                <?php echo $_smarty_tpl->tpl_vars['etrigger_capa_no']->value;?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-border pd-10 col-md-12">
                                                            <div class="col-md-7 col-sm-7 col-xs-7 pd-0">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'cc_required'),$_smarty_tpl);?>
</div>
                                                                <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_cc_required == 'yes') {?>checked<?php }?> readonly>
                                                            </div>
                                                            <div class="form-label font-semibold mgtp-20">
                                                                <?php echo $_smarty_tpl->tpl_vars['etrigger_cc_no']->value;?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-life-ring"></i>Deviation Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'approval_status'),$_smarty_tpl);?>
</div>
                                                        <div class="input-border pd-5"><span class="font-semibold badge"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->approval_status),$_smarty_tpl);?>
</span></div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->target_date),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'close_out_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->close_out_date),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable2),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'completion_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->completed_date),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable3),$_smarty_tpl);?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'description'),$_smarty_tpl);?>
</div>
                                                        <textarea  rows="4" readonly=""><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->description),$_smarty_tpl);?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'risk_impact_assess'),$_smarty_tpl);?>
</div>
                                                        <textarea  rows="4" " readonly=""><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->risk_impact_assessment),$_smarty_tpl);?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'immed_action_taken'),$_smarty_tpl);?>
</div>
                                                        <textarea class="mgbt-xs-20  mgbt-sm-0" rows="4" style="resize: none" readonly=""><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->immed_action_taken),$_smarty_tpl);?>
</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'closeout_comments'),$_smarty_tpl);?>
</div>
                                                        <textarea rows="4" readonly=""><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->close_out_comments),$_smarty_tpl);?>
</textarea>
                                                    </div>
                                                </div>
                                                <?php if (($_smarty_tpl->tpl_vars['dm_master_obj']->value->rejected_reason)) {?>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'rejected_reason'),$_smarty_tpl);?>
</div>
                                                            <textarea rows="4" readonly=""><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->rejected_reason),$_smarty_tpl);?>
</textarea>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                                <input type="hidden" id="dms_object_id" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
" />
                                                <input type="hidden" id="wf_status" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->wf_status;?>
" />
                                                <input type="hidden" id="status" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->status;?>
" />
                                            </div>
                                        </div>
                                    </div>
                                    <br><h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw  fa-cubes"></i>Product Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'product_name'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['product_name']->value),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'processing_stage'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['process_stage']->value),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'manu_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_date),$_smarty_tpl);
$_prefixVariable4=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable4),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'manu_expiry_date'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_expiry_date),$_smarty_tpl);
$_prefixVariable5=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable5),$_smarty_tpl);?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'batch_no'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->batch_no),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'lot_no'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->lot_no),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'batch_size'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->batch_size),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'material_type'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['material_type']->value),$_smarty_tpl);?>
">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'material_name'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->material_name),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'customer'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['customer_name']->value),$_smarty_tpl);?>
">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'scope'),$_smarty_tpl);?>
</div>
                                                        <input type="text" readonly value="<?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['market_name']->value),$_smarty_tpl);?>
">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-share-alt"></i>"Deviation Related To" Details</span><span class="font-semibold font-10 badge vd_bg-red mgl-10"><?php echo count($_smarty_tpl->tpl_vars['dev_related_to_list']->value);?>
</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <div  class="controls">
                                                    <div class="vd_pricing-table">
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_related_to_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <div class="col-md-12 col-lg-4">
                                                                <div class="plan  mgr-10">
                                                                    <div class="plan-header vd_bg-green vd_white text-center vd_info-parent">
                                                                        <div class="vd_bg-black-30 pd-5"><?php echo $_smarty_tpl->tpl_vars['item']->value['dev_related_to'];?>
<span class="font-semibold font-10 badge vd_bg-yellow mgl-10"><?php echo count($_smarty_tpl->tpl_vars['item']->value['dev_sub_related_to']);?>
</span></div>
                                                                    </div>
                                                                    <div data-rel="scroll" data-scrollheight="150" class="input-border content-list">
                                                                        <ul class="list-wrapper pd-5">
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['dev_sub_related_to'], 'item2', false, 'key', 'list2', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                                <li class="vd_hover" data-original-title="<?php echo $_smarty_tpl->tpl_vars['item2']->value['desc'];?>
" data-placement="bottom" data-toggle="tooltip" data-container="body"><span class="menu-rating vd_yellow col-md-1 pd-0"><i class="icon-star mgr-10"></i></span><span class="col-md-11 pd-0"><?php echo $_smarty_tpl->tpl_vars['item2']->value['sub_type'];?>
</span>
                                                                                </li>
                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                        </ul>
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
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Pre Review Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['pre_review_comments']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pre_review_comments']->value, 'item', false, 'key', 'list', array (
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
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Dept Head Approver Comments</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['dept_approver_comments']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>CFT Assessment</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['cft_review_comments']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cft_review_comments']->value, 'item', false, 'key', 'list', array (
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
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                </div>
                                <div class="tab-pane" id="tab_investigation">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-screenshot"></i>Investigation Details</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['investigation_details']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Investigation Details" data-ori="landscape" data-pagesize="B4">
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"iteration"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"assigned_by"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"investigation_details"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"invest_feedback"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"probable_rc"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"investigated_by"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dept_head_review"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"qa_verification"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"completion_date"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['investigation_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['iteration'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_by'];?>
<br><br><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_date'];?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['investigation_details']),$_smarty_tpl);?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['target_date'];?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['investigator_feedback']),$_smarty_tpl);?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['root_cause']),$_smarty_tpl);?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['investigated_by'];?>
<br><br><?php echo $_smarty_tpl->tpl_vars['item']->value['investigator_dept'];?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['dept_head_review']),$_smarty_tpl);?>
<br><br><?php echo $_smarty_tpl->tpl_vars['item']->value['dept_head_review_date'];?>
<br><br><?php echo $_smarty_tpl->tpl_vars['item']->value['dept_head_name'];?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['qa_reviewer_review']),$_smarty_tpl);?>
<br><br><?php echo $_smarty_tpl->tpl_vars['item']->value['qa_reviewer_review_date'];?>
<br><br><?php echo $_smarty_tpl->tpl_vars['item']->value['qa_reviewer'];?>
</td>
                                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['completion_date']),$_smarty_tpl);?>
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
                                        </div>
                                    </div>
                                    <br>

                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>Investigation/Root Cause Analysis(RCA) - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['investigation_file_objectarray']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Attacments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"size"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"attached_by"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['investigation_file_objectarray']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><a class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom" href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font></a></td>
                                                                    <td><?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item']->value['size']),$_smarty_tpl);?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_by'];?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_date'];?>
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
                                <div class="tab-pane" id="tab_task_dtls">
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon append-icon fa fa-fw fa-user"></i>Task Responsible Persons</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['dms_task_list']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Task Responsible Persons" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1 pd-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-7"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2 pd-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2 pd-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dms_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
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
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-tasks"></i>TASK REVIEW | VERIFICATION | COMMENTS</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['dms_task_list']->value)) {?>
                                                    <table class="table table-bordered generate_datatable" title="Attacments" data-ori="landscape" data-pagesize="B4" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2 pd-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
 </th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_verification"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"qa_review"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dms_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="row mgbt-md-0 pdlr-10">
                                                                            <div>
                                                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
 <span class="<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 'Completed') {?>label vd_bg-green<?php } else { ?>label vd_bg-red<?php }?> append-icon mgl-10"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span>
                                                                                <button class="btn btn-default show_task_history pd-0 mgl-10" type="button" data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history" data-original-title="Show Task History" data-toggle="tooltip" data-placement="bottom"></i></button>
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
                                                                                        <i class="append-icon glyphicon glyphicon-link"></i>
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
                                                                                        <i class="append-icon glyphicon glyphicon-link"></i>
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
                                                                                        <i class="append-icon glyphicon glyphicon-link"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->task_qa_review) {?>
                                                                            <div class="input-border dropzone unset_min_height pd-10">
                                                                                <div class="row mgbt-md-10 pdlr-10">
                                                                                    <div class="col-md-10 pd-0">
                                                                                        <i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->close_out_date),$_smarty_tpl);?>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mgbt-md-0 pdlr-10">
                                                                                    <div class="col-md-12 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->task_qa_review;?>

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
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>Investigation/Root Cause Analysis(RCA) - Supporting Documents</span></h4>
                                    <div class="vd_content-section clearfix">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body table-responsive">
                                                <?php if (!empty($_smarty_tpl->tpl_vars['investigation_file_objectarray']->value)) {?>
                                                    <table class="table table-bordered table-striped generate_datatable" title="Attacments" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"name"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"size"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"attached_by"),$_smarty_tpl);?>
</th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"file",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['investigation_file_objectarray']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <a class="menu-icon vd_bd-green vd_blue font-semibold" data-original-title="Download" data-toggle="tooltip" data-placement="bottom" href="?module=file&action=view_request_file&file_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</font></a>
                                                                        <br>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo smarty_GetFriendlySize(array('file_size'=>$_smarty_tpl->tpl_vars['item']->value['size']),$_smarty_tpl);?>

                                                                        <br>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['attached_by'];?>

                                                                        <br>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['attached_date'];?>

                                                                        <br>
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
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['dms_task_list']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Attacments" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dms_task_list']->value, 'item', false, 'key');
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
                                                            <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a2&rtype=full_report">Full Report [A2-P]</option>
                                                            <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a2&rtype=full_report">Full Report [A2-L]</option>
                                                            <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a3&rtype=full_report">Full Report [A3-P]</option>
                                                            <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a3&rtype=full_report">Full Report [A3-L]</option>
                                                            <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a4&rtype=full_report">Full Report [A4-P]</option>
                                                            <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a4&rtype=full_report">Full Report [A4-L]</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group" style="box-shadow:none;">
                                                                <label class="vd_white">Meeting</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select Type</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a2&rtype=meeting">Meeting Report [A2-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a2&rtype=meeting">Meeting Report [A2-L]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a3&rtype=meeting">Meeting Report [A3-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a3&rtype=meeting">Meeting Report [A3-L]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a4&rtype=meeting">Meeting Report [A4-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a4&rtype=meeting">Meeting Report [A4-L]</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group vd_bg-dark-green" style="box-shadow:none;">
                                                                <label class="vd_white">Training</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select Type</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a2&rtype=training">Training Report [A2-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a2&rtype=training">Training Report [A2-L]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a3&rtype=training">Training Report [A3-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a3&rtype=training">Training Report [A3-L]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a4&rtype=training">Training Report [A4-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a4&rtype=training">Training Report [A4-L]</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group vd_bg-black" style="box-shadow:none;">
                                                                <label class="vd_white">Task</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select Type</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a2&rtype=task">Task Report [A2-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a2&rtype=task">Task Report [A2-L]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a3&rtype=task">Task Report [A3-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a3&rtype=task">Task Report [A3-L]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=p&paper_size=a4&rtype=task">Task Report [A4-P]</option>
                                                                <option value="index.php?module=file&action=view_dms_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&ori=l&paper_size=a4&rtype=task">Task Report [A4-L]</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_insight">
                                    <div id="insight_wizard" class="form-wizard condensed input-border generate_wizard">
                                        <ul class="nav nav-tabs nav-justified font-semibold">
                                            <li class="input-border"><a class="pd-10" href="#insight_meeting"  data-toggle="tab"><div class="menu-icon"> <i class="icon-users vd_red"></i> </div>Meeting</a></li>
                                            <li class="input-border"><a class="pd-10" href="#insight_traing_exam" data-toggle="tab"><div class="menu-icon"><i class="glyphicon glyphicon-th vd_red"></i></div>Training & Exam</a></li>
                                            <li class="input-border"><a class="pd-10" href="#insight_access_rights" data-toggle="tab"><div class="menu-icon"><i class="icon-key vd_red"></i></div>Access Rights</a></li>
                                            <?php if ($_smarty_tpl->tpl_vars['cancelled_details']->value) {?><li class="input-border"><a class="pd-10" href="#insight_cancel_details" data-toggle="tab"><div class="menu-icon"><i class="icon-blocked vd_red"></i></div>Cancellation Details</a></li><?php }?>
                                            <li class="input-border"><a class="pd-10" href="#insight_repetitive_dms" data-toggle="tab"><div class="menu-icon"><i class="fa fa-fw fa-retweet vd_red"></i></div>Repetetive DMS</a></li>
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
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                                    <br>
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>List of Invitees</span></h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['meeting_participant_details']->value)) {?>
                                                                    <table class="table table-bordered table-striped generate_datatable" title="Invitees List" data-sort_column=1>
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"participants"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"created_by"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"created_time"),$_smarty_tpl);?>
</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_participant_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['participant'];?>
</td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
</td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_time'];?>
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
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>List of Attendees</span></h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['meeting_attendees_details']->value)) {?>
                                                                    <table class="table table-bordered table-striped generate_datatable" title="Attendess list" data-sort_column=1>
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"attendee"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_attendees_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['attendee'];?>
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
                                                </div>
                                                <div class="tab-pane" id="insight_traing_exam">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-calendar"></i>Training Schedule Details</span></h4>
                                                    <div class="vd_content-section clearfix">
                                                        <div class="panel widget panel-bd-left light-widget">
                                                            <div class="panel-body table-responsive">
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['training_details']->value)) {?> 
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['training_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'title'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'trainer'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['item']->value['trainer_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['trainer_dept'];?>
]">
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date),$_smarty_tpl);?>
">
                                                                            </div>
                                                                        </div>
                                                                        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['schedule_details'])) {?>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['schedule_details'], 'item1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                                <ul class="vd_li pd-0 vd_bg-white form-group">
                                                                                    <div class="alert vd_bg-dark-blue vd_white alert-dismissable alert-condensed mgbt-md-0 pdlr-10">
                                                                                        <i class="fa fa-circle fa-fw vd_white"></i> <span class="font-semibold">Session  : <?php echo $_smarty_tpl->tpl_vars['item1']->value['session'];?>
 | <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date"),$_smarty_tpl);?>
 : <?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['training_date']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['item1']->value['training_time'];?>
 |  <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"venue"),$_smarty_tpl);?>
 : <?php echo $_smarty_tpl->tpl_vars['item1']->value['venue'];?>
</span>
                                                                                    </div>
                                                                                    <li class="pd-5 pdlr-15 input-border">
                                                                                        <ul class="vd_li pd-0 mgbt-md-20">
                                                                                            <span class="font-semibold"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"link"),$_smarty_tpl);?>
</span>: <?php if ($_smarty_tpl->tpl_vars['item1']->value['training_link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['item1']->value['training_link'];?>
"  target="_blank">Click Here</a><?php } else { ?> --<?php }?>
                                                                                            <div class="table-responsive">
                                                                                                <table class="table table-bordered table-striped mgbt-md-0  mgtp-20">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"invitees"),$_smarty_tpl);?>
</th>
                                                                                                            <th class="col-md-6"> <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"attendess"),$_smarty_tpl);?>
</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php if ($_smarty_tpl->tpl_vars['item1']->value['participants']) {?>
                                                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['participants'], 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                                                                        <?php echo $_smarty_tpl->tpl_vars['item2']->value['trainee_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item2']->value['trainee_dept'];?>
]<br>
                                                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                                                <?php } else { ?>
                                                                                                                    <i class="fa fa-exclamation-circle append-icon vd_red"> Records Not Found </i>
                                                                                                                <?php }?>
                                                                                                            </td>
                                                                                                            <td> 
                                                                                                                <?php if ($_smarty_tpl->tpl_vars['item1']->value['attendees']) {?>
                                                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['attendees'], 'item3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item3']->value) {
?>
                                                                                                                        <?php echo $_smarty_tpl->tpl_vars['item3']->value['trainee_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item3']->value['trainee_dept'];?>
]<br>
                                                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                                                <?php } else { ?>
                                                                                                                    <i class="fa fa-exclamation-circle append-icon vd_red"> Records Not Found </i>
                                                                                                                <?php }?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                        <?php } else { ?>
                                                                            <ul class="vd_li input-border vd_hover pd-0 vd_bg-white">
                                                                                <div class="alert vd_bg-dark-blue vd_white alert-dismissable alert-condensed mgbt-md-0">
                                                                                    <i class="fa fa-circle fa-fw vd_green"></i> <span class="font-semibold">Session  : -- </span>
                                                                                </div>
                                                                                <li class="pd-5 pdlr-15 font-semibold mgbt-md-10 mgtp-10">
                                                                                    <i class="fa fa-exclamation-circle append-icon vd_red"></i> Training Not Yet Scheduled
                                                                                </li>
                                                                            </ul>
                                                                        <?php }?> 
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-graduation-cap"></i>Exam Details</span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['online_exam_user_list']->value)) {?>
                                                        <div class="vd_content-section clearfix">
                                                            <div class="panel widget panel-bd-left light-widget">
                                                                <div class="panel-body table-responsive">
                                                                    <ul class="vd_li pd-0 vd_bg-white form-group">
                                                                        <div class="alert vd_bg-dark-blue vd_white alert-dismissable alert-condensed mgbt-md-0 pdlr-10">
                                                                            <i class="fa fa-circle fa-fw vd_white"></i> <span class="font-semibold">Exam Status  : <?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_status;?>
 | <?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
 : <?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_target_date),$_smarty_tpl);?>
</span>
                                                                        </div>
                                                                    </ul>
                                                                    <table class="table table-striped table-bordered generate_datatable" title="Oline Exam Details" data-whitespace="nowrap" data-ori="landscape" data-pagesize="B4" data-sort_column=1>
                                                                        <thead>
                                                                            <tr>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"assigned_date"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"completed_date"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pass_mark"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"marks_scored"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"result"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"attempt"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"status"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"capa_no"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"integration",'attribute'=>"tracking_no"),$_smarty_tpl);?>
</th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"download"),$_smarty_tpl);?>
</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['online_exam_user_list']->value, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['user_details'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                                    <tr >
                                                                                        <td></td>
                                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['assigned_to'];?>
</td>
                                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['assigned_to_dept'];?>
</td>
                                                                                        <td><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['assigned_date']),$_smarty_tpl);?>
</td>
                                                                                        <td><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['completed_date']),$_smarty_tpl);?>
</td>
                                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['pass_mark']),$_smarty_tpl);?>
</td>
                                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['marks_scored']),$_smarty_tpl);?>
</td>
                                                                                        <td><span class="<?php if ($_smarty_tpl->tpl_vars['item2']->value['result'] == 'Pass') {?>label vd_bg-green<?php } elseif ($_smarty_tpl->tpl_vars['item2']->value['result'] == 'Failed') {?>label vd_bg-red<?php }?> append-icon"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['result']),$_smarty_tpl);?>
</span></td>
                                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['attempt']),$_smarty_tpl);?>
</td>
                                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item2']->value['status'];
if ($_smarty_tpl->tpl_vars['item2']->value['status'] == 'Recalled') {?> <span class="menu-icon"><i class="fa fa-fw fa-arrow-left vd_red"></i></span><?php }?></td>
                                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['capa_link']),$_smarty_tpl);?>
</td>
                                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['int_details']['tracking_link']),$_smarty_tpl);?>
</td>
                                                                                        <td class="menu-action">
                                                                                            <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_status == 'Completed') {?>
                                                                                                <a data-original-title="Exam Result Report" data-toggle="tooltip" data-placement="bottom" class="btn menu-icon vd_bd-yellow vd_red" href="index.php?module=file&action=view_dms_exam_result_file&dm_object_id=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
&exam_object_id=<?php echo $_smarty_tpl->tpl_vars['item2']->value['exam_object_id'];?>
" onclick="window.open(this.href, 'mysignupwin', 'left=200,top=150,width=500,height=500,toolbar=1,resizable=0');
                                                                                                        return false;"><i class="fa fa-file-pdf-o"></i>
                                                                                                </a>
                                                                                            <?php }?>
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="vd_content-section clearfix">
                                                            <div class="panel widget panel-bd-left light-widget">
                                                                <div class="panel-body table-responsive">
                                                                    <div class="alert alert-danger alert-dismissable alert-condensed">
                                                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                                <div class="tab-pane" id="insight_access_rights">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>ACCESS RIGHTS </span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['current_access_rights']->value)) {?>
                                                        <table   class="table table-bordered table-striped generate_datatable" title="Access Rights" data-whitespace="pre-wrap" data-ori="landscape" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"cancelled_by"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"cancelled_date"),$_smarty_tpl);?>
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
                                                <div class="tab-pane" id="insight_repetitive_dms">
                                                    <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-retweet"></i>Repetitive DMS </span></h4>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['repetitive_dms_details']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Repetitive DMS" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"deviation_no"),$_smarty_tpl);?>
</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['repetitive_dms_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['repetitive_dm_no_link'];?>
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
                                                        <table class="table table-bordered table-striped generate_datatable" title="Interim Extension" data-ori="landscape" data-pagesize="B4" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['dest_doc_no_link']),$_smarty_tpl);?>
<br><?php echo $_smarty_tpl->tpl_vars['item']->value['dest_doc_name'];
}?></td>
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
                                                    <table class="table table-bordered table-striped generate_datatable audit_trail_result_table" title="Audit trail" data-whitespace="nowrap" data-ori="landscape" data-pagesize="A3" data-sort_column=1>
                                                        <thead>
                                                            <tr>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                                    <input type="hidden" class="query" type="hidden" value="dms_wf_audit_trail">
                                                    <input type="hidden" class="refrence_object_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                        <div class="col-sm-9 col-sm-offset-0"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" href="javascript:void(0);">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a>                                                </div>
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
                            <div class="col-md-8 h4 mgtp-0 mgbt-md-0 pd-0 row"><span class="vd_blue"><strong><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->wf_status;?>
</strong></span>
                                <?php if (!empty($_smarty_tpl->tpl_vars['worklist_pending_details']->value)) {?> <span data-original-title="Pending Details" data-toggle="tooltip" data-placement="bottom"> <i style="cursor: pointer;" data-target="#modal-worklist" data-toggle="modal" class="btn menu-icon vd_bd-red vd_red fa fa-tasks"></i> </span><?php }?>
                            </div>
                            <div class="progress progress-striped active mgtp-5 mgbt-md-0 vd_hover" data-original-title="<div class='mgtp-5 font-semibold'><span><i class='fa fa-circle fa-fw vd_green fa-beat-animation'></i>Completion : </span><span> <?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
</span></div><div class='mgtp-5 font-semibold'><span><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->status;?>
 </span><span> - [<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->wf_status;?>
]</span></div>" data-toggle="tooltip" data-placement="bottom" data-html="true">
                                <div class="progress-bar font-semibold" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
"> <span><?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
</span> </div>
                            </div>
                            <div class="row mgtp-10">
                                <table class="table table-bordered table-hover table-striped mgtp-5">
                                    <thead>
                                        <tr>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"date"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"designation"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"department"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"action"),$_smarty_tpl);?>
</th>
                                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"status"),$_smarty_tpl);?>
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
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['desi'];?>
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
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_product_info"  class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa-fw  fa-cubes vd_red"></i> </div>Product Information </a></li>
                                            <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_desc_imd_action" class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa fa-fw fa-shield vd_red" aria-hidden="true"></i></div>Description , Risk Assesment & Immediate Action Taken</a></li>
                                        </ul>
                                    </div>
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
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <select  class="required" name="udev_type" id="udev_type" required title="Select Valid Deviation Type">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_type_list_master']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_type_id == $_smarty_tpl->tpl_vars['item']->value['object_id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
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
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"classification"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <select class="required" name="udev_classification" id="udev_classification" required title="Select Valid Claasfication">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['classification_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->classification == $_smarty_tpl->tpl_vars['item']->value['object_id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];
echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
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
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date_of_occurrence"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required generate_datepicker date_changed" placeholder="YYYY-MM-DD" name="udev_date_of_occ" id="udev_date_of_occ" readonly required title="Select Valid Date of Occurance" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->date_of_occurrence;?>
" data-datepicker_max="0" data-date_changed="udev_date_of_discover">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"time_of_occurrence"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required generate_timepicker" placeholder="HH:MM AM/PM" name="udev_time_of_occ" id="udev_time_of_occ" required readonly title="Select Valid Time of Occurance"  value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->time_of_occurrence;?>
" data-time_show_secondas=true data-time_show_input=false>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date_of_discovery"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required generate_datepicker" name="udev_date_of_discover" title="Select Valid Date Of Discovery" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->date_of_discovery;?>
" data-datepicker_max=0 data-datepicker_min="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->date_of_occurrence;?>
" required readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"time_of_discovery"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <input type="text" class="required generate_timepicker" name="udev_time_of_discover" title="Select Valid Time Of Discovery" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->time_of_discovery;?>
" data-time_show_secondas="true" data-time_show_input="false" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_related_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <select class="required generate_select2" name="udev_related_to[]" id="udev_related_to" required title="Select Valid Deviation Related To Item" multiple="multiple" style="width:100%">
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_realted_to_list_edit']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <optgroup class="vd_bg-green" label="<?php echo $_smarty_tpl->tpl_vars['item']->value['dev_realted_to'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
]">
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sub_related_to_details'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['dev_realted_to_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_related_to_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_sub_related_exist']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_related_to'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item1']->value['desc'];?>
]</option>
                                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                            </optgroup>
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
                                                            <div class="col-md-8">
                                                                <div class="col-md-3">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                    <div class="controls">
                                                                        <input type="checkbox" class="switch_unchecked" name="udev_meeting"  data-rel="switch" data-size="mini" data-wrapper-class="green" name="adev_meeting"  data-on-text="Yes" data-off-text="No"  title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?>>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'training_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                    <div class="controls mgtp-5">
                                                                        <input type="checkbox" name="udev_training" id="toggle_training" class="is_traing_required switch_unchecked" data-rel="switch"  data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" name="adev_training" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>checked<?php }?>>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 toggle_training" data-toggle_to="toggle_training" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>block<?php } else { ?>none<?php }?>">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'exam_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                    <div class="controls mgtp-5">
                                                                        <input type="checkbox" class="switch_unchecked" name="udev_exam" data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" name="adev_exam" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>checked<?php }?>>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'task_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                    <div class="controls mgtp-5">
                                                                        <input type="checkbox" class="switch_unchecked" name="udev_task"  data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" name="adev_task"   title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>checked<?php }?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"repetitive_dms_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <select class="required generate_select2" name="udev_repetitive_dms_no[]" id="udev_repetitive_dms_no" required title="Repetitive DMS No" multiple="multiple" style="width:100%">
                                                                        <option value="NA" <?php if (count($_smarty_tpl->tpl_vars['repetitive_dms_details']->value) == 0) {?> selected <?php }?>>NA</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['repetitive_dms_list_edit']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_value'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['is_exist']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['drop_down_option'];?>
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
                                    <div class="modal fade" id="edit_product_info" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-60">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_ModalLabel">Edit Product Information - (To be filled only for Products)</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="edit_prod_info-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="edit_prod_info-form" autocomplete="off">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'material_type'),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select  name="udev_mat_id" id="udev_mat_id" title="Select Valid Material Type">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['material_category_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->material_type_id) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['material_type'];?>
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
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"material_name"),$_smarty_tpl);?>
 </label>
                                                                <div  class="controls ">
                                                                    <input type="text" class="" placeholder="Enter material name" name="udev_mat_name" id="udev_mat_name" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->material_name;?>
" title="Enter Material Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'product_name'),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select name="udev_prod_name" id="udev_prod_name" title="Select Valid Product Name">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->product_id) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
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
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'scope'),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select name="udev_scope" id="udev_scope" title="Select Valid Market Name">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marketlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->scope) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['market_name'];?>
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
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'customer'),$_smarty_tpl);?>
</label>
                                                                <div  class="controls">
                                                                    <select  name="udev_customer" id="udev_customer" title="Select Valid Customer Name">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customerlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->customer) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['customer_name'];?>
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
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"batch_no"),$_smarty_tpl);?>
 </label>
                                                                <div class="controls">
                                                                    <input type="text" placeholder="Enter batch no" name="udev_batch_no" id="udev_batch_no" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->batch_no;?>
" title="Enter Batch No">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"batch_size"),$_smarty_tpl);?>
 </label>
                                                                <div  class="controls">
                                                                    <input type="text" placeholder="Enter batch size" name="udev_batch_size" id="udev_batch_size" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->batch_size;?>
" title="Enter Batch Size">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"lot_no"),$_smarty_tpl);?>
 </label>
                                                                <div class="controls">
                                                                    <input type="text" placeholder="Enter lot no" name="udev_lot_no" id="udev_lot_no" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->lot_no;?>
" title="Enter Lot No">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"processing_stage"),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <select name="udev_processing_stage" id="udev_processing_stage" title="Select Valid Process Stage">
                                                                        <option value="">Select</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['process_stage_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->process_stage_id) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['process_stage'];?>
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
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"manu_date"),$_smarty_tpl);?>
</label>
                                                                <div class="controls">
                                                                    <input type="text" class="generate_datepicker date_changed" placeholder="YYYY-MM-DD" name="udev_manu_date" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_date;?>
" title="Select Valid Manufacturing Date" data-datepicker_max=0 data-date_changed="udev_manu_expiry_date">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"manu_expiry_date"),$_smarty_tpl);?>
</label>
                                                                <div  class="controls">
                                                                    <input type="text" class="generate_datepicker" placeholder="YYYY-MM-DD" name="udev_manu_expiry_date" value="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_expiry_date;?>
" title="Select Valid Expiry Date" data-datepicker_min="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_date;?>
">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0" >
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="audit_trail_action" value="Update Product Details">
                                                                    <input type="hidden" name="update_prod_details">
                                                                    <button class="btn vd_bg-green vd_white" type="submit"  id="update_prod_details"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span> Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="edit_desc_imd_action" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog width-60">
                                            <div class="modal-content">
                                                <div class="modal-header vd_bg-dark-green vd_white">
                                                    <button type="button" class="close" data-dismiss="modal"  aria-hidden="true"><i class="fa fa-times"></i></button>
                                                    <h4 class="modal-title" id="edit_ModalLabel">Edit Description , Risk Assesment & Immediate Action Taken</h4>
                                                </div>
                                                <div class="modal-body pd-15">
                                                    <form name="edit_desc_risk_ass_immed_action-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="edit_desc_risk_ass_immed_action-form" autocomplete="off">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"description"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter description" rows="3" class="width-100" name="udev_desc"  required title="Enter Valid Description"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->description;?>
</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"risk_impact_assess"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter impact assessment" rows="3" class="width-100" name="udev_risk_impact" required  title="Enter Valid Impact Assessment"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->risk_impact_assessment;?>
</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"immed_action_taken"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div class="controls">
                                                                    <textarea placeholder="Enter immediate action taken" rows="3" class="width-100" name="udev_imd_action" required title="Enter Valid Action Taken"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->immed_action_taken;?>
</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0" >
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" name="audit_trail_action" value="Update Description , Risk Assesment & Immediate Action Taken">
                                                                    <input type="hidden" name="updatedesc_risk_ass_immed_action">
                                                                    <button class="btn vd_bg-green vd_white" type="submit" id="updatedesc_risk_ass_immed_action"><span class="menu-icon"><i class="fa fa-fw fa-edit"></i></span> Update</button>
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
                                                                <button type="button"  class="btn menu-icon vd_bd-red vd_red delete_file" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom" data-file_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><i class="fa fa-trash-o"></i></button>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['request_pre_review_dept_approve_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestreviewdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequestreviewdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body"> 
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">REQUEST PRE-REVIEW | DEPARTMENT APPROVAL FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3 pd-0">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"req_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="request_pre_review_type">
                                                        <option value="">Select</option>
                                                        <option value="request_pre_review">Pre-Review</option>
                                                        <option value="request_dept_approve">Department Head Approval</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body panel-bd-left mgtp-5 request_pre_review_type" style="display: none;" id="request_pre_review">
                                    <!-- Request Pre Review Form -->
                                    <form name="request_pre_review-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="request_pre_review-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-md-3 pd-0">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                    <div class="controls">
                                                        <select onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                <div class="col-md-4 mgl-10">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                    <div class="controls">
                                                        <select name="department" id="department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#pre_review_from_users', 'multiselect');" title="Select Valid Department">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                <div class="controls">
                                                    <div class="col-md-3 pd-0">
                                                        <select name="pre_review_from[]" id="pre_review_from_users" class="generate_multiselect form-control" size="7" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <br>
                                                        <button type="button" id="pre_review_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="pre_review_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="pre_review_from_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="pre_review_from_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-md-3 pd-0">
                                                        <select name="pre_review_to[]" id="pre_review_from_users_to"  class="form-control" size="7" multiple="multiple"  title="Select Valid User Name"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-7">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly provide your pre-review comments" rows="2" class="required" name="wf_remarks" id="wf_remarks" required  title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="request_pre_review" >
                                            <input type="hidden" name="audit_trail_action" value="Send To Pre Review">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="request_pre_review"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel-body panel-bd-left mgtp-5 request_pre_review_type" id="request_dept_approve" style="display: none;">
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
                                                    <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['show_pre_review_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">   
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">PRE-REVIEW FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <!-- Review Form -->
                                        <form name="pre_review-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="pre_review-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="Enter Review Comments" rows="3" class="required" name="review_comments" id="review_comments" required title="Enter Valid Review Comments"></textarea>
                                                    </div>
                                                </div>                                             
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="pre_reviewed">
                                                <input type="hidden" name="audit_trail_action" value="Add Preview Comments">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="pre_reviewed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Pre-review</button>
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
                                                        <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div  class="controls  ">
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
                                                            <div  class="controls  ">
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
            <?php if (!empty($_smarty_tpl->tpl_vars['request_cft_assessment_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">   
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel widget light-widget">
                                        <form name="request_cft_assessment-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="request_cft_assessment-form" autocomplete="off">
                                            <div class="panel-heading bordered vd_bg-blue">
                                                <h3 class="panel-title vd_white font-semibold">REQUEST FOR CFT ASSESSMENT FORM</h3>
                                            </div>
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-3">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                            <div class="controls">
                                                                <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                </div>
                                            </div>
                                            <div class="light-widget">
                                                <?php $_smarty_tpl->_subTemplateRender("file:pass_auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                                            </div>
                                            <div class=" panel-bd-left">
                                                <div class="panel-body">
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="request_cft_assessment">
                                                        <input type="hidden" name="audit_trail_action" value="Send To CFT Assessment">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="request_cft_assessment"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Send</button>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['show_cft_assessment_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowreview" class="panel-collapse collapse">
                        <div class="panel-body">   
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">CFT ASSESMENT FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <!-- Review Form -->
                                        <form name="cft_assesment-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="cft_assesment-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"cft_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="Enter CFT Assesment Comments" rows="3" class="required" name="cft_comments" required title="Enter Valid CFT Assesment Comments"></textarea>
                                                    </div>
                                                </div>                                             
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="cft_assesed">
                                                <input type="hidden" name="audit_trail_action" value="Add CFT Assesment Comments">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="cft_assesed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['assign_investgator_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">     
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN INVESTIGATOR FORM</h3>
                                </div>
                                <div class="panel-body panel widget panel-bd-left light-widget">
                                    <form name="assign_investigator-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="assign_investigator-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                <div class="controls">
                                                    <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#invest_drop');" title="Select Valid Plant">
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
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="" name="department" id="invest_drop" onchange="get_dept_users(this.options[this.selectedIndex].value, '#responsible_person')"; title="Select Valid Department">
                                                        <option value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"investigator"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <select name="responsible_person" id="responsible_person" title="Select Valid Person"><option value="">Select</option> </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <input type="text" class="generate_datepicker"  placeholder="DD/MM/YY" name="invest_target_date" id="invest_target_date" data-datepicker_min=0>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"investigation_details"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <textarea placeholder="(e.g.) Enter Investigation Details" rows="3" class="required" name="investigation_details" id="investigation_details" required title="Enter Valid Investigation Details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="assign_investigator">
                                            <input type="hidden" name="audit_trail_action" value="Assign Investigator">
                                            <button class="btn vd_bg-green vd_white" type="submit"  id="assign_investigator"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['investigation_feedback_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowinvestigation"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowinvestigation" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">INVESTIGATION FEEDBACK FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <form name="investigation_feedback-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="investigation_feedback-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"invest_feedback"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Kindly provide the comprehensive feedback on the investigation" rows="3" class="required" name="uinst_investigation_feedback" id="uinst_investigation_feedback" required title="Enter Valid wFeedback"><?php echo $_smarty_tpl->tpl_vars['latest_invest_details']->value->investigator_feedback;?>
</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"probable_rc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Kindly enter the Probable Root Cause" rows="3" class="required" name="uinst_root_cause" id="uinst_root_cause" required title="Enter Valid Root Cause"><?php echo $_smarty_tpl->tpl_vars['latest_invest_details']->value->root_cause;?>
</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="investigation_completed">
                                                <input type="hidden" name="audit_trail_action" value="Investigation Completed">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="investigation_completed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_investigation_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['investigation_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_investigation_review']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">     
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">INVESTIGATION REVIEW FORM</h3>
                                </div>
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
                                                <select class="show_hide_ele" name="invest_review_type" required title="Select Valid Review Type" data-hide_forms="invest_review">
                                                    <option value="">Select</option>
                                                    <option value="invest_review_div">Reveiw</option>
                                                    <option value="invest_review_need_correction_div">Needs Correction</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invest_review" id="invest_review_div" style="display:none;">
                                    <form name="invest_reviewed-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="invest_reviewed-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">                                           
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"review_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="Kindly provide investigation review comments" rows="4" class="required" name="uinst_dept_head_review" id="uinst_dept_head_review" required title="Enter Valid Remarks"></textarea>
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
                                                    <input type="hidden" name="invest_reviewed">
                                                    <input type="hidden" name="audit_trail_action" value="Investigation Review">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  id="invest_reviewed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Reviewed</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="invest_review" id="invest_review_need_correction_div" style="display:none;">
                                    <form name="invest_review_need_correction-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="invest_review_need_correction-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="(e.g.) Kindly provide brief corrction details" rows="4" class="required" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
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
                                                    <input type="hidden" name="invest_review_need_correction">
                                                    <input type="hidden" name="audit_trail_action" value="Investigation Review">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  id="invest_review_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span> Needs Correction</button>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['show_investigation_verification']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowdeptapprove"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseshowdeptapprove" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">     
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">INVESTIGATION VERIFICATION FORM</h3>
                                </div>
                                <div>
                                    <form name="invest_verification-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="invest_verification-form" autocomplete="off">
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">                                           
                                                <div class="form-group mgbt-md-0">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"qa_verification"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="Kindly provide investigation verification comments" rows="4" class="required" name="uinst_qa_reviewer_review" id="uinst_qa_reviewer_review" required title="Enter Valid Verification Comments"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-heading bordered vd_bg-blue  mgtp-5">
                                            <h3 class="panel-title vd_white font-semibold">SEND TO QA APPROVAL</h3>
                                        </div>
                                        <div class="widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                        <div class="controls">
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                        <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="control">
                                                            <select name="department" id="qa_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'qa_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls ">
                                                            <select name="qa_approver_user" id="userid" required title="Select Valid User Name">
                                                                <option value="">Select</option>
                                                            </select>
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
                                                    <input type="hidden" name="request_qa_approval">
                                                    <input type="hidden" name="audit_trail_action" value="Investigation Verification and Send To QA Approval">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="request_qa_approval"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_pre_review_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_dept_head_approve_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_qa_reviewer_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_cft_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_investigator_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseRecallinvest"> Recall <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseRecallinvest" class="panel-collapse collapse ">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">RECALL FROM INVESTIGATOR FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group col-md-12">
                                                <div class="col-md-2">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"recall_from"),$_smarty_tpl);?>
 &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp; <?php echo $_smarty_tpl->tpl_vars['latest_invest_details']->value->investigated_by;?>
</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">ASSIGN NEW INVESTIGATOR FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <div class="panel-body">
                                        <form name="recall_investigator-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="recall_investigator-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-md-12">
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                        <div class="controls">
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#invest_drop');" title="Select Valid Plant">
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <select class="" name="department" id="invest_drop" onchange="get_dept_users(this.options[this.selectedIndex].value, '#responsible_person', null, '<?php echo $_smarty_tpl->tpl_vars['latest_invest_details']->value->investigated_by_id;?>
');" title="Select Valid Department">
                                                                <option value="">Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"replaced_by"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <select  name="responsible_person" id="responsible_person" title="Select Valid Person"><option value="">Select</option> </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>

                                                            <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <input type=text class="generate_datepicker"  data-datepicker_min="0" name="invest_target_date"  placeholder="DD/MM/YYYY" title="Select Valid Target Date" value="<?php echo $_smarty_tpl->tpl_vars['latest_invest_details']->value->target_date1;?>
">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"investigation_details"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="(e.g.) Enter Investigation Details" rows="3" class="required" name="investigation_details" id="investigation_details" required title="Enter Valid Investigation Details"><?php echo $_smarty_tpl->tpl_vars['latest_invest_details']->value->investigation_details;?>
</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <textarea placeholder="(e.g.) Enter Valid Reason" rows="3" class="required" name="recall_reason" id="recall_reason" required title="Enter Valid Reason"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="recall_investigator">
                                                <input type="hidden" name="audit_trail_action" value="Recall Investigator">
                                                <button class="btn vd_bg-green vd_white" type="submit"  id="recall_investigator"> <span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span>Recall</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_invest_qa_approval_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequest_invest"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequest_invest" class="panel-collapse collapse">
                        <div class="panel-body"> 
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">REQUEST INVESTIGATION FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3 pd-0">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"req_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="request_invest_type">
                                                        <option value="">Select</option>
                                                        <option value="request_investigation_div">Required</option>
                                                        <option value="request_qa_approver">Not Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mgtp-5 request_invest_type" style="display: none;" id="request_investigation_div">
                                    <!-- Investigation Required Send To Dept Head -->
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">SEND TO DEPARTMENT HEAD</h3>
                                    </div>
                                    <form name="investigation_required-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal panel-body panel-bd-left" role="form" id="investigation_required-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group mgbt-md-0">
                                            <div class="col-md-12">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea placeholder="(e.g.) Kindly assign a person for investigation" rows="4" class="required" name="wf_remarks" id="wf_remarks" required  title="Enter Valid Remarks"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                            <input type="hidden" name="investigation_required" >
                                            <input type="hidden" name="audit_trail_action" value="Send to Dept Head to Assign Investigator">
                                            <button class="btn vd_bg-green vd_white" type="submit" id="investigation_required"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mgtp-5 request_invest_type" id="request_qa_approver" style="display: none;">
                                    <!-- Investigation Not Required Send To QA Approver -->
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">SEND TO QA APPROVER</h3>
                                    </div>
                                    <form name="request_qa_approval-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
"  class="form-horizontal panel-body panel-bd-left" role="form" id="request_qa_approval-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                <div class="controls">
                                                    <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department" id="qa_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'qa_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls ">
                                                    <select name="qa_approver_user" id="userid" required title="Select Valid User Name">
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
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_qa_approver_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

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
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                <div class="form-group mgbt-md-0 date_diff">
                                                    <div class="col-md-2">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <select type="text" class="" name="udev_type" required title="Select Valid Deviation Type">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_type_list_master']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_type_id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"classification"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <select  name="udev_classification"  title="Select Valid Classification">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['classification_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['dm_master_obj']->value->classification) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"closeout_target_date"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <input type=text id="close_out_target_date" class="generate_datepicker show_date_diff" data-datepicker_min="0"  name="udev_target_date"  placeholder="DD/MM/YYYY" title="Select Valid Target Date" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 mgtp-20 pd-0">
                                                        <div class="mgtp-10"></div>
                                                        <span class="date_diff_days font-semibold label label-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_related_to"),$_smarty_tpl);?>
<span class="vd_red"> *</span></label>
                                                        <div class="controls">
                                                            <select class="required generate_select2" name="udev_related_to[]"  required title="Select Valid Deviation Related To Item" multiple="multiple" style="width:100%">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_realted_to_list_edit']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value['dev_realted_to'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['desc'];?>
]">
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sub_related_to_details'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['dev_realted_to_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_related_to_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_sub_related_exist']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_related_to'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item1']->value['desc'];?>
]</option>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </optgroup>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="alert alert-info mgbt-md-0"> 
                                                    <span class="vd_alert-icon"><i class="fa fa-info-circle vd_red"></i></span><strong>Note!</strong>
                                                    When setting target dates for meeting, training , exam and tasks, allocate extra time for the close-out target date. This buffer time allows you to close the dms on time.
                                                </div>
                                                <div class="form-group panel-body mgbt-md-0 pd-15">
                                                    <div class="input-border panel-body pd-15">
                                                        <!--Start Meeting Switch,Target Date -->
                                                        <div class="form-group date_diff">
                                                            <div class="form-label col-md-2 font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-1">
                                                                <input type="checkbox" class="switch_unchecked" id="udev_meeting" name="udev_meeting"  data-rel="switch" data-size="mini" data-wrapper-class="green"   data-on-text="Yes" data-off-text="No" title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?>>
                                                            </div>
                                                            <div class="form-label col-md-1 font-semibold meeting_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>block<?php } else { ?>none<?php }?>"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-2 meeting_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>block<?php } else { ?>none<?php }?>">
                                                                <input type=text class="generate_datepicker show_date_diff " data-datepicker_min="0" name="udev_meeting_date" title="Select Valid Target Date" disabled readonly>
                                                            </div>
                                                            <div class="col-md-1 pd-0 mgtp-5">
                                                                <span class="date_diff_days font-semibold meeting_days label label-danger"></span>
                                                            </div>
                                                        </div>
                                                        <!--End Meeting Switch,Target Date -->
                                                        <!--Start Training Switch,Target Date -->
                                                        <div class="form-group date_diff">
                                                            <div class="form-label col-md-2 font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'training_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-1">
                                                                <input type="checkbox" id="udev_training" name="udev_training" class="switch_unchecked" data-rel="switch"  data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>checked<?php }?>>
                                                            </div>
                                                            <div class="form-label col-md-1 font-semibold training_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>block<?php } else { ?>none<?php }?>"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-2 training_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>block<?php } else { ?>none<?php }?>">
                                                                <input type=text class="generate_datepicker show_date_diff" data-datepicker_min="0" name="udev_training_date" title="Select Valid Target Date" disabled readonly>
                                                            </div>
                                                            <div class="col-md-1 pd-0 mgtp-5">
                                                                <span class="date_diff_days font-semibold training_days label label-danger"></span>
                                                            </div>
                                                        </div>
                                                        <!--End Meeting Switch,Target Date -->
                                                        <!--Start Exam Switch,Target Date -->
                                                        <div class="form-group date_diff exam_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>block<?php } else { ?>none<?php }?>">
                                                            <div class="form-label col-md-2 font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'exam_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-1">
                                                                <input type="checkbox" class="switch_unchecked" id="udev_exam" name="udev_exam" data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>checked<?php }?>>
                                                            </div>
                                                            <div class="form-label col-md-1 font-semibold exam_toggle_date" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>block<?php } else { ?>none<?php }?>"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-2 exam_toggle_days" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>block<?php } else { ?>none<?php }?>">
                                                                <input type=text class="generate_datepicker show_date_diff " data-datepicker_min="0" name="udev_exam_date" title="Select Valid Target Date" disabled readonly>
                                                            </div>
                                                            <div class="col-md-1 pd-0 mgtp-5">
                                                                <span class="date_diff_days font-semibold exam_days label label-danger"></span>
                                                            </div>
                                                        </div>
                                                        <!--End Meeting Switch,Target Date -->
                                                        <!--Start Task Switch,Target Date -->
                                                        <div class="form-group date_diff">
                                                            <div class="form-label col-md-2 font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'task_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-1">
                                                                <input type="checkbox" class="switch_unchecked" id="udev_task" name="udev_task"  data-rel="switch" data-size="mini" data-wrapper-class="green" data-on-text="Yes" data-off-text="No" title="Select Valid Option" data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>checked<?php }?>>
                                                            </div>
                                                            <div class="form-label col-md-1 font-semibold task_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>block<?php } else { ?>none<?php }?>"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                            <div class="controls col-md-2 task_toggle" style="display:<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>block<?php } else { ?>none<?php }?>">
                                                                <input type=text class="generate_datepicker show_date_diff " data-datepicker_min="0" name="udev_task_date" title="Select Valid Target Date" disabled readonly>
                                                            </div>
                                                            <div class="col-md-1 pd-0 mgtp-5">
                                                                <span class="date_diff_days font-semibold task_days label label-danger"></span>
                                                            </div>
                                                        </div>
                                                        <!--End Meeting Switch,Target Date -->
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
                                        <div class="panel widget panel-bd-left light-widget">
                                            <div class="panel-body">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <div class="col-md-12 row mgbt-md-0">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"rejected_reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <textarea placeholder="Enter reason for rejection" rows="3" name="udev_reject_reason" title="Enter Valid Reason"></textarea>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['request_qa_approve_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequest_invest"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequest_invest" class="panel-collapse collapse">
                        <div class="panel-body"> 
                            <div class="vd_content-section clearfix">

                                <!-- Investigation Not Required Send To QA Approver -->
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">SEND TO QA APPROVER</h3>
                                </div>
                                <form name="request_qa_approval-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
"  class="form-horizontal panel-body panel-bd-left" role="form" id="request_qa_approval-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i  class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>  Change a few things up and try submitting again.
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                            <div class="controls">
                                                <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                            <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="control">
                                                <select name="department" id="qa_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'qa_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="controls ">
                                                <select name="qa_approver_user" id="userid" required title="Select Valid User Name">
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
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_meeting_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['meeting_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_meeting_schedule_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestshow_meet_schedule"> Action </a> </h4>
                    </div>
                    <div id="collapserequestshow_meet_schedule" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">MEETING SCHEDULE FORM</h3>
                                    </div>
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
                                                            <input type="text" class="generate_datepicker" name="meeting_date" title="Select Valid Meeting Date" data-datepicker_min=0 data-datepicker_max="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->meeting_target_date;?>
">
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
                                                            <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                            <select name="department" id="department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#participant_from_users', 'multiselect', '<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->created_by;?>
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
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_meeting_schedule_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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
                                                        <input type=text class="generate_datepicker" name="rmeeting_date" id="rmeeting_date"  title="Select Valid Meeting Date" data-datepicker_min=0 data-datepicker_max=<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->meeting_target_date;?>
 value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_date'];?>
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
                                                                            <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"meeting_agenda"),$_smarty_tpl);?>
</th>
                                                                            <th> <?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"meeting_conclusion"),$_smarty_tpl);?>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['show_trainer_assign_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"  href="#collapserequestshowassign_trainer"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequestshowassign_trainer" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">ASSIGN TRAINER FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="assign_trainer-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" enctype="multipart/form-data"  role="form" id="assign_trainer-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"title"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls ">
                                                        <input type="text" class="dupliate_field_val_req" name="title[]" title="Enter Valid Title" data-dupliate_field="trainig_title" data-duplicate_msg="Training Title Cannot Be Same">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"training_target_date"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div class="controls ">
                                                        <input type="text" readonly="" value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date),$_smarty_tpl);?>
">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group trainer_row">
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                    <div class="controls">
                                                        <select  onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, '.trainer_row', '.trainer_dept_drop'));" title="Select Valid Plant">
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
</label>
                                                    <div class="control">
                                                        <select class="trainer_dept_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'training', this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.trainer_row', '.trainer_id'));" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"user_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div class="controls ">
                                                        <select name="trainers[]" class="trainer_id" required title="Select Valid User Name">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-11">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"remarks"),$_smarty_tpl);?>

                                                        <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="(e.g.) Kindly schedule training" rows="3" name="wf_remarks" id="wf_remarks" maxlength="500" required title="Enter Valid Remarks"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="assign_to_trainer">
                                                <input type="hidden" name="audit_trail_action" value="Assign Trainer">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="assign_to_trainer"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_training_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['training_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['training_schedule_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"href="#collapserequestshow_train_schedule"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequestshow_train_schedule" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">TRAINING SESSION SCHEDULE FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="training_schedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="training_schedule-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trainer_wise_training_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <div class="form-group pd-10 2d_parent">
                                                    <input type="hidden" class="trainer_object_id" name="trainer_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
">
                                                    <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                        <div class="row mgbt-md-0">
                                                            <div class="col-md-1">                                                           
                                                                <button class="btn vd_bg-green vd_white add_more_training_session_schedule" type="button" onclick="add_element('.training_schedule_child_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
', '.training_schedule_parent_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                            </div>
                                                            <div class="col-md-10 font-semibold mgl-10">
                                                                <h3><span class="label vd_bg-blue"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="training_schedule_parent_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 training_schedule_parent_ele">
                                                        <div class="pd-15 training_schedule_child_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 input-border training_schedule_div">
                                                            <h3><span class="label vd_bg-blue"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</span></h3>
                                                            <div class="form-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"session"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls ">
                                                                        <input type="text" class="dupliate_field_val_req training_session" name="session[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Enter Valid Session Name" data-dupliate_field="trainig_session_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-duplicate_msg="Training session can not be same">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"training_date"),$_smarty_tpl);?>

                                                                        <span class="vd_red">*</span></label>
                                                                    <div  class="controls">
                                                                        <input type=text class="generate_datepicker training_date" name="training_date[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]"  placeholder="DD/MM/YYYY" title="Select Valid Training Date" data-datepicker_min="0" data-datepicker_max="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date;?>
">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"training_time"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                                    <div  class="controls">
                                                                        <input type=text class="generate_timepicker training_time" name="training_time[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" placeholder="HH:MM AM/PM" title="Select Valid Training Time">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ccm",'attribute'=>"venue"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type=text class="training_venue" name="training_venue[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" id="training_venue" placeholder="(e.g.) Training hall" title="Enter valid venue">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'target_date'),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date),$_smarty_tpl);?>
">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 pd-0">
                                                                    <label class="control-label"></label>
                                                                    <div class="controls mgtp-5">
                                                                        <button class="btn vd_bg-red vd_white delete_ele" type="button" data-delete_ele=".training_schedule_child_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-11 verfiy_parent">
                                                                    <div class="col-md-12 pd-0">
                                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"online_meeting_link"),$_smarty_tpl);?>
</label>
                                                                        <div  class="controls"><textarea name="training_link[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" class="verify_link" placeholder="Enter Online Meeting Link" rows="1"></textarea></div>
                                                                        <div  class="controls font-semibold verify_div" style="display:none;">Verify Link : <a class="vd_blue verify_tag reset_ele" target="_blank"></a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-3 pd-0">
                                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                                        <div class="controls">
                                                                            <select onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, '.training_schedule_child_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
', '.training_schedule_dept'));" title="Select Valid Plant">
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
                                                                            <select class="training_schedule_dept" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.training_schedule_child_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
', '.training_invites_id'), 'multiselect', lm_dom.array_join(lm_dom.find_in_parent(this, '.training_schedule_parent_ele_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
', '.training_invites option').map((_, el) => $(el).val()).get(), ','));" title="Select Valid Department">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mgbt-md-0">
                                                                <div class="col-md-12 dyn_ms">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"schedule_to"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                                    <div class="controls row">
                                                                        <div class="col-md-3">
                                                                            <select id="trainee_from_users_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="training_invites_id form-control training_invites_from generate_multiselect" size="5" multiple="multiple"></select>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <button type="button" id="trainee_from_users_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_rightAll" class="ms_rightAll btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                            <button type="button" id="trainee_from_users_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_rightSelected" class="ms_rightSelected btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                            <button type="button" id="trainee_from_users_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_leftSelected" class="ms_leftSelected btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                            <button type="button" id="trainee_from_users_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_leftAll" class="ms_leftAll btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <select name="participants[<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
][0][]" id="trainee_from_users_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_to" class="form-control ms_to training_invites 3d_array" size="5" multiple="multiple" title="Select valid user" data-3dname="participants"></select>
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

                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="training_scheduled">
                                                <input type="hidden" name="audit_trail_action" value="Add Training Schedule">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="training_scheduled"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['rescheduled_taining_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequestshow_train_reschedule"> Training Session Reschedule <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequestshow_train_reschedule" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">TRAINING SESSION RESHEDULE FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">
                                        <form name="training_reschedule-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="training_reschedule-form" autocomplete="off">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="col-md-1">
                                                            <div class="vd_checkbox checkbox-danger">
                                                                <input type="checkbox" class="select_all_reschedule_training" value="1" id="remove_select_all_reschedule">
                                                                <label class="width-100" for="remove_select_all_reschedule"></label>
                                                            </div>
                                                        </th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"session"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"training_date"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"training_time"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"venue"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"rescheduled_date"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"rescheduled_time"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"venue"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['eligible_rescheduled_training_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr>
                                                            <td> 
                                                                <div class="vd_checkbox checkbox-danger">
                                                                    <input type="checkbox" name="training_reschedule_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
" class="reschedule_training" id="reschedule_training_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" title="Select Atleast One Schedule">
                                                                    <label class="width-100" for="reschedule_training_checkbox_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></label>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['session'];?>
<input type="hidden" name="training_rescheduled_session[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['session'];?>
"></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['training_date'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['training_time'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['venue'];?>
</td>
                                                            <td>
                                                                <input type="text" class="generate_datepicker training_reschedule_date reschedule_training_ed" id="training_reschedule_date_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="training_rescheduled_date[]" placeholder="DD/MM/YY"  data-datepicker_min=0 data-datepicker_max="<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date;?>
" title="Select Valid Date" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="generate_timepicker training_reschedule_time reschedule_training_ed" id="training_reschedule_time_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name="training_rescheduled_time[]" title="Select Valid Time"  data-duplicate_msg="Can not schedule two training at a time" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="reschedule_training_ed training_reschedule_venue" name="training_rescheduled_venue[]" title="Enter Valid Venue" disabled>
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
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reason"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="Enter Valid Reason" rows="3"  name="resched_reason" required title="Enter Valid Reason"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Training Reschedule">
                                                <input type="hidden" name="training_rescheduled">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="training_rescheduled"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Re-Schedule</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?> 
            <?php if (!empty($_smarty_tpl->tpl_vars['update_trainees_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"   href="#collapserequestshow_update_trainees"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapserequestshow_update_trainees" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">UPDATE TRAINING ATTENDANCE AND COMPLETION FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">                                                               
                                        <div class="form-group col-md-12 row">
                                            <div class="col-md-3 row mgbt-md-0">
                                                <label class="control-label">Update Training Status <span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="update_training">
                                                        <option value="">Select</option>
                                                        <option value="update_trainee-form">Update Trainees</option>
                                                        <?php if ($_smarty_tpl->tpl_vars['show_training_completion_button']->value) {?><option value="training_completed-form">Training Completed</option><?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Of Update Trainees -->
                                        <form name="update_trainee-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal update_training" role="form" id="update_trainee-form" autocomplete="off" style="display:none">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="col-md-3 row mgbt-md-0">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"session"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <select name="update_training_sch_id" id="update_trainess_training" title="Select Valid Traing Session Schedule">
                                                                <option value="">Select</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elegible_training_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <optgroup label="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
">
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['schedule_details'], 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['schedule_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item2']->value['session'];?>
 [<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['training_date']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['item2']->value['training_time'];?>
]</option>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    </optgroup>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mgtp-10">
                                                        <div class="controls update_trainee_status mgtp-20">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"attendees"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                    <div class="controls row">
                                                        <div class="col-md-3">
                                                            <select id="attendee_from_users" class="attendee_users form-control generate_multiselect" size="7" multiple="multiple">
                                                            </select>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <br>
                                                            <button type="button" id="attendee_from_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                            <button type="button" id="attendee_from_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                            <button type="button" id="attendee_from_users_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                            <button type="button" id="attendee_from_users_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select name="trainees[]" id="attendee_from_users_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-info">
                                                <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>Please record attendance for each session individually until all sessions have been accounted. Once attendance for all sessions are captured, the training completion option will be enabled</strong>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="update_training_attn_button">
                                                <input type="hidden" name="audit_trail_action" value="Training Attendence">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="update_training_attn_button"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                            </div>
                                        </form>
                                        <!-- End Of Update Trainees -->   
                                        <!--Start Training Completed -->
                                        <form name="training_completed-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal update_training" role="form" id="training_completed-form" autocomplete="off" style="display:none">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div  class="controls">
                                                                <textarea placeholder="(e.g.) Attendance updated and meeting completed" rows="4" name="wf_remarks" id="wf_remarks" required title="Enter Valid Remarks"></textarea>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="training_completed">
                                                        <input type="hidden" name="audit_trail_action" value="Training Completion">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="training_completed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Complete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Of Training Completed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_exam_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['exam_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['show_question_pre_button']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"   href="#collapse_quest_pre"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_quest_pre" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel widget light-widget">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">QUESTION PREPARATION | ASSIGN EXAM FORM</h3>
                                    </div>
                                    <div class="panel-body panel-bd-left">                                                               
                                        <div class="form-group col-md-12 row">
                                            <div class="col-md-3 row mgbt-md-0">
                                                <label class="control-label">Question Prepartion | Assign exam<span class="vd_red">*</span></label>
                                                <div  class="controls">
                                                    <select class="show_hide_ele" data-hide_forms="qns_prep_exam">
                                                        <option value="">Select</option>
                                                        <option value="add_qns-form">Question Preparation</option>
                                                        <?php if ($_smarty_tpl->tpl_vars['show_exam_assign_button']->value) {?><option value="assign_exam-form">Assign exam</option><?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Of Question Preparation -->
                                        <form name="add_qns-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal qns_prep_exam col-md-12 row" role="form" id="add_qns-form" autocomplete="off" style="display:none">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trainer_training_details']->value, 'item1', false, 'key1', 'list1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?> 
                                                <div class="qns_pre_parent_ele">
                                                    <input type="hidden" name="trainer_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['object_id'];?>
" title="Invalid Trainer or Training Details">
                                                    <input type="hidden" class="qna_index" value="<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
">
                                                    <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                        <div class="row mgbt-md-0">
                                                            <div class="col-md-9 font-semibold">
                                                                <span><i class="fa fa-circle fa-fw vd_green append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item1']->value['title'];?>
</span>
                                                            </div>
                                                            <div class="col-md-3 text-right">
                                                                <button class="btn vd_bg-green vd_white add_more_tf" type="button"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add True|False</button>
                                                                <button class="btn vd_bg-green vd_white add_more_mcq" type="button"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add MCQ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mgbt-md-0">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-striped mgbt-md-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="col-md-5"> <?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'question'),$_smarty_tpl);?>
<span class="vd_red">*</span></th>
                                                                        <th class="col-md-6"> <?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'answer'),$_smarty_tpl);?>
<span class="vd_red">*</span></th>
                                                                        <th class="col-md-1"> <?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'order'),$_smarty_tpl);?>
 - <?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'action'),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="qna_parent_ele">
                                                                    <?php if (($_smarty_tpl->tpl_vars['qna_list']->value)) {?>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qna_list']->value, 'qna_item1', false, 'qna_key1', 'qna_list1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['qna_key1']->value => $_smarty_tpl->tpl_vars['qna_item1']->value) {
?> 
                                                                            <!-- If True | False Questions -->   
                                                                            <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['type'] == 'true_false') {?>
                                                                                <tr class="qna_child_ele tf_qna">  
                                                                                    <td>
                                                                                        <textarea rows="2" class="dupliate_field_val_req atf_qns" type="text" placeholder="Enter True | False Question"  name="atf_qns[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Question" data-dupliate_field="tf_qna_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['question'];?>
</textarea>
                                                                                    </td>             
                                                                                    <td>
                                                                                        <select class="atf_qns_ans" name="atf_qns_ans[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Select Valid Answer"><option value="">Select</option><option value="1" <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['answer_no'] == 1) {?>selected<?php }?>>True</option><option value="2" <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['answer_no'] == 2) {?>selected<?php }?>>False</option></select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="dupliate_field_val_req qna_order" type="number" name="atf_qns_order[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" placeholder="Order" min="1" title="Enter Valid Order" data-dupliate_field="question_order_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['order'];?>
">
                                                                                        <button class="btn vd_bg-red vd_white delete_qna delete_ele" type="button" data-delete_from=".qns_pre_parent_ele" data-delete_ele=".qna_child_ele"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } else { ?>
                                                                                <!-- If MCQ Questions -->  
                                                                                <tr class="qna_child_ele mcq_qna">   
                                                                                    <td>
                                                                                        <textarea rows="6" class="dupliate_field_val_req amc_qns" type="text" placeholder="Enter Multiple Choice Question" name="amc_qns[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Question" data-dupliate_field="mcq_qna_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['question'];?>
</textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="col-md-6 pd-0">
                                                                                            <label class="control-label">Choice 1</label>
                                                                                            <input class="amc_qns_opt1" type="text" placeholder="Enter Valid Option" name="amc_qns_opt1[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Option" value="<?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['qns_options'][0]['option'];?>
">
                                                                                        </div>
                                                                                        <div class="col-md-6 pd-0">
                                                                                            <label class="control-label">Choice 2</label>
                                                                                            <input class="amc_qns_opt2" type="text" placeholder="Enter valid option" name="amc_qns_opt2[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Option" value="<?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['qns_options'][1]['option'];?>
">
                                                                                        </div>
                                                                                        <div class="col-md-6 pd-0">
                                                                                            <label class="control-label">Choice 3</label>
                                                                                            <input class="amc_qns_opt3" type="text" placeholder="Enter Valid Option" name="amc_qns_opt3[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Option" value="<?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['qns_options'][2]['option'];?>
">
                                                                                        </div>
                                                                                        <div class="col-md-6 pd-0">
                                                                                            <label class="control-label">Choice 4</label>
                                                                                            <input class="amc_qns_opt4" type="text" placeholder="Enter Valid Option" name="amc_qns_opt4[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Option" value="<?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['qns_options'][3]['option'];?>
">
                                                                                        </div>
                                                                                        <div>
                                                                                            <label class="control-label">Correct Answer</label>
                                                                                            <select class="amc_qns_ans" name="amc_qns_ans[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Select Valid Answer" >
                                                                                                <option value="">Select</option>
                                                                                                <option value="1" <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['answer_no'] == 1) {?>selected<?php }?>>1</option>
                                                                                                <option value="2" <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['answer_no'] == 2) {?>selected<?php }?>>2</option>
                                                                                                <option value="3" <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['answer_no'] == 3) {?>selected<?php }?>>3</option>
                                                                                                <option value="4" <?php if ($_smarty_tpl->tpl_vars['qna_item1']->value['answer_no'] == 4) {?>selected<?php }?>>4</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="dupliate_field_val_req qna_order" type="number" name="amc_qns_order[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" placeholder="Order" min="1" title="Enter Valid Order" data-dupliate_field="question_order_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['qna_item1']->value['order'];?>
">
                                                                                        <button class="btn vd_bg-red vd_white delete_qna delete_ele" type="button" data-delete_from=".qns_pre_parent_ele" data-delete_ele=".qna_child_ele"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    <?php } else { ?>
                                                                        <tr class="qna_child_ele tf_qna">  
                                                                            <td>
                                                                                <textarea rows="2" class="dupliate_field_val_req atf_qns" type="text" placeholder="Enter True | False Question"  name="atf_qns[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Enter Valid Question" data-dupliate_field="tf_qna_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
"></textarea>
                                                                            </td>             
                                                                            <td>
                                                                                <select class="atf_qns_ans" name="atf_qns_ans[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" title="Select Valid Answer"><option value="">Select</option><option value="1">True</option><option value="2">False</option></select>
                                                                            </td>
                                                                            <td>
                                                                                <input class="dupliate_field_val_req qna_order" type="number" name="atf_qns_order[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" placeholder="Order" min="1" title="Enter Valid Order" data-dupliate_field="question_order_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
">
                                                                                <button class="btn vd_bg-red vd_white delete_qna delete_ele" type="button" data-delete_from=".qns_pre_parent_ele" data-delete_ele=".qna_child_ele"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                        <div class="row mgbt-md-0">
                                                            <div class="col-md-12 text-right">
                                                                <button class="btn vd_bg-green vd_white add_more_tf" type="button"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add True|False</button>
                                                                <button class="btn vd_bg-green vd_white add_more_mcq" type="button"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add MCQ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-20">
                                                <input type="hidden" name="add_qns">
                                                <input type="hidden" name="audit_trail_action" value="Question Preparation">
                                                <button class="btn vd_bg-green vd_white" type="submit" id="add_qns"><span class="menu-icon"><i class="fa fa-fw fa-save"></i></span> Save</button>
                                            </div>
                                        </form>
                                        <!-- End Of Question Preparation -->   
                                        <!--Start Assign exam -->
                                        <form name="assign_exam-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal qns_prep_exam col-md-12 row" role="form" id="assign_exam-form" autocomplete="off" style="display:none">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="alert alert-info mgbt-md-20"> 
                                                <div class="vd_checkbox checkbox-success">
                                                    <input type="checkbox" id="qna_verify_check_box">
                                                    <label for="qna_verify_check_box"> I verified all prepared questions and answers are correct</label>
                                                </div>
                                            </div>
                                            <div class="qna_verified" style="display:none">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trainer_training_details']->value, 'item1', false, 'key1', 'list1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?> 
                                                    <input type="hidden" name="trainer_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['object_id'];?>
">
                                                    <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                        <div class="row mgbt-md-0">
                                                            <div class="col-md-10 font-semibold">
                                                                <span><i class="fa fa-circle fa-fw vd_green append-icon"></i><?php echo $_smarty_tpl->tpl_vars['item1']->value['title'];?>
</span>
                                                            </div>
                                                            <div class="col-md-2 text-right">
                                                                <div  class="controls">
                                                                    <select class="vd_black qns_limit" name="qns_limit[]" title="Select Limit">
                                                                        <option value=""><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"qns_limit"),$_smarty_tpl);?>
</option>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qna_list']->value, 'item2', false, 'key2', 'list2', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['count'];?>
"><?php echo $_smarty_tpl->tpl_vars['item2']->value['count'];?>
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
                                                    <table class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="vd_checkbox checkbox-danger">
                                                                        <input type="checkbox" class="exam_select_all" value="1" id="exam_select_all_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
" checked>
                                                                        <label class="width-100" for="exam_select_all_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
"></label>
                                                                    </div>
                                                                </th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"session"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-checkbox_group=".group_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
@">
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['schedule_details'], 'item3', false, 'key3', 'list3', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key3']->value => $_smarty_tpl->tpl_vars['item3']->value) {
?>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item3']->value['attendees'], 'item4', false, 'key4', 'list4', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key4']->value => $_smarty_tpl->tpl_vars['item4']->value) {
?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="vd_checkbox checkbox-danger">
                                                                                <input type="checkbox" class="exam_checbox group_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
" name="exam_user[<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['item4']->value['trainee_id'];?>
" id="assign_exam_checkbox_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['key4']->value;?>
" title="Select atleast one user" checked>
                                                                                <label class="width-100" for="assign_exam_checkbox_<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['key4']->value;?>
"></label>
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item4']->value['trainee_name'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item4']->value['trainee_plant'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item4']->value['trainee_dept'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item3']->value['session'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item3']->value['training_date'];?>
 <?php echo $_smarty_tpl->tpl_vars['item3']->value['training_time'];?>
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
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <textarea placeholder="(e.g.) Pls complete the exam on or before the target date" rows="3" class="required" name="wf_remarks" id="wf_remarks" required  title="Enter Valid Remarks"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="assign_exam">
                                                    <input type="hidden" name="audit_trail_action" value="Assign Exam">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  id="assign_exam"> <span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Assign</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Of Assign Exam -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_exam_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['show_online_exam_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_online_exam"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapse_online_exam" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="panel-heading bordered vd_bg-blue">
                                <h3 class="panel-title vd_white font-semibold">ONLINE EXAM</h3>
                            </div>
                            <div class="panel-body input-border">
                                <!--Update Exam Answer Form -->
                                <form name="attend_online_exam-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="attend_online_exam-form" autocomplete="off">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['online_exam_user_details']->value, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['user_details'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                            <input type="hidden" name="exam_object_id" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['exam_object_id'];?>
">
                                            <input type="hidden" name="exam_details_id" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['exam_details_id'];?>
">
                                            <input type="hidden" name="exam_pass_mark" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['pass_mark'];?>
">
                                            <input type="hidden" name="exam_attempt" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['attempt'];?>
">
                                            <input type="hidden" name="exam_qns_limit" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['question_limit'];?>
">
                                            <input type="hidden" name="exam_attempt_limit" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['attempt_limit'];?>
">
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <div class="panel widget dark-widget no-bd vd_bg-soft-green">
                                                        <div class="panel-body vd_bg-green pd-5 pdlr-10"><h5 class="font-semibold text-center">ASSIGNED DATE</h5></div>
                                                    </div>
                                                    <div class="widget dark-widget input-border mgtp-0">
                                                        <div class="panel-body  pd-5 pdlr-10"><h5 class="font-semibold text-center vd_grey"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['assigned_date']),$_smarty_tpl);?>
</h5></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="panel widget dark-widget no-bd vd_bg-soft-red">
                                                        <div class="panel-body vd_bg-red pd-5 pdlr-10"><h5 class="font-semibold text-center">TARGET DATE</h5></div>
                                                    </div>
                                                    <div class="widget dark-widget input-border mgtp-0">
                                                        <div class="panel-body  pd-5 pdlr-10"><h5 class="font-semibold text-center vd_grey"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_target_date),$_smarty_tpl);?>
</h5></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="panel widget dark-widget no-bd vd_bg-soft-grey">
                                                        <div class="panel-body vd_bg-grey pd-5 pdlr-10"><h5 class="font-semibold text-center">STATUS</h5></div>
                                                    </div>
                                                    <div class="widget dark-widget input-border mgtp-0"><div class="panel-body  pd-5 pdlr-10"><h5 class="font-semibold text-center vd_grey"><?php echo $_smarty_tpl->tpl_vars['item2']->value['attempt_status'];?>
</h5></div></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="panel widget dark-widget no-bd vd_bg-soft-blue">
                                                        <div class="panel-body vd_bg-blue pd-5 pdlr-10"><h5 class="font-semibold text-center">PASS MARK</h5></div>
                                                    </div>
                                                    <div class="widget dark-widget input-border mgtp-0">
                                                        <div class="panel-body  pd-5 pdlr-10"><h5 class="font-semibold text-center vd_grey"><?php echo $_smarty_tpl->tpl_vars['item2']->value['pass_mark'];?>
</h5></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="panel widget dark-widget no-bd vd_bg-soft-green">
                                                        <div class="panel-body vd_bg-green pd-5 pdlr-10"><h5 class="font-semibold text-center">ATTEMPT</h5></div>
                                                    </div>
                                                    <div class="widget dark-widget input-border mgtp-0">
                                                        <div class="panel-body  pd-5 pdlr-10"><h5 class="font-semibold text-center vd_grey"><?php echo $_smarty_tpl->tpl_vars['item2']->value['attempt'];?>
</h5></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="panel widget dark-widget no-bd vd_bg-soft-yellow">
                                                        <div class="panel-body vd_bg-yellow pd-5 pdlr-10"><h5 class="font-semibold text-center">CAPA No.</h5></div>
                                                    </div>
                                                    <div class="widget dark-widget input-border mgtp-0">
                                                        <div class="panel-body  pd-5 pdlr-10"><h5 class="font-semibold text-center vd_grey"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['capa_no']),$_smarty_tpl);?>
</h5></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="panel-heading vd_bg-grey">
                                                        <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span><?php echo $_smarty_tpl->tpl_vars['item1']->value['title'];?>
</h3>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'question'),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'answer'),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item2']->value['qna_details'], 'item3', false, 'key3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key3']->value => $_smarty_tpl->tpl_vars['item3']->value) {
?>
                                                                    <!-- name="anwer_option;question_id" -->
                                                                    <tr>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['key3']->value+1;?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item3']->value['question'];?>
</td>
                                                                        <td>
                                                                            <!-- IF True | False -->
                                                                            <?php if ($_smarty_tpl->tpl_vars['item3']->value['question_type'] == 'true_false') {?>
                                                                                <div class="vd_radio radio-success">
                                                                                    <input type="radio" name="ans[tf_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
]" id="tf_options1_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][0]['option_no'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['object_id'];?>
" title="Please Aswer All Questions" <?php if ($_smarty_tpl->tpl_vars['item3']->value['exam_ans'] == 1) {?>checked<?php }?>>
                                                                                    <label for="tf_options1_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
"> True </label>
                                                                                    <input type="radio" name="ans[tf_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
]" id="tf_options2_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][1]['option_no'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['object_id'];?>
" title="Please Aswer All Questions" <?php if ($_smarty_tpl->tpl_vars['item3']->value['exam_ans'] == 2) {?>checked<?php }?>>
                                                                                    <label for="tf_options2_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
"> False </label>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <!-- IF MCQ -->
                                                                                <div class="vd_radio radio-success">
                                                                                    <span>
                                                                                        <input type="radio" name="ans[mcq_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
]" id="mcq_options1_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][0]['option_no'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['object_id'];?>
" title="Please Aswer All Questions" <?php if ($_smarty_tpl->tpl_vars['item3']->value['exam_ans'] == 1) {?>checked<?php }?>>
                                                                                        <label for="mcq_options1_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][0]['option'];?>
</label>
                                                                                    </span>
                                                                                    <span>
                                                                                        <input type="radio"  name="ans[mcq_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
]" id="mcq_options2_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][1]['option_no'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['object_id'];?>
" title="Please Aswer All Questions" <?php if ($_smarty_tpl->tpl_vars['item3']->value['exam_ans'] == 2) {?>checked<?php }?>>
                                                                                        <label for="mcq_options2_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][1]['option'];?>
</label>
                                                                                    </span>
                                                                                    <span>
                                                                                        <input type="radio"  name="ans[mcq_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
]" id="mcq_options3_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][2]['option_no'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['object_id'];?>
" title="Please Aswer All Questions" <?php if ($_smarty_tpl->tpl_vars['item3']->value['exam_ans'] == 3) {?>checked<?php }?>>
                                                                                        <label for="mcq_options3_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][2]['option'];?>
</label>
                                                                                    </span>
                                                                                    <span>
                                                                                        <input type="radio"  name="ans[mcq_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
]" id="mcq_options4_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][3]['option_no'];?>
-<?php echo $_smarty_tpl->tpl_vars['item3']->value['object_id'];?>
" title="Please Aswer All Questions" <?php if ($_smarty_tpl->tpl_vars['item3']->value['exam_ans'] == 4) {?>checked<?php }?>>
                                                                                        <label for="mcq_options4_<?php echo $_smarty_tpl->tpl_vars['key3']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item3']->value['qns_option_array'][3]['option'];?>
</label>
                                                                                    </span>
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
                                                    </div>
                                                </div>
                                            </div>
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

                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                        <input type="hidden" id="exam_submit_type">
                                        <input type="hidden" name="audit_trail_action" value="Online Exam">
                                        <button class="btn vd_bg-blue vd_white" type="submit" name="save" id="save_exam"> <span class="menu-icon"><i class="append-icon fa fa-fw fa-save"></i></span>Save</button>
                                        <button class="btn vd_bg-green vd_white" type="submit" name="complete" id="exam_completed"> <span class="menu-icon"><i class="append-icon fa fa-fw fa-arrow-right"></i></span>Complete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['recall_trainer_button']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['request_task_extension_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_request.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['task_extension_approval_btn']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:templates/common/extension_approval.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['task_creation_btn']->value)) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseenablemom"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                    </div>
                    <div id="collapseenablemom" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">TASK CREATION FORM</h3>
                                </div>
                                <div class="panel widget panel-bd-left light-widget">
                                    <form name="add_task-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_task-form" autocomplete="off">
                                        <div class="panel-body">
                                            <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                <div class="row mgbt-md-0">
                                                    <div class="col-md-12 font-semibold">
                                                        <button class="btn vd_bg-green vd_white add_task_id" type="button" onclick="add_element('.add_task_child_ele', '.add_task_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mgbt-md-0">
                                                <div class="col-sm-12">
                                                    <table class="table table-bordered table-striped table-hover mgbt-md-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_details"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="add_task_parent_ele">
                                                            <?php if ($_smarty_tpl->tpl_vars['dms_task_list']->value) {?>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dms_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr class="add_task_child_ele">
                                                                        <td><input type="text" class="task_id" name="task_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
" readonly></td>
                                                                        <td>
                                                                            <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</textarea>
                                                                        </td>
                                                                        <td class="pd-5">
                                                                            <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                                            <select class="mgtp-5" id="task_department" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, '.add_task_child_ele', '.task_pri_resp_per'), null);" title="Select Valid Department">
                                                                                <option value="">Department</option>
                                                                            </select>
                                                                            <select class="mgtp-5 task_pri_resp_per reset_select" name="pri_per_id[]" title="Select Valid User Name">
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn menu-icon vd_bd-red vd_red delete_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                        </td>
                                                                    </tr>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                            <?php } else { ?>
                                                                <tr class="add_task_child_ele">
                                                                    <td><input type="text" class="task_id" name="task_id[]" readonly value="T1"></td>
                                                                    <td>
                                                                        <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"></textarea>
                                                                    </td>
                                                                    <td class="pd-5">
                                                                        <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                                        <button class="btn menu-icon vd_bd-red vd_red delete_task" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                    </td>
                                                                </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="alert alert-warning pd-10 input-border">
                                                <div class="row mgbt-md-0">
                                                    <div class="col-md-12 font-semibold">
                                                        <button class="btn vd_bg-green vd_white add_task_id" type="button" onclick="add_element('.add_task_child_ele', '.add_task_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-info"> 
                                                <div class="vd_checkbox checkbox-success">
                                                    <input type="checkbox" id="assign_task_check_box">
                                                    <label for="assign_task_check_box"> I have ensured that all the tasks created are correct, and the selected assignees(Primary Persons) are the right persons for the task.</label>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-ledt mgtp-0" >
                                                <input type="hidden" name="audit_trail_action" value="Add Task Details">
                                                <input type="hidden" id="task_submit_type">
                                                <button class="btn vd_bg-blue vd_white" type="submit" id="save_task"> <span class="menu-icon"><i class="fa fa-fw fa-save"></i></span>Save</button>
                                                <button class="btn vd_bg-green vd_white" type="submit" id="add_task" disabled><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
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
                                                                <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_details"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="vd_bg-grey vd_white"><td colspan="4">Assigned Task Details</td></tr>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dms_task_list']->value, 'item', false, 'key', 'list', array (
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
                                                                <td><input type="text" class="task_id" name="task_id[]" readonly value="T<?php echo count($_smarty_tpl->tpl_vars['dms_task_list']->value)+1;?>
"></td>
                                                                <td>
                                                                    <textarea name="task[]" class="reset_ele" rows="5" placeholder="Enter Task Details" title="Enter Task Details"></textarea>
                                                                </td>
                                                                <td class="pd-5">
                                                                    <select class="mgtp-5" name="plant[]" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                    <input type="hidden" class="old_task_count" value="<?php echo count($_smarty_tpl->tpl_vars['dms_task_list']->value);?>
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
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"my_self"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-5"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
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
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
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
                                                                    <select class="assign_others" name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                    <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>"task_id"),$_smarty_tpl);?>
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
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
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
                                                            <select name="plant[]" class="recall_ed" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_object_id;?>
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
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"assigned_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
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
                                                        <tr class="bg-info">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];
if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'pri_per_needs_correction') {?><i class="fa fa-fw fa-arrow-right vd_red vd_hover" data-original-title="Task Needs Correction" data-toggle="tooltip" data-placement="bottom"></i><?php } else { ?><i class="fa fa-fw fa-arrow-right vd_green vd_hover" data-original-title="New Task" data-toggle="tooltip" data-placement="bottom"></i><?php }?></td>
                                                            <td><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
                                                        </tr>
                                                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];
$_prefixVariable6=ob_get_clean();
if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'pri_per_needs_correction' && $_prefixVariable6) {?>
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
                                                                        <br><br><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

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
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sent_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
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
                                                        <tr class="bg-info">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php if ($_smarty_tpl->tpl_vars['item']->value['wf_status'] == 'creator_needs_correction') {
echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
<i class="fa fa-fw fa-arrow-right vd_red vd_hover" data-original-title="Task Needs Correction" data-toggle="tooltip" data-placement="bottom"></i><?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['sec_per_name'];?>
<i class="fa fa-fw fa-arrow-right vd_green vd_hover" data-original-title="Task To be Reviewed" data-toggle="tooltip" data-placement="bottom"></i><?php }?></td>
                                                            <td><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->task_target_date),$_smarty_tpl);?>
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
                                                                        <br><br><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>

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
                                                                        <br><br><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

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
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sent_by"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-1 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_id"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-7 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
</th>
                                                        <th class="col-md-2 pdlr-10"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
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
                                                        <tr class="bg-info">
                                                            <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
 <input type="hidden" name="task_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"></td>
                                                            <td><i class="append-icon append-icon fa fa-fw fa-user"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['pri_per_name'];?>
</td>
                                                            <td><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-tasks"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                                                            <td><i class="append-icon fa fa-fw fa-calendar"></i><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
                                                        </tr>
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
                                                                    <br><br><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>

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
                                                                    <br><br><i class="append-icon glyphicon glyphicon-link"></i><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>

                                                                </div>
                                                            </td>
                                                        </tr>
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
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                </div>
                                                <?php if ($_smarty_tpl->tpl_vars['dms_task_list']->value) {?>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task"),$_smarty_tpl);?>
 </th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                                                                <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_verification"),$_smarty_tpl);?>
</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dms_task_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="row mgbt-md-0 pdlr-10">
                                                                            <div>
                                                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>

                                                                                <button class="btn btn-default show_task_history pd-0 mgl-10" type="button" data-target="#modal_task_history" data-toggle="modal" data-task_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'><i class="fa fa-fw fa-history" data-original-title="Show Task History" data-toggle="tooltip" data-placement="bottom"></i></button>
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
                                                                                        <i class="append-icon glyphicon glyphicon-link"></i>
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
                                                                                        <i class="append-icon glyphicon glyphicon-link"></i>
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
                                                                                        <i class="append-icon glyphicon glyphicon-link"></i>
                                                                                    </div>
                                                                                    <div class="col-md-11 pd-0">
                                                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>

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
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"qa_review"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                            <div  class="controls">
                                                                <textarea placeholder="Task Review Comments" rows="4" name="task_close_out_review" required title="Enter Valid Comments"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                                <div class="input-border panel-body pd-15">
                                                    <!--Start Is CAPA Required -->
                                                    <div class="col-md-12 pd-0">
                                                        <div class="form-label col-md-2 font-semibold pd-0"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'capa_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-1 pd-0">
                                                            <input type="checkbox" class="switch_unchecked" id="udev_capa" name="udev_capa"  data-rel="switch" data-size="mini" data-wrapper-class="green"   data-on-text="Yes" data-off-text="No" title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no">
                                                        </div>
                                                        <div class="form-label col-md-1 font-semibold" data-toggle_to="udev_capa" style="display:none;"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'dept_head'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-2" data-toggle_to="udev_capa" style="display:none;">
                                                            <select name="capa_dept_head"  title="Select Valid Status">
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
                                                        <div class="form-label col-md-1 font-semibold" data-toggle_to="udev_capa" style="display:none;"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'reason'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-5 pd-0" data-toggle_to="udev_capa" style="display:none;">
                                                            <input type="text" name="capa_reason"  title="Enter Valid Reason">
                                                        </div>
                                                    </div>
                                                    <!--End of Is CAPA Required -->
                                                    <!--Start Is CC Required -->
                                                    <div class="col-md-12 pd-0 mgtp-10">
                                                        <div class="form-label col-md-2 font-semibold pd-0"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'cc_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-1 pd-0">
                                                            <input type="checkbox" class="switch_unchecked" id="udev_cc" name="udev_cc"  data-rel="switch" data-size="mini" data-wrapper-class="green"   data-on-text="Yes" data-off-text="No" title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no">
                                                        </div>
                                                        <div class="form-label col-md-1 font-semibold" data-toggle_to="udev_cc" style="display:none;"><?php echo template_get_attribute_name(array('module'=>'dms','attribute'=>'dept_head'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-2" data-toggle_to="udev_cc" style="display:none;">
                                                            <select name="cc_dept_head"  title="Select Valid Status">
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
                                                        <div class="form-label col-md-1 font-semibold" data-toggle_to="udev_cc" style="display:none;"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'reason'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-5 pd-0" data-toggle_to="udev_cc" style="display:none;">
                                                            <input type="text" name="cc_reason"  title="Enter Valid Reason">
                                                        </div>
                                                    </div>
                                                    <!--End of Is CC Required -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"closeout_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                    <div  class="controls">
                                                        <textarea placeholder="(e.g.) Enter the Close out comments" rows="4" name="udev_close_out_comments" required title="Enter Valid Comments"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                <input type="hidden" name="audit_trail_action" value="Update Close Out">
                                                <input type="hidden" name="close_out">
                                                <button class="btn vd_bg-green vd_white" type="submit"  id="close_out"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Submit</button>
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
                                                    <div  class="controls">
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
                            <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"sec_resp_per"),$_smarty_tpl);?>
</th>
                            <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"pri_resp_per"),$_smarty_tpl);?>
</th>
                            <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"task_review"),$_smarty_tpl);?>
</th>
                        </tr>
                    </thead>
                    <tbody class="show_task_history_tbody"></tbody>
                </table>
                <table class="table table-bordered table-striped table-hover"><thead class="show_task_history_thead_qa"></thead></table>
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
>
                                                                $(document).ready(function () {
                                                                    notification("topright", "success", "fa fa-info-circle vd_blue", "Status", `${$("#status").val()} - [${$("#wf_status").val()}]`);
                                                                    //edit baisc details form//
                                                                    "use strict";
                                                                    $('#edit_basic_details-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error messsage class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            udev_type: {
                                                                                required: true,
                                                                            },
                                                                            udev_classification: {
                                                                                required: true,
                                                                            },
                                                                            udev_date_of_occ: {
                                                                                required: true,
                                                                            },
                                                                            udev_time_of_occ: {
                                                                                required: true,
                                                                            },
                                                                            udev_date_of_discover: {
                                                                                required: true,
                                                                            },
                                                                            udev_time_of_discover: {
                                                                                required: true,
                                                                            },
                                                                            'udev_related_to[]': {
                                                                                required: true,
                                                                            },
                                                                            'udev_repetitive_dms_no[]': {
                                                                                required: true,
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#edit_basic_details-form')).fadeIn(500);
                                                                            scrollTo($('#edit_basic_details-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if (($("#udev_repetitive_dms_no").val().length > 1 ? !lm_validate.is_value_exist_in_array($("#udev_repetitive_dms_no").val(), "NA", 'Remove NA From Repetitive DMS List', 'found') : true)) {
                                                                                $('#update_basic_info').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    // Edit Product Information//
                                                                    $('#edit_prod_info-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {

                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#edit_prod_info-form')).fadeIn(500);
                                                                            scrollTo($('#edit_prod_info-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#update_prod_details').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        },
                                                                    });
                                                                    //Edit Description,Risk Assement & immediate Action form//
                                                                    $('#edit_desc_risk_ass_immed_action-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            udev_desc: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            udev_risk_impact: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            udev_imd_action: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#edit_desc_risk_ass_immed_action-form')).fadeIn(500);
                                                                            scrollTo($('#edit_desc_risk_ass_immed_action-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#updatedesc_risk_ass_immed_action').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        },
                                                                    });
                                                                    // Request Review Form Validation
                                                                    $('#request_pre_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            "pre_review_to[]": {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_pre_review-form')).fadeIn(500);
                                                                            scrollTo($('#request_pre_review-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_pre_review').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
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
                                                                    // Show Review Form Validation
                                                                    $('#pre_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            review_comments: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#pre_review-form')).fadeIn(500);
                                                                            scrollTo($('#pre_review-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#pre_reviewed').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        },
                                                                    });
                                                                    //Dept approval form
                                                                    $('#dept_approve-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            review_comments: {
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
                                                                        },
                                                                    });
                                                                    // QA Review Form Validation
                                                                    $('#qa_review-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            qa_review_comments: {
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
                                                                    // Request CFT Assessment Form Validation
                                                                    $('#request_cft_assessment-form').validate({
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
                                                                            "cft_users_to[]": {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#request_cft_assessment-form')).fadeIn(500);
                                                                            scrollTo($('#request_cft_assessment-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_cft_assessment').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        },
                                                                    });
                                                                    // CFT Validation
                                                                    $('#cft_assesment-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            cft_comments: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#cft_assesment-form')).fadeIn(500);
                                                                            scrollTo($('#cft_assesment-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#cft_assesed').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Investigation Required Form Vlidation
                                                                    $("#investigation_required-form").validate({
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
                                                                            $('.alert-danger', $('#investigation_required-form')).fadeIn(500);
                                                                            scrollTo($('#investigation_required-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#investigation_required').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Assign Investigator
                                                                    $('#assign_investigator-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            plant: {
                                                                                required: true
                                                                            },
                                                                            department: {
                                                                                required: true
                                                                            },
                                                                            responsible_person: {
                                                                                required: true
                                                                            },
                                                                            invest_target_date: {
                                                                                required: true
                                                                            },
                                                                            investigation_details: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#assign_investigator-form')).fadeIn(500);
                                                                            scrollTo($('#assign_investigator-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#assign_investigator').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Update Investigation Details Form Validation
                                                                    $('#investigation_feedback-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            uinst_investigation_feedback: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            uinst_root_cause: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#investigation_feedback-form')).fadeIn(500);
                                                                            scrollTo($('#investigation_feedback-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#investigation_completed').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        },
                                                                    });
                                                                    // Recall Investigator Form Validation
                                                                    $('#recall_investigator-form').validate({
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
                                                                            responsible_person: {
                                                                                required: true
                                                                            },
                                                                            invest_target_date: {
                                                                                required: true
                                                                            },
                                                                            investigation_details: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            recall_reason: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#recall_investigator-form')).fadeIn(500);
                                                                            scrollTo($('#recall_investigator-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#recall_investigator').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Invstigation Reviewed By Dept Head Form
                                                                    $('#invest_reviewed-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            uinst_dept_head_review: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#invest_reviewed-form')).fadeIn(500);
                                                                            scrollTo($('#invest_reviewed-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#invest_reviewed').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Invstigation Need Correction Form
                                                                    $('#invest_review_need_correction-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#invest_review_need_correction-form')).fadeIn(500);
                                                                            scrollTo($('#invest_review_need_correction-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#invest_review_need_correction').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Invstigation Approved Form
                                                                    $('#invest_verification-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            uinst_qa_reviewer_review: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            plant: {
                                                                                required: true
                                                                            },
                                                                            department: {
                                                                                required: true
                                                                            },
                                                                            qa_approver_user: {
                                                                                required: true
                                                                            },
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#invest_verification-form')).fadeIn(500);
                                                                            scrollTo($('#invest_verification-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#request_qa_approval').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Request QA Approver Form Validation
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
                                                                        },
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
                                                                            udev_type: {
                                                                                required: true,
                                                                            },
                                                                            udev_classification: {
                                                                                required: true
                                                                            },
                                                                            udev_target_date: {
                                                                                required: true
                                                                            },
                                                                            'udev_related_to[]': {
                                                                                required: true
                                                                            },
                                                                            udev_meeting_date: {
                                                                                required: true
                                                                            },
                                                                            udev_training_date: {
                                                                                required: true
                                                                            },
                                                                            udev_exam_date: {
                                                                                required: true

                                                                            },
                                                                            udev_task_date: {
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#qa_accepted-form')).fadeIn(500);
                                                                            scrollTo($('#qa_accepted-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#qa_accepeted').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //QA Approval Read All Comments Check Box
                                                                    $('#qa_comments_check_box').on('click', function () {
                                                                        ($(this).is(':checked')) ? $(".qa_approval_drop").show() : lm_dom.reload_page();
                                                                    });
                                                                    // Meeting training,exam & task target date validation - start
                                                                    $('#udev_meeting').on('switchChange.bootstrapSwitch', function (event, state) {
                                                                        $("[name='udev_meeting_date'],[name='udev_training_date'],[name='udev_exam_date'],[name='udev_task_date']").val("");
                                                                        $(".meeting_days,.training_days,.exam_days,.task_days").html("");
                                                                        if (state) {
                                                                            $(".meeting_toggle").show();
                                                                        } else {
                                                                            $(".meeting_toggle").hide().val("");
                                                                            if ($("[name='udev_meeting_date']").is(':checked')) {
                                                                                $("[name='udev_training_date'],[name='udev_exam_date'],[name='udev_task_date']").attr("data-datepicker_min", $("[name='udev_meeting_date']").val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_meeting_date']"), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            } else {
                                                                                $("[name='udev_training_date'],[name='udev_exam_date'],[name='udev_task_date']").val("").attr("data-datepicker_min", "0").datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: 0, maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            }
                                                                        }
                                                                    });
                                                                    $('#udev_training').on('switchChange.bootstrapSwitch', function (event, state) {
                                                                        $("[name='udev_training_date'],[name='udev_exam_date'],[name='udev_task_date']").val("");
                                                                        $(".training_days,.exam_days,.task_days").html("");
                                                                        $(".exam_toggle_date").hide();
                                                                        $(".exam_toggle_days").hide();
                                                                        $('#udev_exam').val("no");
                                                                        if (state) {
                                                                            $(".training_toggle,.exam_toggle").show();
                                                                        } else {
                                                                            $(".training_toggle,.exam_toggle").hide().val("");
                                                                            $("#udev_exam").closest(".bootstrap-switch").removeClass('bootstrap-switch-on').addClass('bootstrap-switch-off').val("no");
                                                                            if ($("[name='udev_training_date']").is(':checked')) {
                                                                                $("[name='udev_exam_date'],[name='udev_task_date']").attr("data-datepicker_min", $("[name='udev_training_date']").val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_training_date']"), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            } else {
                                                                                $("[name='udev_exam_date'],[name='udev_task_date']").attr("data-datepicker_min", $("[name='udev_meeting_date']")).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_meeting_date']").val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            }

                                                                        }
                                                                    });
                                                                    $('#udev_exam').on('switchChange.bootstrapSwitch', function (event, state) {
                                                                        $("[name='udev_exam_date'],[name='udev_task_date']").val("");
                                                                        $(".exam_days,.task_days").html("");
                                                                        if (state) {
                                                                            $(".exam_toggle_date").show();
                                                                            $(".exam_toggle_days").show();
                                                                            $('#udev_exam').val("yes");
                                                                        } else {
                                                                            $(".exam_toggle_date").hide();
                                                                            $(".exam_toggle_days").hide();
                                                                            $('#udev_exam').val("no");
                                                                            if ($("[name='udev_exam_date']").is(':checked')) {
                                                                                $("[name='udev_task_date']").attr("data-datepicker_min", $("[name='udev_exam_date']").val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_exam_date']"), maxDate: $("[name='udev_exam_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            } else {
                                                                                $("[name='udev_task_date']").attr("data-datepicker_min", $("[name='udev_training_date']")).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_training_date']").val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            }
                                                                        }
                                                                    });
                                                                    $('#udev_task').on('switchChange.bootstrapSwitch', function (event, state) {
                                                                        $("[name='udev_task_date']").val("");
                                                                        $(".task_days").html("");
                                                                        if (state) {
                                                                            $(".task_toggle").show();
                                                                        } else {
                                                                            $(".task_toggle").hide().val("");
                                                                        }
                                                                    });
                                                                    $(document).on("change", "[name='udev_target_date']", function () {
                                                                        $("[name='udev_meeting_date'],[name='udev_training_date'],[name='udev_exam_date'],[name='udev_task_date']").removeAttr("disabled").val("").attr("data-datepicker_min", "0").datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: 0, maxDate: $(this).val(), dateFormat: 'yy-mm-dd'});
                                                                        $(".meeting_days,.training_days,.exam_days,.task_days").html("");
                                                                    });
                                                                    $(document).on("change", "[name='udev_meeting_date']", function () {
                                                                        $("[name='udev_training_date'],[name='udev_exam_date'],[name='udev_task_date']").val("").attr("data-datepicker_min", $(this).val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $(this).val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                    });
                                                                    $(document).on("change", "[name='udev_training_date']", function () {
                                                                        $("[name='udev_exam_date'],[name='udev_task_date']").val("").attr("data-datepicker_min", $(this).val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $(this).val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                    });
                                                                    $(document).on("change", "[name='udev_exam_date']", function () {
                                                                        $("[name='udev_task_date']").val("").attr("data-datepicker_min", $(this).val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $(this).val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                    });
                                                                    $(document).on("click", "[name='udev_task_date']", function () {
                                                                        if ($("#udev_exam").is(':checked') && $("[name='udev_exam_date']").val() !== "") {
                                                                            $("[name='udev_task_date']").val("").attr("data-datepicker_min", $("[name='udev_exam_date']").val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_exam_date']").val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            return;
                                                                        }
                                                                        if ($("#udev_training").is(':checked') && $("[name='udev_training_date']").val() !== "") {
                                                                            $("[name='udev_task_date']").val("").attr("data-datepicker_min", $("[name='udev_training_date']").val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_training_date']").val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            return;
                                                                        }
                                                                        if ($("#udev_meeting").is(':checked') && $("[name='udev_meeting_date']").val() !== "") {
                                                                            $("[name='udev_task_date']").val("").attr("data-datepicker_min", $("[name='udev_meeitng_date']").val()).datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: $("[name='udev_meeting_date']").val(), maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                            return;
                                                                        }
                                                                        $("[name='udev_task_date']").val("").attr("data-datepicker_min", "0").datepicker('destroy').datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, minDate: 0, maxDate: $("[name='udev_target_date']").val(), dateFormat: 'yy-mm-dd'});
                                                                    });
                                                                    // Meeting training,exam & task target date validation - stop

                                                                    //QA Rejectd Form
                                                                    $('#qa_rejected-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            udev_reject_reason: {
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
                                                                    // Assign Trainer Form Valiadtion
                                                                    $('#assign_trainer-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        rules: {
                                                                            'title[]': {
                                                                                minlength: 3,
                                                                                required: true
                                                                            },
                                                                            'trainers[]': {
                                                                                required: true
                                                                            },
                                                                            wf_remarks: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit          
                                                                            $('.alert-danger', $('#assign_trainer-form')).fadeIn(500);
                                                                            scrollTo($('#assign_trainer-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#assign_to_trainer').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Add More Training Schedule
                                                                    $(".add_more_training_session_schedule").click(function () {
                                                                        lm_dom.assign_id_to_multiselect(".training_invites_id");
                                                                        lm_dom.assign_unique_attr_val(".training_date", "id");
                                                                        lm_dom.assign_unique_attr_val(".training_time", "id");
                                                                        lm_dom.re_initialize();
                                                                        //3d Array For Training Invitees
                                                                        let ele_list = $(this).closest('form').find(".3d_array");
                                                                        for (i = 0; i < ele_list.length; i++) {
                                                                            let index_training_schedule_div = $(ele_list[i]).closest(".training_schedule_div").index();
                                                                            let current_name = $(ele_list[i]).data("3dname");
                                                                            let trainer_object_id = lm_dom.find_in_parent($(ele_list[i]), ".2d_parent", ".trainer_object_id").val();
                                                                            $(ele_list[i]).prop("name", `${current_name}[${trainer_object_id}][${index_training_schedule_div}][]`);
                                                                        }
                                                                    });
                                                                    //Training Schedule Form Validation
                                                                    $('#training_schedule-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#training_schedule-form')).fadeIn(500);
                                                                            scrollTo($('#training_schedule-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            if ((lm_validate.array_of_input([".training_session@", ".training_date@", ".training_time@", ".training_venue@", ".training_invites@"])) && (lm_validate.array_of_input_select([".training_invites@"]))) {
                                                                                let train_div = $(".training_schedule_parent_ele");
                                                                                for (i = 0; i < train_div.length; i++) {
                                                                                    let select_invitees = $(train_div[i]).find(".training_invites");
                                                                                    let invitees = $(train_div[i]).find(".training_invites option").map((_, el) => $(el).val()).get();
                                                                                    if (!lm_validate.is_duplicate_value_exists_in_array(invitees, select_invitees)) {
                                                                                        scrollTo($('#training_schedule-form'), -100);
                                                                                        return false;
                                                                                    }
                                                                                }
                                                                                let training_time = $(".training_time");
                                                                                for (i = 0; i < training_time.length; i++) {
                                                                                    let time = $(training_time[i]).val().split(":");
                                                                                    if (time[0] > 23 || time[0] < 0 || time[1] > 59 || time[1] < 0) {
                                                                                        $(training_time[i]).focus();
                                                                                        show_notification("e", 'topright', "Select Valid Time");
                                                                                        return false;
                                                                                    }
                                                                                }
                                                                                $('#training_scheduled').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    //Traing Reschedule Form Validation
                                                                    $('#training_reschedule-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            resched_reason: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#training_reschedule-form')).fadeIn(500);
                                                                            scrollTo($('#training_reschedule-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            let training_time = $('[name="training_rescheduled_time[]"]');
                                                                            for (i = 0; i < training_time.length; i++) {
                                                                                let time = $(training_time[i]).val().split(":");
                                                                                if (time[0] > 23 || time[0] < 0 || time[1] > 59 || time[1] < 0) {
                                                                                    $(training_time[i]).focus();
                                                                                    show_notification("e", 'topright', "Select Valid Time");
                                                                                    return false;
                                                                                }
                                                                            }
                                                                            if (lm_validate.check_box(["training_reschedule_id[]"])) {
                                                                                if (lm_validate.array_of_input([".training_reschedule_date@", ".training_reschedule_time@", ".training_reschedule_venue@"])) {
                                                                                    $('#training_rescheduled').attr("disabled", true);
                                                                                    loading.show();
                                                                                    form.submit();
                                                                                }
                                                                            }
                                                                        }
                                                                    });
                                                                    //If Rescheduled
                                                                    $('.reschedule_training,.select_all_reschedule_training').on('click', function () {
                                                                        if ($(this).is(':checked')) {
                                                                            lm_dom.find_in_parent(this, 'tr', '.reschedule_training_ed').removeAttr("disabled");
                                                                            if ($(this).hasClass("select_all_reschedule_training")) {
                                                                                lm_dom.find_in_parent(this, 'form', '.reschedule_training_ed').removeAttr("disabled").val("");
                                                                                lm_dom.find_in_parent(this, 'form', '.reschedule_training').prop("checked", true);
                                                                            }
                                                                        } else {
                                                                            lm_dom.find_in_parent(this, 'tr', '.reschedule_training_ed').prop("disabled", true).val("");
                                                                            if ($(this).hasClass("select_all_reschedule_training")) {
                                                                                lm_dom.find_in_parent(this, 'form', '.reschedule_training_ed').attr("disabled", true).val("");
                                                                                lm_dom.find_in_parent(this, 'form', '.reschedule_training').prop("checked", false);
                                                                            }
                                                                        }
                                                                        lm_dom.re_initialize();
                                                                    });
                                                                    //Update Trainees Form Validation
                                                                    $('#update_trainee-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            update_training_sch_id: {
                                                                                required: true
                                                                            },
                                                                            'trainees[]': {
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#update_trainee-form')).fadeIn(500);
                                                                            scrollTo($('#update_trainee-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#update_training_attn_button').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Get unique training attendee List
                                                                    $('#update_trainess_training').on('change', function () {
                                                                        $("#attendee_from_users,#attendee_from_users_to,.update_trainee_status").empty();
                                                                        if ($(this).val()) {
                                                                            loading.show();
                                                                            x_get_dms_unique_attendess_for_attendence($("#dms_object_id").val(), $(this).val(), function (result) {
                                                                                ajax_respone_handler_set_dropdown(result, "#attendee_from_users", "multiselect");
                                                                                (Object.keys(result).length === 0) ? $(".update_trainee_status").html('<span class="label vd_bg-green append-icon ">Fully Captured</span>') : $(".update_trainee_status").html('<span class="label vd_bg-yellow append-icon ">Partially | Not Captured</span>');
                                                                                loading.hide();
                                                                            });
                                                                        }
                                                                    });
                                                                    // Training Completed
                                                                    $('#training_completed-form').validate({
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
                                                                            $('.alert-danger', $('#training_completed-form')).fadeIn(500);
                                                                            scrollTo($('#training_completed-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#training_completed').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    //Add Exam Question Form Validation
                                                                    $('#add_qns-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                            'trainer_object_id[]': {
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#add_qns-form')).fadeIn(500);
                                                                            scrollTo($('#add_qns-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            var validation_arr = [];
                                                                            ($(form).find(".tf_qna").length > 0) ? validation_arr.push(".atf_qns@", ".atf_qns_ans@") : null;
                                                                            ($(form).find(".mcq_qna").length > 0) ? validation_arr.push(".amc_qns@", ".amc_qns_opt1@", ".amc_qns_opt2@", ".amc_qns_opt3@", ".amc_qns_opt4@", ".amc_qns_ans@") : null;
                                                                            if (lm_validate.array_of_input(validation_arr)) {
                                                                                $('#add_qns').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    //Add True|False Questions
                                                                    $(".add_more_tf").click(function () {
                                                                        let index = $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_index")).val();
                                                                        let tf_q_template = ` 
                                                                            <tr class="qna_child_ele tf_qna">  
                                                                                <td>
                                                                                    <textarea rows="2" class="dupliate_field_val_req atf_qns" type="text" placeholder="Enter True | False Question"  name="atf_qns[${index}][]" title="Enter Valid Question" data-dupliate_field="tf_qna_${index}"></textarea>
                                                                                </td>             
                                                                                <td>
                                                                                    <select class="atf_qns_ans" name="atf_qns_ans[${index}][]" title="Select Valid Answer"><option value="">Select</option><option value="1">True</option><option value="2">False</option></select>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="dupliate_field_val_req qna_order" type="number" name="atf_qns_order[${index}][]" placeholder="Order" min="1" title="Enter Valid Order" data-dupliate_field="question_order_${index}">
                                                                                    <button class="btn vd_bg-red vd_white delete_qna delete_ele" type="button" data-delete_from=".qns_pre_parent_ele" data-delete_ele=".qna_child_ele"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                                </td>
                                                                            </tr>`;
                                                                        $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_parent_ele")).append(tf_q_template);
                                                                        $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_order")).attr("max", lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_child_ele").length);
                                                                    });
                                                                    //Add MCQ Questions
                                                                    $(".add_more_mcq").click(function () {
                                                                        let index = $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_index")).val();
                                                                        let tf_q_template = ` 
                                                                            <tr class="qna_child_ele mcq_qna ">   
                                                                                <td>
                                                                                    <textarea rows="6" class="dupliate_field_val_req amc_qns" type="text" placeholder="Enter Multiple Choice Question" name="amc_qns[${index}][]" title="Enter Valid Question" data-dupliate_field="mcq_qna_${index}"></textarea>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="col-md-6 pd-0">
                                                                                        <label class="control-label">Choice 1</label>
                                                                                        <input class="amc_qns_opt1" type="text" placeholder="Enter Valid Option" name="amc_qns_opt1[${index}][]" title="Enter Valid Option">
                                                                                    </div>
                                                                                    <div class="col-md-6 pd-0">
                                                                                        <label class="control-label">Choice 2</label>
                                                                                        <input class="amc_qns_opt2" type="text" placeholder="Enter valid option" name="amc_qns_opt2[${index}][]" title="Enter Valid Option">
                                                                                    </div>
                                                                                    <div class="col-md-6 pd-0">
                                                                                        <label class="control-label">Choice 3</label>
                                                                                        <input class="amc_qns_opt3" type="text" placeholder="Enter Valid Option" name="amc_qns_opt3[${index}][]" title="Enter Valid Option">
                                                                                    </div>
                                                                                    <div class="col-md-6 pd-0">
                                                                                        <label class="control-label">Choice 4</label>
                                                                                        <input class="amc_qns_opt4" type="text" placeholder="Enter Valid Option" name="amc_qns_opt4[${index}][]" title="Enter Valid Option">
                                                                                    </div>
                                                                                    <div>
                                                                                        <label class="control-label">Correct Answer</label>
                                                                                        <select class="amc_qns_ans" name="amc_qns_ans[${index}][]" title="Select Valid Answer" >
                                                                                            <option value="">Select</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="4">4</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="dupliate_field_val_req qna_order" type="number" name="amc_qns_order[${index}][]" placeholder="Order" min="1" title="Enter Valid Order" data-dupliate_field="question_order_${index}">
                                                                                    <button class="btn vd_bg-red vd_white delete_qna delete_ele" type="button" data-delete_from=".qns_pre_parent_ele" data-delete_ele=".qna_child_ele"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                                </td>
                                                                            </tr>`;
                                                                        $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_parent_ele")).append(tf_q_template);
                                                                        $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_order")).attr("max", lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_child_ele").length);
                                                                    });
                                                                    $(".delete_qna").click(function () {
                                                                        $(lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_order")).attr("max", lm_dom.find_in_parent(this, ".qns_pre_parent_ele", ".qna_child_ele").length);
                                                                    });
                                                                    //Select All user For Exam
                                                                    $('.exam_select_all').on('click', function () {
                                                                        if ($(this).is(':checked')) {
                                                                            lm_dom.find_in_parent(this, 'form', '.exam_checbox').prop("checked", true);
                                                                        } else {
                                                                            lm_dom.find_in_parent(this, 'form', '.exam_checbox').prop("checked", false);
                                                                        }
                                                                    });
                                                                    //QA Approval Read All Comments Check Box
                                                                    $('#qna_verify_check_box').on('click', function () {
                                                                        ($(this).is(':checked')) ? $(".qna_verified").show() : lm_dom.reload_page();
                                                                    });
                                                                    //Assign Exam Form Validation
                                                                    $('#assign_exam-form').validate({
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
                                                                            $('.alert-danger', $('#assign_exam-form')).fadeIn(500);
                                                                            scrollTo($('#assign_exam-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            var validation_arr = [], checkbox_group = $(form).find('[data-checkbox_group]');
                                                                            for (var i = 0; i < checkbox_group.length; i++) {
                                                                                validation_arr.push($(checkbox_group[i]).data('checkbox_group'));
                                                                            }
                                                                            if (lm_validate.array_of_input([".qns_limit@"]) && lm_validate.check_box(validation_arr)) {
                                                                                $('#assign_exam').attr("disabled", true);
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                        }
                                                                    });
                                                                    // Attend Online Exam Form validation
                                                                    $('#attend_online_exam-form').validate({
                                                                        errorElement: 'div', //default input error message container
                                                                        errorClass: 'vd_red', // default input error message class
                                                                        focusInvalid: false, // do not focus the last invalid input
                                                                        ignore: "",
                                                                        rules: {
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#attend_online_exam-form')).fadeIn(500);
                                                                            scrollTo($('#attend_online_exam-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            var type = event.submitter.name;
                                                                            //Save exam
                                                                            if (type === "save") {
                                                                                $('#save_exam').attr("disabled", true);
                                                                                $('#exam_completed').attr("disabled", true);
                                                                                $("#exam_submit_type").attr("name", "save_exam");
                                                                                loading.show();
                                                                                form.submit();
                                                                            }
                                                                            //  Complete Exam
                                                                            else if (type === "complete") {
                                                                                if (lm_validate.radio_button($('#attend_online_exam-form').find("input[type='radio']"))) {
                                                                                    $('#save_exam').attr("disabled", true);
                                                                                    $('#exam_completed').attr("disabled", true);
                                                                                    $("#exam_submit_type").attr("name", "exam_completed");
                                                                                    loading.show();
                                                                                    form.submit();
                                                                                }
                                                                            }
                                                                        }
                                                                    });
                                                                    // Add & Delete Task
                                                                    $(".add_task_id").click(() => $('.add_task_parent_ele').find("tr").each((index, element) => $(element).find(".task_id").val(`T${index + 1}`)));
                                                                    $(document).on("click", ".delete_task", function () {
                                                                        if ($('.add_task_parent_ele').find("tr").length > 1) {
                                                                            $(this).closest("tr").remove();
                                                                            $('.add_task_parent_ele').find("tr").each(function (index) {
                                                                                $(this).find(".task_id").val(`T${index + 1}`);
                                                                            });
                                                                        } else {
                                                                            show_notification("e", 'topright', 'Can not delete.Atleast one input required');
                                                                        }
                                                                    });
                                                                    //Task Read All Comments Check Box
                                                                    $('#assign_task_check_box').on('click', function () {
                                                                        ($(this).is(':checked')) ? $("#add_task").attr("disabled", false) : lm_dom.reload_page();
                                                                    });
                                                                    // Add Task Form Validation
                                                                    $('#add_task-form').validate({
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
                                                                        let sec_cmts = pri_cmts = creator_cmts = qa_cmts = '';
                                                                        (result.all_sec_review_comments) ? $.each(result.all_sec_review_comments, (index, value) => sec_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon glyphicon glyphicon-link"></i>${value.review_comments}<br></div>`) : sec_cmts += `-`;
                                                                        (result.all_pri_review_comments) ? $.each(result.all_pri_review_comments, (index, value) => pri_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon glyphicon glyphicon-link"></i>${value.review_comments}<br></div>`) : pri_cmts += `-`;
                                                                        (result.all_creator_review_comments) ? $.each(result.all_creator_review_comments, (index, value) => creator_cmts += `<div class="input-border dropzone unset_min_height pd-10 mgbt-md-10"><i class="append-icon fa fa-fw fa-calendar"></i>${value.created_date}<i class="append-icon fa fa-fw fa-user mgl-20"></i>${value.created_by_name}<br><br><i class="append-icon glyphicon glyphicon-link"></i>${value.review_comments}<br></div>`) : creator_cmts += `-`;
                                                                        writter += `<tr><td>${sec_cmts}</td><td>${pri_cmts}</td><td>${creator_cmts}</td></tr>`;
                                                                        (result.qa_verification_comments) ? qa_cmts += `${result.qa_verification_comments.review_comments}` : qa_cmts += `-`;
                                                                        $(".show_task_history_thead").empty().append(`<tr><td colspan="4"><span class="font-semibold"><i class="append-icon fa fa-fw fa-tasks"></i>Task <span class="badge vd_bg-blue">${result.task_id}</span> : </span>${result.task}</td></tr>`);
                                                                        $(".show_task_history_thead_qa").empty().append(`<tr><td colspan="4"><span class="font-semibold"><i class="append-icon fa fa-fw fa-gavel"></i>QA Verification : </span>${qa_cmts}</td></tr>`);
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
                                                                                    writter += `<td><i class="append-icon icon-trash vd_red vd_hover delete_file" data-file_id="${result[i].object_id}" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i></td>`;
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
                                                                    $(document).on("click", ".delete_file", function () {
                                                                        var c_this = this;
                                                                        x_delete_lm_dm_doc_file($(this).data('file_id'), $("#dms_object_id").val(), function (result) {
                                                                            if (result == "true") {
                                                                                show_notification("s", 'topright', "File Deleted Successfully");
                                                                                $(c_this).closest('tr').remove();
                                                                            } else {
                                                                                show_notification("s", 'topright', " File Not Deleted.Invalid Request Called");
                                                                            }
                                                                        });
                                                                    });
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
                                                                            capa_reason: {
                                                                                required: true
                                                                            },
                                                                            cc_reason: {
                                                                                required: true
                                                                            },
                                                                            capa_dept_head: {
                                                                                required: true
                                                                            },
                                                                            cc_dept_head: {
                                                                                required: true
                                                                            },
                                                                            udev_close_out_comments: {
                                                                                minlength: 3,
                                                                                required: true
                                                                            }
                                                                        },
                                                                        invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                            $('.alert-danger', $('#close_out-form')).fadeIn(500);
                                                                            scrollTo($('#close_out-form'), -100);
                                                                        },
                                                                        submitHandler: function (form) {
                                                                            $('#close_out').attr("disabled", true);
                                                                            loading.show();
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                    // Cancel Form 
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
    <?php echo '</script'; ?>
>
<?php }
}
