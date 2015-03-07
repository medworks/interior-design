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
		$db->Delete("news"," id",$_GET["did"]);		
		header('location:editnews.php?act=new');	
	}		
    
$html.=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header"> ویرایش اخبار</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">ویرایش اخبار</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">لیست اخبار</h3>
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
											<th>#</th>
                                                <th>عنوان</th>
                                                <th>متن</th>
                                                <th>منو و زیر منو</th>
                                                <th class="text-center">عملیات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
cd;

	$records_per_page = 10;
	$pagination = new Zebra_Pagination();

	$pagination->navigation_position("right");

	$reccount = $db->CountAll("news");
	$pagination->records($reccount); 
	
    $pagination->records_per_page($records_per_page);	

$rows = $db->SelectAll(
				"news",
				"*",
				NULL,
				"id ASC",
				($pagination->get_page() - 1) * $records_per_page,
				$records_per_page);
				
	
$vals = array();
for($i = 0; $i < Count($rows); $i++)
{
$rownumber = $i+1;
$rows[$i]["subject"] =(mb_strlen($rows[$i]["subject"])>20)?mb_substr($rows[$i]["subject"],0,20,"UTF-8")."...":$rows[$i]["subject"];
$rows[$i]["text"] =(mb_strlen($rows[$i]["text"])>20)?mb_substr($rows[$i]["text"],0,20,"UTF-8")."...":$rows[$i]["text"];
$vals = "";
if ($rows[$i]['smid']!=0)
{
	$row = $db->Select("submenues","*","id={$rows[$i]['smid']}","id ASC");	
	$vals[] = $row["name"];
		
	while($row["pid"]!=0)
	{
		$row = $db->Select("submenues","*","id={$row['pid']}","id ASC");
		$vals[] = $row["name"];
	}
    
	$row = $db->Select("menues","*","id={$row['mid']}","id ASC");	
	$vals[] = $row["name"];
}
else
{
		$row = $db->Select("categories","*","id={$rows[$i]['gid']}","id ASC");	
		$vals[] = "";
		$vals[] = "";
		$vals[] = $row["name"];
}	
$html.=<<<cd

                                                
                                            <tr>
                                                <td>{$rownumber}</td>
                                                <td>{$rows[$i]["subject"]}</td>
                                                <td>{$rows[$i]["text"]}</td>
                                                <td>
                                                    <span class="label label-success">{$vals[2]}</span>
                                                    <span class="label label-info">{$vals[1]}</span>
                                                    <span class="label label-warning">{$vals[0]}</span>                        
                                                </td>
                                                <td class="text-center">
												<a href="addnews.php?act=edit&did={$rows[$i]["id"]}"  >					
                                                    <button class="btn btn-xs btn-warning" title="ویرایش"><i class="fa fa-pencil-square-o"></i></button>
												</a>
												<a href="?act=del&did={$rows[$i]["id"]}"  >												
                                                    <button class="btn btn-xs btn-danger" title="پاک کردن"><i class="fa fa-minus"></i></button>
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