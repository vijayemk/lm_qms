<?php
/* Smarty version 3.1.30, created on 2024-10-28 16:36:22
  from "/var/www/html/lm_qms/lib/admin/templates/permission_assign.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671f702e1a8682_25408715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10216b1f670496f6fda6489be8bc7a6e8e384816' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/permission_assign.admin.tpl',
      1 => 1633497009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_671f702e1a8682_25408715 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

    <?php echo '<script'; ?>
 language="javascript">
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
    <?php echo '</script'; ?>
>

    
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Setings </li>
            <li class="active">Privileges </li>
            <li class="active">Workflow Privileges </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Assigned Privileges  </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <select name="upuserid" id="upuserid" onchange = addList('upuserid',this.options[this.selectedIndex].value); title="Select Valid Department">
                                                    <option value="">Select User</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['user_id'] == $_smarty_tpl->tpl_vars['upuserid']->value) {?> selected=true<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['full_name'];?>
 </option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['upusername']->value;?>
" class="mgbt-xs-20 mgbt-sm-0" placeholder="User Name">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['upuserdept']->value;?>
" class="mgbt-xs-20 mgbt-sm-0" placeholder="Department">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['upfullname']->value;?>
" class="mgbt-xs-20 mgbt-sm-0" placeholder="Full Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>Workflow Privileges</h3>
                                            </div>
                                        </div>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['workflow_user_per_list']->value)) {?>
                                            <table class="table table-bordered table-striped" id="view_workflow_data-table">
                                                <thead>
                                                    <tr>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"object_name"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['workflow_user_per_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr >
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['access_per_name'];?>
</td>
                                                            <td><input type="checkbox" align="center"  <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled'] == '1') {?> checked <?php }?> disabled></td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>Pdf Privileges</h3>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped" id="view_pdf_workflow_data-table">
                                            <thead>
                                                <tr>
                                                    <th >Copy Type</th>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pdf_operation_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['item']->value['operation_name'];?>
</th>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_pdf_print_copy_objectlist']->value, 'operationList', false, 'objkey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['objkey']->value => $_smarty_tpl->tpl_vars['operationList']->value) {
?>
                                                    <tr >
                                                        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "objid", null, null);
echo $_smarty_tpl->tpl_vars['objkey']->value;
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                                                        <td><?php echo template_getPdfObjectName(array('object_id'=>$_smarty_tpl->tpl_vars['objkey']->value),$_smarty_tpl);?>
<!--Refer this smarty template_template_getObjectName in Admin_Processor.func.php--></td>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operationList']->value, 'opValue', false, 'operation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['operation']->value => $_smarty_tpl->tpl_vars['opValue']->value) {
?>
                                                            <td><input type="checkbox" align="center" name="object[]"  id="object[<?php echo $_smarty_tpl->tpl_vars['operation']->value;?>
]" value="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'objid');?>
-<?php echo $_smarty_tpl->tpl_vars['operation']->value;?>
" disabled <?php if ($_smarty_tpl->tpl_vars['opValue']->value == 1) {?> checked <?php }?>>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Edit Workflow Privileges </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Edit Workflow Privilege Form</h2>
                                <form name="workflow_per_assign" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="workflow_per_assign-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert alert-success vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                    </div>
                                    <div class="table-responsive">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['workflow_user_per_list']->value)) {?>
                                            <table class="table table-bordered table-striped" id="edit_workflow_data-table">
                                                <thead>
                                                    <tr>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"object_name"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_enabled"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['workflow_user_per_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <tr >
                                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['access_per_name'];?>
</td>
                                                            <td><input type="checkbox" align="center" name="add_workflow_access_per[]"  value="<?php echo $_smarty_tpl->tpl_vars['item']->value['access_per_id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['item']->value['is_enabled'] == '1') {?> checked <?php }?>></td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tbody>
                                            </table>
                                        <?php }?>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="save_workflow_per" id="save_workflow_per">Save</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Edit Pdf Privileges </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Edit Pdf Privilege Form</h2>
                                <form name="pdf_per_assign-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="pdf_per_assign-form" autocomplete="off">
                                    <div class="alert alert-danger vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert alert-success vd_hidden">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                          <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="edit_pdf_workflow_data-table">
                                            <thead>
                                                <tr>
                                                    <th >Copy Type</th>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pdf_operation_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['item']->value['operation_name'];?>
</th>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_pdf_print_copy_objectlist']->value, 'operationList', false, 'objkey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['objkey']->value => $_smarty_tpl->tpl_vars['operationList']->value) {
?>
                                                    <tr >
                                                        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "objid", null, null);
echo $_smarty_tpl->tpl_vars['objkey']->value;
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
?>

                                                        <td><?php echo template_getPdfObjectName(array('object_id'=>$_smarty_tpl->tpl_vars['objkey']->value),$_smarty_tpl);?>
<!--Refer this smarty template_template_getObjectName in Admin_Processor.func.php--></td>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['operationList']->value, 'opValue', false, 'operation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['operation']->value => $_smarty_tpl->tpl_vars['opValue']->value) {
?>
                                                            <td><input type="checkbox" align="center" name="add_pdf_access_per[]" value="<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'objid');?>
-<?php echo $_smarty_tpl->tpl_vars['operation']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['opValue']->value == 1) {?> checked <?php }?>>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                    </tr>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="save_pdf_per" id="save_pdf_per">Save</button>
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
        </div>
    </div>
</div>
                       

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Specific Page Scripts Put Here -->
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            $('#view_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            $('#view_pdf_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            $('#edit_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            $('#edit_pdf_workflow_data-table').dataTable({
                mark:true,
                paging: false,
            });
            
        } );
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#workflow_per_assign-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
                },
                errorPlacement: function(error, element) {
                    if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
                        element.parent().append(error);
                    } else if (element.parent().hasClass("vd_input-wrapper")){
                        error.insertAfter(element.parent());
                    }else {
                        error.insertAfter(element);
                    }
                }, 

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success_register.fadeOut(500);
                    error_register.fadeIn(500);
                    scrollTo(form_submit,-100);

                },

                highlight: function (element) { // hightlight error inputs
                    $(element).addClass('vd_bd-red');
                    $(element).siblings('.help-inline').removeClass('help-inline fa fa-check vd_green mgl-10');

                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                            .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label, element) {
                    label
                        .addClass('valid').addClass('help-inline fa fa-check vd_green mgl-10') // mark the current input as valid and display OK icon
                            .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                                $(element).removeClass('vd_bd-red');
                },
                submitHandler: function(form) {                    
                    $('#save_workflow_per').attr("disabled", true);
                    form.submit();
                },
            });
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#pdf_per_assign-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    
                },
                errorPlacement: function(error, element) {
                    if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
                        element.parent().append(error);
                    } else if (element.parent().hasClass("vd_input-wrapper")){
                        error.insertAfter(element.parent());
                    }else {
                        error.insertAfter(element);
                    }
                }, 

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success_register.fadeOut(500);
                    error_register.fadeIn(500);
                    scrollTo(form_submit,-100);

                },

                highlight: function (element) { // hightlight error inputs
                    $(element).addClass('vd_bd-red');
                    $(element).siblings('.help-inline').removeClass('help-inline fa fa-check vd_green mgl-10');

                },

                unhighlight: function (element) { // revert the change dony by hightlight
                    $(element)
                            .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label, element) {
                    label
                        .addClass('valid').addClass('help-inline fa fa-check vd_green mgl-10') // mark the current input as valid and display OK icon
                            .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                                $(element).removeClass('vd_bd-red');
                },
                submitHandler: function(form) {                    
                    $('#save_pdf_per').attr("disabled", true);
                    form.submit();
                },
            });
        });
    <?php echo '</script'; ?>
>

<?php }
}
