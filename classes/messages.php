<?php
class Message
{
    private static $me;
    
   function __construct()
   {
                    
   }
   
   public static function GetMessage()
   {
      if(is_null(self::$me))
          self::$me = new Message();
     return self::$me;
   }  
   
   public function ShowError($msg)
    {     
            return '<div class="error">
                        <p style="font-size:20px;color:#be4741;">'. $msg .'</p>
                    </div>
                    <div class="badboy"></div>';
    }
    
   public function ShowInfo($msg)
    {     
            return '<div class="info">
                      <p style="font-size:20px;color:#225b86;">'. $msg .'</p>
                    </div>
                    <div class="badboy"></div>';
    }
    
   public function ShowSuccess($msg)
    {            
            return '<div class="success">
                      <p style="font-size:20px;background-color: #7bcf29;padding: 5px;color:#fff">'. $msg .'</p>
                    </div>
                    <div class="badboy"></div>';
    }
    
   public function ShowComment($msg)
    {     
            return '<div class="comment">
                      <p style="font-size:20px;color:#6d7829;">' . $msg .'</p>
                    </div>
                    <div class="badboy"></div>';
    }

}

?>