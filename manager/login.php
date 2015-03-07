<?php
 //header('Content-Type: text/html; charset=UTF-8');
include_once("../config.php");
include_once("../classes/database.php");
include_once("../classes/session.php");
include_once("../classes/login.php");
include_once("../classes/messages.php");

$login=Login::GetLogin();
$msg=Message::GetMessage();
$msgs = "";
if ($login->IsLogged())
{	
		header("Location: ../manager/admin.php");
} 
else
{
	if (isset ($_POST["mark"]) AND $_POST["mark"] == "login")
	{
		if ($login->AdminLogin($_POST['username'],$_POST['password']))
		{		 
			header("location:regfaq.php");	
		}	
		else
		{ 
			$msgs = $msg->ShowError("نام کاربری یا کلمه عبور اشتباه می باشد !");			
		}	
	}   


$html=<<<cd
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Mediateq.ir">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- iOS webapp icons -->
    <link rel="apple-touch-icon-precomposed" href="./images/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./images/fickle-logo-72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./images/fickle-logo-114.png" />

    <!-- TODO: Add a favicon -->
    <link rel="shortcut icon" href="./images/fab.ico" />

    <title>Parsami ||Mediateq.ir</title>

    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="./css/pace-rtl.css" />
    <script src="./js/pace.min.js"></script>
    <!--Page loading plugin End   -->

    <!-- Plugin Css Put Here -->
    <link href="./css/bootstrap-rtl.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/bootstrap-switch.min.css" />
    <link rel="stylesheet" href="./css/ladda-themeless.min.css" />

    <link href="./css/bigbox.css" rel="stylesheet" />
    <link href="./css/libnotify.css" rel="stylesheet" />
    <link href="./css/jackedup.css" rel="stylesheet" />

    <!-- Plugin Css End -->
    <!-- Custom styles Style -->
    <link href="./css/style-rtl.css" rel="stylesheet">
    <!-- Custom styles Style End-->

    <!-- Responsive Style For-->
    <link href="./css/responsive-rtl.css" rel="stylesheet">
    <!-- Responsive Style For-->

    <!-- Custom styles for this template -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-screen  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                     <div class="login-content">
                        <div class="login-user-icon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <!-- <h3>Identify Yourself</h3>
                        <div class="social-btn-login">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-bitbucket"></i></a></li>
                            </ul>
                            <button class="btn ls-dark-btn rounded"><i class="fa fa-facebook"></i></button>
                            <button class="btn ls-dark-btn rounded"><i class="fa fa-twitter"></i></button>
                            <button class="btn ls-dark-btn rounded"><i class="fa fa-linkedin"></i></button>
                            <button class="btn ls-dark-btn rounded"><i class="fa fa-google-plus"></i></button>
                            <button class="btn ls-dark-btn rounded"><i class="fa fa-github"></i></button>
                            <button class="btn ls-dark-btn rounded"><i class="fa fa-bitbucket"></i></button>
                        </div> -->
                    </div> 

                    <div class="login-form">
                        <form id="frmlogin" action=""  method="post" class="form-horizontal ls_form">
						
                            <div class="input-group ls-group-input">
                                <input name="username" class="form-control" type="text" placeholder="نام کاربری">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>


                            <div class="input-group ls-group-input">
                                <input name="password" type="password" placeholder="رمز عبور" name="password" class="form-control" value="">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>

                            <!-- <div class="remember-me">
                                <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-mini bootstrap-switch-animate"><div class="bootstrap-switch-container"><span class="bootstrap-switch-handle-on bootstrap-switch-primary"><i class="fa fa-check"><i></i></i></span><label class="bootstrap-switch-label">&nbsp;</label><span class="bootstrap-switch-handle-off bootstrap-switch-default"><i class="fa fa-times"><i></i></i></span><input class="switchCheckBox" type="checkbox" checked="" data-size="mini" data-on-text="<i class='fa fa-check'><i>" data-off-text="<i class='fa fa-times'><i>"></div></div>
                                <span>Remember me</span>
                            </div> -->
                            <div class="input-group ls-group-input login-btn-box">
							 <input type="submit" value="ورود" class="btn ls-dark-btn ladda-button col-md-12 col-sm-12 col-xs-12" 
							 data-style="slide-down"/>
							 <!--
                                <button class="btn ls-dark-btn ladda-button col-md-12 col-sm-12 col-xs-12" data-style="slide-down">
                                    <span class="ladda-label">
									<i class="fa fa-key"></i></span>
                                <span class="ladda-spinner"></span></button>
							-->
                                <!-- <a class="forgot-password" href="javascript:void(0)">Forgot password</a> -->
                            </div>
							<input type="hidden" name="mark" value="login" /> 
                        </form>
                    </div>
                    <div class="forgot-pass-box">
                        <form action="#" class="form-horizontal ls_form">
                            <div class="input-group ls-group-input">
                                <input class="form-control" type="text" placeholder="someone@mail.com">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="input-group ls-group-input login-btn-box">
                                <button class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">
                                    <i class="fa fa-rocket"></i> Send
                                </button>

                                <a class="login-view" href="javascript:void(0)">Login</a> &amp; <a class="" href="registration.html">Registration</a>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <p class="copy-right big-screen hidden-xs hidden-sm">
        <a href="http://www.mediateq.ir" target="_blank"> Mediateq.ir<span>©</span></a>
    </p>
</section>


<script src="./js/jquery-2.1.1.min.js"></script>
<script src="./js/jquery.easing.js"></script>
<script src="./js/bootstrap-switch.min.js"></script>
<!--Script for notification start-->
<script src="./js/loader/spin.js"></script>
<script src="./js/loader/ladda.js"></script>
<script src="./js/humane.min.js"></script>
<div style="display: none;"></div>
<!--Script for notification end-->

<script src="./js/pages/login.js"></script>
</body>
</html>
cd;
	echo $html;
	}
?>