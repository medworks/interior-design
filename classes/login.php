<?php
class Login
{
    private static $me;
    public function __construct()
    {
        $security = Security::GetSecurity();
        $db = Database::GetDatabase();
    }
    public static function GetLogin()
    {
      if(is_null(self::$me))
         self::$me = new Login ();
      return self::$me;
    }
    
   public function AdminLogin($username,$password)
   {
       $sess = Session::GetSesstion();
       
       $security = Security::GetSecurity();
       
       $db = Database::GetDatabase();
       
       $username = $security->Xss_Clean($username);
       $password = $security->Xss_Clean($password);
       $password = md5($password);
       $db->cmd = "SELECT * FROM `users` " .
                            "WHERE (`username`='$username') AND (`password`='$password') limit 1";	
       $res = $db->RunSQL();       
	  // if ($res===false) return false;
	   if (mysqli_num_rows($res)!=1) return false; 
       $row = mysqli_fetch_array($res);
       $sess->Set("login",true);
       $sess->Set("username",$row["username"]);
	   $sess->Set("userid",$row["id"]);
       $sess->Set("name",$row["name"]);
       $sess->Set("family",$row["family"]);
	   $sess->Set("userimg",$row["image"]);
       return true;
   } 
	function LogOut()
	{
			$sess = Session::GetSesstion();
            return ($sess->Delete("login") and $sess->Delete("username") and $sess->Delete("name") and $sess->Delete("family"));
	}	
		
	function IsLogged()
	{
		$sess = Session::GetSesstion();
		if ($sess->Get("login")) 
		{
			return true;
		}else return false;
	}   
}

?>