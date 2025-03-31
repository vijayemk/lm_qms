<?php
/* Smarty version 3.1.30, created on 2025-02-26 14:25:37
  from "/var/www/html/lm_qms/lib/sop/templates/sop_transfer.sop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67bed709042227_59782889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b87f4c63bbdf31cec0330312513595c9f7096e58' => 
    array (
      0 => '/var/www/html/lm_qms/lib/sop/templates/sop_transfer.sop.tpl',
      1 => 1634379322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_67bed709042227_59782889 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>

<!--Multiselect left to right -->
<!--link rel="stylesheet" href="vendors/multiselect-master/css/bootstrap.min.css" /-->
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Add </li>
            <li class="active">SOP </li>
            <li class="active">Transfer </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Transfer SOP </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="tab-pane">
                                        <div class="panel-body">
                                            <div class="modal-wide-width">
                                                <div class="modal-content">
                                                    <div class="modal-header vd_bg-blue vd_white">
                                                        <h4 class="modal-title" id="myModalLabel">Transfer SOP Form</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <!--Transfer SOP Form -->
                                                        <form name="transfer_sop-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="transfer_sop-form" autocomplete="off">
                                                            <h2 class="mgbt-xs-20">Select SOP</h2>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="type" id="type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                                            <option value="">Select</option>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['soptypelist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->object_id;?>
" <?php if ($_smarty_tpl->tpl_vars['type_id']->value == $_smarty_tpl->tpl_vars['item']->value->object_id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
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
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="sop_no" id="sop_no" onchange = addList('sop_object_id',this.options[this.selectedIndex].value); required title="Select Valid SOP No">
                                                                            <option value="">Select</option>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_transfer_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->sop_object_id;?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value->sop_object_id == $_smarty_tpl->tpl_vars['sop_object_id']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->sop_name;?>
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
                                                            <hr>
                                                            <?php if (!empty($_smarty_tpl->tpl_vars['current_sop_name']->value)) {?>
                                                                <h2 class="mgbt-xs-20">SOP to Transfer</h2>
                                                                <div class="alert alert-danger vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again. 
                                                                </div>
                                                                <div class="alert alert-success vd_hidden">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                            <table class="table table-bordered table-striped" id="data-tables-sop">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_type"),$_smarty_tpl);?>
</th>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_no"),$_smarty_tpl);?>
</th>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_name"),$_smarty_tpl);?>
</th>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"current_revision"),$_smarty_tpl);?>
</th>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"current_supersedes"),$_smarty_tpl);?>
</th>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"effective_date"),$_smarty_tpl);?>
</th>
                                                                                        <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"expiry_date"),$_smarty_tpl);?>
</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr >
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_type']->value;?>
</td>
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_no']->value;?>
</td>
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_name']->value;?>
</td>
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_revison']->value;?>
</td>
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_supersedes']->value;?>
</td>
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_effective_date']->value;?>
</td>
                                                                                        <td ><?php echo $_smarty_tpl->tpl_vars['current_sop_expiry_date']->value;?>
</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Transfer To</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-100" name="sop_type" id="sop_type" onchange = addList('sop_type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">

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
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"temp_draft_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 3 - Max 40" class="width-100 required" name="temp_sop_draft_no" id="temp_sop_draft_no" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['sop_draft_number']->value;?>
" readonly  required title="Valid SOP No">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_supersedes"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 3 - Max 100" class="width-100 required" name="sop_supersedes" id="sop_supersedes" maxlength="100" value="Nil" title="Valid SOP Supersedes">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_belongs_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" class="width-100 required" name="sop_plant" id="sop_plant" value="<?php echo $_smarty_tpl->tpl_vars['usr_plant']->value;?>
" title="SOP Belongs To" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 3 - Max 80" class="width-100 required" name="sop_name" id="sop_name" value="<?php echo $_smarty_tpl->tpl_vars['current_sop_name']->value;?>
" readonly maxlength="80" required title="Enter Valid SOP Name">
                                                                        </div>
                                                                        <div id="exist_error_message"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"reason_for_transfer"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-100" name="reason_for_revision" id="reason_for_revision" required title="Select Valid Reason">
                                                                                <option value="">Select</option>
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_reason_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
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
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"cc_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 1 - Max 100" class="width-45 required" name="cc_no" id="cc_no" maxlength="100" required title="Enter Valid Change Control Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div id="company-input-wrapper" class="controls col-sm-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"assign_to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div class="col-xs-3">
                                                                            <select  name="assign_to_dept" id="assign_to_dept" onchange = get_assign_to_dept_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                                                <option value="">Select Department</option>
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_dept_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
 </option>
                                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xs-3">
                                                                            <select  name="assign_to_user" id="assign_to_user" title="Select Valid User"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"dept_view"),$_smarty_tpl);?>
</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <div class="vd_checkbox checkbox-danger">
                                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_dept_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                    <input type="checkbox" name="dept_view[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
" checked="true" <?php if ($_smarty_tpl->tpl_vars['item']->value['department_id'] == $_smarty_tpl->tpl_vars['usr_dept_id']->value) {?> disabled <?php }?>>
                                                                                    <label for="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
 </label>
                                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div id="company-input-wrapper" class="controls col-sm-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"copy"),$_smarty_tpl);?>
 (Select whichever is applicable) <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                            <table class="table table-bordered table-striped" id="user_pending_data-tables">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th >SOP</th>
                                                                                        <th >Format(s)</th>	
                                                                                        <th >Annexure(s)</th>	
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr >
                                                                                        <td class="vd_checkbox checkbox-success">
                                                                                            <input  type="checkbox" name="sop_content_tansfer" value="<?php echo $_smarty_tpl->tpl_vars['sop_object_id']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['sop_object_id']->value;?>
" checked="true">
                                                                                            <label for="<?php echo $_smarty_tpl->tpl_vars['sop_object_id']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['current_sop_no']->value;?>
 </label>
                                                                                        </td>
                                                                                        <td class="vd_checkbox checkbox-success">
                                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['formatlist']->value, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>                                                                                                
                                                                                                <input  type="checkbox" name="sop_format_content_tansfer[]" value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['format_object_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['item1']->value['format_object_id'];?>
" checked="true">
                                                                                                <label for="<?php echo $_smarty_tpl->tpl_vars['item1']->value['format_object_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item1']->value['format_no'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item1']->value['status'];?>
] </label><br>
                                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                        </td>
                                                                                        <td class="vd_checkbox checkbox-success">
                                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['annexurelist']->value, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                                                                                                <input  type="checkbox" name="sop_annexure_content_tansfer[]" value="<?php echo $_smarty_tpl->tpl_vars['item1']->value['annexure_object_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['item1']->value['annexure_object_id'];?>
" checked="true">
                                                                                                <label for="<?php echo $_smarty_tpl->tpl_vars['item1']->value['annexure_object_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item1']->value['annexure_no'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item1']->value['status'];?>
] </label><br>
                                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Reason for Transfer</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"reason"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Reason for Transfer" class="width-100 required" name="atransfer_reason" id="atransfer_reason"  required title="Enter Valid Reason for Transfer">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Send Mail To</h2>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                                                <select  name="department" id="department" onchange = get_dept_users(this.options[this.selectedIndex].value);>
                                                                                    <option value="">Select Department</option>
                                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_dept_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
 </option>
                                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div class="col-xs-4">
                                                                                <select name="mail_to_user_from[]" id="mail_to_user" class="mail_to_user form-control" size="7" multiple="multiple"></select>
                                                                            </div>
                                                                            <div class="col-xs-2">
                                                                                <button type="button" id="mail_to_user_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                                                <button type="button" id="mail_to_user_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                                                <button type="button" id="mail_to_user_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                                                <button type="button" id="mail_to_user_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                                            </div>
                                                                            <div class="col-xs-4">
                                                                                <select name="mail_to_user_to[]" id="mail_to_user_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                                            </div>
                                                                        </div>  
                                                                        <div id="company-input-wrapper" class="controls col-sm-12"><br><br>
                                                                            <label class="col-sm-2 control-label"><?php echo template_get_attribute_name(array('module'=>'sop','attribute'=>'mail_comments'),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                                            <div class="col-sm-6 controls">
                                                                                <textarea placeholder="Min 5 - Max 1000" rows="5" class="mgbt-xs-20  mgbt-sm-0" name="mail_comments" id="mail_comments" maxlength="1000" title="Enter Valid Comments" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <button class="btn vd_bg-green vd_white" type="submit"  name="transfer" id="transfer">Transfer</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php }?>
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
                </div>
            </div>   
        </div>
    </div>
</div>


    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <!-- Multiselect left to right -->
    <?php echo '<script'; ?>
 src="vendors/multiselect-master/dist/js/jquery.min.js"><?php echo '</script'; ?>
>
    <!--script src="vendors/multiselect-master/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
-->
    <?php echo '<script'; ?>
 src="vendors/multiselect-master/dist/js/multiselect.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
                                                                                    $(document).ready(function ($) {
                                                                                        $('.mail_to_user').multiselect({
                                                                                            search: {
                                                                                                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                                                                                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                                                                            },
                                                                                            fireSearch: function (value) {
                                                                                                return value.length > 1;
                                                                                            }
                                                                                        });
                                                                                    });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            "use strict";
            $('#data-tables-sop').dataTable({bFilter: false, bInfo: false, bLengthChange: false, bPaginate: false, ordering: false});
        });

        $(document).ready(function () {
            "use strict";
            var form_submit = $('#transfer_sop-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    type: {
                        required: true
                    },
                    sop_no: {
                        required: true
                    },
                    sop_type: {
                        required: true
                    },
                    temp_sop_draft_no: {
                        required: true,
                        minlength: 1,
                    },
                    sop_supersedes: {
                        minlength: 3,
                        required: true
                    },
                    sop_plant: {
                        required: true,
                    },
                    sop_name: {
                        minlength: 3,
                        required: true
                    },
                    reason_for_revision: {
                        required: true
                    },
                    cc_no: {
                        minlength: 1,
                        required: true
                    },
                    assign_to_dept: {
                        required: true
                    },
                    assign_to_user: {
                        required: true
                    },
                    atransfer_reason: {
                        required: true
                    },
                    mail_comments: {
                        required: true,
                        minlength: 5
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var temp_sop_draft_no = $('#temp_sop_draft_no').val();
                    if (temp_sop_draft_no == "invalid_type") {
                        alert("Invalid Temporary Draft Number!");
                        return false;
                    }
                    if (document.getElementById('mail_to_user_to').length == 0) {
                        alert("Pls select valid users");
                        document.getElementById('mail_to_user_to').focus();
                        document.getElementById('mail_to_user_to').style.borderColor = 'red';
                        return false;
                    }
                    $('#transfer').attr("disabled", true);
                    form.submit();
                }
            });
        });
        function addList(text, value) {
            loc = window.location.href;
            var str = window.location.href;
            ind = str.lastIndexOf(text);
            //lastIndexOf funtion gives the position of the Last occurance of a string.
            if (value == "null") {
                match_position = loc.search(text);
                mainurl = location.href.substring(0, match_position - 1);
                location.href = mainurl
            } else {
                if (ind != -1) {
                    match_position = loc.search(text);
                    //Search funtion gives the position of the first occurance of a string.
                    mainurl = location.href.substring(0, match_position);
                    location.href = mainurl + text + "=" + value;
                } else {
                    location.href = loc + "&" + text + "=" + value;
                }
            }
        }
        function get_dept_users(value) {
            x_get_dept_users(value, list_from_users);
        }
        function list_from_users(users) {
            var dept_users_obj = document.getElementById("mail_to_user");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            for (var y in users) {
                var users_array = users[y];
                var addy = document.createElement('option');
                addy.id = users_array.user_id;
                addy.text = users_array.user_name;
                addy.value = users_array.user_id;
                try {
                    dept_users_obj.add(addy, null);
                } catch (ex) {
                    dept_users_obj.add(addy);
                }
            }
        }
        function get_assign_to_dept_users(value) {
            x_get_dept_users(value, list_assign_to_users);
        }
        function list_assign_to_users(users) {
            var dept_users_obj = document.getElementById("assign_to_user");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            var addy = document.createElement('option');
            addy.text = "Select";
            addy.value = "";
            try {
                dept_users_obj.add(addy, null);
            } catch (ex)
            {
                dept_users_obj.add(addy);
            }
            for (var y in users) {
                var users_array = users[y];
                var addy = document.createElement('option');
                addy.id = users_array.user_id;
                addy.text = users_array.user_name;
                addy.value = users_array.user_id;
                try {
                    dept_users_obj.add(addy, null);
                } catch (ex) {
                    dept_users_obj.add(addy);
                }
            }
        }
    <?php echo '</script'; ?>
>

<?php }
}
