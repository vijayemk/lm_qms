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
            <li class="active"> CAPA </li>
            <li class="active"> Add </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add CAPA </a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="vd_content-section clearfix">
                            <div class="panel widget light-widget">
                                <div class="panel-heading bordered vd_bg-blue">
                                    <h3 class="panel-title vd_white font-semibold">INPUT FORM</h3>
                                </div>
                                <div class="panel-body panel-bd-left">
                                    <!-- Add CAPA Form -->
                                    <form name="add_capa-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="add_capa-form" autocomplete="off">
                                        <div class="alert alert-danger vd_hidden">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="capa" attribute="capa_no"} {attribute_name module="ccm" attribute="temporary_no"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <input type="text" name="acapa_no" value="{$temp_capa_number}"  title="Invalid CAPA No" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">{attribute_name module="capa" attribute="capa_from"}<span class="vd_red">*</span></label>
                                                <div class="controls">
                                                    <select name="capa_from" id="capa_from"  title="Select Valid Module">
                                                        <option value="">Select</option>
                                                        <option value="DMS">Deviation</option>
                                                        <option value="AMS">Audit</option>
                                                        <option value="VMS">Vendor</option>
                                                        <option value="OTHERS">Any Other</option>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-md-4 capa_for_options_div" style="display:none;">
                                                <div class="controls">
                                                    <label class="control-label">{attribute_name module="capa" attribute="select_doc"}</label><span class="mgl-20 link_to_ref_doc"></span>
                                                    <div class="controls">
                                                        <select class="capa_for_options required generate_select2" name="sorurce_doc_no" id="capa_for_options" title="Select Source Document" style="width:100%;"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 capa_for_value_div" style="display:none;">
                                                <div class="controls">
                                                    <label class="control-label">{attribute_name module="capa" attribute="select_doc"}</label></a>
                                                    <div class="controls">
                                                        <input type="text" placeholder="Enter Source Document" class="required sorurce_doc_no" name="sorurce_doc_no_others">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="form-label font-semibold">{attribute_name module=capa attribute=reason} <span class="vd_red">*</span></div>
                                                <textarea type="text" rows="2" name="reason" title="Enter valid reason"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5">
                                                <label class="control-label">{attribute_name module="admin" attribute="doc_access_rights_to"}</label>
                                                <div id="first-name-input-wrapper" class="controls">
                                                    <select title="Select Valid Company" name="access_plant" onchange="get_dept_list(this.options[this.selectedIndex].value, '#from_dept', 'multiselect');">
                                                        <option value="">Select</option>
                                                        {foreach name=list item=item key=key from=$plant_list}
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
                                                            <option value="{$usr_plant_id}-{$usr_dept_id}" data-drop_down_value="{$usr_plant_id}-{$usr_dept_id}" selected>{$usr_plant_name} - [{$usr_dept_name}]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="usr_dept_id" value="{$usr_plant_id}-{$usr_dept_id}">
                                        <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="audit_trail_action" value="Add CAPA"> 
                                                <input type="hidden" name="add_capa"> 
                                                <button class="btn vd_bg-green vd_white" type="submit" name="add_capa" id="add_capa" ><span class="menu-icon"><i class="fa fa-fw fa-plus-circle"></i></span> Add</button>
                                            </div>
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
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // Add CAPA Form Validation
            $('#add_capa-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error messsage class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ":hidden",
                rules: {
                    acapa_no: {
                        required: true
                    },
                    capa_from: {
                        required: true
                    },
                    reason: {
                        required: true
                    },
                    sorurce_doc_no: {
                        required: true
                    },
                    sorurce_doc_no_others: {
                        required: true,
                        maxlength: 100
                    },
                    "access_dept[]": {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#add_capa-form')).fadeIn(500);
                    scrollTo($('#add_capa-form'), -100);
                },
                submitHandler: function (form) {
                    if (//If Current User Dept Not Selected In Access Rights
                            lm_validate.is_value_exist_in_array($("#from_dept_to").val(), $("#usr_dept_id").val(), 'Select Current User Department')
                            //If Duplicate Deprtments Found In Access Rights
                            && lm_validate.is_duplicate_value_exists_in_array($("#from_dept_to").val(), $("#from_dept_to"))
                            )
                    {
                        $('#add_capa').attr("disabled", true);
                        loading.show();
                        form.submit();
                    }
                }
            });
        });
        //Load Document List In Datalist
        $(document).on("change", "#capa_from", function () {
            $('.capa_for_value_div,.capa_for_options_div,.sorurce_doc_no').val("").hide();
            $('.link_to_ref_doc').empty();
            if ($(this).val() !== "OTHERS") {
                x_get_qms_doc_no_list($(this).val().toLowerCase(), '', '', 'Accepted', 'Completed', 'Closed', function (result) {
                    ajax_respone_handler_set_dropdown(result, "#capa_for_options", '');
                    $('.capa_for_options_div').show();
                });
            } else {
                $('.capa_for_value_div,.sorurce_doc_no').val("").show().focus();
            }
        });
        //Show Document link If Selected From Datalist
        $(document).on("change", ".capa_for_options", function () {
            x_get_qms_doc_no("dms", $(this).val(), function (result) {
                $('.link_to_ref_doc').empty().append(result.doc_link);
            });
        });
    </script>
{/literal}
