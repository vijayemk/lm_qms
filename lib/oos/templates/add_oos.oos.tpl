<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> Add </li>
            <li class="active"> QMS </li>
            <li class="active"> Out Of Specification (OOS)</li>
            <li class="active"> Add </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip"
                data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip"
                data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle"
                data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i
                    class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-body">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add
                            Out Of Specification</a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="panel widget light-widget">
                        <div class="panel-body">
                            <div class="vd_content-section clearfix">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">INPUT FORM</h3>
                                </div>
                                <div class="panel-body  panel-bd-left">
                                    <!-- Add OOS Form -->
                                    <form name="add-oos-form" method="post" action="{$smarty.server.REQUEST_URI}"
                                        class="form-horizontal" role="form" id="add-oos-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i
                                                    class="fa fa-exclamation-circle vd_red"></i></span> Change a few
                                            things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3"
                                                data-intro="<strong>OOS</strong><br/>System Generated Temporary OOS Number, Format Cannot Be Changed.<div>Format: OOS / Year / Sl no.</div>"
                                                data-step=1 data-position="left">
                                                <label
                                                    class="control-label">{attribute_name module="oos" attribute="oos_no"}
                                                    {attribute_name module="oos" attribute="temporary_no"} <span
                                                        class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Temporary No" class="required"
                                                        name="oos_no" id="oos_no" value="{$oosNo}" required
                                                        title="Invalid OOS No" readonly="true">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label
                                                    class="control-label">{attribute_name module="oos" attribute="specification_no"}<span
                                                        class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="required"
                                                        name="specification_no" id="specification_no" required
                                                        title="Invalid Specification No">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label
                                                    class="control-label">{attribute_name module="oos" attribute="test_procedure_no"}<span
                                                        class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="required"
                                                        name="test_procedure_no" id="test_procedure_no" required
                                                        title="Invalid Test Procedure No">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label
                                                    class="control-label">{attribute_name module="oos" attribute="ar_no"}<span
                                                        class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Min 3 - Max 40" class="required"
                                                        name="ar_no" id="ar_no" required title="Invalid AR No">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3"
                                                data-intro="<strong>DMS</strong><br/> Enter Date Of Occurrence."
                                                data-step=4 data-position="left">
                                                <label
                                                    class="control-label">{attribute_name module="oos" attribute="date_of_occurrence"}
                                                    <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="required generate_datepicker"
                                                        placeholder="YY-MM-DD" value="" name="date_of_occurrence" id="date_of_occurrence"
                                                        title="Select Valid Date Of Occurrence" data-datepicker_max=0
                                                        required readonly>                                                        
                                                </div>
                                            </div>
                                            <div class="col-md-3"
                                                data-intro="<strong>DMS</strong><br/> Enter Time Occurrence."
                                                data-step=5 data-position="left">
                                                <label
                                                    class="control-label">{attribute_name module="oos" attribute="time_of_occurrence"}
                                                    <span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="required generate_timepicker"
                                                        placeholder="HH:MM:SS" value="" name="time_of_occurrence" id="time_of_occurrence"
                                                        title="Select Valid Time Of Occurrence"
                                                        data-time_show_secondas="true" data-time_show_input="false"
                                                        required readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="oos" attribute="description"} <span
                                                        class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <textarea name="description" id="description" title="Enter Valid Description" placeholder="min 3 - max 100"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label"></label>
                                                <div id="first-name-input-wrapper" class="controls">
                                                    <button type="button" class="btn btn-info add_test_details_table"><i
                                                            class="fa fa-plus"></i> Add Test Details</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <table class="table table-bordered table-striped"
                                                    id="test_details_input_table">
                                                    <thead>
                                                        <tr>
                                                            <th width="25%">
                                                                {attribute_name module=oos attribute=test_name}<span
                                                                    class="vd_red">*</span></th>
                                                            <th width="30%">
                                                                {attribute_name module=oos attribute=specification_limit}<span
                                                                    class="vd_red">*</span></th>
                                                            <th width="40%">
                                                                {attribute_name module=oos attribute=obtained_result_remarks}<span
                                                                    class="vd_red">*</span></th>
                                                            <th width="5%">{attribute_name module=oos attribute=action}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>

                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <label class="control-label">{attribute_name module="admin" attribute="doc_access_rights_to"}</label>
                                                <div id="first-name-input-wrapper" class="controls">
                                                    <select title="Select Valid Company" name="access_plant" onchange="get_dept_list(this.options[this.selectedIndex].value, '#from_dept', 'multiselect');">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$plantList}
                                                            <option value="{$item.plant_id}">{$item.plant_name} - [{$item.short_name}]</option>
                                                        {/foreach}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">{attribute_name module="admin" attribute="department"}<span class="vd_red">*</span></label>
                                                <div class="controls row">
                                                    <div class="col-md-5">
                                                        <select id="from_dept" class="form-control generate_multiselect" size="10" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <br><br><br>
                                                        <button type="button" id="from_dept_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="from_dept_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="from_dept_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="from_dept_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="access_dept[]" id="from_dept_to" class="form-control" size="10" multiple="multiple" title="Select valid Department">
                                                            <option value="{$userPlantId}-{$userDepartmentId}" data-drop_down_value="{$userPlantId}-{$userDepartmentId}" selected>{$userPlantName} - [{$userDepartmentName}]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="usr_dept_id" value="{$usr_plant_id}-{$usr_dept_id}">

                                        {if $masterDataCreationAlert}
                                            <div class="alert alert-danger">
                                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Some of the master data entries are still not created in the admin section under OOS Master Data such as "Checklist, Test details". Before proceeding further, please ensure these entries are created.
                                            </div>
                                        {else}
                                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="audit_trail_action" value="Add OOS">
                                                    <input type="hidden" name="add_oos">
                                                    <button class="btn vd_bg-green vd_white" type="submit" id="add_oos" data-intro="<strong>OOS</strong><br/>Click On Add." data-step=7 data-position="left"><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
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
{literal}
    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            
            // Add OOS Form Validation
            "use strict";
            $('#add-oos-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    oos_no: {
                        required: true
                    },
                    specification_no: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    test_procedure_no: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ar_no: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    date_of_occurence: {
                        required: true
                    },
                    time_of_occurence: {
                        required: true
                    }, 
                    description: {                        
                        minlength: 3,
                        maxlength: 500,
                        required: true,
                    },                    
                                        
                },
                invalidHandler: function(event, validator) {
                    $('.alert-danger', $('#add-oos-form')).fadeIn(500);
                    scrollTo($('#add-oos-form'), -100);
                },
                submitHandler: function(form) {
                    var input_value = ["test_name[]","specification_limit[]","obtained_result[]","obtained_result_remarks[]"];
                    for (var i = 0; i < input_value.length; i++) {
                        var check = document.getElementsByName(input_value[i]);
                        for (var j = 0; j < check.length; j++) {
                            if (check[j].value == "") {
                                alert("Pls " + check[j].title)
                                check[j].focus();
                                check[j].style.borderColor = 'red';
                                return false;
                            }
                        }
                    }
                    var tf_oos_input_rowcounts = $('#test_details_input_table tr').length;
                    if (tf_oos_input_rowcounts <= 1) {
                        var msg = '<p class="fa fa-times-circle-o" style="font-size: 40px; float:left;margin-right: 10px;"></p> Invalid Input...';
                        $.notific8(msg, {theme: 'ruby', life: 1000});
                        return false;
                    }
                    $('#add_oos').attr("disabled", true); {
                        $('#add_oos').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                }
            });
        });

        $(document).ready(function() {
            $(".add_test_details_table").click(function() {
                var index = $("#test_details_input_table tbody tr:last-child").index();
                var row = `<tr>
                            <td>
                                <select name="test_name[]" class="form-control" title="Select Valid Test Name">
                                    <option value="">Select</option>
                                        {/literal}
                                            {foreach name=list key=key item=item from=$testDetailsList}
                                                <option value="{$item.objectId}">{$item.testName}</option>
                                            {/foreach}
                                        {literal}
                                </select>
                            </td>
                            <td>
                                <textarea type="text" name="specification_limit[]" placeholder="Enter the specification limit" required title="Enter Valid Limit"></textarea>
                            </td>
                            <td>
                                <input type="number" min="0"  name="obtained_result[]" placeholder="Enter the obtained result" required title="Enter Valid Result">
                                <hr> 
                                <textarea type="text" name="obtained_result_remarks[]" placeholder="Enter the obtained results remarks" required title="Enter Valid Remarks"></textarea>
                            </td>
                            <td>
                                <button type="button" class="delete btn btn-danger"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>`;
                    $("#test_details_input_table").append(row);
                    $("#test_details_input_table tbody tr").eq(index + 1).find("").toggle();
                });
                //  Delete row on delete button Link
                $(document).on("click", ".delete", function() {
                    $(this).parents("tr").remove();
                });
            });
        </script>
    {/literal}