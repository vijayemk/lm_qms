<?php
/* Smarty version 3.1.30, created on 2024-09-28 09:02:11
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/vms/templates/vendor_list.vms.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66f7c61391bae4_60771824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09ea7ca2d6b45ea1841c7b527ffd61736a868a68' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/vms/templates/vendor_list.vms.tpl',
      1 => 1726928084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66f7c61391bae4_60771824 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '</script'; ?>
>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css">
<link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css">    

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> Add </li>
            <li class="active"> QMS </li>
            <li class="active"> Vendor Management (VMS)</li>
            <li class="active"> Add Audit Schedule</li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" >
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-group" id="accordion">
        <div class="row">
            <div class="col-md-12 ">
                <div class="tabs widget">
                    <ul class="nav nav-tabs widget">
                        <li class="active">
                            <a data-toggle="tab" href="#tab_vendor_list"> 
                                <span class="menu-icon"><i class="fa fa-database"></i></span> Vendor List<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#tab_master">
                                <span class="menu-icon"><i class="fa fa-building"></i></span> Vendor Organization List<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li>
                            <a data-target="#modal_add_vendor_org" data-toggle="modal" class="vd_hover">
                                <span class="menu-icon"><i class="fa fa-plus"></i></span> Vendor Organization<span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab_vendor_list" class="tab-pane active">    
                            <div class="panel-body input-border">   
                                <?php if (!empty($_smarty_tpl->tpl_vars['vms_plant_list']->value)) {?>
                                    <table class="table table-bordered table-striped table-hover generate_datatable" title="Vendor List" data-hide_columns="[2,8,9,13,14,15,16,17,18,19,20]" data-sort_column=1 data-whitespace="nowrap">
                                        <thead>
                                            <tr>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_type"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"contact_number"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
  [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"is_active"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_status"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"audit_status"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"effective_from"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"effective_to"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vms_plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['org_name']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['plant_name']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['plant_short_name']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['type']),$_smarty_tpl);?>
</td>
                                                    <td style="white-space: pre-wrap !important;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['address']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['city']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['state']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['country']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['pincode']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['landline_number']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['email']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['primary_contact']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['primary_contact_number']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['secondary_contact']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['secondary_contact_number']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['website']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['established_year']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['no_of_employees']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['annual_turn_over']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['certifications']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['is_active']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['vendor_status']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['audit_status']),$_smarty_tpl);?>
</td>
                                                    <td><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['effective_from']),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
</td>
                                                    <td><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['effective_to']),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable2),$_smarty_tpl);?>
</td>
                                                    <td class="menu-action text-nowrap" data-plant_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'>
                                                        <span data-original-title="Edit Plant Details" data-toggle="tooltip" data-placement="bottom">
                                                            <button class="btn menu-icon vd_bd-green vd_green update_vendor_plant" data-target="#modal_edit_plant" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                        </span>
                                                        <!--span data-original-title="Audit History" data-toggle="tooltip" data-placement="bottom">
                                                            <button class="btn menu-icon vd_bd-green vd_green" data-target="#" data-toggle="modal"><i class="fa fa-eye"></i></button>
                                                        </span-->
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
                                    <div class="alert alert-danger alert-dismissable alert-condensed mbgt-md-0">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div id="tab_master" class="tab-pane sidebar-widget">
                            <div class="panel-body input-border">   
                                <?php if (!empty($_smarty_tpl->tpl_vars['vms_org_list']->value)) {?>
                                    <table class="table table-bordered table-striped table-hover generate_datatable" title="Vendor Organization" data-hide_columns="[6,12,13,14,15,16,17,18]" data-sort_column=1 data-whitespace="nowrap">
                                        <thead>
                                            <tr>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"organization"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"short_name"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"contact_number"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
 [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</th>
                                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"action"),$_smarty_tpl);?>
</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vms_org_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['org_name']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['short_name']),$_smarty_tpl);?>
</td>
                                                    <td style="white-space: pre-wrap !important;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['address']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['city']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['state']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['country']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['pincode']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['landline_number']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['email']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['primary_contact']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['primary_contact_number']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['secondary_contact']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['secondary_contact_number']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['website']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['established_year']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['no_of_employees']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['annual_turn_over']),$_smarty_tpl);?>
</td>
                                                    <td><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['certifications']),$_smarty_tpl);?>
</td>
                                                    <td class="menu-action text-nowrap" data-org_details='<?php echo json_encode($_smarty_tpl->tpl_vars['item']->value);?>
'>
                                                        <span data-original-title="Edit Vendor Organization" data-toggle="tooltip" data-placement="bottom">
                                                            <button class="btn menu-icon vd_bd-green vd_green update_vendor_org"  data-target="#modal_edit_org" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                                        </span>
                                                        <span data-original-title="Add Vendor Plant" data-toggle="tooltip" data-placement="bottom">
                                                            <button class="btn menu-icon vd_bd-green vd_green add_vendor_plant" data-target="#modal_add_vendor" data-toggle="modal"><i class="fa fa-plus"></i></button>
                                                        </span>
                                                        <span data-original-title="Plant List" data-toggle="tooltip" data-placement="bottom">
                                                            <button class="btn menu-icon vd_bd-green vd_green show_vendor_plant" data-target="#modal_show_vendor_plant" data-toggle="modal"><i class="fa fa-eye"></i></button>
                                                        </span>
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
                                    <div class="alert alert-danger alert-dismissable alert-condensed mbgt-md-0">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                                        <i class="fa fa-exclamation-circle append-icon"></i> Records Not Found
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div id="tab_initiate_vendor" class="tab-pane sidebar-widget">
                            <div class="panel-body input-border">   
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>
</div>
<!-- Start Of Add Vendor Organization Modal -->  
<div class="modal fade" id="modal_add_vendor_org" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog width-70">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Add Vendor Organization<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="add_vendor_org-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_vendor_org-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"organization"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case org" name="ao_org"  placeholder="Min 3 - Max 100" title="Enter Valid Organization Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"org_short_name"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case org_short_name" name="ao_short_name" placeholder="Min 2 - Max 50" title="Enter Valid Organization Short Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <textarea rows="2" name="ao_address" placeholder="Min 5 - Max 500" title="Enter Valid Address" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ao_city" placeholder="Min 3 - Max 40" title="Enter Valid City">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ao_state" placeholder="Min 3 - Max 40" title="Enter Valid State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ao_country" placeholder="Min 3 - Max 40" title="Enter Valid Country">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
 </label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ao_pincode"  placeholder="Pincode" title="Enter Valid Pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"landline_number"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ao_landline_number" placeholder="Min 10" title="Enter Va;id Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_low_case" name="ao_email" placeholder="Min 3 - Max100" title="Enter Valid Email ID">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case" name="ao_primary_contact" placeholder="Primary Contact" title="Enter Valid Primary Contact">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ao_primary_contact_number" placeholder="Primary Contact Number" title="Enter Valid Primary Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" class="to_up_case" name="ao_secondary_contact" placeholder="Secondary Contact" title="Enter Valid Secondary Contact Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" name="ao_secondary_contact_number" placeholder="Secondary Contact Number" title="Enter Valid Secondary Contact Number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" name="ao_website" placeholder="website">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
 </label>
                                <div class="controls">
                                    <input type="number" name="ao_established_year" title="Enter Established Year" placeholder="Established Year">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="number" name="ao_no_of_employees" title="Enter Total Number of Employees" placeholder="Number of Employees">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
 [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</label>
                                <div class="controls">
                                    <input type="number" name="ao_annual_turnover" title="Enter Annual Turnover" placeholder="Annual Turnover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <textarea rows="4" name="ao_certifications" placeholder="Certfications" title="Enter Certfications"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['master_data_creation_alert']->value) {?>
                        <div class="alert alert-danger">
                            <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Some of the master data entries are still not created in the admin section under QMS Master Data such as "Vendor Type". Before proceeding further, please ensure these entries are created.
                        </div>
                    <?php } else { ?>
                        <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                            <input type="hidden" name="add_vendor_org">
                            <button class="btn vd_bg-green vd_white" type="submit"  id="add_vendor_org"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Add</button>
                        </div>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Of Add Vendor Organizatio  Modal -->  
<!-- Start Of Edit Organization Modal -->
<div class="modal fade" id="modal_edit_org" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog width-70">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Organization<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="update_vendor_org-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_vendor_org-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"organization"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case org org_name short_name" name="uo_org"  placeholder="Min 3 - Max 100" title="Enter Valid Organization Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"org_short_name"),$_smarty_tpl);?>
 </label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case org_short_name short_name" name="uo_short_name" placeholder="Min 2 - Max 50" title="Enter Valid Organization Short Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <textarea rows="2" class="address" name="uo_address" placeholder="Min 5 - Max 500" title="Enter Valid Address" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="city" name="uo_city" placeholder="Min 3 - Max 40" title="Enter Valid City">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="state" name="uo_state" placeholder="Min 3 - Max 40" title="Enter Valid State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="country" name="uo_country" placeholder="Min 3 - Max 40" title="Enter Valid Country">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
 </label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="pincode" name="uo_pincode"  placeholder="Pincode" title="Enter Valid Pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"landline_number"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="landline_number" name="uo_landline_number" placeholder="Min 10" title="Enter Va;id Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_low_case email" name="uo_email" placeholder="Min 3 - Max100" title="Enter Valid Email ID">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case primary_contact" name="uo_primary_contact" placeholder="Primary Contact" title="Enter Valid Primary Contact">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="primary_contact_number" name="uo_primary_contact_number" placeholder="Primary Contact Number" title="Enter Valid Primary Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" class="to_up_case secondary_contact" name="uo_secondary_contact" placeholder="Secondary Contact" title="Enter Valid Secondary Contact Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" class="secondary_contact_number" name="uo_secondary_contact_number" placeholder="Secondary Contact Number" title="Enter Valid Secondary Contact Number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" class="website" name="uo_website" placeholder="website">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
 </label>
                                <div class="controls">
                                    <input type="number" class="established_year" name="uo_established_year" title="Enter Established Year" placeholder="Established Year">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="number" class="no_of_employees" name="uo_no_of_employees" title="Enter Total Number of Employees" placeholder="Number of Employees">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
 [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</label>
                                <div class="controls">
                                    <input type="number" class="annual_turn_over" name="uo_annual_turnover" title="Enter Annual Turnover" placeholder="Annual Turnover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <textarea rows="4" class="certifications" name="uo_certifications" placeholder="Certfications" title="Enter Certfications"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                        <input type="hidden" name="uo_org_id"  class="org_id">
                        <input type="hidden" name="update_vendor_org">
                        <button class="btn vd_bg-green vd_white" type="submit"  id="update_vendor_org"><span class="menu-icon"><i class="fa fa-fw fa-arrow-up"></i></span> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Of Edit Vendor organization Modal -->
<!-- Start Of Add Vendor Modal -->  
<div class="modal fade" id="modal_add_vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog width-70">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Add Vendor Plant<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="add_vendor_plant-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="add_vendor_plant-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"organization"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="org_name" name="ap_org_name"  title="Enter Valid Vendor Name" readonly>
                                    <input type="hidden" name="ap_org" class="org_id" title="Select Valid Vendor Name" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case plant" name="ap_plant_name" placeholder="Min 3 - Max 100" title="Enter Valid Plant Name">
                                    <span class="font-semibold vd_red error_exists reset_ele"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"short_name"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case plant_short_name" name="ap_plant_short_name" placeholder="Min 3 - Max 50" title="Enter Valid Plant Short Name">
                                    <span class="font-semibold vd_red error_exists reset_ele"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_type"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <select  name="ap_plant_type" title="Select Valid Type">
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vendor_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <textarea rows="2" name="ap_address" placeholder="Min 5 - Max 500" title="Enter Valid Address"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ap_city" placeholder="Min 3 - Max 40" title="Enter Valid City">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ap_state" placeholder="Min 3 - Max 40" title="Enter Valid State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ap_country" placeholder="Min 3 - Max 40" title="Enter Valid Country">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
 </label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ap_pincode" placeholder="Pincode" title="Enter Valid Pincode">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"landline_number"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" name="ap_landline_number" placeholder="Min 10">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_low_case" name="ap_email" placeholder="Min 3 -Max 100" title="Enter Valid Email ID">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" class="to_up_case" name="ap_primary_contact" placeholder="Primary Contact" title="Enter Valid Primary Contact">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="number" name="ap_primary_contact_number" placeholder="Primary Contact Number" title="Enter Valid Primary Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" class="to_up_case" name="ap_secondary_contact" placeholder="Secondary Contact" title="Enter Valid Secondary Contact Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="number" name="ap_secondary_contact_number" placeholder="Secondary Contact Number" title="Enter Valid Secondary Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="text" name="ap_website" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="number" class="established_year" name="ap_established_year" title="Enter Established Year" placeholder="Established Year">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <input type="number" name="ap_no_of_employees" title="Enter Total Number of Employees" placeholder="Number of Employees">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
 [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</label>
                                <div class="controls">
                                    <input type="number" name="ap_annual_turnover" title="Enter Annual Turnover" placeholder="Annual Turnover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</label>
                                <div class="controls">
                                    <textarea rows="4" name="ap_certifications" title="Enter Certfications" placeholder="Certfications"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                        <input type="hidden" name="add_vendor_plant">
                        <button class="btn vd_bg-green vd_white" type="submit" id="add_vendor_plant"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Of Add Vendor Modal -->                         
<!-- Start Of Edit Plant Modal -->
<div class="modal fade" id="modal_edit_plant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog width-70">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Edit Vendor<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form name="update_vendor_plant-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="update_vendor_plant-form" autocomplete="off">
                    <div class="alert alert-danger vd_hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span> Change a few things up and try submitting again.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_name"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <select class="org_id" name="up_org" title="Select Valid Organization Name">
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vms_org_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['org_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['org_name'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label><span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case plant plant_name" name="up_plant_name" placeholder="Min 3 - Max 100" title="Enter Valid Plant Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"short_name"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case plant_short_name" name="up_plant_short_name" placeholder="Min 3 - Max 50" title="Enter Valid Plant Short Name">
                                    <span class="font-semibold vd_red error_exists"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_type"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <select class="type_id" name="up_plant_type" title="Select Valid Type">
                                        <option value="">Select</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vendor_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="address" name="up_address" placeholder="Min 5 - Max 500" title="Enter Valid Address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="city" name="up_city" placeholder="Min 3 - Max 40" title="Enter Valid City">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="state" name="up_state" placeholder="Min 3 - Max 40" title="Enter Valid State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="country" name="up_country" placeholder="Min 3 - Max 40" title="Enter Valid Country">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
 </label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="pincode" name="up_pincode"  placeholder="Pincode" title="Enter Valid Pincode">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"landline_number"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="number" class="landline_number" name="up_landline_number" placeholder="Min 10">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_low_case email" name="up_email" placeholder="Min 3 -Max 100" title="Enter Valid Email ID">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case primary_contact" name="up_primary_contact" placeholder="Primary Contact" title="Enter Valid Primary Contact">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="number" class="primary_contact_number" name="up_primary_contact_number" placeholder="Primary Contact Number" title="Enter Valid Primary Contact Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="to_up_case secondary_contact" name="up_secondary_contact" placeholder="Secondary Contact" title="Enter Valid Secondary Contact Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="number" class="ap_secondary_contact_number" name="usecondary_contact_number" placeholder="Secondary Contact Number" title="Enter Valid Primary Contact">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="website" name="up_website" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
 </label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="text" class="established_year" name="up_established_year" title="Enter Established Year" placeholder="Established Year">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="number" class="no_of_employees" name="uno_of_employees" title="Enter Total Number of Employees" placeholder="Number of Employees">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
 [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <input type="number" class="annual_turn_over" name="up_annual_turnover" title="Enter Annual Turnover" placeholder="Annual Turnover">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"is_active"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <select class="is_active" name="up_is_active" title="Select Status">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</label> <span class="vd_red">*</span>
                                <div class="controls">
                                    <textarea rows="4" class="certifications" name="up_certifications" title="Enter Certfications" placeholder="Certfications"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions-condensed row mgbt-xs-0 text-left mgtp-0">
                        <input type="hidden" name="up_plant_id"  class="plant_id">
                        <input type="hidden" name="update_vendor_plant">
                        <button class="btn vd_bg-green vd_white" type="submit"  id="add_vendor_plant"><span class="menu-icon"><i class="fa fa-fw fa-arrow-right"></i></span> Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Of Edit Vendor Modal -->  
<!-- Strat Of Show Plant List Modal -->  
<div class="modal fade" id="modal_show_vendor_plant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog width-70">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Add Vendor Plant<span class="show_task_attachments_id"></span></h4>
            </div>
            <div class="modal-body pd-15">
                <form>
                    <table id="show_vendow_plants_tbl" class="table table-bordered table-striped table-hover generate_datatable" title="Vendor List" data-hide_columns="[2,8,9,13,14,15,16,17,18,19,20]" data-sort_column=1>
                        <thead>
                            <tr>
                                <th><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_name"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"plant_name"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"vendor_type"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"address"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"city"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"state"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"country"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"pincode"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"contact_number"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"email"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"primary_contact_number"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"secondary_contact_number"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"website"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"established_year"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"no_of_employees"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"annual_turnover"),$_smarty_tpl);?>
  [<?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"cr"),$_smarty_tpl);?>
]</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"certifications"),$_smarty_tpl);?>
</th>
                                <th><?php echo template_get_attribute_name(array('module'=>"vms",'attribute'=>"is_active"),$_smarty_tpl);?>
</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Strat Of Show Plant List Modal -->  


    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            "use strict";
            //Add Vendor Organization form validation
            $('#add_vendor_org-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    ao_org: {
                        minlength: 3,
                        maxlength: 100,
                        required: true
                    },
                    ao_short_name: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    ao_address: {
                        minlength: 5,
                        maxlength: 500,
                        required: true
                    },
                    ao_city: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ao_state: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ao_country: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ao_pincode: {
                        maxlength: 20,
                        required: true
                    },
                    ao_landline_number: {
                        minlength: 10,
                        maxlength: 20,
                        required: true
                    },
                    ao_email: {
                        minlength: 3,
                        maxlength: 100,
                        required: true,
                        email: true
                    },
                    ao_primary_contact: {
                        maxlength: 50,
                        required: true
                    },
                    ao_primary_contact_number: {
                        minlength: 10,
                        maxlength: 20,
                        required: true
                    },
                    ao_secondary_contact: {
                        maxlength: 50,
                        required: false
                    },
                    ao_secondary_contact_number: {
                        maxlength: 20,
                        required: false
                    },
                    ao_website: {
                        maxlength: 100,
                        required: false
                    },
                    ao_established_year: {
                        maxlength: 4,
                        required: false
                    },
                    ao_no_of_employees: {
                        maxlength: 20,
                        required: false
                    },
                    ao_annual_turnover: {
                        maxlength: 20,
                        required: false
                    },
                    ao_certifications: {
                        maxlength: 500,
                        required: false
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#add_vendor_org-form')).fadeIn(500);
                    scrollTo($('#add_vendor_org-form'), -100);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#add_vendor_org').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
            //Update Vendor Organization form validation
            $('#update_vendor_org-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    uo_org: {
                        minlength: 3,
                        maxlength: 100,
                        required: true
                    },
                    uo_short_name: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    uo_address: {
                        minlength: 5,
                        maxlength: 500,
                        required: true
                    },
                    uo_city: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    uo_state: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    uo_country: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    uo_pincode: {
                        maxlength: 20,
                        required: true
                    },
                    uo_landline_number: {
                        minlength: 10,
                        maxlength: 20,
                        required: true
                    },
                    uo_email: {
                        minlength: 3,
                        maxlength: 100,
                        required: true,
                        email: true
                    },
                    uo_primary_contact: {
                        maxlength: 50,
                        required: true
                    },
                    uo_primary_contact_number: {
                        minlength: 10,
                        maxlength: 20,
                        required: true
                    },
                    uo_secondary_contact: {
                        maxlength: 50,
                        required: false
                    },
                    uo_secondary_contact_number: {
                        maxlength: 20,
                        required: false
                    },
                    uo_website: {
                        maxlength: 100,
                        required: false
                    },
                    uo_established_year: {
                        maxlength: 4,
                        required: false
                    },
                    uo_no_of_employees: {
                        maxlength: 20,
                        required: false
                    },
                    uo_annual_turnover: {
                        maxlength: 20,
                        required: false
                    },
                    uo_certifications: {
                        maxlength: 500,
                        required: false
                    },
                    uo_is_active: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#update_vendor_org-form')).fadeIn(500);
                    scrollTo($('#update_vendor_org-form'), -100);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#update_vendor_org').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });

            //Add Plnat form validation
            $('#add_vendor_plant-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    ap_org: {
                        required: true
                    },
                    ap_org_name: {
                        required: true
                    },
                    ap_plant_name: {
                        minlength: 3,
                        maxlength: 100,
                        required: true
                    },
                    ap_plant_short_name: {
                        minlength: 2,
                        maxlength: 50,
                        required: true
                    },
                    ap_plant_type: {
                        required: true
                    },
                    ap_address: {
                        minlength: 5,
                        maxlength: 100,
                        required: true
                    },
                    ap_city: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ap_state: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ap_country: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    ap_pincode: {
                        minlength: 3,
                        maxlength: 20,
                        required: true
                    },
                    ap_landline_number: {
                        minlength: 10,
                        digits: true,
                        required: false
                    },
                    ap_email: {
                        minlength: 3,
                        maxlength: 100,
                        required: true,
                        email: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#add_vendor_plant-form')).fadeIn(500);
                    scrollTo($('#add_vendor_plant-form'), -100);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#add_vendor_plant').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
            //Add Plnat form validation
            $('#update_vendor_plant-form').validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    up_org: {
                        required: true
                    },
                    up_plant_name: {
                        minlength: 3,
                        maxlength: 100,
                        required: true
                    },
                    up_plant_short_name: {
                        minlength: 3,
                        maxlength: 50,
                        required: true
                    },
                    up_plant_type: {
                        required: true
                    },
                    up_address: {
                        minlength: 5,
                        maxlength: 100,
                        required: true
                    },
                    up_city: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    up_state: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    up_country: {
                        minlength: 3,
                        maxlength: 40,
                        required: true
                    },
                    up_pincode: {
                        minlength: 3,
                        maxlength: 20,
                        required: true
                    },
                    up_landline_number: {
                        minlength: 10,
                        digits: true,
                        required: false
                    },
                    up_primary_contact: {
                        minlength: 3,
                        maxlength: 50,
                        required: true
                    },
                    up_primary_contact_number: {
                        minlength: 10,
                        digits: true,
                        required: false
                    },
                    up_secondary_contact: {
                        minlength: 3,
                        maxlength: 50
                    },
                    up_secondary_contact_number: {
                        minlength: 10,
                        required: false
                    },
                    up_email: {
                        minlength: 3,
                        required: true,
                        email: true
                    },
                    up_website: {
                        minlength: 3,
                        maxlength: 40,
                        required: false
                    },
                    up_established_year: {
                        minlength: 4,
                        required: true
                    },
                    up_no_of_employees: {
                        required: true
                    },
                    up_annual_turnover: {
                        required: true
                    },
                    up_certifications: {
                        required: true
                    },
                    up_is_active: {
                        required: true
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    $('.alert-danger', $('#update_vendor_plant-form')).fadeIn(500);
                    scrollTo($('#update_vendor_plant-form'), -100);
                },
                submitHandler: function (form) {
                    if (submit_handler_error_exists(form)) {
                        return false;
                    }
                    $('#update_vendor_plant').attr("disabled", true);
                    loading.show();
                    form.submit();
                }
            });
        });
        $(document).on("keyup", ".to_up_case", (e) => lm_text.upper_case(e.target));
        $(document).on("keyup", ".to_low_case", (e) => lm_text.lower_case(e.target));
        $(document).on('keyup', '.org', (e) => x_vms_organization_exist($(e.target).val(), (result) => ajax_respone_handler_value_exist(result, $(e.target))));
        $(document).on('keyup', '.org_short_name', (e) => x_vms_organization_short_name_exist($(e.target).val(), (result) => ajax_respone_handler_value_exist(result, $(e.target))));
        $(document).on('keyup', '.plant', (e) => x_vms_plant_exist(lm_dom.find_in_parent(e.target, 'form', '.org_id').val(), $(e.target).val(), (result) => ajax_respone_handler_value_exist(result, $(e.target))));
        $(document).on('keyup', '.plant_short_name', (e) => x_vms_plant_short_name_exist(lm_dom.find_in_parent(e.target, 'form', '.org_id').val(), $(e.target).val(), (result) => ajax_respone_handler_value_exist(result, $(e.target))));
        //update Vendor organization
        $(document).on("click", ".update_vendor_org", (e) => $.each($(e.target).closest("td").data("org_details"), (key, value) => $('#update_vendor_org-form').find(`.${key}`).val(value)));
        //Add Vendor Plant
        $(document).on("click", ".add_vendor_plant", function () {
            lm_dom.reset_child('#add_vendor_plant-form');
            $('#add_vendor_plant-form').find(".org_id").val($(this).closest("td").data("org_details").org_id);
            $('#add_vendor_plant-form').find(".org_name").val($(this).closest("td").data("org_details").org_name);
        });
        //update Vendor Plant
        $(document).on("click", ".update_vendor_plant", (e) => $.each($(e.target).closest("td").data("plant_details"), (key, value) => $('#update_vendor_plant-form').find(`.${key}`).val(value)));
        //update Vendor Plant
        $(document).on("click", ".show_vendor_plant", function () {
            loading.show();
            x_get_vms_plants($(this).closest("td").data("org_details").org_id, '', '', '', '', '', function (result) {
                let table = ($.fn.dataTable.isDataTable('#show_vendow_plants_tbl')) ? $('#show_vendow_plants_tbl').DataTable() : null;
                if (typeof result === 'object') {
                    table.clear().draw();
                    $.each(result, function (key, val) {
                        table.row.add([key + 1, val['org_name'], val['plant_name'], val['plant_short_name'], val['type'], val['address'], val['city'], val['state'], val['country'], val['pincode'], val['landline_number'], val['email'], val['primary_contact'], val['primary_contact_number'], val['secondary_contact'], val['secondary_contact_number'], val['website'], val['established_year'], val['no_of_employees'], val['annual_turn_over'], val['certifications'], val['is_active']]).draw(true);
                    });
                }
                loading.hide();
            });
        });


    <?php echo '</script'; ?>
>



<?php }
}
