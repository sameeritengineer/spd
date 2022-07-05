<?php

namespace App;

class PushNotification 
{
	public static function send($message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
	    $headers = array(
	    	'Authorization: key=AAAAR1ujuv8:APA91bFIIhRH6wjpkLgBEAmLdhefy3e5nXrsphiqyc_03nH_QjeOMGC-Aqw_kI2yxDH8XvF6hjNNoGxjCqeNKovFwup4pUj8w5GNiTxxbSXrRl79_AtmcAMn-hoc_Mof_oK5U1u6Mnxs',
	        'Content-Type: application/json'
	    );
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
	    $result = curl_exec($ch);
	    if ($result === FALSE)
	    {
	        $msg = 'Curl failed:'.curl_error($ch);
	        return response()->json(["status"=>false,"message"=>$msg]);
	    }
	    return response()->json(["status"=>true,"message"=>$result]);
	}
}