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
	$row = $db->Select("works","*","id = '{$_GET[pid]}'");
	$pics = $db->SelectAll("pics","*","idd = '{$row[id]}' AND kind = 2 ");
            
$html=<<<cd
    <!-- Slider -->        
    <div class="tp-banner-container" id="home">
        <div class="tp-banner-project">
            <ul> 
cd;
$effect = array("slotzoom-horizontal","curtain-1","slotslide-vertical","curtain-2",
					"slidedown","slotzoom-horizontal","slideup","curtain-3","boxfade","boxslide",
					"slotfade-vertical","slideleft");
	
for($i = 0; $i < Count($pics); $i++)
{
	$rnd = mt_rand(0,count($effect)-1);
	$rndeffect = $effect[$rnd];			
$html.=<<<cd
                <!-- SLIDE  -->
                <li data-transition="{$rndeffect}" data-slotamount="8" data-masterspeed="500" data-thumb="" data-saveperformance="off" data-title="Slide">
                    <!-- MAIN IMAGE -->
                    <img src="{$pics[$i][img]}" alt="{$row['subject']}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->                        
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption slider-text lfb ltt tp-resizeme text-center" data-x="center" data-hoffset="0" 
                    data-y="center" data-voffset="-30" data-speed="600" data-start="800" data-easing="Power4.easeOut" 
                    data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" 
                    data-endspeed="500" data-endeasing="Power4.easeIn" style="z-index: 2; max-width: auto; max-height: auto;
                    white-space: nowrap;">{$row["body"]}</div>
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