<?php


namespace App\Helper;

class ApiCallHelper
{
    public static function api_call($url,$data)
    {
        $header = array();
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, $url );
		curl_setopt($curl,CURLOPT_POST, true );
		curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);			
		$response = curl_exec($curl);
		$err = curl_error($curl);
        return $response; 

    }
}
