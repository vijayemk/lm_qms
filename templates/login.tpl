<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LogicMind</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap & FontAwesome & Entypo CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/font-entypo.css" rel="stylesheet" type="text/css">    

        <!-- Fonts CSS -->
        <link href="css/fonts.css"  rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
        <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
        <link href="plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
        <link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
        <link href="plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
        <link href="plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
        <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">
        <!-- Specific CSS -->

        <!-- Theme CSS -->
        <link href="css/theme.min.css" rel="stylesheet" type="text/css">
        <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
        <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->
        <!-- Responsive CSS -->
        <link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css">
        <!-- Custom CSS -->
        <link href="custom/custom.css" rel="stylesheet" type="text/css">

        <!-- Head SCRIPTS -->
        <script type="text/javascript" src="js/modernizr.js"></script> 
        <script type="text/javascript" src="js/mobile-detect.min.js"></script> 
        <script type="text/javascript" src="js/mobile-detect-modernizr.js"></script> 

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type="text/javascript" src="js/html5shiv.js"></script>
          <script type="text/javascript" src="js/respond.min.js"></script>     
        <![endif]-->
    </head>

    <body id="pages" class="full-layout no-nav-left no-nav-right  nav-top-fixed background-login     responsive remove-navbar login-layout   clearfix" data-active="pages "  data-smooth-scrolling="1" onload="document.login.username.focus();">     
        <div class="vd_body">
            <div class="content">
                <div class="container"> 
                    <!-- Middle Content Start -->
                    <div class="vd_content-wrapper">
                        <div class="vd_container">
                            <div class="vd_content clearfix">
                                <div class="vd_content-section clearfix">
                                    <div class="vd_login-page">
                                        <div class="heading clearfix">
                                            <div class="logo">
                                                <h2 class="mgbt-xs-6"><img src="img/main_logo.png" alt="logo"></h2>
                                            </div>
                                            <br>
                                            <h4 class="text-center font-semibold vd_grey"> Login to LogicMind Account </h4>
                                        </div><br>
                                        <div class="panel widget">
                                            <div class="panel-body">
                                                <div class="logo text-center"><img src="img/custom_logicmind_img/logo1.png" alt="logo" width="150" height="80"></div><br><br><br>
                                                <form  action="" autocomplete="off" method="post"  name="login" id="login-form" role="form" class="form-horizontal">
                                                    <div class="alert alert-danger vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> Change a few things up and try submitting again. 
                                                    </div>
                                                    <div class="alert alert-success vd_hidden">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                                        <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong>. 
                                                    </div>                  
                                                    <div class="form-group  mgbt-xs-20">
                                                        <div class="col-md-12">
                                                            <div class="label-wrapper sr-only">
                                                                <label class="control-label" for="email">Email</label>
                                                            </div>
                                                            <div class="vd_input-wrapper" id="email-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user"></i> </span>
                                                                <input type="text" placeholder="Username" id="username" name="username" class="required" required>
                                                            </div>
                                                            <div class="label-wrapper">
                                                                <label class="control-label sr-only" for="password">Password</label>
                                                            </div>
                                                            <div class="vd_input-wrapper" id="password-input-wrapper" > <span class="menu-icon"> <i class="fa fa-eye" id="togglePassword"></i>  </span>
                                                                <input type="password" placeholder="Password" id="password" name="password" class="required" required>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 text-center mgbt-xs-5">
                                                            <button class="btn vd_bg-green vd_white width-100" type="submit" id="login-submit">Login</button>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-xs-12 text-right">
                                                                    <div class=""> <a href="forget_password.html">Forget Password? </a> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- vd_login-page --> 
                                </div>
                                <!-- .vd_content-section --> 
                            </div>
                            <!-- .vd_content --> 
                        </div>
                        <!-- .vd_container --> 
                    </div>
                    <!-- .vd_content-wrapper --> 
                    <!-- Middle Content End -->
                </div>
                <!-- .container --> 
            </div>
            <!-- .content -->
        </div>
        <!-- .vd_body END  -->
        <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

        <!-- Javascript =============================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script type="text/javascript" src="js/jquery.js"></script> 
        <!--[if lt IE 9]>
          <script type="text/javascript" src="js/excanvas.js"></script>      
        <![endif]-->
        <script type="text/javascript" src="js/bootstrap.min.js"></script> 
        <script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>
        <script type="text/javascript" src="plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <script type="text/javascript" src="js/caroufredsel.js"></script> 
        <script type="text/javascript" src="js/plugins.js"></script>

        <script type="text/javascript" src="plugins/breakpoints/breakpoints.js"></script>
        <script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

        <script type="text/javascript" src="plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="plugins/tagsInput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
        <script type="text/javascript" src="plugins/pnotify/js/jquery.pnotify.min.js"></script>

        <script type="text/javascript" src="js/theme.js"></script>
        <script type="text/javascript" src="custom/custom.js"></script>

        <!-- Specific Page Scripts Put Here -->
        <script type="text/javascript">
            $(document).ready(function () {
                "use strict";
                var form_submit = $('#login-form');
                var error_register = $('.alert-danger', form_submit);
                form_submit.validate({
                    errorElement: 'div', //default input error message container
                    errorClass: 'vd_red', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",
                    rules: {
                        username: {
                            minlength: 3,
                            required: true,
                        },
                        password: {
                            minlength: 6,
                            required: true,
                        },
                    },
                    invalidHandler: function (event, validator) { //display error alert on form submit              
                        error_register.fadeIn(500);
                        scrollTo(form_submit, -100);
                    },
                    submitHandler: function (form) {
                        $('#login-submit').attr("disabled", true);
                        form.submit();
                    },
                });
            });
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
            $(document).ready(function () {
                $("#username").keyup(function () {
                    $('#username').val($(this).val().toLowerCase());
                });
            });
        </script>
    </body>
</html>
