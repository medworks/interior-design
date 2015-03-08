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
        <div class="tp-banner-project">
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
    
        <!-- Projects -->
        <div class="site-wrapper">                        

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