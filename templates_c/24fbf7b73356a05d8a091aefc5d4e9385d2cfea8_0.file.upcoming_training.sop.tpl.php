<?php
/* Smarty version 3.1.30, created on 2025-02-19 16:31:28
  from "/var/www/html/lm_qms/lib/sop/templates/upcoming_training.sop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67b5ba08581688_01749673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24fbf7b73356a05d8a091aefc5d4e9385d2cfea8' => 
    array (
      0 => '/var/www/html/lm_qms/lib/sop/templates/upcoming_training.sop.tpl',
      1 => 1556868270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67b5ba08581688_01749673 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
                                        <?php if (isset($_smarty_tpl->tpl_vars['sop_training_array']->value)) {?>
                                            <table class="table table-bordered table-striped" id="upcoming_training_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"training_date"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_no"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_name"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"revision"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"trainer"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"department"),$_smarty_tpl);?>
</th>
                                                        <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"venue"),$_smarty_tpl);?>
</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_training_array']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                        <tr >
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['training_date'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_no'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_revision'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['trainer_name'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['trainer_dept'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['venue'];?>
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
                                        <?php }?>
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
                                            <?php if (isset($_smarty_tpl->tpl_vars['sop_oe_array']->value)) {?>
                                                <table class="table table-bordered table-striped" id="upcoming_oe_data-tables">
                                                    <thead>
                                                        <tr>
                                                            <th ><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_no"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"assigned_by"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"assigned_to"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"assigned_date"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"target_date"),$_smarty_tpl);?>
</th>
                                                            <th><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"attempt"),$_smarty_tpl);?>
</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_oe_array']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                            <tr >
                                                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_no'];?>
</td>
                                                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_by'];?>
</td>
                                                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_to'];?>
</td>
                                                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_date'];?>
</td>
                                                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['target_date'];?>
</td>
                                                                <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['attempt'];?>
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
                                            <?php }?>
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
                       

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Specific Page Scripts Put Here -->
    
    <?php echo '<script'; ?>
 type="text/javascript">
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
    <?php echo '</script'; ?>
>

<?php }
}
