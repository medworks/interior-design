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
	$db = Database::GetDatabase();
    $row = $db->Select("headlines","*","num = '{$_GET[sel]}'");
    if ($_POST['mark']=="saveinfo")
    {
		$_POST["edtbody"] = strip_tags($_POST["edtbody"]);
		$values = array("`subject`"=>"'{$_POST[edtsubject]}'",
		                "`body`"=>"'{$_POST[edtbody]}'",
						"`num`"=>"'{$_GET[sel]}'");			
		$db ->UpdateQuery("headlines",$values,array("`num`='{$_GET[sel]}'"));
		//echo $db->cmd;
        header('location:headline.php');       
    }    
$html.=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">تعریف سر فصل</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">سر فصل</li>
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
                                    <h3 class="panel-title">عنوان</h3>
								</div>
								<div class="panel-body">
								<div class="row ls_divider last">
                                <div class="col-md-10 ls-group-input">
									<input type="text" class="form-control" name="edtsubject"  value="{$row[subject]}" />
								</div>
								</div>
								</div>
                                <div class="panel-heading">
                                    <h3 class="panel-title">توضیحات</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row ls_divider last">
                                        <div class="col-md-10 ls-group-input">
                                            <textarea class="form-control" id="edttext" name="edtbody">
                                           {$row[body]}
                                            </textarea>
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