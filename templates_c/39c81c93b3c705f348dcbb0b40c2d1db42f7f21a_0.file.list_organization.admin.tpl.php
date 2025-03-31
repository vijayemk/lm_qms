<?php
/* Smarty version 3.1.30, created on 2024-10-02 07:38:31
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/admin/templates/list_organization.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fcf8770caeb9_38368258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39c81c93b3c705f348dcbb0b40c2d1db42f7f21a' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/admin/templates/list_organization.admin.tpl',
      1 => 1699615158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66fcf8770caeb9_38368258 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="active">Administration </li>
            <li class="active">Organization </li>
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
            <?php if ($_smarty_tpl->tpl_vars['add_org']->value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add Organization </a> </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <h2 class="mgbt-xs-20">Add Organization Form</h2>
                                    <form name="org-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="org-form" autocomplete="off">
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
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"organization"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 100" class="width-60 required" name="organization" id="organization" maxlength="100" onkeyup="org_exist();
                                                            return false;"  required title="Enter Valid Organization Name">
                                                </div>
                                                <div id="org_exist_error_message"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"org_short_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 2 - Max 20" class="width-60 required" name="short_name" id="short_name" maxlength="20" onkeyup="org_short_name_exist();
                                                            return false;" required title="Enter Valid Organization Short Name">
                                                </div>
                                                <div id="org_short_name_exist_error_message"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"address"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                    <textarea placeholder="Min 5 - Max 500" rows="2" class="width-60 required" name="address" id="address" maxlength="500" required title="Enter Valid Address" ></textarea>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"city"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="city" id="city" maxlength="40" required title="Enter Valid City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"state"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="state" id="state" maxlength="40" required title="Enter Valid State">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"country"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="country" id="country" maxlength="40" required title="Enter Valid Country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"pincode"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 6 - Max 15" class="width-60 required" name="pincode" id="pincode" maxlength="15" required title="Enter Valid Pincode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"contact_number"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 10 - Max 11" class="width-60 required" name="contact_number" id="contact_number" maxlength="11" required title="Enter Valid Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"email"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="email" id="email" maxlength="60" title="Enter Valid Email ID">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"website"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="website" id="website" maxlength="40" title="Enter Valid Website Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-group">
                                            <div class="col-sm-2"></div>
                                            <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                                <div class="mgtp-10">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="oadd" id="oadd">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mgbt-xs-5"> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['add_plant']->value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Add Company </a> </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <h2 class="mgbt-xs-20">Add Company Form</h2>
                                    <form name="plant-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="plant-form" autocomplete="off" enctype="multipart/form-data">
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
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"organization"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div class="controls col-sm-6">
                                                    <select class="width-60 required" name="porg_name" id="porg_name" title="Select Valid Organization Name">
                                                        <option value="">Select</option>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orglist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->org_id;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->org_name;?>
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
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 100" class="width-60 required" name="plant_name" id="plant_name" maxlength="100" onkeyup="plant_exist();
                                                            return false;"  required title="Enter Valid Company Name">
                                                </div>
                                                <div id="plant_exist_error_message"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_short_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 2 - Max 20" class="width-60 required" name="pshort_name" id="pshort_name" maxlength="20" onkeyup="plant_short_name_exist();
                                                            return false;" required title="Enter Valid Plant Short Name">
                                                </div>
                                                <div id="plant_short_name_exist_error_message"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"address"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                    <textarea placeholder="Min 5 - Max 500" rows="2" class="width-60 required" name="paddress" id="paddress" maxlength="500" required title="Enter Valid Address" ></textarea>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"city"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pcity" id="pcity" maxlength="40" required title="Enter Valid City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"state"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pstate" id="pstate" maxlength="40" required title="Enter Valid State">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"country"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pcountry" id="pcountry" maxlength="40" required title="Enter Valid Country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"pincode"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 6 - Max 15" class="width-60 required" name="ppincode" id="ppincode" maxlength="15" required title="Enter Valid Pincode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"contact_number"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 10 - Max 11" class="width-60 required" name="pcontact_number" id="pcontact_number" maxlength="11" required title="Enter Valid Contact Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"email"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="pemail" id="pemail" maxlength="60" title="Enter Valid Email ID">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"website"),$_smarty_tpl);?>
 <span class="vd_red"></span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="pwebsite" id="pwebsite" maxlength="40" title="Enter Valid Website Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"logo"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-3">
                                                    <input class="form-control" type="file" name="ufile" id="logo_file" accept="image/*" title="Select a valid logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-group">
                                            <div class="col-sm-2"></div>
                                            <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                                <div class="mgtp-10">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="padd" id="padd">Add</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mgbt-xs-5"> </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"> Add Department </a> </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Add Department Form</h2>
                                <form name="add_department_form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_department_form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div class="controls col-sm-6">
                                                <select class="width-60 required" name="adept_plant" id="adept_plant" required title="Select Valid Input">
                                                    <option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plantlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
]</option>
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department_code"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 2" class="width-60 required" name="adept_code" id="adept_code" maxlength="3" required title="Enter Valid Department Code">
                                            </div>
                                            <div id="adept_code_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"short_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="adept_short_name" id="adept_short_name" maxlength="40" required title="Enter Valid Department Short Name">
                                            </div>
                                            <div id="adept_short_name_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"full_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="adept_full_name" id="adept_full_name" maxlength="40" required title="Enter Valid Department Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="adept_add" id="adept_add">Add</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mgbt-xs-5"> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Organization List</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['orglist']->value)) {?>
                                            <table class="table table-bordered table-striped" id="org_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"short_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"organization"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"address"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"country"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"state"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"city"),$_smarty_tpl);?>
</th>                            
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"pincode"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"contact_number"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"email"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"website"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"actions"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orglist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr >
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->short_name;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->org_name;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->address;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->country;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->state;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->city;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->pincode;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->contact_number;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->email;?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value->website;?>
</td>
                                                            <td class="menu-action"><a data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"  href="?module=admin&action=update_org&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value->org_id;?>
"><i class="fa fa-pencil"></i></a></td>
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
                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> Companies List</a> </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['plantlist']->value)) {?>
                                            <table class="table table-bordered table-striped" id="plant_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"short_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"organization"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"address"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"country"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"state"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"city"),$_smarty_tpl);?>
</th>                            
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"pincode"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"contact_number"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"email"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"actions"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plantlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr >
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['org'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['address'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['country'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['state'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['city'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['pincode'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['contact_number'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
                                                            <td class="menu-action"><a data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"  href="?module=admin&action=update_plant&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><i class="fa fa-pencil"></i></a></td>
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
                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"> Department List</a> </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['deptlist']->value)) {?>
                                            <table class="table table-bordered table-striped" id="dept_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department_code"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"short_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"full_name"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"actions"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deptlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr >
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['department_code'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['full_name'];?>
</td>
                                                            <td ><button class="btn btn-primary" data-toggle="modal" onclick="set_udept('<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['department_code'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['full_name'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
');"  data-target="#edit-dept"><i class="fa fa-pencil"></i></button></td>
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
                                                <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                            </div>
                                        <?php }?>
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
<!-- Modal -->
<div class="modal fade" id="edit-dept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
            </div>
            <form name="edit_department_form" id="edit_department_form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                            <div class="controls col-sm-10">
                                <select class="width-60 required" name="udept_plant" id="udept_plant" disabled required title="Select Valid Input">
                                    <option value="">Select</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plantlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
]</option>
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
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department_code"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 2 - Max 2" class="width-60 required" name="udept_code" id="udept_code" maxlength="3" required title="Enter Valid Department Code">
                                <div id="udept_code_message"></div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"short_name"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="udept_short_name" id="udept_short_name" maxlength="40" required title="Enter Valid Department Short Name">
                                <div id="udept_short_name_message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"full_name"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="udept_full_name" id="udept_full_name" maxlength="40" required title="Enter Valid Department Full Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn vd_btn vd_bg-green" name="udept_update" id="udept_update">Save changes</button>
                </div>
                <input type="hidden" name="udept_id" id="udept_id">
            </form>
        </div>
    </div>
</div>

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('#org_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
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
                        }, download: 'open',
                        message: 'Organization List',

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
                        message: 'Organization List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }
                ],

            });
        });
        $(document).ready(function () {
            $('#plant_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
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
                        }, download: 'open',
                        message: 'Companies List',

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
                        message: 'Companies List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }
                ],

            });
        });
        $(document).ready(function () {
            $('#dept_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
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
                        }, download: 'open',
                        message: 'Department List',

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
                        message: 'Department List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }
                ],

            });
        });
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#org-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    organization: {
                        minlength: 3,
                        required: true,
                    },
                    short_name: {
                        minlength: 2,
                        required: true,
                    },
                    address: {
                        minlength: 5,
                        required: true
                    },
                    city: {
                        minlength: 3,
                        required: true
                    },
                    state: {
                        minlength: 3,
                        required: true
                    },
                    country: {
                        minlength: 3,
                        required: true
                    },
                    pincode: {
                        minlength: 6,
                        required: true
                    },
                    contact_number: {
                        minlength: 10,
                        required: true
                    },
                    email: {
                        minlength: 5,
                        required: false,
                        email: true
                    },
                    website: {
                        minlength: 3,
                        required: false,
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if ($("#org_exist_error_message").html() == "Organization Exists") {
                        alert("Organization Name Exists");
                        return false
                    }
                    if ($("#org_short_name_exist_error_message").html() == "Short Name Exists") {
                        alert("Short Name Exists");
                        return false
                    }
                    $('#oadd').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function check_org_handle(result) {
            if (result == "true") {
                $("#org_exist_error_message").html("Organization Exists");
                $("#org_exist_error_message").css("color", "red");
            }
            if (result == "false") {
                $("#org_exist_error_message").html(" ");
            }
        }
        function check_org_short_name_handle(result) {
            if (result == "true") {
                $("#org_short_name_exist_error_message").html("Short Name Exists");
                $("#org_short_name_exist_error_message").css("color", "red");
            }
            if (result == "false") {
                $("#org_short_name_exist_error_message").html(" ");
            }
        }
        $(document).ready(function () {
            $("#organization").keyup(function () {
                $("#organization").val($("#organization").val().toUpperCase());
                x_organization_exist($("#organization").val(), check_org_handle);
            });
            $("#short_name").keyup(function () {
                $("#short_name").val($("#short_name").val().toUpperCase());
                x_organization_short_name_exist($("#short_name").val(), check_org_short_name_handle);
            });
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#plant-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    porg_name: {
                        required: true,
                    },
                    plant_name: {
                        minlength: 3,
                        required: true,
                    },
                    pshort_name: {
                        minlength: 2,
                        required: true,
                    },
                    paddress: {
                        minlength: 5,
                        required: true
                    },
                    pcity: {
                        minlength: 3,
                        required: true
                    },
                    pstate: {
                        minlength: 3,
                        required: true
                    },
                    pcountry: {
                        minlength: 3,
                        required: true
                    },
                    ppincode: {
                        minlength: 6,
                        required: true
                    },
                    pcontact_number: {
                        minlength: 10,
                        required: true
                    },
                    pemail: {
                        minlength: 5,
                        required: false,
                        email: true
                    },
                    pwebsite: {
                        minlength: 3,
                        required: false,
                    },
                    ufile: {
                        required: true,
                    },

                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    if ($("#plant_exist_error_message").html() == "Plant Exists") {
                        alert("Plant Name Exists");
                        return false
                    }
                    if ($("#plant_short_name_exist_error_message").html() == "Short Name Exists") {
                        alert("Short Name Exists");
                        return false
                    }
                    $('#padd').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function check_plant_handle(result) {
            if (result == "true") {
                $("#plant_exist_error_message").html("Plant Exists");
                $("#plant_exist_error_message").css("color", "red");
            }
            if (result == "false") {
                $("#plant_exist_error_message").html(" ");
                document.getElementById('plant_exist_error_message').innerHTML = "   ";
            }
        }
        function check_plant_short_name_handle(result) {
            if (result == "true") {
                $("#plant_short_name_exist_error_message").html("Short Name Exists");
                $("#plant_short_name_exist_error_message").css("color", "red");
            }
            if (result == "false") {
                $("#plant_short_name_exist_error_message").html(" ");
            }
        }
        $(document).ready(function () {
            $("#plant_name").keyup(function () {
                $("#plant_name").val($("#plant_name").val().toUpperCase());
                x_plant_exist($("#plant_name").val(), check_plant_handle);
            });
            $("#pshort_name").keyup(function () {
                $("#pshort_name").val($("#pshort_name").val().toUpperCase());
                x_plant_short_name_exist($("#pshort_name").val(), check_plant_short_name_handle);
            });
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_department_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    adept_plant: {
                        required: true
                    },
                    adept_code: {
                        minlength: 2,
                        required: true
                    },
                    adept_short_name: {
                        minlength: 2,
                        required: true
                    },
                    adept_full_name: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var adept_code_message = $('#adept_code_message').html();
                    var adept_short_name_message = $('#adept_short_name_message').html();
                    if (adept_code_message == "Department Code exists") {
                        return false;
                    }
                    if (adept_short_name_message == "Short Name exists") {
                        return false;
                    }
                    $('#adept_add').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            $("#adept_plant").change(function () {
                $("#adept_code").val('');
                $("#adept_short_name").val('');
                $("#adept_full_name").val('');
                $("#adept_code_message").html('');
                $("#adept_short_name_message").html('');
            });
            $("#adept_full_name").keyup(function () {
                $("#adept_full_name").val($("#adept_full_name").val().toUpperCase());
            });
            $("#adept_code").keyup(function () {
                x_departmentcode_exist($("#adept_plant").val(), $("#adept_code").val(), check_adept_code_handle);
            });
            $("#adept_short_name").keyup(function () {
                $("#adept_short_name").val($("#adept_short_name").val().toUpperCase());
                x_department_exist($("#adept_plant").val(), $("#adept_short_name").val(), check_adept_short_name_handle);
            });
        });
        function check_adept_code_handle(result) {
            if (result == "true") {
                $("#adept_code_message").html('Department Code exists');
                $("#adept_code_message").css('color', 'red');
            }
            if (result == "false") {
                $("#adept_code_message").html('');
            }
        }
        function check_adept_short_name_handle(result) {
            if (result == "true") {
                $("#adept_short_name_message").html('Short Name exists');
                $("#adept_short_name_message").css('color', 'red');
            }
            if (result == "false") {
                $("#adept_short_name_message").html('');
            }
        }
        function set_udept(dept_id,code,short_name,full_name,plant_id){
            $("#udept_id").val('');
            $("#udept_plant").val('');
            $("#udept_code").val('');
            $("#udept_short_name").val('');
            $("#udept_full_name").val('');
            $("#udept_code_message").html('');
            $("#udept_short_name_message").html('');
            
            $("#udept_id").val(dept_id);
            $("#udept_plant").val(plant_id);
            $("#udept_code").val(code);
            $("#udept_short_name").val(short_name);
            $("#udept_full_name").val(full_name);
        }
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#edit_department_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    udept_plant: {
                        required: true
                    },
                    udept_code: {
                        minlength: 2,
                        required: true
                    },
                    udept_short_name: {
                        minlength: 2,
                        required: true
                    },
                    udept_full_name: {
                        minlength: 3,
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var udept_code_message = $('#udept_code_message').html();
                    var udept_short_name_message = $('#udept_short_name_message').html();
                    if (udept_code_message == "Department Code exists") {
                        return false;
                    }
                    if (udept_short_name_message == "Short Name exists") {
                        return false;
                    }
                    $('#udept_update').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $(document).ready(function () {
             $("#udept_plant").change(function () {
                $("#udept_code").val('');
                $("#udept_short_name").val('');
                $("#udept_full_name").val('');
                $("#udept_code_message").html('');
                $("#udept_short_name_message").html('');
            });
            $("#udept_full_name").keyup(function () {
                $("#udept_full_name").val($("#udept_full_name").val().toUpperCase());
            });
            $("#udept_code").keyup(function () {
                x_departmentcode_exist($("#udept_plant").val(), $("#udept_code").val(), check_udept_code_handle);
            });
            $("#udept_short_name").keyup(function () {
                $("#udept_short_name").val($("#udept_short_name").val().toUpperCase());
                x_department_exist($("#udept_plant").val(), $("#udept_short_name").val(), check_udept_short_name_handle);
            });
        });
        function check_udept_code_handle(result) {
            if (result == "true") {
                $("#udept_code_message").html('Department Code exists');
                $("#udept_code_message").css('color', 'red');
            }
            if (result == "false") {
                $("#udept_code_message").html('');
            }
        }
        function check_udept_short_name_handle(result) {
            if (result == "true") {
                $("#udept_short_name_message").html('Short Name exists');
                $("#udept_short_name_message").css('color', 'red');
            }
            if (result == "false") {
                $("#udept_short_name_message").html('');
            }
        }
    <?php echo '</script'; ?>
>

<?php }
}
