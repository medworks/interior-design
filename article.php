<?php
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
                            <li class="cbp-item">
                                <a href="blog-posts/post1.html" class="cbp-caption cbp-singlePage">
                                    <!-- Blog Image -->
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="./images/other/blog_1.jpg" alt="Specifie an alternate text for an image">                    
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
                                    <a href="blog-posts/post1.html" class="cbp-l-grid-blog-title cbp-singlePage">Lorem ipsum dolor sit amet</a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat magna aliquam erat volutpat.</div>                            
                            </li>

                            <!-- Blog Item -->
                            <li class="cbp-item">
                                <a href="blog-posts/post2.html" class="cbp-caption cbp-singlePage">
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
                                    <a href="blog-posts/post2.html" class="cbp-l-grid-blog-title cbp-singlePage">Consectetuer adipiscing elit sed diam </a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat magna aliquam erat volutpat.</div>
                            </li>

                            <!-- Blog Item -->
                            <li class="cbp-item">
                                <a href="blog-posts/post3.html" class="cbp-caption cbp-singlePage">
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
                                    <a href="blog-posts/post3.html" class="cbp-l-grid-blog-title cbp-singlePage">Nonummy nibh euismod tincidunt</a>
                                </div>
                                <div class="cbp-l-grid-blog-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat magna aliquam erat volutpat.</div>
                            </li>                            
                        </ul>                                                
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