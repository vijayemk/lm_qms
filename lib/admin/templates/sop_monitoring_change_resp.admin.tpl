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
            <li class="active">Administration </li>
            <li class="active">Setings </li>
            <li class="active">SOP Data </li>
            <li class="active">Monitoring Responsibility</li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Change Responsibility </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form name="resp_to_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="resp_to_form">
                            <div class="row"><h2><span class="font-semibold text-success">Replace From</span></h2>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                        <div class="controls">
                                            <select class="width-100"  name="rf_plant_id" id="rf_plant_id" onchange = "get_rf_plant_dept(this.options[this.selectedIndex].value)"; title="Select Valid Plant">
                                                <option value="">Select</option>
                                                {foreach name=list item=item key=key from=$plant_list}
                                                    <option value="{$item.plant_id}">{$item.short_name} - [{$item.plant_name}]</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="audit" attribute="department"} <span class="vd_red">*</span></label>
                                        <div class="controls">
                                            <select class="width-100"  name="rf_dept_id" id="rf_dept_id" onchange = get_rf_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="audit" attribute="user_name"} <span class="vd_red">*</span></label>
                                        <div class="controls">
                                            <select class="width-100"  name="rf_dept_user_id" id="rf_dept_user_id" onchange="search_sop();" title="Select Valid User">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="sop" attribute="level"}</label>
                                        <div class="controls">
                                            <select class="width-100" name="rf_level" id="rf_level" onchange="search_sop();">
                                                <option value="">Select</option>
                                                <option value="1">Level1</option>
                                                <option value="2">Level2</option>
                                                <option value="3">Level3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="row"><h2><span class="font-semibold text-success">Replace To</span></h2>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <label class="control-label">{attribute_name module="admin" attribute="plant_name"} <span class="vd_red">*</span></label>
                                        <div class="controls">
                                            <select class="width-100"  name="rt_plant_id" id="rt_plant_id" onchange = "get_rt_plant_dept_users(this.options[this.selectedIndex].value)"; disabled title="Select Valid Plant">
                                                <option value="">Select</option>
                                                {foreach name=list item=item key=key from=$plant_list}
                                                    <option value="{$item.plant_id}">{$item.short_name} - [{$item.plant_name}]</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">{attribute_name module="audit" attribute="department"} <span class="vd_red">*</span></label>
                                        <div class="controls">
                                            <select class="width-100"  name="rt_dept_id" id="rt_dept_id" onchange = get_rt_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">{attribute_name module="audit" attribute="user_name"} <span class="vd_red">*</span></label>
                                        <div class="controls">
                                            <select class="width-100"  name="rt_dept_user_id" id="rt_dept_user_id" title="Select Valid User">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="panel-body" style="display:none" id="result_area">
                                    <table id="search_sop_monitoring_output_table" class="table table-bordered table-striped" width="100%"></table>
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-md-6 mgbt-xs-10 mgtp-20">
                                            <div class="mgtp-10">
                                                <button class="btn vd_bg-green vd_white" type="submit"  name="save_rt" id="save_rt">Save</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mgbt-xs-5"> </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{literal}
    <!-- Javascript =============================================== --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script>
        $(document).ready(function () {
            $('#rt_dept_user_id').on('change', function () {
                if (this.value == $('#rf_dept_user_id').val()) {
                    alert("Select Different User");
                    $('#rt_dept_user_id').val('')
                }
            });
        });
        function get_rf_plant_dept(value) {
            x_getPlantDeptList(value, function (data) {
                $('#rt_plant_id').val(value);

                $('#rf_dept_user_id').empty();
                $('#rf_dept_user_id').append(new Option("Select", ""));
                $('#rt_dept_user_id').empty();
                $('#rt_dept_user_id').append(new Option("Select", ""));

                $('#rf_dept_id').empty();
                $('#rf_dept_id').append(new Option("Select", ""));
                $.each(data, function (index, value) {
                    $('#rf_dept_id').append(new Option(value.department, value.department_id));
                });
                $('#rt_dept_id').empty();
                $('#rt_dept_id').append(new Option("Select", ""));
                $.each(data, function (index, value) {
                    $('#rt_dept_id').append(new Option(value.department, value.department_id));
                });
            });
        }
        function get_rf_users(value) {
            x_get_all_dept_users(value, function (data) {
                $('#rf_dept_user_id').empty();
                $('#rf_dept_user_id').append(new Option("Select", ""));
                $.each(data, function (index, value) {
                    $('#rf_dept_user_id').append(new Option(value.user_name, value.user_id));
                });
            });
        }
        function get_rt_users(value) {
            x_get_all_dept_users(value, function (data) {
                $('#rt_dept_user_id').empty();
                $('#rt_dept_user_id').append(new Option("Select", ""));
                $.each(data, function (index, value) {
                    $('#rt_dept_user_id').append(new Option(value.user_name, value.user_id));
                });
            });
        }
        function search_sop() {
            var plant_id = $('#rf_plant_id').val();
            var dept_id = $('#rf_dept_id').val();
            var dept_user_id = $('#rf_dept_user_id').val();
            var level = $('#rf_level').val();
            x_search_sop_monitoring_details('', plant_id, dept_id, dept_user_id, level, 'yes', list_sop);
        }
        function list_sop(result) {
            if (result == 0) {
                clear_table('search_sop_monitoring_output_table')
                document.getElementById('result_area').style.display = "none";
                //alert("Records Not Found");
            } else {
                clear_table('search_sop_monitoring_output_table');
                document.getElementById('result_area').style.display = "block";
                start = 0;
                var dataSet = [];
                for (var y in result) {
                    var result_array = result[y]
                    if (result_array.sop_object_id) {
                        start = start + 1;
                        var select_sop = "<input type='checkbox' align='center' name='rt_monitoring_id[]' value='" + result_array.object_id + "'>";
                        dataSet.push([result_array.sop_no, result_array.sop_name, result_array.revision, result_array.resp_per, result_array.level, result_array.is_active, result_array.pub_status, select_sop])
                    }
                }
                $(document).ready(function () {
                    $('#search_sop_monitoring_output_table').dataTable({
                        destroy: true,
                        "paging": false,
                        "searching": false,
                        "bInfo": false,
                        data: dataSet,
                        columns: [
                            {title: "SOP No"},
                            {title: "SOP Name"},
                            {title: "Revision"},
                            {title: "Resp Person"},
                            {title: "Level"},
                            {title: "Is Active"},
                            {title: "Published Status"},
                            {title: "Select"}
                        ],
                    });
                });
            }
        }
        function clear_table(tab_name) {
            var table_obj = document.getElementById(tab_name);
            for (i = table_obj.rows.length; i > 1; i--) {
                var row_ind = table_obj.rows[1].rowIndex
                table_obj.deleteRow(row_ind)
            }
        }
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#resp_to_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    rf_plant_id: {
                        required: true
                    },
                    rf_dept_id: {
                        required: true
                    },
                    rf_dept_user_id: {
                        required: true
                    },
                    rt_plant_id: {
                        required: true
                    },
                    rt_dept_id: {
                        required: true,
                    },
                    rt_dept_user_id: {
                        required: true
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#save_rt').attr("disabled", true);
                    form.submit();
                },

            });
        });

    </script>
{/literal}
