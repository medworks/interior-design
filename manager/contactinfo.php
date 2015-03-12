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
		SetSettingValue("Admin_Email",$_POST["Admin_Email"]);
		SetSettingValue("News_Email",$_POST["News_Email"]);
		SetSettingValue("Contact_Email",$_POST["Contact_Email"]);
		SetSettingValue("Email_Sender_Name",$_POST["Email_Sender_Name"]);		
		SetSettingValue("FaceBook_Add",$_POST["FaceBook_Add"]);
		SetSettingValue("Twitter_Add",$_POST["Twitter_Add"]);
		SetSettingValue("Rss_Add",$_POST["Rss_Add"]);
		SetSettingValue("Gplus_Add",$_POST["Gplus_Add"]);
		SetSettingValue("Tell_Number",$_POST["Tell_Number"]);
		SetSettingValue("Fax_Number",$_POST["Fax_Number"]);
		SetSettingValue("Address",$_POST["Address"]);		
		header('location:contactinfo.php');		
	}
	
	$Admin_Email = GetSettingValue('Admin_Email',0);
	$News_Email = GetSettingValue('News_Email',0);
	$Contact_Email = GetSettingValue('Contact_Email',0);
	$Rss_Add = GetSettingValue('Rss_Add',0);
	$Email_Sender_Name = GetSettingValue('Email_Sender_Name',0);
	$FaceBook_Add = GetSettingValue('FaceBook_Add',0);
	$Twitter_Add = GetSettingValue('Twitter_Add',0);
	$Gplus_Add = GetSettingValue('Gplus_Add',0);
    $Tell_Number = GetSettingValue('Tell_Number',0);
	$Fax_Number = GetSettingValue('Fax_Number',0);
	$Address = GetSettingValue('Address',0);
	
$html.=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">اطلاعات تماس با ما</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">اطلاعات تماس با ما</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <form class="form-horizontal ls_form" role="form" action="" method="post" >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">اطلاعات تماس با ما</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس ایمیل مدیریت</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Admin_Email"  value="{$Admin_Email}" />
                                            </div>
                                        </div>
                                    </div>
									<!--
									<div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس ایمیل خبرنامه</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="News_Email"  value="{$News_Email}" />
                                            </div>
                                        </div>
                                    </div>
									-->
									<div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">اسم ارسال کننده</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Email_Sender_Name"  value="{$Email_Sender_Name}" />
                                            </div>
                                        </div>
                                    </div>
									<div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس ایمیل تماس با ما </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Contact_Email"  value="{$Contact_Email}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس RSS</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Rss_Add" value="{$Rss_Add}"/>
                                                <span class="help_text">
                                                    آدرس خبرنامه را در این قسمت قرار دهید. به طور مثال: http://www.rahyabclinic.com/rss.php
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">تلفن شرکت</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Tell_Number" value="{$Tell_Number}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">فاکس شرکت</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Fax_Number" value="{$Fax_Number}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس شرکت</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Address" value="{$Address}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس facebook</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="FaceBook_Add"  value="{$FaceBook_Add}"/>
                                                <span class="help_text">
                                                    آدرس فیسبوک را در این قسمت قرار دهید. به طور مثال: https://www.facebook.com/rahyabclinic
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس twitter</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Twitter_Add" value="{$Twitter_Add}" />
                                                <span class="help_text">
                                                    آدرس تویتر را در این قسمت قرار دهید. به طور مثال: https://www.twitter.com/rahyabclinic
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ls_divider">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">آدرس google plus</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="Gplus_Add"  value={$Gplus_Add} />
                                                <span class="help_text">
                                                    آدرس گوگل پلاس را در این قسمت قرار دهید. به طور مثال: https://plus.google.com/rahyabclinic
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