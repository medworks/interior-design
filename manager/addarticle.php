<?php
	include_once("../config.php");
	include_once("../classes/functions.php");
  	include_once("../classes/messages.php");
  	include_once("../classes/session.php");	
  	include_once("../classes/security.php");
  	include_once("../classes/database.php");	
	include_once("../classes/login.php");
    include_once("../lib/persiandate.php");
	
	$imgload="";
	$login = Login::GetLogin();
    if (!$login->IsLogged())
	{
		header("Location: ../index.php");
		die(); // solve a security bug
	}
	$db = Database::GetDatabase();
	
	function upload($db,$did,$mode)
	{		
		if(is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false)
		{    
			$size = getimagesize($_FILES['userfile']['tmp_name']);		
			$type = $size['mime'];
			$imgfp = mysqli_real_escape_string($db->link,file_get_contents($_FILES['userfile']['tmp_name']));
			//echo $imgfp;
			$size = $size[3];
			$name = $_FILES['userfile']['name'];
			$maxsize = 512000;//512 kb
			//$db = Database::GetDatabase();
			//echo $db->cmd;
			if($_FILES['userfile']['size'] < $maxsize )
			{    
				//tid 1 is for menu pics, 2 for news pics, 3 for maghalat pics
				if ($mode == "insert")
				{
					$fields = array("`tid`","`sid`","`itype`","`img`","`iname`","`isize`");		
					$values = array("'3'","'{$did}'","'{$type}'","'{$imgfp}'","'{$name}'","'{$size}'");	
					$db->InsertQuery('pics',$fields,$values);
				}
				else
				{
				  $imgrow =$db->Select("pics","*","sid='{$did}' AND tid='3' ");
				  if ($imgfp != $imgrow["img"])
				  {
					$values = array("`tid`"=>"'3'","`sid`"=>"'{$did}'",
						"`itype`"=>"'{$type}'","`img`"=>"'{$imgfp}'",
						"`iname`"=>"'{$name}'","`isize`"=>"'{$size}'");
					$db->UpdateQuery("pics",$values,array("sid='{$did}' AND tid='3'"));	
				  }	
				}	
				//echo $db->cmd;
			}
			else
			{        
				throw new Exception("File Size Error");
			}
		}
		else
		{		
			throw new Exception("Unsupported Image Format!");
		}
	}	
	
	if ($_POST["mark"]=="savetopic")
	{
		if (isset($_POST["cbsm2"]) and $_POST["cbsm2"]!=0)
		{
			$sm = $_POST["cbsm2"];
		}
		else
		if (isset($_POST["cbsm1"]) and $_POST["cbsm1"]!=0)
		{
			$sm = $_POST["cbsm1"];
		}
		
		if(isset($_POST['rbselect']) and $_POST['rbselect']=="rbm")
		{
			$grp = 0;
		}
		else
		{
			$grp = $_POST["cbgroup"];
			$sm = 0;			
		}
		$date = date('Y-m-d H:i:s');
		$fields = array("`gid`","`smid`","`subject`","`text`","`regdate`","`picid`");		
		$values = array("'{$grp}'","'{$sm}'","'{$_POST[edtsubject]}'","'{$_POST[edttext]}'","'{$date}'","'0'");	
		if (!$db->InsertQuery('topics',$fields,$values)) 
		{			
			header('location:addarticle.php?act=new&msg=2');			
		} 	
		else 
		{  				
			if ($_FILES['userfile']['tmp_name']!="")
			{
				$did = $db->InsertId();
				upload($db,$did,"insert");
				header('location:addarticle.php?act=new&msg=1');
			}	
		}  		
	}
	else
	if ($_POST["mark"]=="edittopic")
	{		
		if (isset($_POST["cbsm2"]) and $_POST["cbsm2"]!=0)
		{
			$sm = $_POST["cbsm2"];
		}
		else
		if (isset($_POST["cbsm1"]) and $_POST["cbsm1"]!=0)
		{
			$sm = $_POST["cbsm1"];
		}
		
		$values = array("`gid`"=>"'{$_POST[cbgroup]}'","`smid`"=>"'{$sm}'",
						"`subject`"=>"'{$_POST[edtsubject]}'","`text`"=>"'{$_POST[edttext]}'",
						"`picid`"=>"'0'");
        $db->UpdateQuery("topics",$values,array("id='{$_GET[did]}'"));
		if ($_FILES['userfile']['tmp_name']!="")
		{
			upload($db,$_GET["did"],"edit");
			//var_dump($_FILES['userfile']);
		}		
		header('location:addarticle.php?act=new&msg=1');
	}
	
	$rbmchecked = "";
	$rbgchecked = "";
	if ($_GET['act']=="new")
	{
		$insertoredit = "
			<button id='submit' type='submit' class='btn btn-default'>ثبت</button>
			<input type='hidden' name='mark' value='savetopic' /> ";
		$menues = $db->SelectAll("submenues","*","pid = 0");
		$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name",NULL,NULL,"form-control",NULL,"  منو  ");
			
		$group = $db->SelectAll("categories","*");	
		$cbgroup = DbSelectOptionTag("cbgroup",$group,"name",NULL,NULL,"form-control",NULL,"  منو  ");	
		$rbmchecked = "checked=''";
		$rbgchecked = "";
	}
	
	
	if ($_GET['act']=="view")
	{
	    $row=$db->Select("topics","*","id='{$_GET["did"]}'",NULL);
		
		if($row["gid"]!="0")
		{
			//=========================== load default menu =======================
			$menues = $db->SelectAll("submenues","*","pid = 0");
			$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name",NULL,NULL,"form-control",NULL,"  منو  ");
			//=====================================================================
			$group = $db->SelectAll("categories","*");	
			$cbgroup = DbSelectOptionTag("cbgroup",$group,"name",$row["gid"],NULL,"form-control",NULL,"  منو  ");	
			
			$rbmchecked = "";
			$rbgchecked = "checked";
		}
		else
		{
			//====================== load default group=====================
			$group = $db->SelectAll("categories","*");	
			$cbgroup = DbSelectOptionTag("cbgroup",$group,"name",NULL,NULL,"form-control",NULL,"  منو  ");	
			//==============================================================
			$mrow = $db->Select("submenues","*","id='{$row["smid"]}'",NULL);
			$menues = $db->SelectAll("submenues","*","pid = 0");
			$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name","{$mrow[mid]}",NULL,"form-control",NULL,"  منو  ");
		
			$srow=$db->Select("submenues","*","id='{$row["smid"]}'",NULL);
			if ($srow["pid"] == 0)	
			{
				$m = $srow["mid"];
				$m1 = $srow["id"];
				$m2 = 0;
			}
			else
			{			
				$srow2 = $db->Select("submenues","*","id='{$srow["pid"]}'",NULL);
				if ($srow2["pid"] == 0)
				{
					$m1 = $srow["pid"];
					$m2 = $srow["id"];
				}
				else
				{
					$m1 = $srow["id"];
					$m2 = $srow2["pid"];
				}	
			}
		
			$sm1 = $db->SelectAll("submenues","*","pid = 0");	
			$cbsm1 = DbSelectOptionTag("cbsm1",$sm1,"name","{$m1}",NULL,"form-control",NULL,"زیر منو");	

			$sm2 = $db->SelectAll("submenues","*","pid <> 0");	
			$cbsm2 = DbSelectOptionTag("cbsm2",$sm2,"name","{$m2}",NULL,"form-control",NULL,"زیر منو");	
			
			$rbmchecked = "checked";
			$rbgchecked = "";
		}
		
		
		$pic = $db->Select("pics","*","sid='{$_GET["did"]}' AND tid = 3",NULL);
		if (isset($pic))
		{
			$imgload = "<img  src='img.php?did={$_GET[did]}&tid=3'  width='200px' height='180px' />";
		}	
	}
	
	if ($_GET['act']=="edit")
	{
	    $row=$db->Select("topics","*","id='{$_GET["did"]}'",NULL);		
		$insertoredit = "
			<button id='submit' type='submit' class='btn btn-default'>ویرایش</button>
			<input type='hidden' name='mark' value='edittopic' /> ";

		if($row["gid"]!="0")
		{
			//=========================== load default menu =======================
			$menues = $db->SelectAll("submenues","*","pid = 0");
			$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name",NULL,NULL,"form-control",NULL,"  منو  ");
			//=====================================================================
			$group = $db->SelectAll("categories","*");	
			$cbgroup = DbSelectOptionTag("cbgroup",$group,"name",$row["gid"],NULL,"form-control",NULL,"  منو  ");	
			
			$rbmchecked = "";
			$rbgchecked = "checked";
		}
		else
		{
			//====================== load default group=====================
			$group = $db->SelectAll("categories","*");	
			$cbgroup = DbSelectOptionTag("cbgroup",$group,"name",NULL,NULL,"form-control",NULL,"  منو  ");	
			//==============================================================
			$mrow = $db->Select("submenues","*","id='{$row["smid"]}'",NULL);
			$menues = $db->SelectAll("submenues","*","pid = 0");
			$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name","{$mrow[mid]}",NULL,"form-control",NULL,"  منو  ");
		
			$srow=$db->Select("submenues","*","id='{$row["smid"]}'",NULL);
			if ($srow["pid"] == 0)	
			{
				$m = $srow["mid"];
				$m1 = $srow["id"];
				$m2 = 0;
			}
			else
			{			
				$srow2 = $db->Select("submenues","*","id='{$srow["pid"]}'",NULL);
				if ($srow2["pid"] == 0)
				{
					$m1 = $srow["pid"];
					$m2 = $srow["id"];
				}
				else
				{
					$m1 = $srow["id"];
					$m2 = $srow2["pid"];
				}	
			}
		
			$sm1 = $db->SelectAll("submenues","*","pid = 0");	
			$cbsm1 = DbSelectOptionTag("cbsm1",$sm1,"name","{$m1}",NULL,"form-control",NULL,"زیر منو");	

			$sm2 = $db->SelectAll("submenues","*","pid <> 0");	
			$cbsm2 = DbSelectOptionTag("cbsm2",$sm2,"name","{$m2}",NULL,"form-control",NULL,"زیر منو");	
			
			$rbmchecked = "checked";
			$rbgchecked = "";
		}
		
		$pic = $db->Select("pics","*","sid='{$_GET["did"]}' AND tid = 3",NULL);
		if (isset($pic))
		{
			$imgload = "<img  src='img.php?did={$_GET[did]}&tid=3'  width='200px' height='180px' />";
		}	
	}
  
$html.=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header"> ثبت مقاله</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">ثبت مقاله</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <form id="frmnews" name="frmnews" enctype="multipart/form-data" action="" method="post" class="form-inline ls_form" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">انتخاب منو و زیر منو</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="radio-inline">
                                        <label class="radio-inline">
                                            <input type="radio" name="rbselect" id="rbselect" value="rbm" {$rbmchecked} />
                                            انتخاب بر اساس منو
                                        </label>
                                    </div>
                                    
									{$cbmenu}
									<div id="sm1">
											{$cbsm1}
									</div>
                                     <div id="sm2">
											{$cbsm2}
									</div>                                    
									
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">انتخاب گروه</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="radio-inline">
                                        <label class="radio-inline">
                                            <input type="radio" name="rbselect" id="rbselect" value="rbg" {$rbgchecked}/>
                                            انتخاب بر اساس گروه
                                        </label>
                                    </div>
                                    {$cbgroup}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">عنوان</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input id="edtsubject" name="edtsubject" type="text" class="form-control" value = " {$row["subject"]}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">متن</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row ls_divider last">
                                        <div class="col-md-10 ls-group-input">
                                            <textarea class="animatedTextArea form-control " id="edttext" name="edttext"> {$row["text"]}</textarea>
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
                                    <h3 class="panel-title">انتخاب عکس</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row ls_divider last">
                                        <div class="form-group">
                                            <div class="col-md-10 col-md-offset-2 ls-group-input">
                                                <input kl_virtual_keyboard_secure_input="on" id="userfile"  name="userfile" class="file" multiple="true" data-preview-file-type="any" type="file" />
                                            </div>
                                        </div>
                                    </div>
									{$imgload}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ثبت مقاله</h3>
                                </div>
                                <div class="panel-body">
                                    {$insertoredit}
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
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cbmenu").change(function(){
				var id= $(this).val();
				$.get('./ajaxcommand.php?smid='+id,function(data) {			
						$('#sm1').html(data);
						
						$("#cbsm1").change(function(){
							var id= $(this).val();
							$.get('./ajaxcommand.php?smid2='+id,function(data) {			
								$('#sm2').html(data);
							});
						});			
				});
			});			
		
		});
	</script>
cd;
	include_once("./inc/header.php");
	echo $html;
    include_once("./inc/footer.php")
?>