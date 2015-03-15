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
			
    function uploadpics($mode,$fileup,$db,$id,$lvl,$filename=NULL)
	{
		$target_dir = "workpics/";
		//echo "first->".count($_FILES[$fileup]['name']);
		for($i=0; $i<count($_FILES[$fileup]['name']); $i++)
		{
		//	echo "<br/>num is ->".$i;
			$imageFileType = pathinfo($_FILES[$fileup]["name"][$i],PATHINFO_EXTENSION);		
			$target_file = "../".$target_dir . basename($_FILES[$fileup]["name"][$i]);
			$uploadOk = 1;
		
		
			if(isset($_POST["submit"])) 
			{
				$check = getimagesize($_FILES[$fileup]["tmp_name"][$i]);
				if($check !== false) 
				{				
					$uploadOk = 1;
				} 
				else 
				{
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			if ($_FILES[$fileup]["size"][$i] > 500000) 
			{
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && 
			$imageFileType != "jpeg"&& $imageFileType != "gif" ) 
			{
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} 
			else 
			{    
				if ($mode == "insert")
				{
					// kind 1 is for article pics, 2 is for works pics
					if (move_uploaded_file($_FILES[$fileup]["tmp_name"][$i], $target_file)) 
					{	
						$fn = $target_dir . basename($_FILES[$fileup]["name"][$i]);
						$fields = array("`idd`","`img`","`kind`");
						$values = array("'{$id}'","'{$fn}'","'2'");
						$db->InsertQuery('pics',$fields,$values);
					} 
					else 
					{
						echo "Sorry, there was an error uploading your file.";
					}
				}
				else
				{
					//if (!empty($_FILES[$fileup]["name"])) 
					{
						$lpic = $db->Select("pics","*","idd = '{$id}'");
						$lfn = "../".$target_dir.$lpic["img"];
						if (file_exists($lfn)&& $lpic["img"]!="")
						{
							unlink($lfn);
						}
						$db->Delete("pics"," id",$lpic["id"]);	
						if (move_uploaded_file($_FILES[$fileup]["tmp_name"][$i], $target_file)) 
						{	
							$fn = $target_dir . basename($_FILES[$fileup]["name"][$i]);
							$fields = array("`idd`","`img`","`kind`");				
							$values = array("'{$id}'","'{$fn}'","'2'");
							$db->InsertQuery('pics',$fields,$values);
							//echo $db->cmd;
						} 
						else 
						{
							echo "Sorry, there was an error uploading your file.";
						}
					}	
				}
			}
		}	
	}
	if ($_POSTp["mark"]=="addpic")
	{
		uploadpics("insert","userfile",$db,$_GET["id"],"1");
		header('location:addmp.php?msg=1');
	}
$msgs = GetMessage($_GET['msg']);	
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
                            <li class="active">عکس های بیشتر</li>
                        </ol>
                        <!--Top breadcrumb start -->
                    </div>
                </div>
                <!-- Main Content Element  Start-->
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">حذف / اضافه  عکس</h3>
                                </div>
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">									
									{$msgs}
									<form id="frmaddpic" name="frmaddpic" enctype="multipart/form-data" action="" method="post" class="form-inline ls_form" role="form">
									
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
																<input kl_virtual_keyboard_secure_input="on" id="userfile"  name="userfile[]" class="file" multiple="true" data-preview-file-type="any" type="file" />
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" name="mark" value="addpic" />
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