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
            <li class="active">User Reporting </li>
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
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Reporting Structure</a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <form name="user_reporting_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="user_reporting_form" autocomplete="off">
                            <div class="alert alert-danger vd_hidden">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again.
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel widget">
                                        <div class="panel-body table-responsive">
                                            <h3>Select User</h3>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="department"} <span class="vd_red">*</span></label>
                                                        <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                            <select class="width-100" name="guser_dept" id="guser_dept" title="Select Valid Department">
                                                                <option value="">Select Department</option>
                                                                {foreach name=list item=item key=key from=$deptlist}
                                                                    <option value="{$key}">{$item} </option>
                                                                {/foreach}
                                                            </select>
                                                        </div>
                                                        <label class="control-label  col-sm-1">{attribute_name module="sop" attribute="username"} <span class="vd_red">*</span></label>
                                                        <div id="first-name-input-wrapper"  class="controls col-sm-5">
                                                            <select class="width-100" name="guser" id="guser" title="Select Valid User">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel widget">
                                        <div class="panel-body table-responsive">
                                            <h3>Reporting To</h3>
                                            <h3>Level1</h3>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                        <select class="width-100" name="rlevel1_dept" id="rlevel1_dept"title="Select Valid Department">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$deptlist}
                                                                <option value="{$key}">{$item} </option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                    <div class="col-xs-5">
                                                        <select name="rlevel1_from[]" id="rlevel1" class="rlevel1 form-control" size="5" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <button type="button" id="rlevel1_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="rlevel1_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="rlevel1_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="rlevel1_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <select name="rlevel1_to[]" id="rlevel1_to" class="form-control" size="5" multiple="multiple" title="Select valid user"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3>Level2</h3>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                        <select class="width-100" name="rlevel2_dept" id="rlevel2_dept" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$deptlist}
                                                                <option value="{$key}">{$item} </option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                    <div class="col-xs-5">
                                                        <select name="rlevel2_from[]" id="rlevel2" class="rlevel2 form-control" size="5" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <button type="button" id="rlevel2_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="rlevel2_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="rlevel2_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="rlevel2_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <select name="rlevel2_to[]" id="rlevel2_to" class="form-control" size="5" multiple="multiple" title="Select valid user"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3>Level3</h3>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                        <select class="width-100" name="rlevel3_dept" id="rlevel3_dept" title="Select Valid Department">
                                                            <option value="">Select</option>
                                                            {foreach name=list item=item key=key from=$deptlist}
                                                                <option value="{$key}">{$item} </option>
                                                            {/foreach}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="company-input-wrapper" class="controls col-sm-12"><br>
                                                    <div class="col-xs-5">
                                                        <select name="rlevel3_from[]" id="rlevel3" class="rlevel3 form-control" size="5" multiple="multiple"></select>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <button type="button" id="rlevel3_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                                        <button type="button" id="rlevel3_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                                        <button type="button" id="rlevel3_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                                        <button type="button" id="rlevel3_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <select name="rlevel3_to[]" id="rlevel3_to" class="form-control" size="5" multiple="multiple" title="Select valid user"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label"></label>
                                                    <div id="first-name-input-wrapper"  class="controls col-sm-12">
                                                        <button class="btn vd_bg-green vd_white" type="submit"  name="update_user_reporting" id="update_user_reporting">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
{literal}
    <!-- Javascript =============================================== --> 
    <!-- Placed at the end of the document so the pages load faster --> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="vendors/multiselect-master/dist/js/jquery.min.js"></script>
    <script src="vendors/multiselect-master/dist/js/multiselect.min.js"></script>

    <script>
    $("#guser_dept").change(function () {
        $("#rlevel1_dept").val('');
        $("#rlevel1 option").remove();
        $("#rlevel2_dept").val('');
        $("#rlevel2 option").remove();
        $("#rlevel3_dept").val('');
        $("#rlevel3 option").remove();
        x_get_dept_users($("#guser_dept").val(), list_dept_users);
        x_get_rlevel_users($("#guser").val(), 'level1', list_level1_users_to);
        x_get_rlevel_users($("#guser").val(), 'level2', list_level2_users_to);
        x_get_rlevel_users($("#guser").val(), 'level3', list_level3_users_to);
    });
    $("#guser").change(function () {
        $("#rlevel1_dept").val('');
        $("#rlevel1 option").remove();
        $("#rlevel2_dept").val('');
        $("#rlevel2 option").remove();
        $("#rlevel3_dept").val('');
        $("#rlevel3 option").remove();
        x_get_rlevel_users($("#guser").val(), 'level1', list_level1_users_to);
        x_get_rlevel_users($("#guser").val(), 'level2', list_level2_users_to);
        x_get_rlevel_users($("#guser").val(), 'level3', list_level3_users_to);
    });
    $("#rlevel1_dept").change(function () {
        x_get_filtered_rlevel_users($("#guser").val(), 'level1', $("#rlevel1_dept").val(), list_level1_users);
    });
    $("#rlevel2_dept").change(function () {
        x_get_filtered_rlevel_users($("#guser").val(), 'level2', $("#rlevel2_dept").val(), list_level2_users);
    });
    $("#rlevel3_dept").change(function () {
        x_get_filtered_rlevel_users($("#guser").val(), 'level3', $("#rlevel3_dept").val(), list_level3_users);
    });
    
    $("#guser").change(function () {
        x_get_filtered_rlevel_users($("#guser").val(), 'level1', $("#rlevel1_dept").val(), list_level1_users);
        x_get_filtered_rlevel_users($("#guser").val(), 'level2', $("#rlevel2_dept").val(), list_level2_users);
        x_get_filtered_rlevel_users($("#guser").val(), 'level3', $("#rlevel3_dept").val(), list_level3_users);
    });
    function list_dept_users(users) {
        var dept_users_obj = document.getElementById("guser");
        for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
            dept_users_obj.remove(i)
        }
        var addy = document.createElement('option');
        addy.text = "Select";
        addy.value = "";
        try {
            dept_users_obj.add(addy, null);
        } catch (ex) {
            dept_users_obj.add(addy);
        }
        for (var y in users) {
            var users_array = users[y]
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
    function list_level1_users(users) {
        var dept_users_obj = document.getElementById("rlevel1");
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
    function list_level1_users_to(users) {
        var dept_users_obj = document.getElementById("rlevel1_to");
        for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
            dept_users_obj.remove(i)
        }
        for (var y in users) {
            var users_array = users[y];
            var addy = document.createElement('option');
            addy.id = users_array.reporting_to_id;
            addy.text = users_array.reporting_to;
            addy.value = users_array.reporting_to_id;
            try {
                dept_users_obj.add(addy, null);
            } catch (ex) {
                dept_users_obj.add(addy);
            }
        }
    }
    function list_level2_users(users) {
        var dept_users_obj = document.getElementById("rlevel2");
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
    function list_level2_users_to(users) {
        var dept_users_obj = document.getElementById("rlevel2_to");
        for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
            dept_users_obj.remove(i)
        }
        for (var y in users) {
            var users_array = users[y];
            var addy = document.createElement('option');
            addy.id = users_array.reporting_to_id;
            addy.text = users_array.reporting_to;
            addy.value = users_array.reporting_to_id;
            try {
                dept_users_obj.add(addy, null);
            } catch (ex) {
                dept_users_obj.add(addy);
            }
        }
    }
    function list_level3_users(users) {
        var dept_users_obj = document.getElementById("rlevel3");
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
    function list_level3_users_to(users) {
        var dept_users_obj = document.getElementById("rlevel3_to");
        for (i = dept_users_obj.length; dept_users_obj.length > 0; i--) {
            dept_users_obj.remove(i)
        }
        for (var y in users) {
            var users_array = users[y];
            var addy = document.createElement('option');
            addy.id = users_array.reporting_to_id;
            addy.text = users_array.reporting_to;
            addy.value = users_array.reporting_to_id;
            try {
                dept_users_obj.add(addy, null);
            } catch (ex) {
                dept_users_obj.add(addy);
            }
        }
    }
    $(document).ready(function ($) {
        $('.rlevel1').multiselect({
            search: {
                left: '<input type="text"  class="form-control" placeholder="Search..." />',
                right: '<input type="text"  class="form-control" placeholder="Search..." />',
            },
            fireSearch: function (value) {
                return value.length > 1;
            }
        });
        $('.rlevel2').multiselect({
            search: {
                left: '<input type="text"  class="form-control" placeholder="Search..." />',
                right: '<input type="text"  class="form-control" placeholder="Search..." />',
            },
            fireSearch: function (value) {
                return value.length > 1;
            }
        });
        $('.rlevel3').multiselect({
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
            var form_submit = $('#user_reporting_form');
            var error_register = $('.alert-danger', form_submit);
            form_submit.validate({
                errorElement: 'div', //default input error message container
                errorClass: 'vd_red', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    guser_dept: {
                        required: true,
                    },
                    guser: {
                        required: true,
                    },
                },
                invalidHandler: function (event, validator) { //display error alert on form submit              
                    error_register.fadeIn(500);
                    scrollTo(form_submit, -100);
                },
                submitHandler: function (form) {
                    $('#aupdate_user_reporting').attr("disabled", true);
                    form.submit();
                },

            });
        });
    </script>

{/literal}
