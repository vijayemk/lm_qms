<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>Account Disabled</title>    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
               
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">
     
    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    <script>
        function exit_reponse() {
            header("Location: index.php");              
        }
    </script>
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
                                            <div class="login-icon"> <i class="fa fa-key"></i> </div>
                                        </div>
                                    </div>
                                    <div class="panel widget text-center">
                                        <div class="panel-body">
                                            <form class="form-horizontal" name="expiry" action="index.php" method="POST" role="form" enctype="multipart/form-data" autocomplete="off">
                                                <h1 class="font-semibold text-center" style="font-size:20px;color: red">Your account has disabled.Contact your Admin</h1><br>
                                                <button class="btn vd_bg-green vd_white" onclick="exit_reponse();"> Exit from Here</button>
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
</body>
</html>
