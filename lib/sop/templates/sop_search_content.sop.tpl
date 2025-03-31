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
            <li class="active">Search By Content</li>
            <li >SOP</li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Content Search [SOP] </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <label class="control-label">{attribute_name module="sop" attribute="keyword"}</label>
                            <div class="controls">
                                <input type="text" class="width-100 required" name="keyword"  id="keyword"  onkeydown="search_sop();" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table id="search_sop_output_table" class="table table-bordered table-striped" width="100%"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{literal}
    <!-- Javascript =============================================== --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Specific Page Scripts Put Here -->
    <script>
        $("#keyword").keyup(function () {
            x_search_sop_by_content($("#keyword").val(), list_sop);
        });
        function list_sop(result) {
            if (result == 0) {
                $("#search_sop_output_table").empty();
            } else {
                $("#search_sop_output_table").empty();
                start = 0;
                var dataSet = [];
                for (var y in result) {
                    var result_array = result[y]
                    if (result_array.sop_object_id) {
                        start = start + 1;
                        dataSet.push([result_array.sop_no, result_array.sop_type, result_array.sop_name, result_array.revision, result_array.supersedes, result_array.effective_date, result_array.expiry_date, result_array.is_latest_revision, result_array.status])
                    }
                }
                $(document).ready(function () {
                    $('#search_sop_output_table').dataTable({
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
                            {title: "Is Latest Revision"},
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
                                message: 'SOP List',

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
                                message: 'SOP List',
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
    </script>
{/literal}
