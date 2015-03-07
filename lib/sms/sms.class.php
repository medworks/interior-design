<?php
	require_once('nusoap.class.php');
	
class sms_soap
{
    private $username = "";
    private $password = "";
	private $client   = null;

	function sms_soap($user, $pass)
	{
		$this->username = $user;
		$this->password = $pass;

        $this->client   = new nusoap_client("http://185.4.28.180/class/sms/webservice/server.php?wsdl");

        $this->client->soap_defencoding = 'UTF-8';
        $this->client->decode_utf8 = true;
        $this->client->setCredentials($user, $pass, "basic");
	}
	
    public function SendSMS($message, $from, $to, $type)
	{
		if(is_array($to))
		{
			$i = sizeOf($to);
			
			while($i--)
			{
				$to[$i] =  self::CorrectNumber($to[$i]);
			}
		}
		else
		{
			$to = self::CorrectNumber($to);
		}

		$params = array(
			'from'		=> $from,
			'rcpt_array'=> $to,
			'msg'		=> $message,
			'type'		=> $type
		);

        $response = $this->call("enqueue", $params);

		return $response;
    }
	
    public function GetUserBalance()
	{
		$response = $this->call("GetCredit", array());
			
		return $response;
    }

    private function call($method, $params)
	{
        $result = $this->client->call($method, $params);

			if($this->client->fault || ((bool)$this->client->getError()))
			{
				return array('error' => true, 'fault' => true, 'message' => $this->client->getError());
			}

        return $result;
    }

	public static function CorrectNumber(&$uNumber)
	{
		$uNumber = Trim($uNumber);
		$ret = &$uNumber;
		
		if (substr($uNumber,0, 3) == '%2B')
		{ 
			$ret = substr($uNumber, 3);
			$uNumber = $ret;
		}
		
		if (substr($uNumber,0, 3) == '%2b')
		{ 
			$ret = substr($uNumber, 3);
			$uNumber = $ret;
		}
		
		if (substr($uNumber,0, 4) == '0098')
		{ 
			$ret = substr($uNumber, 4);
			$uNumber = $ret;
		}
		
		if (substr($uNumber,0, 3) == '098')
		{ 
			$ret = substr($uNumber, 3);
			$uNumber = $ret;
		}
		
		
		if (substr($uNumber,0, 3) == '+98')
		{ 
			$ret = substr($uNumber, 3);
			$uNumber = $ret;
		}
		
		if (substr($uNumber,0, 2) == '98')
		{ 
			$ret = substr($uNumber, 2);
			$uNumber = $ret;
		}
		
		if(substr($uNumber,0, 1) == '0')
		{ 
			$ret = substr($uNumber, 1);
			$uNumber = $ret;
		}  
		   
		return '+98' . $ret;
	}
}

?>