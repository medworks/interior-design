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
    $About_System = GetSettingValue('About_System',0);
	
$html=<<<cd
        <!-- Header Background Parallax Image -->
        <div id="about_bg">
            <div class="head-title">
                <h2>درباره ما</h2>                
            </div>  
        </div>
        <!-- End Header Background Parallax Image -->

        <!-- Site Wrapper -->
        <div class="site-wrapper padding-bottom">
            <div class="site-wrapper">                        

                <!-- Who We Are -->            
                <div class="container who-we-are padding-bottom">              
                    <div class="row">
                        <div class="col-md-12 about-caption">
                            <p>
                                {$About_System}
                            </p>                        
                            <div class="space-bottom-2x"></div>
                        </div>            
                    </div>                                              
                </div><!-- /container -->                   
                <!-- End Who We Are --> 
                                            

            </div>
        </div><!-- /site-wrapper -->
        <!-- End Site Wrapper -->
cd;

include_once('./inc/header.php');
include_once('./inc/menu.php');
echo $html;
include_once('./inc/footer.php');

?>