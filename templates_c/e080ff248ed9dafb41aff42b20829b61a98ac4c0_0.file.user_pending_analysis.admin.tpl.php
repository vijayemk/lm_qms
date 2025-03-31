<?php
/* Smarty version 3.1.30, created on 2024-10-25 11:11:17
  from "/var/www/html/lm_qms/lib/admin/templates/user_pending_analysis.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671b2f7d0f27c6_03249700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e080ff248ed9dafb41aff42b20829b61a98ac4c0' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/user_pending_analysis.admin.tpl',
      1 => 1726643891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_671b2f7d0f27c6_03249700 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Pending Analysis</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>

<div class="vd_content-section clearfix">
    <div class="panel widget light-widget">
        <div class="panel-body">
            <form name="sop_list" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="sop_list-form" autocomplete="off">
                <?php if (!empty($_smarty_tpl->tpl_vars['pending_days_userwise_count']->value)) {?>
                    <table class="table table-bordered table-striped" id="sop_list_data-tables">
                        <thead>
                            <tr>
                                <th >S.No</th>
                                <th style="text-align: center;"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                <th style="text-align: center;"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                <th style="text-align: center;"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                <th style="text-align: center;"><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"is_active"),$_smarty_tpl);?>
</th>
                                <th style="text-align: center;">0-3M</th>
                                <th style="text-align: center;">3-6M</th>
                                <th style="text-align: center;">6-1Y</th>
                                <th style="text-align: center;">>=1Y</th>
                                <th style="text-align: center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pending_days_userwise_count']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <tr >
                                    <td></td>
                                    <td><a href="index.php?module=admin&action=pending_worklist" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['work_user_name'];?>
 [<?php echo $_smarty_tpl->tpl_vars['item']->value['emp_id'];?>
]</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['is_active'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count_3m'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count_6m'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count_1y'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count_2y'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </tbody>
                        <tfoot class="text-nowrap">
                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th style="text-align: center;">0-3M</th>
                                <th style="text-align: center;">3-6M</th>
                                <th style="text-align: center;">6-1Y</th>
                                <th style="text-align: center;">>=1Y</th>
                                <th style="text-align: center;">Total</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-danger alert-dismissable alert-condensed">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                        <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                    </div>
                <?php }?>
            </form>
        </div>
    </div>
</div>


    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Specific Page Scripts Put Here -->
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            var t = $('#sop_list_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                order: [[1, 'asc']],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Pending Analysis',
                        footer: true

                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible',
                            footer: true
                        },
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible',
                            footer: true
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
                        message: 'Pending Analysis',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;
                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                i : 0;
                    };
                    // Total over all pages
                    total = api
                            .column(5)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Total over this page
                    pageTotal = api
                            .column(5, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Update footer
                    $(api.column(5).footer()).html(
                            '' + pageTotal + ' ( ' + total + ' total)'
                            );
                    total = api
                            .column(6)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Total over this page
                    pageTotal = api
                            .column(6, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Update footer
                    $(api.column(6).footer()).html(
                            '' + pageTotal + ' ( ' + total + ' total)'
                            );
                    total = api
                            .column(7)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Total over this page
                    pageTotal = api
                            .column(7, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Update footer
                    $(api.column(7).footer()).html(
                            '' + pageTotal + ' ( ' + total + ' total)'
                            );
                    total = api
                            .column(8)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Total over this page
                    pageTotal = api
                            .column(8, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Update footer
                    $(api.column(8).footer()).html(
                            '' + pageTotal + ' ( ' + total + ' total)'
                            );
                    total = api
                            .column(9)
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Total over this page
                    pageTotal = api
                            .column(9, {page: 'current'})
                            .data()
                            .reduce(function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);
                    // Update footer
                    $(api.column(9).footer()).html(
                            '' + pageTotal + ' ( ' + total + ' total)'
                            );

                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    $("td:first", nRow).html(iDisplayIndex + 1);
                    return nRow;
                },

            });

        });
    <?php echo '</script'; ?>
>
<?php }
}
