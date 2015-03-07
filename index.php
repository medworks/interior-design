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
		
	$slides = $db->SelectAll("slides","*",NULL,"id ASC");
$html=<<<cd
    <!-- Slider -->        
    <div class="tp-banner-container" id="home">
        <div class="tp-banner">
            <ul> 
cd;
for($i = 0; $i < Count($slides); $i++)
{
$html.=<<<cd
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="5" data-masterspeed="500" data-thumb="" data-saveperformance="off" data-title="Slide">
                    <!-- MAIN IMAGE -->
                    <img src="{$slides[$i][image]}" alt="{$slides[$i][subject]}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->                        
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption slider-text lfb ltt tp-resizeme text-center" data-x="center" data-hoffset="0" 
					data-y="center" data-voffset="-30" data-speed="600" data-start="800" data-easing="Power4.easeOut" 
					data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" 
					data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 2; max-width: auto; max-height: auto;
					white-space: nowrap;">{$slides[$i]["body"]}</div>
                    <!-- LAYER NR. 2 -->
					<!--
                    <div class="tp-caption lfb ltt tp-resizeme" data-x="center" data-hoffset="0" data-y="center" 
					data-voffset="100" data-speed="600" data-start="900" data-easing="Power4.easeOut" 
					data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" 
					data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 3; max-width: auto; max-height: auto;
					white-space: nowrap;"><a href="javascript:void(0);" class="btn black-btn">بازدید</a></div>
					-->
                </li>
                <!-- END SLIDE -->
cd;
}
$html.=<<<cd

            </ul>                      

        </div>                    
    </div>         
    <!-- End Slider -->       

    <!-- Navbar -->   
    <div id="header" class="header">            
        <nav class="navbar navbar-default navbar-static header-nav header-nav-black" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Logo -->        
                    <a class="navbar-brand" href="#home">جایگاه برند</a>        
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#home">صفحه اصلی</a></li>
                        <li><a href="#about">درباره ما</a></li>                                                                            
                        <li><a href="#projects">نمونه کارها</a></li>                    
                        <li><a href="#services">خدمات</a></li>
                        <li><a href="#blog">مقالات</a></li>     
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pages <i class="fa fa-angle-down fa-lg"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="onepage_dark.html">One Page Dark</a></li>
                                <li><a href="onepage_slider.html">One Page Slider</a></li>
                                <li><a href="onepage_video.html">One Page Video</a></li>
                                <li><a href="onepage_nav_bottom.html">One Page Bottom Nav</a></li>
                                <li><a href="onepage-canvas.html">One Page Off-Canvas</a></li>
                                <li><a href="index-m.html">Multi-Page</a></li>
                                <li class="divider"></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>    
                                <li><a href="404_page.html">404 Error</a></li>                                    
                                <li><a href="coming_soon.html">Coming Soon</a></li>                                    
                            </ul>
                        </li> -->                      
                        <li><a href="#contactus">تماس با ما</a></li>  
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>            
    </div>         
    <!-- Navbar -->             

    <!-- Site Wrapper -->
    <div class="site-wrapper" id="about">

        <!-- Who We Are -->            
        <div class="container padding-bottom">              
                
            <div class="row">
                <div class="col-md-10 col-md-offset-1 about-caption text-center" style="float:left">
                    <!-- Section General Title -->
                    <div class="general-title general-title-black">
                        <h2>درباره ما</h2>
                        <div class="space-bottom-2x"></div>   
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیستری را برای طراحان رایانه ای و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                    <div class="space-bottom-2x"></div>   
                </div>                            
            </div>                
            <div class="row">    
                <!-- Item -->
                <div class="col-md-4 about-caption about-caption-black">
                    <div class="col-sm-2">
                        <i class="fa fa-html5 fa-2x"></i>                                    
                    </div>
                    <div class="col-sm-10">
                        <h3>اهداف</h3>                                                                        
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div> 

                <!-- Item -->
                <div class="col-md-4 about-caption about-caption-black">
                    <div class="col-sm-2">
                        <i class="fa fa-desktop fa-2x"></i>                                                                                
                    </div>
                    <div class="col-sm-10">
                        <h3>چشم انداز</h3>                                           
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>

                <!-- Item -->
                <div class="col-md-4 about-caption about-caption-black">
                    <div class="col-sm-2">
                        <i class="fa fa-font fa-2x"></i>                                                                                
                    </div>
                    <div class="col-sm-10">
                        <h3>تاریخچه</h3>                                                                                            
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>                                
                    </div>
                </div>    

            </div><!-- /row -->                      
        </div><!-- /container -->

        <!-- Projects -->            
        <div class="container padding-bottom padding-top-x2" id="projects">
            <div class="row">
                           
                <!-- Section General Title -->
                <div class="general-title general-title-black text-center">
                    <h2>نمونه کارها</h2>
                    <div class="space-bottom-2x"></div>   
                </div>
                         
                <!-- Portfolio Filter -->
                <div id="filters-container" class="cbp-l-filters-alignRight cbp-l-filters-black">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                        همه <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".apartments" class="cbp-filter-item">
                        آپارتمان <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".houses" class="cbp-filter-item">
                        خانه <div class="cbp-filter-counter"></div>
                    </div>
                    <div data-filter=".architecture" class="cbp-filter-item">
                        معماری <div class="cbp-filter-counter"></div>
                    </div>
                </div>

                <div id="grid-container" class="cbp-l-grid-masonry">
                    <ul>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item apartments cbp-l-grid-masonry-height2">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/1.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/1.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>                                                
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item houses cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/2.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/2.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item architecture apartments cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/3.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/3.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item architecture cbp-l-grid-masonry-height2">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/4.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/4.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>                                                
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item apartments cbp-l-grid-masonry-height2">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/5.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/5.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item architecture cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/6.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/6.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item houses cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/7.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/7.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item apartments cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/8.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/8.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item apartments cbp-l-grid-masonry-height2">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/9.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/9.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item houses architecture cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/10.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/10.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item houses architecture cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/11.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/11.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <!-- Portfolio Item (image and description) -->
                        <li class="cbp-item houses architecture cbp-l-grid-masonry-height1">
                            <a class="cbp-caption cbp-lightbox" data-title="عنوان" href="./images/other/12.jpg">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="./images/other/12.jpg" alt="">
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">عنوان</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>                        
            </div><!-- /row -->                   
        </div><!-- /container -->
        <!-- End Projects -->            
        
        <!-- End Testimonials -->

        <!-- Our Services -->            
        <div class="container padding-bottom padding-top-x2" id="services">                                 
            
            <div class="row text-center"> 

                <!-- Service Item (title, icon and description for your service) -->
                <div class="col-sm-4 col-md-4 service-box service-box-black">  
                    <!-- Icon -->                    
                    <i class="fa fa-desktop fa-3x"></i>

                    <!-- Title and Description -->
                    <div class="service-title">    
                        <h3>خدمت اول</h3>                      
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>            
                </div>

                <!-- Service Item (title, icon and description for your service) -->
                <div class="col-sm-4 col-md-4 service-box service-box-black service-box-l">  
                    <!-- Icon -->   
                    <i class="fa fa-folder-open-o fa-3x"></i>
                    
                    <!-- Title and Description -->
                    <div class="service-title">  
                        <h3>خدمت دوم</h3>      
                    </div>                
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>            
                </div>                        

                <!-- Service Item (title, icon and description for your service) -->
                <div class="col-sm-4 col-md-4 service-box service-box-black service-box-l">   
                    <!-- Icon -->  
                    <i class="fa fa-cubes fa-3x"></i>
                    
                    <!-- Title and Description -->
                    <div class="service-title">  
                        <h3>خدمت سوم</h3>                      
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>            
                </div>                                                              

                <!-- Service Item (title, icon and description for your service) -->
                <div class="col-sm-4 col-md-4 service-box-none service-box-none-black">   
                    <!-- Icon -->  
                    <i class="fa fa-laptop fa-3x"></i>
                    
                    <!-- Title and Description -->
                    <div class="service-title">  
                        <h3>خدمت چهارم</h3>                      
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>            
                </div>

                <!-- Service Item (title, icon and description for your service) -->
                <div class="col-sm-4 col-md-4 service-box-none service-box-none-black service-box-l">   
                    <!-- Icon -->  
                    <i class="fa fa-cog fa-3x"></i>
                    
                    <!-- Title and Description -->
                    <div class="service-title">  
                        <h3>خدمت سوم</h3>                      
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>            
                </div>

                <!-- Service Item (title, icon and description for your service) -->
                <div class="col-sm-4 col-md-4 service-box-none service-box-none-black service-box-l">   
                    <!-- Icon -->  
                    <i class="fa fa-file-code-o fa-3x"></i> 
                    
                    <!-- Title and Description -->
                    <div class="service-title">  
                        <h3>خدمت ششم</h3>                      
                    </div>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>            
                </div>

            </div><!-- /row -->                                           
        </div><!-- /container -->
        <!-- End Our Services -->             

        <!-- From Blog -->
        <section class="padding-top-x2 padding-bottom" id="blog">
            <div class="container">
                <!-- Section General Title -->
                <div class="general-title general-title-black text-center">
                    <h2>مقالات</h2>  
                    <div class="space-bottom-2x"></div>                       
                </div>
                <div class="row">
                                                                                                                                                                                   
                    <div id="grid-blog" class="cbp-l-grid-blog">
                        <ul>
                            <!-- Blog Item -->
                            <li class="cbp-item ideas motion">
                                <a href="single-article.php" class="cbp-caption cbp-singlePage">
                                    <!-- Blog Image -->
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="./images/other/blog_1.jpg" alt="">                    
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-text">مشاهده</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Blog Information -->
                                <div class="text-center">
                                    <a href="single-article.php" class="cbp-l-grid-blog-title cbp-singlePage">مطلب اول</a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>                            
                            </li>

                            <!-- Blog Item -->
                            <li class="cbp-item house-design decoration">
                                <a href="single-article.php" class="cbp-caption cbp-singlePage">
                                    <!-- Blog Image -->
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="./images/other/blog_2.jpg" alt="Specifie an alternate text for an image">                    
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-text">مشاهده</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Blog Information -->
                                <div class="text-center">
                                    <a href="single-article.php" class="cbp-l-grid-blog-title cbp-singlePage">مطلب دوم</a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                            </li>

                            <!-- Blog Item -->
                            <li class="cbp-item ideas motion">
                                <a href="single-article.php" class="cbp-caption cbp-singlePage">
                                    <!-- Blog Image -->
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="./images/other/blog_3.jpg" alt="Specifie an alternate text for an image">                    
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-text">مشاهده</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- Blog Information -->
                                <div class="text-center">
                                    <a href="single-article.php" class="cbp-l-grid-blog-title cbp-singlePage">مطلب سوم</a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</div>
                            </li>
                        </ul>
                    </div>                                                                                                                   

                </div><!-- /row -->
            </div><!-- /container -->                              
        </section>
        <!-- End From Blog -->   

    </div><!-- /site-wrapper -->
    <!-- End Site Wrapper -->         

    <!-- Google Map (adress on map can be changed in app.js file) -->
    <div id="map-canvas"></div>
    <!-- End Google Map -->                         
cd;
	include_once('./inc/header.php');
	echo $html;
    include_once('./inc/footer.php');
?>    