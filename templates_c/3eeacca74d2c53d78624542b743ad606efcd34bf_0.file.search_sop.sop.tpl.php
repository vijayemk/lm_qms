<?php
/* Smarty version 3.1.30, created on 2025-02-01 13:53:25
  from "/var/www/html/lm_qms/lib/sop/templates/search_sop.sop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_679dd9fdc82a60_65429257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eeacca74d2c53d78624542b743ad606efcd34bf' => 
    array (
      0 => '/var/www/html/lm_qms/lib/sop/templates/search_sop.sop.tpl',
      1 => 1614856128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/insert_sajax.tpl' => 1,
  ),
),false)) {
function content_679dd9fdc82a60_65429257 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:templates/insert_sajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
<?php echo '</script'; ?>
>

<!-- Specific CSS -->
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/buttons.dataTables.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="plugins/dataTables/DataTables_Export/datatables.mark.min.css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li class="active">Search SOP</li>
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
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> SOP </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form name="viewsop" method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form-horizontal" role="form" id="viewsop-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_type"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100 required" name="sop_type" id="sop_type" onchange=search_sop();>
                                                <option value="">Select</option>
                                                <option value="All">All</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_type_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['object_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"revision"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100 required" name="revision" id="revision"  onchange=search_sop(); title="Select Valid Revision">
                                                <option value="">Select</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['revision']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_no"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <input type="text"  class="width-100 required" name="sop_no"  id="sop_no" onkeydown="search_sop();" list="sop_no_data_list">
                                            <datalist id="sop_no_data_list">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sop_no_list_completion']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_name"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <input type="text" class="width-100 required" name="sop_name"  id="sop_name"  onkeydown="search_sop();" list="sop_name_data_list">
                                            <datalist id="sop_name_data_list">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['namelist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_is_latest_revision"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100" name="is_latest_revision"  id="is_latest_revision" onchange=search_sop();>
                                                <option value="">Select</option>
                                                <option value="true">True</option>
                                                <option value="false">False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="controls">
                                            <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_published_status"),$_smarty_tpl);?>
</label>
                                            <div class="controls">
                                                <select class="width-100" name="published_status" id="published_status"  onchange=search_sop(); title="Select Valid SOP">
                                                    <<option value="">Select</option>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['published_status']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_year"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100" name="years" id="years" onchange=search_sop();>
                                                <option value="">Select</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['year_range']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_month"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100" name="months" id="months" onchange=search_sop();>
                                                <option value="">Select</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['month_range']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_effective_date"),$_smarty_tpl);?>
 From</label>
                                        <div class="controls">
                                            <input type=text name="sop_effective_date_from" id="sop_effective_date_from" placeholder="DD/MM/YYYY HH:MM:SS">
                                        </div>
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_effective_date"),$_smarty_tpl);?>
 To</label>
                                        <div class="controls">
                                            <input type=text name="sop_effective_date_to" id="sop_effective_date_to" placeholder="DD/MM/YYYY HH:MM:SS">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_expiry_date"),$_smarty_tpl);?>
 From</label>
                                        <div class="controls">
                                            <input type=text name="sop_expiry_date_from" id="sop_expiry_date_from" placeholder="DD/MM/YYYY HH:MM:SS">
                                        </div>
                                        <label class="control-label"><?php echo template_get_attribute_name(array('module'=>"sop",'attribute'=>"sop_expiry_date"),$_smarty_tpl);?>
 To</label>
                                        <div class="controls">
                                            <input type=text name="sop_expiry_date_to" id="sop_expiry_date_to" placeholder="DD/MM/YYYY HH:MM:SS">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Creator <?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"department"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100"  name="department" id="department" onchange = get_users(this.options[this.selectedIndex].value);>
                                                <option value="">Select</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deptlist']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                        </div>
                                        <label class="control-label">Creator <?php echo template_get_attribute_name(array('module'=>"audit",'attribute'=>"user_name"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100"  name="userid" id="userid" onchange="search_sop();"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Creator <?php echo template_get_attribute_name(array('module'=>"admin",'attribute'=>"plant_name"),$_smarty_tpl);?>
</label>
                                        <div class="controls">
                                            <select class="width-100"  name="plant" id="plant" onchange = get_plant_users(this.options[this.selectedIndex].value);>
                                                <option value="">Select</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plant_list']->value, 'item', false, 'key', 'list', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['short_name'];?>
 - [<?php echo $_smarty_tpl->tpl_vars['item']->value['plant_name'];?>
]</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions-condensed row mgbt-xs-0 text-right">
                                <div class="col-sm-12"> <span class="menu-icon"><input type="button" id="search_button" name="search" value="Search" class="btn vd_btn vd_bg-green vd_white" onClick="search_sop();"></span> </div>
                            </div>
                        </form>          
                    </div>
                    <div class="panel-body" style="display:none" id="result_area">
                        <table id="search_sop_output_table" class="table table-bordered table-striped" width="100%"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Javascript =============================================== --> 
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
> 
    <!-- Placed at the end of the document so the pages load faster --> 
   <?php echo '<script'; ?>
 type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'><?php echo '</script'; ?>
>
    <!-- Specific Page Scripts Put Here -->
    <?php echo '<script'; ?>
>
    function search_sop(){
        var sop_type=document.getElementById("sop_type").value;
        var sop_name=document.getElementById("sop_name").value;
        var revision=document.getElementById("revision").value;
        var years=document.getElementById("years").value;
        var months=document.getElementById("months").value;
        var is_latest_revision=document.getElementById("is_latest_revision").value;
        var published_status=document.getElementById("published_status").value;
        var sop_effective_date_from=document.getElementById("sop_effective_date_from").value;
        var sop_effective_date_to=document.getElementById("sop_effective_date_to").value;
        var sop_expiry_date_from=document.getElementById("sop_expiry_date_from").value;
        var sop_expiry_date_to=document.getElementById("sop_expiry_date_to").value;
        var department=document.getElementById("department").value;
        var userid=document.getElementById("userid").value;
        var plant_id=document.getElementById("plant").value;
        var sop_no=document.getElementById("sop_no").value;
        
        if(sop_type=="All"){
            var sop_type="All";
	}else if(sop_type==""){
            var sop_type="NA";
        }else{
            var sop_type=sop_type;
        }if(sop_name==""){
            var sop_name="NA";
	}if(revision==""){
            var revision="NA";
	}if(years==""){
            var years="NA";
	}if(months==""){
            var months="NA";
	}if(is_latest_revision==""){
            var is_latest_revision="NA";
	}if(published_status==""){
            var published_status="NA";
	}if(sop_effective_date_from==""){
            var sop_effective_date_from="NA";
	}if(sop_effective_date_to==""){
            var sop_effective_date_to="NA";
	}if(sop_expiry_date_from==""){
            var sop_expiry_date_from="NA";
	}if(sop_expiry_date_to==""){
            var sop_expiry_date_to="NA";
	}if(department==""){
            var department="NA";
	}if(userid==""){
            var userid="NA";
	}if(plant_id==""){
            var plant_id="NA";
	}if(sop_no==""){
            var sop_no="NA";
	}
        var status = "NA";
        x_search_sop(sop_type,sop_name,sop_no,revision,years,months,is_latest_revision,published_status,sop_effective_date_from,sop_effective_date_to,sop_expiry_date_from,sop_expiry_date_to,department,userid,plant_id,status,list_sop);
    }
    function list_sop(result){
        if(result==0){
                clear_table('search_sop_output_table')
                document.getElementById('result_area').style.display="none";
		//alert("No Results Found");
	}else{
            clear_table('search_sop_output_table');
            document.getElementById('result_area').style.display="block";
            start=0;
            var dataSet=[];
            for (var y in result)  {
                var result_array = result[y] 
                if (result_array.sop_object_id){
                    start=start+1;
                    dataSet.push([result_array.sop_no,result_array.sop_type, result_array.sop_name, result_array.revision, result_array.supersedes, result_array.effective_date,result_array.expiry_date,result_array.is_latest_revision,result_array.status])
                }
            }
            $(document).ready(function() {
                $('#search_sop_output_table').dataTable( {
                    destroy: true,
                    data: dataSet,
                    columns: [
                        { title: "SOP No" },
                        { title: "SOP Type" },
                        { title: "SOP Name" },
                        { title: "Revision" },
                        { title: "Supersedes" },
                        { title: "Effective Date" },
                        { title: "Expiry Date" },
                        { title: "Is Latest Revision" },
                        { title: "Published Status" }
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
                            message: 'SOP List',

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
                            message: 'SOP List',
                        },
                        {
                            extend: 'colvis',
                            postfixButtons: [ 'colvisRestore' ]
                        }

                    ],
                } );
            } );
        }
        
    }
    function get_users(value){
        search_sop();
        x_get_all_dept_users(value,list_users); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
    }
    function get_plant_users(value){
        search_sop();
        x_get_plant_users(value,list_users); //Call SAJAX JavaScript... Pass Department id as Value and name of the function which is going to handle the reply 
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
    function clear_table(tab_name) {
	var table_obj=document.getElementById(tab_name);
	for (i=table_obj.rows.length;i>1;i--) {
            var row_ind=table_obj.rows[1].rowIndex
            table_obj.deleteRow(row_ind)
        }
    }
    document.onkeyup = function( evt ) {
        document.getElementById("sop_name").value=document.getElementById("sop_name").value.toUpperCase();
        if( ( window.event || evt ).keyCode == 13 ) {
            search_sop(); 
        }
    }
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(window).load(function() {
            "use strict";
            $( "#datepicker-normal" ).datepicker({ dateFormat: 'dd/mm/yy'});
            $( "#datepicker-multiple" ).datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true,
                    dateFormat: 'dd/mm/yy'
            });	
            $( "#sop_effective_date_from" ).datepicker({
                    defaultDate: "+1w",
                    dateFormat: 'dd/mm/yy 00:00:00',
                    changeMonth: true,
                    numberOfMonths: 2,
                    onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
            });
            $( "#sop_effective_date_to" ).datepicker({
                    defaultDate: "+1w",
                    dateFormat: 'dd/mm/yy 00:00:00',
                    changeMonth: true,
                    numberOfMonths: 2,
                    onClose: function( selectedDate ) {
                    $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                    }
            });	
            $( "#sop_expiry_date_from" ).datepicker({
                    defaultDate: "+1w",
                    dateFormat: 'dd/mm/yy 00:00:00',
                    changeMonth: true,
                    numberOfMonths: 2,
                    onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
            });
            $( "#sop_expiry_date_to" ).datepicker({
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


            $('#datepicker-daterangepicker').daterangepicker(
                    {
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
    <?php echo '</script'; ?>
>

<?php }
}
