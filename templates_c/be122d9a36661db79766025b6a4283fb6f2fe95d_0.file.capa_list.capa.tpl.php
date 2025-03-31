<?php
/* Smarty version 3.1.30, created on 2025-01-24 10:21:37
  from "/var/www/html/lm_qms/lib/capa/templates/capa_list.capa.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67931c59075062_07668926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be122d9a36661db79766025b6a4283fb6f2fe95d' => 
    array (
      0 => '/var/www/html/lm_qms/lib/capa/templates/capa_list.capa.tpl',
      1 => 1726294080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67931c59075062_07668926 (Smarty_Internal_Template $_smarty_tpl) {
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
            <li class="active">CAPA List</li>
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
                        <i class="fa fa-fw fa-delicious"></i>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_capa_list" style="display: inline-block;"> CAPA List </a>
                    </span> 
                    <span class="label label-danger mgl-10"><?php echo count($_smarty_tpl->tpl_vars['capa_list']->value);?>
</span>
                </div>
                <div id="collapse_capa_list" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="panel widget light-widget">
                            <form name="capa_list-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="capa_list-form" autocomplete="off">
                                <?php if (!empty($_smarty_tpl->tpl_vars['capa_list']->value)) {?>
                                    <table class="table table-bordered table-striped generate_datatable" title="DMS List" data-sort_column=1 data-whitespace="nowrap" data-show_rows="15">
                                        <thead>
                                            <tr>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"capa_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"created_by"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"doc_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"completion_date"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"approval_status"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"wf_status"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"capa",'attribute'=>"status"),$_smarty_tpl);?>
</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['capa_list']->value, 'item', false, 'key', 'list', array (
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
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['capa_department_name'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['source_doc_no']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['target_date']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['completed_date']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['approval_status']),$_smarty_tpl);?>
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
