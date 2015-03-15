<?php
	include_once("config.php");
	include_once("classes/functions.php");
  	include_once("classes/messages.php");
  	include_once("classes/session.php");	
  	include_once("classes/security.php");
  	include_once("classes/database.php");	
	include_once("classes/login.php");
    include_once("lib/persiandate.php"); 
	include_once("classes/seo.php");	
	
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
	$seo = Seo::GetSeo();
	
	$seo->Site_Title = "مقالات";
	
	$db = Database::GetDatabase();	
	$articles = $db->SelectAll("articles","*",NULL,"regdate Desc");
	
$html=<<<cd
        <!-- Header Background Parallax Image -->
        <div id="blog_bg">
            <div class="head-title">
                <h2>مقالات</h2>                
            </div>  
        </div>
        <!-- End Header Background Parallax Image -->

        <!-- Site Wrapper -->
        <div class="site-wrapper padding-bottom">

            <!-- Blog -->
            <div class="container">
                <div class="row">

                    <div id="grid-blog" class="cbp-l-grid-blog">
                        <ul>
                            <!-- Blog Item -->
cd;
for($i = 0; $i < Count($articles); $i++)
{
	$pic = $db->Select("pics","*","idd= {$articles[$i][id]} AND kind=1");   
	$articles[$i]["body"] = strip_tags($articles[$i]["body"]);
	$articles[$i]["body"] =(mb_strlen($articles[$i]["body"])>150)?mb_substr($articles[$i]["body"],0,150,"UTF-8")."...":$articles[$i]["body"];
$html.=<<<cd
                            <li class="cbp-item">
                                <a href="single-article{$articles[$i]['id']}.html" class="cbp-caption ">
                                    <!-- Blog Image -->
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="{$pic['img']}" alt="{$articles[$i]['subject']}">                    
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
$html.=<<<cd
                    </div>
                </div><!-- /row -->    
            </div><!-- /container -->
            <!-- End Blog -->
        </div><!-- /site-wrapper -->
        <!-- End Site Wrapper -->
cd;

include_once('./inc/header.php');
include_once('./inc/menu.php');
echo $html;
include_once('./inc/footer.php');

?>