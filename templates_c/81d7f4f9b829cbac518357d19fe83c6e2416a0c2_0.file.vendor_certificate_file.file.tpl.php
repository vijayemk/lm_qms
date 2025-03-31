<?php
/* Smarty version 3.1.30, created on 2024-10-02 07:41:03
  from "/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/vendor_certificate_file.file.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66fcf90f2c31b8_07289655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81d7f4f9b829cbac518357d19fe83c6e2416a0c2' => 
    array (
      0 => '/inelplm/www/html/lm_qms_atul_22sep24/lib/file/templates/vendor_certificate_file.file.tpl',
      1 => 1727854858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66fcf90f2c31b8_07289655 (Smarty_Internal_Template $_smarty_tpl) {
?>
<br>
<div style="border: 8px solid #23709e;padding: 10px;margin: 20px;">
    <br>
    <table>
        <tr>
            <td align="center" style="width:100%;font-weight: bold;font-family:verdana;color: #23709e">
                <span style="font-size: 35px;"><i> VENDOR QUALIFICATION CERTIFICATE </i></span>
            </td> 
        </tr>
    </table>
    <br><br><br><br>
    <table>
        <tr>
            <td align="center" style="width:100%;font-size: 20px;font-weight: bold;color: red">Certificate No : <?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vm_no;?>
</td> 
        </tr>
    </table>
    <br><br><br><br>
    <table style="font-size: 28px;">
        <tr>
            <td align="center" style="width:100%;font-weight: bold;"><u><i>To whom it may concern</i></u></td> 
        </tr>
    </table>
    <div style="height: 20px;"></div>
    <table style="font-size: 18px;">
        <tr>
            <td align="center" style="width:97%;"> This is to certify that <?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->org_name;?>
 , <?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->plant_name;?>
, located at <?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->address;?>
 has been reviewed and approved as an accepted vendor for <?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->created_by_plant_name;?>
.</td> 
        </tr>
    </table>
    <br><br><br>
    <table style="font-size: 20px;">
        <tr>
            <td align="center" style="width:100%;"> <u>Details Of Vendor</u></td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Vendor Name : </td> 
            <td style="width:50%;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->org_name;?>
</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Vendor Type : </td> 
            <td style="width:50%;"><?php echo $_smarty_tpl->tpl_vars['vm_plant_obj']->value->type;?>
</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Approval Status : </td> 
            <td style="width:50%;font-weight: bold;<?php if ($_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status != 'Qualified') {?>color: red"<?php } else { ?> color: green"}<?php }?>><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status;?>
</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Audit Dates : </td> 
            <td style="width:50%;font-weight: bold;"><?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_from_date),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable1),$_smarty_tpl);?>
 - <?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->audit_to_date),$_smarty_tpl);
$_prefixVariable2=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable2),$_smarty_tpl);?>
</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Validity Period : </td> 
            <td style="width:50%;font-weight: bold;"><?php if ($_smarty_tpl->tpl_vars['vm_master_obj']->value->vendor_status == 'Qualified') {
ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->effective_from),$_smarty_tpl);
$_prefixVariable3=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable3),$_smarty_tpl);?>
 - <?php ob_start();
echo display_date_format(array('var'=>$_smarty_tpl->tpl_vars['vm_master_obj']->value->effective_to),$_smarty_tpl);
$_prefixVariable4=ob_get_clean();
echo display_hypen_if_null(array('var'=>$_prefixVariable4),$_smarty_tpl);
} else { ?>N/A<?php }?></td> 
        </tr>
    </table>
    <br><br><br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Certified By : </td> 
            <td style="width:50%;"><?php echo $_smarty_tpl->tpl_vars['vm_master_obj']->value->created_by_plant_name;?>
</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Approved By : </td> 
            <td style="width:50%;"><?php echo $_smarty_tpl->tpl_vars['qa_approver']->value;?>
 <img src="img/custom_logicmind_img/valid.jpg" width="15px" height="15px" /></td> 
        </tr>
    </table><br><br><br>

</div><?php }
}
