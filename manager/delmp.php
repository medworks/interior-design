<?php
	include_once("../config.php");
	include_once("../classes/functions.php");
  	include_once("../classes/messages.php");
  	include_once("../classes/session.php");	
  	include_once("../classes/security.php");
  	include_once("../classes/database.php");	
	include_once("../classes/login.php");
    include_once("../lib/persiandate.php"); 
	include_once("../lib/Zebra_Pagination.php"); 
	
	
	$login = Login::GetLogin();
    if (!$login->IsLogged())
	{
		header("Location: ../index.php");
		die(); // solve a security bug
	} 
	$db = Database::GetDatabase();
	//$rows = $db->SelectAll("pics","*","kind = 2");
	$pics = $db->SelectAll("pics","*","kind = 2 AND idd='{$_GET['id']}'");
	
	foreach($pics as $key=>$val)
		$img[] = $val['id'];	
	if ($_POST["mark"]=="change")
	{
		$getimgs = $_POST["pic"];
		//$values = array("`idd`"=>"'{$_POST[cbcats]}'");
		//$db->UpdateQuery("pics",$values,array("id='{$_GET[did]}'"));
		//header('location:editwork.php?act=edit');
	}
$html=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">ویرایش عکس ها</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">حذف/اضافه کردن عکس </li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">حذف/اضافه عکس</h3>
                                </div>
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table"> 
									<form action="" method="post" name="frmaddmore">
cd;
for($i=0;$i < count($pics);$i++)
{
	if ($pics[$i]['checked'])
	{
		$checked = "checked";
	}
	else
	{
		$checked = "";
	}
$html.=<<<cd
	<img src="../{$pics[$i]['img']}" width="64px" height="64px"/>	
	<input type="checkbox" name="pic" value="{$pics[$i]['idd']}" {$checked}>	
cd;
}
$html.=<<<cd
			<br/><br/><br/>
			<input type="submit" name="submit" value="ثبت" />
			<input type="hidden" name="mark" value="change" />
			</form>
                                    </div>									
                                    <!--Table Wrapper Finish-->                                    
                                </div>
                            </div>
                        </div>
                    </div>           
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