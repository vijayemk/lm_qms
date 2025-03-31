<?php
/* Smarty version 3.1.30, created on 2025-02-08 17:42:50
  from "/var/www/html/lm_qms/lib/dash/templates/default_dashboard.dash.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67a74a42b495f5_64576996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '321ede6842b3b583385f12039687ca6ab952add5' => 
    array (
      0 => '/var/www/html/lm_qms/lib/dash/templates/default_dashboard.dash.tpl',
      1 => 1739012495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67a74a42b495f5_64576996 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 language="javascript">
        function reload_page() {
            setTimeout("location.reload(true);", 1500);
        }
    <?php echo '</script'; ?>
>


<form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI'];?>
" role="form" name="default_dashboard" method="post">
    <div class="vd_head-section clearfix">
        <div class="vd_panel-header">
            <ul class="breadcrumb">
                <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
                <li class="active">Dashboard</li>
            </ul>
            <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
            </div>
        </div>
    </div>
    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="tabs widget">
                    <ul class="nav nav-tabs widget">
                        <li class="active">
                            <a data-toggle="tab" href="#sop_status-tab">
                                <span class="menu-icon"><i class="fa fa-list"></i></span>
                                DASHBOARD 
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="sop_status-tab" class="tab-pane active">   
                            <div class="pd-20">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="vd_status-widget vd_bg-black-10 widget">
                                            <div class="col-lg-12 col-md-12 col-sm-12 mgbt-sm-15"><br>
                                                <div class="vd_status-widget vd_bg-blue widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 

                                                    <a class="panel-body" href="index.php?module=sop&action=sop_list&plant=<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_sop_count']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            TOTAL SOP - [<?php echo $_smarty_tpl->tpl_vars['usr_plant']->value;?>
]
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-sm-15">
                                                <div class="vd_status-widget vd_bg-dark-green widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 

                                                    <a class="panel-body" href="index.php?module=sop&action=sop_list&plant=<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
&status=Published and Active">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_published_active_sop']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            Active SOP
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-xs-15">
                                                <div class="vd_status-widget vd_bg-yellow widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();"  class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 
                                                    <a class="panel-body" href="index.php?module=sop&action=sop_list&plant=<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
&status=Draft">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_draft_sop']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            Draft SOP
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-xs-15">
                                                <div class="vd_status-widget vd_bg-green widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 
                                                    <a class="panel-body" href="index.php?module=sop&action=sop_list&plant=<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
&status=Published and Inactive">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa  fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_published_inactive_sop']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            InActive SOP
                                                        </div>                                                               
                                                    </a>        
                                                </div>              
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-sm-15">
                                                <div class="vd_status-widget vd_bg-red widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 

                                                    <a class="panel-body" href="index.php?module=sop&action=sop_list&plant=<?php echo $_smarty_tpl->tpl_vars['usr_plant_id']->value;?>
&status=SOP Expired">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_expired_sop']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            Obsolete Copy
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="vd_status-widget vd_bg-black-10 widget">
                                            <div class="col-lg-12 col-md-12 col-sm-12 mgbt-sm-15"><br>
                                                <div class="vd_status-widget vd_bg-blue widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 

                                                    <a class="panel-body" href="index.php?module=admin&action=pending_worklist">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_pendinglist_count']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            Total Pending Task(s) - [All Companies]
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-sm-15">
                                                <div class="vd_status-widget vd_bg-red widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 

                                                    <a class="panel-body" href="index.php?module=admin&action=pending_worklist">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_sop_pendinglist_count']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            SOP
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-xs-15">
                                                <div class="vd_status-widget vd_bg-red widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();"  class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 
                                                    <a class="panel-body" href="index.php?module=admin&action=pending_worklist">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_signup_pendinglist_count']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            Signup
                                                        </div>                                                               
                                                    </a>        
                                                </div>                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mgbt-xs-15">
                                                <div class="vd_status-widget vd_bg-red widget">
                                                    <div class="vd_panel-menu">
                                                        <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" onclick="reload_page();" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                                                    </div>
                                                    <!-- vd_panel-menu --> 
                                                    <a class="panel-body" href="index.php?module=admin&action=pending_worklist">
                                                        <div class="clearfix">
                                                            <span class="menu-icon">
                                                                <i class="fa  fa-check-circle-o"></i>
                                                            </span>
                                                            <span class="menu-value">
                                                                <?php echo $_smarty_tpl->tpl_vars['total_exit_pendinglist_count']->value;?>

                                                            </span>  
                                                        </div>   
                                                        <div class="menu-text clearfix">
                                                            User Exit
                                                        </div>                                                               
                                                    </a>        
                                                </div>              
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- tabs-widget -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabs widget">
                    <ul class="nav nav-tabs widget">
                        <li class="active">
                            <a data-toggle="tab" href="#lifcycle-tab">
                                <span class="menu-icon"><i class="fa fa-comments"></i></span>
                                Life Cycle Management 
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#new-user-tab">
                                <span class="menu-icon"><i class="fa fa-user"></i></span>
                                Recent Signup Users
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#auth_sop-tab">
                                <span class="menu-icon"><i class="fa fa-caret-up"></i></span>
                                Recent Authorized SOPs
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#carry-off-sop-tab">
                                <span class="menu-icon"><i class="fa fa-hand-o-right"></i></span>
                                Carry Off SOPs
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#expiry-notification-tab">
                                <span class="menu-icon"><i class="fa fa-hand-o-down"></i></span>
                                Expiry Notification
                                <span class="menu-active"><i class="fa fa-caret-up"></i></span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="lifcycle-tab" class="tab-pane active">                                         
                            <div class="content-list content-image menu-action-right">
                                <?php if (isset($_smarty_tpl->tpl_vars['life_cycle_comments']->value)) {?>
                                    <div  data-rel="scroll" data-scrollheight="500">
                                        <ul class="list-wrapper pd-lr-15">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['life_cycle_comments']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <li>  
                                                    <div class="menu-icon"><a href="#"><img alt="example image" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_image_file'];?>
"></a></div>
                                                    <div class="menu-text"> 
                                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['comments'];?>

                                                    </div>                                               
                                                    <div class="menu-text">
                                                        <div class="menu-info">
                                                            by <a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['commented_by'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['commented_by_dept'];?>
</a> - 
                                                            <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['comments_date'];?>
 </span> 
                                                        </div>
                                                    </div>
                                                    <div class="menu-text"> 
                                                        <div class="menu-info">
                                                            <a href="index.php?module=sop&action=view_sop&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sop_object_id'];?>
 " target=_blank><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_no'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
</a> - 
                                                            <span class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['revision'];?>
 </span> 
                                                        </div>
                                                    </div>
                                                    <div class="menu-action">
                                                        <span class="menu-action-icon vd_green vd_bd-green" data-original-title="<?php echo $_smarty_tpl->tpl_vars['item']->value['comments_date'];?>
" data-toggle="tooltip" data-placement="bottom">
                                                            <i class="fa fa-check"></i>
                                                        </span>                                                                                                                    
                                                    </div>                                                 	  
                                                </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                        <div data-rel="scroll" >
                                            <ul class="list-wrapper">
                                                <li> 
                                                    <div class="menu-text vd_red"> No recent Life Cycle Comments available for last 30 days
                                                    </div> 
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div id="new-user-tab" class="tab-pane">
                            <?php if (isset($_smarty_tpl->tpl_vars['recent_signup_details']->value)) {?>
                                <div class="content-grid column-xs-2 column-sm-6 height-xs-4">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recent_signup_details']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <li> 
                                                    <a href="#"> 
                                                        <div class="menu-icon width-50"><img alt="example image" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_image_file'];?>
"></div> 
                                                    </a>
                                                    <div class="menu-text"> <?php echo $_smarty_tpl->tpl_vars['item']->value['full_name'];?>

                                                        <div class="menu-info">
                                                            <div class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['dept'];?>
</div>                                                                         
                                                            <div class="menu-action">
                                                                <span class="menu-action-icon vd_green vd_bd-green" data-original-title="Activated on <?php echo $_smarty_tpl->tpl_vars['item']->value['activated_date'];?>
" data-toggle="tooltip" data-placement="bottom">
                                                                    <i class="fa fa-check"></i>
                                                                </span>                                                                                                                    
                                                            </div>                                
                                                        </div>
                                                    </div> 
                                                </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </ul>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <li> 
                                                <div class="menu-text vd_red"> No recent signup available for last 30 days
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <div id="auth_sop-tab" class="tab-pane">
                            <?php if (isset($_smarty_tpl->tpl_vars['recent_authorized_sop']->value)) {?>
                                <div class="content-grid column-xs-2 column-sm-6 height-xs-3">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recent_authorized_sop']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <li> 
                                                    <div class="menu-text vd_red"><a href="index.php?module=sop&action=view_sop&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sop_object_id'];?>
 " target=_blank><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
</a>
                                                        <div class="menu-info">
                                                            <div class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['authorized_date'];?>
</div>                                                                         
                                                            <div class="menu-action">
                                                                <span class="menu-action-icon vd_green vd_bd-green" data-original-title="Authorized on <?php echo $_smarty_tpl->tpl_vars['item']->value['authorized_date'];?>
" data-toggle="tooltip" data-placement="bottom">
                                                                    <i class="fa fa-check"></i>
                                                                </span>                                                                                                                    
                                                            </div>                                
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </ul>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <li> 
                                                <div class="menu-text vd_red"> No recent Authorized SOP available for last 30 days
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <div id="carry-off-sop-tab" class="tab-pane">
                            <?php if (isset($_smarty_tpl->tpl_vars['carry_off_sop']->value)) {?>
                                <div class="content-grid column-xs-2 column-sm-6 height-xs-4">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carry_off_sop']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <li> 
                                                    <div class="menu-text"> <a href="index.php?module=sop&action=view_sop&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sop_object_id'];?>
 " target=_blank><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
</a>
                                                        <div class="menu-info">
                                                            <div class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['effective_date'];?>
</div>                                                                         
                                                            <div class="menu-action">
                                                                <span class="menu-action-icon vd_red vd_bd-red" data-original-title="Effective Date <?php echo $_smarty_tpl->tpl_vars['item']->value['effective_date'];?>
" data-toggle="tooltip" data-placement="bottom">
                                                                    <i class="fa fa-times"></i>
                                                                </span>                                                                                                                   
                                                            </div>                                
                                                        </div>
                                                    </div> 
                                                </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </ul>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <li> 
                                                <div class="menu-text vd_red"> No Carry off SOPs available
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }?>
                        </div>

                        <div id="expiry-notification-tab" class="tab-pane">
                            <?php if (isset($_smarty_tpl->tpl_vars['expiry_notification']->value)) {?>
                                <div class="content-grid column-xs-2 column-sm-6 height-xs-3">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['expiry_notification']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                <li> 
                                                    <div class="menu-text"> <a href="index.php?module=sop&action=view_sop&object_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['sop_object_id'];?>
 " target=_blank><?php echo $_smarty_tpl->tpl_vars['item']->value['sop_name'];?>
</a>
                                                        <div class="menu-info">
                                                            <div class="menu-date"><?php echo $_smarty_tpl->tpl_vars['item']->value['expiry_date'];?>
</div>                                                                         
                                                            <div class="menu-action">
                                                                <span class="menu-action-icon vd_red vd_bd-red" data-original-title="Expired on <?php echo $_smarty_tpl->tpl_vars['item']->value['expiry_date'];?>
" data-toggle="tooltip" data-placement="bottom">
                                                                    <i class="fa fa-times"></i>
                                                                </span>                                                                                                                   
                                                            </div>                                
                                                        </div>
                                                    </div> 
                                                </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </ul>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="content-grid column-xs-3 column-sm-1 height-xs-1">	
                                    <div data-rel="scroll" >
                                        <ul class="list-wrapper">
                                            <li> 
                                                <div class="menu-text vd_red"> No Upcoming SOP Expiry in next 30 days
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div> <!-- tabs-widget -->
            </div>
        </div>
        <!-- .col-md-6 -->
    </div>
</form>
<?php }
}
