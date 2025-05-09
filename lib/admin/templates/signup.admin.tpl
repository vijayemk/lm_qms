<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Signup Request </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Signup </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <h2 class="mgbt-xs-20">User Creation Form</h2>
                                        <form name="user_signup" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="user_signup-form" autocomplete="off">
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
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=organization} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <select class="width-60" name="organization" id="organization" required title="Select Valid Organization Name">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$organizationlist}
                                                                <option value="{$item->org_id}">{$item->org_name}</option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=plant_name} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="plant_name" id="plant_name" value="{$plant_name}" maxlength="40" required title="Enter Valid  Plant Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=department} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <select class="width-60" name="department" id="department" required title="Select Valid Department">
                                                            <option value="">Select Department</option>
                                                            {foreach name=list item=item key=key from=$plant_dept_list}
                                                                <option value="{$item.department_id}">{$item.department} </option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=full_name} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="full_name" id="full_name" maxlength="40" required title="Enter Valid  Full Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="emp_id"} <span class="vd_red">*</span></label>
                                                    <div id="company-input-wrapper" class="controls col-sm-6">
                                                        <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" required  name="emp_id" id="emp_id" maxlength="40" onkeyup="empid_exist(); return false;"  title="Enter Valid Employee Id">
                                                    </div>
                                                    <div id="signup_empid_exist_error_message"></div>
                                                    <div id="empid_exist_error_message"></div>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="designation"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <select class="width-60" name="designation" id="designation" required title="Select Valid Designation">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$designationlist}
                                                                <option value="{$item->designation_id}">{$item->designation_name}
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="email"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="email" id="email" maxlength="60" onkeyup="email_exist(); return false;" required title="Enter Valid Email Id">
                                                    </div>
                                                    <div id="email_exist_error_message"></div>
                                                    <div id="signup_email_exist_error_message"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="confirm_email"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="confirm_email" id="confirm_email" maxlength="60" onkeyup="confirm_email_exist(); return false;" required title="Enter Valid Confirm Email Id">
                                                    </div>
                                                    <div id="confirm_email_exist_error_message"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="select_applicable_per"} <span class="vd_red">*</span></label>
                                                    <div class="vd_checkbox checkbox-info col-sm-2">
                                                        {foreach name=list item=item key=key from=$workflow_access_per_list}
                                                            <input type="checkbox" name="sworkflow_per[]" value="{$item.access_per_id}" id="{$key}">
                                                            <label for="{$key}"> {$item.description} </label><br>
                                                        {/foreach}
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-group">
                                                <div class="col-sm-2"></div>
                                                <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                                    <div class="mgtp-10">
                                                        <button class="btn vd_bg-green vd_white" type="submit"  name="adduser" id="adduser">Add</button>
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
</div>
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Specific Page Scripts Put Here -->
    
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#user_signup-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    organization: {
                        required: true
                    },
                    department: {
                        required: true
                    },
                    full_name: {
                        minlength: 3,					
                        required: true
                    },
                    emp_id: {
                        minlength: 3,					
                        required: true
                    },
                    designation: {
                        required: true
                    },
                    email: {
                        minlength: 3,					
                        required: true,
                        email: true
                    },
                    confirm_email: {
                        minlength: 3,					
                        required: true,
                        email: true
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
                    if($("#empid_exist_error_message").html()=="Employee Id exists") {
                        alert("Employee Id Exist.Pls Enter Different Unique Employee Id.!");
                        return false
                    }
                    if($("#signup_empid_exist_error_message").html()=="Employee Id exists") {
                        alert("Employee Id Exist.Pls Enter Different Unique Employee Id.!");
                        return false
                    }
                    if($("#email_exist_error_message").html()=="Email Id exists") {
                        alert("Email Id Exist.Pls Enter Different Unique Email Id.!");
                        return false
                    }
                    if($("#signup_email_exist_error_message").html()=="Email Id exists") {
                        alert("Email Id Exist.Pls Enter Different Unique Email Id.!");
                        return false
                    }
                    if($("#confirm_email_exist_error_message").html()=="Email Id exists") {
                        alert("Email Id Exist.Pls Enter Different Unique Email Id.!");
                        return false
                    }
                    if($("#email").val()!=$("#confirm_email").val()) {
                        alert("You did not enter the same Email Id twice.");
                        return false
                    }
                    $('#adduser').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function empid_check_handle(result) {
            if (result=="true") {
                $("#empid_exist_error_message").html("Employee Id exists");
                $("#empid_exist_error_message").css("color", "red");
            }
            if (result=="false") {
                $("#empid_exist_error_message").html(" ");
            }
        }
        function signup_empid_check_handle(result) {
            if (result=="true") {
                $("#signup_empid_exist_error_message").html("Employee Id exists");
                $("#signup_empid_exist_error_message").css("color", "red");
            }
            if (result=="false") {
                $("#signup_empid_exist_error_message").html(" ");
            }
        }
        function email_check_handle(result) {
            if (result=="true") {
                $("#email_exist_error_message").html("Email Id exists");
                $("#email_exist_error_message").css("color", "red");
            }
            if (result=="false") {
                $("#email_exist_error_message").html(" ");
            }
        }
        function signup_email_check_handle(result) {
            if (result=="true") {
                $("#signup_email_exist_error_message").html("Email Id exists");
                $("#signup_email_exist_error_message").css("color", "red");
            }
            if (result=="false") {
                $("#signup_email_exist_error_message").html(" ");
            }
        }
        function confirm_email_check_handle(result) {
            if (result=="true") {
                $("#confirm_email_exist_error_message").html("Email Id exists");
                $("#confirm_email_exist_error_message").css("color", "red");
            }
            if (result=="false") {
                $("#confirm_email_exist_error_message").html(" ");
            }
        }
        function empid_exist(){
            var emp_id = document.getElementById('emp_id').value;
            x_empid_exist(emp_id, empid_check_handle);
            x_signup_empid_exist(emp_id, signup_empid_check_handle);
        }
        function email_exist(){
            var email = document.getElementById('email').value.toLowerCase();
            x_emailid_exist(email, email_check_handle);
            x_signup_emailid_exist(email, signup_email_check_handle);
        }
        function confirm_email_exist(){
            var email = document.getElementById('confirm_email').value.toLowerCase();
            x_emailid_exist(email, confirm_email_check_handle);
        }
    </script>
{/literal}
