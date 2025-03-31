<script>
    {include file="templates/insert_sajax.tpl"}
</script>
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
{literal}
    <script language="javascript">
        function reload_page() {
            setTimeout("location.reload(true);", 1500);
        }
    </script>
{/literal}

<form class="form-horizontal" action="{$smarty.server.REQUEST_URI}" role="form" name="default_dashboard" method="post">
    <div class="vd_head-section clearfix">
        <div class="vd_panel-header">
            <ul class="breadcrumb">
                <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
                <li class="active">Dashboard</li>
            </ul>
            <div class="vd_panel-menu hidden-sm hidden-xs"
                data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both."
                data-step=5 data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle"
                    data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i
                        class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip"
                    data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle"
                    data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i
                        class="glyphicon glyphicon-fullscreen"></i> </div>
            </div>
        </div>
    </div>

    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-sm-5">
                <div class="panel widget">
                    <div class="panel-heading vd_bg-black">
                        <h3 class="panel-title">
                            <span class="menu-icon"><i class="icon-pie"></i></span>
                            DMS CHART
                        </h3>
                    </div>
                    <div class="panel-body" style="display: block;">
                        <div class="panel vd_transaction-widget light-widget widget"
                            style="box-shadow:none; margin-bottom:0;">
                            <div class="panel-body" style="padding-bottom: 0;">
                                <!-- vd_panel-menu -->
                                <h5 class="mgbt-xs-0 mgtp-0">
                                    <span class="menu-icon append-icon"> <i class="icon-pie"></i></span>
                                    <strong id="qmsYearTitle">Current Year Data</strong>
                                </h5>
                                <div id="pie-chart-dms" class="pie-chart"
                                    style="height: 350px; padding: 0px; position: relative;">
                                    <canvas class="flot-base" width="463" height="388"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 463px; height: 350px;"></canvas>
                                    <canvas class="flot-overlay" width="463" height="388"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 463px; height: 350px;"></canvas>
                                    <div class="legend">
                                        <div
                                            style="position: absolute; width: 55px; height: 138px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                                        </div>
                                    </div>
                                </div>
                                <div class="vd_info br">
                                    <h5 class="text-right font-semibold"><strong>TOTAL
                                            DMS</strong></h5>
                                    <h3 class="text-right  vd_red totalDms"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="panel widget">
                    <div class="panel-heading vd_bg-black">
                        <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-layout"></i> </span> DMS TABLE
                        </h3>
                        <div class="vd_panel-menu" style="display: flex;">
                            <div data-action="refresh" data-original-title="Refresh" data-toggle="tooltip"
                                data-placement="bottom" class=" menu entypo-icon smaller-font refresh-dms"> <i
                                    class="icon-cycle"></i> </div>
                            <div style="margin-right: 5px;">
                                <select class="width-100" style="padding: 2px;" id="dmsYearFrom">
                                    <option value="{date('Y')}">{date('Y')}</option>
                                    {for $i=1 to 5}
                                        <option value="{date('Y')-$i}">{date('Y')-$i}</option>
                                    {/for}
                                    
                                </select>
                            </div>
                            <div style="margin-right: 5px;">
                                <select class="width-100" style="padding: 2px;" id="dmsYearTo">
                                    {for $i=1 to 5}
                                        <option value="{date('Y')-$i}">{date('Y')-$i}</option>
                                    {/for}
                                </select>
                            </div>
                            <div style="margin-right: 5px;" a>
                                <select class="width-100" id="dmsPlantId" style="padding: 2px;">
                                    <option value="">All Plant</option>
                                    {foreach from=$plants item=item key=key}
                                        <option value="{$item.plant_id}" {if $item.plant_id eq $userPlantId } selected
                                            {/if}>
                                            {$item.short_name}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div>
                                <select class="width-100" id="dmsDepartmentId" style="padding: 2px;">
                                    <option value="">All Department</option>
                                    {foreach from=$departments item=item key=key}
                                        <option value="{$item.department_id}">
                                            {$item.department}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                        <!-- vd_panel-menu -->
                    </div>
                    <div class="panel-body" style="display: block;min-height: 423px;">
                        <div class="panel widget">
                            <div class="panel-body-list  table-responsive dms-table">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5">
                <div class="panel widget">
                    <div class="panel-heading vd_bg-black">
                        <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-pie"></i> </span> QMS CHART
                        </h3>
                        <!-- vd_panel-menu -->
                    </div>
                    <div class="panel-body" style="display: block;">
                        <div class="panel vd_transaction-widget light-widget widget"
                            style="box-shadow:none;margin-bottom:0;">
                            <div class="panel-body" style="padding-bottom: 0;">
                                <!-- vd_panel-menu -->
                                <h5 class="mgbt-xs-0 mgtp-0"><span class="menu-icon append-icon"> <i
                                            class="icon-pie"></i>
                                    </span> <strong id="qmsYearTitle">Current
                                        Year Data</strong></h5>
                                <div id="pie-chart-qms" class="pie-chart"
                                    style="height: 350px; padding: 0px; position: relative;">
                                    <canvas class="flot-base" width="463" height="388"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 463px; height: 350px;"></canvas>
                                    <canvas class="flot-overlay" width="463" height="388"
                                        style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 463px; height: 350px;"></canvas>
                                    <div class="legend">
                                        <div
                                            style="position: absolute; width: 55px; height: 138px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                                        </div>
                                    </div>
                                </div>
                                <div class="vd_info br">
                                    <h5 class="text-right font-semibold"><strong>TOTAL
                                            QMS</strong></h5>
                                    <h3 class="text-right  vd_red totalQms"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-7">
                <div class="panel widget">
                    <div class="panel-heading vd_bg-black">
                        <h3 class="panel-title"> <span class="menu-icon"> <i class="icon-layout"></i> </span> QMS TABLE
                        </h3>
                        <div class="vd_panel-menu" style="display: flex;">
                            <div data-action="refresh" data-original-title="Refresh" data-toggle="tooltip"
                                data-placement="bottom" class=" menu entypo-icon smaller-font refresh-qms"> <i
                                    class="icon-cycle"></i> </div>
                            <div style="margin-right: 5px;">
                                <select class="width-100" style="padding: 2px;" id="qmsYearFrom">
                                    <option value="{date('Y')}">{date('Y')}</option>
                                    {for $i=1 to 5}
                                        <option value="{date('Y')-$i}">{date('Y')-$i}</option>
                                    {/for}
                                </select>
                            </div>
                            <div style="margin-right: 5px;">
                                <select class="width-100" style="padding: 2px;" id="qmsYearTo">
                                    {for $i=1 to 5}
                                        <option value="{date('Y')-$i}">{date('Y')-$i}</option>
                                    {/for}
                                </select>
                            </div>
                            <div style="margin-right: 5px;">
                                <select class="width-100" style="padding: 2px;" id="qmsPlantId">
                                    <option value="">All Plant</option>
                                    {foreach from=$plants item=item key=key}
                                        <option value="{$item.plant_id}" {if $item.plant_id eq $userPlantId } selected
                                            {/if}>
                                            {$item.short_name}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div>
                                <select class="width-100" id="qmsDepartmentId" style="padding: 2px;">
                                    <option value="">All Department</option>
                                    {foreach from=$departments item=item key=key}
                                        <option value="{$item.department_id}">
                                            {$item.department}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                        <!-- vd_panel-menu -->
                    </div>
                    <div class="panel-body" style="display: block; min-height: 423px;">
                        <div class="panel widget">
                            <div class="panel-body-list  table-responsive qms-table">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>


{* Trending Modal  *}
<div class="modal fade" id="trendingModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="trendingModal" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fa fa-times"></i></button>
                <h4 class="modal-title" id="edit_basic_details_ModalLabel">Trending Chart</h4>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="panel widget" style="margin-bottom: 0;">
                    <div class="panel-body">
                        <div class="form-group" style="margin-bottom: 40px;">
                            <div class="row mgbt-md-12">
                                <div class="col-md-3">
                                    <label class="control-label">Chart</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingChart">
                                            <option value="line" selected>Line Chart</option>
                                            <option value="bar">Bar Chart</option>
                                            <option value="radar">Radar Chart</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Module</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingModule">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingYear1">
                                            <option value="{date('Y')}">{date('Y')}</option>
                                            {for $i=1 to 5}
                                                <option value="{date('Y')-$i}">{date('Y')-$i}</option>
                                            {/for}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingYear2">
                                            {for $i=1 to 5}
                                                <option value="{date('Y')-$i}">{date('Y')-$i}</option>
                                            {/for}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Plant</label>
                                    <div class="controls">
                                        <select class="width-100" style="padding: 2px;" id="trendingPlantId">
                                            <option value="">All Plant Data</option>
                                            {foreach from=$plants item=item key=key}
                                                <option value="{$item.plant_id}">
                                                    {$item.short_name}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 id="trendingTitle" style="margin-top: 10px; margin-bottom: 30px;text-align:center;"></h2>
                        <canvas id="trending-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer background-login">
                <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



{literal}
    <script>
        $(document).ready(function() {

            /* DMS PIE CHART */
            var dmsYearFrom = $('#dmsYearFrom').val();
            var dmsYearTo = $('#dmsYearTo').val();
            var dmsPlantId = $('#dmsPlantId').val();
            var dmsDepartmentId = $('#dmsDepartmentId').val();

            dmsPieChart(dmsYearFrom, dmsYearTo, dmsPlantId, dmsDepartmentId);

            $('#dmsYearFrom').on('change', function() {
                applyDmsFilterValues();
                dmsPieChart($(this).val(), dmsYearTo, dmsPlantId, dmsDepartmentId);
            });

            $('#dmsYearTo').on('change', function() {
                applyDmsFilterValues();
                dmsPieChart(dmsYearFrom, $(this).val(), dmsPlantId, dmsDepartmentId);
            });

            $('#dmsPlantId').on('change', function() {
                applyDmsFilterValues();
                dmsPieChart(dmsYearFrom, dmsYearTo, $(this).val(), dmsDepartmentId);
            });

            $('#dmsDepartmentId').on('change', function() {
                applyDmsFilterValues();
                dmsPieChart(dmsYearFrom, dmsYearTo, dmsPlantId, $(this).val());
            });

            $('.refresh-dms').click(function() {
                $('#dmsYearFrom').val(new Date().getFullYear());
                $('#dmsYearTo').val(new Date().getFullYear() - 1);
                {/literal}
                $('#dmsPlantId').val('{$userPlantId}');
                {literal}  
                $('#dmsDepartmentId option:first').prop('selected', true);
                applyDmsFilterValues();
                dmsPieChart(dmsYearFrom, dmsYearTo, dmsPlantId, dmsDepartmentId);
            });

            function applyDmsFilterValues() {
                dmsYearFrom = $('#dmsYearFrom').val();
                dmsYearTo = $('#dmsYearTo').val();
                dmsPlantId = $('#dmsPlantId').val();
                dmsDepartmentId = $('#dmsDepartmentId').val();
            }






            /* QMS PIE CHART*/
            var qmsYearFrom = $('#qmsYearFrom').val();
            var qmsYearTo = $('#qmsYearTo').val();
            var qmsPlantId = $('#qmsPlantId').val();
            var qmsDepartmentId = $('#qmsDepartmentId').val();

            qmsPieChart(qmsYearFrom, qmsYearTo, qmsPlantId, qmsDepartmentId);

            $('#qmsYearFrom').on('change', function() {
                applyQmsFilterValues();
                qmsPieChart($(this).val(), qmsYearTo, qmsPlantId, qmsDepartmentId);
            });

            $('#qmsYearTo').on('change', function() {
                applyQmsFilterValues();
                qmsPieChart(qmsYearFrom, $(this).val(), qmsPlantId, qmsDepartmentId);
            });

            $('#qmsPlantId').on('change', function() {
                applyQmsFilterValues();
                qmsPieChart(qmsYearFrom, qmsYearTo, $(this).val(), qmsDepartmentId);
            });

            $('#qmsDepartmentId').on('change', function() {
                applyQmsFilterValues();
                qmsPieChart(qmsYearFrom, qmsYearTo, qmsPlantId, $(this).val());
            });

            $('.refresh-qms').click(function() {
                $('#qmsYearFrom').val(new Date().getFullYear());
                $('#qmsYearTo').val(new Date().getFullYear() - 1);
                {/literal}
                $('#qmsPlantId').val('{$userPlantId}');
                {literal}  
                $('#qmsDepartmentId option:first').prop('selected', true);
                applyQmsFilterValues();
                qmsPieChart(qmsYearFrom, qmsYearTo, qmsPlantId, qmsDepartmentId);
            });

            function applyQmsFilterValues() {
                qmsYearFrom = $('#qmsYearFrom').val();
                qmsYearTo = $('#qmsYearTo').val();
                qmsPlantId = $('#qmsPlantId').val();
                qmsDepartmentId = $('#qmsDepartmentId').val();
            }







            /* TRENDING */
            var entity = '';
            $(document).on('click', '.trending-button', function() {
                let businessModule = $(this).data('module');
                entity = $(this).data('entity');
                var option = '';
                
                if (entity == 'dms') {
                    {/literal}
                    var modules = {$dmsModules|json_encode};
                    {literal}
                        
                    $.each(modules, function(index, value) {                        
                        option += `<option value="` + value.module + `">` + value.module +
                            `</option>`
                    });

                    $('#trendingYear1').val($('#dmsYearFrom').val());                    
                    $('#trendingYear2').val($('#dmsYearTo').val());
                    $('#trendingPlantId').val($('#dmsPlantId').val());
                }
                
                if (entity == 'qms') {
                    {/literal}
                    var modules = {$qmsModules|json_encode};
                    {literal}
                        
                    $.each(modules, function(index, value) {                        
                        option += `<option value="` + value.module + `">` + value.module +
                            `</option>`
                    });

                    $('#trendingYear1').val($('#qmsYearFrom').val());                    
                    $('#trendingYear2').val($('#qmsYearTo').val());
                    $('#trendingPlantId').val($('#qmsPlantId').val());
                }

                $('#trendingModal').modal('show');

                $('#trendingModule').html(option);                
                $('#trendingModule').val(businessModule);
                
                trendingChart(entity, businessModule, $('#trendingYear1').val(), $('#trendingYear2').val(), $('#trendingPlantId').val(), $('#trendingChart').val());
                
            });

            $('#trendingChart').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $('#trendingYear1').val(), $(
                    '#trendingYear2').val(), $('#trendingPlantId').val(), $(this).val());
            });

            $('#trendingModule').on('change', function() {
                trendingChart(entity, $(this).val(), $('#trendingYear1').val(), $(
                    '#trendingYear2').val(), $('#trendingPlantId').val(), $('#trendingChart').val());
            });

            $('#trendingYear1').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $(this).val(), $(
                    '#trendingYear2').val(), $('#trendingPlantId').val(), $('#trendingChart').val());
            });

            $('#trendingYear2').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $('#trendingYear1').val(), $(this)
                    .val(), $('#trendingPlantId').val(), $('#trendingChart').val());
            });

            $('#trendingPlantId').on('change', function() {
                trendingChart(entity, $('#trendingModule').val(), $('#trendingYear1').val(), $(
                    '#trendingYear2').val(), $(this).val(), $('#trendingChart').val());
            });

            var ctx = document.getElementById('trending-chart').getContext('2d');
            
            var trendingChartData = {
                labels: [],
                datasets: [{
                        label: '',
                        data: [],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                    },
                    {
                        label: '',
                        data: [],
                        backgroundColor: 'rgba(175, 12, 12, 0.2)',
                        borderColor: 'rgba(175, 12, 12, 1)',
                    }
                ]
            };

            var trendingChartOptions = {
                responsive: true,
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            };

            var trendingCharts = new Chart(ctx, {
                type: 'line',
                data: trendingChartData,
                options: trendingChartOptions
            });

            function trendingChart(entity, businessModule, year1, year2, plantId, chartType) {
                        
                $('#trendingTitle').fadeOut().fadeIn().text(businessModule + " Trending Analytics of " +
                year1 + " and " + year2);

                x_trendingChart(entity, businessModule, year1, year2, plantId, function(result) {
                    
                    let firstYear = result[0];
                    let secondYear = result[1];
                    let firstYearCount = [];
                    let secondYearCount = [];
                    let statuses = [];

                    $.each(firstYear, function(key, value){
                        firstYearCount.push(value);
                        statuses.push(key);
                    });

                    $.each(secondYear, function(key, value){
                        secondYearCount.push(value);
                    });
                    
                    trendingCharts.destroy();

                    trendingChartData = {
                        labels: statuses,
                        datasets: [{
                                label: year1,
                                data: firstYearCount,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            },
                            {
                                label: year2,
                                data: secondYearCount,
                                backgroundColor: 'rgba(175, 12, 12, 0.2)',
                                borderColor: 'rgba(175, 12, 12, 1)',
                                borderWidth: 1
                            }
                        ]
                    };

                    trendingCharts = new Chart(ctx, {
                        type: chartType,
                        data: trendingChartData,
                        options: trendingChartOptions
                    });

                });
            }
        });


        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; font-weight:bold; text-align:center; padding:2px; color:white;'>" +
                label + "<br/>" + Math.round(series.percent) + "%</div>";
        }

        function dmsPieChart(dmsYearFrom, dmsYearTo, dmsPlantId, dmsDepartmentId) {

            x_DMSPieChart(dmsYearFrom, dmsYearTo, dmsPlantId, dmsDepartmentId, function(result) {
                        
                var dmsStatuses = result[0];
                var dmsModules = result[1];
                var dmsRows = result[2];

                let dmsTable = `<table class="table no-head-border table-striped table-bordered">
                            <thead class="vd_bg-blue vd_white">
                                <tr>
                                    <th style="text-align: center;">Module</th>`;

                $.each(dmsStatuses, function(index, status) {
                    dmsTable += `<th style="text-align: center;">${status}</th>`;
                });

                dmsTable += `<th style="text-align: center;">Total</th>
                            <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>`;

                $.each(dmsModules, function(index, businessObject) {

                dmsTable += `<tr style="height: 45px;">

                                <td style="text-align: center; vertical-align:middle;">${businessObject.module}</td>`;                    

                    var dmsTotal = 0;

                    $.each(dmsStatuses, function(statusIndex, status) {

                        var dmsStatusCount = 0;

                        $.each(dmsRows, function(index, row) {

                            if (row[0] == businessObject.module){
                            
                                if(row[1] == status) {

                                dmsStatusCount = Number(row[2]);

                                }
                            }

                        });

                        dmsTotal += dmsStatusCount;

                        dmsTable += `<td style="text-align: center; vertical-align:middle;" class="${status.replace(/\s+/g, '')}" id="${businessObject.module}${status}">${dmsStatusCount}</td>`;
                    });

                    dmsTable += `<td style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;" class="dmsTotal" id="${businessObject.module}Total">${dmsTotal}</td>
                                <td style = "width: 18%;">
                                    <button class="btn vd_btn vd_bg-blue btn-xs trending-button" type="button"  data-module="${businessObject.module}" data-entity="dms">Trending</button>
                                    <button class="btn vd_btn vd_bg-blue btn-xs report-button" type="button"  data-module="${businessObject.module}" data-business-group="4">Report</button>
                                </td> 
                            </tr>`;
                });

                dmsTable += `<tr style="font-size: 15px; font-weight: bold; color: black;">
                                    <td style="text-align: center;">Total</td>`;
                $.each(dmsStatuses, function(statusIndex, status) {
                    dmsTable += `<td style="text-align: center; vertical-align:middle;"class="${status.replace(/\s+/g, '')}Dms"></td>`;
                });
                dmsTable += `<td style="text-align: center; vertical-align:middle; border-right: 1px solid #ddd;"class="TotalDms"></td>
                                </tr>
                            </tbody>
                        </table>`;
                        
                $('.dms-table').html(dmsTable);

                let dynamicVars = {};

                $.each(dmsStatuses, function(statusIndex, status) {

                    let sum = 0;

                    $('.' + status.replace(/\s+/g, '')).each(function() {

                        sum += parseInt($(this).text()) || 0;
                    });

                    dynamicVars[status] = sum;

                    $('.' + status.replace(/\s+/g, '') + 'Dms').text(sum);
                });


                let totalSum = 0;

                $('.dmsTotal').each(function() {

                    totalSum += parseInt($(this).text()) || 0;
                });

                $('.TotalDms').text(totalSum);

                var piePlaceholderDms = $("#pie-chart-dms");
                var pieDataDms = [];

                $.each(dynamicVars, function(key, value) {

                    pieDataDms.push({
                        label: key,
                        data: value
                    });

                });

                $.plot(piePlaceholderDms, pieDataDms, {
                    series: {
                        pie: {
                            show: true,
                            label: {
                                show: true,
                                radius: .5,
                                formatter: labelFormatter,
                                background: {
                                    opacity: 0
                                }
                            },
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    colors: ["#FF0000", "#52D793", "#56A2CF", "#FFA500"]
                });

                piePlaceholderDms.unbind('plotclick');
                piePlaceholderDms.bind("plotclick", function(event, pos, obj) {
                    if (!obj) {
                        return;
                    }
                    percent = parseFloat(obj.series.percent).toFixed(2);
                    show_notification("i", 'topright', obj.series.label + ": " + percent + "%");
                });
                
            });
        }
        

        function qmsPieChart(qmsYearFrom, qmsYearTo, qmsPlantId, qmsDepartmentId) {

            x_QMSPieChart(qmsYearFrom, qmsYearTo, qmsPlantId, qmsDepartmentId, function(result) {
                // console.log(result[2]);
                var qmsStatuses = result[0];
                var qmsModules = result[1];
                var qmsRows = result[2];
                
                let qmsTable = `<table class="table no-head-border table-striped table-bordered">
                            <thead class="vd_bg-blue vd_white">
                                <tr>
                                    <th style="text-align: center;">Module</th>`;

                $.each(qmsStatuses, function(index, status) {
                    qmsTable += `<th style="text-align: center;">${status}</th>`;
                });
                
                qmsTable += `<th style="text-align: center;">Total</th>
                            <th style="text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>`;

                $.each(qmsModules, function(index, businessObject) {

                qmsTable += `<tr style="height: 45px;">

                                <td style="text-align: center; vertical-align:middle;">${businessObject.module}</td>`;                    

                    var qmsTotal = 0;

                    $.each(qmsStatuses, function(statusIndex, status) {

                        var qmsStatusCount = 0;

                        $.each(qmsRows, function(index, row) {

                            if (row[0] == businessObject.module){
                            
                                if(row[1] == status) {

                                qmsStatusCount = Number(row[2]);

                                }
                            }

                        });

                        qmsTotal += qmsStatusCount;

                        qmsTable += `<td style="text-align: center; vertical-align:middle;" class="${status.replace(/\s+/g, '')}" id="${businessObject.module}${status}">${qmsStatusCount}</td>`;
                    });
                    
                    qmsTable += `<td style="text-align: center; vertical-align:middle; font-size:15px; font-weight:bold;" class="Total" id="${businessObject.module}Total">${qmsTotal}</td>
                                <td style = "width: 18%;">
                                    <button class="btn vd_btn vd_bg-blue btn-xs trending-button" type="button"  data-module="${businessObject.module}" data-entity="qms">Trending</button>
                                    <button class="btn vd_btn vd_bg-blue btn-xs report-button" type="button"  data-module="${businessObject.module}" data-business-group="5">Report</button>
                                </td> 
                            </tr>`;
                });

                qmsTable += `<tr style="font-size: 15px; font-weight: bold; color: black;">
                                    <td style="text-align: center;">Total</td>`;
                $.each(qmsStatuses, function(statusIndex, status) {
                    qmsTable += `<td style="text-align: center; vertical-align:middle;"class="${status.replace(/\s+/g, '')}Qms"></td>`;
                });
                qmsTable += `<td style="text-align: center; vertical-align:middle; border-right: 1px solid #ddd;"class="TotalQms"></td>
                                </tr>
                            </tbody>
                        </table>`;
                         
                $('.qms-table').html(qmsTable);
                
                let dynamicVars = {};

                $.each(qmsStatuses, function(statusIndex, status) {

                    let sum = 0;

                    $('.' + status).each(function() {

                        sum += parseInt($(this).text()) || 0;
                    });

                    dynamicVars[status] = sum;

                    $('.' + status + 'Qms').text(sum);
                });
                

                let totalSum = 0;

                $('.qmsTotal').each(function() {
                    
                    totalSum += parseInt($(this).text()) || 0;
                });
                
                $('.TotalQms').text(totalSum);

                var piePlaceholderQms = $("#pie-chart-qms");
                var pieDataQms = [];

                $.each(dynamicVars, function(key, value) {

                    pieDataQms.push({
                        label: key,
                        data: value
                    });

                });

                $.plot(piePlaceholderQms, pieDataQms, {
                    series: {
                        pie: {
                            show: true,
                            label: {
                                show: true,
                                radius: .5,
                                formatter: labelFormatter,
                                background: {
                                    opacity: 0
                                }
                            },
                        }
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    },
                    colors: ["#52D793", "#56A2CF", "#FFA500", "#FF0000"]
                });

                piePlaceholderQms.unbind('plotclick');
                piePlaceholderQms.bind("plotclick", function(event, pos, obj) {
                    if (!obj) {
                        return;
                    }
                    percent = parseFloat(obj.series.percent).toFixed(2);
                    show_notification("i", 'topright', obj.series.label + ": " + percent + "%");
                });
            });
        }
    </script>
{/literal}