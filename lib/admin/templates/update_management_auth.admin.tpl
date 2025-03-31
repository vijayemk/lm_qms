<script>
    {include file="templates/insert_sajax.tpl"}
</script>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">
<link type="text/css" rel="stylesheet" href="vendors/multiselect-master/css/style.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Administration </li>
            <li class="active"><a href="index.php?module=admin&action=management_auth">Management Authorization</a> </li>
            <li class="active">Update </li>
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
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Update Management Authorization {$doc_short_name} </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <table class="table table-bordered table-striped" id="doc_data-tables">
                                            <thead>
                                                <tr>
                                                    {foreach item=item key=key from=$workflow_actionlist}
                                                        <th>{$item.action}</th>
                                                        {/foreach}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    {foreach item=item key=key from=$workflow_actionlist}
                                                        <td>
                                                            {foreach item=item1 key=key1 from=$auth_user_list}
                                                                {if $item.action eq $item1.action}
                                                                    {$item1.user_name}<br>
                                                                {/if}
                                                            {/foreach}
                                                        </td>
                                                    {/foreach}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="panel-body table-responsive">
                                        <form name="mgmt_auth_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="mgmt_auth_form" autocomplete="off">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="action"} <span class="vd_red">*</span></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-60" name="workflow_action" id="workflow_action" onchange="get_doc_mgmt_auth_users();" title="Select Valid Action">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$workflow_actionlist}
                                                                <option value="{$item.action}">{$item.action} </option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="plant_name"} </label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-60" name="plant" id="plant" onchange="get_org_plant_dept_list(this.options[this.selectedIndex].value)" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$plant_list}
                                                                <option value="{$item.plant_id}">{$item.plant_name} </option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="control-label  col-sm-2">{attribute_name module="admin" attribute="department"} </label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                                        <select class="width-60" name="department" id="department" onchange = get_filtered_doc_mgmt_auth_users(); title="Select Valid Department">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                    <div class="col-xs-5">
                                                        <select name="mgmt_auth_user_from[]" id="mgmt_auth_user" class="mgmt_auth_user form-control" size="7" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-xs-2"><br>
                                                        <button type="button" id="mgmt_auth_user_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="mgmt_auth_user_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="mgmt_auth_user_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="mgmt_auth_user_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <select name="mgmt_auth_user_to[]" id="mgmt_auth_user_to" class="form-control" size="7" multiple="multiple" title="Select valid user"></select>
                                                    </div>
                                                    <input name="doc_object_id" id ="doc_object_id" type="hidden" value="{$doc_object_id}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                        <button class="btn vd_bg-green vd_white" type="submit"  name="add_mgmt_user" id="add_mgmt_user">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>

    <script>
        function get_org_plant_dept_list(value){
            $('#mgmt_auth_user').find('option').remove().end();
            x_getPlantDeptList(value,list_dept);
        }
        function list_dept(result){
            var dept_obj=document.getElementById("department")
            for (i=dept_obj.length;dept_obj.length>0;i--) {
                dept_obj.remove (i)
            }
            var addy=document.createElement('option');
            addy.text="Select" ; 
            addy.value="";
            try {
                dept_obj.add(addy,null);
            }
            catch(ex) {
                dept_obj.add(addy);
            }
            for (var y in result) {
                var dept_array = result[y]
                var addy=document.createElement('option');
                addy.id=dept_array.department_id;
                addy.text=dept_array.department+" - ["+dept_array.full_name+"]";
                addy.value=dept_array.department_id
                try {
                    dept_obj.add(addy,null);
                }
                catch(ex) {
                    dept_obj.add(addy);
                }
            }
        }
        function get_filtered_doc_mgmt_auth_users() {
            var doc_object_id = $('#doc_object_id').val();
            var workflow_action = $('#workflow_action').val();
            var department = $('#department').val();

            if (doc_object_id != "") {
                var doc_object_id = doc_object_id
            } else {
                doc_object_id = "";
            }
            if (workflow_action != "") {
                var workflow_action = workflow_action
            } else {
                workflow_action = "";
            }
            if (department != "") {
                var department = department
            } else {
                department = "";
            }
            x_get_filtered_doc_mgmt_auth_users(doc_object_id, workflow_action, department, list_from_users);
        }
        function list_from_users(users) {
            var dept_users_obj = document.getElementById("mgmt_auth_user");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            for (var y in users) {
                var users_array = users[y];
                var addy = document.createElement('option');
                addy.id = users_array.user_id;
                addy.text = users_array.user_name;
                addy.value = users_array.user_id;
                try {
                    dept_users_obj.add(addy, null);
                } catch (ex) {
                    dept_users_obj.add(addy);
                }
            }
        }
        function get_doc_mgmt_auth_users() {
            var doc_object_id = $('#doc_object_id').val();
            var workflow_action = $('#workflow_action').val();
            if (doc_object_id != "") {
                var doc_object_id = doc_object_id
            } else {
                doc_object_id = "";
            }
            if (workflow_action != "") {
                var workflow_action = workflow_action
            } else {
                workflow_action = "";
            }
            var dept = "";
            x_get_doc_mgmt_auth_users(doc_object_id, workflow_action, dept, list_to_users);
        }
        function list_to_users(users) {
            var dept_users_obj = document.getElementById("mgmt_auth_user_to");
            for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
                dept_users_obj.remove(i)
            }
            for (var y in users) {
                var users_array = users[y];
                var addy = document.createElement('option');
                addy.id = users_array.user_id
                addy.text = users_array.user_name
                addy.value = users_array.user_id
                try {
                    dept_users_obj.add(addy, null);
                } catch (ex) {
                    dept_users_obj.add(addy);
                }
            }
        }
        $(document).ready(function ($) {
            $('.mgmt_auth_user').multiselect({
                search: {
                    left: '<input type="text"  class="form-control" placeholder="Search..." />',
                    right: '<input type="text"  class="form-control" placeholder="Search..." />',
                },
                fireSearch: function (value) {
                    return value.length > 1;
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            var form_submit = $('#mgmt_auth_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    workflow_action: {
                        required: true,
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#add_mgmt_user').attr("disabled", true);
                    form.submit();
                },

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#doc_data-tables').dataTable({
                pagingType: "full_numbers",
                mark: true,
                dom: 'Bfrtip', lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: ':visible'
                        }, download: 'open',
                        message: 'Management Autorization List',

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
                        message: 'Document List',
                    },
                    {
                        extend: 'colvis',
                        postfixButtons: ['colvisRestore']
                    }

                ],

            });
        });
    </script>

{/literal}
