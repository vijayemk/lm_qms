<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Add </li>
            <li class="active">SOP </li>
            <li class="active">Add </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Add Draft SOP </a> </h4>
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
                                                        <h4 class="modal-title" id="myModalLabel">Add Draft SOP Form</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <!--Add Form -->
                                                        <form name="add_sop_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_sop_form" autocomplete="off">
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
                                                                        <input type="text" placeholder="Min 3 - Max 120" class="width-100 required" name="sop_name" id="sop_name" maxlength="120" onkeyup="sop_name_exist();
                                                                                return false;"  required title="Enter Valid SOP Name">
                                                                    </div>
                                                                    <div id="exist_error_message"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason_for_creation_revision"} <span class="vd_red">*</span></label>
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
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="language"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <select class="width-100" name="sop_lang" id="sop_lang" required title="Select Valid Language">
                                                                            {foreach name=list item=item key=key from=$sop_pdf_sup_lang_list}
                                                                                <option value="{$item.code}" {if $item.is_default eq 'yes'} selected {/if}>{$item.language}</option>
                                                                            {/foreach}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="cc_no"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <input type="text" placeholder="Min 1 - Max 100" class="width-100 required" name="cc_no" id="cc_no" maxlength="100" required title="Enter Valid Change Control Number">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="dept_view"}</label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <div class="vd_checkbox checkbox-danger">
                                                                            {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                <input type="checkbox" name="dept_view[]" value="{$item.department_id}" id="{$item.department_id}" checked="true" {if $item.department_id eq $dept_id} disabled {/if}>
                                                                                <label for="{$item.department_id}"> {$item.department} </label>
                                                                            {/foreach}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="resp_per"} <span class="vd_red">*</span></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-3">
                                                                        <select class="width-100" name="rdept1" id="rdept1" required title="First Responsible Person Department">
                                                                            <option value="">Select Department</option>
                                                                            {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                <option value="{$item.department_id}">{$item.department}</option>
                                                                            {/foreach}
                                                                        </select><br><br>
                                                                        <select class="width-100" name="rdept2" id="rdept2" title="Second Responsible Person Department" disabled>
                                                                            <option value="">Select Department</option>
                                                                            {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                <option value="{$item.department_id}">{$item.department}</option>
                                                                            {/foreach}
                                                                        </select><br><br>
                                                                        <select class="width-100" name="rdept3" id="rdept3" title="Third Responsible Person Department" disabled>
                                                                            <option value="">Select Department</option>
                                                                            {foreach name=list item=item key=key from=$plant_dept_list}
                                                                                <option value="{$item.department_id}">{$item.department}</option>
                                                                            {/foreach}
                                                                        </select><br><br>
                                                                    </div>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-3">
                                                                        <select class="width-100" name="rdept1_resp" id="rdept1_resp" required title="First Responsible Person">
                                                                            <option value="">First Responsible Person</option>
                                                                        </select><br><br>
                                                                        <select class="width-100" name="rdept2_resp" id="rdept2_resp" title="Second Responsible Person" disabled>
                                                                            <option value="">Second Responsible Person</option>
                                                                        </select><br><br>
                                                                        <select class="width-100" name="rdept3_resp" id="rdept3_resp" title="Third Responsible Person" disabled>
                                                                            <option value="">Third Responsible Person</option>
                                                                        </select><br><br>
                                                                        <input type="hidden" id="resp_per_type">
                                                                        <input type="hidden" id="rdept_resp_count">
                                                                        <input type="hidden" id="def_sop_moni_limit" value="{$def_sop_moni_limit}">
                                                                    </div>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-2">
                                                                        <div id="rdept1_resp_count_msg"></div><br>
                                                                        <div id="rdept2_resp_count_msg"></div><br><br>
                                                                        <div id="rdept3_resp_count_msg"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label  col-sm-2"></label>
                                                                    <div id="first-name-input-wrapper"  class="controls col-sm-6">
                                                                        <button class="btn vd_bg-green vd_white" type="submit" name="add_sop" id="add_sop">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
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
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#add_sop_form');
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
                    sop_lang: {
                        required: true,
                    },
                    rdept1_resp: {
                        required: true,
                    },

                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    var msg_code = $('#exist_error_message').html();
                    var temp_sop_draft_no = $('#temp_sop_draft_no').val();
                    if (msg_code == "SOP Name exists") {
                        return false;
                    }
                    if (temp_sop_draft_no == "invalid_type") {
                        alert("Invalid Temporary Draft Number!");
                        return false;
                    }
                    $('#add_sop').attr("disabled", true);
                    form.submit();
                },

            });
        });
        $(document).ready(function () {
            $("#sop_name").keyup(function () {
                $("#sop_name").val($("#sop_name").val().toUpperCase());
                //x_sop_name_exist($("#sop_name").val(), check_handle);
            });
        });
        function check_handle(result) {
            if (result == "true") {
                document.getElementById('exist_error_message').innerHTML = "SOP Name exists";
                document.getElementById('exist_error_message').style.color = "red";
            }
            if (result == "false") {
                document.getElementById('exist_error_message').innerHTML = "   ";
            }
        }
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
        $(document).ready(function () {
            $('#rdept1,#rdept2,#rdept3').on('change', function (e) {
                $('#resp_per_type').val('');
                $('#resp_per_type').val(this.id);
                x_get_dept_users(this.value, list_users);
            });
            $('#rdept1_resp').on('change', function (e) {
                if ($('#rdept1_resp').val() != '') {
                    $('#rdept2').prop('disabled', false);
                    $('#rdept2_resp').prop('disabled', false);
                    $('#rdept3').prop('disabled', true);
                    $('#rdept3_resp').prop('disabled', true);
                } else {
                    $('#rdept2').val('');
                    $('#rdept2_resp').val('');
                    $('#rdept3').val('');
                    $('#rdept3_resp').val('');
                    $('#rdept2').prop('disabled', true);
                    $('#rdept2_resp').prop('disabled', true);
                    $('#rdept3').prop('disabled', true);
                    $('#rdept3_resp').prop('disabled', true);
                }
            });
            $('#rdept2_resp').on('change', function (e) {
                if ($('#rdept2_resp').val() != '') {
                    $('#rdept3').prop('disabled', false);
                    $('#rdept3_resp').prop('disabled', false);
                } else {
                    $('#rdept3').val('');
                    $('#rdept3_resp').val('');
                    $('#rdept3').prop('disabled', true);
                    $('#rdept3_resp').prop('disabled', true);
                }
            });
            $('#rdept1_resp,#rdept2_resp,#rdept3_resp').on('change', function (e) {
                $('#rdept_resp_count').val('');
                $('#rdept_resp_count').val(this.id);
                if(this.value!=''){
                    var resp_per = this.value;
                }else{
                    var resp_per = 'NA';
                }
                x_search_sop_monitoring_details_count('','','',resp_per,'','yes', list_users_monitoring_count);
            });
        });
        function list_users_monitoring_count(result){
            var count_msg = $('#rdept_resp_count').val()+"_count_msg";
            var  rdept_resp= $('#rdept_resp_count').val();
            var def_sop_moni_limit = $('#def_sop_moni_limit').val();
            
            if(result >= def_sop_moni_limit){
                alert("Limit exceeds. Allowed limit is " + def_sop_moni_limit);
                $('#'+rdept_resp).val('');
                $('#'+count_msg).text('');
            }else{
                $('#'+count_msg).text(result);
                $('#'+count_msg).css({ 'color': 'red' });
            }
        }
        function list_users(users) {
            var dept_users_obj = document.getElementById($('#resp_per_type').val() + "_resp");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            var addy = document.createElement('option');
            addy.text = "Select";
            addy.value = "";
            try {
                dept_users_obj.add(addy, null);
            } catch (ex) {
                dept_users_obj.add(addy);
            }
            for (var y in users) {
                var users_array = users[y]
                var addy = document.createElement('option');
                addy.id = users_array.user_id
                addy.text = users_array.user_name
                addy.value = users_array.user_id
                try {
                    dept_users_obj.add(addy, null);
                } catch (ex) {
                    dept_users_obj.add(addy);
                }
            }
        }
    </script>
{/literal}
