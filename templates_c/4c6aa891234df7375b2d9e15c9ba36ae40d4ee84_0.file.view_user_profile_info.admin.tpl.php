<?php
/* Smarty version 3.1.30, created on 2024-10-01 12:48:42
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/admin/templates/view_user_profile_info.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fbefaaa11e36_44884789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c6aa891234df7375b2d9e15c9ba36ae40d4ee84' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/admin/templates/view_user_profile_info.admin.tpl',
      1 => 1633500781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66fbefaaa11e36_44884789 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        function password_validation(){
            var password_strength= CheckPasswordStrength();
            if(password_strength=="false"){
                var password_contain = document.getElementById("password_contain");
                password_contain.innerHTML = "Password Must Contains Min 8 ,atleast One Lower Case,One Upper Case and One Special Character";           
                document.getElementById('password_contain').style.color="red";
                return false;
            }else{
                var password_contain_msg = document.getElementById("password_contain");
                password_contain_msg.innerHTML = "";
            }
            if (document.getElementById("newpassword").value !== document.getElementById("retypepassword").value) {
                alert ("You did not enter the same password twice. Please re-enter your password.")
                return false;
            }
        }
        function CheckPasswordStrength() {
            var password = document.getElementById("newpassword").value;
            var password_strength = document.getElementById("password_strength");

            //TextBox left blank.
            if (password.length == 0) {
                password_strength.innerHTML = "";
                return;
            }
 
            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.
 
            var passed = 0;
 
            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                    passed++;
                }
            }
 
            //Validate for length of Password.
            if (passed > 2 && password.length > 8) {
                passed++;
            }
 
            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            password_strength.innerHTML = strength;
            password_strength.style.color = color;
            if(strength=="Very Strong"){
                return "true";
            }else{
                return "false";
            }
        }
    <?php echo '</script'; ?>
>


<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">User Profile Info. </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Profile</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="vd_content-section clearfix">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="panel widget light-widget">
                                                  <div class="panel-heading no-title"> </div>
                                                    <form name="update_profile" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_profile-form" autocomplete="off">
                                                        <div  class="panel-body">
                                                            <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"><?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
</span> </h2>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-sm-3 mgbt-xs-20">
                                                                    <div class="form-group1">
                                                                        <div class="col-xs-12">
                                                                            <div class="form-img text-center mgbt-xs-15"> <img alt="image" src="<?php echo $_smarty_tpl->tpl_vars['user_image']->value;?>
"> </div>
                                                                            <div class="form-img-action text-center mgbt-xs-20"> <a class="btn vd_btn  vd_bg-blue" href="index.php?module=admin&action=upload_photo"><i class="fa fa-cloud-upload append-icon"></i> Upload</a> </div>
                                                                            <br/>
                                                                            <div>
                                                                                <table class="table table-striped table-hover">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td >Name</td>
                                                                                            <td><?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td >Status</td>
                                                                                            <?php if ($_smarty_tpl->tpl_vars['account_status']->value == "enable") {?>
                                                                                                <td><span class="label label-success">Active</span></td>
                                                                                            <?php }?>
                                                                                            <?php if ($_smarty_tpl->tpl_vars['account_status']->value == "disable") {?>
                                                                                                <td><span class="label label-danger">Disabled</span></td>
                                                                                            <?php }?>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="width:50%;">Member Since</td>
                                                                                            <td><?php echo $_smarty_tpl->tpl_vars['created_time']->value;?>
</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <h3 class="mgbt-xs-15">Account Setting</h3>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Username</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                              <div class="col-xs-9">
                                                                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
" readonly placeholder="username">
                                                                              </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Employee ID</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['emp_id']->value;?>
" readonly placeholder="Employee Id">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Department</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['department']->value;?>
" readonly placeholder="Department">
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Designation</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['designation']->value;?>
" readonly placeholder="Designation">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Organization</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['organization']->value;?>
" readonly placeholder="Organization">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Plant Name</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['user_plant']->value;?>
" readonly placeholder="Company Name">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Email</label>
                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row mgbt-xs-0">
                                                                            <div class="col-xs-9">
                                                                                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" readonly placeholder="email@yourcompany.com">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <hr />
                                                                    <h3 class="mgbt-xs-15">Profile Setting</h3>
                                                                    <div class="alert alert-danger vd_hidden">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                                                                    </div>
                                                                    <div class="alert alert-success vd_hidden">
                                                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                                          <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'mothers_maiden_name'),$_smarty_tpl);?>
</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" name="mothers_maiden_name" id="mothers_maiden_name" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['mothers_maiden_name']->value;?>
" required placeholder="Min 3 - Max 40" title="Enter Valid Mothers Maiden Name">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Date of Birth</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" name="dob" id="dob" maxlength="10" value="<?php echo $_smarty_tpl->tpl_vars['dob']->value;?>
" readonly required placeholder="DD/MM/YYYY" title="Enter Valid Date of Birth">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label"><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'place_of_birth'),$_smarty_tpl);?>
</label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <input type="text" name="place_of_birth" id="place_of_birth" maxlength="40" value="<?php echo $_smarty_tpl->tpl_vars['place_of_birth']->value;?>
" required placeholder="Min 3 - Max 40" title="Enter Valid Place of Birth">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label"></label>
                                                                        <div class="col-sm-9 controls">
                                                                            <div class="row mgbt-xs-0">
                                                                                <div class="col-xs-9">
                                                                                    <p style="color: red">Note:For security resasons your account will get logged out once click on update button</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- panel-body -->
                                                        <div class="pd-20">
                                                            <button class="btn vd_btn vd_bg-green col-md-offset-10" type="submit"  name="update_profile" onClick="return validation();"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span>Update</button>
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
                <div class="panel panel-default">
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Change Password </a> </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-body">
                                    <h2 class="mgbt-xs-20">Change Password Form</h2>
                                    <form name="reset_password" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="reset_password-form" autocomplete="off">
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
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"current_password"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="password" placeholder="Min 8 - Max 15" class="width-60 required" required  name="oldpassword" id="oldpassword" maxlength="15" title="Enter Valid Current Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"newpassword"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="password" placeholder="Min 8 - Max 15" class="width-60 required" required  name="newpassword" id="newpassword" maxlength="15" onkeyup="CheckPasswordStrength()" title="Enter Valid New Password">
                                                </div>
                                                <div id="password_strength"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2"><span class="vd_red"></span></label>
                                            <div class="controls col-sm-6" id="password_contain"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"retypenewpassword"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                                <div id="company-input-wrapper" class="controls col-sm-6">
                                                    <input type="password" placeholder="Min 8 - Max 15" class="width-60 required" required  name="retypepassword" id="retypepassword" maxlength="15" title="Enter Valid Retype New Password">
                                                </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-9 controls">
                                                <div class="row mgbt-xs-0">
                                                    <div class="col-xs-9">
                                                        <p style="color: red">Note:For security resasons your account will get logged out once click on Change Password button</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                        <div class="form-group">
                                            <div class="col-sm-2"></div>
                                            <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                                <div class="mgtp-10">
                                                    <button class="btn vd_bg-green vd_white" type="submit"  name="change_password" onclick="return password_validation()"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span>Change Password</button>
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
</div>

    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'><?php echo '</script'; ?>
>
    <!-- Specific Page Scripts Put Here -->
    <?php echo '<script'; ?>
 type="text/javascript">
        $(window).load(function() {
            "use strict";	
            $( "#dob" ).datepicker({
                defaultDate: "+1w",
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,
                yearRange: "-100:+0", // last hundred years
                onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
                }
            });
        });
    <?php echo '</script'; ?>
>


    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#update_profile-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    mothers_maiden_name: {
                        minlength: 3,
                        required: true
                    },
                    dob: {
                        minlength: 10,					
                        required: true
                    },
                    place_of_birth: {
                        minlength: 3,					
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
                
            });
        });
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#reset_password-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    oldpassword: {
                        minlength: 8,					
                        required: true
                    },
                    newpassword: {
                        minlength: 8,					
                        required: true
                    },
                    retypepassword: {
                        minlength: 8,					
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

            });
        });
    <?php echo '</script'; ?>
>

<?php }
}
