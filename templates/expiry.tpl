<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>Session Expired</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Vendroid" />
    <meta name="description" content="Log Out Pages - Responsive Admin HTML Template">
    <meta name="author" content="Venmond">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
               
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">
     
    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    
</head>
<body id="pages" class="full-layout no-nav-left no-nav-right  nav-top-fixed background-login     responsive remove-navbar login-layout   clearfix" data-active="pages "  data-smooth-scrolling="1">     
    <div class="vd_body">
        <div class="content">
            <div class="container"> 
                <!-- Middle Content Start -->
                <div class="vd_content-wrapper">
                    <div class="vd_container">
                        <div class="vd_content clearfix">
                            <div class="vd_content-section clearfix">
                                <div class="vd_register-page">
                                    <div class="heading clearfix">
                                        <div class="logo">
                                            <h2 ><img src="img/logo1.png" alt="logo"></h2>
                                        </div>
                                    </div>
                                    <div class="panel widget">
                                        <div class="panel-body">
                                            <div class="login-icon"> <i class="fa fa-sign-out"></i> </div>
                                            <h1 class="font-semibold text-center" style="font-size:40px">Session Expired</h1>
                                            <form class="form-horizontal" action="#" role="form">
                                                <div class="form-group">
                                                  <div class="col-md-12">
                                                    <h4 class="text-center mgbt-xs-20">Thank you for using LogicMind software</h4>
                                                  </div>
                                                </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                          </form>
                                        </div>
                                    </div>
                                    <div class="panel widget">
                                        <div class="panel-body">
                                            <form class="form-horizontal" action="#" role="form">
                                                <div class="form-group">
                                                  <div class="col-md-12">
                                                    <p class="text-center"> Since this session was idle for last {$expired_idle_time}(H:M:S) hours</p>
                                                    <p class="text-center"> Max Idle time is {$max_idle_time}(H:M:S) hours</p>
                                                  </div>
                                                </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                          </form>
                                        </div>
                                    </div>
                                    <div class="panel widget">
                                        <div class="panel-body">
                                            <form class="form-horizontal" action="#" role="form">
                                                <div class="form-group">
                                                  <div class="col-md-12">
                                                    <p class="text-center"> Please <font size="4"><a href="index.php?">click here</a></font> to login back to LogicMind software</p>
                                                  </div>
                                                </div>
                                            <div id="vd_login-error" class="alert alert-danger hidden"><i class="fa fa-exclamation-circle fa-fw"></i> Please fill the necessary field </div>
                                          </form>
                                        </div>
                                    </div>
                                    <!-- Panel Widget -->
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
            </div>
            <!-- .container --> 
        </div>
    </div>
</body>
</html>