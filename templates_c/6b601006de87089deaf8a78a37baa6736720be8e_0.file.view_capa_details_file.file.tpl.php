<?php
/* Smarty version 3.1.30, created on 2025-01-25 11:46:27
  from "/var/www/html/lm_qms/lib/file/templates/view_capa_details_file.file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_679481bbac7dd3_59212158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b601006de87089deaf8a78a37baa6736720be8e' => 
    array (
      0 => '/var/www/html/lm_qms/lib/file/templates/view_capa_details_file.file.tpl',
      1 => 1737785640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679481bbac7dd3_59212158 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--Section -1 Inititaion -->
<?php $_smarty_tpl->_assignInScope('section', 0);
if ($_smarty_tpl->tpl_vars['rtype']->value == '7') {?>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b>SECTION -  <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : INITIATION OF CAPA</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>CAPA No. </b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_no;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiator</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->created_by_name;?>
</td>
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Trigger Type </b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->trigger_type;?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Company</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->plant_name;?>
</td></tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Initiaton Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->created_time),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->capa_department_name;?>
</td>
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Source Document No.</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['source_doc_no']->value['source_doc_no'];?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->approval_status;?>
</td>             
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->target_date),$_smarty_tpl);?>
 </td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Date</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->close_out_date),$_smarty_tpl);?>
</td> 
            </tr>
            <tr>
                <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completion Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->completed_date),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
</td>
                <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
                <td align="left" width="34%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->status;?>
 - [<?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->wf_status;?>
]</td>          
            </tr>
        </tbody>
    </table>

    <!--Section -1.2 Devaition Details -->
    <div style="height:10%;"></div>
    <table cellspacing="0" cellpadding="8" border="0">
        <tr>
            <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 CAPA Details</b></td>
        </tr>
        <tr>
            <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Reason</b></td>
            <td align="justify" width="79%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->reason),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Present System | Discrepancy | Non-Conformity
                </b></td>
            <td align="justify" width="79%" style="border:1px solid #000000;white-space: pre-wrap;"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->present_system),$_smarty_tpl);?>
</td>
        </tr>
        <tr>
            <td align="left" width="21%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Corrections | Immediate Action Taken</b></td>
            <td align="justify" width="79%" style="border:1px solid #000000;white-space: pre-wrap;"><b><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->immed_action_taken_by;?>
 [<?php echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->immed_action_by_date),$_smarty_tpl);?>
]</b> <br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->immed_action_taken),$_smarty_tpl);?>
</td>
        </tr>
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
    <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->is_meeting_required == 'yes') {?>
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
                    <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->meeting_status;?>
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
 List Of Participnats</b></td>
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
                <tr><td align="center" width="100%" style="border:1px solid #000000;">Records Not Found</td></tr>
            </thead>
        </table>
    <?php }
}
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'ca_pa') {?>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : CORRECTIVE ACTION</b></th>
            </tr>
        </thead>
        <?php if (!empty($_smarty_tpl->tpl_vars['task_details']->value)) {?>
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>SL No</b></td>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Task ID</b></td>
                    <td width="80%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Corrective Action</b></td>
                </tr>
            </thead>
            <thead>
                <?php $_smarty_tpl->_assignInScope('sl_no', 0);
?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['task_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'ca') {?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php $_smarty_tpl->_assignInScope('sl_no', $_smarty_tpl->tpl_vars['sl_no']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['sl_no']->value;?>
</td>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                            <td width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                        </tr>
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </thead>
        <?php } else { ?>
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;">Records Not Found</td></tr>
            </thead>
        <?php }?>
    </table>
    <div style="height:10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : PREVENTIVE ACTION</b></th>
            </tr>
        </thead>
        <?php if (!empty($_smarty_tpl->tpl_vars['task_details']->value)) {?>
            <thead>
                <tr>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>SL No</b></td>
                    <td width="10%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Task ID</b></td>
                    <td width="80%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Preventive Action</b></td>
                </tr>
            </thead>
            <thead>
                <?php $_smarty_tpl->_assignInScope('sl_no', 0);
?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['task_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'pa') {?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php $_smarty_tpl->_assignInScope('sl_no', $_smarty_tpl->tpl_vars['sl_no']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['sl_no']->value;?>
</td>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['task_id'];?>
</td>
                            <td width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['task'];?>
</td>
                        </tr>
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </thead>
        <?php } else { ?>
            <thead>
                <tr><td align="center" width="100%" style="border:1px solid #000000;">Records Not Found</td></tr>
            </thead>
        <?php }?>
    </table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report') {?>
    <div style="height:10%;"></div>
    <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : REVIEW</b></th>
            </tr>
        </thead>
        <tbody>
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
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Implementation Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_target_date),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable2),$_smarty_tpl);?>
</td>
                <td align="left" width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Target Date</b></td>
                <td align="left" width="25%" style="border:1px solid #000000;"><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->target_date),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable3),$_smarty_tpl);?>
</td>
            </tr>
            <tr>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->user_name;?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->department;?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b><?php echo $_smarty_tpl->tpl_vars['qa_appr']->value->date;?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Approval Status: </b><?php echo $_smarty_tpl->tpl_vars['capa_master_obj']->value->approval_status;?>
</td>
            </tr>
        </tbody>
    </table>
<?php }
if ($_smarty_tpl->tpl_vars['rtype']->value == 'full_report' || $_smarty_tpl->tpl_vars['rtype']->value == 'task') {?>
    <div style="height: 10%;"></div>
    <table cellspacing=" 0" cellpadding="8" border="0">
        <thead>
            <tr>
                <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - <?php $_smarty_tpl->_assignInScope('section', $_smarty_tpl->tpl_vars['section']->value+1);
?> <?php echo $_smarty_tpl->tpl_vars['section']->value;?>
 : IMPLEMENTATION</b></th>
            </tr>
        </thead>
    </table>
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
                            <p><b>Dept. Head Review Comments :</b><br><b><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['created_by_name'];?>
 [<?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['created_date'];?>
]</b><br><?php echo $_smarty_tpl->tpl_vars['item']->value['latest_dept_head_review_comments']['review_comments'];?>
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
 [<?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->close_out_date),$_smarty_tpl);?>
]</b><br><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->task_qa_review),$_smarty_tpl);?>
</td>
                </tr>
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
 : CLOSE OUT</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Close Out Comments</b></td>
                <td width="80%" style="border:1px solid #000000;text-align:justify"><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['capa_master_obj']->value->close_out_comments),$_smarty_tpl);?>
</td>
            </tr>  
            <tr>
                <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Name: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['close_out']->value->user_name),$_smarty_tpl);?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['close_out']->value->department),$_smarty_tpl);?>
</td>
                <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Date: </b><?php echo display_hypen_if_null(array('var'=>$_smarty_tpl->tpl_vars['close_out']->value->date),$_smarty_tpl);?>
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
 : EFFECTIVENESS MONITORING</b></th>
            </tr>
        </thead>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['capa_master_obj']->value->is_monitoring_required == 'yes') {?>
        <?php $_smarty_tpl->_assignInScope('sub_section', 0);
?>
        <div style="height: 20px;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Responsible Persons</b></td>
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
                <?php if (!empty($_smarty_tpl->tpl_vars['moni_resp_per_array']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moni_resp_per_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="10%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
                            <td width="40%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['resp_per'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['plant'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
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
        <div style="height:10%;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Interim Feedback</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['moni_interim_feedback_comments_array']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moni_interim_feedback_comments_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="50%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Feed Back</b></td>
                            <td width="50%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['feedback'];?>
</td>
                        </tr>
                        <tr>
                            <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Effectiveness</b></td>
                            <td width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['effectiveness'];?>
</td>
                        </tr>
                        <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_by'];?>
</td>
                            <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_by_dept'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['date']),$_smarty_tpl);?>
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
        <div style="height:10%;"></div>
        <table cellspacing=" 0" cellpadding="8" border="0">
            <thead>
                <tr>
                    <td width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.<?php $_smarty_tpl->_assignInScope('sub_section', $_smarty_tpl->tpl_vars['sub_section']->value+1);
echo $_smarty_tpl->tpl_vars['sub_section']->value;?>
 Final Feedback</b></td>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_smarty_tpl->tpl_vars['moni_final_feedback_comments_array']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moni_final_feedback_comments_array']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <tr>
                            <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Feed Back</b></td>
                            <td width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['feedback'];?>
</td>
                        </tr>
                        <tr>
                            <td width="20%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Effectiveness</b></td>
                            <td width="80%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['effectiveness'];?>
</td>
                        </tr>
                        <tr><td width="30%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Name: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_by'];?>
</td>
                            <td width="45%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Department: </b><?php echo $_smarty_tpl->tpl_vars['item']->value['updated_by_dept'];?>
</td>
                            <td width="25%" style="border:1px solid #000000;background-color:#E5E5E5;background-color:#E5E5E5;"><b>Date: </b><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['date']),$_smarty_tpl);?>
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
<br><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['triggered_date']),$_smarty_tpl);?>
</td>
                            <td width="15%" style="border:1px solid #000000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['triggered_to_name'];?>
<br><?php echo display_datetime_format(array('var'=>$_smarty_tpl->tpl_vars['item']->value['triggered_date']),$_smarty_tpl);?>
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
