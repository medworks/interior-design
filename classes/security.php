<?php

class Security
{
    private static $me;
    public function __construct()
    {
        
    }
    public static function GetSecurity()
    {
      if(is_null(self::$me))
         self::$me = new Security();
      return self::$me;
    }
   
/** 
     * Cross site filtering (XSS). Recursive. 
     * 
     * @param  string Data to be cleaned 
     * @return mixed 
     */ 
    public function Xss_Clean($data) 
    { 
        // If its empty there is no point cleaning it :\ 
        if(empty($data)) 
            return $data; 
             
        // Recursive loop for arrays 
        if(is_array($data)) 
        { 
            foreach($data as $key => $value) 
            { 
                $data[$key] = $this->Xss_Clean($data); 
            } 
             
            return $data; 
        } 
         
        // http://svn.bitflux.ch/repos/public/popoon/trunk/classes/externalinput.php 
        // +----------------------------------------------------------------------+ 
        // | Copyright (c) 2001-2006 Bitflux GmbH                                 | 
        // +----------------------------------------------------------------------+ 
        // | Licensed under the Apache License, Version 2.0 (the "License");      | 
        // | you may not use this file except in compliance with the License.     | 
        // | You may obtain a copy of the License at                              | 
        // | http://www.apache.org/licenses/LICENSE-2.0                           | 
        // | Unless required by applicable law or agreed to in writing, software  | 
        // | distributed under the License is distributed on an "AS IS" BASIS,    | 
        // | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or      | 

        // | implied. See the License for the specific language governing         | 
        // | permissions and limitations under the License.                       | 
        // +----------------------------------------------------------------------+ 
        // | Author: Christian Stocker <chregu@bitflux.ch>                        | 
        // +----------------------------------------------------------------------+ 
         
        // Fix &entity\n; 
        $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data); 
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data); 
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data); 
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8'); 

        // Remove any attribute starting with "on" or xmlns 
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data); 

        // Remove javascript: and vbscript: protocols 
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data); 
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data); 
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data); 

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span> 
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data); 
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data); 
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data); 

        // Remove namespaced elements (we do not need them) 
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data); 

        do 
        { 
            // Remove really unwanted tags 
            $old_data = $data; 
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data); 
        } 
        while ($old_data !== $data); 
         
        return $data; 
    } 
     
    /** 
     * Enforces W3C specifications to prevent malicious exploitation. 
     * 
     * @param  string Key to clean 
     * @return string 
     */ 
    protected function CleanInputKeys($data) 
    { 
        $chars = PCRE_UNICODE_PROPERTIES ? '\pL' : 'a-zA-Z'; 
         
        if ( ! preg_match('#^[' . $chars . '0-9:_.-]++$#uD', $data)) 
        { 
            exit('Illegal key characters in global data'); 
        } 
         
        return $data; 
    } 
     
    /** 
     * Escapes data. 
     * 
     * @param  mixed Data to clean 
     * @return mixed 
     */ 
    public function CleanInputData($data) 
    { 
        if(is_array($data)) 
        { 
            $new_array = array(); 
            foreach($data as $key => $value) 
            { 
                $new_array[$this->CleanInputKeys($key)] = $this->CleanInputData($value); 
            } 
             
            return $new_array; 
        }
        else
        {             
        if(get_magic_quotes_gpc()) 
        { 
            // Get rid of those pesky magic quotes! 
            $data = stripslashes($data); 
        } 
        if (!is_numeric($data))
        {
          $data = "'" . mysql_real_escape_string($data) . "'";
        }
        }
         
        $data = $this->Xss_Clean($data); 
         
        return $data; 
    } 
       
    
}

?>