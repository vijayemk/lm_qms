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
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Search </li>
            <li class="active">Search  Deviation</li>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">Search Deviation </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row mgbt-md-10">
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                    <div class="controls">
                                        <select class="plant search_dms show_dms_no">
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
                                        <select class="dept search_dms show_dms_no">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$dept_list}
                                                <option value="{$item.dropdwon_value}">{$item.drop_down_option}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"> {attribute_name module="dms" attribute="user_name"}</label>
                                    <div class="controls">
                                        <select class="created_by search_dms">All</select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="controls">
                                        <label class="control-label">{attribute_name module="dms" attribute="dm_no"}</label>
                                        <div class="controls">
                                            <input type="text" class="dm_no search_dms" list="dms_no_data_list">
                                            <datalist id="dms_no_data_list" class="dm_no">
                                                {foreach name=list item=item key=key from=$dms_list}
                                                    <option value="{$item.drop_down_option}"></option>
                                                {/foreach}
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="start_date"} </label>
                                    <div class="controls">
                                        <input type=text class="required generate_datepicker date_changed start_date search_dms" data-datepicker=0>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="end_date"} </label>
                                    <div class="controls">
                                        <input type=text class="required generate_datepicker end_date search_dms" data-datepicker=0>
                                    </div>
                                </div> 
                            </div>
                            <div class="row mgbt-md-10">
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="type"}</label>
                                    <div class="controls">
                                        <select class="dm_type search_dms">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$dev_type_list}
                                                <option value="{$item.object_id}">{$item.type}</option>
                                            {/foreach}
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="classification"}</label>
                                    <div class="controls">
                                        <select class="classification search_dms">
                                            <option value="">All</option>
                                            {foreach item=item key=key from=$classification_list}
                                                <option value="{$item.object_id}">{$item.short_name}</option>
                                            {/foreach}
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="approval_status"}</label>
                                    <div class="controls">
                                        <select class="appr_status search_dms">
                                            <option value="">All</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Accepted">Accepted</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="wf_status"}</label>
                                    <div class="controls">
                                        <select class="wf_status search_dms">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$wf_status}
                                                <option value="{$key}">{$key}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="status"}</label>
                                    <div class="controls">
                                        <select class="search_dms" id="status">
                                            <option value="">All</option>
                                            <option value="Open">Open</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="material_type"}</label>
                                    <div class="controls">
                                        <select class="mat_type search_dms">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$material_type_list}
                                                <option value="{$item.object_id}">{$item.material_type}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="processing_stage"}</label>
                                    <div class="controls">
                                        <select class="pro_stage search_dms">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$process_stage_list}
                                                <option value="{$item.object_id}">{$item.process_stage}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="dms" attribute="product_name"}</label>
                                    <div class="controls">
                                        <select class="pro_name search_dms">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$productlist}
                                                <option value="{$item.object_id}">{$item.product_name}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions-condensed row mgbt-xs-0 mgtp-0">
                            <span class="result_area font-semibold" style="display:none;">(Found <span class="label label-danger result_count">0</span> Devaition)</span>
                            <button class="btn vd_bg-green vd_white search_dms_btn pull-right mgl-10"><span class="menu-icon search_dms"><i class="fa fa-fw fa-search"></i></span> Search</button>
                            <button class="btn vd_bg-red vd_white page_reload pull-right" type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                        </div>
                    </div>
                    <div class="panel-body result_area" style="display: none;">
                        <table class="table table-bordered table-striped generate_datatable search_result_table" title="Search DMS" data-whitespace="nowrap">
                            <thead>
                                <tr>
                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                    <th>{attribute_name module="dms" attribute="dm_no"}</th>
                                    <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                    <th>{attribute_name module="dms" attribute="department"}</th>
                                    <th>{attribute_name module="dms" attribute="initiator"}</th>
                                    <th>{attribute_name module="dms" attribute="classification"}</th>
                                    <th>{attribute_name module="dms" attribute="date_of_occurrence"}</th>
                                    <th>{attribute_name module="dms" attribute="date_of_discovery"}</th>
                                    <th>{attribute_name module="dms" attribute="reporting_date"}</th>
                                    <th>{attribute_name module="dms" attribute="target_date"}</th>
                                    <th>{attribute_name module="dms" attribute="close_out_date"}</th>
                                    <th>{attribute_name module="dms" attribute="completed_date"}</th>
                                    <th>{attribute_name module="dms" attribute="approval_status"}</th>
                                    <th>{attribute_name module="dms" attribute="wf_status"}</th>
                                    <th>{attribute_name module="dms" attribute="status"}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
            $(document).on("change", ".dept", (e) => get_dept_users($(e.target).val().split("-")[1], '.created_by', '', '', 'All'));
            $(document).on("change", ".show_dms_no", function () {
                loading.show();
                let plant = ($(".plant").val()) ?? '';
                let dept = ($(".dept").val().split("-")[1]) ?? '';

                x_get_qms_doc_no_list("dms", plant, dept, function (result) {
                    $(".dm_no").empty();
                    let writter = '';
                    $.each(result, function (key, val) {
                        writter += `<option value=${val.drop_down_option}>${val.drop_down_option}</option>`;
                    });
                    // $(".dm_no").focus();
                    $(".dm_no").append(writter);
                });
                loading.hide();
            });

            $(document).on("click", ".search_dms_btn", function () {
                var params = {
                    dept: $(".dept").val().split("-")[1],
                    created_by: $(".created_by").val(),
                    start_date: $(".start_date").val(),
                    end_date: $(".end_date").val(),
                    org: $(".org").val(),
                    plant: $(".plant").val(),
                    mat_type: $(".mat_type").val(),
                    pro_name: $(".pro_name").val(),
                    dm_no: ($(".dm_no").val() === "All") ? '' : $(".dm_no").val(),
                    appr_status: $(".appr_status").val(),
                    wf_status: $(".wf_status").val(),
                    status: $("#status").val(),
                    pro_stage: $(".pro_stage").val(),
                    classification: $(".classification").val(),
                    dm_type: $(".dm_type").val()
                };
                lm_dom.append_search_icon(".search_dms");
                loading.show(this);
                x_search_dms(JSON.stringify(params), function (result) {

                    let table = ($.fn.dataTable.isDataTable('.search_result_table')) ? $('.search_result_table').DataTable() : null;
                    if (typeof result === 'object') {
                        table.clear().draw();
                        $('.result_area').show();
                        $.each(result, function (key, val) {
                            table.row.add([key + 1, val['doc_link'], val['plant_name'], val['dm_department_name'], val['created_by_name'], val['classification_name'], val['date_of_occurrence'], val['date_of_discovery'], val['reporting_date'], val['target_date'], val['close_out_date'], val['completed_date'], val['approval_status'], val['wf_status'], val['status']]).draw(true);
                        });
                        $('.no_records').hide();
                        loading.hide(".search_dms");
                        $(".result_count").html(Object.keys(result).length);
                        return;
                    }
                    loading.hide(".search_dms");
                    $('.result_area').hide();
                    $('.no_records').show();
                });
            });
        });

    </script>
{/literal}
