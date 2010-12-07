<?php

class PayPalRecurringPayments
{    
    public $liveppserver = "https://api-3t.paypal.com/nvp"; # https://api.paypal.com/nvp
    public $testppserver = "https://api-3t.sandbox.paypal.com/nvp"; # https://api.sandbox.paypal.com/nvp
    public $test = false;
    public $requestHeaderArr;
    public $methodName = "CreateRecurringPaymentsProfile";    

    function PPHttpPost() 
    {          
        foreach ($this->requestHeaderArr as $fldname => $val)
        {  
            if($val != '')
                $nvpreq .= strtoupper($fldname) . "=" . urlencode($val) . "&";
        }

        $url = ($this->test) ? $this->testppserver : $this->liveppserver;
        $post .= "METHOD=" . $this->methodName . "&" . $nvpreq . "&VERSION=56.0";	
        $retstr = $this->sendAPIRequest($url . "?" . $post);
    	$retarrtmp = split("&",$retstr);		
		$retarr = array();        

		for($i=0;$i<count($retarrtmp);$i++)
        {
			$sparr = split("=",$retarrtmp[$i]);
			$txt = urldecode($sparr[0]);
			$val = urldecode($sparr[1]);
			$retarr[$txt] = $val;
		}

		return $retarr;
	}    

    function sendAPIRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if(curl_errno($ch))
            $response = curl_error($ch);      

        curl_close($ch);
        return $response;
    }
}

?>