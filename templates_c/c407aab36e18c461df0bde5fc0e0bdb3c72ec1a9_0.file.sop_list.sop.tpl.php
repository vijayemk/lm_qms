<?php
/* Smarty version 3.1.30, created on 2024-10-05 19:45:01
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/sop/templates/sop_list.sop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_670149e52c6943_76799080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c407aab36e18c461df0bde5fc0e0bdb3c72ec1a9' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/sop/templates/sop_list.sop.tpl',
      1 => 1633500369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670149e52c6943_76799080 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">List of SOP </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> SOP List </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="panel widget light-widget">
                            <div class="panel-body">
                                <form name="sop_list" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="sop_list-form" autocomplete="off">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                <select class="width-100" name="sop_type" id="sop_type" onchange = addList('type',this.options[this.selectedIndex].value); required title="Select Valid SOP Type">
                                                    <option value="">All SOP Type</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['soptypelist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->object_id;?>
" <?php if ($_smarty_tpl->tpl_vars['sop_type_id']->value == $_smarty_tpl->tpl_vars['item']->value->object_id) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->type;?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                <select class="width-100" name="sop_plant" id="sop_plant" onchange = addList('plant',this.options[this.selectedIndex].value); required title="Select Valid Company">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['usr_plant_id']->value == $_smarty_tpl->tpl_vars['item']->value['plant_id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                <select class="width-100" name="published_status" id="published_status" onchange = addList('status',this.options[this.selectedIndex].value); required title="Select Valid Published Status">
                                                    <option value="">All</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['published_status']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['pub_status']->value == $_smarty_tpl->tpl_vars['item']->value) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label  col-sm-3">Count </label>
                                            <div id="first-name-input-wrapper"  class="controls col-sm-9">
                                                <input type="text" placeholder="Sop Count" class="width-80 required" name="sop_count" value="<?php echo $_smarty_tpl->tpl_vars['sop_count']->value;?>
" readonly title="SOP Count">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['sop_list']->value)) {?>
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
                                                    <th>Is Latest Revision</th>
                                                    <th>Published Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                                    <tr >
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_no'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_type'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['revision'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['supersedes'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['effective_date'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry_date'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['is_latest_revision'];?>
</td>
                                                        <td ><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
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
                        orientation: 'portrait',
                        pageSize: 'A4',
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
    <?php echo '</script'; ?>
>

<?php }
}
