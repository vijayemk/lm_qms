<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Upcoming Training </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Group Training</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        {if isset($sop_training_array)}
                                            <table class="table table-bordered table-striped" id="upcoming_training_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th >{attribute_name module="sop" attribute="training_date"}</th>
                                                        <th >{attribute_name module="sop" attribute="sop_no"}</th>
                                                        <th >{attribute_name module="sop" attribute="sop_name"}</th>
                                                        <th >{attribute_name module="sop" attribute="revision"}</th>
                                                        <th >{attribute_name module="sop" attribute="trainer"}</th>
                                                        <th >{attribute_name module="sop" attribute="department"}</th>
                                                        <th >{attribute_name module="sop" attribute="venue"}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {foreach name=list item=item key=key from=$sop_training_array} 
                                                        <tr >
                                                            <td >{$item.training_date}</td>
                                                            <td >{$item.sop_no}</td>
                                                            <td >{$item.sop_name}</td>
                                                            <td >{$item.sop_revision}</td>
                                                            <td >{$item.trainer_name}</td>
                                                            <td >{$item.trainer_dept}</td>
                                                            <td >{$item.venue}</td>
                                                        </tr>
                                                    {/foreach}
                                                </tbody>
                                            </table>
                                        {else}
                                            <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                                <div data-rel="scroll" >
                                                    <ul class="list-wrapper">
                                                        <li> 
                                                            <div class="menu-text vd_red"> <h2>No Upcoming Training</h2>
                                                            </div> 
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">                    
                    <div class="panel-heading vd_bg-dark-green">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Online Exam</a> </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="vd_content-section clearfix">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel widget">
                                        <div class="panel-body table-responsive">
                                            {if isset($sop_oe_array)}
                                                <table class="table table-bordered table-striped" id="upcoming_oe_data-tables">
                                                    <thead>
                                                        <tr>
                                                            <th >{attribute_name module="sop" attribute="sop_no"}</th>
                                                            <th>{attribute_name module="sop" attribute="assigned_by"}</th>
                                                            <th>{attribute_name module="sop" attribute="assigned_to"}</th>
                                                            <th>{attribute_name module="sop" attribute="assigned_date"}</th>
                                                            <th>{attribute_name module="sop" attribute="target_date"}</th>
                                                            <th>{attribute_name module="sop" attribute="attempt"}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {foreach name=list item=item key=key from=$sop_oe_array} 
                                                            <tr >
                                                                <td >{$item.sop_no}</td>
                                                                <td >{$item.assigned_by}</td>
                                                                <td >{$item.assigned_to}</td>
                                                                <td >{$item.assigned_date}</td>
                                                                <td >{$item.target_date}</td>
                                                                <td >{$item.attempt}</td>
                                                            </tr>
                                                        {/foreach}
                                                    </tbody>
                                                </table>
                                            {else}
                                                <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                                    <div data-rel="scroll" >
                                                        <ul class="list-wrapper">
                                                            <li> 
                                                                <div class="menu-text vd_red"> <h2>No Upcoming Online Exam</h2>
                                                                </div> 
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            {/if}
                                        </div>
                                    </div>
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
    <!-- Specific Page Scripts Put Here -->
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#upcoming_training_data-tables').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Upcoming Training Details List',

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
                        message: 'Upcoming Training Details List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
        } );
        $(document).ready(function() {
            $('#upcoming_oe_data-tables').dataTable( {
                pagingType: "full_numbers",
                mark:true,
                dom: 'Bfrtip',lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ], 
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        },download: 'open',
                        message: 'Upcoming Online Exam Details List',

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
                        message: 'Upcoming Online Exam Details List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
        } );
    </script>
{/literal}
