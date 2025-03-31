<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - 1 : VENDOR DETAILS</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit Tracking Number</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;">{$vm_master_obj->vm_no}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Vendor Name</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;">{$vm_master_obj->vendor_org_name}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Plant Name</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;">{$vm_master_obj->vendor_plant_name}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b> Approval Status</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;color:{if $vm_master_obj->vendor_status eq 'Qualified'}green{elseif $vm_master_obj->vendor_status eq 'Dis Qualified'}red{else}black{/if}"><b>{$vm_master_obj->vendor_status}</b></td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Contact Name</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;">{$vm_plant_obj->primary_contact}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b> Contact Number</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;">{$vm_plant_obj->primary_contact_number}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Address</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;">{$vm_plant_obj->address}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Email</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;">{$vm_plant_obj->email}</td>
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
            <td align="left" width="20%" style="border:1px solid #000000;">{display_date var=$vm_master_obj->audit_from_date}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Audit To Date</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;">{display_date var=$vm_master_obj->audit_to_date}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Scope</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;">{$vm_master_obj->scope}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Objectives</b></td>
            <td align="left" width="80%" style="border:1px solid #000000;">{$vm_master_obj->objectives}</td>
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
        {if !empty($vm_agenda_list[0].sub_category[0].observation)}
            {foreach item=item key=key from=$vm_agenda_list}
                <tr>
                    <td rowspan="{$item.sub_category|@count*2+2}" width="7%" align="justify" style="border:1px solid #000000;">{$key+1}</td>
                    <td width="73%" align="justify" style="border:1px solid #000000;">{$item.category_name}</td>
                    <td width="20%" align="center" style="border:1px solid #000000;">{$item.category_score}</td>
                </tr>
                <tr>
                    <td width="7%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sl No</td>
                    <td width="46%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Category</td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Classification</td>
                    <td width="20%" align="center" style="border:1px solid #000000;background-color:#E5E5E5;">Sub Score Weightage</td>
                </tr>
                {foreach item=item1 key=key1 from=$item.sub_category}
                    <tr>
                        <td width="7%" align="justify" style="border:1px solid #000000;">{$key1+1}</td>
                        <td width="46%" align="justify" style="border:1px solid #000000;">{$item1.sub_category_name}</td>
                        <td width="20%" align="justify" style="border:1px solid #000000;">{$item1.classification_name}</td>
                        <td width="20%" align="center" style="border:1px solid #000000;">{display_if_null var=$item1.score}</td>
                    </tr>
                    <tr style="background-color:#F0B27A;">
                        <td colspan="3" align="justify" style="border:1px solid #000000;"><b>NC Type : </b>{$item1.nc}{$item1.conformity1}
                            <br><br><b>Severity Level : </b>{$item1.severity_level1}
                            <br><br><b>Observation : </b>{$item1.nc}<br>{$item1.observation}
                            <br><br><b>{if $item1.severity_level neq 'Good Observation'}Action To Be Taken {else}Justification{/if}: </b><br>{$item1.just_action_to_be_taken}
                        </td>
                        <td width="20%" align="justify" style="border:1px solid #000000;"><b>Scored : </b>{$item1.score1}/{$item1.score}</td>
                    </tr>
                {/foreach}
            {/foreach}
        {else}
            <tr><td align="center" width="100%" style="border:1px solid #000000;"><b>Records Not Found</b></td> </tr>
        {/if}
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
            <td align="left" width="50%" style="border:1px solid #000000;">{$vm_master_obj->audit_lead_name}</td>
            <td align="left" width="40%" style="border:1px solid #000000;">{$audit_lead_email}</td>
        </tr>
    </tbody>
</table>

