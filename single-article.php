<?php

$html=<<<cd
    	<div id="projects_bg" style="background: url('./images/project-header.jpg') 50% 0 no-repeat fixed;padding-top: 200px;padding-bottom: 200px;background-size: cover;">         
            <div class="head-title"> 
                <h2>عنوان مطلب</h2>                        
            </div>
        </div>
        <!-- Projects -->
        <div class="site-wrapper" style="padding-top:40px">                        

            <!-- Who We Are -->            
            <div class="container who-we-are padding-bottom">              
                <div class="row">
                    <div class="col-md-12 about-caption">
                        <div class="general-title">
                            <h2>عنوان</h2>
                            <div class="space-bottom-2x"></div>   
                        </div>
                        <p style="line-height:1.5">
                            
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیستری را برای طراحان رایانه ای و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
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