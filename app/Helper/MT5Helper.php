<?php

namespace App\Helper;

use GuzzleHttp\Client;

class MT5Helper
{
    protected static $mt5Url = 'http://79.143.176.19:17014/ManagerAPIFOREX/';

    protected $session = 'sfkja3eipso3';
    protected $managerIndex = 101;


    private function connectMT5()
    {
        // $endpoint = self::$mt5Url . 'LOGIN_SESSION?Email=startingmt5broker@gmail.com&Password=rasa8r&Source=1';
        // $client = new Client();
        // $response = $client->request('GET', $endpoint);
        // $result = json_decode($response->getBody());
        // $this->session =  $result->Session;
        // $endpoint = self::$mt5Url . 'INITIAL_ADD_MANAGER';
        // $client = new Client([
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'debug' => true
        //     ]
        // ]);
        // $data = [
        //     "ManagerID" => 1480,
        //     "ManagerIndex" => 0,
        //     "MT4_MT5" => 1,
        //     "CreatedBy" => 1,
        //     "oStatus" => 1,
        //     "ServerConfig" => "174.142.252.29:443",
        //     "ServerCode" => "Live",
        //     "Password" => "G9istgg_",
        //     "oDemo" => 1,
        //     "Session" => $this->session
        // ];
        // $body = json_encode($data);
        // $response = $client->request('POST', $endpoint, ['body' => $body]);
        // $result = json_decode($response->getBody(), true);
        // $this->managerIndex =  $result['Result'];
    }

    public function getGroups()
    {
        $this->connectMT5();
        $endpoint = self::$mt5Url . 'GET_GROUPS?Session=' . $this->session . '&ManagerIndex=' . $this->managerIndex;
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        return $result->lstGroups;
    }

    public function openAccount($data)
    {
        $this->connectMT5();
        $endpoint = self::$mt5Url . 'ADD_MT_USER';
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'debug' => true
            ]
        ]);
        $data ['ManagerIndex'] = $this->managerIndex;
        $data ["Session"] = $this->session;
        $body = json_encode($data);
        $response = $client->request('POST', $endpoint, ['body' => $body]);
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function getAccountInfo($login)
    {
        $this->connectMT5();
        $endpoint = self::$mt5Url . 'GET_USER_INFO?Session=' . $this->session . '&ManagerIndex=' . $this->managerIndex . '&Account=' . $login;
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        return $result;
    }

    public function changeMasterPassword($data)
    {
        $this->connectMT5();
        $endpoint = self::$mt5Url . 'CHANGE_MASTER_PASSWORD?Session=' . $this->session .  '&ManagerIndex=' . $this->managerIndex .'&Account=' . $data['login'] . '&Password=' . $data['password'];
        $client = new Client();
        $response = $client->request('GET', $endpoint);
        $result = json_decode($response->getBody());
        return $result;
    }
}
