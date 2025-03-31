<?php
/* Smarty version 3.1.30, created on 2025-01-25 11:24:07
  from "/var/www/html/lm_qms/lib/sop/templates/sop_dept_permission_list.sop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67947c7fc1f563_56989126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '950ad7fa05c91b287f2e21d1138e6dcfbf6cad9d' => 
    array (
      0 => '/var/www/html/lm_qms/lib/sop/templates/sop_dept_permission_list.sop.tpl',
      1 => 1661927109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67947c7fc1f563_56989126 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">View Access Matrix </li>
            <li class="active">SOP </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Access Matrix </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <form name="sop_list" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="sop_list-form" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <select class="width-100"  name="utranfer_from" id="utranfer_from" onchange = addList('access_type',this.options[this.selectedIndex].value); title="Select Valid Option">
                                                        <option value="">Select Option</option>
                                                        <option value="dept_wise" <?php if ($_smarty_tpl->tpl_vars['access_type']->value == 'dept_wise') {?> selected <?php }?>>Department Wise</option>
                                                        <option value="sop_wise" <?php if ($_smarty_tpl->tpl_vars['access_type']->value == 'sop_wise') {?> selected <?php }?>>SOP Wise</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php if ($_smarty_tpl->tpl_vars['access_type']->value == 'dept_wise') {?>
                                                <div class="col-md-6">
                                                    <div class="controls">
                                                        <select class="width-100"  name="utranfer_from" id="utranfer_from" onchange = addList('dept_id',this.options[this.selectedIndex].value); title="Select Valid Option">
                                                            <option value="">Select Department</option>
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_dept_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['department_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dept_id']->value == $_smarty_tpl->tpl_vars['item']->value['department_id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
]</option>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                        </select>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div><hr>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['sop_dept_per_list']->value)) {?>
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" id="sop_list_data-tables">
                                                <thead>
                                                    <tr>
                                                        <th>SOP No</th>
                                                        <th>SOP Type</th>
                                                        <th>SOP Name</th>
                                                        <th>Revision</th>
                                                        <th>Supersedes</th>
                                                        <th>Effective Date</th>
                                                        <th>Expiry Date</th>
                                                        <th>Published Status</th>
                                                        <th>Department View Access</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_dept_per_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                        <tr >
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['doc_no'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_type'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['revision'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['supersedes'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['effective_date'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry_date'];?>
</td>
                                                            <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['pub_status'];?>
</td>
                                                            <td ><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['dept_per_list'], 'item1', false, 'key1', 'list1', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
echo $_smarty_tpl->tpl_vars['item1']->value['dept_name'];?>
, <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
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
        function addList(text, value) {
            loc = window.location.href;
            var str = window.location.href;
            ind = str.lastIndexOf(text);
            //lastIndexOf funtion gives the position of the Last occurance of a string.
            if (value == "null") {
                match_position = loc.search(text);
                mainurl = location.href.substring(0, match_position - 1);
                location.href = mainurl
            } else {
                if (ind != -1) {
                    match_position = loc.search(text);
                    //Search funtion gives the position of the first occurance of a string.
                    mainurl = location.href.substring(0, match_position);
                    location.href = mainurl + text + "=" + value;
                } else {
                    location.href = loc + "&" + text + "=" + value;
                }
            }
        }
        $(document).ready(function () {
            $('#sop_list_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A3',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'SOP List',

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
                        message: 'SOP List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],

            });
        });
    <?php echo '</script'; ?>
>

<?php }
}
