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
				//echo "my1";
				//tid 1 is for menu pics, 2 for news pics, 3 for maghalat pics
				if ($mode == "insert")
				{
					$fields = array("`tid`","`sid`","`itype`","`img`","`iname`","`isize`");		
					$values = array("'1'","'{$did}'","'{$type}'","'{$imgfp}'","'{$name}'","'{$size}'");	
					$db->InsertQuery('pics',$fields,$values);
				}
				else
				{
					echo "1";
				  $imgrow =$db->Select("pics","*","sid='{$did}' AND tid='1'");
				  if ($imgfp != $imgrow["img"])
				  {
					$values = array("`tid`"=>"'1'","`sid`"=>"'{$did}'",
						"`itype`"=>"'{$type}'","`img`"=>"'{$imgfp}'",
						"`iname`"=>"'{$name}'","`isize`"=>"'{$size}'");
					$db->UpdateQuery("pics",$values,array("sid='{$did}' AND tid='1'"));
				
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
	
	if ($_POST["mark"]=="savedata")
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
		$date = date('Y-m-d H:i:s');
		$fields = array("`mid`","`smid`","`subject`","`text`","`regdate`","`picid`");		
		$values = array("'{$_POST[cbmenu]}'","'{$sm}'","'{$_POST[edtsubject]}'","'{$_POST[edttext]}'","'{$date}'","'0'");	
		if (!$db->InsertQuery('menusubjects',$fields,$values)) 
		{			
			header('location:dataentry.php?act=new&msg=2');			
		} 	
		else 
		{  
			if ($_FILES['userfile']['tmp_name']!="")
			{
				$did = $db->InsertId();
				upload($db,$did,"insert");
				header('location:dataentry.php?act=new&msg=1');
			}	
		}  		
	}
	else
	if ($_POST["mark"]=="editdata")
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
		
		$values = array("`mid`"=>"'{$_POST[cbmenu]}'","`smid`"=>"'{$sm}'",
						"`subject`"=>"'{$_POST[edtsubject]}'","`text`"=>"'{$_POST[edttext]}'",
						"`picid`"=>"'0'");
        $db->UpdateQuery("menusubjects",$values,array("id='{$_GET[did]}'"));
		if ($_FILES['userfile']['tmp_name']!="")
		{
			upload($db,$_GET["did"],"edit");
			//var_dump($_FILES['userfile']);
		}	
	//	upload($db,$_GET["did"],"edit");	
		header('location:dataentry.php?act=new&msg=1');
	}
	
	if ($_GET['act']=="new")
	{
		$insertoredit = "
			<button id='submit' type='submit' class='btn btn-default'>ثبت</button>
			<input type='hidden' name='mark' value='savedata' /> ";
		$menues = $db->SelectAll("submenues","*","pid = 0");	
		$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name",NULL,NULL,"form-control",NULL,"  منو  ");	
	}

	if ($_GET['act']=="view")
	{
	    $row=$db->Select("menusubjects","*","id='{$_GET["did"]}'",NULL);
		
		$menues = $db->SelectAll("submenues","*","pid = 0");
		$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name","{$row[mid]}",NULL,"form-control",NULL,"  منو  ");
		
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
				$m1 = 0;
				$m2 = 0;
			}	
		}
		
		$sm1 = $db->SelectAll("submenues","*","pid = 0");	
		$cbsm1 = DbSelectOptionTag("cbsm1",$sm1,"name","{$m1}",NULL,"form-control",NULL,"زیر منو");	

		$sm2 = $db->SelectAll("submenues","*","pid <> 0");	
		$cbsm2 = DbSelectOptionTag("cbsm2",$sm2,"name","{$m2}",NULL,"form-control",NULL,"زیر منو");	
		
		$pic = $db->Select("pics","*","sid='{$_GET["did"]}' AND tid = 1",NULL);
		if (isset($pic))
		{
			$imgload = "<img  src='img.php?did={$_GET[did]}&tid=1'  width='200px' height='180px' />";
		}	
	}
	
	if ($_GET['act']=="edit")
	{
	    $row=$db->Select("menusubjects","*","id='{$_GET["did"]}'",NULL);		
		$insertoredit = "
			<button id='submit' type='submit' class='btn btn-default'>ویرایش</button>
			<input type='hidden' name='mark' value='editdata' /> ";

		$menues = $db->SelectAll("submenues","*","pid = 0");
		$cbmenu = DbSelectOptionTag("cbmenu",$menues,"name","{$row[mid]}",NULL,"form-control",NULL,"  منو  ");
		
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
		
		$pic = $db->Select("pics","*","sid='{$_GET["did"]}' AND tid = 1",NULL);
		$img = base64_encode($pic['img']);
		$src = 'data: '.$pic['itype'].';base64,'.$img;
		if (isset($pic))
		{
			$imgload = "<img src='{$src}'  width='200px' height='180px' />";
		}	
	}	
$html=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">ورود اطلاعات</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">ورود اطلاعات</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <form id="frmdata" name="frmdata" enctype="multipart/form-data" action="" method="post" class="form-inline ls_form" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">انتخاب منو و زیر منو</h3>
                                </div>
                                <div class="panel-body">
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
                                    <h3 class="panel-title">عنوان</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input id="edtsubject" name="edtsubject" type="text" class="form-control" value="{$row["subject"]}"/>
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
                                            <textarea id="edttext" name="edttext" class="animatedTextArea form-control " >
												{$row["text"]}
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
                                    <h3 class="panel-title">انتخاب عکس</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row ls_divider last">
                                        <div class="form-group">
                                            <div class="col-md-10 col-md-offset-2 ls-group-input">
                                                <input kl_virtual_keyboard_secure_input="on" id="userfile" name="userfile" class="file" multiple="true" data-preview-file-type="any" type="file" />
												<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
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
                                    <h3 class="panel-title">ثبت اطلاعات</h3>
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
	include_once("./inc/footer.php");
?>