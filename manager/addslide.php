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
                    $fields = array("`subject`","`text`","`itype`","`img`","`iname`","`isize`");     
                    $values = array("'{$_POST[edtsubject]}'","'{$_POST[edttext]}'","'{$type}'","'{$imgfp}'","'{$name}'","'{$size}'"); 
                    $db->InsertQuery('slide',$fields,$values);
                }
                else
                {
                  $imgrow =$db->Select("slide","*","id='{$did}'");
                  if ($imgfp != $imgrow["img"])
                  {
                    $values = array("`subject`"=>"'{$_POST[edtsubject]}'",
									"`text`"=>"'{$_POST[edttext]}'",
									"`itype`"=>"'{$type}'","`img`"=>"'{$imgfp}'",
									"`iname`"=>"'{$name}'","`isize`"=>"'{$size}'");
                    $db->UpdateQuery("slide",$values,array("id='{$did}'")); 
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
    
    if ($_POST["mark"]=="saveslide")
    {     
            upload($db,$did,"insert");
            header('location:addslide.php?act=new&msg=1');
    }
    else
    if ($_POST["mark"]=="editslide")
    {                       
        upload($db,$_GET["did"],"edit");    
        header('location:addslide.php?act=new&msg=1');
    }
    
    if ($_GET['act']=="new")
    {
        $insertoredit = "
            <button id='submit' type='submit' class='btn btn-default'>ثبت</button>
            <input type='hidden' name='mark' value='saveslide' /> ";  		
    }
	if ($_GET['act']=="edit")
	{
	    $row=$db->Select("topics","*","id='{$_GET["did"]}'",NULL);		
		$insertoredit = "
			<button id='submit' type='submit' class='btn btn-default'>ویرایش</button>
			<input type='hidden' name='mark' value='editslide' /> ";
	
	}

        
$html=<<<cd
    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--Top header start-->
                        <h3 class="ls-top-header">تعریف عکس در اسلاید شو</h3>
                        <!--Top header end -->
                        <!--Top breadcrumb start -->
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0);"><i class="fa fa-home"></i></a></li>
                            <li class="active">تعریف عکس در اسلاید شو</li>
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
                    <!-- <div class="row">
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
                    </div> -->
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

        });
    </script>
cd;

    include_once("./inc/header.php");
    echo $html;
    include_once("./inc/footer.php");
?>