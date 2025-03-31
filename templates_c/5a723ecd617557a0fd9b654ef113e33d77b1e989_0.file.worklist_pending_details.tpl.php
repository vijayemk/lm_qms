<?php
/* Smarty version 3.1.30, created on 2024-11-06 09:19:00
  from "/var/www/html/lm_qms/templates/worklist_pending_details.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_672ae72c14c502_16617760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a723ecd617557a0fd9b654ef113e33d77b1e989' => 
    array (
      0 => '/var/www/html/lm_qms/templates/worklist_pending_details.tpl',
      1 => 1720850299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_672ae72c14c502_16617760 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade" id="modal-worklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Pending Details</h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped mgbt-md-10" id="data-tables-status">
                    <thead>
                        <tr>

                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'user_name'),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'plant_name'),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'department'),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'pending_from'),$_smarty_tpl);?>
</th>
                            <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>'pending_days'),$_smarty_tpl);?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['worklist_pending_details']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <tr >
                                <td class="vd_red"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
</td>
                                <td class="vd_red"><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['pending_from']),$_smarty_tpl);?>
</td>
                                <td class="vd_red"><?php echo $_smarty_tpl->tpl_vars['item']->value['pending_days'];?>
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
            <div class="modal-footer background-login">

            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->       
<?php }
}
