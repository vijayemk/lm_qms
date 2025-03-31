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
            <li class="active">Search CAPA</li>
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
                        <i class="fa fa-fw fa-delicious"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">Search CAPA </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row mgbt-md-10">
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                    <div class="controls">
                                        <select class="plant search_capa show_capa_no">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$plantlist}
                                                <option value="{$item.plant_id}">{$item.plant_name}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"> {attribute_name module="capa" attribute="department"}</label>
                                    <div class="controls">
                                        <select class="dept search_capa show_capa_no">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$dept_list}
                                                <option value="{$item.dropdwon_value}">{$item.drop_down_option}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"> {attribute_name module="capa" attribute="user_name"}</label>
                                    <div class="controls">
                                        <select class="created_by search_capa">All</select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="controls">
                                        <label class="control-label">{attribute_name module="capa" attribute="capa_no"}</label>
                                        <div class="controls">
                                            <input type="text" class="capa_no search_capa" list="capa_no_data_list">
                                            <datalist id="capa_no_data_list" class="capa_no">
                                                {foreach name=list item=item key=key from=$capa_list}
                                                    <option value="{$item.drop_down_option}"></option>
                                                {/foreach}
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="capa" attribute="start_date"} </label>
                                    <div class="controls">
                                        <input type=text class="required generate_datepicker date_changed start_date search_capa" data-datepicker=0>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="capa" attribute="end_date"} </label>
                                    <div class="controls">
                                        <input type=text class="required generate_datepicker end_date search_capa" data-datepicker=0>
                                    </div>
                                </div> 
                            </div>
                            <div class="row mgbt-md-10">
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="capa" attribute="approval_status"}</label>
                                    <div class="controls">
                                        <select class="appr_status search_capa">
                                            <option value="">All</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Accepted">Accepted</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="capa" attribute="wf_status"}</label>
                                    <div class="controls">
                                        <select class="wf_status search_capa">
                                            <option value="">All</option>
                                            {foreach name=list item=item key=key from=$wf_status}
                                                <option value="{$key}">{$key}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="capa" attribute="status"}</label>
                                    <div class="controls">
                                        <select class="search_capa" id="status">
                                            <option value="">All</option>
                                            <option value="Open">Open</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions-condensed row mgbt-xs-0 mgtp-0">
                            <span class="result_area font-semibold" style="display:none;">(Found <span class="label label-danger result_count">0</span> CAPA)</span>
                            <button class="btn vd_bg-green vd_white search_capa_btn  pull-right mgl-10"><span class="menu-icon search_capa"><i class="fa fa-fw fa-search"></i></span> Search</button>
                            <button class="btn vd_bg-red vd_white page_reload  pull-right" type="button"><span class="menu-icon"><i class="fa fa-fw fa-refresh"></i></span> Refresh</button>
                        </div>
                    </div>
                    <div class="panel-body result_area" style="display: none;">
                        <table class="table table-bordered table-striped generate_datatable search_result_table" title="Search CAPA" data-whitespace="nowrap">
                            <thead>
                                <tr>
                                    <th>{attribute_name module="admin" attribute="sl_no"}</th>
                                    <th>{attribute_name module="capa" attribute="capa_no"}</th>
                                    <th>{attribute_name module="admin" attribute="plant_name"}</th>
                                    <th>{attribute_name module="capa" attribute="department"}</th>
                                    <th>{attribute_name module="capa" attribute="created_by"}</th>
                                    <th>{attribute_name module="capa" attribute="target_date"}</th>
                                    <th>{attribute_name module="capa" attribute="close_out_date"}</th>
                                    <th>{attribute_name module="capa" attribute="completed_date"}</th>
                                    <th>{attribute_name module="capa" attribute="approval_status"}</th>
                                    <th>{attribute_name module="capa" attribute="wf_status"}</th>
                                    <th>{attribute_name module="capa" attribute="status"}</th>
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
            $(document).on("change", ".show_capa_no", function () {
                loading.show();
                let plant = ($(".plant").val()) ?? '';
                let dept = ($(".dept").val().split("-")[1]) ?? '';

                x_get_qms_doc_no_list("capa", plant, dept, function (result) {
                    $(".capa_no").empty();
                    let writter = '';
                    $.each(result, function (key, val) {
                        writter += `<option value=${val.drop_down_option}>${val.drop_down_option}</option>`;
                    });
                    // $(".capa_no").focus();
                    $(".capa_no").append(writter);
                });
                loading.hide();
            });

            $(document).on("click", ".search_capa_btn", function () {
                var params = {
                    dept: $(".dept").val().split("-")[1],
                    created_by: $(".created_by").val(),
                    start_date: $(".start_date").val(),
                    end_date: $(".end_date").val(),
                    org: $(".org").val(),
                    plant: $(".plant").val(),
                    mat_type: $(".mat_type").val(),
                    pro_name: $(".pro_name").val(),
                    capa_no: ($(".capa_no").val() === "All") ? '' : $(".capa_no").val(),
                    appr_status: $(".appr_status").val(),
                    wf_status: $(".wf_status").val(),
                    status: $("#status").val(),
                    pro_stage: $(".pro_stage").val(),
                    classification: $(".classification").val(),
                    capa_type: $(".capa_type").val()
                };
                lm_dom.append_search_icon(".search_capa");
                loading.show(this);
                x_search_capa(JSON.stringify(params), function (result) {
                    let table = ($.fn.dataTable.isDataTable('.search_result_table')) ? $('.search_result_table').DataTable() : null;
                    if (typeof result === 'object') {
                        table.clear().draw();
                        $('.result_area').show();
                        $.each(result, function (key, val) {
                            table.row.add([key + 1, val['doc_link'], val['plant_name'], val['capa_department_name'], val['created_by_name'], val['target_date'], val['close_out_date'], val['completed_date'], val['approval_status'], val['wf_status'], val['status']]).draw(true);
                        });
                        $('.no_records').hide();
                        loading.hide(".search_capa");
                        $(".result_count").html(Object.keys(result).length);
                        return;
                    }
                    loading.hide(".search_capa");
                    $('.result_area').hide();
                    $('.no_records').show();
                });
            });
        });

    </script>
{/literal}
