<!-- Specific CSS -->
<link href="css/upload_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/upload/jquery.min.js"></script>
<script type="text/javascript" src="js//upload/jquery.form.js"></script>
{literal}    
    <script>
    $(document).on('change', '#image_upload_file', function () {
    var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

    $('#image_upload_form').ajaxForm({
        
        beforeSend: function() {
                    progressBar.fadeIn();
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function(html, statusText, xhr, $form) {		
                    obj = $.parseJSON(html);	
                    if(obj.status){		
                            var percentVal = '100%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                            $("#imgArea>img").prop('src',obj.image_medium);			
                    }else{
                            alert(obj.error);
                    }
        },
            complete: function(xhr) {
                    progressBar.fadeOut();			
            }	
    }).submit();		
    window.location = "index.php?module=admin&action=upload_photo";
    });
    </script>
{/literal}


<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
            <li><a href="index.php?module=admin&action=view_user_profile_info">User Profile Info.</a> </li>
            <li class="active">User Profile Photo Upload </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>
<div class="panel widget">
    <div class="panel-heading vd_bg-grey">
        <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-magic"></i> </span> Update User Profile Photo </h3>
    </div>
    <div class="panel-body">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading vd_bg-dark-green">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Update Photo </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="vd_content-section clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel widget">
                                    <div class="vd_content-section clearfix">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="panel widget light-widget">
                                                    <div id="imgContainer">
                                                        <form name="image_upload_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="image_upload_form" autocomplete="off">
                                                            
                                                            <div id="imgArea">
                                                                {if isset($user_image)}<img src="{$user_image}">{else}<img alt="image" src="img/default.jpg">{/if}
                                                                <div class="progressBar">
                                                                    <div class="bar"></div>
                                                                    <div class="percent">0%</div>
                                                                </div>
                                                                <div id="imgChange" class="form-img text-center mgbt-xs-15"><span>Change Photo</span>
                                                                    <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
                                                                </div>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-sm-12--> 
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel Widget --> 
                            </div>
                            <!-- col-md-12 --> 
                        </div>
                        <!-- row -->     
                    </div>
                </div>
                   
            </div>
        </div>
    </div>
</div>