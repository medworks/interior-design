<?php
	include_once("../config.php");
	include_once("../classes/functions.php");
  	include_once("../classes/messages.php");
  	include_once("../classes/session.php");	
  	include_once("../classes/security.php");
  	include_once("../classes/database.php");	
	include_once("../classes/login.php");
    include_once("../lib/persiandate.php"); 

	$login = Login::GetLogin();
    if (!$login->IsLogged())
	{
		header("Location: ../index.php");
		die(); // solve a security bug
	}
		
	if ($_POST['mark']=="saveinfo")
	{
		SetSettingValue("Site_Title",$_POST["title"]);
		SetSettingValue("Site_KeyWords",$_POST["keywords"]);
		SetSettingValue("Site_Describtion",$_POST["describe"]);
		header('location:settinginfo.php');	
	}
	
	$Site_Title = GetSettingValue('Site_Title',0);
	$Site_KeyWords = GetSettingValue('Site_KeyWords',0);
	$Site_Describtion = GetSettingValue('Site_Describtion',0);
	

$html.=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">اطلاعات سایت</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">اطلاعات سایت</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <form class="form-horizontal ls_form" role="form" action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">اطلاعات تکمیلی</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">عنوان سایت</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="title" value="{$Site_Title}"/>
                                                <span class="help_text">
                                                    عنوانی که بالای تب های مرورگر ها نمایش داده خواهد شد.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">کلمات کلیدی</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="keywords" value="{$Site_KeyWords}"/>
                                                <span class="help_text">
                                                    این کلمات برای جستجوگر ها مفید می باشند. برای جدا نمودن هر کلمه از علامت , استفاده نمایید.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">توضیحات سایت</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="describe" value="{$Site_Describtion}" />
                                                <span class="help_text">
                                                    توضیحاتی که در هنگام جستجو در گوگل زیر لینک جستجو به نمایش گذاشته می شود.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ثبت اطلاعات</h3>
                                </div>
                                <div class="panel-body">
                                    <button type="submit" class="btn btn-default">ثبت</button>
									<input type="hidden"  name="mark" value="saveinfo" /> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Main Content Element  End-->
            </div>
        </div>
    </section>
    <!--Page main section end -->
cd;
	include_once("./inc/header.php");
	echo $html;
    include_once("./inc/footer.php");
?>