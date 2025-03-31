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
            <li class="active">Transfer </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Transfer SOP </a> </h4>
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
                                                        <h4 class="modal-title" id="myModalLabel">Transfer SOP Form</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <!--Transfer SOP Form -->
                                                        <form name="transfer_sop-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="transfer_sop-form" autocomplete="off">
                                                            <h2 class="mgbt-xs-20">Select SOP</h2>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_type"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="type" id="type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                                            <option value="">Select</option>
                                                                            {foreach name=list item=item key=key from=$soptypelist}
                                                                                <option value="{$item->object_id}" {if $type_id eq $item->object_id} selected {/if}>{$item->type}</option>
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
                                                                            {foreach name=list item=item key=key from=$sop_transfer_list}
                                                                                <option value="{$item->sop_object_id}"{if $item->sop_object_id eq $sop_object_id}selected{/if}>{$item->sop_name}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            {if !empty($current_sop_name)}
                                                                <h2 class="mgbt-xs-20">SOP to Transfer</h2>
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
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr >
                                                                                        <td >{$current_sop_type}</td>
                                                                                        <td >{$current_sop_no}</td>
                                                                                        <td >{$current_sop_name}</td>
                                                                                        <td >{$current_sop_revison}</td>
                                                                                        <td >{$current_sop_supersedes}</td>
                                                                                        <td >{$current_sop_effective_date}</td>
                                                                                        <td >{$current_sop_expiry_date}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Transfer To</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_type"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-100" name="sop_type" id="sop_type" onchange = addList('sop_type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">

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
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="temp_draft_no"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 3 - Max 40" class="width-100 required" name="temp_sop_draft_no" id="temp_sop_draft_no" maxlength="40" value="{$sop_draft_number}" readonly  required title="Valid SOP No">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_supersedes"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 3 - Max 100" class="width-100 required" name="sop_supersedes" id="sop_supersedes" maxlength="100" value="Nil" title="Valid SOP Supersedes">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_belongs_to"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" class="width-100 required" name="sop_plant" id="sop_plant" value="{$usr_plant}" title="SOP Belongs To" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="sop_name"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 3 - Max 80" class="width-100 required" name="sop_name" id="sop_name" value="{$current_sop_name}" readonly maxlength="80" required title="Enter Valid SOP Name">
                                                                        </div>
                                                                        <div id="exist_error_message"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason_for_transfer"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <select class="width-100" name="reason_for_revision" id="reason_for_revision" required title="Select Valid Reason">
                                                                                <option value="">Select</option>
                                                                                {foreach name=list item=item key=key from=$sop_reason_list}
                                                                                    <option value="{$item.object_id}">{$item.reason}</option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="cc_no"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Min 1 - Max 100" class="width-45 required" name="cc_no" id="cc_no" maxlength="100" required title="Enter Valid Change Control Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div id="company-input-wrapper" class="controls col-sm-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="assign_to"} <span class="vd_red">*</span></label>
                                                                        <div class="col-xs-3">
                                                                            <select  name="assign_to_dept" id="assign_to_dept" onchange = get_assign_to_dept_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                                                <option value="">Select Department</option>
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    <option value="{$item.department_id}">{$item.department} </option>
                                                                                {/foreach}
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-xs-3">
                                                                            <select  name="assign_to_user" id="assign_to_user" title="Select Valid User"></select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="dept_view"}</label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <div class="vd_checkbox checkbox-danger">
                                                                                {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                    <input type="checkbox" name="dept_view[]" value="{$item.department_id}" id="{$item.department_id}" checked="true" {if $item.department_id eq $usr_dept_id} disabled {/if}>
                                                                                    <label for="{$item.department_id}"> {$item.department} </label>
                                                                                {/foreach}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div id="company-input-wrapper" class="controls col-sm-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="copy"} (Select whichever is applicable) <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                                            <table class="table table-bordered table-striped" id="user_pending_data-tables">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th >SOP</th>
                                                                                        <th >Format(s)</th>	
                                                                                        <th >Annexure(s)</th>	
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr >
                                                                                        <td class="vd_checkbox checkbox-success">
                                                                                            <input  type="checkbox" name="sop_content_tansfer" value="{$sop_object_id}" id="{$sop_object_id}" checked="true">
                                                                                            <label for="{$sop_object_id}"> {$current_sop_no} </label>
                                                                                        </td>
                                                                                        <td class="vd_checkbox checkbox-success">
                                                                                            {foreach item=item1 key=key1 from=$formatlist}                                                                                                
                                                                                                <input  type="checkbox" name="sop_format_content_tansfer[]" value="{$item1.format_object_id}" id="{$item1.format_object_id}" checked="true">
                                                                                                <label for="{$item1.format_object_id}"> {$item1.format_no} - [{$item1.status}] </label><br>
                                                                                            {/foreach}
                                                                                        </td>
                                                                                        <td class="vd_checkbox checkbox-success">
                                                                                            {foreach item=item1 key=key1 from=$annexurelist}
                                                                                                <input  type="checkbox" name="sop_annexure_content_tansfer[]" value="{$item1.annexure_object_id}" id="{$item1.annexure_object_id}" checked="true">
                                                                                                <label for="{$item1.annexure_object_id}"> {$item1.annexure_no} - [{$item1.status}] </label><br>
                                                                                            {/foreach}
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h2 class="mgbt-xs-20">Reason for Transfer</h2>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason"} <span class="vd_red">*</span></label>
                                                                        <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                            <input type="text" placeholder="Reason for Transfer" class="width-100 required" name="atransfer_reason" id="atransfer_reason"  required title="Enter Valid Reason for Transfer">
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
                                                                                <button class="btn vd_bg-green vd_white" type="submit"  name="transfer" id="transfer">Transfer</button>
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
            var form_submit = $('#transfer_sop-form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    type: {
                        required: true
                    },
                    sop_no: {
                        required: true
                    },
                    sop_type: {
                        required: true
                    },
                    temp_sop_draft_no: {
                        required: true,
                        minlength: 1,
                    },
                    sop_supersedes: {
                        minlength: 3,
                        required: true
                    },
                    sop_plant: {
                        required: true,
                    },
                    sop_name: {
                        minlength: 3,
                        required: true
                    },
                    reason_for_revision: {
                        required: true
                    },
                    cc_no: {
                        minlength: 1,
                        required: true
                    },
                    assign_to_dept: {
                        required: true
                    },
                    assign_to_user: {
                        required: true
                    },
                    atransfer_reason: {
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
                    var temp_sop_draft_no = $('#temp_sop_draft_no').val();
                    if (temp_sop_draft_no == "invalid_type") {
                        alert("Invalid Temporary Draft Number!");
                        return false;
                    }
                    if (document.getElementById('mail_to_user_to').length == 0) {
                        alert("Pls select valid users");
                        document.getElementById('mail_to_user_to').focus();
                        document.getElementById('mail_to_user_to').style.borderColor = 'red';
                        return false;
                    }
                    $('#transfer').attr("disabled", true);
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
        function get_assign_to_dept_users(value) {
            x_get_dept_users(value, list_assign_to_users);
        }
        function list_assign_to_users(users) {
            var dept_users_obj = document.getElementById("assign_to_user");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            var addy = document.createElement('option');
            addy.text = "Select";
            addy.value = "";
            try {
                dept_users_obj.add(addy, null);
            } catch (ex)
            {
                dept_users_obj.add(addy);
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
