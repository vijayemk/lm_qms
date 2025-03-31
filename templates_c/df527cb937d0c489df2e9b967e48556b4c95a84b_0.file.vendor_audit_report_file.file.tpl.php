<?php
/* Smarty version 3.1.30, created on 2024-10-02 07:13:16
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/vendor_audit_report_file.file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fcf28cb60692_71582752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df527cb937d0c489df2e9b967e48556b4c95a84b' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/vendor_audit_report_file.file.tpl',
      1 => 1727853190,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66fcf28cb60692_71582752 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - 1 : VENDOR DETAILS</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Tracking Number</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vm_no;?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Name</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_org_name;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant Name</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_plant_name;?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b> Approval Status</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;color:<?php if ($_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status == 'Qualified') {?>green<?php } elseif ($_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status == 'Dis Qualified') {?>red<?php } else { ?>black<?php }?>"><b><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status;?>
</b></td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Contact Name</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->primary_contact;?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b> Contact Number</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->primary_contact_number;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Address</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->address;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->email;?>
</td>
        </tr>
    </tbody>
</table>
<div style="height: 10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - 2 : AUDIT DETAILS</b></th>
        </tr>
    </thead>
</table>
<div style="height: 10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="left" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b> 2.1 : Audit Schedule Details </b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit From Date</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_from_date),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_to_date),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->scope;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Objectives</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->objectives;?>
</td>
        </tr>
    </tbody>
</table>
<div style="height: 10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - 3 : AUDIT OBSERVATION </b></th>
        </tr>
    </thead>
</table>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
            <td width="73%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
            <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($_smarty_tpl->tpl_vars['vm_agenda_list']->value[0]['sub_category'][0]['observation'])) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['item']->value['sub_category'])*2+2;?>
" width="7%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                    <td width="73%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_name'];?>
</td>
                    <td width="20%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_score'];?>
</td>
                </tr>
                <tr>
                    <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sl No</td>
                    <td width="46%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Classification</td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Score Weightage</td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sub_category'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                    <tr>
                        <td width="7%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key1']->value+1;?>
</td>
                        <td width="46%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_category_name'];?>
</td>
                        <td width="20%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item1']->value['classification_name'];?>
</td>
                        <td width="20%" align="center" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['score']),$_smarty_tpl);?>
</td>
                    </tr>
                    <tr style="background-color:#F0B27A;">
                        <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['nc'];
echo $_smarty_tpl->tpl_vars['item1']->value['conformity1'];?>

                            <br><br><b>Severity Level : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level1'];?>

                            <br><br><b>Observation : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['nc'];?>
<br><?php echo $_smarty_tpl->tpl_vars['item1']->value['observation'];?>

                            <br><br><b><?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] != 'Good Observation') {?>Action To Be Taken <?php } else { ?>Justification<?php }?>: </b><br><?php echo $_smarty_tpl->tpl_vars['item1']->value['just_action_to_be_taken'];?>

                        </td>
                        <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['score1'];?>
/<?php echo $_smarty_tpl->tpl_vars['item1']->value['score'];?>
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
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        <?php }?>
    </tbody>
</table>
<div style="height: 10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - 4 : CUSTOMER CONTACT DETAILS </b></th>
        </tr>
    </thead>
</table>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
            <td width="50%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name</b></td>
            <td width="40%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left" width="10%" style="border:1px solid #000000;">1</td>
            <td align="left" width="50%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_lead_name;?>
</td>
            <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['audit_lead_email']->value;?>
</td>
        </tr>
    </tbody>
</table>

<?php }
}
