<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Audit Trail</li>
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
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green vd_bd-green">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Audit Trail</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form name="view_audit" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="view_audit-form">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="audit" attribute="audit_section"} <span class="vd_red">*</span></label>
                                    <div class="controls">
                                        <select class="width-60" name="audit_section" id="audit_section"  onchange="search_audit_trial();" >
                                            <option value="">Select</option>
                                            <optgroup label="Administration">
                                                <option value="business_object">Business Object</option>
                                                <option value="department">Department</option>
                                                <option value="designation">Designation</option>
                                                <option value="num_seq">Number Sequence</option>
                                                <option value="org">Organization</option>
                                                <option value="plant">Company</option>
                                                <option value="permision">Permission</option>
                                                <option value="reminder_mail">Reminder Mail</option>
                                                <option value="sop_expiry_year">SOP Expiry Year</option>
                                                <option value="sop_extend_days">SOP Extend Days</option>
                                                <option value="sop_print_copy">SOP Print Copy</option>
                                                <option value="sop_type">SOP Type</option>
                                                <option value="sop_reason">SOP Reason</option>
                                                <option value="format_no">Format Numbers</option>
                                                <option value="exam_passmark">Exam Passmark</option>
                                                <option value="exam_attempt">Exam Attempt Limit</option>
                                                <option value="sub_business_object">Sub Business Object</option>
                                                <option value="user">User</option>
                                            </optgroup>
                                            <optgroup label="Login/Logout">
                                                <option value="login_logout_info">Login/Logout Info</option>
                                            </optgroup>
                                            <optgroup label="Password">
                                                <option value="password_expiry">Password Expiry</option>
                                            </optgroup>
                                            <optgroup label="Request">
                                                <option value="signup_workflow">Signup</option>
                                                <option value="user_exit_workflow">User Exit</option>
                                            </optgroup>
                                            <optgroup label="SOP">
                                                <option value="sop_workflow">SOP Workflow</option>
                                            </optgroup>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-2" id="sop_type1" style="display:none">
                                    <label class="control-label">{attribute_name module="audit" attribute="sop_type"}</label>
                                    <div class="controls">
                                        <select class="width-60" name="sop_type" id="sop_type"  onchange = get_sop_list(this.options[this.selectedIndex].value);>
                                            <option value="">Select</option>
                                                {foreach name=list item=item key=key from=$soptypelist}
                                                    <option value="{$item.object_id}">{$item.type}</option>
                                                {/foreach}
                                        </select>
                                    </div>
                                    <div class="controls" id="sop_id1" style="display:none">
                                        <label class="control-label">{attribute_name module="audit" attribute="sop_name"}</label>
                                        <div class="controls">
                                            <select class="width-60" name="sop_no" id="sop_no"  onchange="search_audit_trial();">
                                                <option value="">Select</option>
                                                {foreach name=list item=item key=key from=$soplist}
                                                    <option value="{$item.sop_object_id}">{$item.sop_name}</option>
                                                {/foreach}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="audit" attribute="year"}</label>
                                    <div class="controls">
                                        <select class="width-60" name="year" id="year" onchange=search_audit_trial();>
                                            <option value="">Select</option>
                                            {foreach name=list item=item key=key from=$year_range}
                                                <option value="{$item}">{$item}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <label class="control-label">{attribute_name module="audit" attribute="month"}</label>
                                    <div class="controls">
                                        <select class="width-60" name="month" id="month" onchange=search_audit_trial();>
                                            <option value="">Select</option>
                                            {foreach name=list item=item key=key from=$month_range}
                                                <option value="{$key}">{$item}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="audit" attribute="department"}</label>
                                    <div class="controls">
                                        <select class="width-60"  name="department" id="department" onchange = get_users(this.options[this.selectedIndex].value);>
                                            <option value="">Select</option>
                                            {foreach name=list item=item key=key from=$deptlist}
                                                <option value="{$key}">{$item}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <label class="control-label">{attribute_name module="audit" attribute="user_name"}</label>
                                    <div class="controls">
                                        <select class="width-60"  name="userid" id="userid" onchange="search_audit_trial();"></select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label">{attribute_name module="audit" attribute="date"} From</label>
                                    <div class="controls">
                                        <input type=text name="date_from" id="datepicker-from" placeholder="DD/MM/YYYY HH:MM:SS">
                                    </div>
                                    <label class="control-label">{attribute_name module="audit" attribute="date"} To</label>
                                    <div class="controls">
                                        <input type=text name="date_from" id="datepicker-to" placeholder="DD/MM/YYYY HH:MM:SS">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                <div class="col-sm-12"> <span class="menu-icon"><input type="button" id="search_button" name="search" value="Search" class="btn vd_btn vd_bg-green vd_white" onClick="search_audit_trial();"></span> </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body" style="display:none" id="result_area1"> 
                        <table id="output_table" class="table table-bordered table-striped" width="100%"></table>
                    </div>
                    <div class="panel-body" style="display:none" id="result_area2"> 
                        <div class="alert alert-danger alert-dismissable alert-condensed">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="icon-cross"></i></button>
                            <i class="fa fa-exclamation-circle append-icon"></i><strong>Oh snap!</strong> Records Not Found 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
    <!-- Javascript =============================================== --> 
    <script type="text/javascript" src="js/jquery.js"></script> 
    <!-- Placed at the end of the document so the pages load faster --> 
   <script type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript">
        $(window).load(function() {
            "use strict";
            $( "#datepicker-normal" ).datepicker({ dateFormat: 'dd/mm/yy'});
            $( "#datepicker-multiple" ).datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true,
                    dateFormat: 'dd/mm/yy'
            });	
            $( "#datepicker-from" ).datepicker({
                    defaultDate: "+1w",
                    dateFormat: 'dd/mm/yy 00:00:00',
                    changeMonth: true,
                    numberOfMonths: 2,
                    onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
            });
            $( "#datepicker-to" ).datepicker({
                    defaultDate: "+1w",
                    dateFormat: 'dd/mm/yy 00:00:00',
                    changeMonth: true,
                    numberOfMonths: 2,
                    onClose: function( selectedDate ) {
                    $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                    }
            });	
            $( "#datepicker-icon" ).datepicker({ dateFormat: 'dd M yy'});
            $( '[data-datepicker]' ).click(function(e){ 
                    var data=$(this).data('datepicker');
                    $(data).focus();
            });
            $( "#datepicker-restrict" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });	
            $( "#datepicker-widget" ).datepicker();	


            $('#datepicker-daterangepicker').daterangepicker( {
                ranges: {
                           'Today': [moment(), moment()],
                           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                           'Last 7 Days': [moment().subtract('days', 6), moment()],
                           'Last 30 Days': [moment().subtract('days', 29), moment()],
                           'This Month': [moment().startOf('month'), moment().endOf('month')],
                           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment()
                  },
                  function(start, end) {
                          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            );	

            $('#datepicker-datetime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
            $('#timepicker-default').timepicker();
            $('#timepicker-full').timepicker({
                minuteStep: 1,
                template: false,
                showSeconds: true,
                showMeridian: false,
            });
        })
        function search_audit_trial() {
            var audit_section=document.getElementById("audit_section").value;
            if(audit_section!="sop_workflow"){
                var reset_sop_no = document.getElementById("sop_no")
                var reset_sop_type = document.getElementById("sop_type")
                reset_sop_no.selectedIndex = 0;
                reset_sop_type.selectedIndex = 0;
            }
            if(audit_section==""){
                alert("Pls Select Audit Section");
                document.getElementById("audit_section").focus();
                document.getElementById("audit_section").style.borderColor='red';
            }else{
                document.getElementById("audit_section").style.borderColor='';
            }
            var year=document.getElementById("year").value;
            var month=document.getElementById("month").value;
            var department=document.getElementById("department").value;
            var userid=document.getElementById("userid").value;
            var date_from=document.getElementById("datepicker-from").value;
            var date_to=document.getElementById("datepicker-to").value;
            var sop_no=document.getElementById("sop_no").value;
            var sop_type=document.getElementById("sop_type").value;
        
            document.getElementById("sop_id1").style.display="none";
            document.getElementById("sop_type1").style.display="none";
        
            if(year==""){
                var year="NA";
            }if(month==""){
                var month="NA";
            }if(department==""){
                var department="NA";
            }if(userid==""){
                var userid="NA";
            }if(date_from==""){
                var date_from="NA";
            }if(date_to==""){
                var date_to="NA";
            }if(sop_type==""){
                var sop_type="NA";
            }if(sop_no==""){
                var sop_no="NA";
            }
        
            if(audit_section=="business_object"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sub_business_object"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="num_seq"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="department"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="designation"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="org"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="plant"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="permision"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="reminder_mail"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sop_expiry_year"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sop_extend_days"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sop_print_copy"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sop_type"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sop_reason"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="format_no"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="exam_passmark"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="exam_attempt"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="user"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="sop_workflow"){
                document.getElementById("sop_type1").style.display="block";
                document.getElementById("sop_id1").style.display="block";
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1); 
            }if(audit_section=="login_logout_info"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1);
            }if(audit_section=="password_expiry"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1);
            }
            if(audit_section=="signup_workflow"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1);
            }if(audit_section=="user_exit_workflow"){
                x_search_audit_trial_type1(audit_section,year,month,department,userid,date_from,date_to,sop_no,sop_type,list_audit_result1);
            } 
        }
    
        function list_audit_result1(result) {
            if(result==0){
                clear_table('output_table')
                document.getElementById('result_area1').style.display="none";
                document.getElementById('result_area2').style.display="block";
                //alert("No Results Found");
            }else{
                clear_table('output_table');
                document.getElementById('result_area1').style.display="block";
                document.getElementById('result_area2').style.display="none";
                start=0;
                var dataSet=[];
                for (var y in result)  {
                    var result_array = result[y] 
                    if (result_array.object_id){
                        start=start+1;
                        var new_data = "<div style='white-space: pre-wrap; word-wrap: break-word;'>" + result_array.post_data + "</div>";
                        var old_data = "<div style='white-space: pre-wrap; word-wrap: break-word;'>" + result_array.old_value + "</div>";
                        dataSet.push([result_array.user, result_array.ip_address, result_array.date, result_array.action, new_data,old_data, result_array.status])
                    }
                }
                $(document).ready(function() {
                    $('#output_table').dataTable( {
                        destroy: true,
                        data: dataSet,
                        columns: [
                            { title: "User Name" },
                            { title: "IP Address" },
                            { title: "Date" },
                            { title: "Action" },
                            { title: "New Value" },
                            { title: "Old Value" },
                            { title: "Status" }
                        ],
                        pagingType: "full_numbers",
                        mark:true,
                        dom: 'Bfrtip',lengthMenu: [
                            [ 10, 25, 50, -1 ],
                            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                        ], 
                        buttons: [
                            'pageLength',
                            {
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: {
                                    columns: ':visible'
                                },download: 'open',
                                message: 'Audit Trail',

                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':visible'
                                },
                            },
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible',
                                },
                            },
                            {
                                extend: 'copy',
                                exportOptions: {
                                    columns: ':visible'
                                },
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                message: 'Audit Trail',
                            },
                            {
                                extend: 'colvis',
                                postfixButtons: [ 'colvisRestore' ]
                            }
                        ],
                    } );
                } );
            }
            //document.getElementById("sop_no").value=document.getElementById("sop_no").value
            //document.getElementById("sop_type").value=document.getElementById("sop_type").value
        }
        function clear_table(tab_name) {
            var table_obj=document.getElementById(tab_name);
            for (i=table_obj.rows.length;i>1;i--) {
                var row_ind=table_obj.rows[1].rowIndex
                table_obj.deleteRow(row_ind)
            }
        }
        function setTable(advanced_search) {
            if(document.getElementById(advanced_search).style.display=="none"){
                document.getElementById(advanced_search).style.display="block";
            } else if(document.getElementById(advanced_search).style.display=="block"){
                document.getElementById(advanced_search).style.display="none";
            }
        }
        function get_users(value){
            search_audit_trial();
            x_get_all_dept_users(value,list_users); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
        }
        function list_users(users){
            var dept_users_obj=document.getElementById("userid");
            for (i=dept_users_obj.length;dept_users_obj.length>0;i--) { // Remove Existing Options
                dept_users_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                dept_users_obj.add(addy,null);
            }
            catch(ex)
            {
                dept_users_obj.add(addy);
            }
            for (var y in users) {
                var users_array = users[y]           //Taking each value from array
                var addy=document.createElement('option'); //Insert the values in to select box
                addy.id=users_array.user_id
                addy.text=users_array.user_name
                addy.value=users_array.user_id
                try {
                    dept_users_obj.add(addy,null); // standards compliant
                }
                catch(ex) {
                    dept_users_obj.add(addy); // IE only
                }
            }	
        }
        function get_sop_list(value){
            search_audit_trial();
            x_get_soplist_by_sop_type(value,list_sop); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
        }
        function list_sop(result){
            var sop_no_obj=document.getElementById("sop_no");
            for (i=sop_no_obj.length;sop_no_obj.length>0;i--) { // Remove Existing Options
                sop_no_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                sop_no_obj.add(addy,null);
            }
            catch(ex)
            {
                sop_no_obj.add(addy);
            }
            for (var y in result) {
                var results_array = result[y]           //Taking each value from array
                var addy=document.createElement('option'); //Insert the values in to select box
                addy.id=results_array.sop_object_id
                addy.text=results_array.sop_name
                addy.value=results_array.sop_object_id
                try {
                    sop_no_obj.add(addy,null); // standards compliant
                }
                catch(ex) {
                    sop_no_obj.add(addy); // IE only
                }
            }
        }
        document.onkeyup = function( evt ) {
            if( ( window.event || evt ).keyCode == 13 ) {
                search_audit_trial(); 
            }
        }
    </script>
{/literal}
