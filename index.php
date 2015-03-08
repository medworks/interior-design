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
cd;
$html2=<<<cd
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
                            <a class="cbp-caption" data-title="عنوان" href="single-project.php">
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
    <div class="f-action" id="contactus">
        <a href="#" class="f-cta f-cta-black" data-toggle="modal" data-target="#myModal">تماس با ما</a>
    </div>
            
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button type="button" class="close close-black" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">بستن</span></button>
                </div>
                <div class="modal-body">
                    <!-- Contact Form (name, email, phone and message inputs for your email form "should change your email adress in contact.php file") -->     
                    <div id="contact">                            
                        <div id="message"></div>
                        <form method="post" action="" name="contactform" id="contactform">
                            <fieldset>
                                <div class="col-md-12">
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
                                    <button type="submit" class="btn black-btn blog-btn submit" id="submit" value="Submit">ارسال</button>
                                </div>                                                                                                                                                             
                            </fieldset>
                        </form>                            
                    </div>          
                    <!-- End Contact Form -->
                </div>                    
            </div>
        </div>
    </div>                         
cd;
	include_once('./inc/header.php');
	echo $html;
    include_once('./inc/menu.php');
    echo $html2;
    include_once('./inc/footer.php');
?>    