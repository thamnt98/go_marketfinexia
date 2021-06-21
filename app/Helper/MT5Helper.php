<?php

namespace App\Helper;

use GuzzleHttp\Client;

class MT5Helper
{
    protected static $mt5Url = 'http://79.143.176.19:17014/ManagerAPIFOREX/';

    public function getGroups()
    {
        $endpoint = self::$mt5Url . 'GET_GROUPS?ManagerIndex=101';
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        return $result->lstGroups;
    }

    public function openAccount($data)
    {
        $endpoint = self::$mt5Url . 'ADD_MT_USER';
        $client = new Client();
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'debug' => true
            ]
        ]);
        $body = json_encode($data);
        $response = $client->request('POST', $endpoint, ['body' => $body]);
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function getAccountInfo($login){
        $endpoint = self::$mt5Url . 'GET_USER_INFO?ManagerIndex=101&Account=' . $login;
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        return $result;
    }

    public function changeMasterPassword($data){
        $endpoint = self::$mt5Url . 'CHANGE_MASTER_PASSWORD?ManagerIndex=101&Account=' . $data['login'] . '&Password=' . $data['password'];
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        return $result;
    }
}
