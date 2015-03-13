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
	if ($_GET['act']=="del")
	{
		$db->Delete("works"," id",$_GET["did"]);		
		header('location:editwork.php?act=new');	
	}		
    
$html.=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header"> ویرایش نمونه کار ها</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">ویرایش کار </li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">لیست نمونه کار ها</h3>
                                </div>
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <div id="ls-editable-table_filter" class="dataTables_filter">
                                            <label>جستجو:<input type="search" class="" aria-controls="ls-editable-table"></label>
                                        </div>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
											    <th style="width='10px';">#</th>
												<th style="width='30px';">گروه</th>
                                                <th style="width='60px';">عنوان</th>
                                                <th style="width='80px';">متن</th>
                                                <th style="width='50px';">عکس</th>
                                                <th style="width='60px';" class="text-center">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
cd;

	$records_per_page = 10;
	$pagination = new Zebra_Pagination();

	$pagination->navigation_position("right");

	$reccount = $db->CountAll("works");
	$pagination->records($reccount); 
	
    $pagination->records_per_page($records_per_page);	

$rows = $db->SelectAll(
				"works",
				"*",
				NULL,
				"regdate Desc",
				($pagination->get_page() - 1) * $records_per_page,
				$records_per_page);
				
for($i = 0; $i < Count($rows); $i++)
{
$rownumber = $i+1;
$rows[$i]["subject"] = strip_tags($rows[$i]["subject"]);
$rows[$i]["body"] = strip_tags($rows[$i]["body"]);
$rows[$i]["subject"] =(mb_strlen($rows[$i]["subject"])>40)?mb_substr($rows[$i]["subject"],0,40,"UTF-8")."...":$rows[$i]["subject"];
$rows[$i]["body"] =(mb_strlen($rows[$i]["body"])>50)?mb_substr($rows[$i]["body"],0,50,"UTF-8")."...":$rows[$i]["body"];
$pic = $db->Select("pics","*","idd='{$rows[$i][id]}' AND kind=2");
$cat = $db->Select("categories","*","id = {$rows[$i][catid]}");	
/*
if (empty($pic["img"]))
{
	$pic = "";
}
else
{
	$pic = " <img src='../{$pic[img]} ' width='48px' height='48px' /> ";
}
*/
//$pic="<img src='../{$pic[img]}' width='48px' height='48px' /> ";
$html.=<<<cd

                                                
                                            <tr>
                                                <td>{$rownumber}</td>
												<td>{$cat["name"]}</td>
                                                <td>{$rows[$i]["subject"]}</td>
                                                <td>{$rows[$i]["body"]}</td>
												<td><img src='../{$pic[img]}' width='48px' height='48px' /> </td>
                                                <td class="text-center">
												<a href="morepics.php?act=img&did={$rows[$i]["id"]}"  >												
                                                    <button class="btn btn-xs btn-danger" title="عکس بیشتر">
														<i class="fa fa-minus">
														</i>
													</button>
												</a>	
												
												<a href="addwork.php?act=edit&did={$rows[$i]["id"]}"  >					
                                                    <button class="btn btn-xs btn-warning" title="ویرایش">
														<i class="fa fa-pencil-square-o">
														</i>
													</button>
												</a>
												<a href="?act=del&did={$rows[$i]["id"]}"  >												
                                                    <button class="btn btn-xs btn-danger" title="پاک کردن">
														<i class="fa fa-minus">
														</i>
													</button>
												</a>			
                                                </td>
                                            </tr>
cd;
}

	$pgcodes = $pagination->render(true);
	//var_dump($pagination);
$html.=<<<cd
                                            </tbody>
                                        </table>
                                    </div>
									{$pgcodes}
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