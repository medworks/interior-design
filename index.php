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
	$headlines = $db->SelectAll("headlines","*",NULL,"num ASC");
$html=<<<cd
    <!-- Slider -->        
    <div class="tp-banner-container" id="home">
        <div class="tp-banner">
            <ul> 
cd;
	$effect = array("slotzoom-horizontal","curtain-1","slotslide-vertical","curtain-2",
					"slidedown","slotzoom-horizontal","slideup","curtain-3","boxfade","boxslide",
					"slotfade-vertical","slideleft");	
for($i = 0; $i < Count($slides); $i++)
{
	$rnd = mt_rand(0,count($effect)-1);
	$rndeffect = $effect[$rnd];
$html.=<<<cd
                <!-- SLIDE  -->
                <li data-transition="{$rndeffect}" data-slotamount="8" data-masterspeed="600" data-thumb="" data-saveperformance="off" data-title="Slide">
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
	$About_System = GetSettingValue('About_System',0);
$html2.=<<<cd
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
                    <p>{$About_System}</p>
                    <div class="space-bottom-2x"></div>   
                </div>                            
            </div>                
            <div class="row">    
                <!-- Item -->
cd;
for($i = 0; $i < Count($headlines); $i++)
{
	switch ($i)
	{
		case 0 :
$icon=<<<cd
	<div class="col-sm-2">
          <i class="fa fa-html5 fa-2x"></i>                                    
    </div>
cd;
		break;
		case 1 :
$icon=<<<cd
	<div class="col-sm-2">
        <i class="fa fa-desktop fa-2x"></i>                                                                                
    </div>
cd;
		break;
	    case 2 :
$icon=<<<cd
	  <div class="col-sm-2">
            <i class="fa fa-font fa-2x"></i>                                                                                
      </div>
cd;
		break;		
	}	
$html2.=<<<cd
                <div class="col-md-4 about-caption about-caption-black">
                    {$icon}
                    <div class="col-sm-10">
                        <h3>{$headlines[$i]["subject"]}</h3>                                                                        
                        <p>{$headlines[$i]["body"]}</p>
                    </div>
                </div> 
cd;
}
$html2.=<<<cd
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
cd;

$cats = $db->SelectAll("categories","*",NULL,"id ASC");
for($i = 0;$i < Count($cats);$i++)
{
$html2.=<<<cd
                    <div data-filter=".cls{$cats[$i][id]}" class="cbp-filter-item">
                       {$cats[$i]["name"]} <div class="cbp-filter-counter"></div>
                    </div>
cd;
}

$html2.=<<<cd
			</div>
                <div id="grid-container" class="cbp-l-grid-masonry">
                    <ul>
						<!-- Portfolio Item (image and description) -->
cd;
$works = $db->SelectAll("works","*",NULL,"regdate DESC","0","8");   
for($i = 0;$i < Count($works);$i++)
{
	$pic = $db->Select("pics","*","idd= {$works[$i][id]} AND kind=2");   
$html2.=<<<cd
                        <li class="cbp-item cls{$works[$i]['catid']} cbp-l-grid-masonry-height1">
                            <a class="cbp-caption" data-title="{$works[$i][subject]}" href="single-project{$works[$i]['id']}.html">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{$pic['img']}" alt="{$works[$i]["subject"]}"/>
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title">{$works[$i]["subject"]}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
cd;
}
$html2.=<<<cd
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
                    <h2>مطالب</h2>  
                    <div class="space-bottom-2x"></div>                       
                </div>
				<div class="row">
				 <div id="grid-blog" class="cbp-l-grid-blog">
                        <ul>
cd;
	$articles = $db->SelectAll("articles","*",NULL,"regdate Desc","0","2");
	for($i=0;$i<count($articles);$i++)
	{
		$pic = $db->Select("pics","*","idd = '{$articles[$i][id]}' AND kind = 1 ");
		$articles[$i]["body"] = strip_tags($articles[$i]["body"]);
		$articles[$i]["body"] =(mb_strlen($articles[$i]["body"])>200)?mb_substr($articles[$i]["body"],0,200,"UTF-8")."...":$articles[$i]["body"];
$html2.=<<<cd
                            <!-- Blog Item -->
                            <li class="cbp-item ideas motion">
                                <a href="single-article{$articles[$i]['id']}.html" class="cbp-caption">
                                    <!-- Blog Image -->
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="./{$pic[img]}" alt="{$articles[$i][subject]}">                    
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
                                    <a href="single-article{$articles[$i]['id']}.html" class="cbp-l-grid-blog-title">{$articles[$i]["subject"]}</a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">{$articles[$i]["body"]}</div>                            
                            </li>
cd;
}

$html2.=<<<cd
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
        <a href="#" class="f-cta f-cta-black" data-toggle="modal" data-target="#myModal">برای تماس با ما کلیک نمایید</a>
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