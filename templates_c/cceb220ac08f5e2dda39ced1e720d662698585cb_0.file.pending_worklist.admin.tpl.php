<?php
/* Smarty version 3.1.30, created on 2024-10-25 11:09:54
  from "/var/www/html/lm_qms/lib/admin/templates/pending_worklist.admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_671b2f2aeb1708_63046135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cceb220ac08f5e2dda39ced1e720d662698585cb' => 
    array (
      0 => '/var/www/html/lm_qms/lib/admin/templates/pending_worklist.admin.tpl',
      1 => 1726320462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_671b2f2aeb1708_63046135 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Pending Task(s) </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> My Pending Task (<?php echo count($_smarty_tpl->tpl_vars['user_worklist_array']->value);?>
)</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <?php if (!empty($_smarty_tpl->tpl_vars['user_worklist_array']->value)) {?>
                                <table class="table table-bordered table-striped generate_datatable" title="My Pending Task" data-ori="landscape" data-pagesize="B4" data-sort_column=3>
                                    <thead>
                                        <tr>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"module"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"number"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"date"),$_smarty_tpl);?>
</th>	
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"status"),$_smarty_tpl);?>
</th>	
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user_worklist_array']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                            <tr >
                                                <td></td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_date'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                    <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Total Pending Task (<?php echo count($_smarty_tpl->tpl_vars['total_pendinglist_array']->value);?>
)</a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body"> 
                        <div class="table-responsive">
                            <?php if (!empty($_smarty_tpl->tpl_vars['total_pendinglist_array']->value)) {?>
                                <table class="table table-bordered table-striped generate_datatable" title="Total Pending Task" data-ori="landscape" data-pagesize="B4" data-sort_column=3>
                                    <thead>
                                        <tr>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"module"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"number"),$_smarty_tpl);?>
</th>
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"date"),$_smarty_tpl);?>
</th>	
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"status"),$_smarty_tpl);?>
</th>	
                                            <th ><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"user_name"),$_smarty_tpl);?>
</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['total_pendinglist_array']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                            <tr >
                                                <td></td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_date'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                            </tr>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="alert alert-danger alert-dismissable alert-condensed">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                    <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php }
}
