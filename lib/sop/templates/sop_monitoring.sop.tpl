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
            <li class="active">Monitoring </li>
            <li class="active">SOP </li>
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
                        <form name="viewsop" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="viewsop-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="admin" attribute="plant_name"}</label>
                                        <div class="controls">
                                            <select class="width-100"  name="plant_id" id="plant_id" onchange = "get_plant_dept_users(this.options[this.selectedIndex].value);
                                                    search_sop();">
                                                <option value="">All</option>
                                                {foreach name=list item=item key=key from=$plant_list}
                                                    <option value="{$item.plant_id}">{$item.short_name} - [{$item.plant_name}]</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="audit" attribute="department"}</label>
                                        <div class="controls">
                                            <select class="width-100"  name="dept_id" id="dept_id" onchange = get_users(this.options[this.selectedIndex].value);>
                                                <option value="">All</option>
                                                {foreach name=list item=item key=key from=$deptlist}
                                                    <option value="{$key}">{$item}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">{attribute_name module="audit" attribute="user_name"}</label>
                                        <div class="controls">
                                            <select class="width-100"  name="dept_user_id" id="dept_user_id" onchange="search_sop();">
                                                <option value="">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">{attribute_name module="sop" attribute="is_active"}</label>
                                        <div class="controls">
                                            <select class="width-100" name="is_active"  id="is_active" onchange=search_sop();>
                                                <option value="">All</option>
                                                <option value="yes" selected>Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">{attribute_name module="sop" attribute="level"}</label>
                                        <div class="controls">
                                            <select class="width-100" name="level"  id="level" onchange=search_sop();>
                                                <option value="">All</option>
                                                <option value="1">Level1</option>
                                                <option value="2">Level2</option>
                                                <option value="3">Level3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                <div class="col-sm-12"> <span class="menu-icon"><input type="button" id="search_button" name="search" value="Search" class="btn vd_btn vd_bg-green vd_white" onClick="search_sop();"></span> </div>
                            </div>
                        </form>          
                    </div>
                    <div class="panel-body" style="display:none" id="result_area">
                        <table id="search_sop_monitoring_output_table" class="table table-bordered table-striped" width="100%"></table>
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
        function get_users(value) {
            search_sop();
            x_get_all_dept_users(value, list_users);
        }
        function get_plant_dept_users(value) {
            search_sop();
            if (value != '') {
                x_getPlantDeptList(value, list_dept);
            } else {
                x_getAllDeptList(list_dept);
            }
            x_get_plant_users(value, list_users);
        }
        function search_sop() {
            var plant_id = $('#plant_id').val();
            var dept_id = $('#dept_id').val();
            var dept_user_id = $('#dept_user_id').val();
            var is_active = $('#is_active').val();
            var level = $('#level').val();
            x_search_sop_monitoring_details('', plant_id, dept_id, dept_user_id, level, is_active, list_sop);
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
                        dataSet.push([result_array.sop_no, result_array.sop_type, result_array.sop_name, result_array.revision, result_array.supersedes, result_array.effective_date, result_array.expiry_date, result_array.resp_per, result_array.resp_per_plant, result_array.resp_per_dept, result_array.level, result_array.is_active, result_array.pub_status])
                    }
                }
                $(document).ready(function () {
                    $('#search_sop_monitoring_output_table').dataTable({
                        destroy: true,
                        data: dataSet,
                        columns: [
                            {title: "SOP No"},
                            {title: "SOP Type"},
                            {title: "SOP Name"},
                            {title: "Revision"},
                            {title: "Supersedes"},
                            {title: "Effective Date"},
                            {title: "Expiry Date"},
                            {title: "Resp Person"},
                            {title: "Plant"},
                            {title: "Department"},
                            {title: "Level"},
                            {title: "Is Active"},
                            {title: "Published Status"}
                        ],
                        pagingType: "full_numbers",
                        mark: true,
                        dom: 'Bfrtip', lengthMenu: [
                            [10, 25, 50, -1],
                            ['10 rows', '25 rows', '50 rows', 'Show all']
                        ],
                        buttons: [
                            'pageLength',
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: {
                                    columns: ':visible'
                                }, download: 'open',
                                message: 'SOP Monitoring List',

                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                },
                            },
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible',
                                },
                            },
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                },
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                message: 'SOP Monitoring List',
                            },
                            {
                                extend: 'colvis',
                                postfixButtons: ['colvisRestore']
                            }

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
        function list_users(users) {
            var dept_users_obj = document.getElementById("dept_user_id");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            var addy = document.createElement('option');
            addy.text = "All";
            addy.value = "";
            try {
                dept_users_obj.add(addy, null);
            } catch (ex)
            {
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
        function list_dept(dept) {
            var dept_dept_obj = document.getElementById("dept_id");
            for (i = dept_dept_obj.length; dept_dept_obj.length > 0; i--) {
                dept_dept_obj.remove(i)
            }
            var addy = document.createElement('option');
            addy.text = "All";
            addy.value = "";
            try {
                dept_dept_obj.add(addy, null);
            } catch (ex)
            {
                dept_dept_obj.add(addy);
            }
            for (var y in dept) {
                var dept_array = dept[y]
                var addy = document.createElement('option');
                addy.id = dept_array.department_id
                addy.text = dept_array.department
                addy.value = dept_array.department_id
                try {
                    dept_dept_obj.add(addy, null);
                } catch (ex) {
                    dept_dept_obj.add(addy);
                }
            }
        }
    </script>
{/literal}
