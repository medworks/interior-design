<?php
	include_once("config.php");
	include_once("classes/functions.php");
	
	$Address = GetSettingValue('Address',0);
	
	$Tell_Number = GetSettingValue('Tell_Number',0);
	$Fax_Number = GetSettingValue('Fax_Number',0);
	
	$Contact_Email = GetSettingValue('Contact_Email',0);
	
	$Rss_Add = GetSettingValue('Rss_Add',0);	
	$FaceBook_Add = GetSettingValue('FaceBook_Add',0);
	$Twitter_Add = GetSettingValue('Twitter_Add',0);
	$Gplus_Add = GetSettingValue('Gplus_Add',0);
$html=<<<cd
    <!-- Footer -->  
    <div class="footer-big">
        <div class="container">
            <div class="row">

                <!-- About Us Information -->
                <div class="col-md-3 col-sm-6">                           
                    <div class="f-logo">
                        <h2>راهای ارتباط با ما</h2>                                                                    
                    </div>
                </div>
                
                <!-- Recent Posts -->
                <div class="col-md-3 col-sm-6 f-inner f-inner-black">                        
                    <div class="col-sm-2">
                        <i class="fa fa-map-marker fa-lg"></i> 
                    </div>
                    <div class="col-sm-10">
                        <strong>آدرس</strong>
                        <div class="f-space"></div>
                        <address>                                
							{$Address}
                        </address>                           
                    </div>
                </div>

                <!-- Latest Tweet -->
                <div class="col-md-3 col-sm-6 f-inner f-inner-black">
                    <div class="col-sm-2">
                        <i class="fa fa-phone fa-lg"></i> 
                    </div>
                    <div class="col-sm-10">
                        <strong>تلفن</strong>
                        <div class="f-space"></div>
                        <address style="direction:ltr;text-align:right">                                
							{$Tell_Number}
							<br/>
							{$Fax_Number}
                        </address>    
                    </div>
                </div>

                <!-- Recent Works -->
                <div class="col-md-3 col-sm-6 f-inner f-inner-black">   
                    <div class="col-sm-2">
                        <i class="fa fa-envelope fa-lg"></i> 
                    </div>
                    <div class="col-sm-10">
                        <strong>ایمیل</strong>
                        <div class="f-space"></div>
                        <address> 
							{$Contact_Email}
                        </address>    
                    </div>      
                </div>                           

            </div>
        </div>
    </div>   

    <div id="footer">
        <div class="container" style="margin:0">   
            <div class="row">                                                         
                <!-- Copyright -->                                                       
                <div class="col-sm-6 col-md-6 f-copyright">                        
                    <span>© Copyright Parsa MDF - All Rights Reserved - Design by Mediateq.ir</span>                        
                </div>                      
                <div class="col-sm-6 col-md-6">
                    <!-- Social Icons -->                              
                    <ul class="footer-social footer-social-black">
                        <li><a href="{$FaceBook_Add}"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a></li>
                        <li><a href="{$Twitter_Add}"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></a></li>
                        <li><a href="{$Gplus_Add}"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x fa-inverse"></i></span></a></li>
                        <li><a href="{$Rss_Add}"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-rss fa-stack-1x fa-inverse"></i></span></a></li>
                    </ul>
                </div>
            </div><!-- /row -->
        </div><!-- /container -->
    </div>        
    <!-- End Footer -->               

    <!-- jQuery Plugins -->    
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.themepunch.tools.min.js"></script>   
    <script src="./js/jquery.themepunch.revolution.min.js"></script> 
    <script src="./js/jquery.cubeportfolio.min.js"></script>      
    <script src="./js/owl.carousel.js"></script>
    <script src="./js/moderniz.js"></script>    
    <script src="./js/jquery.sticky.js"></script>   
    <script src="./js/jquery.mmenu.min.js"></script>                     
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>     
    <script src="./js/app.js"></script>                                
    
</body>
</html>
cd;
	echo $html;
?>