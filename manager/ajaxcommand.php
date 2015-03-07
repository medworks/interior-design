<?php
	include_once("../config.php");	
    include_once("../classes/database.php");	
	include_once("../classes/functions.php");
	include_once("../lib/persiandate.php");	
	
		
	$db = Database::GetDatabase();

 
 if($_GET["contact"]=="reg"){

	$admin = GetSettingValue('Contact_Email',0);

	$name    = $_POST['name'];
	$email   = $_POST['email'];
	$text = $_POST['comments'];
    $subject = "contact";
	$message = $text;

	if( strlen($name)>=1 && checkEmail($email) && strlen($text)>=1 ){
		if( @mail (
				$admin,
				"$subject",
				$message,
				"From:$name $email" )
		){
			echo "<div class='notification_ok rtl medium'>پیام شما با موفقیت ارسال شد.</div>";

		}else{
			echo "<div class='notification_error rtl'>خطا! پیام شما ارسال نشد لطفا مجددا تلاش نمایید.</div>";

		}
	}else{
		echo "<div class='notification_error rtl'>خطا! لطفا فیلدها را بررسی نمایید و مجددا ارسال کنید!</div>";
	}

}

if (isset($_GET["smid"]))
{
	$submenues = $db->SelectAll("submenues","*","mid={$_GET['smid']} AND pid <> 0","id ASC");	
	$cbsubmenues = DbSelectOptionTag("cbsm1",$submenues,"name",null,null,"form-control",null,"زیر منو");
	echo $cbsubmenues;
}

if (isset($_GET["smid2"]))
{
	$submenues = $db->SelectAll("submenues","*","pid={$_GET['smid2']}","id ASC");	
	$cbsubmenues = DbSelectOptionTag("cbsm2",$submenues,"name",null,null,"form-control",null,"زیر منو");
	echo $cbsubmenues;
}
?>