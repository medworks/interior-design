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
                <h2>تماس با ما</h2>                
            </div>  
        </div>
        <!-- End Header Background Parallax Image -->

        <div class="bg-color padding-top-x2">
            <div class="container padding-bottom">
                <div class="col-lg-12" id="contact">                
                    <div id="message"></div>
                    <form method="post" action="contact.php" name="contactform" id="contactform">
                        <fieldset>
                            <div class="col-md-6 rtl">

                                <!-- Description -->                                        
                                <h3>راه های تماس با ما</h3>   
                                <br>
                                <div class="row">
                                    <!-- Adress -->                       
                                    <div class="col-sm-3 col-md-6">
                                        <div class="col-sm-2 contact-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <span><b>آدرس</b></span> 
                                            <address>                            
                                                <small>
                                                    190 Tehun Street<br>
                                                    Los Angeles, CA 913 20                                                            
                                                </small>                               
                                            </address>             
                                        </div>                   
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-sm-3 col-md-6">
                                        <div class="col-sm-2 contact-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <span><b>تلفن</b></span>
                                            <address>                            
                                                <small>                                                           
                                                    +88 (0) 61 3 8376 6284  
                                                </small>
                                            </address>            
                                        </div>                    
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Fax -->
                                    <div class="col-sm-3 col-md-6">
                                        <div class="col-sm-2 contact-icon">
                                            <i class="fa fa-fax"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <span><b>فکس</b></span>
                                            <address>                            
                                                <small>
                                                    +88 (0) 61 3 8376 6284                          
                                                </small>
                                            </address>
                                        </div>
                                    </div> 

                                    <!-- Email -->
                                    <div class="col-sm-3 col-md-6">
                                        <div class="col-sm-2 contact-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <span><b>ایمیل</b></span>
                                            <address>                            
                                                <small>
                                                   no-reply@yourdomain.com                    
                                                </small>
                                            </address>
                                        </div>
                                    </div>                                                                                        
                                </div>
                                <br>
                                <div class="row">                                            
                                    <div class="col-sm-3 col-md-12">
                                        <ul class="contact-social">
                                            <li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a></li>
                                            <li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></a></li>
                                            <li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x fa-inverse"></i></span></a></li>
                                            <li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-rss fa-stack-1x fa-inverse"></i></span></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6"> 
                                <!-- Name -->
                                <input kl_virtual_keyboard_secure_input="on" name="name" id="name" size="30" value="" placeholder="نام" type="text">
                                <br>
                                <!-- Email -->
                                <input kl_virtual_keyboard_secure_input="on" name="email" id="email" size="30" value="" placeholder="ایمیل" type="text">
                                <br> 
                                <!-- Phone -->
                                <input kl_virtual_keyboard_secure_input="on" name="phone" id="phone" size="30" value="" placeholder="تلفن" type="text">

                                <!-- Message -->                                                                        
                                <textarea name="comments" cols="40" rows="5" id="comments" placeholder="پیام"></textarea>

                                <!-- Submit Button -->                                        
                                <button type="submit" class="btn btn-default btn-submit submit" id="submit" value="submit" style="font-size:20px">ارسال</button>
                                
                            </div>
                                                                                                
                        </fieldset>
                    </form>
                </div>
            </div>   
        </div>
        <!-- Google Map (adress on map can be changed in app.js file) -->
        <div id="map-canvas"></div>
        <!-- End Google Map -->
cd;

include_once('./inc/header.php');
include_once('./inc/menu.php');
echo $html;
include_once('./inc/footer.php');

?>