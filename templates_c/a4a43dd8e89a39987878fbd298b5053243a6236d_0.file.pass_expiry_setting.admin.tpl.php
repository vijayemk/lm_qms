<?php
/* Smarty version 3.1.30, created on 2024-10-26 10:35:11
  from "/var/www/html/lm_qms/lib/admin/templates/pass_expiry_setting.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671c78871d6101_51800672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4a43dd8e89a39987878fbd298b5053243a6236d' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/pass_expiry_setting.admin.tpl',
      1 => 1544517206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_671c78871d6101_51800672 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Setings </li>
            <li class="active">Password Expiry </li>
            <li class="active">Expiry Days </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Passord Expiry Setting</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Password Expiry Setting Form</h2>
                                <form name="pass_expiry_setting-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="pass_expiry_setting-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"current_setting"),$_smarty_tpl);?>
 (Days) <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" class="width-60 required" name="current_expiry" value="<?php echo $_smarty_tpl->tpl_vars['current_expiry']->value;?>
" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">Edit to change (Days)<span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="number" class="width-60 required" name="expiry_changed_to" min="30" max="360">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason_for_change"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 1000" rows="2" class="width-60 required" name="reason_for_change" id="reason_for_change" maxlength="1000" required title="Enter Valid Reason for Change" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label  col-sm-2"><span class="vd_red"></span></label>
                                        <div class="controls col-sm-8" ><p style="color:green">Note : This changes will takes effect now onwards</p></div>
                                    </div>          
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                          <div class="mgtp-10">
                                            <button class="btn vd_bg-green vd_white" type="submit"  name="update" onClick="return validation();">Update</button>
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
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> History </a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <?php if (isset($_smarty_tpl->tpl_vars['pass_expiry_remarks']->value)) {?>
                                            <table class="table table-bordered table-striped" id="pass_expiry_history_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"effective_from"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"changed_from"),$_smarty_tpl);?>
 Days</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"changed_to"),$_smarty_tpl);?>
 Days</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"reason_for_change"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"update_by"),$_smarty_tpl);?>
</th>
                                                        <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"date"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pass_expiry_remarks']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                        <tr >
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['effective_from'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['changed_from'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['changed_to'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_by'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
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
                       

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Specific Page Scripts Put Here -->

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            $('#pass_expiry_history_data-tables').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Password Expiry History List',

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
                        message: 'Password Expiry History List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
        } );
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#pass_expiry_setting-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {				
                    reason_for_change: {
                        minlength: 5,
                        required: true
                    },				
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
                    $('#update').attr("disabled", true);
                    form.submit();
                },
                
            });
        });
    <?php echo '</script'; ?>
>

<?php }
}
