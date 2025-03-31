<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>Session Expired</title>    
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
        function forced_loggedin_confirm(){
            var result = confirm("If you terminate the the above login session, then you may loose the previous session's data.\n\nDo you want to terminate the previous login session.?");                
            if (result === true) {
                document.forms["expiry"]["force_login_comfirm"].value = "force_login";
            }     
            else  {
                document.forms["expiry"]["force_login_comfirm"].value = "exit";
            }
            document.forms["expiry"].submit();
        }

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
                                            <div class="login-icon"> <i class="fa fa-sign-out"></i> </div>
                                            <h1 class="font-semibold text-center" style="font-size:20px;color: red">You have already logged in another browser window or computer.</h1>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 sidebar-affix">
                                        <div class="panel widget vd_summary-panel">
                                            <div class="panel-heading vd_bg-green">
                                                <h3 class="panel-title"> <span class="menu-icon">  </span> Session Details </h3>
                                            </div>
                                            <div class="panel-body-list">
                                                <form class="form-horizontal" name="expiry" action="index.php" method="POST" role="form" enctype="multipart/form-data" autocomplete="off">
                                                    <div class="content-list menu-action-right" >
                                                        <div data-rel="scroll">
                                                            <ul class="list-wrapper pd-lr-15">
                                                                <li> <span class="product-title"><strong>IP Address</strong><br/>
                                                                  {$already_ip_address} </span> 
                                                                  <div class="menu-action">  </div>
                                                                </li>
                                                                <li> <span class="product-title"><strong>Name</strong><br/>
                                                                  {$already_fullname} </span>
                                                                  <div class="menu-action">  </div>
                                                                </li>
                                                                <li> <span class="product-title"><strong>Browser</strong><br/>
                                                                  {$already_useragent}  </span>
                                                                  <div class="menu-action">  </div>
                                                                </li>
                                                                <li> <span class="product-title"><strong>Last Visited Time</strong><br/>
                                                                  {$alrady_last_visited_time}  </span> 
                                                                  <div class="menu-action">  </div>
                                                                </li>                                                 
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div style="" class="closing text-left pd-20">
                                                      <h3 class="font-semibold  mgbt-xs-0" style="font-size:20px;color: grey"> <span class="mgr-5"><span class="font-normal font-xs">NOTE: You will be able to login to your account only after terminate the aobve session.</span> </h3><br>
                                                        <button class="btn vd_bg-green vd_white" onclick="forced_loggedin_confirm();" > Terminate the above Session</button>
                                                        <button class="btn vd_bg-green vd_white" onclick="exit_reponse();"> Exit from Here</button>
                                                        <input name="already_user_id" hidden type="text" value="{$already_userid}">
                                                        <input name="already_session_id" hidden type="text" value="{$already_session_id}">
                                                    </div>
                                                    <input name="force_login_comfirm" hidden type="text" value="">
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Panel Widget --> 
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
