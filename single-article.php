<?php
	include_once("config.php");
	include_once("classes/functions.php");
  	include_once("classes/messages.php");
  	include_once("classes/session.php");	
  	include_once("classes/security.php");
  	include_once("classes/database.php");	
	include_once("classes/login.php");
    include_once("lib/persiandate.php"); 
	
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
	
	$db = Database::GetDatabase();
	$row = $db->Select("articles","*","id = '{$_GET[aid]}'");
	$pic = $db->Select("pics","*","idd = '{$row[id]}' AND kind = 1 ");
$html=<<<cd
    	<div id="projects_bg" style="background: url('{$pic[img]}') 50% 0 no-repeat fixed;padding-top: 200px;padding-bottom: 200px;background-size: cover;">         
            <div class="head-title"> 
                <h2>{$row["subject"]}</h2>                        
            </div>
        </div>
        <!-- Projects -->
        <div class="site-wrapper" style="padding-top:40px">                        

            <!-- Who We Are -->            
            <div class="container who-we-are padding-bottom">              
                <div class="row">
                    <div class="col-md-12 about-caption">
                        <div class="general-title">
                            <h2>{$row["subject"]}</h2>
                            <div class="space-bottom-2x"></div>   
                        </div>
                        <p style="line-height:1.5">
                            {$row["body"]}                            
                        </p>                        
                    </div>              
                          
                </div>                                              
            </div><!-- /container -->                                   

        </div>
        <!-- End Projects -->
cd;

include_once('./inc/header.php');
include_once('./inc/menu.php');
echo $html;
include_once('./inc/footer.php');

?>