<?php
/* Smarty version 3.1.30, created on 2024-09-28 05:12:29
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/dms/templates/dms_list.dms.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66f7903d161610_99146460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ae5daa2257b2fcf1ed7ff977acf89fbea8d4cec' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/dms/templates/dms_list.dms.tpl',
      1 => 1726293687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66f7903d161610_99146460 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">List of Document </li>
            <li class="active">Deviation List</li>
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
                    <span class="panel-title h4"> 
                        <i class="fa fa-fw fa-life-ring"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsedmslist" style="display: inline-block;"> Deviation List </a>
                    </span> 
                    <span class="label label-danger mgl-10"><?php echo count($_smarty_tpl->tpl_vars['dm_list']->value);?>
</span>
                </div>
                <div id="collapsedmslist" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="panel widget light-widget">
                            <form name="dms_list-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="dms_list-form" autocomplete="off">
                                <?php if (!empty($_smarty_tpl->tpl_vars['dm_list']->value)) {?>
                                    <table class="table table-bordered table-striped generate_datatable" title="DMS List" data-sort_column=1 data-whitespace="nowrap" data-show_rows="15">
                                        <thead>
                                            <tr>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"initiator"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"date_of_occurrence"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"reporting_date"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"completion_date"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"approval_status"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"wf_status"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"status"),$_smarty_tpl);?>
</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dm_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['doc_link'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['dm_department_name'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_of_occurrence'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['time_of_occurrence'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['reporting_date'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['reporting_time'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['target_date'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['completed_date'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['approval_status'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['wf_status'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
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
                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found 
                                    </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
<?php }
}
