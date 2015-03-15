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
	$works = $db->SelectAll("works","*",NULL,"regdate Desc");
	$cats = $db->SelectAll("categories","*",NULL,"id ASC");

$html=<<<cd
        <!-- Header Background Parallax Image -->   
        <div id="projects_bg">         
            <div class="head-title"> 
                <h2>کارهای ما</h2>                        
            </div>
        </div>
        <!-- End Header Background Parallax Image -->              

        <!-- Projects -->
        <div class="container padding-bottom padding-top-x2">
            <div class="row">
                           
                <!-- CUBE PORTFOLIO -->
                         
                <!-- Portfolio Filter -->
                <div id="filters-container" class="cbp-l-filters-alignRight">
					<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                        همه <div class="cbp-filter-counter"></div>
                    </div>
cd;
for($i = 0;$i < Count($cats);$i++)
{
$html.=<<<cd
                    <div data-filter=".cls{$cats[$i][id]}" class="cbp-filter-item">
                        {$cats[$i]["name"]} <div class="cbp-filter-counter"></div>
                    </div>
cd;
}
$html.=<<<cd
                </div>
                <div id="grid-container" class="cbp-l-grid-masonry">
                    <ul>
                        <!-- Portfolio Item (image and description) -->
cd;
for($i = 0;$i < Count($works);$i++)
{
	$pic = $db->Select("pics","*","idd= {$works[$i][id]} AND kind=2");   
$html.=<<<cd
                         <li class="cbp-item cls{$works[$i]['catid']} cbp-l-grid-masonry-height1">
                            <a class="cbp-caption" data-title="{$works[$i][subject]}" href="single-project{$works[$i]['id']}.html">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="{$pic['img']}" alt="{$works[$i]["subject"]}>
                                </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignCenter">
                                        <div class="cbp-l-caption-body">
											<div class="cbp-l-caption-text">مشاهده</div>                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
cd;
}
$html.=<<<cd
                    </ul>
                </div>
                <!-- CUBE PORTFOLIO -->
            </div><!-- /row -->   
        </div><!-- /container -->
        <!-- End Projects -->
cd;

include_once('./inc/header.php');
include_once('./inc/menu.php');
echo $html;
include_once('./inc/footer.php');

?>