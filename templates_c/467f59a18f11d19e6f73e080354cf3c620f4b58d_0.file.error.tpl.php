<?php
/* Smarty version 3.1.30, created on 2024-10-12 15:31:34
  from "/var/www/html/lm_qms/templates/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_670a48fec80d96_96092031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '467f59a18f11d19e6f73e080354cf3c620f4b58d' => 
    array (
      0 => '/var/www/html/lm_qms/templates/error.tpl',
      1 => 1493003256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670a48fec80d96_96092031 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li><a href="javascript:history.back()">Back</a> </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel widget">
            <div class="panel-heading vd_bg-red">
                <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-sign-out"></i> </span> A FATAL ERROR OCCURED </h3>
            </div>
            <div class="panel-body-list  table-responsive">
                <table class="table table-striped table-hover no-head-border">
                    <thead class="vd_bg-green vd_white">
                      <tr>
                        <th >ERROR CODE</th>
                        <th colspan="2">ERROR / SUGGESTIONS</th>
                        <th></th>
                        <th>ADDITIONAL INFO.	</th>
                        <th>ADMIN MESSAGE</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</td>
                            <td colspan="2"></td>
                            <td class="center"><?php echo $_smarty_tpl->tpl_vars['addInfo']->value;?>
</td>
                            <td class="center"><span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['adminMsg']->value;?>
</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- col-md-12 --> 
</div><?php }
}
