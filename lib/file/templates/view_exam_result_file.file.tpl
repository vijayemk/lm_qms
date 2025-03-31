<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th align="center" width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>SECTION - 1 : ONLINE EXAM</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>User Name</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;">{$exam_details_array[0]['assigned_to']}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Department</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;">{$exam_details_array[0]['assigned_to_dept']}</td>
        </tr>
        <tr>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Minimum Passmark</b></td>
            <td align="left" width="20%" style="border:1px solid #000000;">{$exam_details_array[0]['pass_mark']}</td>
            <td align="left" width="20%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
            <td align="left" width="40%" style="border:1px solid #000000;">{$exam_details_array[0]['status']}</td>
        </tr>
    </tbody>
</table>
<div style="height: 10%;"></div>
<table cellspacing=" 0" cellpadding="8" border="0">
    <thead>
        <tr>
            <th width="100%" style="border:1px solid #000000;background-color:#23709e;color:white;"><b>1.1 : Exam Attempt Details</b></th>
        </tr>
    </thead>
    <thead>
        <tr>
            <td align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Assigned Date</b></td>
            <td align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Completed Date</b></td>
            <td align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Marks Scored</b></td>
            <td align="center" width="10%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Result</b></td>
            <td align="center" width="9%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Attempt</b></td>
            <td align="center" width="11%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Status</b></td>
            <td align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>CAPA No.</b></td>
            <td align="center" width="15%" style="border:1px solid #000000;background-color:#E5E5E5;"><b>Tracking No.</b></td>
        </tr>
    </thead>
    <tbody>
        {if !empty($exam_details_array)}
            {foreach item=item key=key from=$exam_details_array}
                <tr>
                    <td width="15%" style="border:1px solid #000000;">{display_if_null var={display_datetime var=$item.assigned_date}}</td>
                    <td width="15%" style="border:1px solid #000000;">{display_if_null var={display_datetime var=$item.completed_date}}</td>
                    <td width="10%" style="border:1px solid #000000;">{display_if_null var=$item.marks_scored}</td>
                    <td width="10%" style="border:1px solid #000000;">{display_if_null var=$item.result}</td>
                    <td width="9%" style="border:1px solid #000000;">{display_if_null var=$item.attempt}</td>
                    <td width="11%" style="border:1px solid #000000;">{display_if_null var=$item.status}</td>
                    <td width="15%" style="border:1px solid #000000;">{$item.capa_no}</td>
                    <td width="15%" style="border:1px solid #000000;">{display_if_null var=$item.int_details.tracking_no}</td>
                </tr>
            {/foreach}
        {else}
            <tr>
                <td width="center" align="center" style="border:1px solid #000000;"><b>Records Not Found</b></td>
            </tr>
        {/if}
    </tbody>
</table>