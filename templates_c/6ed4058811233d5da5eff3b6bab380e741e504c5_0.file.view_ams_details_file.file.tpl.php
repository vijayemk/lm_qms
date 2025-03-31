<?php
/* Smarty version 3.1.30, created on 2024-10-02 17:15:46
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/view_ams_details_file.file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fd326a444c86_32097257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ed4058811233d5da5eff3b6bab380e741e504c5' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/view_ams_details_file.file.tpl',
      1 => 1727869545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66fd326a444c86_32097257 (Smarty_Internal_Template $_smarty_tpl) {
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
 : INITIATION OF AUDIT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit No. </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_master_obj']->value->audit_no;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['initiator']->value;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead </b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['audit_lead_name']->value),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_plant']->value;?>
</td></tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Dept.</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['audit_lead_dept']->value),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_department']->value;?>
</td>
            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Lead Company</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['audit_lead_plant']->value),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date of Initiation</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_master_obj']->value->created_time;?>
</td>

            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Type</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['audit_type']->value;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Sub Type</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['audit_sub_type']->value;?>
</td>

            </tr>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit From Date</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_master_obj']->value->audit_date_from),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_master_obj']->value->audit_date_to),$_smarty_tpl);?>
</td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['audit_dept']->value) {?>
                <tr>
                    <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Plant</b></td>
                    <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['audit_plant']->value;?>
</td>
                    <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Dept.</b></td>
                    <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['audit_dept']->value;?>
</td>
                </tr>
            <?php }?>
            <tr>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="20%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_master_obj']->value->approval_status;?>
</td>      
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_master_obj']->value->status;?>
 - [<?php echo $_smarty_tpl->tpl_vars['am_master_obj']->value->wf_status;?>
]</td>          
            </tr>
        </tbody>
    </table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'agenda') {?>
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
    <?php if ($_smarty_tpl->tpl_vars['audit_type']->value == 'INTERNAL') {?>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="70%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditor</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['ams_agenda_list']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="70%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                            <td width="20%" align="justify" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item']->value['auditor_name']),$_smarty_tpl);?>
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
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="90%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['ams_agenda_list']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="90%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
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
}
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
                <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_master_obj']->value->audit_date_to),$_smarty_tpl);?>
</td>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
                <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['am_master_obj']->value->audit_date_to),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_master_obj']->value->scope),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="25%" align="left" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Objectives</b></td>
                <td width="75%" align="justify" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['am_master_obj']->value->objectives),$_smarty_tpl);?>
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
            <?php if (!empty($_smarty_tpl->tpl_vars['ams_audit_plan']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_audit_plan']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td width="10%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="15%" align="justify" style="border:1px solid #000000;"><?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['date']),$_smarty_tpl);?>
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
    <?php if ($_smarty_tpl->tpl_vars['audit_type']->value == 'INTERNAL') {?>
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
                <?php if (!empty($_smarty_tpl->tpl_vars['ams_auditors']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_auditors']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="40%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</td>
                            <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_dept_name'];?>
</td>
                            <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_plant_name'];?>
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
                <tr>
                    <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                    <td width="30%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Auditor</b></td>
                    <td width="30%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agency</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
                    <td width="15%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Contact</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['ams_auditors']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_auditors']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="30%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditor_name'];?>
</td>
                            <td width="30%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['ext_agency'];?>
</td>
                            <td width="15%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
                            <td width="15%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['contact_number'];?>
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
}
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height: 10%;"></div>
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
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant</b></td>
                <td width="25%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['ams_auditees']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_auditees']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td width="10%" align="center" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="40%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_name'];?>
</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_dept_name'];?>
</td>
                        <td width="25%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['auditee_plant_name'];?>
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
                        <td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Is Meeting Required </b></td>
                        <td width="70%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['am_master_obj']->value->is_meeting_required;?>
</td>
                    </tr>
                    <tr>
                        <td width="100%" style="border:1px solid #000000;text-align:justify"><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
</td>
                    </tr>
                    <tr>
                        <td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
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
                <td width="10%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="90%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Agenda</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['ams_agenda_list']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['item']->value['observation'])+1;?>
" width="10%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                        <td width="90%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['agenda'];?>
</td>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['observation'], 'item1', false, 'key1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
?>
                        <tr style="background-color:#E59866;">
                            <td width="90%" align="justify" style="border:1px solid #000000;"><b>Observation : </b> <?php echo $_smarty_tpl->tpl_vars['key1']->value+1;?>

                                <br><br><b>NC Type : </b> <?php echo $_smarty_tpl->tpl_vars['item1']->value['conformity'];?>

                                <br><br><b>Severity Level : </b> <?php echo $_smarty_tpl->tpl_vars['item1']->value['severity_level'];?>

                                <br><br><b>Is CAPA Required : </b> <?php echo $_smarty_tpl->tpl_vars['item1']->value['is_capa_required'];?>

                                <br><br><b>Observation Comments : </b><br><?php echo $_smarty_tpl->tpl_vars['item1']->value['observation'];?>

                                <br><br><b><?php if ($_smarty_tpl->tpl_vars['item1']->value['severity_level'] != 'Good Observation') {?>Action To Be Taken <?php } else { ?>Justification<?php }?>: </b><br><?php echo $_smarty_tpl->tpl_vars['item1']->value['action_to_be_taken'];?>

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
 Audit Findings Review Comments</b></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_smarty_tpl->tpl_vars['audit_findings_review_comments']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['audit_findings_review_comments']->value, 'item', false, 'key');
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
                <td width="73%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score Weightage</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ams_agenda_list']->value, 'item', false, 'key');
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
                    <td width="66%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
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
                        <td width="66%" align="justify" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item1']->value['sub_category_name'];?>
</td>
                        <td width="20%" align="center" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['item1']->value['default_score']),$_smarty_tpl);?>
</td>
                    </tr>
                    <tr style="background-color:#F0B27A;">
                        <td colspan="2" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>Conformance | Non Conformance
                            <br><br><b>Severity Level : </b>Good Observation (Go) | Major NC (Mn) | Minor NC (mn) | OFI (ofi)
                            <br><br><b>Observation : </b>
                            <br><br><br><br><br><br><br><br><b>Justification | Action To Be Taken : </b><br><br><br><br><br><br><br></td>
                        <td width="20%" align="justify" style="border:1px solid #000000;"><b>Score : </b><br>
                            <br>Go : <?php echo $_smarty_tpl->tpl_vars['item1']->value['default_score']*100/100;?>

                            <br>Mn : <?php echo $_smarty_tpl->tpl_vars['item1']->value['default_score']*0/100;?>

                            <br>mn : <?php echo $_smarty_tpl->tpl_vars['item1']->value['default_score']*50/100;?>

                            <br>ofi : <?php echo $_smarty_tpl->tpl_vars['item1']->value['default_score']*80/100;?>

                            <br></td>
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
    <div style="height: 20px;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>Severity Level</b></td>
            </tr>
        </thead>
    </table>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Sl No</b></td>
                <td width="20%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Category</b></td>
                <td width="10%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Score</b></td>
                <td width="60%" align="justify" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Descirption</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">1</td>
                <td width="20%" align="left" style="border:1px solid #000000;">Good Observation (Go)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">100%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Positive findings that highlight areas where processes or controls are effective and working well.</td>
            </tr>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">2</td>
                <td width="20%" align="justify" style="border:1px solid #000000;">Major NC (Mn)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">0%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Significant issues that have a serious impact on compliance or effectiveness and require immediate corrective action.</td>
            </tr>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">2</td>
                <td width="20%" align="justify" style="border:1px solid #000000;">Minor NC (mn)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">50%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Less severe issues that still need attention but do not pose an immediate threat. These may require corrective action but are not as urgent.</td>
            </tr>
            <tr>
                <td width="10%" align="justify" style="border:1px solid #000000;">4</td>
                <td width="20%" align="justify" style="border:1px solid #000000;">OFI (ofi)</td>
                <td width="10%" align="justify" style="border:1px solid #000000;">80%</td>
                <td width="60%" align="justify" style="border:1px solid #000000;">Areas where there is potential for enhancing processes or controls that are currently working but could be optimized.</td>
            </tr>
        </tbody>
    </table>
<?php }?>

<?php }
}
