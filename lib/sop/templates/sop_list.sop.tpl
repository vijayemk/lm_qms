<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">List of SOP </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> SOP List </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <form name="sop_list" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="sop_list-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                <select class="width-100" name="sop_type" id="sop_type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                    <option value="">All SOP Type</option>
                                                    {foreach name=list item=item key=key from=$soptypelist}
                                                        <option value="{$item->object_id}" {if $sop_type_id eq $item->object_id} selected {/if}>{$item->type}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                <select class="width-100" name="sop_plant" id="sop_plant" onchange = addList('plant',this.options[this.selectedIndex].value); required title="Select Valid Company">
                                                    {foreach name=list item=item key=key from=$plant_list}
                                                        <option value="{$item.plant_id}" {if $usr_plant_id eq $item.plant_id} selected {/if}>{$item.plant_name}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                <select class="width-100" name="published_status" id="published_status" onchange = addList('status',this.options[this.selectedIndex].value); required title="Select Valid Published Status">
                                                    <option value="">All</option>
                                                    {foreach name=list item=item key=key from=$published_status}
                                                        <option value="{$item}" {if $pub_status eq $item} selected {/if}>{$item}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label  col-sm-3">Count </label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-9">
                                                <input type="text" placeholder="Sop Count" class="width-80 required" name="sop_count" value="{$sop_count}" readonly title="SOP Count">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    {if !empty($sop_list)}
                                        <table class="table table-bordered table-striped" id="sop_list_data-tables">
                                            <thead>
                                                <tr>
                                                    <th>SOP No</th>
                                                    <th>SOP Type</th>
                                                    <th>SOP Name</th>
                                                    <th>Revision</th>
                                                    <th>Supersedes</th>
                                                    <th>Effective Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Is Latest Revision</th>
                                                    <th>Published Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach name=list item=item key=key from=$sop_list} 
                                                    <tr >
                                                        <td >{$item.sop_no}</td>
                                                        <td >{$item.sop_type}</td>
                                                        <td >{$item.sop_name}</td>
                                                        <td >{$item.revision}</td>
                                                        <td >{$item.supersedes}</td>
                                                        <td >{$item.effective_date}</td>
                                                        <td >{$item.expiry_date}</td>
                                                        <td >{$item.is_latest_revision}</td>
                                                        <td >{$item.status}</td>
                                                    </tr>
                                                {/foreach}
                                            </tbody>
                                        </table>
                                    {else}
                                        <div class="alert alert-danger alert-dismissable alert-condensed">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                            <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
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

{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sop_list_data-tables').dataTable({
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
                        orientation: 'portrait',
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
    </script>
    <script type="text/javascript">
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
    </script>
{/literal}
