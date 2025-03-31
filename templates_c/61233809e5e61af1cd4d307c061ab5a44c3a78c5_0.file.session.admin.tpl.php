<?php
/* Smarty version 3.1.30, created on 2024-10-12 15:14:21
  from "/var/www/html/lm_qms/lib/admin/templates/session.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_670a44f5b1e971_77930902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61233809e5e61af1cd4d307c061ab5a44c3a78c5' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/session.admin.tpl',
      1 => 1535618528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670a44f5b1e971_77930902 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active">Session Management </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Current Live Users</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <table class="table table-bordered table-striped" id="session_data-tables">
                                            <thead>
                                                <tr>
                                                    <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                                    <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"created"),$_smarty_tpl);?>
</th>
                                                    <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"last_impression"),$_smarty_tpl);?>
</th>
                                                    <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"no_of_hits"),$_smarty_tpl);?>
</th>
                                                    <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_agent"),$_smarty_tpl);?>
</th>
                                                    <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"ip_address"),$_smarty_tpl);?>
</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sessionlist']->value, 'item', false, 'key', 'listroles', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <tr >
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['created'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['last_impression'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['no_of_hits'];?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_agent'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['ip_address'];?>
</td>   
                                                    </tr>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Panel Widget --> 
                            </div>
                            <!-- col-md-12 --> 
                        </div>
                        <!-- row -->     
                    </div>
                </div>
            </div>
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
        $(document).ready(function() {
            $('#session_data-tables').dataTable( {
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
                        message: 'Session List',

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
                        message: 'Session List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    }
                    
                ],
                
            } );
        } );
    <?php echo '</script'; ?>
>

<?php }
}
