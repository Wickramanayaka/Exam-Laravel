<?php

namespace App;
use GuzzleHttp\Client;
use Log;

class SMSMSL{

    private $telephone;
    private $message;
    private $token = "";

    public function __construct($telephone, $message){
        $this->telephone = ltrim($telephone,'+');
        $this->message = $message;
    }

    public function send()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://smsapi.bitshifttech.com/api/v1/send/single/custom',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "message":"'.$this->message.'",
            "phoneNumber":"'.$this->telephone.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $this->token,
            'maskid: ',
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        Log::debug($response);
    }
}