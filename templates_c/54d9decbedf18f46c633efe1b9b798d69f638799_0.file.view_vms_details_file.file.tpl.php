<?php
/* Smarty version 3.1.30, created on 2024-10-02 07:23:36
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/view_vms_details_file.file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fcf4f8937263_60044198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54d9decbedf18f46c633efe1b9b798d69f638799' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/view_vms_details_file.file.tpl',
      1 => 1727853815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66fcf4f8937263_60044198 (Smarty_Internal_Template $_smarty_tpl) {
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
 : INITIATION OF VENDOR AUDIT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Audit No. </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vm_no;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->created_by_name;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_lead_name),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->created_by_plant_name;?>
</td></tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Dept.</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_lead_dept),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->created_by_dept_name;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Company</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_lead_plant),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Initiation</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->created_time;?>
</td>

            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Status</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;color:<?php if ($_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status == 'Qualified') {?>green<?php } elseif ($_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status == 'Dis Qualified') {?>red<?php }?>;"><b><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status;?>
</b></td>             
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Score</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->final_score),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->approval_status;?>
</td>      
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->status;?>
 - [<?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->wf_status;?>
]</td>          
            </tr>
        </tbody>
    </table>
    <!--Section -1.2 Devaition Details -->
    <div style="height:10%;"></div>
    <table cellspacing="0" cellpadding="8" border="0">
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white">
                <b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Vendor Details</b>
            </td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Organization</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->org_name;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->plant_name;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Short Name</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->plant_short_name),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Type</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->type;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Contact No.</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->landline_number),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->email),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Address</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->address;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>City</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->city;?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>State</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->state;?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Country</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->country;?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Pincode</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->pincode),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Primary Contact</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->primary_contact),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Primary Contact No.</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->primary_contact_number),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Secondary Contact</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->secondary_contact),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Secondary Contact No.</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->secondary_contact_number),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Established Year</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->established_year),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Website</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->website),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>No. Of Employees</b></td>
            <td align="justify" width="20%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->no_of_employees),$_smarty_tpl);?>
</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Annual Turnover</b></td>
            <td align="justify" width="40%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->annual_turn_over),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Certifications</b></td>
            <td align="justify" width="80%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_plant_obj']->value->certifications),$_smarty_tpl);?>
</td>
        </tr>
    </table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'agenda' || $_smarty_tpl->tpl_vars['rtype']->value == 'observation' || $_smarty_tpl->tpl_vars['rtype']->value == 'feedback') {?>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : AUDIT</b></th>
            </tr>
        </thead>
    </table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'agenda') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Agenda</b></td>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['vm_agenda_list']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['item']->value['sub_category'])+2;?>
" width="7%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="73%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_name'];?>
</td>
                        <td width="20%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_score'];?>
</td>
                    </tr>
                    <tr style="background-color:#E59866;">
                        <td width="7%" align="center" style="border:1px solid #000000;">Sl No</td>
                        <td width="46%" align="center" style="border:1px solid #000000;">Sub Category</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">Classification</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">Sub Score Weightage</td>
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
                            <td width="20%" align="justify" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['classification_name']),$_smarty_tpl);?>
</td>
                            <td width="20%" align="center" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['score']),$_smarty_tpl);?>
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Audit Schedule</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit From Date</b></td>
                <td width="25%" align="justify" style="border:1px solid #000000;"><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_from_date),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
</td>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
                <td width="25%" align="justify" style="border:1px solid #000000;"><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_to_date),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable2),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->scope),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Objectives</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->objectives),$_smarty_tpl);?>
</td>
            </tr>
        </thead>
    </table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Audit Plan</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date</b></td>
                <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Time (From)</b></td>
                <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Time (To)</b></td>
                <td width="45%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plan</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['vm_audit_plan']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_audit_plan']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td width="10%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['from_time'];?>
</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['to_time'];?>
</td>
                        <td width="45%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['plan'];?>
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Auditors</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="40%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditor</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['vm_auditors']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_auditors']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td width="10%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="40%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_plant'];?>
</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_dept'];?>
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height: 10%;"></div>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Auditees</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="40%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditee</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Conatct No.</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['vm_auditees']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_auditees']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td width="10%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="40%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_name'];?>
</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_email'];?>
</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_contact'];?>
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 QA Approval Comments</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['qa_approve_array']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qa_approve_array']->value, 'item', false, 'key');
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'observation') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Audit Findings</b></td>
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
                        <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                        <td width="46%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sub Category</b></td>
                        <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Classification</b></td>
                        <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sub Score Weightage</b></td>
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
                            <td width="20%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item1']->value['classification_name'];?>
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Audit Finding Review1 Comments</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['audit_findings_review1_comments']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['audit_findings_review1_comments']->value, 'item', false, 'key');
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'feedback') {?>
    <?php if (!empty($_smarty_tpl->tpl_vars['vm_agenda_list']->value[0]['sub_category'])) {?>
        <div style="height: 10%;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Audit Findings Completion</b></td>
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
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['item']->value['sub_category'])*3+2;?>
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
                            <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['conformity1'];?>

                                <br><br><b>Severity Level : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level1'];?>

                                <br><br><b>Observation : </b><br><?php echo $_smarty_tpl->tpl_vars['item1']->value['observation'];?>

                                <br><br><b><?php if ($_smarty_tpl->tpl_vars['item1']->value['nc'] != 'Good Observation') {?>Action To Be Taken <?php } else { ?>Justification<?php }?>: </b><br><?php echo $_smarty_tpl->tpl_vars['item1']->value['just_action_to_be_taken'];?>

                            </td>
                            <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['score1'];?>
/<?php echo $_smarty_tpl->tpl_vars['item1']->value['score'];?>
</td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['item1']->value['conformity1'] == 'Conformance') {?>
                            <!-- No NC -->
                            <tr style="background-color:#C39BD3;">
                                <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['conformity1'];?>

                                    <br><br><b>Severity Level : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level1'];?>

                                </td>
                                <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['score1'];?>
/<?php echo $_smarty_tpl->tpl_vars['item1']->value['score'];?>
</td>
                            </tr>
                        <?php } else { ?>
                            <!-- With NC -->
                            <tr style="background-color:#C39BD3;">
                                <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['conformity2'];?>

                                    <br><br><b>Severity Level : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level2'];?>

                                    <br><br><b>Vendor Comments : </b><br><?php echo $_smarty_tpl->tpl_vars['item1']->value['vendor_comments'];?>
</td>
                                <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b><?php echo $_smarty_tpl->tpl_vars['item1']->value['score2'];?>
/<?php echo $_smarty_tpl->tpl_vars['item1']->value['score'];?>
</td>
                            </tr>
                        <?php }?>
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

            </tbody>
        </table>
    <?php } else { ?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
            </thead>
        </table>
    <?php }
}
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Audit Finding Review2 Comments</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['audit_findings_review2_comments']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['audit_findings_review2_comments']->value, 'item', false, 'key');
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
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
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
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="left" width="100%" style="border:1px solid #000000;background-color:#17A589;color:white;"><b>Digitally Signed By</b></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['esign_user_dtls']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['esign_user_dtls']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <th width="20%"><?php echo $_smarty_tpl->tpl_vars['item']->value['esign_type'];?>
</th>
                        <th width="25%">
                            <img src="img/custom_logicmind_img/valid.jpg" width="15px" height="15px"/> <?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>

                        </th>
                        <th width="20%"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</th>
                        <th width="20%"><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
</th>
                        <th align="right" width="15%">fsdf</th>
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
if ($_smarty_tpl->tpl_vars['rtype']->value == 'manual_entry') {?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" align="center" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>AUDIT OBSERVATION</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="83%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vm_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                <tr>
                    <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['item']->value['sub_category'])*2+2;?>
" width="7%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                    <td width="83%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_name'];?>
</td>
                    <td width="10%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_score'];?>
</td>
                </tr>
                <tr>
                    <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sl No</td>
                    <td width="76%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Score Weightage</td>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['sub_category'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                    <tr>
                        <td width="7%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key1']->value+1;?>
</td>
                        <td width="76%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_category_name'];?>
</td>
                        <td width="10%" align="center" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['score']),$_smarty_tpl);?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['category_score'];?>
</td>
                    </tr>
                    <tr style="background-color:#F0B27A;">
                        <td colspan="2" align="justify" style="border:1px solid #000000;">
                            <br><b>Findings / Observation : </b><br><br><br><br><br><br><br><br><br><br><br><br>
                        </td>
                        <td width="10%" align="justify" style="border:1px solid #000000;"><b>Scored : </b><br><br>
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

        </tbody>
    </table>
<?php }
}
}
