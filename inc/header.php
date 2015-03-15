<?php
    header('Content-Type: text/html; charset=UTF-8');
	include_once("./config.php");
	include_once("./classes/database.php");
	include_once("./classes/functions.php");
	include_once("classes/seo.php");
	
	$Site_Title = GetSettingValue('Site_Title',0);
	$Site_KeyWords = GetSettingValue('Site_KeyWords',0);
	$Site_Describtion = GetSettingValue('Site_Describtion',0);

	$seo = Seo::GetSeo();	
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie…-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <!-- Meta Tags -->        
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $seo->Site_Title;?></title>
    <meta name="description" content="<?php echo$seo->Site_Describtion;?>">
    <meta name="keywords" content="<?php echo $seo->Site_KeyWords;?>">
    <meta name="author" content="Mediateq.ir">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"> 

    <!-- Web Fonts -->        
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700" rel="stylesheet" type="text/css">

    <!-- Css Global Compulsory -->
    <link rel="stylesheet" href="./css/bootstrap.min.css"> 

    <!-- Css Implementing Plugins -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">                          
    <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="./css/extralayers.css" media="screen"> 
    <link rel="stylesheet" type="text/css" href="./css/settings.css" media="screen">
    <link rel="stylesheet" href="./css/owl.carousel.css">
    <link rel="stylesheet" href="./css/owl.theme.css">         
    <link rel="stylesheet" href="./css/cubeportfolio.min.css">
    <link rel="stylesheet" href="./css/jquery.mmenu.css">        

    <!-- Css Theme -->           
    <link rel="stylesheet" href="./css/style2.css">
	<script src="./js/jquery-1.11.1.min.js"></script>
</head>
<body> 

    <!--Start Preloader -->
    <div id="preloader">
        <div class="preloader-container">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader--> 