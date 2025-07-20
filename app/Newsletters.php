<?php

namespace App;
use GuzzleHttp\Client;
use Log;

class Newsletters{

    private $telephone;
    private $message;
    private $sms_apikey = '';
    private $sms_token = '';
    private $sms_from = "";

    public function __construct($telephone, $message){
        $this->telephone = $telephone;
        $this->message = $message;
    }

    public function send(){
        $client = new Client();
        $url = "http://app.newsletters.lk/smsAPI?sendsms&apikey=".$this->sms_apikey."&apitoken=".$this->sms_token."&type=sms&from=".$this->sms_from."&to=".$this->telephone."&text=".$this->message."&route=0";
        try {
           $response = $client->request('GET', $url);
           Log::debug($response);
        } catch (\Throwable $th) {
           Log::error($th);
        }
    }
}

