<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
{literal}
    <script language="javascript">
{/literal}   
    {include file="templates/insert_sajax.tpl"}
{literal} 
        function validation() {
            var result = confirm("Are you sure want to submit user exit form for your account?!");
            if (result == true) {
               return true;
            }
            else  {
                return false;
            }
        }
    </script>
{/literal}
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">User Exit </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> User Exit </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <h2 class="mgbt-xs-20">User Exit Form</h2>
                                        <form name="user_exit" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="user_exit-form" autocomplete="off">
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
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=user_name} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="user_name" id="user_name" required readonly value="{$user_name}" title="Enter Valid User Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=full_name} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="full_name" id="full_name" required readonly value="{$full_name}" title="Enter Valid Full Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=emp_id} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="emp_id" id="emp_id" required readonly value="{$emp_id}" title="Enter Valid Employee Id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=organization} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="organization" id="organization" required readonly value="{$organization}" title="Enter Valid Organization">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=plant_name} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="plant_name" id="plant_name" required readonly value="{$user_plant}" title="Enter Valid Company Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=department} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="department" id="department" required readonly value="{$department}" title="Enter Valid Department">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=designation} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="designation" id="designation" required readonly value="{$designation}" title="Enter Valid Designation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=email} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <input type="text" class="width-60 required" name="email" id="email" required readonly value="{$email}" title="Enter Valid Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label  col-sm-2">{attribute_name module=admin attribute=reason} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                        <textarea placeholder="Min 5 - Max 500" rows="2" class="width-60 required" name="reason" id="reason" maxlength="500" required title="Enter Valid Reason" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                            <div class="form-group">
                                              <div class="col-sm-2"></div>
                                              <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                                <div class="mgtp-10">
                                                  <button class="btn vd_bg-green vd_white" type="submit"  name="exit_request" id="exit_request" onClick="return validation();">Submit</button>
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
            var form_submit = $('#user_exit-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    reason: {
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
                    $('#exit_request').attr("disabled", true);
                    form.submit();
                },
            });
            
        
    });
    </script>
{/literal}
