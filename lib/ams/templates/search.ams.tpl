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
            <li class="active">Search Audit</li>
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
                        <i class="icon-newspaper"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;">Search Audit </a>
                    </span>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form name="viewams-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="viewams-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="ams" attribute="am_type"}</label>
                                        <div class="controls">
                                            <select class="width-100 required" name="am_type" id="am_type" onchange = "get_subtype_list(this.options[this.selectedIndex].value);">
                                                <option value="">Select</option>
                                                <option value="All">All</option>
                                                {foreach name=list item=item key=key from=$amtypelist}
                                                    <option value="{$item.object_id}">{$item.type}</option>                                             
                                                {/foreach}
                                            </select>
                                        </div>
                                        <label class="control-label">{attribute_name module="ams" attribute="am_sub_type"}</label>
                                        <div class="controls">
                                            <select class="width-100 required"  name="am_sub_type" id="am_sub_type" onchange=search_ams();></select>
                                        </div>
                                    </div>  
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="ams" attribute="start_date"} </label>
                                        <div class="controls">
                                            <input type=text class="width-100 required" name="start_date" id="start_date" placeholder="DD/MM/YYYY">
                                        </div>
                                        <label class="control-label">{attribute_name module="ams" attribute="end_date"} </label>
                                        <div class="controls">
                                            <input type=text class="width-100 required" name="end_date" id="end_date" placeholder="DD/MM/YYYY">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <label class="control-label">{attribute_name module="ams" attribute="am_no"}</label>
                                        <div class="controls">
                                            <input type="text"  class="width-100 required" name="am_no"  id="am_no" onchange="search_ams();" list="ams_no_data_list">
                                            <datalist id="ams_no_data_list">
                                                {foreach name=list item=item key=key from=$ams_no_list_completion}
                                                    <option value="{$item}">{$item}</option>
                                                {/foreach}
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                <div class="col-sm-12"> <span class="menu-icon"><input type="button" id="search_button" name="search" value="Search" class="btn vd_btn vd_bg-green vd_white" onClick="search_ams();"></span> </div>
                            </div>
                        </form>          
                    </div>
                    <div class="panel-body" style="display:none" id="result_area">
                        <table id="search_ams_output_table" class="table table-bordered table-striped" width="100%"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{literal}
    <!-- Javascript =============================================== --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
    <!-- Specific Page Scripts Put Here -->
    <script>
        function search_ams() {
            var am_type_id = document.getElementById("am_type").value;
            var am_sub_type_id = document.getElementById("am_sub_type").value;
            var am_no = document.getElementById("am_no").value;
            var start_date = document.getElementById("start_date").value;
            var end_date = document.getElementById("end_date").value;

            if (am_type_id == "All") {
                var am_type_id = "All";
            } else if (am_type_id == "") {
                var am_type_id = "NA";
            } else {
                var am_type_id = am_type_id;
            }
            if (am_sub_type_id == "All") {
                var am_sub_type_id = "All";
            } else if (am_sub_type_id == "") {
                var am_sub_type_id = "NA";
            } else {
                var am_sub_type_id = am_sub_type_id;
            }

            if (am_no == "") {
                var am_no = "NA";
            }
            if (start_date == "") {
                var start_date = "NA";
            }
            if (end_date == "") {
                var end_date = "NA";
            }
            var status = "NA";
            x_search_ams(am_type_id, am_sub_type_id, am_no, start_date, end_date, status, list_ams);
        }

        function list_ams(result) {
            if (result == 0) {
                clear_table('search_ams_output_table');
                document.getElementById('result_area').style.display = "none";
                //alert("No Results Found");
            } else {
                clear_table('search_ams_output_table');
                document.getElementById('result_area').style.display = "block";
                start = 0;
                var dataSet = [];
                for (var y in result) {
                    var result_array = result[y];
                    if (result_array.object_id) {
                        start = start + 1;
                        dataSet.push([result_array.audit_no, result_array.plant_name, result_array.department, result_array.created_by, result_array.audit_type, result_array.audit_sub_type, result_array.audit_date_from, result_array.audit_date_to, result_array.audit_lead, result_array.status])
                    }
                }
                $(document).ready(function () {
                    $('#search_ams_output_table').dataTable({
                        destroy: true,
                        data: dataSet,
                        columns: [
                            {title: "Audit No."},
                            {title: "Plant Name"},
                            {title: "Department"},
                            {title: "Initiator"},
                            {title: "Type"},
                            {title: "Sub Type"},
                            {title: "Audit Date (From)"},
                            {title: "Audit Date (To)"},
                            {title: "Audit Lead"},
                            {title: "Status"}
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
                                message: 'Audit List'

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
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                message: 'Audit List'
                            },
                            {
                                extend: 'colvis',
                                postfixButtons: ['colvisRestore']
                            }

                        ]
                    });
                });
            }
        }

        function clear_table(tab_name) {
            var table_obj = document.getElementById(tab_name);
            for (i = table_obj.rows.length; i > 1; i--) {
                var row_ind = table_obj.rows[1].rowIndex;
                table_obj.deleteRow(row_ind);
            }
        }

        function get_subtype_list(value) {
            search_ams();
            x_get_all_sub_type_list(value, list_subtype); //Call SAJAX JavaScript... Pass Department id as value and name of the function which is going to handle the reply 
        }

        function list_subtype(type) {
            var sub_type_obj = document.getElementById("am_sub_type");
            for (i = sub_type_obj.length; sub_type_obj.length > 0; i--) { // Remove Existing Options
                sub_type_obj.remove(i);
            }
            var addy = document.createElement('option');
            addy.text = "Select";
            addy.value = "";
            try {
                sub_type_obj.add(addy, null);
            } catch (ex)
            {
                sub_type_obj.add(addy);
            }
            for (var y in type) {
                var type_array = type[y]           //Taking each value from array
                var addy = document.createElement('option'); //Insert the values in to select box
                addy.id = type_array.object_id;
                addy.text = type_array.sub_type;
                addy.value = type_array.object_id;
                try {
                    sub_type_obj.add(addy, null); // standards compliant
                } catch (ex) {
                    sub_type_obj.add(addy); // IE only
                }
            }
        }

        $(window).load(function () {
            "use strict";
            $("#start_date").datepicker({showMonthAfterYear: true, changemonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
            $("#end_date").datepicker({showMonthAfterYear: true, changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
        });
    </script>
{/literal}
