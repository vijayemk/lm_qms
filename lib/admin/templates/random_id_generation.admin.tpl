<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<script>
    function validation() {
        if (document.getElementById('exist_error_message').innerHTML == "Sub Business Object exists") {
            alert("Sub Business Object exists.Enter any other Sub Business Object!");
            return false;
        }
    }
</script>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li><a href="index.php?module=admin&action=list_business_object">Business Object</a> </li>
            <li class="active">Number Sequence</li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Add Sub Business Object </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Add Sub Business Object Form</h2>
                                <form name="sub_business_object-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sub_business_object-form" autocomplete="off">
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
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="sub_business"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 2 - Max 40" class="width-60 required" name="objectname" id="objectname" maxlength="40" onkeyup="sub_business_object_exist(); return false;"  required title="Enter Valid Sub Business Object">
                                            </div>
                                            <div id="exist_error_message"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="prefix"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="text" placeholder="Min 1 - Max 40" class="width-60 required" name="aprefix" id="aprefix" maxlength="40" required title="Enter Valid Prefix">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="body"} <span class="vd_red">*</span></label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                <input type="number" placeholder="Min 1 - Max 40" class="width-60 required" name="abody" id="abody" maxlength="40" required title="Enter Valid Body">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="description"} <span class="vd_red">*</span></label>
                                            <div id="company-input-wrapper" class="controls col-sm-6">
                                                <input type="text" placeholder="Min 3 - Max 40" class="width-60 required" required  name="description" id="description" maxlength="40" title="Enter Valid Description">
                                            </div>
                                      </div>
                                    </div>

                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                    <div class="form-group">
                                      <div class="col-sm-2"></div>
                                      <div class="col-md-6 mgbt-xs-10 mgtp-20">

                                        <div class="mgtp-10">
                                            <input name="buss_obj_id" id ="buss_obj_id" type="hidden" value="{$buss_object_id}">
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Number Sequence for Business Object of {$objectname} </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <h2 class="mgbt-xs-20">Edit Number Sequence Form</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel widget">
                                            <div class="panel-body table-responsive">
                                                <table class="table table-bordered table-striped" id="data-tables">
                                                    <thead>
                                                        <tr>
                                                            <td >{attribute_name module="admin" attribute="sub_business"}</td>
                                                            <td>{attribute_name module="admin" attribute="prefix"}</td>
                                                            <td>{attribute_name module="admin" attribute="body"}</td>
                                                            <td>{attribute_name module="admin" attribute="actions"}</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {foreach name=list item=item key=key from=$sub_businesslist} 
                                                            <tr >
                                                                <td >{$item.sub_object_name}</td>
                                                                <td >{$item.prefix}</td>
                                                                <td >{$item.body}</td>
                                                                <td class="menu-action">
                                                                    <button class="btn btn-primary " data-toggle="modal" data-target="#myModal" onclick="setValues('{$item.sub_object_id}','{$item.prefix}','{$item.body}','{$item.sub_object_name}');">Edit</button>
                                                                </td>
                                                            </tr>
                                                        {/foreach}
                                                    </tbody>
                                                </table>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header vd_bg-blue vd_white">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit <span id="sub_buss_name"></span> Number Sequence</h4>
                                                            </div>
                                                            <form name="edit_number_seq_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="edit_number_seq_form" autocomplete="off">
                                                                <div class="modal-body">
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
                                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="prefix"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                                <input type="text" placeholder="Min 1 - Max 40" class="width-100 required" name="uprefix" id="uprefix" maxlength="40" required title="Enter Valid Prefix">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="body"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                                <input type="number" placeholder="Min 1 - Max 40" class="width-100 required" name="ubody" id="ubody" maxlength="40" required title="Enter Valid Body">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer background-login">
                                                                    <input name="sub_bus_obj_id" id ="sub_bus_obj_id" type="hidden">
                                                                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn vd_btn vd_bg-green" name="edit_number_seq" id="edit_number_seq">Save changes</button>
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
            $('#data-tables').dataTable();
        } );
    </script>

    <script type="text/javascript">
        function setValues(value,prefix,body,sub_object_name) {
            $("#sub_buss_name").text(sub_object_name);
            $("#sub_bus_obj_id").val(value);
            $("#uprefix").val(prefix);
            $("#ubody").val(body);
        }
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#edit_number_seq_form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div',    //default input error message container
                errorClass: 'vd_red',   // default input error message class
                focusInvalid: false,    // do not focus the last invalid input
                ignore: "",
                rules: {
                    uprefix: {
                        required: true,
                    },
                    ubody: {
                        required: true,
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

                invalidHandler: function (event, validator) {   //display error alert on form submit              
                    success_register.fadeOut(500);
                    error_register.fadeIn(500);
                    scrollTo(form_submit,-100);

                },

                highlight: function (element) {     // hightlight error inputs
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
                    $('#edit_number_seq').attr("disabled", true);
                    form.submit();
                },
            });
        });
        $('#uprefix').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
        $('#ubody').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            var form_submit = $('#sub_business_object-form');
            var error_register = $('.alert-danger', form_submit);
            var success_register = $('.alert-success', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    aprefix: {
                        required: true,
                    },
                    abody: {
                        required: true,
                    },
                    objectname: {
                        minlength: 2,
                        required: true
                    },
                    description: {
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
                submitHandler: function(form) {                    
                    $('#add').attr("disabled", true);
                    form.submit();
                },
                
            });
    });
    
    function check_handle(result) {
        if (result=="true") {
            document.getElementById('exist_error_message').innerHTML = "Sub Business Object exists";
            document.getElementById('exist_error_message').style.color="red";
        }
        if (result=="false") {
            document.getElementById('exist_error_message').innerHTML = "   ";
        }
    }
    function sub_business_object_exist() {
        $("#objectname").val($("#objectname").val().toUpperCase());
        var objectname = document.getElementById('objectname').value;
        var buss_object_id = document.getElementById('buss_obj_id').value;
        x_sub_business_object_exist(objectname,buss_object_id, check_handle);
    }
    </script>
{/literal}
