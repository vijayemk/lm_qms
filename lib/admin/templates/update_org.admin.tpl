<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li><a href="index.php?module=admin&action=list_organization">Organization</a> </li>
            <li class="active">Update Organization </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Update Organization </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Update Organization Form</h2>
                                <form name="org-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="org-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="short_name"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 20" class="width-60 required" name="short_name" id="short_name" value="{$regobj->short_name}" maxlength="20" onkeyup="org_short_name_exist(); return false;" required title="Enter Valid Short Name">
                                            </div>
                                            <div id="org_short_name_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="organization"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 100" class="width-60 required" name="organization" id="organization" value="{$regobj->org_name}" maxlength="100" onkeyup="org_exist(); return false;"  required title="Enter Valid Organization Name">
                                            </div>
                                            <div id="org_exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="address"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <textarea placeholder="Min 5 - Max 500" rows="2" class="width-60 required" name="address" id="address" maxlength="500" required title="Enter Valid Address" >{$regobj->address}</textarea>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="city"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="city" id="city" maxlength="40" value="{$regobj->city}" required title="Enter Valid City">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="state"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="state" id="state" maxlength="40" value="{$regobj->state}" required title="Enter Valid State">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="country"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="country" id="country" maxlength="40" value="{$regobj->country}" required title="Enter Valid Country">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="pincode"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 6 - Max 15" class="width-60 required" name="pincode" id="pincode" maxlength="15" value="{$regobj->pincode}" required title="Enter Valid Pincode">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="contact_number"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="number" placeholder="Min 10 - Max 11" class="width-60 required" name="contact_number" id="contact_number" maxlength="11" value="{$regobj->contact_number}" required title="Enter Valid Contact Number">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="email"} <span class="vd_red"></span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 60" class="width-60 required" name="email" id="email" maxlength="60" value="{$regobj->email}" title="Enter Valid Email ID">
                                            </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="website"} <span class="vd_red"></span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" name="website" id="website" maxlength="40" value="{$regobj->website}" title="Enter Valid Website Name">
                                            </div>
                                      </div>
                                    </div>
                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="update" id="update" onClick="return validation();">Update</button>
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
                       
{literal}
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 

    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#org-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    short_name: {
                        minlength: 2,
                        required: true,
                    },
                    organization: {
                        minlength: 3,
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
                        digits : true,
                        required: true
                    },
                    email: {
                        minlength: 5,					
                        required: false,
                        email:true
                    },
                    website:{
                        minlength: 3,
                        required: false,
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
                    if($("#org_short_name_exist_error_message").html()=="Short Name Exists"){
                        alert("Short Name Exists");
                        return false
                    }
                    if($("#org_exist_error_message").html()=="Organization Exists") {
                        alert("Organization Name Exists");
                        return false
                    }
                    $('#update').attr("disabled", true);
                    form.submit();
                },
            });
        });
        function check_org_handle(result) {
            if (result=="true") {
                document.getElementById('org_exist_error_message').innerHTML = "Organization Exists";
                document.getElementById('org_exist_error_message').style.color="red";
            }
            if (result=="false") {
                document.getElementById('org_exist_error_message').innerHTML = "   ";

            }
        }
        function check_org_short_name_handle(result) {
            if (result=="true") {
                $("#org_short_name_exist_error_message").html("Short Name Exists");
                $("#org_short_name_exist_error_message").css("color", "red");
            }
            if (result=="false") {
                document.getElementById('org_short_name_exist_error_message').innerHTML = "   ";
            }
        }
        $(document).ready(function() {
            $("#organization").keyup(function(){
                $("#organization").val($("#organization").val().toUpperCase());
                x_organization_exist($("#organization").val(), check_org_handle);
            });
            $("#short_name").keyup(function(){
                $("#short_name").val($("#short_name").val().toUpperCase());
                x_organization_short_name_exist($("#short_name").val(), check_org_short_name_handle);
            });
        });
    </script>
{/literal}
