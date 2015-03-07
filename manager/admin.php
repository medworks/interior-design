<?php    
	include_once("../config.php");
	include_once("../classes/functions.php");
  	include_once("../classes/messages.php");
  	include_once("../classes/session.php");	
  	include_once("../classes/security.php");
  	include_once("../classes/database.php");	
	include_once("../classes/login.php");
    include_once("../lib/persiandate.php");  
	    
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
	
	$login = Login::GetLogin();	
	$db = Database::GetDatabase();	
	
	if (!$login->IsLogged())
	{
		header("Location: ../index.php");
		die(); //solve security bug
	}		
	$mes = Message::GetMessage();
	
	if (isset($_GET["act"]) and $_GET["act"] == "logout")
   {
	   if ($login->LogOut())
			header("Location: ../index.php");
	   else
		    echo $mes->ShowError("عملیات خروج با خطا مواجه شد، لطفا مجددا سعی نمایید.");
   }
  
$html=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">داشبورد</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void();"><i class="fa fa-home"></i></a></li>
                            <li class="active">داشبورد</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <div class="row">
                    
                </div>               
                <!-- Main Content Element  End-->
            </div>
        </div>
    </section>
    <!--Page main section end -->
cd;
	include_once("./inc/header.php");	
	echo $html;
    include_once("./inc/footer.php");	
?>