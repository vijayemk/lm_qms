<?php
/* Smarty version 3.1.30, created on 2024-09-28 05:12:49
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/view_dms_details_file.file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66f79051506c98_63870289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfd659ab6a3bf31ce7046033b1882bff8461c149' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/view_dms_details_file.file.tpl',
      1 => 1724506082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66f79051506c98_63870289 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--Section -1 Inititaion -->
<?php $_smarty_tpl->_assignInScope('section', 0);
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : INITIATION OF DEVIATION</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Deviation No. </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_no;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->created_by_name;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Deviation Type </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_type_name;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->plant_name;?>
</td></tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Classification</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->classification_name;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->dm_department_name;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Occurrence</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->date_of_occurrence;?>
 <?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->time_of_occurrence;?>
 </td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reporting Time</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->created_time;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Discovery</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->date_of_discovery;?>
 <?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->time_of_discovery;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->approval_status;?>
</td>             
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->target_date;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Date</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->close_out_date;?>
</td>             
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completion Date</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->completed_date;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->status;?>
 - [<?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->wf_status;?>
]</td>          
            </tr>
        </tbody>
    </table>
    <!--Section -1.1 Devaition Realted To -->
    <div style="height:10%;"></div>
    <table cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Deviation Related To</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['dev_related_to_list']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dev_related_to_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td width="100%" style="border:1px solid #000000;"><b><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['dev_related_to'];?>
</b>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['dev_sub_related_to'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?><li><?php echo $_smarty_tpl->tpl_vars['item2']->value['sub_type'];?>
</li><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php } else { ?>
                <tr><td align="center" width="100%"><b>Records Not Found</b></td> </tr>
            <?php }?>
        </tbody>
    </table>

</table>
<!--Section -1.2 Devaition Details -->
<div style="height:10%;"></div>
<table cellspacing="0" cellpadding="8" border="0">
    <tr>
        <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Deviation Details</b></td>
    </tr>
    <tr>
        <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Description</b></td>
        <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->description;?>
</td>
    </tr>
    <tr>
        <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Risk Impact Asssessment</b></td>
        <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->risk_impact_assessment;?>
</td>
    </tr>
    <tr>
        <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Immediate Action taken</b></td>
        <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->immed_action_taken;?>
</td>
    </tr>
</table>
<!--Section -1.3 Repeteive DMS -->
<div style="height:10%;"></div>
<table cellspacing="0" cellpadding="8" border="0">
    <tr>
        <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Repetetive DMS</b></td>
    </tr>
    <tr>
        <td align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b><?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"sl_no"),$_smarty_tpl);?>
</b></td>
        <td align="center" width="80%" style="border:1px solid #000000;background-color:#E5E5E5;"><b><?php echo template_get_attribute_name(array('module'=>"dms",'attribute'=>"dm_no"),$_smarty_tpl);?>
</b></td>
    </tr>
    <?php if (!empty($_smarty_tpl->tpl_vars['dev_related_to_list']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rep_dms']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
            <tr>
                <td width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                <td width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['dm_no'];?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php } else { ?>
        <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
    <?php }?>
</table>
<!--Section -1.4 Product Details -->
<div style="height:10%;"></div>
<table cellspacing="0" cellpadding="8" border="0">
    <tr>
        <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Product Details</b></td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Material Type</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->material_type_name;?>
</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Material Name</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->material_name;?>
</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Product Name</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->product_name;?>
</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope / Market</b></td>
        <td  align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->market_name;?>
</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Customer</b></td>
        <td  align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->customer_name;?>
</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Batch No.</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->batch_no;?>
</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Batch Size</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->batch_size;?>
</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Lot No.</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->lot_no;?>
</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Stage </b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->process_stage_name;?>
</td>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Manufacturing Date</b></td>
        <td align="justify" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_date;?>
</td>
    </tr>
    <tr>
        <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b> Expiry Date</b></td>
        <td colspan="3" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->manu_expiry_date;?>
</td>
    </tr>
</table>
<!--Section - 2 REVIEW AND CFT ASSESSMENT -->
<div style="height:10%;"></div>
<?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : REVIEW AND CFT ASSESSMENT</b></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<!--Section - 2.1 Pre Review Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Pre Review Comments</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['pre_review_array']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pre_review_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </tbody>
</table>
<!--Section - 2.2 Department Head Approval Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Department Head Approval Comments</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['dept_appr_array']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dept_appr_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </tbody>
</table>
<!--Section -2.3 QA Review Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 QA Review Comments</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['qa_review_array']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qa_review_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </tbody>
</table>
<!--Section - 2.4 CFT Assesment -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 CFT Assesment</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['cft_array']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cft_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </tbody>
</table>
<!--Section - 2.5 Pre Approval Comments -->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Pre Approval Comments</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['pre_appr_array']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pre_appr_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td width="100%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                </tr>
                <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</td>
                    <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['date_time'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </tbody>
</table>
<!--Section -  3 : INVESTIGATION -->
<div style="height:10%;"></div>
<?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr> 
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : INVESTIGATION</b></th>
        </tr>
    </thead>
</table>
<!--Section -  3.1 Investigation Details-->
<?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_investigation_required == 'yes') {?>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Investigation Details</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Investigation Required</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_investigation_required),$_smarty_tpl);?>
</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Investigtor</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->investigated_by),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Iteration</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->iteration),$_smarty_tpl);?>
</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->target_date),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->status),$_smarty_tpl);?>
</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completion Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->completion_date),$_smarty_tpl);?>
</td>
            </tr>
        </tbody>
    </table>
    <!--Section -  3.2 Investigation-->
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Investigation</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Investigation Details</b></td>
                <td align="left" width="75%" style="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->investigation_details),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Investigation Feed Back</b></td>
                <td align="left" width="75%" style="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->investigator_feedback),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Probable Root Cause</b></td>
                <td align="left" width="75%" style="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->root_cause),$_smarty_tpl);?>
</td>
            </tr>
        </tbody>
    </table>
    <!--3.3 Investigation - Department Head Review-->
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Investigation - Department Head Review</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="100%" style ="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->dept_head_review),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="34%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->dept_head_name),$_smarty_tpl);?>
</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->dept_head_dept),$_smarty_tpl);?>
</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->dept_head_review_date),$_smarty_tpl);?>
</td>
            </tr>
        </tbody>
    </table>
    <!--3.4 Investigation Verification-->
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Investigation Verification</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="100%" style ="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->qa_reviewer_review),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="34%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->qa_reviewer),$_smarty_tpl);?>
</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->qa_reviewer_dept),$_smarty_tpl);?>
</td>
                <td width="33%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['latest_invest_details']->value->qa_reviewer_review_date),$_smarty_tpl);?>
</td>
            </tr>
        </tbody>
    </table>
<?php } else { ?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        </thead>
    </table>
<?php }?>
<!--SECTION - 4 : QA APPROVAL-->
<div style="height:10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : QA APPROVAL</b></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<table cellspacing=" 0" cellpadding="8" border="0">
    <tbody>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Meeting Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required),$_smarty_tpl);?>
</td>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Meeting Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->meeting_target_date),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Training Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required),$_smarty_tpl);?>
</td>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Training Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Exam Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required),$_smarty_tpl);?>
</td> 
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Exam Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->exam_target_date),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is Task Required</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required),$_smarty_tpl);?>
</td>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Task Target Date</b></td>
            <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->task_target_date),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Target Date</b></td>
            <td align="left" width="75%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->target_date),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->user_name;?>
</td>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->department;?>
</td>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->date;?>
</td>
            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status: </b><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->approval_status;?>
</td>
        </tr>
    </tbody>
</table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'meeting') {?>
    <!--SECTION - 5 : MEETING-->
    <div style="height:10%;"></div>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : MEETING</b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_meeting_required == 'yes') {?>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Schedule information</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date</b></td>
                    <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value->meeting_date1;?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Time: </b></td>
                    <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value->meeting_time;?>
</td>
                </tr>
                <tr>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Venue: </b></td>
                    <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['meeting_schedule']->value->venue;?>
</td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status: </b></td>
                    <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->meeting_status;?>
</td>
                </tr>
            </tbody>
        </table>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Agenda And Conclusion</b></td>
                </tr>
                <tr>
                    <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
                    <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Conclusion</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['meeting_agenda_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_agenda_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="50%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                            <td width="50%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['conclusion'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                <?php }?>
            </tbody>
        </table>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 List Of Invitees</b></td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td align="center" width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User</b></td>
                    <td align="center" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                    <td align="center" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['meeting_participant_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_participant_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['participant'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                <?php }?>
            </tbody>
        </table>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 List Of Attendess</b></td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User</b></td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                    <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['meeting_attendees_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['meeting_attendees_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['attendee'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td></tr>
            </thead>
        </table>
    <?php }
}
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'training') {?>
    <div style="height: 10%;"></div>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : TRAINING</b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_training_required == 'yes') {?>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Training Schedule Deatils</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['training_details']->value)) {?>
                    <tr>
                        <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Title : <?php echo $_smarty_tpl->tpl_vars['training_details']->value->title;?>
</b></td>
                        <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Trainer Name: <?php echo $_smarty_tpl->tpl_vars['training_details']->value->trainer_name;?>
 - <?php echo $_smarty_tpl->tpl_vars['training_details']->value->trainer_dept;?>
</b></td>
                        <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date : <?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->training_target_date),$_smarty_tpl);?>
</b></td>
                    </tr>
                    <?php if (!empty($_smarty_tpl->tpl_vars['training_details']->value->schedule_details)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['training_details']->value->schedule_details, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                            <tr>
                                <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Session : <?php echo $_smarty_tpl->tpl_vars['item1']->value['session'];?>
</b></td>
                                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date : <?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['training_date']),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['item1']->value['training_time'];?>
</b></td>
                                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Venue : <?php echo $_smarty_tpl->tpl_vars['item1']->value['venue'];?>
</b></td>
                            </tr>
                            <tr>
                                <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Invitees</b></td>
                                <td align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Attendess</b></td>
                            </tr>
                            <tr>
                                <td width="50%" style="border:1px solid #000000;">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['item1']->value['participants'])) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['participants'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                            <?php echo $_smarty_tpl->tpl_vars['item2']->value['trainee_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item2']->value['trainee_dept'];?>
]<br>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    <?php } else { ?>Records Not Found
                                    <?php }?>
                                </td>
                                <td width="50%" style="border:1px solid #000000;">
                                    <?php if ($_smarty_tpl->tpl_vars['item1']->value['attendees']) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['attendees'], 'item3');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item3']->value) {
?>
                                            <?php echo $_smarty_tpl->tpl_vars['item3']->value['trainee_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item3']->value['trainee_dept'];?>
]<br>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    <?php } else { ?>Records Not Found
                                    <?php }?>
                                </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php } else { ?>
                        <tr>
                            <td align="center" width="100%" style="border:1px solid #000000;"><b>Training Not Yet Scheduled</b></td>
                        </tr>
                    <?php }?>

                </tbody>
            </table>
        <?php }?>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    <?php }?>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : EXAM</b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_online_exam_required == 'yes') {?>
        <table cellspacing="0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td width="25%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>User</b></td>
                    <td width="10%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Attempt</b></td>
                    <td width="15%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Pass Mark</b></td>
                    <td width="15%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Marks Scored</b></td>
                    <td width="15%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Status</b></td>
                    <td width="10%" style="border:1px solid #000000;text-align:center;background-color:#E5E5E5;"><b>Result</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['exam_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['exam_details']->value, 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item1']->value['user_details'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                            <tr>
                                <td width="10%" style="border:1px solid #000000;text-align:center;"><?php echo $_smarty_tpl->tpl_vars['key2']->value+1;?>
</td>
                                <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item2']->value['assigned_to'];?>
</td>
                                <td width="10%" style="border:1px solid #000000;text-align:center;"><?php echo $_smarty_tpl->tpl_vars['item2']->value['attempt'];?>
</td>
                                <td width="15%" style="border:1px solid #000000;text-align:center;"><?php echo $_smarty_tpl->tpl_vars['item2']->value['pass_mark'];?>
</td>
                                <td width="15%" style="border:1px solid #000000;text-align:center;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['marks_scored']),$_smarty_tpl);?>
</td>
                                <td width="15%" style="border:1px solid #000000;text-align:center;"><?php echo $_smarty_tpl->tpl_vars['item2']->value['status'];?>
</td>
                                <td width="10%" style="border:1px solid #000000;text-align:center;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item2']->value['result']),$_smarty_tpl);?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr>
                        <td colspan="7" align="center" style="border:1px solid #000000;"><b>Records Not Found</b></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    <?php }
}?>

<?php if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'task') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : TASK</b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_task_required == 'yes') {?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;text-align:justify;background-color:#E5E5E5;" align="center"><b>Task Id</b></td>
                    <td width="35%" style="border:1px solid #000000;text-align:justify;background-color:#E5E5E5;" align="center"><b>Task</b></td>
                    <td width="55%" style="border:1px solid #000000;text-align:justify;background-color:#E5E5E5;text-align:justify;" align="center"><b>Task Comments</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['task_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['task_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                            <td width="35%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                            <td width="55%" style="border:1px solid #000000;text-align:justify;"><p><b>Secondary Person Comments :</b><br><b><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_by_name'];?>
 [<?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['created_date'];?>
]</b><br><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_sec_review_comments']['review_comments'];?>
</p>
                                <p><b>Primary Person Comments :</b><br><b><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_by_name'];?>
 [<?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['created_date'];?>
]</b><br><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_pri_review_comments']['review_comments'];?>
</p>
                                <p><b>Task Verification Comments :</b><br><b><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['created_by_name'];?>
 [<?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['created_date'];?>
]</b><br><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_creator_review_comments']['review_comments'];?>
</p>
                            </td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <tr>
                        <td  width="100%" style="border:1px solid #000000;"><b>Task QA Review :</b><br><b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->user_name;?>
 [<?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->close_out_date),$_smarty_tpl);?>
]</b><br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->task_qa_review),$_smarty_tpl);?>
</td>
                    </tr>
                <?php } else { ?>
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    <?php }?> 
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : CLOSE OUT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Comments</b></td>
                <td width="80%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['dm_master_obj']->value->close_out_comments;?>
</td>
            </tr>  
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is CAPA Required</b></td>
                <td width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_capa_required),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_capa_required == 'yes') {?>[<?php echo $_smarty_tpl->tpl_vars['capa_no']->value;?>
]<?php }?></td>
                <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></td>
                <td width="50%" style="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_ref']->value->reason),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Is CC Required</b></td>
                <td width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['dm_master_obj']->value->is_cc_required),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['dm_master_obj']->value->is_cc_required == 'yes') {?>[<?php echo $_smarty_tpl->tpl_vars['cc_no']->value;?>
]<?php }?></td>
                <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></td>
                <td width="50%" style="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['cc_ref']->value->reason),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['close_out']->value->user_name;?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['close_out']->value->department;?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['close_out']->value->date;?>
</td>
            </tr>
        </tbody>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : ACCESS RIGHTS</b></th>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></th>
                <th align="center" width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></th>
                <th align="center" width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></th>
            </tr>
        </thead>
        <?php if (!empty($_smarty_tpl->tpl_vars['access_rights']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['access_rights']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <th width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</th>
                    <th width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
</th>
                    <th width="50%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['dept_name'];?>
</th>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : INTERIM EXTENSION</b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['extension_details']->value) {?>   
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Extension For</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Requested By</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Exisiting Date</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Proposed Date</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['extension_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extension_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="15%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['extension_for'];?>
</td>
                            <td width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by_name'];?>
</td>
                            <td width="20%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['existing_target_date']),$_smarty_tpl);?>
</td>
                            <td width="20%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['proposed_target_date']),$_smarty_tpl);?>
</td>
                            <td width="15%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['approval_status'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    <?php }?>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : INTEGRATION </b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['integration_details']->value) {?>   
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <th align="center" width="5%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></th>
                    <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Destination Document</b></th>
                    <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tiggered By</b></th>
                    <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tiggered To</b></th>
                    <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Assingned To</b></th>
                    <th align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></th>
                    <th align="center" width="12%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tracking No</b></th>
                    <th align="center" width="8%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['integration_details']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['integration_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="5%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['dest_doc_no'];?>
<br><?php echo $_smarty_tpl->tpl_vars['item']->value['dest_doc_name'];?>
</td>
                            <td width="15%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_by_name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_date'];?>
</td>
                            <td width="15%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_to_name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_date'];?>
</td>
                            <td width="15%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['assigned_to_name']),$_smarty_tpl);?>
<br><?php echo $_smarty_tpl->tpl_vars['item']->value['assigned_date'];?>
</td>
                            <td width="20%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
</td>
                            <td width="12%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['tracking_no'];?>
</td>
                            <td width="8%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    <?php }?>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : ATTACHMENTS </b></th>
            </tr>
            <tr>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl no</b></th>
                <th align="center" width="40%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>File Name</b></th>
                <th align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Attached By</b></th>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Size</b></th>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Type</b></th>
                <th align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Towards</b></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['fileobjectarray']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fileobjectarray']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <th width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</th>
                        <th width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</th>
                        <th width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['attached_by'];?>
</th>
                        <th width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['friendly_size'];?>
</th>
                        <th width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</th>
                        <th width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['towards'];?>
</th>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php } else { ?>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            <?php }?>
        </tbody>
    </table>
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#17A589;color:white;"><b>Workflow Status</b></th>
            </tr>
            <tr>
                <th align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date</b></th>
                <th align="center" width="17%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User Name</b></th>
                <th align="center" width="13%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Designation</b></th>
                <th align="center" width="12%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></th>
                <th align="center" width="12%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></th>
                <th align="center" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Action</b></th>
                <th align="center" width="11%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>status</b></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['workflow_users_array']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['workflow_users_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <th width="15%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</th>
                        <th width="17%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</th>
                        <th width="13%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['desi'];?>
</th>
                        <th width="12%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</th>
                        <th width="12%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['department'];?>
</th>
                        <th width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</th>
                        <th width="11%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</th>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php } else { ?>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            <?php }?>
        </tbody>
    </table>
<?php }
}
}
