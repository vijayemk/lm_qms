<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link href="vendors/custom_lm/htmldiff/htmldiff_custom.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Audit Trail</li>
            <li class="active">Deviation Management System (DMS)</li>
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
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                    <span class="panel-title h4"> 
                        <i class="fa fa-fw fa-life-ring"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">Deviation Management System (DMS) - Audit Trail </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in widget attach_loading">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label">{attribute_name module="audit" attribute="audit_section"} <span class="vd_red">*</span></label>
                                <div class="controls">
                                    <select class="search_audit_trail query show_dms_no">
                                        <option value="">All</option>
                                        <optgroup label="Master Data">     
                                            <option value="dms_master_related_to_audit_trail">DMS Related To</option>
                                            <option value="dms_master_sub_related_to_audit_trail">DMS Sub Related To</option>
                                            <option value="dms_master_target_date_expiry_audit_trail">DMS Target Date Expiry</option>
                                            <option value="dms_master_exam_pass_mark_audit_trail">DMS Exam Pass Mark</option>
                                            <option value="dms_master_exam_attempt_limit_audit_trail">DMS Exam Attempt Limit</option>
                                            <option value="dms_master_monitoring_limit_audit_trail">DMS Monitioring Limit</option>
                                        </optgroup> 
                                        <optgroup label="Work Flow">
                                            <option value="dms_wf_audit_trail">DMS Workflow</option>
                                        </optgroup>
                                    </select>
                                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="year"}</label>
                                <div class="controls">
                                    <select class="search_audit_trail year" >
                                        <option value="">All</option>
                                        {foreach name=list item=item key=key from=$year_range}
                                            <option value="{$item}">{$item}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label">{attribute_name module="audit" attribute="month"}</label>
                                <div class="controls">
                                    <select class="search_audit_trail month" >
                                        <option value="">All</option>
                                        {foreach name=list item=item key=key from=$month_range}
                                            <option value="{$key}">{$item}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 pd-0">
                                <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                <div class="controls">
                                    <select class="plant search_audit_trail show_dms_no">
                                        <option value="">All</option>
                                        {foreach name=list item=item key=key from=$plantlist}
                                            <option value="{$item.plant_id}">{$item.plant_name}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"> {attribute_name module="dms" attribute="department"}</label>
                                <div class="controls">
                                    <select class="dept search_audit_trail show_dms_no">
                                        <option value="">All</option>
                                        {foreach name=list item=item key=key from=$dept_list}
                                            <option value="{$item.dropdwon_value}">{$item.drop_down_option}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="control-label"> {attribute_name module="dms" attribute="user_name"}</label>
                                <div class="controls">
                                    <select class="user search_audit_trail">All</select>
                                </div>
                            </div>
                            <div class="col-md-2 pd-0">
                                <label class="control-label">{attribute_name module="audit" attribute="dm_name"}</label>
                                <div class="controls">
                                    <select class="search_audit_trail refrence_object_id dm_no" disabled></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">{attribute_name module="audit" attribute="date"} From</label>
                                <div class="controls">
                                    <input type="text" class="generate_datepicker search_audit_trail from_date" placeholder="YYYY/MM/DD" data-datepicker_min=-365 data-datepicker_max=0 value="{$def_start_date}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">{attribute_name module="audit" attribute="date"} To</label>
                                <div class="controls">
                                    <input type="text" name='to_date' class="generate_datepicker to_date search_audit_trail" placeholder="YYYY/MM/DD" data-datepicker_min=-365 data-datepicker_max=0 value="{$def_end_date}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body audit_trail_result found_records" style="display: none;"> 
                        <table   class="table table-bordered table-striped audit_trail_result_table generate_datatable" title="Audit trail" data-whitespace="pre-wrap" data-sort_column=1>
                            <thead>
                                <tr>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="sl_no"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="date"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="user_name"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="ip_address"}</th>
                                    <th class="col-md-2">{attribute_name module="audit" attribute="action"} </th>
                                    <th class="col-md-3">{attribute_name module="audit" attribute="new_value"}</th>
                                    <th class="col-md-3">{attribute_name module="audit" attribute="old_value"}</th>
                                    <th class="col-md-1">{attribute_name module="audit" attribute="status"}</th>
                                </tr>
                            </thead>
                            <tbody ></tbody>
                        </table>
                    </div>

                    <div class="panel-body audit_trail_result no_records" style="display: none;"> 
                        <div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>No Records Found!</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on("change", ".plant", (e) => get_dept_list($(e.target).val(), '.dept', '', '', 'All'));
            $(document).on("change", ".dept", (e) => get_dept_users($(e.target).val().split("-")[1], '.user', '', '', 'All'));
            $(document).on("change", ".query,.show_dms_no", function () {
                loading.show();
                if ($(".query").val() !== "dms_wf_audit_trail") {
                    $(".dm_no").val("").attr("disabled", true);
                } else {
                    $(".dm_no").val("").removeAttr("disabled");

                    let plant = ($(".plant").val()) ?? '';
                    let dept = ($(".dept").val().split("-")[1]) ?? '';

                    x_get_qms_doc_no_list("dms", plant, dept, function (result) {
                        $(".dm_no").empty();
                        let writter = '<option value="">All</option>';
                        $.each(result, function (key, val) {
                            writter += `<option value=${val.drop_down_value}>${val.drop_down_option}</option>`;
                        });
                        // $(".dm_no").focus();
                        $(".dm_no").append(writter);
                    });
                }
                loading.hide();
            });
        });
    </script>
{/literal}
