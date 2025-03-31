<?php
/* Smarty version 3.1.30, created on 2024-10-12 15:32:11
  from "/var/www/html/lm_qms/lib/admin/templates/list_business_object.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_670a492346fcc5_90220640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76fb6df1b2743606f1a226d2eaa09e6c55585a0a' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/list_business_object.admin.tpl',
      1 => 1567499974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_670a492346fcc5_90220640 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

    <?php echo '<script'; ?>
 language="javascript">

    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    function validation() {
        if (document.getElementById('exist_error_message').innerHTML == "Business Object exists"){
            alert("Business Object exists.Enter any other Business Object!");
            return false;
        }
    }
<?php echo '</script'; ?>
>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Business Object </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add Business Object </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Business Object Form</h2>
                                <form name="business-object-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="business-object-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"business_object"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="objectname" id="objectname" maxlength="40" onkeyup="business_object_exist(); return false;"  required title="Enter Business Object">
                                            </div>
                                            <div id="exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"full_name"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" required  name="fullname" id="fullname" maxlength="40" title="Enter Full Name">
                                            </div>
                                      </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                      <div class="col-sm-2"></div>
                                      <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                        <div class="mgtp-10">
                                          <button class="btn vd_bg-green vd_white" type="submit"  name="add" id="add" onClick="return validation();">Add</button>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Business Object List</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel widget">
                                        <div class="panel-body">
                                            <div class="panel-body table-responsive">
                                                <table class="table table-bordered table-striped" id="data-tables">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"business_object"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"business_object_full_name"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"actions"),$_smarty_tpl);?>
</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['objectlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                            <tr >
                                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value->object_name;?>
</td>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value->full_name;?>
</td>
                                                                <td>
                                                                    <a class="btn vd_btn vd_bg-green btn-sm" href="index.php?module=admin&action=random_id_generation&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value->object_id;?>
" title="Number Sequence">Number Sequence</a>
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
            "use strict";
            $('#data-tables').dataTable();
        } );
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#business-object-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    objectname: {
                        minlength: 2,
                        required: true
                    },
                    fullname: {
                        minlength: 2,					
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
                    $('#add').attr("disabled", true);
                    form.submit();
                },
                
            });
    });

    function check_handle(result) {
        if (result=="true") {

            document.getElementById('exist_error_message').innerHTML = "Business Object exists";
            document.getElementById('exist_error_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('exist_error_message').innerHTML = "   ";
        }
    }

    function business_object_exist() {
        var objectname = document.getElementById('objectname').value;
        x_business_object_exist(objectname, check_handle);
    }
    <?php echo '</script'; ?>
>

<?php }
}
