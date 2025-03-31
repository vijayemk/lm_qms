<?php
/* Smarty version 3.1.30, created on 2024-10-01 13:26:38
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/ams/templates/add_ams1.ams.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fbf88e8ebcd7_03723712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbb0486b63a81be3ba0b68d51fa8266501951761' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/ams/templates/add_ams1.ams.tpl',
      1 => 1720087980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_66fbf88e8ebcd7_03723712 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard"> Home </a> </li>
            <li class="active"> QMS </li>
            <li class="active"> AMS </li>
            <li class="active"> Add Audit Schedule</li>
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
        <div class="modal-wide-width">
            <div class="modal-content">
                <div class="modal-header vd_bg-blue vd_white">
                    <h4 class="modal-title font-semibold" id="myModalLabel"><b>AUDIT MANAGEMENT</b></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="modal-footer background-login ">
                            <div class="">
                                <button class="btn vd_bg-green vd_white"  id="new_aduit" data-toggle="modal" data-target="#modal_add_schedule" data-action="add_ams" onclick="set_id('','',this);"><i class="fa fa-solid fa-plus"></i> New</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mgtp-20">
                        <div class="table-responsive">
                           <?php if (!empty($_smarty_tpl->tpl_vars['audit_schedule_list']->value)) {?>
                            <table class="table table-bordered table-striped" id="data-tables-audit-schedule">
                                <thead class="vd_bg-blue vd_white" style="white-space: nowrap" >
                                    <tr>
                                        <th><?php echo template_get_attribute_name(array('module'=>'admin','attribute'=>"sl_no"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"am_schd_no"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"am_type"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"am_sub_type"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"desc"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"audit_date_from"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"audit_date_to"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"crt_by"),$_smarty_tpl);?>
</th>
                                        <th><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>"action"),$_smarty_tpl);?>
</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['audit_schedule_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?> 
                                        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
">
                                            <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td> 
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['schedule_no'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['audit_type_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['audit_sub_type_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['from_date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['to_date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
</td>
                                            <td style='white-space: nowrap'>
                                                 <button class="btn vd_bg-green vd_white get_schedule_details"  data-toggle="modal" data-target="#modal_initiate_schedule" onclick="set_id('<?php echo $_smarty_tpl->tpl_vars['item']->value['schedule_no'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
',this);"><i class="fa fa-spinner" aria-hidden="true"></i> Initiate Audit</button>
                                                 <button class="btn vd_bg-grey vd_white edit_audit" data-toggle="modal" data-target="#modal_add_schedule" data-action="edit_ams" onclick="set_id('','<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
',this);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                 <button class="btn vd_bg-red vd_white" data-toggle="modal" data-target="#modal_cancel_schedule" onclick="set_id('<?php echo $_smarty_tpl->tpl_vars['item']->value['schedule_no'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
',this);"><i class="fa fa-times" aria-hidden="true" ></i> Cancel</button>
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
                                <i class="fa fa-exclamation-circle append-icon"></i> No Audit Sheduled Yet! Click on  New  Button To Schedule One.
                            </div>
                            <?php }?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--start of scedule audit modal -->
<div class="modal fade in" id="modal_add_schedule" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog width-60">
        <div class="modal-content ">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title font-semibold" id="edit_ModalLabel">SCHEDULE AUDIT</h4>
            </div>
              <!--Start Add AMS Form -->
              <div class="modal-body">
                   <form name="add_ams-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal mgtp-20" role="form" id="add_ams-form" autocomplete="off">
                       <div class="alert alert-danger vd_hidden">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                           <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                       </div>
                       <div class="alert alert-success vd_hidden">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                           <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                       </div>
                        <input type="hidden" class="audit_id" name="object_id"></input>
                        <input type="hidden" class="audit_sub_type_id"></input>
                       <div class="form-group">
                           <div class="col-md-12">
                               <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_type"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                               <div class="controls col-sm-4">
                                   <select class="width-80 required" name="am_type" id="am_type"  onchange = "get_audit_no()";  title="Select Valid Type">
                                       <option value="">Select</option>
                                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['amtypelist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                           <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['object_id'] == $_smarty_tpl->tpl_vars['audit_type_id']->value) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                   </select>
                               </div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12">
                               <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>'ams','attribute'=>'am_sub_type'),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                               <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                   <select class="width-80" name="am_sub_type" id="am_sub_type" required title="Select Valid Sub Type">
                                       <option value="">Select</option>
                                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                           <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['sub_type'];?>
</option>
                                       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                   </select>
                               </div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12">
                               <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_schd_no"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                               <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                   <input type="text" placeholder="Min 3 - Max 40" class="width-80 required" name="am_no" id="am_no"  value="" readonly  required title="Valid AMS No">
                               </div>
                           </div>
                       </div>
                               <div class="form-group" id="inter_audit_location_div" style="display:none">
                               <div class="col-md-12" >
                                   <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_department"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                                   <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                       <select class="width-80" name="inter_audit_location" id="inter_audit_location" onchange = get_dept_users(this.options[this.selectedIndex].value); title="Select Valid Audit Location">
                                           <option value="">Select Department</option>
                                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deptlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                               <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
 </option>
                                           <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                       </select>
                                   </div>
                               </div>
                                
                           </div>
                       <div class="form-group">
                           <div class="col-md-12">
                               <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"from"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                               <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                   <input type="text"  class="width-80 required" placeholder="DD/MM/YY" name="audit_date_from" id="audit_date_from"  required title="Select Valid Date">
                               </div>
                               <div id="exist_error_audit_from_date_message"></div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12">
                               <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"to"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                               <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                   <input type="text" disabled  class="width-80 required" placeholder="DD/MM/YY" name="audit_date_to" id="audit_date_to"  required title="Select Valid Date">
                               </div>
                               <div id="exist_error_audit_to_date_message"></div>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-md-12">
                               <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"desc"),$_smarty_tpl);?>
 <span class="vd_red">*</span></label>
                               <div id="first-name-input-wrapper"  class="controls col-sm-9">
                                   <textarea placeholder="Min 3 - Max 1000" class="width-80" rows="6" name="objectives" id="objectives"   required title="Enter Valid Objectives"></textarea>
                               </div>
                           </div>
                       </div>
                       <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                       <div class="form-group">
                           <div class="col-md-12">
                             <div class="modal-footer background-login ">
                                 <div class="">
                                     <button type="button" class="btn vd_btn vd_bg-red clear_form" ><i class="fa fa-refresh" aria-hidden="true"></i> Clear</button>
                                     <button class="btn vd_bg-green vd_white"  id="add_ams" name="add_ams"><i class="fa fa-clock-o" aria-hidden="true"></i> Schedule</button>
                                 </div>
                             </div>
                           </div>
                       </div>
                   </form>
              </div>
        <!-- End AMS Form -->
        </div>
    </div>
</div>
<!--end of schedule audit modal -->
<!--start of cancel audit modal -->
<div class="modal fade in" id="modal_cancel_schedule" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog width-30">
        <div class="modal-content">
            <div class="modal-header vd_bg-red vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title font-semibold" id="">CANCEL AUDIT</h4>
            </div>
            <div class="modal-body">
                <b> Cancel Audit No - <span class="audit_no"></span> </b>
                <input type="hidden" class="audit_id"></input>
                 <div class="modal-footer background-login ">
                    <div class="">
                        <button type="button" class="btn vd_btn vd_bg-red " data-dismiss="modal" >No</button>
                        <button class="btn vd_bg-green vd_white delete_audit" >Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end of cancel audit modal -->
<!--start of initiate audit modal -->
<div class="modal fade in" id="modal_initiate_schedule" tabindex="-1" role="dialog" aria-labelledby="edit_ModalLabel" aria-hidden="false" style="display: none;">
    <div class="modal-dialog width-50">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title font-semibold" id="">INITIATE AUDIT</h4>
            </div>
            <div class="modal-body">
              <form name="initiate_ams-form" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal mgtp-20" role="form" id="initiate_ams-form" autocomplete="off">
                <div class="alert alert-danger vd_hidden">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                     <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                 </div>
                 <div class="alert alert-success vd_hidden">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                     <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                 </div>
                  <input type="hidden" class="audit_id" name="object_id"></input>
                <div class="row mgbt-sm-20">
                     <div class="form-group">
                        <div class="col-md-12 mgbt-sm-20" >
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"am_schd_no"),$_smarty_tpl);?>
</label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-4">
                                   <input type="text" placeholder="Min 3 - Max 40" class="width-100 required am_no"  value="" readonly  required title="Valid AMS No">
                            </div>
                             <label class="control-label  col-sm-1"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"type"),$_smarty_tpl);?>
</label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-4">
                               <input type="text" placeholder="Min 3 - Max 40" class="width-100 required am_type"  value="" readonly  required title="Valid AMS No">                     
                            </div>
                        </div> 
                    </div>
                     <div class="form-group ">
                        <div class="col-md-12" >
                            <label class="control-label  col-sm-2"><?php echo template_get_attribute_name(array('module'=>"ams",'attribute'=>"audit_lead"),$_smarty_tpl);?>
<span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                <select class="width-80" name="department" id="department" onchange = get_audit_lead_users(this.options[this.selectedIndex].value); title="Select Valid Department">
                                    <option value="">Select Department</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deptlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
 </option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                            </div>
                            <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                <select class="width-80 required" name="audit_lead" id="usr_id" title="Select Valid User">
                                    <option value="">Select User</option>
                                </select>                                                                
                            </div>
                        </div> 
                    </div>
                </div>
                 <div class="modal-footer background-login mgtp-sm-20">
                    <div class="">
                        <button type="button" class="btn vd_btn vd_bg-red " data-dismiss="modal" >Cancel</button>
                        <button class="btn vd_bg-green vd_white initiate_audit" type="submit" name="initiate_ams">Initiate</button>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<!--end of initiate audit modal -->
                                             

    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
   

<?php }
}
