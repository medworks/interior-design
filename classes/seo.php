<?php  
  include_once("database.php");
  include_once("functions.php");
class Seo
  {    
 private static $me;
 public $Site_Title;
 public $Site_KeyWords;
 public $Site_Describtion;
 
 function __construct()
 {	
     $this->Site_Title = GetSettingValue('Site_Title',0);
	 $this->Site_KeyWords = GetSettingValue('Site_KeyWords',0);
	 $this->Site_Describtion = GetSettingValue('Site_Describtion',0);
 }

 public static function GetSeo()
{
   if(is_null(self::$me))
       self::$me = new Seo();
    return self::$me;
 }
 }
 ?>