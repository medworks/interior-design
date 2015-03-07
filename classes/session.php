<?php
class Session
{

    private $sessionName;
    private static $me;
    
    public function __construct($sessionName=null, $regenerateId=false, $sessionId=null)
    {
        if (!is_null($sessionId)) {
            session_id($sessionId);
        }        
        session_start();
        
        if ($regenerateId) {
            //session_regenerate_id(true);
        }
        if (!is_null($sessionName)) {
            $this->sessionName = session_name($sessionName);
        }
    }
    
  public static function GetSesstion()
  {
   if(is_null(self::$me))
       self::$me = new Session();   
    return self::$me;
  } 
    
    
    public function Set($key, $val)
    {
        $_SESSION[$key] = $val;
    }
    
    /*
        to set something like $_SESSION['key1']['key2']['key3']:
        $session->setMd(array('key1', 'key2', 'key3'), 'value')
    */
    public function Setarray($keyArray, $val)
    {
        $arrStr = "['".implode("']['", $keyArray)."']";
        $_SESSION{$arrStr} = $val;
    }
    
    
    public function Get($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
    }
    
    /*
        to get something like $_SESSION['key1']['key2']['key3']:
        $session->getMd(array('key1', 'key2', 'key3'))
    */
    public function GetArray($keyArray)
    {
        $arrStr = "['".implode("']['", $keyArray)."']";
        return (isset($_SESSION{$arrStr})) ? $_SESSION{$arrStr} : false;
    }
    
    
    public function Delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    
    
    public function DeleteArray($keyArray)
    {
        $arrStr = "['".implode("']['", $keyArray)."']";
        if (isset($_SESSION{$arrStr})) {
            unset($_SESSION{$arrStr});
            return true;
        }
        return false;
    }
    
    
    public function RegenerateId($destroyOldSession=false)
    {
        session_regenerate_id(false);
        
        if ($destroyOldSession) {
            //  hang on to the new session id and name
            $sid = session_id();
            //  close the old and new sessions
            session_write_close();
            //  re-open the new session
            session_id($sid);
            session_start();
        }
    }
    
    
    public function Destroy()
    {
        return session_destroy();
    }
    
    
    public function GetName()
    {
        return $this->sessionName;
    }

}

?>