<?php
/* Smarty version 3.1.30, created on 2025-02-19 16:31:24
  from "/var/www/html/lm_qms/lib/sop/templates/sop_timeline.sop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67b5ba04af1e49_80945690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29d65b2aacca797eab65ddb7c6dbd099a34b4924' => 
    array (
      0 => '/var/www/html/lm_qms/lib/sop/templates/sop_timeline.sop.tpl',
      1 => 1634387601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b5ba04af1e49_80945690 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">SOP Timeline </li>
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
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Timeline </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20"><?php echo $_smarty_tpl->tpl_vars['sop_name']->value;?>
</h2>
                                <form name="sop_timeline" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="sop_timeline-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-3">
                                                <select class="width-60" name="sop_type" id="sop_type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['soptypelist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->object_id;?>
" <?php if ($_smarty_tpl->tpl_vars['sop_type_id']->value == $_smarty_tpl->tpl_vars['item']->value->object_id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_name"),$_smarty_tpl);?>
 -<?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"revision"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                <select class="width-60" name="sop_name" id="sop_name" onchange = addList('sop_object_id',this.options[this.selectedIndex].value); required title="Select Valid SOP Name">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sop_object_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['sop_object_id']->value == $_smarty_tpl->tpl_vars['item']->value['sop_object_id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['item']->value['revision'];?>
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
                                    <div class="vd_content-section clearfix">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['creator_name']->value)) {?>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-9">
                                                    <ul class="vd_timeline">
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['creator_name']->value)) {?>
                                                            <li class="tl-item tl-item-year" >
                                                                <div class="tl-year"><?php echo $_smarty_tpl->tpl_vars['created_year']->value;?>
</div>
                                                            </li>
                                                            <li class="tl-item tl-item-date">
                                                                <div class="tl-date"> <?php echo $_smarty_tpl->tpl_vars['created_month_date']->value;?>
 </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="<?php echo $_smarty_tpl->tpl_vars['creator_image']->value;?>
">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <?php echo $_smarty_tpl->tpl_vars['creator_name']->value;?>
 <em class="vd_soft-grey font-sm"><?php echo $_smarty_tpl->tpl_vars['creator_dept']->value;?>
</em> </h3>
                                                                        <span class="vd_soft-grey"><?php echo $_smarty_tpl->tpl_vars['created_date_time']->value;?>
 </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['creator_remarks']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                                                        <li>
                                                                                            <div class="menu-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>

                                                                                                <div class="menu-info"> <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
 </span> </div>
                                                                                            </div>
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
                                                                </div>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Created. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        <?php }?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['reviwer_name']->value)) {?>
                                                            <?php if ($_smarty_tpl->tpl_vars['reviewed_year']->value != $_smarty_tpl->tpl_vars['created_year']->value) {?>
                                                                <li class="tl-item tl-item-year" >
                                                                  <div class="tl-year"><?php echo $_smarty_tpl->tpl_vars['reviewed_year']->value;?>
</div>
                                                                </li>
                                                            <?php }?>
                                                            <li class="tl-item tl-item-date">
                                                              <div class="tl-date"> <?php echo $_smarty_tpl->tpl_vars['reviewed_month_date']->value;?>
 </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="<?php echo $_smarty_tpl->tpl_vars['reviewer_image']->value;?>
">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <?php echo $_smarty_tpl->tpl_vars['reviwer_name']->value;?>
 <em class="vd_soft-grey font-sm"><?php echo $_smarty_tpl->tpl_vars['reviwer_dept']->value;?>
</em> </h3>
                                                                        <span class="vd_soft-grey"><?php echo $_smarty_tpl->tpl_vars['reviewed_date_time']->value;?>
 </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviewer_remarks']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                                                        <li>
                                                                                            <div class="menu-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>

                                                                                                <div class="menu-info"> <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
 </span> </div>
                                                                                            </div>
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
                                                                </div>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Reviewed. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        <?php }?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['approver_name']->value)) {?>
                                                            <?php if ($_smarty_tpl->tpl_vars['approved_year']->value != $_smarty_tpl->tpl_vars['reviewed_year']->value) {?>
                                                                <li class="tl-item tl-item-year" >
                                                                  <div class="tl-year"><?php echo $_smarty_tpl->tpl_vars['approved_year']->value;?>
</div>
                                                                </li>
                                                            <?php }?>
                                                            <li class="tl-item tl-item-date">
                                                              <div class="tl-date"> <?php echo $_smarty_tpl->tpl_vars['approved_month_date']->value;?>
 </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="<?php echo $_smarty_tpl->tpl_vars['approver_image']->value;?>
">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <?php echo $_smarty_tpl->tpl_vars['approver_name']->value;?>
 <em class="vd_soft-grey font-sm"><?php echo $_smarty_tpl->tpl_vars['approver_dept']->value;?>
</em> </h3>
                                                                        <span class="vd_soft-grey"><?php echo $_smarty_tpl->tpl_vars['approved_date_time']->value;?>
 </span>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['approver_remarks']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                                                        <li>
                                                                                            <div class="menu-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>

                                                                                                <div class="menu-info"> <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
 </span> </div>
                                                                                            </div>
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
                                                                </div>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Approved. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        <?php }?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['authorizer_name']->value)) {?>
                                                            <?php if ($_smarty_tpl->tpl_vars['authorized_year']->value != $_smarty_tpl->tpl_vars['approved_year']->value) {?>
                                                                <li class="tl-item tl-item-year" >
                                                                  <div class="tl-year"><?php echo $_smarty_tpl->tpl_vars['authorized_year']->value;?>
</div>
                                                                </li>
                                                            <?php }?>
                                                            <li class="tl-item tl-item-date">
                                                              <div class="tl-date"> <?php echo $_smarty_tpl->tpl_vars['authorized_month_date']->value;?>
 </div>
                                                            </li>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="<?php echo $_smarty_tpl->tpl_vars['authorizer_image']->value;?>
">
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <?php echo $_smarty_tpl->tpl_vars['authorizer_name']->value;?>
 <em class="vd_soft-grey font-sm"><?php echo $_smarty_tpl->tpl_vars['authorizer_dept']->value;?>
</em> </h3>
                                                                        <span class="vd_soft-grey"><?php echo $_smarty_tpl->tpl_vars['authorized_date_time']->value;?>
 </span>
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_grey">Effective Date <em class="vd_blue font-sm"><?php echo $_smarty_tpl->tpl_vars['sop_effective_date']->value;?>
</em> </span> &nbsp;&nbsp;&nbsp;<span class="vd_grey">Expiry Date <em class="vd_blue font-sm"><?php echo $_smarty_tpl->tpl_vars['sop_expiry_date']->value;?>
</em> </span></h3>
                                                                        <div class="clearfix mgbt-xs-10"></div>
                                                                        <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-comment fa-fw"></i> Comment</a> </div>
                                                                        <hr class="mgtp-0"/>
                                                                        <div class="comments">
                                                                            <div class="content-list content-image">
                                                                                <ul class="list-wrapper no-bd-btm">
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorizer_remarks']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                        <li>
                                                                                            <div class="menu-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>

                                                                                                <div class="menu-info"> <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
 </span> </div>
                                                                                            </div>
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
                                                                </div>
                                                            </li>
                                                        <?php } else { ?>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Not Yet Authorized. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        <?php }?>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['trainer_name']->value)) {?>
                                                                <?php if ($_smarty_tpl->tpl_vars['trained_year']->value != $_smarty_tpl->tpl_vars['authorized_year']->value) {?>
                                                                    <li class="tl-item tl-item-year" >
                                                                      <div class="tl-year"><?php echo $_smarty_tpl->tpl_vars['trained_year']->value;?>
</div>
                                                                    </li>
                                                                <?php }?>
                                                                <li class="tl-item tl-item-date">
                                                                  <div class="tl-date"> <?php echo $_smarty_tpl->tpl_vars['trained_month_date']->value;?>
 </div>
                                                                </li>
                                                                <li class="tl-item">
                                                                    <div class="tl-icon success"> <i class="fa fa-check"></i> </div>
                                                                    <div class="tl-label panel widget light-widget panel-bd-left">
                                                                        <div class="panel-body"> <img alt="example image" class="tl-img img-right img-circle  mgtp-5" src="<?php echo $_smarty_tpl->tpl_vars['trainer_image']->value;?>
">
                                                                            <h3 class="mgtp-10 mgbt-xs-5"> <?php echo $_smarty_tpl->tpl_vars['trainer_name']->value;?>
 <em class="vd_soft-grey font-sm"><?php echo $_smarty_tpl->tpl_vars['trainer_dept']->value;?>
</em> </h3>
                                                                            <span class="vd_soft-grey"><?php echo $_smarty_tpl->tpl_vars['training_date_time']->value;?>
 </span>
                                                                            <div class="clearfix mgbt-xs-10"></div>
                                                                            <div class="tl-action"> <a role="button" class="btn btn-sm btn-xs mgr-10" href="javascript:void(0)"><i class="fa fa-users fa-fw"></i> Participants Details</a> </div>
                                                                            <hr class="mgtp-0"/>
                                                                            <div class="comments">
                                                                                <div class="content-list content-image">
                                                                                    <ul class="list-wrapper no-bd-btm">
                                                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_trainees_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                                                            <li>
                                                                                                <div class="menu-text"><?php echo $_smarty_tpl->tpl_vars['item']->value['trainee_name'];?>

                                                                                                    <div class="menu-info"> <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['trainee_dept'];?>
 </span> </div>
                                                                                                </div>
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
                                                                    </div>
                                                                </li>
                                                        <?php } else { ?>
                                                            <li class="tl-item">
                                                                <div class="tl-icon success"> <i class="fa fa-times"></i> </div>
                                                                <div class="tl-label panel widget light-widget panel-bd-left">
                                                                    <div class="panel-body"> 
                                                                        <h3 class="mgtp-10 mgbt-xs-5"> <span class="vd_red">Training Details Not Available. </span></h3>
                                                                      </div>
                                                                </div>
                                                            </li>
                                                        <?php }?>
                                                    </ul>
                                                    <br/><br/>
                                                </div>
                                                <!-- col-md-x -->
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="panel widget light-widget">
                                                        <div class="panel-body">
                                                            <h2 class="mgbt-xs-20 mgtp-10"><strong>View</strong> <span class="font-light">Control</span></h2>
                                                            <div class="row mgbt-xs-0">
                                                                <div class="col-sm-12">
                                                                    <div class="vd_checkbox checkbox-success">
                                                                        <input type="checkbox" id="checkbox-year" value="1">
                                                                        <label for="checkbox-year"> Hide Year </label>
                                                                    </div>
                                                                    <div class="vd_checkbox checkbox-success">
                                                                        <input type="checkbox" id="checkbox-date" value="1">
                                                                        <label for="checkbox-date"> Hide Date </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-lg-7 col-md-6">
                                                    <div class="panel widget light-widget">
                                                        <div class="panel-body">
                                                            <h2 class="mgbt-xs-20 mgtp-10"><strong>Select valid SOP Type and Revision</strong></h2>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php }?>
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

    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <?php echo '<script'; ?>
 type="text/javascript">
        $(window).load(function() {
            "use strict";
            function checkView(){
                if ($("#checkbox-year").is(':checked')){
                    $(".tl-item-year").addClass('hidden');
                } else{
                    $(".tl-item-year").removeClass('hidden');
                }
                if ($("#checkbox-date").is(':checked')){
                    $(".tl-item-date").addClass('hidden');
                } else{
                    $(".tl-item-date").removeClass('hidden');
                }		
            }
            $('#checkbox-year, #checkbox-date').prop('checked', false)
            $( "#checkbox-year, #checkbox-date" ).click(function(e) {
            checkView();
            
            });
        })
        function addList(text,value) {
            loc = window.location.href;
            var str = window.location.href;
            ind = str.lastIndexOf(text);
            //lastIndexOf funtion gives the position of the Last occurance of a string.
            if (value == "null") {
                match_position = loc.search(text); 
                mainurl = location.href.substring(0,match_position-1);
                location.href = mainurl
            } else {
                if (ind != -1) {	
                    match_position = loc.search(text); 
            //Search funtion gives the position of the first occurance of a string.
                    mainurl=location.href.substring(0,match_position);
                    location.href = mainurl +   text + "="+value ;
                } else {
                    location.href = loc + "&" +  text + "="+value ;
                }
            }	
        }
        
        function validation(){
            if (document.getElementById('exist_error_message').innerHTML == "SOP Name exists"){
                alert("SOP Name Exist.Pls Enter Different Unique SOP Name...!");
                return false;
            }
        }
    <?php echo '</script'; ?>
>

                                                      
<?php }
}
