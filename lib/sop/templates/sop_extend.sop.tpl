<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!--Multiselect left to right -->
<!--link rel="stylesheet" href="vendors/multiselect-master/css/bootstrap.min.css" /-->
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Add </li>
            <li class="active">SOP </li>
            <li class="active">Extend </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Extend SOP </a> </h4>
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
                                                        <h4 class="modal-title" id="myModalLabel">Extend SOP Form</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <!--Extend SOP Form -->
                                                        <form name="extend_sop-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="extend_sop-form" autocomplete="off">
                                                            <h2 class="mgbt-xs-20">Select SOP</h2>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_type"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="sop_type" id="sop_type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$soptypelist}
                                                                                <option value="{$item->object_id}" {if $sop_type_id eq $item->object_id} selected {/if}>{$item->type}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_name"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="sop_no" id="sop_no" onchange = addList('sop_object_id',this.options[this.selectedIndex].value); required title="Select Valid SOP No">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$sop_extend_list}
                                                                                <option value="{$item->sop_object_id}"{if $item->sop_object_id eq $sop_object_id}selected{/if}>{$item->sop_name}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            {if !empty($current_sop_name)}
                                                                <h2 class="mgbt-xs-20">SOP Extend</h2>
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
                                                                                        <th>{attribute_name module="sop" attribute="sop_type"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_no"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="sop_name"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="current_revision"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="current_supersedes"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="effective_date"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="expiry_date"}</th>
                                                                                        <th>{attribute_name module="sop" attribute="to_be_extended"} <span class="vd_red">*</span></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr >
                                                                                        <td >{$sop_type}</td>
                                                                                        <td >{$sop_no}</td>
                                                                                        <td >{$current_sop_name}</td>
                                                                                        <td >{$current_sop_revison}</td>
                                                                                        <td >{$current_sop_supersedes}</td>
                                                                                        <td >{$current_sop_effective_date}</td>
                                                                                        <td >{$current_sop_expiry_date}</td>
                                                                                        <td class="smallfieldcell">
                                                                                            <select name="extend_sop[]"  disabled title="Select Valid Revision">
                                                                                                <option value="">Select</option>
                                                                                                <option value="Yes" selected>Yes</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                {if $is_sop_capa_required}
                                                                    <h2 class="mgbt-xs-20">CAPA No</h2>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="capa_no"} <span class="vd_red">*</span></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <input type="text" placeholder="Min 1 - Max 100" class="width-100 required" name="acapa_no" id="acapa_no" maxlength="100" required title="Enter Valid CAPA Number">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                {/if}
                                                                <h2 class="mgbt-xs-20">Reason for Extend</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason_for_extend"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Reason for Extend" class="width-100 required" name="aextend_reason" id="aextend_reason"  required title="Enter Valid Extend Reason">
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
                                                                                    {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                        <option value="{$item.department_id}">{$item.department} </option>
                                                                                    {/foreach}
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
                                                                            <label class="col-sm-2 control-label">{attribute_name module=sop attribute=mail_comments} <span class="vd_red">*</span></label>
                                                                            <div class="col-sm-6 controls">
                                                                                <textarea placeholder="Min 5 - Max 1000" rows="5" class="mgbt-xs-20  mgbt-sm-0" name="mail_comments" id="mail_comments" maxlength="1000" title="Enter Valid Comments" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label class="control-label  col-sm-2"></label>
                                                                            <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                                <button class="btn vd_bg-green vd_white" type="submit"  name="extend" id="extend">Extend</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            {/if}
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

{literal}
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Multiselect left to right -->
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <!--script src="vendors/multiselect-master/dist/js/bootstrap.min.js"></script-->
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>
    <script type="text/javascript">
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
    </script>
    <script>
        $(document).ready(function () {
            "use strict";
            $('#data-tables-sop').dataTable({bFilter: false, bInfo: false, bLengthChange: false, bPaginate: false, ordering: false});
        });

        $(document).ready(function () {
            "use strict";
            var form_submit = $('#extend_sop-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    sop_type: {
                        required: true
                    },
                    sop_no: {
                        required: true
                    },
                    acapa_no: {
                        required: true,
                        minlength: 1
                    },
                    aextend_reason: {
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
                    if (document.getElementById('mail_to_user_to').length == 0) {
                        alert("Pls select valid users");
                        document.getElementById('mail_to_user_to').focus();
                        document.getElementById('mail_to_user_to').style.borderColor = 'red';
                        return false;
                    }
                    $('#extend').attr("disabled", true);
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
    </script>
{/literal}
