<?php
/* Smarty version 3.1.30, created on 2025-02-26 08:18:50
  from "/var/www/html/lm_qms/lib/ams/templates/view_ams.ams.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67bece6a9a55d5_88487879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78765ff3feac65c7d32806a9a4d915d959c25ea0' => 
    array (
      0 => '/var/www/html/lm_qms/lib/ams/templates/view_ams.ams.tpl',
      1 => 1728565550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
    'file:templates/common/edit_access_rights.tpl' => 1,
    'file:templates/common/recall.tpl' => 3,
    'file:pass_auth.tpl' => 5,
    'file:templates/worklist_pending_details.tpl' => 1,
  ),
),false)) {
function content_67bece6a9a55d5_88487879 (Smarty_Internal_Template $_smarty_tpl) {
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
<link rel="stylesheet" href="plugins/bootstrap-wysiwyg/css/bootstrap-wysihtml5-0.0.2.css">
<link type="text/css" rel="stylesheet" href="vendors/dropzone/css/dropzone.css">

<!-- Specific CSS -->
<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css">
<link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css">    
<link href="css/theme.min.css" rel="stylesheet" type="text/css">
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> View Audit Management System</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5 data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['show_initiation_error_msg']->value) {?>
    <div class="panel widget">
        <div class="panel-body">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="alert alert-danger alert-dismissable alert-condensed">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                        <i class="fa fa-exclamation-circle append-icon"></i> Audit To be Initiated
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="panel widget">
        <div class="panel-body">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green vd_bd-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_audit_basic_details">Audit Details </a> </h4>
                    </div>
                    <div id="collapse_audit_basic_details" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="form-wizard generate_wizard">
                                <ul>
                                    <li><a href="#tab_pri_dtls" data-toggle="tab"><div class="menu-icon"> 1 </div> Primary Details </a></li>
                                    <li><a href="#tab_audit_schedule" data-toggle="tab"><div class="menu-icon"> 2 </div> Audit Schedule</a></li>                                
                                    <li><a href="#tab_audit_finding" data-toggle="tab"><div class="menu-icon"> 3 </div> Audit Finding </a></li>
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
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_no"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['am_no']->value;?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scheduled_by"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['sch_by']->value;?>
 [<?php echo $_smarty_tpl->tpl_vars['sch_by_plant']->value;?>
] [<?php echo $_smarty_tpl->tpl_vars['sch_by_dept']->value;?>
]">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scheduled_date"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->schedule_time),$_smarty_tpl);?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"assigned_by"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['assigned_by']->value;?>
 [<?php echo $_smarty_tpl->tpl_vars['sch_by_plant']->value;?>
] [<?php echo $_smarty_tpl->tpl_vars['sch_by_dept']->value;?>
]">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"assigned_date"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->assigned_date),$_smarty_tpl);?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_lead"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_lead']->value;?>
 [<?php echo $_smarty_tpl->tpl_vars['audit_lead_plant']->value;?>
] [<?php echo $_smarty_tpl->tpl_vars['audit_lead_dept']->value;?>
]">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"qa_approval_status"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->approval_status;?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"status"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->status;?>
">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="input-border pd-10 col-md-12">
                                                                <div class="col-sm-6 pd-0">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
</div>
                                                                    <input type="checkbox" data-rel="switch" data-size="mini" data-on-text="Yes" data-off-text="No" data-wrapper-class="green"  <?php if ($_smarty_tpl->tpl_vars['am_schedule_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?> readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-newspaper"></i>Audit Details</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_plant"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_plant']->value;?>
">
                                                        </div>
                                                        <?php if ($_smarty_tpl->tpl_vars['audit_dept']->value) {?>
                                                            <div class="col-sm-3">
                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_dept"),$_smarty_tpl);?>
</div>
                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_dept']->value;?>
">
                                                            </div>
                                                        <?php }?>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_type_name']->value;?>
">
                                                            <input type="hidden" class="audit_type_id" readonly value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->audit_type_id;?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_sub_type']->value;?>
">
                                                            <input type="hidden" class="audit_sub_type_id" readonly value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->audit_sub_type_id;?>
">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->from_date),$_smarty_tpl);?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->to_date),$_smarty_tpl);?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"no_of_audit_days"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->no_of_days;?>
">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
</div>
                                                            <textarea rows="3" ><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->description),$_smarty_tpl);?>
</textarea>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scope"),$_smarty_tpl);?>
</div>
                                                            <textarea rows="3" ><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->scope),$_smarty_tpl);?>
</textarea>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"objectives"),$_smarty_tpl);?>
</div>
                                                            <textarea rows="3" ><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->objectives),$_smarty_tpl);?>
</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>QA Approval Comments</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['qa_approve_comments']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"review_comments"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qa_approve_comments']->value, 'item', false, 'key', 'list', array (
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
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-comment"></i>Audit Findings Review</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['audit_findings_review']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"review_comments"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['audit_findings_review']->value, 'item', false, 'key', 'list', array (
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
                                    <div class="tab-pane" id="tab_audit_schedule">
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-calendar"></i>Audit Schedule</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->from_date),$_smarty_tpl);?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->to_date),$_smarty_tpl);?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_type_name']->value;?>
">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
</div>
                                                            <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['audit_sub_type']->value;?>
">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scope"),$_smarty_tpl);?>
</div>
                                                            <textarea rows="3" readonly><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->scope),$_smarty_tpl);?>
</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"objectives"),$_smarty_tpl);?>
</div>
                                                            <textarea rows="3" readonly><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_schedule_obj']->value->objectives),$_smarty_tpl);?>
</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-list"></i>AUDIT AGENDA</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['ams_aduit_agenda_list']->value)) {?>
                                                        <table class="table table-bordered table-hover input-border mgbt-md-20 generate_datatable" title="Audit Agenda" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-10"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"agenda"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"auditor"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_aduit_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                                                                        <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['auditor_name']),$_smarty_tpl);?>
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
                                        <span class="font-semibold text-uppercase vd_grey h4"><i class="append-icon fa fa-clock-o"></i>AUDIT PlAN</span>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['ams_aduit_plan_list']->value)) {?>
                                                        <div class="audit_plan_table_div audit_plan_toggle">
                                                            <table class="table table-bordered table-hover input-border mgbt-md-20 generate_datatable" title="Audit Agenda" data-sort_column=1>
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"from_time"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"to_time"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"plan"),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_aduit_plan_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                        <tr>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                            <td><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['date']),$_smarty_tpl);?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['from_time'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['to_time'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plan'];?>
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
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Audit Lead</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['am_schedule_obj']->value->audit_lead)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_lead"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_lead_plant"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_lead_dept"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['audit_lead']->value;?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['audit_lead_plant']->value;?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['audit_lead_dept']->value;?>
</td>
                                                                </tr>
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
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Auditors</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'INTERNAL') {?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['ams_int_auditors']->value)) {?>
                                                            <table class="table table-bordered table-striped generate_datatable" title="Auditors" data-sort_column=1>
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_int_auditors']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_plant_name'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_dept_name'];?>
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
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'EXTERNAL') {?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['ams_ext_auditors']->value)) {?>
                                                            <table class="table table-bordered table-striped table-hover mgbt-md-0 generate_datatable" title="Auditors" data-sort_column=1>
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"ext_agency"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"auditor_name"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"designation"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"email"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"contact_number"),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_ext_auditors']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ext_agency'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['designation'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['contact_number'];?>
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
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div> 
                                        <br>
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>Auditees</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['ams_auditees']->value)) {?>
                                                        <table class="table table-bordered table-striped generate_datatable" title="Review comments" data-sort_column=1>
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                    <th class="col-md-4"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_auditees']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_name'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_plant_name'];?>
</td>
                                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_dept_name'];?>
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
                                    <div class="tab-pane" id="tab_audit_finding">
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-eye-open"></i>Audit Finding</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['ams_agenda_list']->value[0]['observation'])) {?>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <table class="table table-bordered input-border mgbt-md-20">
                                                                <tbody>
                                                                    <tr class="lm_grey">
                                                                        <td><span class="badge vd_bg-green"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                        <td class="font-semibold col-md-12"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                                                                    </tr>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['observation'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <div class="col-md-4 pd-0">
                                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                        <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: <?php echo $_smarty_tpl->tpl_vars['item1']->value['conformity'];?>
  <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Conformance') {?><i class="append-icon fa fa-fw fa-check-circle vd_green"></i><?php } else { ?><i class="append-icon append-icon icon-cross2 vd_red"></i><?php }?>
                                                                                        <br><br>
                                                                                        <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: <?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level'];?>

                                                                                        <br><br>
                                                                                        <i class="append-icon fa fa-fw fa-delicious"></i><b>Is CAPA Required </b>: <span class="label <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_capa_required'] == 'yes') {?>vd_bg-red<?php } else { ?>vd_bg-green<?php }?> append-icon"><?php echo $_smarty_tpl->tpl_vars['item1']->value['is_capa_required'];?>
</span>
                                                                                        <br><br>
                                                                                        <i class="append-icon icon-sound"></i><b>Integration No :  <?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['integration_details']->tracking_link),$_smarty_tpl);?>
</b>
                                                                                        <br><br>
                                                                                        <i class="append-icon fa fa-fw fa-delicious"></i><b>CAPA No : <?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['integration_details']->dest_doc_no_link),$_smarty_tpl);?>
</b>
                                                                                        <br>
                                                                                        <button class="btn btn-default pdlr-10 width-100 show_audit_attachments mgtp-10" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item1']->value['attachments']);?>
' data-can_delete=false>
                                                                                            <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue"><?php echo count($_smarty_tpl->tpl_vars['item1']->value['attachments']);?>
</span> Attachemnts
                                                                                        </button>
                                                                                    </div>                                                                       
                                                                                </div>
                                                                                <div class="col-md-8 pd-0">
                                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                        <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation</b>: <span class="badge vd_bg-blue"><?php echo $_smarty_tpl->tpl_vars['key1']->value+1;?>
</span>
                                                                                        <br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['observation']),$_smarty_tpl);?>
  
                                                                                        <br><br>
                                                                                        <b>
                                                                                            <?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] == 'Good Observation') {?>
                                                                                                <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                                            <?php } else { ?><i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                                            <?php }?>: 
                                                                                        </b>
                                                                                        <br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['action_to_be_taken']),$_smarty_tpl);?>

                                                                                        <br><br>
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
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"s_no"),$_smarty_tpl);?>
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
                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon glyphicon glyphicon-paperclip"></i>Audit Observation - Supporting Documents</span></h4>
                                        <div class="vd_content-section clearfix">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body table-responsive">
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['audit_observation_file_objectarray']->value)) {?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['audit_observation_file_objectarray']->value, 'item');
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
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a2&rtype=full_report">Full Report [A2-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a2&rtype=full_report">Full Report [A2-L]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a3&rtype=full_report">Full Report [A3-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a3&rtype=full_report">Full Report [A3-L]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a4&rtype=full_report">Full Report [A4-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a4&rtype=full_report">Full Report [A4-L]</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group" style="box-shadow:none;">
                                                                <label class="vd_white">Agenda</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select Type</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a2&rtype=agenda">Full Report [A2-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a2&rtype=agenda">Full Report [A2-L]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a3&rtype=agenda">Full Report [A3-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a3&rtype=agenda">Full Report [A3-L]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a4&rtype=agenda">Full Report [A4-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a4&rtype=agenda">Full Report [A4-L]</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-border mgtp-20 pd-0 pdlr-10 dropzone lm_zindex-99 unset_min_height">
                                                            <div class="lm_e-sign form-group vd_bg-dark-yellow" style="box-shadow:none;">
                                                                <label class="vd_white">Audit Findings</label>
                                                            </div>
                                                            <select  class="show_report mgbt-md-20">
                                                                <option value="">Select Type</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a2&rtype=observation">Full Report [A2-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a2&rtype=observation">Full Report [A2-L]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a3&rtype=observation">Full Report [A3-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a3&rtype=observation">Full Report [A3-L]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=p&paper_size=a4&rtype=observation">Full Report [A4-P]</option>
                                                                <option value="index.php?module=file&action=view_ams_details_file&object_id=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
&ori=l&paper_size=a4&rtype=observation">Full Report [A4-L]</option>
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
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>'meeting_date'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_date1'];?>
">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>'meeting_time'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_time'];?>
">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>'venue'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['venue'];?>
">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>'status'),$_smarty_tpl);?>
</div>
                                                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['status'];?>
">
                                                                            </div>
                                                                        </div>
                                                                        <?php if (($_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_link'])) {?>
                                                                            <div class="row">
                                                                                <div class="col-sm-9">
                                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>'online_meeting_link'),$_smarty_tpl);?>
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
                                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-user"></i>List of Invitees</span></h4>
                                                        <div class="vd_content-section clearfix">
                                                            <div class="panel widget panel-bd-left light-widget">
                                                                <div class="panel-body table-responsive">
                                                                    <?php if (!empty($_smarty_tpl->tpl_vars['meeting_participant_details']->value)) {?>
                                                                        <table class="table table-bordered table-striped generate_datatable" title="Invitees List" data-sort_column=1>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"participants"),$_smarty_tpl);?>
</th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
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
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"attendee"),$_smarty_tpl);?>
</th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
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
                                                    <div class="tab-pane" id="insight_access_rights">
                                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-key"></i>ACCESS RIGHTS </span></h4>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['current_access_rights']->value)) {?>
                                                            <table   class="table table-bordered table-striped generate_datatable" title="Access Rights" data-whitespace="pre-wrap" data-ori="landscape" data-sort_column=1>
                                                                <thead>
                                                                    <tr>
                                                                        <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"s_no"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"last_modified_by"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-1"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"last_modified_date"),$_smarty_tpl);?>
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
                                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-6"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"reason"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"cancelled_by"),$_smarty_tpl);?>
</th>
                                                                        <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"cancelled_date"),$_smarty_tpl);?>
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
                                                    <div class="tab-pane" id="insight_etrigger">
                                                        <h4><span class="font-semibold text-uppercase vd_grey"><i class="append-icon icon-sound"></i>INTEGRATION DETAILS</span></h4>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['etrigger_details']->value)) {?>
                                                            <table class="table table-bordered table-striped generate_datatable" title="Integration Details" data-ori="landscape" data-sort_column=1>
                                                                <thead>
                                                                    <tr>
                                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
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
                                                                            <td><?php ob_start();
echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['assigned_date']),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
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
                                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
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
                                                        <input type="hidden" class="query" type="hidden" value="ams_wf_audit_trail">
                                                        <input type="hidden" class="refrence_object_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
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
                                <div class="col-md-8 h4 mgtp-0 mgbt-md-0 pd-0 row"><span class="vd_blue"><strong><?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->wf_status;?>
</strong></span>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['worklist_pending_details']->value)) {?> <span data-original-title="Pending Details" data-toggle="tooltip" data-placement="bottom"> <i style="cursor: pointer;" data-target="#modal-worklist" data-toggle="modal" class="btn menu-icon vd_bd-red vd_red fa fa-tasks"></i> </span><?php }?>
                                </div>
                                <div class="progress progress-striped active mgtp-5 mgbt-md-0 vd_hover" data-original-title="<div class='mgtp-5 font-semibold'><span><i class='fa fa-circle fa-fw vd_green fa-beat-animation'></i>Completion : </span><span> <?php echo $_smarty_tpl->tpl_vars['progress_bar_status_per']->value;?>
</span></div><div class='mgtp-5 font-semibold'><span><?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->status;?>
 </span><span> - [<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->wf_status;?>
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
                                <form name="ams_comments_form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal row" role="form" id="ams_comments_form" autocomplete="off">
                                    <table class="table table-bordered table-striped generate_datatable" title="Comments" data-sort_column=1>
                                        <thead>
                                            <tr>
                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"username"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"remarks"),$_smarty_tpl);?>
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
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_Edit"> Edit <i class="fa  fa-exclamation-triangle vd_white"></i> <?php if ($_smarty_tpl->tpl_vars['show_edit_error_msg']->value) {?><span class="badge vd_bg-red fa-beat-animation" data-toggle="tooltip" data-placement="bottom" data-original-title="Kindly upadte the Mandatory Fields to proceed to the next stage"><i class="fa fa-exclamation"></i></span><?php }?></a> </h4>
                        </div>
                        <div id="collapse_Edit" class="panel-collapse collapse">
                            <div class="panel widget light-widget">
                                <div class="panel widget">
                                    <div class="panel-body">
                                        <div class="form-wizard condensed">
                                            <ul class="nav nav-pills nav-justified">
                                                <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_audit_schedule" class="btn vd_green font-semibold edit_audit_schedule"><div class="menu-icon"><span class="fa fa-calendar vd_red"></span></div>Audit Schedule</a></li>
                                                <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_agenda" class="btn vd_green font-semibold"><div class="menu-icon"><span class="fa fa-fw fa-shield vd_red"></span></div>Audit Agenda</a></li>
                                                <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_plan" class="btn vd_green font-semibold"><div class="menu-icon"><span class="fa fa-clock-o vd_red"></span></div>Audit Plan</a></li>
                                                <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_auditors" class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa-fw  fa-user vd_red"></i> </div>Auditors </a></li>
                                                <li class="input-border"><a data-toggle="modal" href="#" data-target="#edit_auditees" class="btn vd_green font-semibold"><div class="menu-icon"><i class="fa fa fa-fw fa-user vd_red" aria-hidden="true"></i></div>Auditees</a></li>
                                            </ul>
                                        </div>
                                        <!-- Start Of Edit Audit Schedule -->
                                        <div class="modal fade" id="edit_audit_schedule" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Audit Schedule</h4>
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
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_plant"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Audit Plant" title="Select Valid Audit Plant" value="<?php echo $_smarty_tpl->tpl_vars['audit_plant']->value;?>
" disabled> 
                                                                    </div>
                                                                </div>
                                                                <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'INTERNAL') {?>   
                                                                    <div class="col-md-4">
                                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div class="controls">
                                                                            <input type="text" placeholder="Audit Department" title="Select Valid Audit Department" value="<?php echo $_smarty_tpl->tpl_vars['audit_dept']->value;?>
" disabled> 
                                                                        </div>
                                                                    </div>
                                                                <?php }?>

                                                                <div class="col-md-4">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Audit Type" title="Select Valid Audit Type" value="<?php echo $_smarty_tpl->tpl_vars['audit_type_name']->value;?>
" disabled> 
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_sub_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" placeholder="Audit Sub Type" title="Select Valid Audit Sub Type" value="<?php echo $_smarty_tpl->tpl_vars['audit_sub_type']->value;?>
" disabled> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-4">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_from"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" class="generate_datepicker date_changed" name="uams_start_date" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->from_date;?>
" title="Select Valid Date" data-datepicker_min=0 data-date_changed="uams_end_date" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_date_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <input type="text" class="generate_datepicker" name="uams_end_date" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->to_date;?>
" title="Select Valid Date" data-datepicker_min=<?php ob_start();
echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->from_date;
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
>                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-label font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                                    <div class="controls">
                                                                        <input type="checkbox" class="switch_unchecked" name="uams_meeting"  data-rel="switch" data-size="mini" data-wrapper-class="green" name="uams_meeting"  data-on-text="Yes" data-off-text="No"  title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no" <?php if ($_smarty_tpl->tpl_vars['am_schedule_obj']->value->is_meeting_required == 'yes') {?>checked<?php }?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"scope"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <textarea rows="4" name="uams_scope" title="Enter Valid Scope" placeholder="The audit will assess adherence to quality management systems and GMP standards, inspect facility conditions, equipment, and personnel training, verify compliance with regulatory requirements, review risk management processes and corrective actions, and evaluate supply chain management and product quality control procedures."><?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->scope;?>
</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"objectives"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div class="controls">
                                                                        <textarea rows="4" name="uams_objectives" title="Enter Valid Objectives" placeholder="The audit aims to evaluate compliance with quality management systems and GMP standards, verify the effectiveness of regulatory adherence, assess risk management and corrective action processes, and ensure robust supply chain and product quality controls. The goal is to identify areas for improvement and confirm that all practices meet required standards."><?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->objectives;?>
</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if (!empty($_smarty_tpl->tpl_vars['ams_aduit_plan_list']->value)) {?>
                                                                <div class="alert alert-info mgbt-md-0">
                                                                    <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>Note !</strong> Making changes now will delete existing audit plan, auditors details.
                                                                </div>
                                                            <?php }?>
                                                            <div class="modal-footer pd-10">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="audit_trail_action" value="Update Audit Schedule">
                                                                        <input type="hidden" name="update_audit_schedule">
                                                                        <button class="btn vd_bg-green vd_white" type="submit" id="update_audit_schedule"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Of Edit Audit Schedule -->
                                        <!-- Start Of Edit Audit Agenda -->
                                        <div class="modal fade" id="edit_agenda" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-70">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Audit Agenda</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update_agenda-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_agenda-form" autocomplete="off">
                                                            <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                                <div class="row mgbt-md-0">
                                                                    <div class="col-md-12 font-semibold">
                                                                        <button class="btn vd_bg-green vd_white add_task_id" type="button" onclick="add_element('.add_agenda_child_ele', '.add_agenda_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mgbt-md-0">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-bordered table-striped table-hover mgbt-md-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="col-md-12"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"agenda"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="add_agenda_parent_ele">
                                                                            <?php if ($_smarty_tpl->tpl_vars['ams_agenda_list']->value) {?>
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                    <tr class="add_agenda_child_ele">
                                                                                        <td><textarea name="uams_agenda[]" class="uams_agenda reset_ele" rows="3" placeholder="Enter Agenda" title="Enter Agenda"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</textarea></td>
                                                                                        <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_agenda_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                    </tr>
                                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                            <?php } else { ?>
                                                                                <tr class="add_agenda_child_ele">
                                                                                    <td><textarea name="uams_agenda[]" class="uams_agenda reset_ele" rows="3" placeholder="Enter Agenda" title="Enter Agenda"></textarea></td>
                                                                                    <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_agenda_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pd-10">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-20" >
                                                                    <input type="hidden" name="audit_trail_action" value="Update Audit Agenda">
                                                                    <input type="hidden" name="update_agenda">
                                                                    <button class="btn vd_bg-green vd_white" type="submit" id="update_agenda"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Of Edit Audit Agenda -->
                                        <!-- Start Of Edit Plan -->
                                        <div class="modal fade" id="edit_plan" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-60">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Audit Plan</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update_audit_plan-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_audit_plan-form" autocomplete="off">
                                                            <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                                <div class="row mgbt-md-0">
                                                                    <div class="col-md-12 font-semibold">
                                                                        <button class="btn vd_bg-green vd_white add_more_plan" type="button"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mgbt-md-0">
                                                                <div class="col-sm-12">
                                                                    <table class="table table-bordered table-striped table-hover mgbt-md-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"date"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"from_time"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"to_time"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                <th class="col-md-8"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"plan"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="add_audit_plan_parent_ele">
                                                                            <?php if ($_smarty_tpl->tpl_vars['ams_aduit_plan_list']->value) {?>
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_aduit_plan_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                    <tr class="add_audit_plan_child_ele">
                                                                                        <td><input type="text" class="generate_datepicker audit_plan_date" name="uams_plan_date[]" title="Select Valid Date" data-datepicker_min=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->from_date;?>
 data-datepicker_max=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->to_date;?>
 value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
"></td>
                                                                                        <td><input type="text" class="generate_timepicker audit_plan_from_time" name="uams_plan_from_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['from_time'];?>
"></td>
                                                                                        <td><input type="text" class="generate_timepicker audit_plan_to_time" name="uams_plan_to_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['to_time'];?>
"></td>
                                                                                        <td><input type="text" class="reset_ele audit_plan" name="uams_plan[]" placeholder="Enter Plan" title="Enter Plan" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plan'];?>
"></td>
                                                                                        <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_audit_plan_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                    </tr>
                                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                            <?php } else { ?>
                                                                                <tr class="add_audit_plan_child_ele">
                                                                                    <td><input type="text" class="generate_datepicker audit_plan_date" name="uams_plan_date[]" title="Select Valid Date" data-datepicker_min=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->from_date;?>
 data-datepicker_max=<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->to_date;?>
></td>
                                                                                    <td><input type="text" class="generate_timepicker audit_plan_from_time" name="uams_plan_from_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false"></td>
                                                                                    <td><input type="text" class="generate_timepicker audit_plan_to_time" name="uams_plan_to_time[]" title="Select Valid Time" data-time_show_secondas="true" data-time_show_input="false"></td>
                                                                                    <td><input type="text" class="reset_ele audit_plan" name="uams_plan[]" placeholder="Enter Plan" title="Enter Plan"></td>
                                                                                    <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_audit_plan_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pd-10">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-20" >
                                                                    <input type="hidden" name="audit_trail_action" value="Update Audit Plan">
                                                                    <input type="hidden" name="update_audit_plan" >
                                                                    <button class="btn vd_bg-green vd_white" type="submit" id="update_audit_plan"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Of Edit Plan -->
                                        <!-- Start Of Edit Auditors -->
                                        <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'INTERNAL') {?>
                                            <div class="modal fade" id="edit_auditors" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog width-60">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-dark-green vd_white">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                            <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Auditors</h4>
                                                        </div>
                                                        <div class="modal-body pd-15">
                                                            <form name="update_auditors-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_auditors-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6 pd-0">
                                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                                            <div class="controls">
                                                                                <select onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#int_auditor_department');" title="Select Valid Plant">
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
                                                                        <div class="col-md-6 mgl-5">
                                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                                            <div class="controls">
                                                                                <select name="department" id="int_auditor_department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#uams_int_auditors_users', 'multiselect');" title="Select Valid Department">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"auditor_name"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                                        <div class="controls">
                                                                            <div class="col-md-5 pd-0">
                                                                                <select class="generate_multiselect form-control" id="uams_int_auditors_users" size="7" multiple="multiple"></select>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <br>
                                                                                <button type="button" id="uams_int_auditors_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                                <button type="button" id="uams_int_auditors_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                                <button type="button" id="uams_int_auditors_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                                                <button type="button" id="uams_int_auditors_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                            </div>
                                                                            <div class="col-md-5 pd-0">
                                                                                <select name="uams_auditors[]" id="uams_int_auditors_users_to"  class="form-control" size="7" multiple="multiple"  title="Select Valid User Name">
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_int_auditors']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_id'];?>
" data-drop_down_value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
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
                                                                <div class="modal-footer">
                                                                    <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                        <input type="hidden" name="audit_trail_action" value="Update Auditors">
                                                                        <input type="hidden" name="update_int_auditors">
                                                                        <button class="btn vd_bg-green vd_white update_btn" type="submit" id="update_auditors"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'EXTERNAL') {?>
                                            <div class="modal fade" id="edit_auditors" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog width-80">
                                                    <div class="modal-content">
                                                        <div class="modal-header vd_bg-dark-green vd_white">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                            <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Auditors</h4>
                                                        </div>
                                                        <div class="modal-body pd-15">
                                                            <form name="update_ext_auditors-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_ext_auditors-form" autocomplete="off">
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                                </div>
                                                                <div class="alert alert-warning mgbt-md-0 pd-10 input-border">
                                                                    <div class="row mgbt-md-0">
                                                                        <div class="col-md-12 font-semibold">
                                                                            <button class="btn vd_bg-green vd_white" type="button" onclick="add_element('.add_auditor_child_ele', '.add_auditor_parent_ele');"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add More</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mgbt-md-0">
                                                                    <div class="col-sm-12">
                                                                        <table class="table table-bordered table-striped table-hover mgbt-md-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"ext_agency"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                    <th class="col-md-3"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"auditor_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"designation"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"email"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                    <th class="col-md-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"contact_number"),$_smarty_tpl);?>
 <span class="vd_red">*</span></th>
                                                                                    <th><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="add_auditor_parent_ele">
                                                                                <?php if ($_smarty_tpl->tpl_vars['ams_ext_auditors']->value) {?>
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_ext_auditors']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                        <tr class="add_auditor_child_ele">
                                                                                            <td><input type="text" class="reset_ele auditor_agency" name="uams_ext_agency[]" placeholder="Enter Agency Name" title="Enter Agency Name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ext_agency'];?>
"></td>
                                                                                            <td><input type="text" class="reset_ele auditor_name" name="uams_auditor_name[]" placeholder="Enter Auditor Name" title="Enter Auditor Name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
"></td>
                                                                                            <td><input type="text" class="reset_ele auditor_desi" name="uams_auditor_designation[]" placeholder="Enter Desigination" title="Enter Desigination" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['designation'];?>
"></td>
                                                                                            <td><input type="email" class="reset_ele auditor_mail" name="uams_auditor_email[]" placeholder="Enter Email Address" title="Enter Email Address" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
"></td>
                                                                                            <td><input type="number" class="reset_ele auditor_contact" name="uams_auditor_contact_number[]" placeholder="Enter Contact Number" title="Enter Contact Valid Number" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['contact_number'];?>
"></td>
                                                                                            <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_auditor_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                        </tr>
                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                <?php } else { ?>
                                                                                    <tr class="add_auditor_child_ele">
                                                                                        <td><input type="text" class="reset_ele auditor_agency" name="uams_ext_agency[]" placeholder="Enter Agency Name" title="Enter Agency Name"></td>
                                                                                        <td><input type="text" class="reset_ele auditor_name" name="uams_auditor_name[]" placeholder="Enter Auditor Name" title="Enter Auditor Name"></td>
                                                                                        <td><input type="text" class="reset_ele auditor_desi" name="uams_auditor_designation[]" placeholder="Enter Desigination" title="Enter Desigination"></td>
                                                                                        <td><input type="email" class="reset_ele auditor_mail" name="uams_auditor_email[]" placeholder="Enter Email Address" title="Enter Email Address"></td>
                                                                                        <td><input type="number" class="reset_ele auditor_contact" name="uams_auditor_contact_number[]" placeholder="Enter Contact Number" title="Enter Valid Contact Number"></td>
                                                                                        <td><button class="btn menu-icon vd_bd-red vd_red delete_ele" data-delete_ele=".add_auditor_child_ele" type="button"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button></td>
                                                                                    </tr>
                                                                                <?php }?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                        <input type="hidden" name="audit_trail_action" value="Update Auditors">
                                                                        <input type="hidden" name="update_ext_auditors">
                                                                        <button class="btn vd_bg-green vd_white update_btn" type="submit" id="update_ext_auditors"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <!-- End Of Edit Auditors -->
                                        <!-- Start Of Edit Auditees -->
                                        <div class="modal fade" id="edit_auditees" tabindex="-1" role="dialog" aria-labelledby="edit_basic_details_ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog width-40">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-dark-green vd_white">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                        <h4 class="modal-title" id="edit_basic_details_ModalLabel">Edit Auditees</h4>
                                                    </div>
                                                    <div class="modal-body pd-15">
                                                        <form name="update_auditees-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_auditees-form" autocomplete="off">
                                                            <div class="alert alert-danger vd_hidden">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-5 pd-0">
                                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                                                        <div class="controls">
                                                                            <select onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', '#auditee_department');" title="Select Valid Plant">
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
                                                                    <div class="col-md-7 mgl-5">
                                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                                        <div class="controls">
                                                                            <select name="department" id="auditee_department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#uams_auditees_users', 'multiselect');" title="Select Valid Department">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"auditor_name"),$_smarty_tpl);?>
<span class="vd_red">*</span> </label>
                                                                    <div class="controls">
                                                                        <div class="col-md-5 pd-0">
                                                                            <select class="generate_multiselect form-control" id="uams_auditees_users" size="7" multiple="multiple"></select>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <br>
                                                                            <button type="button" id="uams_auditees_users_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                            <button type="button" id="uams_auditees_users_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                            <button type="button" id="uams_auditees_users_leftSelected" class="btn btn-block"><i  class="glyphicon glyphicon-chevron-left"></i></button>
                                                                            <button type="button" id="uams_auditeess_users_leftAll"  class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                        </div>
                                                                        <div class="col-md-5 pd-0">
                                                                            <select name="uams_auditees[]" id="uams_auditees_users_to"  class="form-control" size="7" multiple="multiple"  title="Select Valid User Name">
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_auditees']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_id'];?>
" data-drop_down_value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_name'];?>
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
                                                            <div class="modal-footer">
                                                                <div class="form-actions-condensed row mgbt-xs-0 text-right mgtp-0">
                                                                    <input type="hidden" name="audit_trail_action" value="Update Auditees">
                                                                    <input type="hidden" name="update_auditees" value="update_auditees">
                                                                    <button class="btn vd_bg-green vd_white update_btn" type="submit" id="update_auditees"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Of Edit Auditees -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['edit_attachment']->value) {?>
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_ams_attachments">Edit Attachments <i class="fa  fa-exclamation-triangle vd_white"></i></a></h4>
                        </div>
                        <div id="collapse_ams_attachments" class="panel-collapse collapse">
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
                <?php if (!empty($_smarty_tpl->tpl_vars['request_qa_approve_button']->value)) {?>
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapserequest_invest"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                        </div>
                        <div id="collapserequest_invest" class="panel-collapse collapse">
                            <div class="panel-body"> 
                                <div class="vd_content-section clearfix">
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
                                                    <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
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
                                                <label class="control-label "><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="control">
                                                    <select name="department" id="qa_approve_drop" onchange="get_action_users('<?php echo $_smarty_tpl->tpl_vars['lm_doc_id']->value;?>
', 'qa_approve', this.options[this.selectedIndex].value, '#userid');"  required title="Select Valid Department">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"user_name"),$_smarty_tpl);?>
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
                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"remarks"),$_smarty_tpl);?>
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
                <?php if (!empty($_smarty_tpl->tpl_vars['recall_qa_approver_btn']->value)) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
                                            <div class="col-md-12 row mgbt-md-0">
                                                <span class="font-semibold text-uppercase vd_grey"><i class="append-icon fa fa-fw fa-list"></i>AUDIT AGENDA</span>
                                                <table class="table table-bordered table-hover input-border mgbt-md-20">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                            <th class="col-md-12"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"agenda"),$_smarty_tpl);?>
</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_aduit_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <tr>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
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
                                            <div class="form-group row qa_approval_drop mgtp-10">
                                                <div class="col-md-2">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"approve_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select class="show_hide_ele" data-hide_forms="qa_approve_type">
                                                            <option value="">Select</option>
                                                            <option value="qa_approval_need_correction_div">Needs Correction</option>
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"remarks"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <textarea placeholder="(e.g.) Verified and Approved / Rejected" rows="3" class="" name="wf_remarks" id="wf_remarks" title="Enter Valid Remarks"></textarea>
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
                                                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                        <input type="hidden" name="audit_trail_action" value="QA Approval">
                                                        <input type="hidden" name="qa_approval_need_correction">
                                                        <button class="btn vd_bg-green vd_white" type="submit" id="qa_approval_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span> Needs Correction</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="qa_approve_type" style="display:none" id="qa_accepted_div">
                                        <form name="qa_accepted-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="qa_accepted-form" autocomplete="off">
                                            <div class="panel widget panel-bd-left light-widget">
                                                <div class="panel-body">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                    </div>
                                                    <!--Start Meeting Switch,Target Date -->
                                                    <div class="form-group date_diff">
                                                        <div class="form-label col-md-2 font-semibold"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'meeting_required'),$_smarty_tpl);?>
 <span class="vd_red">*</span></div>
                                                        <div class="controls col-md-1">
                                                            <input type="checkbox" class="switch_unchecked" id="uams_meeting" name="uams_meeting"  data-rel="switch" data-size="mini" data-wrapper-class="green"   data-on-text="Yes" data-off-text="No" title="Select Valid Option"  data-checkd_val="yes" data-uncheckd_val="no">
                                                        </div>
                                                    </div>
                                                    <!--End Meeting Switch,Target Date -->
                                                    <div class="col-md-12 row mgbt-md-0">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"qa_approval_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                        <div class="controls">
                                                            <textarea placeholder="(e.g.) Approved" rows="4" class="required" name="qa_approve_comments" required title="Enter Valid Comments"></textarea>
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"rejected_reason"),$_smarty_tpl);?>
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
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"meeting_date"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                            <div  class="controls">
                                                                <input type="text" class="generate_datepicker" name="meeting_date" title="Select Valid Meeting Date" data-datepicker_min=0>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"meeting_time"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                            <div  class="controls">
                                                                <input type="text" class="generate_timepicker" name="meeting_time"  title="Select Valid Meeting Time">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"venue"),$_smarty_tpl);?>
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
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"online_meeting_link"),$_smarty_tpl);?>
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
                                                                <select name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
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
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                                            <div class="controls">
                                                                <select name="department" id="department"  onchange="get_dept_users(this.options[this.selectedIndex].value, '#participant_from_users', 'multiselect', '<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->created_by;?>
');" title="Select Valid Department">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"schedule_to"),$_smarty_tpl);?>
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
                                            <div class="panel-body panel-bd-left">
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"meeting_date"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <input type=text class="generate_datepicker" name="rmeeting_date" id="rmeeting_date"  title="Select Valid Meeting Date" data-datepicker_min=0 value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_date'];?>
">
                                                        </div>
                                                        <div id="rexist_error_meeting_date_message"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"meeting_time"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                        <div  class="controls">
                                                            <input type=text class="generate_timepicker" name="rmeeting_time" id="rmeeting_time" placeholder="HH:MM" title="Select Valid Meeting Time" value="<?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value['meeting_time'];?>
">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"venue"),$_smarty_tpl);?>
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
                                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"online_meeting_link"),$_smarty_tpl);?>
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"reason"),$_smarty_tpl);?>
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
                                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"attendees"),$_smarty_tpl);?>
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
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"remarks"),$_smarty_tpl);?>

                                                                    <span class="vd_red">*</span></label>
                                                                <div  class="controls">
                                                                    <textarea placeholder="(e.g.) Kindly schedule training" rows="3" name="wf_remarks" id="wf_remarks" maxlength="500" required title="Enter Valid Remarks"></textarea>
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
                <?php if (!empty($_smarty_tpl->tpl_vars['show_assign_auditor_button']->value)) {?>
                    <div class="panel panel-default mgtp-5">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_assign_auditors_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                        </div>
                        <div id="collapse_show_assign_auditors_button" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="vd_content-section clearfix">
                                    <div class="panel widget light-widget"><div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">ASSIGN AUDITORS FORM</h3></div>
                                        <div class="panel-body panel-bd-left">
                                            <!--Cancel Form -->
                                            <form name="assign_auditors-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="assign_auditors-form" autocomplete="off">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12  mgtp-10">
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><span class="badge vd_bg-green"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                        <td class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                                                                        <td class="col-md-3">
                                                                            <select class="uams_assign_auditors" name="uams_assign_auditors[]" title="Select Auditor"">
                                                                                <option value="">Select</option>
                                                                                <?php if ($_smarty_tpl->tpl_vars['ams_int_auditors']->value) {?>
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_int_auditors']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</option>
                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                <?php }?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['ams_ext_auditors']->value) {?>
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_ext_auditors']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</option>
                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                <?php }?>
                                                                            </select>
                                                                        </td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'INTERNAL') {?>
                                                                            <td class="col-md-1">
                                                                                <span class="font-semibold mgl-10"><span class="vd_checkbox checkbox-danger"><input type="checkbox" name="uams_assign_auditors[]" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->audit_lead;?>
" id="audit_myself_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="audit_myself"><label for="audit_myself_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" ></label></span> Myself</span>
                                                                            </td>
                                                                        <?php }?>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <input type="hidden" name="agenda_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
">
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </div>
                                                </div>
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="Assign Auditors">
                                                    <input type="hidden" name="assign_auditors">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="assign_auditors"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Assign</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['show_update_observation_button']->value)) {?>
                    <div class="panel panel-default mgtp-5">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_observation_button"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                        </div>
                        <div id="collapse_show_observation_button" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="vd_content-section clearfix">
                                    <div class="panel widget light-widget"> 
                                        <div class="panel-heading bordered vd_bg-blue"><span class="panel-title vd_white font-semibold">AUDIT FINDING</span><span class="vd_white mgl-10">( To be filled by audit lead )</span></div>
                                        <div class="panel-body panel-bd-left">
                                            <form name="update_audit_observation-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_audit_observation-form" autocomplete="off" enctype="multipart/form-data">
                                                <div class="alert alert-danger vd_hidden">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12  mgtp-10">
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr class="lm_grey">
                                                                        <td><span class="badge vd_bg-green"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                        <td class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>

                                                                            <span class="vd_hover pull-right" data-original-title="Auditor" data-toggle="tooltip" data-placement="bottom">
                                                                                <?php if ($_smarty_tpl->tpl_vars['audit_type_name']->value == 'INTERNAL') {?> [ <i class="fa fa-fw fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
] <?php }?>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>    
                                                                        <td colspan="2">
                                                                            <span class="label vd_bg-blue append-icon vd_hover cal_ob" data-original-title="Add More Observation" data-toggle="tooltip" data-placement="bottom" onclick="add_element(lm_dom.find_in_parent(this, 'table', '.add_mul_ob_child'), lm_dom.find_in_parent(this, 'table', '.add_mul_ob_parent'));">
                                                                                <i class="fa fa-fw fa-plus"></i>
                                                                            </span>
                                                                            <span class="pull-right">Total Observations : <span class="total_ob badge vd_bg-blue"><?php if ($_smarty_tpl->tpl_vars['item']->value['observation']) {
echo count($_smarty_tpl->tpl_vars['item']->value['observation']);
} else { ?>1<?php }?></span></span> 
                                                                        </td>
                                                                    </tr>  
                                                                </tbody>
                                                                <tbody class="add_mul_ob_parent parent_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 2d_parent">
                                                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['observation']) {?>
                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['observation'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                            <tr class="add_mul_ob_child mgtp-5">
                                                                                <td colspan="2">
                                                                                    <button class="btn vd_bg-red vd_white delete_ele pd-10 pull-right cal_ob" type="button" data-delete_ele=".add_mul_ob_child" data-delete_from=".parent_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="position:relative;margin-bottom: -4% !important;"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                                    <!-- Observation -->
                                                                                    <textarea name="uams_audit_observation_id[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" class="reset_ele" style="display:none"><?php echo $_smarty_tpl->tpl_vars['item1']->value['object_id'];?>
</textarea>
                                                                                    <textarea rows="3" class="audit_observation 2d_array reset_ele" name="uams_audit_observation[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Enter Audit Observation" placeholder="Audit Observation" data-2dname="uams_audit_observation" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item1']->value['observation'];?>
</textarea>
                                                                                    <!-- attachment -->
                                                                                    <div class="col-md-3 pd-0" style="margin-top:-5px;">
                                                                                        <input type="file" name="file[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
][]" multiple class="pd-5">
                                                                                    </div>
                                                                                    <div class="col-md-2 btn-group pd-0 reset_ele" style="margin-top:-5px;">
                                                                                        <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item1']->value['attachments']);?>
' data-can_delete=true><i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue reset_ele"><?php echo count($_smarty_tpl->tpl_vars['item1']->value['attachments']);?>
</span></button>
                                                                                    </div>
                                                                                    <!--NC -->
                                                                                    <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                        <select class="audit_conformity vd_bg-white 2d_array" name="uams_conformity[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Select Conformity" style="padding-bottom:7px !important;" data-2dname="uams_conformity" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                                                                            <option value="">Select Conformity</option>
                                                                                            <option value="Conformance" <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Conformance') {?>selected<?php }?>>Conformance</option>
                                                                                            <option value="Non Conformance" <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Non Conformance') {?>selected<?php }?>>Non Conformance</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <!--NC Category -->
                                                                                    <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                        <select class="severity_level vd_bg-white 2d_array" name="uams_severity_level[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Select Severity Level" style="padding-bottom:7px !important;" data-2dname="uams_severity_level" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                                                                            <option value="">Select Severity Level</option>
                                                                                            <option class="conformance_opt" style="display:none;" value="Good Observation" <?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] == 'Good Observation') {?>selected<?php }?>>Good Observation</option>
                                                                                            <option class="non_conformance_opt" style="display:none;"  value="Major NC" <?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] == 'Major NC') {?>selected<?php }?>>Major NC </option>
                                                                                            <option class="non_conformance_opt" style="display:none;" value="Minor NC" <?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] == 'Minor NC') {?>selected<?php }?> >Minor NC </option>
                                                                                            <option class="non_conformance_opt" style="display:none;" value="OFI" <?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] == 'OFI') {?>selected<?php }?>>OFI </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-2 pd-0 input-border capa_div pd-5 <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Conformance') {?>lm_grey<?php }?>"  style="margin-top:-5px;">
                                                                                        <span><i class="append-icon fa fa-fw fa-delicious" style="margin-top:3%;"></i><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"is_capa_required"),$_smarty_tpl);?>
</span>
                                                                                    </div>
                                                                                    <div class="col-md-1 pd-0 capa_div"  style="margin-top:-5px;">
                                                                                        <select class="is_capa_required vd_bg-white" name="is_capa_required[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" data-2dname="is_capa_required" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style=";padding-top:6%;" title="Select is CAPA required">
                                                                                            <option class="hide_capa" value="" <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Conformance') {?>style="display:none;"<?php }?>>Select</option>
                                                                                            <option class="hide_capa" value="yes" <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Conformance') {?>style="display:none;"<?php }
if ($_smarty_tpl->tpl_vars['item1']->value['is_capa_required'] == 'yes') {?>selected<?php }?>>Yes</option>
                                                                                            <option value="no" <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_capa_required'] == 'no') {?>selected<?php }?>>No</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <!--Action To Be Taken Category -->
                                                                                    <textarea rows="3" class="nc_action 2d_array reset_ele" name="uams_nc_action[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Enter Action To Be Taken" placeholder="Action To Be Taken" data-2dname="uams_nc_action" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"  <?php if (!$_smarty_tpl->tpl_vars['item1']->value['action_to_be_taken']) {?>style="display:none;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item1']->value['action_to_be_taken'];?>
</textarea>
                                                                                </td>
                                                                            </tr>
                                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                    <?php } else { ?>
                                                                        <tr class="add_mul_ob_child mgtp-5">
                                                                            <td colspan="2">
                                                                                <button class="btn vd_bg-red vd_white delete_ele pd-10 pull-right cal_ob" type="button" data-delete_ele=".add_mul_ob_child" data-delete_from=".parent_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="position:relative;margin-bottom: -4% !important;"><span class="menu-icon"><i class="fa fa-trash-o"></i></span></button>
                                                                                <!-- Observation -->
                                                                                <textarea rows="3" class="audit_observation 2d_array" name="uams_audit_observation[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Enter Audit Observation" placeholder="Audit Observation" data-2dname="uams_audit_observation" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></textarea>
                                                                                <!-- attachment -->
                                                                                <div class="col-md-3 pd-0" style="margin-top:-5px;">
                                                                                    <input type="file" name="file[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" multiple class="pd-5">
                                                                                </div>
                                                                                <div class="col-md-2 btn-group pd-0" style="margin-top:-5px;">
                                                                                    <button class="btn btn-default pdlr-10 width-100 shown_audit_attachments" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='' data-can_delete=true><i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue"></span></button>
                                                                                </div>
                                                                                <!--NC -->
                                                                                <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                    <select class="audit_conformity vd_bg-white 2d_array" name="uams_conformity[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Select Conformity" style="padding-bottom:7px !important;" data-2dname="uams_conformity" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                                                                        <option value="">Select Conformity</option>
                                                                                        <option value="Conformance">Conformance</option>
                                                                                        <option value="Non Conformance">Non Conformance</option>
                                                                                    </select>
                                                                                </div>
                                                                                <!--NC Category -->
                                                                                <div class="col-md-2 btn-group pd-0"  style="margin-top:-5px;">
                                                                                    <select class="severity_level vd_bg-white 2d_array" name="uams_severity_level[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Select Severity Level" style="padding-bottom:7px !important;" data-2dname="uams_severity_level" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                                                                        <option value="">Select Severity Level</option>
                                                                                        <option class="conformance_opt" style="display:none;" value="Good Observation">Good Observation</option>
                                                                                        <option class="non_conformance_opt" style="display:none;"  value="Major NC">Major NC </option>
                                                                                        <option class="non_conformance_opt" style="display:none;" value="Minor NC">Minor NC </option>
                                                                                        <option class="non_conformance_opt" style="display:none;" value="OFI">OFI </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-2 pd-0 input-border capa_div pd-5"  style="margin-top:-5px;">
                                                                                    <span><i class="append-icon fa fa-fw fa-delicious" style="margin-top:3%;"></i><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"is_capa_required"),$_smarty_tpl);?>
</span>
                                                                                </div>
                                                                                <div class="col-md-1 pd-0 capa_div"  style="margin-top:-5px;">
                                                                                    <select class="is_capa_required vd_bg-white" name="is_capa_required[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" data-2dname="is_capa_required" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style=";padding-top:6%;" title="Select is CAPA required">
                                                                                        <option class="hide_capa" value="">Select</option>
                                                                                        <option class="hide_capa" value="yes">Yes</option>
                                                                                        <option value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                                <!--Action To Be Taken Category -->
                                                                                <textarea rows="3" class="nc_action 2d_array" name="uams_nc_action[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" title="Enter Action To Be Taken" placeholder="Action To Be Taken" data-2dname="uams_nc_action" data-2d_index="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></textarea>
                                                                            </td>
                                                                        </tr>
                                                                    <?php }?>
                                                                </tbody>
                                                            </table>
                                                            <input type="hidden" name="agenda_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
">
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </div>
                                                </div>
                                                <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                                                    <input type="hidden" name="audit_trail_action" value="Update Audit Obervation">
                                                    <input type="hidden" id="observation_submit_type">
                                                    <button class="btn vd_bg-blue vd_white" type="submit" id="save_observation" name="save"><span class="menu-icon"><i class="fa fa-fw fa-save"></i></span> Save</button>
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="update_observation" name="complete"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Complete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['recall_audit_findings_review_btn']->value)) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:templates/common/recall.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['show_audit_findings_review_btn']->value)) {?>
                    <div class="panel panel-default">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseshowreview"> Action <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                        </div>
                        <div id="collapseshowreview" class="panel-collapse collapse">
                            <div class="panel-body">   
                                <div class="vd_content-section clearfix">
                                    <div class="panel-heading bordered vd_bg-blue">
                                        <h3 class="panel-title vd_white font-semibold">AUDIT FINDINGS REVIEW FORM</h3>
                                    </div>
                                    <div class="panel widget light-widget">
                                        <div class="panel-body panel widget panel-bd-left light-widget">
                                            <div class="alert alert-danger vd_hidden">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3 row">
                                                    <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"review_type"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                                                    <div class="controls">
                                                        <select class="show_hide_ele" name="select_audit_findings_review" required title="Select Valid Review Type" data-hide_forms="audit_findings_review_div">
                                                            <option value="">Select</option>
                                                            <option value="audit_findings_review_div">Review</option>
                                                            <option value="audit_findings_review_need_correction_div">Needs Correction</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel widget light-widget audit_findings_review_div" id="audit_findings_review_div" style="display:none;">
                                            <form name="audit_findings_review-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="audit_findings_review-form" autocomplete="off">
                                                <div class="panel-bd-left">
                                                    <div class="panel-body">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <table class="table table-bordered input-border mgbt-md-20">
                                                                <tbody>
                                                                    <tr class="lm_grey">
                                                                        <td><span class="badge vd_bg-green"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span></td>
                                                                        <td class="font-semibold col-md-12"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                                                                    </tr>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['observation'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <div class="col-md-4 pd-0">
                                                                                    <div class="input-border pd-15 dropzone lm_zindex-99 vd_bg-white" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                        <i class="append-icon fa fa-fw fa-indent"></i><b>NC Type </b>: <?php echo $_smarty_tpl->tpl_vars['item1']->value['conformity'];?>
  <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity'] == 'Conformance') {?><i class="append-icon fa fa-fw fa-check-circle vd_green"></i><?php } else { ?><i class="append-icon append-icon icon-cross2 vd_red"></i><?php }?>
                                                                                        <br><br>
                                                                                        <i class="append-icon glyphicon glyphicon-signal"></i><b>Severity Level </b>: <?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level'];?>

                                                                                        <br><br>
                                                                                        <i class="append-icon fa fa-fw fa-delicious"></i><b>Is CAPA Required </b>: <span class="label <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_capa_required'] == 'yes') {?>vd_bg-red<?php } else { ?>vd_bg-green<?php }?> append-icon"><?php echo $_smarty_tpl->tpl_vars['item1']->value['is_capa_required'];?>
</span>
                                                                                        <br><br>
                                                                                        <i class="append-icon icon-sound"></i><b>Integration No : </b> 
                                                                                        <br><br>
                                                                                        <i class="append-icon fa fa-fw fa-delicious"></i>CAPA No : 
                                                                                        <br>
                                                                                        <button class="btn btn-default pdlr-10 width-100 show_audit_attachments mgtp-10" type="button"  data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='<?php echo json_encode($_smarty_tpl->tpl_vars['item1']->value['attachments_observe']);?>
' data-can_delete=false>
                                                                                            <i class="append-icon glyphicon glyphicon-paperclip"></i><span class="badge vd_bg-blue"><?php echo count($_smarty_tpl->tpl_vars['item1']->value['attachments_observe']);?>
</span> Attachemnts
                                                                                        </button>
                                                                                    </div>                                                                       
                                                                                </div>
                                                                                <div class="col-md-8 pd-0">
                                                                                    <div class="input-border pd-15 lm_zindex-99 <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_capa_required'] == 'yes') {?>bg-info<?php } else { ?>vd_bg-white<?php }?>" data-rel="scroll" data-scrollheight="250" style="min-height:250px;">
                                                                                        <?php if ($_smarty_tpl->tpl_vars['item1']->value['is_capa_required'] == 'yes') {?>
                                                                                            <div class="col-md-12 pd-0 mgbt-md-20">
                                                                                                <label class="control-label"><i class="fa fa-fw fa-delicious"></i> <?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"capa_reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                                                <div class="controls mgtp-5">
                                                                                                    <textarea rows="3" name="capa_reason[]" class="capa_reason" title="Enter Valid Reason"></textarea>
                                                                                                    <!-- Plant -->
                                                                                                    <select class="col-md-4" name="plant" onchange="get_access_rights_dept_list('<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
', this.options[this.selectedIndex].value, '', 'yes', lm_dom.find_in_parent(this, 'tr', '.dept'));" title="Select Valid Plant" style="margin-top:-5px">
                                                                                                        <option value="">Select Plant</option>
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
                                                                                                    <!-- Department -->
                                                                                                    <select class="col-md-4 dept" name="department" id="qa_review_drop" onchange="get_dept_users(this.options[this.selectedIndex].value, lm_dom.find_in_parent(this, 'tr', '.capa_user'));"   title="Select Valid Department" style="margin-top:-5px">
                                                                                                        <option value="">Select Department</option>
                                                                                                    </select>
                                                                                                    <!-- User -->
                                                                                                    <div class="controls ">
                                                                                                        <select class="col-md-4 capa_user" name="capa_user[]" id="userid" title="Select Valid User Name" style="margin-top:-5px">
                                                                                                            <option value="">Select User</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden" name="observation_object_id[]" value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['object_id'];?>
">
                                                                                            </div>
                                                                                        <?php }?>
                                                                                        <b><i class="append-icon glyphicon glyphicon-eye-open"></i>Observation</b>: <span class="badge vd_bg-blue"><?php echo $_smarty_tpl->tpl_vars['key1']->value+1;?>
</span>
                                                                                        <br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['observation']),$_smarty_tpl);?>
  
                                                                                        <br><br>
                                                                                        <b>
                                                                                            <?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] == 'Good Observation') {?>
                                                                                                <i class="append-icon fa fa-fw fa-gavel"></i>Justification 
                                                                                            <?php } else { ?><i class="append-icon glyphicon glyphicon-wrench"></i>Action To Be Taken
                                                                                            <?php }?>: 
                                                                                        </b>
                                                                                        <br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['action_to_be_taken']),$_smarty_tpl);?>

                                                                                        <br><br>
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
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        <div class="form-group mgbt-md-0">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"review_comments"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                <div  class="controls  ">
                                                                    <textarea placeholder="(e.g.) Reviewed" rows="4" class="required" name="audit_findings_review_comments" id="audit_findings_review_comments" required title="Enter Valid Comments"></textarea>
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
                                                            <input type="hidden" name="audit_findings_reviewed">
                                                            <input type="hidden" name="audit_trail_action" value="Audit Findings Review">
                                                            <button class="btn vd_bg-green vd_white" type="submit" id="audit_findings_reviewed"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span>Review</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="panel widget light-widget audit_findings_review_div" id="audit_findings_review_need_correction_div" style="display:none;">
                                            <form name="audit_findings_review_need_correction-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="audit_findings_review_need_correction-form" autocomplete="off">
                                                <div class="panel-bd-left">
                                                    <div class="panel-body">
                                                        <div class="alert alert-danger vd_hidden">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                                        </div>
                                                        <div class="form-group mgbt-md-0">
                                                            <div class="col-md-12">
                                                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"remarks"),$_smarty_tpl);?>
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
                                                            <input type="hidden" name="audit_findings_review_need_correction">
                                                            <input type="hidden" name="audit_trail_action" value="Audit Findings Review">
                                                            <button class="btn vd_bg-green vd_white" type="submit" id="audit_findings_review_need_correction"><span class="menu-icon"><i class="fa fa-fw fa-arrow-left"></i></span>Needs Correction</button>
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
                <?php if (!empty($_smarty_tpl->tpl_vars['cancel_button']->value)) {?>
                    <div class="panel panel-default mgtp-5">
                        <div class="panel-heading vd_bg-dark-green">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse_show_cancel_button"> Cancel <i class="fa  fa-exclamation-triangle vd_white"></i></a> </h4>
                        </div>
                        <div id="collapse_show_cancel_button" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="vd_content-section clearfix">
                                    <div class="panel widget light-widget">
                                        <div class="panel-heading bordered vd_bg-blue"><h3 class="panel-title vd_white font-semibold">CANCEL FORM</h3></div>
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

    <!-- Start Of Audit Attachments Modal -->
    <div class="modal fade" id="modal_audit_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header vd_bg-dark-green vd_white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Audit Attachments <span class="show_audit_attachments_id"></span></h4>
                </div>
                <div class="modal-body pd-15">
                    <table class="table table-bordered table-striped table-hover show_audit_attachments_table">
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
                                <th class="show_audit_attachments_action"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                            </tr>
                        </thead>
                        <tbody class="show_audit_attachments_tbody"></tbody>
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
<?php }?>
<input type="hidden" id="am_object_id" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->object_id;?>
" />
<input type="hidden" id="wf_status" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->wf_status;?>
"/>
<input type="hidden" id="status" value="<?php echo $_smarty_tpl->tpl_vars['am_schedule_obj']->value->status;?>
" />

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
 type="text/javascript" src='plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src='plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
                                                                                                        $(document).ready(function () {
                                                                                                            notification("topright", "success", "fa fa-info-circle vd_blue", "Status", `${$("#status").val()} - [${$("#wf_status").val()}]`);
                                                                                                            "use strict";
                                                                                                            //Edit Audit Schedule Form Validation
                                                                                                            $('#update_audit_schedule-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                ignore: "",
                                                                                                                rules: {
                                                                                                                    uams_start_date: {
                                                                                                                        required: true
                                                                                                                    },
                                                                                                                    uams_end_date: {
                                                                                                                        required: true
                                                                                                                    },
                                                                                                                    uams_scope: {
                                                                                                                        minlength: 3,
                                                                                                                        required: true
                                                                                                                    },
                                                                                                                    uams_objectives: {
                                                                                                                        minlength: 3,
                                                                                                                        required: true
                                                                                                                    }
                                                                                                                },
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#update_audit_schedule-form')).fadeIn(500);
                                                                                                                    scrollTo($('#update_audit_schedule-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    $('#update_audit_schedule').attr("disabled", true);
                                                                                                                    loading.show();
                                                                                                                    form.submit();
                                                                                                                }
                                                                                                            });
                                                                                                            //Edit Audit Schedule Form Validation
                                                                                                            $('#update_agenda-form').validate({
                                                                                                                submitHandler: function (form) {
                                                                                                                    if (lm_validate.array_of_input([".uams_agenda@"])) {
                                                                                                                        $('#update_agenda').attr("disabled", true);
                                                                                                                        loading.show();
                                                                                                                        form.submit();
                                                                                                                    }
                                                                                                                }
                                                                                                            });
                                                                                                            //Add More Plan
                                                                                                            $(document).on("click", ".add_more_plan", function () {
                                                                                                                add_element('.add_audit_plan_child_ele', '.add_audit_plan_parent_ele');
                                                                                                                $.each([".audit_plan_date", ".audit_plan_from_time", ".audit_plan_to_time", ".audit_plan"], (_, ele) => lm_dom.assign_unique_attr_val(ele, "id"));
                                                                                                                lm_dom.re_initialize();
                                                                                                            });
                                                                                                            $(document).on("change", ".audit_plan_to_time2", function () {
                                                                                                                //   alert($(this).val());
                                                                                                                // alert(lm_dom.find_in_parent(this, 'tr', '.audit_plan_from_time').val());
                                                                                                                if ($(this).val() < lm_dom.find_in_parent(this, 'tr', '.audit_plan_from_time').val()) {
                                                                                                                    show_notification("e", 'topright', "Time (To)  cannot be less than Time (From) ");
                                                                                                                    $(this).val("");
                                                                                                                }
                                                                                                            });
                                                                                                            //Edit Audit Plan Form Validation
                                                                                                            $('#update_audit_plan-form').validate({
                                                                                                                submitHandler: function (form) {
                                                                                                                    if (lm_validate.array_of_input([".audit_plan_date@", ".audit_plan_from_time@", ".audit_plan_to_time@", ".audit_plan@"])) {
                                                                                                                        $('#update_audit_plan').attr("disabled", true);
                                                                                                                        loading.show();
                                                                                                                        form.submit();
                                                                                                                    }
                                                                                                                }
                                                                                                            });
                                                                                                            //Edit Internal Auditors Form Validation
                                                                                                            $('#update_auditors-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                ignore: "",
                                                                                                                rules: {
                                                                                                                    'uams_auditors[]': {
                                                                                                                        required: true
                                                                                                                    }
                                                                                                                },
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#update_auditors-form')).fadeIn(500);
                                                                                                                    scrollTo($('#update_auditors-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    $('#update_auditors').attr("disabled", true);
                                                                                                                    loading.show();
                                                                                                                    form.submit();
                                                                                                                }
                                                                                                            });
                                                                                                            //Edit Auditees Form Validation
                                                                                                            $('#update_ext_auditors-form').validate({
                                                                                                                submitHandler: function (form) {
                                                                                                                    if (lm_validate.array_of_input([".auditor_agency@", ".auditor_name@", ".auditor_desi@", ".auditor_mail@", ".auditor_contact@"])) {
                                                                                                                        $('#update_ext_auditors').attr("disabled", true);
                                                                                                                        loading.show();
                                                                                                                        form.submit();
                                                                                                                    }
                                                                                                                }
                                                                                                            });
                                                                                                            //Edit Auditees Form Validation
                                                                                                            $('#update_auditees-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                ignore: "",
                                                                                                                rules: {
                                                                                                                    'uams_auditees[]': {
                                                                                                                        required: true
                                                                                                                    }
                                                                                                                },
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#update_auditees-form')).fadeIn(500);
                                                                                                                    scrollTo($('#update_auditees-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    $('#update_auditees').attr("disabled", true);
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
                                                                                                            //QA Accepted form
                                                                                                            $('#qa_accepted-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                ignore: ":hidden", // Ensures hidden fields are ignored
                                                                                                                rules: {
                                                                                                                    qa_approve_comments: {
                                                                                                                        required: true
                                                                                                                    },
                                                                                                                    uams_meeting_date: {
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
                                                                                                            //QA Rejectd Form
                                                                                                            $('#qa_rejected-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                rules: {
                                                                                                                    udev_reject_reason: {
                                                                                                                        minlength: 3,
                                                                                                                        required: true
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
                                                                                                                    }
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
                                                                                                                    wf_remarks: {
                                                                                                                        minlength: 3,
                                                                                                                        required: true
                                                                                                                    }
                                                                                                                },
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#update_meeting_conclusion-form')).fadeIn(500);
                                                                                                                    scrollTo($('#update_meeting_conclusion-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    $('#meeting_completed').attr("disabled", true);
                                                                                                                    loading.show();
                                                                                                                    form.submit();
                                                                                                                }
                                                                                                            });
                                                                                                            //Assigm Myself Audit
                                                                                                            $(document).on("click", ".audit_myself", (e) => ($(e.target).is(':checked')) ? lm_dom.find_in_parent(e.target, 'tr', '.uams_assign_auditors').prop("disabled", true).val("") : lm_dom.find_in_parent(e.target, 'tr', '.uams_assign_auditors').removeAttr("disabled"));
                                                                                                            //Assign Auditors Form
                                                                                                            $('#assign_auditors-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#assign_auditors-form')).fadeIn(500);
                                                                                                                    scrollTo($('#assign_auditors-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    if (lm_validate.array_of_input([".uams_assign_auditors@"])) {
                                                                                                                        $('#assign_auditors').attr("disabled", true);
                                                                                                                        loading.show();
                                                                                                                        form.submit();
                                                                                                                    }
                                                                                                                }
                                                                                                            });
                                                                                                            $(document).on("change", ".audit_conformity", function () {
                                                                                                                lm_dom.find_in_parent(this, 'td', '.conformance_opt,non_conformance_opt').hide();
                                                                                                                lm_dom.find_in_parent(this, 'td', '.observation_score,.severity_level').val("");
                                                                                                                lm_dom.find_in_parent(this, 'tr', '.capa_div').removeClass("lm_grey").find(".is_capa_required").val("").find(".hide_capa").show();

                                                                                                                if ($(this).val() === "Conformance") {
                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.conformance_opt').show();
                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.non_conformance_opt').hide();
                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.severity_level').focus();
                                                                                                                }
                                                                                                                if ($(this).val() === "Non Conformance") {
                                                                                                                    lm_dom.find_in_parent(this, 'td', '.conformance_opt').hide();
                                                                                                                    lm_dom.find_in_parent(this, 'td', '.non_conformance_opt').show();
                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.severity_level').focus();
                                                                                                                }
                                                                                                            });
                                                                                                            $(document).on('change', '.severity_level', function () {
                                                                                                                if ($(this).val()) {

                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.nc_action').show().removeAttr("disabled").val("");

                                                                                                                    if ($(this).val() !== "Good Observation") {
                                                                                                                        lm_dom.find_in_parent(this, 'tr', '.nc_action').attr('placeholder', 'Action To Be Taken *').addClass("action_required");
                                                                                                                        lm_dom.find_in_parent(this, 'tr', '.capa_div').removeClass("lm_grey").find(".is_capa_required").val("");
                                                                                                                    } else {
                                                                                                                        lm_dom.find_in_parent(this, 'tr', '.nc_action').attr('placeholder', 'Justification').removeClass("action");
                                                                                                                        lm_dom.find_in_parent(this, 'tr', '.capa_div').addClass("lm_grey").find(".is_capa_required").val("no").find(".hide_capa").hide();
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.nc_action').hide().attr("disabled", true);
                                                                                                                    lm_dom.find_in_parent(this, 'tr', '.capa_div').removeClass("lm_grey").find(".is_capa_required").val("").find(".hide_capa").show();
                                                                                                                }
                                                                                                            });
                                                                                                            $(document).on('click', '.cal_ob', (e) => lm_dom.find_in_parent(e.target, 'table', '.total_ob').html(lm_dom.find_in_parent(e.target, 'table', 'tbody').find('.add_mul_ob_child').length));
                                                                                                            $(document).on('chnage', '.disable_capa', (e) => e.preventDefault());
                                                                                                            //Update Audit Observation Form
                                                                                                            $('#update_audit_observation-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#update_audit_observation-form')).fadeIn(500);
                                                                                                                    scrollTo($('#update_audit_observation-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    if (!$(form).find(".invalid_score").length) {
                                                                                                                        var type = event.submitter.name;
                                                                                                                        //Save Observation
                                                                                                                        if (type === "save") {
                                                                                                                            $('#save_observation,#update_observation').attr("disabled", true);
                                                                                                                            $("#observation_submit_type").attr("name", "save_observation");
                                                                                                                            loading.show();
                                                                                                                            form.submit();
                                                                                                                        }
                                                                                                                        //Observation Complete
                                                                                                                        else if (type === "complete") {
                                                                                                                            if (lm_validate.array_of_input([".audit_observation@", ".audit_conformity@", ".severity_level@", ".action_required@", ".is_capa_required@"])) {
                                                                                                                                $('#save_observation,#update_observation').attr("disabled", true);
                                                                                                                                $("#observation_submit_type").attr("name", "complete_observation");
                                                                                                                                loading.show();
                                                                                                                                form.submit();
                                                                                                                            }
                                                                                                                        }
                                                                                                                    } else {
                                                                                                                        show_notification("e", 'topright', "Enter Valid Score");
                                                                                                                    }
                                                                                                                }
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
                                                                                                                    if ($(form).find(".capa_reason").length) {
                                                                                                                        if (!lm_validate.array_of_input([".capa_reason@", ".capa_user@"])) {
                                                                                                                            return false;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    $('#qa_reviewed').attr("disabled", true);
                                                                                                                    loading.show();
                                                                                                                    form.submit();
                                                                                                                }
                                                                                                            });
                                                                                                            // Audit Findings Review Form Validation
                                                                                                            $('#audit_findings_review-form').validate({
                                                                                                                errorElement: 'div', //default input error message container
                                                                                                                errorClass: 'vd_red', // default input error message class
                                                                                                                focusInvalid: false, // do not focus the last invalid input
                                                                                                                ignore: "",
                                                                                                                rules: {
                                                                                                                    audit_findings_review_comments: {
                                                                                                                        minlength: 3,
                                                                                                                        required: true
                                                                                                                    }
                                                                                                                },
                                                                                                                invalidHandler: function (event, validator) { //display error alert on form submit              
                                                                                                                    $('.alert-danger', $('#audit_findings_review-form')).fadeIn(500);
                                                                                                                    scrollTo($('#audit_findings_review-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    if ($(form).find(".capa_reason").length) {
                                                                                                                        if (!lm_validate.array_of_input([".capa_reason@", ".capa_user@"])) {
                                                                                                                            return false;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    $('#audit_findings_reviewed1').attr("disabled", true);
                                                                                                                    loading.show();
                                                                                                                    form.submit();
                                                                                                                }
                                                                                                            });
                                                                                                            // Audit Findings Review Need Correction Form Validation
                                                                                                            $('#audit_findings_review_need_correction-form').validate({
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
                                                                                                                    $('.alert-danger', $('#audit_findings_review_need_correction-form')).fadeIn(500);
                                                                                                                    scrollTo($('#audit_findings_review_need_correction-form'), -100);
                                                                                                                },
                                                                                                                submitHandler: function (form) {
                                                                                                                    $('#audit_findings_review_need_correction').attr("disabled", true);
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
                                                                                                        });
                                                                                                        //--------End of Form valiadtion --------------------------------------------------------------------/ /
                                                                                                        //Delete Attacments
                                                                                                        $(document).on("click", ".delete_file", function () {
                                                                                                            var c_this = this;
                                                                                                            x_delete_lm_audit_doc_file($(this).data('file_id'), $("#am_object_id").val(), function (result) {
                                                                                                                if (result == "true") {
                                                                                                                    show_notification("s", 'topright', "File Deleted Successfully");
                                                                                                                    $(c_this).closest('tr').remove();
                                                                                                                } else {
                                                                                                                    show_notification("e", 'topright', " File Not Deleted.Invalid Request Called");
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        //Show Taks Attachment
                                                                                                        $(document).on("click", ".show_audit_attachments", function () {
                                                                                                            loading.show();
                                                                                                            let result = $(this).data('attachments'), writter = "";
                                                                                                            let can_delete = $(this).data('can_delete');
                                                                                                            if (result) {
                                                                                                                for (var i = 0; i < Object.keys(result).length; i++) {
                                                                                                                    writter += `<tr>
                                                                                                                        <td><a href="?module=file&action=view_request_file&file_id=${result[i].object_id}" >${result[i].name}</a></td>
                                                                                                                        <td>${result[i].friendly_size}</td>
                                                                                                                        <td>${result[i].attached_by}</td>
                                                                                                                        <td>${result[i].attached_date}</td>`;
                                                                                                                    if (result[i].can_delete && can_delete) {
                                                                                                                        $(".show_audit_attachments_action").show();
                                                                                                                        writter += `<td><i class="append-icon icon-trash vd_red vd_hover delete_file" data-file_id="${result[i].object_id}" data-original-title="Delete" data-toggle="tooltip" data-placement="bottom"></i></td>`;
                                                                                                                    } else {
                                                                                                                        $(".show_audit_attachments_action").hide();
                                                                                                                    }
                                                                                                                    writter += `</tr>`;
                                                                                                                }
                                                                                                                $(".show_audit_attachments_tbody").empty().append(writter);
                                                                                                                $(".show_audit_attachments_table").show();
                                                                                                                $(".no_attachments").hide();
                                                                                                            } else {
                                                                                                                $(".show_audit_attachments_table").hide();
                                                                                                                $(".no_attachments").show();
                                                                                                            }
                                                                                                            loading.hide();
                                                                                                        });
                                                                                                        //Show Reports
                                                                                                        $(document).on("change", ".show_report", (e) => {
                                                                                                            window.open($(e.target).val(), "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=0,left=500,width=800,height=600");
                                                                                                            $(e.target).val('');
                                                                                                        });

                                                                                                        $(document).ready(function () {
                                                                                                            let keyCounter = 0; // Initialize a counter for unique keys

                                                                                                            $('#addObservation').on('click', function () {
                                                                                                                keyCounter++; // Increment the key counter for each new row

                                                                                                                // Create the new row's HTML structure
                                                                                                                let newRow = `
                                                                                                                    <tr class="add_mul_ob_child mgtp-5">
                                                                                                                        <td colspan="2">
                                                                                                                            <button class="btn vd_bg-red vd_white delete_ele pd-10 pull-right cal_ob" type="button" data-delete_ele=".add_mul_ob_child" data-delete_from=".parent_${keyCounter}" style="position:relative;margin-bottom: -4% !important;">
                                                                                                                                <span class="menu-icon"><i class="fa fa-trash-o"></i></span>
                                                                                                                            </button>
                                                                                                                            <!-- Observation -->
                                                                                                                            <textarea rows="3" class="audit_observation 2d_array" name="uams_audit_observation[${keyCounter}][]" title="Enter Audit Observation" placeholder="Audit Observation" data-2dname="uams_audit_observation" data-2d_index="${keyCounter}"></textarea>
                                                                                                                            <!-- Attachment -->
                                                                                                                            <div class="col-md-3 pd-0" style="margin-top:-5px;">
                                                                                                                                <input type="file" name="file[${keyCounter}][]" multiple class="pd-5">
                                                                                                                            </div>
                                                                                                                            <div class="col-md-2 btn-group pd-0" style="margin-top:-5px;">
                                                                                                                                <button class="btn btn-default pdlr-10 width-100 show_audit_attachments" type="button" data-target="#modal_audit_attachment" data-toggle="modal" data-attachments='' data-can_delete="true">
                                                                                                                                    <i class="append-icon glyphicon glyphicon-paperclip"></i>
                                                                                                                                    <span class="badge vd_bg-blue">0</span>
                                                                                                                                </button>
                                                                                                                            </div>
                                                                                                                            <!-- NC -->
                                                                                                                            <div class="col-md-2 btn-group pd-0" style="margin-top:-5px;">
                                                                                                                                <select class="audit_conformity vd_bg-white 2d_array" name="uams_conformity[${keyCounter}][]" title="Select Conformity" style="padding-bottom:7px !important;" data-2dname="uams_conformity" data-2d_index="${keyCounter}">
                                                                                                                                    <option value="">Select Conformity</option>
                                                                                                                                    <option value="Conformance">Conformance</option>
                                                                                                                                    <option value="Non Conformance">Non Conformance</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <!-- NC Category -->
                                                                                                                            <div class="col-md-2 btn-group pd-0" style="margin-top:-5px;">
                                                                                                                                <select class="severity_level vd_bg-white 2d_array" name="uams_severity_level[${keyCounter}][]" title="Select Severity Level" style="padding-bottom:7px !important;" data-2dname="uams_severity_level" data-2d_index="${keyCounter}">
                                                                                                                                    <option value="">Select Severity Level</option>
                                                                                                                                    <option class="conformance_opt" style="display:none;" value="Good Observation">Good Observation</option>
                                                                                                                                    <option class="non_conformance_opt" style="display:none;" value="Major NC">Major NC</option>
                                                                                                                                    <option class="non_conformance_opt" style="display:none;" value="Minor NC">Minor NC</option>
                                                                                                                                    <option class="non_conformance_opt" style="display:none;" value="OFI">OFI</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-2 pd-0 input-border capa_div pd-5" style="margin-top:-5px;">
                                                                                                                                <span><i class="append-icon fa fa-fw fa-delicious" style="margin-top:3%;"></i>CAPA Required</span>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-1 pd-0 capa_div" style="margin-top:-5px;">
                                                                                                                                <select class="is_capa_required vd_bg-white" name="is_capa_required[${keyCounter}][]" data-2dname="is_capa_required" data-2d_index="${keyCounter}" style="padding-top:6%;" title="Select is CAPA required">
                                                                                                                                    <option class="hide_capa" value="">Select</option>
                                                                                                                                    <option class="hide_capa" value="yes">Yes</option>
                                                                                                                                    <option value="no">No</option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <!-- Action To Be Taken Category -->
                                                                                                                            <textarea rows="3" class="nc_action 2d_array" name="uams_nc_action[${keyCounter}][]" title="Enter Action To Be Taken" placeholder="Action To Be Taken" data-2dname="uams_nc_action" data-2d_index="${keyCounter}" style="display:none;"></textarea>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                `;

                                                                                                                // Append the new row to the table body
                                                                                                                $('#observationTable tbody').append(newRow);
                                                                                                            });
                                                                                                        });




    <?php echo '</script'; ?>
>



<?php }
}
