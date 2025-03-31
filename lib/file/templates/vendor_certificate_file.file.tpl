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
            <td align="center" style="width:100%;font-size: 20px;font-weight: bold;color: red">Certificate No : {$vm_master_obj->vm_no}</td> 
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
            <td align="center" style="width:97%;"> This is to certify that {$vm_plant_obj->org_name} , {$vm_plant_obj->plant_name}, located at {$vm_plant_obj->address} has been reviewed and approved as an accepted vendor for {$vm_master_obj->created_by_plant_name}.</td> 
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
            <td style="width:50%;">{$vm_plant_obj->org_name}</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Vendor Type : </td> 
            <td style="width:50%;">{$vm_plant_obj->type}</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Approval Status : </td> 
            <td style="width:50%;font-weight: bold;{if $vm_master_obj->vendor_status neq 'Qualified'}color: red"{else} color: green"}{/if}>{$vm_master_obj->vendor_status}</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Audit Dates : </td> 
            <td style="width:50%;font-weight: bold;">{display_if_null var={display_date var=$vm_master_obj->audit_from_date}} - {display_if_null var={display_date var=$vm_master_obj->audit_to_date}}</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Validity Period : </td> 
            <td style="width:50%;font-weight: bold;">{if $vm_master_obj->vendor_status eq 'Qualified'}{display_if_null var={display_date var=$vm_master_obj->effective_from}} - {display_if_null var={display_date var=$vm_master_obj->effective_to}}{else}N/A{/if}</td> 
        </tr>
    </table>
    <br><br><br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Certified By : </td> 
            <td style="width:50%;">{$vm_master_obj->created_by_plant_name}</td> 
        </tr>
    </table>
    <br><br>
    <table style="font-size: 15px;">
        <tr>
            <td align="right" style="width:50%;">Approved By : </td> 
            <td style="width:50%;">{$qa_approver} <img src="img/custom_logicmind_img/valid.jpg" width="15px" height="15px" /></td> 
        </tr>
    </table><br><br><br>

</div>