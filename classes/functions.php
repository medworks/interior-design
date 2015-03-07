<?php
	//include_once("../lib/persiandate.php");		
	//include_once("../lib/class.phpmailer.php");
	include_once("messages.php");
	include_once("database.php");
	include_once("seo.php");
  function GetPageName($func,$act)
	{	   
		$db = Database::GetDatabase();	
		$seo = Seo::GetSeo();
		switch($func)
		{
			case 'initial':
				return "index.php";
			break;
            case 'about':
				$seo->Site_Title = "درباره ما";	
				$seo->Site_Describtion = mb_substr(GetSettingValue('About_System',1),0,150,"UTF-8");
                return "themes/about.php";
			break;
			case 'documentation':			    			
				$seo->Site_Title = "درخواست مستندات";
                return "themes/documentation.php";
			break;
			case 'contact':			    			
				$seo->Site_Title = "تماس با ما";
				$seo->Site_Describtion = mb_substr(GetSettingValue('Address',1),0,150,"UTF-8");
                return "themes/contact.php";
			break;
			case 'gallery':
			    $seo->Site_Title = "گالری تصاویر";				
                return "themes/gallery.php";
			break;
			case 'dashboard':
				if ($act=="do") return "dashboard.php";
			break;
            case 'research':
				$seo->Site_Title = "تحقیقات";
                if ($act=="do") return "themes/research.php";
            break;
            case 'construction':
				$seo->Site_Title = "ساخت";
                if ($act=="do") return "themes/construction.php";
            break;
            case 'regeneration':
				$seo->Site_Title = "بازسازی";
                if ($act=="do") return "themes/regeneration.php";
            break;	
			case 'search':
				$seo->Site_Title = "جستجو";
                if ($act=="do") return "themes/search.php";
			break;
			case 'uploadmgr':
              if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/uploadmgr.php";
			break;			
			case 'researchmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/researchmgr.php";
			break;
			case 'reconstructmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/reconstructmgr.php";
			break;
			case 'constructmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/constructmgr.php";
			break;
			case 'docsmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/docsmgr.php";
			break;
			case 'usermgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/usermgr.php";
			break;
			case 'slidesmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/slidesmgr.php";
			break;
			case 'gallerymgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/gallerymgr.php";
			break;
			case 'secmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/categorymgr.php";
			break;
			case 'catmgr':
                if ($act=="do" or $act=="new" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/categorymgr.php";
			break;
			case 'requestmgr':
                if ($act=="do" or $act=="check" or $act=="mgr" or $act=="del" or $act=="edit") return "../manager/requestmgr.php";
			break;
			case 'settingmgr':
                if ($act=="do" or $act=="about" or $act=="seo" or $act=="grid" or $act=="addresses") return "../manager/settingmgr.php";
			break;			
		}
	}
	function GetMessage($msgid)
	{
		$msg = Message::GetMessage();
		$result = "";
		switch($msgid)
		{
			case 1:
				$result = $msg->ShowSuccess("ثبت اطلاعات با موفقیت انجام شد");
			break;	
			case 2:
				$result = $msg->ShowError("ثبت اطلاعات با مشکل مواجه شد");
			break;	
            case 3:
				$result = $msg->ShowError("عمليات آپلود با مشكل مواجه شد");
			break;	
			case 4:
				$result = $msg->ShowError("لطفا فایل عکس را انتخاب نمایید");
			break;	
			case 5:
				$result = $msg->ShowError("لطفا فیلد توضیحات را تکمیل نمایید");
			break;	
			case 6:
				$result = $msg->ShowInfo("عبارت مورد نظر یافت نشد");
			break;
			case 7:
				$result = $msg->ShowSuccess("ارسال خبر با موفقیت انجام شد");
			break;
			case 8:
				$result = $msg->ShowError("ارسال خبر با مشکل مواجه شد");
			break;
			case 9:
				$result = $msg->ShowSuccess("تنظیمات اعمال شد");
			break;
			case 10:
				$result = $msg->ShowSuccess("سوال شما ارسال شد. به زودی پاسخ خود را از طریق ایمیل دریافت خواهید کرد.");
			break;
		}
		$result .= <<<JAVA
		<script language="javascript">
		$(document).ready(function(){
			$("#message").delay(5000).fadeOut(500);
		});	
		</script>
JAVA;
		return $result;
	}
  
function Pagination($itemsCount, $maxItemsInPage,
		$currentPageNo, $maxPageNumberAtTime, $linkFormat = "%PN%")
         {
		$pageCount = ceil($itemsCount / $maxItemsInPage);
		if ($pageCount <= 1) return "";
		$half = floor($maxPageNumberAtTime / 2);
		$left = $currentPageNo - $half;
		$right = $currentPageNo + $half;
		$pseudoLeft = 1 - $left;
		$pseudoRight = $right - $pageCount;
		if ($pseudoLeft > 0)
		{
			$left = 1;
			if (($pageCount - $right) > $pseudoLeft)
				$right += $pseudoLeft;
			else
				$right = $pageCount;
		}
		if ($pseudoRight > 0)
		{
			$right = $pageCount;
			if (($left - 1) > $pseudoRight)
				$left -= $pseudoRight;
			else
				$left = 1;
		}
		$firstPage = $prevPage = $nextPage = $lastPage = '';
		if ($currentPageNo > 1)
		{
			$link = str_replace("%PN%", 1, $linkFormat);
			$firstPage = '<li class="firstPage"><a href="' . $link . '" class="pagenumber"><p>اولین</p></a></li>';
			$link = str_replace("%PN%", $currentPageNo - 1, $linkFormat);
			$prevPage = '<li class="prevPage"><a href="' . $link . '" class="pagenumber"><p>قبلی</p></a></li>';
		}
		if ($currentPageNo < $pageCount)
		{
			$link = str_replace("%PN%", $currentPageNo + 1, $linkFormat);
			$nextPage = '<li class="nextPage"><a href="' . $link . '" class="pagenumber"><p>بعدی</p></a></li>';
			$link = str_replace("%PN%", $pageCount, $linkFormat);
			$lastPage = '<li class="lastPage"><a href="' . $link . '" class="pagenumber"><p>آخرین</p></a></li>';
		}
		$code = "<ul class='pagination'> {$firstPage}{$prevPage}";
		for($i = $left; $i <= $right; $i++)
		{
			if ($i == $currentPageNo)
			{
				$code .= '<li><span class="pagenumber_selected"><p>' . $i . '</p></span></li>';
			}
			else
			{
				$link = str_replace("%PN%", $i, $linkFormat);
				$code .= '<li><a href="' . $link . '" class="pagenumber"><p>' . $i . '</p></a></li>';
			}
		}
		$code .= $nextPage . $lastPage . "</ul><div class='badboy'></div>";
		return $code;
	}

         
function DataGrid($cols, $rows, $colsClass, $rowsClass, $itemsInPage, $pageNo, $keyName,
			$showKey, $showEdit, $showDelete, $rowCount,$address)
{
			$code = "<table width='100%' class='datagrid' border='0'><tr class='datagridheader'>";
			//if ($showEdit) $code .= "<td class='datagrid'></td>";
			$code .= "<th>ردیف</th>";
			$fields = array();
                        $DBase = new Database();
			foreach($cols as $key=>$value)
			{
				if (!$showKey && $key == $keyName) continue;
				$code .= "<th>$value</th>";
				$fields[] = $key;
			}
		//	if ($showDelete) $code .= "<td class='datagrid'></td>";
			$code .= "</tr>";
			$rowNo = 0;
			foreach($rows as $key=>$row)
			{
				$rowClass = ($rowsClass[$rowNo] == NULL) ? "datagridrow" : $rowsClass[$rowNo];
                                //$colClass = ($colsClass[$colNo] == NULL) ? "datagridcol" : $colsClass[$colNo];
                                $colClass ="";
				$code .= "<tr class='{$rowClass}'>";
				//if ($showEdit) $code .= "<td align='center' class='{$colClass}'><a href='?func=post&act=edition&pid={$row["id"]}'><img src='{$DBase->Site_Theme_Add}edit.gif' /></a></td>";
				$code .= "<td align='center' class='{$colClass}'>" . ($rowNo + ($pageNo*$itemsInPage) + 1) . "</td>";
				$colNo = 0;
				foreach($row as $key2=>$value)
				{
					if ($colNo >= Count($fields)) break;
					if (!$showKey && $key2 == $keyName) continue;
					$code .= "<td class='{$colClass}'>";
					$code .= $row[$fields[$colNo]];
					$code .= "</td>";
					$colNo++;
				}
				//if ($showDelete) $code .= "<td align='center' class='{$colClass}'><a href='?func=post&act=delete&pid={$row["id"]}&pageNo={$_GET["pageNo"]}'><img src='{$DBase->Site_Theme_Add}delete.gif' /></a></td>";
				$code .= "</tr>";
				$rowNo++;
				if ($rowNo >= $itemsInPage) break;
			}
			$code .= "<tr>";
		//	if ($showEdit) $colNo++;
		//	if ($showDelete) $colNo++;
			$colNo++;
			$code .= "<td colspan='{$colNo}' align='center' dir='rtl' class='page-num'>";
			for($i = 0, $p = 1; $i <= ($rowCount-1)/$itemsInPage; $i++, $p++)
			{
				$code .= "<a style='text-decoration:none' href='?{$address}&pageNo={$i}'> " . str_replace("-", "&nbsp;", str_pad($p, 5, "-", STR_PAD_BOTH))  . " </a>";
			}
			$code .= "</td>";
			$code .= "</tr>";
			$code .= "</table>";
			return $code;
		} 
  function SendEmail($senderEmail, $senderName, $receivers, $subject, $message)
	{
		$mail = new PHPMailer();
		$senderName = "=?UTF-8?B?" . base64_encode($senderName) . "?=";
		$mail->SetFrom($senderEmail, $senderName);
		foreach($receivers as $key=>$r)
			$mail->AddAddress($r);
			//$mail->AddBCC($r);
		$mail->Subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
		//$mail->MsgHTML("=?UTF-8?B?" . base64_encode($message). "?=");
                $mail->CharSet = "utf-8";
                $mail->MsgHTML($message);
		$mail->Priority = 1;
                //$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$mail->IsHTML(true);		
		return $mail->Send();
	}
     function SendSmtpEmail($senderemail,$sendername,$receivers, $subject, $message,$host,$port,$username,$password)
      {
        $mail = new PHPMailer();
        $mail->Host       = "mail.tibacms.com";
        //$mail->SMTPDebug  = 2;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = $host;
        $mail->Port       = $port;
        $mail->Username   = $username;
        $mail->Password   = $password;
        $mail->SetFrom($senderemail, $sendername);

        //$mail->AddReplyTo($senderemail, $sendername);
        $mail->Subject = $subject;
        $mail->CharSet = "utf-8";
        $mail->MsgHTML($message);
        $mail->WordWrap = 50;
        foreach($receivers as $key=>$r) $mail->AddBCC($r);//$mail->AddAddress($r);
        $mail->IsHTML(true);
        return $mail->Send();
      }
		
		function IntegerOptionTag($fnum,$tnum,$optionname,$selected=Null,$onchange=Null)
        {
            $option = "<select name='$optionname' id='$optionname' onchange='$onchange' >";
            for($i=$fnum;$i<=$tnum;$i++)
            {
               if ($selected == $i){ $select = "selected='1'";} else { $select="";}
                $option.="<option value='$i'{$select} >$i</option>";
            }
            $option.="</select>";

            return  $option;

        }

        function BooleanOptionTag($optionname,$trueval,$falseval,$selectedval=1)
        {
          if ($selectedval==1)  {$trueselected="selected"; $falseselected="";}
          else {$trueselected=""; $falseselected="selected";};
         $option="<select id='$optionname;' name='$optionname'>";
         $option.="<option {$trueselected} value='1'>$trueval</option>";
         $option.="<option {$falseselected} value='0'>$falseval</option>";
         $option.="</select>";
         return $option;
        }

        function SelectOptionTag($optionname,$arraydata,$selected=Null,$onchange=Null,$classname=null)
        {
            $option = "<select name='$optionname' class='$classname' id='$optionname' onchange='$onchange' >";
            foreach($arraydata as $key=>$val)
            {			  
               if ($selected == $key){ $select = "selected='1'";} else { $select="";}
                $option.="<option value='$key' {$select} >$val</option>";
            }
            $option.="</select>";
            //var_dump($option);
            return  $option;
        }
		function DbSelectOptionTag($optionname,$dbdata,$feild,$selected=Null,$onchange=Null,$classname=null,$Style=Null,$FirstItemName=Null)
        {
            $option = "<select Style='$Style' name='$optionname' class='$classname' id='$optionname' onchange='$onchange' >";
			$option.="<option value='0'>{$FirstItemName}</option>";
            foreach($dbdata as $key=>$val)
            {			  
               if ($selected == $val["id"]){ $select = "selected='1'";} else { $select="";}
                $option.="<option value='{$val["id"]}' {$select} >{$val[$feild]}</option>";
            }
            $option.="</select>";
            //var_dump($option);
            return  $option;
        }
        function DbSelectOptionTagRadio($optionname,$dbdata,$feild,$selected=Null,$onchange=Null,$classname=null,$Style=Null,$FirstItemName=Null)
        {
            //$option = "<select Style='$Style' name='$optionname' class='$classname' id='$optionname' onchange='$onchange' >";
			//$option.="<option value='0'>{$FirstItemName}</option>";
			
            foreach($dbdata as $key=>$val)
            {			  
               if ($selected == $val["id"]){ $select = "selected='1'";} else { $select="";}
                $option.="{$val[$feild]} <input type='radio' id='{$optionname}' name='{$optionname}' class='validate[required]' data-prompt-position='topLeft:-150' value='{$val["id"]}' style='margin-top:6px'/><br />";
            }
            //$option.="</select>";
            //var_dump($option);
            return  $option;
        }
       function GetUserName($userid)
	   {
	      $db = Database::GetDatabase();
		  $row = $db ->Select("users","name,family","ID = '{$userid}'");
		  return ($row["name"]." ".$row["family"]);
	   }
	   
	   function GetSettingValue($key, $strip_tags = 0)
       {
			$db = Database::GetDatabase();
			$row = $db ->Select("settings","value","`key`='{$key}'");			
			if ($strip_tags == 1 && $row)
				$row["value"] = strip_tags($row["value"]);
			return ($row) ? $row["value"] : false;
       }
	   
	   function SetSettingValue($key,$value,$strip_tags = 0)
       {
			$db = Database::GetDatabase();
			if ($strip_tags == 1) $value = strip_tags($value);
			$val = array("value"=>"'$value'");			 
			return $db ->UpdateQuery("settings",$val,array("`key`='{$key}'"));
       }
	   
	   function CheckboxTag($name,$arraydata,$checked=NULL)
	   {
		 $chb = "";
		 $i=0;
	     foreach($arraydata as $key=>$val)
		 {	    
			$chb.="<label class='right'>$val";
			if ($checked[$i]==1)
			{
			$chb.=<<<cb
				<input type="checkbox" name="{$name}[]" value="$key" class="validate[minCheckbox[1]] folder" checked %dis%> 
cb;
			}
			else
			{
			$chb.=<<<cb
				<input type="checkbox" name="{$name}[]" value="$key" class="validate[minCheckbox[1]] folder" %dis%> 
cb;
			}
			$chb.="</label>  <div class='badboy'></div> ";
		$i++;
		}
		if (isset($checked))
			$chb = str_replace("%dis%","disabled" ,$chb);
		else
			$chb = str_replace("%dis%","",$chb);
		return $chb;
	   }
	   
	   function CreateBlock($title,$content)
       {
            $Html=<<<code
				<div class="subscrib main-box">
					<h2>{$title}</h2>
					<div class="line"> </div>
					<div class="badboy"> </div>
					<div class="box-left">
						{$content}
					</div>
				</div>
code;
          return $Html;
	  }
	  
	function ShowBlock($acceptpos)
    {
			$db = Database::GetDatabase();
            $rows=$db->SelectAll("block", "*","`pos`='$acceptpos'","order ASC,id ASC");
            foreach ($rows as $row)
            {                        
                if ($row["plugin"]==0)
                {
                    if($row["contenttype"]==1)
                    {
                        $content="
							<marquee onmouseover='this.stop()' onmouseout='this.start()'
                            scrolldelay='85' scrollamount='2' direction='up'>
                            {$row["content"]}
                            </marquee>
                                 ";
                    }
                    else
                    {
                        $content=$row["content"];
                    }
                    $ret.=CreateBlock($row["name"],$content);
                }
                else
                {
                    $srow=$this->Select("plugins", "*","`id`='{$row['plugin']}'");                          
                    if($srow["status"]==2)
                    {                        
                        $blockname = $row["name"];
                        $content=include_once "plugins/".$srow["name"]."/".$srow["name"]."_plugin.php";
                        $ret.=CreateBlock($blockname,$content);
                    }
                    else {$ret.=null;}
                }                        
            }
            return $ret;
    }
	
	function GetCategoryName($catid)
	{
	    $db = Database::GetDatabase();
		$row = $db ->Select("category","catname","ID = '{$catid}'");
		return ($row["catname"]);
	}
	function GetSectionName($secid)
	{
	    $db = Database::GetDatabase();
		$row = $db ->Select("section","secname","ID = '{$secid}'");
		return ($row["secname"]);
	}

	// *****************CheckEmail Function***********************
	function checkEmail($email) {
	  if (isset($_POST['email'])) {  
	        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);  
	        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {  
	            return true;   
	        }else{
	            return false;
	        }
	    }
	}
		
	function  DbRadioBoxTag($RadioName,$dbdata,$feild,$selectedindex=Null,$onchange=Null,$classname=null)
	{
	    $i = 0;
		foreach($dbdata as $key=>$val)
		{
		   if (isset($selectedindex)) $i++;
		   if ($selectedindex == $i)
		      $radio .= "<input type='radio' name='{$RadioName}' value='{$val[id]}' checked='checked'/>{$val[$feild]} <BR />";
			else  
			$radio .= "<input type='radio' name='{$RadioName}' value='{$val[id]}'/>{$val[$feild]} <BR />";
		}
		return  $radio;
	}
	  
?>